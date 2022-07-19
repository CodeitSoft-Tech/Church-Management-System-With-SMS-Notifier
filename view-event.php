<?php include("includes/header.php"); ?>


			<div class="main-content side-content pt-0">
				<div class="container-fluid">
					<div class="inner-body">
						<!-- Page Header -->
						<div class="page-header">
							<div>
								<h2 class="main-content-title tx-24 mg-b-5">Events</h2>
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">View Events</li>
								</ol>
							</div>
						</div>
						<!-- End Page Header -->

						
						<!-- Member Row -->
						<div class="row row-sm">
							<div class="col-md-12">
								<div class="card custom-card">
									<div class="card-header p-3 tx-medium my-auto tx-white bg-primary">
									  Events
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
												     <th>Event Banner</th>
												     <th>Event Name</th>
												     <th>Date</th>
												     <th>Approval Status</th>       
												     <th>Action</th>
																</tr>
															</thead>
															<tbody>
									           <?php

				                    $i = 0;

				                    $sql = "SELECT * FROM events_tbl";
				                    $query = mysqli_query($db, $sql) or die(mysqli_error($db));
				                    
				                    while($row = mysqli_fetch_array($query))
				                    {
				                        $event_id     = $row['event_id'];
				                        $event_name   = $row['event_name'];
				                        $event_banner = $row['event_banner'];
				                        $event_loc    = $row['event_location'];
				                        $approval_status = $row['approval_status'];
				                        $event_status = $row['event_status'];
				                        $start_date   = $row['start_date'];
				                        $end_date     = $row['end_date'];
				                        $event_org    = $row['organized_by'];
				                        $event_desc   = $row['event_desc'];

				                        $i++;

				                  ?>
				                    <tr>
				                      <td><?php echo $event_id;  ?></td>
				                      <td>
				                        <img src="church-images/events/<?php echo $event_banner;?>" alt="<?php echo $event_name; ?>" width="200" height="100">
				                      </td>
				                      <td><?php echo $event_name; ?></td>
				                      <td><b><?php echo date("M d, Y",strtotime($start_date)); ?> - <?php echo date("M d, Y",strtotime($end_date)); ?></b></td>
				                      <td>
				                        <?php 
				                            
				                            if($approval_status == 'Pending')
				                            {
				                                echo "<span class='badge badge-danger'> Pending </span>";
				                            }
				                            else
				                            {
				                                echo "<span class='badge badge-success'> Approved </span>"; 
				                            }


				                        ?>
				                      </td>
                      
					<td>
		            
		            <a style="background: #6259CA; border: 1px solid #6259CA" class="btn ripple btn-info" data-target="#update<?php echo $event_id;?>" data-toggle="modal" href="#update<?php echo $event_id;?>"> <i  class="fa fa-eye"></i>
	                </a>
	               
	               <a style="background: red; border: 1px solid red" class="btn ripple btn-info" data-target="#delete<?php echo $event_id;?>" data-toggle="modal" href="#delete<?php echo $event_id;?>"> <i class="fa fa-trash fa-danger"></i>
	               </a>
			      </td>	


			<!-- Large Modal -->
			<div class="modal" id="update<?php echo $event_id;?>">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content modal-content-demo">
						<div class="modal-header">
							<h6 class="modal-title"> Update Event Details </h6>
							<button aria-label="Close" class="close" data-dismiss="modal" type="button">
							<span aria-hidden="true">&times;</span>
						    </button>
						</div>
						<div class="modal-body">
						
						<form action="event-update.php" method="post" enctype="multipart/form-data">
												<div class="">
													<div class="form-group col-md-9">
														<label style="font-size: 16.5px; font-weight: 700;">
														Event Name</label>
														 <input type="hidden" class="form-control" name="event_id" value="<?php echo $event_id; ?>"> 
														<input type="text" value="<?php echo $event_name; ?>" name="event_name" class="form-control" required="">
													</div>


													<div class="form-group col-md-9">
														<div class="row row-sm">
															<div class="col-sm-6">
																<label style="font-size: 16.5px; font-weight: 700;">Start Date</label>
																 <input type="hidden" class="form-control" name="event_id" value="<?php echo $event_id; ?>"> 
																  <input type="date" name="start_date" value="<?php echo $start_date; ?>" class="form-control" required="" >
															</div>

															<div class="col-sm-6 mg-t-20 mg-sm-t-0">
																<label style="font-size: 16.5px; font-weight: 700;">End Date</label>
																<input type="hidden" class="form-control" name="event_id" value="<?php echo $event_id; ?>"> 
																 <input type="date" name="end_date" value="<?php echo $end_date; ?>" class="form-control" required="">
															</div>

														</div>
													</div>



													<div class="form-group col-md-9">
														<div class="row row-sm">
															
															<div class="col-sm-6">
																<label style="font-size: 16.5px; font-weight: 700;">Location</label>
																 <input type="hidden" class="form-control" name="event_id" value="<?php echo $event_id; ?>"> 
																<input type="text" value="<?php echo $event_loc; ?>" name="event_loc" class="form-control" required="" >
															</div>

															<div class="col-sm-6 mg-t-20 mg-sm-t-0">
																<label style="font-size: 16.5px; font-weight: 700;">Event Organizer</label>
																 <input type="hidden" class="form-control" name="event_id" value="<?php echo $event_id; ?>"> 
																<input type="text" value="<?php echo $event_org; ?>" name="event_org" class="form-control" required="">
															</div>

														</div>
													</div>

													<div class="form-group col-md-9">
														<label style="font-size: 16.5px; font-weight: 700;">Description</label>
														<div class="pos-relative">
															 <input type="hidden" class="form-control" name="event_id" value="<?php echo $event_id; ?>"> 
															<textarea class="form-control" id="summernote" name="event_desc">
																<?php echo $event_desc; ?>
															</textarea>
														</div>
													</div>

												
													<div class="form-group col-md-9">
													<label style="font-size: 16.5px; font-weight: 700;">Approval Status</label>
														<div class="pos-relative">
													     <input type="hidden" class="form-control" name="event_id" value="<?php echo $event_id; ?>"> 
														<select name="approval_status" class="form-control select select2">
														<option value="<?php echo $approval_status; ?>"><?php echo $approval_status; ?></option>
														<option value="Approved">Approved</option>
														<option value="Pending">Pending</option>
														</select>
														</div>
													</div>


													<div class="form-group col-md-9">
													<label style="font-size: 16.5px; font-weight: 700;">Event Status</label>
														<div class="pos-relative">
															 <input type="hidden" class="form-control" name="event_id" value="<?php echo $event_id; ?>"> 
															<select name="event_status" class="form-control select select2">
																	<option value="<?php echo $event_status; ?>"><?php echo $event_status; ?></option>
																	<option value="Upcoming">Upcoming</option>
																	<option value="Ongoing">Ongoing</option>
																	<option value="Ended">Ended</option>
																</select>
														</div>
													</div>

													<div class="form-group col-md-9">
														<label style="font-size: 16.5px; font-weight: 700;">Event Banner (upload Image to update)</label>
														<div class="pos-relative">
														 <input type="hidden" class="form-control" name="event_id" value="<?php echo $event_id; ?>"> 
												         <input type="file" class="form-control" name="event_banner"> <br>
												          <img src="church-images/events/<?php echo $event_banner; ?>" alt="<?php echo $event_name; ?>" width="100" height="100">
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
			<div class="modal" id="delete<?php echo $event_id;?>">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content modal-content-demo">
						<div class="modal-header">
							<h6 class="modal-title">Delete Event Details</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
						</div>
						<div class="modal-body">
							<form action="event-del.php" method="post">
								 <input type="hidden" class="form-control" name="event_id" value="<?php echo $event_id; ?>" required> 
                      
       <p>Are you sure you want to <b>Delete</b> this Event?</p>
							
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