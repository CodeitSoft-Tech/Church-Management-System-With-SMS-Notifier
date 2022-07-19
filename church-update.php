<?php

	include("includes/db_conn.php");

	$church_id 	        = mysqli_real_escape_string($db, $_POST['church_id']);
	$church_name        = mysqli_real_escape_string($db, $_POST['church_name']);
	$church_founder 	= mysqli_real_escape_string($db, $_POST['church_founder']);
	$church_number 		= mysqli_real_escape_string($db, $_POST['church_number']);
	$church_email		= mysqli_real_escape_string($db, $_POST['church_email']);
	$church_region	    = mysqli_real_escape_string($db, $_POST['church_region']);
	$church_loc	        = mysqli_real_escape_string($db, $_POST['church_loc']);
	$church_date 		= mysqli_real_escape_string($db, $_POST['church_date']);
	$church_desc		= mysqli_real_escape_string($db, $_POST['church_desc']);
	
    // image processing
    $church_img   = $_FILES['church_img']['name'];
    $temp_name    = $_FILES['church_img']['tmp_name'];
    move_uploaded_file($temp_name,"church_img/$church_img");


	  if($church_img == "")
	  {
		   $update_church = "UPDATE church_info_tbl SET church_name = '$church_name', church_number = '$church_number', church_email = '$church_email', church_location = '$church_loc', church_region = '$church_region', church_date = '$church_date', church_desc = '$church_desc' WHERE church_id = '$church_id'";
	        $run_update = mysqli_query($db, $update_church);
	   }
	   else
	   {

		   $update_church = "UPDATE church_info_tbl SET church_name = '$church_name', church_number = '$church_number', church_email = '$church_email', church_img = '$church_img', church_location = '$church_loc', church_region = '$church_region', church_date = '$church_date', church_desc = '$church_desc' WHERE church_id = '$church_id'";
	        $run_update = mysqli_query($db, $update_church);
	   }


		echo "<script>alert('Update done succesfully!')</script>";
		echo "<script>document.location='church-info.php'</script>";
	

?>