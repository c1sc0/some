<?php

$username = $_POST['username'];
$password = $_POST['password'];
$hashed_password = md5('szunyog');
$hashed_username = md5('c1sc0');
session_start();

if(md5($username) === $hashed_username && $hashed_password === md5($password))
{
$_SESSION['login'] = true;
header("Refresh: 0; url=admin.php");
}
else
{
$_SESSION['login'] = false;
$_SESSION['message'] = "Rossz felhasználónév vagy jelszó.";
header("Refresh: 0; url=index.php");
}
?>
