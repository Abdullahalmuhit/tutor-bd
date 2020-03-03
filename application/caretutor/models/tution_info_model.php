<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tution_info_model extends CI_Model {

    public function get_tution_info($id = 0) {
        $table_name = $this->db->dbprefix('tution_info');
        if ($id == 0) {
            $query = $this->db->get_where($table_name, array('user_id' => $this->session->userdata('id')));
        } else {
            $query = $this->db->get_where($table_name, array('user_id' => $id));
        }
        return $query->result_array();
    }

    public function get_tution_location_info($id = 0) {
        $table_name = $this->db->dbprefix('tution_info ti');
        if ($id == 0) {
            $this->db->select('c.city as city, l.location as location, GROUP_CONCAT(pl.location) as pref_locs')
                    ->from($table_name)
                    ->join('ct_city c', 'ti.city_id = c.id')
                    ->join('ct_location l', 'ti.your_location_id = l.id', 'LEFT')
                    ->join('ct_location pl', 'FIND_IN_SET(pl.id , ti.pref_locations)')
                    ->where('ti.user_id', $this->session->userdata('id'));

            $return = $this->db->get();
        } else {
            $this->db->select('c.city as city, l.location as location, GROUP_CONCAT(pl.location) as pref_locs')
                    ->from($table_name)
                    ->join('ct_city c', 'ti.city_id = c.id')
                    ->join('ct_location l', 'ti.your_location_id = l.id', 'LEFT')
                    ->join('ct_location pl', 'FIND_IN_SET(pl.id , ti.pref_locations)')
                    ->where('ti.user_id', $id);

            $return = $this->db->get();
        }
        return $return;
    }

    public function update_tution_info() {
        $subjects = implode(',', $this->input->post('sdg'));
        $category = implode(',', $this->input->post('category'));
        $locs = '';
        $pref_tut_style = '';
        $place_of_tut = '';
        if ($this->input->post('loc')) {
            $locs = implode(',', $this->input->post('loc'));
        }

        if ($this->input->post('pts')) {
            $pref_tut_style = implode(',', $this->input->post('pts'));
        }

        if ($this->input->post('pt')) {
            $place_of_tut = implode(',', $this->input->post('pt'));
        }

        $table_name = $this->db->dbprefix('tution_info');

        $tution_info = array(
            'user_id' => $this->session->userdata('id'),
            'expected_fees' => $this->input->post('expected_fees'),
            'days_per_week' => $this->input->post('days_per_week'),
            'pref_medium' => $category,
            'pref_class' => $this->input->post('pref_class'),
            'pref_subjects' => $subjects,
            'diff_score' => $this->input->post('diff_score'),
            'pref_tut_style' => $pref_tut_style,
            'place_of_tut' => $place_of_tut,
            'experiences' => $this->input->post('experiences'),
            'method' => $this->input->post('method')
        );

        if ($locs != '') {
            $tution_info['pref_locations'] = $locs;
        }

        $query = $this->db->get_where($table_name, array('user_id' => $this->session->userdata('id')));
        if ($query->num_rows() > 0) {
            $this->db->where('user_id', $this->session->userdata('id'));
            $this->db->update($table_name, $tution_info);
            if ($this->db->affected_rows()) {
                return TRUE;
            } else {
                return FALSE;
            }
        } else {
            $this->db->insert($table_name, $tution_info);
            if ($this->db->insert_id()) {
                return TRUE;
            } else {
                return FALSE;
            }
        }
    }

    public function select_tutor_from_resume_list($tutor_id, $job_id) {
        $sql1 = "UPDATE ct_job_tutor SET status = 'Selected' WHERE tutor_id = " . $tutor_id . " AND job_id = " . $job_id;
        $sql2 = "UPDATE ct_resume_permission SET status = 'completed' WHERE tutor_id = " . $tutor_id . " AND job_id = " . $job_id;
        $query1 = $this->db->query($sql1);
        $query2 = $this->db->query($sql2);
        if ($this->db->affected_rows()) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function get_tutor_applied_jobs() {
        $table_name = $this->db->dbprefix('job_tutor');
        $this->db->select('job_id');
        $this->db->where('tutor_id', $this->session->userdata('id'));
        // $this->db->where('status', 'Applied');
        return $this->db->get($table_name)->result_array();
    }

    public function add_tutor_educational_info($data, $education_info_id) {

        $table_name = $this->db->dbprefix('tutor_edu_info');
        if ($education_info_id == '0') {
            if ($data['current_institute'] == '1') {
                /* $edu_info = $this->db->select('*')
                  ->from('ct_tutor_edu_info')
                  ->where('user_id', $this->session->userdata('id'))
                  ->get()->result_array(); */
                $ins_data = array(
                    'current_institute' => '0'
                );
                $this->db->where('user_id', $this->session->userdata('id'));
                $this->db->update($table_name, $ins_data);

                $return = $this->db->insert($table_name, $data);
                $insert_id = $this->db->insert_id();
            } else {
                $edu_info = $this->db->select('*')
                                ->from('ct_tutor_edu_info')
                                ->where('user_id', $this->session->userdata('id'))
                                ->get()->result_array();
                $has_current_ins = 0;
                if (!empty($edu_info)) {
                    foreach ($edu_info as $edu) {
                        if ($edu['current_institute'] == '1') {
                            $has_current_ins = 1;
                        }
                    }
                } else {

                }

                if ($has_current_ins == 0) {
                    $data_cur_ins = array(
                        'current_institute' => '1'
                    );
                } else if ($has_current_ins == 1) {
                    $data_cur_ins = array(
                        'current_institute' => '0'
                    );
                }

                $return = $this->db->insert($table_name, $data);
                $insert_id = $this->db->insert_id();
                log_message('ERROR', 'Education info add' . $this->db->last_query());
                $this->db->where('id', $insert_id);
                $this->db->update($table_name, $data_cur_ins);
            }

            $step_data = array(
                'step_no' => '2'
            );
            $this->db->where('id', $this->session->userdata('id'))->update('ct_user', $step_data);
        } else {
            $this->db->where('id', $education_info_id);
            $return = $this->db->update($table_name, $data);
            log_message('ERROR', 'Education info edit' . $this->db->last_query());
        }
        return $return;
    }

    public function get_tutor_all_edu_info($id = 0) {
        $table_name = $this->db->dbprefix('tutor_edu_info');
        if ($id == 0) {
            return $this->db->select('ct_tutor_edu_info.*, ct_sdg.sdg, ct_institute.institute')->join('ct_sdg', 'ct_tutor_edu_info.group_id = ct_sdg.id', 'left')
                            ->join('ct_institute', 'ct_tutor_edu_info.institute_id = ct_institute.id', 'left')
                            ->where('user_id', $this->session->userdata('id'))
                            ->order_by('ct_tutor_edu_info.year_of_passing DESC')
                            ->get($table_name)->result_array();
        } else {
            return $this->db->select('ct_tutor_edu_info.*, ct_sdg.sdg, ct_institute.institute')->join('ct_sdg', 'ct_tutor_edu_info.group_id = ct_sdg.id', 'left')
                            ->join('ct_institute', 'ct_tutor_edu_info.institute_id = ct_institute.id', 'left')
                            ->where('user_id', $id)
                            ->order_by('ct_tutor_edu_info.year_of_passing DESC')
                            ->get($table_name)->result_array();

        }
    }

    public function add_tutor_tution_info($data, $tution_info_id) {
        $table_name = $this->db->dbprefix('tution_info');
        if ($tution_info_id == '0') {
            $this->db->insert($table_name, $data);
            $return = $this->db->insert_id();
            $step_data = array(
                'step_no' => '1'
            );
            $this->db->where('id', $this->session->userdata('id'))->update('ct_user', $step_data);
        } else {
            $this->db->where('id', $tution_info_id);
            $this->db->update($table_name, $data);
            $return = $tution_info_id;
        }
        return $return;
    }

    public function get_personal_info($id = 0) {
        // dd('asdfasdf');
        // $table_name = $this->db->dbprefix('tutor_per_info');
        if ($id == 0) {
            $query = $this->db->select('personal.*, country.country nationality_name')
                    ->from('ct_tutor_per_info personal')
                    ->join('ct_country country', 'country.id = personal.nationality', 'left')
                    ->where(array('personal.user_id' => $this->session->userdata('id')))
                    ->get()->result_array();
        } else {
            $query = $this->db->select('personal.*, country.country nationality_name')
                    ->from('ct_tutor_per_info personal')
                    ->join('ct_country country', 'country.id = personal.nationality', 'left')
                    ->where(array('personal.user_id' => $id))
                    ->get()->result_array();
        }
        return $query;
    }

    public function get_applied_job_info() {
        $table_name = $this->db->dbprefix('job_tutor jt');
        $this->db->select("jt.job_id, jt.tutor_id, jt.created_at, jt.updated_at as applied_time, jt.status apply_status,tr.*, c.city as city, tr.updated_at as upd, l.location as location, tc.category as category,tc2.category as sub_cat",FALSE);
        $this->db->from($table_name);
        $this->db->join('tutor_requirements tr', 'tr.id = jt.job_id', 'LEFT');
        $this->db->join('ct_city c', 'tr.city_id = c.id');
        $this->db->join('ct_location l', 'tr.location_id = l.id');
        $this->db->join('ct_tution_category tc', 'tr.tution_category_id = tc.id');
        $this->db->join('ct_tution_category tc2', 'tr.tution_sub_cat_id = tc2.id');
        $this->db->join('ct_tution_category s', 'FIND_IN_SET(s.id , tr.subjects)');
        $this->db->join('ct_user u', 'tr.user_id = u.id');
        $this->db->where('jt.tutor_id', $this->session->userdata('id'));
        $this->db->where('jt.status !=', 'Assign');
        // $this->db->group_by('tr.id');
        $this->db->order_by('tr.updated_at', 'DESC');
        $result = $this->db->get();

        if($result == 1) {
            $results = $result->result();
            return  $results;
         }
         else{  
              return false;
         }


        //previous code
        
        // $this->db->select("jt.job_id, jt.tutor_id, jt.created_at, jt.updated_at as applied_time, jt.status apply_status, u.id as parent_id, u.mobile_no, u.full_name, tr.*, c.city as city, "
        //         . "DATE_FORMAT(tr.updated_at, '%b %e, %Y') as upd, l.location as location, tc.category as category, "
        //         . "tc2.category as sub_cat, "
        //         . "GROUP_CONCAT(s.category) as subs", FALSE);
        // $this->db->from($table_name);
        // $this->db->join('tutor_requirements tr', 'tr.id = jt.job_id', 'LEFT');
        // $this->db->join('ct_city c', 'tr.city_id = c.id');
        // $this->db->join('ct_location l', 'tr.location_id = l.id');
        // $this->db->join('ct_tution_category tc', 'tr.tution_category_id = tc.id');
        // $this->db->join('ct_tution_category tc2', 'tr.tution_sub_cat_id = tc2.id');
        // $this->db->join('ct_tution_category s', 'FIND_IN_SET(s.id , tr.subjects)');
        // $this->db->join('ct_user u', 'tr.user_id = u.id');
        // $this->db->where('jt.tutor_id', $this->session->userdata('id'));
        // $this->db->where('jt.status !=', 'Assign');
        // $this->db->group_by("tr.id");

        // $this->db->order_by('tr.updated_at', 'DESC');
        // $result = $this->db->get();

        // if($result == 1) {
        //     $results = $result->result();
        //     return  $results;
        //  }
        //  else{
            
        //       return false;
        //  }
    }

    public function get_job_list() {
        //, DATE_FORMAT(tr.updated_at, '%b %e, %Y') as upd, l.location as location, tc.category as category, tc2.category as sub_cat, GROUP_CONCAT(s.category) as subs

        $sql = "SELECT T1.status as tutor_status, T1.started_at, T1.points, `u`.`full_name` as client_name, `u`.`mobile_no` as client_mobile, `u`.`email` as client_email, `tutor`.id as tutor_id, `tutor`.`full_name` as tutor_name, `tutor`.`mobile_no` as tutor_mobile, `tr`.* , c.city as city, DATE_FORMAT(tr.updated_at, '%b %e, %Y') as upd, l.location as location, tc.category as category, tc2.category as sub_cat, GROUP_CONCAT(s.category) as subs
				FROM (`ct_tutor_requirements` tr)
				JOIN `ct_user` u ON `tr`.`user_id` = `u`.`id`
				LEFT JOIN (
						SELECT  `ct_job_tutor`.*
						FROM ct_job_tutor
						WHERE `ct_job_tutor`.`status` = 'Assign' OR `ct_job_tutor`.`status` = 'Selected'
					) AS T1 ON T1.`job_id` =  `tr`.`id`
				LEFT JOIN `ct_user` tutor ON `T1`.`tutor_id` = `tutor`.`id`
				LEFT JOIN `ct_city` c ON `tr`.`city_id` = `c`.`id`
				LEFT JOIN `ct_location` l ON `tr`.`location_id` = `l`.`id`
				LEFT JOIN `ct_tution_category` tc ON `tr`.`tution_category_id` = `tc`.`id`
				LEFT JOIN `ct_tution_category` tc2 ON `tr`.`tution_sub_cat_id` = `tc2`.`id`
				LEFT JOIN `ct_tution_category` s ON `FIND_IN_SET`(`s`.`id` , tr.subjects)
				WHERE tr.status = 'complete'  OR tr.status = 'done' OR tr.status = 'asses'
				GROUP BY `tr`.`id`
				ORDER BY `tr`.`updated_at` DESC";

        $query = $this->db->query($sql);
        return $query->result();
    }

    public function get_assigned_job_info() {
        $table_name = $this->db->dbprefix('job_tutor jt');

        $this->db->select("jt.job_id, jt.tutor_id, jt.updated_at, u.full_name, tr.*, c.city as city, DATE_FORMAT(tr.updated_at, '%b %e, %Y') as upd, l.location as location, tc.category as category, tc2.category as sub_cat, GROUP_CONCAT(s.category) as subs", FALSE);
        $this->db->from($table_name);
        $this->db->join('tutor_requirements tr', 'tr.id = jt.job_id', 'LEFT');
        $this->db->join('ct_city c', 'tr.city_id = c.id');
        $this->db->join('ct_location l', 'tr.location_id = l.id');
        $this->db->join('ct_tution_category tc', 'tr.tution_category_id = tc.id');
        $this->db->join('ct_tution_category tc2', 'tr.tution_sub_cat_id = tc2.id');
        $this->db->join('ct_tution_category s', 'FIND_IN_SET(s.id , tr.subjects)');
        $this->db->join('ct_user u', 'tr.user_id = u.id');
        $this->db->where('jt.tutor_id', $this->session->userdata('id'));
        $this->db->where('jt.status', 'Assign');
        $this->db->group_by("tr.id");

        $this->db->order_by('tr.updated_at', 'DESC');
        return $this->db->get()->result();
    }

    public function upload_credential_info($data) {
        $table_name = $this->db->dbprefix('credential_info');
        $return = $this->db->insert($table_name, $data);
        return $this->db->insert_id();
    }

    public function credential_info_count() {
        $table_name = $this->db->dbprefix('credential_info');
        $this->db->where('user_id', $this->session->userdata('id'));
        $this->db->order_by('id', 'DESC');
        $this->db->limit("4");
        return $this->db->get($table_name)->num_rows();
    }

    public function get_credential_info() {
        $table_name = $this->db->dbprefix('credential_info');
        $this->db->where('user_id', $this->session->userdata('id'));
        $this->db->order_by('id', 'DESC');
        $this->db->limit("4");
        return $this->db->get($table_name)->result_array();
    }

    public function delete_credential($id) {
        $table_name = $this->db->dbprefix('credential_info');
        $this->db->where('id', $id);
        $cred = $this->db->get($table_name)->row_array();

        unlink('/mnt/volume_sgp1_02/upload/credential/' . $cred['file_name']);
        $this->db->where('id', $id)->delete($table_name);
    }

    public function delete_tutor_educational_info($id) {
        $table_name = $this->db->dbprefix('tutor_edu_info');

        $this->db->where('id', $id);
        $this->db->delete($table_name);
    }

    public function update_cv($data, $tutor_id, $job_id) {
        $table_name = $this->db->dbprefix('resume_permission');
        $this->db->where('job_id', $job_id);
        $this->db->where('tutor_id', $tutor_id);
        $this->db->update($table_name, $data);
        return true;
    }

    public function get_profile_pic_info($id = 0) {
        if ($id == 0) {
            return $this->db->select('*')->where('tutor_id', $this->session->userdata('id'))->get('ct_tutor_profile_pic')->row_array();
        } else {
            return $this->db->select('*')->where('tutor_id', $id)->get('ct_tutor_profile_pic')->row_array();
        }
    }

    public function get_institutes() {
        return $this->db->select('*')->from('ct_institute')->get()->result_array();
    }

}
