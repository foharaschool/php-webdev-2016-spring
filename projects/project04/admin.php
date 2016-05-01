<?php
     session_start();
     
    // Username and password for authentication
    $username = 'p4';
    $password = 'p4';
    
    if(isset($_POST['submit'])) {
        // Set Session Variables
        $_SESSION['username'] = trim($_POST['username']);
        $_SESSION['password'] = trim($_POST['pwd']);
        $_SESSION['valid'] = 0;
        
        
        if((!isset($_SESSION['username']) || !isset($_SESSION['password'])
                || ($_SESSION['username'] != $username) || ($_SESSION['password'] != $password))) {
            // Username / password incorrect or not delivered; Output error
            $failure = 'Incorrect Username/Password';
        }
        
        if(($_SESSION['username'] == $username) && ($_SESSION['password'] == $password)) {
            $_SESSION['valid'] = 1;
            echo 'I made it into the you have the correct password section';
            header("Location: https://php-mysql-2016-spring-foharaschool.c9users.io/projects/project04/");
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Project Admin</title>
    <!-- jQuery -->
    <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
    <!-- Bootstrap Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <!-- Bootstrap Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="main.css">
</head>
<body>
    <!-- Front end project backlog form -->
    <div class="container">
        <div class="col-md-4 col-md-offset-4 login">
            <form class="form-signin" action="<?= $_SERVER['PHP_SELF']; ?>" method="post">
                <h2 class="form-signin-heading">Please sign in</h2>
                <div class="form-group">
                    <label for="username" class="sr-only">Email address</label>
                    <input type="username" name="username" class="form-control" placeholder="Username" required autofocus>
                </div>
                <div class="form-group">
                    <label for="pwd" class="sr-only">Password</label>
                    <input type="password" name="pwd" class="form-control" placeholder="Password" required>
                </div>
                <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Sign in</button>
            </form>
            <div class="message">
                <h3 class="failure"><?= $failure ?></h3>
            </div>
        </div>
    </div> <!-- /container -->
</body>
</html>