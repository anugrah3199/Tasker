<?php

$username="";
$password="";
require_once "connect.php";

$connection = new mysqli($host, $db_user, $db_password, $db_name);

if(isset($_POST['register'])){
    $username = mysqli_real_escape_string($connection,$_POST['username']);
    $password = mysqli_real_escape_string($connection,$_POST['password']);
    
    $sql = "INSERT INTO users (id,username,password) VALUES (NULL,'$username','$password')";
    
    if(mysqli_query($connection,$sql) == TRUE){
        
        header('Location: login.php');
    }
}

?>