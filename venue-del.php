<?php

	include("includes/db_conn.php");

	if(isset($_POST['delete']))
	{
		$id = mysqli_real_escape_string($db, $_POST['venue_id']);

		$delete = "DELETE FROM venue_tbl WHERE venue_id = '$id'";
		$run_delete = mysqli_query($db, $delete)or die(mysqli_error($db));

		if($run_delete)
		{
			echo "<script>alert('Venue deleted successfully')</script>";
			echo "<script>document.location='view-venue.php'</script>";
		}
	}	


?>