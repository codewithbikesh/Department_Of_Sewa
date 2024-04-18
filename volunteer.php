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
 
include 'db_connection.php';

// header file part here 
// header file part here 
// include('include/header_file.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
   <!--datatable css-->
   <!--datatable css-->
   <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
   <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.css" />
   <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/select/1.3.4/css/select.dataTables.css" />
   <!--datatable css-->
   <!--datatable css-->
   
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
   <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
   <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.colVis.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/select/1.3.4/js/dataTables.select.js"></script>
   
   <script src="https://kit.fontawesome.com/9a86d78b3d.js" crossorigin="anonymous"></script>
   <script src="https://cdn.datatables.net/fixedcolumns/4.3.0/js/dataTables.fixedColumns.min.js"></script>
   <link rel="stylesheet" href="style.css">
   <title>Report Filter</title>
</head>
<body style="overflow: hidden;">
    <nav class="navbar navbar-expand-lg" style="background-color: #e1e1e1;">
  <div class="container-fluid">
    <a class="navbar-brand text-dark fw-bold fs-2" href="index_dashboard.php">DOS</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-between" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link text-dark fw-bold" aria-current="page" href="entry.php">Entry</a>
        <!-- <li class="nav-item dropdown">-->
        <!--  <a class="nav-link dropdown-toggle text-dark fw-bold" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">-->
        <!--    Entry-->
        <!--  </a>-->
        <!--  <ul class="dropdown-menu">-->
        <!--    <li><a class="dropdown-item text-dark fs-6" href="entry.php">Volunteer</a></li>-->
        <!--    <li><a class="dropdown-item text-dark fs-6" href="emailsend.php">mail testing</a></li>-->
        <!--  </ul>-->
        <!--</li>-->
        <a class="nav-link text-dark fw-bold" href="eventreport/">Event</a>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-dark fw-bold" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Report
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item text-dark fs-6" href="index1.php">Member Report</a></li>
            <li><a class="dropdown-item text-dark fs-6" href="volunteer.php">Volunteer Report</a></li>
            <!--<li><a class="dropdown-item text-dark fs-6" href="eventreport/">Event Report</a></li>-->
          </ul>
        </li>
        <!--<a class="nav-link text-dark fw-bold" href="new_user.php">User</a>-->
        <a class="nav-link text-dark fw-bold" href="admin/">Admin</a>
      </div>
       <div style="display:flex; justify-content:center;">
        <a href="assets/User_Dashboard/" style="color:black; text-decoration:none; padding-right:10px;"><?php if (isset($_SESSION['username'])) {echo $_SESSION['username'];} ?> &nbsp; <i class="fa-solid fa-user mt-2"></i></a>
        <a href="logout.php" style="color:black; text-decoration:none;">Logout &nbsp; <i class="fa-solid fa-right-from-bracket mt-2"></i></a>
      </div>
    </div>
         
  </div>
