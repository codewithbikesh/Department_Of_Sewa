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
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
   <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
   <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
   <script src="https://kit.fontawesome.com/9a86d78b3d.js" crossorigin="anonymous"></script>
   <link rel="stylesheet" href="../style.css">
   <title>Event Report</title>
</head>
<body>
<!--start header file part here -->
<!--start header file part here -->
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
        <a href="https://dos.omsnepal.com/assets/User_Dashboard/" style="color:black; text-decoration:none; padding-right:10px;"><?php if (isset($_SESSION['username'])) {echo $_SESSION['username'];} ?> &nbsp; <i class="fa-solid fa-user mt-2"></i></a>
        <a href="https://dos.omsnepal.com/logout/" style="color:black; text-decoration:none;">Logout &nbsp; <i class="fa-solid fa-right-from-bracket mt-2"></i></a>
      </div>
    </div>
         
  </div>
</nav> 

<!--end header file part here -->
<!--end header file part here -->

<div class="p-4" id="collapseExample" style="width:100%; height:auto;">
    <!--style="display:none;"-->
<table class="display">
   <thead>
      <tr>
         <th>Sno</th>
         <th>Type Of Event</th>
         <th>Day Of Event</th>
         <th>Region</th>
         <th>District</th>
         <th>Location</th>
         <th>Start Event Date</th>
         <th>End Event Date</th> 
         <!--<th>Action</th> -->
      </tr>
   </thead>
   <tbody class="showByFilter" id="tbody_1">
      <?php 
      $selectQuery="SELECT * FROM `event` where active_status = 1";
      $con = connectMyDB();
      $i=1;
      $queryPass=mysqli_query($con,$selectQuery);
      while( $result = mysqli_fetch_assoc($queryPass)){
         ?>
      <tr>
          <td><?php echo $i;?></td>
         <td><?php echo $result['eTypeOfEvent']; ?></td>
         <td><?php echo $result['eDateOfEvent']; ?></td>
         <td><?php echo $result['eRegion']; ?> </td>
         <td><?php echo $result['eDistrict']; ?></td>
         <td><?php echo $result['eLocation']; ?></td>
         <td><?php echo $result['eStartDateEvent']; ?></td>
         <td><?php echo $result['eEndDateEvent']; ?></td>
         <!--<td>-->
         <!--    <a href="../eventdelete.php?id=<?php echo $result['id'] ?>"><i class="fa-solid fa-trash"></i></a>-->
         <!--    <a href="../eventedit.php?id=<?php echo $result['id'] ?>"><i class="fa-solid fa-edit"></i></a>-->
         <!--</td>-->


      </tr>
      <?php
        $i++;
        }
      ?>
   </tbody>
 </table> 
</div>
 <script>
  
  function GetReport(ReportBy,Value){
    $.ajax({
               url:"reportGen.php",
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
               url:"reportGen.php",
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
    $('.display').DataTable({
       //     sorting: false,
    // ordering: false,
    // scrollY: 450,   
    // scrollX: false,  
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
  }

})


$("#dropdownMenuButton").click(function() {
  $('input[name="' + this.name + '"]').not(this).prop('checked', false);
  $('.showByFilter').attr('id', 'tbody_1');
});
});


 </script>
<!--start footer section file code line from here-->
<!--start footer section file code line from here-->
<?php
include('../include/footer_file.php');
?>
<!--end footer section file code line from here -->
<!--end footer section file code line from here -->

