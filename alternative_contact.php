
<div class="container mt-4 mb-4" style="background-color: #f2f2f2;" id="ContainerStyle">
  <div class="row" id="rowStyle">
  <div class="col-md-12 col-sm-12 mt-2">
    <!-- start first AGPS सँगको विवरण form section from here  -->
    <div class="row" style="width: auto;">
        
    <div class="col-md-6 col-sm-12 mt-2">
        <div class="row">
          <div class="col-md-2" style="padding: 0px 5px;">
          <label for="district" class="form-label" style="display:flex; text-align:center; align-items:center;">नाम :<span class="member_formValidation" style="color:red; display:flex; font-size:20px;">*</span></label>
          </div>
          <div class="col-md-10" style="padding: 0px;">
          <input type="text" name="alternative_name" class="form-control alternative_name InputStyle" id="alternative_name">
          </div>
        </div>
    
      </div>

      <div class="col-md-3 col-sm-12 mt-2">
        <div class="row">
          <div class="col-md-4">
          <label for="inputState" class="form-label" style="display:flex; text-align:center; align-items:center;">सम्पर्क नं.:<span class="member_formValidation" style="color:red; display:flex; font-size:20px;">*</span></label>
          </div>
          <div class="col-md-8">
          <input type="text" name="alternative_contactNo" class="form-control alternative_contactNo InputStyle"  id="alternative_contactNo">    
          </div>
        </div>
      </div>
      <div class="col-md-3 col-sm-12 mt-2">
        <div class="row">
          <div class="col-md-3">
          <label for="d_center" class="form-label" style="display:flex; text-align:center; align-items:center;">सम्बन्ध:<span class="member_formValidation" style="color:red; display:flex; font-size:20px;">*</span></label>
          </div>
          <div class="col-md-9">
          <input type="text" name="alternative_relationship" class="form-control InputStyle"  id="alternative_relationship">       
          </div>
        </div>
      
      </div>
    <!-- end second AGPS सँगको विवरण form section from here  -->
    </div>
    
    <!-- end first AGPS सँगको विवरण form section from here  -->
  </div>
  </div>
</div>

<!-- vayo -->
<!-- no i have one also now  -->
<script>
  $(document).ready(function(){
  
  $("#alternative_contactNo").on("keypress", function (e) {
    console.log(e.which);
    if($('.alternative_contactNo').val().length >10){
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
