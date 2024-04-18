<!-- start new update page for currentaddressupdate code line  -->
<div class="container mt-4 mb-4" style="background-color: #f2f2f2;" id="ContainerStyle">
  <div class="row" id="rowStyle">
    <div class="row">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="sameasPermanentAdd" id="sameasPermanentAdd">
            <label class="form-check-label" for="sameasPermanentAdd">
                Same as Permanent Address
            </label>
        </div>
    <?php 
    $conn = connectMyDB();
   $id = $_GET['id'];
   $sql = "select * from currentaddress where intro_id='$id'";
   $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
      ?>
      <div class="col-md-3 col-sm-12 mt-2">

      <div class="row">
        <div class="col-md-5">
        <label for="province" class="form-label" style="display:flex; text-align:center; align-items:center;">प्रदेश :<span class="member_form_validation" style="color:red; display:flex; font-size:20px;">*</span></label>
        </div>
        <div class="col-md-7">
        <select  name="cprovince" id="province" class="InputStyle form-select" aria-label="Default select example" style="font-weight: bold; font-size: 12px;">
            <option value="<?php echo $row['rProvince'] ?>"><?php echo $row['rProvince'] ?>&nbsp;&nbsp;</option>
            <?php
            $qry = "SELECT DISTINCT `COL 3`as province FROM `address_1`;";
            $con = connectMyDB();
            $req = mysqli_query($conn, $qry);
            if (mysqli_num_rows($req) > 0) {
              while ($data = mysqli_fetch_assoc($req)) {
                ?>
            <option value="<?php echo $data['province']; ?>"><?php echo $data['province']; ?></option>
            <?php
              }
            }
            ?>
          </select>
        </div>
      </div>
       
      </div>
      <div class="col-md-3 col-sm-12 mt-2">
        <div class="row">
          <div class="col-md-4" style="padding: 0px 5px;">
          <label for="district" class="form-label" style="display:flex; text-align:center; align-items:center;">जिल्ला :<span class="formValidation" style="color:red; display:flex; font-size:20px;">*</span></label>
          </div>
          <div class="col-md-8">
          <select name="cdistrict" id="district" class="InputStyle form-select" aria-label="Default select example" style="font-weight: bold; font-size: 12px;">
            <option value="<?php echo $row['rDistrict'] ?>"><?php echo $row['rDistrict'] ?>&nbsp;&nbsp;</option>
          </select>
          </div>
        </div>
    
      </div>
      <div class="col-md-3 col-sm-12 mt-2">
        <div class="row">
          <div class="col-md-4" style="padding:0px 5px;">
          <label for="municipality" class="form-label" style="display:flex; text-align:center; align-items:center;">न.पा/गा.पा. :<span class="formValidation" style="color:red; display:flex; font-size:20px;">*</span></label>
          </div>
          <div class="col-md-8">
          <select name="cmunicipality" id="municipality" class="InputStyle form-select" aria-label="Default select example" style="font-weight: bold; font-size: 12px;">
            <option value="<?php echo $row['rMunici'] ?>"><?php echo $row['rMunici'] ?>&nbsp;&nbsp;</option>
           </select>
          </div>
        </div>
      
      </div>
      <div class="col-md-3 col-sm-12 mt-2">
        <div class="row">
          <div class="col-md-4">
          <label for="wardNo" class="form-label" style="display:flex; text-align:center; align-items:center;">वाड नं. :<span class="formValidation" style="color:red; display:flex; font-size:20px;">*</span></label>
          </div>
          <div class="col-md-8">
          <input type="text" class="form-control cWardNo cWardNo1 InputStyle" id="cwardNo" name="cwardNo" value="<?php echo $row['rWard'] ?>">
          </div>
        </div>

      </div>
    </div>
    <div class="row">
      <div class="col-md-3 col-sm-12 mt-2">
        <div class="row">
          <div class="col-md-5">
          <label for="telephone" class="form-label">टेलिफोन नं.:</label>
          </div>
          <div class="col-md-7">
          <input type="text" name="ctelephoneNo" class="form-control  phoneNo phoneNo1 InputStyle" id="phoneUS" pattern="[0-9\-\(\)\s]+"  value="<?php echo $row['rTelephoneNo'] ?>">
          </div>
        </div>
      
      </div>
      <div class="col-md-3 col-sm-12 mt-2">
        <div class="row">
          <div class="col-md-4" style="padding: 0px 5px;">
          <label for="mobile" class="form-label" style="display:flex; text-align:center; align-items:center;">माेबाईल नं.:<span class="formValidation" style="color:red; display:flex; font-size:20px;">*</span></label>
          </div>
          <div class="col-md-8">
          <input type="text" name="cmobileNo" class="form-control MobileNo MobileNo1 InputStyle" id="cmobileNo" value="<?php echo $row['rMobileNo'] ?>" >
          </div>
        </div>
      
      </div>
      <div class="col-md-6 col-sm-12 mt-2">
        <div class="row">
          <div class="col-md-2" >
          <label for="email" class="form-label" style="display:flex; text-align:center; align-items:center;">इमेल:<span class="formValidation" style="color:red; display:flex; font-size:20px;">*</span></label>
          </div>
          <div class="col-md-10">
          <input type="email" name="cemail" class="form-control EmailValidation EmailValidation1 InputStyle" id="cEmail"  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{3,3}$" value ="<?php echo $row['rEmail'] ?>">
          </div>
        </div>
    
      </div>
    </div>
    <?php
    }
    ?>
  </div>
