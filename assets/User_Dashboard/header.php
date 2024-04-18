<?php 
date_default_timezone_set("asia/kathmandu");
session_start(); 
//session part
//session part
if (isset($_SESSION['username'])) {
    //   echo $_SESSION['username'];
}
 else if ($_SESSION['username'] == '') {
     echo "no sesssion";
    echo"<script>window.location.href='https://dos.omsnepal.com/';</script>";
 }
 //session part
 //session part
 

include "assets/library/database.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title></title>
    <!--<link rel="icon" href="assets/image/logo/favicon.ico">-->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <!-- datatable -->
    <!-- datatable -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/select/1.3.4/css/select.dataTables.css" />
    <!-- datatable -->
    <!-- datatable -->

    <!-- Custom fonts for this template-->
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="assets/css/user-style.css" rel="stylesheet">

    <link rel="stylesheet" href="assets\css\style.css">
    <link rel="stylesheet" href="assets\css\responsive.css">

    <!-- jquery script -->
    <!-- jquery script -->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery.session@1.0.0/jquery.session.min.js"></script>
    <!-- jquery script -->
    <!-- jquery script -->

    <!-- bootstrap cdn -->
    <!-- bootstrap cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- bootstrap cdn -->
    <!-- bootstrap cdn -->

    <!--jquery cdn-->
  <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
   <!--jquery session-->
  <script src="https://cdn.jsdelivr.net/npm/jquery.session@1.0.0/jquery.session.min.js"></script>
</head>
 <script>
//   var re=$.session.get("user");
//   alert(re);
 </script>
<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background:black;">

            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
             <a class="nav-link">
                    <i class="bi bi-person-circle"></i>
                    <span  id='email_here' type="<?php  echo $_SESSION['user_email'] ?>" title="<?php  echo $_SESSION['username'] ?>"><?php if (isset($_SESSION['username'])) {echo $_SESSION['username'];} ?></span>
                </a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="index.php">
                    <i class="fa fa-user" aria-hidden="true"></i>
                    <span>User Activities</span></a>
            </li>
            <!--<li class="nav-item">-->
            <!--    <a class="nav-link" href="eventDetails.php">-->
            <!--        <i class="bi bi-list-ol"></i>-->
            <!--        <span>Event Details</span></a>-->
            <!--</li>-->
            <li class="nav-item">
                <a class="nav-link" href="https://dos.omsnepal.com/assets/User_Dashboard/profile/">
                   <i class="fa fa-key" aria-hidden="true"></i>
                    <span>Change Passwod</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Addons
            </div>
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">
              <li class="nav-item">
                <a class="nav-link" href="../../home/">
                   <i class="bi bi-shop"></i>
                    <span>Go to Home</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="https://dos.omsnepal.com/logout/">
                    <i class="bi bi-box-arrow-left"></i>
                    <span>Logout</span></a>
            </li>
            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle text-dark border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">