<?php																																
$Region = [];
   $qry = "SELECT DISTINCT `Region` FROM `center_list` ";
   $conn = connectMyDB();
   $req = mysqli_query($conn,$qry);
   if(mysqli_num_rows($req) > 0){
    $i = 0;
    while($data = mysqli_fetch_assoc($req)){
    $Region[$i] = $data['Region'];
    $i++;
   }}
 ?>
<!-- start new update query for agpsupdate  -->
<!-- start new update query for agpsupdate  -->
<div class="container mt-4 mb-4" style="background-color: #f2f2f2;" id="ContainerStyle">
  <div class="row" id="rowStyle">

    <!-- start first AGPS सँगको विवरण form section from here  -->
    <div class="row" style="width: auto;">
    <?php 
  $conn = connectMyDB();
   $id = $_GET['id'];
   $sql = "select * from agps where intro_id='$id'";
   $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
      ?>
    <div class="col-md-3 col-sm-12 mt-2">
        <div class="row">
          <div class="col-md-4" style="padding: 0px 5px;">
          <label for="district" class="form-label" style="display:flex; text-align:center; align-items:center;">क्षेत्र :<span class="member_form_validation" style="color:red; display:flex; font-size:20px;">*</span></label>
          </div>
          <div class="col-md-8" style="padding: 0px;">
          <select name="rison" id="rison" class="InputStyle form-select" aria-label="Default select example" style="font-weight: bold; font-size: 12px;">
          <option value="<?php echo $row['reason']; ?>"><?php echo $row['reason']; ?>&nbsp;&nbsp;</option>
            <?php
            foreach ($Region as $a) {
              ?>
            <option value="<?php echo $a ?>"><?php echo $a ?></option>
            <?php }
            ?>
          </select>
          </div>
        </div>
    
      </div>

      <div class="col-md-3 col-sm-12 mt-2">
        <div class="row">
          <div class="col-md-4">
          <label for="inputState" class="form-label" style="display:flex; text-align:center; align-items:center;">जिल्ला:<span class="member_form_validation" style="color:red; display:flex; font-size:20px;">*</span></label>
          </div>
          <div class="col-md-8">
          <select name="agpsDistrict" id="agpsdistrict" class="InputStyle form-select" aria-label="Default select example" style="font-weight: bold; font-size: 12px;">
          <option value="<?php echo $row['rDistrict']; ?>"><?php echo $row['rDistrict']; ?>&nbsp;&nbsp;</option>
          </select>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-sm-12 mt-2">
        <div class="row">
          <div class="col-md-4">
          <label for="d_center" class="form-label" style="display:flex; text-align:center; align-items:center;">केन्द्र:<span class="member_form_validation" style="color:red; display:flex; font-size:20px;">*</span></label>
          </div>
          <div class="col-md-8">
          <!--<input type="text" name="d_Center" class="form-control centerAddress1 centerAddress2 InputStyle"  id="d_center">        -->
          <select name="agpscenter" id="d_center" onchange="other(this)" class="InputStyle form-select" aria-label="Default select example" style="font-weight: bold; font-size: 12px;">
          <option value="<?php echo $row['rCenter']; ?>"><?php echo $row['rCenter']; ?>&nbsp;&nbsp;</option>
          </select>
          <input type="text" name="agpscenter" value="<?php echo $row['rCenter']; ?>" class="form-control InputStyle" id="otherCenter" style="width:145px;" placeholder="Other Center">
          </div>
        </div>
      
      </div>
      
      <div class="col-md-3 col-sm-12 mt-2">
       <div class="row">
        <div class="col-md-4" style="padding: 0px 5px;">
        <label for="inputZip" class="form-label" style=" display:flex; text-align:center; align-items:center;">ज्ञान प्राप्त साल:<span class="member_form_validation" style="color:red; display:flex; font-size:20px;">*</span></label>
        </div>
        <div class="col-md-8">
        <input type="text"name="d_QualificationYears" class="form-control Years Years1 special2 InputStyle" id="d_QualificationYears" value="<?php echo $row['rQualificationYears']; ?>">
        </div>
      </div>
      </div>
      
       <!-- start second AGPS सँगको विवरण form section from here  -->
      <div class="col-md-4 col-sm-12 mt-2">
        <div class="row">
          <div class="col-md-3" style="padding:0px;">
          <label for="inputZip" class="form-label">स्मार्ट कार्ड नं:</label>
          </div>
          <div class="col-md-6" style="padding:0px;">
          <input type="text" name="d_SmartCardNo" class="form-control SmartCardNo SmartCardNo1 InputStyle" id="smartCardNo" value="<?php echo $row['rSmartCardNo'];?>">
          </div>
        </div>
    </div>
    <!-- end second AGPS सँगको विवरण form section from here  -->
    </div>
    
    <!-- end first AGPS सँगको विवरण form section from here  -->
    <?php
    }    
    ?>
  <!-- </div> -->
<!-- </div> -->
<!-- start new update query for agpsupdate  -->
<!-- start new update query for agpsupdate  -->

