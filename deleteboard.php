<?php
session_start();
require_once "connect.php";

$connection = new mysqli($host, $db_user, $db_password, $db_name);
$id = $_GET['id'];

if($connection->connect_errno!=0){
    echo "Error: ".$connection->connect_errno . "<br>";
    echo "Description: " . $connection->connect_error;
    exit();
}

else{
    
        $sql = "DELETE FROM projects WHERE id='$id'";
        
        if($connection->query($sql)){
            header('Location: index.php');
        }
        
    
    
    $connection->close();
}



?>      