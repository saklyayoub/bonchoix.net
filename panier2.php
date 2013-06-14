<?php include('include/function.php');?>
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
            <div id="container_under" class="g_box">
            	<div id="panier">
<?php
$client = verif_con_client();
echo'<h3>>>Etape 2/2</h3>';
echo '
<form action="" method="post">
	<table width="350" height="250px;" class="center">
		<tr>
			<td style="text-align:right" width="150px;">Nom :</td>
			<td><input type="text" name="clt_name" value="'.$client->nom_clt.'" readonly="readonly" id="input"/></td>
		</tr>
		<tr>
			<td style="text-align:right">Prenom :</td>
			<td><input type="text" name="clt_pname" value="'.$client->prenom_clt.'" readonly="readonly" id="input"/></td>
		</tr>
		<tr>
			<td style="text-align:right">E-mail :</td>
			<td><input type="email" name="clt_email" value="'.$client->email_clt.'" readonly="readonly" id="input"/> </td>
		</tr>
		<tr>
			<td style="text-align:right">Tel :</td>
			<td><input type="text" name="cmd_tel" required="required" id="input" autofocus="autofocus"/></td>
		</tr>
		<tr>
			<td style="text-align:right">Adresse :</td>
			<td><textarea name="cmd_adr" rows="7" required="required" id="input"></textarea></td>
		</tr>
	</table>
	<div class="contart">
		GuideBijoux.Com vous offre la possibiliter de reserver les articles pour (3) jous seulement, 
		On est pas responsable si l\'article ne sera pas disponible apres ce delais. 
		Vous devais vous presenter a notre bijouterie, avec le code qui vous sera envoyer lors de confirmation de commande! 
	</div>
	<center>
		<input type="checkbox" required="required"><span>J\'accepte!</span><br>
		<input type="submit" value="Enregistrer ma commande" class="submit_button" style="margin-top:30px; width:150px;"/>
	</center>
</form>				       
';
if ( (isset($_POST['clt_name'])) && (isset($_POST['clt_pname'])) && (isset($_POST['clt_email'])) && (isset($_POST['cmd_tel'])) && (isset($_POST['cmd_adr'])) )
{
	$mail_clt 		= $_POST['clt_email'];
	$tel_cmd		= $_POST['cmd_tel'];
	$adr_cmd		= $_POST['cmd_adr'];
	$montant_cmd	= montant_panier();
	$nbr_article	= nombre_article_dans_panier();
	$r = paiementAccepte($mail_clt, $tel_cmd, $adr_cmd, $montant_cmd, $nbr_article);
	if ($r)
	{
			echo'
			<script language="javascript">
				alert("Votre commande a ete enregistré! Une réponse vous seras confie dans des delais respectable");
				location="commande.php"
			</script>';
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
