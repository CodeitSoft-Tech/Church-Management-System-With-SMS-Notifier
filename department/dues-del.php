<?php

	include("../includes/db_conn.php");

	if(isset($_POST['delete']))
	{
		$id = mysqli_real_escape_string($db, $_POST['dues_id']);

		$delete = "DELETE FROM group_dues WHERE dues_id = '$id'";
		$run_delete = mysqli_query($db, $delete)or die(mysqli_error($db));

		if($run_delete)
		{
			echo "<script>alert('Dues details deleted successfully')</script>";
			echo "<script>document.location='index.php'</script>";
		}
	}	


?>