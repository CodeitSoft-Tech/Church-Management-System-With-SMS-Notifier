<?php

	include("includes/db_conn.php");

	$donation_id 	  = mysqli_real_escape_string($db, $_POST['donation_id']);
	$fullname         = mysqli_real_escape_string($db, $_POST['fullname']);
	$amount           = mysqli_real_escape_string($db, $_POST['amount']);
	$phone            = mysqli_real_escape_string($db, $_POST['phone_number']);
	$address          = mysqli_real_escape_string($db, $_POST['location']);
	$donation_type    = mysqli_real_escape_string($db, $_POST['donation_type']);
	$payment_type     = mysqli_real_escape_string($db, $_POST['payment_type']);
	$donation_date    = mysqli_real_escape_string($db, $_POST['donation_date']);
	

	$update = "UPDATE donation_tbl SET type_id = '$donation_type', name = '$fullname', amount = '$amount', contact = '$phone', address = '$address', type = '$payment_type', date_donated = '$donation_date' WHERE donation_id = '$donation_id'";
	$run_update = mysqli_query($db, $update) or die(mysqli_error($db));
	

	if($run_update)
	{
		echo "<script>alert('Update done succesfully!')</script>";
		echo "<script>document.location='view-donation.php'</script>";
	}


?>