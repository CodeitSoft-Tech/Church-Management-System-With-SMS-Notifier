<?php

	include("includes/db_conn.php");

	$expense_cat_id 	 = mysqli_real_escape_string($db, $_POST['expense_cat_id']);
	$expense_cat_name    = mysqli_real_escape_string($db, $_POST['expense_cat_name']);
	

	$update = "UPDATE expense_cat SET expense_cat_name = '$expense_cat_name' WHERE expense_cat_id = '$expense_cat_id'";
	$run_update = mysqli_query($db, $update) or die(mysqli_error($db));
	
	if($run_update)
	{
		echo "<script>alert('Update done succesfully!')</script>";
		echo "<script>document.location='expense-cat.php'</script>";
	}


?>