<?php
//global include
include('config.php');

//Date config
$date = date("Ymd-Hi");
$date_y = date("Y");
$date_h = date("Hi");
$date_full_h = date("Y/m/d-H:i");
$datecreation = date("YmdHi");

//Session Exists ?
if (!isset($_SESSION)) 
{
  session_start();
}

// On vérifie l'existence du panier, sinon, on le crée
if(!isset($_SESSION['panier'])) 
	{ 
		// Initialisation du panier
		$_SESSION['panier'] = array(); 
		// Subdivision du panier
		$_SESSION['panier']['id_article'] = array();  
		$_SESSION['panier']['libile'] = array();
		$_SESSION['panier']['qte'] = array();
		$_SESSION['panier']['taille'] = array();		 
		$_SESSION['panier']['prix'] = array(); 
	}
	
//Connection à mysql et sélection de la base de données
$connection = mysql_connect($serveur, $utilisateur, $mot_de_passe) or die(mysql_error());
mysql_select_db($base_de_donnees, $connection) or die(mysql_error());

//récupération des varibales d'info du base de donnes pour le site
$query_info = " SELECT * FROM info WHERE id='1' ";
$result_info = mysql_query($query_info, $connection);
$affected_rows_info = mysql_num_rows($result_info);
if($affected_rows_info == 1)
{
	$affected_rows_info2 = mysql_fetch_object($result_info);
	$nom_du_site 				=	$affected_rows_info2->nom_du_site;
	$description				=	$affected_rows_info2->description;
	$adresse					=	$affected_rows_info2->adresse;
	$tel						=	$affected_rows_info2->tel;
	$page_fb					=	$affected_rows_info2->page_facebook;
	$page_tw					=	$affected_rows_info2->page_tweeter;
	$page_yt					=	$affected_rows_info2->page_youtube;
	$text_recherche				=	$affected_rows_info2->text_recherche;
	$m_recherche				=	$affected_rows_info2->m_recherche;
	$m_newsletter				=	$affected_rows_info2->m_newsletter;
	$m_facebook					=	$affected_rows_info2->m_facebook;
	$m_tweeter					=	$affected_rows_info2->m_tweeter;
	$m_youtube					=	$affected_rows_info2->m_youtube;
	$x_gmaps					=	$affected_rows_info2->x_gmaps;
	$y_gmaps					=	$affected_rows_info2->y_gmaps;
}

//-> function récupération des varibales d'info du base de donnes pour le site
function info_site()
{
	global $connection;
	$sql = mysql_query("SELECT * FROM info WHERE id='1';", $connection);
	$r = mysql_fetch_object($sql);
	return $r;
}

//function recup info jquery
$query_slider_1 			= "SELECT * FROM jquery WHERE id_jqy='1' ";
$reslut_slider_1 			= mysql_query($query_slider_1, $connection);
$affected_rows_slider_1		= mysql_num_rows($reslut_slider_1);
if($affected_rows_slider_1 == 1 )
{
	$affected_rows_slider_1_2	= mysql_fetch_object($reslut_slider_1);
	$titre_jqy_1				=$affected_rows_slider_1_2->titre_jqy;
	$text_jqy_1					= $affected_rows_slider_1_2->text_jqy;
	
}

$query_slider_2 			= "SELECT * FROM jquery WHERE id_jqy='2' ";
$reslut_slider_2 			= mysql_query($query_slider_2, $connection);
$affected_rows_slider_2		= mysql_num_rows($reslut_slider_2);
if($affected_rows_slider_2 == 1 )
{
	$affected_rows_slider_2_2	= mysql_fetch_object($reslut_slider_2);
	$titre_jqy_2				=$affected_rows_slider_2_2->titre_jqy;
	$text_jqy_2					= $affected_rows_slider_2_2->text_jqy;
	
}

$query_slider_3 			= "SELECT * FROM jquery WHERE id_jqy='3' ";
$reslut_slider_3 			= mysql_query($query_slider_3, $connection);
$affected_rows_slider_3		= mysql_num_rows($reslut_slider_3);
if($affected_rows_slider_3 == 1 )
{
	$affected_rows_slider_3_2	= mysql_fetch_object($reslut_slider_3);
	$titre_jqy_3				=$affected_rows_slider_3_2->titre_jqy;
	$text_jqy_3					= $affected_rows_slider_3_2->text_jqy;
	
}

