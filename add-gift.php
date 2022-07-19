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
								<h2 class="main-content-title tx-24 mg-b-5">Church Gifts</h2>
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Add New Church Gift</li>
								</ol>
							</div>
						</div>
						<!-- End Page Header -->

						
						<!-- Member Row -->
						<div class="row row-sm">
							<div class="col-md-12">
								<div class="card custom-card">
									<div class="card-header p-3 tx-medium my-auto tx-white bg-primary">
									  Church Gift Details
									</div>
									<div class="card-body">
										<!-- Member Form -->
											<div class="row row-sm">
											<div class="col-md-12 col-lg-12 col-xl-12">
												<form action="add-gift.php" method="post" enctype="multipart/form-data">
												<div class="">
													<div class="form-group col-md-9">
														<label style="font-size: 16.5px; font-weight: 700;">
														 Gift Name</label>
														<input type="text" name="gift_name" class="form-control" required>
													</div>

													<div class="form-group col-md-9">
														<label style="font-size: 16.5px; font-weight: 700;"> Gift Price </label>
														<div class="pos-relative">
														<input type="text" name="gift_price" class="form-control" required>
														</div>
													</div>

												
													<div class="form-group col-md-9">
														<label style="font-size: 16.5px; font-weight: 700;">Description</label>
														<div class="pos-relative">
												     	<textarea id="summernote" class="form-control" name="gift_desc"></textarea>
														</div>
													</div>

													
													
													<div class="form-group col-md-6">
													<button type="submit" name="submit" class="btn ripple btn-main-primary">Add Gift</button>
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
		$gift_name   = mysqli_real_escape_string($db, $_POST['gift_name']);
		$gift_price  = mysqli_real_escape_string($db, $_POST['gift_price']);
		$gift_desc   = mysqli_real_escape_string($db, $_POST['gift_desc']);
	

		$insert_gift = "INSERT INTO spiritual_gift_tbl(gift_name, gift_price, gift_desc)VALUES('$gift_name','$gift_price','$gift_desc')";
		 $run_gift = mysqli_query($db, $insert_gift);

    if($run_gift)
    {
			echo "<script>alert('Church gift added successfully')</script>";
			echo "<script>document.location='add-gift.php'</script>"; 
		}
		
	}


?>
