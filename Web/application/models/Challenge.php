<?php

/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2016-05-11
 * Time: 오전 10:18
 */
class Challenge extends CI_Model
{
    /*challenge_complete_list 테이블에서 로그인 세션을 이용하여 사용자의 challenge번호 개수를 뽑아옴*/

    function get_challenge_count($user_numb)
    {
        $sql = "SELECT * FROM challenge_complete_list WHERE user_numb = ?";
        $query = $this->db->query($sql, array($user_numb));
        $count = $query->num_rows();

        return $count;
    }
}