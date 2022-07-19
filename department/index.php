<?php

	  session_start();
	  include("../includes/db_conn.php");
	  //include("record-script.php");


	  if(!isset($_SESSION['deptUsername']))
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
		<title>Hillemunah | Department Panel </title>

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


		<!-- Internal DataTables css-->
		<link href="../assets/plugins/datatable/dataTables.bootstrap4.min.css" rel="stylesheet" />
		<link href="../assets/plugins/datatable/responsivebootstrap4.min.css" rel="stylesheet" />
		<link href="../assets/plugins/datatable/fileexport/buttons.bootstrap4.min.css" rel="stylesheet" />


	    <!-- InternalFileupload css-->
		<link href="../assets/plugins/fileuploads/css/fileupload.css" rel="stylesheet" type="text/css"/>

		<!-- InternalFancy uploader css-->
		<link href="../assets/plugins/fancyuploder/fancy_fileupload.css" rel="stylesheet" />

		<!--Bootstrap-datepicker css-->
		<link rel="stylesheet" href="../assets/plugins/bootstrap-datepicker/bootstrap-datepicker.css">

		<!-- Internal Datetimepicker-slider css -->
		<link href="../assets/plugins/amazeui-datetimepicker/css/amazeui.datetimepicker.css" rel="stylesheet">

		<!-- Internal Specturm-color picker css-->
		<link href="../assets/plugins/spectrum-colorpicker/spectrum.css" rel="stylesheet">

		<!-- Internal Ion.rangeslider css-->
		<link href="../assets/plugins/ion-rangeslider/css/ion.rangeSlider.css" rel="stylesheet">
		<link href="../assets/plugins/ion-rangeslider/css/ion.rangeSlider.skinFlat.css" rel="stylesheet">



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

								  $username     = $_SESSION['deptUsername'];
								  $select_pro   = "SELECT * FROM group_tbl WHERE username = '$username'";
					              $run_pro      = mysqli_query($db, $select_pro);
					              $row_pro      = mysqli_fetch_array($run_pro);
					              $dept_img     = $row_pro['group_photo'];
					              $dept_name    = $row_pro['group_name'];
					              $dept_id      = $row_pro['group_id'];
			                      $dept_email   = $row_pro['group_email'];
			                      $dept_number  = $row_pro['group_number'];
			                      $dept_date    = $row_pro['group_date'];
			                      $dept_prez    = $row_pro['dept_prez'];
			                      $dept_veep    = $row_pro['dept_veep'];

							?>
							<a class="d-flex" href="">
							<span class="main-img-user" ><img alt="avatar" src="../church-images/dept/<?php echo $dept_img; ?>"></span>
							</a>
							<div class="dropdown-menu">
								<div class="header-navheading">
									<h6 class="main-notification-title"><?php echo $dept_name; ?></h6>
									<p class="main-notification-text"><span class="badge badge-success"> Department </span></p>
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
								<span class="main-img-user"><img alt="avatar" src="../church-images/dept/<?php echo $dept_img; ?>"></span>
							</a>
							<div class="dropdown-menu">
								<div class="header-navheading">
									<h6 class="main-notification-title"><?php echo $dept_name; ?></h6>
									<p class="main-notification-text">Department</p>
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
										<h3 class="main-content-label">Department Account</h3>
									</div>
									<div class="card-body text-center item-user">
										<div class="profile-pic">
											<div class="profile-pic-img">
												<span class="bg-success dots" data-toggle="tooltip" data-placement="top" title="online"></span>
												<img src="../church-images/dept/<?php echo $dept_img; ?>" class="rounded-circle" alt="user">
											</div>
											<a href="#" class="text-dark">
												<h5 class="mt-3 mb-0 font-weight-semibold"><?php echo $dept_name; ?></h5>
											</a>
										</div>
									</div>
									<ul class="item1-links nav nav-tabs  mb-0">
										
										<li class="nav-item">
											<a data-target="#profile" class="nav-link active" data-toggle="tab" role="tablist"><i class="ti-user icon1"></i> Department Profile </a>
										</li>
										
										<li class="nav-item">
											<a data-target="#donate" class="nav-link" data-toggle="tab" role="tablist"><i class="si si-present icon1"></i> Donate </a>
										</li>
										
										<li class="nav-item">
											<a data-target="#pledge" class="nav-link" data-toggle="tab" role="tablist"><i class="si si-badge icon1"></i> Pledge </a>
										</li>

										<li class="nav-item">
											<a data-target="#eventrequest" class="nav-link" data-toggle="tab" role="tablist"><i class="si si-envelope-letter icon1"></i> Event Request </a>
										</li>

										<li class="nav-item">
											<a data-target="#events" class="nav-link" data-toggle="tab" role="tablist"><i class="ti-calendar icon1"></i> Church Events </a>
										</li>

										<li class="nav-item">
											<a data-target="#servicerequest" class="nav-link" data-toggle="tab" role="tablist"><i class="si si-hourglass icon1"></i> Service Request </a>
										</li>

										<li class="nav-item">
											<a data-target="#service" class="nav-link" data-toggle="tab" role="tablist"><i class="si si-book-open icon1"></i> Church Services </a>
										</li>

										<li class="nav-item">
											<a data-target="#members" class="nav-link" data-toggle="tab" role="tablist"><i class="si si-people icon1"></i> Department Members </a>
										</li>


										<li class="nav-item">
											<a data-target="#dues" class="nav-link" data-toggle="tab" role="tablist"><i class="si si-wallet icon1"></i> Dues  </a>
										</li>

										<!--<li class="nav-item">
											<a data-target="#msgchurch"  class="nav-link" data-toggle="tab" role="tablist"><i class="si si-envelope icon1"></i> Message Church </a>
										</li> -->
										
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
													<label class="main-content-label my-auto"> Department Profile </label>
												</div>			
													<div class="row">
													<div class="col-lg-12 col-xl-6">
														<div class="card custom-card border mb-lg-0">
															<div class="card-header pb-3">
															<h6 class="mb-0"><i class="ti-user mr-2"></i>Department Details</h6>
															</div>
															<div class="card-body">
																<p><?php echo $dept_name; ?></p>
																<p><?php echo $dept_email; ?></p>
																<p class="mb-0"><?php echo $dept_number; ?></p>
															    <hr>
																<p><b>Date Instituted: </b> <?php echo date("M d, Y",strtotime($dept_date)); ?></p>
															</div>
															<div class="card-footer">
																<div class="row">
																	<div class="col-6">
																	<a href="#update<?php echo $dept_id;?>" data-target="#update<?php echo $dept_id; ?>" data-toggle="modal" style="color:#fff;" class="btn btn-block btn-primary mb-1">
												                        Update Profile  <i class="ti ti-pencil"></i>
												                        </a>
																		
																	</div>
																</div>
															</div>

	         <!-- Large Modal -->
			<div class="modal" id="update<?php echo $dept_id;?>">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content modal-content-demo">
						<div class="modal-header">
							<h6 class="modal-title"> Update Profile Details </h6>
							<button aria-label="Close" class="close" data-dismiss="modal" type="button">
							<span aria-hidden="true">&times;</span>
						    </button>
						</div>
						<div class="modal-body">
						
						<form action="dept-update.php" method="post" enctype="multipart/form-data">
						<div class="">
							<div class="form-group col-md-9">
								<label style="font-size: 16.5px; font-weight: 700;">Department Name</label>
								<input type="hidden" class="form-control" name="dept_id" value="<?php echo $dept_id; ?>"><input type="text" value="<?php echo $dept_name; ?>" name="dept_name" class="form-control" required="" >
							</div>

							<div class="form-group col-md-9">
								<label style="font-size: 16.5px; font-weight: 700;"> Email </label>
								<div class="pos-relative">
								<input type="hidden" class="form-control" name="dept_id" value="<?php echo $dept_id; ?>"><input type="text" name="dept_email" value="<?php echo $dept_email; ?>" class="form-control" required="" >
								</div>
							</div>

							<div class="form-group col-md-9">
								<label style="font-size: 16.5px; font-weight: 700;">Phone Number</label>
								<div class="pos-relative">
								<input type="hidden" class="form-control" name="dept_id" value="<?php echo $dept_id; ?>">
								<input type="text" name="dept_number" value="<?php echo $dept_number; ?>" class="form-control" required="">
								</div>
							</div>

							<div class="form-group col-md-9">
								<label style="font-size: 16.5px; font-weight: 700;">Date Instituted </label>
								<div class="pos-relative">
								<input type="hidden" class="form-control" name="dept_id" value="<?php echo $dept_id; ?>">
								<input type="date" name="dept_date" value="<?php echo $dept_date; ?>" class="form-control" required="" >
								</div>
							</div>

							<div class="form-group col-md-9">
								<label style="font-size: 16.5px; font-weight: 700;"> Department President's Name  </label>
								<div class="pos-relative">
								<input type="hidden" class="form-control" name="dept_id" value="<?php echo $dept_id; ?>">
								<input type="text" name="dept_prez" value="<?php echo $dept_prez; ?>" class="form-control" required="" >
								</div>
							</div>

							<div class="form-group col-md-9">
								<label style="font-size: 16.5px; font-weight: 700;"> Department Vice President's Name  </label>
								<div class="pos-relative">
								<input type="hidden" class="form-control" name="dept_id" value="<?php echo $dept_id; ?>">
								<input type="text" name="dept_veep" value="<?php echo $dept_veep; ?>" class="form-control" required="" >
								</div>
							</div>


							<div class="form-group col-md-9">
								<label style="font-size: 16.5px; font-weight: 700;">Department Image (upload Image to update)</label>
								<div class="pos-relative">
								<input type="hidden" class="form-control" name="dept_id" value="<?php echo $dept_id; ?>">
								<input type="file" class="form-control" name="dept_img">
								<img src="../church-images/dept/<?php echo $dept_img; ?>" alt="<?php echo $dept_name; ?>" width="100" height="100">
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
																<h6 class="mb-0"><i class="ti-home mr-2"></i>Department Leaders</h6>
															</div>
															<div class="card-body">
																<p><b>President:</b> <?php echo $dept_prez; ?> </p>
																<p class="mb-0"><b>Vice President:</b> <?php echo $dept_veep; ?></p>
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
													<label class="main-content-label my-auto"> Department Donations </label>
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

								                    $username = $_SESSION['deptUsername'];

								                    $get_min = "SELECT * FROM group_tbl WHERE username = '$username'";
								                    $run_min = mysqli_query($db, $get_min);
								                    $row_min = mysqli_fetch_array($run_min);
								                    $dept_name = $row_min['group_name'];

								                    $i = 0;
								                    $sql = "SELECT * FROM donation_tbl WHERE name = '$dept_name'";
								                    $query = mysqli_query($db, $sql) or die(mysqli_error($db));
								                    if(mysqli_num_rows($query) == 0)
								                    { 
								                    	echo "<span class='badge badge-danger mb-2'> No Donations made </span>"; 
								                    }
								                    else
								                    {
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

								              <?php } } ?>
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
														<input type="text" name="fullname" value="<?php echo $dept_name; ?>" class="form-control" required>
													</div>


													<div class="form-group col-md-9">
														<div class="row row-sm">	
														 <div class="col-sm-6">
													    <label style="font-size: 16.5px; font-weight: 700;">Phone Number</label>
														<input type="text" name="phone_number" value="<?php echo $dept_number; ?>" class="form-control" required="" >
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


												<!-- Pledge -->
											<div class="tab-pane fade" id="pledge" role="tabpanel">
												<div class="d-flex mb-4">
													<label class="main-content-label my-auto"> Department Pledges </label>
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

								                    $username   = $_SESSION['deptUsername'];
								                    $select_pro = "SELECT * FROM group_tbl WHERE username = '$username'";
								                    $run_pro    = mysqli_query($db, $select_pro);
								                    $row_pro    = mysqli_fetch_array($run_pro);
								                    $dept_name  = $row_pro['group_name'];

								                    $i = 0;
								                    $sql = "SELECT * FROM pledges_tbl WHERE member_name = '$dept_name'";
								                    $query = mysqli_query($db, $sql) or die(mysqli_error($db));
								                    if(mysqli_num_rows($query) == 0)
								                    {
								                    	echo "<span class='badge badge-danger mb-2'>No pledges made</span>";
								                    }
								                    else
								                    {
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

								              <?php } } ?>
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
														<input type="text" name="member_name" value="<?php echo $dept_name; ?>"  class="form-control" required>
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
															<input type="text" name="phone_number" value="<?php echo $dept_number; ?>"  class="form-control" required="">
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
											<!-- Pledge End -->


											<!-- Event request -->
											<div class="tab-pane fade" id="eventrequest" role="tabpanel">
												<div class="modal-header mb-3">
													<h6 class="modal-title">  Request Form   </h6>
												</div>
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
																<label style="font-size: 16.5px; font-weight: 700;">Event Organizer</label>
																<input type="text" value="<?php echo $dept_name; ?>" name="organized_by" class="form-control" required="" >
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
														<label style="font-size: 16.5px; font-weight: 700;">Event Banner (upload Image)</label>
														<div class="pos-relative">
												          <input type="file" class="dropify" name="event_banner" data-height="200" />
														</div>
													</div>

													
													<div class="form-group col-md-6">
													<button type="submit" name="submit" class="btn ripple btn-main-primary">Send Request</button>
													</div>
												</div> <!-- div class end -->
											 </form> <!-- Form End -->
											</div>
											<!-- Event Request End -->



											<!-- Events -->
											<div class="tab-pane fade" id="events" role="tabpanel">
												<div class="d-flex mb-4">
													<label class="main-content-label my-auto">Church Events (Only Approved Events)</label>
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

							                          $sql = "SELECT * FROM events_tbl WHERE approval_status = 'Approved'";
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

												<!-- 2nd Table -->
												<div class="table-responsive">

												<div class="d-flex mt-4 mb-4">
												<label class="main-content-label my-auto">Department's Event Request Status</label>
												</div>

													<table class="table border text-nowrap">
														<thead>
															<tr>
																<th>#</th>
																<th>Event Name</th>
																<th>Event Period</th>
																<th>Event Organizer</th>
																<th>Event Location</th>
																<th>Event Status</th>
																<th>Approval Status</th>
															</tr>
														</thead>
														<tbody>
													  <?php 

							                          $i = 0;

							                          $sql = "SELECT * FROM events_tbl WHERE organized_by = '$dept_name'";
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
							                              $approval_status  = $row['approval_status'];

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
			                            <td>
			                              <?php 
			                                  if($approval_status == 'Approved')
			                                  {
			                                      echo "<span class='badge badge-success'>Approved</span>";
			                                  }
			                                  else
			                                  {
			                                      echo "<span class='badge badge-danger'>Pending</span>";
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




											<!-- Service Request  -->
											<div class="tab-pane fade" id="servicerequest" role="tabpanel">
												<form action="add-service.php" method="post" enctype="multipart/form-data">
												<div class="modal-header mb-3">
													<h6 class="modal-title">  Request Form   </h6>
												</div>
												<div class="">
													<div class="form-group col-md-9">
														<label style="font-size: 16.5px; font-weight: 700;">
														 Service Name</label>
														<input type="text" name="service_name" class="form-control" required="" >
													</div>

													<div class="form-group col-md-9">
														<label style="font-size: 16.5px; font-weight: 700;">
														 Service By</label>
														<input type="text" name="service_by" value="<?php echo $dept_name; ?>" class="form-control" required="" >
													</div>


													<div class="form-group col-md-9">
														<div class="row row-sm">
															
															<div class="col-sm-6">
																<label style="font-size: 16.5px; font-weight: 700;">Service Day</label>
																<select name="service_day" class="form-control select select2">
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
																<select name="service_type" class="form-control select select2">
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
													
												<div class="form-group col-md-6">
												<button type="submit" name="submit" class="btn ripple btn-main-primary">Send Request
												</button>
												</div>
												</div> <!-- div class end -->
											 </form> <!-- Form End -->
											</div>
											<!-- Service Request end -->



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
					                            $sql = "SELECT * FROM service_tbl WHERE approval_status = 'Approved'";
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

												<!-- 2nd Table -->

												<div class="table-responsive">
													<div class="d-flex mt-4 mb-3">
													<label class="main-content-label my-auto">Department's Service Request Status</label>
												</div>
													<table class="table border text-nowrap">
														<thead>
															<tr>
																<th>#</th>
																<th>Service Name</th>
								                                <th>Service Type</th>
								                                <th>Day</th>
								                                <th>Date</th>
								                                <th>Time</th>
								                                <th>Service Status</th>
								                                <th>Approval Status</th>
															</tr>
														</thead>
														<tbody>
													  <?php 

												$i = 0;
					                            $sql = "SELECT * FROM service_tbl WHERE service_by = '$dept_name'";
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
					                                $approval_status = $row['approval_status'];

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
					 																														<td>
					                                <?php 

					                                   if($approval_status == 'Approved')
					                                   {
					                                        echo "<span class='badge badge-success'>Approved</span>";
					                                   }
					                                   else
					                                   {
					                                       echo "<span class='badge badge-danger'>Pending</span>";
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


											<!-- Department Members -->
											<div class="tab-pane fade" id="members" role="tabpanel">
												<div class="d-flex mb-4">
													<label class="main-content-label my-auto"> Department Members </label>
												</div>			
													<div class="row">
													<div class="col-lg-12">
														<div class="card custom-card border mb-0">
															<div class="card-header pb-3">
																<h6 class="mb-0"><i class="ti-home mr-2"></i>Members List</h6>
															</div>
															<div class="card-body">
																<div class="table-responsive">
																	<table class="table border text-nowrap">
														<thead>
															<tr>
																<th>#</th>
																<th>Member Name</th>
								        <th>Phone Number</th>
								        <th>Location</th>
															</tr>
														</thead>
														<tbody>
													  <?php 

													$username = $_SESSION['deptUsername'];
								                    $select_pro = "SELECT * FROM group_tbl WHERE username = '$username'";
								                    $run_pro = mysqli_query($db, $select_pro);
								                    $row_pro = mysqli_fetch_array($run_pro);
								                    $dept_id = $row_pro['group_id'];
								                    

												$i = 0;
					                            $sql = "SELECT * FROM members_tbl WHERE group_id = '$dept_id'";
					                            $query = mysqli_query($db, $sql) or die(mysqli_error($db));
					                            
					                            while($row = mysqli_fetch_array($query))
					                            {
					                                
					                                $member_name   = $row['member_name'];
					                                $phone_number  = $row['member_phone'];
					                                $location      = $row['location'];

					                                $i++;
					                          ?>
					                            <tr>
					                              <td><?php echo $i; ?></td>
					                              <td><?php echo $member_name;  ?></td>
					                              <td><?php echo $phone_number;  ?></td>
					                              <td><?php echo $location;   ?></td> 
					                             
			                                      </tr>
							                    <?php } ?>
														</tbody>
													</table>
																</div>
															</div>
														</div>
													</div>
												</div>

												<br>
												<hr>
											</div>
											<!-- Ministry Members End -->



											<!-- Dues -->
											<div class="tab-pane fade" id="dues" role="tabpanel">
												<div class="d-flex mb-4">
													<label class="main-content-label my-auto"> Department Dues </label>
												</div>		
												<div class="row">

													<div class="col-lg-12 mb-4">
														<div class="card custom-card border mb-lg-0">
															<div class="card-header pb-3">
															<h6 class="mb-0"><i class="ti-credit-card mr-2"></i>Add Dues</h6>
															</div>
															<div class="card-body">
															<div class="">
																<form action="add-dues.php" method="post" enctype="multipart/form-data">

																<div class="form-group col-md-9">
																<input type="hidden" value="<?php echo $dept_name; ?>" name="dept_name" class="form-control" required>
																</div>

																<div class="form-group col-md-9">
																<label style="font-size: 16.5px; font-weight: 700;">Member Name</label>
																<input type="text" name="member_name" class="form-control" required>
																</div>

																<div class="form-group col-md-9">
																<label style="font-size: 16.5px; font-weight: 700;">Amount</label>
																  
																<input type="text" name="amount" class="form-control" required>
																</div>


																<div class="form-group col-md-9">
																<label style="font-size: 16.5px; font-weight: 700;">Dues Month</label>
																<select name="month" class="form-control select-lg select2">
																<option disabled selected>Select Dues Month</option>
																	<option value="January">January</option>
																	<option value="February">February</option>
																	<option value="March">March</option>
																	<option value="April">April</option>
																	<option value="May">May</option>
																	<option value="June">June</option>
																	<option value="July">July</option>
																	<option value="August">August</option>
																	<option value="September">September</option>
																	<option value="October">October</option>
																	<option value="November">November</option>
																	<option value="December">December</option>
																</select>
																</div>

																<div class="form-group col-md-9">
																<label style="font-size: 16.5px; font-weight: 700;">Payment Date</label>
																<input type="date" name="dues_date" class="form-control" required>
																</div>
															
															  <div class="modal-footer pull-left">
															  <button type="submit" name="btn-add" class="btn btn-primary">
															  Add dues
															  </button>
															  </div>
															
															</div> <!-- div class end -->  
															</form> <!-- Form End -->

															</div>
														  </div>
														</div>



										<div class="col-lg-12">
										<div class="card custom-card border mb-0">
										<div class="card-header pb-3">
										 <h6 class="mb-0"><i class="ti-book mr-2"></i>Dues List</h6>
										</div>
										 <div class="card-body">
										  <div class="table-responsive">
											<table id="example1" class="table table-striped table-bordered text-nowrap" >
												<thead>
													<tr>
														<th>No</th>
														<th>Member Name</th>
														<th>Amount</th>
														<th>Dues Month</th>
														<th>Payment Date</th>
														<th>Action</th>
													</tr>
												</thead>
												<tbody>
													<?php  

												$username = $_SESSION['deptUsername'];
								                 $select_pro = "SELECT * FROM group_tbl WHERE username = '$username'";
								                 $run_pro = mysqli_query($db, $select_pro);
								                 $row_pro = mysqli_fetch_array($run_pro);
								                 $dept_name = $row_pro['group_name'];

								                 $i = 0;
								                 $get_dues = "SELECT * FROM group_dues WHERE group_name = '$dept_name'";
								                 $run_dues = mysqli_query($db, $get_dues);
								                 while($row_dues = mysqli_fetch_array($run_dues))
								                 {

								                 	$dues_id 		= $row_dues['gdues_id'];
								                 	$member_name 	= $row_dues['member_name'];
								                 	$amount 		= $row_dues['amount'];
								                 	$month 			= $row_dues['dues_month'];
								                 	$dues_date 		= $row_dues['payment_date'];

								                 	$i++;

												?>

												<tr>
													<td><?php echo $i; ?></td>
													<td><?php echo $member_name; ?></td>
													<td><?php echo $amount; ?></td>
													<td><?php echo $month; ?></td>
													<td><?php echo date("M d, Y",strtotime($dues_date)); ?></td>
													<td>
													<a href="#delete1<?php echo $dues_id;?>" data-target="#delete1<?php echo $dues_id; ?>" data-toggle="modal" style="color:#fff;" class="btn btn-primary"><i class="ti ti-eye"></i>
												    </a>
										           <a style="background: red; border: 1px solid red" class="btn ripple btn-info" data-target="#delete<?php echo $dues_id;?>" data-toggle="modal" href="#delete<?php echo $dues_id;?>"> <i class="fa fa-trash fa-danger"></i>
										           </a>         
													</td>
												</tr>

													<!-- Large Modal -->
			<div class="modal" id="delete1<?php echo $dues_id; ?>">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content modal-content-demo">
						<div class="modal-header">
							<h6 class="modal-title"> Update Dues Details </h6>
							<button aria-label="Close" class="close" data-dismiss="modal" type="button">
							<span aria-hidden="true">&times;</span>
						    </button>
						</div>
						<div class="modal-body">
						
						<form action="dues-update.php" method="post" enctype="multipart/form-data">
						<div class="">
							<div class="form-group col-md-9">
							<label style="font-size: 16.5px; font-weight: 700;">Member Name</label>
							<input type="hidden" class="form-control" name="dues_id" value="<?php echo $dues_id; ?>"> 
							<input type="text" value="<?php echo $member_name; ?>" name="member_name" class="form-control" required>
							</div>

							<div class="form-group col-md-9">
							<label style="font-size: 16.5px; font-weight: 700;">Amount</label>
							<input type="hidden" class="form-control" name="dues_id" value="<?php echo $dues_id; ?>">  
							<input type="text" value="<?php echo $amount; ?>" name="amount" class="form-control" required>
							</div>


							<div class="form-group col-md-9">
							<label style="font-size: 16.5px; font-weight: 700;">Dues Month</label>
							<input type="hidden" class="form-control" name="dues_id" value="<?php echo $dues_id; ?>"> 
							<select name="month" class="form-control select2">
								<option value="<?php echo $month; ?>"><?php echo $month; ?></option>
								<option value="January">January</option>
								<option value="February">February</option>
								<option value="March">March</option>
								<option value="April">April</option>
								<option value="May">May</option>
								<option value="June">June</option>
								<option value="July">July</option>
								<option value="August">August</option>
								<option value="September">September</option>
								<option value="October">October</option>
								<option value="November">November</option>
								<option value="December">December</option>
							</select>
							</div>

							<div class="form-group col-md-9">
							<label style="font-size: 16.5px; font-weight: 700;">Payment Date</label>
							<input type="hidden" class="form-control" name="dues_id" value="<?php echo $dues_id; ?>">  
							<input type="date" value="<?php echo $dues_date; ?>" name="dues_date" class="form-control" required>
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
					<
				</div>
				<!--End Large Modal -->


			 <!-- Delete Modal -->
			<div class="modal" id="delete<?php echo $dues_id;?>">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content modal-content-demo">
						<div class="modal-header">
							<h6 class="modal-title">Delete Dues Details</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
						</div>
						<div class="modal-body">
							<form action="dues-del.php" method="post">
								 <input type="hidden" class="form-control" name="dues_id" value="<?php echo $dues_id; ?>" required> 
                      
                                  <p>Are you sure you want to <b>Delete</b> this details?</p>
							
						</div>
						<div class="modal-footer">
							<button class="btn ripple btn-primary" name="delete" type="submit">Yes</button>
							<button class="btn ripple btn-danger" data-dismiss="modal" type="button">No</button>
						</div>
						</form>
					</div>
				</div>
			</div>
			<!--End Delete Modal -->

													
													<?php } ?>
												</tbody>
											</table>
										</div>
															</div>
														</div>
													</div>
												</div>


											</div>
											<!-- Dues -->


								<!-- Message -->
				<div class="tab-pane fade" id="myaccount" role="tabpanel">
					<div class="d-flex mb-4">
						<label class="main-content-label my-auto"> Update Account Details </label> 
					</div>
					<hr>
						<div class="row row-sm">
							<div class="col-md-12">
								<div class="card custom-card">
									<div class="card-body">
										<!-- Member Form -->
											<div class="row row-sm">
											<div class="col-md-12 col-lg-12 col-xl-12">
												<?php  
   
													    $username = $_SESSION['deptUsername'];
								                 		$select_min = "SELECT * FROM group_tbl WHERE username = '$username'";
								                 		$run_min 	= mysqli_query($db, $select_min);
								                 		$row_min 	= mysqli_fetch_array($run_min);
													    $dept_id    = $row_min['group_id'];
													    $username   = $row_min['username'];
													    $password   = $row_min['password'];

													?>

												<form action="dept-account.php" method="post" enctype="multipart/form-data">

												<div class="">
													<div class="form-group col-md-9">
														<label style="font-size: 16.5px; font-weight: 700;">
														Username</label>
														<input type="hidden" name="dept_id" value="<?php echo $dept_id; ?>" class="form-control">
														<input type="text" name="username" value="<?php echo $username; ?>" class="form-control" required="" >
													</div>

													<div class="form-group col-md-9">
														<label style="font-size: 16.5px; font-weight: 700;">
														 Password</label>
														<input type="hidden" name="dept_id" value="<?php echo $dept_id; ?>" class="form-control">
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

		<!-- Internal Data Table js -->
		<script src="../assets/plugins/datatable/jquery.dataTables.min.js"></script>
		<script src="../assets/plugins/datatable/dataTables.bootstrap4.min.js"></script>
		<script src="../assets/plugins/datatable/dataTables.responsive.min.js"></script>
		<script src="../assets/plugins/datatable/fileexport/dataTables.buttons.min.js"></script>
		<script src="../assets/plugins/datatable/fileexport/buttons.bootstrap4.min.js"></script>
		<script src="../assets/plugins/datatable/fileexport/jszip.min.js"></script>
		<script src="../assets/plugins/datatable/fileexport/pdfmake.min.js"></script>
		<script src="../assets/plugins/datatable/fileexport/vfs_fonts.js"></script>
		<script src="../assets/plugins/datatable/fileexport/buttons.html5.min.js"></script>
		<script src="../assets/plugins/datatable/fileexport/buttons.print.min.js"></script>
		<script src="../assets/plugins/datatable/fileexport/buttons.colVis.min.js"></script>
		<script src="../assets/js/table-data.js"></script>


		<!-- Internal Fileuploads js-->
		<script src="../assets/plugins/fileuploads/js/fileupload.js"></script>
        <script src="assets/plugins/fileuploads/js/file-upload.js"></script>

		<!-- InternalFancy uploader js-->
		<script src="../assets/plugins/fancyuploder/jquery.ui.widget.js"></script>
  <script src="../assets/plugins/fancyuploder/jquery.fileupload.js"></script>
  <script src="../assets/plugins/fancyuploder/jquery.iframe-transport.js"></script>
  <script src="../assets/plugins/fancyuploder/jquery.fancy-fileupload.js"></script>
  <script src="../assets/plugins/fancyuploder/fancy-uploader.js"></script>

        <!-- Internal Form-elements js-->
		<script src="../assets/js/form-elements.js"></script>

		<!-- Internal Jquery-Ui js-->
		<script src="../assets/plugins/jquery-ui/ui/widgets/datepicker.js"></script>

		<!-- Internal Jquery.maskedinput js-->
		<script src="../assets/plugins/jquery.maskedinput/jquery.maskedinput.js"></script>

		<!-- Internal Specturm-colorpicker js-->
		<script src="../assets/plugins/spectrum-colorpicker/spectrum.js"></script>

		<!-- Internal Ion-rangeslider js-->
		<script src="../assets/plugins/ion-rangeslider/js/ion.rangeSlider.min.js"></script>

		<!-- Select2 js-->
		<script src="../assets/plugins/select2/js/select2.min.js"></script>
		<script src="../assets/js/select2.js"></script>

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