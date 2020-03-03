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
class Category_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_category() {
        //Select table name
        $table_name = $this->db->dbprefix('tution_category');
        //Get contents
        $this->db->select('*')->from($table_name);
        $this->db->where('parent_id', NULL);
	$this->db->order_by('position asc');
        $return = $this->db->get()->result();

        return $return;
    }

    public function get_sub_parent($parent_id) {
        //Select table name
        $table_name = $this->db->dbprefix('tution_category');

        $this->db->select('*')->from($table_name);
        $this->db->where('id', $parent_id);
	$this->db->order_by('position asc');
        $return = $this->db->get()->result();

        return $return;
    }

    public function get_category_landing($category_id) {
        //Select table name
        $table_name = $this->db->dbprefix('tution_category');

        //Get contents
        $this->db->select('*')->from($table_name);
        $this->db->where_in('id', $category_id);
	$this->db->order_by('position asc');
        $return = $this->db->get()->result();
        return $return;
    }

    public function get_sub_category($parent_id) {
        //Select table name
        $table_name = $this->db->dbprefix('tution_category');

        $this->db->select('*')->from($table_name);
        $this->db->where('parent_id', $parent_id);
	$this->db->order_by('position asc');
        $return = $this->db->get()->result();

        return $return;
    }

    public function get_class_landing($parent_ids) {
        $table_name = $this->db->dbprefix('tution_category');

        foreach ($parent_ids as $parent_id) {
            $this->db->select('*')->from($table_name);
            $this->db->where('parent_id', $parent_id);
	    $this->db->order_by('position asc');
            $class[$parent_id] = $this->db->get()->result();
        }

        return $class;
    }

    public function ajax_load_class_tutor_job_search($parent_ids) {
        $table_name = $this->db->dbprefix('tution_category');

        $this->db->select('*')->from($table_name);
        $this->db->where_in('id', $parent_ids);
	$this->db->order_by('position asc');
        $category = $this->db->get()->result();

        //Get contents
        $this->db->select('*')->from($table_name);
        $this->db->where_in('parent_id', $parent_ids);
	$this->db->order_by('position asc');
        $class = $this->db->get()->result();
        return array($category, $class);
    }

    public function get_dropdown_categories($parent_id) {
        //Select table name
        $table_name = $this->db->dbprefix('tution_category');

        $this->db->select('*')->from($table_name);
        $this->db->where('parent_id', $parent_id);
	$this->db->order_by('position asc');
        $return = $this->db->get()->result();

        return $return;
    }

    public function get_category_array($data) {
        //Select table name
        $table_name = $this->db->dbprefix('tution_category');

        $this->db->select('GROUP_CONCAT(category) as cat')->from($table_name);
        $this->db->where_in('id', $data);
        $query = $this->db->get();

        //Build contents query
        $return = $query->row();

        return $return;
    }

    public function ajax_load_course($data) {
        $table_name = $this->db->dbprefix('tution_category');

        $this->db->select("*")->from($table_name);
        $this->db->where('parent_id', $data['class_id']);
        $this->db->where('is_subject', '1');
	$this->db->order_by('position asc');
        return $this->db->get()->result_array();
    }

    public function get_class_course($id) {
        $table_name = $this->db->dbprefix('tution_category');

        $this->db->select("*")->from($table_name);
        $this->db->where('parent_id', $id);
        $this->db->where('is_subject', '1');
	$this->db->order_by('position asc');
        return $this->db->get()->result_array();
    }

    public function ajax_load_subjects_tutor_job_search($parent_ids) {
        $table_name = $this->db->dbprefix('tution_category');

        $this->db->select('*')->from($table_name);
        $this->db->where_in('id', $parent_ids);
	$this->db->order_by('position asc');
        $class = $this->db->get()->result();

        //Get contents
        $this->db->select('*')->from($table_name);
        $this->db->where_in('parent_id', $parent_ids);
	$this->db->order_by('position asc');
        $subjects = $this->db->get()->result();
        return array($class, $subjects);
    }

}
