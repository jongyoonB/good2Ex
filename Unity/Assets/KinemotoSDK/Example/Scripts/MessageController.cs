using UnityEngine;
using System.Collections;

public class MessageController : MonoBehaviour
{

    public AudioClip[] message = new AudioClip[16];

    void Start()
    {
        message[0] = Resources.Load("Sound/Message/Mousukosi") as AudioClip;
        message[1] = Resources.Load("Sound/Message/Otukare") as AudioClip;
        message[2] = Resources.Load("Sound/Message/Good") as AudioClip;
        message[3] = Resources.Load("Sound/Message/Concentrate") as AudioClip;
        message[4] = Resources.Load("Sound/Message/LastOne") as AudioClip;
        message[5] = Resources.Load("Sound/Message/LeftArmFront") as AudioClip;
        message[6] = Resources.Load("Sound/Message/RightArmFront") as AudioClip;
        message[7] = Resources.Load("Sound/Message/Start") as AudioClip;
        message[8] = Resources.Load("Sound/Message/Mousukosi-j") as AudioClip;
        message[9] = Resources.Load("Sound/Message/Otukare-j") as AudioClip;
        message[10] = Resources.Load("Sound/Message/Good-j") as AudioClip;
        message[11] = Resources.Load("Sound/Message/Concentrate-j") as AudioClip;
        message[12] = Resources.Load("Sound/Message/LastOne-j") as AudioClip;
        message[13] = Resources.Load("Sound/Message/LeftArmFront-j") as AudioClip;
        message[14] = Resources.Load("Sound/Message/RightArmFront-j") as AudioClip;
        message[15] = Resources.Load("Sound/Message/Start-j") as AudioClip;
    }

    void Awake()
    {

    }

    public void playClip(int clip)
    {
        this.gameObject.GetComponent<AudioSource>().clip = message[clip];
        this.gameObject.GetComponent<AudioSource>().loop = false;
        GameObject.Find("BGM").GetComponent<AudioSource>().volume = 0.1f;
        this.gameObject.GetComponent<AudioSource>().Play();
    }
}