<script type="text/javascript" src="./function/lib/jquery.min.js" ></script>
<script type="text/javascript" src="./function/lib/jquery-ui.min.js" ></script>
<script type="text/javascript">
	$(document).ready(function(){
		$("#featured > ul").tabs({fx:{opacity: "toggle"}}).tabs("rotate", 0, true);
	});
</script>
<style>
#featured{width:562px;padding-right:250px;position:relative;height:318px;-webkit-box-shadow:0.5px 0.5px 1px 3px rgba(0, 0, 0, .3);box-shadow:0.5px 0.5px 1px 3px rgba(0, 0, 0, .3);background-color: rgba(255, 255, 255, 0.9);}
#featured ul.ui-tabs-nav{position:absolute;top:0; left:562px;list-style:none;padding:0; margin:0;width:250px;}
#featured ul.ui-tabs-nav li{padding:2px 0; padding-left:13px;font-size:12px;color:#666;}
#featured ul.ui-tabs-nav li img{float:left; margin:2px 5px;background:#fff;padding:2px;border:1px solid #eee;}
#featured ul.ui-tabs-nav li span{font-size:11px; font-family:Verdana;line-height:18px;}
#featured li.ui-tabs-nav-item a{display:block;height:60px;color:#333;background:#fff;line-height:20px;}
#featured li.ui-tabs-nav-item a:hover{background:#f2f2f2;}
#featured li.ui-tabs-selected{background:url('style/img/slider/selected-item.gif') top left no-repeat;}
#featured ul.ui-tabs-nav li.ui-tabs-selected a{background:#ccc;}
#featured .ui-tabs-panel{width:562px; height:250px;background:#999; position:relative;}
#featured .ui-tabs-panel .info{position:absolute;top:250px; left:0;height:70px; background:#666;}
#featured .info h2{font-size:18px; font-family:Georgia, serif;color:#fff; padding:5px; margin:0;overflow:hidden;}
#featured .info p{margin:0 5px;font-family:Verdana; font-size:11px;line-height:15px; color:#f0f0f0;}
#featured .info a{text-decoration:none;color:#fff;}
#featured .info a:hover{text-decoration:underline;}
#featured .info {width:562px;}
#featured .ui-tabs-hide{display:none;}
</style>
		
<div id="featured" >
    <ul class="ui-tabs-nav">
        <li class="ui-tabs-nav-item ui-tabs-selected" id="nav-fragment-1"><a href="#fragment-1"><img src="style/img/slider/1.png" alt="" width="80" height="50"/><span><?php echo $titre_jqy_1 ; ?></span></a></li>
        <li class="ui-tabs-nav-item" id="nav-fragment-2"><a href="#fragment-2"><img src="style/img/slider/2.png" alt="" width="80" height="50"/><span><?php echo $titre_jqy_2 ; ?></span></a></li>
        <li class="ui-tabs-nav-item" id="nav-fragment-3"><a href="#fragment-3"><img src="style/img/slider/3.png" alt="" width="80" height="50"/><span><?php echo $titre_jqy_3 ; ?></span></a></li>
        <li class="ui-tabs-nav-item" id="nav-fragment-4"><a href="#fragment-4"><img src="style/img/slider/4.png" alt="" width="80" height="50"/><span><?php echo $titre_jqy_4 ; ?></span></a></li>
        <li class="ui-tabs-nav-item" id="nav-fragment-5"><a href="#fragment-5"><img src="style/img/slider/5.png" alt="" width="80" height="50"/><span><?php echo $titre_jqy_5 ; ?></span></a></li>
    </ul>

    <div id="fragment-1" class="ui-tabs-panel" style="">
        <img src="style/img/slider/1.png" width="562" height="250"/>
        <div class="info" >
            <h2><?php echo $titre_jqy_1 ; ?></h2>
            <p><?php echo $text_jqy_1 ; ?></p>
        </div>
    </div>

    <div id="fragment-2" class="ui-tabs-panel ui-tabs-hide" style="">
        <img src="style/img/slider/2.png" width="562" height="250"/>
        <div class="info" >
            <h2><?php echo $titre_jqy_2 ; ?></h2>
            <p><?php echo $text_jqy_2 ; ?></p>
        </div>
    </div>

    <div id="fragment-3" class="ui-tabs-panel ui-tabs-hide" style="">
        <img src="style/img/slider/3.png" width="562" height="250"/>
        <div class="info" >
            <h2><?php echo $titre_jqy_3 ; ?></h2>
            <p><?php echo $text_jqy_3 ; ?></p>
        </div>
    </div>

    <div id="fragment-4" class="ui-tabs-panel ui-tabs-hide" style="">
        <img src="style/img/slider/4.png" width="562" height="250"/>
        <div class="info" >
            <h2><?php echo $titre_jqy_4 ; ?></h2>
            <p><?php echo $text_jqy_4 ; ?></p>
        </div>
    </div>
    
        <div id="fragment-5" class="ui-tabs-panel ui-tabs-hide" style="">
        <img src="style/img/slider/5.png" width="562" height="250"/>
        <div class="info" >
            <h2><?php echo $titre_jqy_5 ; ?></h2>
            <p><?php echo $text_jqy_5 ; ?></p>
        </div>
    </div>

</div>