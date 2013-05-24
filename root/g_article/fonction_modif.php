<?php
//fonction modification info

include('../../include/function.php');

if ( (isset($_POST['m_ca'])) && (isset($_POST['m_prx'])) && (isset($_POST['m_dc'])) && (isset($_POST['m_dl'])) )
{
	$CA_M2		= $_POST['m_ca'];
	$PRX_M2 	= $_POST['m_prx'];
	$DC_M2		= addslashes($_POST['m_dc']);
	$DL_M2		= addslashes($_POST['m_dl']);
	$q2 = mysql_query("UPDATE article SET design_courte_art='$DC_M2', design_long_art='$DL_M2', prix_art='$PRX_M2' WHERE code_art='$CA_M2' ;", $connection);
	if ($q2)
	{
		echo'
		<script language="javascript">
			location ="modification.php?code_article='.$CA_M2.'";
		</script>';
	}
	else
	{
		echo'
		<script language="javascript">
			alert("Error! : '.mysql_error($connection).'");
			location ="modification.php?code_article='.$CA_M2.'";
		</script>';
	}
}
?>