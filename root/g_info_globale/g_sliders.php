<?php include('../../include/function.php');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $nom_du_site ; ?></title>							<!-- récupération de nom de site de la base de donneés -->
<link href="../../style/style.css" rel="stylesheet" type="text/css" />	<!-- Attachement de feille de style principal -->
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
<br />

<h2>>>Gestion des slider de site</h2>

<script type="text/javascript" src="../../function/lib/jquery.min.js" ></script>
<script type="text/javascript" src="../../function/lib/jquery-ui.min.js" ></script>
<script type="text/javascript">
	$(document).ready(function(){
		$("#featured > ul").tabs({fx:{opacity: "toggle"}}).tabs("rotate", 0, true);
	});
</script>
<center>		
<div id="featured">
    <ul class="ui-tabs-nav">
        <li class="ui-tabs-nav-item ui-tabs-selected" id="nav-fragment-1"><a href="#fragment-1"><img src="../../style/img/slider/1.png" alt="" width="80" height="50"/><span><?php echo $titre_jqy_1 ; ?></span></a></li>
        <li class="ui-tabs-nav-item" id="nav-fragment-2"><a href="#fragment-2"><img src="../../style/img/slider/2.png" alt="" width="80" height="50"/><span><?php echo $titre_jqy_2 ; ?></span></a></li>
        <li class="ui-tabs-nav-item" id="nav-fragment-3"><a href="#fragment-3"><img src="../../style/img/slider/3.png" alt="" width="80" height="50"/><span><?php echo $titre_jqy_3 ; ?></span></a></li>
        <li class="ui-tabs-nav-item" id="nav-fragment-4"><a href="#fragment-4"><img src="../../style/img/slider/4.png" alt="" width="80" height="50"/><span><?php echo $titre_jqy_4 ; ?></span></a></li>
        <li class="ui-tabs-nav-item" id="nav-fragment-5"><a href="#fragment-5"><img src="../../style/img/slider/5.png" alt="" width="80" height="50"/><span><?php echo $titre_jqy_5 ; ?></span></a></li>
    </ul>

    <div id="fragment-1" class="ui-tabs-panel">
        <img src="../../style/img/slider/1.png" width="400" height="200"/>   
        	<form method="POST" action="" enctype="multipart/form-data">
            	<input type="file" name="img_s1" accept="image/x-png" required="required">
                <input type="submit" value="Mise a jour image?" id="s_file_submit" class="submit_button"/>
            </form>
		<?php
if ( isset($_FILES['img_s1']))
{
	$dossier = '../../style/img/slider/';
	$extension = '.png'; 
	$fichier = '1'.$extension;	 
	if(move_uploaded_file($_FILES['img_s1']['tmp_name'], $dossier . $fichier))
		{echo '<script language="javascript">alert("Upload effectue avec succes ! le changement sera visible dans quelques instant")</script>';}
	else
		{echo '<script language="javascript">alert("Echec de l\'upload !")</script>';}
}
?>
            <form method="POST" action="">
            	<input type="submit" value="Mise a jour info?" id="s_text_submit" class="submit_button"/>
        <div class="info">
            	<h2><input type="text" name="tit_s1" value="<?php echo $titre_jqy_1 ; ?>" id="s_tit_input" required="required"  max="46"/></h2>
            	<p><input type="text" name="txt_s1" value="<?php echo $text_jqy_1 ; ?>" id="s_txt_input" required="required" max="166"/></form></p>
		<?php
if ( isset($_POST['tit_s1']) && isset($_POST['txt_s1']) )
{
	$tit_s1 = addslashes($_POST['tit_s1']);
	$txt_s1 = addslashes($_POST['txt_s1']);
	$connection = mysql_connect($serveur, $utilisateur, $mot_de_passe) or die(mysql_error());
mysql_select_db($base_de_donnees, $connection) or die(mysql_error());
	$result_update_slider_1 = mysql_query("UPDATE  `bonchoix`.`jquery` SET  `titre_jqy` =  '$tit_s1', `text_jqy` = '$txt_s1' WHERE  `jquery`.`id_jqy` =1;", $connection);
	if ($result_update_slider_1==1)
	{echo '<script language="javascript">alert("Le changement a ete effectuer avec succes")</script>';}
	else{echo '<script language="javascript">alert("Une erreur c\'est produite !")</script>';}
}
?>   
        </div>
    </div>
    
    <div id="fragment-2" class="ui-tabs-panel ui-tabs-hide">
        <img src="../../style/img/slider/2.png" width="400" height="200"/>   
        	<form method="POST" action="" enctype="multipart/form-data">
            	<input type="file" name="img_s2" accept="image/x-png" required="required">
                <input type="submit" value="Mise a jour image?" id="s_file_submit" class="submit_button"/>
            </form>
		<?php
