<?php 
//session part
//session part
session_start();
if (isset($_SESSION['username'])) {
    //   echo $_SESSION['username'];
}
 else if ($_SESSION['username'] == '') {
     echo "no sesssion";
    echo"<script>window.location.href='index.php';</script>";
 }
 //session part
 //session part
 include('db_connection.php');
          $id = $_GET['id'];
    if(isset($_POST['TypeOfEvent'])){
         $eTypeOfEvent = $_POST['TypeOfEvent'];
         $eDayOfEvent = $_POST['DayOfEvent'];
         $eRegion = $_POST['EventRegion'];
         $eDistrict = $_POST['EventDistrict'];
         $eLocation = $_POST['EventLocation'];
         $eStartEventDate = $_POST['StartEventDate'];
         $eEndEventDate = $_POST['EndEventDate'];
         $conn = connectMyDB();
        $sqlquery = "UPDATE `event` SET `eTypeOfEvent`='$eTypeOfEvent',`eDateOfEvent`='$eDayOfEvent',`eRegion`='$eRegion',`eDistrict`='$eDistrict',`eLocation`='$eLocation',`eStartDateEvent`='$eStartEventDate',`eEndDateEvent`='$eEndEventDate' WHERE id='$id'";
         if($conn->query($sqlquery)==TRUE){
    //     $regmsg = '<div class="alert alert-success" role="alert">
    //     Data Inserted Successfully !
    //   </div>';
        return true;
      }else{
    //     $regmsg = '<div class="alert alert-danger" role="alert">
    //   Data has not been Inserted Successfully !
    //   </div>';
    return false;
      }
        
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Event</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../style.css">
  <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
 <script src="	https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
 <script src="https://kit.fontawesome.com/9a86d78b3d.js" crossorigin="anonymous"></script>
</head>
<style>
    .label_form{
         display:flex;
         justify-content:left;
         align-items:center;
         font-size:16px;
         font-weight:bold;
         /*padding-left:5px;*/
         
    }
.error{
	display: none;
	/*margin-left: 10px;*/
   color:red;
}		

.error_show{
	color: Crimson;
	/*margin-left: 10px;*/
  font-family: "Helvetica";
  
}

</style>
<body style="overflow-x:hidden" >
    <nav class="navbar navbar-expand-lg" style="background-color: #e1e1e1;">
  <div class="container-fluid">
    <a class="navbar-brand text-dark fw-bold fs-2" href="../index_dashboard.php">DOS</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
      </div>
    </div>
          <div style="display:flex; justify-content: center;">
              <a href="logout.php" style="color:black; text-decoration:none;">Logout &nbsp; <i class="fa-solid fa-right-from-bracket mt-2"></i></a>
      </div>
  </div>
</nav> 
<div class="succ" >
</div>
<div class="container-fluid p-4">
<div class="section" style="padding:20px; display:flex; justify-content:center;">
    <div class="formStyle" style="background-color:#f2f2f2; padding:20px; border-radius:10px; width:90%;">
    <h2 class="text-center">EVENT</h2>
<form class="form-horizontal" name="eventForm" action="" id="EventForm" method="POST">
 <?php 
   $id = $_GET['id'];
   $conn = connectMyDB();
   $sql = "select * from event where id='$id'";
   $result = mysqli_query($conn, $sql);
   while($row=mysqli_fetch_assoc($result)){
   ?>
        
  <div class="row p-2">
      <div class="col-md-6 eventClass">
          <!--Type of even -->
          
        <div class="row">  
        <div class="col-sm-3 label_form">
      <label class="control-label p-0">Type Of Event:</label>
      </div>
      <div class="col-sm-9">
        <input type="text" name="TypeOfEvent" id="TypeOfEvent" value="<?php echo $row['eTypeOfEvent']; ?>" class="form-control">
        	<span class="error">This field is required</span>
      </div>
      </div>
      </div>
      <!--Day of event -->
      <div class="col-md-6 eventClass">
           <div class="row">  
           <div class="col-sm-3 label_form">
      <label class="control-label p-0">Day Of Event:</label>
      </div>
      <div class="col-sm-9">
    <select class="form-select col-sm-8 text-center" aria-label="Default select example"  name="DayOfEvent" id="DayOfEvent">
  <option value="<?php echo $row['eDateOfEvent']; ?>"><?php echo $row['eDateOfEvent']; ?></option>
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
      </div>
    </div>

  <div class="row p-2">
          <!--Region -->
      <div class="col-md-4 eventClass">
        <div class="row">  
        <div class="col-sm-2 label_form">
      <label class="control-label  p-0">Region:</label>
      </div>
      <div class="col-sm-10">
        <input type="text" name="EventRegion" id="EventRegion" value="<?php echo $row['eRegion']; ?>" class="form-control">
        <span class="error">This field is required</span>
      </div>
      </div>
      </div>
      
      <!--District-->
      <div class="col-md-4 eventClass">
           <div class="row">  
           <div class="col-sm-2 label_form">
      <label class="control-label  p-0">District:</label>
      </div>
      <div class="col-sm-9">
      <input type="text" class="form-control" name="EventDistrict" value="<?php echo $row['eDistrict']; ?>" id="EventDistrict">
      <span class="error">This field is required</span>
      </div>
      </div>
      </div>
      
          <!--Location-->
      <div class="col-md-4 eventClass">
      <div class="row">  
      <div class="col-sm-4 label_form">
      <label class="control-label p-0">Location:</label>
      </div>
      <div class="col-sm-8">
      <input type="text" class="form-control" name="EventLocation" value="<?php echo $row['eLocation']; ?>" id="EventLocation">
      <span class="error">This field is required</span>
      </div>
      </div>
      </div>
      </div>
      
   <div class="row p-2">
      <!--Start Date-->
      <div class="col-md-6 eventClass">
           <div class="row">  
      <div class="col-sm-4 label_form">
      <label class="control-label p-0">Start Event Date:</label>
      </div>
      <div class="col-sm-8">
      <input type="date" class="form-control" name="StartEventDate" value="<?php echo $row['eStartDateEvent']; ?>" id="StartEventDate">
      <span class="error">This field is required</span>
      </div>
      </div>
      </div>
          <div class="col-md-6 eventClass">
          <!--End Date-->
        <div class="row">  
        <div class="col-sm-4 label_form">
      <label class="control-label p-0">End Event Date:</label>
      </div>
      <div class="col-sm-8">
        <input type="date" class="form-control" name="EndEventDate" value="<?php echo $row['eEndDateEvent']; ?>" id="EndEventDate">
        <span class="error">This field is required</span>
      </div>
      </div>
      </div>
      <?php
        }
    ?>
    </div>
  <div class="text-center pt-2" id="contact_submit">
    <button class="btn btn-primary waves-effect waves-light" id="updateBtn" type="submit" name="Submit">Update</button>
  </div>
</form>
</div>
</div>
</div>
<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function(){
<!-- Add jQuery library -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Add jQuery validation plugin -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>

 <script>
 $(document).on('click','#updateBtn',function(e){

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
                          url: "../eventsubmit.php",
                          type:"POST",
                          data: { TypeOfEvent: typeOfEvent, DayOfEvent: dayOfEvent, EventRegion: eventRegion, EventLocation: eventLocation, EventDistrict: eventDistrict, StartEventDate: startEventDate, EndEventDate: endEventDate },
                          success: function(data){
                            //   let da=JSON.parse(data);
                            $('.succ').append('<div class="alert alert-success" role="alert">Your data has been updated successfully!</div>')
                            $('.alert').fadeOut(3000, function() {
                                window.location.href = "eventreport/";
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
                  
                  
                //   set duration  on alert option 
                
             });

  </script>
</body>
</html>