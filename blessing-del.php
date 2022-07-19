<?php

	include("includes/db_conn.php");

	if(isset($_POST['delete']))
	{
		$id = mysqli_real_escape_string($db, $_POST['blessing_id']);

		$delete     = "DELETE FROM tbl_out_blessing WHERE out_blessing_id = '$id'";
		$run_delete = mysqli_query($db, $delete)or die(mysqli_error($db));

		if($run_delete)
		{
			echo "<script>alert('Details deleted successfully')</script>";
			echo "<script>document.location='view-blessing.php'</script>";
		}
	}	


?>