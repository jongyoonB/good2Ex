using UnityEngine;
using UnityEngine.UI;
using System.Collections.Generic;
using System.Threading;
using System;
using System.Collections;

public class DumbelCheck
{

    #region Member [bool 친구들]

    // Start, Ready , Top , End
    public bool ready_Flag
    {
        get; set;
    }
    public bool start_Flag
    {
        get; set;
    }
    public bool top_Flag
    {
        get; set;
    }
    public bool end_Flag
    {
        get; set;
    }

    // Y
    public bool wristLeft_Y
    {
        get; set;
    }
    public bool wristRight_Y
    {
        get; set;
    }
    public bool elbowLeft_Y
    {
        get; set;
    }
    public bool elbowRight_Y
    {
        get; set;
    }

    //Depth
    public bool wristLeft_Z
    {
        get; set;
    }
    public bool wristRight_Z
    {
        get; set;
    }
    public bool elbowLeft_Z
    {
        get; set;
    }
    public bool elbowRight_Z
    {
        get; set;
    }

    //2016- 06-18 새로 추가
    public bool elbowRight_Z_Flag;
    public bool elbowLeft_Z_Flag;
    public bool wristRight_Z_Flag;
    public bool wristLeft_Z_Flag;
    public bool elbow_right_angle_Flag;
    public bool elbow_left_angle_Flag;


    //MessageSwitch
    public int MSGorder = -1;

    public DumbelCoordinator dumbelCoordi = new DumbelCoordinator();
    #endregion

    #region Member [double 친구들 == 각도값 저장]

    public double armpit_Left_Angle
    {
        get; set;
    }
    public double armpit_Right_Angle
    {
        get; set;
    }
    public double elbow_Left_Angle
    {
        get; set;
    }
    public double elbow_Right_Angle
    {
        get; set;
    }

    #endregion

    #region Member [short 친구들 == Count를 위한]

    public static short clear_Set
    {
        get; set;
    }

    public static short clear_Score
    {
        get; set;
    }

    public short wristLeft_Y_Count
    {
        get; set;
    }
    public short wristRight_Y_Count
    {
        get; set;
    }
    public short elbowLeft_Y_Count
    {
        get; set;
    }
    public short elbowRight_Y_Count
    {
        get; set;
    }

    public short wristLeft_Z_Count
    {
        get; set;
    }
    public short wristRight_Z_Count
    {
        get; set;
    }
    public short elbowLeft_Z_Count
    {
        get; set;
    }
    public short elbowRight_Z_Count
    {
        get; set;
    }

    //Score Count 변수
    public short set_Count;
    public short score_Count;


    //Fail Check Friends
    bool WristLeftDepthFail;
    bool WristRightDepthFail;
    bool ElbowLeftDepthFail;
    bool ElbowRightDepthFail;
    bool ElbowAngleLeftFail;
    bool ElbowAngleRightFail;
    int[] fail = new int[6];
    string failed_message = "";

    static int good_count;
    static int practice_count;
    static int bad_count;

    #endregion

    #region Member [vector3 친구들]

    Vector3 VEL, VER, VSM, VSS, VSL, VSR, VWL, VWR;
    Vector3 VSS_VSM, VSS_VEL, VSS_VER, VER_VSR, VER_VWR, VEL_VSL, VEL_VWL;

    #endregion

    #region 생성자 및 주요 구동 메서드

    public DumbelCheck()
    {
        set_Count = 0;
        score_Count = 0;
        bad_count = 0;
        good_count = 0;
        practice_count = 0;
    }

