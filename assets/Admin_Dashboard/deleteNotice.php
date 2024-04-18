<?php
// connect to the database 
// connect to the database 
  include('library/db_conn.php');
//  connect to the database
//  connect to the database

$conn = connectMyDB();
$id =$_GET['id'];
$sqlquery = "update notification set active_status = 0 where id='$id'";
$result = mysqli_query($conn,$sqlquery);
echo "<script>alert('$result');</script>";
if(isset($result) != null){
echo"<script>alert('deleted successfully'); 
window.location.href='https://omsnepal.com/assets/Admin_Dashboard/addNotice.php';
</script>
";
}else{
echo"<script>alert('not delete successfully'); window.location.href='https://omsnepal.com/assets/Admin_Dashboard/addNotice.php';</script>"; 
}
?>
<!--Update Event Set Modal -->
<!--Update Event Set Modal -->


<!--Update Event Set Modal -->
<!--Update Event Set Modal -->