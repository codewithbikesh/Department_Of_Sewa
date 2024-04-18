<?php include "header.php";

// start password change query code line from here 
if(isset($_POST['submitBtn'])){
    $admin_email = $_POST['admin_email'];
    $old_password = md5($_POST['current_password']); // New line to get the old password
    $new_password = md5($_POST['newPass']);
    $confirm_password = md5($_POST['confirmPass']);
    
    if($_POST['newPass']==null || $_POST['confirmPass']==null){
        $mgs = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
        <strong>Warning! </strong>Please complete all the input fields.
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>";
    } else {
        $myQry = "SELECT admin_password FROM admin WHERE admin_email = '$admin_email';";
        $conn = connectMyDB();
        $result = mysqli_query($conn, $myQry);

        if (!$result) {
            $mgs = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                           <strong>Warning!</strong>The email you entered does not exist !
                           <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                           </div>";
        } else {
            $row = mysqli_fetch_assoc($result);
            $db_password = $row['admin_password'];

            if ($db_password !== $old_password) {
                $mgs = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                           <strong>Warning!</strong>Incorrect old password!
                           <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                           </div>";
            } elseif ($new_password != $confirm_password) {
                $mgs = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                           <strong>Warning!</strong>You entered confirm password does not match with new password!
                           <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                           </div>";
            } else {
                $sql = "UPDATE admin SET admin_password = '$new_password' WHERE admin_email = '$admin_email';";
                $req = mysqli_query($conn, $sql);
                if ($req == true) {
                    $mgs = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                           <strong>Success! </strong>Congratulations, you have successfully changed your password!
                           <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                           </div>";
                } else {
                    $mgs = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                           <strong>Error!</strong>Password has not been changed.
                           <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                           </div>";
                }
            }
        }
    }
}


// Update the email id from admin panel
// Update the email id from admin panel
if(isset($_POST['submitEmail'])){
    $admin_email = $_POST['admin_email'];
    $current_email = $_POST['currentEmail'];
    $new_email = $_POST['newEmail'];
 if($current_email == "" || $new_email == ""){
    $mgs = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
    <strong>Warning!</strong>Please complete all the input fields. !
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
    </div>";
 }else{
        $myQry = "SELECT admin_email FROM admin WHERE admin_email = '$admin_email';";
        $conn = connectMyDB();
        $result = mysqli_query($conn, $myQry);
        if (!$result) {
            $mgs = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                           <strong>Warning!</strong>The email you entered does not exist !
                           <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                           </div>";
        } else {
            $row = mysqli_fetch_assoc($result);
            $db_email = $row['admin_email'];

            if ($db_email !== $current_email) {
                $mgs = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                           <strong>Warning!</strong>Incorrect old email!
                           <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                           </div>";
            } else {
                $sql = "UPDATE admin SET admin_email = '$new_email' WHERE admin_email = '$admin_email';";
                $req = mysqli_query($conn, $sql);
                if ($req == true) {
                    $mgs = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                           <strong>Success! </strong>Congratulations, you have successfully changed your email!
                           <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                           </div>";
                } else {
                    $mgs = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                           <strong>Error!</strong>Email has not been changed.
                           <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                           </div>";
                }
            }
        }
    }
}



// upload file php submit code line from here 
// upload file php submit code line from here 
if(isset($_POST['submitUpoload'])){
    $path = "assets/Admin_Dashboard/image_upload/profilPicture/";
    $image = basename($_FILES["imageUpload"]["name"]);
    $sql = "SELECT COUNT(*) as count FROM background_image";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
    $rowCount = $row["count"];
if($rowCount >0){
    $myQry = "UPDATE `background_image` SET `image_path`='$path',`image_name`='$image' WHERE 1";
}else{
    $myQry = "INSERT INTO `background_image`(`image_path`, `image_name`) VALUES ('$path','$image')";
}

    $conn = connectMyDB();
    $result = mysqli_query($conn, $myQry);
   //   echo $myQry;
    if($result){
         $mgs = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                      <strong>Wranning!</strong>Image uploaded seccessfully !
                      <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                      </div>";
    }
}


