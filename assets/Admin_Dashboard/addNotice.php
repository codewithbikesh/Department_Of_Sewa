<?php include "header.php"; ?>
<div class="topbar  pt-3 mb-2" style="background: #424a4a;"><a class="btn"><i class="bi bi-list p-3 text-white" id="colpsCustom"></i></a><span class="text-white p-3 fw-bold mt-3">Notice</span>
</div>
<!--<div  style="overflow:auto;" class="font_size_in_mobile">-->
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
    <span>Notice</span>
    <span>
        <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" id="subm" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
  Add Notice
</button>

<!-- Submit Event Set Modal -->
<!-- Submit Event Set Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog" style="max-width: 781px;">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Notice</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="succ" >
      </div>
      <div class="modal-body">
          <!--form section start from here -->
          <!--form section start from here -->
      <form action="" method="POST" class="row g-3">
          <div class="row">
  <div class="col-md-12">
      <input id="txtid" hidden>
    <label for="inputEmail4" class="form-label">Title:</label>
    <input type="text" name="noticeTitle" id="noticeTitle" class="form-control">
    <span class="error">This field is required</span>
  </div>
  </div>
  <div class="row">
  <div class="col-12">
  <label for="exampleFormControlTextarea1" class="form-label">Description:</label>
  <textarea class="form-control" name="noticeDescription" id="noticeDescription" rows="3"></textarea>
       <span class="error">This field is required</span>
  </div>
  </div>
  <div class="row">
  <div class="col-md-12">
  <div>
  <label for="formFileLg" class="form-label">Select File to Upload:</label>
  <input class="form-control form-control-lg" name="fileUpload" id="fileUpload" type="file" onchange="uploadFile()">
</div>
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
      <tr style="text-align:center;">
         <th>Sno</th>
         <th>Title</th>
         <th>Description</th>
         <th>PDF File</th>
         <th>Action</th> 
      </tr>
   </thead>
   <tbody class="showByFilter" id="tbody_1">
      <?php 
     
      $selectQuery="SELECT * FROM `notification` where active_status = 1";
    //   include('library/db_conn.php');
      $conn = connectMyDB();
      $i=1;
      $queryPass=mysqli_query($conn,$selectQuery);
      while( $result = mysqli_fetch_assoc($queryPass)){
         ?>
      <tr>
          <td><?php echo $i;?></td>
         <td><?php echo $result['notification_rTitle']; ?></td>
         <td><?php echo $result['notification_rDescription']; ?></td>
         <!--<td><embed src="pdf_files/files/<?php echo $result['pdf_rName']; ?>" type="application/pdf" width="200" height="200" /></td>-->
         <td><div style="text-align:center; display:flex; justify-content:space-evenly; "><a href="pdf_files/files/<?php echo $result['pdf_rName']; ?>"><?php echo $result['pdf_rName']; ?></a>&nbsp;&nbsp;<a href="pdf_files/files/<?php echo $result['pdf_rName']; ?>" style="text-align:center; text-decoration:none; color:white; background-color:red; padding:8px; font-size:14px; font-weight:bold;" download>Download PDF</a></div></td>
         <td>
             <a style="color:black;" href="deleteNotice.php?id=<?php echo $result['id'] ?>"><i class="fa-solid fa-trash"></i></a>
             <button style="out-line:none; border:none; background:none;"  data-id="<?php echo $result['id'] ?>" data-etypeEvn="<?php echo $result['notification_rTitle']; ?>" data-edateEvn="<?php echo $result['notification_rDescription']; ?>" id="btnUpdate" onClick="btnUpdate" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="fa-solid fa-edit"></i></button>
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
  async function uploadFile() {
       let fileUpload = document.getElementById('fileUpload'); // Assuming fileUpload is the input element for file selection

    let file = fileUpload.files[0];

    // Validate file type
    if (file.type !== 'application/pdf') {
        alert('Sorry, only PDF files are allowed.');
        return;
    }

    // Validate file size (max 5MB)
    if (file.size > 5000000) {
        alert('Sorry, your file is too large.');
        return;
    }

    let formData = new FormData(); 
    formData.append("file", fileUpload.files[0]);
    await fetch('pdf_files/pdf_file.php', {
      method: "POST", 
      body: formData
    }); 
    alert('The file has been uploaded successfully.');
    // var name = $('#image_upload_file').val().replace(/C:\\fakepath\\/i, '../image_upload/profilPicture/');
    // $("#blah").attr("src",name);
    }
    
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
  

   //  start update the data code line from here 
   //  start update the data code line from here 
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
      //  var district = $(this).attr("data-eDis");
      // alert(district);
       $("#txtid").val(id);
       $("#noticeTitle").val(typeEvent);
       $("#noticeDescription").val(dateEvent);
      //  $("#fileUpload").val(region);
   });
  //  end update the code line from here here 
  //  end update the code line from here here 





  // start submit the code line from here  
  // start submit the code line from here  
 $(document).on('click','.submitBtn',function(e){

        // Reset error messages
        $('.error').hide();

        // Validate Type of Event field
        var typeOfEvent = $('#noticeTitle').val();
        if (typeOfEvent === '') {
          $('#noticeTitle').next('.error').show();
        }

        // Validate Day of Event field
        var dayOfEvent = $('#noticeDescription').val();
        if (dayOfEvent === '') {
          $('#noticeDescription').next('.error').show();
        }

        // Validate Event Region field
        var pdfFile = $('#fileUpload').val();
        var fileUpload = pdfFile.replace(/^.*[\\\/]/, '');
        if (fileUpload === '') {
          $('#fileUpload').next('.error').show();
        }
        
        var idE =$("#txtid").val();
                   if (typeOfEvent == '' || dayOfEvent == '' || fileUpload =='') {
                      alert('Please fill all the fields carefully.'); 
                             e.preventDefault(); // Prevent form submission
                  }else{
                      $.ajax({
                          url: "submitNotice.php",
                          type:"POST",
                          data: {Id: idE, TypeOfEvent: typeOfEvent, DayOfEvent: dayOfEvent, fileUpload: fileUpload},
                          success: function(data){
                            //   let da=JSON.parse(data);
                            $('.succ').append('<div class="alert alert-success" role="alert">Your data has been submitted successfully!</div>')
                            $('.alert').fadeOut(2000, function() {
                            //   window.location.href = "/";
                            window.location.reload();
                             $(this).remove();
                                 });
                             
                            $("#noticeTitle").val('');
                            $("#noticeDescription").val('');
                            $("#fileUpload").val('');
                        
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
      // end submit code line from here 
      // end submit code line from here 
     
  </script>
<!--</div>-->
<?php include "footer.php" ?>