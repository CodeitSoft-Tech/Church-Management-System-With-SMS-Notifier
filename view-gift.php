<?php include("includes/header.php"); ?>


			<div class="main-content side-content pt-0">
				<div class="container-fluid">
					<div class="inner-body">
						<!-- Page Header -->
						<div class="page-header">
							<div>
								<h2 class="main-content-title tx-24 mg-b-5">Church Gifts</h2>
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">View Church Gifts</li>
								</ol>
							</div>
						</div>
						<!-- End Page Header -->

						
						<!-- Member Row -->
						<div class="row row-sm">
							<div class="col-md-12">
								<div class="card custom-card">
									<div class="card-header p-3 tx-medium my-auto tx-white bg-primary">
									 Church Gifts
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
												                  <th>Gift Name</th>
												                  <th>Price</th>
												                  <th>Description</th>
												                  <th>Action</th>
																</tr>
															</thead>
															<tbody>
													 <?php

							                     $i = 0;
							                    $sql = "SELECT * FROM spiritual_gift_tbl";
							                    $query = mysqli_query($db, $sql) or die(mysqli_error($db));

							                    while($row = mysqli_fetch_array($query))
							                    {
							                          $gift_id    = $row['gift_id'];
							                          $gift_name  = $row['gift_name'];
							                          $gift_price = $row['gift_price'];
							                          $gift_desc  = $row['gift_desc'];
							                          
							                          $i++;
							                       ?>
							                    <tr>
							                        <td><?php echo $i; ?></td>
							                        <td><?php echo $gift_name; ?></td>
							                        <td><?php echo $gift_price; ?></td>
							                        <td><?php echo $gift_desc; ?></td>
							                      
						<td>
		            
		            <a style="background: #6259CA; border: 1px solid #6259CA" class="btn ripple btn-info" data-target="#update<?php echo $gift_id;?>" data-toggle="modal" href="#update<?php echo $gift_id;?>"> <i  class="fa fa-eye"></i>
	                </a>
	               
	               <a style="background: red; border: 1px solid red" class="btn ripple btn-info" data-target="#delete<?php echo $gift_id;?>" data-toggle="modal" href="#delete<?php echo $gift_id;?>"> <i class="fa fa-trash fa-danger"></i>
	               </a>
			      </td>


			<!-- Large Modal -->
			<div class="modal" id="update<?php echo $gift_id;?>">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content modal-content-demo">
						<div class="modal-header">
							<h6 class="modal-title"> Update Church Gift Details </h6>
							<button aria-label="Close" class="close" data-dismiss="modal" type="button">
							<span aria-hidden="true">&times;</span>
						    </button>
						</div>
						<div class="modal-body">
						
						<form action="gift-update.php" method="post" enctype="multipart/form-data">
												<div class="">
													<div class="form-group col-md-9">
														<label style="font-size: 16.5px; font-weight: 700;">
														Gift Name</label>
														 <input type="hidden" class="form-control" name="gift_id" value="<?php echo $gift_id; ?>"> 
														<input type="text" value="<?php echo $gift_name; ?>" name="gift_name" class="form-control" required>
													</div>

													<div class="form-group col-md-9">
														<label style="font-size: 16.5px; font-weight: 700;">
														 Price
														</label>
														 <input type="hidden" class="form-control" name="gift_id" value="<?php echo $gift_id; ?>"> 
														<input type="text" value="<?php echo $gift_price; ?>" name="gift_price" class="form-control" required>
													</div>

													<div class="form-group col-md-9">
														<label style="font-size: 16.5px; font-weight: 700;">Description</label>
														<div class="pos-relative">
															 <input type="hidden" class="form-control" name="pledge_id" value="<?php echo $pledge_id; ?>"> 
															<textarea class="form-control" id="summernote" name="gift_desc">
																<?php echo $gift_desc; ?>
															</textarea>
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
			<div class="modal" id="delete<?php echo $gift_id;?>">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content modal-content-demo">
						<div class="modal-header">
							<h6 class="modal-title">Delete Church Gift Details</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
						</div>
						<div class="modal-body">
							<form action="gift-del.php" method="post">
								 <input type="hidden" class="form-control" name="gift_id" value="<?php echo $gift_id; ?>" required> 
                      
                                  <p>Are you sure you want to <b>Delete</b> this Church Gift?</p>
							
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