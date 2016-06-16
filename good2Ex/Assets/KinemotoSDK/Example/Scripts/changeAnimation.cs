using UnityEngine;
using System.Collections;

public class changeAnimation : MonoBehaviour {

    // Use this for initialization
    void Start() {

    }

    // Update is called once per frame
    void Update() {

    }

    public void changeAni(string aniName)
    {
        //Debug.Log("changeAnimain to " + aniName);
        this.gameObject.GetComponent<Animation>().Play(aniName);
    }
}
