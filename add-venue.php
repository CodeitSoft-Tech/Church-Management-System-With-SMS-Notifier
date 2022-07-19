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
								<h2 class="main-content-title tx-24 mg-b-5">Venues</h2>
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Add New Venue</li>
								</ol>
							</div>
						</div>
						<!-- End Page Header -->

						
						<!-- Member Row -->
						<div class="row row-sm">
							<div class="col-md-12">
								<div class="card custom-card">
									<div class="card-header p-3 tx-medium my-auto tx-white bg-primary">
									  Venue Details
									</div>
									<div class="card-body">
										<!-- Member Form -->
											<div class="row row-sm">
											<div class="col-md-12 col-lg-12 col-xl-12">
												<form action="add-venue.php" method="post" enctype="multipart/form-data">
												<div class="">
													<div class="form-group col-md-9">
														<label style="font-size: 16.5px; font-weight: 700;">
														 Venue Name</label>
														<input type="text" name="venue_name" class="form-control" required>
													</div>

													<div class="form-group col-md-9">
														<label style="font-size: 16.5px; font-weight: 700;"> Capacity </label>
														<div class="pos-relative">
														<input type="text" name="venue_capacity" class="form-control" required>
														</div>
													</div>

													<div class="form-group col-md-9">
														<label style="font-size: 16.5px; font-weight: 700;"> Location </label>
														<div class="pos-relative">
														<input type="text" name="venue_location" class="form-control" required>
														</div>
													</div>

													<div class="form-group col-md-9">
													<label style="font-size: 16.5px; font-weight: 700;">Venue Status</label>
														<div class="pos-relative">
															<select name="venue_status" class="form-control select select2" required>
																	<option disabled selected>Select venue status</option>
																	<option value="Requested">Requested</option>
																	<option value="Available">Available</option>
																</select>
														</div>
													</div>

												
										
													<div class="form-group col-md-6">
													<button type="submit" name="submit" class="btn ripple btn-main-primary">Add Venue</button>
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
		$venue_name       = mysqli_real_escape_string($db, $_POST['venue_name']);
		$venue_capacity   = mysqli_real_escape_string($db, $_POST['venue_capacity']);
		$venue_status     = mysqli_real_escape_string($db, $_POST['venue_status']);
		$venue_location   = mysqli_real_escape_string($db, $_POST['venue_location']);

	  $insert_venue = "INSERT INTO venue_tbl(venue_name, venue_capacity, venue_location, venue_status)VALUES('$venue_name','$venue_capacity','$venue_location', '$venue_status')";

		$run_venue = mysqli_query($db, $insert_venue);

		if($run_venue)
		{
			echo "<script>alert('Venue added successfully')</script>";
			echo "<script>document.location='add-venue.php'</script>"; 
		}

   }


?>