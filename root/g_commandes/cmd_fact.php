<?php
include('../../include/function.php');
include('../../include/function_cmd_fact.php');
/*permis_cmd_fact();*/
$id_cmd = $_GET['id_cmd'];
$cmd = info_cmd($id_cmd);
$etats = $cmd->etats;
$etats0 = 'FACTURE';
if ($etats!='facturer'){($etats0 = 'COMMANDE');}
$clt = recup_info_client($cmd->email_clt);
$site = info_site();
echo'
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>'.$etats0.' N°'.$id_cmd.'</title>
</head>
<style>
body {margin:0;}
#container{margin:0 auto; width:800px;}
#titre{ height:30px; margin:20px auto; background:#000; color:#FFF; text-align:center; padding-top:8px; font: bold 15px Helvetica, Sans-Seri; letter-spacing:20px;}
#ste{height:100px;margin-top:25px;}
#adresse{ width:250px; font: 14px Georgia, Serif;float: left;}
#logo{max-width:250px;max-height:100px; float:right;}
#client{height:100px; margin-top:50px;}
#detail_client{float:left; width:400px; height:100px;font: 14px Georgia, Serif; font-size:20px;font-weight: bold;}
#detail_facture { margin-top: 1px; width: 300px; float: right; }
#detail_facture td { text-align: right;  }
#detail_facture td.meta-head { text-align: left; background: #eee; }
#meta td textarea { width: 100%; height: 20px; text-align: right; }
table { border-collapse: collapse; border-spacing: 2px; border-color: gray; font: 14px Georgia, Serif;}
table td, table th { border: 1px solid black; padding: 5px; }
#items { clear: both; width: 100%; margin: 30px 0 0 0; border: 1px solid black; }
#items th { background: #eee; }
#items textarea { width: 80px; height: 50px; }
#items tr.item-row td { border: 0; vertical-align: top; }
#items td.description { width: 300px; }
#items td.item-name { width: 175px; }
#items td.description textarea, #items td.item-name textarea { width: 100%; }
#items td.total-line { border-right: 0; text-align: right; }
#items td.total-value { border-left: 0; padding: 10px; }
#items td.total-value textarea { height: 20px; background: none; }
#items td.balance { background: #eee; }
#items td.blank { border: 0; }
textarea:hover, textarea:focus, #items td.total-value textarea:hover, #items td.total-value textarea:focus, .delete:hover { background-color:#EEFF88; }
.submit{ width:150px; height:20px;}
ul {padding:0;margin:0;list-style-type:none;}
li {float:left;margin-left:38px;}
ul li a {display:block;width:100px;background-color:#6495ED;color:black;text-decoration:none;text-align:center;padding:5px;border:2px solid;}
</style>
<body>
    <div id="container">
        <div id="titre">'.$etats0.'</div>
        <div id="ste">
            <div id="adresse">
                '.$site->nom_du_site.'<br />
                '.$site->adresse.'<br />
                '.$site->tel.'<br />
                '.$adress_du_site.'<br />
            </div>
            <div id="logo"><img src="../../style/img/logo.png" /></div>
        </div>
        <div id="client">
        	<div id="detail_client">'.$clt->nom_clt.' '.$clt->prenom_clt.'<br />
				<a href=mailto:'.$cmd->email_clt.'?subject='.$etats0.$id_cmd.'>'.$cmd->email_clt.'</a>
			<br />'.$cmd->tel_contact_cmd.'</div>
            <table id="detail_facture">
                <tr>
                    <td class="meta-head">Reference #</td>
                    <td>'.$id_cmd.'</td>
                </tr>
                <tr>

                    <td class="meta-head">Date</td>
                    <td>'.$cmd->date_cmd.'</td>
                </tr>
                <tr>
                    <td class="meta-head">Total</td>
                    <td>'.$cmd->montant_cmd.' TND</td>
                </tr>
            </table>
        </div>
        <table id="items">
		  <tr>
		      <th width="20%">Code</th>
		      <th>Désignation</th>
		      <th width="20%">Prix</th>
		  </tr>';

//récupération de la liste d'article a partir de $id_cmd
$sql = mysql_query("SELECT * FROM commande_article, article WHERE (commande_article.code_art = article.code_art) AND `id_cmd` ='$id_cmd'", $connection);
while ($r = mysql_fetch_object($sql))
	{
		echo '
			<tr class="item-row">
				<td class="item-name">'.$r->code_art.'</td>
				<td class="description">'.$r->design_courte_art.'</td>
				<td><span class="price">'.$r->prix_art.'</span></td>
			</tr>
		';
	}	
		   
echo'		  
		  <tr id="hiderow">
		  	<td colspan="3" height="25px;"></td>
		  </tr>
          <tr>
		      <td colspan="2" style="text-align:right">Total </td>
		      <td>'.$cmd->montant_cmd.' TND</td>
		  </tr>
		  <tr id="hiderow">
		  	<td colspan="3" height="25px;">
				<ul>
					<li><form action="" method="post"><input type="hidden" name="c" /><input type="submit" class="submit" value="CONFIRMER"/></form></li>
					<li><form action="" method="post"><input type="hidden" name="i" /><input type="submit" class="submit" value="INSTANCE"/></form></li>
					<li><form action="" method="post"><input type="hidden" name="f" /><input type="submit" class="submit" value="FACTURER"/></form></li>
					<li><form action="" method="post"><input type="hidden" name="a" /><input type="submit" class="submit" value="ANNULER"/></form></li>
				</ul>
			</td>
		  </tr>		  
        </table>
    </div>
	';
if(isset($_POST['c']))
{
	$query = mysql_query("UPDATE `commande` SET `etats` ='confirmer' WHERE `id_cmd`='$id_cmd';", $connection);
	if ($query){echo'<script language="javascript">alert("Piece :'.$id_cmd.' a ete confirmer !");location ="liste.php";</script>';}
}
if(isset($_POST['i']))
{
	$query = mysql_query("UPDATE `commande` SET `etats` ='en instance' WHERE `id_cmd`='$id_cmd';", $connection);
	if ($query){echo'<script language="javascript">alert("Piece :'.$id_cmd.' a ete mise en instance !");location ="liste.php";</script>';}
}
if(isset($_POST['f']))
{
	$query = mysql_query("UPDATE `commande` SET `etats` ='facturer' WHERE `id_cmd`='$id_cmd';", $connection);
	if ($query){echo'<script language="javascript">alert("Piece :'.$id_cmd.' a ete facturer !");location ="liste.php";</script>';}
}
if(isset($_POST['a']))
{
	$query = mysql_query("UPDATE `commande` SET `etats` ='annuler' WHERE `id_cmd`='$id_cmd';", $connection);
	if ($query){echo'<script language="javascript">alert("Piece :'.$id_cmd.' a ete annuler !");location ="liste.php";</script>';}
}
?>
</body>
</html>
