<?php
if (isset($_SESSION['client_id']))
{
	$x = clt_cmd($_SESSION['client_id']);
}
echo'
<div id="nav">
	<ul>
		<li><a href="'.$adress_du_site.'/index.php">Accueil</a></li>|
		<li><a href="'.$adress_du_site.'/catalogue.php">Notre catalogue</a></li>|
		<li><a href="'.$adress_du_site.'/panier.php">Mon panier ('.nombre_article_dans_panier().')</a></li>|';
if (isset($_SESSION['client_id'])){if ($x){echo'<li><a href="'.$adress_du_site.'/commande.php">Commandes/Factures</a></li>|';}}
echo'
		<li><a href="'.$adress_du_site.'/contact.php">Contactez-nous</a></li> 
	</ul>
</div>
';
?>
