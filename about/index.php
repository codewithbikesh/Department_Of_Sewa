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
<body style="box-sizing: border-box;" class="bg-light">
 <nav class="navbar navbar-expand-lg" style="background-color: #e1e1e1;">
  <div class="container-fluid">
    <a href="https://dos.omsnepal.com/home/" style="width:55px; height:55px;"><img src="../dos_logo.png" width="55" height="55"></a>
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
<!--start main section code line from here   -->
<!--start main section code line from here   -->
<div class="container bg-light">
  <div class="section text-dark d-flex justify-content-center text-align-center pt-2 bg-light">
    <h2>Aatmagyan Prachar Sangh (AGPS)</h2>
  </div>
   <main class="bg-light">
     <strong class="fs-4">Brief Introduction </strong> <br>
      <span class="fs-5" style="text-decoration:underline; font-family: Georgia, 'Times New Roman', Times, serif;">Establishment and Objectives</span>
      <div class="row">
        <div class="col-md-8 pt-2">
            <p class="fs-5" style="font-family: Arial, Helvetica, sans-serif; text-align:justify;"> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Since the year 2016 B.S., the work of spreading the message of peace started in Nepal. But only from the year 2027 B.S onwards, this work seems to have an opportunity to progress organizationally. Legally, “Aatmagyan Prachar Sangh” is registered as a non-profit making social organization at District Administration Office, Kathmandu on 2041 B.S. Since then, it has been operating and expanding its activities institutionally across Nepal. Every human being has different needs and desires, but the most basic and important desire is to attain satisfaction, joy and peace in the heart during one's lifetime. Mr. Prem Rawat, an international level peace ambassador who has been providing knowledge (method) to the interested people along with inspiring them about inner peace to experience this joyful live. Aatmagyan Prachar Sangh is doing necessary administrative and other social work for this purpose. For example, it has been running humanitarian assistance programs during natural calamities and all other calamities.</p>
            <p class="fs-5" style="font-family: Arial, Helvetica, sans-serif; text-align:justify;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;The Central Office of AGPS is located in Kathmandu Metropolitan City, Ward No. 26, Samakhusi Marg. In conjunction with the Central Office, its sub-centers and information centers have spreaded across 7 states. Currently, 401 Centers, 117 sub-centers and 6 Information Centers are operational across Nepal. Such centers, sub-centers and information centers are regularly operating. Arrangements have been made to listen/watch audio-visual material related to the message of peace by Prem Rawat. Some centers and sub-centers are in their own buildings. Interested persons can go to the public place at a time convenient to them, read the publication materials and listen to audio, video and "शान्तिको उपहार" materials etc. With the aim of providing complete and necessary information easily, Aatmagyan Prachar Sangh is gradually expanding its centers across Nepal. </p>
        </div>
        <div class="col-md-4 col-ms-12">
            <div class="justify-content-center d-flex">
                <img src="../img/dos.jpg" alt="" style="width: 400px;  height: 400px;" class="shadow p-2 mb-5 bg-body rounded">
            </div>
        </div>
      </div>
      <address class="fs-5" style="font-family: Arial, Helvetica, sans-serif; text-align:justify;">
        Contact Address <br> 
        Aatmgyan Prachar Sangh <br>
        Central Office, Samakhusi Marg, Kathmandu Metropolitan City-26 <br>
        P.O.B- 1396 <br>
        Email: agps@mos.com.np        
      </address>
   </main>
   <!-- start second section code line from here -->
   <!-- start second section code line from here -->
     <section id="secPage">
     <div class="section text-dark d-flex justify-content-center text-align-center pt-2 bg-light">
            <h2 style="text-decoration: underline;">Department of Sewa (DOS)</h2>
     </div>
       <p class="fs-5" style="font-family: Arial, Helvetica, sans-serif; text-align:justify;">Department of Sewa (DOS) was formed throughout the country with the objectives for creating a proper Sewa opportunity and to prepare trained and untrained volunteer. DOS has started to perform on behalf of AGPS for fulfilling the demand of trained, efficient and effective volunteers.</p>
       <strong class="fs-4">What is the main task of DOS ?</strong>
       <ul type="1">
        <li class="fs-5">Record of each and every member</li>
        <li class="fs-5">Availability and accessibility of volunteers as per departmental demand through proper and scientific selection and communication</li>
        <li class="fs-5">Volunteers short-listing according to academic and vocational qualification, professional experiences and sewa experiences, area of interest for sewa, time provided for regular and event sewa</li>
       </ul>
     </section>
</div>
<!-- end main section code line from here  -->
<!-- end main section code line from here  -->

        <!--footer section include here -->
        <!--footer section include here -->
        <?php
        include('../include/footer_file.php');
        ?>


