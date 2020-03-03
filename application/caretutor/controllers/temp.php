<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Temp extends CI_Controller {
    function __construct() {
        parent::__construct();
    }

    public function index() {
        echo '404 not found'; exit;
        $this->load->view('temp');
    }

    public function findDataForLatLon()
	{
		$from_id 	= $this->input->post('from_id');
		$to_id 		= $this->input->post('to_id');

        $this->db->select('ct_location.id as location_id, ct_city.city, ct_location.location');
        $this->db->from('ct_location');
        $this->db->join('ct_city', 'ct_city.id = ct_location.city_id', 'left');
        $this->db->where('ct_location.latitude', 0);
		$this->db->where('ct_location.longitude', 0);
		$this->db->where('ct_location.id >', $from_id);
		$this->db->where('ct_location.id <', $to_id);
		$query = $this->db->get();
		$result = $query->result();

		echo json_encode($result);
	}

	public function saveDataForLatLon()
	{
		$location_id        = $this->input->post('location_id');
		$data['latitude'] 	= $this->input->post('latitude');
		$data['longitude'] 	= $this->input->post('longitude');
		$update = update('ct_location', $data, ['id' => $location_id]);
		echo 'success';
	}

}
