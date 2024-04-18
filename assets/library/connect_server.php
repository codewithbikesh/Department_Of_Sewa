<?php
// function connectMyDB(){
  $servername = "localhost"; 
  $username = "omsnepal_dos";
  $password = "e54&7%}^7R,?";
  $dbname = "omsnepal_omsnepal";
  
//   Create database connection 
  $conn = new mysqli($servername,$username,$password,$dbname);
  
//   Check database connection
if($conn->connect_error){
     die("Connection failed: ". $conn->connect_error);
}else{
  echo "Connected Successfully";
}
// }
// connectMyDB();
?>
