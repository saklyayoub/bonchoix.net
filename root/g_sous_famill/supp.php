<?php
//appel au fichier de configuration de connexion base de données
include'../../include/function.php';

//Connection à mysql et sélection de la base de données
$connection = mysql_connect($serveur, $utilisateur, $mot_de_passe) or die(mysql_error());
mysql_select_db($base_de_donnees, $connection) or die(mysql_error());
 
//récupération de la variable d'URL,
//qui va nous permettre de savoir quel enregistrement supprimer:
$code_sous_famill_art  = $_GET["code_sous_famill_art"] ;
$query_sous_famill_art_drop = "DELETE FROM sous_famill_article WHERE code_sous_famill_art ='$code_sous_famill_art' ";
$result_sous_famil_art_drop = mysql_query($query_sous_famill_art_drop, $connection);
if($result_sous_famil_art_drop == 1)
	{
		header("location:liste.php");
	}
else
	{
		header("location:liste.php");
	}
?>