<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Parents extends CI_Controller {

    /**
     * @author Ariful Islam
     * @link http://www.oployeelabs.com
     * @version 1.0
     */
    var $data;

    function __construct() {
        parent::__construct();

        // echo "<script language=\"javascript\">
        //     var screenWidth = window.screen.width;
        //     if(screenWidth < 800){
        //         window.location.href = 'https://m.caretutors.com';
        //     }
        // </script>";
        
        $this->load->model('user_model');
        $this->load->model('tutor_req_model');

        $emails = $this->user_model->get_all_email();
        $dulpicate = array();
        $distinct_mail = array();
        $count = 0;
        foreach ($emails as $email) {
            if (in_array($email['id'], $dulpicate)) {

            } else {
                array_push($distinct_mail, $email);
                if ($email['sender'] == $this->session->userdata('id')) {

                } else {
                    if ($email['status'] == 'unread') {
                        $count++;
                    }
                }
            }
            array_push($dulpicate, $email['id']);
        }
        //var_dump($distinct_mail);die;
        $this->data['email_count'] = $count;
        $this->data['emails'] = $distinct_mail;

        $notification = $this->tutor_req_model->get_user_notification_list();
        $this->data['notification_count'] = count($notification[0]);
        $this->data['notifications'] = $notification[1];

        $this->session->set_userdata('parent_inbox', $this->user_model->count_parent_inbox());
        if ($this->session->userdata('user_type') != "guardian") {
            //redirect("signin");
            //exit;
        }
    }

    public function index() {
        /* $this->load->model('city_location_model');
          $this->load->model('category_model');

          $data = array(
          'header' 	=> $this->load->view('header_parents','',TRUE),
          'footer' 	=> $this->load->view('footer','',TRUE),
          'city'	 	=> $this->city_location_model->get_city(),
          'category'	=> $this->category_model->get_category()
          );
          $this->load->view('tutor_requirements', $data); */

        $this->req_success();
    }

    public function success_2_req() {
        $return_data = array(
            'status' => 'redirect',
            'url' => 'parents/new_req'
        );
        echo json_encode($return_data);
        exit;
    }

    public function add_tutor_requirements() {
        $this->load->model('tutor_req_model');
        // $this->load->model('notification_model', 'notification');

        $data = array(
            'user_id' => $this->session->userdata('id'),
            'city_id' => $this->input->post('selcity'),
            'location_id' => $this->input->post('sellocation'),
            'tution_category_id' => $this->input->post('selcat'),
            'tution_sub_cat_id' => $this->input->post('selsubcat'),
            'days_per_week' => $this->input->post('selday'),
            'salary_range' => $this->input->post('salary'),
            'preferred_gender' => $this->input->post('selgender'),
            'address' => '',
            'other_req' => $this->input->post('otherreq'),
            'status' => 'post'
        );

        $result = $this->tutor_req_model->add_tutor_req($data);

        if ($result) {
            $this->send_post_req_email();
            $return_data = array(
                'status' => 'redirect',
                'url' => 'parents/req_success'
            );
            // $this->notification->job_post_notification(NULL, $this->session->userdata('id'), 'Website');
            echo json_encode($return_data);
            exit;
        }

        echo json_encode($result);
    }

    public function req_success() {
        $data = array(
            'header' => $this->load->view('header_parents', '', TRUE),
            'footer' => $this->load->view('footer', '', TRUE),
        );
        $this->load->view('req_success', $data);
    }

    public function dashboard_init() {
        $return_data = array(
            'status' => 'redirect',
            'url' => 'parents/dashboard'
        );
        echo json_encode($return_data);
        exit;
    }

    public function home() {
        $this->load->model('tutor_req_model');
        $cvs = array(
            'jobs' => $this->tutor_req_model->get_user_jobs_list(),
            'cvs' => ''
        );
        //var_dump($cvs['jobs']);die;
        $act = array(
            'active' => 'home'
        );

        $data = array(
            'header' => $this->load->view('header_parents', '', TRUE),
            'footer' => $this->load->view('other_footer', '', TRUE),
            'left_menu' => $this->load->view('parents_menu', $act, TRUE),
            'body' => $this->load->view('parent_home', $cvs, TRUE)
        );
        $this->load->view('parent_dashboard', $data);
    }

    public function hire_a_new_tutor() {
        $this->load->model('city_location_model');
        $this->load->model('category_model');
        $act = array(
            'active' => 'home'
        );

        $city_category = array(
            'city' => $this->city_location_model->get_city(),
            'category' => $this->category_model->get_category(),
        );

        $data = array(
            'header' => $this->load->view('header_parents', '', TRUE),
            'footer' => $this->load->view('other_footer', '', TRUE),
            'left_menu' => $this->load->view('parents_menu', $act, TRUE),
            'body' => $this->load->view('hire_a_new_tutor', $city_category, TRUE)
        );
        $this->load->view('parent_dashboard', $data);
    }

    public function parents_new_job_save() {
        if ($this->input->post('sdg')) {
            $subjects = implode(',', $this->input->post('sdg'));
        } else {
            $subjects = '';
        }

        if ($this->input->post('institute_id')) {
            $ins_id = ($this->input->post('institute_id') != "") ? $this->input->post('institute_id') : $this->populate_ins_id();
        } else {
            $ins_id = 0;
        }

        $this->load->model('tutor_req_model');
        $data = array(
            'user_id' => $this->session->userdata('id'),
            'city_id' => $this->input->post('selcity'),
            'location_id' => $this->input->post('sellocation') ? $this->input->post('sellocation') : '104',
            'guardian_name' => $this->input->post('guardian_name') ? $this->input->post('guardian_name') : null,
            'add_contact_num' => $this->input->post('add_contact_num') ? $this->input->post('add_contact_num') : null,
            'student_gender' => $this->input->post('selstgender') ? $this->input->post('selstgender') : null,
            'institute_id' => $ins_id,
            'institute_name' => $this->input->post('institute_name') ? $this->input->post('institute_name') : null,
            'tution_category_id' => $this->input->post('selcat'),
            'tution_sub_cat_id' => $this->input->post('selsubcat'),
            'days_per_week' => $this->input->post('selday'),
            'salary_range' => $this->input->post('salary'),
            'preferred_gender' => $this->input->post('selgender'),
            'address' => $this->input->post('address'),
            'other_req' => $this->input->post('otherreq'),
            'subjects' => $subjects,
            'status' => 'post',
            'skype_id' => $this->input->post('skype_id') ? $this->input->post('skype_id') : null,
            'english_medium_from' => $this->input->post('english_medium_from') ? $this->input->post('english_medium_from') : null,
            'bangla_medium_from' => $this->input->post('bangla_medium_from') ? $this->input->post('bangla_medium_from') : null,
            'date_to_hire' => $this->input->post('date_to_hire') ? date('Y-m-d', strtotime($this->input->post('date_to_hire'))) : null
        );

        if ($this->input->post('tutoring_time')) {
            $data['tutoring_time'] = date('H:i:s', strtotime($this->input->post('tutoring_time')));
        }

        //log_message("ERROR","ADDRESS:".$this->input->post('address'));

        $result = $this->tutor_req_model->add_tutor_req($data);

        $this->load->model('user_model');
        $this->load->model('notification_model', 'notification');

        // $admins = $this->user_model->get_admins_id();
        // $message = 'A new job has been posted. Job ID: '.$result;
        // foreach ($admins as $admin) {
        //     $this->send_notification($this->session->userdata('id'), $admin['id'], $message);
        // }

        $this->session->set_userdata("gretings", "gretings");

        $return_data = array(
            'status' => 'redirect',
            'url' => "parents/dashboard"
        );
        $this->notification->job_post_notification($result, $this->session->userdata('id'), 'Website');
        echo json_encode($return_data);
        exit;
    }

    public function edit_job() {
        $this->load->model('city_location_model');
        $this->load->model('category_model');
        $this->load->model('tutor_req_model');
        $this->load->model('city_location_model');
        $result = $this->category_model->get_sub_category($cat_id);
        $job_result = $this->tutor_req_model->get_spec_req($this->input->post('job_id'));
        $act = array(
            'active' => 'home'
        );

        $data = array(
            'city' => $this->city_location_model->get_city(),
            'location' => $this->city_location_model->get_location($job_result[0]->city_id),
            'category' => $this->category_model->get_category(),
            'courses' => $this->category_model->get_sub_category($job_result[0]->tution_category_id),
            'sdg' => $this->category_model->get_class_course($job_result[0]->tution_sub_cat_id),
            'job' => $job_result
        );

        $this->load->view('edit_job', $data);
    }

    public function parents_job_edit() {
        if ($this->input->post('sdg')) {
            $subjects = implode(',', $this->input->post('sdg'));
        } else {
            $subjects = '';
        }

        if ($this->input->post('institute_id')) {
            $ins_id = ($this->input->post('institute_id') != "") ? $this->input->post('institute_id') : $this->populate_ins_id();
        } else {
            $ins_id = 0;
        }
        $this->load->model('tutor_req_model');
        $data = array(
            'city_id' => $this->input->post('selcity'),
            'location_id' => $this->input->post('sellocation') ? $this->input->post('sellocation') : '104',
            //'guardian_name'			=> $this->input->post('guardian_name')?$this->input->post('guardian_name'):'',
            //'add_contact_num'		=> $this->input->post('add_contact_num')?$this->input->post('add_contact_num'):'',
            'student_gender' => $this->input->post('selstgender') ? $this->input->post('selstgender') : '',
            'institute_id' => $ins_id,
            'institute_name' => $this->input->post('institute_name') ? $this->input->post('institute_name') : "",
            'tution_category_id' => $this->input->post('selcat'),
            'tution_sub_cat_id' => $this->input->post('selsubcat'),
            'days_per_week' => $this->input->post('selday'),
            'tutoring_time' => date('H:i:s', strtotime($this->input->post('tutoring_time'))),
            'salary_range' => $this->input->post('salary_range'),
            'preferred_gender' => $this->input->post('selgender'),
            'address' => $this->input->post('address'),
            'no_of_student' => $this->input->post('no_of_student'),
            'other_req' => $this->input->post('otherreq'),
            'subjects' => $subjects,
            'status' => 'post',
            'online' => '0',
            'skype_id' => $this->input->post('skype_id') ? $this->input->post('skype_id') : '',
            'english_medium_from' => $this->input->post('english_medium_from') ? $this->input->post('english_medium_from') : '',
            'bangla_medium_from' => $this->input->post('bangla_medium_from') ? $this->input->post('bangla_medium_from') : '',
            'date_to_hire' => $this->input->post('date_to_hire') ? date('Y-m-d', strtotime($this->input->post('date_to_hire'))) : ''
        );

        $result = $this->tutor_req_model->update_tutor_req($data, $this->input->post('job_id'));

        $this->load->model('user_model');
        $this->load->model('notification_model', 'notification');
        /* $user_data = array(
          'full_name' => $this->input->post('full_name'),
          'mobile_no' => $this->input->post('mobile_no'),
          'email' => $this->input->post('email'),
          );
          $result = $this->user_model->update_p_info($user_data); */
        $return_data = array(
            'status' => 'redirect',
            'url' => "parents/dashboard"
        );
        $this->notification->job_update_notification($this->input->post('job_id'), $this->session->userdata('id'), 'Website');
        echo json_encode($return_data);
        exit;
    }

    public function dashboard() {
        
    
        $this->load->model('city_location_model');
        $this->load->model('category_model');
        $this->load->model('sdg_model');
        $this->load->model('tutor_req_model');
        $this->load->model('request_verify_model', 'verify');
       
        $jobs = $this->tutor_req_model->get_user_jobs_list();
       
        $cvs = array();
        $selected = array();
        $tutor_id = "";
        foreach ((array) $jobs as $key => $job) {
            $cvs[$job->id] = $this->tutor_req_model->get_jobs_cv_list($job->id);
            $selected[$job->id] = $this->tutor_req_model->get_client_selected_tutor($job->id);
        }
        
        $data = array(
            'city' => $this->city_location_model->get_city(),
            'category' => $this->category_model->get_category(),
            'jobs' => $jobs,
            'cvs' => $cvs,
            'selected' => $selected,
            'email_count' => $this->data['email_count'],
            'exam_result' => '',
            'user_verification' => '',
            'emails' => $this->data['emails'],
            'notification_count' => $this->data['notification_count'],
            'notifications' => $this->data['notifications'],
            'includePage' => 'caretutor_parents_dashboard'
        );
        
        $this->load->view('panel', $data);
    }

    public function view_job($id) {

        $findJobs = find('ct_tutor_requirements', 'id as job_id', ['id' => $id,'user_id' => $this->session->userdata('id')]);
        if (empty($findJobs)) {
            $this->load->view('404');
            return;
        }

        $this->load->model('tutor_req_model');
        $job_result = $this->tutor_req_model->get_spec_req($id);

        $data = array(
            'email_count' => $this->data['email_count'],
            'emails' => $this->data['emails'],
            'notification_count' => $this->data['notification_count'],
            'notifications' => $this->data['notifications'],
            'job' => $job_result,
            'user_verification' => "",
            'includePage' => 'caretutor_job_details'
        );
        //var_dump($data['job']);die;
        $this->load->view('panel', $data);
    }

    public function view_cvs() {
        $data = array(
            'includePage' => 'caretutor_tutor_cvs'
        );
        $this->load->view('panel', $data);
    }

    public function job_edit($id) {

        $findJobs = find('ct_tutor_requirements', 'id as job_id', ['id' => $id,'user_id' => $this->session->userdata('id')]);
        if (empty($findJobs)) {
            $this->load->view('404');
            return;
        }

        $this->load->model('city_location_model');
        $this->load->model('category_model');
        $this->load->model('tutor_req_model');
        $this->load->model('city_location_model');

        $job_result = $this->tutor_req_model->get_spec_req($id);

        $data = array(
            'city' => $this->city_location_model->get_city(),
            'location' => $this->city_location_model->get_location($job_result[0]->city_id),
            'category' => $this->category_model->get_category(),
            'courses' => $this->category_model->get_sub_category($job_result[0]->tution_category_id),
            'sdg' => $this->category_model->get_class_course($job_result[0]->tution_sub_cat_id),
            'job' => $job_result,
            'email_count' => $this->data['email_count'],
            'emails' => $this->data['emails'],
            'notification_count' => $this->data['notification_count'],
            'notifications' => $this->data['notifications'],
            'user_verification' => "",
            'includePage' => 'caretutor_job_edit'
        );
//var_dump($data['location']);die;
        $this->load->view('panel', $data);
    }

    public function edit_profile() {
        $this->load->model('user_model');

        $pro = array(
            'profile' => $this->user_model->get_user()
        );

        $act = array(
            'active' => 'profile'
        );

        $data = array(
            'header' => $this->load->view('header_parents', '', TRUE),
            'footer' => $this->load->view('footer', '', TRUE),
            'left_menu' => $this->load->view('parents_menu', $act, TRUE),
            'body' => $this->load->view('modify_p_profile', $pro, TRUE)
        );

        $this->load->view('parent_dashboard', $data);
    }

    public function update_p_profile() {
        $this->load->model('user_model');

        $data = array(
            'full_name' => $this->input->post('fullname'),
            'mobile_no' => $this->input->post('mobile_no')
        );

        $result = $this->user_model->update_p_info($data);

        if ($result) {
            $return_data = array(
                'status' => 'redirect',
                'url' => 'parents/dashboard'
            );
            echo json_encode($return_data);
            exit;
        }

        echo json_encode($result);
    }

    public function req_status() {
        $this->load->model('tutor_req_model');

        $pro = array(
            'profile' => $this->tutor_req_model->get_req_status()
        );

        $data = array(
            'header' => $this->load->view('header_parents', '', TRUE),
            'footer' => $this->load->view('footer', '', TRUE),
            'left_menu' => $this->load->view('parents_menu', '', TRUE),
            'body' => $this->load->view('modify_p_profile', $pro, TRUE)
        );

        $this->load->view('parent_dashboard', $data);
    }

    public function new_req($m = "n") {
        $this->load->model('city_location_model');
        $this->load->model('category_model');
        $this->load->model('sdg_model');

        $pro = array(
            'city' => $this->city_location_model->get_city(),
            'category' => $this->category_model->get_category(),
            'sdg' => $this->sdg_model->get_all_sdg(true),
            'm' => $m
        );

        $act = array(
            'active' => 'req'
        );

        $data = array(
            'header' => $this->load->view('header_parents', '', TRUE),
            'footer' => $this->load->view('footer', '', TRUE),
            'left_menu' => $this->load->view('parents_menu', $act, TRUE),
            'body' => $this->load->view('p_new_req', $pro, TRUE)
        );
        $this->load->view('parent_dashboard', $data);
    }

    public function req_post_success() {
        $this->load->model('city_location_model');
        $this->load->model('category_model');
        $this->load->model('sdg_model');

        $pro = array(
            'city' => $this->city_location_model->get_city(),
            'category' => $this->category_model->get_category(),
            'sdg' => $this->sdg_model->get_all_sdg()
        );

        $act = array(
            'active' => 'req'
        );

        $data = array(
            'header' => $this->load->view('header_parents', '', TRUE),
            'footer' => $this->load->view('footer', '', TRUE),
            'left_menu' => $this->load->view('parents_menu', $act, TRUE),
            'body' => $this->load->view('req_post_success', $pro, TRUE)
        );
        $this->load->view('parent_dashboard', $data);
    }

    public function new_tutor_requirements() {
        $ins_id = ($this->input->post('institute_id') != "") ? $this->input->post('institute_id') : $this->populate_ins_id();
        $subjects = implode(',', $this->input->post('sdg'));

        $this->load->model('tutor_req_model');

        $data = array(
            'user_id' => $this->session->userdata('id'),
            'city_id' => $this->input->post('selcity'),
            'location_id' => $this->input->post('sellocation'),
            'guardian_name' => $this->input->post('guardian_name'),
            'add_contact_num' => $this->input->post('add_contact_num'),
            'student_gender' => $this->input->post('selstgender'),
            'institute_id' => $ins_id,
            'institute_name' => $this->input->post('institute_name') ? $this->input->post('institute_name') : "",
            'tution_category_id' => $this->input->post('selcat'),
            'tution_sub_cat_id' => $this->input->post('selsubcat'),
            'days_per_week' => $this->input->post('selday'),
            'salary_range' => $this->input->post('salary'),
            'preferred_gender' => $this->input->post('selgender'),
            'address' => $this->input->post('address'),
            'other_req' => $this->input->post('otherreq'),
            'subjects' => $subjects,
            'status' => 'post'
        );

        $result = $this->tutor_req_model->add_tutor_req($data);
        /* $this->load->model('user_model');

          $admins = $this->user_model->get_admins_id();
          $message = $this->session->userdata('id').' client posted a job.';
          foreach($admins as $admin)
          {
          $this->send_notification($this->session->userdata('id'), $admin['id'], $message);
          } */
        if ($result) {
            //@todo send_sms here
            $this->send_post_req_email();
            $return_data = array(
                'status' => 'redirect',
                'url' => 'parents/req_post_success'
            );
            echo json_encode($return_data);
            exit;
        }

        echo json_encode($result);
    }

    public function edit_password($m = "n") {
        $pro = array(
            'm' => $m
        );

        $act = array(
            'active' => 'chp'
        );

        $data = array(
            'header' => $this->load->view('header_parents', '', TRUE),
            'footer' => $this->load->view('footer', '', TRUE),
            'left_menu' => $this->load->view('parents_menu', $act, TRUE),
            'body' => $this->load->view('modify_p_pass', $pro, TRUE)
        );
        $this->load->view('parent_dashboard', $data);
    }

    public function update_p_pass() {
        $this->load->model('user_model');

        $data = array(
            'user_id' => $this->session->userdata('id'),
            'c_pass' => md5($this->input->post('cpass')),
            'password' => md5($this->input->post('password'))
        );

        $result = $this->user_model->change_password($data);

        if ($result == "dm") {
            $return_data = array(
                'status' => 'redirect',
                'url' => 'parents/edit_password/dm'
            );
            echo json_encode($return_data);
            exit;
        } else if ($result == "y") {
            $this->send_email();
            $return_data = array(
                'status' => 'redirect',
                'url' => 'parents/edit_password/y'
            );
            echo json_encode($return_data);
            exit;
        }

        echo json_encode($result);
    }

    public function send_email() {
        $this->load->library('mailer');

        $subject = "Your password has been changed";

        $data = array(
            'intro' => "Dear " . $this->session->userdata('full_name'),
            'body' => "Your password has been changed successfully. Your new password is:<br/>Password: {$this->input->post('password')}"
        );


        $this->mailer->send_mail($this->session->userdata('email'), $subject, $this->load->view('mail_template', $data, TRUE));
    }

    public function send_post_req_email() {
        $this->load->library('mailer');

        $subject = "Successfully posted a tutoring job";

        $data = array(
            'intro' => "Dear " . $this->session->userdata('full_name'),
            'body' => "You have successfully posted a tutoring job on our site. You�ll receive 5(max) best tutor CV�s as soon as our system find the best tutor whose expertise strongly match your demand. Please check your Inbox (caretutors.com profile) and Email after a while. Call us at +88 01756441122 if you have any further queries."
        );


        $this->mailer->send_mail($this->session->userdata('email'), $subject, $this->load->view('mail_template', $data, TRUE));
    }

    public function populate_ins_id() {
        $this->load->model('institute_model');

        $data = array(
            'institute' => $this->input->post('institute')
        );

        $result = $this->institute_model->add_institute($data);

        return $result;
    }

    public function show_all_request() {
        $this->load->model('tutor_req_model');

        $res = $this->tutor_req_model->get_all_req();

        $act = array(
            'active' => 'edit',
            'profile' => $res
        );

        $data = array(
            'header' => $this->load->view('header_parents', '', TRUE),
            'footer' => $this->load->view('footer', '', TRUE),
            'left_menu' => $this->load->view('parents_menu', $act, TRUE),
            'body' => $this->load->view('show_all_req', $act, TRUE)
        );
        $this->load->view('parent_dashboard', $data);
    }

    public function show_req($id) {
        $this->load->model('tutor_req_model');

        $res = $this->tutor_req_model->get_spec_req($id);

        $act = array(
            'active' => 'edit',
            'profile' => $res
        );

        $data = array(
            'header' => $this->load->view('header_parents', '', TRUE),
            'footer' => $this->load->view('footer', '', TRUE),
            'left_menu' => $this->load->view('parents_menu', $act, TRUE),
            'body' => $this->load->view('show_spec_req', $act, TRUE)
        );
        $this->load->view('parent_dashboard', $data);
    }

    public function edit_req($id) {
        $this->load->model('tutor_req_model');
        $this->load->model('city_location_model');
        $this->load->model('category_model');
        $this->load->model('sdg_model');

        $res = $this->tutor_req_model->get_spec_req($id);

        $act = array(
            'active' => 'edit',
            'profile' => $res,
            'city' => $this->city_location_model->get_city(),
            'category' => $this->category_model->get_category(),
            'sdg' => $this->sdg_model->get_all_sdg(true),
        );

        $data = array(
            'header' => $this->load->view('header_parents', '', TRUE),
            'footer' => $this->load->view('footer', '', TRUE),
            'left_menu' => $this->load->view('parents_menu', $act, TRUE),
            'body' => $this->load->view('modify_req', $act, TRUE)
        );
        $this->load->view('parent_dashboard', $data);
    }

    public function update_tutor_requirements() {
        $ins_id = ($this->input->post('institute_id') != "") ? $this->input->post('institute_id') : $this->populate_ins_id();

        $this->load->model('tutor_req_model');

        $id = $this->input->post('id');

        $subjects = implode(',', $this->input->post('sdg'));

        $data = array(
            'user_id' => $this->session->userdata('id'),
            'city_id' => $this->input->post('selcity'),
            /* 'location_id' 			=> $this->input->post('sellocation'), */
            'guardian_name' => $this->input->post('guardian_name'),
            'add_contact_num' => $this->input->post('add_contact_num'),
            'student_gender' => $this->input->post('selstgender'),
            'institute_id' => $ins_id,
            'institute_name' => $this->input->post('institute_name') ? $this->input->post('institute_name') : "",
            'tution_category_id' => $this->input->post('selcat'),
            /* 'tution_sub_cat_id'		=> $this->input->post('selsubcat'), */
            'days_per_week' => $this->input->post('selday'),
            'salary_range' => $this->input->post('salary'),
            'preferred_gender' => $this->input->post('selgender'),
            'address' => $this->input->post('address'),
            'other_req' => $this->input->post('otherreq'),
            'subjects' => $subjects
                /* 'status' 				=> 'post' */
        );

        $result = $this->tutor_req_model->update_tutor_req($data, $id);

        if ($result) {
            $return_data = array(
                'status' => 'redirect',
                'url' => 'parents/show_req/' . $id
            );
            echo json_encode($return_data);
            exit;
        }

        echo json_encode($result);
    }

    public function show_all_resume() {
        $this->load->model('tutor_req_model');

        $res = $this->tutor_req_model->get_all_resume();

        $act = array(
            'active' => 'inbox',
            'profile' => $res
        );

        $data = array(
            'header' => $this->load->view('header_parents', '', TRUE),
            'footer' => $this->load->view('footer', '', TRUE),
            'left_menu' => $this->load->view('parents_menu', $act, TRUE),
            'body' => $this->load->view('show_all_resume_list', $act, TRUE)
        );
        $this->load->view('parent_dashboard', $data);
    }

    public function show_profile($id) {
        //$this->session->set_userdata(array('id'=>$id));

        $this->load->model('user_model');
        if (!$this->user_model->check_resume_permission($id)) {
            redirect(site_url('parents/dashboard'));
            exit;
        }

        $this->load->model('tution_info_model');

        $this->load->model('sdg_model');
        $this->load->model('city_location_model');
        $this->load->model('category_model');
        $this->load->model('tutor_req_model');

        $res = $this->tutor_req_model->get_all_resume();
        $check_data = $this->user_model->get_user($id);

        $t_info = $this->tution_info_model->get_tution_info($id);
        $sub_ids = explode(',', $t_info[0]['pref_subjects']);
        $sub = $this->sdg_model->get_sdg_array($sub_ids);

        $cat_ids = explode(',', $t_info[0]['pref_medium']);
        $cats = $this->category_model->get_category_array($cat_ids);

        $loc_ids = explode(',', $t_info[0]['pref_locations']);
        $loc = $this->city_location_model->get_locs_array($loc_ids);

        $pro = array(
            'profile' => $check_data,
            'personal_info' => $this->user_model->get_tutor_personal_info($id),
            'edu_info' => $this->user_model->get_tutor_edu_info($id),
            'tut_info' => $this->tution_info_model->get_tution_info($id),
            'subjects' => $sub,
            'categories' => $cats,
            'locations' => $loc,
            'con_det' => 'no'
        );

        $act = array(
            'active' => 'inbox',
            'profile' => $res
        );

        $data = array(
            'header' => $this->load->view('header_parents', '', TRUE),
            'footer' => $this->load->view('footer', '', TRUE),
            'left_menu' => $this->load->view('parents_menu', $act, TRUE),
            'body' => $this->load->view('tutor_profile', $pro, TRUE)
        );

        $this->load->view('parent_dashboard', $data);
    }

    public function select_tutor_from_resume_list($tutor_id, $job_id) {
        $this->load->model('tution_info_model');
        if ($this->tution_info_model->select_tutor_from_resume_list($tutor_id, $job_id)) {
            echo "Success!";
        } else {
            echo "Error;";
        }
    }

    public function email_list() {
        $data = array(
            'email_count' => $this->data['email_count'],
            'emails' => $this->data['emails'],
            'notification_count' => $this->data['notification_count'],
            'notifications' => $this->data['notifications'],
            'subs_emails' => $this->user_model->subs_email($this->data['emails']),
            'includePage' => 'caretutor_parents_email_list'
        );
        $this->load->view('panel', $data);
    }

    public function reply_to_email() {
        $this->user_model->reply_to_email($this->input->post());
        echo TRUE;
    }

    public function email_read_status() {
        $result = $this->user_model->make_email_read($this->input->post('thread_id'));
        echo TRUE;
    }

    public function tutor_profile_view($tutor_id, $job_id) {

        $findCv = find('ct_resume_permission', '*', ['user_id' => $this->session->userdata('id'), 'job_id' => $job_id, 'tutor_id' => $tutor_id]);
        if (empty($findCv)) {
            $this->load->view('404');
            return;
        }

        $this->load->model('city_location_model');
        $this->load->model('category_model');
        $this->load->model('institute_model');
        $this->load->model('tution_info_model');
        $this->load->model('tutor_req_model');
        $this->load->model('request_verify_model', 'verify');

        $data = array(
            'status' => 'viewed',
        );

        $this->tution_info_model->update_cv($data, $tutor_id, $job_id);

        $t_info = $this->tution_info_model->get_tution_info($tutor_id);


        if (!empty($t_info)) {
            $cat_ids = explode(',', $t_info[0]['pref_medium']);

            if (!empty($cat_ids)) {
                $cateories_class = $this->category_model->ajax_load_class_tutor_job_search($cat_ids);
            } else {
                $cateories_class = '';
            }

            $class_ids = explode(',', $t_info[0]['pref_class']);
            if (!empty($class_ids)) {
                $classes_sub = $this->category_model->ajax_load_subjects_tutor_job_search($class_ids);
            } else {
                $classes_sub = '';
            }

            $sub_ids = explode(',', $t_info[0]['pref_subjects']);

            $location_info = $this->tution_info_model->get_tution_location_info($tutor_id);

            $available_days = explode(",", $t_info[0]['available_days']);
        } else {
            $location_info = $t_info = $cat_ids = $cateories_class[1] = $class_ids = $classes_sub[1] = $sub_ids = $loc_ids = $available_days = $cities_location = '';
        }

        $user_info = $this->user_model->get_user($tutor_id);
        $step = $user_info->step_no;

        $credential_info = $this->tution_info_model->get_credential_info();

        $data = array(
            'tution_info' => $t_info,
            'edu_infos' => $this->tution_info_model->get_tutor_all_edu_info($tutor_id),
            'personal_info' => $this->tution_info_model->get_personal_info($tutor_id),
            'profile_pic_info' => $this->tution_info_model->get_profile_pic_info($tutor_id),
            'user_data' => $user_info,
            'marks' => $this->user_model->get_marks_by_user($tutor_id),
            'cateories_class' => $cateories_class,
            'selected_catagory' => $cateories_class[0],
            'class_ids' => $class_ids,
            'classes_sub' => $classes_sub,
            'sub_ids' => $sub_ids,
            'location_info' => $location_info,
            'credential_info' => $credential_info,
            'available_days' => $available_days,
            'email_count' => $this->data['email_count'],
            'emails' => $this->data['emails'],
            'notification_count' => $this->data['notification_count'],
            'notifications' => $this->data['notifications'],
            'tutor_id' => $tutor_id,
            'job_id' => $job_id,
            'job_tutor_info' => find('ct_job_tutor', '*', ['tutor_id' => $tutor_id, 'job_id' => $job_id]),
            'selected' => $this->tutor_req_model->get_client_selected_tutor($job_id),
            'includePage' => 'caretutor_parents_tutor_profile_plain_view'
        );

        $this->load->view('panel', $data);
    }

    public function select_tutor_from_cv() {

        $findTutor = $this->db->query("select id from ct_job_tutor where job_id = " . $this->input->post('job_id') . " and tutor_id = " . $this->input->post('tutor_id') . " and ( status = 'Appointed' or status = 'Rejected' or status = 'Assign' or status = 'Selected' )")->row();
        if (!empty($findTutor)) {
            echo json_encode(['status' => 0, 'msg' => 'You can not select this tutor.']);
            exit;
        }

        $this->load->model('tutor_req_model');
        $this->load->model('user_model');
        $result = $this->tutor_req_model->select_tutor_from_cv($this->input->post());

        if ($result) {
            // $admins = $this->user_model->get_admins_id();
            // $message = $this->input->post('job_id') . ' client select a tutor.';
            // $this->send_notification($this->session->userdata('id'), 42, $message);
            echo json_encode(['status' => 1, 'msg' => 'You selected tutor successfully. Wait for admin approval.']);
        } else {
            echo json_encode(['status' => 0, 'msg' => 'You can not select this tutor.']);
        }
    }

    public function notification_status_change() {
        $this->load->model('tutor_req_model');
        $result = $this->tutor_req_model->notification_status_change($this->session->userdata('id'));
        echo TRUE;
    }

    function send_notification($sender_id, $receiver_id, $message) {
        $this->load->model('user_model');
        $data_notification = array(
            'receiver_id' => $receiver_id,
            'sender_id' => $sender_id,
            'notification' => $message,
            'created_at' => date('Y-m-d H:i:s')
        );
        $this->user_model->send_notification($data_notification);
    }

    public function settings() {
       
        $this->load->model('request_verify_model', 'verify');
        $user_info = $this->user_model->get_user($this->session->userdata('id'));
        $user_verifys = $this->verify->get_verify_data_by_user($this->session->userdata('id'));
        $user_verify = (!empty($user_verifys)) ? $user_verifys->status : 0;
        $data = array(
            'user_data' => $user_info,
            'email_count' => $this->data['email_count'],
            'emails' => $this->data['emails'],
            'notification_count' => $this->data['notification_count'],
            'notifications' => $this->data['notifications'],
            'subs_emails' => $this->user_model->subs_email($this->data['emails']),
            'user_verification' => $user_verify,
            'includePage' => 'caretutor_parents_settings'
        );
        $this->load->view('panel', $data);
    }

    public function check_password() {
        $this->load->model('user_model');
        $return = $this->user_model->check_password($this->input->post('previous_password'));
        if ($return == TRUE) {
            echo 1;
        } elseif ($return == FALSE) {
            echo 0;
        }
    }

    public function update_password() {
        $this->load->model('user_model');
        $return = $this->user_model->update_password($this->input->post('password'));
        if ($return == TRUE) {
            echo 1;
        } elseif ($return == FALSE) {
            echo 0;
        }
    }

    public function update_mobile_no() {
        $this->load->model('user_model');
        $return = $this->user_model->update_mobile_no($this->input->post('mobile_no'));
        if ($return == TRUE) {
            echo 1;
        } elseif ($return == FALSE) {
            echo 0;
        }
    }

    public function select_good_tutor() {

        $data = array(
            'email_count' => $this->data['email_count'],
            'emails' => $this->data['emails'],
            'notification_count' => $this->data['notification_count'],
            'notifications' => $this->data['notifications'],
            'subs_emails' => $this->user_model->subs_email($this->data['emails']),
            'includePage' => 'caretutor_parents_select_good_tutor'
        );
        $this->load->view('panel', $data);
    }

    public function terms_and_conditions() {
        $data = array(
            'email_count' => $this->data['email_count'],
            'emails' => $this->data['emails'],
            'notification_count' => $this->data['notification_count'],
            'notifications' => $this->data['notifications'],
            'subs_emails' => $this->user_model->subs_email($this->data['emails']),
            'includePage' => 'caretutor_parents_terms_and_condition'
        );
        $this->load->view('panel', $data);
    }

    public function how_it_works() {
        $data = array(
            'email_count' => $this->data['email_count'],
            'emails' => $this->data['emails'],
            'notification_count' => $this->data['notification_count'],
            'notifications' => $this->data['notifications'],
            'subs_emails' => $this->user_model->subs_email($this->data['emails']),
            'includePage' => 'caretutor_parents_how_it_works'
        );
        $this->load->view('panel', $data);
    }

    public function profile() {
       
        $this->load->model('request_verify_model', 'verify');
        $user_info = $this->user_model->get_user($this->session->userdata('id'));
        $user_verifys = $this->verify->get_verify_data_by_user($this->session->userdata('id'));
        $user_verify = (!empty($user_verifys)) ? $user_verifys->status : 0;

        $data = array(
            'email_count' => $this->data['email_count'],
            'emails' => $this->data['emails'],
            'notification_count' => $this->data['notification_count'],
            'notifications' => $this->data['notifications'],
            'subs_emails' => $this->user_model->subs_email($this->data['emails']),
            'user_info' => $user_info,
            'user_verification' => $user_verify,
            'includePage' => 'caretutor_parents_profile'
        );
        $this->load->view('panel', $data);
    }

    /* public function send_email()
      {
      $this->load->library('mailer');

      $subject = "Please verify your account";
      $verify_link = base_url().'registration/verify/'.$this->session->userdata('user_id').'/1/'.$this->session->userdata('user_type');
      $verify_link_final = "<a href='{$verify_link}'>{$verify_link}</a>";

      $body = ($this->session->userdata('user_type')=='tutor')?"Thanks for creating an account with caretutors.com. Your login credentials are:<br/><br/>Email: {$this->input->post('email')}<br/>Password: {$this->input->post('password')}<br /><br /> You need to verify your account by clicking the following link: <br />{$verify_link_final}":"Thanks for creating an account with caretutors.com. To get your desired tutor please post your tutor requirements minutely. It will take only few minutes. <br/><br/>Your login credentials are:<br/><br/>Email: {$this->input->post('email')}<br/>Password: {$this->input->post('password')}";

      $data = array(
      'intro' => "Dear ".$this->input->post('full_name'),
      'body' 	=> $body
      );


      $this->mailer->send_mail($this->input->post('email'), $subject, $this->load->view('mail_template',$data,TRUE));
      }

      public function send_sms($mobile)
      {

      if ($this->session->userdata('user_type') == 'tutor')
      {
      return;
      exit;
      }

      $message = rawurlencode('Thanks for creating an account with caretutors.com. To get your desired tutor please post your tutor requirements minutely.');
      $this->load->library('sms');
      $result = $this->sms->send_sms($mobile, $message);

      } */
}

/* End of file parents.php */
/* Location: ./application/controllers/parents.php */
