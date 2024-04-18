<?php
// included here header file 
// included here header file 
include('header.php');
//  Connection to the database 
include('updatesubmit.php');
 ?>
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta charset="ISO-8859-1">
  <title>Update</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="../../custom.css">
  <link rel="stylesheet" href="../../../css/bootstrap.min.css">
  <link rel="stylesheet" href="../../../css/font.min.css">
  <link href="../../../image_upload/css/style.css" rel="stylesheet">
  <link rel="stylesheet€" href=”https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker3.min.css”>
  <link rel="stylesheet" href="../../../css/nepali.datepicker.v4.0.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <!-- <script src="customjquery.js"></script> -->
  <!-- Option 1: Bootstrap Bundle with Popper -->
  
   <!--preeti font code over here-->
   <!--preeti font code over here-->
   <script src="js/preeti.js"></script>
   
  
  <style>
    .panel-heading {
      padding: 5px 15px;
    }

    .panel-title {
      font-weight: bold;
    }

    .InputStyle {
      /* height: 22px; */
      height: 28px;
    }

    .Language {
      height: 28px;
      /* outline: hidden; */
      /* border-color: transparent; */
      /* border-bottom: 4px dotted #a7a7a7; */
      /* background-color: #f2f2f2; */
    }

    #ContainerStyle {

      border-radius: 10px;
    }

    #rowStyle {
      margin: 10px 10px 10px 10px;
      padding: 10px;
    }

    .col {
      padding: 5px;

    }

    label {
      font-size: 12px;
      font-weight: 12px;
      font-family: 'Times New Roman', Times, serif;
    }

    .SpanStyle {
      display: flex;
      flex-direction: row;
      margin: 5px;
      align-items: center;
    }

    #SewaDetails {
      width: 97%;
      height: 300px;
      border: 2px solid black;
      padding: 10px;

    }

    .YesNo {
      display: flex;
      flex-direction: column;
    }

    .CheckBoxStyle {
      display: flex;
      flex-direction: row;
    }

    .icon {
      outline: none;
      border: none;
      background: transparent;

    }

    .save {
      background-color: #a7a7a7;
      border-radius: 5px;
      color: white;
    }

    .SaveIcon {
      height: 15px;
      width: 15px;
    }


    /* start css code for report button from  here   */
    #ReportStyle {
      text-decoration: none;
      color: white;
    }

    #BlockOpen {
      display: none;
    }
  </style>
</head>

<body>
<!--end navigation part here-->
<!--end navigation part here-->

