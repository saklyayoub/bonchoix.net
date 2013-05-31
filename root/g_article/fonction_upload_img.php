<?php
//fonction upload image
include('../../include/function.php');

if (isset($_FILES['upload_img']) && isset($_POST['code_article']))
{
	if (move_uploaded_file($_FILES['upload_img']['tmp_name'], '../../img_article/' . $_POST['code_article'].'.png'))
	{
		echo'
		<script language="javascript">
			location ="modification.php?code_article='.$_POST['code_article'].'";
		</script>';
	}
	else
	{
		echo'
		<script language="javascript">
			window.alert("Echec d\'envoi d\'image!");
			location ="modification.php?code_article='.$_POST['code_article'].'";
		</script>';
	}
}
?>