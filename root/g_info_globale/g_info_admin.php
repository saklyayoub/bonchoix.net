<?php include('../../include/function.php');?>
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
            <br />

<h2>>>Gestion d'info Admin</h2>
<p> Voulez vous modifier le login et le mot de passe admin? </p>
<form action="" method="post">
<table width="600px">
<tr><td>Nouveau login : 			 	</td><td><input type="text" name="n_login" required="required" class="global_input" id="sample_input" autofocus="autofocus"/></td></tr>
<tr><td>Nouveau mot de passe : 		 	</td><td><input type="password" name="n_mdp" required="required" class="global_input" id="sample_input"/></td></tr>
<tr><td>Vérification mot de passe :		</td><td><input type="password" name="n_mdp_verif" required="required" class="global_input" id="sample_input"/></td></tr>
<tr><td colspan="2" style="text-align:center"><input type="submit" value="Mise a jour ?" class="submit_button"/></td></tr>
</table>
</form>
<?php
if ( (isset($_POST['n_login'])) && (isset($_POST['n_mdp'])) && (isset($_POST['n_mdp_verif'])) )
{
	$n_login		 = $_POST['n_login'];
	$n_mdp			 = $_POST['n_mdp'];
	$n_mdp_verif	 = $_POST['n_mdp_verif'];
	$n_mdp_encripted = sha1(md5($n_mdp));	
	if ( ($n_mdp_verif)<>($n_mdp) )
	{
		echo'<script language="javascript">
			 	alert("Les mots de passe ne sont pas conforme");
			 </script>';
	}
	else
	{
		$connection = mysql_connect($serveur, $utilisateur, $mot_de_passe) or die(mysql_error());
		mysql_select_db($base_de_donnees, $connection) or die(mysql_error());
		$query_admin_update_passworld = " UPDATE admin SET login_admin='$n_login', mdp_admin='$n_mdp_encripted' WHERE id_admin='1' "; 
		$result_admin_update_passworld = mysql_query($query_admin_update_passworld, $connection);
		if ($result_admin_update_passworld = 1)
		{
			echo'<script language="javascript">
			 	alert("Les nouvelle donneés on été bien modifier");
			 </script>';
		}
		else
		{
			echo'<script language="javascript">
			 	alert("Une ereur est survenue, l\'insertion n\'est pas effectuer");
			 </script>';
		}
	}
	mysql_close();
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
