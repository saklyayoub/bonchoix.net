<?php
//Compter les commades non traiter
function comp_cmd_non_traiter()
{
	global $connection;
	$etat = '0';
	$sql=mysql_query("SELECT * FROM `commande` WHERE `etats` ='non traiter' ", $connection);
	if($sql){$etat = mysql_num_rows($sql);}
	return $etat;
}

//Compter les factures
function comp_facture()
{
	global $connection;
	$etat = '0';
	$sql=mysql_query("SELECT * FROM `commande` WHERE `etats` ='facturer' ", $connection);
	if($sql){$etat = mysql_num_rows($sql);}
	return $etat;
}

//Compter les commades annuler
function comp_cmd_fermer()
{
	global $connection;
	$etat = '0';
	$sql=mysql_query("SELECT * FROM `commande` WHERE `etats` ='annuler' ", $connection);
	if($sql){$etat = mysql_num_rows($sql);}
	return $etat;
}

//Compter les en instances
function comp_cmd_instance()
{
	global $connection;
	$etat = '0';
	$sql=mysql_query("SELECT * FROM `commande` WHERE `etats` ='en instance' ", $connection);
	if($sql){$etat = mysql_num_rows($sql);}
	return $etat;
}  

//calcule du somme des commande
function total_cmd()
{
	global $connection;
	$total = '0.000';
	$sql=mysql_query("SELECT SUM(montant_cmd) FROM commande WHERE NOT(`etats` ='facturer')", $connection);
	$t = mysql_fetch_array($sql);
	$t0 = $t[0];
	if ($t0>0){$total = $t0;}else{$total = '0.000';}
	return $total;
}

//calcule du somme des facture
function total_facture()
{
	global $connection;
	$sql=mysql_query("SELECT SUM(montant_cmd) FROM commande WHERE `etats` ='facturer'", $connection);
	$t = mysql_fetch_array($sql);
	$t0 = $t[0];
	if ($t0>0){$total = $t0;}else{$total = '0.000';}
	return $total;
} 

//Compter le nobre des article
function comp_nbr_article()
{
	global $connection;
	$n = '0';
	$sql=mysql_query("SELECT * FROM article ;", $connection);
	if ($sql){$n = mysql_num_rows($sql);}
	return $n;
}

//Compter le nobre des clients
function comp_nbr_client()
{
	global $connection;
	$n = '0';
	$sql=mysql_query("SELECT * FROM client ;", $connection);
	if ($sql){$n = mysql_num_rows($sql);}
	return $n;
}

//Compter le nobre des clients
function comp_nbr_newsletter()
{
	global $connection;
	$n = '0';
	$sql=mysql_query("SELECT * FROM newsletter ;", $connection);
	if ($sql){$n = mysql_num_rows($sql);}
	return $n;
}

//compter les messages reçue
function comp_nbr_contacternous()
{
	global $connection;
	$n = '0';
	$sql=mysql_query("SELECT * FROM contacteznous ;", $connection);
	if ($sql){$n = mysql_num_rows($sql);}
	return $n;
}

//compter les messages non_lu
function comp_nbr_contacternous_non_lu()
{
	global $connection;
	$n = '0';
	$sql=mysql_query("SELECT * FROM contacteznous WHERE lu_cn=0;", $connection);
	if ($sql){$n = mysql_num_rows($sql);}
	return $n;
}

//compter les messages repondu
function comp_nbr_contacternous_repondu()
{
	global $connection;
	$n = '0';
	$sql=mysql_query("SELECT * FROM contacteznous WHERE repondu_cn=1;", $connection);
	if ($sql){$n = mysql_num_rows($sql);}
	return $n;
}

//compter  les commande annuler pour un clien a partir de $id_clt
function nbr_cmd_annuler($id_clt)
{
	global $connection;
	$etat = '0';
	$sql=mysql_query("SELECT * FROM `commande` WHERE `email_clt` ='$id_clt' AND `etats` ='annuler' ", $connection);
	if($sql){$etat = mysql_num_rows($sql);}
	return $etat;
}

//compter  la somme des commande annuler pour un clien a partir de $id_clt
function somme_cmd_annuler($id_clt)
{
	global $connection;
	$sql=mysql_query("SELECT SUM(montant_cmd) FROM commande WHERE `email_clt` ='$id_clt' AND `etats` ='annuler' ", $connection);
	$s = mysql_fetch_array($sql);
	$s0 = $s[0];
	if ($s0>0){$somme = $s0;}else{$somme = '0.000';}
	return $somme;
}

//compter  le nombre des facture pour un clien a partir de $id_clt
function nbr_facturer($id_clt)
{
	global $connection;
	$etat = '0';
	$sql=mysql_query("SELECT * FROM `commande` WHERE `email_clt` ='$id_clt' AND `etats` ='facturer' ", $connection);
	if($sql){$etat = mysql_num_rows($sql);}
	return $etat;
}

//compter  la somme des facture pour un clien a partir de $id_clt
function somme_cmd_facturer($id_clt)
{
	global $connection;
	$sql=mysql_query("SELECT SUM(montant_cmd) FROM commande WHERE `email_clt` ='$id_clt' AND `etats` ='facturer' ", $connection);
	$s = mysql_fetch_array($sql);
	$s0 = $s[0];
	if ($s0>0){$somme = $s0;}else{$somme = '0.000';}
	return $somme;
}

//compter  le nombre des commande en cours pour un clien a partir de $id_clt
function nbr_cmd_encours($id_clt)
{
	global $connection;
	$etat = '0';
	$sql=mysql_query("SELECT * FROM `commande` WHERE `email_clt` ='$id_clt' AND (`etats` ='en instance' OR `etats` ='non traiter' OR `etats` ='confirmer') ", $connection);
	if($sql){$etat = mysql_num_rows($sql);}
	return $etat;
}

//compter  la somme des commande en cours pour un clien a partir de $id_clt
function somme_cmd_encours($id_clt)
{
	global $connection;
	$sql=mysql_query("SELECT SUM(montant_cmd) FROM commande WHERE `email_clt` ='$id_clt' AND (`etats` ='en instance' OR `etats` ='non traiter' OR `etats` ='confirmer') ", $connection);
	$s = mysql_fetch_array($sql);
	$s0 = $s[0];
	if ($s0>0){$somme = $s0;}else{$somme = '0.000';}
	return $somme;
}



























?>