<div class="topbar pt-3" style="background:#424a4a;"><a class="btn"><i class="bi bi-list p-3 text-white" id="colpsCustom"></i></a><span class="text-white fw-bold mt-3">Edit</span>
</div>

  <div class="container-fluid pt-4">
     <?php
            if(isset($regmsg)){
            echo $regmsg;
              }
            ?>
    <!-- class="was-validated" -->
    <form action="" method="POST" id="formSubmit" enctype="multipart/form-data">
      <div class="panel-group" id="accordion">
        <div class="panel panel-default">
          <div class="panel-heading" data-toggle="collapse" data-parent="#accordion" href="#collapse1">
            <h4 class="panel-title">
              <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">परिचय विवरण</a>
            </h4>
          </div>
          <div id="collapse1" class="panel-collapse collapse in">
            <div class="panel-body">

              <!-- start line Included Introduction details section from here  -->
              <?php
              include('update/introductiondetailsupdate.php');
              ?>
              <!-- end line Included Introduction details section from here  -->

            </div>
          </div>
        </div>

        <div class="panel panel-default">
          <div class="panel-heading" data-toggle="collapse" data-parent="#accordion" href="#collapse2">
            <h4 class="panel-title">
              <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">स्थायी ठेगाना</a>
            </h4>
          </div>
          <div id="collapse2" class="panel-collapse collapse">
            <div class="panel-body">

              <!-- start current address line from here  -->
              <?php
              
               include('update/permanentaddressupdate.php');
              ?>
              <!-- start current address line from here  -->

            </div>
          </div>
        </div>
        </div><!--add this div for space-->

        <div class="panel panel-default">
          <div class="panel-heading" data-toggle="collapse" data-parent="#accordion" href="#collapse3">
            <h4 class="panel-title">
              <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">हालको ठेगाना</a>
            </h4>
          </div>
          <div id="collapse3" class="panel-collapse collapse">
            <div class="panel-body">
              <!-- start parmanent address line from here  -->
              <?php
             include('update/currentaddressupdate.php');
              ?>
              <!-- start parmanent address line from here  -->
            </div>
          </div>
        </div>
        </div> <!--add this div for space-->

        <div class="panel panel-default">
          <div class="panel-heading" data-toggle="collapse" data-parent="#accordion" href="#collapse4">
            <h4 class="panel-title CollapseButton">
              <a data-toggle="collapse" data-parent="#accordion" href="#collapse4">AGPS सँगको विवरण</a>
              <!-- #collapse2 -->
            </h4>
          </div>
          <div id="collapse4" class="panel-collapse collapse"> <!--collapse-->
            <div class="panel-body">
              <!-- start  description with AGPS  code line from here   -->
              <?php
              include('update/agpsupdate.php');
              ?>
              <!-- End  description with AGPS  code line from here   -->
            </div>
          </div>
          </div>
        </div>
        </div><!--add this div for space-->

         <div class="panel panel-default">
          <div class="panel-heading" data-toggle="collapse" data-parent="#accordion" href="#collapse5">
            <h4 class="panel-title CollapseButton">
              <a data-toggle="collapse" data-parent="#accordion" href="#collapse5">वैकल्पिक सम्पर्क</a>
              <!-- #collapse2 -->
            </h4>
          </div>
          <div id="collapse5" class="panel-collapse collapse"> <!--collapse-->
            <div class="panel-body">
              <!-- start  description with AGPS  code line from here   -->
              <?php
              include('update/alternative_contact.php');
              ?>
              <!-- End  description with AGPS  code line from here   -->
            </div>
          </div>
          </div>
        <!--</div>-->
        <!--</div><!--add this div for space-->

        <div class="panel panel-default">
          <div class="panel-heading" data-toggle="collapse" data-parent="#accordion" href="#collapse6">
            <h4 class="panel-title CollapseButton1">
              <a data-toggle="collapse" data-parent="#accordion" href="#collapse6">भाषा विवरण</a>
              <!-- #collapse2 -->
            </h4>
          </div>
          <div id="collapse6" class="panel-collapse collapse"> <!--collapse-->
            <div class="panel-body">
              <!-- Start Language Description code line from here  -->
              <?php
              include('update/languagedetailsupdate.php');
              ?>
              <!-- Start Language Description code line from here  -->
            </div>
          </div>
        </div>
        </div><!--add this div for space-->

        <div class="panel panel-default">
          <div class="panel-heading" data-toggle="collapse" data-parent="#accordion" href="#collapse7">
            <h4 class="panel-title CollapseButton2">
              <a data-toggle="collapse" data-parent="#accordion" href="#collapse7">स्वास्थ्य विवरण</a>
              <!-- #collapse2 -->
            </h4>
          </div>
          <div id="collapse7" class="panel-collapse collapse"> <!--collapse-->
            <div class="panel-body">
              <!-- Start Health Details code line from here  -->
              <?php
              include('update/healthdetailsupdate.php');
              ?>
              <!-- End Health Details code line from here  -->
            </div>
          </div>
        </div>
        </div><!--add this div for space-->

        <div class="panel panel-default" id="service_attached">
          <div class="panel-heading" data-toggle="collapse" data-parent="#accordion" href="#collapse8">
            <h4 class="panel-title CollapseButton3">
              <a data-toggle="collapse" data-parent="#accordion" href="#collapse8">सेवामा संलग्न विवरण</a>
              <!-- #collapse2 -->
            </h4>
          </div>
          <div id="collapse8" class="panel-collapse collapse"> <!--collapse-->
            <div class="panel-body">
              <!-- Start Service Attached Details Code Line From Here  -->
              <?php
              include('update/serviceattacheddetailsupdate.php');
              ?>
              <!-- End Service Attached Details Code Line From Here  -->
            </div>
          </div>
        </div>
        </div><!--add this div for space-->
        <!-- </div> -->
        <!-- </div>  -->
        <!--Bikesh kumar gupta collapesed-->

        <!-- Start सेवा समय अवधी विवरण section from here  -->
        <div class="panel panel-default" id="service_time">
          <div class="panel-heading" data-toggle="collapse" data-parent="#accordion" href="#collapse9">
            <h4 class="panel-title">
              <a data-toggle="collapse" data-parent="#accordion" href="#collapse9">सेवा समय अवधी विवरण</a>
              <!-- #collapse2 -->
            </h4>
          </div>
          <div id="collapse9" class="panel-collapse collapse"> <!--collapse-->
            <div class="panel-body">
              <!-- Start Service Time Details Code Line From Here  -->
              <?php
              include('update/servicetimedetailsupdate.php');
              ?>
              <!-- End Service Time Details Code Line From Here  -->
            </div>
          </div>
        </div>
        </div><!--add this div for space-->
      </div>
  </div>
  <!-- </div> -->
  <!-- </div> -->
  <!-- start button section from here -->
  <div class="form-group" style="padding: 10px 10px 10px 10px;">
    <label for="" class="col-md-9 control-label"></label>
    <div class="col-md-1">
    </div>
    <div class="col-md-2">
     <button class="button icon save" id="btnSave" type="submit" name="updateVolunteer"><span><i
            class="fa-solid fa-floppy-disk SaveIcon"></i>&nbsp;update</span></button>
            <button class="button icon save" id="member" type="submit" name="updateMember"><span><i
            class="fa-solid fa-floppy-disk SaveIcon"></i>&nbsp;update</span></button>
            <script>      
      $(document).ready(function(){
       
      });
      </script>
    </div>
  </div>
  <!-- </div> --> <!---today comment-->
  <!-- End button section from here  -->
  </form>
  <!-- </div> -->
  <!-- </div> -->
  <!-- </div> -->
  
 <!--this div giving for space on the bottom -->
 <!--this div giving for space on the bottom -->
 <div style="margin-bottom:96px;"></div>

  
  <!-- font awesome js  -->
  <script src="../../../js/font.min.js"></script>
  <!-- jquery js  -->
  <script src="js/jquery.min.js"></script>
  <script src="../image_upload/js/jquery.min.js"></script>
  <script src="../image_upload/js/jquery.form.js"></script> 
  <!-- bootstrap js  -->
  <script src="../../../js/bootstrap.min.js"></script>
  <script src="http://nepalidatepicker.sajanmaharjan.com.np/nepali.datepicker/js/nepali.datepicker.v4.0.min.js" type="text/javascript"></script>
  <!-- bootstrap popper js  -->
  <!-- <script src="js/popper.min.js"></script> -->
  <script>
   async function uploadFile() {
    let formData = new FormData(); 
    formData.append("file", image_upload_file.files[0]);
    await fetch('../image_upload/image_uploader.php', {
      method: "POST", 
      body: formData
    }); 
    alert('The file has been uploaded successfully.');
    var name = $('#image_upload_file').val().replace(/C:\\fakepath\\/i, '../image_upload/profilPicture/');
    $("#blah").attr("src",name);
    }

             
    $(document).ready(function () { 
    // Apply jquery code on Volunteer or Member Submit Button 
    // Apply jquery code on Volunteer or Member Submit Button
      $("#flexCheckDefault").on("change",function(){
                if($(this).is(":checked")){
                    $("#btnSave").show();
                    $("#member").hide();
                }else{
                    $("#member").show();
                    $("#btnSave").hide();
                }

      });
    
    
    // show the button when user change the checkbox behaviour     
    // show the button when user change the checkbox behaviour     
    let checkBox =  $("#flexCheckDefault").is(":checked");
    if(checkBox){
        $("#btnSave").show();
       $("#member").hide(); 
    }
    if(!checkBox){
       $("#member").show(); 
        $("#btnSave").hide();
    }  
    
    
      // show service_attached page when user change the checkbox behaviour     
      // show service_attached page when user change the checkbox behaviour     
    // let checkBox =  $("#flexCheckDefault").is(":checked");
    if(checkBox){
      $("#service_time").show();
      $("#service_attached").show();
    }
    if(!checkBox){
       $("#service_time").hide();
       $("#service_attached").hide();
    }  
    
    
    
     // alert to disappear after 3 seconds jquery code 
    // alert to disappear after 3 seconds jquery code 
    setInterval(function(){ $(".alert").fadeOut(); }, 3000);        
        
        
   // start form validation for volunteer in introduction  through jquery 
   // start form validation for volunteer in introduction through jquery 
      $(".formValidation").show();
      $("#flexCheckDefault").on("change",function(){
                if($(this).is(":checked")){
                    $(".formValidation").hide();
                }else{
                    $(".formValidation").show();
                }
      });
      

       // hide volunteer form code line from here 
      // hide volunteer form code line from here 
      $("#flexCheckDefault").on("change",function(){
                if($(this).is(":checked")){
                   $("#service_time").show();
                   $("#service_attached").show()
                }else{
                 $("#service_time").hide();
                 $("#service_attached").hide()
                }
      });
    
// service attachment validation code line from here 
// service attachment validation code line from here 
$("#flexCheckDefault").on("change",function(){
                if($(this).is(":checked")){
                  
                  const form = $('#formSubmit');
const checkboxes = form.find('.serviceChecked');

form.on('submit', function(event) {
  let isChecked = false;

  checkboxes.each(function() {
    if ($(this).prop('checked')) {
      isChecked = true;
    }
  });

  if (!isChecked) {
    event.preventDefault(); // Prevent form submission
    alert('Please select at least one checkbox from सेवामा संलग्न विवरण');
  }
});
                }else{
                     return false;
                }

      })
        
        
        
   // jquery code of gender here 
      $(".clsgender").on("click", function () {
        var id = $(this).data("rdb");
        $("#" + id).prop("checked", "checked");
        // alert("checked");
      });

      //  jQuery code of Married Status
      //  jQuery code of Married Status
      $(".clsMaritalStatus").on("click", function () {
        var id = $(this).data('rdb');
        $("#" + id).prop("checked", "checked");
        //  alert("you clicked me");
      });

     n = new Date();
     y = n.getFullYear();
     m = String(n.getMonth() + 1).padStart(2,"0");
     d = String(n.getDate()).padStart(2, "0");
     document.getElementById("defaultdate").value = y+ "-" + m + "-" + d;
   //  start date control code line in jquery from here 
       
$("#miti").nepaliDatePicker({
    ndpYear: true,
    ndpMonth: true,
    ndpYearCount: 50,
    dateFormat: "YYYY-MM-DD",
    onChange: function () {
         var year = new Date().getFullYear();
      var datestring = $("#miti").val();
      var nepDate = NepaliFunctions.BS2AD(datestring, "YYYY-MM-DD");
    //   $("#defaultdate").empty();
        $("#defaultdate").val(nepDate);
            var newDate = $("#defaultdate").val();
            var nwyear = new Date(newDate).getFullYear();
            var ages =year-nwyear;
            $("#age").val(ages);
    }
  });
  
  $("#jariMiti").nepaliDatePicker({
    ndpYear: true,
    ndpMonth: true,
    ndpYearCount: 50,
    dateFormat: "YYYY-MM-DD"
  });

  $("#defaultdate").focus(function () {
    var datestring1 = $("#defaultdate").val();
    var nepDate1 = NepaliFunctions.AD2BS(datestring1, "yy-mm-dd");
    $("#miti").val(nepDate1);
  });

  $(function () {
  $("#defaultdate").datepicker({
    changeMonth: true,
    changeYear: true,
    dateFormat: "yy-mm-dd",
    onSelect: function () {
      var datestring2 = $("#defaultdate").val();
      var nepDate2 = NepaliFunctions.AD2BS(datestring2, "yy-mm-dd");
      $("#miti").val(nepDate2);
      
    },
  });
  $( "#defaultdate" ).datepicker( "input", "showAnim", $( this ).val() );
  
});
// hide the start icon after checked on volunteer option 
// hide the start icon after checked on volunteer option 

     
     //  start form validation for member and volunteer part 
    //  start form validation for member and volunteer part 
function checkField(fieldId, errorMessage) {
    let fieldValue = $(fieldId).val();
    if (fieldValue == "") {
        alert(errorMessage);
        return false;
    }
    return true;
}


// check redio button is empty or not
function checkRadioField(fieldName, errorMessage) {
    if (!$('input[name="' + fieldName + '"]:checked').length > 0) {
        alert(errorMessage);
        return false;
    }
    return true;
}

function validateForm(event) {
    let isFormValid = true;
    let isCheckFieldChecked = $('#flexCheckDefault').is(':checked');
    isFormValid = checkField("#txtName", "The 'नाम थर' field is mandatory in 'परिचय विवरण'. Please ensure it is filled out.");
    if (!isFormValid) {
        event.preventDefault();
        return;
    }

    isFormValid = checkField("#txtCapitalName", "The 'Name (In Block Letter)' field is mandatory in 'परिचय विवरण'. Please ensure it is filled out.");
    if (!isFormValid) {
        event.preventDefault();
        return;
    }

    isFormValid = checkField("#miti", "The 'जन्म मिति: बि.सं.' field is mandatory in 'परिचय विवरण'. Please ensure it is filled out.");
    if (!isFormValid) {
        event.preventDefault();
        return;
    }
    
    isFormValid = checkField("#defaultdate", "The 'ई.सं.' field is mandatory in 'परिचय विवरण'. Please ensure it is filled out.");
    if (!isFormValid) {
        event.preventDefault();
        return;
    }
    
    isFormValid = checkField("#age", "The 'उमेर' field is mandatory in 'परिचय विवरण'. Please ensure it is filled out.");
    if (!isFormValid) {  
        event.preventDefault();
        return;
    }
    
     isFormValid = checkField("#nationality", "The 'राष्ट्रियता' field is mandatory in 'परिचय विवरण'. Please ensure it is filled out.");
    if (!isFormValid) {
        event.preventDefault();
        return;
    }
    
    isFormValid = checkField("#education", "The 'शैक्षिक याेग्यता' field is mandatory in 'परिचय विवरण'. Please ensure it is filled out.");
    if (!isFormValid) {
        event.preventDefault();
        return;
    }
    
     isFormValid = checkField("#profession", "The 'पेशा' field is mandatory in 'परिचय विवरण'. Please ensure it is filled out.");
    if (!isFormValid) {
        event.preventDefault();
        return;
    }
    
     isFormValid = checkRadioField("gender", "The 'लिङ्ग' field is mandatory in 'परिचय विवरण'. Please ensure it is filled out.");
    if (!isFormValid) {
        event.preventDefault();
        return;
    }
    
    
   if ($('#flexCheckDefault').is(':checked') && isCheckFieldChecked) {
    if (!isCheckFieldChecked) {
        if (!checkField("#specialAbility", "The 'विशेष याेग्यता' field is mandatory in 'परिचय विवरण'. Please ensure it is filled out.")) {
            event.preventDefault();
            return;
        }
    }
} else {
    if (!checkField("#specialAbility", "The 'विशेष याेग्यता' field is mandatory in 'परिचय विवरण'. Please ensure it is filled out.")) {
        event.preventDefault();
        return;
    }
}

    
    isFormValid = checkRadioField("maritalStatus", "The 'वैवाहिक अवस्था' field is mandatory in 'परिचय विवरण'. Please ensure it is filled out.");
    if (!isFormValid) {
        event.preventDefault();
        return;
    }
    
    isFormValid = checkField("#motherToungue", "The 'मातृ भाषा' field is mandatory in 'परिचय विवरण'. Please ensure it is filled out.");
    if (!isFormValid) {
        event.preventDefault();
        return;
    }
    
    isFormValid = checkField("#citizenshipNo", "The 'नागरिकता नं' field is mandatory in 'परिचय विवरण'. Please ensure it is filled out.");
    if (!isFormValid) {
        event.preventDefault();
        return;
    }
    
    isFormValid = checkField("#issuedDate", "The 'जारी गरेको मिति' field is mandatory in 'परिचय विवरण'. Please ensure it is filled out.");
    if (!isFormValid) {
        event.preventDefault();
        return;
    }
    
    isFormValid = checkField("#issuedLocation", "The 'जारी गरेको स्थान' field is mandatory in 'परिचय विवरण'. Please ensure it is filled out.");
    if (!isFormValid) {
        event.preventDefault();
        return;
    }
    
    isFormValid = checkField("#perProvince", "The 'प्रदेश' field is mandatory in 'स्थायी ठेगाना'. Please ensure it is filled out.");
    if (!isFormValid) {
        event.preventDefault();
        return;
    }
    
    isFormValid = checkField("#perDistrict", "The 'जिल्ला' field is mandatory in 'स्थायी ठेगाना'. Please ensure it is filled out.");
    if (!isFormValid) {
        event.preventDefault();
        return;
    }
    
    isFormValid = checkField("#perMunicipality", "The 'न.पा/गा.पा.' field is mandatory in 'स्थायी ठेगाना'. Please ensure it is filled out.");
    if (!isFormValid) {
        event.preventDefault();
        return;
    }
    
    isFormValid = checkField("#pWordNo", "The 'वाड नं' field is mandatory in 'स्थायी ठेगाना'. Please ensure it is filled out.");
    if (!isFormValid) {
        event.preventDefault();
        return;
    }
    
    isFormValid = checkField("#MobileNo", "The 'माेबाईल नं.' field is mandatory in 'स्थायी ठेगाना'. Please ensure it is filled out.");
    if (!isFormValid) {
        event.preventDefault();
        return;
    }
    
    isFormValid = checkField("#province", "The 'प्रदेश' field is mandatory in 'हालको ठेगाना'. Please ensure it is filled out.");
    if (!isFormValid) {
        event.preventDefault();
        return;
    }
    
    isFormValid = checkField("#district", "The 'जिल्ला' field is mandatory in 'हालको ठेगाना'. Please ensure it is filled out.");
    if (!isFormValid) {
        event.preventDefault();
        return;
    }
    
    isFormValid = checkField("#municipality", "The 'न.पा/गा.पा.' field is mandatory in 'हालको ठेगाना'. Please ensure it is filled out.");
    if (!isFormValid) {
        event.preventDefault();
        return;
    }
    
    isFormValid = checkField("#cwardNo", "The 'वाड नं' field is mandatory in 'हालको ठेगाना'. Please ensure it is filled out.");
    if (!isFormValid) {
        event.preventDefault();
        return;
    }
    
    isFormValid = checkField("#cmobileNo", "The 'माेबाईल नं.' field is mandatory in 'हालको ठेगाना'. Please ensure it is filled out.");
    if (!isFormValid) {
        event.preventDefault();
        return;
    }
    
    isFormValid = checkField("#rison", "The 'क्षेत्र' field is mandatory in 'AGPS सँगको विवरण'. Please ensure it is filled out.");
    if (!isFormValid) {
        event.preventDefault();
        return;
    }
    
    isFormValid = checkField("#apgsdistrict", "The 'जिल्ला' field is mandatory in 'AGPS सँगको विवरण'. Please ensure it is filled out.");
    if (!isFormValid) {
        event.preventDefault();
        return;
    }
    
    isFormValid = checkField("#d_center", "The 'केन्द्र' field is mandatory in 'AGPS सँगको विवरण'. Please ensure it is filled out.");
    if (!isFormValid) {
        event.preventDefault();
        return;
    }
    
    isFormValid = checkField("#d_QualificationYears", "The 'ज्ञान प्राप्त साल' field is mandatory in 'AGPS सँगको विवरण'. Please ensure it is filled out.");
    if (!isFormValid) {
        event.preventDefault();
        return;
    }
    
    isFormValid = checkField("#alternative_name", "The 'नाम ' field is mandatory in 'वैकल्पिक सम्पर्क'. Please ensure it is filled out.");
    if (!isFormValid) {
        event.preventDefault();
        return;
    }
    
    isFormValid = checkField("#alternative_contactNo", "The 'सम्पर्क नं.' field is mandatory in 'वैकल्पिक सम्पर्क'. Please ensure it is filled out.");
    if (!isFormValid) {
        event.preventDefault();
        return;
    }
    
    isFormValid = checkField("#alternative_relationship", "The 'सम्बन्ध' field is mandatory in 'वैकल्पिक सम्पर्क'. Please ensure it is filled out.");
    if (!isFormValid) {
        event.preventDefault();
        return;
    }
    
    isFormValid = checkField("#firstLanguage", "The 'प्रथम भाषा' field is mandatory in 'भाषा विवरण'. Please ensure it is filled out.");
    if (!isFormValid) {
        event.preventDefault();
        return;
    }
    
    isFormValid = checkField("#blood_Group", "The 'रक्त समुह' field is mandatory in 'स्वास्थ्य विवरण'. Please ensure it is filled out.");
    if (!isFormValid) {
        event.preventDefault();
        return;
    }
    
    if ($('#flexCheckDefault').is(':checked')) {
    isFormValid = checkField("#timeTaken", "The 'नियमित सेवाका लागि दिन सक्ने समय' field is mandatory. Please ensure it is filled out.");
        if (!isFormValid) {
            event.preventDefault();
            return;
    
}

 isFormValid = checkField("#invent_Sewa", "The 'इभेन्ट सेवाका लागि दिन सक्ने समय' field is mandatory in 'सेवा समय अवधी विवरण'. Please ensure it is filled out.");
        if (!isFormValid) {
            event.preventDefault();
            return;
    
}

}
    
}


$("#formSubmit").submit(validateForm);
    //  end form validation for member and volunteer part 
    //  end form validation for member and volunteer part 
      

  
    

});
//  end date control code line in jquery from here 
  </script>
<?php
include('footer.php');
?>