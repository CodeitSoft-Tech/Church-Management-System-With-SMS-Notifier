<?php

	include("includes/db_conn.php");

	$type_id 	 = mysqli_real_escape_string($db, $_POST['type_id']);
	$type_name   = mysqli_real_escape_string($db, $_POST['type_name']);
	

	$update = "UPDATE donation_types SET type_name = '$type_name' WHERE type_id = '$type_id'";
	$run_update = mysqli_query($db, $update) or die(mysqli_error($db));
	
	if($run_update)
	{
		echo "<script>alert('Update done succesfully!')</script>";
		echo "<script>document.location='donation-type.php'</script>";
	}


?>