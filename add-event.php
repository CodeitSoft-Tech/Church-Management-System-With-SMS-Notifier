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
								<h2 class="main-content-title tx-24 mg-b-5">Events</h2>
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Add New Event</li>
								</ol>
							</div>
						</div>
						<!-- End Page Header -->

						
						<!-- Member Row -->
						<div class="row row-sm">
							<div class="col-md-12">
								<div class="card custom-card">
									<div class="card-header p-3 tx-medium my-auto tx-white bg-primary">
									   Event Details
									</div>
									<div class="card-body">
										<!-- Member Form -->
											<div class="row row-sm">
											<div class="col-md-12 col-lg-12 col-xl-12">
												<form action="add-event.php" method="post" enctype="multipart/form-data">
												<div class="">
													<div class="form-group col-md-9">
														<label style="font-size: 16.5px; font-weight: 700;">
														 Event Name
														</label>
														<input type="text" name="event_name" class="form-control" required>
													</div>


													<div class="form-group col-md-9">
														<div class="row row-sm">	
															<div class="col-sm-6">
																<label style="font-size: 16.5px; font-weight: 700;">Start Date</label>
															  <input type="date" name="start_date" class="form-control" required="" >
															</div>

															<div class="col-sm-6 mg-t-20 mg-sm-t-0">
																<label style="font-size: 16.5px; font-weight: 700;">End Date</label>
																<input type="date" name="end_date" class="form-control" required="" >
															</div>
														</div>
													</div>



													<div class="form-group col-md-9">
														<div class="row row-sm">
															
															<div class="col-sm-6">
																<label style="font-size: 16.5px; font-weight: 700;">Location</label>
																<input type="text" name="event_loc" class="form-control" required="" >
															</div>

															<div class="col-sm-6 mg-t-20 mg-sm-t-0">
																<label style="font-size: 16.5px; font-weight: 700;">Event Organizer (eg; dept, ministry name etc)</label>
																<input type="text" name="organized_by" class="form-control" required="" >
															</div>

														</div>
													</div>

													<div class="form-group col-md-9">
														<label style="font-size: 16.5px; font-weight: 700;">Event Description</label>
														<div class="pos-relative">
															<textarea id="summernote" class="form-control" name="event_desc"></textarea>
														</div>
													</div>

													<div class="form-group col-md-9">
														<label style="font-size: 16.5px; font-weight: 700;">Approval Status</label>
														<div class="pos-relative">
															<select name="approval_status" class="form-control select select2" required>
																	<option disabled selected>Select approval status</option>
																		<option value="Approved">Approved</option>
				    												<option value="Pending">Pending</option>
																</select>
														</div>
													</div>


													<div class="form-group col-md-9">
													<label style="font-size: 16.5px; font-weight: 700;">Event Status</label>
														<div class="pos-relative">
															<select name="event_status" class="form-control select select2" required>
																	<option disabled selected>Select Event Status</option>
				    											<option value="Upcoming">Upcoming</option>
				    											<option value="Ongoing">Ongoing</option>
				    											<option value="Ended">Ended</option>
																</select>
														</div>
													</div>

													<div class="form-group col-md-9">
														<label style="font-size: 16.5px; font-weight: 700;">Event Banner (upload Image)</label>
														<div class="pos-relative">
												          <input type="file" class="dropify" name="event_banner" data-height="200" />
														</div>
													</div>

													
													<div class="form-group col-md-6">
													<button type="submit" name="submit" class="btn ripple btn-main-primary">Add New Event</button>
													</div>
												</div> <!-- div class end -->
											 </form> <!-- Form End -->
											</div>
										</div> 
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

		$event_name    		= mysqli_real_escape_string($db, $_POST['event_name']);
		$start_date    		= mysqli_real_escape_string($db, $_POST['start_date']);
		$end_date      		= mysqli_real_escape_string($db, $_POST['end_date']);
		$event_loc     		= mysqli_real_escape_string($db, $_POST['event_loc']);
		$event_org     		= mysqli_real_escape_string($db, $_POST['organized_by']);
		$approval_status  = mysqli_real_escape_string($db, $_POST['approval_status']);
		$event_status  		= mysqli_real_escape_string($db, $_POST['event_status']);	
		$event_desc    		= mysqli_real_escape_string($db, $_POST['event_desc']);
		
		$event_banner  		= $_FILES['event_banner']['name'];
		$tmp_name 	   		= $_FILES['event_banner']['tmp_name'];
		move_uploaded_file($tmp_name, "church-images/events/$event_banner");
			

		$insert_event = "INSERT INTO events_tbl(organized_by, event_name, event_banner, start_date, end_date, event_location, event_desc, approval_status, event_status)VALUES('$event_org','$event_name','$event_banner', '$start_date', '$end_date', '$event_loc', '$event_desc', '$approval_status', '$event_status')";

		$run_event = mysqli_query($db, $insert_event);

		echo "<script>alert('Event added successfully')</script>";
		echo "<script>document.location='add-event.php'</script>"; 
	

	}

?>
