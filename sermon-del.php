<?php

	include("includes/db_conn.php");

	if(isset($_POST['delete']))
	{
		$id = mysqli_real_escape_string($db, $_POST['sermon_id']);

		$delete     = "DELETE FROM sermon_tbl WHERE sermon_id = '$id'";
		$run_delete = mysqli_query($db, $delete)or die(mysqli_error($db));

		if($run_delete)
		{
			echo "<script>alert('Sermon deleted successfully')</script>";
			echo "<script>document.location='view-sermon.php'</script>";
		}
	}	


?>