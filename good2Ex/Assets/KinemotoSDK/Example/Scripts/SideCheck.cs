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

    //Sound C
    public bool AllDepth;
    public bool AllGup;
    public bool AllSonmok;
    public bool GanBaRe;
    public bool Good;
    public bool Jinji;
    public bool JoGum;
    public bool LastOne;
    public bool LeftDepth;
    public bool LeftGup;
    public bool LeftSonMok;
    public bool RightDepth;
    public bool RightGup;
    public bool RightSonmok;
    public bool Starts;

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

    //Score Count 변수
    public short set_Count;
    public short score_Count;


    //Fail Check Friends
    bool WristLeftDepthFail;
    bool WristRightDepthFail;
    bool ElbowLeftDepthFail;
    bool ElbowRightDepthFail;
    int[] fail = new int[4];

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
    }

    public void main()
    {
        AngleContorl();

        if (!ready_Flag)
        {
            if (GameObject.Find("phase").GetComponent<Text>().text != "Phase1")
            {
                GameObject.Find("phase").GetComponent<Text>().text = "Phase1";
                set_text("check1", "차렷자세로");
                set_text("check2", "");
                set_text("check3", "");
                set_text("check4", "");
                set_textColor("check1", Color.black);
            }
            readyCheck();
        }
        else if (!start_Flag)
        {
            if (GameObject.Find("phase").GetComponent<Text>().text != "Phase2")
            {
                GameObject.Find("phase").GetComponent<Text>().text = "Phase2";
                set_text("check1", "팔을 천천히 올리기");
                set_text("check2", "왼팔과 어깨가 평행하도록");
                set_text("check3", "오른팔과 어깨가 평행하도록");
                set_text("check4", "양팔이 어깨 보다 앞으로 나가지 않기");
                set_textColor("check1", Color.black);
            }
            startCheck();
        }
        else if (!top_Flag)
        {
            if (GameObject.Find("phase").GetComponent<Text>().text != "Phase3")
            {
                GameObject.Find("phase").GetComponent<Text>().text = "Phase3";
                set_text("check1", "팔을 천천히 올리기");
                set_text("check2", "왼팔과 어깨가 평행하도록");
                set_text("check3", "오른팔과 어깨가 평행하도록");
                set_text("check4", "양팔이 어깨 보다 앞으로 나가지 않기");
                set_textColor("check1", Color.black);
            }
            topCheck();
        }
        else if (!end_Flag)
        {
            if (GameObject.Find("phase").GetComponent<Text>().text != "Phase4")
            {
                GameObject.Find("phase").GetComponent<Text>().text = "Phase4";
                set_text("check1", "팔을 천천히 내리리기");
                set_text("check2", "양팔이 어깨 보다 앞으로 나가지 않기");
                set_text("check3", "");
                set_text("check4", "");
                set_textColor("check1", Color.black);
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
                Starts = true;
            }
            Debug.Log("readyClear");
        }
    }

    void startCheck()
    {
        y_False();

        if (armpit_Left_Angle >= 43)
        {
            wristLeft_Y = true;
        }

        if (armpit_Right_Angle >= 43)
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

        if (armpit_Left_Angle >= 80 && armpit_Left_Angle <= 90)
        {
            set_textColor("check2", Color.green);
            wristLeft_Y = true;
        }
        else
        {
            set_textColor("check2", Color.red);
        }



        if (armpit_Right_Angle >= 80 && armpit_Right_Angle <= 90)
        {
            set_textColor("check3", Color.green);
            wristRight_Y = true;
        }
        else
        {
            set_textColor("check3", Color.red);
        }

        if (wristLeft_Y && wristRight_Y)
        {
            top_Flag = true;
            Sound_Controller();
            y_Count_False();
            z_Count_False();
            Debug.Log("topClear");
        }
    }

    void endCheck()
    {
        y_False();

        if (armpit_Left_Angle <= 40 && armpit_Left_Angle >= 25)
        {
            wristLeft_Y = true;
        }
        if (armpit_Right_Angle <= 40 && armpit_Right_Angle >= 25)
        {
            wristRight_Y = true;
        }



        if (wristLeft_Y && wristRight_Y)
        {
            end_Flag = true;
            score_Count++;
            Sound_Controller();
            ready_Flag = false;
            start_Flag = false;
            top_Flag = false;
            end_Flag = false;
            y_Count_False();
            z_Count_False();

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

            sideCoordi.send2web(score_Count, fail);

            //Application.ExternalCall("cut_view", score_Count, clear_Score);

            //Floating Text
            GameObject PointsText = UnityEngine.Object.Instantiate(Resources.Load("Prefabs/Kinniku")) as GameObject;
            PointsText.transform.position = new Vector3(DumbelCoordinator.JointInfo["SpineShoulder"].X, DumbelCoordinator.JointInfo["SpineShoulder"].Y);



            Debug.Log("EndClear");
        }
    }

    #endregion

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
        GameObject.Find(listName).GetComponent<TextMesh>().text = context;
    }

    void set_textColor(string listName, Color color)
    {
        GameObject.Find(listName).GetComponent<TextMesh>().color = color;
    }

    #endregion

    #region 메서드 [Depth Check]

    public void depth_Check()
    {
        if ((SideCoordinator.JointInfo["ShoulderLeft"].Z - SideCoordinator.JointInfo["ElbowLeft"].Z) <= 0.08f)
        {
            elbowLeft_Z = true;
        }
        else
        {
            elbowLeft_Z = false;
            elbowLeft_Z_Count++;
        }

        if ((SideCoordinator.JointInfo["ShoulderRight"].Z - SideCoordinator.JointInfo["ElbowRight"].Z) <= 0.08f)
        {
            elbowRight_Z = true;
        }
        else
        {
            elbowRight_Z = false;
            elbowRight_Z_Count++;

        }

        if ((SideCoordinator.JointInfo["ShoulderLeft"].Z - SideCoordinator.JointInfo["WristLeft"].Z) <= 0.15f)
        {
            wristLeft_Z = true;
        }
        else
        {
            wristLeft_Z = false;
            wristLeft_Z_Count++;
        }

        if ((SideCoordinator.JointInfo["ShoulderRight"].Z - SideCoordinator.JointInfo["WristRight"].Z) <= 0.15f)
        {
            wristRight_Z = true;
        }
        else
        {
            wristRight_Z = false;
            wristRight_Z_Count++;

        }

        if (!(elbow_Left_Angle >= 140))
        {
            elbowLeft_Y_Count++;
        }
        if (!(elbow_Right_Angle >= 140))
        {
            elbowRight_Y_Count++;
        }

        
        if (!top_Flag)
        {
            if (!elbowLeft_Z || !elbowRight_Z || !wristLeft_Z || !wristRight_Z)
            {
                set_textColor("check4", Color.red);
            }
            else
            {
                set_textColor("check4", Color.green);
            }

        }
        else if (!end_Flag)
        {
            if (!elbowLeft_Z || !elbowRight_Z || !wristLeft_Z || !wristRight_Z)
            {
                set_textColor("check2", Color.red);
            }
            else
            {
                set_textColor("check2", Color.green);
            }
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
        if (elbowLeft_Y_Count > 0)
        {
            LG = true;
        }

        //오른팔꿈치가 굽었을 때
        if (elbowRight_Y_Count > 0)
        {
            RG = true;
        }

        //왼팔꿈치가 앞으로 나왔을 때
        if (elbowLeft_Z_Count > 0)
        {
            LE = true;
        }

        //오른팔꿈치가 앞으로 나왔을 때
        if (elbowRight_Z_Count > 0)
        {
            RE = true;
        }

        //왼손목이 앞으로 나왔을 때
        if (wristLeft_Z_Count > 0)
        {
            LW = true;
        }

        //오른손목이 앞으로 나왔을 때
        if (wristRight_Z_Count > 0)
        {
            RW = true;
        }


        if (LE && RE && LW && RW)
        {
            Jinji = true;
        }
        else if (RG && LG)
        {
            AllGup = true;
        }
        else if (LE && RE)
        {
            AllDepth = true;
        }
        else if (LW && RW)
        {
            AllSonmok = true;
        }
        else if (RG)
        {
            RightGup = true;
        }
        else if (LG)
        {
            LeftGup = true;
        }
        else if (LE)
        {
            LeftDepth = true;
        }
        else if (RE)
        {
            RightDepth = true;
        }
        else if (LW)
        {
            LeftSonMok = true;
        }
        else if (RW)
        {
            RightSonmok = true;
        }



        if (end_Flag)
        {
            if ((clear_Score - 1) == score_Count)
            {
                SideCoordinator.firewall_position = new Vector3(((SideCoordinator.JointInfo["FootLeft"].X + SideCoordinator.JointInfo["FootRight"].X) / 2), ((SideCoordinator.JointInfo["FootLeft"].Y) * 6));
                SideCoordinator.firewall.transform.position = SideCoordinator.firewall_position;
                SideCoordinator.firewall.SetActive(true);
                LastOne = true;

            }
            else if ((clear_Score - 2) == score_Count)
            {
                JoGum = true;

            }
            else if ((clear_Score - 3) == score_Count)
            {
                GanBaRe = true;
            }
            else if ((clear_Score == score_Count))
            {
                SideCoordinator.firewall.SetActive(false);
                SideCoordinator.particle_position = new Vector3(((SideCoordinator.JointInfo["FootLeft"].X + SideCoordinator.JointInfo["FootRight"].X) / 2), ((SideCoordinator.JointInfo["FootLeft"].Y) * 7));
                SideCoordinator.particle.transform.position = SideCoordinator.particle_position;
                SideCoordinator.particle.SetActive(true);
                sideCoordi.MessageController.GetComponent<MessageController>().playClip(0);
                sideCoordi.send2web(score_Count, fail);
                score_Count = 0;
                set_Count++;

                Good = true;
            }
        }

    }

    #endregion
}
