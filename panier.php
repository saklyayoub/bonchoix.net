<?php 
include('include/function.php');
if (isset($_POST['CA_S']))
{
	$CA_S = $_POST['CA_S']; 	
	$supp = supprim_article2($CA_S);
	header("location:panier.php");
}
if (isset($_POST['X']))
{
	vider_panier();
	header("location:panier.php");
}
?>
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
            <div id="container_under_scroll" class="g_box">
            	<div id="panier">
<?php

if (nombre_article_dans_panier() > 0)
{
	$nbr_article = nombre_article_dans_panier();
	echo'<h3>>>Etape 1/2</h3>';
	echo'<p style="margin:40px;">Vous avez <strong>'.nombre_article_dans_panier().'</strong> article(s) dans votre panier,<br></p>';
	echo'<table id="ad_table" class="center">';
	for ($i = 0; $i <= ($nbr_article-1); $i++)
	{
		$code_art_panier 	= $_SESSION['panier']['id_article'][$i];
		$libile_art_panier	= $_SESSION['panier']['libile'][$i];
		$prix_art_panier	= $_SESSION['panier']['prix'][$i];
		echo '	
			<tr>
				<td>'.($i+1).'</td>
				<td><a href="info_article.php?code_art='.$code_art_panier.'">'.$code_art_panier.'</a></td>
				<td><a href="info_article.php?code_art='.$code_art_panier.'">'.$_SESSION['panier']['libile'][$i].'</a></td>
				<td>'.$_SESSION['panier']['prix'][$i].'</td>
				<td width="70px" height="70px;">
				<form action="" method="post">
					<input type="hidden" value="'.$code_art_panier.'" name="CA_S">
					<i><input border="0" value="submit" src="style/img/panier/s_yellow.png" type="image""><span>Retirer du panier</span></i>
				</form></td>
			</tr>
		';
	}
	echo'
	<td colspan="3" style="text-align:right">
		TOTAL :
	</td>
	<td>
		'.$total = montant_panier().' TND
	</td>
	<td width="70px" height="70px;">
		<form action="" method="post">
			<input type="hidden" name="X">
			<i><input border="0" value="submit" src="style/img/panier/s_red.png" type="image""><span>Vider ma panier</span></i>
		</form>
	</td>
	</table>
	<center>
		<form action="panier2.php" method="" id="commande">
			<center><input type="submit" value="Etape Suivante" class="submit_button" style="margin-top:30px; width:150px;"/></center>
		</form>
	</center>
	';
}
else
{
	echo'Votre panier est vide';
}
?>
				</div>
            </div>
        </div>
    </div>
    
    <div id="footer">
        <?php include('function/footer.php');?>
    </div>
</body>
</html>
