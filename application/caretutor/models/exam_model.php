<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * PHP version 5
 *
 * @category  CodeIgniter
 * @author    Ariful Islam
 * @copyright 2014 http://www.oployeelabs.com
 * @version   0.1
 */
class Exam_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function chapter_quiz_info_get() {
        $reloaded_exams = $this->db->select('*')
                                   ->from('ct_userexam')
                                   ->where('userid', $this->session->userdata('id'))
                                   ->where('result', NULL)
                                   ->get()->result();
        // dd($reloaded_exams);
        $this->db->select('*')->from('ct_exams');
        $this->db->order_by("last_appeared_at", "ASC");
        if (!empty($reloaded_exams)) {
            foreach ($reloaded_exams as $key => $value) {
                $this->db->where('examid !=', $value->examid);
            }
        }
        $this->db->limit(1);
        $query = $this->db->get();
        $return = $query->row();

        return $return;
    }

    public function get_rendom_quiz()
    {
        $reloaded_exams = $this->db->select('*')
                                   ->from('ct_userexam')
                                   ->where('userid', $this->session->userdata('id'))
                                   ->where('result', NULL)
                                   ->get()->result();
        // dd($reloaded_exams);
        $this->db->select('*')->from('ct_exams');
        $this->db->order_by("last_appeared_at", "ASC");
        $this->db->where('availableto >=', date('Y-m-d'));
        if (!empty($reloaded_exams)) {
            foreach ($reloaded_exams as $key => $value) {
                $this->db->where('examid !=', $value->examid);
            }
        }
        $this->db->limit(1);
        $query = $this->db->get();
        $return = $query->row();

        // save last appeared at
        if ($return) {
            $update['last_appeared_at'] = date('Y-m-d H:i:s');
            $this->db->where('examid', $return->examid);
            $this->db->update('ct_exams', $update);
        }

        return $return;
    }

    public function quiz_result_put($data) {
        $quiz_result_data = array(
            'userid' => $data['userid'],
            'examid' => $data['examid'],
            'starttime' => date('Y-m-d H:i:s'),
            'endtime' => date('Y-m-d H:i:s'),
            'correctlyanswered' => 0,
            'status' => 'inprogress'
        );

        //$this->db->trans_start();
        if ($this->db->insert('ct_userexam', $quiz_result_data)) {

            return TRUE;
        } else {
            return $this->db->_error_message();
            //return $error;
        }
    }

    public function get_remaining_time($userid, $examid) {
        $sql = "SELECT ((ce.duration*60) - (TIMESTAMPDIFF(SECOND, ue.starttime, NOW()))) as tt FROM `ct_exams` ce left join ct_userexam ue on ue.examid = ce.examid and ue.userid = " . $userid . " Where ce.examid = " . $examid;
        $query = $this->db->query($sql);
        $result = $query->row();
        return $result->tt;
    }

    public function quiz_result_post($data) {

        //$sql = "UPDATE ct_userexam SET correctlyanswered = correctlyanswered+" . $data['correctlyanswered'] . ", status='" . $data['status'] . "', endtime = '" . date('Y-m-d H:i:s') . "' where userid=" . $data['userid'] . " and examid=" . $data['examid'];

        //update score for each exam.
        $sql = "UPDATE ct_userexam SET correctlyanswered =" . $data['correctlyanswered'] . ", status='" . $data['status'] . "', endtime = '" . date('Y-m-d H:i:s') . "' where userid=" . $data['userid'] . " and examid=" . $data['examid'];
        //$this->db->trans_start();
        if ($this->db->query($sql)) {
            log_message('ERROR', "ARIF:" . $this->db->last_query());
            return TRUE;
        } else {
            log_message('ERROR', "ARIF:" . $this->db->_error_message());
            return $this->db->_error_message();
        }
    }

    public function quiz_completed($data) {

        $sql = "UPDATE ct_userexam SET status='" . $data['status'] . "', endtime = '" . date('Y-m-d H:i:s') . "' where userid=" . $data['userid'] . " and examid=" . $data['examid'];

        //$this->db->trans_start();
        if ($this->db->query($sql)) {
            //Select table name
            $table_name = $this->db->dbprefix('exams');

            $this->db->select('*')->from($table_name);
            $this->db->where("examid", $data['examid']);
            $query = $this->db->get();

            //Build contents query
            $return = $query->row();

            return $return;
        } else {
            return $this->db->_error_message();
        }
    }

    public function put_result($userid, $result, $examid) {
        $sql = "UPDATE ct_userexam SET result='" . $result . "' where userid=" . $userid . " and examid=" . $examid;
        if ($this->db->query($sql)) {
            return TRUE;
        }
        return FALSE;
    }

    public function get_exam_result($userid) {
        //Select table name
        $table_name = $this->db->dbprefix('userexam');

        $this->db->select('*')->from($table_name);
        $this->db->where("result", "passed");
        $this->db->where("userid", $userid);
        $query = $this->db->get();

        //Build contents query
        $return = $query->num_rows();

        return $return;
    }

    public function user_exam_result($data) {
        //Select table name
        $table_name = $this->db->dbprefix('userexam');

        $this->db->select('*')->from($table_name);
        $this->db->where("examid", $data['examid']);
        $this->db->where("userid", $data['userid']);
        $query = $this->db->get();

        //Build contents query
        $return = $query->row();

        return $return;
    }

    public function user_failed_exam_result($data) {
        //Select table name
        $table_name = $this->db->dbprefix('userexam');

        $this->db->select('*')->from($table_name);
        $this->db->where("examid", $data['examid']);
        $this->db->where("userid", $data['userid']);
        $this->db->where("result", "failed");
        $query = $this->db->get();

        //Build contents query
        $return = $query->row();

        return $return;
    }

    public function chapter_quiz_question_get($id, $last_id) {
        $this->db->select('*, count(questionid) as total_ques')
                ->from('ct_questions cqq')
                ->where('cqq.examid', $id)
                ->where('cqq.questionid >', $last_id)
                ->order_by('cqq.questionid', 'ASC')
                ->limit(1);

        return $this->db->get()->row();
    }

    public function get_institute($data) {
        //Select table name
        $table_name = $this->db->dbprefix('institute');

        $this->db->select('id, institute')->from($table_name);
        $this->db->like('institute', $data);
        $query = $this->db->get();

        //Build contents query
        $return = $query->result();

        return $return;
    }

    public function get_all_institute() {
        //Select table name
        $table_name = $this->db->dbprefix('institute');

        $this->db->select('id, institute')->from($table_name);
        $query = $this->db->get();

        //Build contents query
        $return = $query->result();

        return $return;
    }

    public function add_institute($data) {
        //Select table name
        $table_name = $this->db->dbprefix('institute');

        $this->db->insert($table_name, $data);

        //Build contents query
        $return = $this->db->insert_id();

        return $return;
    }

    public function get_all_quiz_question($id) {
        $this->db->select('*')
                ->from('ct_questions cqq')
                ->where('cqq.examid', $id)
                ->order_by('cqq.questionid', 'ASC');

        $return = $this->db->get()->result();

        log_message('SSA ERROR', $this->db->last_query());
        return $return;
    }

}

?>
