<?php
  session_start();

  // If the session vars aren't set, try to set them with a cookie
    if (!isset($_SESSION['user_id'])) {
        if (isset($_COOKIE['user_id']) && isset($_COOKIE['username'])) {
            $_SESSION['user_id'] = $_COOKIE['user_id'];
            $_SESSION['username'] = $_COOKIE['username'];
        }
    }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Guitar Wars - Remove a High Score</title>
        <link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
    <?php
    require_once('appvars.php');
    require_once('connectvars.php');

    // Make sure the user is logged in before going any further.
    if(!isset($_SESSION['user_id'])) {
        echo '<p class="login">Please <a href="login.php">log in</a> to access this page.</p>';
        exit();
    }
    
    // Get the data from the GET
    if(isset($_GET['id'])) {
        $id = $_GET['id'];
    
        // Connect to DB to remove workout
        $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        
        // Delete the score data from the database
        $query = "DELETE FROM exercise_log WHERE id = $id LIMIT 1";
        mysqli_query($dbc, $query);
        mysqli_close($dbc);
    }
    
    if(isset($_GET['user_id'])) {
        // Return to viewprofile
        header('Location: viewprofile.php?user_id=' . $_GET['user_id']);
    }
?>
</body>
</html>