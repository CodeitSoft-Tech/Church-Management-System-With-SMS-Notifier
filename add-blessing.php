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
								<h2 class="main-content-title tx-24 mg-b-5">Out-Blessings</h2>
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Add New Out-Blessing</li>
								</ol>
							</div>
						</div>
						<!-- End Page Header -->

						
						<!-- Member Row -->
						<div class="row row-sm">
							<div class="col-md-12">
								<div class="card custom-card">
									<div class="card-header p-3 tx-medium my-auto tx-white bg-primary">
									  Out-Blessing Details
									</div>
									<div class="card-body">
										<!-- Member Form -->
											<div class="row row-sm">
											<div class="col-md-12 col-lg-12 col-xl-12">
												<form action="add-blessing.php" method="post" enctype="multipart/form-data">
												<div class="">
													<div class="form-group col-md-9">
														<label style="font-size: 16.5px; font-weight: 700;">
														 Blessing Name</label>
														<input type="text" name="blessing_name" class="form-control" required>
													</div>


													<div class="form-group col-md-9">
													<label style="font-size: 16.5px; font-weight: 700;">Blessing Type</label>
														<div class="pos-relative">
															<select name="blessing_type" class="form-control select select2" required>
																	<option disabled selected>Select blessing type</option>
																	<option value="Cash">Cash</option>
																	<option value="Kind">Kind</option>
																</select>
														</div>
													</div>

													<div class="form-group col-md-9">
													<label style="font-size: 16.5px; font-weight: 700;"> Amount / Item(s) (If "Cash", enter amount and vice versa)</label>
														<div class="pos-relative">
														<input type="text" name="present" class="form-control" required>
														</div>
													</div>
													

													<div class="form-group col-md-9">
													 <label style="font-size: 16.5px; font-weight: 700;">Recipient Name </label>
														<div class="pos-relative">
														<input type="text" name="blessing_to" class="form-control" required="" >
														</div>
													</div>

													<div class="form-group col-md-9">
													 <label style="font-size: 16.5px; font-weight: 700;">Recipient Location</label>
														<div class="pos-relative">
												     <input type="text" class="form-control" name="blessing_loc" required>
														</div>
													</div>

													<div class="form-group col-md-9">
													 <label style="font-size: 16.5px; font-weight: 700;">Date Delivered</label>
														<div class="pos-relative">
												     <input type="date" class="form-control" name="blessing_date" required>
														</div>
													</div>

													<div class="form-group col-md-9">
													 <label style="font-size: 16.5px; font-weight: 700;">Description</label>
														<div class="pos-relative">
												    <textarea id="summernote" class="form-control" name="blessing_desc" required></textarea>
														</div>
													</div>
																
													<div class="form-group col-md-6">
													<button type="submit" name="submit" class="btn ripple btn-main-primary">Add Out-Blessing</button>
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

		$blessing_name    = mysqli_real_escape_string($db, $_POST['blessing_name']);
		$blessing_type    = mysqli_real_escape_string($db, $_POST['blessing_type']);
		$present          = mysqli_real_escape_string($db, $_POST['present']);
		$blessing_to      = mysqli_real_escape_string($db, $_POST['blessing_to']);
		$blessing_loc     = mysqli_real_escape_string($db, $_POST['blessing_loc']);
		$blessing_date    = mysqli_real_escape_string($db, $_POST['blessing_date']);
		$blessing_desc    = mysqli_real_escape_string($db, $_POST['blessing_desc']);	
		
		$insert_blessing = "INSERT INTO tbl_out_blessing(blessing_name, blessing_type, presents, blessing_to, blessing_location, blessing_date, blessing_desc)VALUES('$blessing_name','$blessing_type','$present', '$blessing_to', '$blessing_loc', '$blessing_date', '$blessing_desc')";
		 $run_blessing = mysqli_query($db, $insert_blessing);

		 if($run_blessing)
      {
					echo "<script>alert('Out-blessing added successfully')</script>";
					echo "<script>document.location='add-blessing.php'</script>";
			} 
	

	}

?>
