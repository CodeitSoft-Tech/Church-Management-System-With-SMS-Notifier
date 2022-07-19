<?php

	include("includes/db_conn.php");

	if(isset($_POST['delete']))
	{
		$id = mysqli_real_escape_string($db, $_POST['donation_id']);

		$delete = "DELETE FROM donation_tbl WHERE donation_id = '$id'";
		$run_delete = mysqli_query($db, $delete)or die(mysqli_error($db));

		if($run_delete)
		{
			echo "<script>alert('Donation deleted successfully')</script>";
			echo "<script>document.location='view-donation.php'</script>";
		}
	}	
?>