</nav> 
<nav class="navigationbar" style="background-color:#53efd9; style="overflow-x:hidden;"">
      <!--<div class="p-4 fs-5">-->
      <!-- <label for="all">Volunteer</label>-->
      <!-- <input type="checkbox" name="" class="checkbox_check" id="allDetails" onclick="GetReport('Volunteer','allrec')">-->
      <!--</div>-->
      <!-- data-bs-toggle="collapse" href="#collapseExample" -->
      <!-- multilevel dropdown starts -->
      <div class="dropdown p-4 fs-5" id="myDropdown">
      <a class="dropdown-toggle fs-5" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false" style="color:black; text-decoration:none">Select Filter Option</a>
  <ul class="dropdown-menu " aria-labelledby="dropdownMenuButton">
    <li><a class="dropdown-item" id="all" onclick="GetReport('allRecords','allrec')">All</a></li>
    <li><a class="dropdown-item">District &raquo;</a>
      <ul class="dropdown-menu dropdown-submenu submenu1">
         <?php
         $selectQuery="SELECT DISTINCT `District` FROM `center_list` order by `District`";
         $con = connectMyDB();
         $queryPass=mysqli_query($con,$selectQuery);
         while( $result = mysqli_fetch_assoc($queryPass)){
          ?>
        <li><a class="dropdown-item showing" id="result"  onclick="GetReport('district','<?php echo $result['District']?>');"><?php echo $result["District"] ?></a> </li>
        <?php
         }
        ?>
      </ul>
    </li>
    <li><a class="dropdown-item" href="#">Education &raquo;</a>
        <ul class="dropdown-menu dropdown-submenu submenu2">
        <?php
       
         $selectQuery1="SELECT DISTINCT `education` FROM `education`";
         $con = connectMyDB();
         $queryPass1=mysqli_query($con,$selectQuery1);
         while( $result = mysqli_fetch_assoc($queryPass1)){
          ?>
        <li><a class="dropdown-item showing" id="byEducation" onclick="GetReport('Education','<?php echo $result['education']?>');"><?php echo $result["education"] ?></a> </li>
        <?php
         }
        ?>
        </ul>
    </li>
    <li><a class="dropdown-item" href="#">Department &raquo;</a>
    
      <ul class="dropdown-menu dropdown-submenu submenu2">
        <?php
       
         $selectQuery1="SELECT DISTINCT `department` FROM `department` order by department";
         $con = connectMyDB();
         $queryPass1=mysqli_query($con,$selectQuery1);
         while( $result = mysqli_fetch_assoc($queryPass1)){
          ?>
        <li><a class="dropdown-item showing" id="byEducation" onclick="GetReport('Department','<?php echo $result['department']?>');"><?php echo $result["department"] ?></a> </li>
        <?php
         }
        ?>
        </ul>
    </li>
    <a class="dropdown-item" href="#" id="showRange">Age Group</a>
    <li><a class="dropdown-item" href="#">Experience &raquo;</a>
    <ul class="dropdown-menu dropdown-submenu submenu2">
        <?php
        $con = connectMyDB();
         $selectQuery1="SELECT DISTINCT `department_name` FROM `servicedepartment` where experience='1'";
         $queryPass1=mysqli_query($con,$selectQuery1);
         while( $result = mysqli_fetch_assoc($queryPass1)){
          ?>
        <li><a class="dropdown-item showing" id="byEducation" onclick="GetReport('Experience','<?php echo $result['department_name']?>');"><?php echo $result["department_name"] ?></a> </li>
        <?php
         }
        ?>
        </ul>
    </li>
    <li><a class="dropdown-item" href="#">Interest &raquo;</a>
    <ul class="dropdown-menu dropdown-submenu submenu2">
        <?php
       
        //  $selectQuery1="SELECT DISTINCT `experience` FROM `experience`";
        $selectQuery1="SELECT DISTINCT `department_name` FROM `servicedepartment` where interest='1'";
         $con = connectMyDB();
         $queryPass1=mysqli_query($con,$selectQuery1);
         while( $result = mysqli_fetch_assoc($queryPass1)){
          ?>
        <li><a class="dropdown-item showing" id="byEducation" onclick="GetReport('Interest','<?php echo $result['department_name']?>');"><?php echo $result["department_name"]?></a></li>
        <?php
         }
        ?>
        </ul>
  
  </li>
    <li><a class="dropdown-item">Center(AGPS) &raquo;</a>
       <ul class="dropdown-menu dropdown-submenu submenu2">
       <?php
         $selectQuery2="SELECT DISTINCT `center` FROM `center_list` order by `center`";
         $con = connectMyDB();
         $queryPass2=mysqli_query($con,$selectQuery2);
         while( $result = mysqli_fetch_assoc($queryPass2)){
          ?>
        <li><a class="dropdown-item showing" id="byEducation" onclick="GetReport('Center','<?php echo $result['center']?>');"><?php echo $result["center"] ?></a> </li>
        <?php
         }
        ?>
       </ul>
  </li>
  <li><a class="dropdown-item">Gender Wise&raquo;</a>
       <ul class="dropdown-menu dropdown-submenu submenu2">
       <?php
         $selectQuery2="SELECT DISTINCT `rGender` FROM `introductiondetails` order by `rGender`";
         $con = connectMyDB();
         $queryPass2=mysqli_query($con,$selectQuery2);
         while( $result = mysqli_fetch_assoc($queryPass2)){
          ?>
        <li><a class="dropdown-item showing" id="byEducation" onclick="GetReport('Gender','<?php echo $result['rGender']?>');"><?php echo $result["rGender"] ?></a> </li>
        <?php
         }
        ?>
       </ul>
  </li>
  <li><a class="dropdown-item">Region&raquo;</a>
       <ul class="dropdown-menu dropdown-submenu submenu2">
       <?php
         $selectQuery2="SELECT DISTINCT `reason` FROM `agps` order by `reason`";
         $con = connectMyDB();
         $queryPass2=mysqli_query($con,$selectQuery2);
         while( $result = mysqli_fetch_assoc($queryPass2)){
          ?>
        <li><a class="dropdown-item showing" id="byEducation" onclick="GetReport('region','<?php echo $result['reason']?>');"><?php echo $result["reason"] ?></a> </li>
        <?php
         }
        ?>
       </ul>
  </li>
  <li><a class="dropdown-item">Occupation&raquo;</a>
       <ul class="dropdown-menu dropdown-submenu submenu2">
       <?php
         $selectQuery2="SELECT DISTINCT `rEducation` FROM `introductiondetails` order by `rEducation`";
         $con = connectMyDB();
         $queryPass2=mysqli_query($con,$selectQuery2);
         while( $result = mysqli_fetch_assoc($queryPass2)){
          ?>
        <li><a class="dropdown-item showing" id="byEducation" onclick="GetReport('occupation','<?php echo $result['rEducation']?>');"><?php echo $result["rEducation"] ?></a> </li>
        <?php
         }
        ?>
       </ul>
  </li>
  </ul>
