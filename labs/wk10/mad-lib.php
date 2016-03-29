<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Mad Libs</title>
<!-- jQuery -->
<script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
<link rel="stylesheet" href="madlib.css">
</head>
<body>
    
<?php
    // External Code
    require_once('connectvars.php');
    require_once('MadLibs.php');
    
    // Instantiate MadLibs Class
    $madlib_obj = new MadLibs();
    
    
    // Collect inputs from form if submitted
    if(isset($_POST['submit'])) {
        // Set variables
        $error_message;
        $output_form = false;
        $run_insert = false;
        $madlib_obj->setPerson_name($_POST['person-name']);
        $madlib_obj->setAilment($_POST['ailment']);
        $madlib_obj->setNoun1($_POST['noun1']);
        $madlib_obj->setBodypart1($_POST['bodypart1']);
        $madlib_obj->setAdjective1($_POST['adjective1']);
        $madlib_obj->setBodypart2($_POST['bodypart2']);
        $madlib_obj->setNoun2($_POST['noun2']);
        $madlib_obj->setMedicine($_POST['medicine']);
        $madlib_obj->setFav_drink($_POST['fav-drink']);
        $madlib_obj->setNoun3($_POST['noun3']);
        
        // Validate submission
        $everything_set = true;
        foreach($user_inputs as $input) {
            if(empty($input)) {
                $everything_set = false;
            }
        }
        if($everything_set) {
            $output_form = true;
            $run_insert = true;
        } else {
            $error_message = 'You forgot to enter an input.  All fields required';
            $output_form = true;
        }
            
        if($run_insert) {
            // Collect and store inputs
            // Build query by looping over array for each input
            // $query = "INSERT INTO madlib_entry(person_name, ailment, noun1, bodypart1, adjective, bodypart2, noun2, medicine, fav_drink, noun3) VALUES(";
            // foreach($user_inputs as $user_key => $user_input) {
            //     if($user_key != sizeof($user_inputs)- 1) {
            //         $query .= " '$user_input' , ";
            //     } else {
            //         $query .= " '$user_input')";
            //     }
            $madlib_obj->runInsert();
        }


        // Run input insert query
        // $result = mysqli_query($dbc, $query)
        //         or die('There was a problem running the insert query');
    
        // Create Story
        // $story = "<h3>Doctor Visit</h3>"
        //         . "<p>Patient: Thank you very much for seeing me, Doctor $person_name.</p>\n"
        //         . "<p>Doctor: What seems to be the problem, young $noun1?</p>\n"
        //         . "<p>Patient: When I move my $bodypart1, it hurts.</p>\n"
        //         . "<p>Doctor: Then, don''t move your $bodypart1.</p>\n"
        //         . "<p>Patient: Also, my $bodypart2 aches. Could you give me some $medicine?</p>\n"
        //         . "<p>Doctor: That may not be necessary, yet. Let me take a look. Open your $noun2 wide. Good. Now, I''m going to listen to your $noun3 beat. Breathe in and out, slowly.</p>\n"
        //         . "<p>Patient: Doctor $person_name, what is wrong with me?</p>\n"
        //         . "<p>Doctor: Unfortunately, you have a $ailment, but don''t worry. You will get better, soon. Take this medication, drink plenty of $fav_drink, rest, and call me if you feel $adjective1.</p>\n";
        
        // Insert $story
        // $query = "INSERT INTO madlib_story(story, time_submit) " .
        //     "VALUES('$story', $time)";
            
        // $result = mysqli_query($dbc, $query)
        //         or die('There was a problem running the story query');
    } else {
        $output_form = true;
    }
    if($output_form) {
?>
    <div class="container">
        <section class="col-md-8 col-md-offset-2">
            <h1>Madlib - Doctor's Visit</h1>
            <div class="form">
                <form class="rounded" role="form" name="form01" action="<?= $_SERVER['PHP_SELF']; ?>" method="post">
                    <div class="form-group">
                         <label for="person-name">Person's Name:</label>
                         <input type="text" class="form-control" placeholder="Name" name="person-name" value="<?= $madlib_obj->getPerson_name() ?>">
                         <label for="ailment">Physical ailment or sickness:</label>
                         <input type="text" class="form-control" placeholder="Ailment" name="ailment" value="<?= $madlib_obj->getAilment() ?>">
                         <label for="noun1">Noun:</label>
                         <input type="text" class="form-control" placeholder="Noun" name="noun1" value="<?= $madlib_obj->getNoun1() ?>">
                         <label for="bodypart1">Name of body part:</label>
                         <input type="text" class="form-control" placeholder="A body part" name="bodypart1" value="<?= $madlib_obj->getBodypart1() ?>">
                         <label for="adjective1">Adjective:</label>
                         <input type="text" class="form-control" placeholder="Adjective" name="adjective1" value="<?= $madlib_obj->getAdjective1() ?>">
                         <label for="bodypart2">Another body part:</label>
                         <input type="text" class="form-control" placeholder="A bodypart" name="bodypart2" value="<?= $madlib_obj->getBodypart2 ?>">
                         <label for="noun2">Noun:</label>
                         <input type="text" class="form-control" placeholder="Noun" name="noun2" value="<?= $madlib_obj->getNoun2() ?>">
                         <label for="medicine">Kind of medicine:</label>
                         <input type="text" class="form-control" placeholder="Medicine" name="medicine" value="<?= $madlib_obj->getMedicine() ?>">
                         <label for="fav-drink">Your favorite drink:</label>
                         <input type="text" class="form-control" placeholder="Favorite Drink" name="fav-drink" value="<?= $madlib_obj->getFav_drink() ?>">
                         <label for="noun3">Noun:</label>
                         <input type="text" class="form-control" placeholder="Noun" name="noun3" value="<?= $madlib_obj->getNoun3() ?>"> 
                    </div>
                    <button type="submit" name="submit" value="Submit" class="btn btn-default">Submit</button>
                    <button type="reset" name="clear" value="Clear" class="btn btn-default">Clear</button>
                    <div class="error">
                        <p class="not-valid"><?PHP echo $error_message; ?></p>
                    </div>
                </form>
            </div>
        </section>
        <section class="col-md-8 col-md-offset-2 stories">
            <?php
                // Print out all stories, in reverse order
                // $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
                //     or die('There was a problem connecting to the database');
                    
                // $query = "SELECT * FROM madlib_story ORDER BY time_submit DESC";
                
                // $result = mysqli_query($dbc, $query)
                // or die('Error querying stories from database');
                
               
        
                // date_default_timezone_set("America/Chicago");
                // while($row = mysqli_fetch_array($result)) {
                //     $fetched_story = $row['story'];
                //     $timestamp = $row['time_submit'];
                    
                //     echo '<div class="story">'
                //             . '<p><strong>' . date("n\/j\/Y h:i:s a \- T", $timestamp) . '</strong></p>'
                //             . $fetched_story
                //             . '</div>';
                // }
                
                 // Methods for selecting and building stories
                $result = $madlib_obj->storyFetch();
                $madlib_obj->buildStory($result);
                
                
            ?>
        </section>
    </div>
    
<?php
    }
?>
</body>
</html>