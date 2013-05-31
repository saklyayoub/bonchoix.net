<script src="function/lib/jquery.min.js"></script>
<script src="function/lib/top-bar.js"></script>
<script src="../function/lib/jquery.min.js"></script>
<script src="../function/lib/top-bar.js"></script>
<script src="../../function/lib/jquery.min.js"></script>
<script src="../../function/lib/top-bar.js"></script>
<!-- Panel -->
<div id="toppanel">
	<div id="panel">
		<div class="content clearfix">
			<div class="left">
			</div>
			<div class="left right">			
				<!-- Register Form -->
<?php
if (isset($_SESSION['admin']))
{
	echo'
	
	';
}
else
{
    if (isset($_SESSION['client']))
	{
    echo'
	';
	}
	else
	{echo'
<form action="" method="post">
	<h1> Inscription !</h1>
	<label class="grey" for="log">Nom:</label>
	<input class="field" type="text" name="nom_clt" id="log" value="" size="23" required="required"/>
	<label class="grey" for="log">Prenom:</label>
	<input class="field" type="text" name="prenom_clt" id="log" value="" size="23" required="required"/>
	<label class="grey" for="signup">Email:</label>
	<input class="field" type="text" name="email_clt" id="log" value="" size="23" required="required"/>
	</div>
	<div class="left right">
	<h1>&nbsp;</h1>	
	<label class="grey" for="pwd">Mot de Passe:</label>
	<input class="field" type="password" name="mdp_clt" id="pwd" size="23" required="required"/>
	<label class="grey" for="pwd">Verification de mot de passe:</label>
	<input class="field" type="password" name="v_mdp_clt" id="pwd" size="23" required="required"/>
	<label><input name="nl" id="rememberme" type="checkbox" checked="checked"/>Je souhaite recevoir en exclusivité des promotions Le bon choix via la newsletter?</label>
	<input type="submit" value="S\'enregister !" class="bt_register" />
</form>
	</div>
	<div class="left">
<form action="" method="post">
	<h1>Connexion Membre</h1>
	<label class="grey" for="log">Email:</label>
	<input class="field" type="text" name="email" id="log" value="" size="23" required="required"/>
	<label class="grey" for="pwd">Mot de Passe:</label>
	<input class="field" type="password" name="mdp" id="pwd" size="23" required="required"/>
	<div class="clear"></div>
	<input type="submit" value="Connexion" class="bt_login" />
	<a class="lost-pwd" href="#">Mot de passe oublier?</a>
</form>
	';
	}
}           
?>
		</div>
	</div>
</div>
	<div class="tab">
		<ul class="login">
			<li class="left">&nbsp;</li>
			<li>
            <?php
            if (isset($_SESSION['admin']))
            {
                echo'<a href="'.$adress_du_site.'/root/index.php"><span class="nav_activ">ESPACE ADMIN</span></a> | '; 
                echo'<a href="'.$adress_du_site.'/function/deconexion.php">DECONEXION</a>';
            }
            else
            {
                if (isset($_SESSION['client']))
                {
					$clt = $_SESSION['client'];
                    echo $clt.'  |  ' ;
                    echo'<a href="'.$adress_du_site.'/function/deconexion.php">DECONEXION</a>';
                }
				else{echo'
				
				<li id="toggle">
					<a id="open" href="#">Connexion !</a>
					<a id="close" style="display: none;" href="#">Fermer !</a>
				</li>
				
				';}
			}           
            ?>
            </li>
			<li class="right">&nbsp;</li>
		</ul> 
	</div> <!-- / top -->

<?php // Authentification !
if ((isset($_POST['email'])) && (isset($_POST['mdp'])))
{
	$connection = mysql_connect($serveur, $utilisateur, $mot_de_passe) or die(mysql_error());
mysql_select_db($base_de_donnees, $connection) or die(mysql_error());
	$email	 		= $_POST['email'];
	$mdp 			= $_POST['mdp'];
	$mdp_decrepted 	= sha1(md5($mdp));
	$query_if_admin 	= "SELECT * FROM admin WHERE login_admin ='$email' AND mdp_admin ='$mdp_decrepted'";
	$query_if_client 	= "SELECT * FROM client WHERE email_clt='$email' AND mdp_clt='$mdp'";
	$result_if_admin		 	= mysql_query($query_if_admin, $connection);
	$affected_rows_if_admin 	= mysql_num_rows($result_if_admin);
	if($affected_rows_if_admin == 1)
	{
		$affected_rows_if_admin1	= mysql_fetch_array($result_if_admin);
		$_SESSION['admin']			= $affected_rows_if_admin1[1];
		header("location:#");
	}
	else
	{
		$result_if_client			= mysql_query($query_if_client, $connection);
		$affected_rows_if_client	= mysql_num_rows($result_if_client);
		if($affected_rows_if_client == 1)
		{
			$affected_rows_if_client1	= mysql_fetch_array($result_if_client);
			$_SESSION['client']			= $affected_rows_if_client1[2];
			$_SESSION['client_id']		= $affected_rows_if_client1[0];
			header("location:#");
		}
		else
			{echo'<script language="javascript">alert("Veillez verifier vos identifiants spv");</script>';}
	}
mysql_close();
}

//Inscription
if ((isset($_POST['nom_clt'])) && (isset($_POST['prenom_clt'])) && (isset($_POST['email_clt'])) && (isset($_POST['mdp_clt'])) && (isset($_POST['v_mdp_clt'])))
{
	$nom_clt 			= $_POST['nom_clt'];
	$prenom_clt 		= $_POST['prenom_clt'];
	$email_clt 			= $_POST['email_clt'];
	$mdp_clt 			= $_POST['mdp_clt'];
	$v_mdp_clt 			= $_POST['v_mdp_clt'];
	if ($v_mdp_clt != $mdp_clt )
	{echo'<script language="javascript">alert("Combinaison de deux mots de passe inccorect !");</script>';}
	else
	{
		$mdp_clt_crypted	= sha1(md5($mdp_clt));
		$connection = mysql_connect($serveur, $utilisateur, $mot_de_passe) or die(mysql_error());
		mysql_select_db($base_de_donnees, $connection) or die(mysql_error());                      
		$query = "INSERT INTO client VALUES('$email_clt', '$nom_clt', '$prenom_clt', '$mdp_clt')";
		$result = mysql_query($query, $connection);
		if($result != 1)
		{echo'<script language="javascript">alert("l\'email '.$email_clt.' est déjà enregistrer");</script>';}
		else
		{
			if (isset($_POST['nl']))
			{
				$nl	 = $_POST['nl'];
				$query_nl = "INSERT INTO newsletter VALUES('$email_clt', '$date')";
				$result_nl = mysql_query($query_nl, $connection);
				if($result_nl != 1)
				{echo'<script language="javascript">alert("l\'email '.$email_clt.' est déjà enregistrer dans notre newsletter");</script>';}
			}
		}
		mysql_close();
		echo'<script language="javascript">alert("Inscription avec succee, Bienvenue '.$nom_clt.'");</script>';
	}
}
?>