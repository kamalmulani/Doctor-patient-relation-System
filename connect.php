<?php

$conn=new mysqli("localhost","root","","project");

if($conn->connect_error){
    die("connection failed");
}

?>