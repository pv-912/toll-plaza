<?php include './geoLocation.php';
      include '../header.php';

   $result = $conn->query($query);
   while($row = $result->fetch_assoc()) {   ?>
                            <tr>
                              <td id="toll_id"><?php echo $row['id'];?></td>
                              <td><?php echo "      ";?></td>
                              <td><?php echo $row['lat'];?></td>
                              <td><?php echo "      ";?></td>
                              <td><?php echo $row['lng'];?></td>
                              <td><?php echo "      ";?></td>
                              <td><?php echo $row['heavy_rate'];?></td>
                              <td><?php echo "      ";?></td>
                              <td><?php echo $row['heavy_return_rate'];?></td>
                              <td><?php echo "      ";?></td>
                              <td><?php echo $row['medium_rate'];?></td>
                              <td><?php echo "      ";?></td>
                              <td><?php echo $row['medium_return_rate'];?></td>
                              <td><?php echo "      ";?></td>
                              <td><?php echo $row['light_rate'];?></td>
                              <td><?php echo "      ";?></td>
                              <td><?php echo $row['light_return_rate'];?></td>
                              <td><?php echo "      ";?></td>
                              <td><?php echo $row['address'];?></td>
                              <td><?php echo "      ";?></td>                              
                              <td><button type="button"  id="select_toll" value="<?php echo $row['id'];?>">select</button></td>
                              <td><?php echo "      ";?></td>                              
                              <td><button type="button"  id="select_toll_with_round" value="<?php echo $row['id'];?>">select</button></td>
                              <td><?php echo "</br>";?></td>
                            </tr>
                          <?php 

}

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