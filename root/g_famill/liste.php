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
                <h4>>>Gestion de familles d'articles</h4>
<?php
/* affich function */
$result_famille_affiche = mysql_query("SELECT * FROM famill_article;", $connection);
$nbr_ligne = mysql_num_rows($result_famille_affiche);
echo'
<table width="600px" id="ad_table" class="center">
<tr><td></td><td><b>Code</b></td><td><b>Nom</b></td></tr>
<form action="fonction_ajout.php" method="post">
<tr>
	<td><input border="0" src="../../style/img/b_add.png" type="image" Value=submit title="Ajouter"><input type="hidden"value="'.$nbr_ligne.'" name="nbr_ligne"></td>
	<td><input type="text" name="code_famill_art" required="required" class="global_input" placeholder="Nouveau code ?" style="border:none"/></td>
	<td><input type="text" name="nom_famill_art" required="required" class="global_input" placeholder="Nouvelle famille ?" style="border:none"/></td>
</tr>
</form>
';
while ($affected_rows_famille_affiche = mysql_fetch_object($result_famille_affiche) )
{ 
	echo'
		<tr>
			<td>
				<form action="" method="post">
				<a href="fonction_supp.php?code_famill_art='.$affected_rows_famille_affiche->code_famill_art.'"><img src="../../style/img/b_drop.png" title="Supprimer"/></a>
			</td>
			<td>'.$affected_rows_famille_affiche->code_famill_art.'</td>
			<td>'.$affected_rows_famille_affiche->nom_famill_art.'</td>
				</form>
		</tr>
		';
}
;
echo'</table>';
?>
            </div>
        </div>
    </div>
    <div id="footer">
        <?php include('../../function/footer.php');?>
    </div>
</body>
</html>
