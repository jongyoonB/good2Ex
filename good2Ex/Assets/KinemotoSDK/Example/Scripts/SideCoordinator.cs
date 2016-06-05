using UnityEngine;
using KinemotoSDK;
using KinemotoSDK.Helpers;
using KinemotoSDK.Kinect;
using System.Collections.Generic;
using UnityEngine.UI;
using UnityEngine.SceneManagement;
using System.Collections;
using System;
using System.Timers;

public class SideCoordinator : MonoBehaviour
{

    //cube object for joint's mesh
    public GameObject meshCube;
    public GameObject meshCube2;
    public GameObject meshCube3;
    public Material materialW;
    public Material materialR;
    public Material materialG;
    public MeshRenderer meshRenderer;

    //Joints
    public Dictionary<string, GameObject> Joints = new Dictionary<string, GameObject>();
    public Dictionary<string, bool> info = new Dictionary<string, bool>();

    //Bones
    public GameObject HeadAndNeck;
    public GameObject NeckAndSpineS;
    public GameObject SpineSAndShoulderL;
    public GameObject ShoulderLAndElbowL;
    public GameObject ElbowLAndWristL;
    public GameObject WristLAndHandL;
    public GameObject SpineSAndShoulderR;
    public GameObject ShoulderRAndElbowR;
    public GameObject ElbowRAndWristR;
    public GameObject WristRAndHandR;
    public GameObject SpineSAndSpineM;
    public GameObject SpineMAndSpineB;
    public GameObject SpineBAndHipR;
    public GameObject SpineBAndHipL;
    public GameObject HipRAndKneeR;
    public GameObject KneeRAndAnkleR;
    public GameObject AnkleRAndFootR;
    public GameObject HipLAndKneeL;
    public GameObject KneeLAndAnkleL;
    public GameObject AnkleLAndFootL;

    //AudioSource & AudioClip 

    public GameObject BGM;
    public GameObject MessageController;
    private MessageController msgController;



    static SideCheck side;

    //Joint Coordinate Info
    public static Dictionary<string, KinemotoSDK.Kinect.CameraSpacePoint> JointInfo = new Dictionary<string, KinemotoSDK.Kinect.CameraSpacePoint>();

    public Renderer mapRenderer;
    private CoordinateMapper cm;


    //GameObject for effects
    public static GameObject particle;
    public static Vector3 particle_position;

    public static GameObject firewall;
    public static Vector3 firewall_position;


    //GameObject for StartInfo
    public GameObject GameMask;
    public GameObject movieTexture;
    public GameObject panel;
    public GameObject SetGoal;
    public GameObject ScoreGoal;

    //GameObject for Status
    public GameObject Status_panel;

    //GameObject For BreakTime
    public GameObject breakTimeMask;

    private bool screenSet
    {
        get; set;
    }

    //loding scene
    private bool loadScene = false;
    [SerializeField]
    private static GameObject Timer;
    private static float BreakTime;
    private int counter;
    public static Timer time;

