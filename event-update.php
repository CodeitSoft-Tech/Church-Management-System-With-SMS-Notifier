<?php

	include("includes/db_conn.php");

	$event_id 	   = mysqli_real_escape_string($db, $_POST['event_id']);
	$event_name    = mysqli_real_escape_string($db, $_POST['event_name']);
    $start_date    = mysqli_real_escape_string($db, $_POST['start_date']);
	$end_date      = mysqli_real_escape_string($db, $_POST['end_date']);
	$event_loc     = mysqli_real_escape_string($db, $_POST['event_loc']);
	$event_org     = mysqli_real_escape_string($db, $_POST['event_org']);
	$approval_status  = mysqli_real_escape_string($db, $_POST['approval_status']);
	$event_status  = mysqli_real_escape_string($db, $_POST['event_status']);	
	$event_desc    = mysqli_real_escape_string($db, $_POST['event_desc']);
		
	$event_banner  = $_FILES['event_banner']['name'];
	$tmp_name 	   = $_FILES['event_banner']['tmp_name'];
	move_uploaded_file($tmp_name, "event_images/$event_banner");


	if($event_banner == "")
	{
		$update = "UPDATE events_tbl SET event_name = '$event_name', organized_by = '$event_org', start_date = '$start_date', end_date = '$end_date', event_location = '$event_loc', approval_status = '$approval_status' , event_status = '$event_status', event_desc = '$event_desc' WHERE event_id = '$event_id'";
		$run_update = mysqli_query($db, $update) or die(mysqli_error($db));
	}
	else
	{
		$update = "UPDATE events_tbl SET organized_by = '$event_org', event_name = '$event_name', event_banner = '$event_banner', start_date = '$start_date', end_date = '$end_date', event_location = '$event_loc', approval_status = '$approval_status', event_status = '$event_status', event_desc = '$event_desc' WHERE event_id = '$event_id'";
		$run_update = mysqli_query($db, $update) or die(mysqli_error($db));
	}	

	
		echo "<script>alert('Update done succesfully!')</script>";
		echo "<script>document.location='view-event.php'</script>";
	


?>