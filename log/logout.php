<?php
session_start();
unset($_SESSION['login']);

$_SESSION['message']="Sikeres kijelentkezés.";
header("Refresh: 0; url=index.php");
?>
