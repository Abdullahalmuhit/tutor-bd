base64_pdf_confirmation_letter<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

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
        exit();
    }

    /**API Code Starts : Touhid*/
    public static function api_return($status_code, $data, $msg)
    {
        header('Content-Type: application/json');
        echo    // Directly printing the output to the api-caller instead of RETURN
        json_encode(
            array(
                'status' => $status_code,
                'data' => $data,
                'msg' => $msg
            ));
        exit;
    }

    function random_token($type = 'alnum', $length = 64)
    {
        switch ($type) {
            case 'alnum':
                $pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                break;
            case 'alpha':
                $pool = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                break;
            case 'hexdec':
                $pool = '0123456789abcdef';
                break;
            case 'numeric':
                $pool = '0123456789';
                break;
            case 'nozero':
                $pool = '123456789';
                break;
            case 'distinct':
                $pool = '2345679ACDEFHJKLMNPRSTUVWXYZ';
                break;
            default:
                $pool = (string)$type;
                break;
        }


        $crypto_rand_secure = function ($min, $max) {
            $range = $max - $min;
            if ($range < 0) return $min; // not so random...
            $log = log($range, 2);
            $bytes = (int)($log / 8) + 1; // length in bytes
            $bits = (int)$log + 1; // length in bits
            $filter = (int)(1 << $bits) - 1; // set all lower bits to 1
            do {
                $rnd = hexdec(bin2hex(openssl_random_pseudo_bytes($bytes)));
                $rnd = $rnd & $filter; // discard irrelevant bits
            } while ($rnd >= $range);
            return $min + $rnd;
        };

        $token = "";
        $max = strlen($pool);
        for ($i = 0; $i < $length; $i++) {
            $token .= $pool[$crypto_rand_secure(0, $max)];
        }
        return $token;
    }

    public function checkAuth($user_validate = FALSE)
    {
        $headers = apache_request_headers();
        if ($headers['api_key'] != $this->API_KEY)
            ApiController::api_return($this->AUTH_INVALID, '', 'Invalid Source of Request');
        else if ($user_validate == TRUE) {
            // TODO Check user's api_token existence in DB
            $api_token = $headers['api_token'];
            $table_name = $this->db->dbprefix('user');
            $this->db->select('*')->from($table_name);
            $this->db->where('api_token', $api_token);
            $query = $this->db->get()->row();
            if (!isset($api_token) && $query)
                ApiController::api_return($this->AUTH_FORBIDDEN, '', 'Login to continue ...');
            /* else
                return $query->..user_id */
        }
    }

    public function api_register()
    {
        $this->checkAuth();

        $email = $this->input->post('email');
        $user_type = $this->input->post('user_type');

        $table_name = $this->db->dbprefix('user');

        $this->db->select('*')->from($table_name);
        $this->db->where('email', $email);
        $this->db->where('user_type', $user_type);
        $query = $this->db->get();
        if ($query->num_rows() > 0)
            ApiController::api_return($this->FAILURE_CODE, 1, "You already have a account with this email.");


        $this->load->helper('date');
        $tk = $this->random_token();
        $name = $this->input->post('name');
        $user_id = now();
        $data = array(
            'full_name' => $name,
            'user_id' => $user_id,   // What the heck?? Which MORON needed this after auto-inc id, created-at & updated-at fields?? :\
            'mobile_no' => $this->input->post('phone'),
            'email' => $email,
            'password' => md5($this->input->post('password')),
            'user_type' => $user_type,
            'api_token' => $tk
        );
        $r = $this->db->insert($table_name, $data);

        if ($r == 1)
            ApiController::api_return(
                $this->SUCCESS_CODE,
                array('id' => $this->db->insert_id(), 'user_id' => $user_id, 'token' => $tk),
                'Welcome ' . $name
            );
        else
            ApiController::api_return($this->FAILURE_CODE, '', 'Error! Try again later ...');
    }

    public function job_static_data()
    {
        $this->checkAuth();

        $parent_categories = $this->input->get('parent_categories');
        $return_type = $this->input->get('return_type');
        if ($parent_categories && $return_type) {

            if ($return_type == 'classes') {
                $this->db->select("category.id, CONCAT((parent.category),(' - '),(category.category)) as class, category.position");
                $this->db->from('ct_tution_category category');
                $this->db->join('ct_tution_category parent', 'parent.id = category.parent_id', 'left');
                $this->db->where_in('category.parent_id', explode(',', $parent_categories));
                $this->db->order_by('class', 'asc');
                $categories = $this->db->get()->result();
                ApiController::api_return(
                    $this->SUCCESS_CODE,
                    array(
                        'cities' => [],
                        'locations' => [],
                        'categories' => [],
                        'classes' => $categories,
                        'subjects' => []
                    ), ''
                );
            } elseif ($return_type == 'subjects') {
                $this->db->select("category.id, CONCAT((parent_category.category),(' - '),(parent_class.category),(' - '),(category.category)) as subject, category.position");
                $this->db->from('ct_tution_category category');
                $this->db->join('ct_tution_category parent_class', 'parent_class.id = category.parent_id', 'left');
                $this->db->join('ct_tution_category parent_category', 'parent_category.id = parent_class.parent_id', 'left');
                $this->db->where_in('category.parent_id', explode(',', $parent_categories));
                $this->db->order_by('subject', 'asc');
                $categories = $this->db->get()->result();
                ApiController::api_return(
                    $this->SUCCESS_CODE,
                    array(
                        'cities' => [],
                        'locations' => [],
                        'categories' => [],
                        'classes' => [],
                        'subjects' => $categories
                    ), ''
                );
            } elseif ($return_type == 'categories') {
                $this->db->select("category.id, CONCAT((parent.category),(' - '),(category.category)) as category, category.position");
                $this->db->from('ct_tution_category category');
                $this->db->join('ct_tution_category parent', 'parent.id = category.parent_id', 'left');
                $this->db->where_in('category.parent_id', explode(',', $parent_categories));
                $this->db->order_by('category', 'asc');
                $categories = $this->db->get()->result();
                ApiController::api_return(
                    $this->SUCCESS_CODE,
                    array(
                        'cities' => [],
                        'locations' => [],
                        'categories' => $categories,
                        'classes' => [],
                        'subjects' => []
                    ), ''
                );
            } else {
                ApiController::api_return($this->FAILURE_CODE, '', 'Invalid Request');
            }

            // $this->db->select("category.id, CONCAT((parent.category),(' - '),(category.category)) as category");
            // $this->db->from('ct_tution_category category');
            // $this->db->join('ct_tution_category parent', 'parent.id = category.parent_id', 'left');
            // $this->db->where_in('category.parent_id', explode(',', $parent_categories));
            // $this->db->order_by('category', 'asc');
            // $categories = $this->db->get()->result();

            // ApiController::api_return($this->SUCCESS_CODE, $categories, '');

        } else {
            $table_name = $this->db->dbprefix('city');
            $cities = $this->db->select('id, city')
                ->from($table_name)
                ->get()->result();
            $table_name = $this->db->dbprefix('location');
            $locations = $this->db->select('id, city_id, location')
                ->from($table_name)
                ->get()->result();
            $table_name = $this->db->dbprefix('tution_category');
            $categories = $this->db->select('id, parent_id, category, has_sdg, is_subject, position')
                ->from($table_name)
                ->get()->result();
            $classes = $this->db->select('id, category class, position')
                ->from($table_name)
                ->where('parent_id is not null')
                ->where('is_subject', '0')
                ->order_by('position', 'asc')
                ->get()->result();
            $subjects = $this->db->select('id, category subject')
                ->from($table_name)
                ->where('parent_id is not null')
                ->where('is_subject', '1')
                ->order_by('position', 'asc')
                ->get()->result();

            ApiController::api_return(
                $this->SUCCESS_CODE,
                array(
                    'cities' => $cities,
                    'locations' => $locations,
                    'categories' => $categories,
                    'classes' => $classes,
                    'subjects' => $subjects
                ), ''
            );
        }
    }

    public function job_static_data_categories() {
        $this->checkAuth();
        $parents = $this->input->get('parents');
        if ($parents) {
            $this->db->select("category.id, CONCAT((parent.category),(' - '),(category.category)) as category");
            $this->db->from('ct_tution_category category');
            $this->db->join('ct_tution_category parent', 'parent.id = category.parent_id', 'left');
            $this->db->where_in('category.parent_id', explode(',', $parents));
        } else {
            $this->db->select("id, category");
            $this->db->from('ct_tution_category');
            $this->db->where('parent_id', null);
        }
        $this->db->order_by('category', 'asc');
        $categories = $this->db->get()->result();

        ApiController::api_return($this->SUCCESS_CODE, $categories, '');
    }

    public function testimonials() {
        $tutors = $this->db->query("select name, comment, designation, concat('https://caretutors.com/assets/upload/testimonial_user_image/60x60/', commentator_image) as photo from ct_testimonial where live = 1 and commentator_flag = 'tutor'")->result();
        $guardians = $this->db->query("select name, comment, designation, concat('https://caretutors.com/assets/upload/testimonial_user_image/60x60/', commentator_image) as photo from ct_testimonial where live = 1 and commentator_flag = 'parent'")->result();
        if (!empty($tutors) && !empty($guardians))
            ApiController::api_return($this->SUCCESS_CODE, ['tutor' => $tutors, 'parent' => $guardians], '');
        else
            ApiController::api_return($this->FAILURE_CODE, '', 'Something went wrong');
    }

    function loginJob($email, $utype, $pwd)
    {
        $table_name = $this->db->dbprefix('user');
        $mp = md5($pwd);

        $this->db->select('*')->from($table_name);
        $this->db->where('email', $email);
        $this->db->where('user_type', $utype);
        $mp = md5($pwd);
        $this->db->where('password', $mp);
        $res = $this->db->get()->row();

        $res = null;
        if ($utype === 'tutor') {
            $tutorQuery = "select ct_user.*, concat('https://caretutors.com/assets/upload/', profile_pic.profile_pic) as profile_pic from ct_user left join ct_tutor_profile_pic profile_pic on profile_pic.tutor_id = ct_user.id where ct_user.user_type = '" . $utype . "' and ct_user.email = '" . $email . "' and ct_user.password = '" . $mp . "' ";
            $res = $this->db->query($tutorQuery)->row();
        } else {
            $guardianQuery = "select * from ct_user where user_type = '" . $utype . "' and email = '" . $email . "' and password = '" . $mp . "' ";
            $res = $this->db->query($guardianQuery)->row();
        }

        $b = $res != null && !is_null($res) && !empty($res);
        if ($b && ($res->api_token == null || is_null($res->api_token) || empty($res->api_token))) {
            $tk = $this->random_token();

            $this->db->where('email', $email);
            $this->db->where('user_type', $utype);
            $data = array('api_token' => $tk);
            $res->api_token = $tk;
            $this->db->update($table_name, $data);
        }

        return $res;
    }

    public function api_login()
    {
        $this->checkAuth();


        $email = $this->input->post('email');
        $utype = $this->input->post('user_type');

        $findRetired = find('ct_user', '*', ['email' => $email, 'user_type' => 'retired_tutor']);
        if ($findRetired) {
            ApiController::api_return($this->FAILURE_CODE, '', "Your profile is temporary blocked. Please contact our support team (+8801756441122) to activate again.");
            return;
        }

        $table_name = $this->db->dbprefix('user');
        $this->db->select('*')->from($table_name);
        $this->db->where('email', $email);
        $this->db->where('user_type', $utype);
        $em_none = $this->db->get()->num_rows() < 1;

        if (!$em_none) {
            $res = $this->loginJob($email, $utype, $this->input->post('password'));
            if ($res != null && !is_null($res) && !empty($res))
                ApiController::api_return($this->SUCCESS_CODE, $res, 'Welcome ' . $res->full_name);
            else
                ApiController::api_return($this->FAILURE_CODE, '', 'Password mismatch');
        } else
            ApiController::api_return($this->FAILURE_CODE, '', "Email not found for any $utype!\n\rSign-up first.");
    }

    public function fcm_update()
    {
        $this->checkAuth(TRUE);

        $uid = $this->input->post('user_id');
        $fcm_token = $this->input->post('token');

        $this->load->model('user_model');
        if ($this->user_model->update_fcm_token($uid, $fcm_token))
            ApiController::api_return($this->SUCCESS_CODE, '', 'FCM Token Updated');
        else
            ApiController::api_return($this->FAILURE_CODE, '', 'FCM Token Update Failed');
    }

    public function api_profile()
    {
        $this->checkAuth(TRUE);

        $uid = $this->input->get('user_id');

        $this->load->model('user_model');
        $profile = $this->user_model->get_user_profile($uid);

        if ($profile == null || is_null($profile) || empty($profile))
            ApiController::api_return($this->FAILURE_CODE, '', 'Profile Not Found');
        else
            ApiController::api_return($this->SUCCESS_CODE, $profile, 'Profile Synced');
    }

    public function profile_info() {
        $this->checkAuth(TRUE);
        $tutor_id = $this->input->get('tutor_id');
        $updateProfile = update('ct_user', ['profile_percentage' => $this->calculate_profile_percentage($tutor_id)], ['id' => $tutor_id]);

        $profileQuery = "select ct_user.id as tutor_id, ct_user.*, concat('https://caretutors.com/assets/upload/', ct_tutor_profile_pic.profile_pic) as photo, ct_tutor_per_info.id personal_info_id, ct_tutor_per_info.*, ct_tution_info.id tution_id, ct_tution_info.*, ct_city.city, ct_location.location, verification.status verification_status, ".
            "(select avg(points) from ct_job_tutor where tutor_id = ct_user.id and points != 0 limit 1) review ".
            "from ct_user ".
            "left join ct_tutor_profile_pic on ct_tutor_profile_pic.tutor_id = ct_user.id ".
            "left join ct_tutor_per_info on ct_tutor_per_info.user_id = ct_user.id ".
            "left join ct_tution_info on ct_tution_info.user_id = ct_user.id ".
            "left join ct_city on ct_city.id = ct_tution_info.city_id ".
            "left join ct_location on ct_location.id = ct_tution_info.your_location_id ".
            "left join ct_tutor_verification verification on verification.user_id = ct_user.id ".
            "where ct_user.id = ". $tutor_id;
        $profileData = $this->db->query($profileQuery)->row();

        $eduQuery = "select ct_tutor_edu_info.*, ct_sdg.sdg, ct_institute.institute " .
            "from ct_tutor_edu_info " .
            "left join ct_sdg on ct_tutor_edu_info.group_id = ct_sdg.id " .
            "left join ct_institute on ct_tutor_edu_info.institute_id = ct_institute.id " .
            "where user_id = " . $tutor_id . " " .
            "order by ct_tutor_edu_info.year_of_passing desc";
        $eduData = $this->db->query($eduQuery)->result();

        $prefCategory = $this->db->select("id, category")->from('ct_tution_category')->where_in('id', explode(',', $profileData->pref_medium))->get()->result();
        $prefClass = $this->db->select("id, category class")->from('ct_tution_category')->where_in('id', explode(',', $profileData->pref_class))->get()->result();
        $prefSubjects = $this->db->select("id, category subject")->from('ct_tution_category')->where_in('id', explode(',', $profileData->pref_subjects))->get()->result();
        $prefLocations = $this->db->select("id, location")->from('ct_location')->where_in('id', explode(',', $profileData->pref_locations))->get()->result();

        $quizPass = "select * from ct_userexam where userid = " . $tutor_id . " and result = 'passed'";
        $passData = $this->db->query($quizPass)->row();

        $quizFail = "select * from ct_userexam where userid = " . $tutor_id . " and result = 'failed'";
        $failData = $this->db->query($quizFail)->row();

        if (!empty($passData))
            $quizData = ['status' => 'Passed', 'result' => $passData->correctlyanswered];
        else if (!empty($failData))
            $quizData = ['status' => 'Failed', 'result' => 0];
        else
            $quizData = ['status' => 'Not appeared', 'result' => 0];

        $credQuery = "select *, concat('https://caretutors.com/assets/upload/credential/', file_name) file_name from ct_credential_info where user_id = " . $tutor_id;
        $credData = $this->db->query($credQuery)->result();

        $insQuery = "select id, institute from ct_institute where suggest = 1";
        $instiutes = $this->db->query($insQuery)->result();

        $sdgQuery = "select id, sdg from ct_sdg where suggest = 1";
        $sdg = $this->db->query($sdgQuery)->result();

        $verification_request_type = null;

        if ($profileData->verification_status && $profileData->verification_status == 3)
            $verification_request_type = 'enable_edit';
        elseif ($profileData->verification_status && $profileData->verification_status < 3)
            $verification_request_type = 'address_verify';
        elseif ($profileData->verification_status == null)
            $verification_request_type = 'verification';

        if ($profileData->verification_status == null)
            $verification_request_text = 'Account Not Verified (Click to Request Verification)';
        else if ($profileData->verification_status < 2)
            $verification_request_text = 'Account Not Verified (Your Request is in review state, wait for confirmation and invoice)';
        else if ($profileData->verification_status == 2)
            $verification_request_text = 'Account Not Verified (Click to Verify your Address)';
        else if ($profileData->verification_status == 3)
            $verification_request_text = 'Account is Verified (Click to Request for Enable Edit)';
        else if ($profileData->verification_status == 4)
            $verification_request_text = 'Account is Verified (Profile Edit Enabled)';
        else if ($profileData->verification_status == 5)
            $verification_request_text = 'Account is Verified (Enable Edit Request is in review state, wait for confirmation)';

        $data['tutor_info'] = $profileData;
        $data['edu_info']   = $eduData;
        $data['quiz_info']  = $quizData;
        $data['cred_info']  = $credData;
        $data['others']     = [
            'review' => round($profileData->review, 1),
            'editable' => ($profileData->verification_status == 3 || $profileData->verification_status == 5) ? false : true,
            'verification_request_type' => $verification_request_type,
            'verification_request_text' => $verification_request_text,
            'pref_medium' => $prefCategory,
            'pref_class' => $prefClass,
            'pref_subjects' => $prefSubjects,
            'pref_locations' => $prefLocations,
            'institutes' => $instiutes,
            'groups' => $sdg,
        ];

        if (empty($data))
            ApiController::api_return($this->FAILURE_CODE, '', 'Profile Info Not Found');
        else
            ApiController::api_return($this->SUCCESS_CODE, $data, 'Profile Synced');
    }

    public function profile_basic_info() {
        $this->checkAuth(TRUE);
        $tutor_id = $this->input->get('tutor_id');

        $profileQuery = "select ct_user.id as tutor_id, ct_user.*, concat('https://caretutors.com/assets/upload/', ct_tutor_profile_pic.profile_pic) as photo, verification.status verification_status, ".
            "(select avg(points) from ct_job_tutor where tutor_id = ct_user.id and points != 0 limit 1) review ".
            "from ct_user ".
            "left join ct_tutor_profile_pic on ct_tutor_profile_pic.tutor_id = ct_user.id ".
            "left join ct_tutor_verification verification on verification.user_id = ct_user.id ".
            "where ct_user.id = ". $tutor_id;
        $profileData = $this->db->query($profileQuery)->row();

        $verification_request_type = null;

        if ($profileData->verification_status && $profileData->verification_status == 3)
            $verification_request_type = 'enable_edit';
        elseif ($profileData->verification_status && $profileData->verification_status < 3)
            $verification_request_type = 'address_verify';
        elseif ($profileData->verification_status == null)
            $verification_request_type = 'verification';

        $data['tutor_info'] = $profileData;
        $data['review']     = round($profileData->review, 1);
        $data['verification_request_type'] = $verification_request_type;

        if (empty($data))
            ApiController::api_return($this->FAILURE_CODE, '', 'Profile Info Not Found');
        else
            ApiController::api_return($this->SUCCESS_CODE, $data, 'Profile Synced');
    }

    public function profile_payments() {
        $this->checkAuth(TRUE);
        $tutor_id = $this->input->get('tutor_id');

        $jobPaymentQuery = "select ct_job_invoice.*, date_format(ct_job_invoice.created_at, '%b %d, %Y') as created_at, date_format(ct_job_invoice.due_date, '%b %d, %Y') as due_date, tutor.id as tutor_id, tutor.full_name as tutor_name, tutor.mobile_no as tutor_number, tutor.email as tutor_email, job.guardian_name, job.add_contact_num as guardian_number, job.salary_range, job.status job_status, date_format(gateway.created_at, '%b %d, %Y') as payment_date, gateway.card_brand paid_by, sub_cat.category class, ct_tutor_per_info.pre_address tutor_address " .
            "from ct_job_invoice " .
            "left join ct_user as tutor on ct_job_invoice.tutor_id = tutor.id " .
            "left join ct_tutor_requirements as job on ct_job_invoice.job_id = job.id " .
            "left join ct_tution_category sub_cat on  sub_cat.id = job.tution_sub_cat_id " .
            "left join ct_tutor_per_info on ct_tutor_per_info.user_id = tutor.id ".
            "left join ct_payment_gateway_data gateway on gateway.invoice_id = ct_job_invoice.id " .
            "where ct_job_invoice.type = 'job' and ct_job_invoice.sent = '1' and ct_job_invoice.tutor_id = " . $tutor_id . " " .
            "group by ct_job_invoice.id " .
            "order by ct_job_invoice.created_at desc ";
        $jobPayments = $this->db->query($jobPaymentQuery)->result();

        $verificationPaymentQuery = "select ct_job_invoice.*, date_format(ct_job_invoice.created_at, '%b %d, %Y') as created_at, date_format(ct_job_invoice.due_date, '%b %d, %Y') as due_date, tutor.id as tutor_id, tutor.full_name as tutor_name, tutor.mobile_no as tutor_number, tutor.email as tutor_email, date_format(gateway.created_at, '%b %d, %Y') as payment_date, gateway.card_brand paid_by, ct_tutor_per_info.pre_address tutor_address " .
                "from ct_job_invoice " .
                "left join ct_user as tutor on ct_job_invoice.tutor_id = tutor.id " .
                "left join ct_tutor_verification verification on verification.id = ct_job_invoice.job_id " .
                "left join ct_tutor_per_info on ct_tutor_per_info.user_id = tutor.id ".
                "left join ct_payment_gateway_data gateway on gateway.invoice_id = ct_job_invoice.id " .
                "where ct_job_invoice.type = 'verify' and ct_job_invoice.sent = '1' and ct_job_invoice.tutor_id = " . $tutor_id . " " .
                "group by ct_job_invoice.id " .
                "order by ct_job_invoice.created_at desc ";
        $verificationPayments = $this->db->query($verificationPaymentQuery)->result();

        $return = ['job' => ['data' => $jobPayments, 'total' => count($jobPayments)], 'verificaiton' => ['data' => $verificationPayments, 'total' => count($verificationPayments)]];
        ApiController::api_return($this->SUCCESS_CODE, $return, 'Total Invoice: ' . (count($jobPayments) + count($verificationPayments)));
    }

    public function payment_success() {
        $this->checkAuth(TRUE);

        $this->load->model('notification_model', 'notification');

        $invoice_id = $this->input->post('invoice_id');
        $amount     = $this->input->post('amount');
        $card_no    = $this->input->post('card_no');
        $card_issuer    = $this->input->post('card_issuer');
        $card_brand     = $this->input->post('card_brand');
        $card_issuer_country        = $this->input->post('card_issuer_country');
        $card_issuer_country_code   = $this->input->post('card_issuer_country_code');
        $payment_gateway_data = array(
            'invoice_id' => $invoice_id,
            'amount' => $amount,
            'card_no' => $card_no,
            'card_issuer' => $card_issuer,
            'card_brand' => $card_brand,
            'card_issuer_country' => $card_issuer_country,
            'card_issuer_country_code' => $card_issuer_country_code,
            'created_at' => date('Y-m-d H:i:s')
        );

        if ($invoice_id) {
            $savePaymentGatewayInfo = create('ct_payment_gateway_data', $payment_gateway_data);
            $updateInvoice = update('ct_job_invoice', ['status' => '1'], ['id' => $invoice_id]);

            $findInvoiceInfo = find('ct_job_invoice', '*', ['id' => $invoice_id]);
            $paymentType = $findInvoiceInfo->type == 'job' ? 'Tuition Matching Charge (Job ID: ' . $findInvoiceInfo->job_id . ')' : 'Profile Verification Charge';
            $this->notification->payment_success_notification($findInvoiceInfo->tutor_id, $invoice_id, $paymentType, 'Android App');
            ApiController::api_return($this->SUCCESS_CODE, '', 'Invoice Updated. Invoice ID: ' . $invoice_id);
        } else
            ApiController::api_return($this->FAILURE_CODE, '', 'Something went wrong. Invocie ID: ' . $invoice_id);
        
    }

    public function profile_confirmation_letter() {
        $this->checkAuth(TRUE);
        $tutor_id = $this->input->get('tutor_id');

        $confirmQuery = "select apply.*, category.category, class.category class, group_concat(subjects.category) subjects, job.user_id guardian_id, job.days_per_week, job.salary_range, job.preferred_gender, job.address, job.student_gender, job.other_req, job.guardian_name, job.add_contact_num guardian_number, job.date_to_hire, tutor.full_name tutor_name, tutor.mobile_no tutor_number " .
            "from ct_job_tutor apply " .
            "left join ct_tutor_requirements job on job.id = apply.job_id " .
            "left join ct_tution_category category on category.id = job.tution_category_id " .
            "left join ct_tution_category class on class.id = job.tution_sub_cat_id " .
            "left join ct_tution_category subjects on find_in_set(subjects.id , job.subjects) " .
            "left join ct_user tutor on tutor.id = apply.tutor_id " .
            "where apply.status = 'Assign' and job.is_generated = 1 and apply.tutor_id = " . $tutor_id. " group by job.id order by apply.updated_at desc";
        $confirmJobs = $this->db->query($confirmQuery)->result();

        ApiController::api_return($this->SUCCESS_CODE, $confirmJobs, 'Total: ' . count($confirmJobs));
    }

    public function profile_confirmation_letter_download() {
        $this->checkAuth(TRUE);
        $tutor_id = $this->input->get('tutor_id');
        $job_id = $this->input->get('job_id');

        $jobInfoQuery = "select apply.*, city.city, location.location, category.category, class.category class, group_concat(subjects.category) subjects, job.user_id guardian_id, job.days_per_week, job.salary_range, job.preferred_gender, job.address, job.student_gender, job.other_req, job.guardian_name, job.add_contact_num guardian_number, job.date_to_hire, tutor.full_name tutor_name, tutor.mobile_no tutor_number " .
            "from ct_job_tutor apply " .
            "left join ct_tutor_requirements job on job.id = apply.job_id " .
            "left join ct_city city on city.id = job.city_id " .
            "left join ct_location location on location.id = job.location_id " .
            "left join ct_tution_category category on category.id = job.tution_category_id " .
            "left join ct_tution_category class on class.id = job.tution_sub_cat_id " .
            "left join ct_tution_category subjects on find_in_set(subjects.id , job.subjects) " .
            "left join ct_user tutor on tutor.id = apply.tutor_id " .
            "where apply.status = 'Assign' and apply.tutor_id = " . $tutor_id. " and apply.job_id = ". $job_id;

        $data['jobInfo'] = $this->db->query($jobInfoQuery)->row();

        if ($data['jobInfo']->job_id) {
            // $this->load->view('tutor/caretutor_tutor_contract_paper_api', $data);
            $this->load->helper(array('dompdf'));
            $html = $this->load->view('tutor/caretutor_tutor_contract_paper_api', $data, TRUE);
            $pdf = pdf_create($html, $job_id, false);
            // file_put_contents('./assets/upload/contract_paper/job_' . $job_id . '_tutor_'. $tutor_id .'.pdf', $pdf);

            // $path = './assets/upload/contract_paper/job_' . $job_id . '_tutor_'. $tutor_id .'.pdf';
            // $data = file_get_contents($path);
            // $base64 = 'data:pdf/' . $type . ';base64,' . base64_encode($data);
            $base64 = base64_encode($pdf);
            ApiController::api_return($this->SUCCESS_CODE, $base64, 'PDF Generated');
        } else 
            ApiController::api_return($this->FAILURE_CODE, '', 'Something went wrong');
    }

    public function tutor_profile_cv_download() {
        $this->checkAuth(TRUE);
        $tutor_id = $this->input->get('tutor_id');

        $profileQuery = "select ct_user.id as tutor_id, ct_user.*, concat('assets/upload/', ct_tutor_profile_pic.profile_pic) as photo, ct_tutor_per_info.id personal_info_id, ct_tutor_per_info.*, ct_tution_info.id tution_id, ct_tution_info.*, ct_city.city, ct_location.location, ".
            "(select avg(points) from ct_job_tutor where tutor_id = ct_user.id and points != 0 limit 1) review ".
            "from ct_user ".
            "left join ct_tutor_profile_pic on ct_tutor_profile_pic.tutor_id = ct_user.id ".
            "left join ct_tutor_per_info on ct_tutor_per_info.user_id = ct_user.id ".
            "left join ct_tution_info on ct_tution_info.user_id = ct_user.id ".
            "left join ct_city on ct_city.id = ct_tution_info.city_id ".
            "left join ct_location on ct_location.id = ct_tution_info.your_location_id ".
            "where ct_user.id = ". $tutor_id;
        $profileData = $this->db->query($profileQuery)->row();

        $eduQuery = "select ct_tutor_edu_info.*, ct_sdg.sdg, ct_institute.institute " .
            "from ct_tutor_edu_info " .
            "left join ct_sdg on ct_tutor_edu_info.group_id = ct_sdg.id " .
            "left join ct_institute on ct_tutor_edu_info.institute_id = ct_institute.id " .
            "where user_id = " . $tutor_id . " " .
            "order by ct_tutor_edu_info.year_of_passing desc";
        $eduData = $this->db->query($eduQuery)->result();

        $profileData->pref_medium ? $pref_medium = $profileData->pref_medium : $pref_medium = '0';
        $profileData->pref_class ? $pref_class = $profileData->pref_class : $pref_class = '0';
        $profileData->pref_subjects ? $pref_subjects = $profileData->pref_subjects : $pref_subjects = '0';
        $profileData->pref_locations ? $pref_locations = $profileData->pref_locations : $pref_locations = '0';

        $subQueries = "select " .
            "(select group_concat(' ', pref_medium.category) from ct_tution_category pref_medium where pref_medium.id in (" . $pref_medium . ")) as pref_medium, " .
            "(select group_concat(' ', pref_class.category) from ct_tution_category pref_class where pref_class.id in (" . $pref_class . ")) as pref_class, " .
            "(select group_concat(' ', pref_subjects.category) from ct_tution_category pref_subjects where pref_subjects.id in (" . $pref_subjects . ")) as pref_subjects, " .
            "(select group_concat(' ', pref_locations.location) from ct_location pref_locations where pref_locations.id in (" . $pref_locations . ")) as pref_locations";
        $subData = $this->db->query($subQueries)->row();

        $data['tutor_info'] = $profileData;
        $data['edu_info'] = $eduData;
        $data['sub_data'] = $subData;

        if ($profileData) {
            $this->load->helper(array('dompdf'));
            $html = $this->load->view('tutor/caretutor_tutor_cv_pdf_api', $data, TRUE);
            $pdf = pdf_create($html, $tutor_id, false);
            $base64 = base64_encode($pdf);
            ApiController::api_return($this->SUCCESS_CODE, $base64, 'PDF Generated');
        } else 
            ApiController::api_return($this->FAILURE_CODE, '', 'Something went wrong');
    }

    public function update_tutor_profile_pic() {
        $this->checkAuth(TRUE);
        $data = $this->input->post('image');
        $tutor_id = $this->input->post('tutor_id');

        list($type, $data) = explode(';', $data);
        list(, $data)      = explode(',', $data);

        $data = base64_decode($data);
        $imageName = $tutor_id.'_'.rand().'_'.time().'.png';
        file_put_contents('assets/upload/'.$imageName, $data);

        // update privious picture to database
        $table_name = $this->db->dbprefix('tutor_profile_pic');
        $check = $this->db->select('*')->where('tutor_id', $tutor_id)->get($table_name)->row_array();

        if (!empty($check)) {
            $data = array(
                'profile_pic' => $imageName,
            );
            $this->db->where('tutor_id', $tutor_id);
            $return = $this->db->update($table_name, $data);

            //delete privious image
            unlink('./assets/upload/'.$check['profile_pic']);
        } else {
            $data = array(
                'profile_pic' => $imageName,
                'tutor_id' => $tutor_id,
                'created_at' => date("Y-m-d H:i:s")
            );
            $return = $this->db->insert($table_name, $data);
        }
        ApiController::api_return($this->SUCCESS_CODE, 'https://caretutors.com/assets/upload/'.$imageName, 'Profile Image Uploaded');
    }

    public function update_tutor_profile() {
        $this->checkAuth(TRUE);
        $this->load->model('notification_model', 'notification');
        $tutor_id = $this->input->post('tutor_id');
        $step_no = $this->input->post('step_no');
        if ($step_no === '01') {

            if ($this->input->post('online') == 1) {
                $google_acc = $this->input->post('google_acc');
                $skype_acc = $this->input->post('skype_acc');
            } else {
                $skype_acc = '';
                $google_acc = '';
            }

            $data = array(
                'user_id' => $this->input->post('tutor_id'),
                'pref_medium' => $this->input->post('pref_medium'),
                'pref_class' => $this->input->post('pref_class'),
                'pref_subjects' => $this->input->post('pref_subjects'),
                'city_id' => $this->input->post('city_id'),
                'your_location_id' => $this->input->post('location_id'),
                'pref_locations' => $this->input->post('pref_locations'),
                'skype_acc' => $skype_acc,
                'google_acc' => $google_acc,
                'student_home' => $this->input->post('student_home'),
                'my_home' => $this->input->post('my_home'),
                'online' => $this->input->post('online'),
                'has_experience' => $this->input->post('has_experience'),
                'total_experience' => $this->input->post('total_experience'),
                'experiences' => $this->input->post('experiences'),
                'available_days' => $this->input->post('available_days'),
                'available_time_from' => $this->input->post('available_time_from'),
                'available_time_to' => $this->input->post('available_time_to'),
                'expected_fees' => $this->input->post('expected_fees'),
                'method' => $this->input->post('method'),
                'pref_tut_style' => $this->input->post('pref_tut_style')
            );

            $tution_id = $this->input->post('tution_id');
            if ($tution_id)
                $tutionUpdate = update('ct_tution_info', $data, ['user_id' => $tutor_id, 'id' => $tution_id]);
            else {
                $updateProfile = update('ct_user', ['step_no' => 1], ['id' => $tutor_id]);
                $tutionSave = create('ct_tution_info', $data);
            }

            $this->notification->verification_profile_update_notification($tutor_id, NULL, 'Tuition Info');
            // $updateProfile = update('ct_user', ['profile_percentage' => $this->calculate_profile_percentage($tutor_id)], ['id' => $tutor_id]);
            ApiController::api_return($this->SUCCESS_CODE, '', 'Tuition Information Updated!');

        } elseif ($step_no === '02') {

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
                  $ins_id = create('ct_institute', ['institute' => $institute_name], true);
                }
                // $ins_id = create('ct_institute', ['institute' => $institute_name], true);
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
                    $grp_id = create('ct_sdg', ['sdg' => $group_name], true);
                }
                // $grp_id = create('ct_sdg', ['sdg' => $group_name], true);
            } else {
                $grp_id = '0';
            }

            $data = array(
                'user_id' => $tutor_id,
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

            $education_info_id = $this->input->post('education_info_id');
            if ($education_info_id) {
                $educationUpdate = update('ct_tutor_edu_info', $data, ['user_id' => $tutor_id, 'id' => $education_info_id]);
                if ($educationUpdate) {
                    $this->notification->verification_profile_update_notification($tutor_id, NULL, 'Education Info');
                    ApiController::api_return($this->SUCCESS_CODE, '', 'Education Information Updated!');
                } else {
                    ApiController::api_return($this->FAILURE_CODE, $educationUpdate, 'Something went wrong!');
                }
            } else {
                $updateProfile = update('ct_user', ['step_no' => 2], ['id' => $tutor_id]);
                $educationSave = create('ct_tutor_edu_info', $data);
                if ($educationSave) {
                    $this->notification->verification_profile_update_notification($tutor_id, NULL, 'Education Info');
                    ApiController::api_return($this->SUCCESS_CODE, '', 'Education Information Saved!');
                } else {
                    ApiController::api_return($this->FAILURE_CODE, $educationSave, 'Something went wrong!');
                }
            }
            // $updateProfile = update('ct_user', ['profile_percentage' => $this->calculate_profile_percentage($tutor_id)], ['id' => $tutor_id]);

        } elseif ($step_no === '03') {

            $data = array(
                'user_id' => $this->input->post('tutor_id'),
                'gender' => $this->input->post('gender'),
                'additional_numbers' => $this->input->post('additional_numbers'),
                'pre_address' => $this->input->post('pre_address'),
                'identity_type' => $this->input->post('identity_type'),
                'identity' => $this->input->post('identity'),
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
            $personal_info_id = $this->input->post('personal_info_id');
            if ($personal_info_id)
                $tutionUpdate = update('ct_tutor_per_info', $data, ['user_id' => $tutor_id, 'id' => $personal_info_id]);
            else {
                $updateProfile = update('ct_user', ['step_no' => 3], ['id' => $tutor_id]);
                $tutionSave = create('ct_tutor_per_info', $data);
            }

            $this->notification->verification_profile_update_notification($tutor_id, NULL, 'Personal Info');
            // $updateProfile = update('ct_user', ['profile_percentage' => $this->calculate_profile_percentage($tutor_id)], ['id' => $tutor_id]);
            ApiController::api_return($this->SUCCESS_CODE, '', 'Personal Information Updated!');

        } elseif ($step_no === '04') {
            $name = $this->input->post('name');
            $data = $this->input->post('credential');
            $tutor_id = $this->input->post('tutor_id');

            $credQuery = "select count(*) creds from ct_credential_info where user_id = ". $tutor_id ." limit 4";
            $prevCred = $this->db->query($credQuery)->row();

            if ($prevCred->creds < 4) {
                list($type, $data) = explode(';', $data);
                list(, $data)      = explode(',', $data);

                $data = base64_decode($data);
                $imageName = $tutor_id.'_'.rand().'_'.time().'.png';
                file_put_contents('assets/upload/credential/'.$imageName, $data);

                $table_name = $this->db->dbprefix('credential_info');
                $data = array(
                    'user_id' => $tutor_id,
                    'name_of_the_credential' => $name,
                    'file_name' => $imageName,
                    'created_at' => date("Y-m-d H:i:s")
                );
                $return = $this->db->insert($table_name, $data);
                $this->notification->verification_profile_update_notification($tutor_id, NULL, 'Credentials');
                ApiController::api_return($this->SUCCESS_CODE, 'https://caretutors.com/assets/upload/credential/'.$imageName, 'Credential Uploaded');
            } else {
                ApiController::api_return($this->FAILURE_CODE, '', 'You can not upload more than 4 credentials!');
            }
        } elseif ($step_no === '05') {
            ApiController::api_return($this->FAILURE_CODE, '', 'Working on it!');
        } else {
            ApiController::api_return($this->FAILURE_CODE, '', 'Invalid request!');
        }
    }

    public function delete_tutors_edu_info() {
        $this->checkAuth(TRUE);
        $this->load->model('notification_model', 'notification');
        $tutor_id           = $this->input->get('tutor_id');
        $education_info_id  = $this->input->get('education_info_id');

        $delete = $this->db->query("delete from ct_tutor_edu_info where user_id = ". $tutor_id ." and id = ". $education_info_id);
        $this->notification->verification_profile_update_notification($tutor_id, NULL, 'Education Info');
        ApiController::api_return($this->SUCCESS_CODE, '', 'Education Deleted');
    }

    public function delete_tutors_credentials() {
        $this->checkAuth(TRUE);
        $tutor_id = $this->input->get('tutor_id');
        $cred_id = $this->input->get('cred_id');
        $findImage = $this->db->query("select file_name from ct_credential_info where user_id = ". $tutor_id ." and id = ". $cred_id)->row();
        unlink('./assets/upload/credential/'.$findImage->file_name);
        $delete = $this->db->query("delete from ct_credential_info where user_id = ". $tutor_id ." and id = ". $cred_id);
        ApiController::api_return($this->SUCCESS_CODE, '', 'Credential Deleted');
    }

    private function job_query_fo_cur_status($where) {
        $query = $this->db->query("select apply.*, job.*, date_format(job.tutoring_time, '%h:%i %p') as tutoring_time, date_format(job.created_at, '%b %d, %Y') as posted_date, city.city, location.location, category.category, sub_cat.category sub_cat, GROUP_CONCAT(subjects.category) as subjects ".
            " from ct_job_tutor apply ".
            " left join ct_tutor_requirements job on job.id = apply.job_id ".
            " left join ct_city city on city.id = job.city_id ".
            " left join ct_location location on location.id = job.location_id ".
            " left join ct_tution_category category on category.id = job.tution_category_id ".
            " left join ct_tution_category sub_cat on sub_cat.id = job.tution_sub_cat_id ".
            " left join ct_tution_category as subjects on FIND_IN_SET(subjects.id , job.subjects) ".
            " where $where group by job.id order by job.id desc ");
        return $query->result();
    }

    public function cur_status()
    {
        $this->checkAuth(TRUE);
        $userData = find('ct_user', 'step_no, profile_percentage, updated_at', ['id' => $this->input->get('tutor_id')]);
        $data['step_no'] = $userData->step_no;
        $data['profile_percentage'] = $userData->profile_percentage;
        $data['last_updated'] = 'Last Updated: ' . date("F d, Y", strtotime($userData->updated_at));
        $data['applied'] = $this->job_query_fo_cur_status(" apply.tutor_id = ". $this->input->get('tutor_id') ." and apply.status = 'Applied' ");
        $data['complete'] = $this->job_query_fo_cur_status(" apply.tutor_id = ". $this->input->get('tutor_id') ." and apply.status = 'Assign' ");
        ApiController::api_return($this->SUCCESS_CODE, $data, 'Total applied: '. (count($data['applied']) + count($data['complete'])) .'');
    }

    public function get_notifications()
    {
        $this->checkAuth(TRUE);

        $uid = $this->input->get('user_id');
        $nid = $this->input->get('last_id');

        $table_name = $this->db->dbprefix('notification nt');
        $this->db->select("*", FALSE);
        $this->db->from($table_name);
        if ($nid > 20)
            $this->db->where('nt.id <', $nid);
        $this->db->where('nt.receiver_id', $uid);
        $this->db->order_by('nt.id', 'DESC');
        $this->db->limit(20);

        $all = $this->db->get()->result();

        ApiController::api_return($this->SUCCESS_CODE, $all, '');
    }

    public function getThreadMsg($tid)
    {
        $table_name = $this->db->dbprefix('thread_messages t');
        $this->db->select("*", FALSE);
        $this->db->from($table_name);
        $this->db->where('thread_detail_id', $tid);
        return $this->db->get()->result();
        //return "message";
    }

    public function get_msg()
    {
        $this->checkAuth(TRUE);

        $uid = $this->input->get('user_id');
        $nid = $this->input->get('last_id');

        $table_name = $this->db->dbprefix('thread_details t');
        $this->db->select("t.*", FALSE);
        //, m.id as msg_id, m.sender as sender, m.message_detail as body,
        // m.video_link as video_link, m.status as msg_status, m.created_at as msg_created_at, m.updated_at as msg_updated_at
        $this->db->from($table_name);

        $this->db->join('ct_thread_users u', 'u.thread_detail_id = t.id');
        // $this->db->join('ct_thread_messages m', 'm.thread_detail_id = d.id');

        if ($nid > 20)
            $this->db->where('t.id <', $nid);

        $this->db->where('u.thread_user_id', $uid);
        $this->db->group_by('t.id');
        $this->db->limit(20);

        $all = $this->db->get()->result();
        // var_dump($all);

        foreach ($all as $a)
            $a->msg = $this->getThreadMsg($a->id);
        // var_dump($all);

        ApiController::api_return($this->SUCCESS_CODE, $all, '');
    }

    public function post_msg()
    {
        $this->checkAuth(TRUE);

        $message_data = array(
            'sender' => $this->input->post('user_id'),
            'thread_detail_id' => $this->input->post('thread_id'),
            'message_detail' => $this->input->post('message'),
            'created_at' => date('Y-m-d H:i:s')
        );
        $this->db->insert('ct_thread_messages', $message_data);

        $thread_data = array(
            'thread_detail_id' => $this->input->post('thread_id'),
            'thread_user_id' => $this->input->post('receiver'),
            'created_at' => date('Y-m-d H:i:s')
        );
        $this->db->insert('ct_thread_users', $thread_data);
        ApiController::api_return($this->SUCCESS_CODE, '', 'Message Sent');
    }

    public function job_list()
    {
        $exeptionalCondition = '';

        if ($this->input->get('tutor_id')) {
            $this->checkAuth(true);
            $tutorId = $this->input->get('tutor_id');

            $updateProfile = update('ct_user', ['profile_percentage' => $this->calculate_profile_percentage($this->input->get('tutor_id'))], ['id' => $this->input->get('tutor_id')]);

            $tuitionInfo = find('ct_tution_info', 'pref_medium, city_id, your_location_id', ['user_id' => $tutorId]);
            $personalInfo = find('ct_tutor_per_info', 'gender', ['user_id' => $tutorId]);

            if (empty($tuitionInfo) || empty($personalInfo)) {
                // $return_data = array(
                //     'status' => 'redirect',
                //     'url' => 'tutor/profile/update'
                // );
                // echo json_encode($return_data);
                ApiController::api_return($this->FAILURE_CODE, '', 'Please Complete your Profile to Apply Tuition Jobs.');
                exit();
            }

            if ($personalInfo->gender == '' || $tuitionInfo->pref_medium == '' || ($tuitionInfo->city_id != '3' && $tuitionInfo->your_location_id == '')) {
                // $return_data = array(
                //     'status' => 'redirect',
                //     'url' => 'tutor/profile/update'
                // );
                // echo json_encode($return_data);
                ApiController::api_return($this->FAILURE_CODE, '', 'Please Complete your Profile to Apply Tuition Jobs.');
                exit();
            }
        } else
            $this->checkAuth();

        $offset = $this->input->get('offset') ? $this->input->get('offset') : 0;

        $table_name = $this->db->dbprefix('tutor_requirements tr');
        $this->db->select("u.full_name, tr.*, date_format(tr.tutoring_time, '%h:%i %p') as tutoring_time, c.city as city, l.location as location, tc.category as category, tc2.category as sub_cat, GROUP_CONCAT(s.category SEPARATOR ', ') as subs", FALSE);
        $this->db->from($table_name);

        $this->db->join('ct_city c', 'tr.city_id = c.id');
        $this->db->join('ct_location l', 'tr.location_id = l.id');
        $this->db->join('ct_tution_category tc', 'tr.tution_category_id = tc.id');
        $this->db->join('ct_tution_category tc2', 'tr.tution_sub_cat_id = tc2.id');
        $this->db->join('ct_tution_category s', 'FIND_IN_SET(s.id , tr.subjects)', 'left');
        $this->db->join('ct_user u', 'tr.user_id = u.id');

        if ($this->input->get('city_id'))
            $this->db->where("tr.city_id", $this->input->get('city_id'));
        if ($this->input->get('location_id'))
            $this->db->where_in("tr.location_id", explode(',', $this->input->get('location_id')));
        if ($this->input->get('tution_category_id'))
            $this->db->where_in("tr.tution_category_id", explode(',', $this->input->get('tution_category_id')));
        if ($this->input->get('tution_sub_cat_id'))
            $this->db->where_in("tr.tution_sub_cat_id", explode(',', $this->input->get('tution_sub_cat_id')));
        if ($this->input->get('preferred_gender'))
            $this->db->where("tr.preferred_gender", $this->input->get('preferred_gender'));

        $this->db->where('tr.online', '1');
        $this->db->where('tr.live_to >= ', date('Y-m-d'));

        if ($this->input->get('tutor_id'))
            $this->db->where('tr.id not in (select job_id from ct_job_tutor where tutor_id = '. $this->input->get('tutor_id') .' and job_id = tr.id)', null, false);

        $this->db->group_by("tr.id");

        $this->db->order_by('ISNULL(tr.sorted)', 'ASC');
        $this->db->order_by('tr.sorted', 'ASC');
        $this->db->order_by('tr.updated_at', 'DESC');

        $this->db->limit(20, $offset);

        $result = $this->db->get()->result();
        $c = count($result);

        ApiController::api_return($this->SUCCESS_CODE, $result, $c . ' more job' . ($c > 1 ? 's' : ''));
    }

    public function job_apply()
    {
        $this->checkAuth(true);

        $jid = $this->input->post('job_id');
        $tid = $this->input->post('tutor_id');

        $table_name = $this->db->dbprefix('job_tutor');

        $this->db->select('*')
            ->from($table_name)
            ->where('job_id', $jid)
            ->where('tutor_id', $tid);

        $get_res = $this->db->get();

        if ($get_res->num_rows() > 0) {
            // $data = array('status' => 'Applied');

            //Build contents query
            // $this->db->where('job_id', $jid);
            // $this->db->where('tutor_id', $tid);
            // $return = $this->db->update($table_name, $data);
            ApiController::api_return($this->FAILURE_CODE, '', 'You have already applied to this job.');
            // return true;
        } else {
            $data = array(
                'job_id' => $jid,
                'tutor_id' => $tid,
                'status' => 'Applied'
            );

            //Build contents query
            $return = $this->db->insert($table_name, $data);
            ApiController::api_return($this->SUCCESS_CODE, '', 'Job Applied');
            return true;
        }

        return false;
        ApiController::api_return($this->FAILURE_CODE, '', 'Something is Wrong!');
    }

    public function job_undo_apply() {
        $this->checkAuth(true);
        $tutor_id = $this->input->get('tutor_id');
        $job_id = $this->input->get('job_id');

        $find = find('ct_job_tutor', 'id', ['job_id' => $job_id, 'tutor_id' => $tutor_id, 'status' => 'Applied']);
        if ($find) {
            $delete = delete('ct_job_tutor', ['job_id' => $job_id, 'tutor_id' => $tutor_id, 'status' => 'Applied']);
            ApiController::api_return($this->SUCCESS_CODE, '', 'Job Removed from Applied list');
        } else
            ApiController::api_return($this->FAILURE_CODE, '', 'You cannot undo this request because we are proccessing on it');
    }

    public function getCreds()
    {
        $this->checkAuth(true);

        $table_name = $this->db->dbprefix('credential_info');
        $this->db->select("*", FALSE);
        $this->db->from($table_name);
        $this->db->where('user_id', $this->input->get('user_id'));
        $all = $this->db->get()->result();
        ApiController::api_return($this->SUCCESS_CODE, $all, '');
    }

    public function postCred()
    {
        ApiController::api_return($this->FAILURE_CODE, [], 'To Implement');
    }

    // Guardian Section

    public function send_post_req_email($user_id) {
        $table_name = $this->db->dbprefix('user');
        $user = find($table_name, 'full_name, email', ['id' => $user_id]);
        $config = Array(
        'protocol'  => 'smtp',
        'smtp_host' => 'ssl://smtp.googlemail.com',
        'smtp_port' => 465,
        'smtp_user' => 'caretutors.com@gmail.com',
        'smtp_pass' => 'caretutorpassword',
        'mailtype'  => 'html',
        'charset'   => 'iso-8859-1',
        'wordwrap'  => TRUE
        );

        $from       = 'caretutors.com@gmail.com';
        $to         = $user->email;
        $subject    = "Successfully posted a tutoring job";
        $bodyText = array(
            'intro' => "Dear ".$user->full_name,
            'body'  => "You have successfully posted a tutor request on our website. You will receive 5(max) best tutor CV as soon as our system find the best tutors whose expertise strongly matches your requirements. Call us at +8801756441122 if you have any further queries."
        );
        $message    = $this->load->view('mail_template',$bodyText,TRUE);


        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");
        $this->email->from($from);
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($message);

        if($this->email->send()) {
            return true;
        } else {
            return false;
        }
    }

    public function job_post()
    {
        $this->checkAuth(true);
        $this->load->model('notification_model', 'notification');

        $data = array(
            'user_id' => $this->input->post('user_id'),
            'city_id' => $this->input->post('city_id'),
            'location_id' => $this->input->post('location_id'),
            'guardian_name' => $this->input->post('guardian_name'),
            'add_contact_num' => $this->input->post('guardian_number'),
            'student_gender' => $this->input->post('student_gender'),
            'institute_name' => $this->input->post('institute_name'),
            'tution_category_id' => $this->input->post('tution_category_id'),
            'tution_sub_cat_id' => $this->input->post('tution_sub_cat_id'),
            'days_per_week' => $this->input->post('days_per_week'),
            'salary_range' => $this->input->post('salary_range'),
            'preferred_gender' => $this->input->post('preferred_gender'),
            'address' => $this->input->post('address'),
            'other_req' => $this->input->post('other_req'),
            'subjects' => $this->input->post('subjects'),
            'no_of_student' => $this->input->post('no_of_student'),
            'source' => $this->input->post('source'),
            // 'latitude' => $this->input->post('latitude'),
            // 'longitude' => $this->input->post('longitude'),
            'tutoring_time' => $this->input->post('tutoring_time'),
            'english_medium_from' => $this->input->post('english_medium_from'),
            'date_to_hire' => $this->input->post('date_to_hire'),
            'status' => 'post'
        );

        $table_name = $this->db->dbprefix('tutor_requirements');

        if ($this->input->post('job_id')) {
            $return = update($table_name, $data, ['id' => $this->input->post('job_id')]);
            $this->send_post_req_email($this->input->post('user_id'));
            $this->notification->job_update_notification($this->input->post('job_id'), $this->input->post('user_id'), 'Android App');
        } else {
            $return = create($table_name, $data, true);
            $this->send_post_req_email($this->input->post('user_id'));
            $this->notification->job_post_notification($return, $this->input->post('user_id'), 'Android App');
        }

        if ($return) {
            // $this->send_post_req_email($this->input->post('user_id'));
            // $return_data = array(
            //     'status' => 'redirect',
            //     'url' => 'parents/req_post_success'
            // );
            // echo json_encode($return_data);
            // $this->notification->job_post_notification($returnJobId, $this->input->post('user_id'), 'Android App');
            ApiController::api_return($this->SUCCESS_CODE, '', '');
            exit;
        }

        echo json_encode($save);
        ApiController::api_return($this->FAILURE_CODE, '', 'Something went wrong!');
    }

    public function profile_load_quize() {
        $this->checkAuth(true);
        $tutor_id = $this->input->get('tutor_id');

        $reloaded_exams = $this->db->select('*')
                                   ->from('ct_userexam')
                                   ->where('userid', $tutor_id)
                                   ->where('result', NULL)
                                   ->get()->result();

        $failed_exam = $this->db->select('ct_userexam.correctlyanswered, ct_exams.questions')
                                   ->from('ct_userexam')
                                   ->join('ct_exams', 'ct_exams.examid = ct_userexam.examid', 'left')
                                   ->where('ct_userexam.userid', $tutor_id)
                                   ->where('ct_userexam.result', 'failed')
                                   ->get()->row();

        $passed_exam = $this->db->select('ct_userexam.correctlyanswered, ct_exams.questions')
                                   ->from('ct_userexam')
                                   ->join('ct_exams', 'ct_exams.examid = ct_userexam.examid', 'left')
                                   ->where('ct_userexam.userid', $tutor_id)
                                   ->where('ct_userexam.result', 'passed')
                                   ->get()->row();

        $this->db->select('examid exam_id, examname exam_name, duration, questions, passmark')->from('ct_exams');
        $this->db->order_by("last_appeared_at", "ASC");
        if (!empty($reloaded_exams)) {
            foreach ($reloaded_exams as $key => $value) {
                $this->db->where('examid !=', $value->examid);
            }
        }
        $this->db->limit(1);
        $query = $this->db->get();
        $return = $query->row();

        $returnObject = ['exam_id' => null, 'examname' => null, 'exam_name' => null, 'duration' => null, 'questions' => null, 'passmark' => null]; // ignore it

        if ($passed_exam)
            ApiController::api_return($this->FAILURE_CODE, $returnObject, 'Congratulations! You have passed the exam and gained '. $passed_exam->correctlyanswered.' out of '.$passed_exam->questions .'.');
        if ($failed_exam)
            ApiController::api_return($this->FAILURE_CODE, $returnObject, 'Sorry. You did not pass the exam. You have gained '. $failed_exam->correctlyanswered.' out of '.$failed_exam->questions .'.');
        elseif (empty($return))
            ApiController::api_return($this->FAILURE_CODE, $returnObject, 'Sorry. You have appeared all exams and failed.');
        else
            ApiController::api_return($this->SUCCESS_CODE, $return, $return->exam_name);
    }

    public function profile_load_quize_questions() {
        $this->checkAuth(true);
        $tutor_id = $this->input->get('tutor_id');
        $exam_id = $this->input->get('exam_id');

        $examApearedData = array(
            'userid' => $tutor_id,
            'examid' => $exam_id,
            'starttime' => date('Y-m-d H:i:s'),
            'endtime' => date('Y-m-d H:i:s'),
            'correctlyanswered' => 0,
            'status' => 'inprogress'
        );
        $saveApearedData = create('ct_userexam', $examApearedData);

        $quesData = $this->db->query('select * from ct_questions where examid = '. $exam_id)->result();

        ApiController::api_return($this->SUCCESS_CODE, $quesData, 'Best of luck!');
    }

    public function profile_load_quize_submit() {
        $this->checkAuth(true);
        $tutor_id = $this->input->post('tutor_id');
        $exam_id = $this->input->post('exam_id');
        $marks = $this->input->post('marks');
        $result = $this->input->post('result');

        $examApearedData = array(
            'userid' => $tutor_id,
            'examid' => $exam_id,
            'endtime' => date('Y-m-d H:i:s'),
            'correctlyanswered' => $marks,
            'status' => 'completed',
            'result' => $result,
        );
        $saveApearedData = update('ct_userexam', $examApearedData, ['examid' => $exam_id, 'userid' => $tutor_id]);
        $returnObject = ['exam_id' => null, 'examname' => null, 'exam_name' => null, 'duration' => null, 'questions' => null, 'passmark' => null]; // ignore it
        ApiController::api_return($this->SUCCESS_CODE, $returnObject, 'Exam completed');
    }

    public function settings_change_password() {
        $this->checkAuth(true);
        $user_id = $this->input->post('user_id');
        $old_pass = md5($this->input->post('old_pass'));
        $new_pass = md5($this->input->post('new_pass'));

        $tutorInfo = find('ct_user', 'password', ['id' => $user_id]);
        if ($tutorInfo->password == $old_pass) {
            $updatePass = update('ct_user', ['password' => $new_pass], ['id' => $user_id]);
            ApiController::api_return($this->SUCCESS_CODE, '', 'Password changed');
        } else {
            ApiController::api_return($this->FAILURE_CODE, '', 'Old password did not match');
        }
    }

    public function settings_change_personal_info() {
        $this->checkAuth(true);
        $user_id = $this->input->post('user_id');
        $data['full_name'] = $this->input->post('full_name');
        $data['mobile_no'] = $this->input->post('mobile_no');

        if ($data['full_name'] == '' || $data['mobile_no'] == '') {
            ApiController::api_return($this->FAILURE_CODE, '', 'Full Name and Mobile No are required!');
            exit();
        }

        $update = update('ct_user', $data, ['id' => $user_id]);
        if ($update) {
            ApiController::api_return($this->SUCCESS_CODE, '', 'Info changed');
        } else {
            ApiController::api_return($this->FAILURE_CODE, '', 'Something went wrong');
        }
    }

    public function settings_verification_request() {
        $this->checkAuth(true);
        $this->load->model('notification_model', 'notification');

        $tutor_id       = $this->input->post('tutor_id');
        $request_type   = $this->input->post('request_type');

        if ($request_type == 'verification') {

            $prevReq = find('ct_tutor_verification', 'id', ['user_id' => $tutor_id]);
            if ($prevReq) {
                ApiController::api_return($this->FAILURE_CODE, '', 'Your request is already there!');
            } else {
                $saveReq = create('ct_tutor_verification', ['user_id' => $tutor_id, 'payment_method' => '', 'amount' => 0, 'ref_no' => '', 'payment_status' => 0, 'status' => 0, 'request_date' => date('Y-m-d H:i:s')], true);
                $this->notification->verification_request_notification($tutor_id, $saveReq);
                ApiController::api_return($this->SUCCESS_CODE, '', 'Request pending!');
            }

        } elseif ($request_type == 'enable_edit') {

            $prevReq = find('ct_tutor_verification', 'id', ['user_id' => $tutor_id, 'status' => 5]);
            if ($prevReq) {
                ApiController::api_return($this->FAILURE_CODE, '', 'Your request is already there!');
            } else {
                $data = array(
                    'status' => 5,
                    'seen' => 1
                );

                $this->db->set('payment_date', 'NOW()', FALSE);
                $this->db->where('user_id', $tutor_id);
                $res = $this->db->update('ct_tutor_verification', $data);

                $this->notification->verification_enable_edit_notification($tutor_id, NULL);

                if ($res == TRUE) {
                    ApiController::api_return($this->SUCCESS_CODE, '', 'Request pending!');
                } elseif ($res == FALSE) {
                    ApiController::api_return($this->FAILURE_CODE, '', 'Something Went Wrong!');
                }
            }
        } elseif ($request_type == 'address_verify') {

            $address_verification_code = $this->input->post('address_verification_code');
            $findData = find('ct_tutor_verification', '*', ['user_id' => $tutor_id]);
            if ($findData->address_verification_code == $address_verification_code) {
                $update = update('ct_tutor_verification', ['address_verified' => '1'], ['id' => $findData->id]);
                $this->notification->verification_address_verify_notification($tutor_id, NULL);
                ApiController::api_return($this->SUCCESS_CODE, '', 'Address Verified!');
            } else {
                ApiController::api_return($this->FAILURE_CODE, '', 'Invalid Code!');
            }

        } else {
            ApiController::api_return($this->FAILURE_CODE, '', 'Invalid request!');
        }
    }

    // send notification
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

    // calculate profile percentage
    public function calculate_profile_percentage($tutor_id) {
        $this->load->model('city_location_model');
        $this->load->model('category_model');
        $this->load->model('institute_model');
        $this->load->model('tution_info_model');
        $this->load->model('sdg_model');
        $this->load->model('user_model');
        $this->load->model('exam_model', 'exam');
        $this->load->model('request_verify_model', 'verify');

        $check_data = $this->user_model->get_user($tutor_id);
        $step = $check_data->step_no;

        $t_info = $this->tution_info_model->get_tution_info($tutor_id);
        $user_info = $this->user_model->get_user($tutor_id);
        $user_verifys = $this->verify->get_verify_data_by_user($tutor_id);
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

            $loc_ids = explode(',', $t_info[0]['pref_locations']);

            if ($t_info[0]['city_id'] != '' && $t_info[0]['city_id'] != '3') {
                $cities_location = $this->city_location_model->get_location($t_info[0]['city_id']);
            } else {
                $cities_location = '';
            }
            $location_info = $this->tution_info_model->get_tution_location_info($tutor_id);
            $tutoring_styles = array();
            $available_days = explode(",", $t_info[0]['available_days']);
            $tutoring_styles = explode(",", $t_info[0]['pref_tut_style']);
        } else {
            $tutoring_styles = array();
            $t_info = $cat_ids = $location_info = $cateories_class[1] = $class_ids = $classes_sub[1] = $sub_ids = $loc_ids = $available_days = $cities_location = $cateories_class[0] = '';
        }

        // $credential_info = $this->tution_info_model->get_credential_info();
        $credential_info = $this->db->where('user_id', $tutor_id)->order_by('id', 'DESC')->limit("4")->get('ct_credential_info')->result_array();
        // $credential_info_count = $this->tution_info_model->credential_info_count();
        $credential_info_count = $this->db->where('user_id', $tutor_id)->order_by('id', 'DESC')->limit("4")->get('ct_credential_info')->num_rows();


        $edu_infos = $this->tution_info_model->get_tutor_all_edu_info($tutor_id);
        $personal_info = $this->tution_info_model->get_personal_info($tutor_id);
        $exam_result = $this->exam->get_exam_result($tutor_id);
        $tution = $education = $personal = $credential = $test = 0;
        $name = $father_info = $mother_info = $overview = $email = $contact_num = $additional_num = $gender = $social_link = $det_address = $emergency_contact = $nid = $hons = $hsc = $ssc = $edus = $availability = $salary_range = $tution_style = $tution_cat = $tution_cls = $pref_sub = $city = $location = $pref_location = $tution_place = $tution_exp = $total_exp = $tution_exp_det = $pro_pic = 0;


        if (!empty($t_info)) {
            //$tution = 20;
            foreach ($t_info as $tutions) {
                //var_dump($tution['expected_fees']);
                if (!empty($tutions['expected_fees']) && !ctype_space($tutions['expected_fees'])) {
                    $salary_range = 2.5;
                }
                if (!empty($tutions['method']) && !ctype_space($tutions['method'])) {
                    $tution_style = 3;
                }
                if (!empty($tutions['has_experience'])) {
                    $tution_exp = 2;
                }
                if (!empty($tutions['total_experience'])) {
                    $total_exp = 2;
                }
                if (!empty($tutions['experiences'])) {
                    $tution_exp_det = 3;
                }
                if (!empty($tutions['available_days']) || !empty($tutions['available_time_from']) || !empty($tutions['available_time_to'])) {
                    $availability = 2;
                }
                if (!empty($tutions['student_home']) || !empty($tutions['my_home']) || !empty($tutions['online'])) {
                    $tution_place = 2;
                }
            }
        }

        if (!empty($location_info)) {
            if (!empty($location_info['city'])) {
                $city = 2;
            }
            if (!empty($location_info['location'])) {
                $location = 2;
            }
            if (!empty($location_info['pref_locs'])) {
                $pref_location = 2;
            }
        }
        if (!empty($cateories_class[1])) {
            $tution_cat = 2;
            $pref_sub = 2;
        }
        if (!empty($classes_sub[1])) {

            $tution_cls = 2;
        }

        if (!empty($this->tution_info_model->get_profile_pic_info($tutor_id))) {
            $pro_pic = 2.5;
        }
        if (!empty($user_info)) {
            if (!empty($user_info->mobile_no)) {
                $contact_num = 2.5;
            }
            if (!empty($user_info->email)) {
                $email = 2.5;
            }
            if (!empty($user_info->full_name)) {
                $name = 2.5;
            }
        }
        if (!empty($edu_infos)) {
            //$education = 20;
            foreach ($edu_infos as $edu) {
                if ($edu['level_of_education'] == "Bachelor/Honors") {
                    $hons = 4;
                }
                if ($edu['level_of_education'] == "Secondary") {
                    $ssc = 4;
                }
                if ($edu['level_of_education'] == "Higher Secondary") {
                    $hsc = 4;
                }
                $edus = $hons + $ssc + $hsc;
            }
        }
        if (!empty($personal_info)) {
            //$personal = 20;
            foreach ($personal_info as $per_info) {
                //var_dump($per_info['overview_yourself']);
                if (!empty($per_info['fathers_name']) && !ctype_space($per_info['fathers_name']) || !empty($per_info['fathers_phone']) && !ctype_space($per_info['fathers_phone'])) {
                    $father_info = 2.5;
                }
                if (!empty($per_info['mothers_name']) && !ctype_space($per_info['mothers_name']) || !empty($per_info['mothers_phone']) && !ctype_space($per_info['mothers_phone'])) {
                    $mother_info = 2.5;
                }
                if (!empty($per_info['overview_yourself']) && !ctype_space($per_info['overview_yourself'])) {
                    $overview = 3;
                }
                if (!empty($per_info['additional_numbers'])) {
                    $additional_num = 2.5;
                }
                if (!empty($per_info['gender'])) {
                    $gender = 2.5;
                }
                if (!empty($per_info['pre_address']) && !ctype_space($per_info['pre_address'])) {
                    $det_address = 3;
                }
                if (!empty($per_info['fb_link']) && !ctype_space($per_info['fb_link']) || !empty($per_info['linkedin_link']) && !ctype_space($per_info['linkedin_link'])) {
                    $social_link = 2.5;
                }
                if (!empty($per_info['emmergency_contact_name']) && !ctype_space($per_info['emmergency_contact_name']) || !empty($per_info['emmergency_contact_number']) && !ctype_space($per_info['emmergency_contact_number'])) {
                    $emergency_contact = 2.5;
                }
                if (!empty($per_info['identity']) && !ctype_space($per_info['identity'])) {
                    $nid = 2.5;
                }
            }
        }

        if (!empty($credential_info_count)) {
            //$credential = 20;
            $credential = 0;
            for ($i = 1; $i <= $credential_info_count; $i++) {
                $credential = $i * 4;
            }
        }
        if ($exam_result > 0) {
            $test = 10;
        }

        $completed = $name + $pro_pic + $father_info + $contact_num + $email + $availability + $tution_exp + $tution_exp_det + $total_exp + $tution_place + $location + $city + $pref_location + $tution_style + $tution_cat + $tution_cls + $pref_sub + $salary_range + $emergency_contact + $edus + $nid + $social_link + $det_address + $additional_num + $gender + $mother_info + $overview + $tution + $education + $personal + $credential + $test;
        //echo $name." - ".$pro_pic." - ".$father_info." - ".$contact_num." - ".$email." - ".$availability." - ".$tution_exp." - ".$tution_exp_det." - ".$total_exp." - ".$tution_place." - ".$location." - ".$city." - ".$pref_location." - ".$tution_style." - ".$tution_cat." - ".$tution_cls." - ".$pref_sub." - ".$salary_range." - ".$emergency_contact." - ".$edus." - ".$nid." - ".$social_link." - ".$det_address." - ".$additional_num." - ".$gender." - ".$mother_info." - ".$overview." - ".$tution." - ".$education." - ".$personal." - ".$credential." - ".$test."=".$completed;
        return $completed;
    }

    // guardian panel
    public function guardian_jobs() {

        $this->checkAuth(true);

        $guardian_id = $this->input->get('guardian_id');
        $job_id = $this->input->get('job_id');

        $offset = $this->input->get('offset') ? $this->input->get('offset') : 0;

        $table_name = $this->db->dbprefix('tutor_requirements tr');
        $this->db->select("u.full_name, tr.id, tr.user_id, tr.city_id, tr.location_id, tr.tution_category_id, tr.tution_sub_cat_id, tr.subjects, tr.student_gender, tr.institute_name, tr.days_per_week, date_format(tr.tutoring_time, '%h:%i %p') as tutoring_time, tr.salary_range, tr.preferred_gender, tr.address, tr.no_of_student, tr.other_req, tr.online, tr.created_at, tr.english_medium_from, tr.bangla_medium_from, tr.date_to_hire, tr.latitude, tr.longitude, c.city as city, l.location as location, tc.category as category, tc2.category as sub_cat, GROUP_CONCAT(s.category SEPARATOR ', ') as subs, (
            CASE 
                WHEN tr.status = 'post' THEN 'Pending'
                WHEN tr.status = 'solve' THEN 'Live'
                WHEN tr.status = 'asses' THEN 'Appointed'
                WHEN tr.status = 'done' THEN 'Confirmed'
                WHEN tr.status = 'complete' THEN 'Confirmed'
                WHEN tr.status = 'cancel' THEN 'Cancelled'
                ELSE 'Unknown'
            END) AS status, (
            CASE 
                WHEN tr.status = 'post' THEN true
                ELSE false
            END) AS editable, 
            (select count(*) from ct_job_tutor where job_id = tr.id limit 1) total_applied", FALSE);
        $this->db->from($table_name);

        $this->db->join('ct_city c', 'tr.city_id = c.id');
        $this->db->join('ct_location l', 'tr.location_id = l.id');
        $this->db->join('ct_tution_category tc', 'tr.tution_category_id = tc.id');
        $this->db->join('ct_tution_category tc2', 'tr.tution_sub_cat_id = tc2.id');
        $this->db->join('ct_tution_category s', 'FIND_IN_SET(s.id , tr.subjects)', 'left');
        $this->db->join('ct_user u', 'tr.user_id = u.id');

        $this->db->where('tr.user_id', $guardian_id);
        if ($job_id)
            $this->db->where('tr.id', $job_id);

        $this->db->group_by("tr.id");
        $this->db->order_by('tr.created_at', 'DESC');

        $this->db->limit(20, $offset);

        if ($job_id) {
            $data = $this->db->get()->row();
        
            $result = new stdClass();
            $result->id = $data->id;
            $result->user_id = $data->user_id;
            $result->city_id = $data->city_id ? $data->city_id : '';
            $result->location_id = $data->location_id ? $data->location_id : '';
            $result->tution_category_id = $data->tution_category_id ? $data->tution_category_id : '';
            $result->tution_sub_cat_id = $data->tution_sub_cat_id ? $data->tution_sub_cat_id : '';
            $result->subjects = $data->subjects ? $data->subjects : '';
            $result->institute_name = $data->institute_name ? $data->institute_name : '';
            $result->days_per_week = $data->days_per_week ? $data->days_per_week : '';
            $result->salary_range = $data->salary_range ? $data->salary_range : '';
            $result->preferred_gender = $data->preferred_gender ? $data->preferred_gender : '';
            $result->address = $data->address ? $data->address : '';
            $result->no_of_student = $data->no_of_student ? $data->no_of_student : '';
            $result->other_req = $data->other_req ? $data->other_req : '';
            $result->tutoring_time = $data->tutoring_time ? $data->tutoring_time : '';
            $result->source = $data->source ? $data->source : '';
            $result->student_gender = $data->student_gender ? $data->student_gender : '';
            $result->online = $data->online;
            $result->english_medium_from = $data->english_medium_from ? $data->english_medium_from : '';
            $result->bangla_medium_from = $data->bangla_medium_from ? $data->bangla_medium_from : '';
            $result->date_to_hire = $data->date_to_hire ? $data->date_to_hire : '';
            $result->latitude = $data->latitude ? $data->latitude : '';
            $result->longitude = $data->longitude ? $data->longitude : '';
            $result->city = $data->city ? $data->city : '';
            $result->location = $data->location ? $data->location : '';
            $result->category = $data->category ? $data->category : '';
            $result->sub_cat = $data->sub_cat ? $data->sub_cat : '';
            $result->subs = $data->subs ? $data->subs : '';
            $result->editable = $data->editable;
            $result->total_applied = $data->total_applied;
        } else
            $result = $this->db->get()->result();

        $c = count($result);

        ApiController::api_return($this->SUCCESS_CODE, $result, $c . ' Job' . ($c > 1 ? 's' : '') . ' Found');
    }

    public function guardian_cv() {
        $this->checkAuth(true);

        $guardian_id = $this->input->get('guardian_id');
        $job_id = $this->input->get('job_id');

        $cvListQuery = "select cv.tutor_id, tutor.full_name tutor_name, institute.institute, tution.experiences, cv.status cv_status, concat('https://caretutors.com/assets/upload/', profile_pic.profile_pic) as photo, (
            CASE 
                WHEN job_tutor.status = 'Applied' THEN 'Applied'
                WHEN job_tutor.status = 'Selected' THEN 'Selected'
                WHEN job_tutor.status = 'Appointed' THEN 'Appointed'
                WHEN job_tutor.status = 'Rejected' THEN 'Rejected'
                WHEN job_tutor.status = 'Asses' THEN 'Shortlisted'
                WHEN job_tutor.status = 'Assign' THEN 'Confirmed'
                ELSE 'Unknown'
            END) AS status, 
            (select avg(points) from ct_job_tutor where tutor_id = tutor.id and points != 0 limit 1) points ".
            "from ct_resume_permission cv ".
            "left join ct_user tutor on tutor.id = cv.tutor_id ".
            "left join ct_job_tutor job_tutor on job_tutor.tutor_id = cv.tutor_id and job_tutor.job_id = cv.job_id ".
            "left join ct_tutor_edu_info education on tutor.id = education.user_id ".
            "left join ct_institute institute on education.institute_id = institute.id ".
            "left join ct_tution_info tution on tutor.id = tution.user_id ".
            "left join ct_tutor_profile_pic profile_pic on profile_pic.tutor_id = cv.tutor_id ".
            "where cv.user_id = ". $guardian_id ." and cv.job_id = ". $job_id ." ".
            "group by cv.tutor_id ";
        $cvList = $this->db->query($cvListQuery)->result();

        ApiController::api_return($this->SUCCESS_CODE, $cvList, $cvList ? "Total ". count($cvList) ." cv's found." : 'No cv found for this job');
    }

    public function guardian_suggested_tutor_profile() {
        $this->checkAuth(TRUE);
        $tutor_id = $this->input->get('tutor_id');
        $guardian_id = $this->input->get('guardian_id');
        $job_id = $this->input->get('job_id');

        $profileQuery = "select ct_user.id as tutor_id, ct_user.*, concat('https://caretutors.com/assets/upload/', ct_tutor_profile_pic.profile_pic) as photo, ct_tutor_per_info.id personal_info_id, ct_tutor_per_info.*, ct_tution_info.id tution_id, ct_tution_info.*, ct_city.city, ct_location.location, job_tutor.status job_tutor_status, job.status job_status, ".
            "(select avg(points) from ct_job_tutor where tutor_id = cv_permission.tutor_id and points != 0 limit 1) review ".
            "from ct_resume_permission cv_permission ".
            "left join ct_user on ct_user.id = cv_permission.tutor_id ".
            "left join ct_tutor_requirements job on job.id = cv_permission.job_id " .
            "left join ct_job_tutor job_tutor on job_tutor.tutor_id = ct_user.id and job_tutor.job_id = cv_permission.job_id ".
            "left join ct_tutor_profile_pic on ct_tutor_profile_pic.tutor_id = ct_user.id ".
            "left join ct_tutor_per_info on ct_tutor_per_info.user_id = ct_user.id ".
            "left join ct_tution_info on ct_tution_info.user_id = ct_user.id ".
            "left join ct_city on ct_city.id = ct_tution_info.city_id ".
            "left join ct_location on ct_location.id = ct_tution_info.your_location_id ".
            "where cv_permission.tutor_id = ". $tutor_id . " and cv_permission.user_id = ". $guardian_id ." and cv_permission.job_id = ". $job_id;
        $profileData = $this->db->query($profileQuery)->row();

        if (empty($profileData))
            ApiController::api_return($this->FAILURE_CODE, '', 'Profile Info Not Found');

        $tutorInfo = [
            'tutor_id' => $profileData->tutor_id,
            'full_name' => $profileData->full_name,
            'mobile_no' => $profileData->job_tutor_status == 'Appointed' && $profileData->job_tutor_status == 'Assign' ? $profileData->mobile_no : null,
            'email' => $profileData->job_tutor_status == 'Appointed' && $profileData->job_tutor_status == 'Assign' ? $profileData->email : null,
            'step_no' => $profileData->step_no,
            'verify_status' => $profileData->verify_status,
            'is_featured' => $profileData->is_featured,
            'profile_percentage' => $profileData->profile_percentage,
            'created_at' => $profileData->created_at,
            'updated_at' => $profileData->updated_at,
            'last_login_timestamp' => $profileData->last_login_timestamp,
            'photo' => $profileData->photo,
            'fathers_name' => $profileData->fathers_name,
            'additional_numbers' => $profileData->job_tutor_status == 'Appointed' && $profileData->job_tutor_status == 'Assign' ? $profileData->additional_numbers : null,
            'gender' => $profileData->gender,
            'pre_address' => $profileData->job_tutor_status == 'Appointed' && $profileData->job_tutor_status == 'Assign' ? $profileData->pre_address : null,
            // 'emmergency_contact_name' => $profileData->emmergency_contact_name,
            'emmergency_contact_name' => null,
            // 'emmergency_contact_number' => $profileData->job_tutor_status == 'Appointed' && $profileData->job_tutor_status == 'Assign' ? $profileData->emmergency_contact_number : null,
            'emmergency_contact_number' => null,
            // 'emmergency_contact_rel' => $profileData->emmergency_contact_rel,
            'emmergency_contact_rel' => null,
            // 'emmergency_contact_address' => $profileData->job_tutor_status == 'Appointed' && $profileData->job_tutor_status == 'Assign' ? $profileData->emmergency_contact_address : null,
            'emmergency_contact_address' => null,
            // 'identity_type' => $profileData->identity_type,
            'identity_type' => null,
            // 'identity' => $profileData->identity,
            'identity' => null,
            // 'linkedin_link' => $profileData->job_tutor_status == 'Appointed' && $profileData->job_tutor_status == 'Assign' ? $profileData->linkedin_link : null,
            'linkedin_link' => null,
            // 'fb_link' => $profileData->job_tutor_status == 'Appointed' && $profileData->job_tutor_status == 'Assign' ? $profileData->fb_link : null,
            'fb_link' => null,
            // 'fathers_phone' => $profileData->job_tutor_status == 'Appointed' && $profileData->job_tutor_status == 'Assign' ? $profileData->fathers_phone : null,
            'fathers_phone' => null,
            'mothers_name' => $profileData->mothers_name,
            // 'mothers_phone' => $profileData->job_tutor_status == 'Appointed' && $profileData->job_tutor_status == 'Assign' ? $profileData->mothers_phone : null,
            'mothers_phone' => null,
            'overview_yourself' => $profileData->overview_yourself,
            'expected_fees' => $profileData->expected_fees,
            'days_per_week' => $profileData->days_per_week,
            'pref_tut_style' => $profileData->pref_tut_style,
            'place_of_tut' => $profileData->place_of_tut,
            'experiences' => $profileData->experiences,
            'method' => $profileData->method,
            'skype_acc' => $profileData->skype_acc,
            'google_acc' => $profileData->google_acc,
            'student_home' => $profileData->student_home,
            'my_home' => $profileData->my_home,
            'online' => $profileData->online,
            'has_experience' => $profileData->has_experience,
            'total_experience' => $profileData->total_experience,
            'available_days' => $profileData->available_days,
            'available_time_from' => $profileData->available_time_from,
            'available_time_to' => $profileData->available_time_to,
            'city' => $profileData->city,
            'location' => $profileData->location,
        ];

        $eduQuery = "select ct_tutor_edu_info.*, ct_sdg.sdg, ct_institute.institute " .
            "from ct_tutor_edu_info " .
            "left join ct_sdg on ct_tutor_edu_info.group_id = ct_sdg.id " .
            "left join ct_institute on ct_tutor_edu_info.institute_id = ct_institute.id " .
            "where user_id = " . $tutor_id . " " .
            "order by ct_tutor_edu_info.year_of_passing desc";
        $eduData = $this->db->query($eduQuery)->result();

        $profileData->pref_medium ? $pref_medium = $profileData->pref_medium : $pref_medium = '0';
        $profileData->pref_class ? $pref_class = $profileData->pref_class : $pref_class = '0';
        $profileData->pref_subjects ? $pref_subjects = $profileData->pref_subjects : $pref_subjects = '0';
        $profileData->pref_locations ? $pref_locations = $profileData->pref_locations : $pref_locations = '0';

        // $subQueries = "select " .
        //     "(select sum(points) from ct_job_tutor where tutor_id = " . $tutor_id . ") as points_sum, " .
        //     "(select count(*) from ct_job_tutor where points != 0 and tutor_id = " . $tutor_id . ") as points_total ";
        // $subData = $this->db->query($subQueries)->row();
        // $review = $subData && $subData->points_total ? round(($subData->points_sum / $subData->points_total), 2) : 0;

        $prefCategoryQuery = "select id, category category from ct_tution_category where id in (". $pref_medium .")";
        $prefCategory = $this->db->query($prefCategoryQuery)->result();

        $prefClassQuery = "select id, category class from ct_tution_category where id in (". $pref_class .")";
        $prefClass = $this->db->query($prefClassQuery)->result();

        $prefSubjectsQuery = "select id, category subject from ct_tution_category where id in (". $pref_subjects .")";
        $prefSubjects = $this->db->query($prefSubjectsQuery)->result();

        $prefLocationsQuery = "select id, location from ct_location where id in (". $pref_locations .")";
        $prefLocations = $this->db->query($prefLocationsQuery)->result();

        $quizPass = "select * from ct_userexam where userid = " . $tutor_id . " and result = 'passed'";
        $passData = $this->db->query($quizPass)->row();

        $quizFail = "select * from ct_userexam where userid = " . $tutor_id . " and result = 'failed'";
        $failData = $this->db->query($quizFail)->row();

        if (!empty($passData))
            $quizData = ['status' => 'Passed', 'result' => $passData->correctlyanswered];
        else if (!empty($failData))
            $quizData = ['status' => 'Failed', 'result' => 0];
        else
            $quizData = ['status' => 'Not appeared', 'result' => 0];

        // $credQuery = "select *, concat('https://caretutors.com/assets/upload/credential/', file_name) file_name from ct_credential_info where user_id = " . $tutor_id;
        // $credData = $this->db->query($credQuery)->result();

        $data['tutor_info'] = $tutorInfo;
        $data['edu_info'] = $eduData;
        $data['quiz_info'] = $quizData;
        $data['cred_info'] = null;
        // $data['cred_info'] = $profileData->job_tutor_status == 'Appointed' && $profileData->job_tutor_status == 'Assign' ? $credData : null;
        $data['others'] = [
            'review' => round($profileData->review, 1),
            // 'download_cv' => $profileData->job_status == 'asses' || $profileData->job_status == 'done' || $profileData->job_status == 'complete' ? true : false,
            'download_cv' => false,
            'pref_medium' => $prefCategory,
            'pref_class' => $prefClass,
            'pref_subjects' => $prefSubjects,
            'pref_locations' => $prefLocations,
            'data' => $subData
        ];

        if (empty($data))
            ApiController::api_return($this->FAILURE_CODE, '', 'Profile Info Not Found');
        else
            ApiController::api_return($this->SUCCESS_CODE, $data, 'Profile Synced');
    }

    public function guardian_suggested_tutor_profile_select() {

        $tutor_id = $this->input->get('tutor_id');
        $job_id = $this->input->get('job_id');

        $findTutor = $this->db->query("select id from ct_job_tutor where job_id = " . $job_id . " and tutor_id = " . $tutor_id . " and ( status = 'Appointed' or status = 'Rejected' or status = 'Assign' or status = 'Selected' )")->row();
        if (!empty($findTutor)) {
            ApiController::api_return($this->FAILURE_CODE, '', 'You can not select this tutor.');
            exit;
        }

        $data = array( 'status' => 'Selected' );
        $this->db->where('job_id', $job_id);
        $this->db->where('tutor_id', $tutor_id);
        $this->db->where('status', 'Asses');
        $return = $this->db->update('ct_job_tutor', $data);

        if ($this->db->affected_rows() == true) {
            $data = array( 'status' => 'Asses' );
            $this->db->where('job_id', $job_id);
            $this->db->where('status', 'Selected');
            $this->db->where('tutor_id != ', $tutor_id);
            $this->db->update('ct_job_tutor', $data);
            ApiController::api_return($this->SUCCESS_CODE, '', 'You selected tutor successfully. Wait for admin approval.');
        } else
            ApiController::api_return($this->FAILURE_CODE, '', 'You can not select this tutor.');
            
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

    public function update_profile_percentage() {

        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE');

        $value = json_decode(file_get_contents('php://input'), true);

        $this->db->dbprefix = '';
        $checkToken = $this->db->select('id')->from('bo_o_auth_access_tokens')->where('access_token', $value['token'])->where('expired_at >=', date('Y-m-d H:i:s'))->get()->row();
        $tutor_id = $value['tutor_id'];
        if ($checkToken && $tutor_id) {
            $this->db->dbprefix = 'ct_';
            $updateProfile = update('ct_user', ['profile_percentage' => $this->calculate_profile_percentage($tutor_id)], ['id' => $tutor_id]);
            http_response_code(201);
            echo json_encode('profile percentage updated');
        } else {
            http_response_code(400);
            // echo json_encode('something went wrong');
        }
    }

    public function base64_pdf_confirmation_letter() {
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: GET, OPTIONS");
        header("Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With");
        // echo json_encode($_GET);
        // dd(explode(' ', getallheaders()['Authorization'])[1]);

        if (array_key_exists('Authorization', getallheaders())) {
            $this->db->dbprefix = '';
            $checkToken = $this->db->select('id')->from('bo_o_auth_access_tokens')->where('access_token', explode(' ', getallheaders()['Authorization'])[1])->where('expired_at >=', date('Y-m-d H:i:s'))->get()->row();
            if ($checkToken) {
                $tutor_id = $this->input->get('tutor_id');
                $job_id = $this->input->get('job_id');

                $jobInfoQuery = "select apply.*, city.city, location.location, category.category, class.category class, group_concat(subjects.category) subjects, job.user_id guardian_id, job.days_per_week, job.salary_range, job.preferred_gender, job.address, job.student_gender, job.other_req, job.guardian_name, job.add_contact_num guardian_number, job.date_to_hire, tutor.full_name tutor_name, tutor.mobile_no tutor_number " .
                    "from ct_job_tutor apply " .
                    "left join ct_tutor_requirements job on job.id = apply.job_id " .
                    "left join ct_city city on city.id = job.city_id " .
                    "left join ct_location location on location.id = job.location_id " .
                    "left join ct_tution_category category on category.id = job.tution_category_id " .
                    "left join ct_tution_category class on class.id = job.tution_sub_cat_id " .
                    "left join ct_tution_category subjects on find_in_set(subjects.id , job.subjects) " .
                    "left join ct_user tutor on tutor.id = apply.tutor_id " .
                    "where apply.status = 'Assign' and apply.tutor_id = " . $tutor_id. " and apply.job_id = ". $job_id;

                $data['jobInfo'] = $this->db->query($jobInfoQuery)->row();

                if ($data['jobInfo']->job_id) {
                    // $this->load->view('tutor/caretutor_tutor_contract_paper_api', $data);
                    $this->load->helper(array('dompdf'));
                    $html = $this->load->view('tutor/caretutor_tutor_contract_paper_api', $data, TRUE);
                    $pdf = pdf_create($html, $job_id, false);
                    // file_put_contents('./assets/upload/contract_paper/job_' . $job_id . '_tutor_'. $tutor_id .'.pdf', $pdf);

                    // $path = './assets/upload/contract_paper/job_' . $job_id . '_tutor_'. $tutor_id .'.pdf';
                    // $data = file_get_contents($path);
                    // $base64 = 'data:pdf/' . $type . ';base64,' . base64_encode($data);
                    $base64 = base64_encode($pdf);

                    http_response_code(200);
                    echo json_encode(['status' => 200, 'message' => 'something went wrong', 'data' => $base64]);
                    exit();
                } else {
                    http_response_code(406);
                    echo json_encode(['status' => 406, 'message' => 'something went wrong', 'data' => null]);
                    exit();
                }
            } else {
                http_response_code(406);
                echo json_encode(['status' => 406, 'message' => 'something went wrong', 'data' => null]);
                exit();
            }
        } else {
            exit;
        }
    }

    public function base64_pdf_tutor_profile() {
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: GET, OPTIONS");
        header("Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With");
        // echo json_encode($_GET);
        // dd(explode(' ', getallheaders()['Authorization'])[1]);

        if (array_key_exists('Authorization', getallheaders())) {
            $this->db->dbprefix = '';
            $checkToken = $this->db->select('id')->from('bo_o_auth_access_tokens')->where('access_token', explode(' ', getallheaders()['Authorization'])[1])->where('expired_at >=', date('Y-m-d H:i:s'))->get()->row();
            if ($checkToken) {
                $tutor_id = $this->input->get('tutor_id');

                $profileQuery = "select ct_user.id as tutor_id, ct_user.*, concat('assets/upload/', ct_tutor_profile_pic.profile_pic) as photo, ct_tutor_per_info.id personal_info_id, ct_tutor_per_info.*, ct_tution_info.id tution_id, ct_tution_info.*, ct_city.city, ct_location.location, ".
                    "(select avg(points) from ct_job_tutor where tutor_id = ct_user.id and points != 0 limit 1) review ".
                    "from ct_user ".
                    "left join ct_tutor_profile_pic on ct_tutor_profile_pic.tutor_id = ct_user.id ".
                    "left join ct_tutor_per_info on ct_tutor_per_info.user_id = ct_user.id ".
                    "left join ct_tution_info on ct_tution_info.user_id = ct_user.id ".
                    "left join ct_city on ct_city.id = ct_tution_info.city_id ".
                    "left join ct_location on ct_location.id = ct_tution_info.your_location_id ".
                    "where ct_user.id = ". $tutor_id;
                $profileData = $this->db->query($profileQuery)->row();

                $eduQuery = "select ct_tutor_edu_info.*, ct_sdg.sdg, ct_institute.institute " .
                    "from ct_tutor_edu_info " .
                    "left join ct_sdg on ct_tutor_edu_info.group_id = ct_sdg.id " .
                    "left join ct_institute on ct_tutor_edu_info.institute_id = ct_institute.id " .
                    "where user_id = " . $tutor_id . " " .
                    "order by ct_tutor_edu_info.year_of_passing desc";
                $eduData = $this->db->query($eduQuery)->result();

                $profileData->pref_medium ? $pref_medium = $profileData->pref_medium : $pref_medium = '0';
                $profileData->pref_class ? $pref_class = $profileData->pref_class : $pref_class = '0';
                $profileData->pref_subjects ? $pref_subjects = $profileData->pref_subjects : $pref_subjects = '0';
                $profileData->pref_locations ? $pref_locations = $profileData->pref_locations : $pref_locations = '0';

                $subQueries = "select " .
                    "(select group_concat(' ', pref_medium.category) from ct_tution_category pref_medium where pref_medium.id in (" . $pref_medium . ")) as pref_medium, " .
                    "(select group_concat(' ', pref_class.category) from ct_tution_category pref_class where pref_class.id in (" . $pref_class . ")) as pref_class, " .
                    "(select group_concat(' ', pref_subjects.category) from ct_tution_category pref_subjects where pref_subjects.id in (" . $pref_subjects . ")) as pref_subjects, " .
                    "(select group_concat(' ', pref_locations.location) from ct_location pref_locations where pref_locations.id in (" . $pref_locations . ")) as pref_locations";
                $subData = $this->db->query($subQueries)->row();

                $data['tutor_info'] = $profileData;
                $data['edu_info'] = $eduData;
                $data['sub_data'] = $subData;

                if ($profileData) {
                    $this->load->helper(array('dompdf'));
                    $html = $this->load->view('tutor/caretutor_tutor_cv_pdf_api', $data, TRUE);
                    $pdf = pdf_create($html, $tutor_id, false);
                    $base64 = base64_encode($pdf);
                    
                    http_response_code(200);
                    echo json_encode(['status' => 200, 'message' => 'something went wrong', 'data' => $base64]);
                    exit();
                } else {
                    http_response_code(406);
                    echo json_encode(['status' => 406, 'message' => 'something went wrong', 'data' => null]);
                    exit();
                }
            } else {
                http_response_code(406);
                echo json_encode(['status' => 406, 'message' => 'something went wrong', 'data' => null]);
                exit();
            }
        } else {
            exit;
        }
    }

    /**API Code Ends : Touhid*/
}

/* End of file ApiController.php */
/* Location: ./application/controllers/ApiController.php */
