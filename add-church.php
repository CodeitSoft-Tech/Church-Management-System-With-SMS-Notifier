<?php

    include("includes/db_conn.php");

	$ErrorLogin = array();
	
	if(isset($_POST['add_church']))
	{
		
		$church_name      = mysqli_real_escape_string($db, $_POST['church_name']);
		$church_founder   = mysqli_real_escape_string($db, $_POST['church_founder']);
		$church_number    = mysqli_real_escape_string($db, $_POST['church_number']);
		$church_email     = mysqli_real_escape_string($db, $_POST['church_email']);
		$church_region    = mysqli_real_escape_string($db, $_POST['church_region']);
		$church_loc       = mysqli_real_escape_string($db, $_POST['church_loc']);
		$church_date      = mysqli_real_escape_string($db, $_POST['church_date']);
		$church_desc      = mysqli_real_escape_string($db, $_POST['church_desc']);


		if(strlen($church_number) > 10 || strlen($church_number) < 10)
	    {
	    	$ErrorLogin[] = "Invalid mobile number. Mobile number should be up to 10.";
	    }
	    else
	    {
			
			// image processing
			$church_img   = $_FILES['church_img']['name'];
			$temp_name    = $_FILES['church_img']['tmp_name'];
			move_uploaded_file($temp_name, "church-images/church/$church_img");
														
			$insert_church = "INSERT INTO church_info_tbl(church_name, church_number, church_email,	church_img,	church_location, church_region,	church_founder,	church_date, church_desc)
			 VALUES('$church_name', '$church_number', '$church_email', '$church_img', '$church_loc', '$church_region', '$church_founder','$church_date', '$church_desc')";

			$run_church = mysqli_query($db, $insert_church);

			if($run_church)
			{
				echo "<script>alert('Church Details added successfully')</script>";
				echo "<script>document.location='church-info.php'</script>"; 
			}

	}

 }


?>