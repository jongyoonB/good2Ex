<?php

/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2016-05-11
 * Time: 오후 2:20
 */
class Exercise extends CI_Model
{

    var $prefs;

    function get_calendar_data($year, $month)
    {

        $sql = "SELECT routine_list_numb, routine_date FROM user_routine_info
                WHERE user_numb = {$_SESSION['user_info']->user_numb}
                and routine_date like '{$year}-{$month}%'";
        $query = $this->db->query($sql);
        $result = $query->result();
        if ($result) {
            foreach ($result as $row) {
                if (substr($row->routine_date, -2) < 10)
                    $data[substr($row->routine_date, -1)] = $row->routine_list_numb;
                else
                    $data[substr($row->routine_date, -2)] = $row->routine_list_numb;
            }
        } else {
            $data = false;
        }

//exit(var_dump($data));
        return $data;

    }

    function generate($year, $month)
    {
        if ($year == null && $month == null) {
            $year = date("Y");
            $month = date("m");
        }

        $this->prefs = array(
            'show_next_prev' => TRUE,
            'next_prev_url' => '/main/exercise_date'
        );

        $this->prefs['template'] = '

        {table_open}<table class="table calendar">{/table_open}

        {heading_row_start}<tr>{/heading_row_start}

        {heading_previous_cell}<th><a href="{previous_url}"><span class="glyphicon glyphicon-triangle-left" aria-hidden="true"></span></a></th>{/heading_previous_cell}
        {heading_title_cell}<th colspan="{colspan}">{heading}</th>{/heading_title_cell}
        {heading_next_cell}<th><a href="{next_url}"><span class="glyphicon glyphicon-triangle-right" aria-hidden="true"></span></a></th>{/heading_next_cell}

        {heading_row_end}</tr>{/heading_row_end}

        {week_row_start}<tr>{/week_row_start}
        {week_day_cell}<td>{week_day}</td>{/week_day_cell}
        {week_row_end}</tr>{/week_row_end}

        {cal_row_start}<tr class="days">{/cal_row_start}
        {cal_cell_start}<td>{/cal_cell_start}
        {cal_cell_start_today}<td>{/cal_cell_start_today}
        {cal_cell_start_other}<td class="other-month">{/cal_cell_start_other}

        {cal_cell_content}
            <div class="row" id="routine_info">
            <a class="day" id="' . $year . $month . '{day}" data-toggle="modal" data-target="#myModal" style="color: black">
            <div class="col-md-1 day_num">{day}</div> <!--db 내용이 있는 컨텐츠-->
            <div class="col-md-11"><img src="/public/img/calendar/icon.png" id="icon"></div>
            </a>
             <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
		<button type="button" class="close"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
		<h4 class="modal-title" id="myModalLabel">Modal title</h4>
	      </div>
	      <div class="modal-body" id="exercise_modal">

	      </div>
	      <div class="modal-footer">
		<button type="button" class="btn btn-default">수정</button>
		<button type="button" class="btn btn-default" href="/main/planDelete">삭제</button>
	      </div>
	    </div>
	  </div>
	</div>

            </div>
        {/cal_cell_content}
        {cal_cell_content_today}
        <div class="row" id="routine_info">
            <a class="day" id="' . $year . $month . '{day}" data-toggle="modal" data-target="#myModal" style="color: black">

            <div class="col-md-1 highlight">{day}</div>
            <div class="col-md-11"><img src="/public/img/calendar/icon.png" id="icon"></div>
         </div>
         </a>
                     <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
		<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
		<h4 class="modal-title" id="myModalLabel">Modal title</h4>
	      </div>
	      <div class="modal-body"> </div>
	      <div class="modal-footer">
		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		<button type="button" class="btn btn-primary">Save changes</button>
	      </div>
	    </div>
	  </div>
	</div>
           </div>
        {/cal_cell_content_today}

        {cal_cell_no_content}
        <div class="{day}" style="height: 121px" onclick="get_day(' . $year . $month . '{day})">
        {day}
        </div>
        {/cal_cell_no_content}
        {cal_cell_no_content_today}
        <div class="{day} highlight" style="height: 121px" onclick="get_day(' . $year . $month . '{day})">
            {day}
        </div>
        {/cal_cell_no_content_today} <!--오늘 날짜-->

        {cal_cell_blank}&nbsp;{/cal_cell_blank}

        {cal_cell_other}<div>{day}</div>{cal_cel_other}

        {cal_cell_end}</td>{/cal_cell_end}
        {cal_cell_end_today}</td>{/cal_cell_end_today}
        {cal_cell_end_other}</td>{/cal_cell_end_other}
        {cal_row_end}</tr>{/cal_row_end}

        {table_close}</table>{/table_close}
';

        $this->load->library('calendar', $this->prefs);

        $data = $this->get_calendar_data($year, $month);

        $data = $this->calendar->generate($year, $month, $data);

        $calendar = new stdClass();
        $calendar->calendar = $data;
        $calendar->year = $year;
        $calendar->month = $month;


        return $calendar;
    }


