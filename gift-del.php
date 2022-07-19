<?php

	include("includes/db_conn.php");

	if(isset($_POST['delete']))
	{
		$id = mysqli_real_escape_string($db, $_POST['gift_id']);

		$delete = "DELETE FROM spiritual_gift_tbl WHERE gift_id = '$id'";
		$run_delete = mysqli_query($db, $delete)or die(mysqli_error($db));

		if($run_delete)
		{
			echo "<script>alert('Church gift deleted successfully')</script>";
			echo "<script>document.location='view-gift.php'</script>";
		}
	}	


?>