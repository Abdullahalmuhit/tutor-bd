<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * PHP version 5
 *
 * @category  CodeIgniter
 * @author    Ariful Islam
 * @copyright 2014 http://www.oployeelabs.com
 * @version   0.1
*/

class Sdg_model extends CI_Model 
{
	public function __construct()
    {
        parent::__construct();
    }
	
	
	public function get_sdg($data)
	{
		//Select table name
		$table_name = $this->db->dbprefix('sdg');
		
		$this->db->select('id, sdg')->from($table_name);
		$this->db->like('sdg',$data);
		$query = $this->db->get();
		
		//Build contents query
		$return = $query->result();
		
		return $return;
	}
	
	public function get_sdg_array($data)
	{
		//Select table name
		$table_name = $this->db->dbprefix('sdg');
		
		$this->db->select("GROUP_CONCAT(sdg) as subj")->from($table_name);
		$this->db->where_in('id',$data);
		$query = $this->db->get();
		
		//Build contents query
		$return = $query->row();
		
		return $return;
	}
	
	public function get_all_sdg($for_match = false)
	{
		//Select table name
		$table_name = $this->db->dbprefix('sdg');
		
		$this->db->select('id, sdg')->from($table_name);
		
		if ($for_match)
		{
			$this->db->where('for_match','1');
		}
		
		$query = $this->db->get();
		
		//Build contents query
		$return = $query->result();
		
		return $return;
	}
	
	public function add_sdg($data)
	{
		//Select table name
		$table_name = $this->db->dbprefix('sdg');
		
		$this->db->insert($table_name, $data);
		
		//Build contents query
		$return = $this->db->insert_id();
		
		return $return;
	}
	
	public function get_groups()
	{
		//Select table name
		$table_name = $this->db->dbprefix('sdg');

		return $this->db->select('ct_sdg.id, ct_sdg.sdg')->from($table_name)->where('ct_sdg.sdg !=','')->get()->result_array();
	}
}
?>
