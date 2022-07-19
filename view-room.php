<?php include("includes/header.php"); ?>


			<div class="main-content side-content pt-0">
				<div class="container-fluid">
					<div class="inner-body">
						<!-- Page Header -->
						<div class="page-header">
							<div>
								<h2 class="main-content-title tx-24 mg-b-5"> Rooms </h2>
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">View Rooms</li>
								</ol>
							</div>
						</div>
						<!-- End Page Header -->

						
						<!-- Member Row -->
						<div class="row row-sm">
							<div class="col-md-12">
								<div class="card custom-card">
									<div class="card-header p-3 tx-medium my-auto tx-white bg-primary">
									 Rooms
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
                  											  <th>Room Name</th>
											                  <th>Capacity</th>
											                  <th>Room Status</th>
											                  <th>Check-In Date</th>
											                  <th>Check-Out Date</th>                
											                  <th>Action</th>
											                </tr>
											                </thead>
											                <tbody>
											                  <?php

											                    $i = 0;
											                    $sql = "SELECT * FROM room_tbl";
											                    $query = mysqli_query($db, $sql) or die(mysqli_error($db));
											                    
											                    while($row = mysqli_fetch_array($query))
											                    {
											                        $room_id       = $row['room_id'];
											                        $room_name     = $row['room_title'];
											                        $room_capacity = $row['room_capacity'];
											                        $room_status   = $row['room_status'];
											                        $chk_in_date   = $row['checkin_date'];
											                        $chk_out_date  = $row['checkout_date'];

											                        $i++;

											                  ?>
											                    <tr>
											                      <td><?php echo $i;  ?></td>
											                      <td><?php echo $room_name;  ?></td>
											                      <td><?php echo $room_capacity; ?></td>              
											                       <td>
											                        <?php 

											                        if($room_status == 'Checked-In')
											                        {
											                          echo "<div class='badge badge-danger'>Checked-In</div>";
											                        }
											                        else 
											                        {
											                           echo "<div class='badge badge-success'>Checked-Out</div>";
											                        }
											                      
											                      ?>
											                      </td>
											                      <td><?php echo date("M d, Y",strtotime($chk_in_date)); ?></td>    
											                      <td><?php echo date("M d, Y",strtotime($chk_out_date)); ?></td>
							                      
																	<td>
													            
													            <a style="background: #6259CA; border: 1px solid #6259CA" class="btn ripple btn-info" data-target="#update<?php echo $room_id;?>" data-toggle="modal" href="#update<?php echo $room_id;?>"> <i  class="fa fa-eye"></i>
												                </a>
												               
												               <a style="background: red; border: 1px solid red" class="btn ripple btn-info" data-target="#delete<?php echo $room_id;?>" data-toggle="modal" href="#delete<?php echo $room_id;?>"> <i class="fa fa-trash fa-danger"></i>
												               </a>
														      </td>


			<!-- Large Modal -->
			<div class="modal" id="update<?php echo $room_id;?>">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content modal-content-demo">
						<div class="modal-header">
							<h6 class="modal-title"> Update Room Details </h6>
							<button aria-label="Close" class="close" data-dismiss="modal" type="button">
							<span aria-hidden="true">&times;</span>
						    </button>
						</div>
						<div class="modal-body">
						
						<form action="room-update.php" method="post" enctype="multipart/form-data">
												<div class="">
													<div class="form-group col-md-9">
														<label style="font-size: 16.5px; font-weight: 700;">
														Room Name</label>
														 <input type="hidden" class="form-control" name="room_id" value="<?php echo $room_id; ?>"> 
														<input type="text" value="<?php echo $room_name; ?>" name="room_name" class="form-control" required>
													</div>

													<div class="form-group col-md-9">
														<label style="font-size: 16.5px; font-weight: 700;">
														 Capacity
														</label>
														 <input type="hidden" class="form-control" name="room_id" value="<?php echo $room_id; ?>"> 
														<input type="text" value="<?php echo $room_capacity; ?>" name="room_capacity" class="form-control" required>
													</div>

													<div class="form-group col-md-9">
													<label style="font-size: 16.5px; font-weight: 700;">Room Status</label>
														<div class="pos-relative">
															<select name="room_status" class="form-control select select2">
																	<option value="<?php echo $room_status; ?>"><?php echo $room_status; ?></option>
																	<option value="Checked-In">Checked-In</option>
																	<option value="Checked-Out">Checked-Out</option>
																</select>
														</div>
													</div>
													

													<div class="form-group col-md-9">
													 <label style="font-size: 16.5px; font-weight: 700;">Check-In Date </label>
														<div class="pos-relative">
														<input type="date" name="check_in_date" value="<?php echo $chk_in_date; ?>" class="form-control" required="" >
														</div>
													</div>

													<div class="form-group col-md-9">
													 <label style="font-size: 16.5px; font-weight: 700;">Check-Out Date</label>
														<div class="pos-relative">
												     <input type="date" class="form-control" value="<?php echo $chk_out_date; ?>" name="check_out_date" required>
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
			<div class="modal" id="delete<?php echo $room_id;?>">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content modal-content-demo">
						<div class="modal-header">
							<h6 class="modal-title">Delete Church Gift Details</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
						</div>
						<div class="modal-body">
							<form action="room-del.php" method="post">
								 <input type="hidden" class="form-control" name="room_id" value="<?php echo $room_id; ?>" required> 
                      
                                  <p>Are you sure you want to <b>Delete</b> this Room?</p>
							
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