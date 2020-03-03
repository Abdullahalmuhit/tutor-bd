<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * PHP version 5
 *
 * @category  CodeIgniter
 * @author    Ariful Islam
 * @copyright 2014 http://www.oployeelabs.com
 * @version   0.1
*/

class Testimonial_model extends CI_Model 
{
	public function __construct()
    {
        parent::__construct();
    }
	
	public function get_all_testimonial() 
	{
		//Select table name
		$table_name = $this->db->dbprefix('testimonial');
		
		$this->db->select('*')->from($table_name);
		$this->db->where('live','1');
		$return = $this->db->get()->result_array();
		return $return;
	}
	
}
?>
