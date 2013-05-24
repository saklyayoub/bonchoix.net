<html>
<head>
<script type="text/javascript" language="javascript">
<?php
include('include/function.php');
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
</head>
<body>
<form name="formu">
Choisir un famille
<select name="listefamille" onChange='filltheselect(this.name, this.value)'>
   <script language="javascript">
   for (i=0; i<famille.length; i++)
      document.write("<option value=\"" +famille[i][0]+ "\">" +famille[i][1]);
   </script>
</select><br>
Choisir une categorie
<select name="listecategorie" onChange='filltheselect(this.name, this.value)'>
   <script language="javascript">
   for (i=0; i<categorie["A"].length; i++)
      document.write("<option value=\"" +categorie["A"][i][0]+ "\">" +categorie["A"][i][1]);
   </script>
</select><br>


</form>
</body>
</html>
