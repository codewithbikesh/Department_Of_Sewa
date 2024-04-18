<!--included header file here -->
<!--included header file here -->
<?php
include('../include/header.php');
?>

<style>
@media screen and (max-width:575px){
    .text-responsive{
         text-align:center;
    }
    .addClass{
     text-align:center;
     margin-bottom:5px;
    }
}
</style>

<!--archives header code line from here -->
<!--archives header code line from here -->
<div class="container-fluid m-0 headerResponsive" style="padding:96px 0px 0px 0px;">
<div class="container-fluid m-0 p-0" style="display:flex; justify-content:center; align-items:center; background-color:#5ab555; height:20vh; margin-bottom:5px;">
        <div class="row">
            <div class="col-lg-12 archives-responsive">
                <h4 style="text-align:center; color:white;">Archives</h4>
            </div>
        </div>
    </div>

<div class="container-fluid">
    <div class="container-fluid mt-4 mb-4"  style="display:flex; justify-content:center; align-items:center;">
    <div class="row mt-2">
        <div class="col col-md-6 col-sm-12 mt-2">
            <div class="row">
                <div class="col-md-4"><a href="../pdf/Energy promotion for sericulture project.pdf"><img  src="../img/image_1.png" class="img-thumbnail" style="width:200px; height:150px;"></a></div>
                 <div class="col-md-8 addClass">
                     <p class="text-responsive">Energy promotion for sericulture project</p>
                     <a href="../pdf/Energy promotion for sericulture project.pdf" style="background-color:red; font-weight:bold; padding:5px 10px 7px 10px; color:white; text-decoration:none;" download><i class="fas fa-file-pdf px-1" style="color:white;"></i>DOWNLOAD</a>
                 </div>
            </div>
        </div>
         <div class="col col-md-6 col-sm-12 mt-2 ">
            <div class="row">
                <div class="col-md-4">
                 <a href="../pdf/LCRW.pdf"><img src="../img/image_2.png" class="img-thumbnail" style="width:200px; height:150px;"></a>
                </div>
                 <div class="col-md-8 addClass">
                     <p class="text-responsive">Participatory Tanahusur Landscape Project</p>
                    <a href="../pdf/LCRW.pdf" style="background-color:red; font-weight:bold; padding:5px 10px 7px 10px; color:white; text-decoration:none; " download><i class="fas fa-file-pdf px-1" style="color:white;"></i>DOWNLOAD</a>
                 </div>
            </div>
        </div>
        
          <div class="col col-md-6 col-sm-12 mt-2 ">
            <div class="row">
                <div class="col-md-4">
               <a href="../pdf/Pico hydro promotion project.pdf"><img  src="../img/image_3.png" class="img-thumbnail" style="width:200px; height:150px;"></a></div>
                 <div class="col-md-8 addClass">
                     <p class="text-responsive">PICO HYDRO PROMOTION PROJECT</p>
                     <a href="../pdf/Pico hydro promotion project.pdf" style="background-color:red; font-weight:bold; padding:5px 10px 7px 10px; color:white; text-decoration:none; " download><i class="fas fa-file-pdf px-1" style="color:white;"></i>DOWNLOAD</a>
                 </div>
            </div>
        </div>
        
        <!-- <div class="col col-md-6 col-sm-12 mt-2 ">-->
        <!--    <div class="row">-->
        <!--        <div class="col-md-4">-->
        <!--        <img src="../img/image_2.png" class="img-thumbnail" style="width:200px; height:150px;">-->
        <!--        </div>-->
        <!--         <div class="col-md-8 addClass">-->
        <!--             <p class="text-responsive">This is a pdf file here</p>-->
        <!--           <a href="../pdf/Energy promotion for sericulture project.pdf" style="background-color:red; font-weight:bold; padding:5px 10px 7px 10px; color:white; text-decoration:none; " download><i class="fas fa-file-pdf px-1" style="color:white;"></i>DOWNLOAD</a>-->
        <!--         </div>-->
        <!--    </div>-->
        <!--</div>-->
    </div>
    </div>
</div>
</div>
<!--included footer file here -->
<!--included footer file here -->
<?php
include('../include/footer.php');
?>
    <!--jquery for responsive code line from here -->
    <!--jquery for responsive code line from here -->
     <script>
         $(document).ready(function(){
         $(window).resize(function(){
                 var width = $(window).width();
                 if(width < 766){
                //   $(".").("col-md-6").addClass("col-md-12");
                }
            });
     });
     </script>