$query_slider_4 			= "SELECT * FROM jquery WHERE id_jqy='4' ";
$reslut_slider_4 			= mysql_query($query_slider_4, $connection);
$affected_rows_slider_4		= mysql_num_rows($reslut_slider_4);
if($affected_rows_slider_4 == 1 )
{
	$affected_rows_slider_4_2	= mysql_fetch_object($reslut_slider_4);
	$titre_jqy_4				=$affected_rows_slider_4_2->titre_jqy;
	$text_jqy_4					= $affected_rows_slider_4_2->text_jqy;
	
}

$query_slider_5 			= "SELECT * FROM jquery WHERE id_jqy='5' ";
$reslut_slider_5 			= mysql_query($query_slider_5, $connection);
$affected_rows_slider_5		= mysql_num_rows($reslut_slider_5);
if($affected_rows_slider_5 == 1 )
{
	$affected_rows_slider_5_2	= mysql_fetch_object($reslut_slider_5);
	$titre_jqy_5				=$affected_rows_slider_5_2->titre_jqy;
	$text_jqy_5					= $affected_rows_slider_5_2->text_jqy;
	
}

//Récupérer la liste d'article de la bdd a partir de code sous famille
function liste_art_par_famill($code_sous_famill)
{
	global $connection;
	$sql=mysql_query("SELECT * FROM article WHERE code_sous_famill_art='$code_sous_famill';", $connection);
	while ($a = mysql_fetch_object($sql))
	{
		$a1 = $a->code_art;
        $a2 = $a->design_courte_art;
        $a3 = $a->design_long_art;
		$a4	= $a->prix_art;
		
		echo'
		<div id="art_cadre">
			<div id="art"><a href="info_article.php?code_art='.$a1.'"><img src="img_article/'.$a1.'.png"/></a></div>
			<div id="art_desig">'.$a2.'</div>
			<div id="art_prix">'.$a3.' TND</div>
		</div>';
   	}
}

//Récupérer l'info article de bdd a partir de code_art
function info_article($code_art)
{
	global $connection;
	$sql=mysql_query("SELECT * FROM article WHERE code_art='$code_art';", $connection);
	$info_article = mysql_fetch_object($sql);
	return $info_article;
}

//test si le client est connecter et récupération de ces info
function verif_con_client()
{
	global $connection;
	$info_client = '';
	if (isset($_SESSION['client_id']))
	{
		$user = $_SESSION['client_id'];
		//on récupére les info client
		$sql=mysql_query("SELECT * FROM client WHERE email_clt='$user';", $connection);
		$info_client = mysql_fetch_object($sql);
		return $info_client;
	}
	else
	{
		echo'
			<script language="javascript">
				alert("Erreur! : Vous devez etre connecter");
				location="./panier.php"
			</script>';
	}
}

//test si le clien a des commande
function clt_cmd($id_clt)
{
	global $connection;
	$clt_cmd = false;
	$sql=mysql_query("SELECT * FROM commande WHERE email_clt='$id_clt';", $connection);
	if ($sql){$clt_cmd=mysql_fetch_object($sql);}
	return $clt_cmd;	
}

//recupération des info commande a partir de id_commande
function info_cmd($id_cmd)
{
	global $connection;
	$info_cmd = false;
	$sql=mysql_query("SELECT * FROM commande WHERE id_cmd='$id_cmd';", $connection);
	if ($sql){$info_cmd=mysql_fetch_object($sql);}
	return $info_cmd;	
}

//recupération des information client
function recup_info_client($id_client)
{
	global $connection;
	$info_client = false;
	//on récupére les info client
	$sql=mysql_query("SELECT * FROM client WHERE email_clt='$id_client';", $connection);
	$info_client = mysql_fetch_object($sql);
	return $info_client;
}

//message non permi et rederection vers page acceuil
function non_perimis()
{
	echo'
	<script language="javascript">
		alert("Erreur! : Page non permise !");
		location ="index.php";
	</script>
	';
}

