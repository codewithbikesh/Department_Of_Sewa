<?php include "../header_profile.php";
if (isset($_POST['submitBtn'])) {
    $user_name = $_POST['userName'];
    $old_password = md5($_POST['current_password']); // New line to get the old password
    $new_password = md5($_POST['newPass']);
    $confirm_password = md5($_POST['confirmPass']);

    if ($_POST['newPass'] == null || $_POST['confirmPass'] == null) {
        $mgs = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                           <strong>Warning! </strong>Please complete all the input fields.
                           <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                           </div>";
    } else {
        $myQry = "SELECT password FROM login_det WHERE username = '$user_name';";
        $conn = connectMyDB();
        $result = mysqli_query($conn, $myQry);

        if (!$result) {
            $mgs = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                           <strong>Warning!</strong>The username you entered does not exist !
                           <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                           </div>";
        } else {
            $row = mysqli_fetch_assoc($result);
            $db_password = $row['password'];

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
                $sql = "UPDATE login_det SET password='$new_password' WHERE username = '$user_name';";
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
?>

<div class="topbar  pt-3" style="background: #424a4a;"><a class="btn"><i class="bi bi-list p-3 text-white" id="colpsCustom"></i></a><span class="text-white fw-bold mt-3">Change
        Password</span>
</div>
<?php
if(isset($mgs)){echo $mgs;}
?>
 <form action="https://dos.omsnepal.com/assets/User_Dashboard/profile/" method="POST">
<div class="row m-3 " style="border:1px solid #bbbbbb;background-color: #e5e5e5;">
    <div class="col m-3" style="border:1px solid black; background-color: white;">
        <input type="hidden" id="userName" name="userName" value="<?php echo $_SESSION['username']; ?>">
       <div class="input-group mb-3 mt-3">
        <span class="input-group-text font_size_in_mobile" id="basic-addon1">Old Password :</span>
           <input type="password" class="form-control" name="current_password" id="oldPass">
        </div>
        <div class="input-group mb-3 mt-3">
            <span class="input-group-text font_size_in_mobile" id="basic-addon1">New Password :</span>
            <input type="password" class="form-control" name="newPass" id="newPass">
            <!--pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"-->
            <!--    minlength="8"-->
        </div>
        <div class="input-group mb-3 ">
            <span class="input-group-text font_size_in_mobile" id="basic-addon1">Confirm New Password :</span>
            <input type="password" name="confirmPass" class="form-control" id="confirmPass">
        </div>
        <button type="submit" class="btn btn-danger mb-3" name="submitBtn" id="submitBtn">Submit</button>
    </div>
</div>
</form>

<?php include "../footer_profile.php" ?>

 <script type="text/javascript">
        setTimeout(function () {
  
            // Closing the alert
            $('.alert').alert('close');
        }, 2000);
    </script>

    <!-- $("#submitBtn").click(function () {-->
    <!--    var oldPass = $("#oldPass").val();-->
    <!--    var userName = $("#userName").val();-->
    <!--    var newPass = $("#newPass").val();-->
    <!--    var confirmPass = $("#confirmPass").val();-->
    <!--    if (newPass == "" || confirmPass == "" || userName == "" || oldPass == "") {-->
    <!--        alert("Please fill the form properly.");-->
    <!--    }-->
    <!--    else if (newPass !== confirmPass) {-->
    <!--        alert("Confirm password does't match with new password");-->
    <!--    }-->
    <!--    else {-->
    <!--        $.ajax({-->
    <!--            url: "changeSubmit.php",-->
    <!--            method: "POST",-->
    <!--            data: { oldPass: oldPass, newPass: newPass, userName: userName},-->
    <!--            success: function (data) {-->
    <!--                console.log(data);-->
    <!--            var da = JSON.parse(data);-->
    <!--             if(da.status_code==200){-->
    <!--                alert("Password Change successfully.");-->
    <!--                 location.reload();-->
    <!--            }-->
    <!--            else{-->
    <!--                alert("Old Password did't match");-->
    <!--            }-->
                   
    <!--            }-->
    <!--        });-->
    <!--    }-->
    <!--})-->
