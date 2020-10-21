<?php
session_start();
require_once "connect.php";

$connection = new mysqli($host, $db_user, $db_password, $db_name);
$shortName = $_GET['sn'];
$taskNum = $_GET['tn'];
if($connection->connect_errno!=0){
    echo "Error: ".$connection->connect_errno . "<br>";
    echo "Description: " . $connection->connect_error;
    exit();
}

else{
    
        $sql = "DELETE FROM tasks WHERE project_short_name='$shortName' AND project_task_num='$taskNum'";
        
        if($connection->query($sql)){
            header('Location: board.php?sn='.$shortName);
        }
        
    
    
    $connection->close();
}



?>