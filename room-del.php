<?php

	include("includes/db_conn.php");

	if(isset($_POST['delete']))
	{
		$id = mysqli_real_escape_string($db, $_POST['room_id']);

		$delete = "DELETE FROM room_tbl WHERE room_id = '$id'";
		$run_delete = mysqli_query($db, $delete)or die(mysqli_error($db));

		if($run_delete)
		{
			echo "<script>alert('Room deleted successfully')</script>";
			echo "<script>document.location='view-room.php'</script>";
		}
	}	


?>