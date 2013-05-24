<?php include('../../include/function.php');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtr">
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
                <h4>>>Creation de sous famille d'article</h4>
				<br /><br /><br /><br /><br />
<?php
$result_famille_affiche = mysql_query("SELECT * FROM famill_article;", $connection);
echo'
<form action="fonction_ajout.php" method="post">
<table width="400" class="center">
  <tr>
    <th scope="row">Famille d\'article : </th>
    <td>	
		<select name="code_famill_art" required="required">';
			while ($affected_rows_famille_affiche2 = mysql_fetch_object($result_famille_affiche) )
			{ 
			echo'<option value="'.$affected_rows_famille_affiche2->code_famill_art.'">'.$affected_rows_famille_affiche2->nom_famill_art.'</option>';
			}	
echo'
		</select>	
	</td>
  </tr>
  <tr>
    <th scope="row">Code sous famille article : </th>
    <td><input type="text" name="code_sous_famill_art" required="required"/></td>
  </tr>
  <tr>
    <th scope="row">Nom sous famille article :</th>
    <td><input type="text" name="nom_sous_famill_art" required="required" /></td>
  </tr>
</table>
<br><center><input type="reset" value="Annuler" class="submit_button"/><input type="submit" value="Ajouter" class="submit_button"/></center>
</form>
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