    void Start()
    {
        //call javascript function
        Application.ExternalCall("orderPlus", "ok");
        if (!GameObject.Find("BGM"))
        {
            BGM = new GameObject("BGM");
            BGM.AddComponent<AudioSource>();
            BGM.AddComponent<MusicSingleton>();
        }

        MessageController = new GameObject("MessageController");
        MessageController.AddComponent<AudioSource>();
        MessageController.AddComponent<MessageController>();
        msgController = gameObject.GetComponent("ScriptName") as MessageController;



        //set count value
        counter = 0;
        BreakTime = 10f;

        //clear EngagedUser
        KinemotoSDK.EngagementHandler.EngagedPlayers.Clear();
        KinemotoSDK.EngagementHandler.EngagedUsers.Clear();
        KinemotoSDK.EngagementHandler.HandRaiseCounter.Clear();


        //screenResize
        Application.ExternalCall("screenResize", "ok");

        //particle effect set
        particle = Instantiate(Resources.Load("particle")) as GameObject;
        particle.SetActive(false);
        particle_position = new Vector3(0, 0);

        //firewall effect set
        firewall = Instantiate(Resources.Load("WallOfFire")) as GameObject;
        firewall.SetActive(false);
        firewall_position = new Vector3(0, 0);

        //Timer
        Timer = GameObject.Find("Timer");

        //movie texture set
        PlayMovieTexture.StartAllMovies();
        movieTexture = GameObject.Find("GUITexture Video");

        //panel set
        panel = GameObject.Find("Panel");
        Status_panel = GameObject.Find("Status_panel");
        breakTimeMask = GameObject.Find("breakTimeMask");
        Status_panel.SetActive(false);
        breakTimeMask.SetActive(false);

        //goal set
        SetGoal = GameObject.Find("SetGoals");
        ScoreGoal = GameObject.Find("ScoreGoals");

        //set material to BoneMaterial
        materialW = Resources.Load("BoneMaterialW", typeof(Material)) as Material;
        materialR = Resources.Load("BoneMaterialR", typeof(Material)) as Material;
        materialG = Resources.Load("BoneMaterialG", typeof(Material)) as Material;

        //create cube object for mesh fitter
        meshCube = GameObject.CreatePrimitive(PrimitiveType.Cube);
        meshCube2 = GameObject.CreatePrimitive(PrimitiveType.Cube);
        meshCube3 = GameObject.CreatePrimitive(PrimitiveType.Cube);

        //set gameobject name to "meshCube"
        meshCube.name = "meshCube";
        meshCube2.name = "meshCube2";
        meshCube3.name = "meshCube3";

        //set position of meshcube to back of the display
        meshCube.transform.position = new Vector3(0, 0, 20);
        meshCube2.transform.position = new Vector3(0, -5, 20);
        meshCube3.transform.position = new Vector3(0, -10, 20);

        //생성자

        side = new SideCheck();

        ConfigureCoordinateMapper(mapRenderer);

    }

    void Update()
    {
        if (loadScene == true)
        {
            Timer.GetComponent<Text>().text = ((int)BreakTime).ToString();
            BreakTime -= Time.deltaTime;
            GameObject.Find("TakeArest").GetComponent<Text>().color = new Color(GameObject.Find("TakeArest").GetComponent<Text>().color.r, GameObject.Find("TakeArest").GetComponent<Text>().color.g, GameObject.Find("TakeArest").GetComponent<Text>().color.b, Mathf.PingPong(Time.time, 1));
            Debug.Log(BreakTime);
        }

    }

    private void ConfigureCoordinateMapper(Renderer render)
    {
        cm = new CoordinateMapper(render);
        cm.instantUpdate = true;
        // wether to check for new positions every frame
        Debug.Log(render.gameObject.name);
    }


    void Kinect_SingleUserUpdate(Body body)
    {

        if (body.IsTracked)
        {
            //Resize Unity Player Size & stop movie & hide startinfo
            if (!screenSet)
            {
                PlayMovieTexture.StopAllMovies();
                GameMask.SetActive(false);
                Status_panel.SetActive(true);
                Application.ExternalCall("screenSize", "ok");
                screenSet = true;
                MessageController.GetComponent<MessageController>().playClip(1);
            }

            for (JointType jt = JointType.SpineBase; jt <= JointType.ThumbRight; jt++)
            {
                // 조인트 조건.
                if (jt != JointType.Head && jt != JointType.KneeLeft && jt != JointType.KneeRight && jt != JointType.AnkleLeft && jt != JointType.AnkleRight && jt != JointType.HandTipLeft && jt != JointType.HandTipRight && jt != JointType.Neck
                    && jt != JointType.HipLeft && jt != JointType.HipRight && jt != JointType.SpineBase)
                {
                    if (!Joints.ContainsKey(jt.ToString()))
                    {

                        //add Joints to dictionary
                        Joints.Add(jt.ToString(), new GameObject(jt.ToString()));
                        Joints[jt.ToString()].transform.parent = GameObject.Find("Canvas").transform;

                        if (jt.ToString() == "Head" || jt.ToString() == "SpineShoulder")
                        {
                            Joints[jt.ToString()].transform.localScale = new Vector3(0, 0, 5);
                        }
                        //set scale of joints object
                        else
                        {
                            Joints[jt.ToString()].transform.localScale = new Vector3(0.15f, 0.15f);
                        }

                        //set meshfilter of joints
                        MeshFilter meshfilter = Joints[jt.ToString()].AddComponent<MeshFilter>();
                        meshfilter.sharedMesh = meshCube.GetComponent<MeshFilter>().mesh;

                        //set meshRendere of joints
                        meshRenderer = Joints[jt.ToString()].AddComponent<MeshRenderer>();

                        //add ClickEvt Sciprt to gameObject
                        Joints[jt.ToString()].AddComponent<ClickEvnt>();
                        Joints[jt.ToString()].transform.parent = GameObject.Find("Canvas").transform;
                    }

                    // 뼈 색
                    //if (side.flag["err"] == true)
                    //{
                    //    Joints[jt.ToString()].GetComponent<MeshRenderer>().material = materialR;
                    //}
                    //else
                    //{
                    //    Joints[jt.ToString()].GetComponent<MeshRenderer>().material = materialG;
                    //}


                    // SideCheck에서 쓸 변수 값 정의
                    if (!JointInfo.ContainsKey(jt.ToString()))
                    {
                        JointInfo.Add(jt.ToString(), body.Joints[jt].Position);
                    }
                    else
                    {
                        JointInfo[jt.ToString()] = body.Joints[jt].Position;

                    }

                    //Set Position of Joints in display by frame
                    Joints[jt.ToString()].transform.position = cm.MapCameraPointToColorSpace(body.Joints[jt]);

                }
            }


            // 뼈대 생성 메서드
            makeBones();

            //뼈 색 조절
            depthJointColor();

            //side 의 main 함수를 계속 실행.

            side.main();

            //소리 실행
            Sound_Controller();

            //텍스트 색 조절 및 값 조절
            textController();

        }
    }



