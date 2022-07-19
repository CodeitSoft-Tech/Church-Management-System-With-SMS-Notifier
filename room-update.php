<?php

	include("includes/db_conn.php");


	$room_id 	   = mysqli_real_escape_string($db, $_POST['room_id']);
	$room_name     = mysqli_real_escape_string($db, $_POST['room_name']);
	$room_capacity = mysqli_real_escape_string($db, $_POST['room_capacity']);
	$room_status   = mysqli_real_escape_string($db, $_POST['room_status']);
	$chk_in_date   = mysqli_real_escape_string($db, $_POST['check_in_date']);
	$chk_out_date  = mysqli_real_escape_string($db, $_POST['check_out_date']);

	$update = "UPDATE room_tbl SET room_title = '$room_name', room_capacity = '$room_capacity', checkin_date = '$chk_in_date', checkout_date = '$chk_out_date', room_status = '$room_status' WHERE room_id = '$room_id'";
	$run_update = mysqli_query($db, $update) or die(mysqli_error($db));
	

	if($run_update)
	{
		echo "<script>alert('Update done succesfully!')</script>";
		echo "<script>document.location='view-room.php'</script>";
	}


?>