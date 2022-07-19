<?php

	include("includes/db_conn.php");

	$income_cat_id 	    = mysqli_real_escape_string($db, $_POST['income_cat_id']);
	$income_cat_name    = mysqli_real_escape_string($db, $_POST['income_cat_name']);
	


	$update = "UPDATE income_cat SET income_cat_name = '$income_cat_name' WHERE income_cat_id = '$income_cat_id'";
	$run_update = mysqli_query($db, $update) or die(mysqli_error($db));
	
	if($run_update)
	{
		echo "<script>alert('Update done succesfully!')</script>";
		echo "<script>document.location='income-cat.php'</script>";
	}


?>