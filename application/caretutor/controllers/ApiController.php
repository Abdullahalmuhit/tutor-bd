<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * PHP version 5
 *
 * @category  CodeIgniter
 * @author    Md Touhiduzzaman
 * @copyright 2017 http://www.touhidroid.com
 * @version   1.0
 */
class ApiController extends CI_Controller
{

    var $SUCCESS_CODE = 1;
    var $FAILURE_CODE = 0;
    var $AUTH_FORBIDDEN = -101;
    var $AUTH_INVALID = -102;
    var $API_KEY = 'sr8fyw8hcow8efhisncsef0wefw9ef0swdcsopd';

    public function __construct()
    {
        parent::__construct();
    }

    // tutor cv download api
    public function download_cv() {
        $this->db->dbprefix = '';
        $checkToken = $this->db->select('id')->from('bo_o_auth_access_tokens')->where('access_token', $this->input->get('token'))->where('expired_at >=', date('Y-m-d H:i:s'))->get()->row();
        $data['token'] = $checkToken;
        if ($checkToken) {
            $this->db->dbprefix = 'ct_';
            $this->load->model('city_location_model');
            $this->load->model('category_model');
            $this->load->model('institute_model');
            $this->load->model('tution_info_model');
            $this->load->model('tutor_req_model');
            $this->load->model('exam_model', 'exam');
            $this->load->model('request_verify_model', 'verify');
            $this->load->model('user_model');

            $t_info = $this->tution_info_model->get_tution_info($this->input->get('tutor_id'));
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

            $user_info = $this->user_model->get_user($this->input->get('tutor_id'));
            $step = $user_info->step_no;

            $credential_info = $this->tution_info_model->get_credential_info();
            $credential_info_count = $this->tution_info_model->credential_info_count();
            //log_message('ERROR',var_dump($location_info));
            $data = array(
                'tution_info' => $t_info,
                'edu_infos' => $this->tution_info_model->get_tutor_all_edu_info($this->input->get('tutor_id')),
                'personal_info' => $this->tution_info_model->get_personal_info($this->input->get('tutor_id')),
                'profile_pic_info' => $this->tution_info_model->get_profile_pic_info($this->input->get('tutor_id')),
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
                'exam_result' => $this->exam->get_exam_result($this->input->get('tutor_id')),
            );
            // dd($data['classes_sub']);

            $this->load->view('tutor/caretutor_tutor_new_cv_pdf', $data);
        } else {
            echo 'access denied!';
        }
    }

    /**API Code Ends : Touhid*/
}

/* End of file ApiController.php */
/* Location: ./application/controllers/ApiController.php */
