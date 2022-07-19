<?php

	include("includes/db_conn.php");

	$income_id 	    = mysqli_real_escape_string($db, $_POST['income_id']);
	$income_name    = mysqli_real_escape_string($db, $_POST['income_name']);
	$income_amt     = mysqli_real_escape_string($db, $_POST['income_amt']);
	$income_tax     = mysqli_real_escape_string($db, $_POST['income_tax']);
	$income_type    = mysqli_real_escape_string($db, $_POST['income_type']);
	$income_acc     = mysqli_real_escape_string($db, $_POST['income_account']);
	$income_desc    = mysqli_real_escape_string($db, $_POST['income_desc']);


	$update = "UPDATE income_tbl SET income_cat_id = '$income_name', income_amt = '$income_amt', income_tax = '$income_tax', income_type = '$income_type', income_account = '$income_acc', income_desc = '$income_desc' WHERE income_id = '$income_id'";
	$run_update = mysqli_query($db, $update) or die(mysqli_error($db));
	
	if($run_update)
	{
		echo "<script>alert('Income details updated succesfully!')</script>";
		echo "<script>document.location='add-income.php'</script>";
	}


?>