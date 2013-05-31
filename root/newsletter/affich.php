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
        <?php
        include('../menuadmin.php');
echo'
        </div>
        <div id="container">
            <div id="container_under_admin" class="g_box">
                <h3>>>Liste d\'email inscrit dans la newsletter</h3>
                <h4>>><a href="mailto:';
					$sql = mysql_query("SELECT * FROM newsletter;", $connection);
					while ($r = mysql_fetch_object($sql))
					{
						$v = $r->email_nl;
						echo $v.',';
					}
				echo'">Envoyer une nouvelle newsletter ?</a></h4>
                <table width="600px" id="ad_table" class="center">
                    <tr>
                        <td width="320">
                            <b>E-mail</b>
                        </td>
                        <td width="168">
                            <b>Inscrit le</b>
                        </td>
                    </tr>';

                    $result_newsletter_affich = mysql_query("SELECT * FROM newsletter;", $connection);
                    while ($affected_rows_newsletter_affich_object = mysql_fetch_object($result_newsletter_affich))
                    {
                        $vv0 = $affected_rows_newsletter_affich_object->email_nl;
                        $vv1 = $affected_rows_newsletter_affich_object->date_inscrip_nl;
                        echo'<tr><td>'.$vv0.'</td><td>'.$vv1.'</td></tr>';
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
