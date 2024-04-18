<?php 
include('library/db_conn.php');
if (isset($_GET['flexSwitchCheckDefault'])) {
    $flexSwitchCheckDefault = $_GET['flexSwitchCheckDefault'];
    $usernameValue = $_GET['usernameValue'];
    // Connect to the database
    $conn = connectMyDB();

    // Check if the active_status is 0
    $sql = "SELECT active_status FROM login_det WHERE user_email='$usernameValue'";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);
    // Check if a row with active_status 0 exists
    if ( $row['active_status']== 0) {
        // Execute your update query here
        $updateSql = "UPDATE login_det SET active_status = 1 WHERE user_email='$usernameValue'";
        $updateStmt = mysqli_prepare($conn, $updateSql);
        mysqli_stmt_execute($updateStmt);

        // Close the update statement
        mysqli_stmt_close($updateStmt);

        $response = array('result' => true, 'message' => 'Update performed');
    } elseif($row['active_status']== 1){
        $updateSql = "UPDATE login_det SET active_status = 0 WHERE user_email='$usernameValue'";
        $updateStmt = mysqli_prepare($conn, $updateSql);
        mysqli_stmt_execute($updateStmt);

        // Close the update statement
        mysqli_stmt_close($updateStmt);
        $response = array('result' => true, 'message' => 'Update performed');

    }else {
        $response = array('result' => false, 'message' => 'No rows with active_status = 0 found');
    }

    // Close the select statement and database connection
    mysqli_stmt_close($stmt);
    mysqli_close($conn);

    // Return the response as JSON
    echo json_encode($response);
} else {
    // Handle the case where flexSwitchCheckDefault is not provided
    echo json_encode(array('result' => false, 'message' => 'User not provided'));
}
?>
