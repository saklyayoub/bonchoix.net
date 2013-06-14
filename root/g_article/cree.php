<?php include('../../include/function.php');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtr">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $nom_du_site ; ?></title
><link href="../../style/style.css" rel="stylesheet" type="text/css" />
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
                <h3>>>Creation d'articles</h3>
				<br />
                     
<html>
<head>
<script type="text/javascript" language="javascript">
<?php
$sql_1=mysql_query("SELECT * FROM famill_article", $connection);
$sql_2=mysql_query("SELECT * FROM famill_article", $connection);
if($sql_1)
{	
	$j = mysql_num_rows($sql_1);
	echo'var famille = new Array;';
	for($i = 0; $i < $j; $i++)
	{
		$r = mysql_fetch_object($sql_1);
		echo'famille['.$i.'] = new Array("'.$r->code_famill_art.'", "'.$r->nom_famill_art.'");';
	}

	$n = mysql_num_rows($sql_2);
	echo'var categorie=new Array;';
	for($m = 0; $m < $n; $m++)
	{
		$s = mysql_fetch_object($sql_2);
		echo'categorie["'.$s->code_famill_art.'"] = new Array;';
		$sql_3=mysql_query("SELECT * FROM sous_famill_article WHERE code_famill_art='$s->code_famill_art';",$connection);
		if($sql_3)
		{
			$p = mysql_num_rows($sql_3);
			for($q = 0; $q < $p; $q++)
			{
				$t = mysql_fetch_object($sql_3);
				echo'categorie["'.$s->code_famill_art.'"]['.$q.'] = new Array("'.$t->code_sous_famill_art.'", "'.$t->nom_sous_famill_art.'");';
			}
		}
	}
}
?>

function filltheselect(liste, choix){
	switch (liste){
		case "listefamille":
		raz("listecategorie");
		for (i=0; i<categorie[choix].length; i++){
			new_option = new Option(categorie[choix][i][1],categorie[choix][i][0]);
			document.formu.elements["listecategorie"].options[document.formu.elements["listecategorie"].length]=new_option;
         }
   }
}
function raz(liste){
	l=document.formu.elements[liste].length;
	for (i=l; i>=0; i--)
   	document.formu.elements[liste].options[i]=null;
}
</script>
<table width="500px">
<tr><td>Code famille d'article </td><td>
<form name="formu" action="" method="post" enctype="multipart/form-data">
<select name="listefamille" onChange='filltheselect(this.name, this.value)'>
   <script language="javascript">
   for (i=0; i<famille.length; i++)
      document.write("<option value=\"" +famille[i][0]+ "\">" +famille[i][1]);
   </script>
</select></td></tr>
<tr><td>Code sous famille d'article </td><td>
<select name="listecategorie" onChange='filltheselect(this.name, this.value)'>
   <script language="javascript">
   for (i=0; i<categorie["A"].length; i++)
      document.write("<option value=\"" +categorie["A"][i][0]+ "\">" +categorie["A"][i][1]);
   </script>
</select>
</td></tr>
<tr><td>Photo : </td><td><input type="file" name="img_art" required="required" accept="image/jpeg, image/x-png"/></td></tr>
<tr><td colspan="2"><input type="text" name="code_art" placeholder="Code Article" class="global_input" id="sample_input" required="required"/></td></tr>
<tr><td colspan="2"><input type="text" name="prix_art" placeholder="Prix TTC" class="global_input" id="sample_input" required="required"/></td></tr>
<tr><td colspan="2"><input type="text" name="design_courte_art" placeholder="Désignation Courte" class="global_input" id="sample_input" required="required" maxlength="31"/></td></tr><tr><td colspan="2"><textarea name="design_long_art" placeholder="Désignation longue" class="global_input" id="wide_input" required="required" ></textarea></td></tr>

<tr><td colspan="2"><center><input type="submit" value="Creer l'article ?" class="submit_button"/></center></td></tr>
</table>
</form>
<?php
if ( (isset($_POST['listefamille'])) && (isset($_POST['listecategorie'])) && (isset($_FILES['img_art'])) && (isset($_POST['code_art'])) && (isset($_POST['prix_art'])) && (isset($_POST['design_courte_art'])) && (isset($_POST['design_long_art'])) )
{
	//récupération des variables
	$fa 		=	$_POST['listefamille'];
	$sfa		=	$_POST['listecategorie'];
	$code_art	=	$_POST['code_art'];
	$prix_art	=	$_POST['prix_art'];
	$desg_crt	=	addslashes($_POST['design_courte_art']);
	$desg_log	=	addslashes($_POST['design_long_art']);
	$img_art	=	$_FILES['img_art'];
	
	$connection = mysql_connect($serveur, $utilisateur, $mot_de_passe) or die(mysql_error());
mysql_select_db($base_de_donnees, $connection) or die(mysql_error());
	$query_insertion_art = " INSERT INTO `bonchoix`.`article` (`code_art`, `design_courte_art`, `design_long_art`, `prix_art`, `code_sous_famill_art`, `code_famill_art`) VALUES ('$code_art', '$desg_crt', '$desg_log', '$prix_art', '$sfa', '$fa')";
	$result_insertion_art = mysql_query($query_insertion_art, $connection);
	if($result_insertion_art == 1)
	{
		//variable pour la fonction upload d'image
		$dossier = '../../img_article/';
		$slide1_change_z = getimagesize($_FILES['img_art']['tmp_name']);
		$extension = '.png'; 
		$fichier = $code_art.$extension;
		//code upload images
		if(move_uploaded_file($_FILES['img_art']['tmp_name'], $dossier . $fichier))
		{echo '<script language="javascript">alert("Article : '.$code_art.' a ete creer")</script>';}
		else{echo '<script language="javascript">alert("Echec de l\'upload d\'image d\'article !")</script>';}
	}
	else
	{echo'<script language="javascript">alert("CODE D\'ARTICLE : '.$code_art.' Existe deja")</script>';}
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