</div>   <!-- multilevel dropdown ended -->
<div class="age-grp">
 <label for="" class="fs-5">From:</label>
 <input type="text" name="from" id="from_range">
 <label for="" class="fs-5">To:</label>
 <input type="text" name="to" id="to_range">
 <input type="submit" value="Submit" onclick="GetReportBy('ageGrp')"> 
</div>
<!--<div class="text-end ms-3" style="position:absolute; right:1rem;"><a href="index_dashboard.php" style="text-decoration:none;color:black"><i class="fa-solid fa-house-user"></i> Dashboard</a></div>-->
</nav>

<div class="" id="collapseExample"  style="padding:10px;">
    <!--style="display:none;"-->
<table class="fixedTable" id="reportTable">
   <thead>
      <tr>
         <!--<th>Sno</th>-->
         <th>Action</th>
         <th>Image</th>
         <th>Role</th>
         <th style="width:100px;">Nepali Name</th>
         <th style="width:100px;">English Name</th>
         <th style="width:150px;">Date Of Birth in B.S</th>
         <th style="width:150px;">Date Of Birth in A.D</th>
         <th>Age</th>
         <th>Gender</th> 
         <th>Nationality</th>
         <th>Education</th>
         <th>Profession</th>
         <th style="width:100px;">Marital Status</th>
         <th style="width:100px;">Matri Bhasa</th>
         <th>Nagrikta No.</th>
         <th style="width:150px;">Permanent Address</th>
         <th style="width:150px;">Temporary Address</th>
         <th>Telephone</th>
         <th>Mobile</th>
         <th>Email</th>
      </tr>
   </thead>
   <tbody class="showByFilter" id="tbody_1">
      <?php 
     
      $selectQuery="SELECT introductiondetails.id,introductiondetails.rRole,introductiondetails.rRole,introductiondetails.imagepath,introductiondetails.image,introductiondetails.rName,introductiondetails.rNameCapital,introductiondetails.rDOB,introductiondetails.eDate,introductiondetails.rAge,introductiondetails.rGender,introductiondetails.rNational,introductiondetails.rEducation,introductiondetails.rProfession,introductiondetails.rMarital,introductiondetails.rMotherToungue,introductiondetails.rCitizenshipNo,permanentaddress.rDistrict as pd,currentaddress.rDistrict as cd,currentaddress.rTelephoneNo,currentaddress.rMobileNo,currentaddress.rEmail FROM((introductiondetails INNER JOIN permanentaddress ON introductiondetails.id=permanentaddress.intro_id) INNER JOIN currentaddress on introductiondetails.id=currentaddress.intro_id) where  introductiondetails.rRole='Volunteer';";
      $con = connectMyDB();
      $i=1;
      $queryPass=mysqli_query($con,$selectQuery);
      while( $result = mysqli_fetch_assoc($queryPass)){
         ?>
      <tr>
          <td>
             <a href="report.php?ids=<?php echo $result['id'] ?>"><i class="fa-solid fa-eye"></i></a>
             <a href="updatepages/updatepage.php?id=<?php echo $result['id']?>"><i class="fa-solid fa-edit" style="color:black; font-size:20px;"></i></a>
<!--             <a href="updatepages/updatepage.php?id=<?php echo $result['id']; ?>&amp;sid=<?php echo 2; ?>">-->
<!--  <i class="fa-solid fa-edit" style="color: black; font-size: 20px;"></i>-->
<!--</a>-->
         </td>
         <td><img src="<?php $img1 = $result['imagepath'] . $result['image']; echo $img1; ?>" onerror="this.src='user_icon.png'" class="card images-img-top image" id="backup_picture" alt="" style="height:2rem; width:3rem;"></td>
         <td><?php echo $result['rRole']; ?></td>
         <td><?php echo $result['rName']; ?></td>
         <td><?php echo $result['rNameCapital']; ?></td>
         <td><?php echo $result['rDOB']; ?></td>
         <td><?php echo $result['eDate']; ?></td>
         <td><?php echo $result['rAge']; ?></td>
         <td><?php echo $result['rGender']; ?></td>
         <td><?php echo $result['rNational']; ?></td>
         <td><?php echo $result['rEducation']; ?></td>
         <td><?php echo $result['rProfession']; ?></td>
         <td><?php echo $result['rMarital']; ?></td>
         <td><?php echo $result['rMotherToungue']; ?></td>
         <td><?php echo $result['rCitizenshipNo']; ?></td>
         <td><?php echo $result['pd']; ?></td>
         <td><?php echo $result['cd']; ?></td>
         <td><?php echo $result['rTelephoneNo']; ?></td>
         <td><?php echo $result['rMobileNo']; ?></td>
         <td><?php echo $result['rEmail']; ?></td>
      </tr>
      <?php
        }
        $i++;
      ?>
   </tbody>
 </table> 
