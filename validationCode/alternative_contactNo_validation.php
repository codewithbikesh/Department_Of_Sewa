<?php 
include("../db_connection.php");
// Check if Mobile No is provided in the GET request
// Check if Mobile No is provided in the GET request
if(isset($_GET['alternative_contactNo'])) {
    $alternative_contactNo = $_GET['alternative_contactNo'];

    $con = connectMyDB();
    $sql = "SELECT alternative_rContact_No FROM alternative_contact WHERE alternative_rContact_No = ?";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "s", $alternative_contactNo);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    
    // Check if a row was found (Citizenship Number exists)
    if ($row = mysqli_fetch_assoc($result)) {
        $response = array('result' => true);
    } else {
        $response = array('result' => false);
    }
    
    // Return the response as JSON
    echo json_encode($response);
    
    // Close the statement and database connection
    mysqli_stmt_close($stmt);
    mysqli_close($con);
} else {
    // Handle the case where CitizenshipNo is not provided
    echo json_encode(array('result' => false, 'message' => 'Email ID not provided'));
}
?>