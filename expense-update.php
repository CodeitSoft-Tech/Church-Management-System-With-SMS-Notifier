<?php

	include("includes/db_conn.php");

	$expense_id 	 = mysqli_real_escape_string($db, $_POST['expense_id']);
	$expense_name    = mysqli_real_escape_string($db, $_POST['expense_name']);
	$expense_amt     = mysqli_real_escape_string($db, $_POST['expense_amount']);


	$update = "UPDATE tbl_expenses SET expense_cat_id = '$expense_name', expense_amount = '$expense_amt', expense_date = NOW() WHERE expense_id = '$expense_id'";
	$run_update = mysqli_query($db, $update) or die(mysqli_error($db));
	
	if($run_update)
	{
		echo "<script>alert('Update done succesfully!')</script>";
		echo "<script>document.location='add-expense.php'</script>";
	}


?>