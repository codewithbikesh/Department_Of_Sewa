<?php include "header.php"; ?>
<div class="topbar  pt-3 mb-2" style="background: #424a4a;"><a class="btn"><i class="bi bi-list p-3 text-white" id="colpsCustom"></i></a><span class="text-white p-3 fw-bold mt-3">Users Logged In</span>
</div>
<div class="p-4" id="collapseExample" style="width:100%; height:auto;">
    <table id="example" class="display" style="width:100%">
       <thead>
      <tr>
         <th>Sno</th>
         <th>Username</th>
         <th>Email</th>
         <th>Mobile</th>
         <th>Active User</th>
         <th>Verified User</th>
         <th>Action</th> 
      </tr>
   </thead>
   <tbody class="showByFilter" id="tbody_1">
      <?php 
      $selectQuery="SELECT * FROM `login_det`;";
    //   include('library/db_conn.php');
      $conn = connectMyDB();
      $i=1;
      $queryPass=mysqli_query($conn,$selectQuery);
      while( $result = mysqli_fetch_assoc($queryPass)){
         ?>
      <tr>
          <td><?php echo $i;?></td>
         <td><?php echo $result['username']; ?></td>
         <td id="username_<?php echo $i; ?>"><?php echo $result['user_email']; ?></td>
         <td><?php echo $result['user_mobile_no']; ?> </td>
         <td class="text-center"><div class="form-check form-switch">
          <input class="form-check-input" type="checkbox" value="<?php echo ($result['active_status'] == 1) ? 'checked' : ''; ?>" <?php echo ($result['active_status'] == 1) ? 'checked' : ''; ?> role="switch" onchange="UserIsActiveCheck(this)" id="flexSwitchCheckDefault_<?php echo $i;?>">
         </div></td>
         <td class="text-center"><div class="form-check form-switch">
          <input class="form-check-input" type="checkbox" value="<?php echo ($result['verified'] == 1) ? 'checked' : ''; ?>" <?php echo ($result['verified'] == 1) ? 'checked' : ''; ?> role="switch" onchange="verifiedIsActiveCheck(this)" id="verifiedFlexSwitchCheckDefault_<?php echo $i;?>">
         </div></td>
<!--         <td class="text-center">-->
 
<!--        if ($result['verified'] == 1) {-->
<!--            echo '<i class="fas fa-user-alt" style="color: #00ff62;"></i>';-->
<!--        } else {-->
<!--            echo '<i class="fas fa-user-alt-slash"></i>';-->
<!--        }-->

<!--</td>-->
         <td>
            <a style="color:black;" href="user_data.php?id=<?php echo $result['id'] ?>"><i class="fa fa-eye" aria-hidden="true"></i></a>
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
   
   
//  active user code in jquery 
//  active user code in jquery 
   function UserIsActiveCheck(input){
      var id = $(input).attr('id').split("_")[1];
      var usernameValue = $("#username_"+ id).text().trim();
        alert(usernameValue);

        let checked = $(input).is(":checked");
        let flexSwitchCheckDefault = $(input).val();

        $.ajax({
            url: 'active_user.php',
            type: 'GET',
            data: { flexSwitchCheckDefault: flexSwitchCheckDefault, usernameValue: usernameValue },
            // dataType: 'json',
            success: function(data) {
                if (data.result === true) {
                    alert('User activated successfully');
                }
            },
            error: function(xhr, status, error) {
                alert('An error occurred: ' + error);
            }
        });
   }
  
//   if verified user then checked automatically
//   if verified user then checked automatically
  function verifiedIsActiveCheck(input){
      var id = $(input).attr('id').split("_")[1];
      var usernameValue = $("#username_"+ id).text().trim();
        alert(usernameValue);

        let checked = $(input).is(":checked");
        let verifiedFlexSwitchCheckDefault = $(input).val();

        $.ajax({
            url: 'verified_user.php',
            type: 'GET',
            data: { verifiedFlexSwitchCheckDefault: verifiedFlexSwitchCheckDefault, usernameValue: usernameValue },
            // dataType: 'json',
            success: function(data) {
                if (data.result === true) {
                    alert('User activated successfully');
                }
            },
            error: function(xhr, status, error) {
                alert('An error occurred: ' + error);
            }
        });
   }
</script>
<?php include "footer.php" ?>