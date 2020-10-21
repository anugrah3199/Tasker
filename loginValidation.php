<?php
session_start();
require_once "connect.php";

$connection = new mysqli($host, $db_user, $db_password, $db_name);

if($connection->connect_errno!=0){
    echo "Error: ".$connection->connect_errno . "<br>";
    echo "Description: " . $connection->connect_error;
}
else{
    $login = $_POST['username'];
    $password = $_POST['password'];
    
    $sql = "SELECT * FROM users WHERE username='$login' AND password='$password'";
    
    if($result = $connection->query($sql)){
        $usersCount = $result->num_rows;
        if($usersCount>0){
            $_SESSION['logged-in'] = true;
            $row = $result->fetch_assoc();
            $user = $row['username'];
            
            $result->free_result();
            
            $_SESSION['user'] = $user;
            unset($_SESSION['loginError']);
            header('Location: index.php');
        }
        else{
            $_SESSION['loginError'] = '<span class="alert alert-danger mt-2" role="alert">Invalid inputs.</span>';
            header('Location: login.php');
        }
    }
    $connection->close();
}



?>