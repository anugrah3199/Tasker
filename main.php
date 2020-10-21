<?php session_start();?>
<?php include 'header.php';?>
<div class="jumbotron">
        <h1 class="display-4">Hello Welcome to tasker!</h1>
        <p class="lead">This is a simple task management application, where you can list your daily tasks. You can also catergorize them based on their status.</p>
        <hr class="my-4">
        <h2>It's front-end made up of.</h2>
        <p class="lead">
            <ul>
                <li>
                    HTML
                </li>
                <li>
                    CSS  
                </li>
                <li>Bootstrap</li>
                <li>jQuery</li>
            </ul>
        </p>
        <hr class="my-4">
        <h2>Server Side scripting:</h2>
        <p class="lead"><ul><li>PHP</li></ul></p>
        <hr class="my-4">
        <h2> Modules:</h2>
        <p class="lead">
            <ul>
                <li>
                    Authentication
                    <ul>
                        <li>login</li>
                        <li>Register</li>

                    </ul>
                </li>
                <li>
                    Board is used to display and organise task for each project.Functionality of board are:
                    <ul>
                        <li>Create</li>
                        <li>Update</li>
                        <li>Delete</li>
                    </ul>   
                </li>
                <li>task
                    <ul>

                        <li>Create</li>
                        <li>Update</li>
                        <li>Delete</li>
                    </ul>
                </li>
            </ul>
            <a class="btn btn-primary btn-lg" href="login.php" role="button">login</a>
            <a class="btn btn-primary btn-lg" href="register.php" role="button">register</a>
            <hr class="my-4">
            <h2>Team Members:</h2>
            <p class="lead">
                <ul>
                    <li>
                        Anugrah 
                    </li>
                    <li>
                        Varun  
                    </li>
                    <li>Piyush </li>
                    <li>Satyam</li>
                    <li>Sankalp</li>

                </ul>
            </p>
            
        </p>
    </div>
<?php include 'footer.php';?>