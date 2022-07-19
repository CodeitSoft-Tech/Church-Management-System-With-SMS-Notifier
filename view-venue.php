<?php include("includes/header.php"); ?>


			<div class="main-content side-content pt-0">
				<div class="container-fluid">
					<div class="inner-body">
						<!-- Page Header -->
						<div class="page-header">
							<div>
								<h2 class="main-content-title tx-24 mg-b-5">Venues</h2>
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">View Venues</li>
								</ol>
							</div>
						</div>
						<!-- End Page Header -->

						
						<!-- Member Row -->
						<div class="row row-sm">
							<div class="col-md-12">
								<div class="card custom-card">
									<div class="card-header p-3 tx-medium my-auto tx-white bg-primary">
									 Venues
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
																<th>No</th>
                  <th>Venue Name</th>
                  <th>Capacity</th>
                  <th>Location</th>
                  <th>Venue Status</th>              
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php

                    $i = 0;
                    $sql = "SELECT * FROM venue_tbl";
                    $query = mysqli_query($db, $sql) or die(mysqli_error($db));
                    
                    while($row = mysqli_fetch_array($query))
                    {   
                          $venue_id       = $row['venue_id'];
                          $venue_name     = $row['venue_name'];
                          $venue_capacity = $row['venue_capacity'];
                          $venue_location = $row['venue_location'];
                          $venue_status   = $row['venue_status'];

                          $i++;

                  ?>
                    <tr>
                      <td><?php echo $i; ?></td>
                      <td><?php echo $venue_name;  ?></td>
                      <td><?php echo $venue_capacity;  ?></td> 
                      <td><?php echo $venue_location;  ?></td>
                      <td>
                        <?php 

                            if($venue_status == 'Requested')
                            {
                              echo "<span class='badge badge-danger'>Requested</span>";
                            } 
                            else
                            {
                              echo "<span class='badge badge-success'>Available</span>";
                            }

                        ?>
                        
                      </td>      
							                      
						<td>
		            
		            <a style="background: #6259CA; border: 1px solid #6259CA" class="btn ripple btn-info" data-target="#update<?php echo $venue_id;?>" data-toggle="modal" href="#update<?php echo $venue_id;?>"> <i  class="fa fa-eye"></i>
	                </a>
	               
	               <a style="background: red; border: 1px solid red" class="btn ripple btn-info" data-target="#delete<?php echo $venue_id;?>" data-toggle="modal" href="#delete<?php echo $venue_id;?>"> <i class="fa fa-trash fa-danger"></i>
	               </a>
			      </td>


			<!-- Large Modal -->
			<div class="modal" id="update<?php echo $venue_id;?>">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content modal-content-demo">
						<div class="modal-header">
							<h6 class="modal-title"> Update Venue Details </h6>
							<button aria-label="Close" class="close" data-dismiss="modal" type="button">
							<span aria-hidden="true">&times;</span>
						    </button>
						</div>
						<div class="modal-body">
						
						<form action="venue-update.php" method="post" enctype="multipart/form-data">
												<div class="">
													<div class="form-group col-md-9">
														<label style="font-size: 16.5px; font-weight: 700;">
														Venue Name</label>
														 <input type="hidden" class="form-control" name="gift_id" value="<?php echo $gift_id; ?>"> 
														<input type="text" value="<?php echo $venue_name; ?>" name="venue_name" class="form-control" required>
													</div>

													<div class="form-group col-md-9">
														<label style="font-size: 16.5px; font-weight: 700;">
														 Capacity
														</label>
														 <input type="hidden" class="form-control" name="venue_id" value="<?php echo $venue_id; ?>"> 
														<input type="text" value="<?php echo $venue_capacity; ?>" name="venue_capacity" class="form-control" required>
													</div>

													<div class="form-group col-md-9">
														<label style="font-size: 16.5px; font-weight: 700;">
														 Location
														</label>
														 <input type="hidden" class="form-control" name="venue_id" value="<?php echo $venue_id; ?>"> 
														<input type="text" value="<?php echo $venue_location; ?>" name="venue_location" class="form-control" required>
													</div>

													<div class="form-group col-md-9">
													<label style="font-size: 16.5px; font-weight: 700;">Venue Status</label>
														<div class="pos-relative">
															<select name="venue_status" class="form-control select select2" required>
																	<option value="<?php echo $venue_status; ?>"><?php echo $venue_status; ?></option>
																	<option value="Requested">Requested</option>
																	<option value="Available">Available</option>
																</select>
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
			<div class="modal" id="delete<?php echo $venue_id;?>">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content modal-content-demo">
						<div class="modal-header">
							<h6 class="modal-title">Delete Venue Details</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
						</div>
						<div class="modal-body">
							<form action="venue-del.php" method="post">
								 <input type="hidden" class="form-control" name="venue_id" value="<?php echo $venue_id; ?>" required> 
                      
                                  <p>Are you sure you want to <b>Delete</b> this Venue?</p>
							
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