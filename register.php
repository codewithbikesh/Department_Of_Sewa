<?php
include('db_connection.php');
$conn = connectMyDB();
session_start();
include "send-sms.php";

// Initialize the error message variable
$errorMsg = "";

if (isset($_POST['req_submit'])) {
    $username = $_POST['fname'];
    $password = $_POST['new_password'];
    $confirmPassword = $_POST['confirm_password'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];

    // Check if the new password and confirm password match
    if ($password !== $confirmPassword) {
        $errorMsg = "Password and Confirm Password do not match.";
    } else {
        // Passwords match, proceed with registration

        // Check if email or mobile already exists
        $checkEmailQuery = $conn->prepare("SELECT * FROM login_det WHERE user_email = ?");
        $checkEmailQuery->bind_param("s", $email);
        $checkEmailQuery->execute();
        $resultEmail = $checkEmailQuery->get_result();

        $checkMobileQuery = $conn->prepare("SELECT * FROM login_det WHERE user_mobile_no = ?");
        $checkMobileQuery->bind_param("i", $mobile);
        $checkMobileQuery->execute();
        $resultMobile = $checkMobileQuery->get_result();

        if ($resultEmail->num_rows > 0) {
            // Email already exists, set the error message
            $errorMsg = "Email already exists.";
        } elseif ($resultMobile->num_rows > 0) {
            // Mobile number already exists, set the error message
            $errorMsg = "Mobile number already exists.";
        } else {
            // Email and Mobile are not in use, proceed with registration

            $passwordHash = md5($password);
            $otp = rand(10000, 999999);
            $msg = "The OTP for registering your account on Department Of Sewa is " . $otp;
            $response = sendSMS(array($mobile), $msg, $tokenNumber, $fromSend, $url);
            $obj = json_decode($response);

            if (isset($obj->status) && $obj->status == "success") {
                session_start();
                $_SESSION['otp'] = $otp;
                // Include email in the INSERT query
                $saveUser = $conn->prepare("INSERT INTO login_det(username, password, user_mobile_no, user_email) VALUES(?,?,?,?)");
                $saveUser->bind_param("ssss", $username, $passwordHash, $mobile, $email);

                if ($saveUser->execute()) {
                    header("Location: verify.php?email=" . $email);
                }
            } else {
                $errorMsg = "Message not sent. Try again later";

                if (isset($obj->code)) {
                    $errorCode = $obj->code;
                    if ($errorCode == "7") {
                        $errorMsg = "Insufficient Credits! Please recharge your account";
                    } else if ($errorCode == "32") {
                        $errorMsg = "Invalid number format";
                    } else if ($errorCode == "51") {
                        $errorMsg = "Invalid number or number is in DND registry";
                    } else if ($errorCode == "192") {
                        $errorMsg = "Invalid time. Messages can be sent only from 9 AM to 9 PM";
                    } else if ($errorCode == "4") {
                        $errorMsg = "No number specified";
                    }
                }
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Register</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
 <script src="	https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
 <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>-->
 <script src="https://kit.fontawesome.com/9a86d78b3d.js" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</head>

<body style="overflow-x:hidden" >
   <div class="fw-bold p-2" style="background-color:#e1e1e1; width:100%;">
        <div class="row">
          <div class="col-md-1 d-flex justify-content-center">
        <img src="dos_logo.png" width="80" height="80"> 
    </div>
    
    <div class="col-md-11 text-center">
        <span class="fs-4">आत्मज्ञान प्रचार संघ</span><br>
        <span class="fs-4">Department of Sewa(DoS)</span><br>
         <span>केन्द्रीय कार्यालय, सामाखुसी, काठमाडौं</span>
    </div>
    </div>
    
    </div>
    <div class="row">
        <!--<div class="col">-->
        <!--    <img src="img/63787-secure-login.gif" class="w-75">-->
        <!--</div>-->
        <div class="col loginmain mt-5">
         <form action="" method="POST">
    <div class="row row-cols-1 row-cols-md-2 p-2">
      <div class="col">
        <div class="col-12 text-center">
          <img src="img/112454-form-registration.gif" class="w-75"><br>
        </div>
      </div>
      <div class="col">
        <div class="col-12 ">
          <div class="col-10 row-cols-1 text-center mt-3 m-auto"
            style="padding: 1rem;border-radius: 10px;box-shadow: 0px 0px 10px black;">
               <?php
    // Display the error message above the form
    if (!empty($errorMsg)) {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
   '. $errorMsg .'
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
    }
    ?>
            <div class="col-12 fw-bold text-center p-1">
              <span class="fs-1">Register</span><br>
              <span>Please fill in the fields below:</span>
            </div>
            <div class=" container form-floating mb-3 w-100">
              <input type="text" class="form-control ps-4" placeholder="First Name" id="userName" name="fname" minlength="2" required>
              <label class="ms-4" for="floatingUsername">Username</label>
            </div>
            <div class=" container form-floating mb-3 w-100">
              <input type="phone" class="form-control ps-4" placeholder="phone" id="userMobileNo" name="mobile" minlength="10"
                maxlength="10" onkeypress="return event.charCode>=48 && event.charCode<=57" ondrop="return false"
                pattern="[9]{1}[6-8]{1}[0-2,4-8]{1}[0-9]{7}" required>
              <label class="ms-4" for="floatingInput">Phone</label>
            </div>
            <div class=" container form-floating mb-3 w-100">
              <input type="email" class="form-control ps-4" placeholder="name@example.com" id="userEmail" name="email"
                pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{3,3}$" required>
              <label class="ms-4" for="floatingInput">E-mail</label>
            </div>
             
            <div class="row">
                <div class="col-md-6">
              <div class="container form-floating w-100">
              <input type="password" class="form-control ps-4" placeholder="Password" id="userNewPassword" name="new_password"
                pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" minlength="8" required>
              <!-- <i class="bi bi-eye-slash fs-3"  id="togglePassword" style="position: relative; bottom: 50px; left: 229px;"></i> -->
              <label class="ms-4" for="floatingPassword">New Password</label>
              </div>
                </div>
                
                <div class="col-md-6">
                      <div class="container form-floating w-100">
                <input type="password" class="form-control ps-4" placeholder="Password" id="userConfirmPassword" name="confirm_password"
                pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" minlength="8" required>
              <!-- <i class="bi bi-eye-slash fs-3"  id="togglePassword" style="position: relative; bottom: 50px; left: 229px;"></i> -->
               <label class="ms-4" for="floatingPassword">Confirm Password</label>
               </div>
                </div>
            </div>
            <div class="mt-3"><button type="submit" id="registerBtn" name="req_submit" class="btn col-5"
                style="background:red; color:white;">Save</button></div>
            <div class="text-center mt-3 pb-3">
              <span>Already have an account? <a href="https://dos.omsnepal.com/">Login</a></span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>
        </div>
    </div>
</body>
</html>
<?php
include('include/footer_file.php');
?>

