<?php include("includes/header.php"); ?>


<div class="main-content side-content pt-0">
	<div class="container-fluid">
		<div class="inner-body">
			<!-- Page Header -->
			<div class="page-header">
				<div>
					<h2 class="main-content-title tx-24 mg-b-5">Members</h2>
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="index.php">Home</a></li>
						<li class="breadcrumb-item active" aria-current="page">View Members</li>
					</ol>
				</div>
			</div>
			<!-- End Page Header -->

						
	<!-- Member Row -->
	<div class="row row-sm">
	<div class="col-md-12">
		<div class="card custom-card">
			<div class="card-header p-3 tx-medium my-auto tx-white bg-primary">
			    View Members 
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
			      <th>Photo</th>
			      <th>Member Name</th>
			      <th>Ministry Name</th>
			      <th>Group Name</th>
			      <th>Location</th>
			      <th>Phone Number</th>
			      <th class="no-print">Action</th>
				</tr>
			 </thead>
			 <tbody>
									            <?php

							                    $i = 0;
							                    $sql = "SELECT * FROM members_tbl";
							                    $query = mysqli_query($db, $sql) or die(mysqli_error($db));

							                        while($row = mysqli_fetch_array($query))
							                        {

							                          $member_id      = $row['member_id'];
							                          $min_id         = $row['ministry_id'];
							                          $grp_id         = $row['group_id'];
							                          $member_name    = $row['member_name'];
							                          $phone          = $row['member_phone'];
							                          $volunteer      = $row['volunteer'];
							                          $location       = $row['location'];
							                          $email          = $row['member_email'];
							                          $dob            = $row['dob'];
							                          $m_status       = $row['marital_status'];
							                          $gender         = $row['member_gender'];
							                          $m_img          = $row['member_photo'];
							                          $date_added     = $row['date_added'];
							                         
							                          // Get Group
							                          $select_grp    = "SELECT * FROM group_tbl WHERE group_id = '$grp_id'";
							                          $run_grp       = mysqli_query($db, $select_grp);
							                          $row           = mysqli_fetch_array($run_grp);
							                          $grp_name      = $row['group_name'];

							                           // Get Ministry 
							                          $select_min    = "SELECT * FROM ministry_tbl WHERE ministry_id = '$min_id'";
							                          $run_min       = mysqli_query($db, $select_min);
							                          $row_min       = mysqli_fetch_array($run_min);
							                          $min_name      = $row_min['ministry_name']; 
							 

							                          $i++;
							                        

							                      ?>
							                    <tr>
							                      <td><?php echo $i;  ?></td>
							                       <td>
							                        <img src="church-images/members/<?php echo $m_img; ?>" alt="<?php echo $member_name; ?>" width="120" height="75">
							                      </td>
							                      <td><?php echo $member_name;  ?></td>
							                      <td><?php echo $min_name;  ?></td>     
							                      <td><?php echo $grp_name;  ?></td> 
							                      <td><?php echo $location;  ?></td>      
							                      <td><?php echo $phone; ?>  </td> 
							                      <td>
							                      	<a style="background: #6259CA; border: 1px solid #6259CA" class="btn ripple btn-info" data-target="#update<?php echo $member_id;?>" data-toggle="modal" href="#update<?php echo $member_id;?>"> <i  class="fa fa-eye"></i>
										           </a>
										           <a style="background: red; border: 1px solid red" class="btn ripple btn-info" data-target="#delete<?php echo $member_id;?>" data-toggle="modal" href="#delete<?php echo $member_id;?>"> <i class="fa fa-trash fa-danger"></i>
										           </a>
							                      </td>	


			<!-- Large Modal -->
			<div class="modal" id="update<?php echo $member_id;?>">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content modal-content-demo">
						<div class="modal-header">
							<h6 class="modal-title"> Update Member Details </h6>
							<button aria-label="Close" class="close" data-dismiss="modal" type="button">
							<span aria-hidden="true">&times;</span>
						    </button>
						</div>
						<div class="modal-body">
						
						<form action="member-update.php" method="post" enctype="multipart/form-data">
												<div class="">
													<div class="form-group col-md-9">
														<label style="font-size: 16.5px; font-weight: 700;">
														Full Name</label>
														 <input type="hidden" class="form-control" name="member_id" value="<?php echo $member_id; ?>"> 
														<input type="text" value="<?php echo $member_name; ?>" name="member_name" class="form-control" required="" >
													</div>


													<div class="form-group col-md-9">
														<div class="row row-sm">
															<div class="col-sm-6">
																<label style="font-size: 16.5px; font-weight: 700;">Ministry</label>
																 <input type="hidden" class="form-control" name="member_id" value="<?php echo $member_id; ?>"> 
																<select name="ministry_name" class="form-control select select2">
																	<option value="<?php echo $min_id; ?>"><?php echo $min_name; ?></option>
																<?php
																		$get_min = "SELECT * FROM ministry_tbl";
																		$run_min = mysqli_query($db, $get_min);

																		while($row_min = mysqli_fetch_array($run_min))
																		{

																			$min_id    = $row_min['ministry_id'];
																			$min_name  = $row_min['ministry_name'];

																			echo " <option value='$min_id'>$min_name</option> ";
																		}

																	?>
																	
																</select>
															</div>

															<div class="col-sm-6 mg-t-20 mg-sm-t-0">
																<label style="font-size: 16.5px; font-weight: 700;">Department</label>
																<input type="hidden" class="form-control" name="member_id" value="<?php echo $member_id; ?>"> 
																<select name="group_name" class="form-control select select2">
																 <option value="<?php echo $grp_id; ?>"><?php echo $grp_name; ?></option>
																<?php

																	$get_group = "SELECT * FROM group_tbl";
																	$run_group = mysqli_query($db, $get_group);

																	while($row_grp = mysqli_fetch_array($run_group))
																	{
																		
																		$grp_id    = $row_grp['group_id'];
																		$grp_name  = $row_grp['group_name'];

																		echo " <option value='$grp_id'>$grp_name</option> ";
																	}

																?>
																</select>
															</div>

														</div>
													</div>



													<div class="form-group col-md-9">
														<div class="row row-sm">
															
															<div class="col-sm-6">
																<label style="font-size: 16.5px; font-weight: 700;">Phone Number</label>
														<input type="hidden" class="form-control" name="member_id" value="<?php echo $member_id; ?>"> 
																<input type="text" value="<?php echo $phone; ?>" name="phone" class="form-control" required="" >
															</div>

															<div class="col-sm-6 mg-t-20 mg-sm-t-0">
																<label style="font-size: 16.5px; font-weight: 700;">Email</label>
														<input type="hidden" class="form-control" name="member_id" value="<?php echo $member_id; ?>"> 
												    <input type="email" value="<?php echo $email; ?>" name="email" class="form-control" required="">
															</div>

														</div>
													</div>

													<div class="form-group col-md-9">
														<label style="font-size: 16.5px; font-weight: 700;">Volunteer</label>
														<div class="pos-relative">
														<input type="hidden" class="form-control" name="member_id" value="<?php echo $member_id; ?>"> 
															<select name="volunteer" class="form-control select select2">
																	<option value="<?php echo $volunteer; ?>"><?php echo $volunteer; ?></option>
																	<option value="Yes">Yes</option>
																	<option value="No">No</option>
																</select>
														</div>
													</div>

													<div class="form-group col-md-9">
														<label style="font-size: 16.5px; font-weight: 700;">Location</label>
														<div class="pos-relative">
														<input type="hidden" class="form-control" name="member_id" value="<?php echo $member_id; ?>"> 
															<input type="text" value="<?php echo $location; ?>" name="location" class="form-control" required="">
														</div>
													</div>

													<div class="form-group col-md-9">
														<label style="font-size: 16.5px; font-weight: 700;">Date of Birth</label>
														<div class="pos-relative">
														<input type="hidden" class="form-control" name="member_id" value="<?php echo $member_id; ?>"> 
															<input type="date" name="dob" value="<?php echo $dob; ?>" class="form-control" required="">
														</div>
													</div>

													<div class="form-group col-md-9">
														<label style="font-size: 16.5px; font-weight: 700;">Gender</label>
														<div class="pos-relative">
														<input type="hidden" class="form-control" name="member_id" value="<?php echo $member_id; ?>"> 
															<select name="gender" class="form-control select select2">
																	<option value="<?php echo $gender; ?>"><?php echo $gender; ?></option>
																	<option value="Male">Male</option>
																	<option value="Female">Female</option>
																</select>
														</div>
													</div>


													<div class="form-group col-md-9">
													<label style="font-size: 16.5px; font-weight: 700;">Marital Status</label>
														<div class="pos-relative">
														<input type="hidden" class="form-control" name="member_id" value="<?php echo $member_id; ?>"> 
															<select name="marital_status" class="form-control select select2">
																	<option value="<?php echo $m_status; ?>"><?php echo $m_status; ?></option>
																	<option value="Male">Married</option>
																	<option value="Female">Single</option>
																</select>
														</div>
													</div>

													<div class="form-group col-md-9">
														<label style="font-size: 16.5px; font-weight: 700;">Member Image (upload Image to update)</label>
														<div class="pos-relative">
														 <input type="hidden" class="form-control" name="member_id" value="<?php echo $member_id; ?>">
												    <input type="file" class="form-control" name="member_img">
												    <img src="church-images/members/<?php echo $m_img; ?>" alt="<?php echo $member_name; ?>" width="100" height="100">
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
			<div class="modal" id="delete<?php echo $member_id;?>">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content modal-content-demo">
						<div class="modal-header">
							<h6 class="modal-title">Delete Member Details</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
						</div>
						<div class="modal-body">
							<form action="member-del.php" method="post">
								 <input type="hidden" class="form-control" name="member_id" value="<?php echo $member_id; ?>" required> 
                      
         <p>Are you sure you want to <b>Delete</b> this Member?</p>
							
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