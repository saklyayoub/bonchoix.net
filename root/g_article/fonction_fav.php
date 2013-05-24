<?php
//fonction gestion des article favorie 5
include('../../include/function.php');
$code_art_x	= $_POST['code_art_x'];
if (!isset($_POST['fav_art']))
{
	$r1 = mysql_query("UPDATE article SET fav_art='0' WHERE code_art='$code_art_x';", $connection);
	header("location:modification.php?code_article=".$code_art_x);
}
else
{
	$r1 = mysql_query("UPDATE article SET fav_art='1' WHERE code_art='$code_art_x';", $connection);
	header("location:modification.php?code_article=".$code_art_x);
}
?>