//message non connecter et rederection vers page acceuil
function non_connecter()
{
	echo'
	<script language="javascript">
		alert("Erreur! : Vous devez etre connecter !");
		location ="index.php";
	</script>
	';
}

//etat du commande
function recup_etats_cmd($id_cmd)
{
	global $connection;
	$sql = mysql_query("SELECT * FROM commande WHERE id_cmd='$id_cmd';", $connection);
	$r = mysql_fetch_object($sql);
	$recup_etats_cmd = $r->etats;
	return $recup_etats_cmd;
}

//selecter les commande a partir de leurs etats
function cmd_etats($etats)
{
	global $connection;
	$sql = mysql_query("SELECT * FROM commande WHERE etats='$etats';", $connection);
	$r = mysql_fetch_object($sql);
	$recup_etats_cmd = $r->etats;
}

/* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */ 
/*                Fonctions de base de gestion du panier                   */ 
/* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */ 
/* Ajoute un article dans le panier après vérification que nous ne somme pas en phase de paiement 
* 
* @param array  $select variable tableau associatif contenant les valeurs de l'article 
* @return Mixed Retourne VRAI si l'ajout est effectué, FAUX sinon voire une autre valeur si l'ajout 
*               est renvoyé vers la modification de quantité. 
* @see {@link modif_qte()} 
*/ 
function ajout($select) 
{ 
    $ajout = false; 
    if(!isset($_SESSION['panier']['verrouille']) || $_SESSION['panier']['verrouille'] == false) 
    { 
        if(!verif_panier($select['id'])) 
        { 
            array_push($_SESSION['panier']['id_article'],$select['id']);
			array_push($_SESSION['panier']['libile'],$select['libile']);			 
            array_push($_SESSION['panier']['qte'],$select['qte']); 
            array_push($_SESSION['panier']['taille'],$select['taille']); 
            array_push($_SESSION['panier']['prix'],$select['prix']); 
            $ajout = true; 
        } 
        else 
        { 
            $ajout = modif_qte($select['id'],$select['qte']); 
        } 
    } 
    return $ajout; 
} 

/*Modifie la quantité d'un article dans le panier après vérification que nous ne somme pas en phase de paiement 
* 
* @param String $ref_article    Identifiant de l'article à modifier 
* @param Int $qte               Nouvelle quantité à enregistrer 
* @return Mixed                 Retourne VRAI si la modification a bien eu lieu, 
*                               FAUX sinon, 
*                               "absent" si l'article est absent du panier, 
*                               "qte_ok" si la quantité n'est pas modifiée car déjà correctement enregistrée. 
*/ 
function modif_qte($ref_article, $qte) 
{ 
    /* On initialise la variable de retour */ 
    $modifie = false; 
    if(!isset($_SESSION['panier']['verrouille']) || $_SESSION['panier']['verrouille'] == false) 
    { 
        if(nombre_article($ref_article) != false && $qte != nombre_article($ref_article)) 
        { 
            /* On compte le nombre d'articles différents dans le panier */ 
            $nb_articles = count($_SESSION['panier']['id_article']); 
            /* On parcoure le tableau de session pour modifier l'article précis. */ 
            for($i = 0; $i < $nb_articles; $i++) 
            { 
                if($ref_article == $_SESSION['panier']['id_article'][$i]) 
                { 
                    $_SESSION['panier']['qte'][$i] = $qte; 
                    $modifie = true; 
                } 
            } 
        } 
        else 
        { 
            /* L'article est absent du panier, donc on ne peut pas modifier la quantité ou bien 
            * le nombre est exactement le même et il est inutile de le modifier 
            * Si l'article est absent, comme on a ni la taille  ni le prix, on ne peut pas l'ajouter 
            * Si le nombre est le même, on ne fait pas de changement. On peut donc retourner un autre 
            * type de valeur pour indiquer une erreur qu'il faudra traiter à part lors du retour d'appel 
            */ 
            if(nombre_article($ref_article) != false) 
            { 
                $modifie = "absent"; 
            } 
            if($qte != nombre_article($ref_article)) 
            { 
                $modifie = "qte_ok"; 
            } 
        } 
    } 
    return $modifie; 
} 

