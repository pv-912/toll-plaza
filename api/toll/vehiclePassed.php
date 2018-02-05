<?php 
include '../../config/config.php';


	$userId = $_POST['userId'];
	$tollId  = $_POST['tollId'];

	$sql = "SELECT round from toll_access where user_id=? and toll_id=?";
				if($stmt = mysqli_prepare($conn, $sql)){
		            mysqli_stmt_bind_param($stmt, "ii", $param_user_id, $param_toll_id);
		            
		            $param_user_id = $userId;
		            $param_toll_id = $tollId;
		            if(mysqli_stmt_execute($stmt)){
		                mysqli_stmt_store_result($stmt);

		                if(!mysqli_stmt_num_rows($stmt) == 0){                    
		                    mysqli_stmt_bind_result($stmt, $round);
		                    if(mysqli_stmt_fetch($stmt)){
								$round = $round-1;
								if($round==1){
								$sql = "UPDATE toll_access set round=? where user_id=? and toll_id=?";
         
							        if($stmt = mysqli_prepare($conn, $sql)){
							            mysqli_stmt_bind_param($stmt, "iii",$param_round, $param_user_id, $param_toll_id);
							            $param_round = $round;
							            if(mysqli_stmt_execute($stmt)){
							                echo '<script>alert("Round turned to 1.")</script>';
							            } else{
							                echo '<script>alert("Something Went Wrong.")</script>';
							            }
							        }else {echo '<script>alert("Something Went Wrong.")</script>';}
							         
							        mysqli_stmt_close($stmt);
							        
							    }else if($round==0){
							    	$sql = "INSERT into toll_access_logs (user_id, toll_id) values (?,?)";
         
							        if($stmt = mysqli_prepare($conn, $sql)){
							            mysqli_stmt_bind_param($stmt, "ii", $param_user_id, $param_toll_id);
							            if(mysqli_stmt_execute($stmt)){
							                echo '<script>alert("Added to Logs.")</script>';
							            } else{
							                echo '<script>alert("Something Went Wrong.")</script>';
							            }
							        }else {echo '<script>alert("Something Went Wrong.")</script>';}
							         
							        mysqli_stmt_close($stmt);
							        $sql = "DELETE from toll_access where user_id=? and toll_id = ?";
         
							        if($stmt = mysqli_prepare($conn, $sql)){
							            mysqli_stmt_bind_param($stmt, "ii", $param_user_id, $param_toll_id);
							            if(mysqli_stmt_execute($stmt)){
							                echo '<script>alert("Deleted from logs")</script>';
							            } else{
							                echo '<script>alert("Something Went Wrong.")</script>';
							            }
							        }else {echo '<script>alert("Something Went Wrong.")</script>';}
							         
							        mysqli_stmt_close($stmt);
							    }
							    else{
						    	echo '<script>alert("Something Went Wrong.")</script>';
						    	}
						    }
						}
					}mysqli_stmt_close($stmt);
				}
            mysqli_close($conn);
?>
