<?php
		
	include("../includes/db_conn.php");
	
	if(isset($_POST['submit']))
	{
		$service_name    = mysqli_real_escape_string($db, $_POST['service_name']);
		$service_by      = mysqli_real_escape_string($db, $_POST['service_by']);
		$service_type    = mysqli_real_escape_string($db, $_POST['service_type']);
		$service_day     = mysqli_real_escape_string($db, $_POST['service_day']);
		$service_date    = mysqli_real_escape_string($db, $_POST['service_date']);
		$service_time    = mysqli_real_escape_string($db, $_POST['service_time']);
		$approval_status = "Pending";
		$service_status  = "Upcoming";

		$insert_service = "INSERT INTO service_tbl(service_name, service_by, service_type, service_day, service_date, service_time, approval_status, service_status)VALUES('$service_name','$service_by', '$service_type', '$service_day', '$service_date', '$service_time', '$approval_status', '$service_status')";
		$run_service = mysqli_query($db, $insert_service);

		if($run_service)
		{
			 echo "<script>alert('Service request sent successfully')</script>";
			 echo "<script>document.location='index.php'</script>"; 
		}

	}

?>