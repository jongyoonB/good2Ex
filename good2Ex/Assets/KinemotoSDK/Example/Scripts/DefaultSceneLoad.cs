using UnityEngine;
using System.Collections;
using UnityEngine.SceneManagement;

public class DefaultSceneLoad : MonoBehaviour {

	// Use this for initialization
	void Start () {
        Application.ExternalCall("loadFirstExercise", "ok"); 

    }
	
	void LoadFirstScene(string scene) {
        SceneManager.LoadScene(scene);
    }
}


