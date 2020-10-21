<?php
    session_start();
    if(!(isset($_SESSION['logged-in']))){
        header('Location: main.php');
        exit();
    }
    
    require_once "connect.php";

    $connection = new mysqli($host, $db_user, $db_password, $db_name);

    if($connection->connect_errno!=0){
        echo "Error: ".$connection->connect_errno . "<br>";
        echo "Description: " . $connection->connect_error;
        exit();
    }
    $user = $_SESSION['user']
?>

<?php include 'header.php';?>

<div class="container ">
    <nav class="navbar fixed-top navbar-light justify-content-center nav-color">
        <div class="container">
            
                <div class="col "style = "color:white;">
                    
                        <h3>Projects list</h3>        
                               
                    
                        <h4><?php echo 'Logged in as ' . $user . '. '; ?></h4>
                    
                </div>
                <div class="col text-right">
                    <a class="nav-link ml-2" href="newProject.php">Create board</a>
                    <a class="nav-link ml-2" href="logout.php">logout</a>      
                </div>
            
        </div>
    </nav>
    
    <!-- <div class="border rounded shadow margin"> -->
        
                <?php
                
                $sql = "SELECT * FROM projects where user='$user'";

                if($result = $connection->query($sql)){
                    $projectsCount = $result->num_rows;
                    if($projectsCount>0){
                            
                        while ($row = mysqli_fetch_array($result)) {
                            $sn = $row['Short name'];
                            $sumSQL = "SELECT count(*) as tasksLeft FROM `tasks` WHERE project_short_name = '$sn' AND state != 3 ";
                            $sumResult = $connection->query($sumSQL);
                            $row2 = $sumResult->fetch_assoc();
                            echo "
                            <table class='table table-striped margin shadow'>
                                <thead>
                                    <tr>
                                        <th style='width: 30%'>Full name</th>
                                        <th>Short name</th>
                                        <th>Tasks</th>
                                        <th style='width: 20%'>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>".($row['Full name'])."</td>
                                        <td>".($row['Short name'])."</td>
                                        <td>".$row2['tasksLeft']."</td>
                                        <td><a class='btn btn-outline-info' href='board.php?sn=".$row['Short name']."' class='btn'>View</a>
                                        <a class='btn btn-outline-danger' href='deleteboard.php?id=".$row['id']."' class='btn'>delete</a></td>
                                        
                                    </tr>
                                </tbody>
                            </table>";
                        }
                        $result->free_result();
                    }
                    else{
                        echo "
                        <div class='alert alert-secondary margin' role='alert'>
                            nothing in here!
                        </div>
                        ";
                    }
                }
                
                ?>
        <div class="container mt-3 text-center">
            <?php
                if(isset($_SESSION['newProjectSuccess'])){
                    echo $_SESSION['newProjectSuccess'];
                    unset($_SESSION['newProjectSuccess']);
                }
            ?>
        </div>
    <!-- </div> -->
</div>

<?php $connection->close(); ?>
<?php include 'footer.php';?>
