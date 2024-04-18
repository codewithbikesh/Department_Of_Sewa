<?php
include "connect_server.php";
include "function_here.php";
if (isset($_POST['user_name'])) {
$username = $_POST["user_name"];
$u_email = $_POST["userEmail"];
$u_feed = $_POST["userFeedback"];
// $to = "eandenepal@gmail.com";
// $to = "chrazesh3@gmail.com";
// $subject = $username;
// $message = $u_feed;
// $from = $u_email;
// $header = "From: $from";
// $abc= mail($to, $subject, $message, $header);



 $to_email = "chrazesh3@gmail.com";
                $subject = "$username";
                $body = "$u_feed";
                $header = "From: $u_email";
                $mail_sent = mail($to_email, $subject, $body, $header);



  if($abc){ 
        $response=array('message'=>'email sent', 'status_code'=>'200');
                 echo json_encode($response);
                   
               }else {
                    $response=array('message'=>'email not sent', 'status_code'=>'404');
                   echo json_encode($response);
                  }

// if($abc){
// echo "Mail gayo k";
// echo $to.'<br>';
// echo $subject.'<br>';
// echo $from .'<br>';
// echo $message .'<br>';
// }
// else{
//     echo "Mail gayna k";
// }
}
?>
  