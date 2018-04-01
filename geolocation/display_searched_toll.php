
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
//include '../search-toll/backend-search.php';

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
         <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>

</head>

<body>
<?php 
include '../search-toll/search-bar.php';

// print_r($_POST);
$user_id = $_SESSION['id'];
$input=$_POST['input'];

if($input){
    // echo 'hello';
    $toll_name=$input;
    
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
    
    ///dummycode
     $querytwo = "SELECT * FROM `users` WHERE id=$user_id";
    $resulttwo = $conn->query($querytwo);
    
 $query = "SELECT balance FROM `users` WHERE id=$user_id";
    $result = $conn->query($query);
    $balance = $result->fetch_assoc();
    $balance = $balance['balance'];
   
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
                            <a class="navbar-brand sparkNavbarTag " style="margin-left: 5vw" href="<?php echo base_url; ?>geolocation/index.php"><i class="fas fa-user"></i>&nbsp;<?php echo $_SESSION['username'] ?></a><br/>
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
        <table class="table table-hover table-striped blue-grey lighten-4 table-bordered">
            <thead>
                <th scope="row">Toll Name</th>
                <th scope="row">Address</th>
                <th scope="row">sorted id</th>
                <th scope="row">One Way</th>
                <th scope="row">Round Trip</th>

            </thead>
            <tbody>
        <?php
   
    $query = "SELECT * FROM `tolls` WHERE `name`='$toll_name'";
    $result = $conn->query($query);
    
    if($result->num_rows == 1) {
            
        ?>
       
        <?php
        // while($row = $result->fetch_assoc()) {
        //     if ($_SESSION['variant'] == 'light') {
        //         $variant = 'light_rate';
        //         $variant_round = 'light_return_rate';
        //     } else if ($_SESSION['variant'] == 'medium') {
        //         $variant = 'medium_rate';
        //         $variant_round = 'medium_return_rate';
        //     } else if ($_SESSION['variant'] == 'heavy') {
        //         $variant = 'heavy_rate';
        //         $variant_round = 'heavy_return_rate';
        //     } else {
        //         print "Variant Exception";
        //     };
          

             

         while($row = $result->fetch_assoc()) {
            $rowtwo= $resulttwo->fetch_assoc();
            
            if ($rowtwo['carVariant'] == 'light') {
                $variant = 'light_rate';
                $variant_round = 'light_return_rate';
                
            } else if ($rowtwo['carVariant'] == 'medium') {
                $variant = 'medium_rate';
                $variant_round = 'medium_return_rate';
            } else if ($rowtwo['carVariant'] == 'heavy') {
                $variant = 'heavy_rate';
                $variant_round = 'heavy_return_rate';
            } else {
                print "Variant Exception";
            };


            
            if (in_array($row['id'],$allocated_tolls, TRUE)) {
                $allocated = 1;
            } else {
                $allocated = 0;
            };
            if($allocated == 0) { echo ""; };



            // count($row);
            // echo "string";
            // echo count($row);
            // echo "string";


            
            
            //array_multisort($toll_ids,$distance);
            
            //print_r($toll_ids);
            

            ?>
            
                                <tr <?php if ($allocated) { echo `class="lassan"`; } ?>>
                                    <td id="toll_id"><?php echo $row['name'];?></td>
                                    <td><?php echo $row['address'];?></td>
                                    <td><?php echo $row['id'];?></td>
                                    
                                    <td><button type="button" class="btn btn-primary" <?php if($allocated == 1) { echo "disabled"; } ?> onClick="payReturn(<?php echo $row['id']; ?>, 1)">Pay <?php echo $row[$variant];?></button></td>
                                    
                                    <td><button type="button" class="btn btn-primary" <?php if($allocated == 1) { echo "disabled"; } ?> onClick="<?php echo $row['id']; ?>, 2)">Pay <?php echo $row[$variant_round];?></button></td>
                                    <td><?php echo "</br>";?></td>
                                </tr>

                            <?php 
                            
        }
          
        ?>
        </tbody>
    </table>
        <?php
    } else {
        echo "No results found";
    }
   

}

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
<style type="text/css">
    .navbar-default .navbar-nav>li>a {
    color: black;
    font-size: 17px;
}
.navbar-brand {
    float: left;
    height: 50px;
    padding: 15px 15px;
    font-size: 22px;
    line-height: 20px;
    color: black !important;
}
</style>
