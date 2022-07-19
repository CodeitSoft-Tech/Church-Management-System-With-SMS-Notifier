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
								<h2 class="main-content-title tx-24 mg-b-5">Church Services</h2>
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Add New Service</li>
								</ol>
							</div>
						</div>
						<!-- End Page Header -->

						
						<!-- Member Row -->
						<div class="row row-sm">
							<div class="col-md-12">
								<div class="card custom-card">
									<div class="card-header p-3 tx-medium my-auto tx-white bg-primary">
									    Service Details
									</div>
									<div class="card-body">
										<!-- Member Form -->
											<div class="row row-sm">
											<div class="col-md-12 col-lg-12 col-xl-12">
												<form action="add-service.php" method="post" enctype="multipart/form-data">
												<div class="">
													<div class="form-group col-md-9">
														<label style="font-size: 16.5px; font-weight: 700;">
														 Service Name</label>
														<input type="text" name="service_name" class="form-control" required="" >
													</div>

													<div class="form-group col-md-9">
														<label style="font-size: 16.5px; font-weight: 700;">
														 Service By</label>
														<input type="text" name="service_by" class="form-control" required="" >
													</div>


													<div class="form-group col-md-9">
														<div class="row row-sm">
															
															<div class="col-sm-6">
																<label style="font-size: 16.5px; font-weight: 700;">Service Day</label>
																<select name="service_day" class="form-control select select2" required>
																	<option disabled selected>Select service type</option>
																  <option value="Monday">Monday</option>
																  <option value="Tuesday">Tuesday</option>
																  <option value="Wednesday">Wednesday</option>
																  <option value="Thursday">Thursday</option>
																  <option value="Friday">Friday</option>
																  <option value="Saturday">Saturday</option>
																  <option value="Sunday">Sunday</option>
																</select>
															</div>

															<div class="col-sm-6 mg-t-20 mg-sm-t-0">
																<label style="font-size: 16.5px; font-weight: 700;">Service Type</label>
																<select name="service_type" class="form-control select select2" required>
																	<option disabled selected>Select service type</option>
																  <option value="Morning">Morning</option>
																  <option value="Afternoon">Afternoon</option>
																  <option value="Evening">Evening</option>
																</select>
															</div>

														</div>
													</div>



													<div class="form-group col-md-9">
														<div class="row row-sm">
															
															<div class="col-sm-6">
																<label style="font-size: 16.5px; font-weight: 700;"> Service Date </label>
																<input type="date" name="service_date" class="form-control" required="">
															</div>

															<div class="col-sm-6 mg-t-20 mg-sm-t-0">
																<label style="font-size: 16.5px; font-weight: 700;">Service Time </label>
																<input type="time" name="service_time" class="form-control" required="">
															</div>

														</div>
													</div>

													<div class="form-group col-md-9">
														<label style="font-size: 16.5px; font-weight: 700;">Service Approval Status</label>
														<div class="pos-relative">
															<select name="approval_status" class="form-control select select2" required>
																	<option disabled selected>Select option</option>
																	<option value="Approved">Approved</option>
																	<option value="Pending">Pending</option>
																</select>
														</div>
													</div>

													<div class="form-group col-md-9">
														<label style="font-size: 16.5px; font-weight: 700;">Service Status</label>
														<div class="pos-relative">
															<select name="service_status" class="form-control select select2" required>
																	<option disabled selected>Select option</option>
																	<option value="Upcoming">Upcoming</option>
																	<option value="Ongoing">Ongoing</option>
																	<option value="Completed">Completed</option>
															</select>
														</div>
													</div>
													
													<div class="form-group col-md-6">
													<button type="submit" name="submit" class="btn ripple btn-main-primary">Add New Service</button>
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

		$service_name    = mysqli_real_escape_string($db, $_POST['service_name']);
		$service_by      = mysqli_real_escape_string($db, $_POST['service_by']);
		$service_type    = mysqli_real_escape_string($db, $_POST['service_type']);
		$service_day     = mysqli_real_escape_string($db, $_POST['service_day']);
		$service_date    = mysqli_real_escape_string($db, $_POST['service_date']);
		$service_time    = mysqli_real_escape_string($db, $_POST['service_time']);
		$approval_status = mysqli_real_escape_string($db, $_POST['approval_status']);
		$service_status  = mysqli_real_escape_string($db, $_POST['service_status']);
		
		$insert_service = "INSERT INTO service_tbl(service_name, service_by, service_type, service_day, service_date, service_time, approval_status, service_status)VALUES('$service_name','$service_by', '$service_type', '$service_day', '$service_date', '$service_time', '$approval_status', '$service_status')";
		$run_service = mysqli_query($db, $insert_service);

		if($run_service)
		{
			 echo "<script>alert('Service added successfully')</script>";
			 echo "<script>document.location='add-service.php'</script>"; 
		}

	}

?>