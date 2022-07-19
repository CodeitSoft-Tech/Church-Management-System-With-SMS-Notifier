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
								<h2 class="main-content-title tx-24 mg-b-5">Add New Accountant</h2>
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Add New Accountant</li>
								</ol>
							</div>
						</div>
						<!-- End Page Header -->

						
						<!-- Member Row -->
						<div class="row row-sm">
							<div class="col-md-12">
								<div class="card custom-card">
									<div class="card-header p-3 tx-medium my-auto tx-white bg-primary">
									    Accountant Details
									</div>
									<div class="card-body">
										<!-- Member Form -->
											<div class="row row-sm">
											<div class="col-md-12 col-lg-12 col-xl-12">
												<form action="add-accountant.php" method="post" enctype="multipart/form-data">
												<div class="">
													<div class="form-group col-md-9">
														<label style="font-size: 16.5px; font-weight: 700;">
														Full Name</label>
														<input type="text" name="fullname" class="form-control" required="" >
													</div>


													<div class="form-group col-md-9">
														<div class="row row-sm">
															
															<div class="col-sm-6">
																<label style="font-size: 16.5px; font-weight: 700;">Role</label>
																<input type="text" name="role" class="form-control" required="" >
															</div>

															<div class="col-sm-6 mg-t-20 mg-sm-t-0">
																<label style="font-size: 16.5px; font-weight: 700;">Phone Number</label>
																<input type="text" name="phone_number" class="form-control" required="" >
															</div>

														</div>
													</div>



													<div class="form-group col-md-9">
														<div class="row row-sm">
															
															<div class="col-sm-6 mg-t-20 mg-sm-t-0">
																<label style="font-size: 16.5px; font-weight: 700;">Email</label>
																<input type="email" name="email" class="form-control" required="" >
															</div>
															<div class="col-sm-6">
																<label style="font-size: 16.5px; font-weight: 700;">Location</label>
																<input type="text" name="location" class="form-control" required="" >
															</div>

														</div>
													</div>

													

													<div class="form-group col-md-9">
														<label style="font-size: 16.5px; font-weight: 700;">Upload Image (upload Image)</label>
														<div class="pos-relative">
												          <input type="file" class="dropify" name="member_img" data-height="200" />
														</div>
													</div>

												
													<div class="form-group col-md-6">
													<button type="submit" name="submit" class="btn ripple btn-main-primary">Add New Accountant</button>
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
		$member_name      = mysqli_real_escape_string($db, $_POST['member_name']);
		$min_name         = mysqli_real_escape_string($db, $_POST['ministry_name']);
		$grp_name         = mysqli_real_escape_string($db, $_POST['group_name']);
		$volunteer        = mysqli_real_escape_string($db, $_POST['volunteer']);
		$location         = mysqli_real_escape_string($db, $_POST['location']);
		$phone            = mysqli_real_escape_string($db, $_POST['phone_number']);
		$email            = mysqli_real_escape_string($db, $_POST['email']);
		$dob              = mysqli_real_escape_string($db, $_POST['dob']);
		$gender           = mysqli_real_escape_string($db, $_POST['gender']);
		$marital_status   = mysqli_real_escape_string($db, $_POST['marital_status']);
        $username         = mysqli_real_escape_string($db, $_POST['username']);
        $member_pass      = mysqli_real_escape_string($db, $_POST['member_pass']);
		
		// image processing
		$member_img   = $_FILES['member_img']['name'];
		$temp_name    = $_FILES['member_img']['tmp_name'];
		move_uploaded_file($temp_name,"member_images/$member_img");
													

		$insert_member = "INSERT INTO members_tbl(group_id, ministry_id, member_name, member_photo, member_email,	member_phone, member_gender, marital_status, volunteer, location, dob, date_added, username, password)
		 VALUES('$grp_name', '$min_name', '$member_name', '$member_img', '$email', '$phone', '$gender','$marital_status', '$volunteer', '$location', '$dob', NOW(), '$username', '$member_pass')";

		$run_member = mysqli_query($db, $insert_member);

		if($run_member)
		{
			echo "<script>alert('Member added successfully')</script>";
			echo "<script>document.location='add-member.php'</script>"; 
		}
	}

?>