    //Drawing Bones
    public void makeBones()
    {
        //LeftArm
        makeBone(SpineSAndShoulderL, Joints["SpineShoulder"], Joints["ShoulderLeft"]);
        makeBone(ShoulderLAndElbowL, Joints["ShoulderLeft"], Joints["ElbowLeft"]);
        makeBone(ElbowLAndWristL, Joints["ElbowLeft"], Joints["WristLeft"]);
        makeBone(WristLAndHandL, Joints["WristLeft"], Joints["HandLeft"]);

        //RightArm
        makeBone(SpineSAndShoulderR, Joints["SpineShoulder"], Joints["ShoulderRight"]);
        makeBone(ShoulderRAndElbowR, Joints["ShoulderRight"], Joints["ElbowRight"]);
        makeBone(ElbowRAndWristR, Joints["ElbowRight"], Joints["WristRight"]);
        makeBone(WristRAndHandR, Joints["WristRight"], Joints["HandRight"]);

        //Spine
        makeBone(SpineSAndSpineM, Joints["SpineShoulder"], Joints["SpineMid"]);
    }

    public void Sound_Controller()
    {


        if (side.AllDepth)
        {
            MessageController.GetComponent<MessageController>().playClip(2);
            MessageController.GetComponent<AudioSource>().Play();

            sideBoolClear();
        }




        else if (side.AllGup)
        {
            MessageController.GetComponent<MessageController>().playClip(3);
            MessageController.GetComponent<AudioSource>().Play();

            sideBoolClear();
        }





        else if (side.AllSonmok)
        {
            MessageController.GetComponent<MessageController>().playClip(4);
            MessageController.GetComponent<AudioSource>().Play();

            sideBoolClear();
        }





        else if (side.GanBaRe)
        {
            MessageController.GetComponent<MessageController>().playClip(5);
            MessageController.GetComponent<AudioSource>().Play();

            sideBoolClear();
        }





        else if (side.Good)
        {
            MessageController.GetComponent<MessageController>().playClip(6);
            MessageController.GetComponent<AudioSource>().Play();

            sideBoolClear();
        }





        else if (side.Jinji)
        {
            MessageController.GetComponent<MessageController>().playClip(7);
            MessageController.GetComponent<AudioSource>().Play();

            sideBoolClear();
        }





        else if (side.JoGum)
        {
            MessageController.GetComponent<MessageController>().playClip(8);
            MessageController.GetComponent<AudioSource>().Play();

            sideBoolClear();
        }





        else if (side.LastOne)
        {
            MessageController.GetComponent<MessageController>().playClip(9);
            MessageController.GetComponent<AudioSource>().Play();

            sideBoolClear();
        }





        else if (side.LeftDepth)
        {
            MessageController.GetComponent<MessageController>().playClip(10);
            MessageController.GetComponent<AudioSource>().Play();

            sideBoolClear();
        }





        else if (side.LeftGup)
        {
            MessageController.GetComponent<MessageController>().playClip(11);
            MessageController.GetComponent<AudioSource>().Play();

            sideBoolClear();
        }





        else if (side.LeftSonMok)
        {
            MessageController.GetComponent<MessageController>().playClip(12);
            MessageController.GetComponent<AudioSource>().Play();

            sideBoolClear();
        }





        else if (side.RightDepth)
        {
            MessageController.GetComponent<MessageController>().playClip(13);
            MessageController.GetComponent<AudioSource>().Play();

            sideBoolClear();
        }
        else if (side.RightGup)
        {
            MessageController.GetComponent<MessageController>().playClip(14);
            MessageController.GetComponent<AudioSource>().Play();

            sideBoolClear();
        }
        else if (side.RightSonmok)
        {
            MessageController.GetComponent<MessageController>().playClip(15);
            MessageController.GetComponent<AudioSource>().Play();

            sideBoolClear();
        }
        else if (side.Starts)
        {
            MessageController.GetComponent<MessageController>().playClip(16);
            MessageController.GetComponent<AudioSource>().Play();

            sideBoolClear();
        }


    }