    public void main()
    {
        AngleContorl();

        if (!ready_Flag)
        {
            if (DumbelCoordinator.phase.GetComponentInChildren<Text>().text != "Phase1")
            {
                DumbelCoordinator.phase.GetComponentInChildren<Text>().text = "Phase1";
                if (set_Count == 0  && score_Count < 2)
                {
                    if (!DumbelCoordinator.Toggle2.activeInHierarchy)
                    {
                        DumbelCoordinator.Toggle2.SetActive(true);
                        DumbelCoordinator.Toggle3.SetActive(true);
                        DumbelCoordinator.Toggle4.SetActive(true);
                    }
                    set_text("Toggle1", "왼팔과 몸의 각도 90도");
                    set_text("Toggle2", "오른팔과 몸의 각도 90도");
                    set_text("Toggle3", "왼쪽 팔꿈치의 각도 90도");
                    set_text("Toggle4", "오른쪽 팔꿈치의 각도 90도");

                    //GameObject.Find("Test1").GetComponent<Text>().text = "왼팔과 몸의 각도 90도";
                    //GameObject.Find("Test2").GetComponent<Text>().text = "오른팔과 몸의 각도 90도";
                    //GameObject.Find("Test3").GetComponent<Text>().text = "왼쪽 팔꿈치의 각도 90도";
                    //GameObject.Find("Test4").GetComponent<Text>().text = "오른쪽 팔꿈치의 각도 90도";

                    //set_textColor("Toggle1", Color.white);
                    //set_textColor("Toggle2", Color.white);
                    //set_textColor("Toggle3", Color.white);
                    //set_textColor("Toggle4", Color.white);
                }
            }
            readyCheck();
        }
        else if (!start_Flag)
        {
            if (!DumbelCoordinator.count_timer.IsRunning)
            {
                DumbelCoordinator.count_timer.Start();
            }

            if (DumbelCoordinator.phase.GetComponentInChildren<Text>().text != "Phase2")
            {
                DumbelCoordinator.phase.GetComponentInChildren<Text>().text = "Phase2";
                if (set_Count == 0 && score_Count < 2)
                {
                    DumbelCoordinator.changeAni("idle_10");
                    set_text("Toggle1", "양팔을 천천히 올리기");
                    //set_textColor("Toggle1", Color.white);
                    //set_text("Toggle2", "");
                    //set_text("Toggle3", "");
                    //set_text("Toggle4", "");

                    DumbelCoordinator.Toggle2.SetActive(false);
                    DumbelCoordinator.Toggle3.SetActive(false);
                    DumbelCoordinator.Toggle4.SetActive(false);


                }

            }
            startCheck();
        }
        else if (!top_Flag)
        {
            if (DumbelCoordinator.phase.GetComponentInChildren<Text>().text != "Phase3")
            {
                DumbelCoordinator.phase.GetComponentInChildren<Text>().text = "Phase3";
                if (set_Count == 0 && score_Count < 2)
                {
                    DumbelCoordinator.Toggle2.SetActive(true);
                    DumbelCoordinator.Toggle3.SetActive(true);
                    DumbelCoordinator.Toggle4.SetActive(true);
                    set_text("Toggle1", "왼팔과 몸의 각도 130도");
                    set_text("Toggle2", "오른팔과 몸의 각도 130도");
                    set_text("Toggle3", "왼팔을 어깨와 나란히");
                    set_text("Toggle4", "오른팔을 어깨와 나란히");
                    //set_textColor("Toggle3", Color.white);
                    //set_textColor("Toggle4", Color.white);
                }


            }
            topCheck();
        }
        else if (!end_Flag)
        {
            if (DumbelCoordinator.phase.GetComponentInChildren<Text>().text != "Phase4")
            {
                DumbelCoordinator.phase.GetComponentInChildren<Text>().text = "Phase4";
                if (set_Count == 0 && score_Count < 2)
                {
                    set_text("Toggle1", "양팔의 각도를 90도로");
                    set_text("Toggle2", "양팔을 천천히 내리기");
                    set_text("Toggle3", "왼팔을 어깨와 나란히");
                    set_text("Toggle4", "오른팔을 어깨와 나란히");
                    //set_textColor("Toggle2", Color.white);
                    //set_textColor("Toggle3", Color.white);
                    //set_textColor("Toggle4", Color.white);
                }

            }
            endCheck();
        }

        if (ready_Flag)
        {
            depth_Check();
        }

    }

    #endregion

    #region 메서드 [Exercise Check]

