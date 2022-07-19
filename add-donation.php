<?php 

	include("includes/header.php");

?>

<!-- Main Content-->
			<div class="main-content side-content pt-0">

				<div class="container-fluid">
					<div class="inner-body">

						<!-- Page Header -->
						<div class="page-header">
							<div>
								<h2 class="main-content-title tx-24 mg-b-5">Donations</h2>
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Add New Donation</li>
								</ol>
							</div>
						</div>
						<!-- End Page Header -->

						
						<!-- Member Row -->
						<div class="row row-sm">
							<div class="col-md-12">
								<div class="card custom-card">
									<div class="card-header p-3 tx-medium my-auto tx-white bg-primary">
									  Donation Details
									</div>
									<div class="card-body">
										<!-- Member Form -->
											<div class="row row-sm">
											<div class="col-md-12 col-lg-12 col-xl-12">
												<form action="add-donation.php" method="post" enctype="multipart/form-data">
												<div class="">

													<div class="form-group col-md-9">
													 <label style="font-size: 16.5px; font-weight: 700;">Donation Name</label>
														<div class="pos-relative">
															<select name="donation_type" class="form-control select select2" required>
															 <option disabled selected> Select donation type </option>
															 <?php 

															 	$sel_dtype = "SELECT * FROM donation_types";
															 	$run_dtype = mysqli_query($db, $sel_dtype);

															 	while($row = mysqli_fetch_array($run_dtype))
															 	{
															 		$type_id   = $row['type_id'];
															 		$type_name = $row['type_name'];

															 		echo "<option value='$type_id'>$type_name</option>";
															 	}


															 ?>
															</select>
														</div> 
													</div>


													<div class="form-group col-md-9">
														<label style="font-size: 16.5px; font-weight: 700;">
														  Full Name
														</label>
														<input type="text" name="fullname" class="form-control" required>
													</div>


													<div class="form-group col-md-9">
														<div class="row row-sm">	
														 <div class="col-sm-6">
													    <label style="font-size: 16.5px; font-weight: 700;">Phone Number</label>
														<input type="text" name="phone_number" class="form-control" required="" >
														</div>

															<div class="col-sm-6 mg-t-20 mg-sm-t-0">
															<label style="font-size: 16.5px; font-weight: 700;">Location</label>
															<input type="text" name="location" class="form-control" required="" >
															</div>
														</div>
													</div>

													<div class="form-group col-md-9">
														<label style="font-size: 16.5px; font-weight: 700;">Amount</label>
														<div class="pos-relative">
													     <input type="text" name="amount" class="form-control" required="" >
														</div>
													</div>

													<div class="form-group col-md-9">
														<label style="font-size: 16.5px; font-weight: 700;">Payment Type</label>
														<div class="pos-relative">
															<select name="payment_type" class="form-control select select2" required>
																	<option disabled selected>Select payment type</option>
																	<option value="Cash">Cash</option>
				    												<option value="Cheque">Cheque</option>
				    												<option value="Momo">Momo</option>
																</select>
														</div>
													</div>

													<div class="form-group col-md-9">
														<label style="font-size: 16.5px; font-weight: 700;">
															Donation Date
														</label>
														<div class="pos-relative">
												          <input type="date" name="donation_date" class="form-control" required>
														</div>
													</div>

													
													<div class="form-group col-md-6">
													<button type="submit" name="submit" class="btn ripple btn-main-primary">Add Donation</button>
													</div>
												</div> <!-- div class end -->
											 </form> <!-- Form End -->
											</div>
										</div> <!-- -->
										<!-- Member Form End -->
									</div>
								</div>
							</div>
						</div>
						<!-- End Row -->		
					</div>
				</div>
			</div>
			<!-- End Main Content-->







<?php 
  
  include("includes/footer.php"); 

?>
<?php
	
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
				echo "<script>document.location='add-donation.php'</script>"; 
			}
			
	}
	
?>
