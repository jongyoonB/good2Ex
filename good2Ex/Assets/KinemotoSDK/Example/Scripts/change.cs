﻿using UnityEngine;
using System.Collections;

public class change : MonoBehaviour {

	// Use this for initialization
	void Start () {
	
	}
	
	// Update is called once per frame
	void Update () {
        if (Input.GetKeyDown(KeyCode.Space))
        {
            Debug.Log("AA");
            UnityEngine.SceneManagement.SceneManager.LoadScene("Side");
        }
	}
}
