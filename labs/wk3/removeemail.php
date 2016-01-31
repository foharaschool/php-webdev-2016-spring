<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Email Removed</title>
</head>
<body>
    <?php
        $email = $_POST['email'];
        
        $dbc = mysqli_connect('localhost', 'root', '', 'elvis_store')
                or die('Error connecting to server');
        
        $query = "DELETE FROM email_list WHERE email = '$email'";
        
        $result = mysqli_query($dbc, $query)
                or die('Error querying database');
                
        mysqli_close($dbc);
        
        echo "$email has been removed from the database";
    ?>
</body>
</html>