<script>
  $(document).ready(function(){
      // Check if Smart Card Id is provided in database 
// Check if Smart Card ID is provided in database 
$('#smartCard').on('blur', function() {
    var smartCard = $(this).val();

// Check if the input is blank
if (smartCard.trim() === '') {
        return; // Exit the function without making the AJAX request
    }
    
    $.ajax({
        url: '../validationCode/smartCard_validation.php',
        type: 'GET',
        data: { smartCard: smartCard },
        dataType: 'json',
        success: function(data) {
            if (data.result === true) {
                alert('Smart card Id is already exists. Please try another smart card Id. Thank you!');
                $('#smartCard').val(''); // Clear the input field
            }
        },
        error: function(xhr, status, error) {
            alert('An error occurred: ' + error);
        }
    });
});

    //   select region code line from here 
    //   select region code line from here 
       $("#rison").change(function(){
          var agpsreason=$(this).val();
        //   alert(agpsreason);
          $.ajax({
                type: 'POST',
                url: 'library/agps_library.php',
                data: { give_agps_district_from_server: agpsreason },
                success: function (data) {
                    console.log(data);
                    var da = JSON.parse(data);
                    if (da.status_code == '200') {
                        $("#agpsdistrict").empty();
                        $("#agpsdistrict").append('<option value="">Choose..</option>');
                        jQuery.each(da.districtAgps, function (i, District) {
                            var dis = District.District;
                            dis = dis.toUpperCase();
                            $("#agpsdistrict").append('<option value="' + dis + '" >' + dis + '</option>');
                        });
                    }
                    else {
                        $("#agpsdistrict").empty();
                        $("#agpsdistrict").append('<option value="">Choose..</option>');
                    }
                }
            });
        });
        
        $("#agpsdistrict").change(function(){
          var agpsdist=$(this).val();
        //   alert(agpsdist);
          $.ajax({
                type: 'POST',
                url: 'library/agps_library.php',
                data: { give_agps_center_from_server: agpsdist },
                success: function (data) {
                    console.log(data);
                    var da = JSON.parse(data);
                    if (da.status_code == '200') {
                        $("#d_center").empty();
                        $("#d_center").append('<option value="">Choose..</option>');
                        jQuery.each(da.centerAgps, function (i, center_list) {
                            var center = center_list.Center;
                            center = center.toUpperCase();
                            $("#d_center").append('<option value="' + center + '" >' + center + '</option>');
                        });
                        $("#d_center").append('<option value="OtherCenter" class="otherField" id="OtherCn" onchange="other(this)">Other Center </option>');
                    }
                    else {
                        $("#d_center").empty();
                        $("#d_center").append('<option value="">Choose..</option>');
                    }
                }
            });
        });
        
      // number validation with jquery code line here 
      $(".Years").on("keypress", function (e) {
    console.log(e.which);
    if($('.Years1').val().length >9 ){
      alert("not more than 10");
      return false;  
    } else if(e.which >= 48 && e.which <=57 ){
       return true;

    }else{
      alert("Only Numbers are allowed");
      return false;   
    }
  });


//   $(".SmartCardNo").on("keypress", function (e) {
//     console.log(e.which);
//     if($('.SmartCardNo1').val().length >11 ){
//       alert("not more than 12");
//       return false;  
//     } else if(e.which >= 48 && e.which <=57 ){
//       return true;

//     }else{
//       alert("Only Numbers are allowed");
//       return false;   
//     }
//   });

$(".SmartCardNo").on("keypress", function (e) {
    // Allow numbers (0-9) and letters (A-Z, both uppercase and lowercase)
    if($('.SmartCardNo1').val().length > 11) {
        alert("Not more than 12 characters");
        e.preventDefault();
    } else if((e.which >= 48 && e.which <= 57) || (e.which >= 65 && e.which <= 90) || (e.which >= 97 && e.which <= 122)) {
        return true;
    } else {
        alert("Only numbers and letters are allowed");
        e.preventDefault();
    }
});

  $(".dWardNo").on("keypress", function (e) {
    console.log(e.which);
    if($('.dWardNo1').val().length >1 ){
      alert("not more than 2");
      return false;  
    } else if(e.which >= 48 && e.which <=57 ){
       return true;

    }else{
      alert("Only Numbers are allowed");
      return false;   
    }
  });

  $(".centerAddress1").on("keypress", function (e) {
    // console.log(e.which);
    if($('.centerAddress2').val().length >20 ){
      alert("not more than 20");
      return false;  
    } else if((e.which >= 65 && e.which <= 90) ||
    (e.which >= 97 && e.which <= 122) ||
    e.which == 32 ||
    e.which == 45 ||
    (e.which >= 40 && e.which <= 41)){
     
       return true;
    }else{
      alert("Numbers and Special Characters not allowed");
      return false;   
    }
  });

  $(".phoneNo").on("keypress", function (e) {
    console.log(e.which);
    if($('.phoneNo1').val().length >9 ){
      alert("not more than 10");
      return false;  
    } else if(e.which >= 45 && e.which <=57 && e.which != 47 && e.which != 46){
       return true;

    }else{
      alert("Only Numbers and dash (-) are allowed");
      return false;   
    }
  });


  $(".MobileNo").on("keypress", function (e) {
    console.log(e.which);
    if($('.MobileNo1').val().length >13 ){
      alert("not more than 14");
      return false;  
    } else if(e.which >= 43 && e.which <=57 && e.which != 44 && e.which != 45 && e.which != 46 && e.which != 46 && e.which != 47 ){
       return true;

    }else{
      alert("Only Numbers and plus (+) are allowed");
      return false;   
    }
  });

  });

  
</script>

<!-- end new update query for agpsupdate  -->