if ( isset($_FILES['img_s2']))
{
	$dossier = '../../style/img/slider/';
	$extension = '.png'; 
	$fichier = '2'.$extension;	 
	if(move_uploaded_file($_FILES['img_s2']['tmp_name'], $dossier . $fichier))
		{echo '<script language="javascript">alert("Upload effectue avec succes ! le changement sera visible dans quelques instant")</script>';}
	else
		{echo '<script language="javascript">alert("Echec de l\'upload !")</script>';}
}
?>
            <form method="POST" action="">
            	<input type="submit" value="Mise a jour info?" id="s_text_submit" class="submit_button"/>
        <div class="info">
            	<h2><input type="text" name="tit_s2" value="<?php echo $titre_jqy_2 ; ?>" id="s_tit_input" required="required"/></h2>
            	<p><input type="text" name="txt_s2" value="<?php echo $text_jqy_2 ; ?>" id="s_txt_input" required="required"/></form></p>
		<?php
if ( isset($_POST['tit_s2']) && isset($_POST['txt_s2']) )
{
	$tit_s2 = addslashes($_POST['tit_s2']);
	$txt_s2 = addslashes($_POST['txt_s2']);
	$connection = mysql_connect($serveur, $utilisateur, $mot_de_passe) or die(mysql_error());
mysql_select_db($base_de_donnees, $connection) or die(mysql_error());
	$result_update_slider_2 = mysql_query("UPDATE  `bonchoix`.`jquery` SET  `titre_jqy` =  '$tit_s2', `text_jqy` = '$txt_s2' WHERE  `jquery`.`id_jqy` =2;", $connection);
	if ($result_update_slider_2==1)
	{echo '<script language="javascript">alert("Le changement a ete effectuer avec succes")</script>';}
	else{echo '<script language="javascript">alert("Une erreur c\'est produite !")</script>';}
}
?>   
        </div>
    </div>
    
    <div id="fragment-3" class="ui-tabs-panel ui-tabs-hide">
        <img src="../../style/img/slider/3.png" width="400" height="200"/>   
        	<form method="POST" action="" enctype="multipart/form-data">
            	<input type="file" name="img_s3" accept="image/x-png" required="required">
                <input type="submit" value="Mise a jour image?" id="s_file_submit" class="submit_button"/>
            </form>
		<?php
if ( isset($_FILES['img_s3']))
{
	$dossier = '../../style/img/slider/';
	$extension = '.png'; 
	$fichier = '3'.$extension;	 
	if(move_uploaded_file($_FILES['img_s3']['tmp_name'], $dossier . $fichier))
		{echo '<script language="javascript">alert("Upload effectue avec succes ! le changement sera visible dans quelques instant")</script>';}
	else
		{echo '<script language="javascript">alert("Echec de l\'upload !")</script>';}
}
?>
            <form method="POST" action="">
            	<input type="submit" value="Mise a jour info?" id="s_text_submit" class="submit_button"/>
        <div class="info">
            	<h2><input type="text" name="tit_s3" value="<?php echo $titre_jqy_3 ; ?>" id="s_tit_input" required="required"/></h2>
            	<p><input type="text" name="txt_s3" value="<?php echo $text_jqy_3 ; ?>" id="s_txt_input" required="required"/></form></p>
		<?php
if ( isset($_POST['tit_s3']) && isset($_POST['txt_s3']) )
{
	$tit_s3 = addslashes($_POST['tit_s3']);
	$txt_s3 = addslashes($_POST['txt_s3']);
	$connection = mysql_connect($serveur, $utilisateur, $mot_de_passe) or die(mysql_error());
mysql_select_db($base_de_donnees, $connection) or die(mysql_error());
	$result_update_slider_3 = mysql_query("UPDATE  `bonchoix`.`jquery` SET  `titre_jqy` =  '$tit_s3', `text_jqy` = '$txt_s3' WHERE  `jquery`.`id_jqy` =3;", $connection);
	if ($result_update_slider_3==1)
	{echo '<script language="javascript">alert("Le changement a ete effectuer avec succes")</script>';}
	else{echo '<script language="javascript">alert("Une erreur c\'est produite !")</script>';}
}
?>   
        </div>
    </div>
    
	<div id="fragment-4" class="ui-tabs-panel ui-tabs-hide">
        <img src="../../style/img/slider/4.png" width="400" height="200"/>   
        	<form method="POST" action="" enctype="multipart/form-data">
            	<input type="file" name="img_s4" accept="image/x-png" required="required">
                <input type="submit" value="Mise a jour image?" id="s_file_submit" class="submit_button"/>
            </form>
		<?php
