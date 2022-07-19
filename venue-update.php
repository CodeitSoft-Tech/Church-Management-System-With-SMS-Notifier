<?php

	include("includes/db_conn.php");

	$venue_id 	      = mysqli_real_escape_string($db, $_POST['venue_id']);
	$venue_name       = mysqli_real_escape_string($db, $_POST['venue_name']);
    $venue_capacity   = mysqli_real_escape_string($db, $_POST['venue_capacity']);
	$venue_status     = mysqli_real_escape_string($db, $_POST['venue_status']);
	$venue_location   = mysqli_real_escape_string($db, $_POST['venue_location']);


	$update = "UPDATE venue_tbl SET venue_name = '$venue_name', venue_capacity = '$venue_capacity', venue_location = '$venue_location', venue_status = '$venue_status' WHERE venue_id = '$venue_id'";
	$run_update = mysqli_query($db, $update) or die(mysqli_error($db));
	

	if($run_update)
	{
		echo "<script>alert('Update done succesfully!')</script>";
		echo "<script>document.location='view-venue.php'</script>";
	}


?>