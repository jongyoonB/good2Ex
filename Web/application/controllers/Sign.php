<?php
//defined('BASEPATH') OR exit('No direct script access allowed');

class Sign extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function index()
    {
        $this->load->view('sign/login');
    }

    function login()
    {
        $this->load->model('member');

        $result = $this->member->login($_POST["login_id"], $_POST["login_pass"]);
        $type = gettype($result);
        if ($type == "object") {
            //echo "<script>alert('로그인 성공')</script>";

            $this->load->model('challenge');
            $count = $this->challenge->get_challenge_count($result->user_numb);
            $result->stamp = $count;
            //exit(var_dump($result));
            $_SESSION["user_info"] = $result;
            
            echo "<script>location.replace('/main/exercise_Main')</script>";
        } else {
            if ($result == 0) {
                echo "<script>alert('ID를 확인해 주세요')</script>";
            } elseif ($result == 2) {
                echo "<script>alert('비밀번호를 확인해 주세요')</script>";
            }
            $this->load->view('sign/login');
        }

    }

    function logout()
    {
        unset($_SESSION["user_info"]);
        $this->load->view('sign/login');
    }
}