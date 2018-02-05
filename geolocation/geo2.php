<?php
include '../config/config.php';

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
    // display address

    $location = $location;
      
    $geo_lat =$_POST['latitude'];
    $geo_lng =$_POST['longitude'];
    
    $side_by_two = 0.001;
    $low_lat = $geo_lat - $side_by_two;
    $high_lat = $geo_lat + $side_by_two;
    $low_lng = $geo_lng - $side_by_two;
    $high_lng = $geo_lng + $side_by_two;

    $query = "SELECT * FROM `toll_access` WHERE id=$user_id";
    $result = $conn->query($query);
    $allocated_tolls = $array();
    while($row = $result->fetch_assoc()) {
        array_push($allocated_tolls, $row['toll_id']);
    };
    print_r($allocated_tolls);

    $query = "SELECT * FROM `tolls` WHERE (`lat` BETWEEN $low_lat AND $high_lat ) AND (`lng` BETWEEN $low_lng AND $high_lng )";
    $result = $conn->query($query);
    if(!$result->num_rows == 0) {
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
            if (in_array($row['id'],$allocated_tolls, TRUE)) {
                $allocated = true;
            } else {
                $allocated = false;
            };
            ?>
                                <tr <?php if ($allocated) { echo `class="lassan"`; } ?>>
                                    <td id="toll_id"><?php echo $row['id'];?></td>
                                    <td><?php echo "      ";?></td>
                                    <td><?php echo $row['address'];?></td>
                                    <td><?php echo "      ";?></td>
                                    <td><?php echo $row[$variant];?></td>
                                    <td><?php echo "      ";?></td>
                                    <td><button type="button" id="select_toll" value="<?php echo $row['id'];?>" <?php if ($allocated) { echo `disabled`; } ?>>select</button></td>
                                    <td><?php echo "      ";?></td>
                                    <td><?php echo $row[$variant_round];?></td>
                                    <td><?php echo "      ";?></td>
                                    <td><button type="button" id="select_toll_with_round" value="<?php echo $row['id'];?>" <?php if ($allocated) { echo `disabled`; } ?>>select</button></td>
                                    <td><?php echo "</br>";?></td>
                                </tr>
                            <?php 
        }
    } else {
        echo "No results found";
    }
};

?>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script type="text/javascript">

$(document).ready(function(){
    $("#select_toll").on("click",function(){
 
      var toll_id = $("#select_toll").val();
            console.log(toll_id);  
            $.ajax({
            type: "POST",
            url: "payment_function.php",
            data:{
                toll_id:toll_id,
            },
            success: function(data){
                console.log(data);
            }
        });
    });
 });

$(document).ready(function(){
    $("#select_toll_with_round").on("click",function(){
 
      var toll_id = $("#select_toll_with_round").val();
      var round=1;

                console.log(toll_id);  
       

            $.ajax({
            type: "POST",
            url: "payment_function.php",
            data:{
                toll_id:toll_id,
                round:round,
            },
            success: function(data){
                console.log(data);
            }
        });
            
              

    });

 });

</script>