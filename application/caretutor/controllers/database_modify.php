<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Database_modify extends CI_Controller {

	/**
	 * @author Ariful Islam
	 * @link http://www.oployeelabs.com
	 * @version 1.0
	 */
	
	function __construct()
	{
		parent::__construct();
	}
	public function index()
	{
		
		$fields = array(
			'skype_id' => array('type'	=>	'varchar',	'constraint' => '500',	'INDEX' => TRUE),
        	'english_medium_from' => array('type' => 'varchar','constraint' => '50','INDEX' => TRUE),
        	'bangla_medium_from' => array('type' => 'varchar','constraint' => '50','INDEX' => TRUE),
        	'date_to_hire' => array('type' => 'DATE')
		);
		$this->dbforge->add_column('ct_tutor_requirements', $fields);
	}
}

