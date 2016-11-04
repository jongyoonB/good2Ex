using UnityEngine;
using UnityEngine.UI;
using System.Collections.Generic;
using System.Threading;
using System;
using System.Collections;

public class DumbelCheck
{

    #region Member [bool]

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


    //angle
    public bool wristLeftAngle_Check
    {
        get; set;
    }
    public bool wristRightAngle_Check
    {
        get; set;
    }
    public bool elbowLeftAngle_Check
    {
        get; set;
    }
    public bool elbowRightAngle_Check
    {
        get; set;
    }

    //depth
    public bool WristLeftDepthCheck {
        get; set;
    }
    public bool WristRightDepthCheck
    {
        get; set;
    }
    public bool ElbowLeftDepthCheck
    {
        get; set;
    }
    public bool ElbowRightDepthCheck
    {
        get; set;
    }
    public bool[] LeftArmDepth
    {
        get; set;
    }
    public bool[] RightArmDepth
    {
        get; set;
    }

    //muscle{
    public bool[] LeftArmMuscle
    {
        get; set;
    }
    public bool[] RightArmMuscle
    {
        get; set;
    }

    //MessageSwitch
    public int MSGorder = -1;

    public DumbelCoordinator dumbelCoordi = new DumbelCoordinator();
    #endregion

    #region Member [double 각도 저장]

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

    #region Member [short Count]

    public static short clear_Set
    {
        get; set;
    }

    public static short clear_Score
    {
        get; set;
    }

    public short wristLeftAngle_Check_Count
    {
        get; set;
    }
    public short wristRightAngle_Check_Count
    {
        get; set;
    }
    public short elbowLeftAngle_Check_Count
    {
        get; set;
    }
    public short elbowRightAngle_Check_Count
    {
        get; set;
    }

    //Score Count 변수
    public short set_Count;
    public short score_Count;


    //Failed Check
    int[,] fail = new int[4,6];
    int[] judgment = new int[6];
    string failed_message = "";


