<?php
  include('db_connection.php');
  $conn = connectMyDB();
  // Function definition
// function popMsg($message) {
      
//     // Display the alert box 
//     echo "<script>alert($message);</script>";
// }
// if (isset($_POST['fname'])) {
//     $userfname = $_POST['fname'];
//     $userphone = $_POST['phone'];
//     $useremail = $_POST['email'];
//     $user_new_password = $_POST['new_password'];
//     $user_confirm_password = $_POST['confirm_password'];
 
//         $encrypted_pwd = md5($user_new_password === $user_confirm_password); // Encrypt the password using md5 (Note: md5 is not recommended for secure password hashing)
//         $myquery = "SELECT `user_email`, `user_mobile_no` FROM `login_det` WHERE `user_email` = '$useremail' OR `user_mobile_no` = '$userphone';";
//         $result = mysqli_query($conn,$myquery);
//         // echo $result;
//         if (mysqli_num_rows($result) != "") {
//             // header('Location: register.php');
//           popMsg("Either Email or Phone already exists. Please try with a different email and phone. Thank you !!!");
//             // echo "Either Email or Phone already exists. Please try with a different email and phone. Thank you !!!";
//             exit; // Stop further execution of the script
//         } else  {
//             $query = "INSERT INTO `login_det` (`username`, `user_email`, `user_mobile_no`, `password`) VALUES ('$userfname', '$useremail', '$userphone', '$encrypted_pwd');";
//             $req = mysqli_query($conn, $query) or die(mysqli_error($conn));
//             if ($req) {
//               popMsg("Register Success. Please proceed to login.");
//                 // header('Location: index.php');
//                 exit; // Stop further execution of the script
//             } else {
//                 popMsg("Something went wrong. Please retry. Thank you!");
//                 // header('Location: register.php');
//                 exit; // Stop further execution of the script
//             }
//         }
    
// }
function popMsg($message) {
    // Display the alert box 
    echo $message;
}

if (isset($_POST['fname'])) {
    $userfname = $_POST['fname'];
    $userphone = $_POST['phone'];
    $useremail = $_POST['email'];
    $user_new_password = $_POST['new_password'];
    $user_confirm_password = $_POST['confirm_password'];
 
    if ($user_new_password === $user_confirm_password) {
        // Encrypt the password using password_hash()
        $encrypted_pwd = md5($user_new_password);
        
        // Use prepared statements to prevent SQL injection attacks
        $stmt = $conn->prepare("SELECT `user_email`, `user_mobile_no` FROM `login_det` WHERE `user_email` = ? OR `user_mobile_no` = ?");
        $stmt->bind_param("ss", $useremail, $userphone);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows != 0) {
            // popMsg("Either Email or Phone already exists. Please try with a different email and phone. Thank you !!!");
            // echo "<script>alert('Either Email or Phone already exists. Please try with a different email and phone. Thank you !!!');</script>";
            echo json_encode('Either Email or Phone already exists. Please try with a different email and phone. Thank you !!!');
            exit; // Stop further execution of the script
        } else {
            $stmt = $conn->prepare("INSERT INTO `login_det` (`username`, `user_email`, `user_mobile_no`, `password`) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssss", $userfname, $useremail, $userphone, $encrypted_pwd);
            $stmt->execute();
            
            if ($stmt) {
                popMsg("Register Success. Please proceed to login.");
                header("Location: https://omsnepal.com/");
                exit; // Stop further execution of the script
            } else {
                popMsg("Something went wrong. Please retry. Thank you!");
                exit; // Stop further execution of the script
            }
        }
    } else {
        popMsg("Passwords do not match. Please try again.");
        exit; // Stop further execution of the script
    }
}
?>