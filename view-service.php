<?php include("includes/header.php"); ?>


			<div class="main-content side-content pt-0">
				<div class="container-fluid">
					<div class="inner-body">
						<!-- Page Header -->
						<div class="page-header">
							<div>
								<h2 class="main-content-title tx-24 mg-b-5">Services</h2>
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">View Services</li>
								</ol>
							</div>
						</div>
						<!-- End Page Header -->

						
						<!-- Member Row -->
						<div class="row row-sm">
							<div class="col-md-12">
								<div class="card custom-card">
									<div class="card-header p-3 tx-medium my-auto tx-white bg-primary">
									    View Services
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
												      <th>Service Name</th>
												      <th>Service By</th>
												      <th>Service Type</th>
												      <th>Day</th> 
												      <th>Date</th>
												      <th>Time</th>         
												      <th>Action</th>
																</tr>
															</thead>
															<tbody>
									           <?php


                    $i = 0;
                    $sql = "SELECT * FROM service_tbl";
                    $query = mysqli_query($db, $sql) or die(mysqli_error($db));
                    
                    while($row = mysqli_fetch_array($query))
                    {
                        $service_id     = $row['service_id'];
                        $service_name   = $row['service_name'];
                        $service_by     = $row['service_by'];
                        $service_type   = $row['service_type'];
                        $service_day    = $row['service_day'];
                        $service_date   = $row['service_date'];
                        $service_time   = $row['service_time'];
                        $approval_status = $row['approval_status'];
                        $service_status  = $row['service_status'];

                        $i++;
                  ?>
                    <tr>
                      <td><?php echo $i;             ?></td>
                      <td><?php echo $service_name;  ?></td>
                      <td><?php echo $service_by;    ?></td>
                      <td><?php echo $service_type;  ?></td>
                      <td><?php echo $service_day;   ?></td> 
                      <td><?php echo date("M d, Y",strtotime($service_date)); ?></td>             
                      <td><?php echo date("h:i a",strtotime($service_time));  ?></td>
                    
					  <td>
					  <a style="background: #6259CA; border: 1px solid #6259CA" class="btn ripple btn-info" data-target="#update<?php echo $service_id;?>" data-toggle="modal" href="#update<?php echo $service_id;?>"> <i  class="fa fa-eye"></i>
       </a>
       <a style="background: red; border: 1px solid red" class="btn ripple btn-info" data-target="#delete<?php echo $service_id;?>" data-toggle="modal" href="#delete<?php echo $service_id;?>"> <i class="fa fa-trash fa-danger"></i>
      </a>
					</td>	


			<!-- Large Modal -->
			<div class="modal" id="update<?php echo $service_id;?>">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content modal-content-demo">
						<div class="modal-header">
							<h6 class="modal-title"> Update Service Details </h6>
							<button aria-label="Close" class="close" data-dismiss="modal" type="button">
							<span aria-hidden="true">&times;</span>
						    </button>
						</div>
						<div class="modal-body">
						
						<form action="service-update.php" method="post" enctype="multipart/form-data">
												<div class="">
													<div class="form-group col-md-9">
														<label style="font-size: 16.5px; font-weight: 700;">
														Service Name</label>
														 <input type="hidden" class="form-control" name="service_id" value="<?php echo $service_id; ?>"> 
														<input type="text" value="<?php echo $service_name; ?>" name="service_name" class="form-control" required="" >
													</div>


													<div class="form-group col-md-9">
														<label style="font-size: 16.5px; font-weight: 700;">
														Service By</label>
														 <input type="hidden" class="form-control" name="service_id" value="<?php echo $service_id; ?>"> 
														<input type="text" value="<?php echo $service_by; ?>" name="service_by" class="form-control" required="">
													</div>


													<div class="form-group col-md-9">
														<div class="row row-sm">
															<div class="col-sm-6">
																<label style="font-size: 16.5px; font-weight: 700;">Service Day</label>
																 <input type="hidden" class="form-control" name="service_id" value="<?php echo $service_id; ?>"> 
																<select name="service_day" class="form-control select select2" required>
																	<option value="<?php echo $service_day; ?>"><?php echo $service_day; ?></option>
																	  <option value="Monday">Monday</option>
												       <option value="Tuesday">Tuesday</option>
												       <option value="Wednesday">Wednesday</option>
												       <option value="Thursday">Thursday</option>
												       <option value="Friday">Friday</option>
												       <option value="Saturday">Saturday</option>
												       <option value="Sunday">Sunday</option>  				
																</select>
															</div>

															<div class="col-sm-6 mg-t-20 mg-sm-t-0">
																<label style="font-size: 16.5px; font-weight: 700;">Service Type</label>
																<input type="hidden" class="form-control" name="service_id" value="<?php echo $service_id; ?>"> 
																<select name="service_type" class="form-control select select2" required>
																 <option value="<?php echo $service_type; ?>"><?php echo $service_type; ?></option>
																  <option value="Morning">Morning</option>
																  <option value="Afternoon">Afternoon</option>
																  <option value="Evening">Evening</option>
																</select>
															</div>

														</div>
													</div>



													<div class="form-group col-md-9">
														<div class="row row-sm">
															
															<div class="col-sm-6">
																<label style="font-size: 16.5px; font-weight: 700;">Service Date</label>
																 <input type="hidden" class="form-control" name="service_id" value="<?php echo $service_id; ?>"> 
																<input type="date" value="<?php echo $service_date; ?>" name="service_date" class="form-control" required="" >
															</div>

															<div class="col-sm-6 mg-t-20 mg-sm-t-0">
																<label style="font-size: 16.5px; font-weight: 700;">Service Time</label>
																 <input type="hidden" class="form-control" name="service_id" value="<?php echo $service_id; ?>"> 
																<input type="time" value="<?php echo $service_time; ?>" name="service_time" class="form-control" required="">
															</div>

														</div>
													</div>

													<div class="form-group col-md-9">
														<label style="font-size: 16.5px; font-weight: 700;"> Service Approval Status</label>
														<div class="pos-relative">
														<input type="hidden" class="form-control" name="service_id" value="<?php echo $service_id; ?>"> 
														<select name="approval_status" class="form-control select select2" required>
															  <option value="<?php echo $approval_status; ?>"><?php echo $approval_status; ?></option>
																	<option value="Approved">Approved</option>
																	<option value="Pending">Pending</option>
																</select>
														</div>
													</div>


													<div class="form-group col-md-9">
														<label style="font-size: 16.5px; font-weight: 700;"> Service Status</label>
														<div class="pos-relative">
														<input type="hidden" class="form-control" name="service_id" value="<?php echo $service_id; ?>"> 
															<select name="service_status" class="form-control select select2" required>
															  <option value="<?php echo $service_status; ?>"><?php echo $service_status; ?></option>
																	<option value="Upcoming">Upcoming</option>
																	<option value="Ongoing">Ongoing</option>
																	<option value="Completed">Completed</option>
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
			<div class="modal" id="delete<?php echo $service_id;?>">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content modal-content-demo">
						<div class="modal-header">
							<h6 class="modal-title">Delete Service Details</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
						</div>
						<div class="modal-body">
							<form action="service-del.php" method="post">
								 <input type="hidden" class="form-control" name="service_id" value="<?php echo $service_id; ?>" required> 
                      
       <p>Are you sure you want to <b>Delete</b> this Service?</p>
							
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