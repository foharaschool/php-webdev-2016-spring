<?php
    // Start the session
    session_start();

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
<link rel="stylesheet" href="index.css">

</head>
<?php
    // Link scripts
    require_once('connectvars4.php');
    
    // Retrieve Backlog items
    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
            or die('There was a problem connecting to the server');
            
    $query = "SELECT statusName, name, description, createdDate FROM Projects INNER JOIN Statuses USING(statusId) ORDER BY statusId DESC, createdDate DESC";
    
    $result = mysqli_query($dbc, $query)
            or die('There was a problem running the query');
            
    mysqli_close($dbc);
    
    
?>
<body>
    <div class="container">
        <section class="backlog col-md-12">
            <h1>Project Backlog</h1>
            <div class="table-responsive">
                <table class="table table-striped">
                    <tr>
                        <th>Status</th>
                        <th>Project Name</th>
                        <th>Description</th>
                        <th>Created Date</th>
                    </tr>
                    <?php
                        date_default_timezone_set("America/Chicago");
                        while($row = mysqli_fetch_array($result)) {
                            $status_name = $row['statusName'];
                            $proj_name = $row['name'];
                            $description = $row['description'];
                            $date = $row['createdDate'];
                            echo '<tr>'
                                    . '<td>' . $status_name
                                    . '</td><td>' . $proj_name
                                    . '</td><td>' . $description
                                    . '</td><td>' . date("n\/j\/Y", $date)
                                    . '</td>'
                                    . '</tr>';
                            
                        }
                    ?>
                </table>
            </div>
        </section>
    </div>
</body>
    
