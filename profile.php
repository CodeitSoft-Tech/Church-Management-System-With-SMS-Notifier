<?php include("includes/header.php"); ?>

<?php 

		$member_id = $_GET['member_id'];

		$select_member = "SELECT * FROM members_tbl WHERE member_id ='$member_id'";
		$run_member    = mysqli_query($db, $select_member);
		$row    	   = mysqli_fetch_array($run_member);
		$member_name   = $row['member_name'];
		$min_id   		= $row['ministry_id'];  
		$grp_id   		= $row['group_id'];
		$volunteer   	= $row['volunteer'];
		$phone   		= $row['member_phone'];
		$email   		= $row['member_email'];
		$location   	= $row['location'];
		$gender   		= $row['member_gender'];
		$marital_status = $row['marital_status'];
		$member_photo   = $row['member_photo'];
		$dob  			= $row['dob'];
		$member_photo   = $row['member_photo'];
		$member_date    = $row['date_added'];
		$date_add      = date("M d, Y",strtotime($member_date));

		// Get Group
		$select_grp    = "SELECT * FROM group_tbl WHERE group_id = '$grp_id'";
		$run_grp       = mysqli_query($db, $select_grp);
		$row           = mysqli_fetch_array($run_grp);
		$grp_name      = $row['group_name'];

		// Get Ministry 
		$select_min    = "SELECT * FROM ministry_tbl WHERE ministry_id = '$min_id'";
		$run_min       = mysqli_query($db, $select_min);
		$row_min       = mysqli_fetch_array($run_min);
		$min_name      = $row_min['ministry_name']; 


		//Get Donations
		 $cdon_amt = 0;
		 $sql = "SELECT * FROM donation_tbl WHERE name = '$member_name'";
		 $query = mysqli_query($db, $sql);
		 $count_don = mysqli_num_rows($query);
		 while($row_don = mysqli_fetch_array($query))
	     {
	        $cdon_amt += $row_don['amount'];
	     }

	     $cdon = number_format($cdon_amt, 2);



	     //Get Pledges
		 $cpdg_amt = 0;
		 $sql = "SELECT * FROM pledges_tbl WHERE member_name = '$member_name'";
		 $query = mysqli_query($db, $sql);
		 $count_pdg = mysqli_num_rows($query);
		 while($row_pdg = mysqli_fetch_array($query))
	     {
	        $cpdg_amt += $row_pdg['pledge_amt'];
	     }

	     $cpdg = number_format($cpdg_amt, 2);


	     

		
		
?>

	<!-- Main Content-->
			<div class="main-content side-content pt-0">

				<div class="container-fluid">
					<div class="inner-body">

						<!-- Page Header -->
						<div class="page-header">
							<div>
								<h2 class="main-content-title tx-24 mg-b-5">Profile</h2>
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Member Profile</li>
								</ol>
							</div>
						</div>
						<!-- End Page Header -->

						<div class="row square">
							<div class="col-lg-12 col-md-12">
								<div class="card custom-card">
									<div class="card-body">
										<div class="panel profile-cover">
											<div class="profile-cover__img">
												<img src="member_images/<?php echo $member_photo; ?>" alt="img"/>
												<h3 class="h3"><?php echo $member_name; ?></h3>
											</div>
											<div class="btn-profile">
												
											</div>
											<div class="profile-cover__action bg-img"></div>
											<div class="profile-cover__info">
												<ul class="nav">
													<li><strong><?php  echo  $count_don; ?></strong>Donations Made</li>
													<li><strong>₵<?php echo  $cdon; ?></strong>Total Donation Amount</li>
													<li><strong><?php  echo  $count_pdg; ?></strong>Pledges Made</li>
													<li><strong>₵<?php echo  $cpdg; ?></strong>Total Pledges Amount</li>
													
												</ul>
											</div>
                                        </div>
										
									</div>
								</div>
							</div>
						</div>

						<!-- Row -->
						<div class="row row-sm">
							<div class="col-lg-12 col-md-12">
								<div class="card custom-card main-content-body-profile">
									<div class="tab-content">
										<div class="main-content-body tab-pane p-4 border-top-0 active" id="about">
											<div class="card-body p-0 border p-0 rounded-10">
												<div class="p-4">
													
													<div class="row">
													<div class="col-md-6 m-t-30">

														<h4 class="tx-15 text-uppercase mb-3">Date of birth</h4>
														<div class=" p-t-10">
														<p class="m-b-5 text-muted tx-13 m-b-0"><?php echo $date_add; ?></p>
													    </div>


														<h4 class="tx-15 text-uppercase mt-3 mb-3">Ministry Name</h4>
														<div class=" p-t-10">
															<p class="text-muted tx-13 m-b-0"><?php echo $min_name; ?></p>
														</div>
											

														<h4 class="tx-15 text-uppercase mt-3">Department</h4>
														<div class=" p-t-10">
															<p class="text-muted tx-13 m-b-0"><?php echo $grp_name; ?></p>
														</div>

														
													</div> <br>
													<div class="col-md-6 m-t-30">

														<h4 class="tx-15 text-uppercase mb-3">Volunteer</h4>
														<div class=" p-t-10">
														<p class="m-b-5 text-muted tx-13 m-b-0"><?php echo $volunteer; ?></p>
													    </div>

														<h4 class="tx-15 text-uppercase mt-3 mb-3">Gender</h4>
														<div class=" p-t-10">
															<p class="text-muted tx-13 m-b-0"><?php echo $gender; ?></p>
														</div>

														<h4 class="tx-15 text-uppercase mt-3">Marital Status</h4>
														<div class=" p-t-10">
															<p class="text-muted tx-13 m-b-0"><?php echo $marital_status; ?></p>
														</div>

														
													</div>
												   </div>
												</div>
												<div class="border-top"></div>
												<div class="p-4">
													<label class="main-content-label tx-13 mg-b-20">Contact</label>
													<div class="d-sm-flex">
														<div class="mg-sm-r-20 mg-b-10">
															<div class="main-profile-contact-list">
																<div class="media">
																	<div class="media-icon bg-primary-transparent text-primary"> <i class="icon ion-md-phone-portrait"></i> </div>
																	<div class="media-body"> <span>Mobile</span>
																		<div> <?php echo $phone; ?> </div>
																	</div>
																</div>
															</div>
														</div>
														<div class="mg-sm-r-20 mg-b-10">
															<div class="main-profile-contact-list">
																<div class="media">
																	<div class="media-icon bg-success-transparent text-success"> <i class="icon ion-logo-slack"></i> </div>
																	<div class="media-body"> <span>Email</span>
																		<div> <?php echo $email; ?> </div>
																	</div>
																</div>
															</div>
														</div>
														<div class="">
															<div class="main-profile-contact-list">
																<div class="media">
																	<div class="media-icon bg-info-transparent text-info"> <i class="icon ion-md-locate"></i> </div>
																	<div class="media-body"> <span>Current Location</span>
																		<div> <?php echo $location; ?> </div>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
												<div class="border-top"></div>
												
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- End Row -->
					</div>
				</div>
			</div>
			<!-- End Main Content-->





<?php include("includes/footer.php"); ?>
