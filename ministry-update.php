<?php

	include("includes/db_conn.php");

	$ministry_id 	   = mysqli_real_escape_string($db, $_POST['ministry_id']);
	$ministry_name     = mysqli_real_escape_string($db, $_POST['ministry_name']);
	$ministry_email    = mysqli_real_escape_string($db, $_POST['ministry_email']);
	$ministry_phone    = mysqli_real_escape_string($db, $_POST['ministry_phone']);
	$ministry_date     = mysqli_real_escape_string($db, $_POST['ministry_date']);

	 // image processing
    $ministry_img   = $_FILES['ministry_photo']['name'];
    $temp_name      = $_FILES['ministry_photo']['tmp_name'];
    move_uploaded_file($temp_name,"ministry_images/$ministry_img");


	if($ministry_img == "")
	{
		$update = "UPDATE ministry_tbl SET ministry_name = '$ministry_name', ministry_email = '$ministry_email', ministry_number = '$ministry_phone', ministry_date = '$ministry_date' WHERE ministry_id = '$ministry_id'";
		$run_update = mysqli_query($db, $update) or die(mysqli_error($db));
	}
	else
	{
		$update = "UPDATE ministry_tbl SET ministry_name = '$ministry_name', ministry_photo = '$ministry_img', ministry_email = '$ministry_email', ministry_number = '$ministry_phone', ministry_date = '$ministry_date' WHERE ministry_id = '$ministry_id'";
		$run_update = mysqli_query($db, $update) or die(mysqli_error($db));
	}
	

		echo "<script>alert('Update done succesfully!')</script>";
		echo "<script>document.location='view-ministry.php'</script>";


?>