    void readyCheck()
    {
        //DumbelCoordinator.setBallonText("팔을 천천히 들어 주세요");

        y_False();

        if (armpit_Left_Angle <= 100 && armpit_Left_Angle >= 85)
        {
            //set_textColor("Toggle1", Color.green);
            DumbelCoordinator.armpLeftDegree.GetComponent<Text>().color = Color.black;
            wristLeft_Y = true;
        }
        else
        {
            //set_textColor("Toggle1", Color.red);
            DumbelCoordinator.armpLeftDegree.GetComponent<Text>().color = Color.red;

            wristLeft_Y = false;
        }

        if (armpit_Right_Angle <= 100 && armpit_Right_Angle >= 85)
        {
            //set_textColor("Toggle2", Color.green);
            DumbelCoordinator.armpRightDegree.GetComponent<Text>().color = Color.black;

            wristRight_Y = true;
        }
        else
        {
            //set_textColor("Toggle2", Color.red);
            DumbelCoordinator.armpRightDegree.GetComponent<Text>().color = Color.red;

            wristRight_Y = false;
        }

        if (elbow_Left_Angle >= 80 && elbow_Left_Angle <= 110)
        {
            //set_textColor("Toggle3", Color.green);
            DumbelCoordinator.elbowLeftDegree.GetComponent<Text>().color = Color.black;

            elbowLeft_Y = true;
        }
        else
        {
            //set_textColor("Toggle3", Color.red);
            DumbelCoordinator.elbowLeftDegree.GetComponent<Text>().color = Color.red;
            elbowLeft_Y = false;
        }

        if (elbow_Right_Angle >= 80 && elbow_Right_Angle <= 110)
        {
            //set_textColor("Toggle4", Color.green);
            DumbelCoordinator.elbowRightDegree.GetComponent<Text>().color = Color.black;

            elbowRight_Y = true;
        }
        else
        {
            //set_textColor("Toggle4", Color.red);
            DumbelCoordinator.elbowRightDegree.GetComponent<Text>().color = Color.red;

            elbowRight_Y = false;
        }


        if (wristLeft_Y && wristRight_Y)
        {
            ready_Flag = true;
            if (score_Count == 0)
            {
                MSGorder = 16;
            }
            else if (wristLeft_Y && wristRight_Y && elbowRight_Y && !elbowLeft_Y)
            {
                ready_Flag = true;
                if (score_Count == 0)
                {
                    MSGorder = 16;
                }
                ElbowAngleLeftFail = true;
                Debug.Log("readyClear");

            }
            else if (wristLeft_Y && wristRight_Y && !elbowRight_Y && elbowLeft_Y)
            {
                ready_Flag = true;
                if (score_Count == 0)
                {
                    MSGorder = 16;
                }
                ElbowAngleRightFail = true;
                Debug.Log("readyClear");
            }
            else if (wristLeft_Y && wristRight_Y && !elbowRight_Y && !elbowLeft_Y)
            {
                ready_Flag = true;
                if (score_Count == 0)
                {
                    MSGorder = 16;
                }
                ElbowAngleRightFail = true;
                ElbowAngleLeftFail = true;
                Debug.Log("readyClear");
            }

            Debug.Log("readyClear");
        }
    }

    void startCheck()
    {
        //DumbelCoordinator.setBallonText("팔을 천천히 들어 주세요");

        y_False();
        if (armpit_Left_Angle >= 115 && armpit_Left_Angle <= 125)
        {
            wristLeft_Y = true;
        }

        if (armpit_Right_Angle >= 115 && armpit_Right_Angle <= 125)
        {
            wristRight_Y = true;
        }

        if (wristLeft_Y && wristRight_Y)
        {
            start_Flag = true;
            Debug.Log("startClear");
        }

    }

