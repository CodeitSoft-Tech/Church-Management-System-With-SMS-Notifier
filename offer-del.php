<?php

	include("includes/db_conn.php");

	if(isset($_POST['delete']))
	{
		$id = mysqli_real_escape_string($db, $_POST['offer_id']);

		$delete     = "DELETE FROM main_offertory WHERE offertory_id = '$id'";
		$run_delete = mysqli_query($db, $delete)or die(mysqli_error($db));

		if($run_delete)
		{
			echo "<script>alert('Main offertory deleted successfully')</script>";
			echo "<script>document.location='main-offertory.php'</script>";
		}
	}	


?>