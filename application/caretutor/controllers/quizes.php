<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Quizes extends CI_Controller {

    /**
     *
     * Student Quizes Module controller
     *
     */
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
    }

    function load_quizes($chapter_quiz_id = 0) {
        echo "<script language=\"javascript\">
            var screenWidth = window.screen.width;
            if(screenWidth < 800){
                window.location.href = 'https://m.caretutors.com';
            }
        </script>";
        $this->load->model('exam_model', 'exam');

        $this->load->model('category_model');
        $this->load->model('institute_model');
        $this->load->model('tution_info_model');

        $this->load->model('exam_model', 'exam');
        $this->load->model('request_verify_model', 'verify');
        $this->load->model('user_model');

        $check_data = $this->user_model->get_user();
        $step = $check_data->step_no;

        $t_info = $this->tution_info_model->get_tution_info();
        $user_info = $this->user_model->get_user($this->session->userdata('id'));
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



            $location_info = $this->tution_info_model->get_tution_location_info();
        } else {

            $t_info = $cat_ids = $location_info = $cateories_class[1] = $classes_sub[1] = '';
        }

        $credential_info_count = $this->tution_info_model->credential_info_count();
        $data = array(
            'cateories_class' => $cateories_class[1],
            'classes_sub' => $classes_sub[1],
            'tution_info' => $t_info,
            'edu_infos' => $this->tution_info_model->get_tutor_all_edu_info(),
            'personal_info' => $this->tution_info_model->get_personal_info(),
            'profile_pic_info' => $this->tution_info_model->get_profile_pic_info(),
            'user_data' => $user_info,
            'step' => $step,
            'location_info' => $location_info,
            //'credential_info' => $credential_info,
            'credential_info_count' => $credential_info_count,
            'email_count' => $this->data['email_count'],
            'emails' => $this->data['emails'],
            'notification_count' => $this->data['notification_count'],
            'notifications' => $this->data['notifications'],
            'user_verification' => $user_verify,
            'exam_result' => $this->exam->get_exam_result($this->session->userdata('id')),
            'exam' => $this->exam->chapter_quiz_info_get(),
            'includePage' => 'caretutor_opensity_quiz_index'
        );

        $data['title'] = 'CareTutors | Quiz';

        $this->load->view('panel', $data);
    }

