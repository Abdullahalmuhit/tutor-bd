<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

	/**
	 * @author Ariful Islam
	 * @link http://www.oployeelabs.com
	 * @version 1.0
	 */

	function __construct()
	{
		parent::__construct();
		
		// echo "<script language=\"javascript\">
  //           var screenWidth = window.screen.width;
  //           if(screenWidth < 800){
  //               window.location.href = 'https://m.caretutors.com';
  //           }
  //       </script>";
		//$this->load->model('user_model','model');
	}

	public function login($is_auto = FALSE)
	{

		if ($is_auto)
		{
			$user_type = $this->session->userdata('user_type');
			if ($user_type == "guardian")
			{
				redirect("parents/dashboard");
			}
			else
			{
				redirect("tutor/dashboard");
			}
		}
		else
		{

			$this->load->model('user_model');
			$res = $this->user_model->login();

			$user_type = $this->input->post('radiog_dark');
			if ($res)
			{
				if ($user_type == "guardian")
				{
					$return_data = array(
						'status' => 'redirect',
						'url'	 => 'parents/dashboard'
					);
					echo json_encode($return_data);
					exit;
				}
				else
				{
					$return_data = array(
						'status' => 'redirect',
						'url'	 => 'tutor/dashboard'
					);
					echo json_encode($return_data);
					exit;
				}
			}
			else
			{
				$findUser = find('ct_user', 'user_status', ['email' => $this->input->post('email'), 'password' => md5($this->input->post('password'))]);
				if ($findUser && $findUser->user_status == 'inactive') {
					$return_data = array(
						'status' => 'message',
						'msg'	 => 'Your profile is temporary blocked. Please contact with our support team (+880 1756 441122) to recover your profile.'
					);
				} else {
					$return_data = array(
						'status' => 'message',
						'msg'	 => 'Wrong email or password!'
					);
				}

				echo json_encode($return_data);
				exit;
			}
		}
	}

	public function do_signout()
	{
		$this->session->sess_destroy();
		redirect(base_url(), 'refresh');
	}

	public function forgot_password()
	{
		$data = array(
			'header' => $this->load->view('header', '', TRUE),
			'footer' => $this->load->view('footer', '', TRUE)
		);
		$this->load->view('forgot_password_email', $data);
	}

	public function forgot_pass_succ()
	{
		$this->load->model('user_model');
		$rand = $this->generate_keyword();
		$res = $this->user_model->get_pass($rand);

		//$user_type = $this->input->post('radiog_dark');
		log_message("ERROR", $this->db->last_query());
		if ($res)
		{
			$this->forgot_mail($this->user_model->get_user_by_email_type(),$rand);
			$return_data = array(
				'status' => 'redirect',
				'url'	 => 'user/forgot_success'
			);
			echo json_encode($return_data);
			exit;
		}
		else
		{
			$return_data = array(
				'status' => 'message',
				'msg'	 => 'Wrong email or user type!'
			);
			echo json_encode($return_data);
			exit;
		}
	}

	public function forgot_mail($user, $rand)
	{
		// $this->load->library('mailer');
		//
		// $subject = "New password";
		//
		// $data = array(
		// 	'intro' => "Dear ".$user->full_name,
		// 	'body' 	=> "As per your request, your password has changed successfully. Your new credentials is:<br/>Password: {$rand}<br/><br/> We are highly recommended to change the password after first login."
		// );
		//
		//
		// $this->mailer->send_mail($user->email, $subject, $this->load->view('mail_template',$data,TRUE));


		$config = Array(
        'protocol'  => 'smtp',
        'smtp_host' => 'ssl://smtp.googlemail.com',
        'smtp_port' => 465,
        'smtp_user' => 'caretutors.com@gmail.com', // change it to yours
        'smtp_pass' => 'caretutorpassword', // change it to yours
        'mailtype'  => 'html',
        'charset'   => 'iso-8859-1',
        'wordwrap'  => TRUE
        );

				$from      	= 'caretutors.com@gmail.com';
        $to      		= $user->email;
        $subject    = "New password";
				$bodyText = array(
					'intro' => "Dear ".$user->full_name,
					'body' 	=> "As per your request, your password has changed successfully. Your new credentials is:<br/>Password: {$rand}<br/><br/> We are highly recommended to change the password after first login."
				);
        $message    = $this->load->view('mail_template',$bodyText,TRUE);


        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");
        $this->email->from($from);
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($message);

				if($this->email->send()) {
            return true;
        } else {
            show_error($this->email->print_debugger());
        }
	}

	public function generate_keyword(){
		$chars = array(
			'a', 'b', 'c', 'd',
			'e', 'f', 'g', 'h',
			'i', 'j', 'k', 'l',
			'm', 'n', 'o', 'p',
			'q', 'r', 's', 't',
			'u', 'v', 'w', 'x',
			'y', 'z'
		);
		$symbols = array('#', '?', '!');//removed %, @
		$key = '';
		$temp = array();
		for($i=1; $i<7; $i++){
			$item = array();
			$item[] = $chars[rand(0,25)];
			$item[] = rand(0,9);
			$item[] = strtoupper($chars[rand(0,25)]);
			$item[] = $symbols[rand(0,7)];
			$temp[] = $item[rand(0,3)];
		}
		shuffle($temp);
		foreach($temp as $t){
			$key = $key . $t;
		}
		return $key;
	}

	public function forgot_success()
	{
		$data = array(
			'header' => $this->load->view('header', '', TRUE),
			'footer' => $this->load->view('footer', '', TRUE)
		);
		$this->load->view('forgot_success', $data);
	}

}

/* End of file user.php */
/* Location: ./application/controllers/user.php */
