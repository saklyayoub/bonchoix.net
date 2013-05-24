<?php
if ($m_newsletter == '1')
{
	echo'<div id="newsletter_block" class="g_box">';
	echo'	<h3>Newsletter</h3>';
	echo'	<span>Avantages et nouveautés en avant-première !</span>';
	echo'	<span>Inscrivez-vous par ici !</span><br />';
	echo'	<form action="" method="post">';
	echo'		<input name="EMAIL" type="email" placeholder="Ex : mail@mail.mail" required="required"/>';
	echo'		<input type="submit" class="submit_button" value=" Valider "/>';
	echo'	</form>';

	if (isset($_POST['EMAIL']))
	{
		//Connection à mysql et sélection de la base de données
		$connection = mysql_connect($serveur, $utilisateur, $mot_de_passe) or die(mysql_error());
		mysql_select_db($base_de_donnees, $connection) or die(mysql_error());
		//Récupération des varibales de formulaire
		$email_newsletter = $_POST['EMAIL'];
		//preparation de requêtte
		$query_newsletter_send = "INSERT INTO newsletter VALUES('$email_newsletter', '$date')";
		//exécution des requête et récupération du nombre de résultats
		$result_newsletter_send = mysql_query($query_newsletter_send, $connection);
		if($result_newsletter_send == 1)
		{
			echo'
				<script language="javascript">
				alert("enregisrement avec succes");
				</script>
			';
			}
		else
		{
			echo'
				<script language="javascript">
				alert("l\'email '.$email_newsletter.' est déjà enregistrer dans notre newsletter");
				</script>
			';
		}
	//déconexion de la base de donneés
	mysql_close();
	}
        
	echo '</div>';
}
?>