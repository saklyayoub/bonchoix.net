<?php
include('../../include/function.php');
if ( (isset($_POST['code_famill_art'])) && (isset($_POST['nom_famill_art'])) && (isset($_POST['nbr_ligne'])) )
{
	$nbr_ligne_2		=	$_POST['nbr_ligne'];
	$code_famill_art	=	addslashes($_POST['code_famill_art']);
	$nom_famill_art		=	addslashes($_POST['nom_famill_art']);
	$number_ligne_max	=	'4';
	
	if ($nbr_ligne_2 = $number_ligne_max)
	{
		echo'
			<script language="javascript">
				alert("Erreur! : nombre de familles maximum attends '.$nbr_ligne_2.'");
				location ="liste.php";
			</script>';
	}
	else
	{
		$result_add_famill 	= mysql_query("INSERT INTO famill_article VALUES ('$code_famill_art', '$nom_famill_art');", $connection);
		if ($result_add_famill)
		{
			header("location:liste.php");
		}
		else
		{
			echo'
			<script language="javascript">
				alert("Error! : '.mysql_error($connection).' ");
				location ="liste.php";
			</script>';
		}
	}
}
?>