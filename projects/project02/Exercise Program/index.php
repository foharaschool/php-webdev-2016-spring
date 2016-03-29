<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Exercise Logger: Home</title>
    <!-- jQuery -->
    <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
    <div class="container">
        <div class="col-md-10 col-md-offset-1">
            <h1>The Exercise Logger - There are always more calories to burn!</h1>
        </div>
        <div class="col-md-10 col-md-offset-1">
<?php
    require_once('appvars.php');
    require_once('connectvars.php');
    
    session_start();
    
    // Set session with cookie if vars are not set
    if(!isset($_SESSION['user_id'])) {
        if(isset($_COOKIE['user_id'])) {
            $_SESSION['user_id'] = $_COOKIE['user_id'];
            $_SESSION['username'] = $_COOKIE['username'];
        }
    }

    // Generate navigation menu based on login check
    echo '<ul class="nav">';
    if(isset($_SESSION['username'])) {
        // Generate the navigation menu if login isset
        echo '<h4>Welcome, ' . $_SESSION['username'] . '</h4>';
        echo '<li class="col-md-4"> <a href="viewprofile.php?user_id=' . $_SESSION['user_id'] . '">View Profile</a></li>';
        echo '<li class="col-md-4"><a href="editprofile.php">Edit Profile</a></li>';
        echo '<li class="col-md-4"><a href="logout.php">Log Out (' . $_SESSION['username'] . ')</a></li>';
    } else {
        echo '<li class="col-md-6"><a href="login.php">Log In</a></li>';
        echo '<li class="col-md-6"><a href="signup.php">Sign Up</a></li>';
    }
    echo '</ul>';
    echo '</div>';
    // Connect to the database 
    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 

    // Retrieve the user data from MySQL
    $query = "SELECT user_id, first_name, picture FROM exercise_user WHERE first_name IS NOT NULL ORDER BY join_date DESC LIMIT 5";
    $data = mysqli_query($dbc, $query);

    // Loop through the array of user data, formatting it as HTML
    echo '<div class="col-md-4 col-md-offset-1">';
    echo '<h4>Latest members:</h4>';
    echo '<table class="table">';
    while ($row = mysqli_fetch_array($data)) {
        if (is_file(MM_UPLOADPATH . $row['picture']) && filesize(MM_UPLOADPATH . $row['picture']) > 0) {
            echo '<tr><td><img src="' . MM_UPLOADPATH . $row['picture'] . '" alt="' . $row['first_name'] . '" /></td>';
        } else {
            echo '<tr><td><img src="' . MM_UPLOADPATH . 'nopic.jpg' . '" alt="' . $row['first_name'] . '" /></td>';
        }
        if(isset($_SESSION['user_id'])) {
            echo '<td><a href="viewprofile.php?user_id=' . $row['user_id'] . '">' . $row['first_name'] . '</a></td></tr>';
        } else {
            echo '<td>' . $row['first_name'] . '</td></tr>';
        }
    }
    echo '</table>';
    echo '</div>';

    mysqli_close($dbc);
?>
    </div>
</body> 
</html>
