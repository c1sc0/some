<?php
session_start();
if(isset($_SESSION['login']) && $_SESSION['login'] == true)
{
print "<html><head><title>Admin</title><meta http-equiv=\"Content-type\" content=\"text/html\"; charset=utf-8>
<link rel=\"stylesheet\" type=\"text/css\" href=\"../style/style.css\"/>
</head>


<body>";

if(isset($_SESSION['views']))
{
$_SESSION['views'] = $_SESSION['views'] + 1;
}
else
{
$_SESSION['views'] = 1;
}

include("menu.php");
print "Views: " . $_SESSION['views'];
print "<br/>";
if(isset($_SESSION['delete']))
{
	print $_SESSION['delete'];
	unset($_SESSION['delete']);
}
print "<br/><br/><br/><br/>";
print "Log:<br/>";
if(file_exists("log.php"))
{
print "<table>";
print "<tr><th>Bejelentkezés ideje</th>";
print "<th>Ip cím: </th></tr>";
include("log.php");
print "</table>";
}
else
{
print "Üres";
}
print "</body></html>";
}
else
{
header("Refresh: 0; url=index.php");
$_SESSION['message'] = "A lap megtekintéséhez előbb be kell jelentkezned!";
}
?>