if ( isset($_FILES['img_s4']))
{
	$dossier = '../../style/img/slider/';
	$extension = '.png'; 
	$fichier = '4'.$extension;	 
	if(move_uploaded_file($_FILES['img_s4']['tmp_name'], $dossier . $fichier))
		{echo '<script language="javascript">alert("Upload effectue avec succes ! le changement sera visible dans quelques instant")</script>';}
	else
		{echo '<script language="javascript">alert("Echec de l\'upload !")</script>';}
}
?>
            <form method="POST" action="">
            	<input type="submit" value="Mise a jour info?" id="s_text_submit" class="submit_button"/>
        <div class="info">
            	<h2><input type="text" name="tit_s4" value="<?php echo $titre_jqy_4 ; ?>" id="s_tit_input" required="required"/></h2>
            	<p><input type="text" name="txt_s4" value="<?php echo $text_jqy_4 ; ?>" id="s_txt_input" required="required"/></form></p>
		<?php
if ( isset($_POST['tit_s4']) && isset($_POST['txt_s4']) )
{
	$tit_s4 = addslashes($_POST['tit_s4']);
	$txt_s4 = addslashes($_POST['txt_s4']);
	$connection = mysql_connect($serveur, $utilisateur, $mot_de_passe) or die(mysql_error());
mysql_select_db($base_de_donnees, $connection) or die(mysql_error());
	$result_update_slider_4 = mysql_query("UPDATE  `bonchoix`.`jquery` SET  `titre_jqy` =  '$tit_s4', `text_jqy` = '$txt_s4' WHERE  `jquery`.`id_jqy` =4;", $connection);
	if ($result_update_slider_4==1)
	{echo '<script language="javascript">alert("Le changement a ete effectuer avec succes")</script>';}
	else{echo '<script language="javascript">alert("Une erreur c\'est produite !")</script>';}
}
?>   
        </div>
    </div>
      
<div id="fragment-5" class="ui-tabs-panel">
        <img src="../../style/img/slider/5.png" width="400" height="200"/>   
        	<form method="POST" action="" enctype="multipart/form-data">
            	<input type="file" name="img_s5" accept="image/x-png" required="required">
                <input type="submit" value="Mise a jour image?" id="s_file_submit" class="submit_button"/>
            </form>
		<?php
if ( isset($_FILES['img_s5']))
{
	$dossier = '../../style/img/slider/';
	$extension = '.png'; 
	$fichier = '5'.$extension;	 
	if(move_uploaded_file($_FILES['img_s5']['tmp_name'], $dossier . $fichier))
		{echo '<script language="javascript">alert("Upload effectue avec succes ! le changement sera visible dans quelques instant")</script>';}
	else
		{echo '<script language="javascript">alert("Echec de l\'upload !")</script>';}
}
?>
            <form method="POST" action="">
            	<input type="submit" value="Mise a jour info?" id="s_text_submit" class="submit_button"/>
        <div class="info">
            	<h2><input type="text" name="tit_s5" value="<?php echo $titre_jqy_5 ; ?>" id="s_tit_input" required="required"/></h2>
            	<p><input type="text" name="txt_s5" value="<?php echo $text_jqy_5 ; ?>" id="s_txt_input" required="required"/></form></p>
		<?php
if ( isset($_POST['tit_s5']) && isset($_POST['txt_s5']) )
{
	$tit_s5 = addslashes($_POST['tit_s5']);
	$txt_s5 = addslashes($_POST['txt_s5']);
	$connection = mysql_connect($serveur, $utilisateur, $mot_de_passe) or die(mysql_error());
mysql_select_db($base_de_donnees, $connection) or die(mysql_error());
	$result_update_slider_5 = mysql_query("UPDATE  `bonchoix`.`jquery` SET  `titre_jqy` =  '$tit_s5', `text_jqy` = '$txt_s5' WHERE  `jquery`.`id_jqy` =5;", $connection);
	if ($result_update_slider_5==1)
	{echo '<script language="javascript">alert("Le changement a ete effectuer avec succes")</script>';}
	else{echo '<script language="javascript">alert("Une erreur c\'est produite !")</script>';}
}
?>   
        </div>
    </div>        
</div>
</center>
            </div>
        </div>
    </div>
    <div id="footer">
        <?php include('../../function/footer.php');?>
    </div>
</body>
</html>
