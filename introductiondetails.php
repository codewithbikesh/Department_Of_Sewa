<div class="err"></div>
 <div class="container mt-4 mb-4" style="background-color: #f2f2f2;" id="ContainerStyle">
  <div class="row" id="rowStyle">
    <div  class="row">
      <!--volunteer checked option code line here -->
      <!--volunteer checked option code line here -->
    <div class="col-md-5 d-flex justify-content-start align-items-center">
        <div class="form-check">
  <span class="fs-4"><input class="form-check-input flexCheckDefault" type="checkbox" value="Member" name="Role" id="flexCheckDefault"></span>
  <label class="form-check-label fs-5" for="flexCheckDefault">
    Checked Volunteer Only !
  </label>
</div>
    </div>
     <!--volunteer checked option code line here -->
      <!--volunteer checked option code line here -->
      <!-- user wise unique code  -->
      <!-- user wise unique code  -->
      <div class="col-md-5 d-flex justify-content-start align-items-center">
        <div class="row">
          <div class="col-md-3" style="display:flex; text-align:center; align-items:center;">
            <label for="inputEmail4" class="form-label">User-ID: </label>
          </div>
          <div class="col-md-9">
   <?php      
    $con = connectMyDB();
   //  $ids=$_GET['ids'];
   $sql = "SELECT IFNULL(MAX(id), 0) AS user_id FROM introductiondetails";
   $result = mysqli_query($con, $sql);
  
   $row = mysqli_fetch_assoc($result);
   //(int)$row['rUser_Id']
   $data = $row['user_id'];
   $data++;
   // Concatenate 'user' and the incremented integer
   $user = 'No.'.$data;    
            ?>
                <input type="text" id="dynamicInput" name="rUserID" value="<?php echo $user; ?>" class="form-control" placeholder="Unique code" readonly>
                <!-- <input type="text" class="form-control InputStyle" name="nameCapital" id="txtCapitalName" oninput="this.value = this.value.toUpperCase()"> -->
              </div>
            </div>
          </div>
          <!-- start image section from here   -->
          <!-- start image section from here   -->
    <div class="col-md-2 d-flex justify-content-end align-items-center">
        <div id="imgArea"><img id="blah" src="../image_upload/img/default.jpg" alt="your image" width="80" height="80" />
          <div class="progressBar">
                <div class="bar"></div> 
                <div class="percent">0%</div>
          </div>
          <div id="imgChange"><span>Photo</span>
                <input type="file" accept="image/png, image/jpeg" name="image_upload_file" id="image_upload_file" onchange="uploadFile()">
                <span id="spnMessage" class="error" style="display: none;"></span>
          </div>
        </div>
    </div>
     <!-- end image section from here   -->
     <!-- end image section from here   -->
  </div>

  
<!-- end passport size photo code line from here  -->
 <div class="row">
    <div class="col-md-12">
        <div class="row">
          <div class="col-md-12 col-sm-12 mt-2" id="Name">
            <div class="row">
              <div class="col-md-2">
                <label for="rName" style="display:flex; text-align:center; align-items:center;">नाम थर: <span class="member_form_validation" style="color:red; display:flex; font-size:20px;">*</span></label>
              </div>
              <div class="col-md-10">
                <input type="text" name="name" id="txtName"  class="form-control InputStyle Language"> 
              </div>
            </div>
        
          </div>
        </div>

    <div class="row">
        <div class="col-md-12 col-sm-12 mt-2">
           <div class="row">
                <div class="col-md-2">
                    <label for="inputEmail4" class="form-label" style="display:flex; text-align:center; align-items:center;">Name (In Block Letter): <span class="member_form_validation" style="color:red; display:flex; font-size:20px;">*</span></label>
                </div>
                <div class="col-md-10">
                    <input type="text" class="form-control InputStyle" name="nameCapital" id="txtCapitalName" oninput="this.value = this.value.toUpperCase()">
                </div>
           </div>  
    
        </div>
    </div>
    </div>
