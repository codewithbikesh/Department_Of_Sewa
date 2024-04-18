<?php include "header.php"; ?>
<!--<script>-->
<!--    $("#colpsCustom").click(function(){-->
<!--        alert("clicked");-->
<!--       $("#accordionSidebar").hide();-->
<!--    });-->
<!--</script>-->
<div class="topbar  pt-3 mb-2" style="background: #424a4a;"><a class="btn"><i class="bi bi-list p-3 text-white" id="colpsCustom"></i></a><span class="text-white p-3 fw-bold mt-3">Event Details</span>
</div>
<!--<div  style="overflow:auto;" class="font_size_in_mobile">-->
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
<style>
        .form-label{
         display:flex;
         justify-content:left;
         align-items:center;
         font-size:16px;

    }
    .error{
	display: none;
    color:red;
    font-size:12px;
}		

  .error_show{
  color: Crimson;
  font-family: "Helvetica";
  
}

</style>
<div class="container-fluid" style="border:1px solid #e3e3e3">
<form enctype="multipart/form-data" id="image-form" method="POST">
    <div class="d-flex justify-content-between fw-bold fs-4 m-3">
    <span>Event</span>
    <span>
        <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" id="subm" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
  Set Event
</button>

<!-- Submit Event Set Modal -->
<!-- Submit Event Set Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog" style="max-width: 781px;">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">EVENT</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="succ" >
      </div>
      <div class="modal-body">
          <!--form section start from here -->
          <!--form section start from here -->
      <form action="" method="POST" class="row g-3">
          <div class="row">
  <div class="col-md-6">
      <input id="txtid" hidden>
    <label for="inputEmail4" class="form-label">Type Of Event:</label>
    <input type="text" name="TypeOfEvent" id="TypeOfEvent" class="form-control">
    <span class="error">This field is required</span>
  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Day Of Event:</label>
     <select class="form-select col-sm-8 text-center" aria-label="Default select example" name="DayOfEvent" id="DayOfEvent">
  <option selected>Select The Day...</option>
  <option value="Sunday">Sunday</option>
  <option value="Monday">Monday</option>
  <option value="Tuesday">Tuesday</option>
  <option value="Wednesday">Wednesday</option>
  <option value="Thursday">Thursday</option>
  <option value="Friday">Friday</option>
  <option value="Saturday">Saturday</option>
</select>
<span class="error">This field is required</span>
  </div>
  </div>
  <div class="row">
  <div class="col-4">
    <label for="inputAddress" class="form-label">Region:</label>
       <!--<input type="text" name="EventRegion" id="EventRegion" class="form-control">-->
        <select name="EventRegion" id="EventRegion" class="form-select" aria-label="Default select example">
            <option value="">Select..</option>
            <?php
            foreach ($Region as $a) {
              ?>
            <option value="<?php echo $a ?>"><?php echo $a ?></option>
            <?php }
            ?>
          </select>
       <span class="error">This field is required</span>
  </div>
  <div class="col-4">
    <label for="inputAddress2" class="form-label">District:</label>
     <!--<input type="text" class="form-control" name="EventDistrict" id="EventDistrict">-->
     <select name="EventDistrict" id="EventDistrict" class="form-select" aria-label="Default select example">
            <option value>Select&nbsp;&nbsp;</option>
          </select>
     <span class="error">This field is required</span>
  </div>
  <div class="col-md-4">
    <label for="inputCity" class="form-label">Location:</label>
    <input type="text" class="form-control" name="EventLocation" id="EventLocation">
    <span class="error">This field is required</span>
  </div>
  </div>
  <div class="row">
  <div class="col-md-6">
    <label for="inputState" class="form-label">Start Event Date:</label>
    <input type="date" class="form-control" name="StartEventDate" id="StartEventDate">
    <span class="error">This field is required</span>
  </div>
  <div class="col-md-6">
    <label for="inputZip" class="form-label">End Event Date:</label>
    <input type="date" class="form-control" name="EndEventDate" id="EndEventDate">
    <span class="error">This field is required</span>
  </div>
  </div>
