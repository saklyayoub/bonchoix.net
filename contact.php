<?php include('include/function.php');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $nom_du_site ; ?></title>
<link href="style/style.css" rel="stylesheet" type="text/css" />
<!-- debut de code de google maps -->
<meta name="viewport" content="initial-scale=1.0, user-scalable=no">
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript">
	function LoadGmaps() {
		var myLatlng = new google.maps.LatLng(<?php echo $x_gmaps ; ?>,<?php echo $y_gmaps ; ?>);
		var myOptions = {
			zoom: 16,
			center: myLatlng,
			disableDefaultUI: true,
			navigationControl: true,
			navigationControlOptions: {
				style: google.maps.NavigationControlStyle.ZOOM_PAN
			},

			mapTypeControl: true,
			mapTypeControlOptions: {
				style: google.maps.MapTypeControlStyle.HORIZONTAL_BAR
			},
			streetViewControl: true,
			mapTypeId: google.maps.MapTypeId.ROADMAP
			}
		var map = new google.maps.Map(document.getElementById("MyGmaps"), myOptions);
		var marker = new google.maps.Marker({
			position: myLatlng,
			map: map,
			title:"<?php echo $nom_du_site ; ?>"
		});
	}
</script>
<!-- fin d'apel au code de google maps -->
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
        <div id="container">
            <div id="container_under" class="g_box">
                <h3>>>Contactez-nous?</h3>
                    <!-- partie de description -->
                    <div id="description">
                    	<p><?php echo $description ; ?><br /><br />
                        <p><b><?php echo $nom_du_site ; ?></b></p>
                        <p><?php echo $adresse ; ?></p>
                        <p><?php echo $tel ; ?></p>
                    </div>
                    <br />
                    <!-- fin de partie de description -->
					<!-- debut de l'apel au fonction de google maps -->
                    <body onload="LoadGmaps()" onunload="GUnload()">
					<div id="MyGmaps"></div>
                    <!-- fin d'apell au fonction de google maps -->
                    <!-- contactez nous formulaire -->          
                    <div id="contact">
                    	<table>
                    		<form action="" method="post">
                    			<tr><td class="ecriture">E-mail</td><td><input type="email" name="email_cn" required="required" class="input" /></td></tr>
                    			<tr><td class="ecriture">Sujet</td><td><input type="text" name="sujet_nl" required="required" class="input" /></td></tr>
                   				<tr><td class="ecriture">Message</td><td><textarea rows="14" cols="20" name="message_nl" required="required" class="input"></textarea></td></tr>
                    			<tr><td></td><td><center><input type="submit" class="submit_button" value="Envoyer"/></center></td></tr>
                    		</form>
                    	</table>
                    </div>
                    <!-- end contactez nous formulaire -->
                    <!-- contacter nous function -->
                    <?php
                    if (isset($_POST['email_cn']) && isset($_POST['sujet_nl']) && isset($_POST['message_nl']))
                    {
                        $connection = mysql_connect($serveur, $utilisateur, $mot_de_passe) or die(mysql_error());
                        mysql_select_db($base_de_donnees, $connection) or die(mysql_error());
                        $email_cn	 = $_POST['email_cn'];
                        $sujet_nl	 = addslashes($_POST['sujet_nl']);
                        $message_nl	 = addslashes($_POST['message_nl']);
                        $query = "INSERT INTO contacteznous VALUES('', '$email_cn', '$sujet_nl', '$message_nl', '$date_system', '0', '0')";
                        $result = mysql_query($query, $connection);
                        if($result == 1)
                        {
                            echo'
                            <script language="javascript">
                            alert("Votre message a été bien envoyé, on vous répondra trés bientôt");
                            </script>
                            ';
                        }
                        else
                        {
                            echo'
                            <script language="javascript">
                            alert("Une erreur est survenue, veuillez nous excuser!");
                            </script>
                            ';
                        }
                        mysql_close();
                    }
                    ?> 
                </div>
            </div>
        </div>
    <div id="footer"><?php include('function/footer.php');?></div>	
</body>
</html>