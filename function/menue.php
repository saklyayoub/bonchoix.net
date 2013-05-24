<div id="menu">
	<?php
		//Connection à mysql et sélection de la base de données
		$connection = mysql_connect($serveur, $utilisateur, $mot_de_passe) or die(mysql_error());
		mysql_select_db($base_de_donnees, $connection) or die(mysql_error());
		
		$query_affich_famill = mysql_query("select * from famill_article",$connection);
		while ($r = mysql_fetch_object($query_affich_famill)){
			$s = $r->code_famill_art;
			$s1 = $r->nom_famill_art;
			$result_affiche_famill = mysql_query("select * from sous_famill_article where code_famill_art='$s'",$connection);
			echo "<div class=\"menu\"><a href=\"#\">$s1</a><div class=\"sousmenu\" style=\"display:none\">";
				while ($r1 = mysql_fetch_row($result_affiche_famill)){
					$v0 = $r1[0];
					$v = $r1[1];
					echo "<div><a href=\"article.php?nom_famill_art=$s1&nom_sous_famill_art=$v&code_sous_famill_art=$v0\">$v</a></div>";
				}
			echo "</div></div>";
		
		}
		mysql_close();
    ?>
</div>
<script type="text/javascript">
	var a = document.getElementsByClassName("menu");
	for(var i = 0; i < a.length; i++){
		a[i].onmouseover = function(){
			var n = this.getElementsByClassName("sousmenu")[0];
			n.style.display = "block";	
			
		}
		a[i].onmouseout = function(){
			var n = this.getElementsByClassName("sousmenu")[0];
			n.style.display = "none";	
		}		
	}
</script>
