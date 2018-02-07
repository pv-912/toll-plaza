<?php 
include '../../config/config.php';


	// $userId = $_POST['userId'];
	// $tollId  = $_POST['tollId'];
	$qrCode = '123';
	$tollId = 1;
	$round = 0;

	$sql = "SELECT id from users where qr=?";

	        if($stmt = mysqli_prepare($conn, $sql)){
	            mysqli_stmt_bind_param($stmt, "s",$param_qr);
	            $param_qr = $qrCode;
	       
	            if(mysqli_stmt_execute($stmt)){
	            	mysqli_stmt_store_result($stmt);

		                if(!mysqli_stmt_num_rows($stmt) == 0){                    
		                    mysqli_stmt_bind_result($stmt, $userId);
		                    if(mysqli_stmt_fetch($stmt)){

		        		// if($userId){
						$sql1 = "SELECT round from toll_access where user_id=? and toll_id=?";

						if($stmt1 = mysqli_prepare($conn, $sql1)){
				            mysqli_stmt_bind_param($stmt1, "ii", $param_user_id, $param_toll_id);
				            
				            $param_user_id = $userId;
				            $param_toll_id = $tollId;

				            if(mysqli_stmt_execute($stmt1)){
				                mysqli_stmt_store_result($stmt1);
				                if(!mysqli_stmt_num_rows($stmt1) == 0){                    
				                    mysqli_stmt_bind_result($stmt1, $round);
				                    if(mysqli_stmt_fetch($stmt1)){
										$round = $round-1;
										if($round==1){
										$sql = "UPDATE toll_access set round=? where user_id=? and toll_id=?";
									        if($stmt = mysqli_prepare($conn, $sql)){
									            mysqli_stmt_bind_param($stmt, "iii",$param_round, $param_user_id, $param_toll_id);
									            $param_round = $round;
									            if(mysqli_stmt_execute($stmt)){
									                echo '<script>alert("Round turned to 1.")</script>';
									                echo '
						                                <script>
						                                   window.location.href="'.base_url_toll.'comingVehicles"; 
						                                </script>';
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
									                echo '<script>alert("Deleted from access.")</script>';
									                echo '
						                                <script>
						                                   window.location.href="'.base_url_toll.'comingVehicles"; 
						                                </script>';
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
								else{
						                echo '<script>alert("QR not matched.")</script>';
						            }
								} else{
						                echo '<script>alert("Something Went Wrong.")</script>';
						            }

						        // }
						    }else{
						        	echo '<script>alert("User Doesnt Paid")</script>';
						        }
			       			}
			       		}
	        
					}mysqli_stmt_close($stmt);
				}
            mysqli_close($conn);
?>


<?php 
// include '../../config/config.php';


// 	$userId = $_POST['userId'];
// 	$tollId  = $_POST['tollId'];
// 	$round  = $_POST['round'];
	
		// $sql = "INSERT into toll_access (round,user_id, toll_id) values (?,?,?)";

	 //        if($stmt = mysqli_prepare($conn, $sql)){
	 //            mysqli_stmt_bind_param($stmt, "iii",$param_round, $param_user_id, $param_toll_id);
	 //            $param_round = $round;
	 //            $param_user_id = $userId;
	 //            $param_toll_id = $tollId;

	 //            if(mysqli_stmt_execute($stmt)){
	 //                echo '<script>alert("Added to coming vehicle.")</script>';
	 //            } else{
	 //                echo '<script>alert("Something Went Wrong.")</script>';
	 //            }

	 //        }else{
	 //        	echo '<script>alert("Something Went Wrong.")</script>';
	 //        }
	 //        mysqli_stmt_close($stmt);
  //       mysqli_close($conn);
?>
