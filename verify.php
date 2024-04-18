<?php
include('db_connection.php');
$conn = connectMyDB();
session_start();
			if(isset($_GET['email'])){
				$username = $_GET['email'];
			}
			//echo $_SESSION['otp'];
			if(isset($_POST['submitbtn'])){
				$otp = $_POST['otp'];
				if($otp == $_SESSION['otp']){
					$verifyUser = $conn->prepare("UPDATE login_det SET verified=true WHERE user_email=?");
					$verifyUser->bind_param("s",$username);
					if($verifyUser->execute()){
					 $message = '<div class="container">
							<div class="alert alert-success alert-dismissible">
								<button type="button" class="close" data-dismiss="alert">&times;</button>
								You have been verified successfully
							</div>
						</div>';
					echo "<script>
						setTimeout(function() {
							window.location.href = 'https://omsnepal.com/';
						}, 4000); // 10 seconds (4000 milliseconds)
					</script>";

					} else {
					$message = '<div class="container">
							<div class="alert alert-danger alert-dismissible">
								<button type="button" class="close" data-dismiss="alert">&times;</button>
								Failed to verify
							</div>
						</div>';
					}
				} else {
				$message = '<div class="container">
						<div class="alert alert-danger alert-dismissible">
							<button type="button" class="close" data-dismiss="alert">&times;</button>
							Wrong OTP. Please try again
						</div>
					</div>';
				
				}
			}
?>
<html>
	<head>
		<title>Verify OTP</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
		<style>
			.height-100 {
    height: 100vh
}

.card {
    width: 400px;
    border: none;
    height: 300px;
    box-shadow: 0px 5px 20px 0px #d2dae3;
    z-index: 1;
    display: flex;
    justify-content: center;
    align-items: center
}

.card h6 {
    color: green;
    font-size: 20px
}

.inputs input {
    width: 150px;
    height: 40px
}

input[type=number]::-webkit-inner-spin-button,
input[type=number]::-webkit-outer-spin-button {
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    margin: 0
}

.card-2 {
    background-color: #fff;
    padding: 10px;
    width: 350px;
    height: 100px;
    bottom: -50px;
    left: 20px;
    position: absolute;
    border-radius: 5px
}

.card-2 .content {
    margin-top: 50px
}

.card-2 .content a {
    color: rgb(252, 41, 41)
}

.form-control:focus {
    box-shadow: none;
    border: 2px solid rgb(34, 18, 18)
}

.validate {
    border-radius: 20px;
    height: 40px;
    background-color: rgb(245, 23, 23)(76, 0, 255);
    border: 1px solid rgb(43, 31, 31);
    width: 140px
}
		</style>
	</head>
	<body>
		<div class="container">
			<!-- <p class="display-3 text-center">Register user with OTP in SMS</p>
			<p class="display-3 text-center">Verify OTP</p>
			<p class="lead">Enter the OTP you received on your phone, in the box below.</p>
			<form action="" method="post">
				<div class="form-group">
					<label for="otp">One Time Password:</label>
					<input type="number" class="form-control" placeholder="Enter OTP" name="otp" id="otp" required>
				</div>
				<button type="submit" name="submitbtn" class="btn btn-primary">Submit</button>
			</form> -->

			<div class="container height-100 d-flex justify-content-center align-items-center">
    <div class="position-relative">
		<?php if(isset($message)){echo $message;} ?>
        <div class="card p-2 text-center">
			<h4>Verify OTP</h4>
            <h6>Please enter the one time password <br> to verify your account</h6>
            <div> <span>A code has been sent to</span> <small>your mobile number !</small> </div>
			<form action="" method="post">
            <div id="otp" class="inputs d-flex flex-row justify-content-center mt-2"> 
			<input class="m-2 text-center form-control rounded" type="text" maxlength="6" name="otp" required></div>
            <div class="mt-4"> <button type="submit" class="btn btn-primary px-4 validate" name="submitbtn">Verify</button> </div>
			</form>
        </div>
    </div>
</div>
		</div>
	</body>
</html>