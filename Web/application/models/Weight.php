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
}