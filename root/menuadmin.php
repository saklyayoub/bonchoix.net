<div id="menu_admin">
	<div class="menu"><a href="<?php echo $adress_du_site ;?>/root/index.php">Panneau admin</a>
		<div class="sousmenu" style="display:none">
        </div>
    </div>
	<div class="menu"><a href="#">Familles d'articles</a>
		<div class="sousmenu" style="display:none">
			<div><a href="<?php echo $adress_du_site ;?>/root/g_famill/liste.php">Familles</a></div>
			<div><a href="<?php echo $adress_du_site ;?>/root/g_sous_famill/liste.php">Sous Familles</a></div>
		</div>
	</div>
    <div class="menu" ><a href="<?php echo $adress_du_site ;?>/root/g_article/liste.php">Articles</a>
        <div class="sousmenu" id="sousmenu2" style="display:none">
        </div>
    </div>
    <div class="menu"><a href="<?php echo $adress_du_site ;?>/root/g_commandes/liste.php">Commandes/Factures</a>
        <div class="sousmenu" id="sousmenu" style="display:none">
        </div>
    </div>
    <div class="menu"><a href="<?php echo $adress_du_site ;?>/root/g_contactez-nous/affich.php">Messages</a>
        <div class="sousmenu" id="sousmenu" style="display:none">
        </div>
    </div>
    <div class="menu"><a href="<?php echo $adress_du_site ;?>/root/newsletter/affich.php">Newsletter</a>
        <div class="sousmenu" id="sousmenu" style="display:none">
        </div>
    </div>
    <div class="menu"><a href="#">Gestion du site</a>
        <div class="sousmenu" style="display:none">
        	<div><a href="<?php echo $adress_du_site ;?>/root/g_info_globale/g_info_global.php">Info Globales</a></div>
        	<div><a href="<?php echo $adress_du_site ;?>/root/g_info_globale/g_sliders.php">Gestion des sliders</a></div>
        	<div><a href="<?php echo $adress_du_site ;?>/root/g_info_globale/g_modules.php">Gestion des modules</a></div>
            <div><a href="<?php echo $adress_du_site ;?>/root/g_info_globale/g_info_admin.php">Gestion info Admin</a></div>
        </div>
    </div>
</div>
<script type="text/javascript">
	var a = document.getElementsByClassName("menu");
	for(var i = 0; i < a.length; i++){
		a[i].onmouseover = function(){
			var n = this.getElementsByClassName("sousmenu")[0];
			n.style.display = "block";	
			
		}
		a[i].onmouseout = function(){
			var n = this.getElementsByClassName("sousmenu")[0];
			n.style.display = "none";	
		}		
	}
</script>
