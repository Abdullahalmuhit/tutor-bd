<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * PHP version 5
 *
 * @category  CodeIgniter
 * @author    Md. Ashrafuzzaman Rafi
 * @copyright 2014 http://www.oployeelabs.com
 * @version   0.1
 */
class Request_verify_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_verify_data() {
        //Select table name
        $table_name = $this->db->dbprefix('tutor_verification');

        $this->db->select('*')->from($table_name);
        $this->db->order_by("id", "DESC");
        $query = $this->db->get();

        //Build contents query
        $return = $query->row();

        return $return;
    }

    public function get_verify_data_by_user($userid) {
        //Select table name
        $table_name = $this->db->dbprefix('tutor_verification');

        $this->db->select('*')->from($table_name);
        $this->db->where("user_id", $userid);
        $query = $this->db->get();

        //Build contents query
        $return = $query->row();

        return $return;
    }

    public function insert_verify_data($data) {
        $verify_data = array(
            'user_id' => $data['user_id'],
            'payment_method' => $data['payment_method'],
            'amount' => $data['amount'],
            'ref_no' => $data['ref_no'],
            'status' => 0
        );

        //$this->db->trans_start();
        $this->db->set('request_date', 'NOW()', FALSE);
        // $this->db->set('payment_date', 'NOW()', FALSE);
        if ($this->db->insert('tutor_verification', $verify_data)) {

            return $this->db->insert_id();
        } else {
            return $this->db->_error_message();
            //return $error;
        }
    }

    public function update_verification($data) {
        //Select table name
        $table_name = $this->db->dbprefix('tutor_verification');

        $this->db->set('payment_date', 'NOW()', FALSE);
        $this->db->where('user_id', $this->session->userdata('id'));
        $res = $this->db->update($table_name, $data);

        return $res;
    }
}

?>
