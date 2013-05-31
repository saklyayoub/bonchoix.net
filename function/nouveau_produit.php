<style>
#product{height:240px; width:790px;padding-top:10px; padding-bottom:70px;margin-top:15px;}
#product ul{text-align:center;width:700px;padding:0;-webkit-perspective:500px;-moz-perspective:500px;-ms-perspective:500px;-o-perspective:500px;perspective:500px;}
#product ul li{display:inline-block;width:125px;height:180px;background-color: rgba(0, 0, 0, 0.5);-webkit-transform:rotateY(45deg);-moz-transform:rotateY(45deg);-ms-transform:rotateY(45deg);-o-transform:rotateY(45deg);transform:rotateY(45deg);}
#product li:nth-child(3){-webkit-transform:rotateY(0deg) scale(1.2);-moz-transform:rotateY(0deg) scale(1.2);-ms-transform:rotateY(0deg) scale(1.2);-o-transform:rotateY(0deg) scale(1.2);transform:rotateY(0deg) scale(1.2);}
#product ul li:nth-child(3) ~ li{-webkit-transform:rotateY(-45deg);-moz-transform:rotateY(-45deg);-ms-transform:rotateY(-45deg);-o-transform:rotateY(-45deg);transform:rotateY(-45deg);}
#product ul li:hover{-webkit-transform:rotateY(0deg) scale(1.2);-moz-transform:rotateY(0deg) scale(1.2);-ms-transform:rotateY(0deg) scale(1.2);-o-transform:rotateY(0deg) scale(1.2);transform:rotateY(0deg) scale(1.2);}
#product ul li:hover ~ li{-webkit-transform:rotateY(-45deg);-moz-transform:rotateY(-45deg);-ms-transform:rotateY(-45deg);-o-transform:rotateY(-45deg);transform:rotateY(-45deg);}
#product ul li:hover,
#product ul li:nth-child(3) ~ li:hover{-webkit-transform:rotateY(0deg) scale(1.2);-moz-transform:rotateY(0deg) scale(1.2);-ms-transform:rotateY(0deg) scale(1.2);-o-transform:rotateY(0deg) scale(1.2);transform:rotateY(0deg) scale(1.2);}
#product ul:hover li:not(:hover){-webkit-transform:rotateY(45deg);-moz-transform:rotateY(45deg);-ms-transform:rotateY(45deg);-o-transform:rotateY(45deg);transform:rotateY(45deg);}
#product ul:hover li:hover ~ li{-webkit-transform:rotateY(-45deg);-moz-transform:rotateY(-45deg);-ms-transform:rotateY(-45deg);-o-transform:rotateY(-45deg);transform:rotateY(-45deg);}
#product ul{width:790px;}
#product ul li{-webkit-transition:all .45s;-moz-transition:all .45s;-o-transition:all .45s;transition:all .45s;}
#product ul li:nth-child(odd){background-color: rgba(0, 0, 0, 0.5);}
#product ul li{position:relative;z-index:50;}
#product ul li:nth-child(3){z-index:55;}
#product ul li:first-child,
#product ul li:last-child{z-index:45;}
#product ul li:hover,
#product ul li:first-child:hover,
#product ul li:nth-child(3) ~ li:hover{z-index:60;}
#product_inside img{ width:125px; height:200px;-webkit-box-shadow:0 0 10px black;-moz-box-shadow:0 0 10px black;box-shadow:0 0 10px black;}
#product h2 {text-align:center; color:#ca0003; margin-top:-30px;font-size:14px; font-family:Georgia;}

#title {text-align:center; color:#666; font-size:25px; font-family:Georgia; margin-bottom:40px;}
</style>

<div id="product" class="g_box">
	<div id="title">Nouvelles Collections</div>
    <ul>
<?php
$q = mysql_query( " SELECT * FROM article WHERE fav_art='1' ;",$connection);
while ($p = mysql_fetch_object($q))
{
	$p1 = $p->code_art;
    $p2 = $p->design_courte_art;
    $p3	= $p->prix_art;
    $p5 = $p->design_long_art;
	echo'<li><div id="product_inside"><a href="info_article.php?code_art='.$p1.'&design_courte_art='.$p2.'&prix_art='.$p3.'&design_long_art='.$p5.'"><img src="img_article/'.$p1.'.png"/><h2>'.$p3.' TND</h2></a></div></li>';
}
?>
    </ul>
</div>