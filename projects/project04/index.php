<?php
    // Start the session
    session_start();

    
    // destroy session on logout, and skip session storage if logout is true
    if($_GET['logout']) {
        session_destroy();
    } else {
        // Store the session logged in variable
        $logged_in = $_SESSION['valid'];
    }

?>
<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Fred's Project Backlog</title>
<!-- jQuery -->
<script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
<link rel="stylesheet" href="main.css">

<!-- Github Calendar -->
<script src="github-calendar.min.js"></script>
<link rel="stylesheet" href="github-calendar.css">

</head>
<?php

    // Link scripts
    require_once('connectvars4.php');
    
    //***** Form Submit *****//
    // Confirm Submit
    if(isset($_POST['submit-new'])) {
        // empty messages
        $success = '';
        $failure = '';
        

        // Confirm fields not empty
        if(!empty($_POST['project-name']) && !empty($_POST['description'])) {
            
            // Collect POST
            $proj_name = $_POST['project-name'];
            $description = $_POST['description'];
            $created_time = time();
            
            // Insert new project into DB
            $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
                    or die('There was a problem connecting to the server');
                    
            $query = "INSERT INTO Projects(name, description, createdDate) VALUES ('$proj_name', '$description', $created_time)";
            
            $result = mysqli_query($dbc, $query)
                    or die('There was a problem running the insert query');
                    
            mysqli_close($dbc);
            
            // Create success message
            $success = "New project, $proj_name successfully submitted";
        } else {
            $failure = 'Missing information.  Please fill in all fields';
        }
    }
    
    // Update Submit
    if(isset($_POST['submit-update'])) {
        // empty messages
        $success = '';
        $failure = '';
        
        // Confirm fields not empty
        if(!empty($_POST['update-project-name']) && !empty($_POST['update-description'])) {
            
            // Collect POST
            $update_proj_id = $_POST['update-project-id'];
            $update_proj_name = $_POST['update-project-name'];
            $update_description = $_POST['update-description'];
            $update_status = $_POST['update-project-status'];
            $completed_time = time();
            
            // Update project into DB
            $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
                    or die('There was a problem connecting to the server');
                    
            // Update with conditional complete date if project marked as complete
            if($update_status == 8) {
                $query = "UPDATE Projects SET name = '$update_proj_name', description = '$update_description', statusId = $update_status, completedDate = $completed_time WHERE projectId = $update_proj_id";
            } else {
                $query = "UPDATE Projects SET name = '$update_proj_name', description = '$update_description', statusId = $update_status WHERE projectId = $update_proj_id";
            }
            $result = mysqli_query($dbc, $query)
                    or die('There was a problem running the update query');
                    
            mysqli_close($dbc);
            
            // Create success message
            $success = "New project, $proj_name successfully submitted";
        } else {
            $failure = 'Missing information.  Please fill in all fields';
        }
    }
    
    //***** Retrieve table data ******//
    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
            or die('There was a problem connecting to the server');
    // Retrieve backlog projects            
    // TO DO: Create login dependent query for backlog.  Show new, rejected, and backlog for logged in.
    if($logged_in) {
        $query = "SELECT statusName, projectId, name, description, createdDate FROM Projects INNER JOIN Statuses USING(statusId) WHERE statusId IN (1, 3) ORDER BY statusId DESC, createdDate DESC";
    } else {
        $query = "SELECT statusName, projectId, name, description, createdDate FROM Projects INNER JOIN Statuses USING(statusId) WHERE statusId = 3 ORDER BY statusId DESC, createdDate DESC";
    }
    $result_backlog = mysqli_query($dbc, $query)
            or die('There was a problem running the backlog query');
            
    // Retrieve current projects -- TO DO: refactor to collect information in one query
    $query = "SELECT statusName, projectId, name, description, createdDate FROM Projects INNER JOIN Statuses USING(statusId) WHERE statusId IN (4, 5, 6, 7) ORDER BY statusId DESC, createdDate DESC";
    
    $result_current = mysqli_query($dbc, $query)
            or die('There was a problem running the current projects query');
            
    // Retrieve portfolio projects - TO DO: refactor to collect information in one query
    $query = "SELECT statusName, name, description, createdDate, completedDate FROM Projects INNER JOIN Statuses USING(statusId) WHERE statusId = 8 ORDER BY completedDate DESC";
    
    $result_portfolio = mysqli_query($dbc, $query)
            or die('There was a problem running the portfolio query');
            
    // php for retrieving selected project
    $project_fetch_id = $_GET['fetch-id'];
    if(isset($project_fetch_id)) {
        $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
                or die('There was a problem connecting to the server');
                
        $query = "SELECT statusId, projectId, name, description FROM Projects INNER JOIN Statuses USING(statusId) WHERE projectId = $project_fetch_id";
        
        $result_proj_fetch = mysqli_query($dbc, $query)
                or die('There was a problem fetching the selected project');
        
        // insert result into form values
        $row = mysqli_fetch_array($result_proj_fetch);
        $project_fetch_status_id = $row['statusId'];
        $project_fetch_proj_id = $row['projectId'];
        $project_fetch_proj_name = $row['name'];
        $project_fetch_proj_description = $row['description'];
        
        // Set up multi-select
        $o = 'selected="selected"';
    }
    
            
    mysqli_close($dbc);
    
    
