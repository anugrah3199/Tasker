
<?php
    session_start();
    
    if(isset($_SESSION['logged-in'])){
        header('Location: index.php');
        exit();
    }
?>
<script>
    setTimeout(function() {
  $("#alert").fadeOut().empty();
}, 1000);
</script>
<?php include 'header.php';?>
<div class="border border-primary rounded shadow login">
    <h3 class="text-center pt-5">Log in</h3>
    <div class="container mt-5 p-3">    
        <form method="post" action="loginValidation.php">
            <div class="form-group">
                <label for="username">Login:</label>
                <input type="text"class="form-control" name="username">
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" name="password">
            </div>
            <button type="submit" class="btn btn-primary btn-block">Log in</button>
        </form>
        <div id ="alert"class="container mt-3 text-center">
        <?php
        
        if(isset($_SESSION['loginError'])){
            echo $_SESSION['loginError'];
        }
        ?>
        </div>
        
   </div>
    
</div>

<?php include 'footer.php';?>