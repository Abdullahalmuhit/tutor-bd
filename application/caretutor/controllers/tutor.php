<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tutor extends CI_Controller {

    /**
     * @author Ariful Islam
     * @link http://www.oployeelabs.com
     * @version 1.0
     */
    function __construct() {
        parent::__construct();

        // echo "<script language=\"javascript\">
        //     var screenWidth = window.screen.width;
        //     if(screenWidth < 800){
        //         window.location.href = 'https://m.caretutors.com';
        //     }
        // </script>";


        if ($this->session->userdata('user_type') != "tutor") {
            redirect("signin");
            exit;
        }

        $this->load->model('category_model', 'model');
        $this->load->model('user_model');
        $this->load->model('tutor_req_model');
        $this->load->library('firephp');

        $emails = $this->user_model->get_all_email();
        $pro_percentage = $this->user_model->update_profile_percentage($this->calculate_profile_percentage());
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

        $this->session->set_userdata('tutor_inbox', $this->user_model->count_tutor_inbox());
    }

    public function index() {
        $this->load->model('user_model');
        $check_data = $this->user_model->get_user();
        if ($check_data->step_no != 5) {
            $this->dashboard_init();
            exit;
        }

        $pro = array(
            'profile' => $check_data,
            'con_det' => 'yes'
        );

        $data = array(
            'header' => $this->load->view('header_tutors', '', TRUE),
            'footer' => $this->load->view('footer', '', TRUE),
            'left_menu' => $this->load->view('tutors_menu', '', TRUE),
            'body' => $this->load->view('tutor_profile', $pro, TRUE),
            'footer_new' => $this->load->view('footer_new', $pro, TRUE)
        );

        $this->load->view('tutor_dashboard', $data);
    }

    public function tutor_list() {

        $data = array(
            'header' => $this->load->view('header', '', TRUE),
            'footer' => $this->load->view('footer', '', TRUE)
        );
        $this->load->view('list_tutor', $data);
    }

    public function dashboard_init() {
        $this->load->model('user_model');

        $check_data = $this->user_model->get_user();

        if ($check_data->step_no == 0) {
            $this->step_zero();
        } else if ($check_data->step_no == 1) {
            $this->step_one();
        } else if ($check_data->step_no == 2) {
            $this->step_two();
        } else if ($check_data->step_no == 3) {
            $this->step_three();
        } else if ($check_data->step_no == 5) {
            $this->dashboard();
        }
    }

    public function step_zero() {
        $this->load->model('user_model');

        $pro = array(
            'profile' => $this->user_model->get_user()
        );

        $data = array(
            'header' => $this->load->view('header_tutors', '', TRUE),
            'footer' => $this->load->view('footer', '', TRUE),
            'left_menu' => $this->load->view('tutors_dis_menu', $pro, TRUE),
            'body' => $this->load->view('tutor_message', $pro, TRUE),
            'footer-new' => $this->load->view('footer-new', $pro, TRUE)
        );

        $this->load->view('tutor_dashboard', $data);
    }

    public function step_one() {
        $this->load->model('user_model');

        $pro = array(
            'profile' => $this->user_model->get_user()
        );

        $data = array(
            'header' => $this->load->view('header_tutors', '', TRUE),
            'footer' => $this->load->view('footer', '', TRUE),
            'left_menu' => $this->load->view('tutors_dis_menu', $pro, TRUE),
            'body' => $this->load->view('tutor_per_info_with_step', $pro, TRUE),
            'footer-new' => $this->load->view('footer-new', $pro, TRUE),
        );

        $this->load->view('tutor_dashboard', $data);
    }

    public function step_two() {
        $this->load->model('user_model');

        $pro = array(
            'profile' => $this->user_model->get_user()
        );

        $data = array(
            'header' => $this->load->view('header_tutors', '', TRUE),
            'footer' => $this->load->view('footer', '', TRUE),
            'left_menu' => $this->load->view('tutors_dis_menu', $pro, TRUE),
            'body' => $this->load->view('tutor_edu_info_with_step', $pro, TRUE),
            'footer-new' => $this->load->view('footer-new', $pro, TRUE)
        );

        $this->load->view('tutor_dashboard', $data);
    }

    public function step_three() {
        $this->load->model('user_model');
        $this->load->model('tution_info_model');
        $this->load->model('sdg_model');
        $this->load->model('city_location_model');

        $pro = array(
            'tution_info' => $this->tution_info_model->get_tution_info(),
            'category' => $this->_get_menu_categories(),
            'sdg' => $this->sdg_model->get_all_sdg(true),
            'city' => $this->city_location_model->get_city(),
            'profile' => $this->user_model->get_user()
        );

        $data = array(
            'header' => $this->load->view('header_tutors', '', TRUE),
            'footer' => $this->load->view('footer', '', TRUE),
            'left_menu' => $this->load->view('tutors_dis_menu', $pro, TRUE),
            'body' => $this->load->view('tutor_tut_info_with_step', $pro, TRUE),
            'footer-new' => $this->load->view('footer-new', $pro, TRUE)
        );

        $this->load->view('tutor_dashboard', $data);
    }

    public function step_complete($step_no) {
        $this->load->model('user_model');

        $data = array(
            'step_no' => $step_no
        );

        $res = $this->user_model->step_complete($data);

        if ($res) {
            $this->dashboard_init();
        }
    }

    public function dashboard($page = 0) {
 
      

        $this->load->model('user_model');
        $this->load->model('tution_info_model');

        $this->load->model('sdg_model');
        $this->load->model('city_location_model');
        $this->load->model('category_model');
        $this->load->model('exam_model', 'exam');
        $this->load->model('request_verify_model', 'verify');

        $check_data = $this->user_model->get_user();
        $t_info = $this->tution_info_model->get_tution_info();
        $personl_info = $this->tution_info_model->get_personal_info();
        $credential_info = $this->tution_info_model->credential_info_count();
        $user_verifys = $this->verify->get_verify_data_by_user($this->session->userdata('id'));
        $user_verify = (!empty($user_verifys)) ? $user_verifys->status : 0;
        $step = $check_data->step_no;

        if (!empty($personl_info)) {
            if ($check_data->user_status != 'locked' && ($personl_info[0]['gender'] == '' || $t_info[0]['pref_medium'] == '' || ($t_info[0]['city_id'] != '3' && $t_info[0]['your_location_id'] == ''))) {
                $this->profile_edit();
            }
//            elseif ($credential_info < 2) {
//                $this->profile_edit();
//            }
            else {
                $user_info = $this->user_model->get_user($this->session->userdata('id'));
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

                    $loc_ids = explode(',', $t_info[0]['pref_locations']);

                    if ($t_info[0]['city_id'] != '' && $t_info[0]['city_id'] != '3') {
                        $cities_location = $this->city_location_model->get_location($t_info[0]['city_id']);
                    } else {
                        $cities_location = '';
                    }
                    $location_info = $this->tution_info_model->get_tution_location_info();
                    $available_days = explode(",", $t_info[0]['available_days']);
                } else {
                    $t_info = $cat_ids = $location_info = $cateories_class[0] = $cateories_class[1] = $class_ids = $classes_sub[1] = $sub_ids = $loc_ids = $available_days = $cities_location = '';
                }

                $credential_info = $this->tution_info_model->get_credential_info();
                $credential_info_count = $this->tution_info_model->credential_info_count();
                $t_info = $this->tution_info_model->get_tution_info();
                $sub_ids = explode(',', $t_info[0]['pref_subjects']);
                $sub = $this->sdg_model->get_sdg_array($sub_ids);

                $cat_ids = explode(',', $t_info[0]['pref_medium']);
                $cats = $this->category_model->get_category_array($cat_ids);

                $loc_ids = explode(',', $t_info[0]['pref_locations']);
                $loc = $this->city_location_model->get_locs_array($loc_ids);

                $pro = array(
                    'profile' => $check_data,
                    'personal_info' => $this->user_model->get_tutor_personal_info(),
                    'tut_info' => $this->tution_info_model->get_tution_info(),
                    'subjects' => $sub,
                    'categories' => $cats,
                    'locations' => $loc,
                    'con_det' => 'yes'
                );

                $act = array(
                    'menu_id' => 1,
                    'profile' => $check_data,
                );

                $count_job = $this->get_all_job_count($city = '', $location = '', $category = '', $class = '', $gender = '');
                $offset = $this->all_job_pagination($count_job, 3, 3, $page);
                $limit = 10;

                $data = array(
                    'left_menu' => $this->load->view('tutors_menu', $act, TRUE),
                    'body' => $this->load->view('tutor_profile', $pro, TRUE),
                    'jobs' => $this->get_ten_job_result($offset, $limit, $city = '', $location = '', $category = '', $class = '', $gender = ''),
                    'applied_jobs' => $this->tution_info_model->get_tutor_applied_jobs(),
                    'links' => $this->pagination->create_links(),
                    'count_job' => $count_job,
                    'city' => $this->city_location_model->get_city(),
                    'category' => $this->category_model->get_category(),
                    'selected_catagory' => $cateories_class[0],
                    'cateories_class' => $cateories_class[1],
                    'class_ids' => $class_ids,
                    'classes_sub' => $classes_sub[1],
                    'sub_ids' => $sub_ids,
                    'location_info' => $location_info,
                    'tution_info' => $t_info,
                    'edu_infos' => $this->tution_info_model->get_tutor_all_edu_info(),
                    'personal_info' => $this->tution_info_model->get_personal_info(),
                    'profile_pic_info' => $this->tution_info_model->get_profile_pic_info(),
                    'institutes' => $this->tution_info_model->get_institutes(),
                    'groups' => $this->sdg_model->get_groups(),
                    'user_data' => $user_info,
                    'step' => $step,
                    'email_count' => $this->data['email_count'],
                    'emails' => $this->data['emails'],
                    'notification_count' => $this->data['notification_count'],
                    'notifications' => $this->data['notifications'],
                    'credential_info' => $credential_info,
                    'credential_info_count' => $credential_info_count,
                    'user_verification' => $user_verify,
                    'includePage' => 'caretutor_tutor_dashboard',
                    'exam_result' => $this->exam->get_exam_result($this->session->userdata('id')),
                );
                $this->load->view('panel', $data);
            }
        } else {
            $this->profile_edit();
        }
    }

    public function calculate_profile_percentage() {
        $this->load->model('city_location_model');
        $this->load->model('category_model');
        $this->load->model('institute_model');
        $this->load->model('tution_info_model');
        $this->load->model('sdg_model');
        $this->load->model('exam_model', 'exam');
        $this->load->model('request_verify_model', 'verify');

        $user_info          = $this->user_model->get_user($this->session->userdata('id'));
        $personal_info      = $this->tution_info_model->get_personal_info();
        $profile_pic_info   = $this->tution_info_model->get_profile_pic_info();
        $tuition_info       = $this->tution_info_model->get_tution_info();
        $education_info     = $this->tution_info_model->get_tutor_all_edu_info();
        $credential_info    = $this->tution_info_model->get_credential_info();
        $exam_info          = find('ct_userexam', 'result', ['userid' => $this->session->userdata('id'), 'result' => 'passed']);

        $personal_info  = (object) $personal_info[0];
        $tuition_info   = (object) $tuition_info[0];

        $total_percentage = 0;

        $total_percentage += $user_info->full_name != '' ? 2 : 0;
        $total_percentage += $user_info->email != '' ? 2 : 0;
        $total_percentage += !empty($profile_pic_info) ? 3 : 0;
        $total_percentage += $user_info->mobile_no != '' ? 2 : 0;

        $total_percentage += $personal_info->additional_numbers != '' ? 2 : 0;
        $total_percentage += $personal_info->overview_yourself != '' ? 4 : 0;
        $total_percentage += $personal_info->gender != '' ? 2 : 0;
        $total_percentage += $personal_info->pre_address != '' ? 2 : 0;
        $total_percentage += $personal_info->date_of_birth != '' ? 2 : 0;
        $total_percentage += $personal_info->religion != '' ? 2 : 0;
        $total_percentage += $personal_info->nationality != '' ? 2 : 0;
        $total_percentage += $personal_info->emmergency_contact_name != '' ? 1 : 0;
        $total_percentage += $personal_info->emmergency_contact_number != '' ? 1 : 0;
        $total_percentage += $personal_info->emmergency_contact_address != '' ? 1 : 0;
        $total_percentage += $personal_info->emmergency_contact_rel != '' ? 1 : 0;
        $total_percentage += $personal_info->fathers_name != '' || $personal_info->fathers_phone != ''  ? 2 : 0;
        $total_percentage += $personal_info->mothers_name != '' || $personal_info->mothers_phone != ''  ? 2 : 0;
        $total_percentage += $personal_info->fb_link != '' || $personal_info->linkedin_link != ''  ? 2 : 0;
        $total_percentage += $personal_info->identity_type != '' && $personal_info->identity != ''  ? 2 : 0;

        $total_percentage += !empty($education_info) && array_key_exists(0, $education_info) ? 4 : 0;
        $total_percentage += !empty($education_info) && array_key_exists(1, $education_info) ? 4 : 0;
        $total_percentage += !empty($education_info) && array_key_exists(2, $education_info) ? 4 : 0;

        $total_percentage += $tuition_info->available_days != '' ? 1 : 0;
        $total_percentage += $tuition_info->available_time_from != '' ? 1 : 0;
        $total_percentage += $tuition_info->available_time_to != '' ? 1 : 0;
        $total_percentage += $tuition_info->expected_fees != '' ? 2 : 0;
        $total_percentage += $tuition_info->total_experience != '' ? 2 : 0;
        $total_percentage += $tuition_info->experiences != '' ? 2 : 0;
        $total_percentage += $tuition_info->method != '' ? 4 : 0;
        $total_percentage += $tuition_info->city_id != '' ? 3 : 0;
        $total_percentage += $tuition_info->your_location_id != '' ? 2 : 0;
        $total_percentage += $tuition_info->pref_medium != '' ? 3 : 0;
        $total_percentage += $tuition_info->pref_class != '' ? 2 : 0;
        $total_percentage += $tuition_info->pref_subjects != '' ? 2 : 0;
        $total_percentage += $tuition_info->pref_locations != '' ? 3 : 0;
        $total_percentage += $tuition_info->pref_tut_style != '' ? 1 : 0;
        $total_percentage += $tuition_info->student_home || $tuition_info->student_home || $tuition_info->online != '' ? 1 : 0;

        $total_percentage += !empty($credential_info) && array_key_exists(0, $credential_info) ? 4 : 0;
        $total_percentage += !empty($credential_info) && array_key_exists(1, $credential_info) ? 4 : 0;
        $total_percentage += !empty($credential_info) && array_key_exists(2, $credential_info) ? 4 : 0;
        $total_percentage += !empty($credential_info) && array_key_exists(3, $credential_info) ? 4 : 0;

        $total_percentage += !empty($exam_info) ? 5 : 0;

        return $total_percentage;
    }

    public function profile_edit() {
       

        $this->load->model('city_location_model');
        $this->load->model('category_model');
        $this->load->model('institute_model');
        $this->load->model('tution_info_model');
        $this->load->model('sdg_model');
        $this->load->model('exam_model', 'exam');
        $this->load->model('request_verify_model', 'verify');

        $check_data = $this->user_model->get_user();
        $step = $check_data->step_no;

        $t_info = $this->tution_info_model->get_tution_info();
        $user_info = $this->user_model->get_user($this->session->userdata('id'));
        $user_verifys = $this->verify->get_verify_data_by_user($this->session->userdata('id'));
        $user_verify = (!empty($user_verifys)) ? $user_verifys->status : 0;
        if ($user_info->user_status == 'locked') {
          $this->dashboard();
        }

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

            $loc_ids = explode(',', $t_info[0]['pref_locations']);

            if ($t_info[0]['city_id'] != '' && $t_info[0]['city_id'] != '3') {
                $cities_location = $this->city_location_model->get_location($t_info[0]['city_id']);
            } else {
                $cities_location = '';
            }
            $location_info = $this->tution_info_model->get_tution_location_info();
            $tutoring_styles = array();
            $available_days = explode(",", $t_info[0]['available_days']);
            $tutoring_styles = explode(",", $t_info[0]['pref_tut_style']);
        } else {
            $tutoring_styles = array();
            $t_info = $cat_ids = $location_info = $cateories_class[1] = $class_ids = $classes_sub[1] = $sub_ids = $loc_ids = $available_days = $cities_location = $cateories_class[0] = '';
        }

        $credential_info = $this->tution_info_model->get_credential_info();
        $credential_info_count = $this->tution_info_model->credential_info_count();

        $review = $this->db->query("select avg(points) review from ct_job_tutor where tutor_id = ". $this->session->userdata('id') ." and points != 0")->row();

        $data = array(
            'country' => $this->city_location_model->get_country(),
            'city' => $this->city_location_model->get_city(),
            'category' => $this->category_model->get_category(),
            'selected_cats' => $cat_ids,
            'cateories_class' => $cateories_class[1],
            'selected_catagory' => $cateories_class[0],
            'selected_cls' => $class_ids,
            'classes_sub' => $classes_sub[1],
            'selected_subs' => $sub_ids,
            'selected_locs' => $loc_ids,
            'cities_location' => $cities_location,
            'aval_days' => $available_days,
            'tutoring_styles' => $tutoring_styles,
            'tution_info' => $t_info,
            'edu_infos' => $this->tution_info_model->get_tutor_all_edu_info(),
            'personal_info' => $this->tution_info_model->get_personal_info(),
            'profile_pic_info' => $this->tution_info_model->get_profile_pic_info(),
            //'institutes'		=> $this->tution_info_model->get_institutes(),
            // 'groups' => $this->sdg_model->get_groups(),
            'user_data' => $user_info,
            'step' => $step,
            'location_info' => $location_info,
            'credential_info' => $credential_info,
            'credential_info_count' => $credential_info_count,
            'email_count' => $this->data['email_count'],
            'emails' => $this->data['emails'],
            'notification_count' => $this->data['notification_count'],
            'notifications' => $this->data['notifications'],
            'includePage' => 'caretutor_tutor_add_profile',
            'user_verification' => $user_verify,
            'exam_result' => $this->exam->get_exam_result($this->session->userdata('id')),
            'review' => $review,
        );

        $this->load->view('panel', $data);
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
        $config["base_url"] = base_url() . "tutor/all_job_pagination_list";
        $config["total_rows"] = $total;
        $config["per_page"] = 10;
        $config["uri_segment"] = $seg2;
        $config["full_tag_open"] = '<ul class="uk-pagination" style="margin-top:0;">';
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
        $this->load->model('tution_info_model');
        $count_job = $this->get_all_job_count($this->input->post('city_id'), $this->input->post('location_id'), $this->input->post('category_id'), $this->input->post('class_id'), $this->input->post('gender'));
        $offset = $this->all_job_pagination($count_job, 3, 3, $page);
        $limit = 10;

        $data = array(
            'jobs' => $this->get_ten_job_result($offset, $limit, $this->input->post('city_id'), $this->input->post('location_id'), $this->input->post('category_id'), $this->input->post('class_id'), $this->input->post('gender')),
            'links' => $this->pagination->create_links(),
            'count_job' => $count_job,
            'applied_jobs' => $this->tution_info_model->get_tutor_applied_jobs(),
        );
        $this->load->view('tutor/ajax_ten_job_pagination', $data);
    }

    public function tutor_personal_info() {
        $this->load->model('user_model');

        $pro = array(
            'profile' => $this->user_model->get_tutor_personal_info(),
            'profil' => $this->user_model->get_user()
        );

        $act = array(
            'menu_id' => 2,
            'profile' => $this->user_model->get_user()
        );

        $data = array(
            'header' => $this->load->view('header_tutors', '', TRUE),
            'footer' => $this->load->view('footer', '', TRUE),
            'left_menu' => $this->load->view('tutors_menu', $act, TRUE),
            'body' => $this->load->view('tutor_per_info', $pro, TRUE),
            'footer_new' => $this->load->view('footer_new', $pro, TRUE)
        );

        $this->load->view('tutor_dashboard', $data);
    }

    public function tutor_upload_img() {
        $this->load->model('user_model');

        $pro = array(
            'profile' => $this->user_model->get_tutor_personal_info(),
            'profil' => $this->user_model->get_user(),
            'error' => ''
        );

        $act = array(
            'menu_id' => 8,
            'profile' => $this->user_model->get_user()
        );

        $data = array(
            'header' => $this->load->view('header_tutors', '', TRUE),
            'footer' => $this->load->view('footer', '', TRUE),
            'left_menu' => $this->load->view('tutors_menu', $act, TRUE),
            'body' => $this->load->view('upload_img', $pro, TRUE),
             'footer_new' => $this->load->view('footer_new', $pro, TRUE)
        );

        $this->load->view('tutor_dashboard', $data);
    }

    function do_upload() {
        $config['upload_path'] = './assets/upload/';
        $config['allowed_types'] = 'gif|jpg|jpeg|png|GIF|JPG|JPEG|PNG';
        $config['max_size'] = '5120';
        $config['max_width'] = '2000';
        $config['max_height'] = '2000';

        $this->load->library('upload', $config);

        $this->load->model('user_model');

        if (!$this->upload->do_upload()) {
            $error = $this->upload->display_errors();

            /* $pro = array(
              'profile'	=> $this->user_model->get_tutor_personal_info(),
              'profil'	=> $this->user_model->get_user(),
              'error'		=> $error
              ); */
        } else {
            $success_data = $this->upload->data();
            $this->user_model->update_profile_pic($success_data['file_name']);
        }
    }

    function do_upload_credential() {
        // $config['upload_path'] = './assets/upload/credential/';
        $config['upload_path'] = '/mnt/volume_sgp1_02/upload/credential/';
        $config['allowed_types'] = 'gif|jpg|jpeg|png|GIF|JPG|JPEG|PNG';
        $config['max_size'] = '5120';
        $config['max_width'] = '20000';
        $config['max_height'] = '20000';
        $config['file_name'] = $this->session->userdata('id').'_'.rand().'_'.time().'.png';

        $this->load->library('upload', $config);

        $this->load->model('user_model');

        //$this->firephp->log($this->upload->data());
        if (!$this->upload->do_upload()) {
            $error = $this->upload->display_errors();
        } else {
            $success_data = $this->upload->data();
            echo $success_data['file_name'];
        }
    }

    function do_upload_profile_pic() {

        // plugin fomat
        $data = $_POST['image'];

        list($type, $data) = explode(';', $data);
        list(, $data)      = explode(',', $data);

        $data = base64_decode($data);
        $imageName = $this->session->userdata('id').'_'.rand().'_'.time().'.png';
        // file_put_contents('assets/upload/'.$imageName, $data);
        file_put_contents('/mnt/volume_sgp1_02/upload/'.$imageName, $data);

        // update privious picture to database
        $this->user_model->update_profile_pic($imageName);
        dd('uploaded');
    }

    public function load_personal_info() {
        $this->load->model('user_model');

        $pro = array(
            'personal_info' => $this->user_model->get_tutor_personal_info(),
            'profile' => $this->user_model->get_user()
        );

        $act = array(
            'menu_id' => 2,
            'profile' => $this->user_model->get_user()
        );

        $data = array(
            'header' => $this->load->view('header_tutors', '', TRUE),
            'footer' => $this->load->view('footer', '', TRUE),
            'left_menu' => $this->load->view('tutors_menu', $act, TRUE),
            'body' => $this->load->view('edit_per_info', $pro, TRUE),
             'footer_new' => $this->load->view('footer_new', $pro, TRUE)
        );

        $this->load->view('tutor_dashboard', $data);
    }

    /*
     * update tutor personal information
     */

    public function update_personal_info() {
        $this->load->model('user_model');

        $data = array(
            'user_id' => $this->session->userdata('id'),
            'fathers_name' => $this->input->post('fathers_name'),
            'additional_numbers' => $this->input->post('additional_numbers'),
            'gender' => $this->input->post('selgender'),
            'pre_address' => $this->input->post('pre_address'),
            'fb_link' => $this->input->post('fb_link'),
            'emmergency_contact_name' => $this->input->post('emmergency_contact_name'),
            'emmergency_contact_address' => $this->input->post('emmergency_address'),
            'emmergency_contact_number' => $this->input->post('emmergency_contact_number'),
            'emmergency_contact_rel' => $this->input->post('emmergency_contact_rel'),
            'identity_type' => $this->input->post('identity_type'),
            'identity' => $this->input->post('identity'),
            'passport_number' => $this->input->post('passport_number')
        );

        $result = $this->user_model->update_tutor_personal_info($data);

        if ($result) {
            $check_step_no = $this->user_model->get_user();
            if ($check_step_no->step_no < 5) {
                $return_data = array(
                    'status' => 'redirect',
                    'url' => 'tutor/dashboard'
                );
            } else {
                $return_data = array(
                    'status' => 'redirect',
                    'url' => 'tutor/tutor_personal_info'
                );
            }
            echo json_encode($return_data);
            exit;
        }

        echo json_encode($result);
    }

    /*
     * update tutor personal information in step
     */

    public function update_personal_info_step() {
        $this->load->model('user_model');

        $data = array(
            'user_id' => $this->session->userdata('id'),
            'fathers_name' => $this->input->post('fathers_name'),
            'additional_numbers' => $this->input->post('additional_numbers'),
            'gender' => $this->input->post('selgender'),
            'pre_address' => $this->input->post('pre_address'),
            'fb_link' => $this->input->post('fb_link'),
            'emmergency_contact_name' => $this->input->post('emmergency_contact_name'),
            'emmergency_contact_address' => $this->input->post('emmergency_address'),
            'emmergency_contact_number' => $this->input->post('emmergency_contact_number'),
            'emmergency_contact_rel' => $this->input->post('emmergency_contact_rel'),
            'identity_type' => $this->input->post('identity_type'),
            'identity' => $this->input->post('identity'),
            'passport_number' => $this->input->post('passport_number')
        );

        $result = $this->user_model->update_tutor_personal_info($data);

        if ($result) {
            $return_data = array(
                'status' => 'redirect',
                'url' => 'tutor/step_complete/2'
            );
            echo json_encode($return_data);
            exit;
        }

        echo json_encode($result);
    }

    public function tutor_edu_info() {
        $this->load->model('user_model');

        $pro = array(
            'profile' => $this->user_model->get_tutor_edu_info(),
            'profil' => $this->user_model->get_user()
        );

        $act = array(
            'menu_id' => 3,
            'profile' => $this->user_model->get_user()
        );

        $data = array(
            'header' => $this->load->view('header_tutors', '', TRUE),
            'footer' => $this->load->view('footer', '', TRUE),
            'left_menu' => $this->load->view('tutors_menu', $act, TRUE),
            'body' => $this->load->view('tutor_edu_info', $pro, TRUE),
             'footer_new' => $this->load->view('footer_new', $pro, TRUE)
        );

        $this->load->view('tutor_dashboard', $data);
    }

    public function edit_password($m = "n") {
        $pro = array(
            'm' => $m
        );

        $act = array(
            'menu_id' => 9,
            'profile' => $this->user_model->get_user()
        );

        $data = array(
            'header' => $this->load->view('header_tutors', '', TRUE),
            'footer' => $this->load->view('footer', '', TRUE),
            'left_menu' => $this->load->view('tutors_menu', $act, TRUE),
            'body' => $this->load->view('modify_t_pass', $pro, TRUE),
             'footer_new' => $this->load->view('footer_new', $pro, TRUE)
        );
        $this->load->view('tutor_dashboard', $data);
    }

    public function update_t_pass() {
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
                'url' => 'tutor/edit_password/dm'
            );
            echo json_encode($return_data);
            exit;
        } else if ($result == "y") {
            $this->send_cp_email();
            $return_data = array(
                'status' => 'redirect',
                'url' => 'tutor/edit_password/y'
            );
            echo json_encode($return_data);
            exit;
        }

        echo json_encode($result);
    }

    public function send_cp_email() {
        $this->load->library('mailer');

        $subject = "Your password has been changed";

        $data = array(
            'intro' => "Dear " . $this->session->userdata('full_name'),
            'body' => "Your password has been changed successfully. Your new password is:<br/>Password: {$this->input->post('password')}"
        );


        $this->mailer->send_mail($this->session->userdata('email'), $subject, $this->load->view('mail_template', $data, TRUE));
    }

    public function load_edu_info() {
        $this->load->model('user_model');

        $pro = array(
            'profile' => $this->user_model->get_tutor_edu_info(),
            'profil' => $this->user_model->get_user()
        );

        $act = array(
            'menu_id' => 3,
            'profile' => $this->user_model->get_user()
        );

        $data = array(
            'header' => $this->load->view('header_tutors', '', TRUE),
            'footer' => $this->load->view('footer', '', TRUE),
            'left_menu' => $this->load->view('tutors_menu', $act, TRUE),
            'body' => $this->load->view('edit_edu_info', $pro, TRUE),
             'footer_new' => $this->load->view('footer_new', $pro, TRUE)
        );

        $this->load->view('tutor_dashboard', $data);
    }

    public function tution_info() {
        $this->load->model('user_model');
        $this->load->model('tution_info_model');
        $this->load->model('sdg_model');
        $this->load->model('city_location_model');
        $this->load->model('category_model');

        $t_info = $this->tution_info_model->get_tution_info();
        $sub_ids = explode(',', $t_info[0]['pref_subjects']);
        $sub = $this->sdg_model->get_sdg_array($sub_ids);

        $cat_ids = explode(',', $t_info[0]['pref_medium']);
        $cats = $this->category_model->get_category_array($cat_ids);

        $loc_ids = explode(',', $t_info[0]['pref_locations']);
        $loc = $this->city_location_model->get_locs_array($loc_ids);

        $pro = array(
            'tution_info' => $t_info,
            'category' => $this->_get_menu_categories(),
            'subs' => $sub,
            'categories' => $cats,
            'locations' => $loc
        );

        $act = array(
            'menu_id' => 4,
            'profile' => $this->user_model->get_user()
        );

        $data = array(
            'header' => $this->load->view('header_tutors', '', TRUE),
            'footer' => $this->load->view('footer', '', TRUE),
            'left_menu' => $this->load->view('tutors_menu', $act, TRUE),
            'body' => $this->load->view('tut_info', $pro, TRUE),
             'footer_new' => $this->load->view('footer_new', $pro, TRUE)
        );

        $this->load->view('tutor_dashboard', $data);
    }

    public function load_tut_info() {
        $this->load->model('user_model');
        $this->load->model('tution_info_model');
        $this->load->model('sdg_model');
        $this->load->model('city_location_model');

        $pro = array(
            'tution_info' => $this->tution_info_model->get_tution_info(),
            'category' => $this->_get_menu_categories(),
            'sdg' => $this->sdg_model->get_all_sdg(true),
            'city' => $this->city_location_model->get_city()
        );

        $act = array(
            'menu_id' => 4,
            'profile' => $this->user_model->get_user()
        );

        $data = array(
            'header' => $this->load->view('header_tutors', '', TRUE),
            'footer' => $this->load->view('footer', '', TRUE),
            'left_menu' => $this->load->view('tutors_menu', $act, TRUE),
            'body' => $this->load->view('edit_tution_info', $pro, TRUE),
             'footer_new' => $this->load->view('footer_new', $pro, TRUE)
        );

        $this->load->view('tutor_dashboard', $data);
    }

    /**
     *
     * For getting parent and child category.
     * @param unknown_type $parent_id
     * @param unknown_type $indent
     */
    private function _get_menu_categories($parent_id = NULL, $indent = 0) {
        $indent++;

        $data = array();

        if ($results = $this->model->get_dropdown_categories($parent_id)) {
            foreach ($results as $result) {
                if ($result->id == 1) {
                    continue;
                }

                if ($indent == 1) {
                    $cat_name = "<input type='checkbox' name='category[]' value='" . $result->id . "'> <b>" . $result->category . "</b>";
                } else {
                    $cat_name = "&nbsp;&nbsp;&nbsp;&nbsp;<input type='checkbox' name='category[]' value='" . $result->id . "'> " . $result->category;
                }

                $data[] = array(
                    'category_id' => $result->id,
                    'name' => $cat_name
                );

                $sub = $this->_get_menu_categories($result->id, $indent);

                if ($sub) {
                    $data = array_merge($data, $sub);
                }
            }
        }

        return $data;
    }

    /*
     * update tutor personal information
     */

    public function update_edu_info() {
        $ins_id = ($this->input->post('institute_id') != "") ? $this->input->post('institute_id') : $this->populate_ins_id($this->input->post('institute'));
        $hsc_ins_id = ($this->input->post('hsc_ins_id') != "") ? $this->input->post('hsc_ins_id') : $this->populate_ins_id($this->input->post('hsc_institute'));
        $ssc_ins_id = ($this->input->post('ssc_ins_id') != "") ? $this->input->post('ssc_ins_id') : $this->populate_ins_id($this->input->post('ssc_institute'));
        $msc_ins_id = ($this->input->post('msc_ins_id') != "") ? $this->input->post('msc_ins_id') : $this->populate_ins_id($this->input->post('msc_institute'));

        $uni_sdg_id = ($this->input->post('subject_id') != "") ? $this->input->post('subject_id') : $this->populate_sdg_id();
        $msc_sdg_id = ($this->input->post('msc_sdg_id') != "") ? $this->input->post('msc_sdg_id') : $this->populate_sdg_id($this->input->post('msc_subject'), 'yes');

        $this->load->model('user_model');
        //$data=array();
        $data = array(
            'user_id' => $this->session->userdata('id'),
            'msc_ins_id' => $msc_ins_id,
            'msc_sdg_id' => $msc_sdg_id,
            'msc_pass_year' => $this->input->post('msc_pass_year'),
            'msc_cgpa' => $this->input->post('msc_cgpa'),
            'uni_ins_id' => $ins_id,
            'uni_sdg_id' => $uni_sdg_id,
            'uni_semester' => $this->input->post('uni_semester'),
            'uni_cgpa' => $this->input->post('uni_cgpa'),
            'a_or_hsc' => $this->input->post('a_or_hsc'),
            'hsc_ins_id' => $hsc_ins_id,
            'hsc_result' => $this->input->post('hsc_result'),
            'hsc_pass_year' => $this->input->post('hsc_pass_year'),
            'o_or_ssc' => $this->input->post('o_or_ssc'),
            'ssc_ins_id' => $ssc_ins_id,
            'ssc_result' => $this->input->post('ssc_result'),
            'ssc_pass_year' => $this->input->post('ssc_pass_year')
        );

        $result = $this->user_model->update_tutor_edu_info($data);

        if ($result) {
            $check_step_no = $this->user_model->get_user();
            if ($check_step_no->step_no < 5) {
                $return_data = array(
                    'status' => 'redirect',
                    'url' => 'tutor/dashboard'
                );
            } else {
                $return_data = array(
                    'status' => 'redirect',
                    'url' => 'tutor/tutor_edu_info'
                );
            }
            echo json_encode($return_data);
            exit;
        }

        echo json_encode($result);
    }

    /*
     * update tutor personal information
     */

    public function update_edu_info_step() {
        $ins_id = ($this->input->post('institute_id') != "") ? $this->input->post('institute_id') : $this->populate_ins_id($this->input->post('institute'));
        $hsc_ins_id = ($this->input->post('hsc_ins_id') != "") ? $this->input->post('hsc_ins_id') : $this->populate_ins_id($this->input->post('hsc_institute'));
        $ssc_ins_id = ($this->input->post('ssc_ins_id') != "") ? $this->input->post('ssc_ins_id') : $this->populate_ins_id($this->input->post('ssc_institute'));
        $msc_ins_id = ($this->input->post('msc_ins_id') != "") ? $this->input->post('msc_ins_id') : $this->populate_ins_id($this->input->post('msc_institute'));

        $uni_sdg_id = ($this->input->post('subject_id') != "") ? $this->input->post('subject_id') : $this->populate_sdg_id();
        $msc_sdg_id = ($this->input->post('msc_sdg_id') != "") ? $this->input->post('msc_sdg_id') : $this->populate_sdg_id($this->input->post('msc_subject'), 'yes');

        $this->load->model('user_model');
        //$data=array();
        $data = array(
            'user_id' => $this->session->userdata('id'),
            'msc_ins_id' => $msc_ins_id,
            'msc_sdg_id' => $msc_sdg_id,
            'msc_pass_year' => $this->input->post('msc_pass_year'),
            'msc_cgpa' => $this->input->post('msc_cgpa'),
            'uni_ins_id' => $ins_id,
            'uni_sdg_id' => $uni_sdg_id,
            'uni_semester' => $this->input->post('uni_semester'),
            'uni_cgpa' => $this->input->post('uni_cgpa'),
            'a_or_hsc' => $this->input->post('a_or_hsc'),
            'hsc_ins_id' => $hsc_ins_id,
            'hsc_result' => $this->input->post('hsc_result'),
            'hsc_pass_year' => $this->input->post('hsc_pass_year'),
            'o_or_ssc' => $this->input->post('o_or_ssc'),
            'ssc_ins_id' => $ssc_ins_id,
            'ssc_result' => $this->input->post('ssc_result'),
            'ssc_pass_year' => $this->input->post('ssc_pass_year')
        );

        $result = $this->user_model->update_tutor_edu_info($data);

        if ($result) {
            $return_data = array(
                'status' => 'redirect',
                'url' => 'tutor/step_complete/3'
            );
            echo json_encode($return_data);
            exit;
        }

        echo json_encode($result);
    }

    public function update_tution_info() {
        $this->load->model('tution_info_model');
        $result = $this->tution_info_model->update_tution_info();
        if ($result) {
            $return_data = array(
                'status' => 'redirect',
                'url' => 'tutor/tution_info'
            );
            echo json_encode($return_data);
            exit;
        }
        echo json_encode($result);
    }

    public function update_tution_info_step() {
        $this->load->model('tution_info_model');
        $result = $this->tution_info_model->update_tution_info();
        if ($result) {
            $this->send_profile_complete_email();
            $return_data = array(
                'status' => 'redirect',
                'url' => 'tutor/step_complete/5'
            );
            echo json_encode($return_data);
            exit;
        }
        echo json_encode($result);
    }

    public function populate_ins_id($ins) {
        $this->load->model('institute_model');

        $data = array(
            'institute' => $ins
        );

        $result = $this->institute_model->add_institute($data);

        return $result;
    }

    public function populate_group_id($grp) {
        $this->load->model('sdg_model');

        $data = array(
            'sdg' => $grp
        );

        $result = $this->sdg_model->add_sdg($data);

        return $result;
    }

    public function populate_sdg_id($subject = '', $from_param = 'no') {
        $this->load->model('sdg_model');

        $sub = ($from_param == 'no') ? $this->input->post('subject') : $subject;

        if ($sub == '' || empty($sub)) {
            $ret = '1';
            return $ret;
            exit;
        }

        $data = array(
            'sdg' => $sub
        );

        $result = $this->sdg_model->add_sdg($data);

        return $result;
    }

    public function internal_job_board($job_type = 'All') {
        $this->load->model('user_model');
        $this->load->model('tutor_req_model');

        if ($job_type == 'All') {
            $myjobs = $this->tutor_req_model->get_available_job_list();
        } else {
            $myjobs = $this->tutor_req_model->get_invited_job_list($job_type);
        }

        $pro = array(
            'jobs' => $myjobs,
            'status' => $job_type
        );

        log_message('ERROR', $this->db->last_query());


        if ($job_type == 'Invited') {
            $menu_id = 7;
        } elseif ($job_type == 'Applied') {
            $menu_id = 5;
        } else {
            $menu_id = 6;
        }

        $act = array(
            'menu_id' => $menu_id,
            'profile' => $this->user_model->get_user()
        );

        $data = array(
            'header' => $this->load->view('header_tutors', '', TRUE),
            'footer' => $this->load->view('footer', '', TRUE),
            'left_menu' => $this->load->view('tutors_menu', $act, TRUE),
            'body' => $this->load->view('job_board', $pro, TRUE),
             'footer_new' => $this->load->view('footer_new', $pro, TRUE)
        );

        $this->load->view('tutor_dashboard', $data);
    }

    public function apply_job($job_id, $status = "Invited") {
        $this->load->model('tutor_req_model');
        $this->load->model('user_model');

        $this->tutor_req_model->apply_job($job_id);

        if ($status == "Invited") {
            $pro = array(
                'jobs' => $this->tutor_req_model->get_invited_job_list("Invited"),
                'status' => $status
            );

            $act = array(
                'menu_id' => 7,
                'profile' => $this->user_model->get_user()
            );
        } else {
            $pro = array(
                'jobs' => $this->tutor_req_model->get_available_job_list(),
                'status' => $status
            );

            $act = array(
                'menu_id' => 6,
                'profile' => $this->user_model->get_user()
            );
        }

        $data = array(
            'header' => $this->load->view('header_tutors', '', TRUE),
            'footer' => $this->load->view('footer', '', TRUE),
            'left_menu' => $this->load->view('tutors_menu', $act, TRUE),
            'body' => $this->load->view('job_board', $pro, TRUE),
             'footer_new' => $this->load->view('footer_new', $pro, TRUE)
        );

        $this->load->view('tutor_dashboard', $data);
    }

    public function send_profile_complete_email() {
        $this->load->library('mailer');

        $subject = "Congratulations!!";

        $body = "Congratulations! You have successfully completed your profile. Now you can apply to your desired tutoring jobs. If you have any further queries please don�t hesitate to call us at +8801756441122. <br/><br/>Happy Tutoring!";

        $data = array(
            'intro' => "Dear " . $this->session->userdata('full_name'),
            'body' => $body
        );


        $this->mailer->send_mail($this->session->userdata('email'), $subject, $this->load->view('mail_template', $data, TRUE));
    }

    public function ajax_load_locations_tutor_job_search($city_id) {
        $this->load->model('city_location_model');
        $result = $this->city_location_model->get_location($city_id);
        $return = "";


        $return .= '<div class="uk-margin-small-top">';
        $return .= '<select id="filter_location" name="filter_location[]" data-md-selectize multiple data-md-selectize-bottom multiple>';
        $return .= "<option value=''>Location</option>";
        if (!empty($result)) {
            foreach ($result as $res) {
                $return .= "<option value='" . $res->id . "'>" . $res->location . "</option>";
            }
        }
        $return .= "</select>";
        $return .= "</div>";

        echo $return;
    }

    public function ajax_load_class_tutor_job_search() {
        $category_id = $this->input->post('category_id');
        $this->load->model('category_model');
        if (!empty($category_id)) {
            $result = $this->category_model->ajax_load_class_tutor_job_search($category_id);
        } else {
            $result = '';
        }

        $return = "";


        $return .= '<div class="uk-margin-small-top">';
        $return .= '<select id="filter_class" name="filter_class[]" data-md-selectize multiple data-md-selectize-bottom multiple>';
        $return .= "<option value=''>Class</option>";
        if (!empty($result[0])) {
            foreach ($result[0] as $category) {
                $return .= "<optgroup label='" . $category->category . "'>";
                if (!empty($result[1])) {
                    foreach ($result[1] as $class) {
                        if ($class->parent_id == $category->id) {
                            $return .= "<option value='" . $class->id . "'>" . $class->category . "</option>";
                        }
                    }
                }
                $return .= "</optgroup>";
            }
        }
        $return .= "</select>";
        $return .= "</div>";
        echo $return;
    }

    public function ajax_load_class_tutor_profile() {
        $this->load->model('tution_info_model');
        $this->load->model('category_model');

        $t_info = $this->tution_info_model->get_tution_info();
        $class_ids = '';
        if (!empty($t_info)) {
            $class_ids = explode(',', $t_info[0]['pref_class']);
        }

        $category_id = $this->input->post('category_id');
        if (!empty($category_id)) {
            $result = $this->category_model->ajax_load_class_tutor_job_search($category_id);
        } else {
            $result = '';
        }

        $return = "";
        $return .= '<label class="uk-text-hilight" for="classcourse">Class / course</label>';
        $return .= '<select id="classcourse" name="classcourse" multiple>';
        $return .= "<option value=''>Class</option>";
        if (!empty($result[0])) {
            foreach ($result[0] as $category) {
                $return .= "<optgroup label='" . $category->category . "'>";
                if (!empty($result[1])) {
                    foreach ($result[1] as $class) {
                        if ($class->parent_id == $category->id) {
                            $selected = '';
                            if (!empty($class_ids) && in_array($class->id, $class_ids)) {
                                $selected = 'selected="selected"';
                            }
                            $return .= "<option " . $selected . " value='" . $class->id . "'>" . $class->category . "</option>";
                        }
                    }
                }
                $return .= "</optgroup>";
            }
        }
        $return .= "</select>";
        echo $return;
    }

    public function ajax_load_locations_tutor_profile($city_id) {
        $this->load->model('tution_info_model');
        $t_info = $this->tution_info_model->get_tution_info();

        $this->load->model('city_location_model');
        $result = $this->city_location_model->get_location($city_id);
        $return = "";


        $return .= '<label class="uk-text-hilight" for="user_edit_position_control">Your location</label>';
        $return .= '<select id="tutor_profile_your_location" name="tutor_profile_your_location" data-md-selectize>';
        $return .= "<option value=''>Location</option>";
        if (!empty($result)) {
            foreach ($result as $res) {
                $selected = (!empty($t_info)) ? ($t_info[0]['your_location_id'] == $res->id) ? 'selected="selected"' : '' : '';
                $return .= "<option " . $selected . " value='" . $res->id . "'>" . $res->location . "</option>";
            }
        }
        $return .= "</select>";
        echo $return;
    }

    public function ajax_load_preferred_locations_tutor_profile($city_id) {
        $this->load->model('tution_info_model');
        $t_info = $this->tution_info_model->get_tution_info();
        if (!empty($t_info)) {
            $loc_ids = explode(',', $t_info[0]['pref_locations']);
        } else {
            $loc_ids = '';
        }


        $this->load->model('city_location_model');
        $result = $this->city_location_model->get_location($city_id);
        $return = "";

        $return .= '<label class="uk-text-hilight" for="tutor_preferred_locations">Your preferred locations</label>
                <p class="uk-text-muted uk-text-small">Select up to 10 locations that not too far from your home/university/workplace.</p>';
        $return .= '<select id="tutor_preferred_locations" name="tutor_preferred_locations" multiple>';
        if (!empty($result)) {
            foreach ($result as $res) {
                $selected = '';
                if (!empty($loc_ids) && in_array($res->id, $loc_ids)) {
                    $selected = 'selected="selected"';
                }
                $return .= "<option " . $selected . " value='" . $res->id . "'>" . $res->location . "</option>";
            }
        }
        $return .= "</select>";
        echo $return;
    }

    public function ajax_load_add_education_div() {
        $this->load->view('tutor/ajax_load_add_education_div');
    }

    public function ajax_load_subject_tutor_profile() {
        $this->load->model('category_model');
        $this->load->model('tution_info_model');

        $t_info = $this->tution_info_model->get_tution_info();
        if (!empty($t_info)) {
            $sub_ids = explode(',', $t_info[0]['pref_subjects']);
        } else {
            $sub_ids = '';
        }

        $class_id = $this->input->post('class_id');

        if (!empty($class_id)) {
            $result = $this->category_model->ajax_load_subjects_tutor_job_search($class_id);
        } else {
            $result = '';
        }

        if (!empty($result[1])) {
            $return = "";
            $return .= '<h3 class="full_width_in_card heading_c">';
            $return .= 'Please select subject(s)</h3>';
            $return .= '<div class="uk-grid" data-uk-grid-margin>';
            $return .= '<div class="uk-width-1-1">';
            $return .= '<label class="uk-text-hilight" for="tutor_preferred_subjects">Subjects</label>';
            $return .= '<select id="tutor_preferred_subjects" name="tutor_preferred_subjects" multiple>';
            $return .= "<option value=''>Subjects</option>";
            if (!empty($result[0])) {
                foreach ($result[0] as $class) {
                    $return .= "<optgroup label='" . $class->category . "'>";
                    if (!empty($result[1])) {
                        foreach ($result[1] as $subject) {
                            if ($subject->parent_id == $class->id) {
                                $selected = '';
                                if (!empty($sub_ids) && in_array($subject->id, $sub_ids)) {
                                    $selected = 'selected="selected"';
                                }
                                $return .= "<option " . $selected . " value='" . $subject->id . "'>" . $subject->category . "</option>";
                            }
                        }
                    }
                    $return .= "</optgroup>";
                }
            }
            $return .= "</select>";
            $return .= "</div>";
            $return .= "</div>";
        } else {
            $return = '';
        }

        echo $return;
    }

    public function institute_autocomplete() {
        $q = strtolower($this->input->get('q'));
        if (!$q)
            return;

        $this->load->model('institute_model');
        $result = $this->institute_model->get_institute($q);

        foreach ($result as $row) {
            $new_row['name'] = htmlentities(stripslashes($row->institute));
            $new_row['id'] = htmlentities(stripslashes($row->id));
            $row_set['items'][] = $new_row;
        }
        $row_set['total_count'] = count($result);
        $row_set['incomplete_results'] = FALSE;
        //var_dump(json_encode($row_set));die;
        echo json_encode($row_set);
    }

    public function tutor_add_edit_personal_info() {
        //var_dump($this->session->userdata('id'));die;
        $this->load->model('user_model');
        $this->load->model('notification_model', 'notification');
        $data = array(
            'user_id' => $this->session->userdata('id'),
            'gender' => $this->input->post('gender'),
            'additional_numbers' => $this->input->post('additional_numbers'),
            'pre_address' => $this->input->post('pre_address'),
            'identity_type' => $this->input->post('identity_type'),
            'identity' => $this->input->post('identity'),
            'date_of_birth' => $this->input->post('date_of_birth') ? $this->input->post('date_of_birth') : null,
            'religion' => $this->input->post('religion') ? $this->input->post('religion') : null,
            'nationality' => $this->input->post('nationality') ? $this->input->post('nationality') : null,
            'fb_link' => $this->input->post('fb_link'),
            'linkedin_link' => $this->input->post('linkedin_link'),
            'fathers_name' => $this->input->post('fathers_name'),
            'fathers_phone' => $this->input->post('fathers_phone'),
            'mothers_name' => $this->input->post('mothers_name'),
            'mothers_phone' => $this->input->post('mothers_phone'),
            'emmergency_contact_name' => $this->input->post('emmergency_contact_name'),
            'emmergency_contact_address' => $this->input->post('emmergency_contact_address'),
            'emmergency_contact_number' => $this->input->post('emmergency_contact_number'),
            'emmergency_contact_rel' => $this->input->post('emmergency_contact_rel'),
            'overview_yourself' => $this->input->post('overview_yourself')
        );
        $result = $this->user_model->update_tutor_personal_info($data);
        $this->notification->verification_profile_update_notification($this->session->userdata('id'), NULL, 'Personal Info');
        if ($result == TRUE) {
            echo 0;
        } else {
            echo 1;
        }
    }

    public function ajax_save_tutor_educational_info() {
        // dd($_POST);

        $this->load->model('tution_info_model');
        $this->load->model('sdg_model');
        $this->load->model('institute_model');
        $this->load->model('notification_model', 'notification');

        $institute_id   = $this->input->post('institute_id');
        $institute_name = $this->input->post('institute_name');

        $group_id   = $this->input->post('group_id');
        $group_name = $this->input->post('group_name');

        if ($institute_id) {
          $ins_id = $institute_id;
        } elseif ($institute_name) {
            $find = $this->db->query('select id from ct_institute where (institute LIKE "'. $institute_name .'" COLLATE utf8_bin ESCAPE "!")  order by id desc')->row();
            if(!empty($find)) {
              $ins_id = $find->id;
            } else {
              $ins_id = $this->populate_ins_id($institute_name);
            }

            // $ins_id = $this->populate_ins_id($institute_name);

        } else {
          $ins_id = '0';
        }

        if ($group_id) {
            $grp_id = $group_id;
        } elseif ($group_name) {
            $find = $this->db->query('select id from ct_sdg where (sdg LIKE "'. $group_name .'" COLLATE utf8_bin ESCAPE "!")  order by id desc')->row();
            if(!empty($find)) {
                $grp_id = $find->id;
            } else {
                $grp_id = $this->populate_group_id($group_name);
            }

            // $grp_id = $this->populate_group_id($group_name);
        } else {
            $grp_id = '0';
        }

        $data = array(
            'user_id' => $this->session->userdata('id'),
            'level_of_education' => $this->input->post('level_of_education'),
            'exam_degree_title' => $this->input->post('exam_degree_title'),
            'id_card_number' => $this->input->post('id_card_number'),
            'result' => $this->input->post('result'),
            'year_of_passing' => $this->input->post('year_of_passing'),
            'curriculum' => $this->input->post('curriculum'),
            'from_date' => date('Y-m-d', strtotime($this->input->post('from_date'))),
            'until_date' => date('Y-m-d', strtotime($this->input->post('until_date'))),
            'current_institute' => $this->input->post('current_institute'),
            'institute_id' => $ins_id,
            'group_id' => $grp_id
        );
        // dd($data);
        $result = $this->tution_info_model->add_tutor_educational_info($data, $this->input->post('education_info_id'));
        log_message("ERROR", $this->db->last_query());
        $data['edu_infos'] = $this->tution_info_model->get_tutor_all_edu_info();
        $this->notification->verification_profile_update_notification($this->session->userdata('id'), NULL, 'Education Info');
        $this->load->view('tutor/ajax_tutor_education_info', $data);
    }

    public function ajax_delete_tutor_educational_info() {

        $this->load->model('tution_info_model');
        $this->load->model('sdg_model');
        $this->load->model('institute_model');
        $this->load->model('notification_model', 'notification');

        $education_id = $this->input->post('id');


        $result = $this->tution_info_model->delete_tutor_educational_info($education_id);
        $data['edu_infos'] = $this->tution_info_model->get_tutor_all_edu_info();
        $this->notification->verification_profile_update_notification($this->session->userdata('id'), NULL, 'Education Info');
        $this->load->view('tutor/ajax_tutor_education_info', $data);
    }

    public function ajax_edit_tutor_educational_info() {

        $this->load->model('tution_info_model');
        $this->load->model('sdg_model');
        $this->load->model('institute_model');

        $institute_name = $this->input->post('institute_name');

        if ($this->input->post('institute_name')) {
            /* if(is_numeric($institute_name[0])){
              $ins_id = $institute_name[0];
              }else{
              $ins_id = ($institute_name[0] == "")?'0':$this->populate_ins_id($institute_name[0]);
              } */
            $ins_id = $this->populate_ins_id($institute_name);
        } else {
            $ins_id = '0';
        }

        $group_name = $this->input->post('group_name');
        if ($this->input->post('group_name')) {
            if (is_numeric($group_name[0])) {
                $grp_id = $group_name;
            } else {
                $grp_id = ($group_name == "") ? '0' : $this->populate_group_id($group_name);
            }
        } else {
            $grp_id = '0';
        }

        $data = array(
            'user_id' => $this->session->userdata('id'),
            'level_of_education' => $this->input->post('level_of_education'),
            'exam_degree_title' => $this->input->post('exam_degree_title'),
            'id_card_number' => $this->input->post('id_card_number'),
            'result' => $this->input->post('result'),
            'year_of_passing' => $this->input->post('year_of_passing'),
            'curriculum' => $this->input->post('curriculum'),
            'from_date' => date('Y-m-d', strtotime($this->input->post('from_date'))),
            'until_date' => date('Y-m-d', strtotime($this->input->post('until_date'))),
            'current_institute' => $this->input->post('current_institute'),
            'institute_id' => $ins_id,
            'group_id' => $grp_id
        );
        $result = $this->tution_info_model->edit_tutor_educational_info($data, $this->input->post('education_info_id'));
        log_message("ERROR", $this->db->last_query());
        $data['edu_infos'] = $this->tution_info_model->get_tutor_all_edu_info();
        $this->load->view('tutor/ajax_tutor_education_info', $data);
    }

    public function ajax_update_tutor_educational_info() {
        $this->load->model('sdg_model');
        $this->load->model('institute_model');
        if (!empty($check_ins)) {
            $ins_id = $check_ins[0]->id;
        } else {
            $ins_id = ($this->input->post('institute_name') == "") ? '0' : $this->populate_ins_id($this->input->post('institute_name'));
        }

        $check_group = $this->sdg_model->get_sdg($this->input->post('group_name'));
        if (!empty($check_group)) {
            $grp_id = $check_group[0]->id;
        } else {
            $grp_id = ($this->input->post('group_name') == "") ? '0' : $this->populate_group_id($this->input->post('group_name'));
        }

        $this->load->model('tution_info_model');
        $data = array(
            'user_id' => $this->session->userdata('id'),
            'level_of_education' => $this->input->post('level_of_education'),
            'exam_degree_title' => $this->input->post('exam_degree_title'),
            'id_card_number' => $this->input->post('id_card_number'),
            'result' => $this->input->post('result'),
            'year_of_passing' => $this->input->post('year_of_passing'),
            'curriculum' => $this->input->post('curriculum'),
            'from_date' => date('Y-m-d', strtotime($this->input->post('from_date'))),
            'until_date' => date('Y-m-d', strtotime($this->input->post('until_date'))),
            'current_institute' => $this->input->post('current_institute'),
            'institute_id' => $ins_id,
            'group_id' => $grp_id
        );
        $result = $this->tution_info_model->add_tutor_educational_info($data, $this->input->post('education_info_id'));
        echo TRUE;
    }

    public function ajax_save_tutor_tution_info() {
        $this->load->model('tution_info_model');
        $this->load->model('notification_model', 'notification');
        $pref_locations = (($this->input->post('tutor_preferred_locations'))) ? implode(",", $this->input->post('tutor_preferred_locations')) : '';
        $pref_medium = ($this->input->post('tutor_profile_category')) ? implode(",", $this->input->post('tutor_profile_category')) : '';
        $pref_class = ($this->input->post('classcourse')) ? implode(",", $this->input->post('classcourse')) : '';
        $pref_subjects = ($this->input->post('tutor_preferred_subjects')) ? implode(",", $this->input->post('tutor_preferred_subjects')) : '';
        $available_days = ($this->input->post('available_days')) ? implode(",", $this->input->post('available_days')) : '';
        $tutoring_style = ($this->input->post('tutoring_style')) ? implode(",", $this->input->post('tutoring_style')) : '';

        if ($this->input->post('online') == 1) {
            $google_acc = $this->input->post('user_edit_google_control');
            $skype_acc = $this->input->post('user_edit_skype_control');
        } else {
            $skype_acc = '';
            $google_acc = '';
        }

        $data = array(
            'user_id' => $this->session->userdata('id'),
            'pref_medium' => $pref_medium,
            'pref_class' => $pref_class,
            'pref_subjects' => $pref_subjects,
            'city_id' => $this->input->post('tutor_profile_city'),
            'your_location_id' => $this->input->post('tutor_profile_your_location'),
            'pref_locations' => $pref_locations,
            'skype_acc' => $skype_acc,
            'google_acc' => $google_acc,
            'student_home' => $this->input->post('student_home'),
            'my_home' => $this->input->post('my_home'),
            'online' => $this->input->post('online'),
            'has_experience' => $this->input->post('experience'),
            'total_experience' => $this->input->post('total_experience'),
            'experiences' => $this->input->post('experience_detail'),
            'available_days' => $available_days,
            'available_time_from' => $this->input->post('available_time_from'),
            'available_time_to' => $this->input->post('available_time_to'),
            'expected_fees' => $this->input->post('expected_fees'),
            'method' => $this->input->post('method'),
            'pref_tut_style' => $tutoring_style
        );

        $result = $this->tution_info_model->add_tutor_tution_info($data, $this->input->post('tution_info_id'));
        $this->notification->verification_profile_update_notification($this->session->userdata('id'), NULL, 'Tuition Info');
        log_message("ERROR", $this->db->last_query());
        echo $result;
    }

    public function my_stats() {
      
        $this->load->model('city_location_model');
        $this->load->model('category_model');
        $this->load->model('institute_model');
        $this->load->model('tution_info_model');
        $this->load->model('tutor_req_model');
        $this->load->model('exam_model', 'exam');
        $this->load->model('request_verify_model');

        $t_info = $this->tution_info_model->get_tution_info();
        $applied_job_info = $this->tution_info_model->get_applied_job_info();
        $user_info = $this->user_model->get_user($this->session->userdata('id'));
        $user_verifys = $this->request_verify_model->get_verify_data_by_user($this->session->userdata('id'));
        $user_verify = (!empty($user_verifys)) ? $user_verifys->status : 0;

        $step = $user_info->step_no;
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
            //$sub = $this->sdg_model->get_sdg_array($sub_ids);

            $loc_ids = explode(',', $t_info[0]['pref_locations']);

            if ($t_info[0]['city_id'] != '' && $t_info[0]['city_id'] != '3') {
                $cities_location = $this->city_location_model->get_location($t_info[0]['city_id']);
            } else {
                $cities_location = '';
            }
            $location_info = $this->tution_info_model->get_tution_location_info();
            $available_days = explode(",", $t_info[0]['available_days']);
        } else {
            $t_info = $cat_ids = $location_info = $cateories_class[1] = $class_ids = $classes_sub[1] = $sub_ids = $loc_ids = $available_days = $cities_location = '';
        }
        $credential_info = $this->tution_info_model->get_credential_info();
        $credential_info_count = $this->tution_info_model->credential_info_count();

        $review = $this->db->query("select avg(points) review from ct_job_tutor where tutor_id = ". $this->session->userdata('id') ." and points != 0")->row();

        $data = array(
            'tution_info' => $t_info,
            'edu_infos' => $this->tution_info_model->get_tutor_all_edu_info(),
            'personal_info' => $this->tution_info_model->get_personal_info(),
            'applied_job_info' => $applied_job_info,
            'assigned_jobs' => $this->tutor_req_model->get_invited_job_list("Assign"),
            'user_data' => $user_info,
            'profile_pic_info' => $this->tution_info_model->get_profile_pic_info(),
            'step' => $step,
            'location_info' => $location_info,
            'email_count' => $this->data['email_count'],
            'emails' => $this->data['emails'],
            'notification_count' => $this->data['notification_count'],
            'notifications' => $this->data['notifications'],
            'user_verification' => $user_verify,
            'cateories_class' => $cateories_class[1],
            'selected_catagory' => $cateories_class[0],
            'class_ids' => $class_ids,
            'classes_sub' => $classes_sub[1],
            'credential_info_count' => $credential_info_count,
            'credential_info' => $credential_info,
            'includePage' => 'caretutor_tutor_my_stats',
            'exam_result' => $this->exam->get_exam_result($this->session->userdata('id')),
            'review' => $review,
        );
        $this->load->view('panel', $data);
    }

    public function ajax_undo_applied_job($job_id) {
        $tutor_id = $this->session->userdata('id');

        $find = find('ct_job_tutor', 'id', ['job_id' => $job_id, 'tutor_id' => $tutor_id, 'status' => 'Applied']);
        if ($find) {
            $delete = delete('ct_job_tutor', ['job_id' => $job_id, 'tutor_id' => $tutor_id, 'status' => 'Applied']);
            echo json_encode(1);
        } else
            echo json_encode(0);
    }

    public function ajax_load_main_sidebar_update() {
        $this->load->model('city_location_model');
        $this->load->model('category_model');
        $this->load->model('institute_model');
        $this->load->model('tution_info_model');
        $this->load->model('tutor_req_model');
        $this->load->model('exam_model', 'exam');
        $this->load->model('request_verify_model');

        $t_info = $this->tution_info_model->get_tution_info();
        $applied_job_info = $this->tution_info_model->get_applied_job_info();

        $user_info = $this->user_model->get_user($this->session->userdata('id'));
        $user_verifys = $this->request_verify_model->get_verify_data_by_user($this->session->userdata('id'));
        $user_verify = (!empty($user_verifys)) ? $user_verifys->status : 0;


        $step = $user_info->step_no;
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
            //$sub = $this->sdg_model->get_sdg_array($sub_ids);

            $loc_ids = explode(',', $t_info[0]['pref_locations']);

            if ($t_info[0]['city_id'] != '' && $t_info[0]['city_id'] != '3') {
                $cities_location = $this->city_location_model->get_location($t_info[0]['city_id']);
            } else {
                $cities_location = '';
            }
            $location_info = $this->tution_info_model->get_tution_location_info();
            $available_days = explode(",", $t_info[0]['available_days']);
        } else {
            $t_info = $cat_ids = $location_info = $cateories_class[1] = $class_ids = $classes_sub[1] = $sub_ids = $loc_ids = $available_days = $cities_location = '';
        }
        $credential_info = $this->tution_info_model->get_credential_info();
        $credential_info_count = $this->tution_info_model->credential_info_count();

        $data = array(
            'tution_info' => $t_info,
            'edu_infos' => $this->tution_info_model->get_tutor_all_edu_info(),
            'personal_info' => $this->tution_info_model->get_personal_info(),
            'applied_job_info' => $applied_job_info,
            'assigned_jobs' => $this->tutor_req_model->get_invited_job_list("Assign"),
            'user_data' => $user_info,
            'profile_pic_info' => $this->tution_info_model->get_profile_pic_info(),
            'step' => $step,
            'location_info' => $location_info,
            'email_count' => $this->data['email_count'],
            'emails' => $this->data['emails'],
            'notification_count' => $this->data['notification_count'],
            'notifications' => $this->data['notifications'],
            'user_verification' => $user_verify,
            'cateories_class' => $cateories_class[1],
            'selected_catagory' => $cateories_class[0],
            'class_ids' => $class_ids,
            'classes_sub' => $classes_sub[1],
            'credential_info_count' => $credential_info_count,
            'credential_info' => $credential_info,
            'includePage' => 'caretutor_tutor_my_stats',
            'exam_result' => $this->exam->get_exam_result($this->session->userdata('id')),
        );
        $this->load->view('tutor/ajax_load_main_sidebar_update', $data);
    }

    public function ajax_check_educational_info() {
        $this->load->model('tution_info_model');
        $edu_info = $this->tution_info_model->get_tutor_all_edu_info();

        if (!empty($edu_info)) {
            echo 1;
        } else {
            echo 0;
        }
    }

    public function profile_view() {
        $this->load->model('city_location_model');
        $this->load->model('category_model');
        $this->load->model('institute_model');
        $this->load->model('tution_info_model');
        $this->load->model('tutor_req_model');
        $this->load->model('exam_model', 'exam');
        $this->load->model('request_verify_model', 'verify');

        $t_info = $this->tution_info_model->get_tution_info();
        $user_verifys = $this->verify->get_verify_data_by_user($this->session->userdata('id'));
        $user_verify = (!empty($user_verifys)) ? $user_verifys->status : 0;

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

            $location_info = $this->tution_info_model->get_tution_location_info();

            $available_days = explode(",", $t_info[0]['available_days']);
        } else {
            $location_info = $t_info = $cat_ids = $cateories_class[1] = $class_ids = $classes_sub[1] = $sub_ids = $loc_ids = $available_days = $cities_location = '';
        }

        $user_info = $this->user_model->get_user($this->session->userdata('id'));
        $step = $user_info->step_no;

        $credential_info = $this->tution_info_model->get_credential_info();
        $credential_info_count = $this->tution_info_model->credential_info_count();
        //log_message('ERROR',var_dump($location_info));
        $data = array(
            'tution_info' => $t_info,
            'edu_infos' => $this->tution_info_model->get_tutor_all_edu_info(),
            'personal_info' => $this->tution_info_model->get_personal_info(),
            'profile_pic_info' => $this->tution_info_model->get_profile_pic_info(),
            'user_data' => $user_info,
            'cateories_class' => $cateories_class[1],
            'selected_catagory' => $cateories_class[0],
            'class_ids' => $class_ids,
            'classes_sub' => $classes_sub[1],
            'sub_ids' => $sub_ids,
            'location_info' => $location_info,
            'step' => '0',
            'credential_info' => $credential_info,
            'credential_info_count' => $credential_info_count,
            'available_days' => $available_days,
            'exam_result' => $this->exam->get_exam_result($this->session->userdata('id')),
            'email_count' => $this->data['email_count'],
            'emails' => $this->data['emails'],
            'notification_count' => $this->data['notification_count'],
            'notifications' => $this->data['notifications'],
            'user_verification' => $user_verify,
            'includePage' => 'caretutor_tutor_profile_view'
        );
        $this->load->view('panel', $data);
    }

    public function profile_plain_view() {
     

        $this->load->model('city_location_model');
        $this->load->model('category_model');
        $this->load->model('institute_model');
        $this->load->model('tution_info_model');
        $this->load->model('tutor_req_model');
        $this->load->model('exam_model', 'exam');
        $this->load->model('request_verify_model', 'verify');

        $t_info = $this->tution_info_model->get_tution_info();
        $user_verifys = $this->verify->get_verify_data_by_user($this->session->userdata('id'));
        $user_verify = (!empty($user_verifys)) ? $user_verifys->status : 0;

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

            $location_info = $this->tution_info_model->get_tution_location_info();

            $available_days = explode(",", $t_info[0]['available_days']);
        } else {
            $location_info = $t_info = $cat_ids = $cateories_class[1] = $class_ids = $classes_sub[1] = $sub_ids = $loc_ids = $available_days = $cities_location = '';
        }

        $user_info = $this->user_model->get_user($this->session->userdata('id'));
        $step = $user_info->step_no;

        $review = $this->db->query("select avg(points) review from ct_job_tutor where tutor_id = ". $this->session->userdata('id') ." and points != 0")->row();

        $credential_info = $this->tution_info_model->get_credential_info();
        $credential_info_count = $this->tution_info_model->credential_info_count();
        //log_message('ERROR',var_dump($location_info));
        $data = array(
            'tution_info' => $t_info,
            'edu_infos' => $this->tution_info_model->get_tutor_all_edu_info(),
            'personal_info' => $this->tution_info_model->get_personal_info(),
            'profile_pic_info' => $this->tution_info_model->get_profile_pic_info(),
            'user_data' => $user_info,
            'marks' => $this->user_model->get_marks_by_user($this->session->userdata('id')),
            'cateories_class' => $cateories_class[1],
            'selected_catagory' => $cateories_class[0],
            'class_ids' => $class_ids,
            'classes_sub' => $classes_sub[1],
            'sub_ids' => $sub_ids,
            'location_info' => $location_info,
            'step' => '0',
            'credential_info' => $credential_info,
            'credential_info_count' => $credential_info_count,
            'available_days' => $available_days,
            'email_count' => $this->data['email_count'],
            'emails' => $this->data['emails'],
            'notification_count' => $this->data['notification_count'],
            'notifications' => $this->data['notifications'],
            'includePage' => 'caretutor_tutor_profile_plain_view',
            'user_verification' => $user_verify,
            'exam_result' => $this->exam->get_exam_result($this->session->userdata('id')),
            'review' => $review
        );
        $this->load->view('panel', $data);
    }

    public function generate_cv() {
        $this->load->model('city_location_model');
        $this->load->model('category_model');
        $this->load->model('institute_model');
        $this->load->model('tution_info_model');
        $this->load->model('tutor_req_model');
        $this->load->model('exam_model', 'exam');
        $this->load->model('request_verify_model', 'verify');

        $t_info = $this->tution_info_model->get_tution_info();
        $user_verifys = $this->verify->get_verify_data_by_user($this->session->userdata('id'));
        $user_verify = (!empty($user_verifys)) ? $user_verifys->status : 0;

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

            $location_info = $this->tution_info_model->get_tution_location_info();

            $available_days = explode(",", $t_info[0]['available_days']);
        } else {
            $location_info = $t_info = $cat_ids = $cateories_class[1] = $class_ids = $classes_sub[1] = $sub_ids = $loc_ids = $available_days = $cities_location = '';
        }

        $user_info = $this->user_model->get_user($this->session->userdata('id'));
        $step = $user_info->step_no;

        $credential_info = $this->tution_info_model->get_credential_info();
        $credential_info_count = $this->tution_info_model->credential_info_count();
        //log_message('ERROR',var_dump($location_info));
        $data = array(
            'tution_info' => $t_info,
            'edu_infos' => $this->tution_info_model->get_tutor_all_edu_info(),
            'personal_info' => $this->tution_info_model->get_personal_info(),
            'profile_pic_info' => $this->tution_info_model->get_profile_pic_info(),
            'user_data' => $user_info,
            'cateories_class' => $cateories_class[1],
            'selected_catagory' => $cateories_class[0],
            'class_ids' => $class_ids,
            'classes_sub' => $classes_sub[1],
            'sub_ids' => $sub_ids,
            'location_info' => $location_info,
            'step' => '0',
            'credential_info' => $credential_info,
            'credential_info_count' => $credential_info_count,
            'available_days' => $available_days,
            'email_count' => $this->data['email_count'],
            'emails' => $this->data['emails'],
            'notification_count' => $this->data['notification_count'],
            'notifications' => $this->data['notifications'],
            'includePage' => 'caretutor_tutor_cv_pdf',
            'user_verification' => $user_verify,
            'exam_result' => $this->exam->get_exam_result($this->session->userdata('id')),
        );

        // $this->load->helper(array('dompdf', 'file'));
        // $html = $this->load->view('tutor/caretutor_tutor_cv_pdf', $data, TRUE);
        // $pdf = pdf_create($html, $this->session->userdata('id'), true);
        //write_file('./assets/upload/cv/' . $this->session->userdata('id') . '.pdf', $pdf);

        $html = $this->load->view('tutor/caretutor_tutor_cv_pdf', $data, true);
        $this->load->library('m_pdf');
        $pdf  = $this->m_pdf->load();
        $pdf  = new mPDF('c', 'A4-L');
        $pdf->WriteHTML($html, 0);
        $pdf->debug = true;
        $pdf->allow_output_buffering = true;
        ob_clean();
        $pdf->Output($this->session->userdata('id').'.pdf', 'D');
        exit;
    }

    public function generate_contract_letter($job_id) {
        $this->load->model('city_location_model');
        $this->load->model('category_model');
        $this->load->model('institute_model');
        $this->load->model('tution_info_model');
        $this->load->model('tutor_req_model');
        $this->load->model('exam_model', 'exam');
        $this->load->model('request_verify_model');

        $t_info = $this->tution_info_model->get_tution_info();
        $applied_job_info = $this->tution_info_model->get_applied_job_info();
        // $applied_job_info = $this->tution_info_model->get_job_list();
        $user_info = $this->user_model->get_user($this->session->userdata('id'));

        $step = $user_info->step_no;
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
            //$sub = $this->sdg_model->get_sdg_array($sub_ids);

            $loc_ids = explode(',', $t_info[0]['pref_locations']);

            if ($t_info[0]['city_id'] != '' && $t_info[0]['city_id'] != '3') {
                $cities_location = $this->city_location_model->get_location($t_info[0]['city_id']);
            } else {
                $cities_location = '';
            }

            $available_days = explode(",", $t_info[0]['available_days']);
        } else {
            $t_info = $cat_ids = $cateories_class[1] = $class_ids = $classes_sub[1] = $sub_ids = $loc_ids = $available_days = $cities_location = '';
        }