    void topCheck()
    {
        y_False();

        if (armpit_Left_Angle >= 135)
        {
            //set_textColor("Toggle1", Color.green);
            DumbelCoordinator.armpLeftDegree.GetComponent<Text>().color = Color.black;
            wristLeft_Y = true;
        }
        else
        {
            //set_textColor("Toggle1", Color.red);
            DumbelCoordinator.armpLeftDegree.GetComponent<Text>().color = Color.red;

        }

        if (armpit_Right_Angle >= 135)
        {
            //set_textColor("Toggle2", Color.green);
            DumbelCoordinator.armpRightDegree.GetComponent<Text>().color = Color.black;

            wristRight_Y = true;
        }
        else
        {
            //set_textColor("Toggle2", Color.red);
            DumbelCoordinator.armpRightDegree.GetComponent<Text>().color = Color.red;

        }

        if (wristLeft_Y && wristRight_Y)
        {
            if (!(elbow_Left_Angle >= 135))
            {
                ////set_textColor("Toggle3", Color.green);
                elbowLeft_Y = true;
            }
            else
            {
                ////set_textColor("Toggle3", Color.red);
            }

            if (!(elbow_Right_Angle >= 135))
            {
                ////set_textColor("Toggle4", Color.green);
                elbowRight_Y = true;
            }
            else
            {
                ////set_textColor("Toggle4", Color.red);
            }

            top_Flag = true;
            Sound_Controller();
            Debug.Log("topClear");
            sound_flag_false();
        }
    }

