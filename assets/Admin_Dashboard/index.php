<?php 
include "header.php"; 
?>
<div class="topbar pt-3 mb-2" style="background:#424a4a;"><a class="btn"><i class="bi bi-list p-3 text-white" id="colpsCustom"></i></a><span class="text-white fw-bold mt-3">Dashboard</span>
</div>
<?php 
// $_SESSION['email']="san@gmail.com";
// echo "Email of index is : ".$_SESSION['email'];
// echo $_SESSION['session_start_status'];
// echo "<h2>".$_SESSION['login_status']."</h2>";
?>
<div style="overflow:auto;" class="font_size_in_mobile">
 <!--contant section start from here -->
<!--contant section start from here -->
<div class="container-fluid">
 <div class="row ps-3" style="padding: 5px;">
          <div class="col-md-4 mb-4">
          <div id="chartContainer" style="height: 300px; width: 90%;"></div>
          </div>
          <div class="col-md-4 mb-2">
            <div id="chartContainerNo2" style="height: 300px; width: 90%;"></div>
          </div>
                    <div class="col-md-4 mb-2" name="image_3">
          <div id="chartContainer2" style="height: 300px; width: 100%;"></div>
          </div>
          <div class="col-md-12 mb-4">
          <div id="chartContainer1" style="height: 300px; width: 100%;"></div>
          </div>

          <div class="col-md-12 mb-2">
            <div id="chartContainerNo3" style="height: 300px; width: 100%;"></div>
          </div>
        </div>
        </div>
<!--contant section start from here -->
<!--contant section start from here -->
</div>
<?php include "footer.php"; ?>