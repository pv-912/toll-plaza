<?php include './geoLocation.php';
      include '../header.php';

   $result = $conn->query($query);
   while($row = $result->fetch_assoc()) {   ?>
                            <tr>
                              <td><?php echo $row['id'];?></td>
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
                              <td><?php echo "</br>";?></td>
                              <td><button type="button"  id="select_toll">select</button></td>
                            </tr>
                          <?php 

}

?>
<script type="text/javascript">

$(document).ready(function(){
    $("#select_toll").on("click",function(){
              

       

            $.ajax({
            type: "POST",
            url: "<?=base_url?>chat_signup_functions.php/",
            data:{
                mobile:phone_no,
            },
            success: function(data){
                console.log(data);
            }
        });
            
         console.log("disabled");  

    });

 
});
function otpgeneration(){
        

        // $("#submit_otp").prop("disabled",true);
        console.log("hello");

        var otp=$("#chatotp").val();
            $.ajax({
            type: "POST",
            url: "<?=base_url?>chat_signup_otp_functions.php/",
            data:{
                otp:otp,
            },
            success: function(data){
                window.location.href=data;
            }
        });

      

    }

</script>