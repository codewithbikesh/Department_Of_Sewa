<!--//session part-->
<!--//session part-->
<!--session_start();-->
<!--if (isset($_SESSION['username'])) {-->
<!--    //   echo $_SESSION['username'];-->
<!--}-->
<!-- else if ($_SESSION['username'] == '') {-->
<!--     echo "no sesssion";-->
<!--    echo"<script>window.location.href='index.php';</script>";-->
<!-- }-->
<!-- //session part-->
<!-- //session part-->
<?php
include('library/db_conn.php');
$conn = connectMyDB();

if (isset($_POST['TypeOfEvent'])) {
    $eTypeOfEvent = $_POST['TypeOfEvent'];
    $eDayOfEvent = $_POST['DayOfEvent'];
    $fileUpload = $_POST['fileUpload'];
    $id = $_POST['Id'];
    // echo $id;
    if (!empty($id)) {
        $sqlquery = "UPDATE `notification` SET `notification_rTitle`='$eTypeOfEvent',`notification_rDescription`='$eDayOfEvent', `pdf_rName`='$fileUpload' WHERE id='$id'";
        echo $sqlquery;
    } else {
        $sqlquery = "INSERT INTO `notification`(`notification_rTitle`, `notification_rDescription`, `pdf_rName`) VALUES ('$eTypeOfEvent','$eDayOfEvent','$fileUpload')";
    }

    if ($conn->query($sqlquery) === TRUE) {
        echo "<script>alert('Data Inserted/Updated Successfully!');</script>";
        return true;
    } else {
        echo "<script>alert('Error: " . $conn->error . "');</script>";
        return false;
    }
}
?>
