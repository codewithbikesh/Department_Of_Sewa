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

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Department Of Sewa</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
 <script src="https://kit.fontawesome.com/9a86d78b3d.js"></script>
</head>
<body style="overflow-x: hidden;">
 <nav class="navbar navbar-expand-lg" style="background-color: #e1e1e1;">
  <div class="container-fluid">
    <a href="#" style="width:55px; height:55px;"><img src="../dos_logo.png" width="55" height="55"></a>
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
    <?php 
     
     include('../library/db_conn.php');
     $selectQuery="SELECT * FROM `background_image`;";
     $conn = connectMyDB();
     $queryPass=mysqli_query($conn,$selectQuery);
     $sql = "SELECT COUNT(*) as count FROM background_image";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
    $rowCount = $row["count"];
    $blank = "https://c1.wallpaperflare.com/preview/427/745/192/notebook-natural-laptop-macbook.jpg";
 $result = mysqli_fetch_assoc($queryPass);
        ?>
       <!--set background image on dashboard -->
       <!--set background image on dashboard -->
       <div class="container-fluid" style="padding:0px; margin:0px;">
           <img src="../<?php $img1 = ($rowCount == 0)?  $blank: $result['image_path'] . $result['image_name'] ; echo $img1; ?>" alt="image not show ! something went wrong !!" width="100%" height="700">
       </div>
        <!--footer section include here -->
        <!--footer section include here -->
        <?php
        include('../include/footer_file.php');
        ?>


