<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = "landing";
$route['register/parrent'] = "registration/parrents_registration";
$route['register/tutor'] = "registration/tutor_registration";
$route['404_override'] = 'landing/not_found';

// region API Routes Starts : Touhid
$route['api/register'] = "ApiController/api_register";
$route['api/login'] = "ApiController/api_login";
$route['api/statics'] = "ApiController/job_static_data";
$route['api/statics/categories'] = "ApiController/job_static_data_categories";
$route['api/testimonials'] = "ApiController/testimonials";
$route['api/fcm/update'] = "ApiController/fcm_update";
$route['api/profile'] = "ApiController/api_profile";
$route['api/profile/quize'] = "ApiController/profile_load_quize";
$route['api/profile/quize/questions'] = "ApiController/profile_load_quize_questions";
$route['api/profile/quize/submit'] = "ApiController/profile_load_quize_submit";
$route['api/profile/info'] = "ApiController/profile_info";
$route['api/profile/info/basic'] = "ApiController/profile_basic_info";
$route['api/profile/cv/download'] = "ApiController/tutor_profile_cv_download";
$route['api/profile/payments'] = "ApiController/profile_payments";
$route['api/profile/payments/success'] = "ApiController/payment_success";
$route['api/profile/confirmation-letters'] = "ApiController/profile_confirmation_letter";
$route['api/profile/confirmation-letters/download'] = "ApiController/profile_confirmation_letter_download";
$route['api/profile/update/step'] = "ApiController/update_tutor_profile";
$route['api/profile/update/image'] = "ApiController/update_tutor_profile_pic";
$route['api/profile/delete/education'] = "ApiController/delete_tutors_edu_info";
$route['api/profile/delete/credentials'] = "ApiController/delete_tutors_credentials";
$route['api/status'] = "ApiController/cur_status";
$route['api/notifs'] = "ApiController/get_notifications";
$route['api/messages'] = "ApiController/get_msg";
$route['api/messages/send'] = "ApiController/post_msg";
$route['api/settings/change-password'] = "ApiController/settings_change_password";
$route['api/settings/change-personal-info'] = "ApiController/settings_change_personal_info";
$route['api/settings/verification-request'] = "ApiController/settings_verification_request";

$route['api/job/list'] = "ApiController/job_list";
$route['api/job/apply'] = "ApiController/job_apply";
$route['api/job/undo-apply'] = "ApiController/job_undo_apply";
$route['api/job/post'] = "ApiController/job_post";

$route['api/guardian/jobs'] = "ApiController/guardian_jobs";
$route['api/guardian/cv'] = "ApiController/guardian_cv";
$route['api/guardian/cv/profile'] = "ApiController/guardian_suggested_tutor_profile";
$route['api/guardian/cv/profile/select'] = "ApiController/guardian_suggested_tutor_profile_select";

// only for back-office
$route['api/tutor/download-cv'] = "ApiController/download_cv";
$route['api/tutor/update-profile'] = "ApiController/update_profile_percentage";

/* End of file routes.php */
/* Location: ./application/config/routes.php */