</div>

    <div class="row">
      <div class="col-md-4 col-sm-12 mt-2">
       <div class="row">
        <div class="col-md-6">
        <label for="inputCity" class="form-label" style="display:flex; align-items:center;">जन्म मिति: बि.सं.<span class="member_form_validation" style="color:red; display:flex; font-size:20px;">*</span></label>
        </div>
        <div class="col-md-6">
         
            <script>
                  $("#defaultdate").on("blur",function(){
           
                var year = new Date().getFullYear();
            
            var newDate = $("#defaultdate").val();
          
            var nwyear = new Date(newDate).getFullYear();
          
          var ages =year-nwyear;
        //   alert(ages);
          //$("#getmiti").val(ages);
        });
            </script>
        <input type="text" class="form-control InputStyle" id="miti" placeholder="Date Of Birth" name="dob">
        </div>
       </div>
       
      </div>
      <div class="col-md-2 col-sm-12 mt-2">
        <div class="row">
          <div class="col-md-2" style="padding: 0px;">
          <label for="inputState" class="form-label" style="display:flex; align-items:center;">ई.सं.<span class="member_form_validation" style="color:red; display:flex; font-size:20px;">*</span></label>
          </div>
          <div class="col-md-10">
          <input type="text" class="form-control InputStyle" id="defaultdate" name="eDate">
          </div>
        </div>
        
      </div>

      <div class="col-md-2 col-sm-12 mt-2">
        <div class="row">
          <div class="col-md-2" style="padding: 0px;">
          <label for="inputState" class="form-label" style="display:flex; align-items:center;">उमेर:<span class="member_form_validation" style="color:red; display:flex; font-size:20px;">*</span></label>
          </div>
          <div class="col-md-10">
          <input type="text" class="form-control InputStyle" id="age" name="age" >
          </div>
        </div>
        
      </div>
      
      <div class="col-md-4 col-sm-12 mt-2">
        <div class="row">
          <div class="col-md-2">
          <label for="inputZip" class="form-label" style="display:flex; align-items:center;">राष्ट्रियता:<span class="member_form_validation" style="color:red; display:flex; font-size:20px;">*</span></label>
          </div>
          <div class="col-md-10">
          <select name="nationality" id="nationality" class="InputStyle Nationality form-select" aria-label="Default select example" style="font-weight: bold; font-size: 12px;">
            <option value="">Select...&nbsp;&nbsp;</option>
            <?php
            $qry = "SELECT DISTINCT `COL 1` as country FROM `country`";
            $con = connectMyDB();
            $req = mysqli_query($conn,$qry);
            if(mysqli_num_rows($req) > 0){
              while($data = mysqli_fetch_assoc($req)){
            ?>
            <option value="<?php echo $data['country'] ?>"><?php echo $data['country'] ?></option>
            <?php 
            }}
            ?>
          </select>
          </div>
        </div>
        
      </div>
    </div>

    <div class="row">
      <div class="col-md-4 col-sm-12 mt-2">
        <div class="row">
          <div class="col-md-6">
          <label for="inputState" class="form-label" style="display:flex; align-items:center;">शैक्षिक याेग्यता:<span class="member_formValidation" style="color:red; display:flex; font-size:20px;">*</span></label>
          </div>
          <div class="col-md-6">

          <!-- start selector option code line from here  -->
          <select id="education" name="Education" onchange="other(this)" class="form-select" style="font-weight: bold; font-size: 12px;">
          <option value="">Select...&nbsp;&nbsp;</option>
        <?php
        $qry = "SELECT `education` FROM `education` WHERE 1";
            $con = connectMyDB();
            $req = mysqli_query($conn,$qry);
            if(mysqli_num_rows($req) > 0){
              while($data = mysqli_fetch_assoc($req)){
            ?>
            <option value="<?php echo $data['education'] ?>"><?php echo $data['education'] ?></option>
            <?php 
            }}
            ?>
            <option value="OtherEd" class="otherField" id="OtherEd">Other अन्य Specify.....</option>   
        </select>
            <input type="text" name="education" class="form-control InputStyle" id="otherEducation" style="width:145px;" placeholder="Other Education">

            <!-- end selector option code line  from here -->
    </div>
       
      </div>
  </div>
      <div class="col-md-4 col-sm-12 mt-2">
        <div class="row">
          <div class="col-md-1" style="padding:0px;">
          <label for="inputCity" class="form-label" style="display:flex; align-items:center;">पेशा:<span class="member_formValidation" style="color:red; display:flex; font-size:20px;">*</span></label>
        </div>
        <div class="col-md-11">
     
              <input type="text" class="form-control InputStyle" id="profession" name="profession"> 
          </div>
        </div>
       </div>
      <!-- </div> -->

      <div class="col-md-4 col-sm-12 mt-2">
        <div class="row">
          <div class="col-md-2">
          <label for="inputCity" class="form-label" style="display:flex; align-items:center;">लिङ्ग:<span class="member_formValidation" style="color:red; display:flex; font-size:20px;">*</span></label>      
          </div>
          <div class="col-md-10">
         <input type="radio" name="gender" id="Male" class="checked" value="पुरुष">
         <label for="पुरुष" id="lblMale" class="clsgender" data-rdb="Male">पुरुष</label>  
         <input type="radio" name="gender" id="Female" class="checked" value="महिला">
          <label for="महिला" id="lblFemale" class="clsgender" data-rdb="Female">महिला</label>
          <input type="radio" name="gender" id="Other" class="checked" value="अन्य">
          <label for="" id="lblOther" class="clsgender" data-rdb="Other">अन्य</label>
          </div>
        </div>
       
      </div>
    </div>

    <div class="row">
      <div class="col-md-12 mt-2">
        <div class="row">
          <div class="col-md-2">
          <label for="inputState" class="form-label" style="display:flex; align-items:center;">विशेष याेग्यता:<span class="formValidation member_formValidation" style="color:red; display:flex; font-size:20px;">*</span></label>
          </div>
          <div class="col-md-10">
          <input type="text" class="form-control InputStyle" id="specialAbility" name="specialAbility">
          </div>
        </div>
          
      </div>
    </div>
    
    <div class="row">
      <div class="col-md-6 mt-2">
        <div class="row">
          <div class="col-md-4">
          <label for="inputCity" class="form-label" style="display:flex; align-items:center;">वैवाहिक अवस्था:<span class="member_formValidation" style="color:red; display:flex; font-size:20px;">*</span></label>
          </div>
          <div class="col-md-8">
          <input type="radio" name="maritalStatus" id="Married" value="विवाहित">
          <label for="विवाहित" class="clsMaritalStatus" data-rdb="Married">विवाहित</label> 
          <input type="radio" name="maritalStatus" id="Unmarried" value="अविवाहित">
          <label for="अविवाहित" class="clsMaritalStatus" data-rdb="Unmarried">अविवाहित</label> 
          <input type="radio" name="maritalStatus" id="Other1" value="अन्य">
          <label for="अन्य" class="clsMaritalStatus" data-rdb="Other1">अन्य</label>
          </div>
          </div>
        </div>
     

      <div class="col-md-6 mt-2">
        <div class="col-md-2">
        <label for="inputZip" class="form-label" style="display:flex; align-items:center;">मातृ भाषा:<span class="member_formValidation" style="color:red; display:flex; font-size:20px;">*</span></label>
        </div>
          <div class="col-md-10" style="padding: 0px;">
          <!--<input type="text" class="form-control InputStyle" id="motherToungue" name="motherToungue">-->
          <select name="motherToungue" id="motherToungue" class="InputStyle form-select" aria-label="Default select example" style="font-weight: bold; font-size: 12px;">
            <option value="">Select...&nbsp;&nbsp;</option>
            <?php
            $qry = "SELECT DISTINCT `COL 1` as languages_spoken_in_nepal FROM `languages_spoken_in_nepal`";
            $con = connectMyDB();
            $req = mysqli_query($conn,$qry);
            if(mysqli_num_rows($req) > 0){
              while($data = mysqli_fetch_assoc($req)){
            ?>
            <option value="<?php echo $data['languages_spoken_in_nepal'] ?>"><?php echo $data['languages_spoken_in_nepal'] ?></option>
            <?php 
            }}
            ?>
          </select>
          </div>
      
      </div>
    </div>

    <div class="row">
      <div class="col-md-4 mt-2">

      <div class="row">
        <div class="col-md-6">
        <label for="inputCity" class="form-label" style="display:flex; align-items:center;">नागरिकता नं:<span class="member_formValidation" style="color:red; display:flex; font-size:20px;">*</span></label>
        </div>
        <div class="col-md-6">
        <input type="text" class="form-control CitizenhipNo  InputStyle" id="citizenshipNo" name="citizenshipNo">
        </div>
      </div>
     
      </div>
      <div class="col-md-4 mt-2">
       <div class="row">
        <div class="col-md-4">
        <label for="inputState" class="form-label" style="display:flex; align-items:center;">जारी गरेको मिति:<span class="member_formValidation" style="color:red; display:flex; font-size:20px;">*</span></label>
        </div>
        <div class="col-md-8">
        <input type="text" class="form-control InputStyle" id="jariMiti" name="issuedDate" placeholder="Date of Issue">
        </div>
       </div>
        
      </div>
      <div class="col-md-4 mt-2">
         <div class="row">
          <div class="col-md-4" style="padding:0px;">
          <label for="inputZip" class="form-label" style="display:flex; align-items:center;">जारी गरेको स्थान:<span class="member_formValidation" style="color:red; display:flex; font-size:20px;">*</span></label>
          </div>
          <div class="col-md-8">
          <input type="text" class="form-control InputStyle" id="issuedLocation" name="issuedLocation">
          </div>
         </div>
        
      </div>
