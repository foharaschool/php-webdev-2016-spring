<?php
    /*********************************************************/
    // Project 4 high level design
    /*********************************************************/
    // Project Backlog
    // Confirm Desired fields
    // Build front end backlog item form
    // Design and create DB and projects table
    // Test Correct Database insertion
    // Add Backlog view to index
    // Add Page Security and create login
    
    // Current Project
    // Add status table to DB and link to projects table
    // Add Current project fields to DB
    // Add current project selector to admin ui
    // Create and Display Current Project View on index
    
    // Retrospective
    // Create and link Retrospective table in DB
    // Add retrospective ui to admin page or as a fired page when complete button clicked
    
    // Admin global variables
    $output_form = false;
    
    if(isset($_POST['submit-new'])) {
        
        
    }
    
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Project Admin</title>
    <!-- jQuery -->
    <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
    <!-- Bootstrap Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <!-- Bootstrap Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="madlib.css">
</head>
<body>
    <!-- Front end project backlog form -->
    <div class="container">
        <section class="newProject col-md-8 col-md-offset-2">
            <h1>New Project</h1>
            <form role="form" name="form01" action="<?= $_SERVER['PHP_SELF']; ?>" method="post">
                <div class="form-group">
                    <label for="project-name">Project Name:</label>
                    <input type="text" class="form-control" placeholder="Project Name" name="project-name">
                </div>
                <div class="form-group">
                    <label for="description">Project Description:</label>
                    <textarea class="form-control" rows="5" name="description" placeholder="Project Description"></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" name="submit-new" value="Submit" class="btn btn-primary">Submit</button>
                    <button type="reset" name="clear" value="Clear" class="btn btn-default">Clear</button>
                </div>
            </form>
            
        </section>
    </div>
</body>
</html>