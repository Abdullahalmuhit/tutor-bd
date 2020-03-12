<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Landing extends CI_Controller {

    /**
     * @author Ariful Islam
     * @link http://www.oployeelabs.com
     * @version 1.0
     */

    public function __construct()
    {
        parent::__construct();
        // echo "<script language=\"javascript\">
        //     var screenWidth = window.screen.width;
        //     if(screenWidth < 800){
        //         window.location.href = 'https://m.caretutors.com';
        //     }
        // </script>";
    }

    public function index() {
        echo "<script language=\"javascript\">
            var screenWidth = window.screen.width;
            if(screenWidth < 800){
                window.location.href = 'https://m.caretutors.com';
            }
        </script>";

        /* if ($this->session->userdata('user_type'))
          {
          if ($this->session->userdata('user_type') == 'guardian')
          {
          redirect('parents/dashboard','refresh');
          }
          elseif ($this->session->userdata('user_type') == 'tutor')
          {
          redirect('tutor/dashboard','refresh');
          }
          exit;
          } */
        //$this->check_is_logged_in();
        //$this->sendMail();
        $this->load->model('city_location_model');
        $this->load->model('category_model');
        $this->load->model('sdg_model');
        $this->load->model('tutor_req_model');
        $this->load->model('testimonial_model');

        $stat = $this->db->query("select 
            (select count(*) from ct_job_tutor ) total_applied, 
            (select count(*) from ct_tutor_requirements ) total_job, 
            (select count(*) from ct_tutor_requirements where online = '1' and live_to >= CURDATE() ) total_live_jobs, 
            (select avg(points) from ct_job_tutor where points > 2 limit 1) total_rating
            ")->row();

        $data = array(
            'header' => $this->load->view('header', '', TRUE),
            'footer' => $this->load->view('footer', '', TRUE),
            //'featured_tutors'	=> $this->tutor_req_model->get_all_featured_tutors(),
            'testimonials' => $this->testimonial_model->get_all_testimonial(),
            'city' => $this->city_location_model->get_city(),
            'category' => $this->category_model->get_category(),
            'sdg' => $this->sdg_model->get_all_sdg(true),
            'flag' => '0',
            'stat' => $stat
        );

        $this->load->view('home', $data);
    }

    public function check_is_logged_in() {
        if ($this->session->userdata('user_type')) {
            if ($this->session->userdata('user_type') == 'guardian') {
                redirect('parents/dashboard', 'refresh');
            } elseif ($this->session->userdata('user_type') == 'tutor') {
                redirect('tutor/dashboard', 'refresh');
            }
            exit;
        }
    }

    public function job_board($page = 0) {
        echo "<script language=\"javascript\">
            var screenWidth = window.screen.width;
            if(screenWidth < 800){
                window.location.href = 'https://m.caretutors.com';
            }
        </script>";
        
        //$this->check_is_logged_in();
        $this->load->model('city_location_model');
        $this->load->model('category_model');
        $this->load->model('tutor_req_model');

        $count_job = $this->get_all_job_count($city = '', $location = '', $category = '', $class = '', $gender = '');
        
        $offset = $this->all_job_pagination($count_job, 3, 3, $page);
        $limit = 20;
        
        $data = array(
            'header' => $this->load->view('header', '', TRUE),
            'footer' => $this->load->view('footer', '', TRUE),
            'city' => $this->city_location_model->get_city(),
            'category' => $this->category_model->get_category(),
            'jobs' => $this->get_ten_job_result($offset, $limit, $city = '', $location = '', $category = '', $class = '', $gender = ''),
            'links' => $this->pagination->create_links(),
            'count_job' => $count_job,
        );
   
        $this->load->view('tutoring_jobs', $data);
    }

    public function help() {
        //$this->check_is_logged_in();
        $this->load->model('user_model');
        $data = array(
            'header' => $this->load->view('header', '', TRUE),
            'footer' => $this->load->view('footer', '', TRUE),
            'videos' => $this->user_model->get_videos()
        );
        $this->load->view('help', $data);
    }

    public function job_board_single($id) {
        //$this->check_is_logged_in();
        $this->load->model('city_location_model');
        $this->load->model('category_model');
        $this->load->model('tutor_req_model');
        $job = $this->tutor_req_model->get_spec_live_job($id);

        $header = array(
            'job' => $job,
            'single' => 'yes'
        );

        if ($job[0]->id === NULL) {
            $job = '';
        }
        $data = array(
            'header' => $this->load->view('header', $header, TRUE),
            'footer' => $this->load->view('footer', '', TRUE),
            'city' => $this->city_location_model->get_city(),
            'category' => $this->category_model->get_category(),
            'jobs' => $job,
        );
        $this->load->view('tutoring_jobs_single', $data);
    }

    public function get_all_job_count($city, $location, $category, $class, $gender) {
        $this->load->model('tutor_req_model');
        $result = $this->tutor_req_model->get_all_job_count($city, $location, $category, $class, $gender);
        return $result->job_count;
    }

    function all_job_pagination($total, $seg1, $seg2, $page) {

        $page = (!is_int($page)) ? $this->uri->segment($seg1) : 0;
        $this->load->library("pagination");
        $config = array();
        $config["base_url"] = base_url() . "landing/all_job_pagination_list";
        $config["total_rows"] = $total;
        $config["per_page"] = 20;
        $config["uri_segment"] = $seg2;
        $offset = $page;
        $limit = $config["per_page"];

        $this->pagination->initialize($config);
        return $offset;
    }

    function get_ten_job_result($offset, $limit, $city, $location, $category, $class, $gender) {
        
        $this->load->model('tutor_req_model');
      
        $result = $this->tutor_req_model->get_ten_job_result($offset, $limit, $city, $location, $category, $class, $gender);
      
        return $result;
    }

    function all_job_pagination_list($page = 0) {
        $count_job = $this->get_all_job_count($this->input->post('city_id'), $this->input->post('location_id'), $this->input->post('category_id'), $this->input->post('class_id'), $this->input->post('gender'));
        $offset = $this->all_job_pagination($count_job, 3, 3, $page);
        $limit = 20;

        $data = array(
            'jobs' => $this->get_ten_job_result($offset, $limit, $this->input->post('city_id'), $this->input->post('location_id'), $this->input->post('category_id'), $this->input->post('class_id'), $this->input->post('gender')),
            'links' => $this->pagination->create_links(),
            'count_job' => $count_job,
        );
//log_message('ERROR',var_dump($data['jobs']));
        $this->load->view('ajax_ten_job_pagination_landing', $data);
    }

    public function not_found() {
        $this->load->view('404');
    }

    public function faq() {

        $data = array(
            'header' => $this->load->view('header', '', TRUE),
            'footer' => $this->load->view('footer', '', TRUE)
        );
        $this->load->view('faq', $data);
    }

    public function team() {

        $data = array(
            'header' => $this->load->view('header', '', TRUE),
            'footer' => $this->load->view('footer', '', TRUE)
        );
        $this->load->view('team', $data);
    }

    public function tutor_list() {

        $data = array(
            'header' => $this->load->view('header', '', TRUE),
            'footer' => $this->load->view('footer', '', TRUE)
        );
        $this->load->view('list_tutor', $data);
    }

    public function contact() {
        //$this->check_is_logged_in();
        $data = array(
            'header' => $this->load->view('header', '', TRUE),
            'footer' => $this->load->view('footer', '', TRUE)
        );
        $this->load->view('contact_us', $data);
    }

    public function terms_and_conditions() {
        //$this->check_is_logged_in();
        $data = array(
            'header' => $this->load->view('header', '', TRUE),
            'footer' => $this->load->view('footer', '', TRUE),
        );
        $this->load->view('terms_n_condition', $data);
    }

    public function contact_us() {
        //$this->load->library('mailer');

        $subject = str_replace("-", " ", $this->input->post('message_subject'));

        $message = "Dear Admin, <br /> I am a " . $this->input->post('user_type') . ".<br />" . $this->input->post('message');

        $config = array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.gmail.com',
            'smtp_port' => 465,
            'smtp_user' => 'gangstar08012@gmail.com',
            'smtp_pass' => 'xgnrgpklsbxyxang',
            'mailtype' => 'html',
            'charset' => 'iso-8859-1',
        );

        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");
        $this->email->from($this->input->post('email'), $this->input->post('name'));
        $this->email->to('info@caretutors.com'); //info@caretutors.com
        $this->email->subject($subject);
        $this->email->message($message);

        if ($this->email->send()) {
            echo TRUE;
        } else {
            echo FALSE;
        }
    }

    public function check_session_exist() {
        if ($this->session->userdata('id')) {
            $this->jump_to_question($this->input->post('job_id'));
        } else {
            $this->load->view('ajax_sign_in_form');
        }
    }

    public function apply_job_signin_form() {
        $this->load->model('user_model');
        $this->load->model('tution_info_model');
        $this->load->model('tutor_req_model');
        if ($this->session->userdata('id')) {
            $this->jump_to_question($this->input->post('job_id'));
        } else {
            $check_data = $this->user_model->login();
            if ($check_data == FALSE) {
                $this->load->view('tutor_basic_registration_modal');
            } elseif ($check_data == TRUE) {
                $applied = $this->user_model->check_user_applied_this_job_info($this->input->post('job_id'));
                if ($applied == TRUE) {
                    $this->load->view('already_applied');
                } else {
                    $check_data = $this->user_model->get_user();
                    if ($check_data->step_no != 5) {
                        $this->session->set_userdata('apply_job_id', $this->input->post('job_id'));
                        $this->load->view('modal_tutor_profile_step_less_confrmation');
                    } else {
                        //$t_info = $this->tution_info_model->get_tution_info();
                        $job_info = $this->tutor_req_model->get_spec_req($this->input->post('job_id'));
                        //$tutor_personal_info = $this->user_model->get_tutor_personal_info();
                        //var_dump(array($t_info, $job_info, $tutor_personal_info));die;
                        //$loc_ids = explode(',', $t_info[0]['pref_locations']);
                        //$cat_ids = explode(',', $t_info[0]['pref_medium']);

                        $data['job_id'] = $this->input->post('job_id');
                        $data['category'] = $job_info[0]->category;
                        $data['sub_cat'] = $job_info[0]->sub_cat;
                        $data['student_gender'] = $job_info[0]->student_gender;
                        $data['days_per_week'] = $job_info[0]->days_per_week;
                        $data['salary_range'] = $job_info[0]->salary_range;
                        $this->load->view('generic_question', $data);
                        /* if(!in_array($job_info[0]->location_id, $loc_ids)){
                          $data['location'] = $job_info[0]->location;
                          $this->load->view('location_question',$data);
                          }elseif($job_info[0]->preferred_gender != $tutor_personal_info->gender){
                          $data['gender'] = $job_info[0]->preferred_gender;
                          $this->load->view('gender_question', $data);
                          }elseif(!in_array($job_info[0]->tution_category_id, $cat_ids)){
                          $data['category'] = $job_info[0]->category;
                          $this->load->view('category_question');
                          }else{
                          $this->tutor_req_model->apply_job($this->input->post('job_id'));
                          $this->load->view('please_wait');
                          } */
                    }
                }
            }
        }
    }

    public function jump_to_question($job_id) {
        $this->load->model('user_model');
        $this->load->model('tution_info_model');
        $this->load->model('tutor_req_model');
        $applied = $this->user_model->check_user_applied_this_job_info($job_id);
        if ($applied == TRUE) {
            $this->load->view('already_applied');
        } else {
            $check_data = $this->user_model->get_user();
            if ($check_data->step_no != 5) {
                $this->session->set_userdata('apply_job_id', $job_id);
                $this->load->view('modal_tutor_profile_step_less_confrmation');
            } else {
                $t_info = $this->tution_info_model->get_tution_info();
                $job_info = $this->tutor_req_model->get_spec_req($job_id);
                $tutor_personal_info = $this->user_model->get_tutor_personal_info();

                $loc_ids = explode(',', $t_info[0]['pref_locations']);
                $cat_ids = explode(',', $t_info[0]['pref_medium']);

                $data['job_id'] = $job_id;
                $data['category'] = $job_info[0]->category;
                $data['sub_cat'] = $job_info[0]->category;
                $data['student_gender'] = $job_info[0]->student_gender;
                $data['days_per_week'] = $job_info[0]->days_per_week;
                $data['salary_range'] = $job_info[0]->salary_range;
                $this->load->view('generic_question', $data);
            }
        }
    }

    public function ajax_sign_in_form() {
        $this->load->view('ajax_sign_in_form');
    }

    public function modal_tutor_signup_form() {
        $this->load->view('modal_tutor_signup_form');
    }

    public function check_email_unique() {
        $this->load->model('user_model');
        $check_data = $this->user_model->check_email_unique();
        if ($check_data == 0) {
            echo 0;
        } elseif ($check_data == 1) {
            echo 1;
        }
    }

    public function add_basic_info() {
        $this->load->model('registration_model');
        $this->load->helper('date');
        $user_id = ($this->input->post('user_id')) ? $this->input->post('user_id') : now();
        $data = array(
            'full_name' => $this->input->post('full_name'),
            'user_id' => $user_id,
            'mobile_no' => $this->input->post('mobile_no'),
            'email' => $this->input->post('email'),
            'password' => md5($this->input->post('password')),
            'user_type' => $this->input->post('user_type')
        );
        $result = $this->registration_model->add_basic_info($data);
        if ($result == 1) {
            $this->session->set_userdata('id', $this->db->insert_id());
            $this->session->set_userdata($data);
            echo TRUE;
            //$this->send_email();
            //$this->send_sms($this->input->post('mobile_no'));
        } else {
            echo FALSE;
        }
    }

    public function modal_tutor_signup_confirmation() {
        $this->load->view('modal_tutor_signup_confirmation');
    }

    /* public function gender_question()
      {
      $this->load->model('user_model');
      $this->load->model('tution_info_model');
      $this->load->model('tutor_req_model');

      $t_info = $this->tution_info_model->get_tution_info();
      $job_info = $this->tutor_req_model->get_spec_req($this->input->post('job_id'));
      $tutor_personal_info = $this->user_model->get_tutor_personal_info();

      $cat_ids = explode(',', $t_info[0]['pref_medium']);

      $data['job_id'] = $this->input->post('job_id');
      if($job_info[0]->preferred_gender != $tutor_personal_info->gender){
      $data['gender'] = $job_info[0]->preferred_gender;
      $this->load->view('gender_question', $data);
      }elseif(!in_array($job_info[0]->tution_category_id, $cat_ids)){
      $data['category'] = $job_info[0]->category;
      $this->load->view('category_question', $data);
      }else{
      $this->tutor_req_model->apply_job($this->input->post('job_id'));
      $this->load->view('please_wait');
      }
      }

      public function category_question()
      {
      $this->load->model('user_model');
      $this->load->model('tution_info_model');
      $this->load->model('tutor_req_model');

      $t_info = $this->tution_info_model->get_tution_info();
      $job_info = $this->tutor_req_model->get_spec_req($this->input->post('job_id'));
      $tutor_personal_info = $this->user_model->get_tutor_personal_info();

      $cat_ids = explode(',', $t_info[0]['pref_medium']);

      $data['job_id'] = $this->input->post('job_id');
      if(!in_array($job_info[0]->tution_category_id, $cat_ids)){
      $data['category'] = $job_info[0]->category;
      $this->load->view('category_question', $data);
      }else{
      $this->tutor_req_model->apply_job($this->input->post('job_id'));
      $this->load->view('please_wait');
      }
      } */

    public function final_submission() {
        $this->load->model('user_model');
        $this->load->model('tution_info_model');
        $this->load->model('tutor_req_model');
        $this->tutor_req_model->apply_job($this->input->post('job_id'));
        $this->load->view('please_wait');
    }

    public function generic_question() {
        $this->load->model('user_model');
        $this->load->model('tution_info_model');
        $this->load->model('tutor_req_model');
        $job_info = $this->tutor_req_model->get_spec_req($this->input->post('job_id'));
        //$tutor_personal_info = $this->user_model->get_tutor_personal_info();
        //var_dump(array($t_info, $job_info, $tutor_personal_info));die;
        //$loc_ids = explode(',', $t_info[0]['pref_locations']);
        //$cat_ids = explode(',', $t_info[0]['pref_medium']);

        $data['job_id'] = $this->input->post('job_id');
        $data['category'] = $job_info[0]->category;
        $data['sub_cat'] = $job_info[0]->sub_cat;
        $data['student_gender'] = $job_info[0]->student_gender;
        $data['days_per_week'] = $job_info[0]->days_per_week;
        $data['salary_range'] = $job_info[0]->salary_range;
        $this->load->view('generic_question_tutor_dashboard', $data);
    }

    public function tutor_final_submission() {
        $this->load->model('user_model');
        $this->load->model('tution_info_model');
        $this->load->model('tutor_req_model');

        $result = $this->tutor_req_model->apply_job($this->input->post('job_id'));
        //$result = 1;
        if ($result == 1) {
            echo 1;
        } else if ($result == 0) {
            echo 0;
        }
    }

    public function become_a_tutor() {
        echo "<script language=\"javascript\">
            var screenWidth = window.screen.width;
            if(screenWidth < 800){
                window.location.href = 'https://m.caretutors.com';
            }
        </script>";
        
        //$this->check_is_logged_in();
        $data = array(
            'header' => $this->load->view('header', '', TRUE),
            'footer' => $this->load->view('footer', '', TRUE),
        );
        $this->load->view('become_a_tutor', $data);
    }

    public function signup() {

        echo "<script language=\"javascript\">
            var screenWidth = window.screen.width;
            if(screenWidth < 800){
                window.location.href = 'https://m.caretutors.com';
            }
        </script>";

        $this->load->model('city_location_model');
        $this->load->model('category_model');
        $this->load->model('sdg_model');
        $this->load->model('tutor_req_model');

        //$this->check_is_logged_in();
        $data = array(
            'city' => $this->city_location_model->get_city(),
            'category' => $this->category_model->get_category(),
            'sdg' => $this->sdg_model->get_all_sdg(true),
            'header' => $this->load->view('header', '', TRUE),
            'footer' => $this->load->view('footer', '', TRUE),
        );
        $this->load->view('sign_up', $data);
    }

    public function hire_a_tutor() {

        echo "<script language=\"javascript\">
            var screenWidth = window.screen.width;
            if(screenWidth < 800){
                window.location.href = 'https://m.caretutors.com';
            }
        </script>";

        $this->load->model('city_location_model');
        $this->load->model('category_model');
        $this->load->model('sdg_model');
        $this->load->model('tutor_req_model');

        $stat = $this->db->query("select (select count(*) from ct_tutor_requirements) total_jobs")->row();

        //$this->check_is_logged_in();
        $data = array(
            'city' => $this->city_location_model->get_city(),
            'category' => $this->category_model->get_category(),
            'sdg' => $this->sdg_model->get_all_sdg(true),
            'header' => $this->load->view('header', '', TRUE),
            'footer' => $this->load->view('footer', '', TRUE),
            'stat' => $stat
        );
        $this->load->view('hire_a_tutor_sign_up', $data);
    }

    public function client_registration_success_mail_template() {
        $this->load->view('client_registration_success_mail_template');
    }

    // public function mapView()
    // {
    //     $this->load->model('city_location_model');
    //     $this->load->model('tutor_req_model');
    //     $this->load->model('category_model');
    //     $this->load->model('sdg_model');
    //     // $this->load->model('tutor_req_model');
    //
    //     $data = find('ct_tutor_requirements', 'id, latitude, longitude', ['latitude !=' => 0, 'longitude !=' => 0], '*');
    //     // dd($data);
    //
    //     $arr = [];
    //     foreach ($data as $key => $value) {
    //         $newArr['lat'] = $value->latitude;
    //         $newArr['lng'] = $value->longitude;
    //         $newArr['job_id'] = $value->id;
    //         array_push($arr, $newArr);
    //     }
    //
    //     $data = array(
    //         'city' => $this->city_location_model->get_city(),
    //         'category' => $this->category_model->get_category(),
    //         'sdg' => $this->sdg_model->get_all_sdg(true),
    //         'jobs' => $arr,
    //         'paginate_jobs' => $this->tutor_req_model->get_ten_job_result(0, 10, '', '', '', '', ''),
    //         'header' => $this->load->view('header', '', TRUE),
    //         'footer' => $this->load->view('footer', '', TRUE),
    //     );
    //     $this->load->view('google_map', $data);
    // }

    public function getMapFilterDataJobBoard()
    {
        $this->load->model('tutor_req_model');
        $city_id = $this->input->post('city_id');
        $category_id = $this->input->post('category_id');
        $data['jobs'] = $this->tutor_req_model->getAllGoogleMapJob(0, 300, $city_id, $category_id);
        $job_board = $this->load->view('ajax_map_job_board', $data);
        echo $job_board;
    }

    public function getMapFilterDataMap()
    {
        $this->load->model('tutor_req_model');
        $city_id = $this->input->post('city_id');
        $category_id = $this->input->post('category_id');
        $data['jobs'] = $this->tutor_req_model->getAllGoogleMapJob(0, 300, $city_id, $category_id);
        $map = $this->load->view('ajax_map_view', $data);
        echo $map;
    }

    public function getGoogleMapContent()
    {
        $this->load->model('tutor_req_model');
        $job_id = $this->input->post('job_id');
        $jobInfo = $this->tutor_req_model->getGoogleMapJob($job_id);
        // dd($jobInfo);

        $html = '';

        // $html .= '<div class="panel panel-primary" style="border: 0; ">
        //     <div class="panel-body" style="padding: 20px 20px 0 20px;">
        //       <div class="row" style="position: relative;">
        //           <div class="col-md-12 col-sm-12">
        //               <p style="font-size: 13px !important; opacity: 0.7;  margin: 0 !important;">Job ID -  '. $jobInfo->id .'</p>
        //
        //               <p style="font-size: 20px; font-weight: bold; margin: 0 !important;">Need a tutor for '. $jobInfo->sub_cat.' student</p>
        //
        //
        //               <div class="row" style="font-size: 13px !important; margin: 7px 0 0 0;">
        //                   <div class="col-md-3 col-sm-12" style="padding-left: 0px;padding-right: 0px;">
        //                       <span style="font-weight: bold; color: #0675c1;">Category : </span>'. $jobInfo->category.'
        //                   </div>';
        //
        //                   if ($jobInfo->category == 'English Medium'):
        //                       $html .= '<div class="col-md-3 col-sm-12" style="padding-left: 0px;"><span style="font-weight: bold; color: #0675c1;">Curriculum : </span>'.ucfirst($jobInfo->english_medium_from).'</div>';
        //                   endif;
        //
        //                   $html .= '<div class="col-md-3 col-sm-12">
        //                       <span style="font-weight: bold; color: #0675c1;">Class : </span> '. $jobInfo->sub_cat .'
        //                   </div>
        //                   <div class="col-md-3 col-sm-12" style="padding-left: 0px;">
        //                       <span style="font-weight: bold; color: #0675c1;">Student Gender : </span> '. $jobInfo->student_gender .'
        //                   </div>
        //
        //                   <div class="col-md-12 col-sm-12" style="padding-left: 0px;margin-top: 8px;">
        //                       <span style="font-weight: bold; font-size: 12px;">'. $jobInfo->days_per_week .' days per week </span>
        //                   </div>
        //
        //               </div>
        //           </div>
        //           <div class="col-md-9 col-sm-12">
        //
        //               <p style="font-size: 12px !important; margin-top: 0px !important; margin-bottom: 0px !important;"><span style="font-weight: bold;">Salary : </span>'. $jobInfo->salary_range .' Tk, <span style="font-weight: 600;color: #212121;">Tutor gender preference :</span> '. $jobInfo->preferred_gender .', <span style="font-weight: 600;color: #212121;">No. of Students :</span> '. $jobInfo->no_of_student .'</p>';
        //
        //               if($jobInfo->subs != ''):
        //                   $html .= '<p style="font-size: 12px !important; margin-top: 0px !important; margin-bottom: 8px !important;"><span style="font-weight: bold;">Subjects :</span> '. $jobInfo->subs .'</p>';
        //               endif;
        //
        //               $html .= '<p style="padding-top: 7px; padding-bottom: 7px; font-size: 14px !important; font-weight: normal;">
        //                   <i class="fa fa-map-marker" style="color: #fff; width: 30px; height: 30px; border-radius: 50%; background: #0675c1; text-align: center; vertical-align: middle; line-height: 30px; font-size: 17px;"></i> '. $jobInfo->city .', '. $jobInfo->location.'
        //               </p>
        //               <p style="font-size: 12px !important; opacity: 0.7;"><span style="">Other Requirements - </span>'. $jobInfo->other_req .'</p>
        //           </div>
        //           <div class="col-md-3 col-sm-12 footer" style="padding-left: 0px;">
        //               <div class=" apply" style="padding-right: 0px;">';
        //               if($jobInfo->status == 'done'):
        //                   $html .= '<button class="btn default-btn  applyJobSignInButton" data-job_id="'. $jobInfo->id .'" style="padding: 3px 12px" type="button">Solved</button>';
        //               else:
        //                   $html .= '<button class="btn default-btn  applyJobSignInButton" data-job_id="'. $jobInfo->id .'" style="padding: 3px 12px" type="button">Apply</button>';
        //               endif;
        //               $html .= '<br /><br />
        //                   <p class="" style="font-size: 12px; opacity: 0.7;">Posted on '. date('jS F, Y',strtotime($jobInfo->created_at)) .'</p>
        //               </div>
        //           </div>
        //       </div>
        //     </div>
        // </div>';

            $html = '<div class="item" data-toggle="collapse" data-target="#map_collapse_'. $jobInfo->id .'">
                <p><b>job id: '. $jobInfo->id .'</b></p>
                <h3 class="map-h3">Need a tutor for '. $jobInfo->sub_cat .' student</h3>
                <p style="margin-bottom: 10px! important"><i class="fa fa-map-marker"></i> '. $jobInfo->city .', '. $jobInfo->location .'</p>
                <div class="row">
                    <div class="col-md-6">
                        <p><b>Category:</b> '. $jobInfo->category .' <br> <b>Gender:</b> '. $jobInfo->student_gender .'</p>
                    </div>
                    <div class="col-md-6">
                        <p><b>Class:</b> '. $jobInfo->sub_cat .' <br> <b>Curriculum:</b> </p>
                    </div>
                </div>
                <div id="map_collapse_'. $jobInfo->id .'" class="collapse" style="margin-top: 10px">
                    <div class="row">
                        <div class="col-md-6">
                            <p><b>'. $jobInfo->days_per_week .' days per week</b></p>
                            <p><b>Salary:</b> '. $jobInfo->salary_range .' tk <br> <b>Tutor Gender Preference: </b> '. $jobInfo->preferred_gender .'</p>
                        </div>
                        <div class="col-md-6">
                            <p><b>Subjects:</b> '. $jobInfo->subs .' <br> <b>No. of Students:</b> '. $jobInfo->no_of_student .' </p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-7">
                            <p>'. $jobInfo->other_req .' </p>
                        </div>
                        <div class="col-md-5 text-right">';
                            if ($jobInfo->latitude != 0 && $jobInfo->longitude != 0):
                                $html .= '<button type="button" data-map_lat="'. $jobInfo->latitude .'" data-map_lng="'. $jobInfo->longitude .'" class="btn btn-xs btn-danger map_zoom_in" name="button">Zoom In</button>';
                            endif;
                            $html .= '<button type="button" class="btn btn-xs btn-primary applyJobSignInButton" data-job_id="'. $jobInfo->id .'" name="button">Apply Now</button>
                            <p>posted on '. date('jS F, Y',strtotime($jobInfo->created_at)) .'</p>
                        </div>
                    </div>
                </div>
            </div>';

        echo $html;

    }

    public function checkTutorNumber()
    {
        $mobile_no = $this->input->post('mobile_no');
        $find = find('ct_user', 'mobile_no', ['mobile_no' => $mobile_no]);
        if ($find) {
            echo json_encode('warning');
        } else {
            echo json_encode('success');
        }
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
