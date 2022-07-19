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
								<h2 class="main-content-title tx-24 mg-b-5">Sermon</h2>
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Add New Sermon</li>
								</ol>
							</div>
						</div>
						<!-- End Page Header -->

						
						<!-- Member Row -->
						<div class="row row-sm">
							<div class="col-md-12">
								<div class="card custom-card">
									<div class="card-header p-3 tx-medium my-auto tx-white bg-primary">
									   Sermon Details
									</div>
									<div class="card-body">
										<!-- Member Form -->
											<div class="row row-sm">
											<div class="col-md-12 col-lg-12 col-xl-12">
												<form action="add-sermon.php" method="post" enctype="multipart/form-data">
												<div class="">
													<div class="form-group col-md-9">
														<label style="font-size: 16.5px; font-weight: 700;">
														 Sermon Title
														</label>
														<input type="text" name="sermon_title" class="form-control" required>
													</div>


													<div class="form-group col-md-9">
														<div class="row row-sm">	
															<div class="col-sm-6">
																<label style="font-size: 16.5px; font-weight: 700;">Sermon by</label>
															  <input type="text" name="sermon_by" class="form-control" required="" >
															</div>

															<div class="col-sm-6 mg-t-20 mg-sm-t-0">
																<label style="font-size: 16.5px; font-weight: 700;">Sermon Date</label>
																<input type="date" name="sermon_date" class="form-control" required="" >
															</div>
														</div>
													</div>

													<div class="form-group col-md-9">
														<label style="font-size: 16.5px; font-weight: 700;">Sermon Status</label>
														<div class="pos-relative">
															<select name="sermon_status" class="form-control select select2" required>
																	  <option disabled selected>Select sermon status</option>
																		<option value="Upcoming">Upcoming</option>
				    												<option value="Ongoing">Ongoing</option>
				    												<option value="Archived">Archived</option>
															</select>
														</div>
													</div>


													<div class="form-group col-md-9">
														<label style="font-size: 16.5px; font-weight: 700;">Sermon File (upload Image)</label>
														<div class="pos-relative">
												          <input type="file" class="dropify" name="sermon_file" data-height="200" />
														</div>
													</div>


													<div class="form-group col-md-9">
														<label style="font-size: 16.5px; font-weight: 700;">File Type (PDF and Audio Only)</label>
														<div class="pos-relative">
															<select name="sermon_type" class="form-control select select2" required>
																	<option disabled selected>Select file type</option>
																	<option value="Audio">Audio</option>
																	<option value="application/pdf">application/pdf</option>
																	<option value="audio/mpeg">audio/mpeg</option>
																</select>
														</div>
													</div>

													
													<div class="form-group col-md-6">
													<button type="submit" name="submit" class="btn ripple btn-main-primary">Add New Sermon</button>
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
		$sermon_title    = mysqli_real_escape_string($db, $_POST['sermon_title']);
		$sermon_by       = mysqli_real_escape_string($db, $_POST['sermon_by']);
		$sermon_date     = mysqli_real_escape_string($db, $_POST['sermon_date']);
		$sermon_type     = mysqli_real_escape_string($db, $_POST['sermon_type']);
		$sermon_status 	 = mysqli_real_escape_string($db, $_POST['sermon_status']);
		$sermon_desc     = mysqli_real_escape_string($db, $_POST['sermon_desc']);

		$sermon_file    = $_FILES['sermon_file']['name'];
		$sermon_type    = $_FILES['sermon_file']['type'];
		$sermon_size    = $_FILES['sermon_file']['size'];
		$tmp_name 	    = $_FILES['sermon_file']['tmp_name'];
		move_uploaded_file($tmp_name, "church-images/sermons/$sermon_file");
	

		 $insert_sermon = "INSERT INTO sermon_tbl(sermon_name, sermon_by, sermon_file, sermon_type, sermon_desc,sermon_status,sermon_date)VALUES('$sermon_title','$sermon_by', '$sermon_file', '$sermon_type','$sermon_desc','$sermon_status', '$sermon_date')";

		 $run_sermon = mysqli_query($db, $insert_sermon);

		  if($run_sermon)
		  {
				 echo "<script>alert('Sermon added successfully')</script>";
				 echo "<script>document.location='add-sermon.php'</script>"; 
			}

}

?>

