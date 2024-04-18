<?php 
include("../db_connection.php");
// Check if Mobile No is provided in the GET request
// Check if Mobile No is provided in the GET request
if(isset($_GET['smartCard'])) {
    $smartCard = $_GET['smartCard'];

    $con = connectMyDB();
    $sql = "SELECT rSmartCardNo FROM agps WHERE rSmartCardNo = ?";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "s", $smartCard);
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
    echo json_encode(array('result' => false, 'message' => 'Smart Card ID not provided'));
}
?>