    public void sideBoolClear()
    {
        side.AllDepth = false;
        side.AllGup = false;
        side.AllSonmok = false;
        side.GanBaRe = false;
        side.Good = false;
        side.Jinji = false;
        side.JoGum = false;
        side.LastOne = false;
        side.LeftDepth = false;
        side.LeftGup = false;
        side.LeftSonMok = false;
        side.RightDepth = false;
        side.RightGup = false;
        side.RightSonmok = false;
        side.Starts = false;
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

    //Draw Bones Method
    void makeBone(GameObject name, GameObject g1, GameObject g2)
    {
        LineRenderer lr = name.GetComponent<LineRenderer>();

        lr.SetPosition(0, g1.transform.position);
        lr.SetPosition(1, g2.transform.position);
        lr.SetColors(Color.white, Color.white);
        lr.SetWidth(.1f, .1f);
    }

    void depthJointColor()
    {
        if (!side.elbowLeft_Z)
        {
            Joints["ElbowLeft"].GetComponent<MeshRenderer>().material = materialR;
            Joints["ElbowLeft"].transform.localScale = new Vector3(0.7f, 0.7f);
        }
        else
        {
            Joints["ElbowLeft"].GetComponent<MeshRenderer>().material = materialG;
            Joints["ElbowLeft"].transform.localScale = new Vector3(0.15f, 0.15f);
        }
        if (!side.elbowRight_Z)
        {
            Joints["ElbowRight"].GetComponent<MeshRenderer>().material = materialR;
            Joints["ElbowRight"].transform.localScale = new Vector3(0.7f, 0.7f);
        }
        else
        {
            Joints["ElbowRight"].GetComponent<MeshRenderer>().material = materialG;
            Joints["ElbowRight"].transform.localScale = new Vector3(0.15f, 0.15f);
        }
        if (!side.wristLeft_Z)
        {
            Joints["WristLeft"].GetComponent<MeshRenderer>().material = materialR;
            Joints["WristLeft"].transform.localScale = new Vector3(0.7f, 0.7f);
        }
        else
        {
            Joints["WristLeft"].GetComponent<MeshRenderer>().material = materialG;
            Joints["WristLeft"].transform.localScale = new Vector3(0.15f, 0.15f);
        }
        if (!side.wristRight_Z)
        {
            Joints["WristRight"].GetComponent<MeshRenderer>().material = materialR;
            Joints["WristRight"].transform.localScale = new Vector3(0.7f, 0.7f);
        }
        else
        {
            Joints["WristRight"].GetComponent<MeshRenderer>().material = materialG;
            Joints["WristRight"].transform.localScale = new Vector3(0.15f, 0.15f);
        }
    }

    //화면에 보이는 텍스트 컨트롤
    void textController()
    {
        GameObject.Find("elbowLeftDegree").GetComponent<Text>().text = ((int)side.elbow_Right_Angle).ToString();


        GameObject.Find("elbowRightDegree").GetComponent<Text>().text = ((int)side.elbow_Left_Angle).ToString();



        GameObject.Find("armpLeftDegree").GetComponent<Text>().text = ((int)side.armpit_Left_Angle).ToString();



        GameObject.Find("armpRightDegree").GetComponent<Text>().text = ((int)side.armpit_Right_Angle).ToString();
        GameObject.Find("elbowLeftDegree").transform.position = new Vector3((Joints["ElbowLeft"].transform.position.x + 1.5f), (Joints["ElbowLeft"].transform.position.y + 0.35f), 10);
        GameObject.Find("elbowLeftDegree").transform.localScale = new Vector3(1f, 1f, 1f);
        GameObject.Find("elbowRightDegree").transform.position = new Vector3((Joints["ElbowRight"].transform.position.x + 1.1f), (Joints["ElbowRight"].transform.position.y + 0.35f), 10);
        GameObject.Find("elbowRightDegree").transform.localScale = new Vector3(1f, 1f, 1f);
        GameObject.Find("armpLeftDegree").transform.position = new Vector3((Joints["ShoulderLeft"].transform.position.x + 1f), (Joints["ShoulderLeft"].transform.position.y - 0.35f), 10);
        GameObject.Find("armpLeftDegree").transform.localScale = new Vector3(1f, 1f, 1f);
        GameObject.Find("armpRightDegree").transform.position = new Vector3((Joints["ShoulderRight"].transform.position.x + 1.1f), (Joints["ShoulderRight"].transform.position.y - 0.35f), 10);
        GameObject.Find("armpRightDegree").transform.localScale = new Vector3(1f, 1f, 1f);

    }

    public void setGetSide(int set)
    {
        SetGoal.GetComponent<Text>().text = set.ToString() + "세트";
        SideCheck.clear_Set = (short)set;
    }

    public void scoreGetSide(int score)
    {
        ScoreGoal.GetComponent<Text>().text = score.ToString() + "회";
        SideCheck.clear_Score = (short)score;
    }

    public void LoadScene(string scene)
    {
        Application.ExternalCall("screenResize", "ok");
        KinemotoSDK.EngagementHandler.EngagedPlayers.Clear();
        KinemotoSDK.EngagementHandler.EngagedUsers.Clear();
        KinemotoSDK.EngagementHandler.HandRaiseCounter.Clear();
        Status_panel.SetActive(false);
        breakTimeMask.SetActive(true);
        GameObject.Find("elbowLeftDegree").SetActive(false);
        GameObject.Find("elbowRightDegree").SetActive(false);
        GameObject.Find("armpRightDegree").SetActive(false);
        GameObject.Find("armpLeftDegree").SetActive(false);

        if (loadScene == false)
        {
            // ...set the loadScene boolean to true to prevent loading a new scene more than once...
            loadScene = true;

            // ...change the instruction text to read "Loading..."
            //loadingText.text = "Loading...";

            // ...and start a coroutine that will load the desired scene.

            // If the new scene has started loading...
            if (loadScene == true)
            {
                //change breaktime string next ex / end ex
                if (scene == "end")
                {

                }
                else
                {

                }
                StartCoroutine(LoadNewScene(scene));
            }
        }
    }

    void set_text(string listName, string context)
    {
        GameObject.Find(listName).GetComponent<TextMesh>().text = context;
    }

    IEnumerator LoadNewScene(string scene)
    {

        // This line waits for 3 seconds before executing the next line in the coroutine.
        // This line is only necessary for this demo. The scenes are so simple that they load too fast to read the "Loading..." text.
        yield return new WaitForSeconds(9);

        // Start an asynchronous operation to load the scene that was passed to the LoadNewScene coroutine.
        //AsyncOperation async = Application.LoadLevelAsync(scene);
        float fadeTime = GameObject.Find("fading").GetComponent<Fading>().BeginFade(1);
        yield return new WaitForSeconds(fadeTime);
        AsyncOperation async = SceneManager.LoadSceneAsync(scene);

        // While the asynchronous operation to load the new scene is not yet complete, continue waiting until it's done.
        while (!async.isDone)
        {
            yield return null;
        }
    }

    public void send2web(int count, int[] fail)
    {
        Application.ExternalCall("send_score", count, fail);
    }
}
