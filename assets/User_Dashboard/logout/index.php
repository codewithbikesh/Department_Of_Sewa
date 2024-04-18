<?php
session_start();
// echo $_SESSION["adminemail"];
if (isset($_SESSION["username"])) {
    unset($_SESSION["username"]);
    // die();
?>
<script>
    window.location.href = 'https://dos.omsnepal.com/';
</script>
<?php
}
?>