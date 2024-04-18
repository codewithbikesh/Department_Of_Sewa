<?php 
include "header.php"; 
//session part
//session part
// session_start();
// if (isset($_SESSION['username'])) {
//     //   echo $_SESSION['username'];
// }
//  else if ($_SESSION['username'] == '') {
//      echo "no sesssion";
//     echo"<script>window.location.href='index.php';</script>";
//  }
 //session part
 //session part
 
?>
<div class="topbar pt-3" style="background:#424a4a;"><a class="btn"><i class="bi bi-list p-3 text-white" id="colpsCustom"></i></a><span class="text-white fw-bold mt-3">User
        Activities</span>
</div>

<!--get userwise data from database-->
<!--get userwise data from database-->
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
         <th>UserID</th>
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
         <th style="width:100px;">Nagrikta No.</th>
         <th style="width:150px;">Permanent Address</th>
         <th style="width:150px;">Temporary Address</th>
         <th>Telephone</th>
         <th>Mobile</th>
         <th>Email</th>
      </tr>
   </thead>
   <tbody class="showByFilter" id="tbody_1">
        <input type="hidden" id="userEmail" value="<?php echo $_SESSION['username']; ?>">
      <?php 
        $username = $_SESSION['username'];
        $user_id = $_SESSION['id'];
       $selectQuery="SELECT introductiondetails.id,introductiondetails.rUser_Id,introductiondetails.rRole,introductiondetails.imagepath,introductiondetails.image,introductiondetails.rName,introductiondetails.rNameCapital,introductiondetails.rDOB,introductiondetails.eDate,introductiondetails.rAge,introductiondetails.rGender,introductiondetails.rNational,introductiondetails.rEducation,introductiondetails.rProfession,introductiondetails.rMarital,introductiondetails.rMotherToungue,introductiondetails.rCitizenshipNo,permanentaddress.intro_id,permanentaddress.rDistrict as pd,currentaddress.rDistrict as cd,currentaddress.rTelephoneNo,currentaddress.rMobileNo,currentaddress.rEmail,login_det.username
       FROM ((introductiondetails INNER JOIN permanentaddress ON introductiondetails.id = permanentaddress.intro_id INNER JOIN login_det ON introductiondetails.login_user = login_det.id)INNER JOIN currentaddress on introductiondetails.id=currentaddress.intro_id)
       WHERE login_det.id =  '$user_id' AND introductiondetails.active_status = 1;";
      $conn = connectMyDB();
      $i=1;
      $queryPass=mysqli_query($conn,$selectQuery);
      while( $result = mysqli_fetch_assoc($queryPass)){
         ?>
      <tr>
          <td>
             <a href="../../report.php?ids=<?php echo $result['id'] ?>"><i class="fa fa-eye" aria-hidden="true"></i></a>
             <a href="edit/index.php?id=<?php echo $result['id']?>"><i class="fas fa-edit" style="color:black; font-size:18px;"></i></a>
<!--             <a href="updatepages/updatepage.php?id=<?php echo $result['id']; ?>&amp;sid=<?php echo 2; ?>">-->
<!--  <i class="fa-solid fa-edit" style="color: black; font-size: 20px;"></i>-->
<!--</a>-->
         </td>
        <td><img src="../../image_upload/profilPicture/<?php echo $result['image'];?>" onerror="this.src='../../user_icon.png'" class="card images-img-top image" id="backup_picture" alt="" style="height:2rem; width:3rem;"></td>
         <td><?php echo $result['rUser_Id']; ?></td>
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
               url:"../../volunteerGen.php",
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
<!--get userwise data from database-->
<!--get userwise data from database-->

<?php include "footer.php"; ?>