    //practice_mod
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
        LeftArmDepth = new bool[2];
        RightArmDepth = new bool[2];
        LeftArmMuscle = new bool[2];
        RightArmMuscle = new bool[2];
        LeftArmMuscle[0] = true;
        LeftArmMuscle[1] = true;
        RightArmMuscle[0] = true;
        RightArmMuscle[1] = true;
    }

    public void main()
    {
        AngleContorl();
        checkP_clear();
        if (!ready_Flag)
        {
            readyCheck();
        }
        else if (!start_Flag)
        {
            if (!DumbelCoordinator.count_timer.IsRunning)
            {
                DumbelCoordinator.count_timer.Start();
            }
            startCheck();
        }
        else if (!top_Flag)
        {
            topCheck();
        }
        else if (!end_Flag)
        {
            endCheck();
        }

        if (ready_Flag)
        {
            depth_Check();
        }
        //UnityEngine.Debug.Log("Phase : " + DumbelCoordinator.current_phase);

    }

    #endregion

    #region 메서드 [Exercise Check]

    void readyCheck()
    {
        DumbelCoordinator.current_phase = 1;
        if (armpit_Left_Angle <= 100 && armpit_Left_Angle >= 85)
        {
            //set_textColor("Toggle1", Color.green);
            DumbelCoordinator.armpLeftDegree.GetComponent<Text>().color = Color.black;
            wristLeftAngle_Check = true;
        }
        else
        {
            //set_textColor("Toggle1", Color.red);
            DumbelCoordinator.armpLeftDegree.GetComponent<Text>().color = Color.red;

            wristLeftAngle_Check = false;
        }

        if (armpit_Right_Angle <= 100 && armpit_Right_Angle >= 85)
        {
            //set_textColor("Toggle2", Color.green);
            DumbelCoordinator.armpRightDegree.GetComponent<Text>().color = Color.black;

            wristRightAngle_Check = true;
        }
        else
        {
            //set_textColor("Toggle2", Color.red);
            DumbelCoordinator.armpRightDegree.GetComponent<Text>().color = Color.red;

            wristRightAngle_Check = false;
        }

        if (elbow_Left_Angle >= 80 && elbow_Left_Angle <= 110)
        {
            //set_textColor("Toggle3", Color.green);
            DumbelCoordinator.elbowLeftDegree.GetComponent<Text>().color = Color.black;

            elbowLeftAngle_Check = true;
        }
        else
        {
            //set_textColor("Toggle3", Color.red);
            DumbelCoordinator.elbowLeftDegree.GetComponent<Text>().color = Color.red;
            elbowLeftAngle_Check = false;
        }

        if (elbow_Right_Angle >= 80 && elbow_Right_Angle <= 110)
        {
            //set_textColor("Toggle4", Color.green);
            DumbelCoordinator.elbowRightDegree.GetComponent<Text>().color = Color.black;

            elbowRightAngle_Check = true;
        }
        else
        {
            //set_textColor("Toggle4", Color.red);
            DumbelCoordinator.elbowRightDegree.GetComponent<Text>().color = Color.red;
            elbowRightAngle_Check = false;
        }


        if (wristLeftAngle_Check && wristRightAngle_Check && elbowLeftAngle_Check && wristLeftAngle_Check)
        {
            ready_Flag = true;
            if (score_Count == 0 && set_Count == 0)
            {
                MSGorder = 16;
            }
        }
    }

    void startCheck()
    {
        //DumbelCoordinator.setBallonText("팔을 천천히 들어 주세요");

        DumbelCoordinator.current_phase = 2;

        if (armpit_Left_Angle >= 115 && armpit_Left_Angle <= 125)
        {
            wristLeftAngle_Check = true;
        }
        else
        {
            wristLeftAngle_Check = false;
        }

        if (armpit_Right_Angle >= 115 && armpit_Right_Angle <= 125)
        {
            wristRightAngle_Check = true;
        }
        else
        {
            wristRightAngle_Check = false;

        }

        if (wristLeftAngle_Check && wristRightAngle_Check)
        {
            start_Flag = true;
            //Debug.Log("startClear");
        }

    }

    void topCheck()
    {
        DumbelCoordinator.current_phase = 3;

        if (armpit_Left_Angle >= 135)
        {
            //set_textColor("Toggle1", Color.green);
            DumbelCoordinator.armpLeftDegree.GetComponent<Text>().color = Color.black;
            wristLeftAngle_Check = true;
        }
        else
        {
            //set_textColor("Toggle1", Color.red);
            DumbelCoordinator.armpLeftDegree.GetComponent<Text>().color = Color.red;
            wristLeftAngle_Check = false;
        }

        if (armpit_Right_Angle >= 135)
        {
            //set_textColor("Toggle2", Color.green);
            DumbelCoordinator.armpRightDegree.GetComponent<Text>().color = Color.black;
            wristRightAngle_Check = true;
        }
        else
        {
            //set_textColor("Toggle2", Color.red);
            DumbelCoordinator.armpRightDegree.GetComponent<Text>().color = Color.red;
            wristRightAngle_Check = false;
        }

        if (wristLeftAngle_Check && wristRightAngle_Check)
        {
            if (!(elbow_Left_Angle >= 135))
            {
                ////set_textColor("Toggle3", Color.green);
                elbowLeftAngle_Check = true;
            }
            else
            {
                ////set_textColor("Toggle3", Color.red);
                elbowLeftAngle_Check = false;
            }

            if (!(elbow_Right_Angle >= 135))
            {
                ////set_textColor("Toggle4", Color.green);
                elbowRightAngle_Check = true;
            }
            else
            {
                ////set_textColor("Toggle4", Color.red);
                elbowRightAngle_Check = false;
            }

            top_Flag = true;
            //Debug.Log("topClear");
        }
    }

    void endCheck()
    {
        //DumbelCoordinator.setBallonText("팔을 천천히 내려 주세요");
        DumbelCoordinator.current_phase = 4;

        if (armpit_Left_Angle <= 95)
        {
            DumbelCoordinator.armpLeftDegree.GetComponent<Text>().color = Color.black;
            wristLeftAngle_Check = true;
        }
        else
        {
            DumbelCoordinator.armpLeftDegree.GetComponent<Text>().color = Color.red;
            wristLeftAngle_Check = false;

        }

        if (armpit_Right_Angle <= 95)
        {
            DumbelCoordinator.armpRightDegree.GetComponent<Text>().color = Color.black;
            wristRightAngle_Check = true;
        }
        else
        {
            DumbelCoordinator.armpRightDegree.GetComponent<Text>().color = Color.red;
            wristRightAngle_Check = false;
        }


        if (wristLeftAngle_Check && wristRightAngle_Check)
        {
            judgment_position();

            // 4,5 ->0

            GameObject PointsText;
            int ct = 0;
            UnityEngine.Debug.Log("Arm Check");
            for(int i = 0; i < 2; i++)
            {
                UnityEngine.Debug.Log("LeftArm["+i+"]" + LeftArmDepth[i]);
                UnityEngine.Debug.Log("RightArm[" + i + "]" + RightArmDepth[i]);
                if (!LeftArmDepth[i])
                {
                    ct++;
                }
                if (!RightArmDepth[i])
                {
                    ct++;
                }
            }
            //UnityEngine.Debug.Log("CT = " + ct);
            if (ct == 0)
            {
                if (DumbelCoordinator.practice_On)
                {
                    practice_count++;
                }

                PointsText = UnityEngine.Object.Instantiate(Resources.Load("Prefabs/yosi")) as GameObject;
                //Debug.Log("yosi");
                DumbelCoordinator.changeAni("greet_03");
            }
            else if (ct == 1)
            {
                PointsText = UnityEngine.Object.Instantiate(Resources.Load("Prefabs/soso")) as GameObject;
                DumbelCoordinator.changeAni("pose_00");
            }
            else
            {
                PointsText = UnityEngine.Object.Instantiate(Resources.Load("Prefabs/bad")) as GameObject;
                DumbelCoordinator.changeAni("refuse_01");
                bad_count++;
                //Debug.Log("BAD");
            }

            PointsText.GetComponent<ParticleSystem>().loop = false;
            show_pointText(PointsText);

            end_Flag = true;

            if (DumbelCoordinator.practice_On)
            {
                //Debug.Log(practice_count);
                if (practice_count > 2)
                {
                    practice_count = 0;
                    bad_count = 0;
                    dumbelCoordi.practice_mod(false);
                    dumbelCoordi.ResumeScreen();
                }
            }


            else
            {
                if (score_Count > 2 || set_Count != 0)
                {
                    if (DumbelCoordinator.count_timer.ElapsedMilliseconds + 2000 > DumbelCoordinator.count_time_avg)
                    {
                        //Debug.Log("SLOW!!");
                        DumbelCoordinator.changeAni("nod_01");
                        //MSGorder = 5;
                    }
                    else
                    {
                        DumbelCoordinator.count_time_avg = (DumbelCoordinator.count_time_avg + DumbelCoordinator.count_timer.ElapsedMilliseconds) / score_Count;
                    }

                    //Debug.Log(DumbelCoordinator.count_timer.ElapsedMilliseconds + " / " + DumbelCoordinator.count_time_avg);
                }
                score_Count++;
                //if(status board is deactivate
                if (!DumbelCoordinator.Status.activeInHierarchy)
                {
                    DumbelCoordinator.Status.SetActive(true);
                }
                //set board txt
                clearBoard();
                setBoard();

                //clear MuscleFail
                LeftArmMuscle[0] = true;
                LeftArmMuscle[1] = true;
                RightArmMuscle[0] = true;
                RightArmMuscle[1] = true;
                DumbelCoordinator.count_timer.Reset();

                //if (set_Count == 0 && score_Count == 2)
                //{
                //    //DumbelCoordinator.Status.SetActive(false);
                //    DumbelCoordinator.Status.GetComponent<Image>().material = Resources.Load("blackMaterial") as Material;
                //    DumbelCoordinator.title.transform.parent = GameObject.Find("Canvas").transform;
                //    DumbelCoordinator.Status.GetComponent<RectTransform>().localScale = new Vector3(0.1203983f, 0.118181f, 1f);
                //    DumbelCoordinator.Status.GetComponent<RectTransform>().offsetMin = new Vector2(-462f, -77f);
                //    DumbelCoordinator.Status.GetComponent<RectTransform>().offsetMax = new Vector2(680f, 275f);
                //    DumbelCoordinator.title.transform.parent = DumbelCoordinator.Status.transform;
                //}
            }


            Sound_Controller();
            clearFail();
            ready_Flag = false;
            start_Flag = false;
            top_Flag = false;
            end_Flag = false;

            dumbelCoordi.msg2Web("re:" + ready_Flag + " /st:" + start_Flag + " /tp:" + top_Flag + " /en:" + end_Flag);
            dumbelCoordi.msg2Web("after send" + score_Count);
            //Floating Text
            //GameObject PointsText = UnityEngine.Object.Instantiate(Resources.Load("Prefabs/Kinniku")) as GameObject;
            //PointsText.transform.position = new Vector3(DumbelCoordinator.JointInfo["SpineShoulder"].X, DumbelCoordinator.JointInfo["SpineShoulder"].Y);
            if (!DumbelCoordinator.practice_On && bad_count > 2)
            {
                dumbelCoordi.practice_mod(true);
                dumbelCoordi.SplitScreen();
            }

        }
    }

    #endregion

    void clearBoard()
    {
        for(int i =  0; i < 2; i++)
        {
            for(int j = 0; j < 2; j++)
            {
                set_text(("CheckPoint" + ((i + 1).ToString().TrimStart('0')) + "_" + ((j + 1).ToString().TrimStart('0'))), "");
            }
        }
        
    }

    void setBoard()
    {
        string[ , ] checkPoint = new string[2 , 2];
        int ct = 0;

        for(int i = 0; i < 2; i++)
        {
            //depth
            if (!LeftArmDepth[i] && !RightArmDepth[i])
            {
                checkPoint[i , ct] = "양팔이 어깨와 평행하지 않음";
                ct++;
            }
            else
            {
                if (!LeftArmDepth[i] && RightArmDepth[i])
                {
                    checkPoint[i , ct] = "왼팔과 어깨가 평행하지 않음";
                    ct++;
                }
                else if (LeftArmDepth[i] && !RightArmDepth[i])
                {
                    checkPoint[i , ct] = "오른팔과 어깨가 평행하지 않음";
                    ct++;
                }
            }

            //muscle
            if (!LeftArmMuscle[i] && !RightArmMuscle[i])
            {
                checkPoint[i , ct] = "양쪽 승모근에 힘이 들어감";
                ct++;
            }
            else
            {
                if (!LeftArmMuscle[i] && RightArmMuscle[i])
                {
                    checkPoint[i , ct] = "왼쪽 승모근에 힘이 들어감";
                    ct++;
                }
                else if (LeftArmMuscle[i] && !RightArmMuscle[i])
                {
                    checkPoint[i , ct] = "오른쪽 승모근에 힘이 들어감";
                    ct++;
                }
            }
            ct = 0;
        }
        


        for (int i = 0; i < 2; i++)
        {
            
            for(int j = 0; j < 2; j++)
            {
                Debug.Log(checkPoint[i, j]);
                try
                {
                    set_text(("CheckPoint" + ((i + 1).ToString().TrimStart('0')) + "_" + ((j + 1).ToString().TrimStart('0'))), checkPoint[i, j]);
                }
                catch{  }
            }
        }
    }

    void show_pointText(GameObject PointsText)
    {
        PointsText.transform.position = new Vector3(DumbelCoordinator.JointInfo["Head"].X, DumbelCoordinator.JointInfo["Head"].Y + 2f, 0);
        //Debug.Log(PointsText.name);
        //yield return new WaitForSeconds(1);
        GameObject.Destroy(PointsText, 1);
        //yield return null;
    }

    #region 메서드 [bool값 False]

    void checkP_clear()
    {
        wristLeftAngle_Check = false;
        wristRightAngle_Check = false;
        elbowLeftAngle_Check = false;
        elbowRightAngle_Check = false;
    }
    void record_mistake()
    {
        //UnityEngine.Debug.Log("currnet : " + DumbelCoordinator.current_phase + "     /     " + WristLeftDepthCheck + " / " + WristRightDepthCheck + " / "  + ElbowLeftDepthCheck + " / " + ElbowRightDepthCheck);
        if (!WristLeftDepthCheck)
        {
            fail[DumbelCoordinator.current_phase - 1 , 0] = 1;
        }
        else
        {
            //fail[DumbelCoordinator.current_phase - 1 , 0] = 0;
        }
        if (!WristRightDepthCheck)
        {
            fail[DumbelCoordinator.current_phase - 1 , 1] = 1;
        }
        else
        {
            //fail[DumbelCoordinator.current_phase - 1 , 1] = 0;
        }
        if (!ElbowLeftDepthCheck)
        {
            fail[DumbelCoordinator.current_phase - 1 , 2] = 1;
        }
        else
        {
            //fail[DumbelCoordinator.current_phase - 1 , 2] = 0;
        }
        if (!ElbowRightDepthCheck)
        {
            fail[DumbelCoordinator.current_phase - 1 , 3] = 1;
        }
        else
        {
            //fail[DumbelCoordinator.current_phase - 1 , 3] = 0;
        }
    }

    void judgment_position()
    {
        //for(int i = 0; i < 4; i++)
        //{
        //    for(int j = 0; j < 4; j++)
        //    {
        //        UnityEngine.Debug.Log(fail[i, j]);
        //    }
        //}
        //for(int i = 0; i < 4; i++)
        //{
        //    if (fail[1 , i] + fail[2 , i] + fail[3 , i] != 0)
        //    {
        //        judgment[i] = 1;
        //    }
        //    else
        //    {
        //        judgment[i] = 0;
        //    }
        //}

        //check point Depth Check

        //check point 2~3
        if ((fail[1 , 0] + fail[1 , 2] + fail[2 , 0] + fail[2 , 2]) >= 1)
        {
            LeftArmDepth[0] = false;
            if (DumbelCoordinator.practice_On)
            {
                set_icon(DumbelCoordinator.Mark1_1, "bad");
            }
        }
        else
        {
            LeftArmDepth[0] = true;
            if (DumbelCoordinator.practice_On)
            {
                set_icon(DumbelCoordinator.Mark1_1, "good");
            }
        }
        if ((fail[1 , 1] + fail[1 , 3] + fail[2 , 1] + fail[2 , 3]) >= 1)
        {
            RightArmDepth[0] = false;
            if (DumbelCoordinator.practice_On)
            {
                set_icon(DumbelCoordinator.Mark1_2, "bad");
            }
        }
        else
        {
            RightArmDepth[0] = true;
            if (DumbelCoordinator.practice_On)
            {
                set_icon(DumbelCoordinator.Mark1_2, "good");
            }
        }

        //check point 4
        if ((fail[3 , 0] + fail[3 , 2]) > 1)
        {
            LeftArmDepth[1] = false;
            if (DumbelCoordinator.practice_On)
            {
                set_icon(DumbelCoordinator.Mark2_1, "bad");
            }
        }
        else
        {
            LeftArmDepth[1] = true;
            if (DumbelCoordinator.practice_On)
            {
                set_icon(DumbelCoordinator.Mark2_1, "good");
            }
        }
        if ((fail[3 , 1] + fail[3 , 3]) > 1)
        {
            RightArmDepth[1] = false;
            if (DumbelCoordinator.practice_On)
            {
                set_icon(DumbelCoordinator.Mark2_2, "bad");
            }
        }
        else
        {
            RightArmDepth[1] = true;
            if (DumbelCoordinator.practice_On)
            {
                set_icon(DumbelCoordinator.Mark2_2, "good");
            }
        }


        if (!LeftArmDepth[0] || !LeftArmDepth[1])
        {
            judgment[0] = 1;
        }
        else
        {
            judgment[0] = 0;
        }

        if (!RightArmDepth[0] || !RightArmDepth[1])
        {
            judgment[1] = 1;
        }
        else
        {
            judgment[1] = 0;
        }

        judgment[2] = 0;
        judgment[3] = 0;
        judgment[4] = 0;
        judgment[5] = 0;

    }

    void set_icon(GameObject name, string texture)
    {
        if (!name.activeInHierarchy)
        {
            name.SetActive(true);
            name.GetComponent<RawImage>().CrossFadeAlpha(1000, 2.0f, false);
        }
        try
        {
            name.GetComponent<RawImage>().texture = Resources.Load("IMG/" + texture) as Texture;
        }
        catch { }
    }

    void set_text(string listName, string context)
    {
        if(context.Length == 0 || context == null)
        {
            context = "";
        }
        Debug.Log("set " + listName + " : " + context);
        try
        {
            GameObject.Find(listName).GetComponentInChildren<Text>().text = context;
        }
        catch
        {

        }
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
            ElbowLeftDepthCheck = true;
        }
        else
        {
            ElbowLeftDepthCheck = false;
        }

        if ((DumbelCoordinator.JointInfo["ShoulderRight"].Z - DumbelCoordinator.JointInfo["ElbowRight"].Z) <= 0.08f)
        {
            ElbowRightDepthCheck = true;
        }
        else
        {
            ElbowRightDepthCheck = false;
        }

        if ((DumbelCoordinator.JointInfo["ShoulderLeft"].Z - DumbelCoordinator.JointInfo["WristLeft"].Z) <= 0.15f)
        {
            WristLeftDepthCheck = true;
        }
        else
        {
            WristLeftDepthCheck = false;
        }

        if ((DumbelCoordinator.JointInfo["ShoulderRight"].Z - DumbelCoordinator.JointInfo["WristRight"].Z) <= 0.15f)
        {
            WristRightDepthCheck = true;
        }
        else
        {
            WristRightDepthCheck = false;
        }


        if (!ElbowLeftDepthCheck && !ElbowRightDepthCheck)
        {
            failed_message = "양팔이 너무 앞으로 나왔어요";
        }
        else if (!ElbowLeftDepthCheck && ElbowRightDepthCheck)
        {
            failed_message = "왼팔이 너무 앞으로 나왔어요";
        }
        else if (ElbowLeftDepthCheck && !ElbowRightDepthCheck)
        {
            failed_message = "오른팔이 너무 앞으로 나왔어요";
        }
        else
        {
            failed_message = "";

            if (armpit_Left_Angle > 75 && armpit_Right_Angle > 75)
            {

                if (start_Flag && !top_Flag && (armpit_Left_Angle <= 110 || armpit_Right_Angle <= 110))
                {
                    failed_message = "잠깐!!! 팔을 더 올리셔야죠!!";
                }
            }
        }
        if (failed_message.Length != 0)
        {
            DumbelCoordinator.changeAni("refuse_01");
            DumbelCoordinator.setBallonText(failed_message);
        }
        else
        {
            //DumbelCoordinator.setBallonText("잘 하고 있어요!");
            DumbelCoordinator.setBallonText("");
            DumbelCoordinator.changeAni("nod_01");
        }
        record_mistake();
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
        elbow_Left_Angle = (AngleBetweenTwoVectors(Vector3.Normalize(VEL_VSL), Vector3.Normalize(VEL_VWL)) * (180 / Math.PI));
        elbow_Right_Angle = (AngleBetweenTwoVectors(Vector3.Normalize(VER_VSR), Vector3.Normalize(VER_VWR)) * (180 / Math.PI));
    }

    #endregion

    #region 메서드 [Sound Control]

    public void Sound_Controller()
    {

        if (judgment[0] + judgment[1] == 2)
        {
            MSGorder = 7;
        }
        
        else if (judgment[0] == 1)
        {
            MSGorder = 10;
        }
        else if (judgment[1] == 1)
        {
            MSGorder = 13;
        }

        else if(judgment[0] + judgment[1] + judgment[2] + judgment[3] + judgment[4] + judgment[5] == 0)
        {
            MSGorder = 6;
        }


        if (end_Flag)
        {
            if (!DumbelCoordinator.practice_On)
            {
                dumbelCoordi.send2web(score_Count, judgment);
                dumbelCoordi.msg2Web("from Unity score_count" + score_Count.ToString() + "/" + "clear_count" + clear_Score.ToString());

                if ((clear_Score - 1) == score_Count)
                {
                    dumbelCoordi.firewall();
                    DumbelCoordinator.firewall_position = new Vector3(((DumbelCoordinator.JointInfo["FootLeft"].X + DumbelCoordinator.JointInfo["FootRight"].X) / 2), ((DumbelCoordinator.JointInfo["FootLeft"].Y) * 6));
                    DumbelCoordinator.firewall_obj.transform.position = DumbelCoordinator.firewall_position;
                    DumbelCoordinator.firewall_obj.SetActive(true);
                    MSGorder = 9;

                }
                else if ((clear_Score - 2) == score_Count)
                {
                    MSGorder = 0;
                }
                else if ((clear_Score - 3) == score_Count)
                {
                    //MSGorder = 8;
                }
                else if ((clear_Score == score_Count))
                {
                    GameObject.Destroy(DumbelCoordinator.firewall_obj);
                    DumbelCoordinator.particle_position = new Vector3(((DumbelCoordinator.JointInfo["FootLeft"].X + DumbelCoordinator.JointInfo["FootRight"].X) / 2), ((DumbelCoordinator.JointInfo["FootLeft"].Y) * 7));
                    DumbelCoordinator.particle.transform.position = DumbelCoordinator.particle_position;
                    DumbelCoordinator.particle.SetActive(true);
                    DumbelCoordinator.changeAni("greet_03");
                    score_Count = 0;
                    set_Count++;
                    DumbelCoordinator.set_time = DumbelCoordinator.set_timer.Elapsed.ToString().Substring(3, 5);
                    //Debug.Log(DumbelCoordinator.set_time);
                    //MSGorder = 6;
                }
            }
        }
        //Debug.Log("EndClear");

    }

    void clearFail()
    {
        for (int i = 0; i < 4; i++)
        {
            for (int j = 0; j < 4; j++)
            {
                fail[i, j] = 0;
            }
        }
    }

    #endregion
}
