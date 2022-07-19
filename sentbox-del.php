<?php

	include("includes/db_conn.php");

	if(isset($_POST['delete']))
	{
		$id = mysqli_real_escape_string($db, $_POST['admin_mail_id']);

		$delete = "DELETE FROM tbl_admin_mail WHERE admin_mail_id  = '$id'";
		$run_delete = mysqli_query($db, $delete)or die(mysqli_error($db));

		if($run_delete)
		{
			echo "<script>alert('Message deleted')</script>";
			echo "<script>document.location='sentbox.php'</script>";
		}
	}	


?>