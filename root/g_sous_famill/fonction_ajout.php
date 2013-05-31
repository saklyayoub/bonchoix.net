<?php
//function ajouter
include('../../include/function.php');
if ( (isset($_POST['code_sous_famill_art'])) && (isset($_POST['nom_sous_famill_art'])) && (isset($_POST['code_famill_art'])) )
{
	$code_famill_art			= addslashes($_POST['code_famill_art']);
	$code_sous_famill_art		= addslashes($_POST['code_sous_famill_art']);
	$nom_sous_famill_art		= addslashes($_POST['nom_sous_famill_art']);
	$result_add_sous_famill 	= mysql_query("INSERT INTO `bonchoix`.`sous_famill_article` (`code_sous_famill_art`, `nom_sous_famill_art`, `code_famill_art`) VALUES ('$code_sous_famill_art', '$nom_sous_famill_art', '$code_famill_art');", $connection);
	if ($result_add_sous_famill)
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
}
?>