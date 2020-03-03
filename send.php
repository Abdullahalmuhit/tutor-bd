<?php
/*
$mobile_number=$_REQUEST['mobile'];
$message=$_REQUEST['message'];
$curl = curl_init();
curl_setopt_array($curl, array(
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_HTTPGET => 1,
    CURLOPT_URL => 'http://121.241.242.114:8080/sendsms?username=xtec-shahdul&password=shahdul0&type=0&dlr=1&destination='.$mobile_number.'&source=Caretutors&message='.$message
));
$resp = curl_exec($curl);
echo $resp;
curl_close($curl);

*/
//$mobile_number=$_REQUEST['mobile'];
//$message=$_REQUEST['message'];

$mobile_number="8801717550536";
$message="Hi";

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
echo $result;
echo "ashish";
?>