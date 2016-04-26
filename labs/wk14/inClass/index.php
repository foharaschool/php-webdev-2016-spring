<?php
    require_once 'vendor/autoload.php';
    use GuzzleHttp\Client;
    use GuzzleHttp\Post\PostBody;
    use GuzzleHttp\Stream\StreamInterface;
    use GuzzleHttp\Exception\RequestException;
    $weather_key = b0ee887716fefcd80c880892af5d38c0;

    if (isset($_POST['submit']) && isset($_POST['postal_code']) 
            && !empty($_POST['postal_code']))
    {
        $postal_code = $_POST['postal_code'];
        $api_key = $weather_key;
        $units = 'imperial';
        $url = "api.openweathermap.org/data/2.5/weather?"
                . "zip=$postal_code,us&units=$units&appid=$api_key";
          
        $client = new Client();
          
        try
        {
            $response = $client->request('GET', $url, []);
            $response_body = $response->getBody();
            $decoded_body = json_decode($response_body);
         
        } 
        catch (RequestException $e)
        {
            echo "HTTP Request failed\n";
            echo "<pre>";
            print_r($e->getRequest());
            echo "</pre>";
            if ($e->hasResponse()) 
            {
                echo $e->getResponse();
            }
        }
    }
?>
  
<!DOCTYPE html>
<html lang="en">
  <head>
        
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="">
      <meta name="author" content="">
        
      <title>Weather App - REST Demonstration</title>
        
      <!-- Bootstrap Core CSS -->
      <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"
        rel="stylesheet">
        
      <!-- Custom CSS -->
      <link href="blogpost.css" rel="stylesheet">
        
  </head>
    
  <body>
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse"
            data-target="#bs-example-navbar-collapse-1">
          </button>
          <a class="navbar-brand" href="#">Open Weather Demo</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
          </ul>
        </div>
        <!-- /.navbar-collapse -->
      </div>
      <!-- /.container -->
    </nav>
        
      <!-- Page Content -->
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
              <h1 class="page-header">Weather
                  <small>by zip code</small>
              </h1>
          </div>
        </div>
        <div class="row">
            <p>Please fill out the form to get weather info!</p>
          <form class="form-horizontal" action="<?= $_SERVER['PHP_SELF'] ?>"
            method="post" role="form">
            <fieldset>
              <legend>Weather For <?= $decoded_body->name ?></legend>
 
              <div class="form-group">
                <label for="postal_code" class="col-lg-2 control-label">Postal Code:</label>
                <div class="col-lg-10">
                  <input type="text" class="form-control" name="postal_code"
                    id="postal_code" >
                </div>
              </div>
              <div class="form-group">
                <div class="col-lg-10 col-lg-offset-2">
                  <button type="submit" name="submit" value="submit"
                    class="btn btn-primary">Submit</button>
                </div>
              </div>
            </fieldset>
          </form>
        </div>
          
        <?php if($decoded_body): ?>
          <div class="row">
          <!--
          stdClass Object ( [coord] => stdClass Object ( [lon] => -89.02 [lat] => 43 ) 
                          [weather] => Array ( 
                              [0] => stdClass Object ( [id] => 803 
                                                      [main] => Clouds 
                                                      [description] => broken clouds 
                                                      [icon] => 04n ) ) 
                          [base] => cmc stations 
                          [main] => stdClass Object ( [temp] => 273.838 
                                                      [pressure] => 998.15 
                                                      [humidity] => 89 
                                                      [temp_min] => 273.838 
                                                      [temp_max] => 273.838 
                                                      [sea_level] => 1034.35 
                                                      [grnd_level] => 998.15 ) 
                          [wind] => stdClass Object ( [speed] => 4.12 
                                                      [deg] => 303.001 ) 
                          [clouds] => stdClass Object ( [all] => 56 ) 
                          [dt] => 1448328154 
                          [sys] => stdClass Object ( [message] => 0.003 
                                                      [country] => US 
                                                      [sunrise] => 1448369964 
                                                      [sunset] => 1448403946 ) 
                          [id] => 5247533 
                          [name] => Cambridge 
                          [cod] => 200 )
              -->
                
              Current Temperature: <?= $decoded_body->main->temp ?> <br />
              Current Humdity: <?= $decoded_body->main->humidity ?>% <br />
              Minimum Temperature: <?= $decoded_body->main->temp_min ?> <br />
              Maximum Temperature: <?= $decoded_body->main->temp_max ?> <br />
                
          </div>
        <?php endif ?>
          
        <footer>
          <div class="row">
            <div class="col-lg-12">
              <p>Copyright &copy; Ken Marks 2015</p>
            </div>
          </div>
          <!-- /.row -->
        </footer>
          
      </div>
      <!-- /.container -->
        
      <!-- jQuery -->
      <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
        
      <!-- Bootstrap Core JavaScript -->
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.jss">
        </script>
        
  </body>
    
</html>