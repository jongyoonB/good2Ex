using UnityEngine;
using System.Collections;

public class GetExInfo : MonoBehaviour {

    public GameObject set;
    public GameObject score;

	// Use this for initialization
	void Start () {
        set = GameObject.Find("SetGoals");
        score = GameObject.Find("CountGoals");
    }
	
	// Update is called once per frame
	void Update () {
	
	}
    

    void SetGoals()
    {
        //set.name
    }

    void ScoreGoals()
    {

    }
}
