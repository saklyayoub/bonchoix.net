<?php
//appel au fichier de configuration de connexion base de données
include'../../include/function.php';
$code_famill_art  = $_GET["code_famill_art"] ;
$result_famil_art_drop = mysql_query("DELETE FROM famill_article WHERE code_famill_art ='$code_famill_art' ;", $connection);
if($result_famil_art_drop)
{
	header("location:liste.php");
}
else
{
	echo'
	<script language="javascript">
		alert("Error! : '.mysql_error($connection).'");
		location ="liste.php";
	</script>';
}
?>