/*Supprimer un article du panier après vérification que nous ne somme pas en phase de paiement 
* 
* @param String     $ref_article numéro de référence de l'article à supprimer 
* @return Mixed     Retourne TRUE si la suppression a bien été effectuée, 
*                   FALSE sinon, "absent" si l'article était déjà retiré du panier 
*/ 
function supprim_article($ref_article) 
{ 
    $suppression = false; 
    if(!isset($_SESSION['panier']['verrouille']) || $_SESSION['panier']['verrouille'] == false) 
    { 
        /* On vérifie que l'article à supprimer est bien présent dans le panier */ 
        if(nombre_article($ref_article) != false) 
        { 
            /* création d'un tableau temporaire de stockage des articles */ 
            $panier_tmp = array("id_article"=>array(),"libile"=>array(),"qte"=>array(),"taille"=>array(),"prix"=>array()); 
            /* Comptage des articles du panier */ 
            $nb_articles = count($_SESSION['panier']['id_article']); 
            /* Transfert du panier dans le panier temporaire */ 
            for($i = 0; $i < $nb_articles; $i++) 
            { 
                /* On transfère tout sauf l'article à supprimer */ 
                if($_SESSION['panier']['id_article'][$i] != $ref_article) 
                { 
                    array_push($panier_tmp['id_article'],$_SESSION['panier']['id_article'][$i]);
					array_push($panier_tmp['libile'],$_SESSION['panier']['libile'][$i]);
                    array_push($panier_tmp['qte'],$_SESSION['panier']['qte'][$i]); 
                    array_push($panier_tmp['taille'],$_SESSION['panier']['taille'][$i]); 
                    array_push($panier_tmp['prix'],$_SESSION['panier']['prix'][$i]); 
                } 
            } 
            /* Le transfert est terminé, on ré-initialise le panier */ 
            $_SESSION['panier'] = $panier_tmp; 
            /* Option : on peut maintenant supprimer notre panier temporaire: */ 
            unset($panier_tmp); 
            $suppression = true; 
        } 
        else 
        { 
            $suppression == "absent"; 
        } 
    } 
    return $suppression; 
} 

/*Supprimer un article du panier : autre méthode. 
* 
* @param String     $ref_article numéro de référence de l'article à supprimer 
* @param Boolean    $reindex : facultatif, par défaut, vaut true pour ré-indexer le tableau après 
*                   suppression. On peut envoyer false si cette ré-indexation n'est pas nécessaire. 
* @return Mixed     Retourne TRUE si la suppression a bien été effectuée, 
*                   FALSE sinon, "absent" si l'article était déjà retiré du panier 
*/ 
function supprim_article2($ref_article, $reindex = true) 
{ 
    $suppression = false; 
    if(!isset($_SESSION['panier']['verrouille']) || $_SESSION['panier']['verrouille'] == false) 
    { 
        $aCleSuppr = array_keys($_SESSION['panier']['id_article'], $ref_article); 

        /* sortie la clé a été trouvée */ 
        if (!empty ($aCleSuppr)) 
        { 
            /* on traverse le panier pour supprimer ce qui doit l'être */ 
            foreach ($_SESSION['panier'] as $k=>$v) 
            { 
                foreach($aCleSuppr as $v1) 
                { 
                    unset($_SESSION['panier'][$k][$v1]);    // remplace la ligne foireuse 
                } 
                /* Réindexation des clés du panier si l'option $reindex a été laissée à true */ 
                if($reindex == true) 
                { 
                    $_SESSION['panier'][$k] = array_values($_SESSION['panier'][$k]); 
                } 
                $suppression = true; 
            } 
        } 
        else 
        { 
            $suppression = "absent"; 
        } 
    } 
    return $suppression; 
} 

/*Fonction qui supprime tout le contenu du panier en détruisant la variable après 
* vérification qu'on ne soit pas en phase de paiement. 
* 
* @return Mixed    Retourne VRAI si l'exécution s'est correctement déroulée, Faux sinon et "inexistant" si 
*                  le panier avait déjà été détruit ou n'avait jamais été créé. 
*/ 
function vider_panier() 
{ 
    $vide = false; 
    if(!isset($_SESSION['panier']['verrouille']) || $_SESSION['panier']['verrouille'] == false) 
    { 
        if(isset($_SESSION['panier'])) 
        { 
            unset($_SESSION['panier']); 
            if(!isset($_SESSION['panier'])) 
            { 
                $vide = true; 
            } 
        } 
        else 
        { 
            /* Le panier était déjà détruit, on renvoie une autre valeur exploitable au retour */ 
            $vide = "inexistant"; 
        } 
    } 
    return $vide; 
} 

