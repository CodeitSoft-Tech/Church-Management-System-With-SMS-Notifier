<?php

	include("includes/db_conn.php");

	if(isset($_POST['delete']))
	{
		$id = mysqli_real_escape_string($db, $_POST['group_id']);

		$delete     = "DELETE FROM group_tbl WHERE group_id = '$id'";
		$run_delete = mysqli_query($db, $delete)or die(mysqli_error($db));

		if($run_delete)
		{
			echo "<script>alert('Department deleted successfully')</script>";
			echo "<script>document.location='view-department.php'</script>";
		}
	}	


?>