// For  questions one by one
    function load_quiz_question() {
        // Get Exam ID
        $this->load->model('exam_model', 'exam');
        $dataexam_id = $this->exam->chapter_quiz_info_get();
        $exam_id = $dataexam_id->examid;

        $this->session->set_userdata(array('exam_id' => $exam_id));

        // Check if the exam is started now or continution
        if (!$this->session->userdata('ques_no')) {
            $ques_no = 1;
            $this->session->set_userdata('ques_no', $ques_no);
        } else {
            $ques_no = ($this->session->userdata('ques_no') + 1);
            $this->session->unset_userdata('ques_no');
            $this->session->set_userdata('ques_no', $ques_no);
        }

        $input_data = array(
            'userid' => $this->session->userdata('id'),
            'examid' => $this->session->userdata('exam_id')
        );

        $api_response = $this->exam->quiz_result_put($input_data);

        $cond = (preg_match('/\bDuplicate entry\b/', $api_response)) ? FALSE : TRUE;

        $this->load->model('category_model');
        $this->load->model('institute_model');
        $this->load->model('tution_info_model');

        $this->load->model('exam_model', 'exam');
        $this->load->model('request_verify_model', 'verify');
        $this->load->model('user_model');

        $check_data = $this->user_model->get_user();
        $step = $check_data->step_no;

        $t_info = $this->tution_info_model->get_tution_info();
        $user_info = $this->user_model->get_user($this->session->userdata('id'));
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



            $location_info = $this->tution_info_model->get_tution_location_info();
        } else {

            $t_info = $cat_ids = $location_info = $cateories_class[1] = $classes_sub[1] = '';
        }

        $credential_info_count = $this->tution_info_model->credential_info_count();
        $data = array(
            //'city' => $this->city_location_model->get_city(),
            //'category' => $this->category_model->get_category(),
            //'selected_cats' => $cat_ids,
            'cateories_class' => $cateories_class[1],
            //'selected_catagory' => $cateories_class[0],
            //'selected_cls' => $class_ids,
            'classes_sub' => $classes_sub[1],
            //'selected_subs' => $sub_ids,
            //'selected_locs' => $loc_ids,
            //'cities_location' => $cities_location,
            //'aval_days' => $available_days,
            //'tutoring_styles' => $tutoring_styles,
            'tution_info' => $t_info,
            'edu_infos' => $this->tution_info_model->get_tutor_all_edu_info(),
            'personal_info' => $this->tution_info_model->get_personal_info(),
            'profile_pic_info' => $this->tution_info_model->get_profile_pic_info(),
            //'institutes'      => $this->tution_info_model->get_institutes(),
            //'groups' => $this->sdg_model->get_groups(),
            'user_data' => $user_info,
            'step' => $step,
            'location_info' => $location_info,
            //'credential_info' => $credential_info,
            'credential_info_count' => $credential_info_count,
            'email_count' => $this->data['email_count'],
            'emails' => $this->data['emails'],
            'notification_count' => $this->data['notification_count'],
            'notifications' => $this->data['notifications'],
            'user_verification' => $user_verify,
            'exam_result' => $this->exam->get_exam_result($this->session->userdata('id')),
        );
        if ($cond) {
            $last_id = 0;
            $data['last_id'] = $last_id;

            $data['question'] = $this->exam->chapter_quiz_question_get($this->session->userdata('exam_id'), $last_id);
            //$this->session->set_userdata('question_type', $data['question']->type);
            //$data['question_answers'] = json_decode(file_get_contents(api_url().'institute_student/chapter_quiz_answer/id/'.$data['question']->id.'/format/json'));

            $this->session->set_userdata('correct_answer', $data['question']->correctanswer);

            $data['includePage'] = 'caretutor_opensity_quiz_question';
            //$data['directory'] = 'stdnt_courses';
            $data['title'] = 'CareTutor | Quiz';
            $data['time'] = $this->exam->get_remaining_time($this->session->userdata('id'), $this->session->userdata('exam_id'));
            $this->load->view('panel', $data);

            //$this->load->view('quiz_question', $data);
        } else {
            $data['includePage'] = 'caretutor_opensity_quiz_error';
            //$data['directory'] = 'stdnt_courses';
            $data['title'] = 'CareTutor | Quiz';
            $data['message'] = 'You have appeared this exam before or reloaded your browser, which is not allowed. Please try again later.';

            $this->load->view('panel', $data);
        }
    }

    function load_next_quiz_question() {

        $this->load->model('category_model');
        $this->load->model('institute_model');
        $this->load->model('tution_info_model');

        $this->load->model('exam_model', 'exam');
        $this->load->model('request_verify_model', 'verify');
        $this->load->model('user_model');

        $check_data = $this->user_model->get_user();
        $step = $check_data->step_no;

        $t_info = $this->tution_info_model->get_tution_info();
        $user_info = $this->user_model->get_user($this->session->userdata('id'));
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



            $location_info = $this->tution_info_model->get_tution_location_info();
        } else {

            $t_info = $cat_ids = $location_info = $cateories_class[1] = $classes_sub[1] = '';
        }

        $credential_info_count = $this->tution_info_model->credential_info_count();
        $data = array(
            //'city' => $this->city_location_model->get_city(),
            //'category' => $this->category_model->get_category(),
            //'selected_cats' => $cat_ids,
            'cateories_class' => $cateories_class[1],
            //'selected_catagory' => $cateories_class[0],
            //'selected_cls' => $class_ids,
            'classes_sub' => $classes_sub[1],
            //'selected_subs' => $sub_ids,
            //'selected_locs' => $loc_ids,
            //'cities_location' => $cities_location,
            //'aval_days' => $available_days,
            //'tutoring_styles' => $tutoring_styles,
            'tution_info' => $t_info,
            'edu_infos' => $this->tution_info_model->get_tutor_all_edu_info(),
            'personal_info' => $this->tution_info_model->get_personal_info(),
            'profile_pic_info' => $this->tution_info_model->get_profile_pic_info(),
            //'institutes'      => $this->tution_info_model->get_institutes(),
            //'groups' => $this->sdg_model->get_groups(),
            'user_data' => $user_info,
            'step' => $step,
            'location_info' => $location_info,
            //'credential_info' => $credential_info,
            'credential_info_count' => $credential_info_count,
            'email_count' => $this->data['email_count'],
            'emails' => $this->data['emails'],
            'notification_count' => $this->data['notification_count'],
            'notifications' => $this->data['notifications'],
            'user_verification' => $user_verify,
            'exam_result' => $this->exam->get_exam_result($this->session->userdata('id')),
        );
        if ($this->input->post('answer') == $this->session->userdata('correct_answer')) {
            $achieved_point = $this->input->post('que_point');
        } else {
            $achieved_point = 0;
        }

        $this->load->model('exam_model', 'exam');

        $input_data = array(
            'userid' => $this->session->userdata('id'),
            'examid' => $this->session->userdata('exam_id'),
            'correctlyanswered' => $achieved_point,
            'status' => 'inprogress'
        );

        $this->exam->quiz_result_post($input_data);

        $last_id = $this->input->post('question_id');
        $data['last_id'] = $last_id;

        $data['question'] = $this->exam->chapter_quiz_question_get($this->session->userdata('exam_id'), $last_id);

        $time = $this->exam->get_remaining_time($this->session->userdata('id'), $this->session->userdata('exam_id'));

        if ($data['question']->total_ques && $time >= 0) {

            if (!$this->session->userdata('ques_no')) {
                $ques_no = 1;
                $this->session->set_userdata('ques_no', $ques_no);
            } else {
                $ques_no = ($this->session->userdata('ques_no') + 1);
                $this->session->unset_userdata('ques_no');
                $this->session->set_userdata('ques_no', $ques_no);
            }

            $data['question'] = $this->exam->chapter_quiz_question_get($this->session->userdata('exam_id'), $last_id);

            $this->session->set_userdata('correct_answer', $data['question']->correctanswer);

            $data['includePage'] = 'caretutor_opensity_quiz_question';
            //$data['directory'] = 'stdnt_courses';
            $data['title'] = 'CareTutor | Quiz';
            $data['time'] = $this->exam->get_remaining_time($this->session->userdata('id'), $this->session->userdata('exam_id'));
            $this->load->view('panel', $data);
        } else {
            $calculate_data = array(
                'userid' => $this->session->userdata('id'),
                'examid' => $this->session->userdata('exam_id'),
                'status' => 'completed'
            );

            $data['exam_info'] = $this->exam->quiz_completed($calculate_data);
            $data['user_exam_info'] = $this->exam->user_exam_result($calculate_data);

            $result = ($data['user_exam_info']->correctlyanswered > $data['exam_info']->passmark) ? "passed" : "failed";
            $this->exam->put_result($this->session->userdata('id'), $result, $this->session->userdata('exam_id'));


            $data['includePage'] = 'caretutor_finish_quiz';
            //$data['directory'] = 'stdnt_courses';
            $data['title'] = 'CareTutor | Quiz';

            $this->load->view('panel', $data);
        }
    }

