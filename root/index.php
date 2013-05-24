<?php 
include('../include/function.php');
include('../include/function_statistiques.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $nom_du_site ; ?></title>
<link href="../style/style.css" rel="stylesheet" type="text/css" />
</head>
<?php include('../function/top_bar.php'); ?>
<body>
    <div id="head">
        <div id="head_container">
            <div id="head_logo">
                <img src="../style/img/logo.png" alt="Le Bon Choix !"/>
            </div>
        </div>
    </div>
    <?php include('../function/nav.php');?>
    <div id="contenant">
        <div id="side_bar">
        <?php
        include('menuadmin.php');
        ?>
        </div>
        <div id="container">
            <div id="container_under" class="g_box">
            <?php echo'
            <h3>>>Panneau admin</h3>
            <h4>>>Etats des commandes</h4>
            <ul>
                <li>Vous avez <strong><r>'.comp_cmd_non_traiter().'</r></strong> commande(s) non traité</li>
                <li>Vous avez <strong>'.comp_cmd_instance().'</strong> commande(s) en instance</li>
				<li>Vous avez <strong>'.comp_cmd_fermer().'</strong> commande(s) annuler </li>
				<li>Vous avez <strong>'.comp_facture().'</strong> facture(s) </li>
                <li>Montant totale des commandes traiter <strong>'.total_cmd().' TND</strong></li>
            	<li>Montant totale des factures <strong>'.total_facture().' TND</strong></li>
            </ul>
            <h4>>>Etats des messages</h4>
            <ul>
                <li>Vous avez <strong><r>'.comp_nbr_contacternous_non_lu().'</r></strong> nouveau(x) message(s)</li>
                <li>Vous avez <strong>'.comp_nbr_contacternous_repondu().'</strong> message(s) repondue(s)</li>
                <li>Vous avez <strong>'.comp_nbr_contacternous().'</strong> message(s) reçu(s) en total</li>
            </ul>
            <h4>>>Statistiques</h4>
            <ul>
            	<li>Vous avez <strong>'.comp_nbr_article().'</strong> articles</li>
            	<li>Vous avez <strong>'.comp_nbr_client().'</strong> clients</li>
                <li>Vous avez <strong>'.comp_nbr_newsletter().'</strong> newsletter</li>
                <li>Vous avez 0 visiteurs ce dernier mois</li>
                <li>Vous avez 0 visite en total</li>
            </ul>
			';?>
            </div>
        </div>
    </div>
    <div id="footer">
        <?php include('../function/footer.php');?>
    </div>
</body>
</html>
