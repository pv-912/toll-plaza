<?php
ob_start();
session_start();

   /* logout after 10min. */
    
    // if(time()-$_SESSION['time']>60*60*10){
    //     unset($_SESSION['time']);
    //     // setcookie("username", "", time()-3600);
    //     // setcookie("role", "", time()-3600);
    //     // setcookie("name", "", time()-3600); 
    //     session_destroy();
    //     // header("location: ../index.php");
    //   }
    // else{
    //     $_SESSION['time']=time();
    // }

include '../../config/config.php';
$vehicle_number = $car_variant = $car_color = ""; 


    // $currentTollId = $_SESSION['id'];
    $currentTollId = 1;

// echo 'hello';
// print_r($_SESSION);

    include '../header.php';

?>

      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-12">
          	<a href="<?php echo base_url_toll; ?>comingVehicles/record.php">Records</a>

            <table class="table table-hover">
              <tr>
              	<th>Name</th>
              	<th>Contact</th>
                <th>Vehicle Type</th>
                <th>Vehicle No.</th>
                <th>Vehicle Color</th>
                <th>Vehicle Load</th>
                <th>Round</th>
              </tr>
              <?php 

                  $query    = "SELECT distinct c.id,c.user_id,c.round, (select name from users as a where a.id=c.user_id) as name, (select carVariant from users as a where a.id=c.user_id) as carVariant,(select carColor from users as a where a.id=c.user_id) as carColor,(select vehicleNo from users as a where a.id=c.user_id) as vehicleNo,(select licenseNo from users as a where a.id=c.user_id) as licenseNo,(select vehicleSize from users as a where a.id=c.user_id) as vehicleSize,(select contact from users as a where a.id=c.user_id) as contact from toll_access as c where toll_id=$currentTollId;";
                  $result = $conn->query($query);
                  if($result) {
                      if(!$result->num_rows == 0) {
                          while($row = $result->fetch_assoc()) {   ?>
                          	<tr onclick="pass(<?php echo $row['user_id']; ?>);">
                              <td><?php echo $row['name']; ?></td>
                              <td><?php echo $row['contact']; ?></td>
                              <td><?php echo $row['carVariant']; ?></td>
                              <td><?php echo $row['carColor']; ?></td>
                              <td><?php echo $row['vehicleNo']; ?></td>
                              <td><?php echo $row['vehicleSize']; ?></td>
                              <td><?php echo $row['round']; ?></td>
				          		<input type='hidden' id="passedUserRound<?php echo $row['id']; ?>" value="<?php echo $row['round']; ?>">
                            </tr>
                          <?php 
                        }  
                      }
                    }
               ?>

              
            </table>
            <div id="passedDiv"></div>

          </div>
        </div>
      </div>

      <?php ?>


  <script>
  	function pass(data){
        var userId = data;
        var qr = '123';
        var tollId = <?php echo $currentTollId; ?> ;
            $.ajax({
                url: '../../api/toll/comingVehicle.php',
                data: {'qr':qr,'tollId':tollId},
                async: true,
                type: 'POST',          

                success: function(data){
                        $('#passedDiv').html(data);
                },
                error : function(XMLHttpRequest, textStatus, errorThrown) {
                        alert(errorThrown+ 'Priority Set.');
                }
            });
        	}
  </script>


  </body>
