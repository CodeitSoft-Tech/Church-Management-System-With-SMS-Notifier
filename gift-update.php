<?php

	include("includes/db_conn.php");

	$gift_id 	    = mysqli_real_escape_string($db, $_POST['gift_id']);
	$gift_name      = mysqli_real_escape_string($db, $_POST['gift_name']);
	$gift_price     = mysqli_real_escape_string($db, $_POST['gift_price']);
	$gift_desc      = mysqli_real_escape_string($db, $_POST['gift_desc']);


	$update = "UPDATE spiritual_gift_tbl SET gift_name = '$gift_name', gift_price = '$gift_price', gift_desc = '$gift_desc' WHERE gift_id = '$gift_id'";
	$run_update = mysqli_query($db, $update) or die(mysqli_error($db));
	
	if($run_update)
	{
		echo "<script>alert('Update done succesfully!')</script>";
		echo "<script>document.location='view-gift.php'</script>";
	}


?>