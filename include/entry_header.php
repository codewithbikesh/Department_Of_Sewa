<?php
//session part
//session part
session_start();
if (isset($_SESSION['username'])) {
    //   echo $_SESSION['username'];
}
 else if ($_SESSION['username'] == '') {
     echo "no sesssion";
    echo"<script>window.location.href='https://dos.omsnepal.com/';</script>";
 }
 
//session part
//session part

// connection to the database 
// connection to the database 
include('../db_connection.php');
?>
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta charset="ISO-8859-1">
  <title>Entry</title>
  <!-- Bootstrap CSS -->
  <!--start image source code line here  -->
  <link href="../image_upload/css/style.css" rel="stylesheet">
  <!--end  image source code line here  -->
  <link rel="stylesheet" href="../css/custom.css">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/font.min.css"> 
  <link rel="stylesheet" href="../style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/datepicker.css">
  <!--<link rel="stylesheet" href="https://unpkg.com/nepali-date-picker@2.0.1/dist/nepaliDatePicker.min.css" crossorigin="anonymous" />-->
  <link href="http://nepalidatepicker.sajanmaharjan.com.np/nepali.datepicker/css/nepali.datepicker.v4.0.1.min.css" rel="stylesheet" type="text/css"/>  
  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
  <!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="../js/customjquery.js"></script>

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <style>
    /* image error message  */
     #otherEducation{
      display: none;
    }
    .error {
            background-color: #d9534f;
            font-weight: 300;
            font-size: 12px;
            padding: 3px 6px 3px 6px;
            color: #fff;
            text-align: center;
            white-space: nowrap;
        }
    /* end image error message */

    .panel-heading {
      padding: 5px 15px;
    }

    .panel-title {
      font-weight: bold;
    }

    .InputStyle {
      /* height: 22px; */
      height: 28px;
    }

    .Language {
      height: 28px;
      /* outline: hidden; */
      /* border-color: transparent; */
      /* border-bottom: 4px dotted #a7a7a7; */
      /* background-color: #f2f2f2; */
    }

    #ContainerStyle {

      border-radius: 10px;
    }

    #rowStyle {
      margin: 10px 10px 10px 10px;
      padding: 10px;
    }

    .col {
      padding: 5px;

    }

    label {
      font-size: 12px;
      font-weight: 12px;
      font-family: 'Times New Roman', Times, serif;
    }

    .SpanStyle {
      display: flex;
      flex-direction: row;
      margin: 5px;
      align-items: center;
    }

    #SewaDetails {
      width: 97%;
      height: 300px;
      border: 2px solid black;
      padding: 10px;

    }

    .YesNo {
      display: flex;
      flex-direction: column;
    }

    .CheckBoxStyle {
      display: flex;
      flex-direction: row;
    }

    .icon {
      outline: none;
      border: none;
      background: transparent;

    }

    .save{
      background-color: #a7a7a7;
      border-radius: 5px;
      color: white;
    }

    .SaveIcon {
      height: 15px;
      width: 15px;
    }
  div h4 a {
    color:black;
  }

    /* start css code for report button from  here   */
    #ReportStyle {
      text-decoration: none;
      color: white;
    }

    #BlockOpen {
      display: none;
    }
    
  </style>
</head>
<body>
<nav class="navbar navbar-expand-lg" style="background-color: #e1e1e1;">
  <div class="container-fluid">
   <a href="../home/" style="width:55px; height:55px;"><img src="../dos_logo.png" width="55" height="55"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-between" id="navbarNavAltMarkup">
      <div class="navbar-nav" style="display:flex; align-items:center;">
        <a class="nav-link text-dark fw-bold" aria-current="page" href="https://dos.omsnepal.com/entry.php">Entry</a>
        <a class="nav-link text-dark fw-bold" href="https://dos.omsnepal.com/eventreport/">Event</a>
        <a class="nav-link text-dark fw-bold" href="https://dos.omsnepal.com/notice/">Notice</a>
        <a class="nav-link text-dark fw-bold" href="https://dos.omsnepal.com/about/">About</a>
      </div>
       <div style="display:flex; justify-content:right; align-items:center; padding-top:13px;">
        <a href="https://dos.omsnepal.com/logout/" style="color:black; text-decoration:none;">Logout &nbsp; <i class="fa-solid fa-right-from-bracket mt-2"></i></a>
      </div>
    </div>
         
  </div>
</nav> 
