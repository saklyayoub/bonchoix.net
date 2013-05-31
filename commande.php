<?php include('include/function.php');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $nom_du_site ; ?></title>
<link href="style/style.css" rel="stylesheet" type="text/css" />
</head>
<?php include('function/top_bar.php'); ?>
<body>
	<?php include('function/social.php');?>
	<div id="head">
		<div id="head_container">
			<div id="head_logo"><a href="#"><img src="style/img/logo.png" alt="<?php echo $nom_du_site ; ?>!"/></a></div>
			<div id="head_right">	
			</div>
		</div>
	</div>
	<?php include('function/nav.php');?>
    <div id="contenant"><div id="side_bar">
        	<?php include('function/search.php');?>
			<?php include('function/menue.php');?>
            <?php include('function/fb.php');?>
    	</div>
        <div id="container">
            <div id="container_under" class="g_box">
            	<div id="panier">
<?php
$client = verif_con_client();
$c = clt_cmd($client->email_clt);
if (!$c){non_perimis();}
echo'<h3>>>>Suivit des commandes</h3><br>';
echo'<h4>>>Commande en instance</h4>';
$sql_1 = mysql_query("SELECT * FROM `commande` WHERE `email_clt` = '$client->email_clt' AND (`etats` ='non traiter' OR `etats` ='en instance');", $connection);
if ($sql_1)
{
	while ($r_1 = mysql_fetch_object($sql_1))
	{
		echo '<a href="cmd_fact.php?id_cmd='.$r_1->id_cmd.'" target="new">Commande de reference : '.$r_1->id_cmd.'</a> | <a href=mailto:'.$text_recherche.'?subject='.$r_1->id_cmd.'>Faire une reclamation !</a></br>';
	}
}
echo'<h4>>>Commande confirmer</h4>';
$sql_2 = mysql_query("SELECT * FROM `commande` WHERE `email_clt` = '$client->email_clt'  AND `etats` ='confirmer';", $connection);
if ($sql_2)
{
	while ($r_2 = mysql_fetch_object($sql_2))
	{
		echo '<a href="cmd_fact.php?id_cmd='.$r_2->id_cmd.'" target="new">Commande de reference : '.$r_2->id_cmd.'</a>  | <a href=mailto:'.$text_recherche.'?subject='.$r_2->id_cmd.'>Faire une reclamation !</a></br>';
	}
}
echo'<h4>>>Commande fermer</h4>';
$sql_3 = mysql_query("SELECT * FROM `commande` WHERE `email_clt` = '$client->email_clt' AND `etats` ='annuler';", $connection);
if ($sql_3)
{
	while ($r_3 = mysql_fetch_object($sql_3))
	{
		echo '<a href="cmd_fact.php?id_cmd='.$r_3->id_cmd.'" target="new">Commande de reference : '.$r_3->id_cmd.'</a> | <a href=mailto:'.$text_recherche.'?subject='.$r_3->id_cmd.'>Faire une reclamation !</a></br>';
	}
}

echo'<h4>>>Facture d\'achat</h4>';
$sql_4 = mysql_query("SELECT * FROM `commande` WHERE `email_clt` = '$client->email_clt' AND `etats` ='facturer';", $connection);
if ($sql_4)
{
	while ($r_4 = mysql_fetch_object($sql_4))
	{
		echo '<a href="cmd_fact.php?id_cmd='.$r_4->id_cmd.'" target="new">Facture de reference : '.$r_4->id_cmd.'<br></a>';
	}
}
?>
                </div>
            </div>
        </div>
    </div>
    
    <div id="footer" class="">
        <?php include('function/footer.php');?>
    </div>
</body>
</html>
