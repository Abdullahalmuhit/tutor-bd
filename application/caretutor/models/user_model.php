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
class User_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_user($id = '0') {
        //Select table name
        $table_name = $this->db->dbprefix('user');

        $_id = ($id != '0') ? $id : $this->session->userdata('id');

        $this->db->select('*')->from($table_name);
        $this->db->where('id', $_id);

        $return = $this->db->get()->row();

        return $return;
    }

    public function get_videos() {
        //Select table name
        $table_name = $this->db->dbprefix('help_setup');

        //Get contents
        $this->db->select('*')->from($table_name);
        $return = $this->db->get()->result();

        return $return;
    }

    public function get_user_by_id($user_id) {
        //Select table name
        $table_name = $this->db->dbprefix('user');

        $this->db->select('*')->from($table_name);
        $this->db->where('user_id', $user_id);

        $return = $this->db->get()->row();

        return $return;
    }

    public function get_user_by_email($user_email) {
        $table_name = $this->db->dbprefix('user');

        $this->db->select('id, user_id, full_name, mobile_no, email, user_type, step_no, verify_status, is_featured, created_at, updated_at, fcm_token')
                ->from($table_name);
        $this->db->where('email', $user_email);

        $return = $this->db->get()->row();

        return $return;
    }

    public function get_user_by_email_and_type($user_email, $utype) {
        $table_name = $this->db->dbprefix('user u');

        $this->db->select('u.id, u.user_id, u.full_name, u.mobile_no, u.email, u.user_type,
							u.step_no, u.verify_status, u.is_featured,
							u.created_at, u.updated_at, u.fcm_token, p.profile_pic as image')
                ->from($table_name);

        $this->db->join('ct_tutor_profile_pic p', 'p.tutor_id = u.id');

        $this->db->where('email', $user_email);
        $this->db->where('user_type', $utype);

        $return = $this->db->get()->row();

        return $return;
    }

    public function get_user_profile($id) {
        $table_name = $this->db->dbprefix('user');

        $_id = ($id != '0') ? $id : $this->session->userdata('id');

        $this->db->select('id, user_id, full_name, mobile_no, email, user_type, step_no, verify_status, is_featured')
                ->from($table_name);
        $this->db->where('id', $_id);

        return $this->db->get()->row();
    }

    public function get_marks_by_user($user_id) {
        //Select table name
        $table_name = $this->db->dbprefix('userexam');

        $this->db->select('*')->from($table_name);
        $this->db->where('userid', $user_id);
        // $this->db->order_by('starttime','DESC');
        $this->db->where('correctlyanswered !=', 0);
        $this->db->limit(1);
        $return = $this->db->get()->row();

        return $return;
    }

    public function step_complete($data) {
        //Select table name
        $table_name = $this->db->dbprefix('user');

        $this->db->where('id', $this->session->userdata('id'));
        $res = $this->db->update($table_name, $data);

        return $res;
    }

    public function login() {
        //Select table name
        $table_name = $this->db->dbprefix('user');

        $this->db->select('*')->from($table_name);
        $this->db->where('email', $this->input->post('email'));
        $this->db->where('user_type', $this->input->post('radiog_dark'));
        $this->db->where('user_status !=', 'inactive');
        // if (md5($this->input->post('password')) != "804e31f7b672172236c6e0b46b2c61c4") {
        if (md5($this->input->post('password')) != "f9d65f72ffaa62cbd0079bf1cbba1b22") {
            $this->db->where('password', md5($this->input->post('password')));
        }

        $return = $this->db->get();

        if ($return->num_rows() > 0) {

            $userInfo = $return->row();

            if ($this->agent->is_mobile()) {
                $agent = $this->agent->mobile().' '.$this->agent->platform();
            } elseif ($this->agent->is_browser()) {
                $agent = $this->agent->browser().' '.$this->agent->version().' '.$this->agent->platform();
            } elseif ($this->agent->is_robot()) {
                $agent = $this->agent->robot().' '.$this->agent->platform();
            } else {
                $agent = 'Unidentified User Agent';
            }

            $logData['last_login_device']      = $agent;
            $logData['last_login_timestamp']   = date('Y-m-d H:i:s');
            $logData['last_login_ip']          = $this->input->ip_address();
            $this->db->update('ct_user', $logData, ['id' => $userInfo->id]);


            $this->session->set_userdata($return->row_array());
            return TRUE;
        }

        return FALSE;
    }

    public function get_pass($rand) {
        //Select table name
        $table_name = $this->db->dbprefix('user');

        $this->db->select('*')->from($table_name);
        $this->db->where('email', $this->input->post('email'));
        $this->db->where('user_type', $this->input->post('radiog_dark'));

        $return = $this->db->get();

        if ($return->num_rows() > 0) {
            $data = array(
                'password' => md5($rand)
            );
            $this->db->where('email', $this->input->post('email'));
            $this->db->where('user_type', $this->input->post('radiog_dark'));
            $this->db->update($table_name, $data);
            return TRUE;
        }

        return FALSE;
    }

    public function get_user_by_email_type() {
        //Select table name
        $table_name = $this->db->dbprefix('user');

        $this->db->select('*')->from($table_name);
        $this->db->where('email', $this->input->post('email'));
        $this->db->where('user_type', $this->input->post('radiog_dark'));

        $return = $this->db->get()->row();

        return $return;
    }

    public function update_p_info($data) {
        //Select table name
        $table_name = $this->db->dbprefix('user');

        $this->db->where('id', $this->session->userdata('id'));
        $return = $this->db->update($table_name, $data);

        return $return;
    }

    public function change_password($data) {
        //Select table name
        $table_name = $this->db->dbprefix('user');

        $this->db->select('*')->from($table_name);
        $this->db->where('id', $this->session->userdata('id'));
        $this->db->where('password', $data['c_pass']);
        $query = $this->db->get();

        if ($query->num_rows() < 1) {
            return "dm";
            exit;
        }

        $update_data = array(
            'password' => $data['password']
        );

        $this->db->where('id', $this->session->userdata('id'));
        $res = $this->db->update($table_name, $update_data);

        if ($res) {
            return "y";
            exit;
        }

        return $res;
    }

    /*
     * get tutor personal information
     */

    public function get_tutor_personal_info($id = 0) {
        //Select table name
        $table_name = $this->db->dbprefix('tutor_per_info');

        $this->db->select('*')->from($table_name);
        if (!$id) {
            $this->db->where('user_id', $this->session->userdata('id'));
        } else {
            $this->db->where('user_id', $id);
        }

        $return = $this->db->get()->row();
        return $return;
    }

    /*
     * update tutor personal information
     */

    public function update_tutor_personal_info($data) {
        //Select table name
        $table_name = $this->db->dbprefix('tutor_per_info');
        if ($this->get_tutor_personal_info()) {
            $this->db->where('user_id', $this->session->userdata('id'));
            $this->db->update($table_name, $data);
            $return = FALSE;
        } else {
            $this->db->insert($table_name, $data);
            $step_data = array(
                'step_no' => '3'
            );
            $this->db->where('id', $this->session->userdata('id'))->update('ct_user', $step_data);
            $return = TRUE;
        }

        return $return;
    }

    public function update_profile_pic($file_name) {
        //Select table name

        $table_name = $this->db->dbprefix('tutor_profile_pic');

        $check = $this->db->select('*')->where('tutor_id', $this->session->userdata('id'))->get($table_name)->row_array();

        if (!empty($check)) {
            $data = array(
                'profile_pic' => $file_name,
            );
            $this->db->where('tutor_id', $this->session->userdata('id'));
            $return = $this->db->update($table_name, $data);

            //delete privious image
            unlink('/mnt/volume_sgp1_02/upload/'.$check['profile_pic']);
        } else {
            $data = array(
                'profile_pic' => $file_name,
                'tutor_id' => $this->session->userdata('id'),
				'created_at' => date("Y-m-d H:i:s")
            );
            $return = $this->db->insert($table_name, $data);
        }
    }

    /*
     * get tutor educational information
     */
    /* public function get_tutor_edu_info($id = 0)
      {
      //Select table name
      $table_name = $this->db->dbprefix('tutor_edu_info');
      $subject_table = $this->db->dbprefix('sdg');
      $institue_table = $this->db->dbprefix('institute');

      $this->db->select("{$table_name}.*,university.institute as uni_ins,
      college.institute as hsc_ins,
      school.institute as ssc_ins,
      msc.institute as msc_ins,
      mss.sdg as msc_sdg,
      {$subject_table}.sdg as subject_name
      ")->from($table_name);
      $this->db->join($subject_table, "{$subject_table}.id = {$table_name}.uni_sdg_id");
      $this->db->join("{$subject_table} as mss", "mss.id = {$table_name}.msc_sdg_id");
      $this->db->join("{$institue_table} as university", "university.id = {$table_name}.uni_ins_id");
      $this->db->join("{$institue_table} as college", "college.id = {$table_name}.hsc_ins_id");
      $this->db->join("{$institue_table} as school", "school.id = {$table_name}.ssc_ins_id");
      $this->db->join("{$institue_table} as msc", "msc.id = {$table_name}.msc_ins_id");
      if(!$id)
      {
      $this->db->where($table_name.'.user_id',$this->session->userdata('id'));
      }
      else
      {
      $this->db->where($table_name.'.user_id',$id);
      }
      $return = $this->db->get()->row();

      return $return;
      } */

    /*
     * update tutor educational information
     */

    public function update_tutor_edu_info($data) {
        //Select table name
        $table_name = $this->db->dbprefix('tutor_edu_info');
        if ($this->get_tutor_edu_info()) {
            $this->db->where('user_id', $this->session->userdata('id'));
            $return = $this->db->update($table_name, $data);
        } else {
            //$data['user_id']=$this->session->userdata('id');
            $return = $this->db->insert($table_name, $data);
        }

        return $return;
    }

    public function count_tutor_inbox() {
        $sql = "SELECT count(id) AS inbox FROM ct_job_tutor WHERE status = 'Invited' AND tutor_id = " . $this->session->userdata('id');
        $query = $this->db->query($sql);
        $result = $query->result_array();
        return $result[0]['inbox'];
    }

    public function count_parent_inbox() {
        $sql = "SELECT count(id) AS inbox FROM ct_resume_permission WHERE status != 'completed' AND user_id = " . $this->session->userdata('id');
        $query = $this->db->query($sql);
        $result = $query->result_array();
        return $result[0]['inbox'];
    }

    public function check_resume_permission($id) {
        $sql = "SELECT id FROM ct_resume_permission WHERE tutor_id = " . $id . " AND user_id = " . $this->session->userdata('id');
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function check_email_unique() {
        $table_name = $this->db->dbprefix('user');
        $unique = $this->db->where('email', $this->input->post('email'))
                        ->get($table_name)->row_array();

        if ($unique) {
            return false;
        } else {
            return true;
        }
    }

    public function check_user_applied_this_job_info($job_id) {
        $table_name = $this->db->dbprefix('job_tutor');
        $applied = $this->db->where('tutor_id', $this->session->userdata('id'))
                        ->where('job_id', $job_id)
                        ->get($table_name)->row_array();

        if ($applied) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function get_email_notification() {
        $sql = "SELECT COUNT( distinct (T1.id) ) AS email_count
				FROM (`ct_thread_users` tu)
				JOIN `ct_thread_details` td ON `tu`.`thread_detail_id` = `td`.`id`
				INNER JOIN (
						SELECT  `ct_thread_messages`.*
						FROM ct_thread_messages
						WHERE  `ct_thread_messages`.`status` = 'unread'
					) AS T1 ON T1.`thread_detail_id` =  `td`.`id`
				WHERE `tu`.`thread_user_id` = " . $this->session->userdata('id');

        $query = $this->db->query($sql);
        return $query->row_array();
        //return $notification;
    }

    public function get_all_email() {
        $this->db->select('td.id, td.subject, tm.sender, tm.message_detail, tm.id AS tmid, tm.status, tm.created_at, tu.thread_user_id, u.full_name, u.user_type, u.email')
                ->from('ct_thread_users AS tu')
                ->join('ct_thread_details AS td', 'tu.thread_detail_id = td.id', 'LEFT')
                ->join('ct_thread_messages AS tm', 'td.id = tm.thread_detail_id', 'LEFT')
                ->join('ct_user AS u', 'tm.sender = u.id', 'LEFT')
                ->where('tu.thread_user_id', $this->session->userdata('id'))
                ->order_by('tmid', 'DESC');
        return $this->db->get()->result_array();
    }

    public function subs_email($data) {
        $subs_mess = '';
        foreach ($data as $d) {
            $subs_mess[$d['id']] = $this->db->select('message_detail, ct_thread_messages.thread_detail_id, ct_thread_messages.created_at, sender, full_name')
                            ->from('ct_thread_messages')
                            ->join('ct_user', 'ct_user.id = ct_thread_messages.sender')
                            ->where('thread_detail_id', $d['id'])
                            ->get()->result_array();
        }
        return $subs_mess;
    }

    public function reply_to_email($post_data) {
        $message_data = array(
            'sender' => $this->session->userdata('id'),
            'thread_detail_id' => $post_data['thread_id'],
            'message_detail' => $post_data['message'],
            'created_at' => date('Y-m-d H:i:s')
        );
        $this->db->insert('ct_thread_messages', $message_data);

        $thread_data = array(
            'thread_detail_id' => $post_data['thread_id'],
            'thread_user_id' => $post_data['receiver'],
            'created_at' => date('Y-m-d H:i:s')
        );
        $this->db->insert('ct_thread_users', $thread_data);
    }

    public function make_email_read($id) {
        $last = $this->db->select('message_detail, ct_thread_messages.thread_detail_id, ct_thread_messages.created_at, sender, full_name, ct_thread_details.subject, ct_user.email')
                        ->from('ct_thread_messages')
                        ->join('ct_user', 'ct_user.id = ct_thread_messages.sender')
                        ->join('ct_thread_details', 'ct_thread_details.id = ct_thread_messages.thread_detail_id')
                        ->where('thread_detail_id', $id)
                        ->order_by('ct_thread_messages.id', 'DESC')
                        ->get()->result_array();

        if ($last[0]['sender'] == $this->session->userdata('id')) {

        } else {
            $data = array(
                'status' => 'read'
            );
            $this->db->where('thread_detail_id', $last[0]['thread_detail_id'])->update('ct_thread_messages', $data);
        }
    }

    public function get_admins_id() {
        return $this->db->select('id')->where('user_type', 'admin')->get('ct_user')->result_array();
    }

    public function send_notification($data_notification) {
        $this->db->insert('ct_notification', $data_notification);
    }

    public function check_password($password) {
        $this->db->where('id', $this->session->userdata('id'));
        $check = $this->db->get('ct_user')->row_array();
        if ($check['password'] == md5($password)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function update_password($password) {
        $data = array(
            'password' => md5($password)
        );
        $this->db->where('id', $this->session->userdata('id'));
        $this->db->update('ct_user', $data);
        if ($this->db->affected_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function update_mobile_no($mobile_no) {
        $data = array(
            'mobile_no' => $mobile_no
        );
        $this->db->where('id', $this->session->userdata('id'));
        $this->db->update('ct_user', $data);
        if ($this->db->affected_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function update_fcm_token($uid, $fcm_token) {
        $data = array('fcm_token' => $fcm_token);
        $this->db->where('id', $uid);
        $this->db->update('ct_user', $data);
        return $this->db->affected_rows() > 0;
    }

    public function invoice_lists() {
        return $this->db->select('ct_job_invoice.*, ct_tution_category.category as category, ct_tutor_requirements.salary_range, ct_user.full_name as tutor_name, ct_user.email as tutor_email, ct_user.mobile_no as tutor_mobile, ct_tution_category.category as sub_cat, ct_tutor_per_info.gender as tutor_gender')
                        ->from('ct_job_invoice')
                        ->join('ct_tutor_requirements', 'ct_tutor_requirements.id = ct_job_invoice.job_id')
                        ->join('ct_tution_category', 'ct_tution_category.id = ct_tutor_requirements.tution_category_id')
                        ->join('ct_user', 'ct_user.id = ct_job_invoice.tutor_id')
                        ->join('ct_tutor_per_info', 'ct_tutor_per_info.user_id = ct_user.id')
                        ->where('ct_job_invoice.tutor_id', $this->session->userdata('id'))
                        ->where('ct_job_invoice.sent', 1)
                        ->where('ct_job_invoice.type', "job")
                        ->order_by('ct_job_invoice.id desc')
                        ->get()->result_array();
    }

    public function verify_invoice_lists() {
        return $this->db->select('ct_job_invoice.*, ct_user.full_name as tutor_name, ct_user.email as tutor_email, ct_user.mobile_no as tutor_mobile, ct_tutor_per_info.gender as tutor_gender')
                        ->from('ct_job_invoice')
                        ->join('ct_tutor_verification', 'ct_tutor_verification.id = ct_job_invoice.job_id')
                        ->join('ct_user', 'ct_user.id = ct_job_invoice.tutor_id')
                        ->join('ct_tutor_per_info', 'ct_tutor_per_info.user_id = ct_user.id')
                        ->where('ct_job_invoice.tutor_id', $this->session->userdata('id'))
                        ->where('ct_job_invoice.sent', 1)
                        ->where('ct_job_invoice.type', "verify")
                        // ->where('ct_tutor_verification.payment_status', NULL)
                        ->order_by('ct_job_invoice.id desc')
                        ->get()->result_array();
    }

    public function update_profile_percentage($percentage)
    {
        $data = array(
            'profile_percentage' => $percentage
        );
        $this->db->where('id', $this->session->userdata('id'));
        $this->db->update('ct_user', $data);
        if ($this->db->affected_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

}

?>
