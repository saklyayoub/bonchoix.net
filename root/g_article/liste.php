<?php include('../../include/function.php');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $nom_du_site ; ?></title>							<!-- récupération de nom de site de la base de donneés -->
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
<h4>>>>Liste d'article</h4>
<script type="text/javascript" src="../../function/lib/jquery.js"></script>
<script type="text/javascript" src="../../function/lib/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf-8">
	$(document).ready(function() {
	$('#ad_table').dataTable();
	} );
</script>
<?php 
$query_recup_art_brut = mysql_query(" SELECT * FROM article ",$connection);
$q2 = mysql_query( " SELECT * FROM article WHERE fav_art='1' ;",$connection);
$nbr_ligne_fav_1 = mysql_num_rows($q2);
$nbr_fav_max = '5';
$nbr_fav_res = $nbr_fav_max - $nbr_ligne_fav_1;
echo '<div style="color:#ca0003;">Vous avez <b>'.$nbr_ligne_fav_1.'/5</b> article(s) en favorit(s).';if ($nbr_fav_res > '0'){echo 'Vous devez ajouter <b>'.$nbr_fav_res.'</b> autre(s)!';}

echo'
</div>
<table width="700px" id="ad_table" class="center">
	<thead>
		<tr>
			<th width="50px"><a href="cree.php" target="new"><img src="../../style/img/b_add.png" alt="Ajouter un article?"/></a></th>
			<th>Code</th>
			<th>Image</th>
			<th>Designation Courte</th>
			<th>Designation Longue</th>
			<th>Prix</th>
			<th>F</th>
		</tr>
	</thead>
';
while ($rab = mysql_fetch_object($query_recup_art_brut))
{
	$CFA	= $rab->code_famill_art;
	$CSFA	= $rab->code_sous_famill_art;
	$CA		= $rab->code_art;
	$DC		= $rab->design_courte_art;
	$DL		= $rab->design_long_art;
	$PR		= $rab->prix_art;
	$FV		= $rab->fav_art;
	echo'<tr>
			<td>
				<a href="fonction_supp.php?ca='.$CA.'"><img src="../../style/img/b_drop.png" alt="Supprimer l\'article?"/></a>
				<a href="modification.php?code_article='.$CA.'"><img src="../../style/img/b_edit.png" alt="Modifier l\'article?"/></a>
			</td>
			<td>'.$CA.'</td>
			<td><center><div id="liste_art"><img src="../../img_article/'.$CA.'.png"/></center></div></td>
			<td>'.$DC.'</td>
			<td>'.$DL.'</td>
			<td>'.$PR.'</td>
			<td>'.$FV.'</td>
		</tr>';
}
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
