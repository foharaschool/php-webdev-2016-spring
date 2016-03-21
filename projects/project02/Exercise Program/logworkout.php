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
    <title>Exercise Logger - Log Workout</title>
    <!-- jQuery -->
    <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
    <h3>Exercise Logger - Log Workout</h3>

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

    if (isset($_POST['submit'])) {
        // Grab the profile data from the POST
        $exercise_date = mysqli_real_escape_string($dbc, trim($_POST['date_exercise']));
        $exercise_type = mysqli_real_escape_string($dbc, trim($_POST['type_exercise']));
        $exercise_time = mysqli_real_escape_string($dbc, trim($_POST['time_exercise']));
        $avg_heartrate = mysqli_real_escape_string($dbc, trim($_POST['heartrate_avg']));
        $user_gender;
        $user_age;
        $user_weight;
        $user_id;
        $calories_burned;
        
        // Run Calorie calculation and update the Workout log in the database
        if (!empty($exercise_date) && !empty($exercise_type) && !empty($exercise_time) && !empty($avg_heartrate)) {
            // Query exercise_user for calorie calculation data
            if (!isset($_GET['user_id'])) {
                $user_id = $_SESSION['user_id'];
                $query = "SELECT gender, weight, TIMESTAMPDIFF(YEAR,birthdate,CURDATE()) AS age FROM exercise_user WHERE user_id = '" . $user_id . "'";
            }
            else {
                $user_id = $_GET['user_id'];
                $query = "SELECT gender, weight, TIMESTAMPDIFF(YEAR,birthdate,CURDATE()) AS age FROM exercise_user WHERE user_id = '" . $user_id . "'";
            }
            $data = mysqli_query($dbc, $query);
        
            if (mysqli_num_rows($data) == 1) {
                // The user row was found so collect the user info
                $row = mysqli_fetch_array($data);
                $user_gender = $row['gender'];
                $user_age = $row['age'];
                $user_weight = $row['weight'];
            }
            
            // Calculate calories burned based on user data
            if($user_gender == 'M') {
                $calories_burned = intval(((-55.0969 + (0.6309 * $avg_heartrate) + (0.090174 * $user_weight) + (0.2017 * $user_age)) / 4.184) * $exercise_time);
            } else {
                $calories_burned = intval(((-20.4022 + (0.4472 * $avg_heartrate) - (0.057288 * $user_weight) + (0.074 * $user_age)) / 4.184) * $exercise_time);
            }

            // Insert workout data into exercise_log
            $query = "INSERT INTO exercise_log(user_id, exercise_date, exercise_type, time_in_minutes, heartrate, calories_burned) VALUES($user_id, '$exercise_date', '$exercise_type', $exercise_time, $avg_heartrate, $calories_burned)";
            
            mysqli_query($dbc, $query)
                    or die("There is a problem with your query");

            // Confirm success with the user
            echo '<p>Your exercise has been successfully logged. Would you like to <a href="viewprofile.php?user_id=' . $_SESSION['user_id'] . '">view your profile</a>?</p>';

            mysqli_close($dbc);
            exit();
        }
        else {
            echo '<p class="error">You must enter all of the exercise data.</p>';
        }
    } // End of check for form submission
?>

    <form enctype="multipart/form-data" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <input type="hidden" name="MAX_FILE_SIZE" value="<?php echo MM_MAXFILESIZE; ?>" />
        <fieldset>
            <legend>Workout Information</legend>
            <label for="date_exercise">Exercise Date:</label>
            <input type="text" id="date_exercise" name="date_exercise" value="<?php if (!empty($exercise_date)) echo $exercise_date; else echo 'yyyy-mm-dd'; ?>" /><br />
            <label for="type_exercise">Exercise Type:</label>
            <select id="type_exercise" name="type_exercise">
                <option value="run" <?php if (!empty($exercise_type) && $exercise_type == 'run') echo 'selected = "selected"'; ?>>Running</option>
                <option value="walk" <?php if (!empty($exercise_type) && $exercise_type == 'walk') echo 'selected = "selected"'; ?>>Walking</option>
                <option value="swim" <?php if (!empty($exercise_type) && $exercise_type == 'swim') echo 'selected = "selected"'; ?>>Swimming</option>
                <option value="lift" <?php if (!empty($exercise_type) && $exercise_type == 'lift') echo 'selected = "selected"'; ?>>Weightlifting</option>
                <option value="yoga" <?php if (!empty($exercise_type) && $exercise_type == 'yoga') echo 'selected = "selected"'; ?>>Yoga</option>
                <option value="sport" <?php if (!empty($exercise_type) && $exercise_type == 'sport') echo 'selected = "selected"'; ?>>Sport</option>
                <option value="other" <?php if (!empty($exercise_type) && $exercise_type == 'other') echo 'selected = "selected"'; ?>>Other</option>
            </select><br />
            <label for="time_exercise">Exercise Time (in minutes):</label>
            <input type="text" id="time_exercise" name="time_exercise" value="<?php if (!empty($exercise_time)) echo $exercise_time; ?>" /><br />
            <label for="heartrate_avg">Heartrate:</label>
            <input type="text" id="heartrate_avg" name="heartrate_avg" value="<?php if (!empty($avg_heartrate)) echo $avg_heartrate; ?>" /><br />
        </fieldset>
        <input type="submit" value="Save Workout" name="submit" />
    </form>
</body> 
</html>