    void endCheck()
    {
        //DumbelCoordinator.setBallonText("팔을 천천히 내려 주세요");

        y_False();

        if (armpit_Left_Angle <= 95)
        {
            DumbelCoordinator.armpLeftDegree.GetComponent<Text>().color = Color.black;
            wristLeft_Y = true;
        }
        else
        {
            DumbelCoordinator.armpLeftDegree.GetComponent<Text>().color = Color.red;

        }

        if (armpit_Right_Angle <= 95)
        {
            DumbelCoordinator.armpRightDegree.GetComponent<Text>().color = Color.black;
            wristRight_Y = true;
        }
        else
        {
            DumbelCoordinator.armpRightDegree.GetComponent<Text>().color = Color.red;

        }


        if (wristLeft_Y && wristRight_Y)
        {
            if (ElbowLeftDepthFail)
            {
                fail[0] = 1;
                ElbowLeftDepthFail = false;
            }
            else
            {
                fail[0] = 0;
            }

            if (ElbowRightDepthFail)
            {
                fail[1] = 1;
                ElbowRightDepthFail = false;
            }
            else
            {
                fail[1] = 0;

            }

            if (WristLeftDepthFail)
            {
                fail[2] = 1;
                WristLeftDepthFail = false;
            }
            else
            {
                fail[2] = 0;
            }

            if (WristRightDepthFail)
            {
                fail[3] = 1;
                WristRightDepthFail = false;
            }
            else
            {
                fail[3] = 0;
            }

            if (ElbowAngleLeftFail)
            {
                fail[4] = 1;
                ElbowAngleLeftFail = false;
            }
            else
            {
                fail[4] = 0;
            }

            if (ElbowAngleRightFail)
            {
                fail[5] = 1;
                ElbowAngleRightFail = false;
            }
            else
            {
                fail[5] = 0;
            }

            GameObject PointsText;

            if (fail[0] + fail[1] + fail[2] + fail[3] + fail[4] + fail[5] > 2)
            {
                PointsText = UnityEngine.Object.Instantiate(Resources.Load("Prefabs/bad")) as GameObject;
                bad_count++;
                Debug.Log("BAD");
            }
            else
            {
                if (DumbelCoordinator.practice_On)
                {
                    practice_count++;
                }
                PointsText = UnityEngine.Object.Instantiate(Resources.Load("Prefabs/yosi")) as GameObject;
                Debug.Log("yosi");
            }

            for (int i = 0; i < fail.Length; i++)
            {
                Debug.Log("failed[" + i.ToString() + "] = " + fail[i].ToString());

                if (fail[i] >= 1)
                {
                    GameObject.Find("strike" + (i + 1).ToString()).GetComponent<RawImage>().CrossFadeAlpha(0, 2f, false);
                }
                else
                {
                    GameObject.Find("strike" + (i + 1).ToString()).GetComponent<RawImage>().CrossFadeAlpha(1, 2f, false);
                }
            }

            PointsText.GetComponent<ParticleSystem>().loop = false;
            show_pointText(PointsText);

            end_Flag = true;

            if (DumbelCoordinator.practice_On)
            {
                Debug.Log(practice_count);
                if (practice_count > 2)
                {
                    practice_count = 0;
                    bad_count = 0;
                    y_Count_False();
                    z_Count_False();
                
                    dumbelCoordi.ResumeScreen();
                }
            }
            
            else
            {
                if (score_Count > 2 || set_Count != 0)
                {
                    if (DumbelCoordinator.count_timer.ElapsedMilliseconds + 2000 > DumbelCoordinator.count_time_avg)
                    {
                        Debug.Log("SLOW!!");
                        MSGorder = 17;
                    }
                    else
                    {
                        DumbelCoordinator.count_time_avg = (DumbelCoordinator.count_time_avg + DumbelCoordinator.count_timer.ElapsedMilliseconds) / score_Count;
                    }

                    Debug.Log(DumbelCoordinator.count_timer.ElapsedMilliseconds + " / " + DumbelCoordinator.count_time_avg);
                }
                score_Count++;
                DumbelCoordinator.count_timer.Reset();

                if (set_Count == 0 && score_Count == 2)
                {
                    //DumbelCoordinator.Status.SetActive(false);
                    DumbelCoordinator.Status.GetComponent<Image>().material = Resources.Load("blackMaterial") as Material;
                    DumbelCoordinator.Toggle1.SetActive(false);
                    DumbelCoordinator.Toggle2.SetActive(false);
                    DumbelCoordinator.Toggle3.SetActive(false);
                    DumbelCoordinator.Toggle4.SetActive(false);

                    DumbelCoordinator.phase.transform.parent = GameObject.Find("Canvas").transform;
                    DumbelCoordinator.Status.GetComponent<RectTransform>().localScale = new Vector3(0.1203983f, 0.118181f, 1f);
                    DumbelCoordinator.Status.GetComponent<RectTransform>().offsetMin = new Vector2(-462f, -77f);
                    DumbelCoordinator.Status.GetComponent<RectTransform>().offsetMax = new Vector2(680f, 275f);
                    DumbelCoordinator.phase.transform.parent = DumbelCoordinator.Status.transform;
                }
            }
            
            Sound_Controller();
            sound_flag_false();
            ready_Flag = false;
            start_Flag = false;
            top_Flag = false;
            end_Flag = false;

            dumbelCoordi.msg2Web("re:" + ready_Flag + " /st:" + start_Flag + " /tp:" + top_Flag + " /en:" + end_Flag);
            dumbelCoordi.msg2Web("after send" + score_Count);
            //Floating Text
            //GameObject PointsText = UnityEngine.Object.Instantiate(Resources.Load("Prefabs/Kinniku")) as GameObject;
            //PointsText.transform.position = new Vector3(DumbelCoordinator.JointInfo["SpineShoulder"].X, DumbelCoordinator.JointInfo["SpineShoulder"].Y);

            if(!DumbelCoordinator.practice_On && bad_count > 2)
            {
                dumbelCoordi.SplitScreen();
            }

        }
    }

    #endregion

    void show_pointText(GameObject PointsText)
    {

        PointsText.transform.position = new Vector3(DumbelCoordinator.JointInfo["Head"].X, DumbelCoordinator.JointInfo["Head"].Y + 2f, 0);
        Debug.Log(PointsText.name);
        //yield return new WaitForSeconds(1);
        GameObject.Destroy(PointsText, 1);
        //yield return null;
    }

    #region 메서드 [bool값 False]

    void y_Count_False()
    {
        wristLeft_Y_Count = 0;
        wristRight_Y_Count = 0;
        elbowLeft_Y_Count = 0;
        elbowRight_Y_Count = 0;
    }

    void z_Count_False()
    {
        wristLeft_Z_Count = 0;
        wristRight_Z_Count = 0;
        elbowLeft_Z_Count = 0;
        elbowRight_Z_Count = 0;
    }

    void y_False()
    {
        wristLeft_Y = false;
        wristRight_Y = false;
        elbowLeft_Y = false;
        elbowRight_Y = false;
    }

