<?php include('../../include/function.php');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $nom_du_site ; ?></title>
<link href="../../style/style.css" rel="stylesheet" type="text/css" />
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
                <h4>>>Gestion de sous familles d'articles</h4>
<script type="text/javascript" src="../../function/lib/jquery.js"></script>
<script type="text/javascript" src="../../function/lib/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf-8">
	$(document).ready(function() {
	$('#ad_table').dataTable();
	} );
</script>
<?php
$result_sous_famille_affiche = mysql_query("SELECT * FROM `sous_famill_article`,`famill_article` WHERE (famill_article.code_famill_art = sous_famill_article.code_famill_art);", $connection);
echo'
<table width="600px" id="ad_table" class="center">
	<thead>
		<tr>
			<th><a href="ajouter.php" target="new"><img src="../../style/img/b_add.png" title="Supprimer"/></a></th>
			<th>Famille</th>
			<th>Code</th>
			<th>Nom</th>
		</tr>
	</thead>
';
while ($affected_rows_sous_famille_affiche = mysql_fetch_object($result_sous_famille_affiche) )
{ 
	echo'
		<tr>
			<td><a href="fonction_supprim.php?code_sous_famill_art='.$affected_rows_sous_famille_affiche->code_sous_famill_art.'"><img src="../../style/img/b_drop.png" title="Supprimer"/></a></td>
			<td>'.$affected_rows_sous_famille_affiche->nom_famill_art.'</td>
			<td>'.$affected_rows_sous_famille_affiche->code_sous_famill_art.'</td>
			<td>'.$affected_rows_sous_famille_affiche->nom_sous_famill_art.'</td>
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