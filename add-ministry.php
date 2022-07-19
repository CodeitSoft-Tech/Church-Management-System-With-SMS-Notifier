<?php 

	include("includes/header.php");
	include("ministry-add.php")

?>

<!-- Main Content-->
			<div class="main-content side-content pt-0">

				<div class="container-fluid">
					<div class="inner-body">

						<!-- Page Header -->
						<div class="page-header">
							<div>
								<h2 class="main-content-title tx-24 mg-b-5">Ministries</h2>
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Add New Ministry</li>
								</ol>
							</div>
						</div>
						<!-- End Page Header -->

						
						<!-- Member Row -->
						<div class="row row-sm">
							<div class="col-md-12">
								<div class="card custom-card">
									<div class="card-header p-3 tx-medium my-auto tx-white bg-primary">
									    Ministry Details
									</div>
									<div class="card-body">
										<!-- Member Form -->
											<div class="row row-sm">
											<div class="col-md-12 col-lg-12 col-xl-12">
												<form action="add-ministry.php" method="post" enctype="multipart/form-data">
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
														Ministry Name</label>
														<input type="text" name="ministry_name" class="form-control" required="" >
													</div>

													<div class="form-group col-md-9">
														<label style="font-size: 16.5px; font-weight: 700;"> Email </label>
														<div class="pos-relative">
														<input type="text" name="ministry_email" class="form-control">
														</div>
													</div>

													<div class="form-group col-md-9">
														<label style="font-size: 16.5px; font-weight: 700;">Phone Number</label>
														<div class="pos-relative">
															<input type="text" name="ministry_phone" class="form-control" required="" >
														</div>
													</div>

													<div class="form-group col-md-9">
														<label style="font-size: 16.5px; font-weight: 700;">Date Instituted </label>
														<div class="pos-relative">
															<input type="date" name="ministry_date" class="form-control" >
														</div>
													</div>

													<div class="form-group col-md-9">
														<label style="font-size: 16.5px; font-weight: 700;">Ministry Image (upload Image)</label>
														<div class="pos-relative">
												     <input type="file" class="dropify" name="ministry_img" data-height="200">
														</div>
													</div>

													<br>
													<h4 class="col-md-3" style="color:#6259CA"> Ministry Account : </h4> <hr>

													<div class="form-group col-md-9">
														<label style="font-size: 16.5px; font-weight: 700;">
														 Ministry Username
														</label>
														<div class="pos-relative">
															<input type="text" name="min_name" class="form-control" required="" >
														</div>
													</div>

													<div class="form-group col-md-9">
														<label style="font-size: 16.5px; font-weight: 700;">Password</label>
														<div class="pos-relative">
															<input type="password" name="min_pass" class="form-control" required="" >
														</div>
													</div>
												
													<div class="form-group col-md-6">
													<button type="submit" name="submit" class="btn ripple btn-main-primary">Add Ministry</button>
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

