<?php
    session_start();
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Blog Admin</title>
<!-- jQuery -->
<script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
<link rel="stylesheet" href="style3.css">

</head>
<body>
<?php
    require_once('connectvars3.php');
    
    // Set timezone for date operations
    date_default_timezone_set("America/Chicago");
    
    // Make sure the user is logged in before going any further.
    if(($_SESSION['valid'] != 1)) {
        echo '<p class="login">Please <a href="index.php">log in</a> to access this page.</p>';
        exit();
    }
    
    // Collect inputs from form if submitted
    if(isset($_POST['submit'])) {
        // Reset success message
        $success = '';
        
        // Initialize POST variables
        $title = $_POST['title'];
        $date = strtotime($_POST['date']);
        $post = $_POST['enter-blog'];
        
        // Basic validation
        if(!empty($title) && !empty($date) && !empty($post)) {
            // Write success message
            $success = '<strong><p>Blog created</p></strong>';
            // insert blog
            $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
                    or die('There was a problem connecting to the server');
            
            $query = "INSERT INTO blogs(title, date, post) VALUES('$title', '$date', '$post')";
            
            $result = mysqli_query($dbc, $query)
                    or die('There was a problem querying the database');
                    
            mysqli_close($dbc);
            
            // Send success message
            $success = 'Blog entered and will display on given date';
            
        } else {
            $errormsg = 'Invalid entry.  Please retry';
        }
    }
?>
    <div class="container">
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="navbar-header col-md-2 col-md-offset-1">
                <a class="navbar-brand" href="index.php">Project 3</a>
            </div>
            <div class="navbar-header col-md-2 col-md-offset-7">
                <a class="navbar-brand" title="Log Out" href="index.php">Logout</a>
            </div>
        </nav>
        <section class="entry topfix">
            <h2>Blog Entry</h2>
            <form role="form" name="form01" action="<?= $_SERVER['PHP_SELF']; ?>" method="post">
                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="title">Blog Title:</label>
                        <input type="text" class="form-control" placeholder="Title" name="title">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="date">Blog Date:</label>
                        <input type="text" class="form-control" name="date" value="<?= date('Y-m-d') ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="enter-blog">Entry:</label>
                        <textarea class="form-control" rows="6" name="enter-blog"></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-4">
                        <button type="submit" name="submit" value="Submit" class="btn btn-primary">Submit</button>
                        <button type="reset" name="clear" value="Clear" class="btn btn-default">Clear</button>
                    </div>
                </div>
            </form>
        </section>
        <?php
            if(isset($success)) {
        ?>
        <section class="success">
            <?php
                echo $success;
            ?>
        </section>
        <?php
            }
        ?>
    </div>