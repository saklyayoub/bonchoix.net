<?php
include'../../include/function.php';
$code_sous_famill_art  = $_GET["code_sous_famill_art"] ;
$query_sous_famill_art_drop = "DELETE FROM sous_famill_article WHERE code_sous_famill_art ='$code_sous_famill_art' ";
$result_sous_famil_art_drop = mysql_query($query_sous_famill_art_drop, $connection);
if($result_sous_famil_art_drop)
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