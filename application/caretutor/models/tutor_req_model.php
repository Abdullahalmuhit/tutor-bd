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
class Tutor_req_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function add_tutor_req($data) {
        //Select table name
        $table_name = $this->db->dbprefix('tutor_requirements');

        //Build contents query
        $return = $this->db->insert($table_name, $data);
        log_message("ERROR", $this->db->last_query());
        return $this->db->insert_id();
    }

    public function get_req_status() {
        //Select table name
        $table_name = $this->db->dbprefix('tutor_requirements');

        $this->db->select('*')->from($table_name);
        $this->db->where('id', $this->session->userdata('id'));
        $return = $this->db->get()->result();

        return $return;
    }

    public function get_all_req() {
        //Select table name
        $table_name = $this->db->dbprefix('tutor_requirements tr');

        $this->db->select('tr.*, c.city as city, l.location as location, tc.category as category, tc2.category as sub_cat, i.institute as institute')
                ->from($table_name)
                ->join('ct_city c', 'tr.city_id = c.id')
                ->join('ct_location l', 'tr.location_id = l.id')
                ->join('ct_tution_category tc', 'tr.tution_category_id = tc.id')
                ->join('ct_tution_category tc2', 'tr.tution_sub_cat_id = tc2.id')
                ->join('ct_institute i', 'tr.institute_id = i.id')
                ->where('user_id', $this->session->userdata('id'))
                ->order_by('tr.updated_at', 'DESC');
        $return = $this->db->get()->result();

        return $return;
    }

    public function get_all_job_count($city, $location, $category, $class, $gender) {
        $table_name = $this->db->dbprefix('tutor_requirements tr');

        $this->db->select("COUNT(tr.id) as job_count");
        $this->db->from($table_name);
        $this->db->where('tr.online', '1');
        $this->db->where('tr.live_to >= ', date('Y-m-d'));
        // $this->db->where('tr.status', 'solve');

        if ($city != '0' && $city != '' && $city != '1') {
            $this->db->where("tr.city_id", $city);
        }
        if ($location != '0' && $location != '') {
            $this->db->where_in("tr.location_id", $location);
        }
        if ($category != '0' && $category != '') {
            $this->db->where_in("tr.tution_category_id", $category);
        }
        if ($class != '0' && $class != '') {
            $this->db->where_in("tr.tution_sub_cat_id", $class);
        }
        if ($gender != '0' && $gender != '') {
            if (count($gender) == 2) {
                $gender[] = 'Any';
            }
            $this->db->where_in("tr.preferred_gender", $gender);
        }

        $this->db->order_by('ISNULL(tr.sorted)', 'DESC');
        //$this->db->order_by('tr.updated_at', 'DESC');
        $return = $this->db->get()->row();

        return $return;
    }

    public function get_ten_job_result($offset, $limit, $city, $location, $category, $class, $gender) {

        $table_name = $this->db->dbprefix('tutor_requirements tr');
        $this->db->select("tr.*,c.city as city,l.location as location,DATE_FORMAT(tr.updated_at, '%b %e, %Y') as upd,tc.category as category,tc2.category as sub_cat,GROUP_CONCAT(s.category) as subs",FALSE);
        $this->db->from($table_name);
        $this->db->join('ct_city c', 'tr.city_id = c.id');
        $this->db->join('ct_location l', 'tr.location_id = l.id');
        $this->db->join('ct_tution_category tc', 'tr.tution_category_id = tc.id');
        $this->db->join('ct_tution_category tc2', 'tr.tution_sub_cat_id = tc2.id');
        $this->db->join('ct_tution_category s', 'FIND_IN_SET(s.id , tr.subjects)', 'left');
        $this->db->join('ct_user u', 'tr.user_id = u.id');
        $this->db->where('tr.online', '1');
        $this->db->where('tr.live_to >= ', date('Y-m-d'));

        if ($city != '0' && $city != '' && $city != '1') {
            $this->db->where("tr.city_id", $city);
        }
        if ($location != '0' && $location != '') {
            $this->db->where_in("tr.location_id", $location);
        }
        if ($category != '0' && $category != '') {
            $this->db->where_in("tr.tution_category_id", $category);
        }
        if ($class != '0' && $class != '') {
            $this->db->where_in("tr.tution_sub_cat_id", $class);
        }
        if ($gender != '0' && $gender != '') {
            if (count($gender) == 2) {
                $gender[] = 'Any';
            }

            $this->db->where_in("tr.preferred_gender", $gender);
        }
        $this->db->group_by("tr.id");
        $this->db->order_by('tr.updated_at', 'DESC');
        $this->db->limit($limit, $offset);
        $result = $this->db->get();
        // print_r( $result->result());
        // die();
        if($result == 1) {
            $results = $result->result();
            return  $results;
         }
         else{
              return false;
         }          
       
         //previous code below

        // $this->db->select("u.full_name, tr.*, c.city as city, DATE_FORMAT(tr.updated_at, '%b %e, %Y') as upd, l.location as location, tc.category as category, tc2.category as sub_cat, GROUP_CONCAT(s.category) as subs", FALSE);
        // $this->db->from($table_name);
        // $this->db->join('ct_city c', 'tr.city_id = c.id');
        // $this->db->join('ct_location l', 'tr.location_id = l.id');
        // $this->db->join('ct_tution_category tc', 'tr.tution_category_id = tc.id');
        // $this->db->join('ct_tution_category tc2', 'tr.tution_sub_cat_id = tc2.id');
        // $this->db->join('ct_tution_category s', 'FIND_IN_SET(s.id , tr.subjects)', 'left');
        // $this->db->join('ct_user u', 'tr.user_id = u.id');
        // $this->db->where('tr.online', '1');
        // $this->db->where('tr.live_to >= ', date('Y-m-d'));

        // if ($city != '0' && $city != '' && $city != '1') {
        //     $this->db->where("tr.city_id", $city);
        // }
        // if ($location != '0' && $location != '') {
        //     $this->db->where_in("tr.location_id", $location);
        // }
        // if ($category != '0' && $category != '') {
        //     $this->db->where_in("tr.tution_category_id", $category);
        // }
        // if ($class != '0' && $class != '') {
        //     $this->db->where_in("tr.tution_sub_cat_id", $class);
        // }
        // if ($gender != '0' && $gender != '') {
        //     if (count($gender) == 2) {
        //         $gender[] = 'Any';
        //     }

        //     $this->db->where_in("tr.preferred_gender", $gender);
        // }
        // $this->db->group_by("tr.id");
        // $this->db->order_by('tr.updated_at', 'DESC');
        // $this->db->limit($limit, $offset);
      
        // $result = $this->db->get();
        // print_r($result);
        // die();
        
        // if($result == 1) {
        //     $results = $result->result();
        //     return  $results;
        //  }
        //  else{
        //       return false;
        //  }
    }

    public function get_all_job() {
        //Select table name
        $table_name = $this->db->dbprefix('tutor_requirements tr');

        $this->db->select("tr.*, c.city as city, DATE_FORMAT(tr.updated_at, '%b %e, %Y') as upd, l.location as location, tc.category as category, tc2.category as sub_cat, i.institute as institute, GROUP_CONCAT(s.sdg) as subs", FALSE)
                ->from($table_name)
                ->join('ct_city c', 'tr.city_id = c.id')
                ->join('ct_location l', 'tr.location_id = l.id')
                ->join('ct_tution_category tc', 'tr.tution_category_id = tc.id')
                ->join('ct_tution_category tc2', 'tr.tution_sub_cat_id = tc2.id')
                ->join('ct_institute i', 'tr.institute_id = i.id')
                ->join('ct_sdg s', 'FIND_IN_SET(s.id , tr.subjects)')
                ->where("tr.status != 'post'")
                ->where("tr.status != 'complete'");

        $this->db->group_by("tr.id");

        $this->db->order_by('tr.updated_at', 'DESC');
        $return = $this->db->get()->result();

        return $return;
    }

    public function get_spec_req($id) {
        //Select table name
        $table_name = $this->db->dbprefix('tutor_requirements tr');

        $this->db->select('tr.*, user.full_name, user.mobile_no, user.email, c.city as city, l.location as location, tc.category as category, tc2.category as sub_cat, i.institute as institute, GROUP_CONCAT(s.category) as subs', FALSE)
                ->from($table_name)
                ->join('ct_city c', 'tr.city_id = c.id')
                ->join('ct_location l', 'tr.location_id = l.id')
                ->join('ct_tution_category tc', 'tr.tution_category_id = tc.id')
                ->join('ct_tution_category tc2', 'tr.tution_sub_cat_id = tc2.id')
                ->join('ct_institute i', 'tr.institute_id = i.id', 'left')
                ->join('ct_tution_category s', 'FIND_IN_SET(s.id , tr.subjects)', 'left')
                ->join('ct_user user', 'tr.user_id = user.id', 'left')
                ->where('tr.id', $id);

        $return = $this->db->get();

        return $return;
    }

    public function get_spec_live_job($id) {
        //Select table name
        $table_name = $this->db->dbprefix('tutor_requirements tr');

        $this->db->select('tr.*, user.full_name, user.mobile_no, user.email, c.city as city, l.location as location, tc.category as category, tc2.category as sub_cat, i.institute as institute, GROUP_CONCAT(s.category) as subs', FALSE)
                ->from($table_name)
                ->join('ct_city c', 'tr.city_id = c.id')
                ->join('ct_location l', 'tr.location_id = l.id')
                ->join('ct_tution_category tc', 'tr.tution_category_id = tc.id')
                ->join('ct_tution_category tc2', 'tr.tution_sub_cat_id = tc2.id')
                ->join('ct_institute i', 'tr.institute_id = i.id', 'left')
                ->join('ct_tution_category s', 'FIND_IN_SET(s.id , tr.subjects)', 'left')
                ->join('ct_user user', 'tr.user_id = user.id', 'left')
                ->where('tr.id', $id)
                ->where("tr.status != 'post'")
                ->where("tr.status != 'complete'");

        $return = $this->db->get()->result();

        return $return;
    }

    public function update_tutor_req($data, $id) {
        //Select table name
        $table_name = $this->db->dbprefix('tutor_requirements');

        //Build contents query
        $this->db->where('id', $id);
        $return = $this->db->update($table_name, $data);

        return $return;
    }

    public function get_invited_job_list($status) {
        //Select table name
        $table_name = $this->db->dbprefix('tutor_requirements tr');
        $job_tutor = $this->db->dbprefix('job_tutor jt');
        $this->db->select("jt.*,jt.status as my_status, jt.job_id as jobs_id, tr.*, c.city as city, l.location as location,DATE_FORMAT(tr.updated_at, '%M %e') as upd,tc.category as category,tc2.category as sub_cat,GROUP_CONCAT(DISTINCT(s.category)) as subs", FALSE)->from($job_tutor)
        ->join('tutor_requirements tr', 'tr.id = jt.job_id')
        ->join('ct_city c', 'tr.city_id = c.id')
        ->join('ct_location l', 'tr.location_id = l.id')
        ->join('ct_tution_category tc', 'tr.tution_category_id = tc.id')
        ->join('ct_tution_category tc2', 'tr.tution_sub_cat_id = tc2.id')
        ->join('ct_tution_category s', 'FIND_IN_SET(s.id , tr.subjects)')
        ->where('jt.tutor_id', $this->session->userdata('id'));
        if ($status == "All") {
            $this->db->where('jt.status !=', 'Applied');
        } else {
            $this->db->where('jt.status', $status);
        };

        $this->db->order_by('jt.id', 'DESC');
        $this->db->group_by('jt.id');
        $return = $this->db->get()->result();
        log_message('ERROR', $this->db->last_query());
        
        return $return;

        //previous code
        
        // $this->db->select("jt.*, jt.status as my_status, jt.job_id as jobs_id, tr.*, c.city as city, l.location as location, DATE_FORMAT(tr.updated_at, '%M %e') as upd, tc.category as category, tc2.category as sub_cat, GROUP_CONCAT(DISTINCT(s.category)) as subs", FALSE)
        //         ->from($job_tutor)
        //         ->join('tutor_requirements tr', 'tr.id = jt.job_id')
        //         ->join('ct_city c', 'tr.city_id = c.id')
        //         ->join('ct_location l', 'tr.location_id = l.id')
        //         ->join('ct_tution_category tc', 'tr.tution_category_id = tc.id')
        //         ->join('ct_tution_category tc2', 'tr.tution_sub_cat_id = tc2.id')
        //         ->join('ct_tution_category s', 'FIND_IN_SET(s.id , tr.subjects)')
        //         ->where('jt.tutor_id', $this->session->userdata('id'));
        // if ($status == "All") {
        //     $this->db->where('jt.status !=', 'Applied');
        // } else {
        //     $this->db->where('jt.status', $status);
        // }
        // $this->db->group_by('jt.id');
        // $this->db->order_by('jt.id', 'DESC');
        // $return = $this->db->get()->result();
		// log_message('ERROR', $this->db->last_query());
        // return $return;
    }

    public function get_invited_job_list_by_tutor($status) {
        //Select table name
        $table_name = $this->db->dbprefix('tutor_requirements tr');
        $job_tutor = $this->db->dbprefix('job_tutor jt');

        $this->db->select("jt.*, jt.status as my_status, jt.job_id as jobs_id, u.id as parent_id, u.mobile_no, u.full_name, tr.*, c.city as city, l.location as location, DATE_FORMAT(tr.updated_at, '%M %e') as upd, tc.category as category, tc2.category as sub_cat, GROUP_CONCAT(DISTINCT(s.category)) as subs", FALSE)
                ->from($job_tutor)
                ->join('tutor_requirements tr', 'tr.id = jt.job_id')
                ->join('ct_city c', 'tr.city_id = c.id')
                ->join('ct_location l', 'tr.location_id = l.id')
                ->join('ct_tution_category tc', 'tr.tution_category_id = tc.id')
                ->join('ct_tution_category tc2', 'tr.tution_sub_cat_id = tc2.id')
                ->join('ct_tution_category s', 'FIND_IN_SET(s.id , tr.subjects)')
                ->join('ct_user u', 'tr.user_id = u.id')
                ->where('jt.tutor_id', $this->session->userdata('id'))
                ->where('tr.is_generated', '1');
        if ($status == "All") {
            $this->db->where('jt.status !=', 'Applied');
        } else {
            $this->db->where('jt.status', $status);
        }
        $this->db->group_by('jt.id');
        //$this->db->having("tr.status != 'complete'");
        $this->db->order_by('jt.id', 'DESC');

        $result = $this->db->get();
      
        if($result == 1) {
       
            $results = $result->result();
            return  $results;
         }
         else{
         
              return false;
         }
    }
    public function generate_pdf_job_list_by_tutor($status,$job_id) {
        //Select table name
        $table_name = $this->db->dbprefix('tutor_requirements tr');
        $job_tutor = $this->db->dbprefix('job_tutor jt');

        $this->db->select("jt.*, jt.status as my_status, jt.job_id as jobs_id, tr.*, u.id as parent_id, u.mobile_no, u.full_name, c.city as city, l.location as location, DATE_FORMAT(tr.updated_at, '%M %e') as upd, tc.category as category, tc2.category as sub_cat, GROUP_CONCAT(DISTINCT(s.category)) as subs", FALSE)
                ->from($job_tutor)
                ->join('tutor_requirements tr', 'tr.id = jt.job_id')
                ->join('ct_city c', 'tr.city_id = c.id')
                ->join('ct_location l', 'tr.location_id = l.id')
                ->join('ct_tution_category tc', 'tr.tution_category_id = tc.id')
                ->join('ct_tution_category tc2', 'tr.tution_sub_cat_id = tc2.id')
                ->join('ct_tution_category s', 'FIND_IN_SET(s.id , tr.subjects)')
                ->join('ct_user u', 'tr.user_id = u.id')
                ->where('jt.tutor_id', $this->session->userdata('id'))
                ->where('tr.is_generated', '1')
                ->where('tr.id', $job_id);
        if ($status == "All") {
            $this->db->where('jt.status !=', 'Applied');
        } else {
            $this->db->where('jt.status', $status);
        }
        $this->db->group_by('jt.id');
        //$this->db->having("tr.status != 'complete'");
        $this->db->order_by('jt.id', 'DESC');
        $return = $this->db->get()->result();

        return $return;
    }

    public function get_available_job_list() {
        //Select table name
        $table_name = $this->db->dbprefix('tutor_requirements tr');
        $job_tutor = $this->db->dbprefix('job_tutor jt');

        $this->db->select("jt.*, jt.status as my_status, tr.*, tr.id as jobs_id, c.city as city, l.location as location, DATE_FORMAT(tr.updated_at, '%M %e') as upd, tc.category as category, tc2.category as sub_cat, i.institute as institute, GROUP_CONCAT(DISTINCT(s.sdg)) as subs", FALSE)
                ->from($table_name)
                ->join('ct_city c', 'tr.city_id = c.id')
                ->join('ct_location l', 'tr.location_id = l.id')
                ->join('ct_tution_category tc', 'tr.tution_category_id = tc.id')
                ->join('ct_tution_category tc2', 'tr.tution_sub_cat_id = tc2.id')
                ->join('ct_institute i', 'tr.institute_id = i.id')
                ->join('ct_sdg s', 'FIND_IN_SET(s.id , tr.subjects)')
                ->join("job_tutor jt", "jt.job_id = tr.id AND jt.tutor_id = {$this->session->userdata('id')}", "LEFT")
                ->where("tr.status != 'post'", '', FALSE)
                ->where("tr.status != 'done'", '', FALSE)
                ->where("tr.status != 'complete'", '', FALSE)
                ->group_by('tr.id')
                ->order_by('tr.id', 'DESC');

        $return = $this->db->get()->result();

        return $return;
    }

    public function apply_job($job_id) {
        //Select table name
        $table_name = $this->db->dbprefix('job_tutor');

        $this->db->select('*')
                ->from($table_name)
                ->where('job_id', $job_id)
                ->where('tutor_id', $this->session->userdata('id'));

        $get_res = $this->db->get();

        if ($get_res->num_rows() > 0) {
            $data = array(
                'status' => 'Applied'
            );

            //Build contents query
            $this->db->where('job_id', $job_id);
            $this->db->where('tutor_id', $this->session->userdata('id'));
            $return = $this->db->update($table_name, $data);
        } else {
            $data = array(
                'job_id' => $job_id,
                'tutor_id' => $this->session->userdata('id'),
                'status' => 'Applied'
            );

            //Build contents query
            $return = $this->db->insert($table_name, $data);
        }

        return $return;
    }

    public function get_all_resume() {
        //Select table name
        $table_name = $this->db->dbprefix('resume_permission rp');
        $user_table = $this->db->dbprefix('user u');

        //Build contents query
        $this->db->select('rp.*, u.full_name')
                ->from($table_name)
                ->join($user_table, 'rp.tutor_id = u.id')
                ->where('rp.user_id', $this->session->userdata('id'))
                ->where("rp.status != 'completed'");
        $return = $this->db->get()->result();

        return $return;
    }

    /* public function get_all_featured_tutors()
      {
      //Select table name
      $user_table 	= $this->db->dbprefix('user');
      $table_name 	= $this->db->dbprefix('tutor_edu_info');
      $subject_table 	= $this->db->dbprefix('sdg');
      $institue_table = $this->db->dbprefix('institute');
      $tutor_personal_table = $this->db->dbprefix('tutor_per_info');
      $tution_info = $this->db->dbprefix('tution_info');
      $this->db->select("{$user_table}.*, university.institute as uni_ins,
      tutor_personal_table.profile_pic,
      tution_info.experiences
      ")->from($user_table);
      $this->db->join($table_name, "{$table_name}.user_id = {$user_table}.id");
      $this->db->join("{$tutor_personal_table} as tutor_personal_table", "tutor_personal_table.user_id = {$user_table}.id");
      $this->db->join("{$institue_table} as university", "university.id = {$table_name}.uni_ins_id");
      $this->db->join("{$tution_info} as tution_info", "tution_info.user_id = {$user_table}.id" );
      $this->db->where($user_table.'.user_type','tutor');
      $this->db->where($user_table.'.verify_status','1');
      $this->db->where($user_table.'.is_featured','1');
      $this->db->order_by($user_table.'.id','RANDOM');
      $return = $this->db->get()->result();

      return $return;
      } */

    public function get_user_jobs_list() {
        //Select table name
        $table_name = $this->db->dbprefix('tutor_requirements tr');
        $this->db->select("tr.*,c.city as city,tr.updated_at as upd, l.location as location, tr.institute_name as institute, tc.category as category, tc2.category as sub_cat,GROUP_CONCAT(s.category) as subs", FALSE);
        $this->db->from($table_name);
        $this->db->join('ct_city c', 'tr.city_id = c.id');
        $this->db->join('ct_location l', 'tr.location_id = l.id');
        $this->db->join('ct_tution_category tc', 'tr.tution_category_id = tc.id');
        $this->db->join('ct_tution_category tc2', 'tr.tution_sub_cat_id = tc2.id');
        $this->db->join('ct_tution_category s', 'FIND_IN_SET(s.id , tr.subjects)', 'left');
        $this->db->join('ct_user u', 'tr.user_id = u.id');
        $this->db->where('tr.online', '1');
        // $this->db->where('tr.live_to >= ', date('Y-m-d'));
        $this->db->where('tr.user_id',$this->session->userdata('id'));

        if ($this->input->post('txttjstext')) {
            $this->db->having("lower(Concat(location, '', category, '', sub_cat)) like lower('%" . $this->input->post('txttjstext') . "%')", FALSE);
        }
        if ($city != '0' && $city != '' && $city != '1') {
            $this->db->where("tr.city_id", $city);
        }
        if ($location != '0' && $location != '') {
            $this->db->where_in("tr.location_id", $location);
        }
        if ($category != '0' && $category != '') {
            $this->db->where_in("tr.tution_category_id", $category);
        }
        if ($class != '0' && $class != '') {
            $this->db->where_in("tr.tution_sub_cat_id", $class);
        }
        if ($gender != '0' && $gender != '') {
            if (count($gender) == 2) {
                $gender[] = 'Any';
            }

            $this->db->where_in("tr.preferred_gender", $gender);
        }
        $this->db->group_by("tr.id");
        $this->db->order_by('tr.updated_at', 'DESC');
        $result = $this->db->get();
        // print_r($result);
        // die();
        if($result == 1) {
            $results = $result->result();
            return  $results;
         }
         else{
              return false;
         }

        //previous code
        // $table_name = $this->db->dbprefix('tutor_requirements tr');
        // $this->db->select("tr.*, c.city as city, DATE_FORMAT(tr.updated_at, '%b %e, %Y') as upd, l.location as location, tc.category as category, tc2.category as sub_cat, i.institute as institute, GROUP_CONCAT(s.category) as subs, COUNT(distinct(jt.id)) AS count_tutor, jt.status as job_tutor_status", FALSE);
        // $this->db->from($table_name);
        // $this->db->join('ct_city c', 'tr.city_id = c.id');
        // $this->db->join('ct_location l', 'tr.location_id = l.id');
        // $this->db->join('ct_tution_category tc', 'tr.tution_category_id = tc.id');
        // $this->db->join('ct_tution_category tc2', 'tr.tution_sub_cat_id = tc2.id');
        // $this->db->join('ct_tution_category s', 'FIND_IN_SET(s.id , tr.subjects)', 'left');
        // $this->db->join('ct_user u', 'tr.user_id = u.id');
        // $this->db->where('tr.online', '1');
        // $this->db->where('tr.live_to >= ', date('Y-m-d'));

        // if ($this->input->post('txttjstext')) {
        //     $this->db->having("lower(Concat(location, '', category, '', sub_cat)) like lower('%" . $this->input->post('txttjstext') . "%')", FALSE);
        // }
        // if ($city != '0' && $city != '' && $city != '1') {
        //     $this->db->where("tr.city_id", $city);
        // }
        // if ($location != '0' && $location != '') {
        //     $this->db->where_in("tr.location_id", $location);
        // }
        // if ($category != '0' && $category != '') {
        //     $this->db->where_in("tr.tution_category_id", $category);
        // }
        // if ($class != '0' && $class != '') {
        //     $this->db->where_in("tr.tution_sub_cat_id", $class);
        // }
        // if ($gender != '0' && $gender != '') {
        //     if (count($gender) == 2) {
        //         $gender[] = 'Any';
        //     }

        //     $this->db->where_in("tr.preferred_gender", $gender);
        // }
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

    public function get_jobs_cv_list($id) {
        $this->db->select('ct_user.step_no, ct_tution_info.total_experience, ct_user.full_name, ct_user.mobile_no, ct_user.is_verified, ct_user.id, ct_institute.institute, ct_tution_info.experiences, ct_resume_permission.status as cv_status, ct_tutor_profile_pic.profile_pic, ct_job_tutor.status job_tutor_status');
        $this->db->from('ct_user');
        $this->db->join('ct_resume_permission', 'ct_resume_permission.tutor_id = ct_user.id', 'left');
        $this->db->join('ct_job_tutor', 'ct_job_tutor.tutor_id = ct_resume_permission.tutor_id and ct_job_tutor.job_id = ct_resume_permission.job_id', 'inner');
        $this->db->join('ct_tutor_per_info', 'ct_user.id = ct_tutor_per_info.user_id', 'left');
        $this->db->join('ct_tution_info', 'ct_user.id = ct_tution_info.user_id', 'left');
        $this->db->join('ct_tutor_edu_info', 'ct_user.id = ct_tutor_edu_info.user_id', 'left');
        $this->db->join('ct_institute', 'ct_tutor_edu_info.institute_id = ct_institute.id', 'left');
        $this->db->join('ct_tutor_profile_pic', 'ct_user.id = ct_tutor_profile_pic.tutor_id', 'left');
        $this->db->where('ct_resume_permission.job_id', $id);
        $this->db->where('ct_resume_permission.user_id', $this->session->userdata('id'));
        // $this->db->where('ct_tutor_edu_info.current_institute', '1');
        $this->db->group_by('ct_tutor_edu_info.user_id');
        $this->db->order_by('ct_tution_info.created_at');
        $this->db->limit(5);
        $result = $this->db->get();
        if($result == 1) {
            $results = $result->result();
            return  $results;
         }
         else{
              return false;
         }
    }

    public function get_client_selected_tutor($id) {
        $this->db->where('job_id', $id);
        $this->db->where('status !=', 'Invited');
        $this->db->where('status !=', 'Applied');
        return $this->db->get('ct_job_tutor')->row_array();
    }

    public function select_tutor_from_cv($post) {
        $table_name = $this->db->dbprefix('job_tutor');

        $data = array( 'status' => 'Selected' );
        $this->db->where('job_id', $post['job_id']);
        $this->db->where('tutor_id', $post['tutor_id']);
        $this->db->where('status', 'Asses');
        $return = $this->db->update($table_name, $data);

        if ($this->db->affected_rows() == true) {
            $data = array( 'status' => 'Asses' );
            $this->db->where('job_id', $post['job_id']);
            $this->db->where('status', 'Selected');
            $this->db->where('tutor_id != ', $post['tutor_id']);
            $this->db->update($table_name, $data);
            return true;
        } else
            return 0;

        // $status_data = array(
        //     'status' => 'done',
        // );

        // $table_name = $this->db->dbprefix('tutor_requirements');
        // $this->db->where('id', $post['job_id']);
        // $this->db->update($table_name, $status_data);

        
    }

    public function get_user_notification_list() {
        $unread = $this->db->where('receiver_id', $this->session->userdata('id'))
                        ->where('status', '0')
                        ->get('ct_notification')->result_array();

        $all = $this->db->where('receiver_id', $this->session->userdata('id'))
                ->order_by('ct_notification.id', "desc")
                ->get('ct_notification')
                ->result_array();
        return array($unread, $all);
    }

    public function notification_status_change($id) {
        $table_name = $this->db->dbprefix('notification');
        $data = array(
            'status' => '1'
        );
        $this->db->where('receiver_id', $id);
        $this->db->update($table_name, $data);
    }

    public function send_notification($data_notification) {
        $table_name = $this->db->dbprefix('notification');
        $this->db->insert($table_name, $data_notification);
    }

    public function email_send_to_client($client_id, $subject, $message) {
        $table_name = $this->db->dbprefix('thread_details');
        $data = array(
            'subject' => $subject,
            'created_at' => date('Y-m-d H:i:s')
        );

        $this->db->insert($table_name, $data);
        $thread_details_id = $this->db->insert_id();

        $table_name = $this->db->dbprefix('thread_users');
        $data = array(
            'thread_detail_id' => $thread_details_id,
            'thread_user_id' => $client_id,
            'created_at' => date('Y-m-d H:i:s')
        );
        $this->db->insert($table_name, $data);

        $table_name = $this->db->dbprefix('thread_messages');
        $data = array(
            'thread_detail_id' => $thread_details_id,
            'sender' => '42',
            'message_detail' => $message,
            'created_at' => date('Y-m-d H:i:s')
        );
        $this->db->insert($table_name, $data);

        return true;
    }

    public function check_job_tutor($job_id, $tutor_id) {
        return $this->db->select('*')
                        ->from('ct_job_invoice')
                        ->where('job_id', $job_id)
                        ->where('tutor_id', $tutor_id)
                        ->where('sent', 1)
                        ->get()->row_array();
    }

    public function check_invoice_info($invoice_id) {
        return $this->db->select('*')
                        ->from('ct_job_invoice')
                        ->where('id', $invoice_id)
                        ->get()->row_array();
    }

    public function payment_gateway_data_save($data) {
        $table_name = $this->db->dbprefix('payment_gateway_data');
        $this->db->insert($table_name, $data);
    }

    public function update_invoice_status($id) {
        $table_name = $this->db->dbprefix('job_invoice');
        $data = array(
            'status' => '1'
        );
        $this->db->where('id', $id)->update($table_name, $data);
    }

    public function getGoogleMapJob($job_id) {
        $table_name = $this->db->dbprefix('tutor_requirements tr');
        $this->db->select("u.full_name, tr.*, c.city as city, DATE_FORMAT(tr.updated_at, '%b %e, %Y') as upd, l.location as location, tc.category as category, tc2.category as sub_cat, GROUP_CONCAT(s.category) as subs", FALSE);
        $this->db->from($table_name);
        $this->db->join('ct_city c', 'tr.city_id = c.id');
        $this->db->join('ct_location l', 'tr.location_id = l.id');
        $this->db->join('ct_tution_category tc', 'tr.tution_category_id = tc.id');
        $this->db->join('ct_tution_category tc2', 'tr.tution_sub_cat_id = tc2.id');
        $this->db->join('ct_tution_category s', 'FIND_IN_SET(s.id , tr.subjects)', 'left');
        $this->db->join('ct_user u', 'tr.user_id = u.id');
        $this->db->where('tr.id', $job_id);
        $result = $this->db->get()->row();
        log_message('ERROR', $this->db->last_query());
        return $result;
    }

    public function getAllGoogleMapJob($offset = 0, $limit = '', $city_id = '', $category_id = '') {
        $table_name = $this->db->dbprefix('tutor_requirements tr');
        $this->db->select("u.full_name, tr.*, c.city as city, DATE_FORMAT(tr.updated_at, '%b %e, %Y') as upd, l.location as location, tc.category as category, tc2.category as sub_cat, GROUP_CONCAT(s.category) as subs", FALSE);
        $this->db->from($table_name);
        $this->db->join('ct_city c', 'tr.city_id = c.id');
        $this->db->join('ct_location l', 'tr.location_id = l.id');
        $this->db->join('ct_tution_category tc', 'tr.tution_category_id = tc.id');
        $this->db->join('ct_tution_category tc2', 'tr.tution_sub_cat_id = tc2.id');
        $this->db->join('ct_tution_category s', 'FIND_IN_SET(s.id , tr.subjects)', 'left');
        $this->db->join('ct_user u', 'tr.user_id = u.id');
        $this->db->where('tr.latitude !=', 0);
        $this->db->where('tr.longitude !=', 0);
        if (!empty($city_id) && $city_id != 1) {
            $this->db->where('c.id', $city_id);
        }
        if (!empty($category_id) && $category_id != 1) {
            $this->db->where('tc.id', $category_id);
        }
        if (!empty($limit)) {
            $this->db->limit($limit, $offset);
        }
        $this->db->group_by("tr.id");
        $this->db->order_by('ISNULL(tr.sorted)', 'ASC');
        $this->db->order_by('tr.sorted', 'ASC');
        $this->db->order_by('tr.updated_at', 'DESC');
        $result = $this->db->get()->result();
        log_message('ERROR', $this->db->last_query());
        return $result;
    }


}

?>
