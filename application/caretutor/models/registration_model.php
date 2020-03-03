<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * PHP version 5
 *
 * @category  CodeIgniter
 * @author    Ariful Islam
 * @copyright 2014 http://www.oployeelabs.com
 * @version   0.1
*/

class Registration_model extends CI_Model 
{
	public function __construct()
    {
        parent::__construct();
    }
	
	
	public function add_basic_info($data)
	{
		//Select table name
		$table_name = $this->db->dbprefix('user');
		
		$this->db->select('*')->from($table_name);
		$this->db->where('email',$data['email']);
		$this->db->where('user_type',$data['user_type']);
		$query = $this->db->get();
		
		if ($query->num_rows() > 0)
		{
			return "<center>You already have a account with this email.</center>";
			exit;
		}
		
		//Build contents query
		$return = $this->db->insert($table_name,$data);
		
		return $return;
	}
	
	public function verify_user($data, $user_id)
	{
		//Select table name
		$table_name = $this->db->dbprefix('user');
		
		$this->db->where('user_id', $user_id);
		
		//Build contents query
		$return = $this->db->update($table_name,$data);
		
		return $return;
	}
}
?>
