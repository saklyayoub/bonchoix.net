<?php
include '../../include/function.php';
$m_recherche_updated		= $_POST['m_recherche'];
$m_newsletter_updated		= $_POST['m_newsletter'];
$m_facebook_updated 		= $_POST['m_facebook'];
$m_youtube_updated 			= $_POST['m_youtube'];
$m_tweeter_updated 			= $_POST['m_tweeter'];
$query_module_update		= "UPDATE info SET m_recherche='$m_recherche_updated', m_newsletter='$m_newsletter_updated', m_facebook='$m_facebook_updated', m_tweeter='$m_tweeter_updated', m_youtube='$m_youtube_updated'";
$connection = mysql_connect($serveur, $utilisateur, $mot_de_passe) or die(mysql_error());
mysql_select_db($base_de_donnees, $connection) or die(mysql_error());
$result_module_update = mysql_query($query_module_update, $connection);
if ($result_module_update = 1)
{
	header("location:g_modules.php");
}
else
{
	header("location:g_modules.php");
}
mysql_close();
?>