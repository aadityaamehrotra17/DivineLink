<?php
session_start();
$_SESSION['user'] = "";
$_SESSION['name'] = "";
$_SESSION['religion'] = "";
header("Location: home.php");
exit;
?>