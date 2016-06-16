<?php
class Member extends CI_Model
{

    function __construct()
{
    parent::__construct();

}

    function login($u_id, $u_pass)
    {
        $sql = "SELECT * FROM user WHERE id = ?";
        $query = $this->db->query($sql, array($u_id));
        if ($query->num_rows() > 0) {
            $a = $query->row();
            if($a->password==$u_pass){
                $a->pic = "/public/img/profile/{$a->pic}";

                return $a;//성공
        }
            else {
                return 2;//비밀번호 실패
            }
        }
        else{
            return 0;//아이디 실패
        }
    }

    function get_member_Id($id)
    {
        $sql = "SELECT id FROM user WHERE id = ? ";
        $query = $this->db->query($sql,array($id));

        if($query->num_rows() > 0)
        {
            return false;
        }
        else
        {
            return true;
        }
    }
    function get_member_Nick($nick)
    {
        $sql = "SELECT nick FROM user WHERE nick = ? ";

        $query = $this->db->query($sql,array($nick));

        if($query->num_rows() > 0)
        {
            return false;
        }
        else
        {
            return true;
        }
    }


    function delId($u_num)
    {
        $sql = "DELETE FROM user WHERE u_num = ?";
        $query = $this->db->query($sql,array($u_num));
    }

    function signUp_member($id, $password,$mail,$nick, $height, $weight)
    {
        $sql = "SELECT id FROM user WHERE id = '".$id."'";
        $hashed = PasswordHash::create_hash($password);
        $query = $this->db->query($sql);
        $check = $query->num_rows();
        $query2 = $this->db->query("SELECT nick FROM user WHERE nick = '".$nick."'");
        $check2 = $query->num_rows();
        if ($check > 0) {
            return 1;
        }
        elseif($check2 > 0)
        {
            return 2;
        }
        else
        {
            $query = "INSERT INTO user (id , password , mail , nick , height , weight , authority , hash , authentication)";
            $query .= "VALUES(?,?,?,?,?,?,?,?)";
            $res = $this->db->query($query,array($id, $hashed, $nick, $height, $weight, $mail, 1, md5(rand(0, 1000)), 0));
            //var_dump($res);//이거 무슨소리야 시바라ㅓㅇㄴ리ㅏ머ㅏㅣㅇ거마;ㅣㄴ거ㅏ;ㅣㄴ미ㅏ
            if($res) {
                "<script>alert('Your registration was successful!')</script>";
                return 0;
            } else {
                return -1;
            }
        }

    }

    function get_Ai()
    {
        $sql = "SELECT AUTO_INCREMENT AS ai FROM information_schema.TABLES WHERE TABLE_SCHEMA = 'exercise' AND TABLE_NAME = 'user' ";
        $query = $this->db->query($sql);
        $value = $query->row();
        return $value->ai;
    }

    function get_verify_info($u_num)
    {
        //$sql = "select u_email, hash from user where u_num = :u_num";
        $sql = "select mail, hash from user where u_num = ?";
        $query = $this->db->query($sql,array($u_num));
        return $query->row();
    }


    function verifying_email($email, $hash)
    {
        $sql = "select mail, hash, authentication from user WHERE mail= ? AND hash= ? AND authentication= ?";
        $query = $this->db->query($sql,array($email , $hash , 0));
        $match = $query->row();


        $sql = "UPDATE user SET authentication='1' WHERE mail= ? AND hash= ? AND authentication= 0";
        $this->db->query($sql,array($email,$hash));


    }


    function signIn_Check($obj)
    {
        $sql = "SELECT u_num , u_tel , u_birth ,u_nick , u_pic , college_num ,u_email, activate FROM " . TABLE_USER . " WHERE u_id = ? AND u_pass = ? ";
        $query = $this->db->query($sql,array($obj->u_id,$obj->u_pass));
        $check = $query->row();

        return $check;
    }



    function member_Update($u_num, $u_pass, $u_nick)
    {
        $hashed = PasswordHash::create_hash($u_pass);
        $sql = "UPDATE user SET password = ? , nick = ? WHERE u_num = ?";
        $this->db->query($sql,array($hashed,$u_nick,$u_num));
    }




}
