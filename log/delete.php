<?php
$my_file = "log.php";
session_start();
if($_SESSION['login'] === true)
{
		if(unlink($my_file))
		{
			$_SESSION['delete'] = "Log: Sikeres törlés...";
			header("Refresh: 0; url=admin.php");
		}
		else
		{
			$_SESSION['delete'] = "Log: Sikertelen törlés...";
			header("Refresh: 0; url=admin.php");
		}
}
else
{
header("Refresh: 0; url=index.php");
}
?>
