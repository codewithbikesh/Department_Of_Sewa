<?php
include('smtp/PHPMailerAutoload.php');
// require 'smtp/class.phpmailer.php';
echo smtp_mailer('connectedwithme100@gmail.com','Test Subject','Hello CodeWithBG, How are you?');
function smtp_mailer($to,$subject, $msg){
	$mail = new PHPMailer(); 
	$mail->IsSMTP(); 
	$mail->SMTPAuth = true; 
	$mail->SMTPSecure = 'tls'; 
	$mail->Host = "smtp.omsnepal.com";
	$mail->Port = 587; 
	$mail->IsHTML(true);
	$mail->CharSet = 'UTF-8';
// 	$mail->SMTPDebug = 2; 
	$mail->Username = "dos@omsnepal.com";
	$mail->Password = "Dos#@21^^??";
	$mail->SetFrom("dos@omsnepal.com");
	$mail->Subject = $subject;
	$mail->Body =$msg;
	$mail->AddAddress($to);
	$mail->SMTPOptions=array('ssl'=>array(
		'verify_peer'=>false,
		'verify_peer_name'=>false,
		'allow_self_signed'=>false
	));
	if(!$mail->Send()){
		echo $mail->ErrorInfo;
	}else{
		return 'Sent';
	}
}
?>
