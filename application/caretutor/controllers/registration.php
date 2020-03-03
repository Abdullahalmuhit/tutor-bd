<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Registration extends CI_Controller {

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
        
		$this->load->model('registration_model','model');
	}

	public function parrents_registration()
	{
		$this->check_is_logged_in();
		$data = array(
					'header' => $this->load->view('header', '', TRUE),
					'footer' => $this->load->view('footer', '', TRUE)
				);
		$this->load->view('parrent_registration', $data);
	}

	public function tutor_registration()
	{
		$this->check_is_logged_in();
		$data = array(
				'header' => $this->load->view('header', '', TRUE),
				'footer' => $this->load->view('footer', '', TRUE)
		);
		$this->load->view('tutor_registration', $data);
	}

	public function add_basic_info()
	{
		$this->load->helper('date');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('full_name', 'Name', 'required');
		$this->form_validation->set_rules('mobile_no', 'Mobile No', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE):
			$return_data = array(
					'status' => 'message',
					'msg'	 => validation_errors('<div class="">', '</div>')
			);
			echo json_encode($return_data);
			exit;
		endif;

		if ($this->agent->is_mobile()) {
            $agent = $this->agent->mobile().' '.$this->agent->platform();
        } elseif ($this->agent->is_browser()) {
            $agent = $this->agent->browser().' '.$this->agent->version().' '.$this->agent->platform();
        } elseif ($this->agent->is_robot()) {
            $agent = $this->agent->robot().' '.$this->agent->platform();
        } else {
            $agent = 'Unidentified User Agent';
        }

		$user_id = ($this->input->post('user_id'))?$this->input->post('user_id'):now();
		$data = array(
			'full_name' => $this->input->post('full_name'),
			'user_id'	=> $user_id,
			'mobile_no' => $this->input->post('mobile_no'),
			'email'		=> $this->input->post('email'),
			'password'	=> md5($this->input->post('password')),
			'user_type' => $this->input->post('user_type'),
			'registration_ip' => $this->input->ip_address(),
			'registration_device' => $agent,
			'created_at' => date('Y-m-d H:i:s')
		);
		$result = $this->model->add_basic_info($data);

		if($result == 1)
		{
			$this->session->set_userdata('id',$this->db->insert_id());
			$this->session->set_userdata($data);
			//$this->send_email();
			//$this->send_sms($this->input->post('mobile_no'));
			$return_data = array(
		   		'status' => 'redirect',
				'url'	 => "user/login/".TRUE
		   	);
			echo json_encode($return_data);
			exit;
		}

		$return_data = array(
				'status' => 'message',
				'msg'	 => $result
		);

		echo json_encode($return_data);
	}

	public function send_email()
	{
		$this->load->library('mailer');

		$subject = "Please verify your account";
		$verify_link = base_url().'registration/verify/'.$this->session->userdata('user_id').'/1/'.$this->session->userdata('user_type');
		$verify_link_final = "<a href='{$verify_link}'>{$verify_link}</a>";

		$body = ($this->session->userdata('user_type')=='tutor')?"Thanks for creating an account with caretutors.com. Your login credentials are:<br/><br/>Email: {$this->input->post('email')}<br/>Password: {$this->input->post('password')}<br /><br /> You need to verify your account by clicking the following link: <br />{$verify_link_final}":"Thanks for creating an account with caretutors.com. To get your desired tutor please post your tutor requirements minutely. It will take only few minutes. <br/><br/>Your login credentials are:<br/><br/>Email: {$this->input->post('email')}<br/>Password: {$this->input->post('password')}";

		$data = array(
				'intro' => "Dear ".$this->input->post('full_name'),
				'body' 	=> $body
		);


		$this->mailer->send_mail($this->input->post('email'), $subject, $this->load->view('mail_template',$data,TRUE));
	}

	public function send_sms($mobile)
	{

		if ($this->session->userdata('user_type') == 'tutor')
		{
			return;
			exit;
		}

		$message = rawurlencode('Thanks for creating an account with caretutors.com. To get your desired tutor please post your tutor requirements minutely.');
		$this->load->library('sms');
		$result = $this->sms->send_sms($mobile, $message);

	}

	public function verify($user_id, $status, $user_type)
	{
		$data = array (
					'verify_status' => '1'
		);
		$this->model->verify_user($data, $user_id);

		$this->load->model('user_model');
		$user = $this->user_model->get_user_by_id($user_id);
		$this->send_email_to_tutor($user->full_name, $user->email);

		redirect('signin/auto_signin/'.$user_type);
	}

	public function send_email_to_tutor($user, $email)
	{
		$this->load->library('mailer');

		$subject = "Complete your profile today";

		$body = "Thanks for creating an account with caretutors.com. Please complete your profile today and apply to your desired tutoring jobs. Your profile is the most important tool to get a tutoring job faster. So, take some time and do it right. Happy Tutoring!";

		$data = array(
				'intro' => "Dear ".$user,
				'body' 	=> $body
		);


		$this->mailer->send_mail($email, $subject, $this->load->view('mail_template',$data,TRUE));
	}

	public function check_is_logged_in()
	{
		if ($this->session->userdata('user_type'))
		{
			if ($this->session->userdata('user_type') == 'guardian')
			{
				redirect('parents/dashboard','refresh');
			}
			elseif ($this->session->userdata('user_type') == 'tutor')
			{
				redirect('tutor/dashboard','refresh');
			}
			exit;
		}
	}

	public function parents_registration_frontend()
	{
		$this->load->helper('date');
		$user_id = ($this->input->post('user_id'))?$this->input->post('user_id'):now();

		$data = array(
					'full_name' => $this->input->post('full_name'),
					'user_id'	=> $user_id,
					'mobile_no' => $this->input->post('mobile_no'),
					'email'		=> $this->input->post('email'),
					'password'	=> md5($this->input->post('password')),
					'user_type' => $this->input->post('user_type')
				);
		$this->load->model('registration_model');
		$this->load->model('notification_model', 'notification');
		$result = $this->model->add_basic_info($data);

		if($result == 1)
		{
                        $this->session->set_userdata('gretings','1');
			$this->session->set_userdata('id',$this->db->insert_id());
			$this->session->set_userdata($data);

			if($this->input->post('sdg')){
				$subjects = implode(',', $this->input->post('sdg'));
			}else{
				$subjects = '';
			}

			if($this->input->post('institute_id')){
				$ins_id = ($this->input->post('institute_id')!="")?$this->input->post('institute_id'):$this->populate_ins_id();
			}else{
				$ins_id = 0;
			}

			$this->load->model('tutor_req_model');
			$data = array(
					'user_id' 				=> $this->session->userdata('id'),
					'city_id'				=> $this->input->post('selcity'),
					'location_id' 			=> $this->input->post('sellocation')?$this->input->post('sellocation'):'104',
					'guardian_name'			=> $this->input->post('guardian_name')?$this->input->post('guardian_name'):null,
					'add_contact_num'		=> $this->input->post('add_contact_num')?$this->input->post('add_contact_num'):null,
					'student_gender'		=> $this->input->post('selstgender')?$this->input->post('selstgender'):null,
					'institute_id'			=> $ins_id,
					'institute_name'		=> $this->input->post('institute_name'),
					'tution_category_id'	=> $this->input->post('selcat'),
					'tution_sub_cat_id'		=> $this->input->post('selsubcat'),
					'days_per_week' 		=> $this->input->post('selday'),
					'salary_range' 			=> $this->input->post('salary'),
					'preferred_gender' 		=> $this->input->post('selgender'),
					'address' 				=> $this->input->post('address'),
					'no_of_student'			=> $this->input->post('no_of_student'),
					'other_req' 			=> $this->input->post('otherreq'),
					'subjects'				=> $subjects,
					'status' 				=> 'post',
					'skype_id'				=> $this->input->post('skype_id')?$this->input->post('skype_id'):null,
					'english_medium_from'	=> $this->input->post('english_medium_from')?$this->input->post('english_medium_from'):null,
					'bangla_medium_from'	=> $this->input->post('bangla_medium_from')?$this->input->post('bangla_medium_from'):null,
					'date_to_hire'			=> $this->input->post('date_to_hire')?date('Y-m-d',strtotime($this->input->post('date_to_hire'))):null,
					'source'				=> $this->input->post('selhear')
			);

			if ($this->input->post('tutoring_time')) {
                $data['tutoring_time'] = date('H:i:s', strtotime($this->input->post('tutoring_time')));
            }

			$result = $this->tutor_req_model->add_tutor_req($data);

			$message = '<a target="_blank" href="'.base_url('parents/how_it_works').'">How it works.</a>';
			$this->send_notification('42', $this->session->userdata('id'), $message);

			$client_id 	= $this->session->userdata('id');
			$subject 	= 'How to select a good tutor profile?';
			$message 	= 'Learn how to select a good tutor <a target="_blank" href="'.base_url('parents/select_good_tutor').'">Click here to </a>';

			$this->tutor_req_model->email_send_to_client($this->session->userdata('id'), $subject, $message);
			//$this->send_email();
			//$this->send_sms($this->input->post('mobile_no'));

			$config = array(
			  'protocol' => 'smtp',
			  'smtp_host' => 'ssl://smtp.gmail.com',
			  'smtp_port' => 465,
			  'smtp_user' => 'gangstar08012@gmail.com', //teamcaretutors@gmail.com sazzad@oployeelabs.com
			  'smtp_pass' => 'xgnrgpklsbxyxang',
			  'mailtype' => 'html',
			  'charset' => 'iso-8859-1',
			);
			$data = array(
				'client_name' => $this->input->post('full_name')
			);
			$message = $this->load->view('client_registration_success_mail_template', $data, TRUE);
			$this->load->library('email', $config);
			$this->email->set_newline("\r\n");
			$this->email->from('info@caretutors.com','Caretutors');
			$this->email->to($this->input->post('email')); //caretutorsbd@gmail.com
			$this->email->subject('Welcome to Caretutor');
			$this->email->message($message);
			$this->email->send();

			$return_data = array(
						   	'status' => 'redirect',
							'url'	 => "user/login/".TRUE
						   );
			$this->notification->job_post_notification($result, $this->session->userdata('id'), 'Website');
			echo json_encode($return_data);
			exit;
		}

		$return_data = array(
				'status' => 'message',
				'msg'	 => $result
		);

		echo json_encode($return_data);
	}

	function send_notification($sender_id, $receiver_id, $message)
	{
		$this->load->model('tutor_req_model');
		$data_notification = array(
				'receiver_id' => $receiver_id,
				'sender_id' => $sender_id,
				'notification' => $message,
				'created_at'	=> date('Y-m-d H:i:s')
			);
		$this->tutor_req_model->send_notification($data_notification);
	}
}

/* End of file registration.php */
/* Location: ./application/controllers/registration.php */