    function get_achievement_rate()
    {
        $today = date("Y-m-d");

        $sql = "SELECT i.exercise_name, sum(r.clear_count) as clear_count, sum(r.target_count) as target_count
                FROM exercise_record r, exercise_info i
                WHERE r.exercise_numb = i.exercise_numb
                and user_numb = ?
                and r.exercise_date < ?
                GROUP BY r.exercise_numb;";
        $query = $this->db->query($sql, array($_SESSION["user_info"]->user_numb, $today));

        if ($query->num_rows() > 0) {
            $a = $query->result();
//exit(var_dump($a));
            return $a;

        } else
            return 0;//아이디 실패

    }

    function get_achievement_rate_by_date()
    {
        $today = date("Y-m-d");

        $sql = "SELECT i.exercise_name, sum(r.clear_count) as clear_count, sum(r.target_count) as target_count, r.exercise_date
                FROM exercise_record r, exercise_info i
                WHERE r.exercise_numb = i.exercise_numb
                and r.user_numb = ?
                and r.exercise_date < ?
                GROUP BY r.exercise_numb, r.exercise_date;";

        $query = $this->db->query($sql, array($_SESSION["user_info"]->user_numb, $today));

        if ($query->num_rows() > 0) {
            $a = $query->result();
//exit(var_dump($a));
            return $a;

        } else
            return 0;//아이디 실패
    }

    function get_exercise_plan($day)
    {
        $sql = "SELECT i.exercise_name, r.number_of_set, r.number_of_count, o.exercise_order
                from exercise_info i, exercise_repeat_numb r, exercise_order o, user_routine_info u
                where u.routine_list_index = o.routine_list_index
                  and o.numb_set_index = r.numb_set_index
                  and r.exercise_numb = i.exercise_numb
                  and u.routine_date = ?
                  and u.user_numb = ?
                order by o.exercise_order;";
        $query = $this->db->query($sql, array($day, $_SESSION["user_info"]->user_numb));

        if ($query->num_rows() > 0) {
            $a = $query->result();

            return $a;

        } else {
            return 0;//아이디 실패
        }

    }

    function exercise_Result()
    {
        $today = date("Y-m-d");

//        $sql = "SELECT e.exercise_name, p.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
//                from user_position_record pr, exercise_record er, exercise_info e, check_point p
//                where e.exercise_numb = er.exercise_numb
//                and er.exercise_date = pr.position_check_date
//                and p.check_point_index = pr.check_point_index
//                and e.exercise_numb = er.exercise_numb
//                and pr.position_check_date = ?
//                and pr.user_numb = ?
//                GROUP BY e.exercise_name, p.position_check, pr.position_count;";

        $sql = "SELECT ei.exercise_numb, ei.exercise_name, er.target_count, er.clear_count
from exercise_record er, exercise_info ei
where er.exercise_numb = ei.exercise_numb
      and er.exercise_date = ?
      and er.user_numb = ?
                 ";

        $query = $this->db->query($sql, array($today, $_SESSION["user_info"]->user_numb));

        if ($query->num_rows() > 0) {
            $a = $query->result();


            return $a;

        } else {
            return 0;//아이디 실패
        }
    }

