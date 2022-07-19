<?php

	include("includes/db_conn.php");

	if(isset($_POST['delete']))
	{
		$id = mysqli_real_escape_string($db, $_POST['pledge_id']);

		$delete = "DELETE FROM pledges_tbl WHERE pledge_id = '$id'";
		$run_delete = mysqli_query($db, $delete)or die(mysqli_error($db));

		if($run_delete)
		{
			echo "<script>alert('Pledge deleted successfully')</script>";
			echo "<script>document.location='view-pledge.php'</script>";
		}
	}	


?>