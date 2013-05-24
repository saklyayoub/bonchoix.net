<?php include('../../include/function.php');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $nom_du_site ; ?></title>
<link href="../../style/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php include('../../function/top_bar.php'); ?>
    <div id="head">
        <div id="head_container">
            <div id="head_logo">
                <img src="../../style/img/logo.png" alt="Le Bon Choix !"/>
            </div>
        </div>
    </div>
    <?php include('../../function/nav.php');?>
    <div id="contenant">
        <div id="side_bar">
        <?php include('../menuadmin.php'); ?>
        </div>
        <div id="container">
            <div id="container_under_admin" class="g_box">
                <h3>>>Liste des messages</h3>
               
                <table width="700px">
                <?php
				$sql = mysql_query("SELECT * FROM contacteznous;", $connection);
				if($sql)
				{
					while($r = mysql_fetch_object($sql))
					{
						echo'
							<input type="tex" readonly="readonly" value="'.$r->email_cn.'" /><br>
							<input type="tex" readonly="readonly" value="'.$r->sujet_cn.'" /><br>
							<textarea rows="5" cols="50">'.$r->message_cn.'</textarea><br><br><br>
							';
					}
				}
				?>
				</table>
			</div>
        </div>
    </div>
    <div id="footer">
        <?php include('../../function/footer.php');?>
    </div>
</body>
</html>
