<?php
include "assets/library/database.php";
$conn = connectMyDB();

if (isset($_POST['selectedNumber'])) {
    $mobileNumber = $_POST['selectedNumber'];
    $getTokenID = $_POST['getTokenID'];
    $getFromSender = $_POST['getFromSender'];

    // Fetch the "eTypeOfEvent" from your database
    $sql = "SELECT * FROM notification WHERE id = (SELECT IFNULL(MAX(id), 0) FROM notification);"; // Assuming you want the most recent event.
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);
        $message = "Notice From Department Of Sewa" . "\n" . $row['notification_rTitle'] .",". "\n" .
        $row['notification_rDescription'];


        $url = $_POST['smsApi'];
        $args = http_build_query(array(
            'token' => $getTokenID,
            'from'  => $getFromSender,
            'to'    => $mobileNumber,
            'text'  => $message,
        ));

        // Make the call using the API
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $args);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        // Response
        $response = curl_exec($ch);
        $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($response) {
            echo "Sms sent successfully!";
        } else {
            echo "Sms failed to send!";
        }
    } else {
        echo "Failed to fetch event data from the database.";
    }
}
?>