// SMS API Integration update code line start from here 
// SMS API Integration update code line start from here 
if(isset($_POST['submitOtp'])){
    $tokenNumber = $_POST['tokenNumber'];
    $fromSender = $_POST['fromSender'];
    $smsApi = $_POST['smsApi'];
    if($tokenNumber == "" || $fromSender == "" || $smsApi == ""){
      $mgs = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
      <strong>Wranning!</strong>Fill all the input field!
      <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>";
    }else{
    $sql = "SELECT COUNT(*) as count FROM otp";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
if($row["count"] == 0){
    $myQry = "INSERT INTO `otp`(`tokenNumber`, `fromSender`,`api`) VALUES ('$tokenNumber','$fromSender','$smsApi')";
}else{
    $myQry = "UPDATE `otp` SET `tokenNumber`='$tokenNumber',`fromSender`='$fromSender',`api`='$smsApi' WHERE 1";
}
    $result = mysqli_query($conn, $myQry);
   //   echo $myQry;
    if($result){
         $mgs = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                      <strong>Success!</strong>Token Updated Successfully!
                      <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                      </div>";
    }
}
}
?>
<div class="topbar  pt-3" style="background: #424a4a;"><a class="btn"><i class="bi bi-list p-3 text-white" id="colpsCustom"></i></a><span class="text-white fw-bold mt-3">Profile</span>
</div>
<?php
if(isset($mgs)){
     echo $mgs;
}
?>

<!--start form section code line from here -->
<!--start form section code line from here -->
<div class="section">
    <div class="row">
        <div class="col-md-6">
<div class="container d-flex justify-content-center p-2" style="background-color:#e5e5e5; font-family: fangsong; font-size: 21px; margin-top:10px;">
    <h3>Change Password</h3>
</div>
<form action="profile.php" method="POST">
<div class="row m-3 " style="border:1px solid #bbbbbb;background-color: #e5e5e5;">
    <div class="col m-3" style="border:1px solid black; background-color: white;">
        <input type="hidden" id="adminEmail" name="admin_email" value="<?php echo $_SESSION['admin_email']; ?>">
         <div class="input-group mb-3 mt-3">
        <span class="input-group-text font_size_in_mobile" id="basic-addon1">Old Password :</span>
           <input type="password" class="form-control" name="current_password" id="oldPass">
        </div>
        <div class="input-group mb-3 mt-3">
            <span class="input-group-text font_size_in_mobile" id="basic-addon1">New Password :</span>
            <input type="password" class="form-control" name="newPass" id="newPass">
             <!--pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"-->
             <!--   minlength="8"-->
        </div>
        <div class="input-group mb-3 ">
            <span class="input-group-text font_size_in_mobile" id="basic-addon1">Confirm New Password :</span>
            <input type="password" class="form-control" name="confirmPass" id="confirmPass" onchange="uploadFile()">
        </div>
        <button type="submit" class="btn btn-success mb-3" name="submitBtn" id="submitBtn">Submit</button>
    </div>
</div>
</form> 
</div>
  
<!-- second part code line  -->
<!-- second part code line  -->
<div class="col-md-6">
<div class="container d-flex justify-content-center p-2" style="background-color:#e5e5e5; font-family: fangsong; font-size: 21px; margin-top:10px;">
    <h3>Change Email</h3>
</div>
<form action="profile.php" method="POST">
<div class="row m-3 " style="border:1px solid #bbbbbb;background-color: #e5e5e5;">
<div class="col m-3" style="border:1px solid black; background-color: white;">
<input type="hidden" id="adminEmail" name="admin_email" value="<?php echo $_SESSION['admin_email']; ?>">
<div class="input-group my-3">
  <span class="input-group-text font_size_in_mobile" id="basic-addon1">Current Email :</span>
           <input type="text" class="form-control" name="currentEmail" id="currentEmail" placeholder="Enter Current Email">
</div>
<div class="input-group my-3">
  <span class="input-group-text font_size_in_mobile" id="basic-addon1">New Email :</span>
           <input type="text" class="form-control" name="newEmail" id="newEmail" placeholder="Enter New Email">
</div>
 <button type="submit" class="btn btn-success mb-3" name="submitEmail" id="submitEmail">Submit</button>
</div>
</div>
</div>
</form> 
</div>
</div>
<!--second from line code from here -->
<!--second from line code from here -->

  <div class="row">
        <div class="col-md-6">
<div class="container d-flex justify-content-center p-2" style="background-color:#e5e5e5; font-family: fangsong; font-size: 21px; margin-top:10px;">
    <h3>Sms Api Integration</h3>
</div>
<form action="profile.php" method="POST">
<div class="row m-3" style="border:1px solid #bbbbbb;background-color: #e5e5e5;">
    <div class="col m-3" style="border:1px solid black; background-color: white;">
        <input type="hidden" id="adminEmail" name="admin_email" value="<?php echo $_SESSION['admin_email']; ?>">
         <div class="input-group mb-3 mt-3">
        <span class="input-group-text font_size_in_mobile" id="basic-addon1">Add Token :</span>
           <input type="text" class="form-control" name="tokenNumber" id="addToken" placeholder="Enter Token">
        </div>
        <div class="input-group mb-3 mt-3">
            <span class="input-group-text font_size_in_mobile" id="basic-addon1">From Sender Identity :</span>
            <input type="text" class="form-control" name="fromSender" id="fromSender" placeholder="Enter Sender Identity">
             <!--pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"-->
             <!--   minlength="8"-->
        </div>
        <div class="input-group mb-3 ">
            <span class="input-group-text font_size_in_mobile" id="basic-addon1">API URL  :</span>
            <input type="text" class="form-control" name="smsApi" id="smsApi" placeholder="Enter Sender Identity">
        </div>
        <button type="submit" class="btn btn-success mb-3" name="submitOtp" id="submitOtp">Submit</button>
    </div>
