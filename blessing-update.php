<?php

	include("includes/db_conn.php");

	$blessing_id 	 = mysqli_real_escape_string($db, $_POST['blessing_id']);
	$blessing_name   = mysqli_real_escape_string($db, $_POST['blessing_name']);
	$blessing_type   = mysqli_real_escape_string($db, $_POST['blessing_type']);
    $amount          = mysqli_real_escape_string($db, $_POST['amount']);
    $recipient       = mysqli_real_escape_string($db, $_POST['recipient']);
    $location        = mysqli_real_escape_string($db, $_POST['location']);
    $blessing_date   = mysqli_real_escape_string($db, $_POST['blessing_date']);
    $blessing_desc   = mysqli_real_escape_string($db, $_POST['blessing_desc']);
  

	$update = "UPDATE tbl_out_blessing SET blessing_name = '$blessing_name', blessing_type = '$blessing_type', presents = '$amount', blessing_to = '$recipient', blessing_location = '$location', blessing_date = '$blessing_date', blessing_desc = '$blessing_desc' WHERE out_blessing_id = '$blessing_id'";
	$run_update = mysqli_query($db, $update) or die(mysqli_error($db));
	

	if($run_update)
	{
		echo "<script>alert('Update done succesfully!')</script>";
		echo "<script>document.location='view-blessing.php'</script>";
	}


?>