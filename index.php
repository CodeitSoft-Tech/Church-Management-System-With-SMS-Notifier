   <?php

   	 session_start();

		 include("includes/db_conn.php");
		 include("user_login.php");
   	     include("record-script.php");

   	if(!isset($_SESSION['admin_username']))
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
		<link rel="icon" href="church-images/church/image.png" type="image/x-icon"/>

		<!-- Title -->
		<title> Hillemunah | Admin Panel </title>

		<!-- Bootstrap css-->
		<link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet"/>

		<!-- Icons css-->
		<link href="assets/plugins/web-fonts/icons.css" rel="stylesheet"/>
		<link href="assets/plugins/web-fonts/font-awesome/font-awesome.min.css" rel="stylesheet">
		<link href="assets/plugins/web-fonts/plugin.css" rel="stylesheet"/>

		<!-- Internal Owl Carousel css-->
		<link href="assets/plugins/owl-carousel/owl.carousel.css" rel="stylesheet">

		<!-- Multislider css -->
		<link href="assets/plugins/multislider/multislider.css" rel="stylesheet">

		<!-- Internal Quill css-->
		<link href="assets/plugins/quill/quill.snow.css" rel="stylesheet">
		<link href="assets/plugins/quill/quill.bubble.css" rel="stylesheet">

		<!-- Internal Summernote css-->
		<link rel="stylesheet" href="assets/plugins/summernote/summernote-bs4.css">


				<!-- Internal DataTables css-->
		<link href="assets/plugins/datatable/dataTables.bootstrap4.min.css" rel="stylesheet" />
		<link href="assets/plugins/datatable/responsivebootstrap4.min.css" rel="stylesheet" />
		<link href="assets/plugins/datatable/fileexport/buttons.bootstrap4.min.css" rel="stylesheet" />

		<!-- Internal Daterangepicker css-->
		<link href="assets/plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">


		<!-- Style css-->
		<link href="assets/css/style.css" rel="stylesheet">
		<link href="assets/css/skins.css" rel="stylesheet">
		<link href="assets/css/dark-style.css" rel="stylesheet">
		<link href="assets/css/colors/default.css" rel="stylesheet">

		<!-- InternalFileupload css-->
		<link href="assets/plugins/fileuploads/css/fileupload.css" rel="stylesheet" type="text/css"/>

		<!-- InternalFancy uploader css-->
		<link href="assets/plugins/fancyuploder/fancy_fileupload.css" rel="stylesheet" />


		<!-- Color css-->
		<link id="theme" rel="stylesheet" type="text/css" media="all" href="assets/css/colors/color.css">

		<!-- Select2 css-->
		<link href="assets/plugins/select2/css/select2.min.css" rel="stylesheet">

		<!-- Fullcalendar css-->
		<link href='assets/plugins/fullcalendar/fullcalendar.css' rel='stylesheet' />
		<link href='assets/plugins/fullcalendar/fullcalendar.print.min.css' rel='stylesheet' media='print'>
		<!-- Mutipleselect css-->
		<link rel="stylesheet" href="assets/plugins/multipleselect/multiple-select.css">

		<!-- Sidemenu css-->
		<link href="assets/css/sidemenu/sidemenu.css" rel="stylesheet">

	</head>

	<body class="main-body leftmenu">

		<!-- Loader -->
		<div id="global-loader">
			<img src="assets/img/loader.svg" class="loader-img" alt="Loader">
		</div>
		<!-- End Loader -->


		<!-- Page -->
		<div class="page">



			<!-- Sidemenu -->
			<?php include("includes/sidebar.php");  ?>
			<!-- End Sidemenu -->


			<!-- Main Header-->
			<div class="main-header side-header sticky">
				<div class="container-fluid">
					<div class="main-header-left">
						<a class="main-header-menu-icon" href="#" id="mainSidebarToggle"><span></span></a>
					</div>
					<div class="main-header-center">
						<div class="responsive-logo">
							<a href="index.php"><img src="church-images/church/image2.png" class="mobile-logo" alt="logo"></a>
							<a href="index.php"><img src="church-images/church/image2.png" class="mobile-logo-dark" alt="logo"></a>
						</div>
					</div>
					<div class="main-header-right">
						<div class="dropdown main-profile-menu">
							<?php

					                  $admin_name = $_SESSION['admin_username'];
					                  
					                  $select_admin = "SELECT * FROM admin_tbl WHERE admin_username = '$admin_name'";
					                  $run_admin    = mysqli_query($db, $select_admin);
					                  $row_admin    = mysqli_fetch_array($run_admin);
					                  $username     = $row_admin['fullname'];
					                  $admin_img	  = $row_admin['admin_img'];
					                 
					         ?>
							<a class="d-flex" href="">
								<span class="main-img-user" ><img alt="avatar" src="church-images/admin/<?php echo $admin_img; ?>"></span>
							</a>
							<div class="dropdown-menu">
								<div class="header-navheading">

									<h6 class="main-notification-title"><?php echo $username; ?></h6>
								</div>
								<a class="dropdown-item border-top" href="edit-profile.php">
									<i class="fe fe-user"></i> My Profile
								</a>
								
								<a class="dropdown-item" href="account.php">
									<i class="fe fe-settings"></i> Account Settings
								</a>

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
							<?php

					                  $admin_name = $_SESSION['admin_username'];
					                  
					                  $select_admin = "SELECT * FROM admin_tbl WHERE admin_username = '$admin_name'";
					                  $run_admin    = mysqli_query($db, $select_admin);
					                  $row_admin    = mysqli_fetch_array($run_admin);
					                  $username     = $row_admin['fullname'];
					                  $admin_img	  = $row_admin['admin_img'];
					                  $role       	= $row_admin['role'];
					         ?>
							<a class="d-flex" href="#">
								<span class="main-img-user" ><img alt="avatar" src="church-images/church/admin/<?php echo $admin_img; ?>"></span>
								<p class="main-notification-text"><?php echo $role; ?></p>
							</a>
							<div class="dropdown-menu">
								<div class="header-navheading">
									<h6 class="main-notification-title"><?php echo $username; ?></h6>
								</div>
								<a class="dropdown-item border-top" href="edit-profile.php">
									<i class="fe fe-user"></i> My Profile
								</a>
								<a class="dropdown-item" href="account.php">
									<i class="fe fe-settings"></i> Account Settings
								</a>
								<a class="dropdown-item" href="signin.html">
									<i class="fe fe-power"></i> Sign Out
								</a>
							</div>
						</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Mobile-header closed -->



			<!-- Main Content-->
			<div class="main-content side-content pt-0">

				<div class="container-fluid">
					<div class="inner-body">

						<!-- Page Header -->
						<div class="page-header">
							<div>
								<h2 class="main-content-title tx-24 mg-b-5">Welcome To Hillemunah Church Dashboard</h2>
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="#">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Dashboard</li>
								</ol>
							</div>
						</div>
						<!-- End Page Header -->


						<!-- Row -->
						<div class="row row-sm">
							<div class="col-md-12">
								<div class="card custom-card">
									<div class="row row-sm">
										<div class="col-xl-3 col-lg-6 col-sm-6 pr-0 pl-0 border-right">
											<div class="card-body text-center">
												<h6 class="mb-0" style="color: #6259CA">Total Donation Amount</h6>
												<h2 class="mb-1 mt-2 number-font"><span class="counter">₵</span><?php echo ShowDonationAmt(); ?></h2>
												
											</div>
										</div>
										<div class="col-xl-3 col-lg-6 col-sm-6 pr-0 pl-0 border-right">
											<div class="card-body text-center">
												<h6 class="mb-0" style="color: #6259CA">Total Pledges Amount</h6>
												<h2 class="mb-1 mt-2 number-font"><span class="counter">₵</span><?php echo ShowPledgesAmt(); ?></h2>
												
											</div>
										</div>
										<div class="col-xl-3 col-lg-6 col-sm-6 pr-0 pl-0 border-right">
											<div class="card-body text-center">
												<h6 class="mb-0" style="color: #6259CA">Total Main Offertory </h6>
												<h2 class="mb-1 mt-2 number-font"><span class="counter">₵</span><?php echo ShowMainOffertory(); ?></h2>
												
											</div>
										</div>
										<div class="col-xl-3 col-lg-6 col-sm-6 pr-0 pl-0">
											<div class="card-body text-center">
												<h6 class="mb-0" style="color: #6259CA">Total Income Amount</h6>
												<h2 class="mb-1 mt-2 number-font"><span class="counter">₵</span><?php echo ShowIncAmt(); ?></h2>
												
											</div>
										</div>

									</div>
								</div>
							</div>
						</div>
						<!-- End Row -->


						<!-- Row -->
						<div class="row row-sm">
							<div class="col-md-12">
								<div class="card custom-card">
									<div class="row row-sm">
										<div class="col-xl-3 col-lg-6 col-sm-6 pr-0 pl-0 border-right">
											<div class="card-body text-center">
												<h6 class="mb-0" style="color: #6259CA">Total Income Tax</h6>
												<h2 class="mb-1 mt-2 number-font"><span class="counter">₵</span><?php echo ShowIncTax(); ?></h2>
												
											</div>
										</div>
										<div class="col-xl-3 col-lg-6 col-sm-6 pr-0 pl-0 border-right">
											<div class="card-body text-center">
												<h6 class="mb-0" style="color: #6259CA">Total Overall Income Amount</h6>
												<h2 class="mb-1 mt-2 number-font"><span class="counter">₵</span><?php echo ShowOverallAmt(); ?></h2>
												
											</div>
										</div>
										<div class="col-xl-3 col-lg-6 col-sm-6 pr-0 pl-0 border-right">
											<div class="card-body text-center">
												<h6 class="mb-0" style="color: #6259CA">Total Expenses </h6>
												<h2 class="mb-1 mt-2 number-font"><span class="counter">₵</span><?php echo ShowExpenses(); ?></h2>
												
											</div>
										</div>
										<div class="col-xl-3 col-lg-6 col-sm-6 pr-0 pl-0">
											<div class="card-body text-center">
												<h6 class="mb-0" style="color: #6259CA">Total Church Gift Amount</h6>
												<h2 class="mb-1 mt-2 number-font"><span class="counter">₵</span><?php echo ShowChurchGift(); ?></h2>
												
											</div>
										</div>
										
									</div>
								</div>
							</div>
						</div>
						<!-- End Row -->

						<!-- Row -->
						<div class="row row-sm">
							<div class="col-sm-6 col-md-6 col-xl-3">
								<div class="card custom-card">
									<div class="card-body text-center">
										<div class="icon-service bg-primary rounded-circle text-white">
											<i class="fa fa-users"></i>
										</div>
										<p class="mb-1 text-muted">Total Members</p>
										<h3 class="mb-0">
											<?php 
												echo showMembers();
											?>
										</h3>
									</div>
								</div>
							</div>
							<div class="col-sm-6 col-md-6 col-xl-3">
								<div class="card custom-card">
									<div class="card-body text-center">
										<div class="icon-service bg-primary rounded-circle text-white">
											<i class="fas fa-church"></i>
										</div>
										<p class="mb-1 text-muted">Ministries</p>
										<h3 class="mb-0">
											<?php 
												echo ShowMinistry();
											?>
										</h3>
									</div>
								</div>
							</div>
							<div class="col-sm-6 col-md-6 col-xl-3">
								<div class="card custom-card">
									<div class="card-body text-center">
										<div class="icon-service bg-primary rounded-circle text-white">
											<i class="fa fa-hotel"></i>
										</div>
										<p class="mb-1 text-muted">Departments</p>
										<h3 class="mb-0">
											<?php 

												echo showGroup();
											?>
										</h3>
									</div>
								</div>
							</div>
							<div class="col-sm-6 col-md-6 col-xl-3">
								<div class="card custom-card">
									<div class="card-body text-center">
										<div class="icon-service bg-primary rounded-circle text-white">
											<i class="fa fa-calendar-alt"></i>
										</div>
										<p class="mb-1 text-muted">Total Events</p>
										<h3 class="mb-0">
											<?php echo showEvent(); ?>
										</h3>
									</div>
								</div>
							</div>
							<div class="col-sm-6 col-md-6 col-xl-3">
								<div class="card custom-card">
									<div class="card-body text-center">
										<div class="icon-service bg-primary rounded-circle text-white">
											<i class="fa fa-calendar-alt"></i>
										</div>
										<p class="mb-1 text-muted">Total Upcoming Events</p>
										<h3 class="mb-0">
											<?php echo ShowUpEvent(); ?>
										</h3>
									</div>
								</div>
							</div>
							<div class="col-sm-6 col-md-6 col-xl-3">
								<div class="card custom-card">
									<div class="card-body text-center">
										<div class="icon-service bg-primary rounded-circle text-white">
											<i class="fa fa-calendar-alt"></i>
										</div>
										<p class="mb-1 text-muted">Total Ongoing Events</p>
										<h3 class="mb-0">
											<?php echo ShowOnEvent(); ?>
										</h3>
									</div>
								</div>
							</div>
							<div class="col-sm-6 col-md-6 col-xl-3">
								<div class="card custom-card">
									<div class="card-body text-center">
										<div class="icon-service bg-primary rounded-circle text-white">
											<i class="fas fa-hand-holding-usd"></i>
										</div>
										<p class="mb-1 text-muted">Total Donations Made</p>
										<h3 class="mb-0">
											<?php echo ShowDonation(); ?>
										</h3>
									</div>
								</div>
							</div>
							<div class="col-sm-6 col-md-6 col-xl-3">
								<div class="card custom-card">
									<div class="card-body text-center">
										<div class="icon-service bg-primary rounded-circle text-white">
											<i class="fa fa-hand-paper-o"></i>
										</div>
										<p class="mb-1 text-muted">Total Pledges Made</p>
										<h3 class="mb-0">
											<?php echo ShowPledges(); ?>
										</h3>
									</div>
								</div>
							</div>
						</div>
						<!-- End Row -->

							<!-- Latest members -->
							<div class="row row-sm">
							<div class="col-lg-12 col-md-12">
								<div class="card custom-card">
									<div class="card-body h-100">
										<div>
											<h6 class="main-content-label mb-1">Latest Members</h6>
											<hr>
										</div>
										<div id="owl-demo2" class="owl-carousel owl-carousel-icons2">
											 <?php  

					                        $i = 0;
					                        $latest_member_stop = 10;
					                        $select_latest = "SELECT * FROM members_tbl ORDER BY member_id DESC";
					                        $run_latest    = mysqli_query($db, $select_latest);
					              
					                        while($row_latest = mysqli_fetch_array($run_latest))
					                        {
					                          $member_id   = $row_latest['member_id'];
					                          $member_name = $row_latest['member_name'];
					                          $member_img  = $row_latest['member_photo'];
					                          $date_added  = $row_latest['date_added'];
					                          $date_add  = date("M d, Y",strtotime($date_added));

					                          $i++;

					                          if( $i < $latest_member_stop)
					                          {
					                            echo "
					                                 
					                            <div class='item'>
												<div class='card'>
													<div class='card-body user-card text-center'>
														<div class='main-img-user avatar-lg online text-center'>
															<img alt='avatar' class='rounded-circle' src='church-images/members/$member_img'>
														</div>
														<div class='mt-2'>
															<h5 class='mb-1'>$member_name</h5>
															<p class='mb-1'>Date Joined</p>
															<span class='text-muted'> $date_add</span>
														</div>
														<a href='profile.php?member_id=$member_id' class='btn ripple btn-primary btn-sm mt-3'>View Profile</a>
													</div>
												</div>
											</div>


					                                 ";
					                          }
					                          else
					                          {
					                            break;
					                          }

					                        }

					                    ?>

										</div>
									</div>
								</div>
							</div>
						    </div>
						    <!-- Latest Members End -->


						    <!--Row-->
						<div class="row row-sm">
							<div class="col-md-6 grid-margin">
								<div class="card custom-card">
									<div class="card-header border-bottom-0 pb-0">
										<div class="d-flex justify-content-between">
											<label class="main-content-label mb-0 pt-1">Latest Events </label>
										</div>
									</div>
									<div class="card-body">
										<div class="table-responsive border userlist-table">
											<table class="table card-table table-striped table-vcenter text-nowrap mb-0">
												<thead>
													<tr>
														<th class="wd-lg-8p"><span>Photo</span></th>
														<th class="wd-lg-20p"><span>Event Name</span></th>
														<th class="wd-lg-20p"><span>Status</span></th>
													</tr>
												</thead>
												<tbody>
													  <?php  

                        $i = 0;
                        $latest_event_stop = 10;
                        $select_latest = "SELECT * FROM events_tbl WHERE approval_status = 'Approved' ORDER BY event_id DESC";
                        $run_latest    = mysqli_query($db, $select_latest);
                        
                        while($row_latest = mysqli_fetch_array($run_latest))
                        {
                          $event_name    = $row_latest['event_name'];
                          $event_banner  = $row_latest['event_banner'];
                          $event_status  = $row_latest['event_status'];
                          $org_by		 = $row_latest['organized_by'];

                          $i++;

                          if( $i < $latest_event_stop)
                          {
                          
                          
                        
                       ?>

                                <tr>
                                
                                   <td><img src='event_images/<?php echo $event_banner; ?>' alt='<?php echo $event_name; ?>' width='90' height='50'></td>
                                   <td><?php echo $event_name; ?></td>

                                   <td>
                                    <?php
                                     if($event_status == 'Ongoing')
                                     { 
                                       echo "<span class='badge badge-success'>Ongoing</span>";
                                     }
                                     elseif($event_status == 'Upcoming')
                                     {
                                       echo "<span class='badge badge-warning'>Upcoming</span>";
                                     }
                                     else
                                     {
                                       echo "<span class='badge badge-danger'>Ended</span>";
                                     }

                                    ?>
                                   </td>
                                 </tr>

                               <?php }                         
                          
                              else
                              {
                                break;
                              }
                      

                       } ?>
                                       
													
													<!--<tr>
														<td>
															<img alt="avatar" class="rounded-circle avatar-md mr-2" src="../assets/img/users/6.jpg">
														</td>
														<td>Paul Molive</td>
														<td>
															12/07/2020
														</td>
														<td class="text-center">
															<span class="label text-success d-flex"><span class="dot-label bg-success mr-1"></span>active</span>
														</td>
														<td>
															<a href="#">paul45@kunis.com</a>
														</td>
													</tr>-->
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div><!-- COL END -->


							<div class="col-md-6 grid-margin">
								<div class="card custom-card">
									<div class="card-header border-bottom-0 pb-0">
										<div class="d-flex justify-content-between">
											<label class="main-content-label mb-0 pt-1"> Church Service Board </label>
										</div>
									</div>
									<div class="card-body">
										<div class="table-responsive border userlist-table">
											<table class="table card-table table-striped table-vcenter text-nowrap mb-0">
												<thead>
													<tr>

														<th class="wd-lg-8p"><span>Name</span></th>
														<th class="wd-lg-20p"><span>Date</span></th>
														<th class="wd-lg-20p"><span>Time</span></th>
														<th class="wd-lg-20p"><span>Status</span></th>
													</tr>
												</thead>
												<tbody>

													<?php  

						                        $i = 0;
						                        $latest_service_stop = 10;
						                        $select_latest = "SELECT * FROM service_tbl WHERE approval_status = 'Approved' ORDER BY service_id DESC";
						                        $run_latest    = mysqli_query($db, $select_latest);
						                        
						                        while($row_latest = mysqli_fetch_array($run_latest))
						                        {
						                          $service_name    = $row_latest['service_name'];
						                          $service_date    = $row_latest['service_date'];
						                          $service_time    = $row_latest['service_time'];
						                          $service_status  = $row_latest['service_status'];

						                          $i++;

						                          if( $i < $latest_service_stop)
						                          {
						                          
						                          
						                        
						                       ?>

						                                <tr>
						                               
						                                   <td><?php echo $service_name; ?></td>
						                                   <td><?php echo date("M d, Y",strtotime($service_date)); ?></td>
						                                   <td><?php echo date("h:i a",strtotime($service_time)); ?></td>
						                                   <td>
						                                    <?php
						                                    
						                                     if($service_status == 'Ongoing')
						                                     { 
						                                       echo "<span class='badge badge-success'>Ongoing</span>";
						                                     }
						                                     elseif($service_status == 'Upcoming')
						                                     {
						                                       echo "<span class='badge badge-warning'>Upcoming</span>";
						                                     }
						                                     else
						                                     {
						                                       echo "<span class='badge badge-danger'>Ended</span>";
						                                     }

						                                    ?>
						                                   </td>
						                                 </tr>

						                               <?php }                          
						                          
						                              else
						                              {
						                                break;
						                              }
						                      

						                       } ?>
													
													
													<!--<tr>
														<td>
															<img alt="avatar" class="rounded-circle avatar-md mr-2" src="../assets/img/users/6.jpg">
														</td>
														<td>Paul Molive</td>
														<td>
															12/07/2020
														</td>
														<td class="text-center">
															<span class="label text-success d-flex"><span class="dot-label bg-success mr-1"></span>active</span>
														</td>
														<td>
															<a href="#">paul45@kunis.com</a>
														</td>
													</tr>-->
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div><!-- COL END -->
						</div>
						<!-- row closed  -->


						<!-- Calendar Row -->
						<div class="row row-sm">
							<div class="col-sm-12 col-md-12">
								<div class="card custom-card">
									<div class="card-body">
										<div class="row "id="wrap">
											<div class="col-xl-2" id="external-events">
												<h4>Events Calendar</h4>
												<p>Drag events to their respective dates</p>
												<div id="external-events-list">
													<?php 

														$select_event = "SELECT * FROM events_tbl WHERE approval_status = 'Approved' ORDER BY event_id DESC";
								                        $run_event    = mysqli_query($db, $select_event);
								                        
								                        while($row_event = mysqli_fetch_array($run_event))
								                        {
								                          $event_name    = $row_event['event_name'];
                        

													?>

													<div class="fc-event fc-h-event fc-daygrid-event fc-daygrid-block-event">
														<div class="fc-event-main"><?php echo $event_name; ?></div>
													</div>
													
												<?php } ?>
												</div>
												<p>
													<input type="checkbox" id="drop-remove" />
													<label for="drop-remove">remove after drop</label>
												</p>
											</div>
											<div class="col-xl-10" id="calendar-wrap">
												<div id="calendar"></div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- Calendar End Row -->



						    <!--Row-->
						<div class="row row-sm">
							<div class="col-md-6 grid-margin">
								<div class="card custom-card">
									<div class="card-header border-bottom-0 pb-0">
										<div class="d-flex justify-content-between">
											<label class="main-content-label mb-0 pt-1">Latest Donations </label>
										</div>
									</div>
									<div class="card-body">
										<div class="table-responsive border userlist-table">
											<table class="table card-table table-striped table-vcenter text-nowrap mb-0">
												<thead>
													<tr>
														<th class="wd-lg-8p"><span>Name</span></th>
														<th class="wd-lg-20p"><span>Donation Name</span></th>
														<th class="wd-lg-20p"><span>Phone Number</span></th>
														<th class="wd-lg-20p"><span>Amount</span></th>
													</tr>
												</thead>
												<tbody>
											<?php  

						                        
						                        $latest_donation_stop = 10;
						                        $select_latest = "SELECT * FROM donation_tbl ORDER BY donation_id DESC";
						                        $run_latest    = mysqli_query($db, $select_latest);
						                        
						                        while($row_latest = mysqli_fetch_array($run_latest))
						                        {
						                           $fullname    = $row_latest['name'];
							                       $type_id     = $row_latest['type_id'];
						                           $phone       = $row_latest['contact'];
							                       $amount      = $row_latest['amount'];


							                         // Get Donation Type
							                       $sel_dtype = "SELECT * FROM donation_types WHERE type_id = '$type_id'";
							                       $run_dtype = mysqli_query($db, $sel_dtype);
							                       $row_dtype = mysqli_fetch_array($run_dtype);
							                       $type_name = $row_dtype['type_name'];

						                          

						                          if( $i < $latest_event_stop)
						                          {
						                          
						                          
						                        
						                       ?>

						                                <tr>
						                                
						                                   <td><?php echo $fullname ?></td>
						                                   <td><?php echo $type_name; ?></td>
						                                   <td><?php echo $phone; ?></td>
						                                   <td><?php echo $amount; ?></td>
						                                 </tr>

						                               <?php }                         
						                          
						                              else
						                              {
						                                break;
						                              }
						                      

						                       } ?>
                                       
													
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div><!-- COL END -->


							<div class="col-md-6 grid-margin">
								<div class="card custom-card">
									<div class="card-header border-bottom-0 pb-0">
										<div class="d-flex justify-content-between">
											<label class="main-content-label mb-0 pt-1"> Latest Pledges </label>
										</div>
									</div>
									<div class="card-body">
										<div class="table-responsive border userlist-table">
											<table class="table card-table table-striped table-vcenter text-nowrap mb-0">
												<thead>
													<tr>

														<th class="wd-lg-8p"><span>Name</span></th>
														<th class="wd-lg-20p"><span>Amount</span></th>
														<th class="wd-lg-20p"><span>Contact</span></th>
														<th class="wd-lg-20p"><span>Status</span></th>
													</tr>
												</thead>
												<tbody>

												<?php  

							                        $i = 0;
							                        $latest_pledge_stop = 10;
							                        $select_latest = "SELECT * FROM pledges_tbl ORDER BY pledge_id DESC";
							                        $run_latest    = mysqli_query($db, $select_latest);
							                        
							                        while($row_latest = mysqli_fetch_array($run_latest))
							                        {
							                          $member_name    = $row_latest['member_name'];
							                          $pledge_amt     = $row_latest['pledge_amt'];
							                          $phone_number   = $row_latest['phone_number'];
							                          $pledge_status  = $row_latest['pledge_status'];

							                          $i++;

							                          if( $i < $latest_pledge_stop)
							                          {
							                          
							                          
							                        
							                       ?>

							                                <tr>
							                              
							                                   <td><?php echo $member_name; ?></td>
							                                   <td><?php echo $pledge_amt; ?></td>
							                                   <td><?php echo $phone_number ?></td>
							                                   <td>
							                                      <?php 
														                            
														            if($pledge_status == 'Not Fulfilled')
														            {
														                echo "<span class='badge badge-danger'> Not Fulfilled </span>";
														            }
														            elseif($pledge_status == 'Fulfilled')
														            {
														                echo "<span class='badge badge-success'> Fulfilled </span>"; 
														            }
														            else
														            {
														             echo "<span class='badge badge-warning'> Partially Fulfilled </span>";	
														            }

														         ?>
							                                   </td>
							                                 </tr>

							                               <?php }                          
							                          
							                              else
							                              {
							                                break;
							                              }
							                      

							                       } ?>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div><!-- COL END -->
						</div>
						<!-- row closed  -->








					</div>
				</div>
			</div>
			<!-- End Main Content-->



		


			<!-- Main Footer-->
			<div class="main-footer text-center">
				<div class="container">
					<div class="row row-sm">
						<div class="col-md-12">
							<span>Copyright © 2021 <a href="#">Codeitsoft Technology</a>. All rights reserved.</span>
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
		<script src="assets/plugins/jquery/jquery.min.js"></script>

		<!-- Bootstrap js-->
		<script src="assets/plugins/bootstrap/js/popper.min.js"></script>
		<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>

		<!-- Internal Chart.Bundle js-->
		<script src="assets/plugins/chart.js/Chart.bundle.min.js"></script>

		<!-- Peity js-->
		<script src="assets/plugins/peity/jquery.peity.min.js"></script>

		<!-- Select2 js-->
		<script src="assets/plugins/select2/js/select2.min.js"></script>

		<!-- Perfect-scrollbar js -->
		<script src="assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>

		<!-- Sidemenu js -->
		<script src="assets/plugins/sidemenu/sidemenu.js"></script>

		<!-- Sidebar js -->
		<script src="assets/plugins/sidebar/sidebar.js"></script>

		<!-- Jquery-Ui js-->
		<script src="assets/plugins/jquery-ui/ui/widgets/datepicker.js"></script>

		<!-- Internal Daternagepicker js-->
		<script src="assets/plugins/bootstrap-daterangepicker/moment.min.js"></script>
		<script src="assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>


		<!-- Internal Fileuploads js-->
		<script src="assets/plugins/fileuploads/js/fileupload.js"></script>
        <script src="assets/plugins/fileuploads/js/file-upload.js"></script>

		<!-- InternalFancy uploader js-->
		<script src="assets/plugins/fancyuploder/jquery.ui.widget.js"></script>
        <script src="assets/plugins/fancyuploder/jquery.fileupload.js"></script>
        <script src="assets/plugins/fancyuploder/jquery.iframe-transport.js"></script>
        <script src="assets/plugins/fancyuploder/jquery.fancy-fileupload.js"></script>
        <script src="assets/plugins/fancyuploder/fancy-uploader.js"></script>

        <!-- Internal Data Table js -->
		<script src="assets/plugins/datatable/jquery.dataTables.min.js"></script>
		<script src="assets/plugins/datatable/dataTables.bootstrap4.min.js"></script>
		<script src="assets/plugins/datatable/dataTables.responsive.min.js"></script>
		<script src="assets/plugins/datatable/fileexport/dataTables.buttons.min.js"></script>
		<script src="assets/plugins/datatable/fileexport/buttons.bootstrap4.min.js"></script>
		<script src="assets/plugins/datatable/fileexport/jszip.min.js"></script>
		<script src="assets/plugins/datatable/fileexport/pdfmake.min.js"></script>
		<script src="assets/plugins/datatable/fileexport/vfs_fonts.js"></script>
		<script src="assets/plugins/datatable/fileexport/buttons.html5.min.js"></script>
		<script src="assets/plugins/datatable/fileexport/buttons.print.min.js"></script>
		<script src="assets/plugins/datatable/fileexport/buttons.colVis.min.js"></script>
		<script src="assets/js/table-data.js"></script>

		<!-- Internal Check-all-mail js-->
		<script src="assets/js/check-all-mail.js"></script>

		<!-- Internal Quill js-->
		<script src="assets/plugins/quill/quill.min.js"></script>

		<!-- Internal Summernote js-->
		<script src="assets/plugins/summernote/summernote-bs4.js"></script>

		<!-- Internal Form-editor js-->
		<script src="assets/js/form-editor.js"></script>

			<!-- Internal Owl Carousel js-->
		<script src="assets/plugins/owl-carousel/owl.carousel.js"></script>

		<!-- Multislider js -->
		<script src="assets/plugins/multislider/multislider.js"></script>
		<script src="assets/js/carousel.js"></script>

		<!-- Perfect-scrollbar js -->
		<script src="assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>

        <!-- Internal Form-elements js-->
		<script src="assets/js/advanced-form-elements.js"></script>
		<script src="assets/js/select2.js"></script>


		<!-- Internal Morris js -->
		<script src="assets/plugins/raphael/raphael.min.js"></script>
		<script src="assets/plugins/morris.js/morris.min.js"></script>

		<!-- Circle Progress js-->
		<script src="assets/js/circle-progress.min.js"></script>
		<script src="assets/js/chart-circle.js"></script>

		<!-- Internal Dashboard js-->
		<script src="assets/js/index.js"></script>

		<!-- Sticky js -->
		<script src="assets/js/sticky.js"></script>

		<!-- Full-calendar js-->
		<script src='assets/plugins/fullcalendar/fullcalendar.min.js'></script>
		<script src="assets/js/calendar-events.js"></script>
		<script src="assets/js/calendar.js"></script>

		<!-- Custom js -->
		<script src="assets/js/custom.js"></script>


	</body>
</html>

<?php } ?>