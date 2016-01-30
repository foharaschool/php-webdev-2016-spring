<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Aliens Abducted Me - Report an Abduction</title>
</head>
<body>
    <h2>Aliens Abducted Me - Report an Abduction</h2>
    
<?php
    $name = $_POST['firstname'] . ' ' . $_POST['lastname'];
    $when_it_happened = $_POST['whenithappened'];
    $how_long = $_POST['howlong'];
    $alien_number = $_POST['howmany'];
    $alien_description = $_POST['aliendescription'];
    $what_they_did = $_POST['whattheydid'];
    $fang_spotted = $_POST['fangspotted'];
    $other_comments = $_POST['other'];
    $email = $_POST['email'];
    // email subject
    $subject = 'Aliens Abducted Me - Abduction Report';
    // email recipient
    $mail_to = 'fohara@madisoncollege.edu';
    
    // echo responses to form
    echo 'Thanks for submitting the form.<br />';
    echo 'You were abducted ' . $when_it_happened;
    echo ' and were gone for ' . $how_long . '<br />';
    echo ' Number of aliens: ' . $alien_number . '<br />';
    echo 'Describe them: ' . $alien_description . '<br />';
    echo 'The aliens did this: ' . $what_they_did . '<br />';
    echo 'Was Fang there? ' . $fang_spotted . '<br />';
    echo 'Other comments ' . $other_comments . '<br />';
    echo 'Your email address is ' . $email;
    
    
    // email message
    $msg = "$name was abducted $when_it_happened and was gone for $how_long.\n" .
    "Number of aliens: $alien_number\n" .
    "Alien description: $alien_description\n" .
    "What they did: $what_they_did\n" .
    "Fang spotted: $fang_spotted\n" .
    "Other comments: $other_comments";
    
    // send message
    mail($mail_to, $subject, 'From:' . $email);
?>
</body>
</html>