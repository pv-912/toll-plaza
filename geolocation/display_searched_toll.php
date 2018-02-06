
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
<?php 
// print_r($_POST);
//$user_id = $_SESSION['id'];
$user_id = 19;
$input=$_POST['input'];
echo $input;
print_r($_POST);
if($input){
    // echo 'hello';
    $toll_name=$input;
    echo $toll_name;
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
    

   
      ?>
        <table class="table table-hover">
            <tr>
                <thead>Toll Name</thead>
                <thead>Address</thead>
                <thead>toll-distance</thead>
                <thead>sorted id</thead>
                <thead></thead>
                <thead></thead>

            </tr>
        <?php
   
    $query = "SELECT * FROM `tolls` WHERE `name`='$toll_name'";
     //$query = "SELECT * FROM `tolls` WHERE id IN (".implode(',',$toll_ids).") ORDER  BY FIND_IN_SET(id,".implode(',',$toll_ids).")";
    $result = $conn->query($query);
    print($query);
    echo $result->num_rows;
    
    if($result->num_rows == 1) {
            
        ?>
        <table class="table table-hover">
            <tr>
                <thead></thead>
                <thead></thead>
                <thead></thead>
                <thead></thead>
                <thead></thead>
                <thead></thead>

            </tr>
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
            echo $rowtwo['name'];
            if ($rowtwo['carVariant'] == 'light') {
                $variant = 'light_rate';
                $variant_round = 'light_return_rate';
                echo $variant;
            } else if ($rowtwo['carVariant'] == 'medium') {
                $variant = 'medium_rate';
                $variant_round = 'medium_return_rate';
            } else if ($rowtwo['carVariant'] == 'heavy') {
                $variant = 'heavy_rate';
                $variant_round = 'heavy_return_rate';
            } else {
                print "Variant Exception";
            };


            echo $user_id;
            if (in_array($row['id'],$allocated_tolls, TRUE)) {
                $allocated = 1;
            } else {
                $allocated = 0;
            };
            if($allocated == 0) { echo "There"; };
            echo $allocated."Status";


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
                                    <td><?php echo $row[$variant];?></td>
                                    <td><button type="button" class="btn btn-primary" <?php if($allocated == 1) { echo "disabled"; } ?> onClick="payReturn(<?php echo $row['id']; ?>, 1)">Pay Now</button></td>
                                    <td><?php echo $row[$variant_round];?></td>
                                    <td><button type="button" class="btn btn-primary" <?php if($allocated == 1) { echo "disabled"; } ?> onClick="<?php echo $row['id']; ?>, 2)">Paynow</button></td>
                                    <td><?php echo "</br>";?></td>
                                </tr>
                            <?php 
                            
        }
          
        ?>
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