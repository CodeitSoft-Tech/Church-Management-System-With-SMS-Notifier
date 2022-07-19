<?php

	include("../includes/db_conn.php");

	$dept_id 	   = mysqli_real_escape_string($db, $_POST['dept_id']);
	$dept_name     = mysqli_real_escape_string($db, $_POST['dept_name']);
	$dept_email    = mysqli_real_escape_string($db, $_POST['dept_email']);
	$dept_phone    = mysqli_real_escape_string($db, $_POST['dept_number']);
	$dept_date     = mysqli_real_escape_string($db, $_POST['dept_date']);
	$dept_prez     = mysqli_real_escape_string($db, $_POST['dept_prez']);
	$dept_veep     = mysqli_real_escape_string($db, $_POST['dept_veep']);

	 // image processing
    $dept_img       = $_FILES['dept_img']['name'];
    $temp_name      = $_FILES['dept_img']['tmp_name'];
    move_uploaded_file($temp_name,"church-images/dept/$dept_img");


	if($dept_img == "")
	{
		$update = "UPDATE group_tbl SET group_name = '$dept_name', group_email = '$dept_email', group_number = '$dept_phone', group_date = '$dept_date', dept_prez = '$dept_prez', dept_veep = '$dept_veep' WHERE group_id = '$dept_id'";
		$run_update = mysqli_query($db, $update) or die(mysqli_error($db));
	}
	else
	{
		$update = "UPDATE group_tbl SET group_name = '$dept_name', group_photo = '$dept_img', group_email = '$dept_email', group_number = '$dept_phone', group_date = '$dept_date', dept_prez = '$dept_prez', dept_veep = '$dept_veep' WHERE group_id = '$dept_id'";
		$run_update = mysqli_query($db, $update) or die(mysqli_error($db));
	}
	

		echo "<script>alert('Update done succesfully!')</script>";
		echo "<script>document.location='index.php'</script>";


?>