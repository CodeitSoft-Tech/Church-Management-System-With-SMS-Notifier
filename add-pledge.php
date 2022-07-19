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
								<h2 class="main-content-title tx-24 mg-b-5">Pledges</h2>
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Add New Pledge</li>
								</ol>
							</div>
						</div>
						<!-- End Page Header -->

						
						<!-- Member Row -->
						<div class="row row-sm">
							<div class="col-md-12">
								<div class="card custom-card">
									<div class="card-header p-3 tx-medium my-auto tx-white bg-primary">
									  Pledge Details
									</div>
									<div class="card-body">
										<!-- Member Form -->
											<div class="row row-sm">
											<div class="col-md-12 col-lg-12 col-xl-12">
												<form action="add-pledge.php" method="post" enctype="multipart/form-data">
												<div class="">
													<div class="form-group col-md-9">
														<label style="font-size: 16.5px; font-weight: 700;">
														 Full Name</label>
														<input type="text" name="member_name" class="form-control" required>
													</div>

													<div class="form-group col-md-9">
														<label style="font-size: 16.5px; font-weight: 700;"> Pledge Amount/Item(s)</label>
														<div class="pos-relative">
														<input type="text" name="pledge_amount" class="form-control" required>
														</div>
													</div>

													<div class="form-group col-md-9">
														<label style="font-size: 16.5px; font-weight: 700;">Phone Number</label>
														<div class="pos-relative">
															<input type="text" name="phone_number" class="form-control" required="">
														</div>
													</div>

													<div class="form-group col-md-9">
														<label style="font-size: 16.5px; font-weight: 700;">Location</label>
														<div class="pos-relative">
															<input type="text" name="location" class="form-control" required="">
														</div>
													</div>

													<div class="form-group col-md-9">
														<label style="font-size: 16.5px; font-weight: 700;">Start Date </label>
														<div class="pos-relative">
														<input type="date" name="start_date" class="form-control" required="" >
														</div>
													</div>

													<div class="form-group col-md-9">
														<label style="font-size: 16.5px; font-weight: 700;">End Date</label>
														<div class="pos-relative">
												     <input type="date" class="form-control" name="end_date" required>
														</div>
													</div>

													<div class="form-group col-md-9">
														<label style="font-size: 16.5px; font-weight: 700;">Description</label>
														<div class="pos-relative">
												     	<textarea id="" class="form-control" name="pledge_desc"></textarea>
														</div>
													</div>

													<div class="form-group col-md-9">
													<label style="font-size: 16.5px; font-weight: 700;">Pledge Status</label>
														<div class="pos-relative">
															<select name="pledge_status" class="form-control select select2" required>
																	<option disabled selected>Select pledge status</option>
																	<option value="Fulfilled">Fulfilled</option>
																	<option value="Partially Fulfilled">Partially Fulfilled</option>
																	<option value="Not Fulfilled">Not Fulfilled</option>
																</select>
														</div>
													</div>
													
													<div class="form-group col-md-6">
													<button type="submit" name="submit" class="btn ripple btn-main-primary">Add Pledge</button>
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
		    echo "<script>document.location='add-pledge.php'</script>";
		 } 

	}
	


?>