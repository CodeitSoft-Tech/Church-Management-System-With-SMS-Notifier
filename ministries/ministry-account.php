<?php

	include("../includes/db_conn.php");
	
	if(isset($_POST['change_btn']))
	{

		$min_id     = mysqli_real_escape_string($db, $_POST['min_id']);
		$username   = mysqli_real_escape_string($db, $_POST['username']);
		$password   = mysqli_real_escape_string($db, $_POST['password']);
	
		
		$update_admin = "UPDATE ministry_tbl SET username = '$username', password = '$password' WHERE ministry_id = '$min_id'";
		$run_admin    = mysqli_query($db, $update_admin);
	

		echo "<script>alert('Details changed successfully. Please login to confirm changes!')</script>";
		echo "<script>document.location='login.php'</script>"; 
	

	}

?>
