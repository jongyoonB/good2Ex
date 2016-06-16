using UnityEngine;
using System.Collections;

public class MessageController : MonoBehaviour
{

    public AudioClip[] message = new AudioClip[20];

    void Start()
    {
        message[0] = Resources.Load("Sound/Message/mousucosi") as AudioClip;
        message[1] = Resources.Load("Sound/Message/元気に行こ") as AudioClip;
        message[2] = Resources.Load("Sound/Message/AllDepth") as AudioClip;
        message[3] = Resources.Load("Sound/Message/AllGup") as AudioClip;
        message[4] = Resources.Load("Sound/Message/AllSonmok") as AudioClip;
        message[5] = Resources.Load("Sound/Message/GanBaRe") as AudioClip;
        message[6] = Resources.Load("Sound/Message/Good") as AudioClip;
        message[7] = Resources.Load("Sound/Message/Jinji") as AudioClip;
        message[8] = Resources.Load("Sound/Message/JoGum") as AudioClip;
        message[9] = Resources.Load("Sound/Message/LastOne") as AudioClip;
        message[10] = Resources.Load("Sound/Message/LeftDepth") as AudioClip;
        message[11] = Resources.Load("Sound/Message/LeftGup") as AudioClip;
        message[12] = Resources.Load("Sound/Message/LeftSonMok") as AudioClip;
        message[13] = Resources.Load("Sound/Message/RightDepth") as AudioClip;
        message[14] = Resources.Load("Sound/Message/RightGup") as AudioClip;
        message[15] = Resources.Load("Sound/Message/RightSonmok") as AudioClip;
        message[16] = Resources.Load("Sound/Message/Start") as AudioClip;
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