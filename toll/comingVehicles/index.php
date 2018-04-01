<?php
  ob_start();
  session_start();

  include '../../config/config.php';
  include 'header.php';
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

  $vehicle_number = $car_variant = $car_color = ""; 
  $currentTollId = $_SESSION['id'];

?>

      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-12">

            <table class="table table-striped table-striped blue-grey lighten-4 table-bordered">
              <tr>
              	<th scope="row">Name</th>
              	<th scope="row">Contact</th>
                <th scope="row">Vehicle Type</th>
                <th scope="row">Vehicle Color</th>
                <th scope="row">Vehicle No.</th>
                <th scope="row">Round</th>
              </tr>
              <?php 

                  $query = "SELECT distinct c.id,c.user_id,c.round, (select name from users as a where a.id=c.user_id) as name, (select carVariant from users as a where a.id=c.user_id) as carVariant,(select carColor from users as a where a.id=c.user_id) as carColor,(select vehicleNo from users as a where a.id=c.user_id) as vehicleNo,(select licenseNo from users as a where a.id=c.user_id) as licenseNo,(select contact from users as a where a.id=c.user_id) as contact from toll_access as c where toll_id=$currentTollId;";
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
        var tollId = <?php echo $currentTollId; ?> ;
            $.ajax({
                url: '../../api/toll/comingVehicle.php',
                data: {'userId':userId,'tollId':tollId},
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
