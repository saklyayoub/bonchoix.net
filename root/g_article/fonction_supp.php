<?php
include('../../include/function.php');
$ca  = $_GET["ca"] ;
$sql = "DELETE FROM article WHERE code_art ='$ca'";


$requete = mysql_query($sql, $connection);
 
if($requete)
	{
		unlink("../../img_article/$ca.png");
		echo'
		<script language="javascript">
			location ="liste.php";
		</script>';
	}
else
	{
		echo'
		<script language="javascript">
			alert("Echec suppression article!");
			location ="liste.php";
		</script>';
	}
?>
