<?php
session_start();

$ch = $_POST['ch'];

switch ($ch) {
    case 'send_otp':
        $num = $_POST['mob'];
        $otp = rand(10000, 999999);
        $_SESSION['otp'] = $otp;

		$args = http_build_query(array(
			'token' => 'v2_oBhShvABYKUzvNF75rrx7mfIIAG.NgUG',
			'from'  => 'Demo',
			'to'    => $num,
			'text'  => "Your OTP is: $otp",));
	
		$url = "http://api.sparrowsms.com/v2/sms/?";
	
		# Make the call using API.
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS,$args);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	
		// Response
		$response = curl_exec($ch);
		$status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		curl_close($ch);

        if ($response) {
            echo 'success';
        } else {
            echo 'Failed to send OTP';
        }
        break;

    case 'verify_otp':
        $user_otp = $_POST['otp'];
        $verify_otp = $_SESSION['otp'];

        if ($verify_otp == $user_otp) {
            echo "success";
        } else {
            echo "OTP verification failed";
        }
        break;

    default:
        echo "Invalid choice";
        break;
}
?>
