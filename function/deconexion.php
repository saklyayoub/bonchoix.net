<?php 
session_start();
if (isset($_SESSION['admin']))
{
unset($_SESSION['admin']);
}
if (isset($_SESSION['client']))
{
unset($_SESSION['client']);
unset($_SESSION['client_id']);
}
header("location:../index.php");
?>