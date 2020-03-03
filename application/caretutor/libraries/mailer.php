<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mailer {
    
    private $subject = '';
    private $body = '';
    private $from = '';
    private $to = '';
	
	function send_mail_to()
    {
    	$CI =& get_instance();
    	$CI->load->library('email');
        
       	$config['protocol'] = 'sendmail';
		$config['mailtype'] = 'html';
		$config['charset'] = 'utf-8';
		$config['wordwrap'] = TRUE;
            	
        $CI->email->initialize($config);
                
        $CI->email->to($this->to);
        $CI->email->from($this->from, 'Care Tutors');
        $CI->email->subject($this->subject);
                
        $CI->email->message($this->body);
        $email_sent = $CI->email->send();

        return  ($email_sent)?true:false;
    	
        //kpzdqqasylxdauaz
        
        
        /* $config = Array(
        		'protocol' => 'smtp',
        		'smtp_host' => 'ssl://smtp.googlemail.com',
        		'smtp_port' => 465,
        		'smtp_user' => 'arif@oployeelabs.com',
        		'smtp_pass' => 'kpzdqqasylxdauaz',
        		'mailtype' => 'html',
        		'charset' => 'iso-8859-1',
        		'wordwrap' => TRUE
        );
        
        $CI->email->message($this->body);
        $CI->load->library('email', $config);
        $CI->email->set_newline("\r\n");
        $CI->email->from('info@caretutors.com');
        $CI->email->to($this->to);
        $CI->email->subject($this->subject);
		$email_sent = $CI->email->send();

        return  ($email_sent)?true:false; */	        
	}
	
	function send_mail($to,$subject,$body,$from='noreply@caretutors.com')
	{
		$this->subject = $subject;
		$this->to = $to;
		$this->body = $body;
        $this->from = $from;
     	$is_email_sent = $this->send_mail_to();
     	return $is_email_sent;   
	}
    
}  