    void set_text(string listName, string context)
    {
        //GameObject.Find(listName).GetComponent<TextMesh>().text = context;
        GameObject.Find(listName).GetComponentInChildren<Text>().text = context;
    }

    void set_text4text(string listName, string context)
    {
        GameObject.Find(listName).GetComponent<Text>().text = context;
    }

    void set_textColor(string listName, Color color)
    {
        GameObject.Find(listName).GetComponent<TextMesh>().color = color;
    }

    #endregion

    #region 메서드 [Depth Check]

    public void depth_Check()
    {
        if ((DumbelCoordinator.JointInfo["ShoulderLeft"].Z - DumbelCoordinator.JointInfo["ElbowLeft"].Z) <= 0.08f)
        {
            elbowLeft_Z = true;
        }
        else
        {
            elbowLeft_Z = false;
            elbowLeft_Z_Flag = true;
            elbowLeft_Z_Count++;
            if (ElbowLeftDepthFail == false)
            {
                ElbowLeftDepthFail = true;
                failed_message = "왼팔이 너무 앞으로 나왔어요";
            }
        }

        if ((DumbelCoordinator.JointInfo["ShoulderRight"].Z - DumbelCoordinator.JointInfo["ElbowRight"].Z) <= 0.08f)
        {
            elbowRight_Z = true;
        }
        else
        {
            elbowRight_Z = false;
            elbowRight_Z_Count++;
            elbowRight_Z_Flag = true;
            if (ElbowRightDepthFail == false)
            {
                ElbowRightDepthFail = true;
                failed_message = "오른팔이 너무 앞으로 나왔어요";
            }
        }

        if ((DumbelCoordinator.JointInfo["ShoulderLeft"].Z - DumbelCoordinator.JointInfo["WristLeft"].Z) <= 0.15f)
        {
            wristLeft_Z = true;
        }
        else
        {
            wristLeft_Z = false;
            wristLeft_Z_Count++;
            wristLeft_Z_Flag = true;
            if (WristLeftDepthFail == false)
            {
                WristLeftDepthFail = true;
                failed_message = "왼팔이 너무 앞으로 나왔어요";
            }
        }

        if ((DumbelCoordinator.JointInfo["ShoulderRight"].Z - DumbelCoordinator.JointInfo["WristRight"].Z) <= 0.15f)
        {
            wristRight_Z = true;
        }
        else
        {
            wristRight_Z = false;
            wristRight_Z_Count++;
            wristRight_Z_Flag = true;
            if (WristRightDepthFail == false)
            {
                WristRightDepthFail = true;
                failed_message = "오른팔이 너무 앞으로 나왔어요";
            }
        }

        if (armpit_Left_Angle < 75 && armpit_Right_Angle < 75)
        {
            failed_message = "양팔이 너무 내려갔어요";
        }
        else if (armpit_Left_Angle < 75)
        {
            failed_message = "왼팔이 너무 내려갔어요";
        }
        else if (armpit_Right_Angle < 75)
        {
            failed_message = "오른팔이 너무 내려갔어요";
        }

        if (elbowLeft_Z && elbowRight_Z && wristLeft_Z && wristRight_Z && armpit_Left_Angle > 75 && armpit_Right_Angle > 75)
        {

            if (start_Flag && !top_Flag && armpit_Left_Angle <= 110)
            {
                DumbelCoordinator.setBallonText("잠깐!!! 팔을 더 올리셔야죠!!");
            }
            else if (start_Flag && !top_Flag && armpit_Right_Angle <= 110)
            {
                DumbelCoordinator.setBallonText("잠깐!!! 팔을 더 올리셔야죠!!");
            }
            else if (!start_Flag && (elbow_Right_Angle < 75 || elbow_Right_Angle > 110) && (elbow_Left_Angle < 80 || elbow_Left_Angle > 110))
            {
                DumbelCoordinator.setBallonText("준비자세가 중 양팔꿈치가 올바르지 못합니다.");
            }
            else if (!start_Flag && (elbow_Right_Angle < 75 || elbow_Right_Angle > 110))
            {
                DumbelCoordinator.setBallonText("준비자세가 중 왼팔꿈치가 올바르지 못합니다.");
                    
                
            }
            else if (!start_Flag && (elbow_Left_Angle < 75 || elbow_Left_Angle > 110))
            {
                    DumbelCoordinator.setBallonText("준비자세가 중 오른팔꿈치가 올바르지 못합니다.");

       
            }
            else if (DumbelCoordinator.phase.GetComponentInChildren<Text>().text != "Phase4")
            {
                DumbelCoordinator.setBallonText("잘 하고 있어요!");
                DumbelCoordinator.changeAni("nod_01");
            }

        }
        else
        {
            DumbelCoordinator.changeAni("refuse_01");
            DumbelCoordinator.setBallonText(failed_message);
        }

        
    }

