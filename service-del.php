<?php

	include("includes/db_conn.php");

	if(isset($_POST['delete']))
	{
		$id = mysqli_real_escape_string($db, $_POST['service_id']);

		$delete     = "DELETE FROM service_tbl WHERE service_id = '$id'";
		$run_delete = mysqli_query($db, $delete)or die(mysqli_error($db));

		if($run_delete)
		{
			echo "<script>alert('Service deleted successfully')</script>";
			echo "<script>document.location='view-service.php'</script>";
		}
	}	


?>