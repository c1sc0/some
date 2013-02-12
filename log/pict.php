<?php
header("Content-Type: image/png");
$im = @imagecreate(400, 60)
    or die("Cannot Initialize new GD image stream");
$background_color = imagecolorallocate($im, 0, 0, 0);
$text_color = imagecolorallocate($im, 255, 255, 255);

//távoli IP cím lekérdezése
$ip = $_SERVER['REMOTE_ADDR'];
$date = date('r'); //aktuális dátum lekérdezése
$my_file = "log.php"; //itt adjuk meg a fájl nevét, amit létre fogunk hozni, ha nem létezik..


$fh = fopen($my_file, 'a') or die("Can't open file!"); //az "a" létrehozza ha nem létezik és hozzáfűz, ha igen

//ismétlődések szűrése :)
$fh2 = fopen($my_file, 'r') or die("Fuck, something is wrong!");
$adat = fread($fh2, filesize($my_file)); //ebben keresünk
$pos = strpos($adat, $ip); //az $ip amit keresünk a szövegben

if($pos === false)
{	//beleírjuk, ha még nincs ilyen ip a listában 
	$stringData = "<tr>";
	fwrite($fh, $stringData);
	$stringData = "<td> $date </td>" 
	. "<td> $ip </td>" . "</tr>";
	fwrite($fh, $stringData);
}
//ismétlődések szűrése vége :)




fclose($fh2);
fclose($fh);
imagettftext($im, 40, 0, 10, 40, $text_color, "./adrip1.ttf", "Your IP:  " . $ip);

//imagestring($im, 5, 5, 5,  $ip, $text_color);
imagepng($im);
imagedestroy($im);
?>



