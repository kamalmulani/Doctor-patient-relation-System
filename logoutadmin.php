<?php
session_start();

    $_SESSION['admin_email']="";
    $_SESSION['admin_pass']="";

     header('location:index.html');
?>