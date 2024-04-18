<?php
session_start();

if (isset($_SESSION["username"])) {
    unset($_SESSION["username"]);
?>
<script>
    window.location.href = 'https://omsnepal.com/';
</script>
<?php
}
?>