</div>
 <script>
  
  function GetReport(ReportBy,Value){
    $.ajax({
               url:"volunteerGen.php",
               method:"POST",
               data:{reportBy:ReportBy,param:Value},
               success: function (data) {
                   $("#tbody_1").empty();
                   var da = JSON.parse(data);
                   if(da.status_code == 200) {
                   $("#tbody_1").append(da.data);
                   }else if(da.status_code == 404) {
                     var html = '<tr><td class="text-center" colspan="17">'+da.message+'</td></tr>';
                     $("#tbody_1").append(html);
                   }
                 
                   }
               });
             
  }
  function GetReportBy(ReportBy){
    var from = $("#from_range").val();
    var to = $("#to_range").val();
    $.ajax({
               url:"volunteerGen.php",
               method:"POST",
               data:{reportBy:ReportBy,from:from,to:to},
               success: function (data) {
                   $("#tbody_1").empty();
                   var da = JSON.parse(data);
                   if(da.status_code == 200) {
                   $("#tbody_1").append(da.data);
                   }else if(da.status_code == 404) {
                     var html = '<tr><td class="text-center" colspan="17">'+da.message+'</td></tr>';
                     $("#tbody_1").append(html);
                   }
                 
                   }
               });
 $('#collapseExample').css("display","block");
  }


   $(document).ready( function () {
    $('#reportTable').DataTable({
       //     sorting: false,
    // ordering: false,
    // scrollY: 450,   
    // scrollX: false,
    
    // fixedColumns: {
    //     left:0,
    //     right: 1,
    // },
    paging: false,
    scrollCollapse: true,
    scrollX: true,
    scrollY: 450,
    
    paging: false,
    // order:[[5,'desc']],
    // searching: false,
    dom: "Bfrtip",
   });

 $('#all').click(function () {
  $('#collapseExample').css("display","block");
  $('input[name="' + this.name + '"]').not(this).prop('checked', true);
  $(".age-grp").css("display", "none");
 });


$("#showRange").click(function() {
  $(".age-grp").css("display", "block");
});

$('.showing').click(function() {
  $('#collapseExample').css("display","block");
  $(".age-grp").css("display", "none");
});

$("#allDetails").click(function() {
  if ($('.checkbox_check').prop('checked')==true){
    $('#collapseExample').css("display","block");
    $(".age-grp").css("display", "none");

  }else{
    $('#collapseExample').css("display","none");
    $(".age-grp").css("display", "none");
     location.reload();
  }

})


$("#dropdownMenuButton").click(function() {
  $('input[name="' + this.name + '"]').not(this).prop('checked', false);
  $('.showByFilter').attr('id', 'tbody_1');
});
});

 </script>
</body>
</html>