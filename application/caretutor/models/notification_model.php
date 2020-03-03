<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Notification_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    private function verification_users() {
        $data = $this->db->select('users.id user_id')
                ->from('bo_users users')
                ->join('bo_roles_permissions roles_permissions', 'roles_permissions.role_id = users.role_id', 'left')
                ->join('bo_permissions permissions', 'permissions.id = roles_permissions.permission_id', 'left')
                ->where('users.status', 'active')
                ->where('permissions.name', 'notification_verifications')->get()->result();
        return $data;
    }

    private function payment_users() {
        $data = $this->db->select('users.id user_id')
                ->from('bo_users users')
                ->join('bo_roles_permissions roles_permissions', 'roles_permissions.role_id = users.role_id', 'left')
                ->join('bo_permissions permissions', 'permissions.id = roles_permissions.permission_id', 'left')
                ->where('users.status', 'active')
                ->where('permissions.name', 'notification_payments')->get()->result();
        return $data;
    }

    private function add_job_users() {
        $data = $this->db->select('users.id user_id')
                ->from('bo_users users')
                ->join('bo_roles_permissions roles_permissions', 'roles_permissions.role_id = users.role_id', 'left')
                ->join('bo_permissions permissions', 'permissions.id = roles_permissions.permission_id', 'left')
                ->where('users.status', 'active')
                ->where('permissions.name', 'notification_add_job')->get()->result();
        return $data;
    }

    private function tutor_info($tutor_id) {
        return $this->db->select('users.id tutor_id, users.full_name tutor_name, personal.gender tutor_gender, profile_pic.profile_pic, users.is_verified')
                ->from('ct_user users')
                ->join('ct_tutor_per_info personal', 'personal.user_id = users.id', 'left')
                ->join('ct_tutor_profile_pic profile_pic', 'profile_pic.tutor_id = users.id', 'left')
                ->where('users.id', $tutor_id)->get()->row();
    }

    private function guardian_info($guardian_id) {
        return $this->db->select('users.id guardian_id, users.full_name guardian_name')
                ->from('ct_user users')
                ->where('users.id', $guardian_id)->get()->row();
    }

    public function verification_request_notification($tutor_id, $data_id) {
        $this->db->dbprefix = '';
        $users      = $this->verification_users();
        $tutorInfo  = $this->tutor_info($tutor_id);

        if (empty($users)) {
            return false;
        }

        $arr = [];
        foreach ($users as $v) {
            $gender = $tutorInfo->tutor_gender == 'Male' ? 'his' : 'her';
            $icon = $tutorInfo->profile_pic != '' ? 'https://caretutors.com/assets/upload/' . $tutorInfo->profile_pic : NULL;
            array_push($arr, [
                'receiver_id' => $v->user_id,
                'data_id' => $tutor_id,
                'extra_id' => $data_id,
                'title' => 'Verification Request',
                'notification' => $tutorInfo->tutor_name . ' (ID: ' . $tutor_id . ') has requested to verify ' . $gender . ' profile.',
                'icon' => $icon,
                'link' => 'https://back-office.caretutors.com/crm/clients/tutor-profile/' . $tutor_id,
                'push_date' => date('Y-m-d'),
                'created_at' => date('Y-m-d H:i:s')
            ]);
        }

        $this->db->insert_batch('bo_notifications', $arr);
        $this->db->dbprefix = 'ct_';
        return true;
    }

    public function verification_enable_edit_notification($tutor_id, $data_id) {
        $this->db->dbprefix = '';
        $users      = $this->verification_users();
        $tutorInfo  = $this->tutor_info($tutor_id);

        if (empty($users)) {
            return false;
        }

        $arr = [];
        foreach ($users as $v) {
            $gender = $tutorInfo->tutor_gender == 'Male' ? 'his' : 'her';
            $icon = $tutorInfo->profile_pic != '' ? 'https://caretutors.com/assets/upload/' . $tutorInfo->profile_pic : NULL;
            array_push($arr, [
                'receiver_id' => $v->user_id,
                'data_id' => $tutor_id,
                'extra_id' => $data_id,
                'title' => 'Enable Edit Request',
                'notification' => $tutorInfo->tutor_name . ' (ID: ' . $tutor_id . ') has requested to update ' . $gender . ' profile.',
                'icon' => $icon,
                'link' => 'https://back-office.caretutors.com/crm/clients/tutor-profile/' . $tutor_id,
                'push_date' => date('Y-m-d'),
                'created_at' => date('Y-m-d H:i:s')
            ]);
        }

        $this->db->insert_batch('bo_notifications', $arr);
        $this->db->dbprefix = 'ct_';
        return true;
    }

    public function verification_address_verify_notification($tutor_id, $data_id) {
        $this->db->dbprefix = '';
        $users      = $this->verification_users();
        $tutorInfo  = $this->tutor_info($tutor_id);

        if (empty($users)) {
            return false;
        }

        $arr = [];
        foreach ($users as $v) {
            $gender = $tutorInfo->tutor_gender == 'Male' ? 'his' : 'her';
            $icon = $tutorInfo->profile_pic != '' ? 'https://caretutors.com/assets/upload/' . $tutorInfo->profile_pic : NULL;
            array_push($arr, [
                'receiver_id' => $v->user_id,
                'data_id' => $tutor_id,
                'extra_id' => $data_id,
                'title' => 'Address Verified',
                'notification' => $tutorInfo->tutor_name . ' (ID: ' . $tutor_id . ') has recieved address verification letter and verified ' . $gender . ' address.',
                'icon' => $icon,
                'link' => 'https://back-office.caretutors.com/crm/clients/tutor-profile/' . $tutor_id,
                'push_date' => date('Y-m-d'),
                'created_at' => date('Y-m-d H:i:s')
            ]);
        }

        $this->db->insert_batch('bo_notifications', $arr);
        $this->db->dbprefix = 'ct_';
        return true;
    }

    public function verification_profile_update_notification($tutor_id, $data_id, $section) {
        $this->db->dbprefix = '';
        $users      = $this->verification_users();
        $tutorInfo  = $this->tutor_info($tutor_id);

        if (empty($users)) {
            return false;
        }

        $verificationInfo = $this->db->select("*")->from('ct_tutor_verification')->where('user_id', $tutor_id)->get()->row();
        if (!empty($verificationInfo) && $verificationInfo->status > 1) {
            $arr = [];
            foreach ($users as $v) {
                $gender = $tutorInfo->tutor_gender == 'Male' ? 'his' : 'her';
                $icon = $tutorInfo->profile_pic != '' ? 'https://caretutors.com/assets/upload/' . $tutorInfo->profile_pic : NULL;
                array_push($arr, [
                    'receiver_id' => $v->user_id,
                    'data_id' => $tutor_id,
                    'extra_id' => $data_id,
                    'title' => 'Profile Updated',
                    'notification' => $tutorInfo->tutor_name . ' (ID: ' . $tutor_id . ') updated ' . $gender . ' ' . $section . '.',
                    'icon' => $icon,
                    'link' => 'https://back-office.caretutors.com/crm/clients/tutor-profile/' . $tutor_id,
                    'push_date' => date('Y-m-d'),
                    'created_at' => date('Y-m-d H:i:s')
                ]);
            }

            $this->db->insert_batch('bo_notifications', $arr);
        }

        $this->db->dbprefix = 'ct_';
        return true;
    }

    public function payment_success_notification($tutor_id, $invoice_id, $invoice_type, $platform) {
        $this->db->dbprefix = '';
        $users      = $this->payment_users();
        $tutorInfo  = $this->tutor_info($tutor_id);

        if (empty($users)) {
            return false;
        }

        $arr = [];
        foreach ($users as $v) {
            $gender = $tutorInfo->tutor_gender == 'Male' ? 'his' : 'her';
            $icon = $tutorInfo->profile_pic != '' ? 'https://caretutors.com/assets/upload/' . $tutorInfo->profile_pic : NULL;
            array_push($arr, [
                'receiver_id' => $v->user_id,
                'data_id' => $invoice_id,
                'extra_id' => $tutor_id,
                'title' => 'Amount Paid',
                'notification' => $tutorInfo->tutor_name . ' (ID: ' . $tutor_id . ') paid ' . $gender . ' ' . $invoice_type . ' from ' . $platform . '.',
                'icon' => $icon,
                'link' => 'https://back-office.caretutors.com/crm/clients/tutor-profile/' . $tutor_id,
                'push_date' => date('Y-m-d'),
                'created_at' => date('Y-m-d H:i:s')
            ]);
        }

        $this->db->insert_batch('bo_notifications', $arr);
        $this->db->dbprefix = 'ct_';
        return true;
    }

    public function payment_failed_notification($tutor_id, $invoice_id, $invoice_type, $platform) {
        $this->db->dbprefix = '';
        $users      = $this->payment_users();
        $tutorInfo  = $this->tutor_info($tutor_id);

        if (empty($users)) {
            return false;
        }

        $arr = [];
        foreach ($users as $v) {
            $gender = $tutorInfo->tutor_gender == 'Male' ? 'his' : 'her';
            $icon = $tutorInfo->profile_pic != '' ? 'https://caretutors.com/assets/upload/' . $tutorInfo->profile_pic : NULL;
            array_push($arr, [
                'receiver_id' => $v->user_id,
                'data_id' => $invoice_id,
                'extra_id' => $tutor_id,
                'title' => 'Payment Failed',
                'notification' => $tutorInfo->tutor_name . ' (ID: ' . $tutor_id . ') failed to pay ' . $gender . ' ' . $invoice_type . ' from ' . $platform . '.',
                'icon' => $icon,
                'link' => 'https://back-office.caretutors.com/crm/clients/tutor-profile/' . $tutor_id,
                'push_date' => date('Y-m-d'),
                'created_at' => date('Y-m-d H:i:s')
            ]);
        }

        $this->db->insert_batch('bo_notifications', $arr);
        $this->db->dbprefix = 'ct_';
        return true;
    }

    public function payment_registered_notification($tutor_id, $invoice_id, $invoice_type, $platform) {
        $this->db->dbprefix = '';
        $users      = $this->payment_users();
        $tutorInfo  = $this->tutor_info($tutor_id);

        if (empty($users)) {
            return false;
        }

        $arr = [];
        foreach ($users as $v) {
            $gender = $tutorInfo->tutor_gender == 'Male' ? 'his' : 'her';
            $icon = $tutorInfo->profile_pic != '' ? 'https://caretutors.com/assets/upload/' . $tutorInfo->profile_pic : NULL;
            array_push($arr, [
                'receiver_id' => $v->user_id,
                'data_id' => $invoice_id,
                'extra_id' => $tutor_id,
                'title' => 'Payment Registered',
                'notification' => $tutorInfo->tutor_name . ' (ID: ' . $tutor_id . ') registered to pay ' . $gender . ' ' . $invoice_type . ' from ' . $platform . '.',
                'icon' => $icon,
                'link' => 'https://back-office.caretutors.com/crm/clients/tutor-profile/' . $tutor_id,
                'push_date' => date('Y-m-d'),
                'created_at' => date('Y-m-d H:i:s')
            ]);
        }

        $this->db->insert_batch('bo_notifications', $arr);
        $this->db->dbprefix = 'ct_';
        return true;
    }

    public function payment_cancelled_notification($tutor_id, $invoice_id, $invoice_type, $platform) {
        $this->db->dbprefix = '';
        $users      = $this->payment_users();
        $tutorInfo  = $this->tutor_info($tutor_id);

        if (empty($users)) {
            return false;
        }

        $arr = [];
        foreach ($users as $v) {
            $gender = $tutorInfo->tutor_gender == 'Male' ? 'his' : 'her';
            $icon = $tutorInfo->profile_pic != '' ? 'https://caretutors.com/assets/upload/' . $tutorInfo->profile_pic : NULL;
            array_push($arr, [
                'receiver_id' => $v->user_id,
                'data_id' => $invoice_id,
                'extra_id' => $tutor_id,
                'title' => 'Payment Cancelled',
                'notification' => $tutorInfo->tutor_name . ' (ID: ' . $tutor_id . ') cancelled ' . $gender . ' ' . $invoice_type . ' from ' . $platform . '.',
                'icon' => $icon,
                'link' => 'https://back-office.caretutors.com/crm/clients/tutor-profile/' . $tutor_id,
                'push_date' => date('Y-m-d'),
                'created_at' => date('Y-m-d H:i:s')
            ]);
        }

        $this->db->insert_batch('bo_notifications', $arr);
        $this->db->dbprefix = 'ct_';
        return true;
    }

    public function job_post_notification($job_id, $guardian_id, $platform) {
        $this->db->dbprefix = '';
        $users          = $this->add_job_users();
        $guardianInfo   = $this->guardian_info($guardian_id);

        if (empty($users)) {
            return false;
        }

        $arr = [];
        foreach ($users as $v) {
            array_push($arr, [
                'receiver_id' => $v->user_id,
                'data_id' => $job_id,
                'extra_id' => $guardian_id,
                'title' => 'Pending Job',
                'notification' => $guardianInfo->guardian_name . "'s tuition requirments (Job ID: " . $job_id . ") has been posted to pending jobs from ". $platform . ".",
                'icon' => NULL,
                'link' => 'https://back-office.caretutors.com/crm/workspace/job/view-job/' . $job_id,
                'push_date' => date('Y-m-d'),
                'created_at' => date('Y-m-d H:i:s')
            ]);
        }

        $this->db->insert_batch('bo_notifications', $arr);
        $this->db->dbprefix = 'ct_';
        return true;
    }

    public function job_update_notification($job_id, $guardian_id, $platform) {
        $this->db->dbprefix = '';
        $users          = $this->add_job_users();
        $guardianInfo   = $this->guardian_info($guardian_id);

        if (empty($users)) {
            return false;
        }

        $arr = [];
        foreach ($users as $v) {
            array_push($arr, [
                'receiver_id' => $v->user_id,
                'data_id' => $job_id,
                'extra_id' => $guardian_id,
                'title' => 'Pending Job',
                'notification' => $guardianInfo->guardian_name . " has updated his/her tuition requirments (Job ID: " . $job_id . ") from ". $platform . ".",
                'icon' => NULL,
                'link' => 'https://back-office.caretutors.com/crm/workspace/job/view-job/' . $job_id,
                'push_date' => date('Y-m-d'),
                'created_at' => date('Y-m-d H:i:s')
            ]);
        }

        $this->db->insert_batch('bo_notifications', $arr);
        $this->db->dbprefix = 'ct_';
        return true;
    }

}
