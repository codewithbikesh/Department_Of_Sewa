<?php
// include('db_connection.php');
// $conn = connectMyDB();
session_start();
$sql = "select * from otp";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
$tokenNumber = $row['tokenNumber'];
$fromSend = $row['fromSender'];
$url = $row['api'];
function sendSMS($numbers, $msg, $tokenNumber, $fromSend, $url) {
    $numbers = implode(',', $numbers);
    // $url = "http://api.sparrowsms.com/v2/sms/";
    $args = http_build_query(array(
        'token' => $tokenNumber,
        'from' => $fromSend,
        'to' => $numbers,
        'text' => "Your OTP is: $msg", // Remove the rawurlencode function here
    ));

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $args);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    $response = curl_exec($ch);
    curl_close($ch);

    if ($response) {
        return json_encode(array('status' => 'success'));
    } else {
        return json_encode(array('status' => 'error', 'code' => '0')); // You can set an appropriate error code here.
    }
}

?>