<!-- </div> -->

<!-- get district chosing province -->
<script>
 $(document).ready(function(){
     // Check if Mobile Number is provided in database 
// Check if Mobile Number is provided in database 
$('#cmobileNo').on('blur', function() {
    var MobileNo = $(this).val();
  // Check if the input is blank
  if (MobileNo.trim() === '') {
        return; // Exit the function without making the AJAX request
    }


    $.ajax({
        url: '../validationCode/currentaddress_mobileNo_validation.php',
        type: 'GET',
        data: { MobileNo: MobileNo },
        dataType: 'json',
        success: function(data) {
            if (data.result === true) {
                alert('Mobile number is already exists. Please try another mobile number. Thank you!');
                $('#cmobileNo').val(''); // Clear the input field
            }
        },
        error: function(xhr, status, error) {
            alert('An error occurred: ' + error);
        }
    });
});


// Check if Telephone Number is provided in database 
// Check if Telephone Number is provided in database 
$('#telephoneno').on('blur', function() {
    var TelephoneNo = $(this).val();
     
      // Check if the input is blank
      if (TelephoneNo.trim() === '') {
        return; // Exit the function without making the AJAX request
    }

    $.ajax({
        url: '../validationCode/currentaddressTelephone_validation.php',
        type: 'GET',
        data: { TelephoneNo: TelephoneNo },
        dataType: 'json',
        success: function(data) {
            if (data.result === true) {
                alert('Telephone number is already exists. Please try another telephone number. Thank you!');
                $('#telephoneno').val(''); // Clear the input field
            }
        },
        error: function(xhr, status, error) {
            alert('An error occurred: ' + error);
        }
    });
});

// Check if Email Id is provided in database 
// Check if Email ID is provided in database 
$('#cEmail').on('blur', function() {
    var Email = $(this).val();

      // Check if the input is blank
      if (Email.trim() === '') {
        return; // Exit the function without making the AJAX request
    }

    $.ajax({
        url: '../validationCode/currentaddress_email_validation.php',
        type: 'GET',
        data: { Email: Email },
        dataType: 'json',
        success: function(data) {
            if (data.result === true) {
                alert('Email Id is already exists. Please try another email Id. Thank you!');
                $('#cEmail').val(''); // Clear the input field
            }
        },
        error: function(xhr, status, error) {
            alert('An error occurred: ' + error);
        }
    });
});
     
// start form validation code line in jquery from here
// start form validation code line in jquery from here
  $(".cWardNo").on("keypress", function (e) {
    console.log(e.which);
    if($('.cWardNo1').val().length >1 ){
      alert("not more than 2");
      return false;  
    } else if(e.which >= 48 && e.which <=57 ){
       return true;

    }else{
      alert("Only Numbers are allowed");
      return false;   
    }
  });
  // end form validation code line in jquery from here 

 
  $("#province").change(function () {
            var province = $(this).val();
            // alert (province);
            $.ajax({
                type: 'POST',
                url: 'library/currentaddress_library.php',
                data: { give_district_from_server: province },
                success: function (data) {
                    console.log(data);
                    var da = JSON.parse(data);
                    if (da.status_code == '200') {
                        $("#district").empty();
                        $("#district").append('<option value="">Choose..</option>');
                        jQuery.each(da.address, function (i, district) {
                            var dis = district.district;
                            dis = dis.toUpperCase();
                            $("#district").append('<option value="' + dis + '" >' + dis + '</option>');
                        });
                    }
                    else {
                        $("#district").empty();
                        $("#district").append('<option value="">Choose..</option>');
                    }
                }
            });
        });


        $("#district").change(function () {
            var district = $(this).val();
            $.ajax({
                type: 'POST',
                url: 'library/currentaddress_library.php',
                data: { give_municipality_from_server: district },
                success: function (data) {
                    console.log(data);
                    var da = JSON.parse(data);
                    if (da.status_code == '200') {
                        $("#municipality").empty();
                        $("#municipality").append('<option value="">Choose..</option>');
                        jQuery.each(da.address, function (i, municipality) {
                            var muni = municipality.municipality;
                            muni = muni.toUpperCase();
                            $("#municipality").append('<option value="' + muni + '" >' + muni + '</option>');
                        });
                    }
                    else {
                        $("#municipality").empty();
                        $("#municipality").append('<option value="">Choose..</option>');
                    }
                }
            });
        });
      });
</script>

<!-- end new update page for currentaddressupdate code line  -->
