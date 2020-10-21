<?php
session_start();
require_once "connect.php";

$connection = new mysqli($host, $db_user, $db_password, $db_name);

if($connection->connect_errno!=0){
    echo "Error: ".$connection->connect_errno . "<br>";
    echo "Description: " . $connection->connect_error;
}
else{
    $fullName = $_POST['full'];
    $shortName = $_POST['short'];
    $user = $_SESSION['user'];
    
    $sql = "INSERT INTO projects VALUES (NULL, '$fullName','$shortName','$user')";
    
    if($connection->query($sql)){
        $_SESSION['newProjectSuccess'] = '<span class="alert alert-success" role="alert">Project is added successfully.</span>';
        unset($_SESSION['addProjectError']);
        header('Location: index.php');
    }
     else{
        $_SESSION['addProjectError'] = '<span class="alert alert-danger" role="alert">Sorry! The project couldnot be added.</span>';
        header('Location: newTask.php');
    }
    $connection->close();
}

?>