<?php
session_start();
$_SESSION['operator_email']=$_GET['operator_email'];
$_SESSION['operator_pass']=$_GET['operator_pass'];


header('location:index.html');

?>