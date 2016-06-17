<?php

//defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     *        http://example.com/index.php/welcome
     *    - or -
     *        http://example.com/index.php/welcome/index
     *    - or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function index()
    {

        $this->load->view('sign/login');
    }

    public function orderPlus()
    {
        echo json_encode($_SESSION["now_routine"]);
    }

    public function exercise_Main()
    {
        $this->load->model('Weight');
        $data['BMI_info'] = $this->Weight->get_BMI();


        $this->load->model('Exercise');
        $data['achievement_rate'] = $this->Exercise->get_achievement_rate();
        $data['achievement_rate_by_date'] = $this->Exercise->get_achievement_rate_by_date();

        $today = date("Y-m-d");
        $data['exercise_plan'] = $this->Exercise->get_exercise_plan($today);

        $this->load->model('Board');
        $data['board_info'] = $this->Board->get_board();


        $data['qna_info'] = $this->Board->get_qna();


        $this->load->view('exercise_Main/main', $data);

        //$this->load->view('exercise_Main/main');
    }

    public function exercise_Go()
    {
        //date_default_timezone_set('Asia/Seoul');
        $this->load->model('Exercise');
        $today = date("Y-m-d");
        //exit(var_dump($today));
        if (!$this->Exercise->check_routine()) {
            echo "<script>alert('오늘 날짜의 루틴이 존재하지 않습니다.')</script>";

            echo "<script>location.replace('/main/exercise_Plan')</script>";

        } else {
            $result = $this->Exercise->Exercise_start();
            $type = gettype($result);
            if ($type == "array") {
                $_SESSION["now_routine"] = $result;
                //exit(var_dump( $_SESSION["now_routine"]));
            } else
                $_SESSION["now_routine"] = "데이터가 없습니다.";

            $this->load->view('exercise_Go/exercise_start');
        }
    }

    public function delete_exercise()
    {
        $user_num = $_SESSION['user_info']->user_numb;
        $date = $_POST['date'];

        $this->load->model('Exercise');
        $this->Exercise->delete_exercise($user_num,$date);
    }

    public function insert_check_point()
    {
        $this->load->model('Exercise');
//        if (isset($_post['body_point'])) {
//            $fail_body_point = $_post['fail_body_point'];
//            $order = $_post['order'];
//
//            $today = date("Y-m-d");
//
//            $this->exercise->insert_Exercise_Result($today, $fail_body_point, $order);
//
//        }

//
//        $body_point = $_REQUEST['body_point'];
//        $order = $_REQUEST['order'];
        $body_point = $_REQUEST['body_point'];
        $order = $_REQUEST['order'];



        $today = date("Y-m-d");

        $k=$this->Exercise->insert_Exercise_Result($today, $body_point, $order);

        echo json_encode($k);
    }

    public function numPlus()
    {
        echo json_encode($_SESSION["now_routine"]);
    }

    public function exercise_Plan()
    {
        $this->load->model('Exercise');

        $this->load->view('exercise_Plan/exercise_select');

    }

    public function save_routine()
    {
        $_SESSION['day'] = $_POST['days'];
        $user_num = $_SESSION['user_info']->user_numb;
        $select_routine = $_SESSION['select_routine'];


        //exit(var_dump($select_routine));
        $this->load->model('Exercise');
        $exercise_count = $this->Exercise->Get_count_exercise_in_routine($select_routine);
        //exit(var_dump($exercise_count));
        $complete = $this->Exercise->Exercise_routine_complete($exercise_count, $user_num, $select_routine, $_SESSION['day']);

        echo json_encode($complete);
    }

    public function get_exercise_plan()
    {
        $date = $_POST['date'];
        $this->load->model('Exercise');

        $exercise_plan = $this->Exercise->get_exercise_plan($date);

        echo json_encode($exercise_plan);
    }

    public function update_exercise()
    {
        $user_num = $_SESSION['user_info']->user_numb;
        $nowdate = $_POST['date'];
        $nextdate = $_POST['nextdate'];

        $this->load->model('Exercise');
        $this->Exercise->update_exercise($user_num,$nowdate,$nextdate);
    }

    public function exercise_Beginner_date($year = null, $month = null){
        if(isset($_POST['qwe']))
            $_SESSION['select_routine'] = $_POST['qwe'];

        //exit(var_dump($_SESSION['select_routine']));

        $this->load->model('Exercise');
        $data = $this->Exercise->generate($year, $month);

        $this->load->view('exercise_Plan/exercise_beginner_date', $data);
    }

    public function exercise_date($year = null, $month = null)
    {
        if(isset($_POST['qwe']))
            $_SESSION['select_routine'] = $_POST['qwe'];

        //exit(var_dump($_SESSION['select_routine']));

        $this->load->model('Exercise');
        $data = $this->Exercise->generate($year, $month);

        $this->load->view('exercise_Plan/exercise_date', $data);
    }

    public function exercise_Select()
    {
        //exit(var_dump($_SESSION['day']));
        $this->load->view('exercise_Plan/exercise_select');
    }

    function exercise_Select_Part()
    {
        if ($_POST) {
            $part = $_POST['part'];
            $level = $_POST['level'];

            $this->load->model('Exercise');

            $result = $this->Exercise->Exercise_recommend($part, $level);

            $type = gettype($result);

            if ($type == "array") {
                $data = $result;
            } else
                $data = "데이터가 없습니다.";

            echo json_encode($data);

        } else
            echo "error";
    }

    public function exercise_Select_routine()
    {
        $routine_list = $_POST['routine_list_index'];
        $this->load->model('Exercise');
        $result = $this->Exercise->Exercise_routine_info($routine_list);
        $type = gettype($result);
        if ($type == "array") {
            $data = $result;
        } else
            $data = "데이터가 없습니다.";

        echo json_encode($data);
    }

    public function exercise_Preview()
    {
        $user_num = $_SESSION['user_info']->user_numb;
        $day=$_SESSION['day'];
        //exit(var_dump($day));
        $this->load->model('Exercise');

        $result = $this->Exercise->Exercise_routine_preview($user_num, $day);
        $type = gettype($result);
        //exit(var_dump($result));
        if ($type == "array") {
            $data['user_complete_info'] = $result;
        } else
            $data = "데이터가 없습니다.";

        $this->load->view('exercise_Plan/exercise_preview', $data);

        unset($_SESSION["day"]);

    }

    public function exercise_Bodycheck()
    {
        $this->load->model('Weight');
        $data['BMI_info'] = $this->Weight->get_BMI();

        $this->load->model('Exercise');
        $data['achievement_rate'] = $this->Exercise->get_achievement_rate();
        $data['achievement_rate_by_date'] = $this->Exercise->get_achievement_rate_by_date();

        $today = date("Y-m-d");
        $data['exercise_plan'] = $this->Exercise->get_exercise_plan($today);

        $this->load->model('Board');
        $data['board_info'] = $this->Board->get_board();


        $data['qna_info'] = $this->Board->get_qna();

        //$this->load->view('exercise_Main/main');
        $this->load->view('exercise_Profile/body_check', $data);
    }

    public function save_time(){
        $_SESSION['time'] = $_POST['time'];

    }

    public function exercise_Result()
    {
        //exit(var_dump($_SESSION['time']));
        $time = explode (":", $_SESSION['time']);
        $data['exercise_time'] = $time;

        $time[1]=$time[1]/60;

        $time = $time[0] + $time[1];


        $this->load->model('Exercise');
        $today = date("Y-m-d");
        $exercise_time = $time / 30;

        $data['achievement_count'] = $this->Exercise->exercise_Result($today);
        $data['position_check_on_today'] = $this->Exercise->get_position_check_on_today($today);
        $data['position_check_on_another_day'] = $this->Exercise->get_position_check_on_another_day($today);
        $result = $this->Exercise->get_calorie_info($exercise_time);

        $data['calorie_info'] = 0;
        for($i=0; $i<count($result); $i++) {
            $data['calorie_info'] += $result[$i]->calorie_info;
        }
        //exit(var_dump($data));
        $this->load->view('exercise_Result/exercise_result', $data);
    }

    public function exercise_QnA()
    {
        $this->load->view('exercise_QnAboard/index');
    }

    public function exercise_Free()
    {
        $this->load->view('exercise_Freeboard/index');
    }

}
