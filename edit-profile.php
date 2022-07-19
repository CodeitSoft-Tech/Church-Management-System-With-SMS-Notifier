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
								<h2 class="main-content-title tx-24 mg-b-5">Edit Profile</h2>
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Profile</li>
								</ol>
							</div>
						</div>
						<!-- End Page Header -->

						
						<!-- Member Row -->
						<div class="row row-sm">
							<div class="col-md-12">
								<div class="card custom-card">
									<div class="card-header p-3 tx-medium my-auto tx-white bg-primary">
									    Edit Profile
									</div>
									<div class="card-body">
										<!-- Member Form -->
											<div class="row row-sm">
											<div class="col-md-12 col-lg-12 col-xl-12">
												<?php  
   
												    $admin_name = $_SESSION['admin_username'];

												    $select_admin = "SELECT * FROM admin_tbl WHERE admin_username = '$admin_name'";
												    $run_admin    = mysqli_query($db, $select_admin);
												    $row_admin    = mysqli_fetch_array($run_admin);
												    $admin_id     = $row_admin['admin_id'];
												    $admin_img    = $row_admin['admin_img'];
												    $role         = $row_admin['role'];
												    $fullname     = $row_admin['fullname'];
												    $phone_number = $row_admin['phone_number'];
												    $email        = $row_admin['email'];
												    $address      = $row_admin['address'];

												?>

												<form action="edit-profile.php" method="post" enctype="multipart/form-data">

												<div class="">
													<div class="form-group col-md-9">
														<label style="font-size: 16.5px; font-weight: 700;">
														Full Name</label>
														<input type="hidden" name="admin_id" value="<?php echo $admin_id; ?>" class="form-control">
														<input type="text" name="fullname" value="<?php echo $fullname; ?>" class="form-control" required="" >
													</div>


													<div class="form-group col-md-9">
														<div class="row row-sm">
															
															<div class="col-sm-6">
																<label style="font-size: 16.5px; font-weight: 700;">Role</label>
																<input type="hidden" name="admin_id" value="<?php echo $admin_id; ?>" class="form-control">
																<input type="text" name="role" value="<?php echo $role; ?>" class="form-control" required="" >
															</div>

															<div class="col-sm-6 mg-t-20 mg-sm-t-0">
																<label style="font-size: 16.5px; font-weight: 700;">Phone Number</label>
																<input type="hidden" name="admin_id" value="<?php echo $admin_id; ?>" class="form-control">
																<input type="text" name="phone_number" value="<?php echo $phone_number; ?>" class="form-control" required="" >
															</div>

														</div>
													</div>



													<div class="form-group col-md-9">
														<div class="row row-sm">
															
															<div class="col-sm-6 mg-t-20 mg-sm-t-0">
																<label style="font-size: 16.5px; font-weight: 700;">Email</label>
																<input type="hidden" name="admin_id" value="<?php echo $admin_id; ?>" class="form-control">
																<input type="email" name="email" value="<?php echo $email; ?>" class="form-control" required="" >
															</div>

															<div class="col-sm-6">
																<label style="font-size: 16.5px; font-weight: 700;">Location</label>
																<input type="hidden" name="admin_id" value="<?php echo $admin_id; ?>" class="form-control">
																<input type="text" name="location" value="<?php echo $address; ?>" class="form-control" required="" >
															</div>
														</div>

													</div>
										

													<div class="form-group col-md-9">
														<label style="font-size: 16.5px; font-weight: 700;">Upload Image (upload Image)</label>
														<div class="pos-relative">
															<input type="hidden" name="admin_id" value="<?php echo $admin_id; ?>" class="form-control">
												      <input type="file" class="dropify" name="admin_img" data-height="200" />
												      <img src="church-images/admin/<?php echo $admin_img; ?>" alt="<?php echo $fullname ?>" width="" height="">
														</div>
													</div>

												
													<div class="form-group col-md-6">
													<button type="submit" name="update_btn" class="btn ripple btn-main-primary">Update Profile</button>
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
	
	if(isset($_POST['update_btn']))
	{

		$admin_id     = mysqli_real_escape_string($db, $_POST['admin_id']);
		$full_name    = mysqli_real_escape_string($db, $_POST['fullname']);
		$phone        = mysqli_real_escape_string($db, $_POST['phone_number']);
		$email        = mysqli_real_escape_string($db, $_POST['email']);
		$role         = mysqli_real_escape_string($db, $_POST['role']);
		$address      = mysqli_real_escape_string($db, $_POST['location']);
	
		
		$admin_img    = $_FILES['admin_img']['name'];
		$tmp_name 	  = $_FILES['admin_img']['tmp_name'];
		move_uploaded_file($tmp_name, "church-images/admin/$admin_img");
			

		if($admin_img == "")
		{
		    $update_admin = "UPDATE admin_tbl SET fullname = '$full_name', role = '$role', phone_number = '$phone', email = '$email', address = '$address' WHERE admin_id = '$admin_id'";
		    $run_admin    = mysqli_query($db, $update_admin);
		}
		else
		{
				$update_admin = "UPDATE admin_tbl SET fullname = '$full_name', admin_img = '$admin_img', role = '$role', phone_number = '$phone',  email = '$email', address = '$address' WHERE admin_id = '$admin_id'";
		    $run_admin    = mysqli_query($db, $update_admin);
		}

		

		echo "<script>alert('Details updated successfully')</script>";
		echo "<script>document.location='edit-profile.php'</script>"; 
	

	}

?>
