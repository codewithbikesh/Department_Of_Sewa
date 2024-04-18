<?php
include('assets/library/database.php');
 $conn = connectMyDB();
 session_start();

// if (isset($_POST["newPass"])) {
//     $newPass = md5($_POST["newPass"]);
//     $username = $_POST["username"];
//     $myQry = "UPDATE `login_det` SET `password`='$newPass' where username='$username'";
//     $conn = connectMyDB();
//     $req = mysqli_query($conn, $myQry);
//     if ($req == false) {
//         echo "cannot execute :" . $myQry;
//     } else {
//         popMsg("Password change successfully");
//     }
// }

// if(isset($_POST['ult_customer_email'])){
//     $eamil = $_POST['ult_customer_email'];
//     $sql="SELECT IF (EXISTS(SELECT * FROM users where `email`='sangin@gmail.com'),1,0) as result;";
//     $result = check_if_exist($sql);
//     if($result==1){
//         echo json_encode(give_response(200));
//     }
//     else if($result==0){
//         echo json_encode(give_response(502));
//     }
//     else{
//         echo json_encode(give_response(501));
//     }
// }


    if(isset($_POST['newPass'])){
        $newpassword = md5($_POST['newPass']);
        $password = md5($_POST['oldPass']);
        $confirmnewpassword = md5($_POST['confirmPass']);
        $username = $_POST['userName'];
        $myQry = "SELECT password FROM login_det WHERE username = '$username';";
        echo  $myQry;
        $result = mysqli_query($conn, $myQry);
        // echo $result;
        if(!$result)
        {
        echo "The username you entered does not exist";
        }
        else if($password!= $result)
        {
        echo "You entered an incorrect password";
        }else{
                $sql= "UPDATE login_det SET password='$newpassword' where username = '$username';";
        echo $sql;
        $req = mysqli_query($conn, $sql);
        if($req)
        {
        echo "Congratulations You have successfully changed your password";
        }
      else
        {
      echo "Passwords do not match";
      }
        }
        
}

?>