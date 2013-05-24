<?php 
include('include/function.php');
//fonction panier ajout
if ( isset($_POST['id']) && isset($_POST['libile']) && isset($_POST['prix']) )
{
	$select['id'] = $_POST['id']; 
	$select['libile'] = $_POST['libile'];
	$select['qte'] = ''; 
	$select['taille'] = ''; 
	$select['prix'] = $_POST['prix']; 
	
	ajout($select);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $nom_du_site ; ?></title>
<link href="style/style.css" rel="stylesheet" type="text/css" />
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/fr_FR/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
</head>
<?php include('function/top_bar.php'); ?>
<body>
	<?php include('function/social.php');?>
	<div id="head">
		<div id="head_container">
			<div id="head_logo"><a href="#"><img src="style/img/logo.png" alt="<?php echo $nom_du_site ; ?>"/></a></div>
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
				<div id="info_art">         
<?php
//info article
$CA = $_GET['code_art'];
$info_article = info_article($CA);
echo'
	<div>
		<div id="info_article_left"><img border="0" src="img_article/'.$info_article->code_art.'.png" style="width:400px; height:400px"></div>
		<div id="info_article_right">
			<h1>'.$info_article->design_courte_art.'</h1>
			<div>Réference : <span> '.$CA.'</span></div>
			<p>'.$info_article->design_long_art.'</p>
			<div id="info_article_right_prix">'.$info_article->prix_art.' TND</div>
			<div class="fb-like" data-href="'.$page_fb.'" data-send="true" data-width="250"></div>';						
//test si l'article déjà dans le panier ou non 
$present = verif_panier($CA);
if($present == true)
{
	// form de supprisson de l'artice du panier
	echo'
		<form action="" method="post">
			<input type="hidden" value="'.$CA.'" name="CA_S">
			<input border="0" value="submit" src="style/img/panier/yellow.png" type="image"">
		</form>
	';
}
else
{
	//form d'ajout d'article au panier
	echo'			
		<form action="" method="post">
			<input type="hidden" value="'.$CA.'" name="id">
			<input type="hidden" value="'.$info_article->design_courte_art.'" name="libile">
			<input type="hidden" value="'.$info_article->prix_art.'" name="prix">
			<input border="0" value="submit" src="style/img/panier/green.png" type="image"">
		</form>
		';	
}
echo'	</div>
	</div>
';

//function supp
if (isset($_POST['CA_S']))
{
	$CA_S = $_POST['CA_S']; 
	$supp = supprim_article2($CA_S);
	header("location:info_article.php?code_art=$CA_S");
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