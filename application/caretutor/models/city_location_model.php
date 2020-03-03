<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class City_location_model extends CI_Model 
{
	public function __construct()
    {
        parent::__construct();
    }

    public function get_country() 
	{
		//Select table name
		$table_name = $this->db->dbprefix('country');
		
		//Get contents
		$this->db->select('*')->from($table_name);
		$return = $this->db->get()->result();
		
		return $return;
	}
	
	public function get_city() 
	{
		//Select table name
		$table_name = $this->db->dbprefix('city');
		
		//Get contents
		$this->db->select('*')->from($table_name);
		$return = $this->db->get()->result();
		
		return $return;
	}
	
	public function get_location($city_id)
	{
		//Select table name
		$table_name = $this->db->dbprefix('location');
		
		$this->db->select('*')->from($table_name);
		$this->db->where('city_id',$city_id);
		$this->db->order_by("location");
		$return = $this->db->get()->result();
		
		return $return;
	}
	
	public function get_locs_array($data)
	{
		//Select table name
		$table_name = $this->db->dbprefix('location');
		
		$this->db->select('GROUP_CONCAT(location) as loc')->from($table_name);
		$this->db->where_in('id',$data);
		$query = $this->db->get();
		
		//Build contents query
		$return = $query->row();
		
		return $return;
	}
}
