<?php
session_start();
if(!isset($_SESSION['login']) || $_SESSION['login'] == false )
{
print "<html><head><title>Admin</title><meta http-equiv=\"Content-type\" content=\"text/html\"; charset=UTF-8>
<link rel=\"stylesheet\" type=\"text/css\" href=\"../style/style.css\"/>
<link rel=\"icon\" href=\"../pictures/favicon.ico\">
</head>
<body>";
print "<div class=login>";
print "<form action=\"../../login/login.php\" method=\"POST\">";
print "<table>";
print "<tr>";
print "<td>Name:</td> <td><input type=\"text\" name=\"username\"></td></tr>";
print "<tr><td>Password: </td><td><input type=\"password\" name=\"password\"></td></tr>";
print "<tr><td colspan=2><center><input type=\"submit\" value=\"Login\"></center></td></tr></table></div>";





print "</form>";
if(isset($_SESSION['message']))
{
	print $_SESSION['message'];
	unset($_SESSION['message']);
}
$welcomeTextFile = "../data/welcome.txt";
$fh = fopen($welcomeTextFile,'r');
$theText = fread($fh, filesize($welcomeTextFile));
fclose($fh);
print "<div class=ex>  $theText  </div>";


session_destroy();
print "</body></html>";
}
else
{
header("Refresh: 0; url=admin.php");
}
?>
