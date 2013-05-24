<style>
#socialicons{z-index:500000;display:block;float:left;position:fixed;top: 35%;left: -3%;}
#socialicons ul li{list-style:none;}
#socialicons img{width:30px;height:30px;-moz-transition: all 0.8s ease-in-out;-webkit-transition: all 0.8s ease-in-out;-o-transition: all 0.8s ease-in-out;-ms-transition: all 0.8s ease-in-out;transition: all 0.8s ease-in-out;}
#socialicons img:hover{z-index:1;width:30px;height:30px;-moz-transform: rotate(360deg);-webkit-transform: rotate(360deg);-o-transform: rotate(360deg);-ms-transform: rotate(360deg);transform: rotate(360deg);}
.notif { margin-bottom:4px; background-image:url(style/img/social/panier.png);width:30px;height:30px;-moz-transition: all 0.8s ease-in-out;-webkit-transition: all 0.8s ease-in-out;-o-transition: all 0.8s ease-in-out;-ms-transition: all 0.8s ease-in-out;transition: all 0.8s ease-in-out;}
.notif:hover{ background-image:url(style/img/social/panier.png);z-index:1;width:30px;height:30px;-moz-transform: rotate(360deg);-webkit-transform: rotate(360deg);-o-transform: rotate(360deg);-ms-transform: rotate(360deg);transform: rotate(360deg);}
#socialicons span{ font-size:30px; position:fixed; top:230px;}
</style>
<div id="socialicons">
    <ul>
    	<li><a href="#" target="new"><img border="0" src="style/img/social/mail.png" /></a></li>      
        <?php 
		if ($m_facebook == '1'){echo'<li><a href="'.$page_fb.'" target="new"><img border="0" src="style/img/social/facebook.png" /></a></li>';}
		if ($m_tweeter == '1'){echo'<li><a href="'.$page_tw.'" target="new"><img border="0" src="style/img/social/tweeter.png" /></a></li>';}
		if ($m_youtube == '1'){echo'<li><a href="'.$page_yt.'" target="new"><img border="0" src="style/img/social/youtube.png" /></a></li>';}
		?>        
    </ul>
</div>