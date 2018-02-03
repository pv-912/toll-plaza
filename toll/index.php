<?php 
  include '../config/config.php';
?>
<!DOCTYPE html>
  <html lang="en">
    <head>
        <title> Toll Plaza</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="keywords" content="toll-plaza, toll, highway">
        <meta name="author" content="Toll Plaza">
        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <link href="http://localhost/tollPlaza/src/css/bootstrap.min.css" rel="stylesheet">
        <link href="http://localhost/tollPlaza/src/css/bootstrap-theme.min.css" rel="stylesheet">
        <script src="http://localhost/tollPlaza/src/js/bootstrap.min.js"></script>
    </head>


    <body>
      <nav class="navbar navbar-default">
        <div class="container-fluid">
          <div class="row">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
                <a class="navbar-brand" href="http://localhost/tollPlaza/"><img src="" alt="IIT Roorkee" class="indexNavbarIitrLogo"></a>
                <a class="navbar-brand sparkNavbarTag "  href="index.php">Tool Plaza</a><br/>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav navbar-right">
                  <li><a href="#">About Us </a></li>
                  <li><a href="#">Projects</a></li>
                  <li><a href="#">Contact</a></li>
                  <li><a href="#login" data-toggle="modal" data-target="#login" class="headerLogin" >Log In</a></li>
              </ul>
            </div>
          </div>
        </div>
      </nav>


      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-12">
            <table class="table table-hover">
              <tr>
                <th>Vehicle Type</th>
                <th>Vehicle No.</th>
                <th>Vehicle Color</th>
                <th>Vehicle Load</th>
              </tr>
              <?php 
                  $currentTollId = 1;

                  $query    = "SELECT name from users left join toll_access on toll_access.id = $currentTollId";
                  $result = $conn->query($query);
                  if($result) {
                      if(!$result->num_rows == 0) {
                          while($row = $result->fetch_assoc()) {   ?>
                              <td><?php echo $row['name']; ?></td>
                              <td><?php echo $row['car_variant']; ?></td>
                              <td><?php echo $row['car_color']; ?></td>
                              <td><?php echo $row['vehicle_number']; ?></td>
                          <?php 
                        }  
                      }
                    }
               ?>

              
            </table>
          </div>
        </div>
      </div>
