<?php include('../../include/function.php');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $nom_du_site ; ?></title>
<link href="../../style/style.css" rel="stylesheet" type="text/css" />
</head>
<?php include('../../function/top_bar.php'); ?>
<body>
    <div id="head">
        <div id="head_container">
            <div id="head_logo">
                <img src="../../style/img/logo.png" alt="Le Bon Choix !"/>
            </div>>
        </div>
    </div>
    <?php include('../../function/nav.php');?>
    <div id="contenant">
        <div id="side_bar">
        <?php
        include('../menuadmin.php');
        ?>
        </div>
        <div id="container">
            <div id="container_under_admin" class="g_box">
                <h2>>>Gestion d'info globales</h2>
<form action="" method="post">                
<table width="600px">
    <tr><td>Nom du site :						</td><td><input type="text" class="global_input" id="sample_input" name="nom_du_site" Value="<?php echo $nom_du_site; ?>" /></td></tr>
    <tr><td>Tel :								</td><td><input type="text" class="global_input" id="sample_input" name="tel" value="<?php echo $tel; ?>" /></td></tr>
    <tr><td>Email principal :					</td><td><input type="text" class="global_input" id="sample_input" name="text_recherche" value="<?php echo $text_recherche; ?>" /></td></tr>
    <tr><td>Lien de page facebook :				</td><td><input type="text" class="global_input" id="sample_input" name="page_facebook" value="<?php echo $page_fb; ?>" /></td></tr>
    <tr><td>Lien de page tweeter :				</td><td><input type="text" class="global_input" id="sample_input" name="page_tweeter" value="<?php echo $page_tw; ?>" /></td></tr>
    <tr><td>Lien de canal youtube :				</td><td><input type="text" class="global_input" id="sample_input" name="page_youtube" value="<?php echo $page_yt; ?>" /></td></tr>
    <tr><td>Description :						</td><td><textarea name="description" class="global_input" id="wide_input"><?php echo $description; ?></textarea></td></tr>
    <tr><td>Adresse :							</td><td><textarea name="adresse" class="global_input" id="wide_input"><?php echo $adresse; ?></textarea></td></tr>
    <tr><td>Les coordonner geographique x/y :	</td><td><input type="text" class="global_input" id="sample_input" name="x_gmaps" value="<?php echo $x_gmaps; ?>" /><input type="text" class="global_input" id="sample_input" name="y_gmaps" value="<?php echo $y_gmaps; ?>" /></td></tr>
    <tr><td colspan="2" style="text-align:center"><input type="submit" value="Mise a jour ?" class="submit_button"/></td></tr>
</table>
</form>
<?php
if ( (isset($_POST['nom_du_site'])) && (isset($_POST['tel'])) && (isset($_POST['page_facebook'])) && (isset($_POST['page_tweeter'])) && (isset($_POST['page_youtube']))&& (isset($_POST['description'])) && (isset($_POST['adresse'])) && (isset($_POST['text_recherche']))&& (isset($_POST['x_gmaps']))&& (isset($_POST['y_gmaps'])) )
{
	//Connection à mysql et sélection de la base de données
	$connection = mysql_connect($serveur, $utilisateur, $mot_de_passe) or die(mysql_error()); mysql_select_db($base_de_donnees, $connection) or die(mysql_error());
	$nom_du_site_2 		= addslashes($_POST['nom_du_site']);
	$tel_2				= addslashes($_POST['tel']);
	$page_facebook_2	= addslashes($_POST['page_facebook']);
	$page_tweeter_2		= addslashes($_POST['page_tweeter']);
	$page_youtube_2		= addslashes($_POST['page_youtube']);
	$description_2		= addslashes($_POST['description']);
	$adresse_2			= addslashes($_POST['adresse']);
	$text_recherche_2	= addslashes($_POST['text_recherche']);
	$x_gmaps_2			= $_POST['x_gmaps'];
	$y_gmaps_2			= $_POST['y_gmaps'];
	$result_info_update = mysql_query("UPDATE info SET nom_du_site='$nom_du_site_2', tel='$tel_2', page_facebook='$page_facebook_2', page_tweeter='$page_tweeter_2', page_youtube='$page_youtube_2', description='$description_2', adresse='$adresse_2', text_recherche='$text_recherche_2', x_gmaps='$x_gmaps_2', y_gmaps='$y_gmaps_2' WHERE id='1';", $connection);
	if($result_info_update){header("location:#");}else{echo'<script language="javascript">alert("Une erreur est survenue");</script>';}
}
?>
<br />
<br />
<h2>>>Gestion des images</h2>
<table width="600px">
    <tr><td>Logo :</abbr></td><td>
    <form method="POST" action="" enctype="multipart/form-data">
    	<input type="file" class="global_input" id="sample_input" name="logo_change" accept="image/x-png">
        <input type="submit" value="Mise a jour ?" class="submit_button"/>
    </form>
<?php
if(isset($_FILES['logo_change']))
{ 
	$dossier = '../../style/img/';
	$img_size = getimagesize($_FILES['logo_change']['tmp_name']);
	$extension = strrchr($_FILES['logo_change']['name'], '.'); 
	$fichier = 'logo'.$extension;
	if(($img_size[0] <> 250) && ($img_size[1] <> 100)){$erreur = 'Verifier que le nouveau logo est de dimention 250x100px';}
	if(!isset($erreur))
	{	 
		 if(move_uploaded_file($_FILES['logo_change']['tmp_name'], $dossier . $fichier))
		 {echo '<script language="javascript">alert("Upload effectue avec succes ! le changement sera visible dans quelques instant")</script>';}
		 else{echo '<script language="javascript">alert("Echec de l\'upload !")</script>';}
	}
	else{echo '<script language="javascript">alert("'.$erreur.'")</script>';}
}
?>
    </td></tr>
    <tr><td colspan="2">PS: Image accepter de resolution 250x100px seulement!</td></tr>
</table>

            </div>
        </div>
    </div>
    <div id="footer">
        <?php include('../../function/footer.php');?>
    </div>
</body>
</html>
