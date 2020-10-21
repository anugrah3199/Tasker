<?php
    session_start();
    if(!(isset($_SESSION['logged-in']))){
        header('Location: login.php');
        exit();
    }
    
?>
<?php include 'header.php';?>

<div class="border border-success rounded shadow login">
    <h3 class="text-center pt-5">New project</h3>
    <div class="container mt-5 p-3">
        <form method="post" action="newProjectValidation.php">
            <div class="form-group">
                <label for="full">Full project name:</label>
                <input type="text" class="form-control" name="full">
            </div>
            <div class="form-group">
                <label for="short">Short project name:</label>
                <input type="text" class="form-control" name="short">
            </div>
            <button type="submit" class="btn btn-success btn-block">Add new project</button>
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