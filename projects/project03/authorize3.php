<?php
    session_start();
    
    // Username and password for authentication
    $username = 'bloggy';
    $password = 'blogger';
    
    // Set Session Variables
    $_SESSION['username'] = trim($_POST['username']);
    $_SESSION['password'] = trim($_POST['password']);
    $_SESSION['valid'] = 0;
    
    echo $_SESSION['username'] . '<br />';
    echo $_SESSION['password'] . '<br />';
    
    
    if((!isset($_SESSION['username']) || !isset($_SESSION['password'])
            || ($_SESSION['username'] != $username) || ($_SESSION['password'] != $password))) {
        echo 'I made it into the you have the wrong password section';
        // Username / password incorrect or not delivered; send auth headers
        header('HTTP/1.1 401 Unauthorized');
        session_destroy();
        exit('<h2>Our Blog</h2><p>Sorry, you must enter a valid user name and password to access this page</p>');
    }
    
    if(($_SESSION['username'] == $username) && ($_SESSION['password'] == $password)) {
        $_SESSION['valid'] = 1;
        echo 'I made it into the you have the correct password section';
        header("Location: https://php-mysql-2016-spring-foharaschool.c9users.io/projects/project03/admin3.php");
    }
?>