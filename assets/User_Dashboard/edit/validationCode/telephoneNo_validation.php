<?php 
include("../library/db_conn.php");
// Check if Mobile No is provided in the GET request
// Check if Mobile No is provided in the GET request
if(isset($_GET['TelephoneNo'])) {
    $MobileNo = $_GET['TelephoneNo'];

    $con = connectMyDB();
    $sql = "SELECT rTelephoneNo FROM permanentaddress WHERE rTelephoneNo = ?";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "s", $MobileNo);
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
    echo json_encode(array('result' => false, 'message' => 'Citizenship Number not provided'));
}
?>