using UnityEngine;
using KinemotoSDK.Helpers;
using KinemotoSDK.Kinect;
using System.Collections.Generic;
using UnityEngine.UI;
using UnityEngine.SceneManagement;

public class breaktime : MonoBehaviour
{

    //cube object for joint's mesh
    
    public Renderer mapRenderer;
    private CoordinateMapper cm;

    void Start()
    {
        ConfigureCoordinateMapper(mapRenderer);
        Application.ExternalCall("screenResize");  
        
    }

    void Update()
    {
        
    }

    private void ConfigureCoordinateMapper(Renderer render)
    {
        cm = new CoordinateMapper(render);
        cm.instantUpdate = true; 
        // wether to check for new positions every frame
        Debug.Log(render.gameObject.name);
    }


    public void ChangeMapper(Renderer newRenderer)
    {
        if (newRenderer != mapRenderer)
        {
            mapRenderer = newRenderer;
            cm = null;
            ConfigureCoordinateMapper(newRenderer);

        }
    }

    void OnDisable()
    {
        cm.Close();
    }

    public void LoadScene(string scene)
    {
        SceneManager.LoadSceneAsync("scene");
    }
}
