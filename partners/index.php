<?php

	  session_start();
	  include("../includes/db_conn.php");
	  //include("record-script.php");


	  if(!isset($_SESSION['userName']))
	  {
	     echo "<script>document.location='login.php'</script>";
	  }
	  else
	  {

?>

<!DOCTYPE html>
<html lang="en">
	<head>

		<meta charset="utf-8">
		<meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
		<meta name="description" content="Hillemunah">
		<meta name="author" content="Hillemunah">
		<meta name="keywords" content="Hillemunah">

		<!-- Favicon -->
		<link rel="icon" href="../church-images/church/image.png" type="image/x-icon"/>

		<!-- Title -->
		<title>Hillemunah | Partner Panel </title>

		<!-- Bootstrap css-->
		<link href="../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet"/>

		<!-- Icons css-->
		<link href="../assets/plugins/web-fonts/icons.css" rel="stylesheet"/>
		<link href="../assets/plugins/web-fonts/font-awesome/font-awesome.min.css" rel="stylesheet">
		<link href="../assets/plugins/web-fonts/plugin.css" rel="stylesheet"/>

		<!-- Style css-->
		<link href="../assets/css/style.css" rel="stylesheet">
		<link href="../assets/css/skins.css" rel="stylesheet">
		<link href="../assets/css/dark-style.css" rel="stylesheet">
		<link href="../assets/css/colors/default.css" rel="stylesheet">

		<!-- Color css-->
		<link id="theme" rel="stylesheet" type="text/css" media="all" href="../assets/css/colors/color.css">

		<!-- Select2 css -->
		<link href="../assets/plugins/select2/css/select2.min.css" rel="stylesheet">

		<!-- Sidemenu css-->
		<link href="../assets/css/sidemenu/sidemenu.css" rel="stylesheet">

	</head>

	<body class="horizontalmenu">

		<!-- Loader -->
		<div id="global-loader">
			<img src="../assets/img/loader.svg" class="loader-img" alt="Loader">
		</div>
		<!-- End Loader -->

		<!-- Page -->
		<div class="page">
				
			<!-- Main Header-->
			<div class="main-header side-header">
				<div class="container">
					<div class="main-header-left">
						<a class="main-header-menu-icon d-lg-none" href="" id="mainNavShow"><span></span></a>
						<a class="main-logo" href="index.php">
							<img width="150" height="95" src="../church-images/church/image.png" class="header-brand-img desktop-logo" alt="logo">
							<img width="150" height="95" src="../church-images/church/image.png" class="header-brand-img desktop-logo theme-logo" alt="logo">
						</a>
					</div>
					<div class="main-header-center">
						<div class="responsive-logo">
							<a href="index.php"><img width="150" height="95" src="../church-images/church/image.png" class="mobile-logo" alt="logo"></a>
							<a href="index.php"><img width="150" height="95" src="../church-images/church/image.png" class="mobile-logo-dark" alt="logo"></a>
						</div>
					</div>
					<div class="main-header-right">
						<div class="dropdown header-search">
							<a class="nav-link icon header-search">
								<i class="fe fe-search"></i>
							</a>
							<div class="dropdown-menu">
								<div class="main-form-search p-2">
								</div>
							</div>
						</div>
						<div class="dropdown main-profile-menu">
							<?php 

								  $username = $_SESSION['userName'];
								  $select_pro = "SELECT * FROM members_tbl WHERE username = '$username'";
					              $run_pro = mysqli_query($db, $select_pro);
					              $row_pro = mysqli_fetch_array($run_pro);
					              $member_img = $row_pro['member_photo'];
					              $member_name = $row_pro['member_name'];
					              $member_id      = $row_pro['member_id'];
			                      $group_id       = $row_pro['group_id'];
			                      $ministry_id    = $row_pro['ministry_id'];
			                      $member_phone   = $row_pro['member_phone'];
			                      $member_email   = $row_pro['member_email'];
			                      $member_gender  = $row_pro['member_gender'];
			                      $marital_status = $row_pro['marital_status'];
			                      $volunteer      = $row_pro['volunteer'];
			                      $location       = $row_pro['location'];
			                      $dob            = $row_pro['dob'];  
			                      $date_joined    = $row_pro['date_added'];



			                       // Get Group
		                          $select_grp    = "SELECT * FROM group_tbl WHERE group_id = '$group_id'";
		                          $run_grp       = mysqli_query($db, $select_grp);
		                          $row           = mysqli_fetch_array($run_grp);
		                          $grp_name      = $row['group_name'];

		                           // Get Ministry 
		                          $select_min    = "SELECT * FROM ministry_tbl WHERE ministry_id = '$ministry_id'";
		                          $run_min       = mysqli_query($db, $select_min);
		                          $row_min       = mysqli_fetch_array($run_min);
		                          $min_name      = $row_min['ministry_name'];




							?>
							<a class="d-flex" href="">
							<span class="main-img-user" ><img alt="avatar" src="../church-images/members/<?php echo $member_img; ?>"></span>
							</a>
							<div class="dropdown-menu">
								<div class="header-navheading">
									<h6 class="main-notification-title"><?php echo $member_name; ?></h6>
									<p class="main-notification-text"><span class="badge badge-success"> Member </span></p>
								</div>
								<a class="dropdown-item" href="logout.php">
									<i class="fe fe-power"></i> Logout
								</a>
							</div>
						</div>
						
						<button class="navbar-toggler navresponsive-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-4"
							aria-controls="navbarSupportedContent-4" aria-expanded="false" aria-label="Toggle navigation">
							<i class="fe fe-more-vertical header-icons navbar-toggler-icon"></i>
						</button><!-- Navresponsive closed -->
					</div>
				</div>
			</div>
			<!-- End Main Header-->

			<!-- Mobile-header -->
			<div class="mobile-main-header">
				<div class="mb-1 navbar navbar-expand-lg  nav nav-item  navbar-nav-right responsive-navbar navbar-dark  ">
					<div class="collapse navbar-collapse" id="navbarSupportedContent-4">
						<div class="d-flex order-lg-2 ml-auto">
						<div class="dropdown main-profile-menu">
							<a class="d-flex" href="#">
								<span class="main-img-user"><img alt="avatar" src="../church-images/members/<?php echo $member_img; ?>"></span>
							</a>
							<div class="dropdown-menu">
								<div class="header-navheading">
									<h6 class="main-notification-title"><?php echo $member_name; ?></h6>
									<p class="main-notification-text">Partner</p>
								</div>
								<a class="dropdown-item" href="logout.php">
									<i class="fe fe-power"></i> Logout
								</a>
							</div>
						</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Mobile-header closed -->


			<!-- Main Content-->
			<div class="main-content pt-0">

				<div class="container">
					<div class="inner-body">

						<!-- Page Header -->
						<div class="page-header">
						</div>
						<!-- End Page Header -->

						<!-- Row -->
						<div class="row row-sm">
							<div class="col-xl-3 col-lg-12 col-md-12">
								<div class="card custom-card">
									<div class="card-header">
										<h3 class="main-content-label">My Account</h3>
									</div>
									<div class="card-body text-center item-user">
										<div class="profile-pic">
											<div class="profile-pic-img">
												<span class="bg-success dots" data-toggle="tooltip" data-placement="top" title="online"></span>
												<img src="../church-images/members/<?php echo $member_img; ?>" class="rounded-circle" alt="user">
											</div>
											<a href="#" class="text-dark">
												<h5 class="mt-3 mb-0 font-weight-semibold"><?php echo $member_name; ?></h5>
											</a>
										</div>
									</div>
									<ul class="item1-links nav nav-tabs  mb-0">
										<li class="nav-item">
											<a data-target="#profile" class="nav-link active" data-toggle="tab" role="tablist"><i class="ti-user icon1"></i> My Profile </a>
										</li>
										<li class="nav-item">
											<a data-target="#donate" class="nav-link" data-toggle="tab" role="tablist"><i class="si si-present icon1"></i> Donate </a>
										</li>
										<li class="nav-item">
											<a data-target="#pledge" class="nav-link" data-toggle="tab" role="tablist"><i class="si si-badge icon1"></i> Pledge </a>
										</li>
										<li class="nav-item">
											<a data-target="#events" class="nav-link" data-toggle="tab" role="tablist"><i class="ti-calendar icon1"></i> Church Events </a>
										</li>
										<li class="nav-item">
											<a data-target="#service" class="nav-link" data-toggle="tab" role="tablist"><i class="si si-book-open icon1"></i> Church Services </a>
										</li>
										<li class="nav-item">
											<a data-target="#msgchurch"  class="nav-link" data-toggle="tab" role="tablist"><i class="si si-envelope icon1"></i> Message Church </a>
										</li>
										<li class="nav-item">
											<a data-target="#myaccount"  class="nav-link" data-toggle="tab" role="tablist"><i class="si si-settings icon1"></i> Account Settings </a>
										</li>
										<li class="nav-item">
											<a href="login.php" class="nav-link"><i class="ti-power-off icon1"></i> Logout</a>
										</li>
									</ul>
								</div>
							</div>
							<div class="col-xl-9 col-lg-12 col-md-12">
								<div class="card custom-card">
									<div class="card-body">
										<div class="tab-content" id="myTabContent">
											
											<!-- Profile -->
											<div class="tab-pane fade show active" id="profile" role="tabpanel">
												<div class="d-flex mb-4">
													<label class="main-content-label my-auto"> My Profile </label>
												</div>			
													<div class="row">
													<div class="col-lg-12 col-xl-6">
														<div class="card custom-card border mb-lg-0">
															<div class="card-header pb-3">
																<h6 class="mb-0"><i class="ti-user mr-2"></i>About Me</h6>
															</div>
															<div class="card-body">
																<p><?php echo $member_phone; ?></p>
																<p><?php echo $location ?></p>
																<p class="mb-0"><?php echo $member_email; ?></p>
																<p><?php echo $member_gender; ?>, <?php echo $marital_status; ?>.</p>
																<p><b>Date of Birth: </b> <?php echo date("M d, Y",strtotime($dob)); ?></p>
																<p><b>Volunteer    : </b> <?php echo $volunteer; ?></p> 
																<hr>
																<p><b>Date Joined: </b> <?php echo date("M d, Y",strtotime($date_joined)); ?></p>
															</div>
															<div class="card-footer">
																<div class="row">
																	<div class="col-6">
																	<a href="#update<?php echo $member_id;?>" data-target="#update<?php echo $member_id; ?>" data-toggle="modal" style="color:#fff;" class="btn btn-block btn-primary mb-1">
												                        Update Profile  <i class="ti ti-pencil"></i>
												                        </a>
																		
																	</div>
																</div>
															</div>

	         <!-- Large Modal -->
			<div class="modal" id="update<?php echo $member_id;?>">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content modal-content-demo">
						<div class="modal-header">
							<h6 class="modal-title"> Update Profile Details </h6>
							<button aria-label="Close" class="close" data-dismiss="modal" type="button">
							<span aria-hidden="true">&times;</span>
						    </button>
						</div>
						<div class="modal-body">
						
						<form action="member-update.php" method="post" enctype="multipart/form-data">
						<div class="">
							<div class="form-group col-md-9">
								<label style="font-size: 16.5px; font-weight: 700;">Full Name</label>
									<input type="hidden" class="form-control" name="member_id" value="<?php echo $member_id; ?>"> 
								<input type="text" value="<?php echo $member_name; ?>" name="member_name" class="form-control" required="" >
							</div>


													<div class="form-group col-md-9">
														<div class="row row-sm">
															<div class="col-sm-6">
																<label style="font-size: 16.5px; font-weight: 700;">Ministry</label>
																 <input type="hidden" class="form-control" name="member_id" value="<?php echo $member_id; ?>"> 
																<select name="ministry_name" class="form-control select select2">
																<option value="<?php echo $ministry_id; ?>"><?php echo $min_name; ?></option>
																<?php
																		$get_min = "SELECT * FROM ministry_tbl";
																		$run_min = mysqli_query($db, $get_min);

																		while($row_min = mysqli_fetch_array($run_min))
																		{

																			$min_id    = $row_min['ministry_id'];
																			$minn_name  = $row_min['ministry_name'];

																			echo " <option value='$min_id'>$minn_name</option> ";
																		}

																	?>
																	
																</select>
															</div>

															<div class="col-sm-6 mg-t-20 mg-sm-t-0">
																<label style="font-size: 16.5px; font-weight: 700;">Department</label>
																<input type="hidden" class="form-control" name="member_id" value="<?php echo $member_id; ?>"> 
																<select name="group_name" class="form-control select select2">
																 <option value="<?php echo $group_id; ?>"><?php echo $grp_name; ?></option>
																<?php

																	$get_group = "SELECT * FROM group_tbl";
																	$run_group = mysqli_query($db, $get_group);

																	while($row_grp = mysqli_fetch_array($run_group))
																	{
																		
																		$grp_id    = $row_grp['group_id'];
																		$grpp_name  = $row_grp['group_name'];

																		echo " <option value='$grp_id'>$grpp_name</option> ";
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
																 <input type="hidden" class="form-control" name="member_id" value="<?php echo $member_id; ?>"> 
																<input type="text" value="<?php echo $member_phone; ?>" name="phone" class="form-control" required="" >
															</div>

															<div class="col-sm-6 mg-t-20 mg-sm-t-0">
																<label style="font-size: 16.5px; font-weight: 700;">Email</label>
																 <input type="hidden" class="form-control" name="member_id" value="<?php echo $member_id; ?>"> 
																<input type="email" value="<?php echo $member_email; ?>" name="email" class="form-control" required="">
															</div>

														</div>
													</div>

													<div class="form-group col-md-9">
														<label style="font-size: 16.5px; font-weight: 700;">Volunteer</label>
														<div class="pos-relative">
															 <input type="hidden" class="form-control" name="member_id" value="<?php echo $member_id; ?>"> 
															<select name="volunteer" class="form-control select select2">
																	<option value="<?php echo $volunteer; ?>"><?php echo $volunteer; ?></option>
																	<option value="Yes">Yes</option>
																	<option value="No">No</option>
																</select>
														</div>
													</div>

													<div class="form-group col-md-9">
														<label style="font-size: 16.5px; font-weight: 700;">Location</label>
														<div class="pos-relative">
															 <input type="hidden" class="form-control" name="member_id" value="<?php echo $member_id; ?>"> 
															<input type="text" value="<?php echo $location; ?>" name="location" class="form-control" required="">
														</div>
													</div>

													<div class="form-group col-md-9">
														<label style="font-size: 16.5px; font-weight: 700;">Date of Birth</label>
														<div class="pos-relative">
															 <input type="hidden" class="form-control" name="member_id" value="<?php echo $member_id; ?>"> 
															<input type="date" name="dob" value="<?php echo $dob; ?>" class="form-control" required="">
														</div>
													</div>

													<div class="form-group col-md-9">
														<label style="font-size: 16.5px; font-weight: 700;">Gender</label>
														<div class="pos-relative">
															 <input type="hidden" class="form-control" name="member_id" value="<?php echo $member_id; ?>"> 
															<select name="gender" class="form-control select select2">
																<option value="<?php echo $member_gender; ?>"><?php echo $member_gender; ?></option>
																	<option value="Male">Male</option>
																	<option value="Female">Female</option>
																</select>
														</div>
													</div>


													<div class="form-group col-md-9">
													<label style="font-size: 16.5px; font-weight: 700;">Marital Status</label>
														<div class="pos-relative">
															 <input type="hidden" class="form-control" name="member_id" value="<?php echo $member_id; ?>"> 
															<select name="marital_status" class="form-control select select2">
																	<option value="<?php echo $marital_status; ?>"><?php echo $marital_status; ?></option>
																	<option value="Male">Married</option>
																	<option value="Female">Single</option>
																</select>
														</div>
													</div>

													<div class="form-group col-md-9">
														<label style="font-size: 16.5px; font-weight: 700;">Member Image (upload Image to update)</label>
														<div class="pos-relative">
														 <input type="hidden" class="form-control" name="member_id" value="<?php echo $member_id; ?>"> 
												   <input type="file" class="form-control" name="member_img">
												   <img src="../church-images/members/<?php echo $member_img; ?>" alt="<?php echo $member_name; ?>" width="100" height="100">
														</div>
													</div>
													
												</div> <!-- div class end -->
										

						                </div>
									    <div class="modal-footer">
										<button type="submit" class="btn ripple btn-primary">Update Details</button>
										<button class="btn ripple btn-danger" data-dismiss="modal" type="button">Close</button>
									    </div>
									    </form> <!-- Form End -->
									</div>
								</div>
							</div>
							<!--End Large Modal -->



														</div>
													</div>
													<div class="col-lg-12 col-xl-6">
														<div class="card custom-card border mb-0">
															<div class="card-header pb-3">
																<h6 class="mb-0"><i class="ti-home mr-2"></i>Ministry & Department</h6>
															</div>
															<div class="card-body">
																<p><b>Ministry:</b> <?php echo $min_name; ?> </p>
																<p class="mb-0"><b>Department:</b> <?php echo $grp_name ?></p>
															</div>
															
														</div>
													</div>
												</div>

												<br>
												<hr>
											</div>
											<!-- Profile End -->

											<!-- Donate -->
											<div class="tab-pane fade" id="donate" role="tabpanel">
												<div class="d-flex mb-4">
													<label class="main-content-label my-auto"> My Donations </label>
												</div>
												<div class="mb-4 pull-right">
												<a href="#Donate" data-target="#Donate" data-toggle="modal" style="color:#fff;" class="btn btn-primary mb-1"> Click here to donate
												   </a> 
												</div>

												<div class="table-responsive">
													<table class="table border text-md-nowrap text-nowrap">
														<thead>
															<tr>
																<th>#</th>
																<th>Donation Name</th>
																<th>Amount Donated</th>
																<th>Date Donated</th>
															</tr>
														</thead>
														<tbody>
													<?php

								                    $username = $_SESSION['userName'];

								                    $select_pro = "SELECT * FROM members_tbl WHERE username = '$username'";
								                    $run_pro = mysqli_query($db, $select_pro);
								                    $row_pro = mysqli_fetch_array($run_pro);
								                    $member_name = $row_pro['member_name'];

								                    $i = 0;
								                    $sql = "SELECT * FROM donation_tbl WHERE name = '$member_name'";
								                    $query = mysqli_query($db, $sql) or die(mysqli_error($db));

								                    while($row = mysqli_fetch_array($query))
								                    {
								                       $donation_id = $row['donation_id'];
								                       $type_id     = $row['type_id'];
								                       $amount      = $row['amount'];
								                       $date        = $row['date_donated'];


								                       $get_type = "SELECT * FROM donation_types WHERE type_id = '$type_id'";
								                       $run_type = mysqli_query($db, $get_type);
								                       $row_type = mysqli_fetch_array($run_type);
								                       $type_name = $row_type['type_name'];

								                       $i++;

								                  ?>

								                  <tr>
								                  	<td><?php echo $i; ?></td>
								                  	<td><?php echo $type_name; ?></td>
								                  	<td><?php echo $amount; ?></td>
								                  	<td><?php echo date("M d, Y",strtotime($date)); ?></td>
								                  </tr>

								              <?php } ?>
								              <!-- Large Modal -->
									   <div class="modal" id="Donate">
										<div class="modal-dialog modal-lg" role="document">
											<div class="modal-content modal-content-demo">
												<div class="modal-header">
													<h6 class="modal-title"> Make Donation  </h6>
													<button aria-label="Close" class="close" data-dismiss="modal" type="button">
													<span aria-hidden="true">&times;</span>
												    </button>
												</div>
												<div class="modal-body">
													
												<form action="make-donation.php" method="post" enctype="multipart/form-data">
												<div class="">

													<div class="form-group col-md-9">
													 <label style="font-size: 16.5px; font-weight: 700;">Donation Name</label>
														<div class="pos-relative">
															<select name="donation_type" class="form-control select select2">
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
														<input type="text" name="fullname" value="<?php echo $member_name; ?>" class="form-control" required>
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
															<select name="payment_type" class="form-control select select2">
																	<option disabled selected>Select payment type</option>
																	<option value="Cash">Cash</option>
				    												<option value="Check">Check</option>
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
													<button type="submit" name="submit" class="btn ripple btn-main-primary">
													 Donate
													</button>
													</div>
												</div> <!-- div class end -->
											 </form> <!-- Form End -->

											
												</div>
												</div>
												</div>
											<!--End Large Modal -->

												</tbody>
												</table>

												</div>


											</div>
											<!-- Donation End -->


												<!-- Donate -->
											<div class="tab-pane fade" id="pledge" role="tabpanel">
												<div class="d-flex mb-4">
													<label class="main-content-label my-auto"> My Pledges </label>
												</div>
												<div class="mb-4 pull-right">
												<a href="#Donate" data-target="#Pledge" data-toggle="modal" style="color:#fff;" class="btn btn-primary mb-1"> Click here to pledge
												   </a> 
												</div>

												<div class="table-responsive">
													<table class="table border text-md-nowrap text-nowrap">
														<thead>
															<tr>
																<th>#</th>
																<th>Amount Pledged</th>
																<th>Pledge Payment Period</th>
																<th>Pledge Status</th>
																<th>Description</th>
															</tr>
														</thead>
														<tbody>
													<?php

								                    $username = $_SESSION['userName'];

								                    $select_pro = "SELECT * FROM members_tbl WHERE username = '$username'";
								                    $run_pro = mysqli_query($db, $select_pro);
								                    $row_pro = mysqli_fetch_array($run_pro);
								                    $member_name = $row_pro['member_name'];

								                    $i = 0;
								                    $sql = "SELECT * FROM pledges_tbl WHERE member_name = '$member_name'";
								                    $query = mysqli_query($db, $sql) or die(mysqli_error($db));

								                    while($row = mysqli_fetch_array($query))
								                    {
								                        $pledge_id   = $row['pledge_id'];
								                        $start_date  = $row['start_date'];
								                        $end_date    = $row['end_date'];
								                        $amount      = $row['pledge_amt'];
								                        $desc        = $row['pledge_desc'];
								                        $status      = $row['pledge_status'];

								                       $i++;

								                  ?>

								                  <tr>
								                  	<td><?php echo $i; ?></td>
								                  	<td><?php echo $amount; ?></td>
								                  	<td><b><?php echo date("M d, Y",strtotime($start_date)); ?> - <?php echo date("M d, Y",strtotime($end_date)); ?></b></td>
								                  	<td>
								                  		<?php 
                                          
								                            if($status == 'Not Fulfilled')
								                            {
								                              echo "<span class='badge badge-danger'> Not Fulfilled </span>";
								                            }
								                            elseif($status == 'Fulfilled')
								                            {
								                              echo "<span class='badge badge-success'> Fulfilled </span>"; 
								                            }
								                            else
								                            {
								                              echo "<span class='badge badge-warning'> Partially Fulfilled </span>";  
								                            }

								                      ?> 
								                  	</td>
								                  	<td><?php echo $desc; ?></td>
								                  </tr>

								              <?php } ?>
								              <!-- Large Modal -->
									   <div class="modal" id="Pledge">
										<div class="modal-dialog modal-lg" role="document">
											<div class="modal-content modal-content-demo">
												<div class="modal-header">
													<h6 class="modal-title"> Make Donation  </h6>
													<button aria-label="Close" class="close" data-dismiss="modal" type="button">
													<span aria-hidden="true">&times;</span>
												    </button>
												</div>
												<div class="modal-body">
													
												<form action="make-pledge.php" method="post" enctype="multipart/form-data">
												<div class="">
													<div class="form-group col-md-9">
														<label style="font-size: 16.5px; font-weight: 700;">
														 Member Name</label>
														<input type="text" name="member_name" value="<?php echo $member_name; ?>"  class="form-control" required>
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
															<input type="text" name="phone_number" value="<?php echo $member_phone; ?>"  class="form-control" required="">
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
															<select name="pledge_status" class="form-control select select2">
																	<option disabled selected>Select pledge status</option>
																	<option value="Fulfilled">Fulfilled</option>
																	<option value="Partially Fulfilled">Partially Fulfilled</option>
																	<option value="Not Fulfilled">Not Fulfilled</option>
																</select>
														</div>
													</div>
													
													<div class="form-group col-md-6">
													<button type="submit" name="submit" class="btn ripple btn-main-primary"> Pledge</button>
													</div>
												</div> <!-- div class end -->
											 </form> <!-- Form End -->

											
												</div>
												</div>
												</div>
											<!--End Large Modal -->

												</tbody>
												</table>

												</div>


											</div>
											<!-- Donation End -->


											<!-- Events -->
											<div class="tab-pane fade" id="events" role="tabpanel">
												<div class="d-flex mb-4">
													<label class="main-content-label my-auto">Church Events</label>
												</div>
												<div class="table-responsive">
													<table class="table border text-nowrap">
														<thead>
															<tr>
																<th>#</th>
																<th>Event Name</th>
																<th>Event Period</th>
																<th>Event Organizer</th>
																<th>Event Location</th>
																<th>Event Status</th>
															</tr>
														</thead>
														<tbody>
													  <?php 

							                          $i = 0;

							                          $sql = "SELECT * FROM events_tbl";
							                          $query = mysqli_query($db, $sql) or die(mysqli_error($db));
							                          
							                          while($row = mysqli_fetch_array($query))
							                          {
							                              $event_id     = $row['event_id'];
							                              $event_name   = $row['event_name'];
							                              $event_loc    = $row['event_location'];
							                              $event_status = $row['event_status'];
							                              $start_date   = $row['start_date'];
							                              $end_date     = $row['end_date'];
							                              $event_org    = $row['organized_by'];
							                              $event_desc   = $row['event_desc'];

							                              $i++;

							                        ?>

							             <tr>
			                            <td><?php echo $i;  ?></td>
			                            <td><?php echo $event_name; ?></td>
			                            <td><b><?php echo date("M d, Y",strtotime($start_date)); ?> - <?php echo date("M d, Y",strtotime($end_date)); ?></b></td>
			                            <td><?php echo $event_org; ?></td>
			                            <td><?php echo $event_loc; ?></td>
			                            <td>
			                              <?php 
			                                  
			                                  if($event_status == 'Upcoming')
			                                  {
			                                      echo "<span class='badge badge-warning'>Upcoming</span>";
			                                  }
			                                  elseif($event_status == 'Ongoing')
			                                  {
			                                      echo "<span class='badge badge-success'>Ongoing</span>"; 
			                                  }
			                                  else
			                                  {
			                                      echo "<span class='badge badge-danger'>Ended</span>";
			                                  }

			                              ?>
			                            </td>
			                         </tr>
							                    <?php } ?>
														</tbody>
													</table>
												</div>
											</div>
											<!-- Event End -->


											<!-- Services -->
											<div class="tab-pane fade" id="service" role="tabpanel">
												<div class="d-flex mb-4">
													<label class="main-content-label my-auto">Church Services</label>
												</div>
												<div class="table-responsive">
													<table class="table border text-nowrap">
														<thead>
															<tr>
																<th>#</th>
																<th>Service Name</th>
								                                <th>Service Type</th>
								                                <th>Day</th>
								                                <th>Date</th>
								                                <th>Time</th>
								                                <th>Status</th>
															</tr>
														</thead>
														<tbody>
													  <?php 

												$i = 0;
					                            $sql = "SELECT * FROM service_tbl";
					                            $query = mysqli_query($db, $sql) or die(mysqli_error($db));
					                            
					                            while($row = mysqli_fetch_array($query))
					                            {
					                                $service_id     = $row['service_id'];
					                                $service_name   = $row['service_name'];
					                                $service_type   = $row['service_type'];
					                                $service_day    = $row['service_day'];
					                                $service_date   = $row['service_date'];
					                                $service_time   = $row['service_time'];
					                                $service_status = $row['service_status'];

					                                $i++;
					                          ?>
					                            <tr>
					                              <td><?php echo $i; ?></td>
					                              <td><?php echo $service_name;  ?></td>
					                              <td><?php echo $service_type;  ?></td>
					                              <td><?php echo $service_day;   ?></td> 
					                              <td><?php echo date("M d, Y",strtotime($service_date)); ?></td>             
					                              <td><?php echo date("h:i a",strtotime($service_time));  ?></td>
					                              <td>
					                                <?php 

					                                   if($service_status == 'Upcoming')
					                                   {
					                                        echo "<span class='badge badge-warning'>Upcoming</span>";
					                                   }
					                                   elseif($service_status == 'Ongoing')
					                                   {
					                                        echo "<span class='badge badge-success'>Ongoing</span>";
					                                   }
					                                   else
					                                   {
					                                       echo "<span class='badge badge-danger'>Ended</span>";
					                                   }  

					                                ?>
					                              </td>
					 
			                                      </tr>
							                    <?php } ?>
														</tbody>
													</table>
												</div>
											</div>
											<!-- Church Service End -->


										 <!-- Message -->
										 <div class="tab-pane fade" id="msgchurch" role="tabpanel">
										 	<?php

										 		$username = $_SESSION['userName'];

                                    $select_pro = "SELECT * FROM members_tbl WHERE username = '$username'";
                                    $run_pro     = mysqli_query($db, $select_pro);
                                    $row_pro     = mysqli_fetch_array($run_pro);
                                    $member_name = $row_pro['member_name'];   

										 		$select_mail = "SELECT * FROM tbl_mailbox WHERE receiver_name = '$member_name'";
											   $run_mail    = mysqli_query($db, $select_mail);
											   $count_inbox  = mysqli_num_rows($run_mail);

											   $select_mail = "SELECT * FROM tbl_members_draft WHERE sender_name = '$member_name'";
											   $run_mail    = mysqli_query($db, $select_mail);
											   $count_draft = mysqli_num_rows($run_mail);

											   $select_mail = "SELECT * FROM tbl_members_sentbox WHERE sender_name = '$member_name'";
											   $run_mail    = mysqli_query($db, $select_mail);
											   $count_sent = mysqli_num_rows($run_mail);


										 	?>
												
											<div class="card-header p-0 pt-1 border-bottom-0">
				                              <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
				                                
				                                <li class="nav-item">
				                                  <a class="nav-link active" id="custom-tabs-three-home-tab" data-toggle="pill" href="#custom-tabs-three-home" role="tab" aria-controls="custom-tabs-three-home" aria-selected="true">Compose Message</a>
				                                </li>

				                                <li class="nav-item">
				                                  <a class="nav-link" id="custom-tabs-three-profile-tab" data-toggle="pill" href="#custom-tabs-three-profile" role="tab" aria-controls="custom-tabs-three-profile" aria-selected="false">
				                                  <i class="fas fa-inbox"></i> Inbox <span><?php echo $count_inbox; ?></span>
				                                </a>
				                                </li>

				                                <li class="nav-item">
				                                  <a class="nav-link" id="custom-tabs-three-messages-tab" data-toggle="pill" href="#custom-tabs-three-messages" role="tab" aria-controls="custom-tabs-three-messages" aria-selected="false">
				                                  <i class="far fa-envelope"></i> Sentbox <span><?php echo $count_sent; ?></span>
				                                </a>
				                                </li>

				                                <li class="nav-item">
				                                  <a class="nav-link" id="custom-tabs-three-settings-tab" data-toggle="pill" href="#custom-tabs-three-settings" role="tab" aria-controls="custom-tabs-three-settings" aria-selected="false">
				                                  <i class="far fa-file-alt"></i> Draft <span><?php echo $count_draft; ?></span>
				                                </a>
				                                </li>

				                              </ul>
				                            </div>

				              <div class="card-body">
                              <div class="tab-content" id="custom-tabs-three-tabContent">
                                
                                <!-- Compose Message Start -->
                                <div class="tab-pane fade show active" id="custom-tabs-three-home" role="tabpanel" aria-labelledby="custom-tabs-three-home-tab">
                                  <form method="post" action="compose.php" enctype="multipart/form-data">
                                <div class="card-body">
                                  <div class="form-group">
                                    <input class="form-control" value="<?php echo $member_name; ?>" name="fullname" required>
                                  </div>

                                  <div class="form-group">
                                    <input class="form-control" name="mail_to" placeholder="To: Recipient Name" required>
                                  </div>

                                  <div class="form-group">
                                    <input class="form-control" name="subject" placeholder="Subject:" required>
                                  </div>

                                  <div class="form-group">
                                      <textarea name="message" class="textarea form-control" style="height: 300px" required>  
                                      </textarea>
                                  </div>
                                  
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                  <div class="float-right">
                                    <button type="submit" name="btn-send" class="btn btn-primary">
                                      <i class="far fa-envelope"></i> Send 
                                    </button>
                                    <button type="submit" name="btn-draft" class="btn btn-primary">
                                      <i class="fas fa-pencil-alt"></i> Draft
                                    </button>
                                  </div>
                                  <button type="reset" class="btn btn-primary"><i class="fas fa-times"></i> Discard</button>
                                </div>
                                </form>
                                </div>


                                <!-- Compose Message Start -->
                                 <div class="tab-pane fade" id="custom-tabs-three-profile" role="tabpanel" aria-labelledby="custom-tabs-three-profile-tab">
                                  <div class="card-body p-0">
                              <div class="table-responsive mailbox-messages">
                                <table class="table table-hover table-striped">
                                  <tbody>
                                <?php  

                                    $username = $_SESSION['userName'];

                                    $select_pro = "SELECT * FROM members_tbl WHERE username = '$username'";
                                    $run_pro     = mysqli_query($db, $select_pro);
                                    $row_pro     = mysqli_fetch_array($run_pro);
                                    $member_name = $row_pro['member_name']; 

                                   $select_mail = "SELECT * FROM tbl_mailbox WHERE receiver_name = '$member_name'";
                                   $run_mail = mysqli_query($db, $select_mail);
                                   $count    = mysqli_num_rows($run_mail);
                                   if($count == 0)
                                   {
                                    echo "<p> No messages found </p>";
                                   }
                                   else
                                   {
                                     while($row_mail = mysqli_fetch_array($run_mail))
                                     {
                                     //$count_sent  = mysqli_num_rows($run_mail);

                                       $mailbox_id    = $row_mail['mailbox_id'];
                                       $sender_name   = $row_mail['sender_name'];
                                       $subject       = $row_mail['subject'];
                                       $message       = $row_mail['message'];
                                       $mail_date     = $row_mail['mail_date'];

                                  
                                ?>
                                  <!-- Messages -->
                                  
                                  <tr>
                                  <td>
                                    <div class="icheck-primary">
                                     <a href="#delete<?php echo $mailbox_id; ?>" data-target="#delete<?php echo $mailbox_id; ?>" data-toggle="modal" style="color:#fff;" class="small-box-footer">
                                        <span class="badge badge-primary"><i class="fa fa-trash"></i></span>
                                    </a>
                                    </div>
                                  </td>
                                  
                                  <td class="mailbox-subject"><a style="text-decoration: none;" href="read-inbox-mail.php?mailbox_id=<?php echo $mailbox_id; ?>"><b><?php echo $subject; ?></b></a> 
                                  </td>
                                  <td class="mailbox-date"><?php echo date("M d, Y",strtotime($mail_date)); ?></td>
                                </tr>


                                <!-- Delete  Modal -->
                <div id="delete<?php echo $mailbox_id; ?>" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                  <div class="modal-dialog">
                    <div class="modal-content" style="height:auto">
                    <div class="modal-header">
                      <h4 class="modal-title">Delete Message </h4>
                    </div>
                    <div class="modal-body">
                    <form class="form-horizontal" method="post" action="mailbox-del.php">
                   
                        <input type="hidden" class="form-control" name="mailbox_id" value="<?php echo $mailbox_id; ?>" required> 
                            
                          <p>Are you sure you want to <b>Delete</b> this message?</p>
                    
                          </div>
                          <div class="modal-footer">
                           
                            <a href="delete<?php echo $mailbox_id; ?>" style="color: #ffffff;">
                               <button type="submit" name="delete" class="btn btn-primary">
                                Yes </button>
                              </a>
                            <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                          </div>
                            </form>
                          </div>
                      </div>
                    </div> 
                    <!--end of modal-dialog--> 

                                <!-- Messages -->
                                <?php } } ?>
                                  </tbody>
                                </table>
                              </div>
                              <!-- /.mail-box-messages -->
                            </div>

                            
                              <div class="card-footer p-0">
                              <div class="mailbox-controls">
                              </div>
                            </div>
                            </div>
                            <!-- Inbox End -->


                                <!-- Sent Message Start -->
                                <div class="tab-pane fade" id="custom-tabs-three-messages" role="tabpanel" aria-labelledby="custom-tabs-three-messages-tab">
                                <div class="card-body p-0">
                    
                              <div class="table-responsive mailbox-messages">

                                <table class="table table-hover table-striped">
                                  <tbody>
                                  <?php  

                                    $username = $_SESSION['userName'];

                                    $select_pro = "SELECT * FROM members_tbl WHERE username = '$username'";
                                    $run_pro     = mysqli_query($db, $select_pro);
                                    $row_pro     = mysqli_fetch_array($run_pro);
                                    $member_name = $row_pro['member_name']; 

                                   $select_mail = "SELECT * FROM tbl_members_sentbox WHERE sender_name = '$member_name'";
                                   $run_mail    = mysqli_query($db, $select_mail);
                                   $count    = mysqli_num_rows($run_mail);
                                   if($count == 0)
                                   {
                                    echo "<p> No messages found </p>";
                                   }
                                   else
                                   {
                                     while($row_mail = mysqli_fetch_array($run_mail))
                                     {
                                     //$count_sent  = mysqli_num_rows($run_mail);

                                       $sentbox_id      = $row_mail['mem_sent_id'];
                                       $sender_name  = $row_mail['sender_name'];
                                       $receiver_name  = $row_mail['receiver_name'];
                                       $subject       = $row_mail['subject'];
                                       $message       = $row_mail['message'];
                                       $mail_date     = $row_mail['mail_date'];

                                  
                                ?>
                                  <!-- Messages -->
                                <tr>
                                  <td>
                                    <div class="icheck-primary">
                                     <a href="#delete<?php echo $sentbox_id; ?>" data-target="#delete<?php echo $sentbox_id; ?>" data-toggle="modal" style="color:#fff;" class="small-box-footer">
                                        <span class="badge badge-primary"> <i class="fa fa-trash"></i> </span>
                                    </a>
                                    </div>
                                  </td>
                                  
                                  <td class="mailbox-subject"><a style="text-decoration: none;" href="read-sent-mail.php?inbox_id=<?php echo $sentbox_id; ?>"><b><?php echo $subject; ?></b></a> 
                                  </td>
                                  
                                  <td class="mailbox-date"><?php echo date("M d, Y",strtotime($mail_date)); ?></td>
                                </tr>


                                                <!-- Delete  Modal -->
                <div id="delete<?php echo $sentbox_id; ?>" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                  <div class="modal-dialog">
                    <div class="modal-content" style="height:auto">
                    <div class="modal-header">
                      <h4 class="modal-title">Delete Message </h4>
                    </div>
                    <div class="modal-body">
                    <form class="form-horizontal" method="post" action="sentbox-del.php">
                   
                        <input type="hidden" class="form-control" name="sentbox_id" value="<?php echo $sentbox_id; ?>" required> 
                            
                          <p>Are you sure you want to <b>Delete</b> this message?</p>
                    
                          </div><br>
                          <div class="modal-footer">
                           
                            <a href="delete<?php echo $sentbox_id; ?>" style="color: #ffffff;">
                               <button type="submit" name="delete" class="btn btn-primary">
                                Yes </button>
                              </a>
                            <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                          </div>
                    </form>
                  </div>
              </div>
            </div> 
            <!--end of modal-dialog--> 

                                <!-- Messages -->
                                    <?php } } ?>
                                  </tbody>
                                </table>
                              </div>
                              <!-- /.mail-box-messages -->
                              <div class="card-footer p-0">
                              <div class="mailbox-controls">
                              </div>
                            </div>

                                </div>
                             </div>

                                <!-- Sent Msg End -->


                                 <!-- Draft Start -->
                				<div class="tab-pane fade" id="custom-tabs-three-settings" role="tabpanel" aria-labelledby="custom-tabs-three-settings-tab">
                						
                						<div class="card-body p-0">
                              <div class="mailbox-controls">  
                               
                                </div>

                              <div class="table-responsive mailbox-messages">
                                <table class="table table-hover table-striped">
                                  <tbody>
                                  
                                  <?php  

                                    $username = $_SESSION['userName'];

                                    $select_pro = "SELECT * FROM members_tbl WHERE username = '$username'";
                                    $run_pro     = mysqli_query($db, $select_pro);
                                    $row_pro     = mysqli_fetch_array($run_pro);
                                    $member_name = $row_pro['member_name']; 

                                   $select_mail = "SELECT * FROM tbl_members_draft WHERE sender_name = '$member_name'";
                                   $run_mail    = mysqli_query($db, $select_mail);
                                    $count    = mysqli_num_rows($run_mail);
                                   if($count == 0)
                                   {
                                    echo "<p> No messages found </p>";
                                   }
                                   else
                                   {                                   
                                     while($row_mail = mysqli_fetch_array($run_mail))
                                     {
                                     

                                       $draft_id  = $row_mail['member_draft_id'];
                                       $sender_name    = $row_mail['sender_name'];
                                       $receiver_name  = $row_mail['receiver_name'];
                                       $subject        = $row_mail['subject'];
                                       $message        = $row_mail['message'];
                                       $draft_date     = $row_mail['draft_date'];


                                ?>
                                 <!-- Messages -->
                                <tr>
                                  <td>
                                    <div class="icheck-primary">
                                     <a href="#delete<?php echo $draft_id; ?>" data-target="#delete<?php echo $draft_id; ?>" data-toggle="modal" style="color:#fff;" class="small-box-footer">
                                        <span class="badge badge-primary"><i class="fa fa-trash"></i></span>
                                    </a>
                                    </div>
                                  </td>
                                 
                                  <td class="mailbox-subject"><a style="text-decoration: none;" href="read-draft-mail.php?draft_id=<?php echo $draft_id; ?>"><b><?php echo $subject; ?></b></a> 
                                  </td>
                                  

                                  <td class="mailbox-date">
                                    <?php echo date("M d, Y",strtotime($draft_date)); ?>
                                  </td>
                                </tr>
                                <!-- Messages -->


                                                      <!-- Delete  Modal -->
                      <div id="delete<?php echo $draft_id; ?>" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                        <div class="modal-dialog">
                          <div class="modal-content" style="height:auto">
                          <div class="modal-header">
                            <h4 class="modal-title">Delete Message </h4>
                          </div>
                          <div class="modal-body">
                          <form class="form-horizontal" method="post" action="draft-del.php">
                         
                              <input type="hidden" class="form-control" name="draft_id" value="<?php echo $draft_id; ?>" required> 
                                  
                                <p>Are you sure you want to <b>Delete</b> this message?</p>
                          
                                </div><br>
                                <div class="modal-footer">
                                 
                                  <a href="delete<?php echo $draft_id; ?>" style="color: #ffffff;">
                                     <button type="submit" name="delete" class="btn btn-primary">
                                      Yes </button>
                                    </a>
                                  <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                                </div>
                                </form>
                                </div>
                            </div>
                          </div> 
                  <!--end of modal-dialog--> 


                                    <?php } } ?>
                                  </tbody>
                                </table>
                              </div>
                              <!-- /.mail-box-messages -->
                            </div>

                            
                              <div class="card-footer p-0">
                              <div class="mailbox-controls">
                                <!-- Check all button -->
                                </button>
                                <!--<div class="float-right">
                                  1-10/20
                                  <div class="btn-group">
                                    <button type="button" class="btn btn-default btn-sm">
                                      <i class="fas fa-chevron-left"></i>
                                    </button>
                                    <button type="button" class="btn btn-default btn-sm">
                                      <i class="fas fa-chevron-right"></i>
                                    </button>
                                  </div>
                                </div> -->
                                <!-- /.float-right -->
                              </div>
                            </div>
                    				


                				</div>
                				<!-- Draft End -->


                                </div>
                                </div>
					            </div>
								<!-- Message End -->

								<!-- Message -->
										 <div class="tab-pane fade" id="myaccount" role="tabpanel">
										 		<!-- Member Row -->
						<div class="row row-sm">
							<div class="col-md-12">
								<div class="card custom-card">
									<div class="card-body">
										<!-- Member Form -->
											<div class="row row-sm">
											<div class="col-md-12 col-lg-12 col-xl-12">
												<?php  
   
													    $username = $_SESSION['userName'];

													    $select_mem   = "SELECT * FROM members_tbl WHERE username = '$username'";
													    $run_mem      = mysqli_query($db, $select_mem);
													    $row_mem      = mysqli_fetch_array($run_mem);
													    $mem_id       = $row_mem['member_id'];
													    $username     = $row_mem['username'];
													    $password     = $row_mem['password'];

													?>

												<form action="myaccount.php" method="post" enctype="multipart/form-data">

												<div class="">
													<div class="form-group col-md-9">
														<label style="font-size: 16.5px; font-weight: 700;">
														Username</label>
														<input type="hidden" name="mem_id" value="<?php echo $mem_id; ?>" class="form-control">
														<input type="text" name="username" value="<?php echo $username; ?>" class="form-control" required="" >
													</div>

													<div class="form-group col-md-9">
														<label style="font-size: 16.5px; font-weight: 700;">
														 Password</label>
														<input type="hidden" name="mem_id" value="<?php echo $mem_id; ?>" class="form-control">
														<input type="password" name="password" value="<?php echo $password; ?>" class="form-control" required="" >
													</div>

												
													<div class="form-group col-md-6">
													<button type="submit" name="change_btn" class="btn ripple btn-main-primary">Update Account</button>
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
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- End Main Content-->

		

			<!-- Main Footer-->
			<div class="main-footer text-center">
				<div class="container">
					<div class="row row-sm">
						<div class="col-md-12">
							<span>Copyright © 2021 <a href="https://www.linkedin.com/in/francis-tawiah-0ba441168/">Codeitsoft Technology</a>. All rights reserved.</span>
						</div>
					</div>
				</div>
			</div>
			<!--End Footer-->


		</div>
		<!-- End Page -->

		<!-- Back-to-top -->
		<a href="#top" id="back-to-top"><i class="fe fe-arrow-up"></i></a>

		<!-- Jquery js-->
		<script src="../assets/plugins/jquery/jquery.min.js"></script>

		<!-- Bootstrap js-->
		<script src="../assets/plugins/bootstrap/js/popper.min.js"></script>
		<script src="../assets/plugins/bootstrap/js/bootstrap.min.js"></script>

		<!-- Internal Check-all-mail js-->
		<script src="../assets/js/check-all-mail.js"></script>

		<!-- Sidebar js -->
		<script src="../assets/plugins/sidebar/sidebar.js"></script>

		<!-- Select2 js-->
		<script src="../assets/plugins/select2/js/select2.min.js"></script>

		<!-- Sticky js -->
		<script src="../assets/js/sticky.js"></script>

		<!-- Perfect-scrollbar js -->
		<script src="../assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>

		<!-- Custom js -->
		<script src="../assets/js/custom.js"></script>

	</body>
</html>
<?php } ?>