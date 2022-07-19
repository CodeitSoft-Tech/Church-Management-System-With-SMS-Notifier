<?php

	include("includes/db_conn.php");

	if(isset($_POST['delete']))
	{
	    
		$id = mysqli_real_escape_string($db, $_POST['income_id']);

		$delete     = "DELETE FROM income_tbl WHERE income_id = '$id'";
		$run_delete = mysqli_query($db, $delete)or die(mysqli_error($db));

		if($run_delete)
		{
			echo "<script>alert('Income details deleted successfully')</script>";
			echo "<script>document.location='add-income.php'</script>";
		}
	}	


?>