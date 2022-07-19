<?php

	include("includes/db_conn.php");

	$offer_id 	 = mysqli_real_escape_string($db, $_POST['offer_id']);
	$amount      = mysqli_real_escape_string($db, $_POST['amount']);
	$date        = mysqli_real_escape_string($db, $_POST['date']);
	

	$update = "UPDATE main_offertory SET offertory_amt = '$amount', offertory_date = '$date' WHERE offertory_id = '$offer_id'";
	$run_update = mysqli_query($db, $update) or die(mysqli_error($db));
	
	if($run_update)
	{
		echo "<script>alert('Update done succesfully!')</script>";
		echo "<script>document.location='main-offertory.php'</script>";
	}


?>