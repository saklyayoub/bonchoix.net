<?php include('include/function.php');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $nom_du_site ; ?></title>
<link href="style/style.css" rel="stylesheet" type="text/css" />
</head>
<?php include('function/top_bar.php'); ?>
<body>
	<?php include('function/social.php');?>
	<div id="head">
		<div id="head_container">
			<div id="head_logo"><a href="#"><img src="style/img/logo.png" alt="<?php echo $nom_du_site ; ?>"/></a></div>
		</div>
	</div>
	<?php include('function/nav.php');?>
    <div id="contenant"><div id="side_bar">
        	<?php include('function/search.php');?>
			<?php include('function/menue.php');?>
            <?php include('function/fb.php');?>
    	</div>
        <div id="container">
            <div id="container_under_scroll" class="g_box">
                <div id="art_desplay_global_block">          
<?php
                    $NFA_RECUP 	= $_GET['nom_famill_art'];
                    $CSFA_RECUP = $_GET['code_sous_famill_art'];
                    $NSFA_RECUP	= $_GET['nom_sous_famill_art'] ;
                    echo ' <h3>'.$NFA_RECUP.' >> '.$NSFA_RECUP.'</h3>';
                    $query_affich_art_par_famill_client = mysql_query("SELECT * FROM article WHERE code_sous_famill_art='$CSFA_RECUP'",$connection);
                    while ($O = mysql_fetch_object($query_affich_art_par_famill_client))
                    {
                        $O1 = $O->code_art;
                        $O2 = $O->design_courte_art;
                        $O3	= $O->prix_art;
                        $O5 = $O->design_long_art;
                        echo'
						
                            <div id="art_cadre">
                                <div id="art"><a href="info_article.php?code_art='.$O1.'&design_courte_art='.$O2.'&prix_art='.$O3.'&design_long_art='.$O5.'">
								<img src="img_article/'.$O1.'.png"/></a></div>
                                <div id="art_desig">'.$O2.'</div>
                                <div id="art_prix">'.$O3.' TND</div>
                            </div>
                            ';
                    }
?>
                </div>

            </div>
        </div>
    </div>
    <div id="footer">
        <?php include('function/footer.php');?>
    </div>	
</body>
</html>