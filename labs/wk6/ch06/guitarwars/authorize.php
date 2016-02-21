<?php
    // Username and password for authentication
    $username = 'axe';
    $password = 'togrind';
    
    if(!isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW'])
            || ($_SERVER['PHP_AUTH_USER'] != $username) || ($_SERVER['PHP_AUTH_PW'] != $password)) {
        // Username / password incorrect or not delivered; send auth headers
        header('HTTP/1.1 401 Unauthorized');
        header('WWW-AUTHENTICATE: Basic realm="Guitar Wars"');
        exit('<h2>Guitar Wars</h2>Sorry, you must enter a valid user name and password to access this page');
    }
?>