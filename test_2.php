<?php
include('include/function.php');

$sql_1=mysql_query("SELECT * FROM famill_article", $connection);
$sql_2=mysql_query("SELECT * FROM famill_article", $connection);
if($sql_1)
{	
	$j = mysql_num_rows($sql_1);
	echo'var famille = new Array;<br>';
	for($i = 0; $i < $j; $i++)
	{
		$r = mysql_fetch_object($sql_1);
		echo'famille['.$i.'] = new Array("'.$r->code_famill_art.'", "'.$r->nom_famill_art.'");<br>';
	}

	$n = mysql_num_rows($sql_2);
	echo'var categorie=new Array;<br>';
	for($m = 0; $m < $n; $m++)
	{
		$s = mysql_fetch_object($sql_2);
		echo'categorie["'.$s->code_famill_art.'"] = new Array;<br>';
		$sql_3=mysql_query("SELECT * FROM sous_famill_article WHERE code_famill_art='$s->code_famill_art';",$connection);
		if($sql_3)
		{
			$p = mysql_num_rows($sql_3);
			for($q = 0; $q < $p; $q++)
			{
				$t = mysql_fetch_object($sql_3);
				echo'categorie["'.$s->code_famill_art.'"]['.$q.'] = new Array("'.$t->code_sous_famill_art.'", "'.$t->nom_sous_famill_art.'");<br>';
			}
		}
	}
}
?>