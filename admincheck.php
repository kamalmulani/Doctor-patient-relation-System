<?php
session_start();
$_SESSION['admin_email']=$_GET['admin_email'];
$_SESSION['admin_pass']=$_GET['admin_pass'];


header('location:index.html');

?>