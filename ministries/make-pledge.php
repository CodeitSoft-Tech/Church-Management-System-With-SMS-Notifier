<?php

	include("../includes/db_conn.php");
	
	if(isset($_POST['submit']))
	{
		
		$member_name     = mysqli_real_escape_string($db, $_POST['member_name']);
		$phone           = mysqli_real_escape_string($db, $_POST['phone_number']);
		$location        = mysqli_real_escape_string($db, $_POST['location']);
		$start_date      = mysqli_real_escape_string($db, $_POST['start_date']);
		$end_date        = mysqli_real_escape_string($db, $_POST['end_date']);
		$pledge_amount   = mysqli_real_escape_string($db, $_POST['pledge_amount']);
		$pledge_desc     = mysqli_real_escape_string($db, $_POST['pledge_desc']);
		$pledge_status   = mysqli_real_escape_string($db, $_POST['pledge_status']);
	
	
		  $insert_pledge = "INSERT INTO pledges_tbl(member_name, phone_number, address, start_date, end_date, pledge_amt, pledge_status, pledge_desc)VALUES('$member_name', '$phone', '$location', '$start_date','$end_date','$pledge_amount', '$pledge_status', '$pledge_desc')";
		 $run_pledge = mysqli_query($db, $insert_pledge);

		 if($run_pledge)
		 {
		    echo "<script>alert('Pledge added successfully')</script>";
		    echo "<script>document.location='index.php'</script>";
		 } 

	}
	


?>