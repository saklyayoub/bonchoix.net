<?php
// facture commande fonction

//fonction qui test si vous êtes permis ou pas dans cette page
function permis_cmd_fact()
{
	global $connection;
	$p = 0;
	//cas admin permission
	if(isset($_SESSION['admin'])){$p = 1;}
	
	//cas clients permission saufe si il a une commande/facture
	if(isset($_SESSION['client']))
	{
		// test si le client a au moins une facture ou une commande
		$client = $_SESSION['client'];
		$sql = mysql_query("SELECT * FROM commande WHERE email_clt='$client';", $connection);
		$n = mysql_num_rows($sql);
		echo'<script language="javascript">alert("'.$n.'";</script>';
		if ($n > 0){($p = 1);}
	}
	if($p = 0){echo'<script language="javascript">alert("Erreur! : Page non permise !");location ="index.php";</script>';}
}

?>