//        $credential_info = $this->tution_info_model->get_credential_info();
//        $credential_info_count = $this->tution_info_model->credential_info_count();

        $data = array(
            'tution_info' => $t_info,
            'edu_infos' => $this->tution_info_model->get_tutor_all_edu_info(),
            'personal_info' => $this->tution_info_model->get_personal_info(),
            'applied_job_info' => $applied_job_info,
            'assigned_jobs' => $this->tutor_req_model->generate_pdf_job_list_by_tutor("Assign", $job_id),
            'user_data' => $user_info,
        );

//      $this->load->view('tutor/caretutor_tutor_contract_paper', $data);
        // $this->load->helper(array('dompdf', 'file'));
        // $html = $this->load->view('tutor/caretutor_tutor_contract_paper', $data, TRUE);
        // $pdf = pdf_create($html, $job_id, true);
        //write_file('./assets/upload/contract_paper/' . $job_id . '.pdf', $pdf);
        $html = $this->load->view('tutor/caretutor_tutor_contract_paper', $data, true);
        $this->load->library('m_pdf');
        $pdf  = $this->m_pdf->load();
        $pdf  = new mPDF('c', 'A4-L');
        $pdf->WriteHTML($html, 0);
        $pdf->debug = true;
        $pdf->allow_output_buffering = true;
        ob_clean();
        $pdf->Output($job_id.'.pdf', 'D');
        exit;
    }

    public function profile_cv_view() {
        $this->load->model('city_location_model');
        $this->load->model('category_model');
        $this->load->model('institute_model');
        $this->load->model('tution_info_model');
        $this->load->model('tutor_req_model');
        $this->load->model('exam_model', 'exam');

        $t_info = $this->tution_info_model->get_tution_info();

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

            $location_info = $this->tution_info_model->get_tution_location_info();

            $available_days = explode(",", $t_info[0]['available_days']);
        } else {
            $location_info = $t_info = $cat_ids = $cateories_class[1] = $class_ids = $classes_sub[1] = $sub_ids = $loc_ids = $available_days = $cities_location = '';
        }

        $user_info = $this->user_model->get_user($this->session->userdata('id'));
        $step = $user_info->step_no;

        $credential_info = $this->tution_info_model->get_credential_info();
        //log_message('ERROR',var_dump($location_info));
        $data = array(
            'tution_info' => $t_info,
            'edu_infos' => $this->tution_info_model->get_tutor_all_edu_info(),
            'personal_info' => $this->tution_info_model->get_personal_info(),
            'profile_pic_info' => $this->tution_info_model->get_profile_pic_info(),
            'user_data' => $user_info,
            'cateories_class' => $cateories_class[1],
            'selected_catagory' => $cateories_class[0],
            'class_ids' => $class_ids,
            'classes_sub' => $classes_sub[1],
            'sub_ids' => $sub_ids,
            'location_info' => $location_info,
            'step' => '0',
            'credential_info' => $credential_info,
            'available_days' => $available_days,
            'email_count' => $this->data['email_count'],
            'emails' => $this->data['emails'],
            'notification_count' => $this->data['notification_count'],
            'notifications' => $this->data['notifications'],
            'includePage' => 'caretutor_tutor_profile_cv_view',
            'exam_result' => $this->exam->get_exam_result($this->session->userdata('id')),
        );
        $this->load->view('panel', $data);
    }

    public function profile_view_from_uc() {
        $this->load->model('city_location_model');
        $this->load->model('category_model');
        $this->load->model('institute_model');
        $this->load->model('tution_info_model');
        $this->load->model('tutor_req_model');
        $this->load->model('exam_model', 'exam');
        $this->load->model('request_verify_model', 'verify');

        $t_info = $this->tution_info_model->get_tution_info();
        $user_verifys = $this->verify->get_verify_data_by_user($this->session->userdata('id'));
        $user_verify = (!empty($user_verifys)) ? $user_verifys->status : 0;

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

            $location_info = $this->tution_info_model->get_tution_location_info();

            $available_days = explode(",", $t_info[0]['available_days']);
        } else {
            $location_info = $t_info = $cat_ids = $cateories_class[1] = $class_ids = $classes_sub[1] = $sub_ids = $loc_ids = $available_days = $cities_location = '';
        }

        $user_info = $this->user_model->get_user($this->session->userdata('id'));
        $step = $user_info->step_no;

        $credential_info = $this->tution_info_model->get_credential_info();
        $credential_info_count = $this->tution_info_model->credential_info_count();

        $data = array(
            'tution_info' => $t_info,
            'edu_infos' => $this->tution_info_model->get_tutor_all_edu_info(),
            'personal_info' => $this->tution_info_model->get_personal_info(),
            'user_data' => $user_info,
            'cateories_class' => $cateories_class[1],
            'class_ids' => $class_ids,
            'classes_sub' => $classes_sub[1],
            'sub_ids' => $sub_ids,
            'location_info' => $location_info,
            'step' => '1',
            'credential_info' => $credential_info,
            'credential_info_count' => $credential_info_count,
            'available_days' => $available_days,
            'profile_pic_info' => $this->tution_info_model->get_profile_pic_info(),
            'email_count' => $this->data['email_count'],
            'emails' => $this->data['emails'],
            'notification_count' => $this->data['notification_count'],
            'notifications' => $this->data['notifications'],
            'includePage' => 'caretutor_tutor_profile_view',
            'user_verification' => $user_verify,
            'exam_result' => $this->exam->get_exam_result($this->session->userdata('id')),
        );
        $this->load->view('panel', $data);
    }

    public function ajax_upload_credential_info() {
        $this->load->model('tution_info_model');
        $this->load->model('notification_model', 'notification');
        $data_count = $this->tution_info_model->credential_info_count();

        if ($data_count <= 3) {
            $data = array(
                'user_id' => $this->session->userdata('id'),
                'name_of_the_credential' => $this->input->post('name_of_the_credential'),
                'file_name' => $this->input->post('file_name'),
                'created_at' => date('Y-m-d H:i:s')
            );
            $result = $this->tution_info_model->upload_credential_info($data);
            $this->notification->verification_profile_update_notification($this->session->userdata('id'), NULL, 'Credentials');
            echo "success";
        } else {
            echo "failed";
        }
    }

    public function delete_credential() {
        $this->load->model('tution_info_model');
        $this->tution_info_model->delete_credential($this->input->post('id'));
        echo TRUE;
    }

    public function email_list() {
   

        $this->load->model('city_location_model');
        $this->load->model('category_model');
        $this->load->model('institute_model');
        $this->load->model('tution_info_model');
        $this->load->model('tutor_req_model');
        $this->load->model('exam_model', 'exam');
        $this->load->model('request_verify_model', 'verify');

        $t_info = $this->tution_info_model->get_tution_info();
        $user_verifys = $this->verify->get_verify_data_by_user($this->session->userdata('id'));
        $user_verify = (!empty($user_verifys)) ? $user_verifys->status : 0;

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

            $location_info = $this->tution_info_model->get_tution_location_info();

            $available_days = explode(",", $t_info[0]['available_days']);
        } else {
            $location_info = $t_info = $cat_ids = $cateories_class[1] = $class_ids = $classes_sub[1] = $sub_ids = $loc_ids = $available_days = $cities_location = '';
        }

        $user_info = $this->user_model->get_user($this->session->userdata('id'));
        $step = $user_info->step_no;

        $credential_info = $this->tution_info_model->get_credential_info();
        $credential_info_count = $this->tution_info_model->credential_info_count();


        $data = array(
            'tution_info' => $t_info,
            'edu_infos' => $this->tution_info_model->get_tutor_all_edu_info(),
            'personal_info' => $this->tution_info_model->get_personal_info(),
            //'applied_job_info' => $applied_job_info,
            'assigned_jobs' => $this->tutor_req_model->get_invited_job_list("Assign"),
            'user_data' => $user_info,
            'cateories_class' => $cateories_class[1],
            'class_ids' => $class_ids,
            'classes_sub' => $classes_sub[1],
            'sub_ids' => $sub_ids,
            'location_info' => $location_info,
            'step' => '1',
            'credential_info' => $credential_info,
            'credential_info_count' => $credential_info_count,
            'profile_pic_info' => $this->tution_info_model->get_profile_pic_info(),
            'email_count' => $this->data['email_count'],
            'emails' => $this->data['emails'],
            'notification_count' => $this->data['notification_count'],
            'notifications' => $this->data['notifications'],
            'subs_emails' => $this->user_model->subs_email($this->data['emails']),
            'user_verification' => $user_verify,
            'includePage' => 'caretutor_tutor_email_list',
            'exam_result' => $this->exam->get_exam_result($this->session->userdata('id')),
        );
        $this->load->view('panel', $data);
    }

    public function settings() {
       
        $this->load->model('city_location_model');
        $this->load->model('category_model');
        $this->load->model('institute_model');
        $this->load->model('tution_info_model');
        $this->load->model('tutor_req_model');
        $this->load->model('request_verify_model');
        $this->load->model('exam_model', 'exam');

        $t_info = $this->tution_info_model->get_tution_info();
        $applied_job_info = $this->tution_info_model->get_applied_job_info();
        $verification_info = $this->request_verify_model->get_verify_data_by_user($this->session->userdata('id'));
        //$verification_info = ($verification_infos == NULL) ? "" : $verification_infos;
        $user_info = $this->user_model->get_user($this->session->userdata('id'));
        $user_verifys = $this->request_verify_model->get_verify_data_by_user($this->session->userdata('id'));
        $user_verify = (!empty($user_verifys)) ? $user_verifys->status : 0;

        $step = $user_info->step_no;
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

            $loc_ids = explode(',', $t_info[0]['pref_locations']);

            if ($t_info[0]['city_id'] != '' && $t_info[0]['city_id'] != '3') {
                $cities_location = $this->city_location_model->get_location($t_info[0]['city_id']);
            } else {
                $cities_location = '';
            }
            $location_info = $this->tution_info_model->get_tution_location_info();
            $available_days = explode(",", $t_info[0]['available_days']);
        } else {
            $t_info = $cat_ids = $location_info = $cateories_class[1] = $class_ids = $classes_sub[1] = $sub_ids = $loc_ids = $available_days = $cities_location = '';
        }
        $credential_info = $this->tution_info_model->get_credential_info();
        $credential_info_count = $this->tution_info_model->credential_info_count();
        $data = array(
            'tution_info' => $t_info,
            'edu_infos' => $this->tution_info_model->get_tutor_all_edu_info(),
            'personal_info' => $this->tution_info_model->get_personal_info(),
            'applied_job_info' => $applied_job_info,
            'assigned_jobs' => $this->tutor_req_model->get_invited_job_list("Assign"),
            'user_data' => $user_info,
            'verify_data' => $verification_info,
            'user_verification' => $user_verify,
            'cateories_class' => $cateories_class[1],
            'selected_catagory' => $cateories_class[0],
            'class_ids' => $class_ids,
            'classes_sub' => $classes_sub[1],
            'step' => $step,
            'location_info' => $location_info,
            'credential_info' => $credential_info,
            'credential_info_count' => $credential_info_count,
            'profile_pic_info' => $this->tution_info_model->get_profile_pic_info(),
            'email_count' => $this->data['email_count'],
            'emails' => $this->data['emails'],
            'notification_count' => $this->data['notification_count'],
            'notifications' => $this->data['notifications'],
            'subs_emails' => $this->user_model->subs_email($this->data['emails']),
            'includePage' => 'caretutor_tutor_settings',
            'exam_result' => $this->exam->get_exam_result($this->session->userdata('id')),
        );
        $this->load->view('panel', $data);
    }

    public function contract_confirmation() {

        
        $this->load->model('city_location_model');
        $this->load->model('category_model');
        $this->load->model('institute_model');
        $this->load->model('tution_info_model');
        $this->load->model('tutor_req_model');
        $this->load->model('exam_model', 'exam');
        $this->load->model('request_verify_model');

        $t_info = $this->tution_info_model->get_tution_info();
       
        $applied_job_info = $this->tution_info_model->get_applied_job_info();
      
        // $applied_job_info = $this->tution_info_model->get_job_list();
        $user_info = $this->user_model->get_user($this->session->userdata('id'));
       
        $user_verifys = $this->request_verify_model->get_verify_data_by_user($this->session->userdata('id'));
        $user_verify = (!empty($user_verifys)) ? $user_verifys->status : 0;
       
        $step = $user_info->step_no;
      
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
            //$sub = $this->sdg_model->get_sdg_array($sub_ids);

            $loc_ids = explode(',', $t_info[0]['pref_locations']);

            if ($t_info[0]['city_id'] != '' && $t_info[0]['city_id'] != '3') {
                $cities_location = $this->city_location_model->get_location($t_info[0]['city_id']);
            } else {
                $cities_location = '';
            }
            $location_info = $this->tution_info_model->get_tution_location_info();
            $available_days = explode(",", $t_info[0]['available_days']);
        } else {
            $t_info = $cat_ids = $location_info = $cateories_class[1] = $class_ids = $classes_sub[1] = $sub_ids = $loc_ids = $available_days = $cities_location = '';
        }

        $credential_info = $this->tution_info_model->get_credential_info();
        $credential_info_count = $this->tution_info_model->credential_info_count();
       
        $data = array(
            'tution_info' => $t_info,
            'edu_infos' => $this->tution_info_model->get_tutor_all_edu_info(),
            'personal_info' => $this->tution_info_model->get_personal_info(),
            'applied_job_info' => $applied_job_info,
            'assigned_jobs' => $this->tutor_req_model->get_invited_job_list_by_tutor("Assign"),
            'user_data' => $user_info,
            'profile_pic_info' => $this->tution_info_model->get_profile_pic_info(),
            'step' => $step,
            'cateories_class' => $cateories_class[1],
            'selected_catagory' => $cateories_class[0],
            'class_ids' => $class_ids,
            'classes_sub' => $classes_sub[1],
            'sub_ids' => $sub_ids,
            'location_info' => $location_info,
            'email_count' => $this->data['email_count'],
            'emails' => $this->data['emails'],
            'notification_count' => $this->data['notification_count'],
            'notifications' => $this->data['notifications'],
            'credential_info' => $credential_info,
            'user_verification' => $user_verify,
            'credential_info_count' => $credential_info_count,
            'includePage' => 'caretutor_tutor_contract_confirmation',
            'exam_result' => $this->exam->get_exam_result($this->session->userdata('id')),
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

    public function update_settings_personal_info() {
        $data['full_name'] = $this->input->post('full_name');
        $data['mobile_no'] = $this->input->post('mobile_no');
        $update = update('ct_user', $data, ['id' => $this->session->userdata('id')]);
        if ($update == TRUE) {
            echo 1;
        } elseif ($update == FALSE) {
            echo 0;
        }
    }

    public function update_settings_address_verification() {
        $this->load->model('notification_model', 'notification');
        
        $address_verification_code = $this->input->post('address_verification_code');
        $findData = find('ct_tutor_verification', '*', ['user_id' => $this->session->userdata('id')]);
        if ($findData->address_verification_code == $address_verification_code) {
            $update = update('ct_tutor_verification', ['address_verified' => '1'], ['id' => $findData->id]);
            $this->notification->verification_address_verify_notification($this->session->userdata('id'), NULL);
            echo 1;
        } else {
            echo 0;
        }
    }

    public function request_for_verification() {
        $this->load->model('request_verify_model');
        $this->load->model('user_model');
        $this->load->model('notification_model', 'notification');

        $data = array(
            'user_id' => $this->session->userdata('id'),
            'payment_method' => "",
            'amount' => 0,
            'ref_no' => "",
            'payment_status' => 0,
            'status' => 0,
            'seen' => 1
        );

        $return = $this->request_verify_model->insert_verify_data($data);
        $this->notification->verification_request_notification($this->session->userdata('id'), $return);

        if ($return == TRUE) {
            echo 1;
        } elseif ($return == FALSE) {
            echo 0;
        }
        //echo $this->session->userdata('id');
    }

    public function request_edit_profile() {
        $this->load->model('request_verify_model');
        $this->load->model('user_model');
        $this->load->model('notification_model', 'notification');

        $data = array(
            'status' => 5,
            'seen' => 1
        );

        $return = $this->request_verify_model->update_verification($data);
        $this->notification->verification_enable_edit_notification($this->session->userdata('id'), NULL);

        if ($return == TRUE) {
            echo 1;
        } elseif ($return == FALSE) {
            echo 0;
        }
        //echo $this->session->userdata('id');
    }

    public function update_settings_unlock_request() {
        $tutor_id = $this->session->userdata('id');
        $findPrev = find('ct_user', 'id', ['id' => $tutor_id, 'user_status' => 'unlock_req']);
        
        if (!empty($findPrev)) {
            echo 0;
            exit();
        }

        $update = update('ct_user', ['user_status' => 'unlock_req'], ['id' => $tutor_id]);
        echo 1;
    }

    public function send_data_verification() {
        $this->load->model('request_verify_model');
        $this->load->model('user_model');

        $data = array(
            'payment_method' => $this->input->post('payment_method'),
            'ref_no' => $this->input->post('ref_no'),
            'payment_status' => 1,
            'status' => 2,
            'seen' => 1
        );

        $return = $this->request_verify_model->update_verification($data);

        $admins = $this->user_model->get_admins_id();
        $message = 'Payment has been send for verification by Tutor ID: ' . $this->session->userdata('id');
        foreach ($admins as $admin) {
            $this->send_notification($this->session->userdata('id'), $admin['id'], $message);
        }
        if ($return == TRUE) {
            echo 1;
        } elseif ($return == FALSE) {
            echo 0;
        }
        //echo $this->session->userdata('id');
    }

    public function become_good_tutor() {
      

        $this->load->model('city_location_model');
        $this->load->model('category_model');
        $this->load->model('institute_model');
        $this->load->model('tution_info_model');
        $this->load->model('tutor_req_model');
        $this->load->model('exam_model');
        $this->load->model('request_verify_model', 'verify');

        $t_info = $this->tution_info_model->get_tution_info();
        $applied_job_info = $this->tution_info_model->get_applied_job_info();
        $user_verifys = $this->verify->get_verify_data_by_user($this->session->userdata('id'));
        $user_verify = (!empty($user_verifys)) ? $user_verifys->status : 0;
        $user_info = $this->user_model->get_user($this->session->userdata('id'));


        $step = $user_info->step_no;

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

            $loc_ids = explode(',', $t_info[0]['pref_locations']);

            if ($t_info[0]['city_id'] != '' && $t_info[0]['city_id'] != '3') {
                $cities_location = $this->city_location_model->get_location($t_info[0]['city_id']);
            } else {
                $cities_location = '';
            }
            $location_info = $this->tution_info_model->get_tution_location_info();
            $available_days = explode(",", $t_info[0]['available_days']);
        } else {
            $t_info = $cat_ids = $location_info = $cateories_class[1] = $class_ids = $classes_sub[1] = $sub_ids = $loc_ids = $available_days = $cities_location = '';
        }
        $credential_info = $this->tution_info_model->get_credential_info();
        $credential_info_count = $this->tution_info_model->credential_info_count();
        $data = array(
            'tution_info' => $t_info,
            'edu_infos' => $this->tution_info_model->get_tutor_all_edu_info(),
            'personal_info' => $this->tution_info_model->get_personal_info(),
            'applied_job_info' => $applied_job_info,
            'assigned_jobs' => $this->tutor_req_model->get_invited_job_list("Assign"),
            'user_data' => $user_info,
            'step' => $step,
            'cateories_class' => $cateories_class[1],
            'selected_catagory' => $cateories_class[0],
            'class_ids' => $class_ids,
            'classes_sub' => $classes_sub[1],
            'sub_ids' => $sub_ids,
            'location_info' => $location_info,
            'user_verification' => $user_verify,
            'credential_info' => $credential_info,
            'credential_info_count' => $credential_info_count,
            'personal_info' => $this->tution_info_model->get_personal_info(),
            'profile_pic_info' => $this->tution_info_model->get_profile_pic_info(),
            'email_count' => $this->data['email_count'],
            'emails' => $this->data['emails'],
            'notification_count' => $this->data['notification_count'],
            'notifications' => $this->data['notifications'],
            'invoice_lists' => $this->user_model->invoice_lists(),
            'verify_invoice_lists' => $this->user_model->verify_invoice_lists(),
            'includePage' => 'caretutor_tutor_become_good_tutor',
            'exam_result' => $this->exam_model->get_exam_result($this->session->userdata('id'))
        );
        $this->load->view('panel', $data);
    }

    public function safety_guideline() {
      
        $this->load->model('city_location_model');
        $this->load->model('category_model');
        $this->load->model('institute_model');
        $this->load->model('tution_info_model');
        $this->load->model('tutor_req_model');
        $this->load->model('exam_model');
        $this->load->model('request_verify_model', 'verify');

        $t_info = $this->tution_info_model->get_tution_info();
        $applied_job_info = $this->tution_info_model->get_applied_job_info();
        $user_verifys = $this->verify->get_verify_data_by_user($this->session->userdata('id'));
        $user_verify = (!empty($user_verifys)) ? $user_verifys->status : 0;
        $user_info = $this->user_model->get_user($this->session->userdata('id'));


        $step = $user_info->step_no;

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

            $loc_ids = explode(',', $t_info[0]['pref_locations']);

            if ($t_info[0]['city_id'] != '' && $t_info[0]['city_id'] != '3') {
                $cities_location = $this->city_location_model->get_location($t_info[0]['city_id']);
            } else {
                $cities_location = '';
            }
            $location_info = $this->tution_info_model->get_tution_location_info();
            $available_days = explode(",", $t_info[0]['available_days']);
        } else {
            $t_info = $cat_ids = $location_info = $cateories_class[1] = $class_ids = $classes_sub[1] = $sub_ids = $loc_ids = $available_days = $cities_location = '';
        }
        $credential_info = $this->tution_info_model->get_credential_info();
        $credential_info_count = $this->tution_info_model->credential_info_count();
        $data = array(
            'tution_info' => $t_info,
            'edu_infos' => $this->tution_info_model->get_tutor_all_edu_info(),
            'personal_info' => $this->tution_info_model->get_personal_info(),
            'applied_job_info' => $applied_job_info,
            'assigned_jobs' => $this->tutor_req_model->get_invited_job_list("Assign"),
            'user_data' => $user_info,
            'step' => $step,
            'cateories_class' => $cateories_class[1],
            'selected_catagory' => $cateories_class[0],
            'class_ids' => $class_ids,
            'classes_sub' => $classes_sub[1],
            'sub_ids' => $sub_ids,
            'location_info' => $location_info,
            'user_verification' => $user_verify,
            'credential_info' => $credential_info,
            'credential_info_count' => $credential_info_count,
            'personal_info' => $this->tution_info_model->get_personal_info(),
            'profile_pic_info' => $this->tution_info_model->get_profile_pic_info(),
            'email_count' => $this->data['email_count'],
            'emails' => $this->data['emails'],
            'notification_count' => $this->data['notification_count'],
            'notifications' => $this->data['notifications'],
            'invoice_lists' => $this->user_model->invoice_lists(),
            'verify_invoice_lists' => $this->user_model->verify_invoice_lists(),
            'includePage' => 'caretutor_tutor_safety_guidelines',
            'exam_result' => $this->exam_model->get_exam_result($this->session->userdata('id'))
        );

        $this->load->view('panel', $data);
    }

    public function tutors_tips() {
       

        $this->load->model('city_location_model');
        $this->load->model('category_model');
        $this->load->model('institute_model');
        $this->load->model('tution_info_model');
        $this->load->model('tutor_req_model');
        $this->load->model('exam_model');
        $this->load->model('request_verify_model', 'verify');

        $t_info = $this->tution_info_model->get_tution_info();
        $applied_job_info = $this->tution_info_model->get_applied_job_info();
        $user_verifys = $this->verify->get_verify_data_by_user($this->session->userdata('id'));
        $user_verify = (!empty($user_verifys)) ? $user_verifys->status : 0;
        $user_info = $this->user_model->get_user($this->session->userdata('id'));


        $step = $user_info->step_no;

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

            $loc_ids = explode(',', $t_info[0]['pref_locations']);

            if ($t_info[0]['city_id'] != '' && $t_info[0]['city_id'] != '3') {
                $cities_location = $this->city_location_model->get_location($t_info[0]['city_id']);
            } else {
                $cities_location = '';
            }
            $location_info = $this->tution_info_model->get_tution_location_info();
            $available_days = explode(",", $t_info[0]['available_days']);
        } else {
            $t_info = $cat_ids = $location_info = $cateories_class[1] = $class_ids = $classes_sub[1] = $sub_ids = $loc_ids = $available_days = $cities_location = '';
        }
        $credential_info = $this->tution_info_model->get_credential_info();
        $credential_info_count = $this->tution_info_model->credential_info_count();
        $data = array(
            'tution_info' => $t_info,
            'edu_infos' => $this->tution_info_model->get_tutor_all_edu_info(),
            'personal_info' => $this->tution_info_model->get_personal_info(),
            'applied_job_info' => $applied_job_info,
            'assigned_jobs' => $this->tutor_req_model->get_invited_job_list("Assign"),
            'user_data' => $user_info,
            'step' => $step,
            'cateories_class' => $cateories_class[1],
            'selected_catagory' => $cateories_class[0],
            'class_ids' => $class_ids,
            'classes_sub' => $classes_sub[1],
            'sub_ids' => $sub_ids,
            'location_info' => $location_info,
            'user_verification' => $user_verify,
            'credential_info' => $credential_info,
            'credential_info_count' => $credential_info_count,
            'personal_info' => $this->tution_info_model->get_personal_info(),
            'profile_pic_info' => $this->tution_info_model->get_profile_pic_info(),
            'email_count' => $this->data['email_count'],
            'emails' => $this->data['emails'],
            'notification_count' => $this->data['notification_count'],
            'notifications' => $this->data['notifications'],
            'invoice_lists' => $this->user_model->invoice_lists(),
            'verify_invoice_lists' => $this->user_model->verify_invoice_lists(),
            'includePage' => 'caretutor_tutor_tutors_tips',
            'exam_result' => $this->exam_model->get_exam_result($this->session->userdata('id'))
        );
        $this->load->view('panel', $data);
    }

    public function payment() {
      

        $this->load->model('city_location_model');
        $this->load->model('category_model');
        $this->load->model('institute_model');
        $this->load->model('tution_info_model');
        $this->load->model('tutor_req_model');
        $this->load->model('exam_model', 'exam');
        $this->load->model('request_verify_model');

        $t_info = $this->tution_info_model->get_tution_info();
        $applied_job_info = $this->tution_info_model->get_applied_job_info();
        // $applied_job_info = $this->tution_info_model->get_job_list();
        $user_info = $this->user_model->get_user($this->session->userdata('id'));
        $user_verifys = $this->request_verify_model->get_verify_data_by_user($this->session->userdata('id'));
        $user_verify = (!empty($user_verifys)) ? $user_verifys->status : 0;

        $step = $user_info->step_no;
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
            //$sub = $this->sdg_model->get_sdg_array($sub_ids);

            $loc_ids = explode(',', $t_info[0]['pref_locations']);

            if ($t_info[0]['city_id'] != '' && $t_info[0]['city_id'] != '3') {
                $cities_location = $this->city_location_model->get_location($t_info[0]['city_id']);
            } else {
                $cities_location = '';
            }
            $location_info = $this->tution_info_model->get_tution_location_info();
            $available_days = explode(",", $t_info[0]['available_days']);
        } else {
            $t_info = $cat_ids = $location_info = $cateories_class[1] = $class_ids = $classes_sub[1] = $sub_ids = $loc_ids = $available_days = $cities_location = '';
        }

        $credential_info = $this->tution_info_model->get_credential_info();
        $credential_info_count = $this->tution_info_model->credential_info_count();

        $data = array(
            'tution_info' => $t_info,
            'edu_infos' => $this->tution_info_model->get_tutor_all_edu_info(),
            'personal_info' => $this->tution_info_model->get_personal_info(),
            'applied_job_info' => $applied_job_info,
            'assigned_jobs' => $this->tutor_req_model->get_invited_job_list_by_tutor("Assign"),
            'user_data' => $user_info,
            'profile_pic_info' => $this->tution_info_model->get_profile_pic_info(),
            'step' => $step,
            'cateories_class' => $cateories_class[1],
            'selected_catagory' => $cateories_class[0],
            'class_ids' => $class_ids,
            'classes_sub' => $classes_sub[1],
            'sub_ids' => $sub_ids,
            'location_info' => $location_info,
            'email_count' => $this->data['email_count'],
            'emails' => $this->data['emails'],
            'notification_count' => $this->data['notification_count'],
            'notifications' => $this->data['notifications'],
            'credential_info' => $credential_info,
            'user_verification' => $user_verify,
            'credential_info_count' => $credential_info_count,
            'includePage' => 'caretutor_tutor_payment',
            'exam_result' => $this->exam->get_exam_result($this->session->userdata('id')),
        );
        // dd($data);
        $this->load->view('panel', $data);
    }

    public function invoice_list() {
       

        $this->load->model('city_location_model');
        $this->load->model('category_model');
        $this->load->model('institute_model');
        $this->load->model('tution_info_model');
        $this->load->model('tutor_req_model');
        $this->load->model('exam_model');
        $this->load->model('request_verify_model', 'verify');

        $t_info = $this->tution_info_model->get_tution_info();
        $applied_job_info = $this->tution_info_model->get_applied_job_info();
        $user_verifys = $this->verify->get_verify_data_by_user($this->session->userdata('id'));
        $user_verify = (!empty($user_verifys)) ? $user_verifys->status : 0;
        $user_info = $this->user_model->get_user($this->session->userdata('id'));


        $step = $user_info->step_no;

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

            $loc_ids = explode(',', $t_info[0]['pref_locations']);

            if ($t_info[0]['city_id'] != '' && $t_info[0]['city_id'] != '3') {
                $cities_location = $this->city_location_model->get_location($t_info[0]['city_id']);
            } else {
                $cities_location = '';
            }
            $location_info = $this->tution_info_model->get_tution_location_info();
            $available_days = explode(",", $t_info[0]['available_days']);
        } else {
            $t_info = $cat_ids = $location_info = $cateories_class[1] = $class_ids = $classes_sub[1] = $sub_ids = $loc_ids = $available_days = $cities_location = '';
        }
        $credential_info = $this->tution_info_model->get_credential_info();
        $credential_info_count = $this->tution_info_model->credential_info_count();
        $data = array(
            'tution_info' => $t_info,
            'edu_infos' => $this->tution_info_model->get_tutor_all_edu_info(),
            'personal_info' => $this->tution_info_model->get_personal_info(),
            'applied_job_info' => $applied_job_info,
            'assigned_jobs' => $this->tutor_req_model->get_invited_job_list("Assign"),
            'user_data' => $user_info,
            'step' => $step,
            'cateories_class' => $cateories_class[1],
            'selected_catagory' => $cateories_class[0],
            'class_ids' => $class_ids,
            'classes_sub' => $classes_sub[1],
            'sub_ids' => $sub_ids,
            'location_info' => $location_info,
            'user_verification' => $user_verify,
            'credential_info' => $credential_info,
            'credential_info_count' => $credential_info_count,
            'personal_info' => $this->tution_info_model->get_personal_info(),
            'profile_pic_info' => $this->tution_info_model->get_profile_pic_info(),
            'email_count' => $this->data['email_count'],
            'emails' => $this->data['emails'],
            'notification_count' => $this->data['notification_count'],
            'notifications' => $this->data['notifications'],
            'invoice_lists' => $this->user_model->invoice_lists(),
            'verify_invoice_lists' => $this->user_model->verify_invoice_lists(),
            'includePage' => 'caretutor_tutor_invoice_list',
            'exam_result' => $this->exam_model->get_exam_result($this->session->userdata('id'))
        );

        $this->load->view('panel', $data);
    }

    public function verify_invoice_list() {
      

        $this->load->model('city_location_model');
        $this->load->model('category_model');
        $this->load->model('institute_model');
        $this->load->model('tution_info_model');
        $this->load->model('tutor_req_model');
        $this->load->model('exam_model');
        $this->load->model('request_verify_model', 'verify');

        $t_info = $this->tution_info_model->get_tution_info();
        $applied_job_info = $this->tution_info_model->get_applied_job_info();
        $user_verifys = $this->verify->get_verify_data_by_user($this->session->userdata('id'));
        $user_verify = (!empty($user_verifys)) ? $user_verifys->status : 0;
        $user_info = $this->user_model->get_user($this->session->userdata('id'));
        $step = $user_info->step_no;

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

            $loc_ids = explode(',', $t_info[0]['pref_locations']);

            if ($t_info[0]['city_id'] != '' && $t_info[0]['city_id'] != '3') {
                $cities_location = $this->city_location_model->get_location($t_info[0]['city_id']);
            } else {
                $cities_location = '';
            }

            $location_info = $this->tution_info_model->get_tution_location_info();
            $available_days = explode(",", $t_info[0]['available_days']);
        } else {
            $t_info = $cat_ids = $location_info = $cateories_class[1] = $class_ids = $classes_sub[1] = $sub_ids = $loc_ids = $available_days = $cities_location = '';
        }
        $credential_info = $this->tution_info_model->get_credential_info();
        $credential_info_count = $this->tution_info_model->credential_info_count();
        $data = array(
            'tution_info' => $t_info,
            'edu_infos' => $this->tution_info_model->get_tutor_all_edu_info(),
            'personal_info' => $this->tution_info_model->get_personal_info(),
            'applied_job_info' => $applied_job_info,
            'assigned_jobs' => $this->tutor_req_model->get_invited_job_list("Assign"),
            'user_data' => $user_info,
            'step' => $step,
            'cateories_class' => $cateories_class[1],
            'selected_catagory' => $cateories_class[0],
            'class_ids' => $class_ids,
            'classes_sub' => $classes_sub[1],
            'sub_ids' => $sub_ids,
            'location_info' => $location_info,
            'user_verification' => $user_verify,
            'credential_info' => $credential_info,
            'credential_info_count' => $credential_info_count,
            'personal_info' => $this->tution_info_model->get_personal_info(),
            'profile_pic_info' => $this->tution_info_model->get_profile_pic_info(),
            'email_count' => $this->data['email_count'],
            'emails' => $this->data['emails'],
            'notification_count' => $this->data['notification_count'],
            'notifications' => $this->data['notifications'],
            'invoice_lists' => $this->user_model->invoice_lists(),
            'verify_invoice_lists' => $this->user_model->verify_invoice_lists(),
            'includePage' => 'caretutor_tutor_verify_invoice_list',
            'exam_result' => $this->exam_model->get_exam_result($this->session->userdata('id'))
        );

        $this->load->view('panel', $data);
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

    public function instituteAutoCompleteData() {
      $search = $this->input->post('search');
      // $keywords = explode(' ', $search);

      $this->db->select('id, institute');
      $this->db->from('ct_institute');
      $this->db->like('institute', $search);
      // foreach ($keywords as $key => $value) {
      //   $this->db->like('institute', $value);
      // }
      $this->db->where('suggest !=', 0);
      $this->db->group_by('institute');
      $this->db->limit(5);
      $query = $this->db->get();
      $instituteInfo = $query->result();
      $arr = [];

      // dd($instituteInfo);
      foreach ($instituteInfo as $key => $value) {
        $data['id']     = $value->id;
        $data['value']  = htmlentities(stripslashes($value->institute));
        array_push($arr, $data);
      }

      echo json_encode($arr);
    }

    public function groupAutoCompleteData() {
        $search = $this->input->post('search');
        // $keywords = explode(' ', $search);

        $this->db->select('id, sdg');
        $this->db->from('ct_sdg');
        $this->db->like('sdg', $search);
        // foreach ($keywords as $key => $value) {
        //   $this->db->like('institute', $value);
        // }
        $this->db->where('suggest !=', 0);
        $this->db->group_by('sdg');
        $this->db->limit(5);
        $query = $this->db->get();
        $sdgInfo = $query->result();
        $arr = [];

        // dd($sdgInfo);
        foreach ($sdgInfo as $key => $value) {
        $data['id']     = $value->id;
        $data['value']  = htmlentities(stripslashes($value->sdg));
        array_push($arr, $data);
        }

        echo json_encode($arr);
    }

    public function test_pay_bill() {
        $this->load->view('test_pay_bill');
    }

    public function success() {
        $valid = $this->input->post('val_id');
        //echo $valid;
        $val_id = urlencode($valid);
        $store_id = urlencode("caretutors001live");
        $store_passwd = urlencode("caretutors001live62805");

        $requested_url = ("https://www.sslcommerz.com.bd/validator/api/testbox/validationserverAPI.php?val_id=" . $val_id . "&Store_Id=" . $store_id . "&Store_Passwd=" . $store_passwd . "&v=1&format=json");

        $handle = curl_init();

        curl_setopt($handle, CURLOPT_URL, $requested_url);
        curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($handle, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, false);
        $result = curl_exec($handle);
        $code = curl_getinfo($handle, CURLINFO_HTTP_CODE);
        //echo $code;
        if ($code == 200 && !( curl_errno($handle))) {
            # TO CONVERT AS OBJECT
            $result = json_decode($result);
            # TRANSACTION INFO
            $status = $result->status;
            $tran_date = $result->tran_date;
            $tran_id = $result->tran_id;
            $val_id = $result->val_id;
            $amount = $result->amount;
            $store_amount = $result->store_amount;
            $bank_tran_id = $result->bank_tran_id;
            $card_type = $result->card_type;
            # ISSUER INFO
            $card_no = $result->card_no;
            $card_issuer = $result->card_issuer;
            $card_brand = $result->card_brand;
            $card_issuer_country = $result->card_issuer_country;
            $card_issuer_country_code = $result->card_issuer_country_code;
            # API AUTHENTICATION
            $apiconnect = $result->APIConnect;
            $validated_on = $result->validated_on;
            $gw_version = $result->gw_version;

            $this->load->model('tutor_req_model');
            $payment_gateway_data = array(
                'invoice_id' => $tran_id,
                'amount' => $amount,
                'card_no' => $card_no,
                'card_issuer' => $card_issuer,
                'card_brand' => $card_brand,
                'card_issuer_country' => $card_issuer_country,
                'card_issuer_country_code' => $card_issuer_country_code,
                'created_at' => date('Y-m-d H:i:s')
            );
            $this->tutor_req_model->payment_gateway_data_save($payment_gateway_data);

            $this->tutor_req_model->update_invoice_status($tran_id);
            //@todo - add issuer info with tran_id in database
            //@todo - update status in job_invoice
            //@todo - load previous view - invoice_list
            redirect('tutor/invoice_list');
        } else {
            echo "Unable to Connect!";
            exit;
        }
    }

    public function fail() {
        echo 'Sorry, your transaction can not be processed now. Please try again later.';
    }

    public function cancel() {
        echo 'Cancel';
    }

    /**
    * Walletmix payment gateways integration
    *  @param
    *  @return
    */
    public function makePayment($job_id)
    {
        //$job_id = $this->input->post('job_id');
        include APPPATH . 'libraries/walletmix.php';
        //include ('../libraries/walletmix.php');
        //$walletmix = NEW walletmix('Caretutors_1493193396', 'Caretutors_1638927444', 'WMX5a3df15f1e3d6','4632689e8b0b6383b8aa4b9243b771782f480346');
        $walletmix = NEW walletmix('Caretutors_1028275196', 'Caretutors_1068122201', 'WMX5a5d9d2898eac','3f40aa11db2f6b6cd81a8595d621b71bc99ab405');


        $user_info = $this->user_model->get_user($this->session->userdata('id'));
        $this->load->model('tution_info_model');
        $personal_info = $this->tution_info_model->get_personal_info();

        $this->load->model('tutor_req_model');
        $invoice_data = $this->tutor_req_model->check_job_tutor( $job_id, $this->session->userdata('id'));


        $customer_info = array(
            "customer_name"     => $user_info->full_name." (".$user_info->id.")",
            "customer_email"    => $user_info->email,
            "customer_add"      => $personal_info[0]['pre_address'],
            //"customer_city"     => "Dhaka",
            "customer_country"  => "Bangladesh",
            "customer_phone"    => $user_info->mobile_no,
        );
        $shipping_info = array(
            "shipping_name" => $user_info->full_name." (".$user_info->id.")",
            "shipping_add" => $personal_info[0]['pre_address'],
            //"shipping_city" => "New York City",
            "shipping_country" => "Bangladesh",
            //"shipping_postCode" => "1600",
        );
        $walletmix->set_shipping_charge(0);
        $walletmix->set_discount(0);

        $products_1 = array('name' => $invoice_data['type'],'price' => $invoice_data['amount'],'quantity' => 1);

        $products = array($products_1);

        $walletmix->set_product_description($products);

        $walletmix->set_merchant_order_id($invoice_data['id']);

        $walletmix->set_app_name('caretutors.com');
        $walletmix->set_currency('BDT');
        $walletmix->set_callback_url(base_url().'tutor/paymentResponse');

        $extra_data = [];

        if ($invoice_data['type'] == 'verify') {
            $extra_data['payment_type'] = 'verification payment';
        } elseif ($invoice_data['type'] == 'job') {
            $extra_data['payment_type'] = 'Tuition matching charge (JOB ID: '. $job_id .')';
        }

        //if you want to send extra data then use this way
        //$extra_data = array('param_1' => 'data_1','param_2' => 'data_2','param_3' => 'data_3');

        $walletmix->set_extra_json($extra_data);

        $walletmix->set_transaction_related_params($customer_info);
        $walletmix->set_transaction_related_params($shipping_info);

        $walletmix->set_database_driver('session'); // options: "txt" or "session"

        $walletmix->send_data_to_walletmix();
    }

    public function paymentResponse()
    {
        include APPPATH . 'libraries/walletmix.php';
        //$this->load->library('WALLETMIX');
        $this->load->model('notification_model', 'notification');

        /*$walletmix = NEW walletmix('Caretutors_1493193396', 'Caretutors_1638927444', 'WMX5a3df15f1e3d6','4632689e8b0b6383b8aa4b9243b771782f480346');*/

        $walletmix = NEW walletmix('Caretutors_1028275196', 'Caretutors_1068122201', 'WMX5a5d9d2898eac','3f40aa11db2f6b6cd81a8595d621b71bc99ab405');

            $walletmix->set_database_driver('session'); // options: "txt" or "session"

            if(isset($_POST['merchant_txn_data'])){
                $merchant_txn_data = json_decode($_POST['merchant_txn_data']);

                $walletmix->get_database_driver();

                if($walletmix->get_database_driver() == 'txt'){
                    $saved_data = json_decode($walletmix->read_file());
                }elseif($walletmix->get_database_driver() == 'session'){
                    // Read data from your database
                    $saved_data = json_decode($walletmix->read_data());
                }
                //var_dump($saved_data);
                if($merchant_txn_data->token === $saved_data->token){

                    $wmx_response = json_decode($walletmix->check_payment($saved_data));
                    //var_dump($wmx_response);
                    //$walletmix->debug($wmx_response,true);
                    if( ($wmx_response->wmx_id == $saved_data->wmx_id) ){
                        if( ($wmx_response->txn_status == '1000') ){
                            if( ($wmx_response->bank_amount_bdt >= $saved_data->amount) ){
                                if( ($wmx_response->merchant_amount_bdt == $saved_data->amount) ){
                                      $this->load->model('tutor_req_model');
                                      $invoice_data = $this->tutor_req_model->check_invoice_info( $wmx_response->merchant_order_id );
                                        $payment_gateway_data = array(
                                            'invoice_id' => $wmx_response->merchant_order_id,
                                            'amount' => $wmx_response->merchant_amount_bdt,
                                            'card_no' => '',
                                            'card_issuer' => '',
                                            'card_brand' => $wmx_response->payment_card,
                                            'card_issuer_country' => '',
                                            'card_issuer_country_code' => '',
                                            'created_at' => date('Y-m-d H:i:s')
                                        );
                                        $this->tutor_req_model->payment_gateway_data_save($payment_gateway_data);
                                        $this->tutor_req_model->update_invoice_status($wmx_response->merchant_order_id);

                                        if($invoice_data['type'] =='job'){

                                            // send notification
                                            // $message = 'The tuition matching charge has been successfully paid for Job ID: '. $invoice_data['job_id'] .' by Tutor ID: ' . $this->session->userdata('id');
                                            // $this->send_notification(42, $this->session->userdata('id'), $message);
                                            // $admins = $this->user_model->get_admins_id();
                                            // foreach ($admins as $admin) {
                                            //     $this->send_notification($this->session->userdata('id'), $admin['id'], $message);
                                            // }
                                            $this->notification->payment_success_notification($this->session->userdata('id'), $wmx_response->merchant_order_id, 'Tuition Matching Charge (Job ID: ' . $invoice_data['job_id'] . ')', 'Website');

                                        } else if($invoice_data['type'] =='verify') {
                                           $this->load->model('request_verify_model');

                                           // send notification
                                           // $message = 'The profile verification charge has been successfully paid by Tutor ID: ' . $this->session->userdata('id');
                                           // $this->send_notification(42, $this->session->userdata('id'), $message);
                                           // $admins = $this->user_model->get_admins_id();
                                           // foreach ($admins as $admin) {
                                           //     $this->send_notification($this->session->userdata('id'), $admin['id'], $message);
                                           // }

                                            // $data = array(
                                            //     'payment_method' => $wmx_response->payment_card,
                                            //     'ref_no' =>  $wmx_response->token,
                                            //     'payment_status' => 1,
                                            //     'status' => 2,
                                            //     'seen' => 1
                                            // );
                                           $data = array(
                                                'payment_method' => $wmx_response->payment_card,
                                                'ref_no' =>  $wmx_response->token,
                                                'payment_status' => 1,
                                                'seen' => 1
                                            );

                                            $return = $this->request_verify_model->update_verification($data);

                                            $this->notification->payment_success_notification($this->session->userdata('id'), $wmx_response->merchant_order_id, 'Profile Verification Charge', 'Website');

                                        }

                                        //@todo - add issuer info with tran_id in database
                                        //@todo - update status in job_invoice
                                        //@todo - load previous view - invoice_list
                                        redirect('tutor/invoice_list');

                                    echo 'Update merchant database with success. amount : '.$wmx_response->bank_amount_bdt;
                                }else{
                                     $this->load->model('tutor_req_model');
                                      $invoice_data = $this->tutor_req_model->check_invoice_info( $wmx_response->merchant_order_id );
                                        $payment_gateway_data = array(
                                            'invoice_id' => $wmx_response->merchant_order_id,
                                            'amount' => $wmx_response->merchant_amount_bdt,
                                            'card_no' => '',
                                            'card_issuer' => '',
                                            'card_brand' => $wmx_response->payment_card,
                                            'card_issuer_country' => '',
                                            'card_issuer_country_code' => '',
                                            'created_at' => date('Y-m-d H:i:s')
                                        );
                                        $this->tutor_req_model->payment_gateway_data_save($payment_gateway_data);
                                        $this->tutor_req_model->update_invoice_status($wmx_response->merchant_order_id);

                                        if($invoice_data['type'] =='job'){
                                            // send notification
                                            $message = 'The tuition matching charge has been successfully paid for Job ID: '. $invoice_data['job_id'] .' by Tutor ID: ' . $this->session->userdata('id');
                                            $this->send_notification(42, $this->session->userdata('id'), $message);
                                            $admins = $this->user_model->get_admins_id();
                                            foreach ($admins as $admin) {
                                                $this->send_notification($this->session->userdata('id'), $admin['id'], $message);
                                            }
                                        } else if($invoice_data['type'] =='verify') {
                                           $this->load->model('request_verify_model');

                                            $data = array(
                                                'payment_method' => $wmx_response->payment_card,
                                                'ref_no' =>  $wmx_response->token,
                                                'payment_status' => 1,
                                                'status' => 2,
                                                'seen' => 1
                                            );

                                            $return = $this->request_verify_model->update_verification($data);

                                            // send notification
                                            $message = 'The profile verification charge has been successfully paid by Tutor ID: ' . $this->session->userdata('id');
                                            $this->send_notification(42, $this->session->userdata('id'), $message);
                                            $admins = $this->user_model->get_admins_id();
                                            foreach ($admins as $admin) {
                                                $this->send_notification($this->session->userdata('id'), $admin['id'], $message);
                                            }
                                        }

                                    $msg= 'Merchant amount mismatch Merchant Amount : '.$saved_data->amount.' Bank Amount : '.$wmx_response->bank_amount_bdt.'. Update merchant database with success';
                                }
                            }else{
                                $msg= 'Bank amount is less then merchant amount like partial payment.You can make it failed transaction.';
                            }
                        }else if($wmx_response->txn_status == '1009'){
                            $msg= 'Transaction CANCELLED';

                        }else{
                            $msg= 'Update merchant database with failed';
                        }
                    }else{
                        $msg= 'Merchant ID Mismatch';
                    }
                }else{
                    $msg= 'Token mismatch';
                }
            }else{
                $msg= 'Try to direct access';
            }
            $this->session->set_flashdata('errormsg', $msg);
            redirect('tutor/invoice_list');
    }

    public function makeJobPayment($invoice_id) {

        $invoice_data = $this->db->query("select invoice.id invoice_id, invoice.amount invoice_amount, invoice.job_id, invoice.type, tutor.id tutor_id, tutor.full_name tutor_name, tutor.email tutor_email, tutor.mobile_no tutor_number, city.city tutor_city, personal.pre_address tutor_address 
            from ct_job_invoice invoice 
            inner join ct_user tutor on tutor.id = invoice.tutor_id 
            left join ct_tution_info tuition on tuition.user_id = tutor.id 
            left join ct_city city on city.id = tuition.city_id 
            left join ct_tutor_per_info personal on personal.user_id = tutor.id 
            where invoice.id = ". $invoice_id)->row();

        $this->sslPayment((object) ['invoice_data' => $invoice_data, 'product' => 'JOB_PAYMENT']);
    }

    public function makeVerificationPayment($invoice_id) {

        $invoice_data = $this->db->query("select invoice.id invoice_id, invoice.amount invoice_amount, invoice.job_id, invoice.type, tutor.id tutor_id, tutor.full_name tutor_name, tutor.email tutor_email, tutor.mobile_no tutor_number, city.city tutor_city, personal.pre_address tutor_address 
            from ct_job_invoice invoice 
            inner join ct_user tutor on tutor.id = invoice.tutor_id 
            left join ct_tution_info tuition on tuition.user_id = tutor.id 
            left join ct_city city on city.id = tuition.city_id 
            left join ct_tutor_per_info personal on personal.user_id = tutor.id 
            where invoice.id = ". $invoice_id)->row();

        $this->sslPayment((object) ['invoice_data' => $invoice_data, 'product' => 'VERIFICATION_PAYMENT']);
    }

    private function sslPayment($params) {
        $this->load->model('notification_model', 'notification');

        $post_data = array();
        $post_data['store_id']      = "careatutorslive";
        $post_data['store_passwd']  = "5D63D36F3E6A270203";
        $post_data['total_amount']  = $params->invoice_data->invoice_amount;
        $post_data['currency']      = "BDT";
        $post_data['tran_id']       = $params->invoice_data->invoice_id;

        $post_data['success_url']   = base_url('tutor/successfulPayment');
        $post_data['fail_url']      = base_url('tutor/failedPayment');
        $post_data['cancel_url']    = base_url('tutor/cancelledPayment');

        // $post_data['ipn_url']       = "your payment application cancel url";
        $post_data['emi_option']    = 0;

        $post_data['cus_name']      = $params->invoice_data->tutor_name . '('. $params->invoice_data->tutor_id . ')';
        $post_data['cus_email']     = $params->invoice_data->tutor_email;
        //$post_data['cus_add1']      = $params->invoice_data->tutor_address;
        //$post_data['cus_city']      = $params->invoice_data->tutor_city;
        //$post_data['cus_postcode']  = 0000;
        //$post_data['cus_country']   = 'Bangladesh';
	//$post_data['cus_phone']     = $params->invoice_data->tutor_number;
	$post_data['cus_add1']      = "Flat- 3/A, House- 26 Road, Alaol Ave, Dhaka 1230";
        $post_data['cus_city']      = "Dhaka";
        $post_data['cus_country']   = 'Bangladesh';
        $post_data['cus_phone']     = "01756441122";

        $post_data['shipping_method']   = 'NO';
        $post_data['num_of_item']       = 1;

        $post_data['product_name']      = $params->product;
        $post_data['product_category']  = $params->product;
        $post_data['product_profile']   = $params->product;

        $post_data['value_a'] = $params->invoice_data->tutor_id;
        $post_data['value_b'] = $params->invoice_data->job_id;
        $post_data['value_c'] = $params->invoice_data->type;
        $post_data['value_d'] = 'https://caretutors.com';


        # REQUEST SEND TO SSLCOMMERZ
        $direct_api_url = "https://securepay.sslcommerz.com/gwprocess/v4/api.php";

        $handle = curl_init();
        curl_setopt($handle, CURLOPT_URL, $direct_api_url );
        curl_setopt($handle, CURLOPT_TIMEOUT, 30);
        curl_setopt($handle, CURLOPT_CONNECTTIMEOUT, 30);
        curl_setopt($handle, CURLOPT_POST, 1 );
        curl_setopt($handle, CURLOPT_POSTFIELDS, $post_data);
        curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, FALSE); # KEEP IT FALSE IF YOU RUN FROM LOCAL PC


        $content = curl_exec($handle );

        $code = curl_getinfo($handle, CURLINFO_HTTP_CODE);

        if($code == 200 && !( curl_errno($handle))) {
            curl_close( $handle);
            $sslcommerzResponse = $content;            
        } else {
            curl_close( $handle);
            echo "FAILED TO CONNECT WITH SSLCOMMERZ API";
            exit;
        }

        # PARSE THE JSON RESPONSE
        $sslcz = json_decode($sslcommerzResponse, true );

        //var_dump($sslcz); exit;

        if(isset($sslcz['GatewayPageURL']) && $sslcz['GatewayPageURL']!="") {
            $this->notification->payment_registered_notification($this->session->userdata('id'), $this->input->post('tran_id'), 'Payment from SSL-Wireless', 'Website');
            header('Location: ' . $sslcz['GatewayPageURL']);
        } else {
            echo 'Something Went Wrong';
        }
    }

    public function successfulPayment() {
        $this->load->model('notification_model', 'notification');
        
        update('ct_job_invoice', ['status' => '1'], ['id' => $this->input->post('tran_id'), 'tutor_id' => $this->session->userdata('id')]);
        create('ct_payment_gateway_data', ['invoice_id' => $this->input->post('tran_id'), 'amount' => $this->input->post('amount'), 'card_no' => $this->input->post('card_no'), 'card_issuer' => $this->input->post('card_issuer'), 'card_brand' => $this->input->post('card_brand'), 'card_issuer_country' => $this->input->post('card_issuer_country'), 'card_issuer_country_code' => $this->input->post('card_issuer_country_code'), 'created_at' => (new \DateTime())->format('Y-m-d H:i:s')]); 
        $this->notification->payment_success_notification($this->session->userdata('id'), $this->input->post('tran_id'), 'Payment from SSL-Wireless', 'Website');
        redirect('tutor/payment');
    }

    public function failedPayment() {
        $this->load->model('notification_model', 'notification');
        $this->notification->payment_failed_notification($this->session->userdata('id'), $this->input->post('tran_id'), 'Payment from SSL-Wireless', 'Website');
        redirect('tutor/payment');
    }

    public function cancelledPayment() {
        $this->load->model('notification_model', 'notification');
        $this->notification->payment_cancelled_notification($this->session->userdata('id'), $this->input->post('tran_id'), 'Payment from SSL-Wireless', 'Website');
        redirect('tutor/payment');
    }

}

/* End of file tutor.php */
/* Location: ./application/controllers/tutor.php */
