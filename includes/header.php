	<?php  

		session_start();
		include("includes/db_conn.php");

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
		<link href='assets/plugins/fullcalendar/fullcalendar.print.min.css' rel='stylesheet' media='print' />

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
							<a href="index.html"><img src="church-images/church/image.png" class="mobile-logo" alt="logo"></a>
							<a href="index.html"><img src="church-images/church/image.png" class="mobile-logo-dark" alt="logo"></a>
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
					                  $admin_img	= $row_admin['admin_img'];
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
					                  $admin_img	= $row_admin['admin_img'];
					         ?>
							<a class="d-flex" href="#">
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
