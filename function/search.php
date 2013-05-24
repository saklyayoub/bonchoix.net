<?php
/*if ($m_recherche == '1')
{
	echo'<div id="side_search" class="g_box">';
	echo'<h3>Recherche Personnalisée?</h3>';
	echo'</div>';
}*/
?>
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
<div id="side_search" class="g_box">
	<h3>Recherche Rapide?</h3>
	<form action="./recherche_resultat.php" method="post" name="formu">
        <select name="listefamille" onChange='filltheselect(this.name, this.value)' class="serach">
			<script language="javascript">
				for (i=0; i<famille.length; i++)
				document.write("<option value=\"" +famille[i][0]+ "\">" +famille[i][1]);
			</script>
		</select>
        <select name="listecategorie" onChange='filltheselect(this.name, this.value)' class="serach">
			<script language="javascript">
                for (i=0; i<categorie["A"].length; i++)
                document.write("<option value=\"" +categorie["A"][i][0]+ "\">" +categorie["A"][i][1]);
            </script>
        </select>
        <center>
        <table width="220px">
            <tr>
                <td width="64">Prix Max</td>
                <td width="144">
               		<select name="prix" onChange="document.forms['formu'].submit()" class="serach_p">
                        <option value="100.000">100.000 TND</option>
                        <option value="250.000">250.000 TND</option>
                        <option value="500.000">500.000 TND</option>
                        <option value="1000.000">1000.000 TND</option>
                        <option value="2000.000">2000.000 TND</option>
                        <option value="3000.000">3000.000 TND</option>
                        <option value="4000.000">4000.000 TND</option>
                        <option value="5000.000">5000.000 TND</option>
                    </select>
                </td>
            </tr>
        </table>
        </center>
	</form>
</div>