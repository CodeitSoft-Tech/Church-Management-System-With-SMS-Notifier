<?php
	
	include("includes/db_conn.php");
	$ErrorLogin = array();
	
	if(isset($_POST['submit']))
	{
		$group_name    = mysqli_real_escape_string($db, $_POST['group_name']);
		$group_email   = mysqli_real_escape_string($db, $_POST['group_email']);
		$group_phone   = mysqli_real_escape_string($db, $_POST['group_phone']);
		$group_date    = mysqli_real_escape_string($db, $_POST['group_date']);
		$dept_user     = mysqli_real_escape_string($db, $_POST['dept_name']);
		$dept_pass     = mysqli_real_escape_string($db, $_POST['dept_pass']);

	 if(strlen($group_phone) > 10 || strlen($group_phone) < 10)
	    {
	    	$ErrorLogin[] = "Invalid mobile number. Mobile number should be up to 10.";
	    }
	    else
	    {
		
			$group_img   = $_FILES['group_img']['name'];
			$tmp_name    = $_FILES['group_img']['tmp_name'];
			move_uploaded_file($tmp_name, "church-images/dept/$group_img");
			
			$insert_group = "INSERT INTO group_tbl(group_name, group_photo, group_email, group_number, group_date, username, password)VALUES('$group_name','$group_img', '$group_email', '$group_phone', '$group_date', '$dept_user', '$dept_pass')";
			$run_group = mysqli_query($db, $insert_group);

			if($run_group)
			{
				echo "<script>alert('Department added successfully')</script>";
				echo "<script>document.location='view-department.php'</script>"; 
			}
	    }

}

?>