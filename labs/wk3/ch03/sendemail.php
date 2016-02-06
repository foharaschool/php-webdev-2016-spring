<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Send Email</title>
</head>
<body>
    <?php
        // Initialize variables
        $from = 'fohara@madisoncollege.edu';
        $subject = $_POST['subject'];
        $message = $_POST['elvismail'];
        
        // connect to db
        $dbc = mysqli_connect('localhost', 'root', '', 'elvis_store')
                or die('Error conecting to server');
        
        $query = "SELECT * FROM email_list";
        $result = mysqli_query($dbc, $query)
                or die('Error querying database');
        
        while($row = mysqli_fetch_array($result)) {
            $first_name = $row['first_name'];
            $last_name = $row['last_name'];
            
            $msg = "Dear $first_name $last_name,\n$message";
            $to = $row['email'];
            mail($to, $subject, $msg, 'From:' . $from);
            echo 'Email sent to: ' . $to . '<br />';
        }
        mysqli_close($dbc);
    ?>
</body>
</html>