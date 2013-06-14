<?php include('include/function.php');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
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
			<div id="head_logo"><a href="index.php"><img src="style/img/logo.png" alt="<?php echo $nom_du_site ; ?>!"/></a></div>
			<div id="head_right">
			</div>
		</div>
	</div>
	<?php include('function/nav.php');?>
    <div id="contenant">
		<div id="side_bar">
        	<?php include('function/search.php');?>
			<?php include('function/menue.php');?>
            <?php include('function/fb.php');?>
    	</div>
    	<div id="container">
			<?php include('function/slider.php');?>
			<?php include('function/nouveau_produit.php');?>
    	</div>
	</div>
	<div id="footer">
		<?php include('function/footer.php');?>
	</div>
</body>
</html>
        
