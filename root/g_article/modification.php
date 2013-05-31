<?php include('../../include/function.php'); header("Pragma: no-cache");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $nom_du_site ; ?></title>							<!-- récupération de nom de site de la base de donneés -->
<link href="../../style/style.css" rel="stylesheet" type="text/css" />	<!-- Attachement de feille de style principal -->
<script type="text/javascript" src="../../style/functions.js"></script>	<!-- Attachement de fonction de menue vertical -->
</head>
<body>
<?php include('../../function/top_bar.php'); ?>
    <div id="head">
        <div id="head_container">
            <div id="head_logo">
                <img src="../../style/img/logo.png" alt="Le Bon Choix !"/>
            </div>
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
                <h3>>>Modification d'articles</h3>
<?php                
$code_article  	= $_GET["code_article"];
$q2 = mysql_query( " SELECT * FROM article WHERE fav_art='1' ;",$connection);
$nbr_ligne_fav_1 = mysql_num_rows($q2);
$nbr_fav_max = '5';
$nbr_fav_res = $nbr_fav_max - $nbr_ligne_fav_1;
if (isset($code_article))
{
	$connection = mysql_connect($serveur, $utilisateur, $mot_de_passe) or die(mysql_error());
	mysql_select_db($base_de_donnees, $connection) or die(mysql_error());
	mysql_close();
	$q1 = mysql_query(" SELECT * FROM article WHERE code_art='$code_article';",$connection);
	$r_q1 = mysql_fetch_object($q1);
	$CFA_M	= $r_q1->code_famill_art;
	$CSFA_M	= $r_q1->code_sous_famill_art;
	$DC_M	= $r_q1->design_courte_art;
	$DL_M	= $r_q1->design_long_art;
	$PRX_M	= $r_q1->prix_art;
	$FV_M	= $r_q1->fav_art;
	if ($FV_M == '1') { $checked='checked="checked"';}else{$checked='';}
echo'
<form action="fonction_modif.php" method="post">   
	<table width="400" style="float:left;">
	  <tr>
		<th scope="row">Code* :</th>
		<td><input type="text" name="m_ca" value="'.$code_article.'" readonly="readonly" /></td>
	  </tr>
	  <tr>
		<th scope="row">Famille* :</th>
		<td><input type="text" name="m_cfa" value="'.$CFA_M.'" readonly="readonly" /></td>
	
	  </tr>
	  <tr>
		<th scope="row">Sous Famille* :</th>
		<td><input type="text" name="m_csfa" value="'.$CSFA_M.'" readonly="readonly" /></td>
	  </tr>
	  <tr>
		<th scope="row">Prix :</th>
		<td><input type="text" name="m_prx" value="'.$PRX_M.'" required="required" autofocus="autofocus" /></td>
	  </tr>
	  <tr>
		<th scope="row">Libele</th>
		<td><textarea name="m_dc" rows="2" cols="30" required="required">'.$DC_M.'</textarea></td>
	  </tr>
	  <tr>
		<th scope="row">Designation</th>
		<td><textarea name="m_dl" rows="7" cols="30" required="required">'.$DL_M.'</textarea></td>
	  </tr>
	  <tr><td><center><input type="submit" value="Mise a jours ?" class="submit_button"/></center></td></tr>
	</table>
</form>

<table width="350" style="float:right;">
	<tr><td><img src="../../img_article/'.$code_article.'.png" width="350" height="200"/></td></tr>
	<tr>
		<td>
			<form action="fonction_upload_img.php" method="post" enctype="multipart/form-data">
				<input type="hidden" name="code_article" value="'.$code_article.'">
				<input type="file" name="upload_img" accept="image/jpeg" accept="image/x-png" onchange="this.form.submit() "/>
			</form>
		</td>
	</tr>
	<tr>
		<td>';
		if ($nbr_fav_res > '0')
		{echo'
			 <form action="fonction_fav.php" method="post">
				<input type="checkbox" name="fav_art" '.$checked.' onchange="this.form.submit()"/>
				<input type="hidden" name="code_art_x" value="'.$code_article.'">
				<span>Affichier parmis les nouveaute?</span>
			 </form>
			 ';
		}
		else
		{
			if ($FV_M == '1'){
			echo'
				 <form action="fonction_fav.php" method="post">
					<input type="checkbox" name="fav_art" checked="checked" onchange="this.form.submit()"/>
					<input type="hidden" name="code_art_x" value="'.$code_article.'">
					<span>Affichier parmis les nouveaute?</span>
				 </form>
				';
			}
		}
		echo'
		</td>
	</tr>
</table>
';
}
?>
            </div>
        </div>
    </div>
    <div id="footer">
        <?php include('../../function/footer.php');?>
    </div>
</body>
</html>