<?php

	include("includes/db_conn.php");

	$group_id 	    = mysqli_real_escape_string($db, $_POST['group_id']);
	$group_name     = mysqli_real_escape_string($db, $_POST['group_name']);
	$group_email    = mysqli_real_escape_string($db, $_POST['group_email']);
	$group_phone    = mysqli_real_escape_string($db, $_POST['group_phone']);
	$group_date     = mysqli_real_escape_string($db, $_POST['group_date']);

	$group_img   = $_FILES['group_img']['name'];
	$tmp_name    = $_FILES['group_img']['tmp_name'];
	move_uploaded_file($tmp_name, "department_images/$group_img");


	if($group_img == "")
	{
		$update = "UPDATE group_tbl SET group_name = '$group_name', group_email = '$group_email', group_number = '$group_phone', group_date = '$group_date' WHERE group_id = '$group_id'";
		$run_update = mysqli_query($db, $update) or die(mysqli_error($db));
    }
    else
    {
    	$update = "UPDATE group_tbl SET group_name = '$group_name', group_photo = '$group_img', group_email = '$group_email', group_number = '$group_phone', group_date = '$group_date' WHERE group_id = '$group_id'";
		$run_update = mysqli_query($db, $update) or die(mysqli_error($db));
    }		

		echo "<script>alert('Update done succesfully!')</script>";
		echo "<script>document.location='view-department.php'</script>";
	
?>