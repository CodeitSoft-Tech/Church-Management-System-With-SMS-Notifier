<?php

	include("includes/db_conn.php");

	if(isset($_POST['delete']))
	{
		$id = mysqli_real_escape_string($db, $_POST['church_id']);

		$delete = "DELETE FROM church_info_tbl WHERE church_id = '$id'";
		$run_delete = mysqli_query($db, $delete)or die(mysqli_error($db));

		if($run_delete)
		{
			echo "<script>alert('Church Details deleted successfully')</script>";
			echo "<script>document.location='church-info.php'</script>";
		}
	}	


?>