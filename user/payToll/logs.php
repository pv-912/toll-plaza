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
    echo $currentUserId;
    // include '../header.php';
?>
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-12">
            <table class="table table-hover">
              <tr>
                <th>Name</th>
                <th>Paid</th>
                <th>Toll Address</th>
                <th>Time</th>
              </tr>
              <?php 

                  $query    = "SELECT distinct c.payment,(select name from tolls as a where a.id=c.toll_id) as name, (select address from tolls as a where a.id=c.toll_id) as tollAddress,(select payTime from toll_access as b where b.toll_id=c.toll_id and b.user_id=c.user_id) as payTime from user_logs as c where user_id=$currentUserId";
                  $result = $conn->query($query);
                  if($result) {
                      if(!$result->num_rows  == 0) {
                          while($row = $result->fetch_assoc()) {   ?>
                            <tr>
                              <td><?php echo $row['name']; ?></td>
                              <td><?php echo $row['payment']; ?></td>
                              <td><?php echo $row['tollAddress']; ?></td>
                              <td><?php echo $row['time']; ?></td>

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
      <?php }?>
  </body>
