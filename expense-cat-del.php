<?php

	include("includes/db_conn.php");

	if(isset($_POST['delete']))
	{
		$id = mysqli_real_escape_string($db, $_POST['expense_cat_id']);

		$delete     = "DELETE FROM expense_cat WHERE expense_cat_id = '$id'";
		$run_delete = mysqli_query($db, $delete)or die(mysqli_error($db));

		if($run_delete)
		{
			echo "<script>alert('Category deleted successfully')</script>";
			echo "<script>document.location='expense-cat.php'</script>";
		}
	}	


?>