<?php
//session part
//session part
session_start();
if (isset($_SESSION['username'])) {
    //   echo $_SESSION['username'];
}
 else if ($_SESSION['username'] == '') {
     echo "no sesssion";
    echo"<script>window.location.href='index.php';</script>";
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
 <script src="	https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
 <script src="https://kit.fontawesome.com/9a86d78b3d.js"></script>
</head>
<body style="overflow-x: hidden;">
 <nav class="navbar navbar-expand-lg" style="background-color: #e1e1e1;">
  <div class="container-fluid">
    <a class="navbar-brand text-dark fw-bold fs-2" href="../home/">DOS</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-between" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link text-dark fw-bold" aria-current="page" href="https://dos.omsnepal.com/entry.php">Entry</a>
        <a class="nav-link text-dark fw-bold" href="https://dos.omsnepal.com/eventreport/">Event</a>
      </div>
       <div style="display:flex; justify-content:center;">
        <a href="assets/User_Dashboard/" style="color:black; text-decoration:none; padding-right:10px;"><?php if (isset($_SESSION['username'])) {echo $_SESSION['username'];} ?> &nbsp; <i class="fa-solid fa-user mt-2"></i></a>
        <a href="https://dos.omsnepal.com/logout/" style="color:black; text-decoration:none;">Logout &nbsp; <i class="fa-solid fa-right-from-bracket mt-2"></i></a>
      </div>
    </div>
         
  </div>
</nav> 
