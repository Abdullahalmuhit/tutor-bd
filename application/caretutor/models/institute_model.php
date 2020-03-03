<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * PHP version 5
 *
 * @category  CodeIgniter
 * @author    Ariful Islam
 * @copyright 2014 http://www.oployeelabs.com
 * @version   0.1
*/

class Institute_model extends CI_Model 
{
	public function __construct()
    {
        parent::__construct();
    }
	
	
	public function get_institute($data)
	{
		//Select table name
		$table_name = $this->db->dbprefix('institute');
		
		$this->db->select('id, institute')->from($table_name);
		$this->db->like('institute',$data);
		$query = $this->db->get();
		
		//Build contents query
		$return = $query->result();
		
		return $return;
	}
	
	public function get_all_institute()
	{
		//Select table name
		$table_name = $this->db->dbprefix('institute');
		
		$this->db->select('id, institute')->from($table_name);
		$query = $this->db->get();
		
		//Build contents query
		$return = $query->result();
		
		return $return;
	}
	
	public function add_institute($data)
	{
		//Select table name
		$table_name = $this->db->dbprefix('institute');
		
		$this->db->insert($table_name, $data);
		
		//Build contents query
		$return = $this->db->insert_id();
		
		return $return;
	}
}
?>
