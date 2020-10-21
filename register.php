<?php include 'header.php';?>
<div class="border border-success rounded shadow login">
    <h3 class="text-center pt-5">Welcome!</h3>
    <div class="container mt-5 p-3">    
        <form method="post" action="registration.php" autocomplete="off">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text"class="form-control" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" name="password" required>
            </div>
            <button type="submit" name="register" class="btn btn-success btn-block">Register</button>
        </form>
        
        
   </div>
    
</div>

<?php include 'footer.php';?>