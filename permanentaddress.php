<div class="container mt-4 mb-4" style="background-color: #f2f2f2;" id="ContainerStyle">
  <div class="row" id="rowStyle">

    <div class="row">
     
    <!-- bikes -->
      <div class="col-md-3 col-sm-12 mt-2">
        
      <div class="row">
        <div class="col-md-5">
        <label for="province" class="form-label" style="display:flex; text-align:center; align-items:center;">प्रदेश :<span class="member_formValidation" style="color:red; display:flex; font-size:20px;">*</span></label>
        </div>
        <div class="col-md-7">
        <select  name="pprovince" id="perProvince" class="InputStyle form-select" aria-label="Default select example" style="font-weight: bold; font-size: 12px;">
            <option value="">Select...&nbsp;&nbsp;</option>
            <?php
            $qry = "SELECT DISTINCT `COL 3`as province FROM `address_1`;";
            $con = connectMyDB();
            $req = mysqli_query($conn,$qry);
            if(mysqli_num_rows($req) > 0){
              while($data = mysqli_fetch_assoc($req)){
            ?>
            <option value="<?php echo $data['province']; ?>"><?php echo $data['province'];?></option>
            <?php 
            }}
            ?>
          </select>
        </div>
      </div>
       
      </div>

      <div class="col-md-3 col-sm-12 mt-2">
         <div class="row">
          <div class="col-md-4" style="padding: 0px 5px;">
          <label for="district" class="form-label" style="display:flex; text-align:center; align-items:center;">जिल्ला : <span class="member_formValidation" style="color:red; display:flex; font-size:20px;">*</span></label>
          </div>
          <div class="col-md-8">
          <select name="district" id="perDistrict" class="InputStyle form-select" aria-label="Default select example" style="font-weight: bold; font-size: 12px;">
            <option value="">Select...&nbsp;&nbsp;</option>
          </select>
          </div>
        </div>
      </div>

      <div class="col-md-3 col-sm-12 mt-2">
      <div class="row">
          <div class="col-md-4" style="padding:0px 5px;">
          <label for="municipality" class="form-label" style="display:flex; text-align:center; align-items:center;">न.पा/गा.पा.:<span class="member_formValidation" style="color:red; display:flex; font-size:20px;">*</span></label>
          </div>
          <div class="col-md-8">
          <select name="municipality" id="perMunicipality" class="InputStyle form-select" aria-label="Default select example" style="font-weight: bold; font-size: 12px;">
            <option value="">Select...&nbsp;&nbsp;</option>
           </select>
          </div>
        </div>
      </div>

      <div class="col-md-3 col-sm-12 mt-2">
      <div class="row">
          <div class="col-md-4" style="padding: 0px 5px;">
          <label for="wardNo" class="form-label" style="display:flex; text-align:center; align-items:center;">वाड नं. :<span class="member_formValidation" style="color:red; display:flex; font-size:20px;">*</span></label>
          </div>
          <div class="col-md-8">
          <input type="text" class="form-control WardNo1 WardNo2 InputStyle" id="pWardNo" name="pWardNo" maxlength="2">
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
          <input type="text" name="pTelephoneNo" class="form-control pPhoneNo2 pPhoneNo3 InputStyle" id="TelephoneNo">
          </div>
        </div>
      </div>
      <div class="col-md-3 col-sm-12 mt-2">
      <div class="row">
          <div class="col-md-4" style="padding: 0px 5px;">
          <label for="mobile" class="form-label" style="display:flex; text-align:center; align-items:center;">माेबाईल नं.: <span class="member_formValidation" style="color:red; display:flex; font-size:20px;">*</span></label>
          </div>
          <div class="col-md-8">
          <input type="text" name="pMobileNo" class="form-control pMobileNo pMobileNo1 InputStyle" id="MobileNo">
          </div>
        </div>
      </div>
      <div class="col-md-6 col-sm-12 mt-2">
      <div class="row">
          <div class="col-md-2">
          <label for="email" class="form-label">इमेल:</label>
          </div>
          <div class="col-md-10">
          <input type="email" name="pEmail" class="form-control InputStyle" id="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{3,3}$">
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  $(document).ready(function(){
 
// Check if Mobile Number is provided in database 
// Check if Mobile Number is provided in database 
$('#MobileNo').on('blur', function() {
    var MobileNo = $(this).val();
   // Check if the input is blank
  if (MobileNo.trim() === '') {
        return; // Exit the function without making the AJAX request
    }


    $.ajax({
        url: 'validationCode/mobileNoValidation.php',
        type: 'GET',
        data: { MobileNo: MobileNo },
        dataType: 'json',
        success: function(data) {
            if (data.result === true) {
                alert('Mobile number is already exists. Please try another mobile number. Thank you!');
                $('#MobileNo').val(''); // Clear the input field
            }
        },
        error: function(xhr, status, error) {
            alert('An error occurred: ' + error);
        }
    });
});


// Check if Telephone Number is provided in database 
// Check if Telephone Number is provided in database 
$('#TelephoneNo').on('blur', function() {
    var TelephoneNo = $(this).val();
  // Check if the input is blank
  if (TelephoneNo.trim() === '') {
        return; // Exit the function without making the AJAX request
    }


    $.ajax({
        url: 'validationCode/telephoneNo_validation.php',
        type: 'GET',
        data: { TelephoneNo: TelephoneNo },
        dataType: 'json',
        success: function(data) {
            if (data.result === true) {
                alert('Telephone number is already exists. Please try another telephone number. Thank you!');
                $('#TelephoneNo').val(''); // Clear the input field
            }
        },
        error: function(xhr, status, error) {
            alert('An error occurred: ' + error);
        }
    });
});

// Check if Email Id is provided in database 
// Check if Email ID is provided in database 
$('#Email').on('blur', function() {
    var Email = $(this).val();

// Check if the input is blank
if (Email.trim() === '') {
        return; // Exit the function without making the AJAX request
    }
    
    $.ajax({
        url: 'validationCode/permanentEmail_validation.php',
        type: 'GET',
        data: { Email: Email },
        dataType: 'json',
        success: function(data) {
            if (data.result === true) {
                alert('Email Id is already exists. Please try another email Id. Thank you!');
                $('#Email').val(''); // Clear the input field
            }
        },
        error: function(xhr, status, error) {
            alert('An error occurred: ' + error);
        }
    });
});
     
     
     
      
      
      
     $("#sameasPermanentAdd").click(function(){
         if($("#sameasPermanentAdd").prop('checked')){
                    $("#perProvince").text(function () {
                var prov = $(this).val();
                $("#province").val(prov);
            });
            $("#perDistrict").text(function () {
                var Disvalue = $(this).val();
                // alert(Disvalue);
                // $("#district").val(Disvalue);
                var htm = '<option value="'+Disvalue+'" selected>'+Disvalue+'</option>';
                $("#district").append(htm);
            });
            $("#perMunicipality").text(function () {
                var munvalue = $(this).val();
                 var htm = '<option value="'+munvalue+'" selected>'+munvalue+'</option>';
                $("#municipality").append(htm);
            });
            $("#pWardNo").text(function () {
                var cWard = $(this).val();
                $("#cwardNo").val(cWard);
            });
            $("#TelephoneNo").text(function () {
                var tele = $(this).val();
                $("#telephoneno").val(tele);
            });
            $("#MobileNo").text(function () {
                var mob = $(this).val();
                $("#cmobileNo").val(mob);
            });
            $("#Email").text(function () {
                var eml = $(this).val();
                $("#cEmail").val(eml);
            });
                }else{
                    var valueee='';
                    $("#province").val(valueee);
                    $("#district").empty();
                    $("#district").empty(valueee);
                    $("#municipality").val(valueee);
                    $("#municipality").empty();
                    $("#cwardNo").val(valueee);
                    $("#telephoneno").val(valueee);
                     $("#cmobileNo").val(valueee);
                     $("#cEmail").val(valueee);
                    
                }
            
            // $("#sameasPermanentAdd").empty();
     });
// start validation code line in jquery from here 
$(".pMobileNo").on("keypress", function (e) {
    console.log(e.which);
    if($('.pMobileNo1').val().length >13 ){
      alert("not more than 14");
      return false;  
    } else if(e.which >= 43 && e.which <=57 && e.which != 44 && e.which != 45 && e.which != 46 && e.which != 46 && e.which != 47 ){
      return true;

    }else{
      alert("Only Numbers and plus (+) are allowed");
      return false;   
    }
  });

  $(".pPhoneNo2").on("keypress", function (e) {
    console.log(e.which);
    if($('.pPhoneNo3').val().length >9 ){
      alert("not more than 10");
      return false;  
    } else if(e.which >= 45 && e.which <=57 && e.which != 47 && e.which != 46){
       return true;

    }else{
      alert("Only Numbers and dash (-) are allowed");
      return false;   
    }
  });
  // end validation code line in jquery from here 
  // $(".pPhoneNo").on("keypress", function (e) {
  //   console.log(e.which);
  //   if($('.pPhoneNo1').val().length >9 ){
  //     alert("not more than 10");
  //     return false;  
  //   } else if(e.which >= 48 && e.which <=57 ){
  //      return true;

  //   }else{
  //     alert("Only Numbers are allowed");
  //     return false;   
  //   }
  // });

// end validation code line in jquery from here 


  
  $("#perProvince").change(function () {
            var province = $(this).val();
            // alert (province);
            $.ajax({
                type: 'POST',
                url: 'library/permanentaddress_library.php',
                data: { give_district_from_servers: province },
                success: function (data) {
                    console.log(data);
                    var da = JSON.parse(data);
                    if (da.status_code == '200') {
                        $("#perDistrict").empty();
                        $("#perDistrict").append('<option value="">Choose..</option>');
                        var html = '';
                        jQuery.each(da.address, function (i, district) {
                            var dis = district.district;
                            dis = dis.toUpperCase();
                            html+='<option value="' + dis + '" >' + dis + '</option>';
                        });
                        $("#perDistrict").append(html);
                    }
                    else {
                        $("#perDistrict").empty();
                        $("#perDistrict").append('<option value="">Choose..</option>');
                    }
                }
            });
        });


        $("#perDistrict").change(function () {
            var district = $(this).val();
            $.ajax({
                type: 'POST',
                url: 'library/permanentaddress_library.php',
                data: { give_municipality_from_servers: district },
                success: function (data) {
                    console.log(data);
                    var da = JSON.parse(data);
                    if (da.status_code == '200') {
                        $("#perMunicipality").empty();
                        $("#perMunicipality").append('<option value="">Choose..</option>');
                        jQuery.each(da.address, function (i, municipality) {
                            var muni = municipality.municipality;
                            muni = muni.toUpperCase();
                            $("#perMunicipality").append('<option value="' + muni + '" >' + muni + '</option>');
                        });
                    }
                    else {
                        $("#perMunicipality").empty();
                        $("#perMunicipality").append('<option value="">Choose..</option>');
                    }
                }
            });
        });  
       
      });
</script>