    #endregion

    #region 메서드 [각도 계산]

    public double AngleBetweenTwoVectors(Vector3 vectorA, Vector3 vectorB)
    {
        double dotProduct = 0.0;
        dotProduct = Vector3.Dot(vectorA, vectorB);

        return Math.Acos(dotProduct);
    }

    public void AngleContorl()
    {
        VEL = new Vector3(DumbelCoordinator.JointInfo["ElbowLeft"].X, DumbelCoordinator.JointInfo["ElbowLeft"].Y, DumbelCoordinator.JointInfo["ElbowLeft"].Z);
        VER = new Vector3(DumbelCoordinator.JointInfo["ElbowRight"].X, DumbelCoordinator.JointInfo["ElbowRight"].Y, DumbelCoordinator.JointInfo["ElbowRight"].Z);
        VSM = new Vector3(DumbelCoordinator.JointInfo["SpineMid"].X, DumbelCoordinator.JointInfo["SpineMid"].Y, DumbelCoordinator.JointInfo["SpineMid"].Z);
        VSS = new Vector3(DumbelCoordinator.JointInfo["SpineShoulder"].X, DumbelCoordinator.JointInfo["SpineShoulder"].Y, DumbelCoordinator.JointInfo["SpineShoulder"].Z);
        VSL = new Vector3(DumbelCoordinator.JointInfo["ShoulderLeft"].X, DumbelCoordinator.JointInfo["ShoulderLeft"].Y, DumbelCoordinator.JointInfo["ShoulderLeft"].Z);
        VSR = new Vector3(DumbelCoordinator.JointInfo["ShoulderRight"].X, DumbelCoordinator.JointInfo["ShoulderRight"].Y, DumbelCoordinator.JointInfo["ShoulderRight"].Z);
        VWL = new Vector3(DumbelCoordinator.JointInfo["WristLeft"].X, DumbelCoordinator.JointInfo["WristLeft"].Y, DumbelCoordinator.JointInfo["WristLeft"].Z);
        VWR = new Vector3(DumbelCoordinator.JointInfo["WristRight"].X, DumbelCoordinator.JointInfo["WristRight"].Y, DumbelCoordinator.JointInfo["WristRight"].Z);

        VSS_VSM = VSS - VSM;
        VSS_VEL = VSS - VEL;
        VSS_VER = VSS - VER;
        VER_VSR = VER - VSR;
        VER_VWR = VER - VWR;
        VEL_VSL = VEL - VSL;
        VEL_VWL = VEL - VWL;


        armpit_Left_Angle = (AngleBetweenTwoVectors(Vector3.Normalize(VSS_VSM), Vector3.Normalize(VSS_VEL)) * (180 / Math.PI));
        armpit_Right_Angle = (AngleBetweenTwoVectors(Vector3.Normalize(VSS_VSM), Vector3.Normalize(VSS_VER)) * (180 / Math.PI));
        elbow_Left_Angle = (AngleBetweenTwoVectors(Vector3.Normalize(VER_VSR), Vector3.Normalize(VER_VWR)) * (180 / Math.PI));
        elbow_Right_Angle = (AngleBetweenTwoVectors(Vector3.Normalize(VEL_VSL), Vector3.Normalize(VEL_VWL)) * (180 / Math.PI));
    }

