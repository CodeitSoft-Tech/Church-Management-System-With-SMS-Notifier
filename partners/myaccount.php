<?php

	include("../includes/db_conn.php");
	
	if(isset($_POST['change_btn']))
	{

		$mem_id     = mysqli_real_escape_string($db, $_POST['mem_id']);
		$username   = mysqli_real_escape_string($db, $_POST['username']);
		$password   = mysqli_real_escape_string($db, $_POST['password']);
	
		
		$update_admin = "UPDATE members_tbl SET username = '$username', password = '$password' WHERE member_id = '$mem_id'";
		$run_admin    = mysqli_query($db, $update_admin);
	

		echo "<script>alert('Details changed successfully. Please login to confirm changes!')</script>";
		echo "<script>document.location='login.php'</script>"; 
	

	}

?>
