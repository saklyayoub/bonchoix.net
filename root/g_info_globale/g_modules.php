<?php include('../../include/function.php');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $nom_du_site ; ?></title>
<link href="../../style/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../../style/functions.js"></script>
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
        ?>
        </div>
        <div id="container">
            <div id="container_under_admin" class="g_box">
<br />

<h2>>>Gestion des modules de site</h2>
<p> Veillez choisir les modules qui seront affichier dans le site</p>
<form action="g_info_global_module_function.php" method="post">
<table width="600px">
<tr><td><input name="m_facebook" type="checkbox" value="1" <?php if ($m_facebook == '1') { echo ' checked="checked" '; } ?> onchange="this.form.submit()" />facebook</td></tr>
<tr><td><input name="m_tweeter" type="checkbox" value="1" <?php if ($m_tweeter == '1') { echo ' checked="checked" '; } ?> onchange="this.form.submit()" />tweeter</td></tr>
<tr><td><input name="m_youtube" type="checkbox" value="1" <?php if ($m_youtube == '1') { echo ' checked="checked" '; } ?> onchange="this.form.submit()" />youtube</td></tr>
</table>
</form>

<br />

            </div>
        </div>
    </div>
    <div id="footer">
        <?php include('../../function/footer.php');?>
    </div>
</body>
</html>
