<?php

	include("includes/db_conn.php");

	$service_id 	 = mysqli_real_escape_string($db, $_POST['service_id']);
	$service_name    = mysqli_real_escape_string($db, $_POST['service_name']);
	$service_by      = mysqli_real_escape_string($db, $_POST['service_by']);
    $service_type    = mysqli_real_escape_string($db, $_POST['service_type']);
    $service_day     = mysqli_real_escape_string($db, $_POST['service_day']);
    $service_date    = mysqli_real_escape_string($db, $_POST['service_date']);
    $service_time    = mysqli_real_escape_string($db, $_POST['service_time']);
    $approval_status = mysqli_real_escape_string($db, $_POST['approval_status']);
    $service_status  = mysqli_real_escape_string($db, $_POST['service_status']);

	$update = "UPDATE service_tbl SET service_name = '$service_name', service_by = '$service_by', service_type = '$service_type', service_day = '$service_day', service_date = '$service_date', service_time = '$service_time', approval_status = '$approval_status', service_status = '$service_status' WHERE service_id = '$service_id'";
	$run_update = mysqli_query($db, $update) or die(mysqli_error($db));
	
	
	if($run_update)
	{
		echo "<script>alert('Update done succesfully!')</script>";
		echo "<script>document.location='view-service.php'</script>";
	}


?>