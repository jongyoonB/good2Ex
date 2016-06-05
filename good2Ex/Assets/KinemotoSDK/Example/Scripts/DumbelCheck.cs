using UnityEngine;
using UnityEngine.UI;
using System.Collections.Generic;
using System.Threading;
using System;

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
    int[] fail = new int[4];

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
    }

    public void main()
    {
        AngleContorl();

        if (!ready_Flag)
        {
            if (GameObject.Find("phase").GetComponent<Text>().text != "Phase1")
            {
                GameObject.Find("phase").GetComponent<Text>().text = "Phase1";
                set_text("check1", "왼팔과 몸의 각도가 90도");
                set_text("check2", "오른팔과 몸의 각도가 90도");
                set_text("check3", "왼쪽 팔꿈치의 각도가 90도");
                set_text("check4", "오른쪽 팔꿈치의 각도가 90도");
            }
            readyCheck();
        }
        else if (!start_Flag)
        {
            if (GameObject.Find("phase").GetComponent<Text>().text != "Phase2")
            {
                GameObject.Find("phase").GetComponent<Text>().text = "Phase2";
                set_text("check1", "양팔을 천천히 올리기");
                set_textColor("check1", Color.black);
                set_text("check2", "");
                set_text("check3", "");
                set_text("check4", "");
            }
            startCheck();
        }
        else if (!top_Flag)
        {
            if (GameObject.Find("phase").GetComponent<Text>().text != "Phase3")
            {
                GameObject.Find("phase").GetComponent<Text>().text = "Phase3";
                set_text("check1", "왼팔과 몸의 각도가 130도");
                set_text("check2", "오른팔과 몸의 각도가 130도");
                set_text("check3", "왼팔을 어깨와 나란히");
                set_text("check4", "오른팔을 어깨와 나란히");
                set_textColor("check3", Color.black);
                set_textColor("check4", Color.black);

            }
            topCheck();
        }
        else if (!end_Flag)
        {
            if (GameObject.Find("phase").GetComponent<Text>().text != "Phase4")
            {
                GameObject.Find("phase").GetComponent<Text>().text = "Phase4";
                set_text("check1", "양팔의 각도를 90도로");
                set_text("check2", "양팔을 천천히 내리기");
                set_text("check3", "왼팔을 어깨와 나란히");
                set_text("check4", "오른팔을 어깨와 나란히");
                set_textColor("check2", Color.black);
                set_textColor("check3", Color.black);
                set_textColor("check4", Color.black);
            }
            endCheck();
        }

        if(start_Flag)
        {
            depth_Check();
        }

    }

    #endregion

    #region 메서드 [Exercise Check]

    void readyCheck()
    {
        y_False();

        if (armpit_Left_Angle <= 100 && armpit_Left_Angle >= 85)
        {
            set_textColor("check1", Color.green);
            wristLeft_Y = true;
        }
        else
        {
            set_textColor("check1", Color.red);
            wristLeft_Y = false;
        }

        if (armpit_Right_Angle <= 100 && armpit_Right_Angle >= 85)
        {
            set_textColor("check2", Color.green);
            wristRight_Y = true;
        }
        else
        {
            set_textColor("check2", Color.red);
            wristRight_Y = false;
        }

        if (elbow_Left_Angle >= 90 && elbow_Left_Angle <= 105)
        {
            set_textColor("check3", Color.green);
            elbowLeft_Y = true;
        }
        else
        {
            set_textColor("check3", Color.red);
            elbowLeft_Y = false;
        }

        if (elbow_Right_Angle >= 90 && elbow_Right_Angle <= 105)
        {
            set_textColor("check4", Color.green);
            elbowRight_Y = true;
        }
        else
        {
            set_textColor("check4", Color.red);
            elbowRight_Y = false;
        }

        if (wristLeft_Y && wristRight_Y && elbowRight_Y && elbowLeft_Y)
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
            set_textColor("check1", Color.green);
            wristLeft_Y = true;
        }
        else
        {
            set_textColor("check1", Color.red);
        }
        if (armpit_Right_Angle >= 135)
        {
            set_textColor("check2", Color.green);
            wristRight_Y = true;
        }
        else
        {
            set_textColor("check2", Color.red);
        }
        
        if (wristLeft_Y && wristRight_Y)
        {
            if (!(elbow_Left_Angle >= 135))
            {
                //set_textColor("check3", Color.green);
                elbowLeft_Y = true;
            }
            else
            {
                //set_textColor("check3", Color.red);
            }
            if(!(elbow_Right_Angle >= 135))
            {
                //set_textColor("check4", Color.green);
                elbowRight_Y = true;
            }
            else
            {
                //set_textColor("check4", Color.red);
            }
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

        if (armpit_Left_Angle <= 95 && armpit_Left_Angle >= 85)
        {
            wristLeft_Y = true;
        }
        if (armpit_Right_Angle <= 95 && armpit_Right_Angle >= 85)
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

            dumbelCoordi.send2web(score_Count, fail);
            //Debug.Log(fail);
            //Application.ExternalCall("send_score", score_Count);
            //Floating Text
            GameObject PointsText = UnityEngine.Object.Instantiate(Resources.Load("Prefabs/Kinniku")) as GameObject;
            PointsText.transform.position = new Vector3(DumbelCoordinator.JointInfo["SpineShoulder"].X, DumbelCoordinator.JointInfo["SpineShoulder"].Y);


            
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
        elbowLeft_Y = false;
        elbowRight_Y = false;
        set_textColor("check1", Color.red);
        set_textColor("check2", Color.red);
        set_textColor("check3", Color.red);
        set_textColor("check4", Color.red);
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
        if ((DumbelCoordinator.JointInfo["ShoulderLeft"].Z - DumbelCoordinator.JointInfo["ElbowLeft"].Z) <= 0.08f)
        {
            elbowLeft_Z = true;
        }
        else
        {
            elbowLeft_Z = false;
            elbowLeft_Z_Count++;
            if (ElbowLeftDepthFail == false)
            {
                ElbowLeftDepthFail = true;
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
            if (ElbowRightDepthFail == false)
            {
                ElbowRightDepthFail = true;
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
            if (WristLeftDepthFail == false)
            {
                WristLeftDepthFail = true;
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
            if (WristRightDepthFail == false)
            {
                WristRightDepthFail = true;
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
        if (elbowLeft_Y)
        {
            LG = true;
        }

        //오른팔꿈치가 굽었을 때
        if (elbowRight_Y)
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

        
        if(LE && RE && LW && RW)
        {
            Jinji = true;
        }
        else if(RG && LG)
        {
            AllGup = true;
        }
        else if(LE && RE)
        {
            AllDepth = true;
        }
        else if(LW && RW)
        {
            AllSonmok = true;
        }
        else if(RG)
        {
            RightGup = true;
        }
        else if(LG)
        {
            LeftGup = true;
        }
        else if(LE)
        {
            LeftDepth = true;
        }
        else if(RE)
        {
            RightDepth = true;
        }
        else if(LW)
        {
            LeftSonMok = true;
        }
        else if(RW)
        {
            RightSonmok = true;
        }


        if (end_Flag)
        {
            if ((clear_Score - 1) == score_Count)
            {
                DumbelCoordinator.firewall_position = new Vector3(((DumbelCoordinator.JointInfo["FootLeft"].X + DumbelCoordinator.JointInfo["FootRight"].X) / 2), ((DumbelCoordinator.JointInfo["FootLeft"].Y) * 6));
                DumbelCoordinator.firewall.transform.position = DumbelCoordinator.firewall_position;
                DumbelCoordinator.firewall.SetActive(true);
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
                DumbelCoordinator.firewall.SetActive(false);
                DumbelCoordinator.particle_position = new Vector3(((DumbelCoordinator.JointInfo["FootLeft"].X + DumbelCoordinator.JointInfo["FootRight"].X) / 2), ((DumbelCoordinator.JointInfo["FootLeft"].Y) * 7));
                DumbelCoordinator.particle.transform.position = DumbelCoordinator.particle_position;
                DumbelCoordinator.particle.SetActive(true);
                dumbelCoordi.MessageController.GetComponent<MessageController>().playClip(0);
                dumbelCoordi.send2web(score_Count, fail);
                score_Count = 0;
                set_Count++;
                Good = true;

            }
        }
        Debug.Log("EndClear");
    }

    #endregion
}
