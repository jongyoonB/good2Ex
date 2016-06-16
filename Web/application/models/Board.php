<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2016-05-13
 * Time: 오전 11:00
 */

class Board extends CI_Model
{
    /*challenge_complete_list 테이블에서 로그인 세션을 이용하여 사용자의 challenge번호 개수를 뽑아옴*/

    function get_board()
    {
        $sql = "SELECT title FROM board WHERE board_category = ?";
        $query = $this->db->query($sql, 1);
        if ($query->num_rows() > 0) {
            $a = $query->result();

            return $a;

        } else {
            return 0;//아이디 실패
        }
    }

    function get_qna()
    {
        $sql = "SELECT title FROM board WHERE board_category = ?";
        $query = $this->db->query($sql, 2);
        if ($query->num_rows() > 0) {
            $a = $query->result();

            return $a;

        } else {
            return 0;//아이디 실패
        }
    }
}