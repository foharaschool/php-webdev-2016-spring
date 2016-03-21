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
    <title>Exercise Logger - View Profile</title>
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
        <div class="col-md-4">
        <h3>Exercise Logger - View Profile</h3>

<?php
    require_once('appvars.php');
    require_once('connectvars.php');

    // Make sure the user is logged in before going any further.
    if (!isset($_SESSION['user_id'])) {
        echo '<p class="login">Please <a href="login.php">log in</a> to access this page.</p>';
        exit();
    }
    else {
        echo('<p class="login">You are logged in as ' . $_SESSION['username'] . '. <a href="logout.php">Log out</a>.</p>');
    }

    // Connect to the database
    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

    // Grab the profile data from the database
    if (!isset($_GET['user_id'])) {
        $query = "SELECT username, first_name, last_name, gender, birthdate, weight, picture FROM exercise_user WHERE user_id = '" . $_SESSION['user_id'] . "'";
    }
    else {
        $query = "SELECT username, first_name, last_name, gender, birthdate, weight, picture FROM exercise_user WHERE user_id = '" . $_GET['user_id'] . "'";
    }
    $data = mysqli_query($dbc, $query);

    if (mysqli_num_rows($data) == 1) {
        // The user row was found so display the user data
        $row = mysqli_fetch_array($data);
        echo '<table>';
        if (!empty($row['username'])) {
            echo '<tr><td class="label">Username:</td><td>' . $row['username'] . '</td></tr>';
        }
        if (!empty($row['first_name'])) {
            echo '<tr><td class="label">First name:</td><td>' . $row['first_name'] . '</td></tr>';
        }
        if (!empty($row['last_name'])) {
            echo '<tr><td class="label">Last name:</td><td>' . $row['last_name'] . '</td></tr>';
        }
        if (!empty($row['gender'])) {
            echo '<tr><td class="label">Gender:</td><td>';
            if ($row['gender'] == 'M') {
                echo 'Male';
            }
            else if ($row['gender'] == 'F') {
                echo 'Female';
            }
            else {
                echo '?';
            }
            
            echo '</td></tr>';
        }
        if (!empty($row['birthdate'])) {
            if (!isset($_GET['user_id']) || ($user_id == $_GET['user_id'])) {
                // Show the user their own birthdate
                echo '<tr><td class="label">Birthdate:</td><td>' . $row['birthdate'] . '</td></tr>';
            }
            else {
                // Show only the birth year for everyone else
                list($year, $month, $day) = explode('-', $row['birthdate']);
                echo '<tr><td class="label">Year born:</td><td>' . $year . '</td></tr>';
            }
        }
        if (!empty($row['weight'])) {
            echo '<tr><td class="label">Weight:</td><td>' . $row['weight'] . '</td></tr>';
        }
        if (!empty($row['picture'])) {
            echo '<tr><td class="label">Picture:</td><td><img src="' . MM_UPLOADPATH . $row['picture'] .
                '" alt="Profile Picture" /></td></tr>';
        }
        echo '</table>';
        if (!isset($_GET['user_id']) || ($user_id == $_GET['user_id'])) {
            echo '<p>Would you like to <a href="editprofile.php">edit your profile</a>?</p>';
            echo '<p>Or, <a href="logworkout.php">log an exercise</a>';
        }
    } else {
        echo '<p class="error">There was a problem accessing your profile.</p>';
    }

    mysqli_close($dbc);
?>
        </div>
        <div class="col-md-8">
            <h3> Workout History</h3>
            <table class="table-bordered">
                <tr>
                    <th>Date</th>
                    <th>Type</th>
                    <th>Time in Minutes</th>
                    <th>Heart Rate</th>
                    <th>Calories Burned</th>
                </tr>
                <?php
                    // Display workout history
                    // Retrieve the user data from MySQL
                    $user_id = $_GET['user_id'];
                    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
                    $query = "SELECT id, exercise_date, exercise_type, time_in_minutes, heartrate, calories_burned FROM exercise_log WHERE user_id = $user_id ORDER BY exercise_date DESC LIMIT 15";
                    $data = mysqli_query($dbc, $query)
                            or die("There is a problem with your exercise log query");
                
                    // Loop through the array of user data, filling out the table
                    while ($row = mysqli_fetch_array($data)) {
                        echo '<tr><td>' . $row['exercise_date']
                                . '</td><td>' . $row['exercise_type']
                                . '</td><td>' . $row['time_in_minutes']
                                . '</td><td>' . $row['heartrate']
                                . '</td><td>' . $row['calories_burned']
                                . '</td><td><a href="removeworkout.php?id=' . $row['id'] . '&amp;user_id=' . $user_id . '"><span class="glyphicon glyphicon-trash"></span></a>'
                                . '</td></tr>';
                    }
                    mysqli_close($dbc);
                ?>
            </table>
        </div>
    </div>
</body> 
</html>
