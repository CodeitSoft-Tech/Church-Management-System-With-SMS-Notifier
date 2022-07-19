<?php

	include("includes/db_conn.php");

	if(isset($_POST['delete']))
	{
		$id = mysqli_real_escape_string($db, $_POST['event_id']);

		$delete = "DELETE FROM events_tbl WHERE event_id = '$id'";
		$run_delete = mysqli_query($db, $delete)or die(mysqli_error($db));

		if($run_delete)
		{
			echo "<script>alert('Event deleted successfully')</script>";
			echo "<script>document.location='view-event.php'</script>";
		}
	}	


?>