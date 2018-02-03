<?php 
include 'header.php';
?>
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


    <?php require_once('../components/login_modal_user.php'); ?>
