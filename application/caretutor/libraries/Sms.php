<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sms {

    public function __construct()
    {
        // Do something with $params
    }
    
    public function send_sms($mobile_number, $message)
    {
    	$mob_f4 = substr($mobile_number, 0, 4);
    	$mob_f2 = substr($mobile_number, 0, 2);
    	
    	if ($mob_f4 == '+880')
    	{
    		$mobile_number = substr($mobile_number, 1);
    	}
    	elseif ($mob_f4 == '0088')
    	{
    		$mobile_number = substr($mobile_number, 2);
    	}
    	elseif ($mob_f2 == '01')
    	{
			$mobile_number = '88'.$mobile_number;    		
    	}
    	elseif ($mob_f2 == '88')
    	{
    	}
    	else 
    	{
    		exit;
    	}
    	//log_message("ERROR", "Mobile - ".$mobile_number);
    	
    	$url = "http://121.241.242.114:8080/sendsms";
    	$post_data ="username=xtec-shahdul&password=shahdul0&type=0&dlr=1&destination=".$mobile_number."&source=Caretutors&message=".$message;
    	$ch = curl_init();
    	curl_setopt($ch, CURLOPT_URL, "$url");
    	curl_setopt($ch, CURLOPT_HEADER, 0);
    	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    	curl_setopt($ch, CURLOPT_POST, 1);
    	curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
    	$result = curl_exec($ch);
    	curl_close($ch);
    	
		
		return $result;
    }
    
}

?>