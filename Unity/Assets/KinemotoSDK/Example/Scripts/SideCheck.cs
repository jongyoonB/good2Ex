using UnityEngine;
using UnityEngine.UI;
using System.Collections.Generic;
using System.Threading;
using System;
using System.Collections;
using UnityEngine.SceneManagement;

public class SideCheck
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

    //angle
    public bool wristLeftAngle_Check


    {
        get; set;
    }
    public bool wristRightAngle_Check

    {
        get; set;
    }

    //depth
    public bool WristLeftDepthCheck
    {
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


    public SideCoordinator sideCoordi = new SideCoordinator();



    #endregion

    #region Member [double 각도값 저장]

    public double armpit_Left_Angle
    {
        get; set;
    }
    public double armpit_Right_Angle
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


    //Score Count 변수
    public short set_Count;
    public short score_Count;


    //Failed Check
    int[,] fail = new int[4, 6];




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



    public SideCheck()
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
            if (!SideCoordinator.count_timer.IsRunning)
            {
                SideCoordinator.count_timer.Start();
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


    }

    #endregion

    #region 메서드 [Exercise Check]

    void readyCheck()
    {
        SideCoordinator.current_phase = 1;

        if (armpit_Left_Angle <= 40 && armpit_Left_Angle >= 25)
        {
            SideCoordinator.armpLeftDegree.GetComponent<Text>().color = Color.black;
            wristLeftAngle_Check = true;
        }
        else
        {
            SideCoordinator.armpLeftDegree.GetComponent<Text>().color = Color.red;
            wristLeftAngle_Check = false;
        }

        if (armpit_Right_Angle <= 40 && armpit_Right_Angle >= 25)
        {
            SideCoordinator.armpRightDegree.GetComponent<Text>().color = Color.black;
            wristRightAngle_Check = true;
        }
        else
        {
            SideCoordinator.armpRightDegree.GetComponent<Text>().color = Color.red;
            wristRightAngle_Check = false;
        }



        if (wristLeftAngle_Check && wristRightAngle_Check)
        {
            ready_Flag = true;
            if (score_Count == 0 && set_Count == 0)
            {
                if (DumbelCoordinator.lang == "kr")
                {
                    MSGorder = 7;
                }
                else if (DumbelCoordinator.lang == "jp")
                {
                    MSGorder = 15;
                }
            }
            Debug.Log("readyClear");
        }
    }

    void startCheck()
    {
        SideCoordinator.current_phase = 2;

        if (armpit_Left_Angle >= 55)
        {
            wristLeftAngle_Check = true;
        }
        else
        {
            wristLeftAngle_Check = false;
        }

        if (armpit_Right_Angle >= 55)
        {
            wristRightAngle_Check = true;
        }
        else
        {
            wristRightAngle_Check = false;
        }

        //Debug.Log(wristLeftAngle_Check + " / " + wristRightAngle_Check);
        if (wristLeftAngle_Check && wristRightAngle_Check)
        {
            start_Flag = true;
            Debug.Log("startClear");
        }
    }

    void topCheck()
    {
        SideCoordinator.current_phase = 3;

        if (armpit_Left_Angle >= 80 && armpit_Left_Angle <= 100)
        {
            //set_textColor("Toggle2", Color.green);
            SideCoordinator.armpLeftDegree.GetComponent<Text>().color = Color.black;
            wristLeftAngle_Check = true;
        }
        else
        {
            SideCoordinator.armpLeftDegree.GetComponent<Text>().color = Color.red;
            wristLeftAngle_Check = false;
        }


        if (armpit_Right_Angle >= 80 && armpit_Right_Angle <= 100)
        {
            SideCoordinator.armpRightDegree.GetComponent<Text>().color = Color.black;
            wristRightAngle_Check = true;
        }
        else
        {
            SideCoordinator.armpRightDegree.GetComponent<Text>().color = Color.red;
            wristRightAngle_Check = false;
        }


        if (wristLeftAngle_Check && wristRightAngle_Check)
        {
            top_Flag = true;
            Debug.Log("topClear");
        }

    }

    void endCheck()
    {

        SideCoordinator.current_phase = 4;

        if (armpit_Left_Angle <= 40)
        {
            SideCoordinator.armpLeftDegree.GetComponent<Text>().color = Color.black;
            wristLeftAngle_Check = true;
        }
        else
        {
            SideCoordinator.armpLeftDegree.GetComponent<Text>().color = Color.red;
            wristLeftAngle_Check = false;
        }
        if (armpit_Right_Angle <= 40)
        {
            SideCoordinator.armpRightDegree.GetComponent<Text>().color = Color.black;
            wristRightAngle_Check = true;
        }
        else
        {
            SideCoordinator.armpRightDegree.GetComponent<Text>().color = Color.red;
            wristRightAngle_Check = false;
        }



        if (wristLeftAngle_Check && wristRightAngle_Check)
        {
            judgment_position();

            GameObject PointsText;
            int ct = 0;
            UnityEngine.Debug.Log("Arm Check");
            for (int i = 0; i < 2; i++)

            {
                UnityEngine.Debug.Log("LeftArm[" + i + "]" + LeftArmDepth[i]);
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
                if (SideCoordinator.practice_On)

                {
                    practice_count++;
                }

                PointsText = UnityEngine.Object.Instantiate(Resources.Load("Prefabs/yosi")) as GameObject;
                //Debug.Log("yosi");
                SideCoordinator.changeAni("greet_03");
            }
            else if (ct == 1)
            {
                PointsText = UnityEngine.Object.Instantiate(Resources.Load("Prefabs/soso")) as GameObject;
                SideCoordinator.changeAni("pose_00");
            }
            else

            {
                PointsText = UnityEngine.Object.Instantiate(Resources.Load("Prefabs/bad")) as GameObject;
                SideCoordinator.changeAni("refuse_01");
                bad_count++;
                //Debug.Log("BAD");
            }

            PointsText.GetComponent<ParticleSystem>().loop = false;
            show_pointText(PointsText);

            end_Flag = true;

            if (SideCoordinator.practice_On)
            {
                //Debug.Log(practice_count);
                if (practice_count > 1)
                {
                    practice_count = 0;
                    bad_count = 0;
                    sideCoordi.ResumeScreen();
                }
            }


            else
            {
                if (score_Count > 2 || set_Count != 0)
                {
                    if (SideCoordinator.count_timer.ElapsedMilliseconds + 2000 > SideCoordinator.count_time_avg)
                    {
                        //Debug.Log("SLOW!!");
                        SideCoordinator.changeAni("nod_01");
                        //MSGorder = 5;
                    }
                    else
                    {
                        SideCoordinator.count_time_avg = (SideCoordinator.count_time_avg + SideCoordinator.count_timer.ElapsedMilliseconds) / score_Count;
                    }

                    //Debug.Log(SideCoordinator.count_timer.ElapsedMilliseconds + " / " + SideCoordinator.count_time_avg);
                }
                score_Count++;
                //if(status board is deactivate
                if (!SideCoordinator.Status.activeInHierarchy)
                {
                    SideCoordinator.Status.SetActive(true);
                }
                //set board txt
                clearBoard();
                setBoard();

                //clear MuscleFail
                LeftArmMuscle[0] = true;
                LeftArmMuscle[1] = true;
                RightArmMuscle[0] = true;
                RightArmMuscle[1] = true;

                SideCoordinator.count_timer.Reset();

            }


            Sound_Controller();
            clearFail();

            ready_Flag = false;
            start_Flag = false;
            top_Flag = false;
            end_Flag = false;



            sideCoordi.msg2Web("re:" + ready_Flag + " /st:" + start_Flag + " /tp:" + top_Flag + " /en:" + end_Flag);
            sideCoordi.msg2Web("after send" + score_Count);
            //Floating Text
            //GameObject PointsText = UnityEngine.Object.Instantiate(Resources.Load("Prefabs/Kinniku")) as GameObject;
            //PointsText.transform.position = new Vector3(SideCoordinator.JointInfo["SpineShoulder"].X, SideCoordinator.JointInfo["SpineShoulder"].Y);

            if (!SideCoordinator.practice_On && bad_count > 2)
            {
                sideCoordi.SplitScreen();
            }



        }
    }

    #endregion

    void clearBoard()
    {
        for (int i = 0; i < 2; i++)
        {
            for (int j = 0; j < 2; j++)
            {
                set_text(("CheckPoint" + ((i + 1).ToString().TrimStart('0')) + "_" + ((j + 1).ToString().TrimStart('0'))), "");
            }
        }

    }

    void setBoard()
    {
        string[,] checkPoint = new string[2, 2];
        int ct = 0;

        for (int i = 0; i < 2; i++)
        {
            //depth
            if (!LeftArmDepth[i] && !RightArmDepth[i])
            {
                if (SideCoordinator.lang == "kr")
                {
                    checkPoint[i, ct] = "양팔이 어깨와 평행하지 않음";
                }
                else
                {
                    checkPoint[i, ct] = "両腕が肩と平行しないです";
                }

                ct++;
            }
            else
            {
                if (!LeftArmDepth[i] && RightArmDepth[i])
                {
                    if (SideCoordinator.lang == "kr")
                    {
                        checkPoint[i, ct] = "왼팔과 어깨가 평행하지 않음";
                    }
                    else
                    {
                        checkPoint[i, ct] = "左腕が肩と平行しないです";
                    }
                    ct++;
                }
                else if (LeftArmDepth[i] && !RightArmDepth[i])
                {
                    if (SideCoordinator.lang == "kr")
                    {
                        checkPoint[i, ct] = "오른팔과 어깨가 평행하지 않음";
                    }
                    else
                    {
                        checkPoint[i, ct] = "右腕が肩と平行しないです";
                    }
                    ct++;
                }
            }
                        
            if (!LeftArmMuscle[i] && !RightArmMuscle[i])
            {
                //checkPoint[i, ct] = "양쪽 승모근에 힘이 들어감";
                //ct++;
            }
            else
            {
                if (!LeftArmMuscle[i] && RightArmMuscle[i])
                {
                    //checkPoint[i, ct] = "왼쪽 승모근에 힘이 들어감";
                    //ct++;
                }
                else if (LeftArmMuscle[i] && !RightArmMuscle[i])
                {
                    //checkPoint[i, ct] = "오른쪽 승모근에 힘이 들어감";
                    //ct++;
                }
            }
            ct = 0;
        }



        for (int i = 0; i < 2; i++)
        {

            for (int j = 0; j < 2; j++)
            {
                Debug.Log(checkPoint[i, j]);
                try
                {
                    set_text(("CheckPoint" + ((i + 1).ToString().TrimStart('0')) + "_" + ((j + 1).ToString().TrimStart('0'))), checkPoint[i, j]);
                }
                catch { }
            }
        }
    }

    void show_pointText(GameObject PointsText)
    {

        PointsText.transform.position = new Vector3(SideCoordinator.JointInfo["Head"].X, SideCoordinator.JointInfo["Head"].Y + 2f, 0);
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
    }
    void record_mistake()
    {
        //UnityEngine.Debug.Log("currnet : " + SideCoordinator.current_phase + "     /     " + WristLeftDepthCheck + " / " + WristRightDepthCheck + " / "  + ElbowLeftDepthCheck + " / " + ElbowRightDepthCheck);
        if (!WristLeftDepthCheck)
        {
            fail[SideCoordinator.current_phase - 1, 0] = 1;
        }
        else
        {
            //fail[SideCoordinator.current_phase - 1 , 0] = 0;
        }
        if (!WristRightDepthCheck)
        {
            fail[SideCoordinator.current_phase - 1, 1] = 1;
        }
        else
        {
            //fail[SideCoordinator.current_phase - 1 , 1] = 0;
        }
        if (!ElbowLeftDepthCheck)
        {
            fail[SideCoordinator.current_phase - 1, 2] = 1;
        }
        else
        {
            //fail[SideCoordinator.current_phase - 1 , 2] = 0;
        }
        if (!ElbowRightDepthCheck)
        {
            fail[SideCoordinator.current_phase - 1, 3] = 1;
        }
        else
        {
            //fail[SideCoordinator.current_phase - 1 , 3] = 0;
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
        if ((fail[1, 0] + fail[1, 2] + fail[2, 0] + fail[2, 2]) >= 1)
        {
            LeftArmDepth[0] = false;
            if (SideCoordinator.practice_On)
            {
                set_icon(SideCoordinator.Mark1_1, "bad");
            }
        }
        else
        {
            LeftArmDepth[0] = true;
            if (SideCoordinator.practice_On)
            {
                set_icon(SideCoordinator.Mark1_1, "good");
            }
        }
        if ((fail[1, 1] + fail[1, 3] + fail[2, 1] + fail[2, 3]) >= 1)
        {
            RightArmDepth[0] = false;
            if (SideCoordinator.practice_On)
            {
                set_icon(SideCoordinator.Mark1_2, "bad");
            }
        }
        else
        {
            RightArmDepth[0] = true;
            if (SideCoordinator.practice_On)
            {
                set_icon(SideCoordinator.Mark1_2, "good");
            }
        }

        //check point 4
        if ((fail[3, 0] + fail[3, 2]) > 1)
        {
            LeftArmDepth[1] = false;
            if (SideCoordinator.practice_On)
            {
                set_icon(SideCoordinator.Mark2_1, "bad");
            }
        }
        else
        {
            LeftArmDepth[1] = true;
            if (SideCoordinator.practice_On)
            {
                set_icon(SideCoordinator.Mark2_1, "good");
            }
        }
        if ((fail[3, 1] + fail[3, 3]) > 1)
        {
            RightArmDepth[1] = false;
            if (SideCoordinator.practice_On)
            {
                set_icon(SideCoordinator.Mark2_2, "bad");
            }
        }
        else
        {
            RightArmDepth[1] = true;
            if (SideCoordinator.practice_On)
            {
                set_icon(SideCoordinator.Mark2_2, "good");
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
        if (context.Length == 0 || context == null)
        {
            context = "";
        }
        Debug.Log("set " + listName + " : " + context);
        try
        {
            if (SideCoordinator.lang == "jp")
            {
                SideCoordinator.setFont(GameObject.Find(listName), SideCoordinator.bokutachi);
            }
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
        if ((SideCoordinator.JointInfo["ShoulderLeft"].Z - SideCoordinator.JointInfo["ElbowLeft"].Z) <= 0.14f)
        {
            ElbowLeftDepthCheck = true;
        }
        else
        {
            ElbowLeftDepthCheck = false;
        }

        if ((SideCoordinator.JointInfo["ShoulderRight"].Z - SideCoordinator.JointInfo["ElbowRight"].Z) <= 0.14f)
        {
            ElbowRightDepthCheck = true;
        }
        else
        {
            ElbowRightDepthCheck = false;
        }

        if ((SideCoordinator.JointInfo["ShoulderLeft"].Z - SideCoordinator.JointInfo["WristLeft"].Z) <= 0.2f)
        {
            WristLeftDepthCheck = true;
        }
        else
        {
            WristLeftDepthCheck = false;
        }

        if ((SideCoordinator.JointInfo["ShoulderRight"].Z - SideCoordinator.JointInfo["WristRight"].Z) <= 0.2f)
        {
            WristRightDepthCheck = true;
        }
        else
        {
            WristRightDepthCheck = false;
        }


        if (!ElbowLeftDepthCheck && !ElbowRightDepthCheck)
        {
            if (SideCoordinator.lang == "kr")
            {
                failed_message = "양팔이 너무 앞으로 나왔어요";
            }
            else
            {
                failed_message = "両腕が前に出ました";
            }
        }
        else if (!ElbowLeftDepthCheck && ElbowRightDepthCheck)
        {
            if (SideCoordinator.lang == "kr")
            {
                failed_message = "왼팔이 너무 앞으로 나왔어요";
            }
            else
            {
                failed_message = "左腕が前に出ました";
            }
        }
        else if (ElbowLeftDepthCheck && !ElbowRightDepthCheck)
        {
            if (SideCoordinator.lang == "kr")
            {
                failed_message = "오른팔이 너무 앞으로 나왔어요";
            }
            else
            {
                failed_message = "右腕が前に出ました";
            }
        }

        else
        {
            failed_message = "";

            if (armpit_Left_Angle < 55 && armpit_Right_Angle < 55)
            {

                if (start_Flag && !top_Flag && (armpit_Left_Angle <= 100 || armpit_Right_Angle <= 100))
                {
                    if (SideCoordinator.lang == "kr")
                    {
                        failed_message = "잠깐!!! 팔을 더 올리셔야죠!!";
                    }
                    else
                    {
                        failed_message = "腕をもっと上げてください";
                    }
                }
            }
            
        }


        if (failed_message.Length != 0)
        {
            SideCoordinator.changeAni("refuse_01");
            SideCoordinator.setBallonText(failed_message);
        }
        else
        {
            //SideCoordinator.setBallonText("잘 하고 있어요!");
            SideCoordinator.setBallonText("");
            SideCoordinator.changeAni("nod_01");

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
        VEL = new Vector3(SideCoordinator.JointInfo["ElbowLeft"].X, SideCoordinator.JointInfo["ElbowLeft"].Y, SideCoordinator.JointInfo["ElbowLeft"].Z);
        VER = new Vector3(SideCoordinator.JointInfo["ElbowRight"].X, SideCoordinator.JointInfo["ElbowRight"].Y, SideCoordinator.JointInfo["ElbowRight"].Z);
        VSM = new Vector3(SideCoordinator.JointInfo["SpineMid"].X, SideCoordinator.JointInfo["SpineMid"].Y, SideCoordinator.JointInfo["SpineMid"].Z);
        VSS = new Vector3(SideCoordinator.JointInfo["SpineShoulder"].X, SideCoordinator.JointInfo["SpineShoulder"].Y, SideCoordinator.JointInfo["SpineShoulder"].Z);
        VSL = new Vector3(SideCoordinator.JointInfo["ShoulderLeft"].X, SideCoordinator.JointInfo["ShoulderLeft"].Y, SideCoordinator.JointInfo["ShoulderLeft"].Z);
        VSR = new Vector3(SideCoordinator.JointInfo["ShoulderRight"].X, SideCoordinator.JointInfo["ShoulderRight"].Y, SideCoordinator.JointInfo["ShoulderRight"].Z);
        VWL = new Vector3(SideCoordinator.JointInfo["WristLeft"].X, SideCoordinator.JointInfo["WristLeft"].Y, SideCoordinator.JointInfo["WristLeft"].Z);
        VWR = new Vector3(SideCoordinator.JointInfo["WristRight"].X, SideCoordinator.JointInfo["WristRight"].Y, SideCoordinator.JointInfo["WristRight"].Z);

        VSS_VSM = VSS - VSM;
        VSS_VEL = VSS - VEL;
        VSS_VER = VSS - VER;
        VER_VSR = VER - VSR;
        VER_VWR = VER - VWR;
        VEL_VSL = VEL - VSL;
        VEL_VWL = VEL - VWL;


        armpit_Left_Angle = (AngleBetweenTwoVectors(Vector3.Normalize(VSS_VSM), Vector3.Normalize(VSS_VEL)) * (180 / Math.PI));
        armpit_Right_Angle = (AngleBetweenTwoVectors(Vector3.Normalize(VSS_VSM), Vector3.Normalize(VSS_VER)) * (180 / Math.PI));
    }

    #endregion

    #region 메서드 [Sound Control]

    public void Sound_Controller()
    {
        if (judgment[0] + judgment[1] == 2)
        {
            if (DumbelCoordinator.lang == "kr")
            {
                MSGorder = 3;
            }
            else if (DumbelCoordinator.lang == "jp")
            {
                MSGorder = 11;
            }
        }

        else if (judgment[0] == 1)
        {
            if (DumbelCoordinator.lang == "kr")
            {
                MSGorder = 5;
            }
            else if (DumbelCoordinator.lang == "jp")
            {
                MSGorder = 13;
            }
        }
        else if (judgment[1] == 1)
        {
            if (DumbelCoordinator.lang == "kr")
            {
                MSGorder = 6;
            }
            else if (DumbelCoordinator.lang == "jp")
            {
                MSGorder = 14;
            }
        }

        else if (judgment[0] + judgment[1] + judgment[2] + judgment[3] + judgment[4] + judgment[5] == 0)
        {
            if (DumbelCoordinator.lang == "kr")
            {
                MSGorder = 2;
            }
            else if (DumbelCoordinator.lang == "jp")
            {
                MSGorder = 10;
            }
        }


        if (end_Flag)
        {
            if (!SideCoordinator.practice_On)
            {
                sideCoordi.send2web(score_Count, judgment);
                sideCoordi.msg2Web("from Unity score_count" + score_Count.ToString() + "/" + "clear_count" + clear_Score.ToString());

                if ((clear_Score - 1) == score_Count)
                {
                    sideCoordi.firewall();

                    SideCoordinator.firewall_position = new Vector3(((SideCoordinator.JointInfo["FootLeft"].X + SideCoordinator.JointInfo["FootRight"].X) / 2), ((SideCoordinator.JointInfo["FootLeft"].Y) * 6));
                    SideCoordinator.firewall_obj.transform.position = SideCoordinator.firewall_position;
                    SideCoordinator.firewall_obj.SetActive(true);
                    if (DumbelCoordinator.lang == "kr")
                    {
                        MSGorder = 4;
                    }
                    else if (DumbelCoordinator.lang == "jp")
                    {
                        MSGorder = 12;
                    }

                }
                else if ((clear_Score - 2) == score_Count)
                {
                    if (DumbelCoordinator.lang == "kr")
                    {
                        MSGorder = 0;
                    }
                    else if (DumbelCoordinator.lang == "jp")
                    {
                        MSGorder = 8;
                    }

                }
                else if ((clear_Score - 3) == score_Count)
                {
                    //MSGorder = 8;
                }
                else if ((clear_Score == score_Count))
                {
                    GameObject.Destroy(SideCoordinator.firewall_obj);
                    SideCoordinator.particle_position = new Vector3(((SideCoordinator.JointInfo["FootLeft"].X + SideCoordinator.JointInfo["FootRight"].X) / 2), ((SideCoordinator.JointInfo["FootLeft"].Y) * 7));
                    SideCoordinator.particle.transform.position = SideCoordinator.particle_position;
                    SideCoordinator.particle.SetActive(true);
                    SideCoordinator.changeAni("greet_03");

                    score_Count = 0;
                    set_Count++;
                    SideCoordinator.set_time = SideCoordinator.set_timer.Elapsed.ToString().Substring(3, 5);
                    //Debug.Log(SideCoordinator.set_time);


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
