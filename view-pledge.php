<?php include("includes/header.php"); ?>


			<div class="main-content side-content pt-0">
				<div class="container-fluid">
					<div class="inner-body">
						<!-- Page Header -->
						<div class="page-header">
							<div>
								<h2 class="main-content-title tx-24 mg-b-5">Pledges</h2>
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">View Pledges</li>
								</ol>
							</div>
						</div>
						<!-- End Page Header -->

						
						<!-- Member Row -->
						<div class="row row-sm">
							<div class="col-md-12">
								<div class="card custom-card">
									<div class="card-header p-3 tx-medium my-auto tx-white bg-primary">
									  Pledges
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
												                  <th>Phone Number</th>
												                  <th>Start Date</th>
												                  <th>End Date</th>
												                  <th>Amount</th>
												                  <th>Pledge Status</th>                             
												                  <th>Action</th>
																</tr>
															</thead>
															<tbody>
													 <?php

							                    $i = 0;
							                    $sql = "SELECT * FROM pledges_tbl";
							                    $query = mysqli_query($db, $sql) or die(mysqli_error($db));
							                    
							                    while($row = mysqli_fetch_array($query))
							                    { 
							                        $pledge_id   = $row['pledge_id'];
							                        $member_name = $row['member_name'];
							                        $phone       = $row['phone_number'];
							                        $address     = $row['address'];
							                        $start_date  = $row['start_date'];
							                        $end_date    = $row['end_date'];
							                        $amount      = $row['pledge_amt'];
							                        $desc        = $row['pledge_desc'];
							                        $status      = $row['pledge_status'];

							                        $i++;

							                  ?>
							                    <tr>
							                      <td><?php echo $i; ?></td>
							                      <td><?php echo $member_name;  ?></td>
							                      <td><?php echo $phone;  ?></td>
							                      <td><?php echo date("M d, Y",strtotime($start_date)); ?></td>
							                      <td><?php echo date("M d, Y",strtotime($end_date));   ?></td>
							                      <td><?php echo $amount;    ?></td>
							                       <td>
							                        <?php 
							                            
							                            if($status == 'Not Fulfilled')
							                            {
							                                echo "<span class='badge badge-danger'> Not Fulfilled </span>";
							                            }
							                            elseif($status == 'Fulfilled')
							                            {
							                                echo "<span class='badge badge-success'> Fulfilled </span>"; 
							                            }
							                            else
							                            {
							                            	echo "<span class='badge badge-warning'> Partially Fulfilled </span>";	
							                            }

							                        ?>
							                      </td>
                      
						<td>
		            
		            <a style="background: #6259CA; border: 1px solid #6259CA" class="btn ripple btn-info" data-target="#update<?php echo $pledge_id;?>" data-toggle="modal" href="#update<?php echo $pledge_id;?>"> <i  class="fa fa-eye"></i>
	                </a>
	               
	               <a style="background: red; border: 1px solid red" class="btn ripple btn-info" data-target="#delete<?php echo $pledge_id;?>" data-toggle="modal" href="#delete<?php echo $pledge_id;?>"> <i class="fa fa-trash fa-danger"></i>
	               </a>
			      </td>


			<!-- Large Modal -->
			<div class="modal" id="update<?php echo $pledge_id;?>">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content modal-content-demo">
						<div class="modal-header">
							<h6 class="modal-title"> Update Pledge Details </h6>
							<button aria-label="Close" class="close" data-dismiss="modal" type="button">
							<span aria-hidden="true">&times;</span>
						    </button>
						</div>
						<div class="modal-body">
						
						<form action="pledge-update.php" method="post" enctype="multipart/form-data">
												<div class="">
													<div class="form-group col-md-9">
														<label style="font-size: 16.5px; font-weight: 700;">
														Member Name</label>
														 <input type="hidden" class="form-control" name="pledge_id" value="<?php echo $pledge_id; ?>"> 
														<input type="text" value="<?php echo $member_name; ?>" name="member_name" class="form-control" required>
													</div>

													<div class="form-group col-md-9">
														<label style="font-size: 16.5px; font-weight: 700;">
														Pledge Amount / Item(s)
														</label>
														 <input type="hidden" class="form-control" name="pledge_id" value="<?php echo $pledge_id; ?>"> 
														<input type="text" value="<?php echo $amount; ?>" name="pledge_amount" class="form-control" required>
													</div>


													<div class="form-group col-md-9">
														<label style="font-size: 16.5px; font-weight: 700;">
														Phone Number
														</label>
														 <input type="hidden" class="form-control" name="pledge_id" value="<?php echo $pledge_id; ?>"> 
														<input type="text" value="<?php echo $phone; ?>" name="phone_number" class="form-control" required>
													</div>


													<div class="form-group col-md-9">
														<label style="font-size: 16.5px; font-weight: 700;">
														 Location
														</label>
														 <input type="hidden" class="form-control" name="pledge_id" value="<?php echo $pledge_id; ?>"> 
														<input type="text" value="<?php echo $address; ?>" name="location" class="form-control" required>
													</div>


													<div class="form-group col-md-9">
														<div class="row row-sm">
															<div class="col-sm-6">
																<label style="font-size: 16.5px; font-weight: 700;">Start Date</label>
																 <input type="hidden" class="form-control" name="pledge_id" value="<?php echo $pledge_id; ?>"> 
																  <input type="date" name="start_date" value="<?php echo $start_date; ?>" class="form-control" required="" >
															</div>

															<div class="col-sm-6 mg-t-20 mg-sm-t-0">
																<label style="font-size: 16.5px; font-weight: 700;">End Date</label>
																<input type="hidden" class="form-control" name="pledge_id" value="<?php echo $pledge_id; ?>"> 
																 <input type="date" name="end_date" value="<?php echo $end_date; ?>" class="form-control" required="">
															</div>

														</div>
													</div>



													<div class="form-group col-md-9">
														<label style="font-size: 16.5px; font-weight: 700;">Description</label>
														<div class="pos-relative">
															 <input type="hidden" class="form-control" name="pledge_id" value="<?php echo $pledge_id; ?>"> 
															<textarea class="form-control" id="summernote" name="pledge_desc">
																<?php echo $desc; ?>
															</textarea>
														</div>
													</div>

												
													<div class="form-group col-md-9">
													<label style="font-size: 16.5px; font-weight: 700;">Pledge Status</label>
														<div class="pos-relative">
													     <input type="hidden" class="form-control" name="pledge_id" value="<?php echo $pledge_id; ?>"> 
														<select name="pledge_status" class="form-control select select2">
														<option value="<?php echo $status; ?>"><?php echo $status; ?></option>
														<option value="Fulfilled">Fulfilled</option>
														<option value="Partially Fulfilled">Partially Fulfilled</option>
														<option value="Not Fulfilled">Not Fulfilled</option>
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
			<div class="modal" id="delete<?php echo $pledge_id;?>">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content modal-content-demo">
						<div class="modal-header">
							<h6 class="modal-title">Delete Pledge Details</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
						</div>
						<div class="modal-body">
							<form action="pledge-del.php" method="post">
								 <input type="hidden" class="form-control" name="pledge_id" value="<?php echo $pledge_id; ?>" required> 
                      
                                  <p>Are you sure you want to <b>Delete</b> this Pledge?</p>
							
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