<?php
session_start();
$_SESSION['login']=$_POST['login'];
$_SESSION['password']=$_POST['password'];
HEADER('Location:beer_add.php');
?>