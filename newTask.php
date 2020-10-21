<?php
    session_start();
    if(!(isset($_SESSION['logged-in']))){
        header('Location: login.php');
        exit();
    }
    $shortName = $_GET['sn'];
?>
<?php include 'header.php';?>
<nav class="navbar fixed-top navbar-light justify-content-center nav-color">
    <div class="container">
        
        <div class="col ">
            <span>
                <h3 class="text-center pt-5">New Task <span> for <?php echo $shortName; ?></span></h3>        
            </span>            
            <span class="navbar-text ml-2">
                
            </span>
        </div>
        <div class="col">
            <!-- <a class="nav-link ml-2" href="newTask.php?sn=" class="btn">Create task</a>
            <a class="nav-link ml-2" href="index.php">Project List</a>       -->
        </div>
            
    </div>
</nav>

<div class="border border-primary rounded shadow login">
    
    <div class="container mt-5 p-3">
        <form method="post" action="newTaskValidation.php?sn=<?php echo $shortName; ?>">
            <div class="form-group">
                <label for="taskTitle">Title:</label>
                <textarea name="taskTitle" class="form-control"> </textarea>
            </div>
            <div class="form-group">
                <label for="short">Description:</label>
                <textarea name="taskDescription" class="form-control"></textarea>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Add</button>
        </form>
        <?php
            if(isset($_SESSION['addProjectError'])){
                echo $_SESSION['addProjectError'];
                unset($_SESSION['addProjectError']);
            }
        ?>
    </div>
</div>

<?php include 'footer.php';?>