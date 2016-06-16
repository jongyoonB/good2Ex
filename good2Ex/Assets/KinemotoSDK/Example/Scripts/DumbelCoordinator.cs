﻿using UnityEngine;
using KinemotoSDK;
using KinemotoSDK.Helpers;
using KinemotoSDK.Kinect;
using System.Collections.Generic;
using UnityEngine.UI;
using UnityEngine.SceneManagement;
using System.Collections;
using System;
using System.Timers;
using System.Diagnostics;

public class DumbelCoordinator : MonoBehaviour
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
    public MessageController msgController;


    static DumbelCheck dumbel;

    //Joint Coordinate Info
    public static Dictionary<string, KinemotoSDK.Kinect.CameraSpacePoint> JointInfo = new Dictionary<string, KinemotoSDK.Kinect.CameraSpacePoint>();

    public Renderer mapRenderer;
    private CoordinateMapper cm;


    //GameObject for effects
    public static GameObject particle;
    public static Vector3 particle_position;

    public static GameObject firewall;
    public static Vector3 firewall_position;

    public static GameObject firework;

    //GameObject for StartInfo
    public GameObject GameMask;
    public GameObject movieTexture;
    public GameObject panel;
    public GameObject SetGoal;
    public GameObject ScoreGoal;

    //GameObject for Status
    //public static GameObject Status_panel;
    private GameObject prefab;
    public static GameObject Status;
    

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

    //angle
    public static GameObject elbowLeftDegree;
    public static GameObject elbowRightDegree;
    public static GameObject armpRightDegree;
    public static GameObject armpLeftDegree;

    //phase
    public static GameObject phase;
    public static GameObject Toggle1;
    public static GameObject Toggle2;
    public static GameObject Toggle3;
    public static GameObject Toggle4;

    //helper
    public static GameObject helper;
    public changeAnimation changeAnimation;
    private GameObject balloon;
    private static GameObject balloon_text;

    //stop_watch(timer)
    public static Stopwatch set_timer = new Stopwatch();
    public static string set_time;

    void Start()
    {
        //Time.captureFramerate = 30;
        //call javascript function
        Application.ExternalCall("orderPlus", "ok");
        if (!GameObject.Find("BGM"))
        {
            BGM = new GameObject("BGM");
            BGM.AddComponent<AudioSource>();
            BGM.AddComponent<MusicSingleton>();
        }
        else
        {
            this.BGM = GameObject.Find("BGM");
        }

        MessageController = new GameObject("MessageController");
        MessageController.AddComponent<AudioSource>();
        MessageController.AddComponent<MessageController>();
        msgController = gameObject.GetComponent("ScriptName") as MessageController;

       

        //helper
        helper = GameObject.Find("helper");
        changeAnimation = gameObject.GetComponent("ScriptName") as changeAnimation;
        helper.SetActive(false);
        balloon = GameObject.Find("balloon");
        balloon.SetActive(false);
        balloon_text = GameObject.Find("balloon_text");
        balloon_text.SetActive(false);

        //angle object
        elbowLeftDegree = GameObject.Find("elbowLeftDegree");
        elbowRightDegree = GameObject.Find("elbowRightDegree");
        armpLeftDegree = GameObject.Find("armpRightDegree");
        armpRightDegree = GameObject.Find("armpLeftDegree");

        //set count value
        counter = 0;
        BreakTime = 10f;

        //screenResize
        Application.ExternalCall("screenResize", "ok");

        //particle effect set
        particle = Instantiate(Resources.Load("particle")) as GameObject;
        particle.SetActive(false);
        particle.transform.parent = GameObject.Find("Canvas").transform;
        particle_position = new Vector3(0, 0);

        //firewall effect set
        firewall = Instantiate(Resources.Load("WallOfFire")) as GameObject;
        firewall.SetActive(false);
        firewall.transform.parent = GameObject.Find("Canvas").transform;
        firewall_position = new Vector3(0, 0);
        firework = GameObject.Find("firework");
        if (firework.activeInHierarchy)
        {
            firework.SetActive(false);
        }
        


        //Timer
        Timer = GameObject.Find("Timer");
        set_timer.Reset();

        //movie texture set
        movieTexture = GameObject.Find("GUITexture Video");
        movieTexture.transform.parent = GameObject.Find("Panel").transform;
        PlayMovieTexture.StartAllMovies();


        //panel set
        panel = GameObject.Find("Panel");
        //Status_panel = GameObject.Find("Status_panel");
        breakTimeMask = GameObject.Find("breakTimeMask");



        //Status_panel.SetActive(false);
        breakTimeMask.SetActive(false);
        prefab = Resources.Load("prefabs/ToggleListMenu") as GameObject;
        Status = GameObject.Instantiate(prefab) as GameObject;
        Status.name = "status";
        Status.transform.parent = GameObject.Find("Canvas").transform;
        Status.transform.localPosition = new Vector3(236.2f, 110.9f, -10);
        Status.transform.localScale = new Vector3(0.5130946f, 0.5937846f, 0.5082178f);

        //phase = GameObject.Find("phase");
        phase = GameObject.Find("Title");
        Toggle1 = GameObject.Find("Toggle1");
        Toggle2 = GameObject.Find("Toggle2");
        Toggle3 = GameObject.Find("Toggle3");
        Toggle4 = GameObject.Find("Toggle4");
        Toggle1.GetComponentInChildren<Text>().resizeTextForBestFit = true;
        Toggle2.GetComponentInChildren<Text>().resizeTextForBestFit = true;
        Toggle3.GetComponentInChildren<Text>().resizeTextForBestFit = true;
        Toggle4.GetComponentInChildren<Text>().resizeTextForBestFit = true;

        Status.SetActive(false);




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
        dumbel = new DumbelCheck();

        ConfigureCoordinateMapper(mapRenderer);

        Application.ExternalCall("init_score", 0);

    }

    void Update()
    {
        if (loadScene == true)
        {
            Timer.GetComponent<Text>().text = ((int)BreakTime).ToString();
            BreakTime -= Time.deltaTime;
            GameObject.Find("TakeArest").GetComponent<Text>().color = new Color(GameObject.Find("TakeArest").GetComponent<Text>().color.r, GameObject.Find("TakeArest").GetComponent<Text>().color.g, GameObject.Find("TakeArest").GetComponent<Text>().color.b, Mathf.PingPong(Time.time, 1));
            //Debug.Log(BreakTime);
        }

        if (!MessageController.GetComponent<AudioSource>().isPlaying && BGM.GetComponent<AudioSource>().volume != 0.5f)
        {
            BGM.GetComponent<AudioSource>().volume = 0.5f;
        }
    }

    private void ConfigureCoordinateMapper(Renderer render)
    {
        cm = new CoordinateMapper(render);
        cm.instantUpdate = true;
        // wether to check for new positions every frame
        //Debug.Log(render.gameObject.name);
    }


    void Kinect_SingleUserUpdate(Body body)
    {
        if (body.IsTracked)
        {
            //Application.CaptureScreenshot(Time.frameCount.ToString()+".png");
            //Resize Unity Player Size & stop movie & hide startinfo & show status panel
            if (!screenSet)
            {
                //Time.captureFramerate = 60;
                PlayMovieTexture.StopAllMovies();
                GameMask.SetActive(false);
                Status.SetActive(true);
                //Status_panel.GetComponent<RawImage>().CrossFadeAlpha(1000, 2.0f, false);
                Application.ExternalCall("screenSize", "ok");
                screenSet = true;
                //MessageController.GetComponent<MessageController>().playClip(1);
                balloon.GetComponent<RectTransform>().localPosition = new Vector3(88.5f, balloon.GetComponent<RectTransform>().localPosition.y, balloon.GetComponent<RectTransform>().localPosition.z);
                balloon_text.GetComponent<RectTransform>().localPosition = new Vector3(89.7f, balloon_text.GetComponent<RectTransform>().localPosition.y, balloon_text.GetComponent<RectTransform>().localPosition.z);
                helper.GetComponent<Transform>().localPosition = new Vector3(215f, helper.GetComponent<Transform>().localPosition.y, helper.GetComponent<Transform>().localPosition.z);
                helper.SetActive(true);
                balloon.SetActive(true);
                balloon_text.SetActive(true);
                changeAni("pose_00");
                set_timer.Start();
            }

            for (JointType jt = JointType.SpineBase; jt <= JointType.ThumbRight; jt++)
            {
                // 조인트 조건.
                if (jt != JointType.KneeLeft && jt != JointType.KneeRight && jt != JointType.AnkleLeft && jt != JointType.AnkleRight && jt != JointType.HandTipLeft && jt != JointType.HandTipRight && jt != JointType.Neck
                    && jt != JointType.HipLeft && jt != JointType.HipRight && jt != JointType.SpineBase)
                {
                    if (!Joints.ContainsKey(jt.ToString()))
                    {

                        //add Joints to dictionary
                        Joints.Add(jt.ToString(), new GameObject(jt.ToString()));

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

            //텍스트 색 조절 및 값 조절
            textController();

            //main 함수를 호출.
            dumbel.main();

            //소리 실행
            Sound_Controller();




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
        if (!MessageController.GetComponent<AudioSource>().isPlaying)
        {
            if (dumbel.MSGorder > 0)
            {
                playMSGClip(dumbel.MSGorder);
                dumbel.MSGorder = -1;
            }
        }

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
        if (!dumbel.elbowLeft_Z)
        {
            Joints["ElbowLeft"].GetComponent<MeshRenderer>().material = materialR;
            Joints["ElbowLeft"].transform.localScale = new Vector3(0.7f, 0.7f);
        }
        else
        {
            Joints["ElbowLeft"].GetComponent<MeshRenderer>().material = materialG;
            Joints["ElbowLeft"].transform.localScale = new Vector3(0.15f, 0.15f);
        }
        if (!dumbel.elbowRight_Z)
        {
            Joints["ElbowRight"].GetComponent<MeshRenderer>().material = materialR;
            Joints["ElbowRight"].transform.localScale = new Vector3(0.7f, 0.7f);
        }
        else
        {
            Joints["ElbowRight"].GetComponent<MeshRenderer>().material = materialG;
            Joints["ElbowRight"].transform.localScale = new Vector3(0.15f, 0.15f);
        }
        if (!dumbel.wristLeft_Z)
        {
            Joints["WristLeft"].GetComponent<MeshRenderer>().material = materialR;
            Joints["WristLeft"].transform.localScale = new Vector3(0.7f, 0.7f);
        }
        else
        {
            Joints["WristLeft"].GetComponent<MeshRenderer>().material = materialG;
            Joints["WristLeft"].transform.localScale = new Vector3(0.15f, 0.15f);
        }
        if (!dumbel.wristRight_Z)
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
        armpLeftDegree.GetComponent<Text>().text = ((int)dumbel.armpit_Left_Angle).ToString();
        armpLeftDegree.transform.position = new Vector3((Joints["ShoulderLeft"].transform.position.x + 1f), (Joints["ShoulderLeft"].transform.position.y - 0.35f), 10);
        armpLeftDegree.transform.localScale = new Vector3(1f, 1f, 1f);

        armpRightDegree.GetComponent<Text>().text = ((int)dumbel.armpit_Right_Angle).ToString();
        armpRightDegree.transform.position = new Vector3((Joints["ShoulderRight"].transform.position.x + 1.1f), (Joints["ShoulderRight"].transform.position.y - 0.35f), 10);
        armpRightDegree.transform.localScale = new Vector3(1f, 1f, 1f);

        if (phase.GetComponentInChildren<Text>().text == "Phase1")
        {
            elbowLeftDegree.GetComponent<Text>().text = ((int)dumbel.elbow_Right_Angle).ToString();
            elbowLeftDegree.transform.position = new Vector3((Joints["ElbowLeft"].transform.position.x + 1.5f), (Joints["ElbowLeft"].transform.position.y + 0.35f), 10);
            elbowLeftDegree.transform.localScale = new Vector3(1f, 1f, 1f);

            elbowRightDegree.GetComponent<Text>().text = ((int)dumbel.elbow_Left_Angle).ToString();
            elbowRightDegree.transform.position = new Vector3((Joints["ElbowRight"].transform.position.x + 1.1f), (Joints["ElbowRight"].transform.position.y + 0.35f), 10);
            elbowRightDegree.transform.localScale = new Vector3(1f, 1f, 1f);
        }
        else
        {
            elbowLeftDegree.GetComponent<Text>().text = "";
            elbowRightDegree.GetComponent<Text>().text = "";
        }

    }

    public void setGetDumbel(int set)
    {
        SetGoal.GetComponent<Text>().text = set.ToString() + "세트";
        Application.ExternalCall("cut_View", set, set);
        DumbelCheck.clear_Set = (short)set;
    }

    public void scoreGetDumbel(int score)
    {
        ScoreGoal.GetComponent<Text>().text = score.ToString() + "회";
        Application.ExternalCall("cut_View", score, score);
        DumbelCheck.clear_Score = (short)score;
    }
    public void LoadScene(string scene)
    {
        Application.ExternalCall("screenResize", "ok");
        Application.ExternalCall("sendTest", "LoadScene");
        Application.ExternalCall("sendTime", set_time);
        KinemotoSDK.EngagementHandler.EngagedPlayers.Clear();
        KinemotoSDK.EngagementHandler.EngagedUsers.Clear();
        KinemotoSDK.EngagementHandler.HandRaiseCounter.Clear();
        Status.SetActive(false);
        breakTimeMask.SetActive(true);
        elbowLeftDegree.SetActive(false);
        elbowRightDegree.SetActive(false);
        armpRightDegree.SetActive(false);
        armpLeftDegree.SetActive(false);
        helper.SetActive(false);
        balloon.SetActive(false);
        balloon_text.SetActive(false);
        //balloon.GetComponent<RectTransform>().localPosition = new Vector3(277f, balloon.GetComponent<RectTransform>().localPosition.y, balloon.GetComponent<RectTransform>().localPosition.z);
        //balloon_text.GetComponent<RectTransform>().localPosition = new Vector3(281f, balloon_text.GetComponent<RectTransform>().localPosition.y, balloon_text.GetComponent<RectTransform>().localPosition.z);
        //helper.GetComponent<Transform>().localPosition = new Vector3(377f, helper.GetComponent<Transform>().localPosition.y, helper.GetComponent<Transform>().localPosition.z);
        //setBallonText("잘했어요! 잠시 휴식!");



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
                if (scene != "end")
                {
                    BreakTime = 10f;
                    GameObject.Find("Finish").GetComponent<Text>().text = "목표 횟수 완료";
                    GameObject.Find("TakeArest").GetComponent<Text>().text = "휴식 시간 입니다";
                }
                else
                {
                    firework.SetActive(true);
                    BreakTime = 5f;
                    GameObject.Find("Finish").GetComponent<Text>().text = "목표 운동 완료";
                    GameObject.Find("TakeArest").GetComponent<Text>().text = "곧 결과 페이지로 이동합니다";
                }
                StartCoroutine(LoadNewScene(scene));
            }
        }
    }

    IEnumerator LoadNewScene(string scene)
    {
        UnityEngine.Debug.Log("MOVING SCENE NAME : " + scene);
        // This line waits for 3 seconds before executing the next line in the coroutine.
        // This line is only necessary for this demo. The scenes are so simple that they load too fast to read the "Loading..." text.

        yield return new WaitForSeconds(9);

        // Start an asynchronous operation to load the scene that was passed to the LoadNewScene coroutine.
        //AsyncOperation async = Application.LoadLevelAsync(scene);
        if(scene != "end")
        {
            AsyncOperation async = SceneManager.LoadSceneAsync(scene);
            while (!async.isDone)
            {
                yield return null;
            }
        }
        else
        {
            Application.ExternalCall("move_Page",  "true");
        }

        // While the asynchronous operation to load the new scene is not yet complete, continue waiting until it's done.
        

    }

    public void playMSGClip(int order)
    {
        MessageController.GetComponent<MessageController>().playClip(order);
    }

    public static void changeAni(string aniName)
    {
        //Debug.Log("Call changeAni");
        helper.GetComponent<changeAnimation>().changeAni(aniName);
    }

    public static void setBallonText(string text)
    {
        balloon_text.GetComponent<Text>().text = text;
        balloon_text.GetComponent<Text>().CrossFadeColor(Color.black, 1f, false, false);
    }

    public void send2web(int count, int[] fail)
    {
        Application.ExternalCall("send_score", count, fail);
        msg2Web("sendScore");
    }
    public void msg2Web(string msg)
    {
        Application.ExternalCall("sendTest", msg);

    }

}
