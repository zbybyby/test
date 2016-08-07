<?php
error_reporting(0);
session_start();
unset($_SESSION['admin_user']);
echo "<script>window.location.href='index.php';</script>";
?>