    #endregion

    #region 메서드 [Sound Control]

    public void Sound_Controller()
    {
        bool LG = false;
        bool RG = false;
        bool LE = false;
        bool RE = false;
        bool LW = false;
        bool RW = false;

        //왼팔꿈치가 굽었을 때
        if (elbow_left_angle_Flag)
        {
            LG = true;
        }

        //오른팔꿈치가 굽었을 때
        if (elbow_right_angle_Flag)
        {
            RG = true;
        }

        //왼팔꿈치가 앞으로 나왔을 때
        if (elbowLeft_Z_Flag)
        {
            LE = true;
        }

        //오른팔꿈치가 앞으로 나왔을 때
        if (elbowRight_Z_Flag)
        {
            RE = true;
        }

        //왼손목이 앞으로 나왔을 때
        if (wristLeft_Z_Flag)
        {
            LW = true;
        }

        //오른손목이 앞으로 나왔을 때
        if (wristRight_Z_Flag)
        {
            RW = true;
        }


        if (LE && RE && LW && RW)
        {
            MSGorder = 7;
        }
        else if (RG && LG)
        {
            MSGorder = 3;
        }
        else if (LE && RE)
        {
            MSGorder = 2;
        }
        else if (LW && RW)
        {
            MSGorder = 4;
        }
        else if (RG)
        {
            MSGorder = 14;
        }
        else if (LG)
        {
            MSGorder = 11;
        }
        else if (LE)
        {
            MSGorder = 10;
        }
        else if (RE)
        {
            MSGorder = 13;
        }
        else if (LW)
        {
            MSGorder = 12;
        }
        else if (RW)
        {
            MSGorder = 15;
        }
        else
        {
            MSGorder = 6;
        }


        if (end_Flag)
        {
            if (!DumbelCoordinator.practice_On)
            {
                dumbelCoordi.send2web(score_Count, fail);
                dumbelCoordi.msg2Web("from Unity score_count" + score_Count.ToString() + "/" + "clear_count" + clear_Score.ToString());

                if ((clear_Score - 1) == score_Count)
                {
                    DumbelCoordinator.firewall_position = new Vector3(((DumbelCoordinator.JointInfo["FootLeft"].X + DumbelCoordinator.JointInfo["FootRight"].X) / 2), ((DumbelCoordinator.JointInfo["FootLeft"].Y) * 6));
                    DumbelCoordinator.firewall.transform.position = DumbelCoordinator.firewall_position;
                    DumbelCoordinator.firewall.SetActive(true);
                    MSGorder = 9;

                }
                else if ((clear_Score - 2) == score_Count)
                {
                    MSGorder = 0;
                }
                else if ((clear_Score - 3) == score_Count)
                {
                    MSGorder = 5;
                }
                else if ((clear_Score == score_Count))
                {
                    DumbelCoordinator.firewall.SetActive(false);
                    DumbelCoordinator.particle_position = new Vector3(((DumbelCoordinator.JointInfo["FootLeft"].X + DumbelCoordinator.JointInfo["FootRight"].X) / 2), ((DumbelCoordinator.JointInfo["FootLeft"].Y) * 7));
                    DumbelCoordinator.particle.transform.position = DumbelCoordinator.particle_position;
                    DumbelCoordinator.particle.SetActive(true);
                    DumbelCoordinator.changeAni("greet_03");
                    score_Count = 0;
                    set_Count++;
                    DumbelCoordinator.set_time = DumbelCoordinator.set_timer.Elapsed.ToString().Substring(3, 5);
                    Debug.Log(DumbelCoordinator.set_time);
                    //MSGorder = 6;
                }
            }
        }
        Debug.Log("EndClear");

    }

    public void sound_flag_false()
    {
        elbow_left_angle_Flag = false;
        elbow_right_angle_Flag = false;
        wristLeft_Z_Flag = false;
        wristRight_Z_Flag = false;
        elbowRight_Z_Flag = false;
        elbowLeft_Z_Flag = false;
    }

    #endregion
}