    function Exercise_recommend($part, $level)
    {/*파트랑 난이도를 가져와서 루틴이름을 찾는다*/
        $today = date("Y-m-d");
        /*       $sql = "SELECT i.exercise_name, i.exercise_info, m.movie_path
       from exercise_point p, exercise_info i, exercise_movie_info m
       where i.exercise_point_numb=p.exercise_point_numb
       and p.exercise_point_name= '$part'
       and i.exercise_numb=m.exercise_numb;";*/

        /*      $sql = "SELECT i.exercise_name, i.exercise_info, m.movie_path, r.number_of_set, r.number_of_count, ri.routine_category
      from exercise_info i, exercise_point p,exercise_movie_info m, exercise_repeat_numb r, exercise_order o, routine_list l, routine_info ri
      where i.exercise_point_numb=p.exercise_point_numb
      and p.exercise_point_name= '$part'
      and i.exercise_numb=m.exercise_numb
      and r.numb_set_index=o.numb_set_index
      and o.routine_list_index=l.routine_list_index
      and l.routine_list_index=ri.routine_list_index
      and ri.routine_category='$part';";*/

        /*$sql="SELECT * from routine_info WHERE routine_category=$part";*/
        /*  $sql="select * from routine_list rl, routine_info ri where rl.routine_list_index = ri.routine_list_index and ri.routine_category ='$part';";*/
        $sql = "SELECT routine_list_index FROM routine_info WHERE routine_category='$part' AND diffculty='$level';";

        $query = $this->db->query($sql);
        $query = $query->result();
        $a = null;
        for ($i = 0; $i < count($query); $i++) {
            if ($i == 0) {
                $a = $query[$i]->routine_list_index;
            } else {
                $a = $a . "," . $query[$i]->routine_list_index;
            }
        }
        $sql = "SELECT * FROM routine_list WHERE routine_list_index IN($a)";
//        array($today, $_SESSION["user_info"]->user_numb)
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $a = $query->result();
            return $a;
        } else
            return 0;//아이디 실패
    }

    /*function Exercise_routine_info($routine_list){
        $today = date("Y-m-d");
        $sql= "SELECT * FROM routine_list  WHERE routine_list_index='$routine_list';";

        $query = $this->db->query($sql, array($today, $_SESSION["user_info"]->user_numb));

        if ($query->num_rows() > 0) {
            $a = $query->result();
            return $a;
        } else
            return 0;//아이디 실패
    }*/

    function Exercise_routine_info($routine_list)
    {
        $today = date("Y-m-d");
        /*      $sql = "SELECT i.exercise_name, i.exercise_info, m.movie_path, r.number_of_set, r.number_of_count
             from exercise_point p, exercise_info i, exercise_movie_info m, exercise_repeat_numb r
             where i.exercise_point_numb=p.exercise_point_numb
             and p.exercise_point_name= '$routine'
             and i.exercise_numb=m.exercise_numb
             and i.exercise_numb=r.exercise_numb;";*/

        /* $sql = "SELECT i.exercise_name, i.exercise_info, m.movie_path, r.exercise_numb
        from exercise_point p,exercise_info i, exercise_movie_info m, exercise_repeat_numb r, exercise_order o
        where o.routine_list_index='$routine'
        and  p.exercise_point_numb=i.exercise_point_numb
        and  o.numb_set_index = r.numb_set_index
        and  r.exercise_numb = i.exercise_numb
        and  m.exercise_numb = i.exercise_numb;";
      /*   $sql = "SELECT numb_set_index FROM exercise_order WHERE routine_list_index = $routine";
         $query = $this->db->query($sql);
         $test = $query->result();
         $aa = null;
         for($i = 0 ; $i < count($test); $i++)
         {
             if($i == 0)
             {
                 $aa = $test[$i]->numb_set_index;
             }else {
                 $aa = $aa . "," . $test[$i]->numb_set_index;
             }
         }
         $sql = "SELECT * FROM exercise_repeat_numb WHERE numb_set_index IN($aa)";
         $query = $this->db->query($sql);
         $test = $query->result();
         for($i=0; $i < count($test); $i++)
         {
             if($i == 0) {
                 $aa = $test[$i]->exercise_numb;
             }else{
                 $aa = $aa.",".$test[$i]->exercise_numb;
             }
         }
         $sql = "SELECT * FROM exercise_info WHERE exercise_numb IN($aa)";
         $query = $this->db->query($sql);*/

        $sql = "SELECT o.routine_list_index, r.number_of_set, r.number_of_count, i.exercise_name, i.exercise_info, m.movie_path
              FROM exercise_order o, exercise_repeat_numb r, exercise_info i, exercise_movie_info m
              WHERE o.routine_list_index='$routine_list'
              and o.numb_set_index=r.numb_set_index
              and r.exercise_numb = i.exercise_numb
              and i.exercise_numb = m.exercise_numb;";

        $query = $this->db->query($sql);

        if ($query->num_rows() > 0) {
            $a = $query->result();
            return $a;
        } else
            return 0;//아이디 실패
    }

    function Get_count_exercise_in_routine($select_routine)
    {
        $sql = "select * from exercise_order where routine_list_index = ?";
        $query = $this->db->query($sql, array($select_routine));
        $count = $query->num_rows();

        return $count;
        //exit(var_dump($count));

    }

    function insert_Exercise_Result($today, $fail_body_point, $order)
    {
        //exit(var_dump($today));
        $sql = "select rn.exercise_numb as exercise_numb
                from user_routine_info ri, exercise_order o, exercise_repeat_numb rn
                where ri.routine_list_index = o.routine_list_index
                 and o.numb_set_index = rn.numb_set_index
                 and ri.routine_date = ?
                 and o.exercise_order = ?;";

        $query = $this->db->query($sql, array($today, $order));

        $exercise_numb = $query->row()->exercise_numb;

        $sql = "SELECT check_point_index FROM check_point
                  WHERE exercise_numb = ?";

        $query = $this->db->query($sql, array($exercise_numb));

        if ($query->num_rows() > 0) {
            $check_point_index = $query->result();

            for ($i = 0; $i < count($check_point_index); $i++) {
                $sql = "SELECT position_record_index FROM user_position_record
                  WHERE check_point_index = ?
                  AND position_check_date = ?;";

                $query = $this->db->query($sql, array($check_point_index[$i]->check_point_index, $today));

                if ($query->num_rows() > 0) {
                    $position_record_index = $query->row()->position_record_index;

                    $sql = "UPDATE user_position_record SET position_count = position_count + {$fail_body_point[$i]}
                      WHERE position_record_index = $position_record_index;";

                } else {

                    $sql = "INSERT INTO user_position_record(user_numb, position_count, check_point_index, position_check_date)
                    VALUES({$_SESSION["user_info"]->user_numb}, {$fail_body_point[$i]}, {$check_point_index[$i]->check_point_index}, '{$today});";

                }

                $this->db->query($sql);

            }

            $sql = "UPDATE exercise_record SET clear_count = clear_count+1
                   WHERE user_numb = ?
                   and exercise_numb = ?
                   and exercise_date = ?;";

            $this->db->query($sql, array($_SESSION["user_info"]->user_numb, $exercise_numb, $today));

        }

    }


    function Exercise_routine_complete($exercise_count, $user_num, $select_routine, $day)
    {
        //exit(var_dump($day));
        for ($i = 1; $i <= $exercise_count; $i++) {
            for ($j = 0; $j < count($day); $j++) {
                $sql = "INSERT INTO exercise_record (user_numb, exercise_numb, target_count, clear_count, exercise_date)
                    VALUE (2,
                           (
                            SELECT r.exercise_numb
                            FROM exercise_repeat_numb r, exercise_order o
                            WHERE r.numb_set_index = o.numb_set_index
                             AND o.routine_list_index = $select_routine
                             AND o.exercise_order = $i
                           ),
                           (
                            SELECT r.number_of_set * number_of_count
                            FROM exercise_repeat_numb r, exercise_order o
                            WHERE r.numb_set_index = o.numb_set_index
                             AND o.routine_list_index = $select_routine
                             AND o.exercise_order = $i
                           ), 0, '$day[$j]');";

                $query = $this->db->query($sql);
            }
        }
        if ($query) {
            for ($j = 0; $j < count($day); $j++) {
                $sql = "INSERT INTO user_routine_info(user_numb,routine_list_index,routine_date) VALUE($user_num, $select_routine,'$day[$j]')";
                $query = $this->db->query($sql);
            }
        }

        return $query;
    }

    function Exercise_start()
    {
        $today = date("Y-m-d");

        $sql = "SELECT i.exercise_name, i.exercise_info, r.number_of_set, r.number_of_count, o.exercise_order, i.exercise_numb
from exercise_info i, exercise_repeat_numb r, exercise_order o, user_routine_info u where u.routine_list_index = o.routine_list_index and o.numb_set_index = r.numb_set_index
AND r.exercise_numb = i.exercise_numb
and u.routine_date = ?
and u.user_numb = ? order by o.exercise_order";
        $query = $this->db->query($sql, array($today, $_SESSION["user_info"]->user_numb));

        if ($query->num_rows() > 0) {
            $a = $query->result();
            return $a;
        } else
            return 0;//아이디 실패
    }

    function check_routine()
    {
        $today = date("Y-m-d");

        $sql = "SELECT * FROM user_routine_info WHERE routine_date = ?";
        $query = $this->db->query($sql, array($today));
        if ($query->num_rows() > 0) {

            return true;
        } else
            return false;//아이디 실패
    }

    function get_position_check_on_today($today)
    {

        $a = 0;
//exit(var_dump($_SESSION["now_routine"]));
        $sql = "SELECT p.point_numb, ei.exercise_name, p.position_check, position_count
                from user_position_record pr, check_point p, exercise_info ei
                WHERE ei.exercise_numb = p.exercise_numb
                and p.check_point_index = pr.check_point_index
                and pr.user_numb = ?
                AND pr.position_check_date = ?
                and not position_count = 0;";

        $query = $this->db->query($sql, array($_SESSION["user_info"]->user_numb, $today));

//exit(var_dump($query));
        if ($query->num_rows() > 0) {
            $a = $query->result();
            //exit(var_dump($a));

            return $a;

        } else {
            return 0;//아이디 실패
        }
    }

    function get_position_check_on_another_day($today)
    {
        $a = array();

        $x = 0;
        for ($i = 0; $i < count($_SESSION['now_routine']); $i++) {
            $sql = "SELECT p.point_numb, ei.exercise_name, p.position_check, position_count
                    FROM user_position_record pr, check_point p, exercise_info ei
                    WHERE ei.exercise_numb = p.exercise_numb
                      and p.check_point_index = pr.check_point_index
                      AND pr.position_check_date = (
                                                    SELECT max(pr.position_check_date)
                                                    from user_position_record pr, check_point p, exercise_info ei
                                                    WHERE ei.exercise_numb = p.exercise_numb
                                                      and p.check_point_index = pr.check_point_index
                                                      and p.exercise_numb = ?
                                                      and not pr.position_check_date = ?
                                                    )
                      and ei.exercise_numb = ?
                      and not position_count = 0;";
            $query = $this->db->query($sql, array($_SESSION['now_routine'][$i]->exercise_numb, $today, $_SESSION['now_routine'][$i]->exercise_numb));

            if ($query->num_rows() > 0) {
                for ($z = 0; $z < count($query->result()); $z++) {
                    $a[$x++] = $query->result()[$z];
                }

            } else
                $a = 0;
        }

        //exit(var_dump($a));
        return $a;
    }

    function Exercise_routine_preview($user_num, $day)
    {
        //exit(var_dump($day));
        for ($j = 0; $j < count($day); $j++) {
            $sql = "SELECT u.routine_date, r.routine_name,n.number_of_count,n.number_of_set,i.exercise_name, i.exercise_info
              FROM user_routine_info u, routine_list r, exercise_order o, exercise_repeat_numb n, exercise_info i
              WHERE u.user_numb='$user_num'
              AND u.routine_date='$day[$j]'
              AND u.routine_list_index=r.routine_list_index
              AND r.routine_list_index = o.routine_list_index
              AND o.numb_set_index = n.numb_set_index
              AND n.exercise_numb = i.exercise_numb;";

            $query = $this->db->query($sql);

            if ($query->num_rows() > 0)
                $a[$j] = $query->result();
        }

        return $a;
    }

    function delete_exercise($u_num, $date)
    {
        $sql = "DELETE FROM user_routine_info WHERE user_numb = {$u_num} AND routine_date = '{$date}'";
        $this->db->query($sql);
        $sql = "DELETE FROM exercise_record WHERE user_numb = {$u_num} AND exercise_date = '{$date}'";
        $this->db->query($sql);
    }

    function update_exercise($u_num, $nowdate, $nextdate)
    {
        $sql = "UPDATE user_routine_info SET routine_date = '{$nextdate}' WHERE user_numb= {$u_num} AND routine_date = '{$nowdate}'";
        $this->db->query($sql);
        $sql = "UPDATE exercise_record SET exercise_date = '{$nextdate}' WHERE user_numb = {$u_num} AND exercise_date = '{$nowdate}'";
        $this->db->query($sql);
    }

    function get_calorie_info($exercise_time)
    {

        for ($j = 0; $j < count($_SESSION['now_routine']); $j++) {
            $sql = "select kinematic_coefficient* (
                                               SELECT weight
                                               FROM weight
                                               WHERE user_numb = {$_SESSION["user_info"]->user_numb}
                                               ORDER BY date DESC
                                               LIMIT 1
                                              )*{$exercise_time} as calorie_info
                 FROM exercise_info
                 where exercise_numb = {$_SESSION['now_routine'][$j]->exercise_numb};";

            $query = $this->db->query($sql);
            //exit(var_dump($sql));
            if ($query->num_rows() > 0)
                $a[$j] = $query->row();
        }
        //exit(var_dump($a[0]));
        return $a;
    }
}
