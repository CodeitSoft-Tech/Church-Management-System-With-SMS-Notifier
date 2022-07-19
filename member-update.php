<?php

	include("includes/db_conn.php");

	$member_id 	        = mysqli_real_escape_string($db, $_POST['member_id']);
	$member_name        = mysqli_real_escape_string($db, $_POST['member_name']);
	$min_name 			= mysqli_real_escape_string($db, $_POST['ministry_name']);
	$grp_name 			= mysqli_real_escape_string($db, $_POST['group_name']);
	$volunteer 			= mysqli_real_escape_string($db, $_POST['volunteer']);
	$location 			= mysqli_real_escape_string($db, $_POST['location']);
	$phone 			    = mysqli_real_escape_string($db, $_POST['phone']);
	$email				= mysqli_real_escape_string($db, $_POST['email']);
	$gender 			= mysqli_real_escape_string($db, $_POST['gender']);
	$marital_status		= mysqli_real_escape_string($db, $_POST['marital_status']);
	$dob                = mysqli_real_escape_string($db, $_POST['dob']);
	
    // image processing
    $member_img   = $_FILES['member_img']['name'];
    $temp_name    = $_FILES['member_img']['tmp_name'];
    move_uploaded_file($temp_name,"member_images/$member_img");

	if($member_img == "")
	  {
		   $update_member = "UPDATE members_tbl SET group_id = '$grp_name', ministry_id = '$min_name', member_name = '$member_name', member_email = '$email', member_phone = '$phone', member_gender = '$gender', marital_status = '$marital_status',  volunteer = '$volunteer', location = '$location', dob = '$dob' WHERE member_id = '$member_id'";
	        $run_update = mysqli_query($db, $update_member);
	   }
	   else
	   {

		   $update_member = "UPDATE members_tbl SET group_id = '$grp_name', ministry_id = '$min_name', member_name = '$member_name', member_photo = '$member_img', member_email = '$email', member_phone = '$phone', member_gender = '$gender', marital_status = '$marital_status', volunteer = '$volunteer', location = '$location', dob = '$dob' WHERE member_id = '$member_id'";
	        $run_update = mysqli_query($db, $update_member);
	   }


		echo "<script>alert('Update done succesfully!')</script>";
		echo "<script>document.location='view-members.php'</script>";
	

?>