</div>
</form> 
<div class="row m-3" style="border:1px solid #bbbbbb;background-color: #e5e5e5;">
    <div class="col m-3" style="border:1px solid black; background-color: white;">
<table class="table">
    <?php
    $conn = connectMyDB();
$sql = "select * from otp";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
    ?>
  <tbody>
    <tr>
      <th scope="col">Add Token :</th>
      <td><?php echo $row['tokenNumber'];?></td>
    </tr>
    <tr>
      <th scope="col">From Sender Identity :</th>
      <td><?php echo $row['fromSender'];?></td>
    </tr>
    <tr>
      <th scope="col">API URL :</th>
      <td><?php echo $row['api'];?></td>
    </tr>
  </tbody>
</table>
    </div>
</div>
</div>
  
<!-- second part code line  -->
<!-- second part code line  -->
<div class="col-md-6">
<div class="container d-flex justify-content-center p-2" style="background-color:#e5e5e5; font-family: fangsong; font-size: 21px; margin-top:10px;">
    <h3>Upload Background Image</h3>
</div>
<form action="profile.php" method="POST" enctype="multipart/form-data">
<div class="row m-3 " style="border:1px solid #bbbbbb;background-color: #e5e5e5;">
<div class="col m-3" style="border:1px solid black; background-color: white;">
<div class="input-group my-3">
  <input class="form-control" type="file" id="image_upload_file" accept="image/png, image/jpeg" onchange="uploadFile()" name="imageUpload">
</div>
 <button type="submit" class="btn btn-success mb-3" name="submitUpoload" id="submitUpoload">Submit</button>
</div>
</div>
</form> 

<div class="container d-flex justify-content-center p-2" style="background-color:#e5e5e5; font-family: fangsong; font-size: 21px; margin-top:10px;">
    <h3>Backup & Restore Database</h3>
</div>
<form action="profile.php" method="POST" enctype="multipart/form-data">
<div class="row m-3 " style="border:1px solid #bbbbbb;background-color: #e5e5e5;">
<div class="col m-3" style="border:1px solid black; background-color: white;">
<div class="input-group my-3">
    <div class="row">
        <div class="col-md-12">
             <h6>Select SQL Backup File:</h6>
        </div>
        <div class="col-md-12">
             <input class="form-control" type="file" name="sql_file" id="sql_file" accept=".sql">
        </div>
    </div>
</div>
 <!--<button type="submit"  name="submitUpoload" id="submitUpoload">Submit</button>-->
 <input type="submit" class="btn btn-success mb-3" name="restore" value="Restore Database">
 <a href="backup_files/backup.php" class="btn btn-success mb-3">Backup Database</a>
</div>
</div>
</form> 

</div>

</div>

</div>

<script>
   async function uploadFile() {
    let formData = new FormData(); 
    formData.append("file", image_upload_file.files[0]);
    await fetch('image_upload/image_uploader.php', {
      method: "POST", 
      body: formData
    }); 
    // alert('The file has been uploaded successfully.');
    $('#image_upload_file').val().replace(/C:\\fakepath\\/i, 'image_upload/profilPicture/');
    // $("#blah").attr("src",name);
    }

     setTimeout(function(){
        //   Closing the alert
        $(".alert").alert('close');
     },4000)
</script>
    <!--$("#submitBtn").click(function () {-->
    <!--    var userEmail = $("#userEmail").val();-->
    <!--    var newPass = $("#newPass").val();-->
    <!--    var confirmPass = $("#confirmPass").val();-->
    <!--    if (newPass == "" || confirmPass == "" || userEmail == "") {-->
    <!--        alert("Please fill the form properly.");-->
    <!--    }-->
    <!--    else if (newPass !== confirmPass) {-->
    <!--        alert("Confirm password does't match with new password");-->
    <!--    }-->
    <!--    else {-->
    <!--            alert("ajax run !!!");-->
    <!--        $.ajax({-->
    <!--            url: "assets/library/database.php",-->
    <!--            method: "POST",-->
    <!--            data: { newPass: newPass, userEmail: userEmail },-->
    <!--            success: function () {-->
    <!--                alert("New Password change successfully !!!");-->
    <!--                location.reload();-->
    <!--            }-->
    <!--        });-->
    <!--    }-->
    <!--})-->

<?php include "footer.php" ?>