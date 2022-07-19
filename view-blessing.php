<?php include("includes/header.php"); ?>


			<div class="main-content side-content pt-0">
				<div class="container-fluid">
					<div class="inner-body">
						<!-- Page Header -->
						<div class="page-header">
							<div>
								<h2 class="main-content-title tx-24 mg-b-5">Out-Blessings</h2>
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">View Out-Blessings</li>
								</ol>
							</div>
						</div>
						<!-- End Page Header -->

						
						<!-- Member Row -->
						<div class="row row-sm">
							<div class="col-md-12">
								<div class="card custom-card">
									<div class="card-header p-3 tx-medium my-auto tx-white bg-primary">
									 Out-Blessings
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
                  <th>No</th>
                  <th>Blessing Name</th>
                  <th>Blessing Type</th>
                  <th>Amount / Item </th>
                  <th>Recipient</th> 
                  <th>Location</th>       
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php

                    $i = 0;
                    $sql = "SELECT * FROM tbl_out_blessing";
                    $query = mysqli_query($db, $sql) or die(mysqli_error($db));
                    
                    while($row = mysqli_fetch_array($query))
                    {   
                          $blessing_id       = $row['out_blessing_id'];
                          $blessing_name     = $row['blessing_name'];
                          $type              = $row['blessing_type'];
                          $amount            = $row['presents'];
                          $recipient         = $row['blessing_to'];
                          $location          = $row['blessing_location'];
                          $date              = $row['blessing_date'];
                          $blessing_desc     = $row['blessing_desc'];

                          $i++;

                  ?>
                    <tr>
                      <td><?php echo $i;              ?></td>
                      <td><?php echo $blessing_name;  ?></td>
                      <td><?php echo $type;           ?></td> 
                      <td><?php echo $amount;         ?></td>
                      <td><?php echo $recipient;      ?></td>
                      <td><?php echo $location;      ?></td>
                     
							                      
						<td>
		            
		            <a style="background: #6259CA; border: 1px solid #6259CA" class="btn ripple btn-info" data-target="#update<?php echo $blessing_id;?>" data-toggle="modal" href="#update<?php echo $blessing_id;?>"> <i  class="fa fa-eye"></i>
	                </a>
	               
	               <a style="background: red; border: 1px solid red" class="btn ripple btn-info" data-target="#delete<?php echo $blessing_id;?>" data-toggle="modal" href="#delete<?php echo $blessing_id;?>"> <i class="fa fa-trash fa-danger"></i>
	               </a>
			      </td>


			<!-- Large Modal -->
			<div class="modal" id="update<?php echo $blessing_id;?>">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content modal-content-demo">
						<div class="modal-header">
							<h6 class="modal-title"> Update Out-Blessing Details </h6>
							<button aria-label="Close" class="close" data-dismiss="modal" type="button">
							<span aria-hidden="true">&times;</span>
						    </button>
						</div>
						<div class="modal-body">
						
						<form action="blessing-update.php" method="post" enctype="multipart/form-data">
												<div class="">
													<div class="form-group col-md-9">
														<label style="font-size: 16.5px; font-weight: 700;">
														Blessing Name</label>
														 <input type="hidden" class="form-control" name="blessing_id" value="<?php echo $blessing_id; ?>"> 
														<input type="text" value="<?php echo $blessing_name; ?>" name="blessing_name" class="form-control" required>
													</div>

													<div class="form-group col-md-9">
													<label style="font-size: 16.5px; font-weight: 700;">Blessing Type</label>
														<div class="pos-relative">
															<input type="hidden" class="form-control" name="blessing_id" value="<?php echo $blessing_id; ?>">
															<select name="blessing_type" class="form-control select select2" required>
																	<option value="<?php echo $type; ?>"><?php echo $type; ?></option>
																	<option value="Cash">Cash</option>
																	<option value="Kind">Kind</option>
															</select>
														</div>
													</div>

													<div class="form-group col-md-9">
														<label style="font-size: 16.5px; font-weight: 700;">
														 Amount / Item(s) (If "Cash", enter amount and vice versa)
														</label>
														<input type="hidden" class="form-control" name="blessing_id" value="<?php echo $blessing_id; ?>">
														<input type="text" value="<?php echo $amount; ?>" name="amount" class="form-control" required>
													</div>


													<div class="form-group col-md-9">
														<label style="font-size: 16.5px; font-weight: 700;">
														 Recipient Name
														</label>
														<input type="hidden" class="form-control" name="blessing_id" value="<?php echo $blessing_id; ?>">
														<input type="text" value="<?php echo $recipient; ?>" name="recipient" class="form-control" required>
													</div>

													<div class="form-group col-md-9">
														<label style="font-size: 16.5px; font-weight: 700;">
														 Recipient Location
														</label>
														<input type="hidden" class="form-control" name="blessing_id" value="<?php echo $blessing_id; ?>">
														<input type="text" value="<?php echo $location; ?>" name="location" class="form-control" required>
													</div>

													
													<div class="form-group col-md-9">
													 <label style="font-size: 16.5px; font-weight: 700;"> Date Delivered </label>
														<div class="pos-relative">
														<input type="date" name="blessing_date" value="<?php echo $date; ?>" class="form-control" required="">
														</div>
													</div>

													<div class="form-group col-md-9">
													 <label style="font-size: 16.5px; font-weight: 700;">Description</label>
														<div class="pos-relative">
												    	<textarea id="summernote" class="form-control" name="blessing_desc">
												    		<?php echo $blessing_desc; ?>
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
			<div class="modal" id="delete<?php echo $blessing_id;?>">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content modal-content-demo">
						<div class="modal-header">
							<h6 class="modal-title">Delete Out-blessing Details</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
						</div>
						<div class="modal-body">
							<form action="blessing-del.php" method="post">
								 <input type="hidden" class="form-control" name="blessing_id" value="<?php echo $blessing_id; ?>" required> 
                      
                                  <p>Are you sure you want to <b>Delete</b> this Out-blessing?</p>
							
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