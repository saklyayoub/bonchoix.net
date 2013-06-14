<?php include('include/function.php');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $nom_du_site ; ?></title>
<link href="style/style.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
<link rel="icon" type="image/png" href="favicon.ico" />
</head>
<?php include('function/top_bar.php'); ?>
<body>
	<?php include('function/social.php');?>
	<div id="head">
		<div id="head_container">
			<div id="head_logo"><a href="#"><img src="style/img/logo.png" alt="<?php echo $nom_du_site ; ?>"/></a></div>
			<div id="head_right">
			</div>
		</div>
	</div>
	<?php include('function/nav.php');?>
    <div id="contenant"><div id="side_bar">
        	<?php include('function/search.php');?>
			<?php include('function/menue.php');?>
            <?php include('function/fb.php');?>
    	</div>
        <div id="catalogue" class="bg_catalogue">
        
<script type="text/javascript" src="function/lib/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="function/lib/turn.js"></script>
<div id="cat_under">

<?php
$query_affich_art_par_famill_client = mysql_query("SELECT * FROM article",$connection);
while ($O = mysql_fetch_object($query_affich_art_par_famill_client))
{
	$O1 = $O->code_art;
	$O2 = $O->design_courte_art;
	$O3	= $O->prix_art;
	$O5 = $O->design_long_art;
	
	echo'<div><span>
	
	<img src="img_article/'.$O1.'.png" width="300" height="300" style="margin-top:20px; margin-bottom:20px;"/><br>
	Code  : '.$O1.'<br>
	Prix : '.$O3.'<br>
	<div class="cat_text">'.$O5.'</div><br>
	</span></div>';
}
?>
</div>
<script type="text/javascript">$('#cat_under').turn({gradients: true, acceleration: true});</script>        
        
        </div>
    </div>
    <div id="footer">
        <?php include('function/footer.php');?>
    </div>	
</body>

</html>
