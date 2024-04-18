<?php						
include "../db_connection.php";
 $conn = connectMyDB();
 session_start();
if (isset($_POST["adminLogin"])) {
    $email = $_POST['adminEail'];
    $pass = md5(trim($_POST['adminPassword']));
   
    if ($email == "" || $pass == "") {
        echo '<script>alert("Form field empty !!!");</script>';
    } else {
        $myquery = "SELECT `admin_username`,`admin_email`, `admin_password` FROM `admin` where `admin_email`='$email' and  `admin_password`= '$pass';";
        $getdata = mysqli_query($conn, $myquery) or die(mysqli_error($conn));
        if (mysqli_num_rows($getdata) == 1) {
         $_SESSION['admin_email']=$email;
          echo'Login Success';
          echo '<script>window.location.href="https://dos.omsnepal.com/assets/Admin_Dashboard";</script>';
        } else {
            echo '<script>alert("Invalid credentials !!!");</script>';
            
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" ></script>
    <link rel="stylesheet" href="../assets/css/admin_login.css" />
    <link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@600&family=Poiret+One&display=swap" rel="stylesheet" />
    <title>Admin Login</title>
</head>
<body>
    <!--start navigation bar code line from here -->
    <!--start navigation bar code line from here -->
    <nav class="navbar navbar-expand-lg" style="background-color: #e1e1e1;">
  <div class="container-fluid">
    <a class="navbar-brand text-dark fw-bold fs-2" href="#"><img src="../dos_logo.png" width="55" height="55"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  </div>
</nav> 

    <!--end navigation bar code line from here -->
    <!--end navigation bar code line from here -->
    
    <!--start form section part from here-->
    <!--start form section part from here-->
   <div class="row">
        <div class="col">
            <img src="../img/63787-secure-login.gif" class="w-75">
        </div>
        <div class="col loginmain mt-5">
          <form action="" method="POST"  class="loginform" style="border-radius: 10px;box-shadow: 0px 0px 10px black; margin:auto 5%" >
                <div class="text-center pt-4"><span class="fw-bold fs-1">Admin Login</span> <br> <span>Please enter your valid Username and Password:</span></div>
                <div class="p-2">
            <div class="container form-floating mb-3 mt-2 w-100">
              <input type="text" class="form-control ps-4"  name="adminEail" placeholder="Username">
              <label class="ms-4" for="floatingInput">Username</label>
            </div>

            <div class="container form-floating w-100">
              <input type="password" class="form-control ps-4" name="adminPassword" placeholder="Password">
              <label class="ms-4" for="floatingPassword">Password</label>
            </div>
                </div>
            <div class="mt-3 pb-3 container text-center" >
              <button type="submit" class="btn col-4"  name="adminLogin"
                style="background:red; color:white">Login</button>
            </div>
            <!--<div class="text-center mt-3 pb-3">-->
            <!--  <span>New user? <a href="register.php">Create an Account</a></span>-->
            <!--</div>-->
          </form>
        </div>
    </div>
        <!--end form section part from here-->
       <!--end form section part from here-->
       
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

<!--start footer file code line from here -->
<!--start footer file code line from here -->
<?php
include('../include/footer_file.php');
?>
<!--end footer file code line from here -->
<!--end footer file code line from here -->