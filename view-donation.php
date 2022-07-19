<?php include("includes/header.php"); ?>


			<div class="main-content side-content pt-0">
				<div class="container-fluid">
					<div class="inner-body">
						<!-- Page Header -->
						<div class="page-header">
							<div>
								<h2 class="main-content-title tx-24 mg-b-5">Donations</h2>
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">View Donations</li>
								</ol>
							</div>
						</div>
						<!-- End Page Header -->

						
						<!-- Member Row -->
						<div class="row row-sm">
							<div class="col-md-12">
								<div class="card custom-card">
									<div class="card-header p-3 tx-medium my-auto tx-white bg-primary">
									   Donations
									</div>
									<div class="card-body">
									<!-- Member Form -->
									<div class="row row-sm">
									<div class="col-md-12 col-lg-12 col-xl-12">
									<!-- Row -->
									<div class="row row-sm">
										<div class="col-lg-12">
											<div class="card custom-card overflow-hidden">
												<div class="card-body">		
													<div class="table-responsive">
														<table id="example2" class="table table-bordered border-t0 key-buttons text-nowrap w-100" >
															<thead>
																<tr>
																  <th>No.</th>
												                  <th>Full Name</th>
												                  <th>Donation Name </th>
												                  <th>Amount</th>
												                  <th>Phone Number</th> 
												                  <th>Payment Type</th>        
												                  <th>Action</th>
																</tr>
															</thead>
															<tbody>
									           <?php

							                    $i = 0;
							                    $sql = "SELECT * FROM donation_tbl";
							                    $query = mysqli_query($db, $sql) or die(mysqli_error($db));

							                    while($row = mysqli_fetch_array($query))
							                    {
							                       $donation_id = $row['donation_id'];
							                       $fullname    = $row['name'];
							                       $type_id     = $row['type_id'];
							                       $address     = $row['address'];
							                       $phone       = $row['contact'];
							                       $amount      = $row['amount'];
							                       $ptype       = $row['type'];
							                       $date        = $row['date_donated'];

							                       // Get Donation Type
							                       $sel_dtype = "SELECT * FROM donation_types WHERE type_id = '$type_id'";
							                       $run_dtype = mysqli_query($db, $sel_dtype);
							                       $row_dtype = mysqli_fetch_array($run_dtype);
							                       $type_name = $row_dtype['type_name'];


							                       $i++;

							                  ?>
							                    <tr>
							                      <td><?php echo $i; ?></td>
							                      <td><?php echo $fullname ?></td>
							                      <td><?php echo $type_name ?></td>
							                      <td><?php echo $amount; ?></td>
							                      <td><?php echo $phone; ?></td>
							                      <td><?php echo $ptype; ?></td>
							                      <td>
							                      	<a style="background: #6259CA; border: 1px solid #6259CA" class="btn ripple btn-info" data-target="#update<?php echo $donation_id;?>" data-toggle="modal" href="#update<?php echo $donation_id;?>"> <i  class="fa fa-eye"></i>
										           </a>
										           <a style="background: red; border: 1px solid red" class="btn ripple btn-info" data-target="#delete<?php echo $donation_id;?>" data-toggle="modal" href="#delete<?php echo $donation_id;?>"> <i class="fa fa-trash fa-danger"></i>
										           </a>
							                      </td>	


			<!-- Large Modal -->
			<div class="modal" id="update<?php echo $donation_id;?>">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content modal-content-demo">
						<div class="modal-header">
							<h6 class="modal-title"> Update Donation Details </h6>
							<button aria-label="Close" class="close" data-dismiss="modal" type="button">
							<span aria-hidden="true">&times;</span>
						    </button>
						</div>
						<div class="modal-body">
						
						<form action="donation-update.php" method="post" enctype="multipart/form-data">
												<div class="">

													<div class="form-group col-md-9">
														<label style="font-size: 16.5px; font-weight: 700">
															Donation Name
														</label>
															<select name="donation_type" class="form-control select select2" required>
															 <option value="<?php echo $type_id; ?>"><?php echo $type_name; ?></option>
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




													<div class="form-group col-md-9">
														<label style="font-size: 16.5px; font-weight: 700;">
														Full Name</label>
														 <input type="hidden" class="form-control" name="donation_id" value="<?php echo $donation_id; ?>"> 
														<input type="text" value="<?php echo $fullname; ?>" name="fullname" class="form-control" required>
													</div>


													
													<div class="form-group col-md-9">
														<div class="row row-sm">	
														 <div class="col-sm-6">
													    <label style="font-size: 16.5px; font-weight: 700;">Phone Number</label>
													    <input type="hidden" class="form-control" name="donation_id" value="<?php echo $donation_id; ?>"> 
														<input type="text" name="phone_number" value="<?php echo $phone; ?>" class="form-control" required="" >
														</div>

															<div class="col-sm-6 mg-t-20 mg-sm-t-0">
															<label style="font-size: 16.5px; font-weight: 700;">Location</label>
															<input type="hidden" class="form-control" name="donation_id" value="<?php echo $donation_id; ?>"> 
															<input type="text" name="location" value="<?php echo $address; ?>" class="form-control" required>
															</div>
														</div>
													</div>


													<div class="form-group col-md-9">
														<label style="font-size: 16.5px; font-weight: 700;">Amount</label>
														<div class="pos-relative">
														 <input type="hidden" class="form-control" name="donation_id" value="<?php echo $donation_id; ?>">
													     <input type="text" name="amount" value="<?php echo $amount; ?>" class="form-control" required>
														</div>
													</div>

													<div class="form-group col-md-9">
														<label style="font-size: 16.5px; font-weight: 700;">Payment Type</label>
														<div class="pos-relative">
														 <input type="hidden" class="form-control" name="donation_id" value="<?php echo $donation_id; ?>">
														 <select name="payment_type" class="form-control select select2" required>
														   <option value="<?php echo $ptype; ?>"><?php echo $ptype; ?></option>
														   <option value="Cash">Cash</option>
				    									   <option value="Cheque">Cheque</option>
				    									   <option value="Momo">Momo</option>
														 </select>
														</div>
													</div>


													<div class="form-group col-md-9">
														<label style="font-size: 16.5px; font-weight: 700;">
														 Donation Date
														</label>
														<div class="pos-relative">
														   <input type="hidden" class="form-control" name="donation_id" value="<?php echo $donation_id; ?>">
												          <input type="date" value="<?php echo $date; ?>" name="donation_date" class="form-control" required>
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


			 <!-- Delete Modal -->
			<div class="modal" id="delete<?php echo $donation_id;?>">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content modal-content-demo">
						<div class="modal-header">
							<h6 class="modal-title">Delete Donation Details</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
						</div>
						<div class="modal-body">
							<form action="donation-del.php" method="post">
								 <input type="hidden" class="form-control" name="donation_id" value="<?php echo $donation_id; ?>" required> 
                      
                                  <p>Are you sure you want to <b>Delete</b> this Donation?</p>
							
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
			</div>
			</div>





<?php include("includes/footer.php"); ?>