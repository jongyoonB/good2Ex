using UnityEngine;
using System.Collections;

public class MusicSingleton : MonoBehaviour
{
    private static MusicSingleton instance = null;
    private static int order = 0;
    private static int temp = 0;
    public AudioClip[] audioclips = new AudioClip[3];
    private AudioClip GetRandomClip()
    {
        
        while (true)
        {
            
            temp = Random.Range(0, audioclips.Length);
            Debug.Log(order);
            Debug.Log(temp);
            if (order != temp)
            {
                order = temp;
                break;
            }
        }
        return audioclips[order];
    }

    public static MusicSingleton Instance
    {
        get { return instance; }
    }
    void Start()
    {
        //if (!GetComponent<AudioSource>().isPlaying)
        {
            //order = Random.Range(0, audioclips.Length);
            audioclips[0] = Resources.Load("Sound/BGM/BGM1") as AudioClip;
            audioclips[1] = Resources.Load("Sound/BGM/BGM2") as AudioClip;
            //audioclips[2] = Resources.Load("Sound/BGM/BGM3") as AudioClip;

            GetComponent<AudioSource>().clip = GetRandomClip();
            GetComponent<AudioSource>().Play();
        }
    }

    void Awake()
    {
        //Debug.Log(GetComponent<AudioSource>().isPlaying);

        if (instance != null && instance != this)
        {   
                
            if (instance.GetComponent<AudioSource>().clip != GetComponent<AudioSource>().clip)
            {
                
                instance.GetComponent<AudioSource>().clip = GetComponent<AudioSource>().clip;
                instance.GetComponent<AudioSource>().volume = GetComponent<AudioSource>().volume;
                instance.GetComponent<AudioSource>().Play();
            }

            Destroy(this.gameObject);
            return;
        }
        instance = this;
        GetComponent<AudioSource>().Play();

        DontDestroyOnLoad(this.gameObject);
    }

    void Update()
    {
        if (!GetComponent<AudioSource>().isPlaying)
        {
            GetComponent<AudioSource>().clip = GetRandomClip();
            GetComponent<AudioSource>().Play();
        }
    }
}