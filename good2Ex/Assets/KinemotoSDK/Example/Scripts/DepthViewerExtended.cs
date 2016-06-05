using UnityEngine;
using UnityEngine.UI;

public class DepthViewerExtended : MonoBehaviour
{
    public Slider depthSlider;
    public Slider widthSlider;
    public Text depthText;
    public Text depthWidhtText;

    private Texture2D _texture;
    private int _wallMinVal = 0;
    private int _wallMaxVal = 0;
    private int _sliderWidth = 0;

    void Start()
    {
        Kinemoto.AddListener(this.gameObject);
        SliderWidthChanged();
    }

    void Update()
    {
        if (this._texture != null) this.gameObject.GetComponent<Renderer>().material.mainTexture = this._texture;
    }

    void Kinect_NewDepthFrame(ushort[] rawDepthFrame)
    {
        if (rawDepthFrame != null)
        {
            byte[] pixelData = new byte[(rawDepthFrame.Length * 3)];

            int colorIndex = 0;

            for (int depthIndex = 0; depthIndex < rawDepthFrame.Length; depthIndex++)
            {
                ushort depth = rawDepthFrame[depthIndex];

                if (depth >= _wallMinVal && depth <= _wallMaxVal) // RED
                {
                    pixelData[colorIndex++] = 255; // R
                    pixelData[colorIndex++] = 0; // G
                    pixelData[colorIndex++] = 0; // B
                }
                else if (depth == 0) // BLACK
                {
                    pixelData[colorIndex++] = 0;
                    pixelData[colorIndex++] = 0;
                    pixelData[colorIndex++] = 0;
                }
                else  // GRAY
                {
                    pixelData[colorIndex++] = 70;
                    pixelData[colorIndex++] = 70;
                    pixelData[colorIndex++] = 70;
                }
            }

            if (this._texture == null) this._texture = new Texture2D(Kinemoto.DEPTH_WIDTH, Kinemoto.DEPTH_HEIGHT, TextureFormat.RGB24, false);
            this._texture.LoadRawTextureData(pixelData);
            this._texture.Apply();
        }
    }

    public void SliderWidthChanged()
    {
        _sliderWidth = (int)widthSlider.value;
        depthWidhtText.text = "" + this.widthSlider.value / 10 + " cm";
        SliderDepthChanged();
    }

    public void SliderDepthChanged()
    {
        _wallMinVal = (int)this.depthSlider.value - _sliderWidth / 2;
        _wallMaxVal = (int)this.depthSlider.value + _sliderWidth / 2;
        depthText.text = "" + this.depthSlider.value / 1000 + " meter";
    }
}