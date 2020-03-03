<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Alldata extends CI_Controller {

	/**
	 * @author Ariful Islam
	 * @link http://www.oployeelabs.com
	 * @version 1.0
	 */
	
	function __construct()
	{
		parent::__construct();
	}
	
	public function get_city()
	{
		$this->load->model('city_location_model');
		return $this->city_location_model->get_city();
	}
	
	public function get_location($city_id)
	{
		$this->load->model('city_location_model');
		$result = $this->city_location_model->get_location($city_id);
		$return = "<option selected='selected' value=''>Select Location</option>";
		$return .= "<option value=''>All</option>";
		foreach ($result as $res)
		{
			$return .= "<option value='".$res->id."'>".$res->location."</option>";
		}
		echo $return;
	}
	
	public function get_location_dropdown($city_id)
	{
		$this->load->model('city_location_model');
		$result = $this->city_location_model->get_location($city_id);
		
		$return = "";
		$return .= '<select id="sellocation" class="sellocation" name="sellocation"  data-md-selectize>';
		$return .= "<option value=''>Select Location</option>";
		foreach ($result as $res)
		{
			$return .= "<option value='".$res->id."'>".$res->location."</option>";
		}
		$return .= "</select>";
		echo $return;
	}
	
	public function get_location_landing($city_id)
	{
		$this->load->model('city_location_model');
		$result = $this->city_location_model->get_location($city_id);
		$data['locations'] = $result;
		$this->load->view('get_location_landing', $data);
	}
	
	public function get_location_parents_tutor($city_id)
	{
		$this->load->model('city_location_model');
		$result['locations'] = $this->city_location_model->get_location($city_id);
		$this->load->view('ajax_get_location', $result);
		/*$return = "<option value=''>Select Location</option>";
		foreach ($result as $res)
		{
			$return .= "<option value='".$res->id."'>".$res->location."</option>";
		}
		echo $return;*/
	}
	
	public function get_location_with_checkbox($city_id)
	{
		$this->load->model('city_location_model');
		$result = $this->city_location_model->get_location($city_id);
		$return = "";		
		
		if (count($result)>3)
		{
			$number = 1;
			$num = ceil((count($result))/3);
			foreach ($result as $cat)
			{
				if ($number == 1)
				{
					$return .= "<div style='width: 30%; float: left; text-align: left; padding-left: 5px;'>";
				}
				$return .= "<input type='checkbox' name='loc[]' value='".$cat->id."'> ".$cat->location."<br/>";
				if ($number == $num)
				{
					$return .= "</div>";
					$number = 1;
					continue;
				}
				$number++;
			}
			
			if ($number != 1)
			{
				$return .= "</div>";
			}
		}
		else 
		{
			$return .= "<div style='width: 30%; float: left; text-align: left; padding-left: 5px;'>";
			foreach ($result as $cat)
			{
				$return .= "<input type='checkbox' name='loc[]' value='".$cat->id."'> ".$cat->location."<br/>";
			}
			$return .= "</div>";
		}
		
		
		
		echo $return;
	}
	
	public function get_sub_cat($cat_id)
	{
		$this->load->model('category_model');
		$result = $this->category_model->get_sub_category($cat_id);
	
		$return = "<option value=''>Select Class/Course</option>";
		foreach ($result as $res)
		{
			$return .= "<option value='".$res->id."'>".$res->category."</option>";
		}
	
		echo $return;
	}
	public function get_sub_parent($id)
	{
		$this->load->model('category_model');
		$result = $this->category_model->get_sub_parent($id);
                $results = $this->category_model->get_sub_parent($result[0]->parent_id);
                echo $results[0]->parent_id;
		//echo $result;
	}
	
	public function get_sub_cat_dropdown($cat_id)
	{
		$this->load->model('category_model');
		$result = $this->category_model->get_sub_category($cat_id);
		
		//$this->load->view('ajax_sub_category_show', $data);
		$return = "";
		$return .= '<select id="selsubcat" class="selsubcat " name="selsubcat" data-md-selectize>';
		$return .= "<option value='0'>Select Class/Course</option>";
		foreach ($result as $res)
		{
			$return .= "<option value='".$res->id."'>".$res->category."</option>";
		}
		$return .= "</select>";
		echo $return;
	}
	
	public function get_class_landing()
	{
		$category_id = $this->input->post('category_id');
		$class_id = $this->input->post('class_id');
		$this->load->model('category_model');
		if(!empty($category_id)){
		$classes = $this->category_model->get_class_landing($category_id);	
		}else{
		$classes = '';
		}
		

		$categories = $this->category_model->get_category_landing($category_id);
		$data['category_ids'] = $category_id;
		$data['classes'] = $classes;
		$data['class_ids'] = $class_id;
		$data['categories'] = $categories;
		$this->load->view('get_class_landing', $data);
	}
	
	public function institute_autocomplete()
	{
		$q = strtolower($this->input->get('term'));
		if (!$q) return;

		$this->load->model('institute_model');
		$result = $this->institute_model->get_institute($q);
		
		foreach($result as $row)
		{
			$new_row['label']=htmlentities(stripslashes($row->institute));
	        $new_row['value']=htmlentities(stripslashes($row->id));
	        $row_set[] = $new_row;
		}
		
		echo json_encode($row_set);
	}
	
	public function subject_autocomplete()
	{
		$q = strtolower($this->input->get('term'));
		if (!$q) return;

		$this->load->model('sdg_model');
		$result = $this->sdg_model->get_sdg($q);
		
		foreach($result as $row)
		{
			$new_row['label']=htmlentities(stripslashes($row->sdg));
	        $new_row['value']=htmlentities(stripslashes($row->id));
	        $row_set[] = $new_row;
		}
		
		echo json_encode($row_set);
	}
	
	public function ajax_load_subject()
	{
		$this->load->model('category_model');
		$result['sdg'] = $this->category_model->ajax_load_course($this->input->post());
		$result['category_id'] = $this->input->post('cat_id');
		$this->load->view('ajax_subject_list_show', $result);
	}
	
	public function ajax_load_subject_parent_tutor()
	{
		$this->load->model('category_model');
		$this->load->model('tutor_req_model');
		$result['sdg'] = $this->category_model->ajax_load_course($this->input->post());
		$result['category_id'] = $this->input->post('cat_id');
		$job_result = $this->tutor_req_model->get_spec_req($this->input->post('job_id'));
		$subjects = explode(',', $job_result[0]->subjects);

		$return = "";
		
		if(!empty($result['sdg'])){
		$return .= '<div class="uk-form-row">';
		$return .= '<label class="uk-form-label" for="subject">Subject: </label>';
		$return .= '<select id="selSubject" class="product_edit_tags_control" name="sdg[]" multiple>';
		
			foreach ($result['sdg'] as $res)
			{
				$selected = '';
				foreach($subjects as $subject)
				{
					if($subject == $res['id']){
						$selected = 'selected';
					}
				}
				$return .= "<option ".$selected." value='".$res['id']."'>".$res['category']."</option>";
			}
			$return .= "</select>";
			$return .= "</div>";
		}
		
		/*if($result['category_id'] == '3'){
			
			$return .= '<div class="uk-form-row">';
			$return .= '<label class="uk-form-label" for="subject">Medium: </label>';
			$return .= '<p>
                <input type="radio" name="english_medium_from" id="Cambridge" value="cambridge" data-md-icheck />
                <label for="Cambridge" class="inline-label">Cambridge</label>
            </p>';
			$return .= '<p>
                <input type="radio" name="english_medium_from" id="Ed-excel" value="ed_excel" data-md-icheck />
                <label for="Ed-excel" class="inline-label"> Ed-excel </label>
            </p>';
			$return .= '<p>
                <input type="radio" name="english_medium_from" id="IB" value="ib" data-md-icheck />
                <label for="IB" class="inline-label"> IB </label>
            </p>';
			$return .= '</div>';
		} elseif($result['category_id'] == '2'){
			
			$return .= '<div class="uk-form-row">';
			$return .= '<label class="uk-form-label" for="subject">Medium: </label>';
			$return .= '<p>
                <input type="radio" name="bangla_medium_from" id="Bangla version" value="bangla_version" data-md-icheck />
                <label for="Bangla version" class="inline-label"> Bangla version </label>
            </p>';
			$return .= '<p>
                <input type="radio" name="bangla_medium_from" id="English version" value="english_version" data-md-icheck />
                <label for="English version" class="inline-label"> English version </label>
            </p>';

            $return .= '</div>';
		}*/
		echo $return;
	}
	
	public function send_email_to_admin()
	{
		/*$this->load->library('mailer');
		$subject = "Incomplete client profile";
	
		$data = array(
				'intro' => "Dear TeamCareTutor",
				'body' 	=> "Your password has been changed successfully. Your new password is:<br/>Password: {$this->input->post('client_name')} and phone {$this->input->post('client_contact_number')}"
		);
		$this->mailer->send_mail('sazzad@oployeelabs.com', $subject, $this->load->view('mail_template',$data,TRUE));*/
		$config = array(
			  'protocol' => 'smtp',
			  'smtp_host' => 'ssl://smtp.gmail.com',
			  'smtp_port' => 465,
			  'smtp_user' => 'gangstar08012@gmail.com', //teamcaretutors@gmail.com sazzad@oployeelabs.com
			  'smtp_pass' => 'qzucvilybsmachan',
			  'mailtype' => 'html',
			  'charset' => 'iso-8859-1',
		);
		$data = array(
			'intro' => "Dear TeamCareTutor",
			'body' 	=> "A new incomplete profile detected. Profile data is:<br/>Name: {$this->input->post('full_name')} and Phone {$this->input->post('mobile_no')}.<br/>City: {$this->input->post('city')} and Location : {$this->input->post('location')} <br/>Category : {$this->input->post('category')} and Class : {$this->input->post('sub_category')}"
		);
		$message = $this->load->view('mail_template', $data, TRUE);
		$this->load->library('email', $config);
		$this->email->set_newline("\r\n");
		$this->email->from('caretutorsbd@gmail.com','Caretutors');
		$this->email->to('info@caretutors.com'); //info@caretutors.com
		$this->email->subject('Incomplete client profile');
		$this->email->message($message);
		
		if($this->email->send())
		{
			$mail_status = 1;
		}else{
			$mail_status = 0;
		}
		echo $mail_status=0;
	}
	
	public function job_filter()
	{
		var_dump($this->input->post());
		die;
	}
}

/* End of file parents.php */
/* Location: ./application/controllers/parents.php */