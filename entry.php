<?php
// Connection to the database 
include('include/entry_header.php');
include('db_connection.php');
include('submit.php');
?>
    <!-- class="was-validated" -->
  <div class="container-fluid">
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" id="formSubmit" enctype="multipart/form-data">
      <div class="panel-group" id="accordion">
        <div class="panel panel-default">
          <div class="panel-heading" data-toggle="collapse" data-parent="#accordion" href="#collapse1">
            <h4 class="panel-title">
              <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">परिचय विवरण</a>
            </h4>
          </div>
          <div id="collapse1" class="panel-collapse collapse in">
            <div class="panel-body">
            <?php
            if(isset($regmsg)){
            echo $regmsg;
             header("Location: https://dos.omsnepal.com/entry.php");
              }
            ?>
              <!-- start line Included Introduction details section from here  -->
              <?php
              include('introductiondetails.php');
              ?>
              <!-- end line Included Introduction details section from here  -->

            </div>
          </div>
        </div>
        <div class="panel panel-default">
          <div class="panel-heading" data-toggle="collapse" data-parent="#accordion" href="#collapse3">
            <h4 class="panel-title">
              <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">स्थायी ठेगाना</a>
            </h4>
          </div>
          <div id="collapse3" class="panel-collapse collapse">
            <div class="panel-body">
              <!-- start parmanent address line from here  -->
              <?php
              include('permanentaddress.php');
              ?>
              <!-- start parmanent address line from here  -->
            </div>
          </div>
        </div>
        <div class="panel panel-default">
          <div class="panel-heading" data-toggle="collapse" data-parent="#accordion" href="#collapse2">
            <h4 class="panel-title">
              <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">हालको ठेगाना</a>
            </h4>
          </div>
          <div id="collapse2" class="panel-collapse collapse">
            <div class="panel-body">

              <!-- start current address line from here  -->
              <?php
              include('currentaddress.php');
              ?>
              <!-- start current address line from here  -->

            </div>
          </div>
        </div>

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
              include('descriptionwithAGPS.php');
              ?>
              <!-- End  description with AGPS  code line from here   -->
            </div>
          </div>
        </div>
        
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
              include('alternative_contact.php');
              ?>
              <!-- End  description with AGPS  code line from here   -->
            </div>
          </div>
        </div>
        
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
              include('LanguageDescription.php');
              ?>
              <!-- Start Language Description code line from here  -->
            </div>
          </div>
        </div>
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
              include('HealthDetails.php');
              ?>
              <!-- End Health Details code line from here  -->
            </div>
          </div>
        </div>

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
              include('ServiceAttachedDetails.php');
              ?>
              <!-- End Service Attached Details Code Line From Here  -->

            </div>
          </div>
        </div>
        </div> <!--Add this div here for space-->
        </div> <!--Add this div here for space-->
         </div> 
         </div>  
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
              include('ServiceTimeDetails.php');
              ?>
              <!-- End Service Time Details Code Line From Here  -->
            </div>
          </div>
        </div>
      </div>
  </div>
  <!-- </div> -->
  <!-- </div> -->
  <!-- start button section from here -->
  <div class=" col-md-12 form-group" style="padding: 10px 10px 10px 10px;">
    <label for="" class="col-md-6 control-label"></label>
    <div class="col-md-2">
      <!--<button class="button icon save" id="btnReport"><span><a href="index_dashboard.php" id="ReportStyle"><i class="fa-solid fa-arrow-left"></i>&nbsp;Dashboard</a></span> </button>-->
      <!-- <button class="button icon back" id="btnCancel" type="button"><span><i class="fa-solid fa-xmark"></i>&nbsp;Cancel</span></button> -->
    </div>

    <div class="col-md-3 text-end">
    <button class="btn icon save" id="btnSave" type="submit" name="Save" value="Submit"><span><i
            class="fa-solid fa-floppy-disk SaveIcon"></i>&nbsp;Save</span></button>
            <button class="btn icon save" id="member" type="submit" name="member" value="Submit"><span><i
            class="fa-solid fa-floppy-disk SaveIcon"></i>&nbsp;Save</span></button>
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

  <!-- bootstrap js  -->
  <!-- bootstrap js  -->
  <script src="../js/bootstrap.min.js"></script>
  
  <script src="image_upload/js/jquery.min.js"></script>
  <script src="image_upload/js/jquery.form.js"></script> 
  
  <!-- font awesome js  -->
  <!-- font awesome js  -->
  <script src="js/font.min.js"></script>
  
  <!-- jquery js  -->
  <!-- jquery js  -->

  <!--<script src="js/datepicker.min.js" type="text/javascript"></script>-->
  <!--<script src="js/datepicker.js"></script>-->
  <!--datepicker jquery code over here -->
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script src="https://nepalidatepicker.sajanmaharjan.com.np/nepali.datepicker/js/nepali.datepicker.v4.0.1.min.js" type="text/javascript"></script>
  
  <script>
    async function uploadFile() {
    let formData = new FormData(); 
    formData.append("file", image_upload_file.files[0]);
    await fetch('image_upload/image_uploader.php', {
      method: "POST", 
      body: formData
    }); 
    alert('The file has been uploaded successfully.');
    var name = $('#image_upload_file').val().replace(/C:\\fakepath\\/i, 'image_upload/profilPicture/');
    $("#blah").attr("src",name);
    }
    
    $(document).ready(function () { 
    // Apply jquery code on Volunteer or Member Submit Button 
    // Apply jquery code on Volunteer or Member Submit Button 
        $("#member").show();
        $("#btnSave").hide();
      $("#flexCheckDefault").on("change",function(){
                if($(this).is(":checked")){
                    $("#btnSave").show();
                    $("#member").hide();
                }else{
                    $("#member").show();
                    $("#btnSave").hide();
                }

      });
        
       // hide volunteer form code line from here 
      // hide volunteer form code line from here 
    $("#service_time").hide();
         $("#service_attached").hide();
      $("#flexCheckDefault").on("change",function(){
                if($(this).is(":checked")){
                   $("#service_time").show();
                   $("#service_attached").show()
                }else{
                  $("#service_time").hide();
                 $("#service_attached").hide()
                }
      });
// start service attachment validation code line from here 
// start service attachment validation code line from here 
$("#flexCheckDefault").on("change", function() {
  if ($(this).is(":checked")) {
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
  } else {
    // If unchecked, reload the page
    location.reload();
  }
});
// start service attachment validation code line from here 
// start service attachment validation code line from here     
        
        
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

  // start form validation for volunteer in introduction  through jquery 
  // start form validation for volunteer in introduction through jquery 
      $(".formValidation").show();
      $("#flexCheckDefault").on("change",function(){
                if($(this).is(":checked")){
                    $(".formValidation").hide();
                }else{
                    $(".formValidation").show();
                }

      })
      
      
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
    
    
    if ($('#flexCheckDefault').is(':checked')) {
    isFormValid = checkField("#timeTaken", "The 'नियमित सेवाका लागि दिन सक्ने समय' field is mandatory in 'सेवा समय अवधी विवरण'. Please ensure it is filled out.");
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
      

    // alert to disappear after 3 seconds jquery code 
    // alert to disappear after 3 seconds jquery code 
    setInterval(function(){ $(".alert").fadeOut(); }, 3000);
    

});
//  end date control code line in jquery from here 

  </script>
</body>

</html>


<!--footer file included here-->
<!--footer file included here-->
<?php
include('include/footer_file.php');
?>
