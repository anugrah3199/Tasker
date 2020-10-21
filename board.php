<?php
    session_start();
    if(!(isset($_SESSION['logged-in']))){
        header('Location: login.php');
        exit();
    }
    if(!(isset($_GET['sn']))){
        header('Location: index.php');
        exit();
    }

    require_once "connect.php";

    $connection = new mysqli($host, $db_user, $db_password, $db_name);

    if($connection->connect_errno!=0){
        echo "Error: ".$connection->connect_errno . "<br>";
        echo "Description: " . $connection->connect_error;
        exit();
    }
    $shortName = $_GET['sn'];
?>

<?php include 'header.php';?>

<?php
    $sql = "SELECT * FROM `projects` WHERE `Short name` = '$shortName'";
     if($result = $connection->query($sql)){
        $rowsCount = $result->num_rows;
        if($rowsCount>0){
            $row = $result->fetch_assoc();
            $result->free_result();
        }
        else{
            echo '<span class="error-msg">sql error</span>';
        } 
    }
?>
<nav class="navbar fixed-top navbar-light justify-content-center nav-color">
    <div class="container">
        
        <div class="col "style="color:white">
            
                <h3>Task list</h3>        
                        
            
                <h4><?php echo $row['Full name']; ?></h4>
            
        </div>
        <div class="col text-right">
            <a class="nav-link ml-2" href="newTask.php?sn=<?php echo $shortName ?>" class="btn">Create task</a>
            <a class="nav-link ml-2" href="index.php">Project List</a>      
        </div>
            
    </div>
</nav>

<div class="container">
    <div class="row margin">
        <div class="container">
            <div class="row">
                <div class="col ">
                    <div class="alert alert-danger" role="alert">
                        <h4>Backlog</h4>
                    </div>
                    
                    <div>    
                        <?php
                            $sql1 = "SELECT * FROM tasks WHERE project_short_name = '$shortName' AND state = '1'";
                            $sql2 = "SELECT * FROM tasks WHERE project_short_name = '$shortName' AND state = '2'";
                            $sql3 = "SELECT * FROM tasks WHERE project_short_name = '$shortName' AND state = '3'";
                    
                            if($result = $connection->query($sql1)){
                                $projectsCount = $result->num_rows;
                                if($projectsCount>0){

                                    while ($row = mysqli_fetch_array($result)) {
                                        $tn = $row['project_task_num'];
                                        echo "
                                        <div class='card border-danger mb-3' style='max-width: 22rem;'>
                                            <div class='card-header'>".$row['task_name']."</div>
                                            <div class='card-body text-danger'>
                                                
                                                <div>
                                                    <span class='des-trunc'>" . $row['task_desc'] ."</span>
                                                </div>
                                                <a href='task.php?sn=$shortName&tn=$tn' class=''>more</a>
                                            <select class='custom-select' onchange='location = this.value'>
                                                <option class='no-display' selected='selected'>Status</option>
                                                <option value='changeStatus.php?sn=$shortName&tn=$tn&status=1'>Backlog</option>
                                                <option value='changeStatus.php?sn=$shortName&tn=$tn&status=2'>In progress</option>
                                                <option value='changeStatus.php?sn=$shortName&tn=$tn&status=3'>Done</option>
                                            </select>
                                            </div>
                            
                                        </div>
                                        ";
                                    }
                                    $result->free_result();
                                }
                                else{
                                    echo"<div class='alert alert-secondary' role='alert'>
                                            nothing in here!
                                        </div>";
                                }
                            }
                        
                        ?>
                    </div>
                </div>
                <div class="col">
                    <div class="alert alert-primary" role="alert">
                        <h4>In progress</h4>
                    </div>
                    
                    <div>
                        <?php
                            if($result = $connection->query($sql2)){
                                $projectsCount = $result->num_rows;
                                if($projectsCount>0){

                                    while ($row = mysqli_fetch_array($result)) {
                                        $tn = $row['project_task_num'];
                                        echo "
                                        <div class='card border-secondary mb-3' style='max-width: 22rem;'>
                                            <div class='card-header'>".$row['task_name']."</div>
                                            <div class='card-body text-secondary'>
                                                
                                                <div>
                                                    <span class='des-trunc'>" . $row['task_desc'] ."</span>
                                                </div>
                                                <a href='task.php?sn=$shortName&tn=$tn' class=''>more</a>
                                            <select class='custom-select' onchange='location = this.value'>
                                                <option class='no-display' selected='selected'>Status</option>
                                                <option value='changeStatus.php?sn=$shortName&tn=$tn&status=1'>Backlog</option>
                                                <option value='changeStatus.php?sn=$shortName&tn=$tn&status=2'>In progress</option>
                                                <option value='changeStatus.php?sn=$shortName&tn=$tn&status=3'>Done</option>
                                            </select>
                                            </div>
                            
                                        </div>
                                        ";
                                    }
                                    $result->free_result();
                                }
                                else{
                                    echo"<div class='alert alert-secondary' role='alert'>
                                            nothing in here!
                                        </div>";
                                }
                            }
                            
                        ?>
                    </div>
                </div>
                <div class="col ">
                    <div class="alert alert-success" role="alert">
                        <h4>Done</h4>
                    </div>
                    
                    <div>
                        <?php
                            if($result = $connection->query($sql3)){
                                $projectsCount = $result->num_rows;
                                if($projectsCount>0){

                                    while ($row = mysqli_fetch_array($result)) {
                                        $tn = $row['project_task_num'];
                                        echo "
                                        <div class='card border-success mb-3' style='max-width: 22rem;'>
                                            <div class='card-header'>".$row['task_name']."</div>
                                            <div class='card-body text-success'>
                                                
                                                <div>
                                                    <span class='des-trunc'>" . $row['task_desc'] ."</span>
                                                </div>
                                                <a href='task.php?sn=$shortName&tn=$tn' class=''>more</a>
                                            <select class='custom-select' onchange='location = this.value'>
                                                <option class='no-display' selected='selected'>Status</option>
                                                <option value='changeStatus.php?sn=$shortName&tn=$tn&status=1'>Backlog</option>
                                                <option value='changeStatus.php?sn=$shortName&tn=$tn&status=2'>In progress</option>
                                                <option value='changeStatus.php?sn=$shortName&tn=$tn&status=3'>Done</option>
                                            </select>
                                            </div>
                            
                                        </div>
                                        ";
                                    }
                                    $result->free_result();
                                }
                                else{
                                    echo"<div class='alert alert-secondary' role='alert'>
                                            nothing in here!
                                        </div>";
                                }
                            }
                            
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
        
</div>

<?php $connection->close(); ?>
<?php include 'footer.php';?>
