<?php 

	include("../includes/db_conn.php");

	if(isset($_POST['submit']))
	{
		$event_name    = mysqli_real_escape_string($db, $_POST['event_name']);
		$start_date    = mysqli_real_escape_string($db, $_POST['start_date']);
		$end_date      = mysqli_real_escape_string($db, $_POST['end_date']);
		$event_loc     = mysqli_real_escape_string($db, $_POST['event_loc']);
		$event_org     = mysqli_real_escape_string($db, $_POST['organized_by']);
		$event_desc    = mysqli_real_escape_string($db, $_POST['event_desc']);
		
		$event_banner  = $_FILES['event_banner']['name'];
		$tmp_name 	   = $_FILES['event_banner']['tmp_name'];
		move_uploaded_file($tmp_name, "../church-images/events/$event_banner");
		
		$approval_status = "Pending";
		$event_status    = "Upcoming";	

		$insert_event = "INSERT INTO events_tbl(organized_by, event_name, event_banner, start_date, end_date, event_location, event_desc, approval_status, event_status)VALUES('$event_org','$event_name','$event_banner', '$start_date', '$end_date', '$event_loc', '$event_desc','$approval_status', '$event_status')";

		 $run_event = mysqli_query($db, $insert_event);

		echo "<script>alert('Event request sent successfully')</script>";
		echo "<script>document.location='index.php'</script>"; 
	

	}

?>
