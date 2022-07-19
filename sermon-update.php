<?php

	     include("includes/db_conn.php");

	    $sermon_id       = mysqli_real_escape_string($db, $_POST['sermon_id']);
		$sermon_title    = mysqli_real_escape_string($db, $_POST['sermon_title']);
		$sermon_by       = mysqli_real_escape_string($db, $_POST['sermon_by']);
		$sermon_date     = mysqli_real_escape_string($db, $_POST['sermon_date']);
		$sermon_type     = mysqli_real_escape_string($db, $_POST['sermon_type']);
		$sermon_status 	 = mysqli_real_escape_string($db, $_POST['sermon_status']);
		$sermon_desc     = mysqli_real_escape_string($db, $_POST['sermon_desc']);

		$sermon_file    = $_FILES['sermon_file']['name'];
		$tmp_name 	    = $_FILES['sermon_file']['tmp_name'];
		move_uploaded_file($tmp_name, "sermon_imgs/$sermon_file");
		
		if($sermon_file == "")
		{
		   $update = "UPDATE sermon_tbl SET sermon_name = '$sermon_title', sermon_by = '$sermon_by', sermon_type = '$sermon_type', sermon_desc = '$sermon_desc', sermon_status = '$sermon_status', sermon_date = '$sermon_date' WHERE sermon_id = '$sermon_id'";
		  $run_update = mysqli_query($db, $update) or die(mysqli_error($db));
		}
		else
		{
			$update = "UPDATE sermon_tbl SET sermon_name = '$sermon_title', sermon_by = '$sermon_by', sermon_file = '$sermon_file', sermon_type = '$sermon_type', sermon_desc = '$sermon_desc', sermon_status = '$sermon_status', sermon_date = '$sermon_date' WHERE sermon_id = '$sermon_id'";
		    $run_update = mysqli_query($db, $update) or die(mysqli_error($db));
		}
		
			echo "<script>alert('Update done succesfully!')</script>";
			echo "<script>document.location='view-sermon.php'</script>";
		

?>