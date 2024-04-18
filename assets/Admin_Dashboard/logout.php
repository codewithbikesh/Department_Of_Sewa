<?php
session_start();

if (isset($_SESSION["admin_email"])) {
    unset($_SESSION["admin_email"]);
?>
<script>
    window.location.href = 'https://dos.omsnepal.com/admin/';
</script>
<?php
}
?>