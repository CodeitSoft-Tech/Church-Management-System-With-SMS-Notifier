<?php
	
	include("../includes/db_conn.php");

	if(isset($_POST['submit']))
	{

			$fullname         = mysqli_real_escape_string($db, $_POST['fullname']);
			$phone            = mysqli_real_escape_string($db, $_POST['phone_number']);
			$amount           = mysqli_real_escape_string($db, $_POST['amount']);
			$location         = mysqli_real_escape_string($db, $_POST['location']);
			$donation_type    = mysqli_real_escape_string($db, $_POST['donation_type']);
			$payment_type     = mysqli_real_escape_string($db, $_POST['payment_type']);
			$donation_date    = mysqli_real_escape_string($db, $_POST['donation_date']);
			

			$insert_donation = "INSERT INTO donation_tbl(type_id, name, contact, address, amount, type, date_donated)
			VALUES('$donation_type', '$fullname', '$phone', '$location', '$amount', '$payment_type', '$donation_date')";
			$run_donation = mysqli_query($db, $insert_donation);

			if($run_donation)
			{
				echo "<script>alert('Donation added successfully')</script>";
				echo "<script>document.location='index.php'</script>"; 
			}
			
	}
	
?>