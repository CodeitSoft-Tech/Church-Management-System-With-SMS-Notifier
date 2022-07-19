<?php
	include("../includes/db_conn.php");

	if(isset($_POST['btn-add']))
	{
		$ministry_name  = mysqli_real_escape_string($db, $_POST['ministry_name']);
		$member_name 	= mysqli_real_escape_string($db, $_POST['member_name']);
		$amount			= mysqli_real_escape_string($db, $_POST['amount']);
		$month 			= mysqli_real_escape_string($db, $_POST['month']);
		$dues_date		= mysqli_real_escape_string($db, $_POST['dues_date']);

		$insert_dues = "INSERT INTO ministries_dues(ministry_name, member_name, amount, dues_month, payment_date)
						VALUES('$ministry_name', '$member_name', '$amount', '$month', '$dues_date')";
		$run_dues  	= mysqli_query($db, $insert_dues);

		if($run_dues)
		{
			echo "<script>alert('Dues added successfully!')</script>";
			echo "<script>document.location='index.php'</script>";
		}
	}

?>