</form>
 <!--form section end over here -->
 <!--form section end over here -->
      </div>
      <div class="modal-footer">
        <!--<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>-->
        <button type="submit" class="btn btn-primary submitBtn" id="submitBtn">Submit</button>
        <button type="submit" class="btn btn-primary submitBtn" id="submitBtnU">Update</button>
      </div>
    </div>
  </div>
</div>
<!-- Submit Event Set Modal -->
<!-- Submit Event Set Modal -->
    </span>
    </div>
</form>
</div>


<div class="p-4" id="collapseExample" style="width:100%; height:auto;">
    <table id="example" class="display" style="width:100%">
       <thead>
      <tr>
         <th>Sno</th>
         <th>Type Of Event</th>
         <th>Day Of Event</th>
         <th>Region</th>
         <th>District</th>
         <th>Location</th>
         <th>Start Event Date</th>
         <th>End Event Date</th> 
         <th>Action</th> 
      </tr>
   </thead>
   <tbody class="showByFilter" id="tbody_1">
      <?php 
     
      $selectQuery="SELECT * FROM `event` where active_status = 1";
    //   include('library/db_conn.php');
      $conn = connectMyDB();
      $i=1;
      $queryPass=mysqli_query($conn,$selectQuery);
      while( $result = mysqli_fetch_assoc($queryPass)){
         ?>
      <tr>
          <td><?php echo $i;?></td>
         <td><?php echo $result['eTypeOfEvent']; ?></td>
         <td><?php echo $result['eDateOfEvent']; ?></td>
         <td><?php echo $result['eRegion']; ?> </td>
         <td><?php echo $result['eDistrict']; ?></td>
         <td><?php echo $result['eLocation']; ?></td>
         <td><?php echo $result['eStartDateEvent']; ?></td>
         <td><?php echo $result['eEndDateEvent']; ?></td>
         <td>
             <a style="color:black;" href="eventDelete.php?id=<?php echo $result['id'] ?>"><i class="fa-solid fa-trash"></i></a>
             <button style="out-line:none; border:none; background:none;"  data-id="<?php echo $result['id'] ?>" data-etypeEvn="<?php echo $result['eTypeOfEvent']; ?>" data-edateEvn="<?php echo $result['eDateOfEvent']; ?>" data-eDis="<?php echo $result['eDistrict']; ?>" data-eLoc="<?php echo $result['eLocation']; ?>" data-eStartDate ="<?php echo $result['eStartDateEvent']; ?>"  data-eEndDate="<?php echo $result['eEndDateEvent']; ?>" data-eRegion="<?php echo $result['eRegion']; ?>" id="btnUpdate" onClick="btnUpdate" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="fa-solid fa-edit"></i></button>
         </td>


      </tr>
      <?php
        $i++;
        }
      ?>
   </tbody>
    </table>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
 <script>
  $('#example').DataTable({
       //     sorting: false,
    // ordering: false,
    // scrollY: 450,   
    // scrollX: false,  
    paging: false,
    // order:[[5,'desc']],
    // searching: false,
    dom: "Bfrtip",
   });
   
//   select region after that user have to able to select the district 
//   select region after that user have to able to select the district 
        $("#EventRegion").change(function(){
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
                        $("#EventDistrict").empty();
                        $("#EventDistrict").append('<option value="">Choose..</option>');
                        jQuery.each(da.districtAgps, function (i, District) {
                            var dis = District.District;
                            dis = dis.toUpperCase();
                            $("#EventDistrict").append('<option value="' + dis + '" >' + dis + '</option>');
                        });
                    }
                    else {
                        $("#EventDistrict").empty();
                        $("#EventDistrict").append('<option value="">Choose..</option>');
                    }
                }
            });
        });
        
        
