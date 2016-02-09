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
</head>
<body>
    
<?php
    // Collect inputs from form if submitted
    if(isset($_POST['submit'])) {
        // Set variables
        $output_form = false;
        $person_name = $_POST['person-name'];
        $ailment = $_POST['ailment'];
        $noun1 = $_POST['noun1'];
        $bodypart1 = $_POST['bodypart1'];
        $adjective1 = $_POST['adjective1'];
        $bodypart2 = $_POST['bodypart2'];
        $noun2 = $_POST['noun2'];
        $medicine = $_POST['medicine'];
        $fav_drink = $_POST['fav-drink'];
        $noun3 = $_POST['noun3'];
        
        // Collect and store form submission
        // Validate submission
        // Build story iterations and insert stored information
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
                         <input type="text" class="form-control" placeholder="Name" name="person-name">
                         <label for="ailment">Physical ailment or sickness:</label>
                         <input type="text" class="form-control" placeholder="Ailment" name="ailment">
                         <label for="noun1">Noun:</label>
                         <input type="text" class="form-control" placeholder="Noun" name="noun1">
                         <label for="bodypart1">Name of body part:</label>
                         <input type="text" class="form-control" placeholder="A body part" name="bodypart1">
                         <label for="adjective1">Adjective:</label>
                         <input type="text" class="form-control" placeholder="Adjective" name="adjective1">
                         <label for="bodypart2">Another body part:</label>
                         <input type="text" class="form-control" placeholder="A bodypart" name="bodypart2">
                         <label for="noun2">Noun:</label>
                         <input type="text" class="form-control" placeholder="Noun" name="noun2">
                         <label for="medicine">Kind of medicine:</label>
                         <input type="text" class="form-control" placeholder="Medicine" name="medicine">
                         <label for="fav-drink">Your favorite drink:</label>
                         <input type="text" class="form-control" placeholder="Favorite Drink" name="fav-drink">
                         <label for="noun3">Noun:</label>
                         <input type="text" class="form-control" placeholder="Noun" name="noun3">
                    </div>
                    <button type="submit" name="submit" value="Submit" class="btn btn-default">Submit</button>
                    <button type="reset" name="clear" value="Clear" class="btn btn-default">Clear</button>
                </form>
            </div>
        </section>
    </div>
<?php
    }
?>
</body>
</html>