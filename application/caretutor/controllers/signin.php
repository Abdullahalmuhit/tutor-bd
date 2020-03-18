<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Signin extends CI_Controller {

    /**
     * @author Ariful Islam
     * @link http://www.oployeelabs.com
     * @version 1.0
     */
    function __construct() {
        parent::__construct();

        // echo "<script language=\"javascript\">
        //     var screenWidth = window.screen.width;
        //     if(screenWidth < 800){
        //         window.location.href = 'https://m.caretutors.com';
        //     }
        // </script>";
    }

    public function index() {
      
        
        $this->check_is_logged_in();
        /* $data = array(
          'header' 	=> $this->load->view('other_header','',TRUE),
          'footer' 	=> $this->load->view('other_footer','',TRUE),
          ); */
        $data = array(
            'header' => $this->load->view('header', '', TRUE),
            'footer' => $this->load->view('footer', '', TRUE),
        );
        $this->load->view('sign_in', $data);
    }

    public function auto_signin($user_type) {
        $this->check_is_logged_in();
        $data = array(
            'header' => $this->load->view('header', '', TRUE),
            'footer' => $this->load->view('footer', '', TRUE),
            'user_type' => $user_type
        );
        $this->load->view('sign_in', $data);
    }

    public function check_is_logged_in() {
		
        if ($this->session->userdata('user_type')) {
            if ($this->session->userdata('user_type') == 'guardian') {
                redirect('parents/dashboard', 'refresh');
            } elseif ($this->session->userdata('user_type') == 'tutor') {
				
                redirect('tutor/dashboard', 'refresh');
            }
            //exit;
        }
    }

}

/* End of file signin.php */
/* Location: ./application/controllers/signin.php */
