<?php
ob_start();
session_start();

   /* logout after 10min. */
    
    if(time()-$_SESSION['time']>60*60*10){
        unset($_SESSION['time']);
        // setcookie("username", "", time()-3600);
        // setcookie("role", "", time()-3600);
        // setcookie("name", "", time()-3600); 
        session_destroy();
        header("location: ../index.php");}
    else{
        $_SESSION['time']=time();
    }

include '../../config/config.php';


if($_SESSION['role']=='user'){
    $currentUserId = $_SESSION['id'];
    $query = "SELECT balance FROM `users` WHERE id=$currentUserId";
    $result = $conn->query($query);
    $balance = $result->fetch_assoc();
    $balance = $balance['balance'];
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
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <link href="<?php echo base_url; ?>src/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo base_url; ?>src/css/bootstrap-theme.min.css" rel="stylesheet">
        <script src="<?php echo base_url; ?>src/js/bootstrap.min.js"></script>
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
                        <a class="navbar-brand sparkNavbarTag " style="margin-left: 5vw" href="<?php echo base_url; ?>geolocation/index.php"><?php echo $_SESSION['username'] ?></a><br/>
                    </div>
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav navbar-right">
                            <li><a>Balance: <?php echo $balance ?></a></li>
                            <li><a href="<?php echo base_url; ?>user/addmoney.php">Recharge</a></li>
                            <li><a href="<?php echo base_url; ?>user/payToll/logs.php">Logs</a></li>
                            <li><a href="<?php echo base_url; ?>user" class="headerLogin" >Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-12">
              <table class="table table-striped">
                <thead>
                  <th>Name</th>
                  <th>Paid</th>
                  <th>Toll Address</th>
                  <th>Time</th>
                </thead>
                <?php 
                    $query    = "SELECT distinct c.payment,(select name from tolls as a where a.id=c.toll_id) as name, (select address from tolls as a where a.id=c.toll_id) as tollAddress,(select payTime from toll_access as b where b.toll_id=c.toll_id and b.user_id=c.user_id) as payTime from user_logs as c where user_id=$currentUserId";
                    $result = $conn->query($query);
                    if($result) {
                        if(!$result->num_rows  == 0) {
                            while($row = $result->fetch_assoc()) {   
                              // print_r($row).'<br/>';
                              ?>
                              <tr>
                                <td><?php echo $row['name']; ?></td>
                                <td><?php echo $row['payment']; ?></td>
                                <td><?php echo $row['tollAddress']; ?></td>
                                <td><?php echo $row['payTime']; ?></td>
                              </tr>
                            <?php 
                          }  
                        }
                      }
                ?>
              </table>
            </div>
          </div>
        </div>
    </body>
</html>
  <?php }?>