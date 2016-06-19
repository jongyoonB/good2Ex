using UnityEngine;
using UnityEngine.UI;
using System.Collections.Generic;
using System.Threading;
using System;

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

    // Y
    public bool elbowLeft_Y
    {
        get; set;
    }
    public bool elbowRight_Y
    {
        get; set;
    }
    public bool wristLeft_Y
    {
        get; set;
    }
    public bool wristRight_Y
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

    //MessageSwitch
    public int MSGorder = -1;

    public SideCoordinator sideCoordi = new SideCoordinator();



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
    //2016- 06-18 새로 추가
    public bool elbowRight_Z_Flag;
    public bool elbowLeft_Z_Flag;
    public bool wristRight_Z_Flag;
    public bool wristLeft_Z_Flag;
    public bool elbow_right_angle_Flag;
    public bool elbow_left_angle_Flag;

    //Score Count 변수
    public short set_Count;
    public short score_Count;


    //Fail Check Friends
    bool WristLeftDepthFail;
    bool WristRightDepthFail;
    bool ElbowLeftDepthFail;
    bool ElbowRightDepthFail;
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


    public SideCheck()
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
            SideCoordinator.setBallonText("");
            if (SideCoordinator.phase.GetComponentInChildren<Text>().text != "Phase1")
            {
                SideCoordinator.phase.GetComponentInChildren<Text>().text = "Phase1";
                if (set_Count == 0 && score_Count < 2)
                {
                    set_text("Toggle1", "차렷자세");
                    //set_text("Toggle2", "");
                    //set_text("Toggle3", "");
                    //set_text("Toggle4", "");
                    SideCoordinator.Toggle2.SetActive(false);
                    if(score_Count==0 && set_Count == 0)
                    {
                        SideCoordinator.Toggle3.SetActive(false);
                        SideCoordinator.Toggle4.SetActive(false);
                    }
                    //SideCoordinator.Toggle3.SetActive(false);
                    //SideCoordinator.Toggle4.SetActive(false);
                }
            }
            readyCheck();
        }
        else if (!start_Flag)
        {
            if (!SideCoordinator.count_timer.IsRunning)
            {
                SideCoordinator.count_timer.Start();
            }
            
            if (SideCoordinator.phase.GetComponentInChildren<Text>().text != "Phase2")
            {
                SideCoordinator.phase.GetComponentInChildren<Text>().text = "Phase2";
                if (set_Count == 0 && score_Count < 2)
                {
                    SideCoordinator.changeAni("idle_10");
                    SideCoordinator.Toggle2.SetActive(true);
                    SideCoordinator.Toggle3.SetActive(true);
                    SideCoordinator.Toggle4.SetActive(true);
                    set_text("Toggle1", "팔을 천천히 올리기");
                    set_text("Toggle2", "왼팔과 어깨가 평행하게");
                    set_text("Toggle3", "오른팔과 어깨가 평행하게");
                    set_text("Toggle4", "팔이 어깨 앞으로 나가지 않기");
                }
            }
            startCheck();
        }
        else if (!top_Flag)
        {
            if (SideCoordinator.phase.GetComponentInChildren<Text>().text != "Phase3")
            {
                SideCoordinator.phase.GetComponentInChildren<Text>().text = "Phase3";
                if (set_Count == 0 && score_Count < 2)
                {
                    set_text("Toggle1", "팔을 천천히 올리기");
                    set_text("Toggle2", "왼팔과 어깨가 평행하게");
                    set_text("Toggle3", "오른팔과 어깨가 평행하게");
                    set_text("Toggle4", "양팔이 어깨와 나란히");
                }
            }
            topCheck();
        }
        else if (!end_Flag)
        {
            if (SideCoordinator.phase.GetComponentInChildren<Text>().text != "Phase4")
            {
                SideCoordinator.phase.GetComponentInChildren<Text>().text = "Phase4";
                if (set_Count == 0 && score_Count < 2)
                {
                    SideCoordinator.Toggle3.SetActive(false);
                    SideCoordinator.Toggle4.SetActive(false);
                    set_text("Toggle1", "팔을 천천히 내리리기");
                    set_text("Toggle2", "양팔이 어깨 보다 앞으로 나가지 않기");
                    //set_text("Toggle3", "");
                    //set_text("Toggle4", "");
                }
            }
            endCheck();
        }

        if (start_Flag)
        {
            depth_Check();
        }

    }

    #endregion

    #region 메서드 [Exercise Check]

    void readyCheck()
    {

        SideCoordinator.setBallonText("팔을 천천히 들어 주세요");

        y_False();

        if (armpit_Left_Angle <= 40 && armpit_Left_Angle >= 25)
        {
            wristLeft_Y = true;
        }
        else
        {
            wristLeft_Y = false;
        }

        if (armpit_Right_Angle <= 40 && armpit_Right_Angle >= 25)
        {
            wristRight_Y = true;
        }
        else
        {
            wristRight_Y = false;
        }

        if (wristLeft_Y && wristRight_Y)
        {
            ready_Flag = true;
            if (score_Count == 0)
            {
                MSGorder = 16;
            }
            Debug.Log("readyClear");
        }
    }

    void startCheck()
    {
        y_False();

        if (armpit_Left_Angle >= 55)
        {
            wristLeft_Y = true;
        }

        if (armpit_Right_Angle >= 55)
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

        if (armpit_Left_Angle >= 80 && armpit_Left_Angle <= 100)
        {
            //set_textColor("Toggle2", Color.green);
            //SideCoordinator.armpLeftDegree.GetComponent<Text>().color = Color.black;

            wristLeft_Y = true;
        }

        if (armpit_Right_Angle >= 80 && armpit_Right_Angle <= 100)
        {
            //set_textColor("Toggle3", Color.green);
            //SideCoordinator.armpRightDegree.GetComponent<Text>().color = Color.black;

            wristRight_Y = true;
        }


        if (wristLeft_Y && wristRight_Y)
        {
            top_Flag = true;
            Sound_Controller();
            sound_flag_false();
            Debug.Log("topClear");
        }
    }

    void endCheck()
    {

        y_False();

        if (armpit_Left_Angle <= 40)
        {
            wristLeft_Y = true;
        }
        if (armpit_Right_Angle <= 40)
        {
            wristRight_Y = true;
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

            if (elbowLeft_Y)
            {
                fail[4] = 1;
            }
            else
            {
                fail[4] = 0;
            }

            if (elbowRight_Y)
            {
                fail[5] = 1;
            }
            else
            {
                fail[5] = 0;
            }
            GameObject PointsText;
            if (fail[0] + fail[1] + fail[2] + fail[3] + fail[4] + fail[5] >= 2)
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
                    GameObject.Find("strike" + (i + 1).ToString()).GetComponent<RawImage>().CrossFadeAlpha(0, 0, false);
                }
                else
                {
                    GameObject.Find("strike" + (i + 1).ToString()).GetComponent<RawImage>().CrossFadeAlpha(1, 1.5f, false);
                }
            }
            PointsText.GetComponent<ParticleSystem>().loop = false;
            show_pointText(PointsText);

            if (!SideCoordinator.practice_On && bad_count > 2)
            {
                sideCoordi.SplitScreen();
            }

            end_Flag = true;
            if (SideCoordinator.practice_On)
            {
                if (practice_count > 2)
                {
                    practice_count = 0;
                    bad_count = 0;
                    y_Count_False();
                    z_Count_False();
                    sideCoordi.ResumeScreen();
                }
            }

            else
            {
                if (score_Count > 2 || set_Count != 0)
                {
                    if (SideCoordinator.count_timer.ElapsedMilliseconds + 2000 > SideCoordinator.count_time_avg)
                    {
                        Debug.Log("SLOW!!");
                        MSGorder = 17;
                    }
                    else
                    {
                        SideCoordinator.count_time_avg = (SideCoordinator.count_time_avg + SideCoordinator.count_timer.ElapsedMilliseconds) / score_Count;
                    }

                    Debug.Log(SideCoordinator.count_timer.ElapsedMilliseconds + " / " + SideCoordinator.count_time_avg);
                }
                score_Count++;
                SideCoordinator.count_timer.Reset();

                if (set_Count == 0 && score_Count == 2)
                {
                    //SideCoordinator.Status.SetActive(false);
                    SideCoordinator.Status.GetComponent<Image>().material = Resources.Load("blackMaterial") as Material;
                    SideCoordinator.Toggle1.SetActive(false);
                    SideCoordinator.Toggle2.SetActive(false);
                    SideCoordinator.Toggle3.SetActive(false);
                    SideCoordinator.Toggle4.SetActive(false);

                    SideCoordinator.phase.transform.parent = GameObject.Find("Canvas").transform;
                    SideCoordinator.Status.GetComponent<RectTransform>().localScale = new Vector3(0.1203983f, 0.118181f, 1f);
                    SideCoordinator.Status.GetComponent<RectTransform>().offsetMin = new Vector2(-462f, -77f);
                    SideCoordinator.Status.GetComponent<RectTransform>().offsetMax = new Vector2(680f, 275f);
                    SideCoordinator.phase.transform.parent = SideCoordinator.Status.transform;
                }
            }
            Sound_Controller();
            sound_flag_false();
            ready_Flag = false;
            start_Flag = false;
            top_Flag = false;
            end_Flag = false;
            
            //Application.ExternalCall("cut_view", score_Count, clear_Score);

            //Floating Text
            

            //Debug.Log("EndClear");
        }
    }

    #endregion

    void show_pointText(GameObject PointsText)
    {

        PointsText.transform.position = new Vector3(SideCoordinator.JointInfo["Head"].X, SideCoordinator.JointInfo["Head"].Y + 2f, 0);
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

    }

    void set_text(string listName, string context)
    {
        GameObject.Find(listName).GetComponentInChildren<Text>().text = context;
    }

    void set_textColor(string listName, Color color)
    {
        GameObject.Find(listName).GetComponent<TextMesh>().color = color;
    }

    #endregion

    #region 메서드 [Depth Check]

    public void depth_Check()
    {
        if ((SideCoordinator.JointInfo["ShoulderLeft"].Z - SideCoordinator.JointInfo["ElbowLeft"].Z) <= 0.2f)
        {
            elbowLeft_Z = true;
        }
        else
        {
            elbowLeft_Z = false;
            elbowLeft_Z_Flag = true;
            elbowLeft_Z_Count++;
            failed_message = "왼쪽 팔꿈치가 너무 앞으로 나왔어요";
            if (ElbowLeftDepthFail == false)
            {
                ElbowLeftDepthFail = true;
            }
        }

        if ((SideCoordinator.JointInfo["ShoulderRight"].Z - SideCoordinator.JointInfo["ElbowRight"].Z) <= 0.2f)
        {
            elbowRight_Z = true;
        }
        else
        {
            elbowRight_Z = false;
            elbowRight_Z_Flag = true;
            elbowRight_Z_Count++;
            failed_message = "오른쪽 팔꿈치가 너무 앞으로 나왔어요";
            if (ElbowRightDepthFail == false)
            {
                ElbowRightDepthFail = true;
            }
        }

        if ((SideCoordinator.JointInfo["ElbowLeft"].Z - SideCoordinator.JointInfo["WristLeft"].Z) <= 0.2f)
        {
            wristLeft_Z = true;
        }
        else
        {
            wristLeft_Z = false;
            wristLeft_Z_Flag = true;
            wristLeft_Z_Count++;
            failed_message = "왼쪽 손목이 너무 앞으로 나왔어요";
            if (WristLeftDepthFail == false)
            {
                WristLeftDepthFail = true;
            }
        }

        if ((SideCoordinator.JointInfo["ElbowRight"].Z - SideCoordinator.JointInfo["WristRight"].Z) <= 0.2f)
        {
            wristRight_Z = true;
        }
        else
        {
            wristRight_Z = false;
            wristRight_Z_Flag = true;
            wristRight_Z_Count++;
            failed_message = "오른쪽 손목이 너무 앞으로 나왔어요";
            if (WristRightDepthFail == false)
            {
                WristRightDepthFail = true;
            }
        }

        if (elbowLeft_Z && elbowRight_Z && wristLeft_Z && wristRight_Z)
        {
            if (!(elbow_Left_Angle >= 140) && !(elbow_Right_Angle >= 140))
            {
                failed_message = "양팔이 굽혀졌내요";
                elbow_right_angle_Flag = true;
                elbow_left_angle_Flag = true;
            }
            else if (!(elbow_Left_Angle >= 140))
            {
                failed_message = "왼팔이 굽혀졌내요";
                elbow_left_angle_Flag = true;
            }
            else if (!(elbow_Right_Angle >= 140))
            {
                failed_message = "오른팔이 굽혀졌내요";
                elbow_right_angle_Flag = true;
            }
            else if (start_Flag && !top_Flag && (armpit_Left_Angle < 54 || armpit_Right_Angle < 54))
            {
                failed_message = "잠깐!! 덜올라가고 내려오시면 안돼요.";
            }
            else if (SideCoordinator.phase.GetComponentInChildren<Text>().text != "Phase4")
            {
                SideCoordinator.setBallonText("잘 하고 있어요!");
                failed_message = "";
                SideCoordinator.changeAni("nod_01");

            }
        }

        if (failed_message.Length > 1)
        {
            SideCoordinator.changeAni("refuse_01");
            SideCoordinator.setBallonText(failed_message);
        }

        if (!(elbow_Left_Angle >= 140))
        {
            elbowLeft_Y_Count++;
        }
        if (!(elbow_Right_Angle >= 140))
        {
            elbowRight_Y_Count++;
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
            if (!SideCoordinator.practice_On)
            {
                sideCoordi.send2web(score_Count, fail);

                if ((clear_Score - 1) == score_Count)
                {
                    SideCoordinator.firewall_position = new Vector3(((SideCoordinator.JointInfo["FootLeft"].X + SideCoordinator.JointInfo["FootRight"].X) / 2), ((SideCoordinator.JointInfo["FootLeft"].Y) * 6));
                    SideCoordinator.firewall.transform.position = SideCoordinator.firewall_position;
                    SideCoordinator.firewall.SetActive(true);
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
                    SideCoordinator.firewall.SetActive(false);
                    SideCoordinator.particle_position = new Vector3(((SideCoordinator.JointInfo["FootLeft"].X + SideCoordinator.JointInfo["FootRight"].X) / 2), ((SideCoordinator.JointInfo["FootLeft"].Y) * 7));
                    SideCoordinator.particle.transform.position = SideCoordinator.particle_position;
                    SideCoordinator.particle.SetActive(true);
                    SideCoordinator.changeAni("greet_03");

                    score_Count = 0;
                    set_Count++;
                    SideCoordinator.set_time = SideCoordinator.set_timer.Elapsed.ToString().Substring(3, 5);
                    Debug.Log(SideCoordinator.set_time);
                    MSGorder = 6;
                }
            }
        }    
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
