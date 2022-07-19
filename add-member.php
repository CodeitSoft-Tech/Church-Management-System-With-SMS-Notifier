<?php 

 	include("includes/header.php");
  include("member-add.php");

?>

<!-- Main Content-->
			<div class="main-content side-content pt-0">

				<div class="container-fluid">
					<div class="inner-body">

						<!-- Page Header -->
						<div class="page-header">
							<div>
								<h2 class="main-content-title tx-24 mg-b-5">Members</h2>
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Add New Member</li>
								</ol>
							</div>
						</div>
						<!-- End Page Header -->

						
						<!-- Member Row -->
						<div class="row row-sm">
							<div class="col-md-12">
								<div class="card custom-card">
									<div class="card-header p-3 tx-medium my-auto tx-white bg-primary">
									    Member Details
									</div>
									<div class="card-body">
										<!-- Member Form -->
											<div class="row row-sm">
											<div class="col-md-12 col-lg-12 col-xl-12">
												<form action="add-member.php" method="post" enctype="multipart/form-data">
													<div class="col-md-9">
													<?php 
						                  if($ErrorLogin)
						                  {
						                    foreach ($ErrorLogin as $key => $value) {
						                      echo '<div class="alert alert-danger role="alert">
						                      <i class="fa fa-exclamation text-white"></i>
						                      '.$value.'
						                      </div>';
						                    }
						                  }

						              ?>
						            </div>
												<div class="">
													
													<div class="form-group col-md-9">
														<label style="font-size: 16.5px; font-weight: 700;">
														Full Name</label>
														<input type="text" name="member_name" class="form-control" required="" >
													</div>


													<div class="form-group col-md-9">
														<div class="row row-sm">
															
															<div class="col-sm-6">
																<label style="font-size: 16.5px; font-weight: 700;">Ministry</label>
																<select name="ministry_name" class="form-control select select2" required>
																	<option disabled selected>Select Ministry</option>
																<?php
																		$get_min = "SELECT * FROM ministry_tbl";
																		$run_min = mysqli_query($db, $get_min);

																		while($row_min = mysqli_fetch_array($run_min))
																		{

																			$min_id    = $row_min['ministry_id'];
																			$min_name  = $row_min['ministry_name'];

																			echo " <option value='$min_id'>$min_name</option> ";
																		}

																	?>
																	
																</select>
															</div>

															<div class="col-sm-6 mg-t-20 mg-sm-t-0">
																<label style="font-size: 16.5px; font-weight: 700;">Department</label>
																<select name="group_name" class="form-control select select2" required>
																	<option disabled selected>Select department</option>
																<?php

																	$get_group = "SELECT * FROM group_tbl";
																	$run_group = mysqli_query($db, $get_group);

																	while($row_grp = mysqli_fetch_array($run_group))
																	{
																		
																		$grp_id    = $row_grp['group_id'];
																		$grp_name  = $row_grp['group_name'];

																		echo " <option value='$grp_id'>$grp_name</option> ";
																	}

																?>
																</select>
															</div>

														</div>
													</div>



													<div class="form-group col-md-9">
														<div class="row row-sm">
															
															<div class="col-sm-6">
																<label style="font-size: 16.5px; font-weight: 700;">Phone Number</label>
																<input type="text" name="phone_number" class="form-control" required="" >
															</div>

															<div class="col-sm-6 mg-t-20 mg-sm-t-0">
																<label style="font-size: 16.5px; font-weight: 700;">Email</label>
																<input type="email" name="email" class="form-control">
															</div>

														</div>
													</div>

													<div class="form-group col-md-9">
														<label style="font-size: 16.5px; font-weight: 700;">Volunteer</label>
														<div class="pos-relative">
															<select name="volunteer" class="form-control select select2" required>
																	<option disabled selected>Select option</option>
																	<option value="Yes">Yes</option>
																	<option value="No">No</option>
																</select>
														</div>
													</div>

													<div class="form-group col-md-9">
														<label style="font-size: 16.5px; font-weight: 700;">Location</label>
														<div class="pos-relative">
															<input type="text" name="location" class="form-control" required="" >
														</div>
													</div>

													<div class="form-group col-md-9">
														<label style="font-size: 16.5px; font-weight: 700;">Date of Birth</label>
														<div class="pos-relative">
															<input type="date" name="dob" class="form-control" required="" >
														</div>
													</div>

													<div class="form-group col-md-9">
														<label style="font-size: 16.5px; font-weight: 700;">Gender</label>
														<div class="pos-relative">
															<select name="gender" class="form-control select select2" required>
																	<option disabled selected>Select gender</option>
																	<option value="Male">Male</option>
																	<option value="Female">Female</option>
																</select>
														</div>
													</div>


													<div class="form-group col-md-9">
													<label style="font-size: 16.5px; font-weight: 700;">Marital Status</label>
														<div class="pos-relative">
															<select name="marital_status" class="form-control select select2" required>
																	<option disabled selected>Select marital status</option>
																	<option value="Male">Married</option>
																	<option value="Female">Single</option>
																</select>
														</div>
													</div>

													<div class="form-group col-md-9">
														<label style="font-size: 16.5px; font-weight: 700;">Member Image (upload Image)</label>
														<div class="pos-relative">
												          <input type="file" class="dropify" name="member_img" data-height="200" />
														</div>
													</div>

													<br>
													<h4 class="col-md-3" style="color:#6259CA"> Member Account : </h4> <hr>

													<div class="form-group col-md-9">
														<label style="font-size: 16.5px; font-weight: 700;">
														 Username
														</label>
														<div class="pos-relative">
															<input type="text" name="username" class="form-control" required="" >
														</div>
													</div>

													<div class="form-group col-md-9">
														<label style="font-size: 16.5px; font-weight: 700;">Password</label>
														<div class="pos-relative">
															<input type="password" name="member_pass" class="form-control" required="" >
														</div>
													</div>

					

													
													<div class="form-group col-md-6">
													<button type="submit" name="submit" class="btn ripple btn-main-primary">Add New Member</button>
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

