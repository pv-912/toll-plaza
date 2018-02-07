
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
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <link href="<?php echo base_url; ?>src/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url; ?>src/css/bootstrap-theme.min.css" rel="stylesheet">
    <script src="<?php echo base_url; ?>src/js/bootstrap.min.js"></script>
    <style>
        .lassan{
            background: #00a70042 !important;
        }
    </style>
</head>

<body>
<?php 

// print_r($_POST);

$user_id = $_SESSION['id'];

if(!empty($_POST['latitude']) && !empty($_POST['longitude'])){
    $url = 'http://maps.googleapis.com/maps/api/geocode/json?latlng='.trim($_POST['latitude']).','.trim($_POST['longitude']).'&sensor=false';
    $json = @file_get_contents($url);
    $data = json_decode($json);
    $status = $data->status;

    if($status=="OK"){
        $location = $data->results[0]->formatted_address;
    }else{
        $location =  '';
    }

    $location = $location;

    $geo_lat =$_POST['latitude'];
    $geo_lng =$_POST['longitude'];

    $side_by_two = 1;
    $low_lat = $geo_lat - $side_by_two;
    $high_lat = $geo_lat + $side_by_two;
    $low_lng = $geo_lng - $side_by_two;
    $high_lng = $geo_lng + $side_by_two;
    
    $query = "SELECT balance FROM `users` WHERE id=$user_id";
    $result = $conn->query($query);
    $balance = $result->fetch_assoc();
    $balance = $balance['balance'];

    $query = "SELECT * FROM `toll_access` WHERE user_id=$user_id";
    // echo $query;
    $result = $conn->query($query);
    $allocated_tolls = array();
    // echo $result;
    while($row = $result->fetch_assoc()) {
        array_push($allocated_tolls, $row['toll_id']);
    };
    // print_r($allocated_tolls);
    // print_r($_SESSION);
    $query = "SELECT * FROM `tolls` WHERE (`lat` BETWEEN $low_lat AND $high_lat ) AND (`lng` BETWEEN $low_lng AND $high_lng )";
    $result = $conn->query($query);
        if(!$result->num_rows == 0) {
            ?>
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
            <?php if ($balance > 0) {?>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <table class="table table-striped">
                            <thead>
                                <th>Toll Name</th>
                                <th>Address</th>
                                <th>One Way</th>
                                <th>Round Trip</th>
                            </thead>
                            <tbody>
                        <?php
                        while($row = $result->fetch_assoc()) {
                            if ($_SESSION['variant'] == 'light') {
                                $variant = 'light_rate';
                                $variant_round = 'light_return_rate';
                            } else if ($_SESSION['variant'] == 'medium') {
                                $variant = 'medium_rate';
                                $variant_round = 'medium_return_rate';
                            } else if ($_SESSION['variant'] == 'heavy') {
                                $variant = 'heavy_rate';
                                $variant_round = 'heavy_return_rate';
                            } else {
                                print "Variant Exception";
                            };
                            // print_r($row);
                            // echo $user_id;
                            if (in_array($row['id'],$allocated_tolls, TRUE)) {
                                $allocated = 1;
                            } else {
                                $allocated = 0;
                            };
                            // if($allocated == 0) { echo "There"; };
                            // echo $allocated."Status";
                            ?>
                                                <tr <?php if($allocated == 1) { echo 'class="lassan"'; } ?>>
                                                    <td id="toll_id"><?php echo $row['name'];?></td>
                                                    <td><?php echo $row['address'];?></td>
                                                    <td><button type="button" class="btn btn-primary" <?php if($allocated == 1) { echo "disabled"; } ?> onClick="payReturn(<?php echo $row['id']; ?>, 1)">Pay <?php echo $row[$variant];?></button></td>
                                                    <td><button type="button" class="btn btn-primary" <?php if($allocated == 1) { echo "disabled"; } ?> onClick="<?php echo $row['id']; ?>, 2)">Pay <?php echo $row[$variant_round];?></button></td>
                                                </tr>
                                            <?php 
                        }?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
            <?php
        } else {
            echo "Please Update Your Balance";
        }
    } else {
        echo "No results found";
    }
    
};

?>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script type="text/javascript">

    function payReturn(data,round){
        // console.log(data, round);
        $.ajax({
        type: "POST",
        url: "payment_function.php",
        data:{
            toll_id:data,
            round:round,
        },
        success: function(data){
            window.location.href="<?php echo base_url?>geolocation/index.php";
        }
    })
}

</script>