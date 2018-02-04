<?php 
include '../../config/config.php';


	$userId = $_POST['userId'];
	$tollId  = $_POST['tollId'];

	$sql = "SELECT user_id from toll_access where user_id=? and toll_id=?";
				if($stmt = mysqli_prepare($conn, $sql)){
		            mysqli_stmt_bind_param($stmt, "ii", $param_user_id, $param_toll_id);
		            
		            $param_user_id = $userId;
		            $param_toll_id = $tollId;
		            if(mysqli_stmt_execute($stmt)){
		                mysqli_stmt_store_result($stmt);
		                if(!mysqli_stmt_num_rows($stmt) == 0){                    
		                    mysqli_stmt_bind_result($stmt, $userId);
		                    if(mysqli_stmt_fetch($stmt)){
				                echo '<script>alert("Vehicle has Paid")</script>';
						    }else{
				                echo '<script>alert("wrong")</script>';

						    }
						}else{
				                echo '<script>alert("wrong2")</script>';

						    }
					}mysqli_stmt_close($stmt);
				}
            mysqli_close($conn);
?>
