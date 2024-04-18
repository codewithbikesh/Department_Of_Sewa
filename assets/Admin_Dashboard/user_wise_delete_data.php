<?php
// connect to the database 
// connect to the database 
  include('library/db_conn.php');
//  connect to the database
//  connect to the database

$conn = connectMyDB();
$id =$_GET['id'];
$sqlquery = "update introductiondetails set active_status= 0 where id='$id'";
$result = mysqli_query($conn,$sqlquery);
// echo "<script>alert('$result');</script>";
if(isset($result) != null){
 echo "<script>
                if(confirm('Are you sure you want to delete this data?')) {
                    window.location.href='https://omsnepal.com/assets/Admin_Dashboard/userLogged.php';
                } else {
                    // User canceled deletion
                    window.location.href='https://omsnepal.com/assets/Admin_Dashboard/userLogged.php';
                }
    </script>";
}else{
echo"<script>alert('not delete successfully'); window.location.href='http://omsnepal.com/assets/Admin_Dashboard/member.php';</script>"; 
}
?>
<!--Update Event Set Modal -->
<!--Update Event Set Modal -->


<!--Update Event Set Modal -->
<!--Update Event Set Modal -->