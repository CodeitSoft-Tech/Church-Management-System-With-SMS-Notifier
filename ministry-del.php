<?php

	include("includes/db_conn.php");

	if(isset($_POST['delete']))
	{
		$id = mysqli_real_escape_string($db, $_POST['ministry_id']);

		$delete = "DELETE FROM ministry_tbl WHERE ministry_id = '$id'";
		$run_delete = mysqli_query($db, $delete)or die(mysqli_error($db));

		if($run_delete)
		{
			echo "<script>alert('Ministry deleted Successfully')</script>";
			echo "<script>document.location='view-ministry.php'</script>";
		}
	}	


?>