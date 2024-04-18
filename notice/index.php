<?php 
//session part
//session part
session_start();
if (isset($_SESSION['username'])) {
    //   echo $_SESSION['username'];
}
 else if ($_SESSION['username'] == '') {
     echo "no sesssion";
    echo"<script>window.location.href='../index.php';</script>";
 }
 //session part
 //session part
 
include '../db_connection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Department Of Sewa</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
 <script src="	https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
 <script src="https://kit.fontawesome.com/9a86d78b3d.js"></script>
</head>
<body style="overflow-x: hidden;">
 <nav class="navbar navbar-expand-lg" style="background-color: #e1e1e1;">
  <div class="container-fluid">
    <a href="../home/" style="width:55px; height:55px;"><img src="../dos_logo.png" width="55" height="55"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-between" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link text-dark fw-bold" aria-current="page" href="https://dos.omsnepal.com/entry.php">Entry</a>
        <a class="nav-link text-dark fw-bold" href="https://dos.omsnepal.com/eventreport/">Event</a>
        <a class="nav-link text-dark fw-bold" href="https://dos.omsnepal.com/notice/">Notice</a>
        <a class="nav-link text-dark fw-bold" href="https://dos.omsnepal.com/about/">About</a>
      </div>
       <div style="display:flex; justify-content:center;">
        <a href="https://dos.omsnepal.com/assets/User_Dashboard/" style="color:black; text-decoration:none; padding-right:10px;"><i class="fa-solid fa-user mt-2"></i>&nbsp; <?php if (isset($_SESSION['username'])) {echo $_SESSION['username'];} ?></a>
        <a href="https://dos.omsnepal.com/logout/" style="color:black; text-decoration:none;"><i class="fa-solid fa-right-from-bracket mt-2"></i>&nbsp; Logout</a>
      </div>
    </div>
         
  </div>
</nav> 
       <!--set background image on dashboard -->
       <!--set background image on dashboard -->
       <div class="container-fluid p-1" style="display:flex; justify-content:center; background-color:#61625d1f;">
       <div class="row">
        <div class="col-md-12">
        <section class="header_section">
            <div class="container-fluid"><h4>Notification From Department Of Sewa</h4></div>
        </section>
        </div>
       </div>
    </div>
       <div class="container-fluid p-5" style="height:70vh; display:flex; justify-content:center; background-color:#61625d1f;">

       <div class="row w-100">
       <?php 
      $selectQuery="SELECT * FROM `notification` where active_status = 1";
      $con = connectMyDB();
      $i=1;
      $queryPass=mysqli_query($con,$selectQuery);
      while( $result = mysqli_fetch_assoc($queryPass)){
         ?>
      <div class="col-sm-6">
       <div class="card">
       <div class="card-body">
       <h5 class="card-title"><?php echo $result['notification_rTitle']; ?></h5>
        <p class="card-text"><?php echo $result['notification_rDescription']; ?></p>
        <section style="background-color:#edeff6; padding:8px; display: flex; flex-direction: column; align-items: left;">
    <a href="../assets/Admin_Dashboard/pdf_files/files/<?php echo $result['pdf_rName']; ?>" style="text-decoration:none; color:black; font-size:16px; margin-bottom: 10px;"><?php echo $result['pdf_rName']; ?></a>
    <a href="../assets/Admin_Dashboard/pdf_files/files/<?php echo $result['pdf_rName']; ?>" style="text-decoration:none; color:white; background-color:red; padding:8px 16px; font-size:14px; font-weight:bold; text-align:center;" download>Download PDF</a>
</section>
      </div>
    </div>
  </div>
<?php 
      }
?>
</div>      
</div>      
</div>      
        <!--footer section include here -->
        <!--footer section include here -->
        <?php
        include('../include/footer_file.php');
        ?>