// For all questions at once
    function load_all_quiz_question() {

        $this->load->model('category_model');
        $this->load->model('institute_model');
        $this->load->model('tution_info_model');

        $this->load->model('exam_model', 'exam');
        $this->load->model('request_verify_model', 'verify');
        $this->load->model('user_model');

        $check_data = $this->user_model->get_user();
        $step = $check_data->step_no;

        $t_info = $this->tution_info_model->get_tution_info();
        $user_info = $this->user_model->get_user($this->session->userdata('id'));
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

            $location_info = $this->tution_info_model->get_tution_location_info();
        } else {

            $t_info = $cat_ids = $location_info = $cateories_class[1] = $classes_sub[1] = '';
        }

        $credential_info_count = $this->tution_info_model->credential_info_count();
        $data = array(
            'cateories_class' => $cateories_class[1],
            'classes_sub' => $classes_sub[1],
            'tution_info' => $t_info,
            'edu_infos' => $this->tution_info_model->get_tutor_all_edu_info(),
            'personal_info' => $this->tution_info_model->get_personal_info(),
            'profile_pic_info' => $this->tution_info_model->get_profile_pic_info(),
            'user_data' => $user_info,
            'step' => $step,
            'location_info' => $location_info,
            //'credential_info' => $credential_info,
            'credential_info_count' => $credential_info_count,
            'email_count' => $this->data['email_count'],
            'emails' => $this->data['emails'],
            'notification_count' => $this->data['notification_count'],
            'notifications' => $this->data['notifications'],
            'user_verification' => $user_verify,
            'exam_result' => $this->exam->get_exam_result($this->session->userdata('id')),
        );

        // Get Exam ID
        $this->load->model('exam_model', 'exam');
        // $dataexam_id = $data['exams_data'] = $this->exam->chapter_quiz_info_get();
        $dataexam_id = $data['exams_data'] = $this->exam->get_rendom_quiz();
        if (empty($dataexam_id)) {
            $data['includePage'] = 'caretutor_opensity_quiz_error';
            $data['title'] = 'CareTutor | Quiz';
            $data['message'] = 'You have appeared all exams and failed.';

            $this->load->view('panel', $data);
        } else {
            $exam_id = $dataexam_id->examid;

            $this->session->set_userdata(array('exam_id' => $exam_id));

            $input_data = array(
                'userid' => $this->session->userdata('id'),
                'examid' => $this->session->userdata('exam_id')
            );

            // Save default data to db
            $api_response = $this->exam->quiz_result_put($input_data);
            $exam_data = $this->exam->user_failed_exam_result($input_data);

            $data['all_questions'] = $this->exam->get_all_quiz_question($this->session->userdata('exam_id'));

            $passed_exam = find('ct_userexam', '*', ['userid' => $this->session->userdata('id'), 'result' => 'passed']);
            if (!empty($passed_exam)) {
                $data['includePage'] = 'caretutor_opensity_quiz_error';
                $data['title'] = 'CareTutor | Quiz';
                $data['message'] = 'You have appeared this exam before.';

                $this->load->view('panel', $data);
            } else {
                $failed_exam = find('ct_userexam', '*', ['userid' => $this->session->userdata('id'), 'result' => 'failed']);
                if (!empty($failed_exam)) {
                    // dd($failed_exam);
                    $data['includePage'] = 'caretutor_opensity_quiz_error';
                    $data['title'] = 'CareTutor | Quiz';
                    $data['message'] = 'You have appeared this exam before and failed the exam.';

                    $this->load->view('panel', $data);
                } else {
                    $data['includePage'] = 'caretutor_opensity_quiz_question_all';
                    $data['title'] = 'CareTutor | Quiz';
                    $this->load->view('panel', $data);
                }
            }
        }


        // if (!empty($exam_data)) {
        //     $date = strtotime($exam_data->endtime);
        //     $date = strtotime("+07 day", $date);
        //     $next_exam_date = date('m-d-Y', $date);
        //     $today_date = date('m-d-Y');
        //     $days_left = (date('d', $date)) - (date('d'));
        //
        //     if ($today_date >= $next_exam_date) {
        //         $data['includePage'] = 'caretutor_opensity_quiz_question_all';
        //         $data['title'] = 'CareTutor | Quiz';
        //         $this->load->view('panel', $data);
        //     } else {
        //         $data['includePage'] = 'caretutor_opensity_quiz_error';
        //         $data['title'] = 'CareTutor | Quiz';
        //         $data['message'] = 'You have appeared this exam before and failed the exam. Please try again later after '. $days_left .' days';
        //
        //         $this->load->view('panel', $data);
        //     }
        // } else {
        //     // Check if appeared quiz before
        //     $cond = (preg_match('/\bDuplicate entry\b/', $api_response)) ? FALSE : TRUE;
        //
        //     //var_dump($cond); exit;
        //     if ($cond) {
        //
        //         // fetch 1 quesion from db
        //         //$data['question'] = $this->exam->chapter_quiz_question_get($this->session->userdata('exam_id'), $last_id);
        //         //load view
        //
        //         $data['includePage'] = 'caretutor_opensity_quiz_question_all';
        //         $data['title'] = 'CareTutor | Quiz';
        //         $this->load->view('panel', $data);
        //     } else {
        //         //load error view
        //         $data['includePage'] = 'caretutor_opensity_quiz_error';
        //         $data['title'] = 'CareTutor | Quiz';
        //         $data['message'] = 'You have appeared this exam before or reloaded your browser, which is not allowed. Please try again later.';
        //
        //         $this->load->view('panel', $data);
        //     }
        // }
    }

    function quiz_completed() {

        $this->load->model('category_model');
        $this->load->model('institute_model');
        $this->load->model('tution_info_model');

        $this->load->model('exam_model', 'exam');
        $this->load->model('request_verify_model', 'verify');
        $this->load->model('user_model');

        $check_data = $this->user_model->get_user();
        $step = $check_data->step_no;

        $t_info = $this->tution_info_model->get_tution_info();
        $user_info = $this->user_model->get_user($this->session->userdata('id'));
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
            $location_info = $this->tution_info_model->get_tution_location_info();
        } else {

            $t_info = $cat_ids = $location_info = $cateories_class[1] = $classes_sub[1] = '';
        }

        $credential_info_count = $this->tution_info_model->credential_info_count();
        $data = array(
            //'city' => $this->city_location_model->get_city(),
            //'category' => $this->category_model->get_category(),
            //'selected_cats' => $cat_ids,
            'cateories_class' => $cateories_class[1],
            //'selected_catagory' => $cateories_class[0],
            //'selected_cls' => $class_ids,
            'classes_sub' => $classes_sub[1],
            //'selected_subs' => $sub_ids,
            //'selected_locs' => $loc_ids,
            //'cities_location' => $cities_location,
            //'aval_days' => $available_days,
            //'tutoring_styles' => $tutoring_styles,
            'tution_info' => $t_info,
            'edu_infos' => $this->tution_info_model->get_tutor_all_edu_info(),
            'personal_info' => $this->tution_info_model->get_personal_info(),
            'profile_pic_info' => $this->tution_info_model->get_profile_pic_info(),
            //'institutes'      => $this->tution_info_model->get_institutes(),
            //'groups' => $this->sdg_model->get_groups(),
            'user_data' => $user_info,
            'step' => $step,
            'location_info' => $location_info,
            //'credential_info' => $credential_info,
            'credential_info_count' => $credential_info_count,
            'email_count' => $this->data['email_count'],
            'emails' => $this->data['emails'],
            'notification_count' => $this->data['notification_count'],
            'notifications' => $this->data['notifications'],
            'user_verification' => $user_verify,
            'exam_result' => $this->exam->get_exam_result($this->session->userdata('id')),
        );

        $achieved_point = $this->input->post('marks');

        $this->load->model('exam_model', 'exam');

        $input_data = array(
            'userid' => $this->session->userdata('id'),
            'examid' => $this->session->userdata('exam_id'),
            'correctlyanswered' => $achieved_point,
            'status' => 'inprogress'
        );

        $this->exam->quiz_result_post($input_data);

        //point calculation
        $calculate_data = array(
            'userid' => $this->session->userdata('id'),
            'examid' => $this->session->userdata('exam_id'),
            'status' => 'completed'
        );

        $data['exam_info'] = $this->exam->quiz_completed($calculate_data);
        $data['user_exam_info'] = $this->exam->user_exam_result($calculate_data);

        $result = ($data['user_exam_info']->correctlyanswered >= $data['exam_info']->passmark) ? "passed" : "failed";
        $this->exam->put_result($this->session->userdata('id'), $result, $this->session->userdata('exam_id'));


        $data['includePage'] = 'caretutor_finish_quiz';
        //$data['directory'] = 'stdnt_courses';
        $data['title'] = 'CareTutor | Quiz';

        $this->load->view('panel', $data);
    }

}