//   select region after that user have to able to select the district 
//   select region after that user have to able to select the district 

   
   $(document).on('click','#subm',function(e){
                  $("#submitBtnU").hide();
                  $("#submitBtn").show();
   });
   
   
   $(document).on('click','#btnUpdate',function(e){
       $("#submitBtnU").show();
       $("#submitBtn").hide();
       var id = $(this).attr("data-id");
       var typeEvent = $(this).attr("data-etypeEvn");
       var dateEvent = $(this).attr("data-edateEvn");
       var district = $(this).attr("data-eDis");
       var region = $(this).attr("data-eRegion");
       var location = $(this).attr("data-eLoc");
       var startEvent = $(this).attr("data-eStartDate");
       var endEvent = $(this).attr("data-eEndDate");
      alert(district);
       $("#txtid").val(id);
       $("#TypeOfEvent").val(typeEvent);
       $("#DayOfEvent").val(dateEvent);
       $("#EventRegion").val(region);
       $("#EventLocation").val(location);
       $("#EventDistrict").val(district);
       $("#StartEventDate").val(startEvent);
       $("#EndEventDate").val(endEvent);
   });
   
   
 $(document).on('click','.submitBtn',function(e){

        // Reset error messages
        $('.error').hide();

        // Validate Type of Event field
        var typeOfEvent = $('#TypeOfEvent').val();
        if (typeOfEvent === '') {
          $('#TypeOfEvent').next('.error').show();
        }

        // Validate Day of Event field
        var dayOfEvent = $('#DayOfEvent').val();
        if (dayOfEvent === 'Select The Day...') {
          $('#DayOfEvent').next('.error').show();
        }

        // Validate Event Region field
        var eventRegion = $('#EventRegion').val();
        if (eventRegion === '') {
          $('#EventRegion').next('.error').show();
        }

        // Validate Event District field
        var eventDistrict = $('#EventDistrict').val();
        if (eventDistrict === '') {
          $('#EventDistrict').next('.error').show();
        }

        // Validate Event Location field
        var eventLocation = $('#EventLocation').val();
        if (eventLocation === '') {
          $('#EventLocation').next('.error').show();
        }

        // Validate Start Event Date field
        var startEventDate = $('#StartEventDate').val();
        if (startEventDate === '') {
          $('#StartEventDate').next('.error').show();
        }
        var idE =$("#txtid").val();
        // Validate End Event Date field
        var endEventDate = $('#EndEventDate').val();
        if (endEventDate === '') {
          $('#EndEventDate').next('.error').show();
        }
                   if (typeOfEvent == '' || dayOfEvent == 'Select The Day...' || eventRegion == '' || eventDistrict == '' || eventLocation == '' || startEventDate == '' || endEventDate == '') {
                      alert('Please fill all the fields carefully.'); 
                             e.preventDefault(); // Prevent form submission
                  }else{
                      $.ajax({
                          url: "eventSubmit.php",
                          type:"POST",
                          data: {Id: idE, TypeOfEvent: typeOfEvent, DayOfEvent: dayOfEvent, EventRegion: eventRegion, EventLocation: eventLocation, EventDistrict: eventDistrict, StartEventDate: startEventDate, EndEventDate: endEventDate },
                          success: function(data){
                            //   let da=JSON.parse(data);
                            $('.succ').append('<div class="alert alert-success" role="alert">Your data has been submitted successfully!</div>')
                            $('.alert').fadeOut(2000, function() {
                            //   window.location.href = "/";
                            window.location.reload();
                             $(this).remove();
                                 });
                             
                            $("#TypeOfEvent").val('');
                            $("#DayOfEvent").val('');
                            $("#EventRegion").val('');
                            $("#EventDistrict").val('');
                            $("#EventLocation").val('');
                            $("#StartEventDate").val('');
                            $("#EndEventDate").val('');
                            //   if(data.status_code==200){
                            //  alert("Data inserted successfully !!!");
                                  
                            //   }else if(data.status_code==404){
                            //       alert("Something went wrong");
                            //   }
                            
                          },
                          error: function(error){
                              alert("Something went wrong !!!");
                          }
                      });
                      e.preventDefault();
                  }
                 
             });

               // Edit Event set with jquery 
              // Edit Event set with jquery 
     
  </script>
<!--</div>-->
<?php include "footer.php" ?>