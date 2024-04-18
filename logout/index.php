<?php
session_start();

if (isset($_SESSION["username"])) {
    unset($_SESSION["username"]);
?>
<script>
    window.location.href = 'https://dos.omsnepal.com/';
</script>
<?php
}
?>