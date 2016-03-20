<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Exercise Logger - Sign Up</title>
    <!-- jQuery -->
    <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
    <h3>Exercise Logger - Sign Up</h3>

<?php
    require_once('appvars.php');
    require_once('connectvars.php');

    // Connect to the database
    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

    if (isset($_POST['submit'])) {
        // Grab the profile data from the POST
        $username = mysqli_real_escape_string($dbc, trim($_POST['username']));
        $password1 = mysqli_real_escape_string($dbc, trim($_POST['password1']));
        $password2 = mysqli_real_escape_string($dbc, trim($_POST['password2']));

        if (!empty($username) && !empty($password1) && !empty($password2) && ($password1 == $password2)) {
            // Make sure someone isn't already registered using this username
            $query = "SELECT * FROM exercise_user WHERE username = '$username'";
            $data = mysqli_query($dbc, $query);
            if (mysqli_num_rows($data) == 0) {
                // The username is unique, so insert the data into the database
                $query = "INSERT INTO exercise_user (username, password, join_date) VALUES ('$username', SHA('$password1'), NOW())";
                mysqli_query($dbc, $query);

                // Confirm success with the user
                echo '<p>Your new account has been successfully created. You\'re now ready to <a href="login.php">log in</a>.</p>';

                mysqli_close($dbc);
                exit();
            } else {
                // An account already exists for this username, so display an error message
                echo '<p class="error">An account already exists for this username. Please use a different address.</p>';
                $username = "";
            }
        } else {
            echo '<p class="error">You must enter all of the sign-up data, including the desired password twice.</p>';
        }
    }

    mysqli_close($dbc);
?>

    <p>Please enter your username and desired password to sign up for the exercise logger service.</p>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <fieldset>
            <legend>Registration Info</legend>
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" value="<?php if (!empty($username)) echo $username; ?>" /><br />
            <label for="password1">Password:</label>
            <input type="password" id="password1" name="password1" /><br />
            <label for="password2">Password (retype):</label>
            <input type="password" id="password2" name="password2" /><br />
        </fieldset>
        <input type="submit" value="Sign Up" name="submit" />
    </form>
</body> 
</html>
