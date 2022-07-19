<?php

	include("includes/db_conn.php");

	    $pledge_id 	     = mysqli_real_escape_string($db, $_POST['pledge_id']);
		$member_name     = mysqli_real_escape_string($db, $_POST['member_name']);
		$phone           = mysqli_real_escape_string($db, $_POST['phone_number']);
		$address         = mysqli_real_escape_string($db, $_POST['location']);
		$start_date      = mysqli_real_escape_string($db, $_POST['start_date']);
		$end_date        = mysqli_real_escape_string($db, $_POST['end_date']);
		$pledge_amount   = mysqli_real_escape_string($db, $_POST['pledge_amount']);
		$pledge_desc     = mysqli_real_escape_string($db, $_POST['pledge_desc']);
		$pledge_status   = mysqli_real_escape_string($db, $_POST['pledge_status']);

		$update = "UPDATE pledges_tbl SET member_name = '$member_name', phone_number = '$phone', address = '$address', start_date = '$start_date', end_date = '$end_date', pledge_amt = '$pledge_amount', pledge_status = '$pledge_status', pledge_desc = '$pledge_desc' WHERE pledge_id = '$pledge_id'";
		$run_update = mysqli_query($db, $update) or die(mysqli_error($db));
		

		if($run_update)
		{
			echo "<script>alert('Update done succesfully!')</script>";
			echo "<script>document.location='view-pledge.php'</script>";
		}


?>