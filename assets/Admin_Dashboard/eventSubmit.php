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
    $eRegion = $_POST['EventRegion'];
    $eDistrict = $_POST['EventDistrict'];
    $eLocation = $_POST['EventLocation'];
    $eStartEventDate = $_POST['StartEventDate'];
    $eEndEventDate = $_POST['EndEventDate'];
    $id = $_POST['Id'];
    // echo $id;
    if (!empty($id)) {
        $sqlquery = "UPDATE `event` SET `eTypeOfEvent`='$eTypeOfEvent',`eDateOfEvent`='$eDayOfEvent',`eRegion`='$eRegion',`eDistrict`='$eDistrict',`eLocation`='$eLocation',`eStartDateEvent`='$eStartEventDate',`eEndDateEvent`='$eEndEventDate' WHERE id='$id'";
        echo $sqlquery;
    } else {
        $sqlquery = "INSERT INTO `event`(`eTypeOfEvent`, `eDateOfEvent`, `eRegion`, `eDistrict`, `eLocation`, `eStartDateEvent`, `eEndDateEvent`) VALUES ('$eTypeOfEvent','$eDayOfEvent','$eRegion','$eDistrict','$eLocation','$eStartEventDate','$eEndEventDate')";
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
