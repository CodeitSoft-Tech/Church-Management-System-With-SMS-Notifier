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
								<h2 class="main-content-title tx-24 mg-b-5">Rooms</h2>
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Add New Room</li>
								</ol>
							</div>
						</div>
						<!-- End Page Header -->

						
						<!-- Member Row -->
						<div class="row row-sm">
							<div class="col-md-12">
								<div class="card custom-card">
									<div class="card-header p-3 tx-medium my-auto tx-white bg-primary">
									  Room Details
									</div>
									<div class="card-body">
										<!-- Member Form -->
											<div class="row row-sm">
											<div class="col-md-12 col-lg-12 col-xl-12">
												<form action="add-room.php" method="post" enctype="multipart/form-data">
												<div class="">
													<div class="form-group col-md-9">
														<label style="font-size: 16.5px; font-weight: 700;">
														 Room Name</label>
														<input type="text" name="room_name" class="form-control" required>
													</div>

													<div class="form-group col-md-9">
													<label style="font-size: 16.5px; font-weight: 700;">Capacity</label>
														<div class="pos-relative">
														<input type="text" name="room_capacity" class="form-control" required>
														</div>
													</div>

													<div class="form-group col-md-9">
													<label style="font-size: 16.5px; font-weight: 700;">Room Status</label>
														<div class="pos-relative">
															<select name="room_status" class="form-control select select2" required>
																	<option disabled selected>Select room status</option>
																	<option value="Checked-In">Checked-In</option>
																	<option value="Checked-Out">Checked-Out</option>
																</select>
														</div>
													</div>
													

													<div class="form-group col-md-9">
													 <label style="font-size: 16.5px; font-weight: 700;">Check-In Date </label>
														<div class="pos-relative">
														<input type="date" name="check_in_date" class="form-control" required="" >
														</div>
													</div>

													<div class="form-group col-md-9">
													 <label style="font-size: 16.5px; font-weight: 700;">Check-Out Date</label>
														<div class="pos-relative">
												     <input type="date" class="form-control" name="check_out_date" required>
														</div>
													</div>
													
													<div class="form-group col-md-6">
													<button type="submit" name="submit" class="btn ripple btn-main-primary">Add Room</button>
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
		$room_name     = mysqli_real_escape_string($db, $_POST['room_name']);
		$room_capacity = mysqli_real_escape_string($db, $_POST['room_capacity']);
		$room_status   = mysqli_real_escape_string($db, $_POST['room_status']);
		$chk_in_date   = mysqli_real_escape_string($db, $_POST['check_in_date']);
		$chk_out_date  = mysqli_real_escape_string($db, $_POST['check_out_date']);

		$insert_room = "INSERT INTO room_tbl(room_title, room_capacity, checkin_date, checkout_date, room_status)VALUES('$room_name', '$room_capacity', '$chk_in_date', '$chk_out_date', '$room_status')";
    $run_room = mysqli_query($db, $insert_room);

		if($run_room)
		{
			echo "<script>alert('Room added successfully')</script>";
			echo "<script>document.location='add-room.php'</script>"; 
		}
	}

?>