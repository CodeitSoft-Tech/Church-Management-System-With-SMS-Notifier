<?php

	include("includes/db_conn.php");

	if(isset($_POST['delete']))
	{
		$id = mysqli_real_escape_string($db, $_POST['member_id']);

		$delete = "DELETE FROM members_tbl WHERE member_id = '$id'";
		$run_delete = mysqli_query($db, $delete)or die(mysqli_error($db));

		if($run_delete)
		{
			echo "<script>alert('Member deleted successfully')</script>";
			echo "<script>document.location='view-members.php'</script>";
		}
	}	


?>