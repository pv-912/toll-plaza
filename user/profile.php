<?php 

	include("connect.php");
	include("functions.php");
	
	if(logged_in())
	{
	?>
		
		<a href="changepassword.php">Change Password</a>
		<a href="logout.php" style="float:right; padding:10px; margin-right:40px; background-color:#eee; color:#333; text-decoration:none;">Logout</a>
	
	<?php 
		
	}
	else
	{
		header("location:login.php");
		exit();
	}

?>