?>
<body <?= ($logged_in) ? 'class="logged-in"' : ''; ?>>
    <?php if($logged_in) { ?>
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="#">Welcom Admin!</a>
        </div>
        <div id="navbar">
          <ul class="nav navbar-nav">
            <li class="active"><a href="/projects/project04/?logout=true">log out</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
    <?php } ?>
    <div class="container-fluid">
        <div class="page-main col-md-8">
            <?php if($logged_in) { ?>
            <section class="edit-project">
                <h2>Update Project</h2>
                <form role="form" name="form02" action="<?= $_SERVER['PHP_SELF']; ?>" method="post">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="update-project-name">Project Name:</label>
                                <input type="text" class="form-control" value="<?= $project_fetch_proj_name ?>" name="update-project-name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="project-status">Status:</label>
                                <select class="form-control" name="update-project-status">
                                    <option value="1" <?= ($project_fetch_status_id == 1) ? $o : ''; ?>>New</option>
                                    <option value="2" <?= ($project_fetch_status_id == 2) ? $o : ''; ?>>Rejected</option>
                                    <option value="3" <?= ($project_fetch_status_id == 3) ? $o : ''; ?>>Backlog</option>
                                    <option value="4" <?= ($project_fetch_status_id == 4) ? $o : ''; ?>>On Hold</option>
                                    <option value="5" <?= ($project_fetch_status_id == 5) ? $o : ''; ?>>In Progress</option>
                                    <option value="6" <?= ($project_fetch_status_id == 6) ? $o : ''; ?>>In Testing</option>
                                    <option value="7" <?= ($project_fetch_status_id == 7) ? $o : ''; ?>>In Deployment</option>
                                    <option value="8" <?= ($project_fetch_status_id == 8) ? $o : ''; ?>>Done</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                            <label for="update-description">Project Description:</label>
                            <textarea class="form-control" rows="5" name="update-description"><?= $project_fetch_proj_description ?></textarea>
                            <input type="hidden" name="update-project-id" value="<?= $project_fetch_proj_id ?>">
                    </div>
                    <div class="form-group">
                        <button type="submit" name="submit-update" value="Submit" class="btn btn-primary">Update</button>
                        <button type="reset" name="clear" value="Clear" class="btn btn-default">Clear</button>
                    </div>
                </form>
            </section>
            <?php } else { ?>
            <section class="github-calendar">
                <h2>Github Contributions</h2>
                <div class="calendar">
                    <!-- Loading stuff -->
                    Loading the data just for you.
                </div>
            </section>
            <?php } ?>
            <section class="current">
                <h2>Current Projects</h2>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <tr>
                            <th>Status</th>
                            <th>Project Name</th>
                            <th>Description</th>
                            <th>Created Date</th>
                            <th></th>
                        </tr>
                        <?php
                            date_default_timezone_set("America/Chicago");
                            while($row = mysqli_fetch_array($result_current)) {
                                $status_name = $row['statusName'];
                                $proj_name = $row['name'];
                                $description = $row['description'];
                                $date = $row['createdDate'];
                                $proj_id = $row['projectId'];
                                echo '<tr>'
                                        . '<td>' . $status_name
                                        . '</td><td>' . $proj_name
                                        . '</td><td>' . $description
                                        . '</td><td>' . date("n\/j\/Y", $date)
                                        . '</td><td>';
                                        if($logged_in) { echo '<a href="/projects/project04/?fetch-id=' . $proj_id . '">Edit</a>';}
                                        echo '</td>'
                                        . '</tr>';
                                
                            }
                        ?>
                    </table>
                </div>
            </section>
            <section class="portfolio">
                <h2>Project Portfolio</h2>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <tr>
                            <th>Status</th>
                            <th>Project Name</th>
                            <th>Description</th>
                            <th>Created Date</th>
                            <th>Completed Date</th>
                        </tr>
                        <?php
                            date_default_timezone_set("America/Chicago");
                            while($row = mysqli_fetch_array($result_portfolio)) {
                                $status_name = $row['statusName'];
                                $proj_name = $row['name'];
                                $description = $row['description'];
                                $date = $row['createdDate'];
                                $date_complete = $row['completedDate'];
                                echo '<tr>'
                                        . '<td>' . $status_name
                                        . '</td><td>' . $proj_name
                                        . '</td><td>' . $description
                                        . '</td><td>' . date("n\/j\/Y", $date)
                                        . '</td><td>' . date("n\/j\/Y", $date_complete)
                                        . '</td>'
                                        . '</tr>';
                                
                            }
                        ?>
                    </table>
                </div>
            </section>
        </div>
        <div class="sidebar col-md-4">
            <?php if($logged_in) { ?>
            <section class="add-project">
                <h2>New Project</h2>
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
            <?php } ?>
            <section class="backlog">
                <h2>Project Backlog</h2>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <tr>
                            <th>Status</th>
                            <th>Project Name</th>
                            <th>Created Date</th>
                            <th></th>
                        </tr>
                        <?php
                            date_default_timezone_set("America/Chicago");
                            while($row = mysqli_fetch_array($result_backlog)) {
                                $status_name = $row['statusName'];
                                $proj_id = $row['projectId'];
                                $proj_name = $row['name'];
                                $description = $row['description'];
                                $date = $row['createdDate'];
                                echo '<tr>'
                                        . '<td>' . $status_name
                                        . '</td><td>' . $proj_name
                                        . '</td><td>' . date("n\/j\/Y", $date)
                                        . '</td><td>';
                                        if($logged_in) {echo '<a href="/projects/project04/?fetch-id=' . $proj_id . '">Edit</a>';}
                                        echo '</td>'
                                        . '</tr>';
                                
                            }
                        ?>
                    </table>
                </div>
            </section>
        </div>
    </div>
    <script>
        GitHubCalendar(".calendar", "foharaschool");
    </script>
</body>

</html>
    
