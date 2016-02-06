<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Make Me Elvis - Send Email</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>

<?php
    // Set Globals
        $from = 'elmer@makemeelvis.com';
        $subject = $_POST['subject'];
        $text = $_POST['elvismail'];
        
    // Check to see if form has ever been submitted
    if(isset($_POST['Submit'])) {
        // Set flags and initialize error array
        $output_form = false;
        $ready_to_send = true;
        $error_messsages = array();
        
        
        // Test for blank fields
        if(empty($subject)) {
            array_push($error_messsages, 'Please enter a subject');
            $ready_to_send = false;
        }
        
        if(empty($text)) {
            array_push($error_messsages, 'Please enter a message');
            $ready_to_send = false;
        }
        
        // Test flag and run query on success
        if($ready_to_send) {
            // Connect to db
            $dbc = mysqli_connect('localhost', 'root', '', 'elvis_store')
                    or die('Error conecting to server');
            
            $query = "SELECT * FROM email_list";
            $result = mysqli_query($dbc, $query)
                    or die('Error querying database.');
            
            while ($row = mysqli_fetch_array($result)){
                $to = $row['email'];
                $first_name = $row['first_name'];
                $last_name = $row['last_name'];
                $msg = "Dear $first_name $last_name,\n$text";
                mail($to, $subject, $msg, 'From:' . $from);
                echo 'Email sent to: ' . $to . '<br />';
            } 
            
            mysqli_close($dbc);
        }
        
        // Echo errors if !$ready_to_send
        foreach($error_messsages as $error_message) {
            echo $error_message . '<br />';
        }
        
        // Regenerate form if errors
        if(isset($error_messsages)) {
            $output_form = true;
        }
    }
    
    else {
        $output_form = true;
    }
?>

<?php
    // Check flag to output form
    if ($output_form) {
?>
    <img src="blankface.jpg" width="161" height="350" alt="" style="float:right" />
    <img name="elvislogo" src="elvislogo.gif" width="229" height="32" border="0" alt="Make Me Elvis" />
    <p><strong>Private:</strong> For Elmer's use ONLY<br />
            Write and send an email to mailing list members.</p>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="subject">Subject of email:</label><br />
        <input id="subject" name="subject" type="text" size="30" value="<?php echo $subject; ?>"/><br />
        <label for="elvismail">Body of email:</label><br />
        <textarea id="elvismail" name="elvismail" rows="8" cols="40"><?php echo $text; ?></textarea><br />
        <input type="submit" name="Submit" value="Submit" />
    </form>
<?php
    }
?>

</body>
</html>
