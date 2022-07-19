<?php

	include("includes/db_conn.php");

	$ErrorLogin = array();
	
	if(isset($_POST['submit']))
	{
		$member_name      = mysqli_real_escape_string($db, $_POST['member_name']);
		$min_name         = mysqli_real_escape_string($db, $_POST['ministry_name']);
		$grp_name         = mysqli_real_escape_string($db, $_POST['group_name']);
		$volunteer        = mysqli_real_escape_string($db, $_POST['volunteer']);
		$location         = mysqli_real_escape_string($db, $_POST['location']);
		$phone            = mysqli_real_escape_string($db, $_POST['phone_number']);
		$email            = mysqli_real_escape_string($db, $_POST['email']);
		$dob              = mysqli_real_escape_string($db, $_POST['dob']);
		$gender           = mysqli_real_escape_string($db, $_POST['gender']);
		$marital_status   = mysqli_real_escape_string($db, $_POST['marital_status']);
        $username         = mysqli_real_escape_string($db, $_POST['username']);
        $member_pass      = mysqli_real_escape_string($db, $_POST['member_pass']);


	    if(strlen($phone) > 10 || strlen($phone) < 10)
	    {
	    	$ErrorLogin[] = "Invalid mobile number. Mobile number should be up to 10.";
	    }
	    else
	    {
				// image processing
				$member_img   = $_FILES['member_img']['name'];
				$temp_name    = $_FILES['member_img']['tmp_name'];
				move_uploaded_file($temp_name,"church-images/members/$member_img");
				move_uploaded_file($temp_name,"church-images/members/$member_img");
															
				$insert_member = "INSERT INTO members_tbl(group_id, ministry_id, member_name, member_photo, member_email,	member_phone, member_gender, marital_status, volunteer, location, dob, date_added, username, password)
				 VALUES('$grp_name', '$min_name', '$member_name', '$member_img', '$email', '$phone', '$gender','$marital_status', '$volunteer', '$location', '$dob', NOW(), '$username', '$member_pass')";

				$run_member = mysqli_query($db, $insert_member);

				if($run_member)
				{
					echo "<script>alert('Member added successfully')</script>";
					echo "<script>document.location='add-member.php'</script>"; 
				}
		}

	}

?>