<?php

	include("../includes/db_conn.php");

	$dues_id 		= mysqli_real_escape_string($db, $_POST['dues_id']);
	$member_name    = mysqli_real_escape_string($db, $_POST['member_name']);
	$amount    		= mysqli_real_escape_string($db, $_POST['amount']);
	$month    		= mysqli_real_escape_string($db, $_POST['month']);
	$dues_date     	= mysqli_real_escape_string($db, $_POST['dues_date']);

	$update = "UPDATE group_dues SET member_name = '$member_name', amount = '$amount', dues_month = '$month',  payment_date = '$dues_date' WHERE dues_id = '$dues_id'";
	$run_update = mysqli_query($db, $update) or die(mysqli_error($db));
	
	if($run_update)
	{
		echo "<script>alert('Update done succesfully!')</script>";
		echo "<script>document.location='index.php'</script>";
	}


?>