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
								<h2 class="main-content-title tx-24 mg-b-5">Account</h2>
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Account Settings</li>
								</ol>
							</div>
						</div>
						<!-- End Page Header -->

						
						<!-- Member Row -->
						<div class="row row-sm">
							<div class="col-md-12">
								<div class="card custom-card">
									<div class="card-header p-3 tx-medium my-auto tx-white bg-primary">
									   Edit Account Details
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
													    $username     = $row_admin['admin_username'];
													    $password     = $row_admin['admin_password'];

													?>

												<form action="account.php" method="post" enctype="multipart/form-data">

												<div class="">
													<div class="form-group col-md-9">
														<label style="font-size: 16.5px; font-weight: 700;">
														Username</label>
														<input type="hidden" name="admin_id" value="<?php echo $admin_id; ?>" class="form-control">
														<input type="text" name="username" value="<?php echo $username; ?>" class="form-control" required="" >
													</div>

													<div class="form-group col-md-9">
														<label style="font-size: 16.5px; font-weight: 700;">
														 Password</label>
														<input type="hidden" name="admin_id" value="<?php echo $admin_id; ?>" class="form-control">
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
			<!-- End Main Content-->







<?php 
  
  include("includes/footer.php"); 

?>
<?php
	
	if(isset($_POST['change_btn']))
	{

		$admin_id   = mysqli_real_escape_string($db, $_POST['admin_id']);
		$username   = mysqli_real_escape_string($db, $_POST['username']);
		$password   = mysqli_real_escape_string($db, $_POST['password']);
	
		
		$update_admin = "UPDATE admin_tbl SET admin_username = '$username', admin_password = '$password' WHERE admin_id = '$admin_id'";
		$run_admin    = mysqli_query($db, $update_admin);
	

		echo "<script>alert('Details changed successfully. Please login to confirm changes!')</script>";
		echo "<script>document.location='login.php'</script>"; 
	

	}

?>
