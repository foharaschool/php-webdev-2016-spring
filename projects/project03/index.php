<?php
    // Start the session
    session_start();
    
    // Kill any active sessions
    session_unset();

?>
<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Our Blog</title>
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
?>

    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">Project 3</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <form class="navbar-form navbar-right" action="authorize3.php" method="post">
                    <div class="form-group">
                        <input type="text" placeholder="username" class="form-control" name="username">
                    </div>
                    <div class="form-group">
                        <input type="password" placeholder="Password" class="form-control" name="password">
                    </div>
                    <button type="submit" class="btn btn-success">Sign in</button>
                </form>
            </div><!--/.navbar-collapse -->
        </div>
    </nav>

    <!-- Main jumbotron -->
    <div class="jumbotron">
        <div class="container">
            <h1>Our Blog</h1>
        </div>
    </div>
    <div class="container">
        <section class="col-md-8 entries">
            <?php
                // Print out all posts, in reverse order
                $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
                        or die('There was a problem connecting to the server');
                
                $now = time();
                $endofday = strtotime("midnight", $now) - 1;
                
                $query = "SELECT * FROM blogs WHERE date <= $endofday ORDER BY date DESC, id DESC";
                
                $result = mysqli_query($dbc, $query)
                        or die('Error querying stories from database');
        
                date_default_timezone_set("America/Chicago");
                while($row = mysqli_fetch_array($result)) {
                    $fetched_story = $row['post'];
                    $timestamp = $row['date'];
                    $title = $row['title'];
                    
                    echo '<div class="post">'
                            . '<p><strong>' . date("n\/j\/Y", $timestamp) . '</strong></p>'
                            . '<h2>' . $title . '</h2>'
                            . '<p>' . $fetched_story . '</p>'
                            . '</div>';
                }
                
                mysqli_close($dbc);
            ?>
        </section>
    </div>
</body>
</html>