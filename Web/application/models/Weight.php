<?php

class Weight extends CI_Model
{

    function get_BMI()
    {
        $sql = "SELECT height FROM user WHERE user_numb = ?";
        $query = $this->db->query($sql, array($_SESSION["user_info"]->user_numb));
        $result = $query->row();
        //exit(var_dump($height));
        $height = pow($result->height*0.01, 2);
        //exit(var_dump($height));

        $sql = "SELECT date, weight/? as BMI  FROM weight WHERE user_numb = ?";
        $query = $this->db->query($sql, array($height, $_SESSION["user_info"]->user_numb));
        if ($query->num_rows() > 0) {
            $a = $query->result();

            return $a;

        } else {
            return 0;//아이디 실패
        }
    }
    function insert_weight($people_weight, $today)
    {
        $sql="SELECT * FROM weight WHERE user_numb = ? AND date = '{$today}'";
        $query = $this->db->query($sql, array($_SESSION["user_info"]->user_numb));
        if($query->num_rows() > 0){
            $sql2="UPDATE weight SET weight = $people_weight WHERE user_numb = ? AND date = '{$today}'";
            $query2= $this->db->query($sql2, array($_SESSION["user_info"]->user_numb));
            $a=$query2->result();
            return $a;
        }
        else if($query->num_rows()==0){
            $sql3="INSERT INTO weight VALUES (?, '{$today}', $people_weight)";
            $query3=$this->db->query($sql3, array($_SESSION["user_info"]->user_numb));
            if ($query3->num_rows() > 0) {
                return true;
            }
            else{
                return 0;
            }
        }
        else{
            return 0;
        }

    }
}