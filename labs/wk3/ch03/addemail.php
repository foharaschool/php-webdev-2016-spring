<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Email</title>
</head>
<body>
    <?php
        $first_name = $_POST['firstname'];
        $last_name = $_POST['lastname'];
        $email = $_POST['email'];
        
        $dbc = mysqli_connect('localhost', 'root', '', 'elvis_store')
                or die('There was a problem connecting to the database');
        
        $query = "INSERT INTO email_list(first_name, last_name, email) " .
                "VALUES('$first_name', '$last_name', '$email')";
                
        $result = mysqli_query($dbc, $query)
                or die('There was a proeblem running the query');
        
        mysqli_close($dbc);
        
        echo 'Customer added.';
    ?>
</body>
</html>