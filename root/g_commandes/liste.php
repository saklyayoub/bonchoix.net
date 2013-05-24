<?php 
include('../../include/function.php');
include('../../include/function_statistiques.php')
?>
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
<h4>>>>Liste des commande(s)</h4>
<script type="text/javascript" src="../../function/lib/jquery.js"></script>
<script type="text/javascript" src="../../function/lib/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf-8">
	$(document).ready(function() {
	$('#ad_table').dataTable();
	} );
</script>
<?php
$sql = mysql_query(" SELECT * FROM commande ",$connection);
echo'
<table width="700px" id="ad_table" class="center">
	<thead>
		<tr>
			<th width="15%">Ref</th>
			<th width="60%">Client</th>
			<th width="10%">Montant</th>
			<th width="15%">Etats</th>
		</tr>
	</thead>';

while ($r = mysql_fetch_object($sql))
{
	$id_cmd			= $r->id_cmd;
	$email_clt		= $r->email_clt;
	$montant_cmd	= $r->montant_cmd;
	$etats			= $r->etats;
	$clt			= recup_info_client($email_clt);
	echo'<tr>
			<td><a href="../../cmd_fact.php?id_cmd='.$id_cmd.'" target="new">'.$id_cmd.'</a></td>
			<td>
				<j>'.$email_clt.'
					<span>
						<table width="310" style="text-align:right">
						  <tr>
						  	<td colspan="4"><center><b>Info Client</b></center></td>
						  </tr>
						  <tr>
							<td width="90">Nom : </td>
							<td colspan="3" style="text-align:center"><b>'.$clt->nom_clt.'</b></td>
						  </tr>
						  <tr>
							<td>Prenom :</td>
							<td colspan="3" style="text-align:center"><b>'.$clt->prenom_clt.'</b></td>
						  </tr>
						  <tr>
							<td>Annulation :</td>
							<td width="37"><b>'.nbr_cmd_annuler($email_clt).'</b></td>
							<td width="59">Somme : </td>
							<td width="96"><b>'.somme_cmd_annuler($email_clt).'</b></td>
						  </tr>
						  <tr>
							<td>En cours :</td>
							<td><b>'.nbr_cmd_encours($email_clt).'</b></td>
							<td>Somme :</td>
							<td><b>'.somme_cmd_encours($email_clt).'</b></td>
						  </tr>
						  <tr>
							<td>Facture :</td>
							<td><b>'.nbr_facturer($email_clt).'</b></td>
							<td>Somme :</td>
							<td><b>'.somme_cmd_facturer($email_clt).'</b></td>
						  </tr>
						</table>
					</span>
				</j>
			</td>
			<td>'.$montant_cmd.'</td>
			<td><a href="cmd_fact.php?id_cmd='.$id_cmd.'" target="new"><img src="../../style/img/b_edit.png"></a>'.$etats.'</td>
		</tr>';
}
echo'	
</table>
';
?>
            </div>
        </div>
    </div>
    <div id="footer">
        <?php include('../../function/footer.php');?>
    </div>
</body>
</html>
