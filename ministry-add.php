<?php

	include("includes/db_conn.php");
	$ErrorLogin = array();
	
	if(isset($_POST['submit']))
	{

		$ministry_name  = mysqli_real_escape_string($db, $_POST['ministry_name']);
		$ministry_email = mysqli_real_escape_string($db, $_POST['ministry_email']);
		$ministry_phone = mysqli_real_escape_string($db, $_POST['ministry_phone']);
		$ministry_date  = mysqli_real_escape_string($db, $_POST['ministry_date']);
		$min_name       = mysqli_real_escape_string($db, $_POST['min_name']);
		$min_pass       = mysqli_real_escape_string($db, $_POST['min_pass']);

		if(strlen($ministry_phone) > 10 || strlen($ministry_phone) < 10)
	    {
	    	$ErrorLogin[] = "Invalid mobile number. Mobile number should be up to 10.";
	    }
	    else
	    {
			// image processing
			$ministry_img   = $_FILES['ministry_img']['name'];
			$temp_name      = $_FILES['ministry_img']['tmp_name'];
			move_uploaded_file($temp_name,"church-images/ministries/$ministry_img");

			$insert_min = "INSERT INTO ministry_tbl(ministry_name, ministry_photo, ministry_email, ministry_number, ministry_date, username, password)VALUES('$ministry_name','$ministry_img','$ministry_email','$ministry_phone', '$ministry_date', '$min_name', '$min_pass')";
			$run_min = mysqli_query($db, $insert_min);

			if($run_min)
			{
				echo "<script>alert('Ministry added successfully')</script>";
				echo "<script>document.location='add-ministry.php'</script>"; 
			}
		}

	}

?>