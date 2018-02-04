<?php 
include '../../config/config.php';


	$userId = $_POST['userId'];
	$tollId  = $_POST['tollId'];
	$round  = $_POST['round'];
	
		$sql = "INSERT into toll_access (round,user_id, toll_id) values (?,?,?)";

	        if($stmt = mysqli_prepare($conn, $sql)){
	            mysqli_stmt_bind_param($stmt, "iii",$param_round, $param_user_id, $param_toll_id);
	            $param_round = $round;
	            $param_user_id = $userId;
	            $param_toll_id = $tollId;

	            if(mysqli_stmt_execute($stmt)){
	                echo '<script>alert("Added to coming vehicle.")</script>';
	            } else{
	                echo '<script>alert("Something Went Wrong.")</script>';
	            }

	        }else{
	        	echo '<script>alert("Something Went Wrong.")</script>';
	        }
	        mysqli_stmt_close($stmt);
        mysqli_close($conn);
?>
