<?php 
include('include/function.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $nom_du_site ; ?></title>
<link href="style/style.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
<link rel="icon" type="image/png" href="favicon.ico" />
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
				<h3>>>>Resultat de recherche</h3>
                <div id="art_desplay_global_block"> 
            
            
<?php
if ( (isset($_POST['listefamille'])) && (isset($_POST['listecategorie'])) && (isset($_POST['prix'])) ){
	$f 		= $_POST['listefamille'];
	$sf 	= $_POST['listecategorie'];
	$prix	= $_POST['prix'];
	
	$sql = mysql_query(" SELECT * FROM article WHERE code_famill_art='$f' AND code_sous_famill_art='$sf' AND `prix_art`<'$prix';", $connection);
	$nombre_de_ligne = mysql_num_rows($sql);
	echo 'nombre d\'article(s) trouvée(s) :'.$nombre_de_ligne.'<br>';

	if($nombre_de_ligne)
	{
		while ($B = mysql_fetch_object($sql)){
			$B1 = $B->code_art;
        	$B2 = $B->design_courte_art;
        	$B3	= $B->prix_art;
        	$B5 = $B->design_long_art;
        	echo'
         	<div id="art_cadre">
            	<div id="art"><a href="info_article.php?code_art='.$B1.'&design_courte_art='.$B2.'&prix_art='.$B3.'&design_long_art='.$B5.'"><img src="img_article/'.$B1.'.png"/></a></div>
            	<div id="art_desig">'.$B2.'</div>
            	<div id="art_prix">'.$B3.' TND</div>
        	</div>';
		}
	}
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