/* Vérifie la quantité enregistrée d'un article dans le panier 
* 
* @param String $ref_article référence de l'article à vérifier 
* @return Mixed Renvoie le nombre d'article s'il y en a, ou Faux si cet article est absent du panier 
*/ 
function nombre_article($ref_article) 
{ 
    /* On initialise la variable de retour */ 
    $nombre = false; 
    /* Comptage du panier */ 
    $nb_art = count($_SESSION['panier']['id_article']); 
    /* On parcoure le panier à la recherche de l'article pour vérifier le cas échéant combien sont enregistrés */ 
    for($i = 0; $i < $nb_art; $i++) 
    { 
        if($_SESSION['panier']['id_article'][$i] == $ref_article) 
        $nombre = $_SESSION['panier']['qte'][$i]; 
    } 
    return $nombre; 
} 

/*Calcule le montant total du panier 
* 
* @return Double 
*/ 
function montant_panier() 
{ 
    /* On initialise le montant */ 
    $montant = 0; 
    /* Comptage des articles du panier */ 
    $nb_articles = count($_SESSION['panier']['id_article']); 
    /* On va calculer le total par article */ 
    for($i = 0; $i < $nb_articles; $i++) 
    { 
        $montant += /*$_SESSION['panier']['qte'][$i] * */$_SESSION['panier']['prix'][$i]; 
    } 
    /* On retourne le résultat */ 
    return $montant; 
} 
 
/* Vérifie la présence d'un article dans le panier 
* 
* @param String $ref_article référence de l'article à vérifier 
* @return Boolean Renvoie Vrai si l'article est trouvé dans le panier, Faux sinon 
*/ 
function verif_panier($ref_article) 
{ 
    /* On initialise la variable de retour */ 
    $present = false; 
    /* On vérifie les numéros de références des articles et on compare avec l'article à vérifier */ 
    if( count($_SESSION['panier']['id_article']) > 0 && array_search($ref_article,$_SESSION['panier']['id_article']) !== false) 
    { 
        $present = true; 
    } 
    return $present; 
} 

//Fonction de verrouillage du panier pendant la phase de paiement 
function preparerPaiement() 
{ 
    $_SESSION['panier']['verrouille'] = true; 
    /*header("Location: URL_DU_SITE_DE_BANQUE");*/ 
} 

//Fonction qui va enregistrer les informations de la commande dans la base de données et détruire le panier. 
function paiementAccepte($mail_clt, $tel_cmd, $adr_cmd, $montant_cmd, $nbr_article) 
{ 
	global $connection,$datecreation,$date_full_h;
	$cmd_enregistrer = false;
	$sql_1=mysql_query("INSERT INTO `bonchoix`.`commande` (`id_cmd`, `email_clt`, `date_cmd`, `tel_contact_cmd`, `adresslivrison_cmd`, `montant_cmd`, `etats`) VALUES ('$datecreation', '$mail_clt', '$date_full_h', '$tel_cmd', '$adr_cmd', '$montant_cmd', 'non traiter');", $connection);
	for ($i = 0; $i <= ($nbr_article-1); $i++)
	{
		$code_art = $_SESSION['panier']['id_article'][$i];
		$sql_2=mysql_query("INSERT INTO `bonchoix`.`commande_article` (`id_cmd`, `code_art`) VALUES ('$datecreation', '$code_art');", $connection);
	}
	if ($sql_1 && $sql_2)
	{
		unset($_SESSION['panier']);
		$cmd_enregistrer = true;
	}
	return $cmd_enregistrer;
} 

//Fonction qui va retourner le nombre d'article dans le panier
function nombre_article_dans_panier()
{
	$nbr_article = count($_SESSION['panier']['id_article']);
	return $nbr_article;
}

//preparation de la liste des email pour l'envoi de newsletter

//fermeture de la base de donnees
mysql_close();
?>