<!-- </form> -->
    </div>
  </div>
</div>
<!-- end introduction details section from here  -->

<script>
  
  function other(input){
                var other = $(input).val();
                console.log(other);
                if(other == 'OtherEd'){
                  $("#otherEducation").show();
                    $("#education").hide();
                }else if(other == "OtherCenter"){
                  $("#otherCenter").show();
                    $("#d_center").hide();
                }
              
              }

  $(document).ready(function(){
   
 // Check if CitizenshipNo is provided in database 
// Check if CitizenshipNo is provided in database 
    $('#citizenshipNo').on('blur', function() {
    var CitizenshipNo = $(this).val();
    $.ajax({
        url: 'validationCode/nagirtaValidation.php',
        type: 'GET',
        data: { CitizenshipNo: CitizenshipNo },
        dataType: 'json',
        success: function(data) {
            if (data.result === true) {
                alert('"Citizenship Number already exists. Please try another Citizenship Number. Thank you!"');
                $('#citizenshipNo').val(''); // Clear the input field
            }
        },
        error: function(xhr, status, error) {
            alert('An error occurred: ' + error);
        }
    });
});

    //  take input as a preeti font while typing in input field 
    //  take input as a preeti font while typing in input field 
//     $('body').on('input', '.convert-preeti', function (event) {
// 			var text = this.value;
// 			var convert = setUnicodePreeti(text);
// 			this.value = convert;

// 			return true;
// 		});
      
     $('#otherCenter').hide();  
     
    //  $(document).on("click",".otherField",function(){
    //  $("#education").hide();
    //  $("#otherEducation").show();
    // });
     
    $(".CitizenhipNo").on("keypress", function (e) {
    console.log(e.which);
    if($('.CitizenhipNo').val().length >13 ){
      alert("not more than 14");
      return false;  
    } else if(e.which >= 45 && e.which <=57 && e.which != 47 && e.which != 46){
       return true;
    }else{
      alert("Only Numbers and dash (-) are allowed");
      return false;   
    }
  });
  
//  change the qualification selection optin after click on other option jquery code over here  
//  change the qualification selection optin after click on other option jquery code over here 
               $("#otherEducation").hide();
            //   $("#education").on("change",function(){
            //   	var som = $(this).val();
            //   	if(som === "Other"){
            //     	$("#otherEducation").show();
            //         $("#education").hide();
            //     }
            //   });
  });
  
//   by default member value pass through jquery
//   by default member value pass through jquery
$( window ).on( "load", function() {
let volunteerChecked = $("#flexCheckDefault").val();
 if(volunteerChecked == ""){
   $("#attendStatusHidden").val(Member);
 }
});

 $("#flexCheckDefault").val('Member');
// checked if volunteer otherwise unchecked pass value member
  $("#flexCheckDefault").on("change", function() {
  if ($(this).prop("checked")) {
    $(this).val('Volunteer');
  } else {
        $(this).val('Member');

  }
});
</script>