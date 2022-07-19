<?php 

	include("includes/header.php");
	include("add-church.php");
	
 ?>


			<div class="main-content side-content pt-0">
				<div class="container-fluid">
					<div class="inner-body">
						<!-- Page Header -->
						<div class="page-header">
							<div>
								<h2 class="main-content-title tx-24 mg-b-5"> About Church  </h2>
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Church Details</li>
								</ol>
							</div>
						</div>
						<!-- End Page Header -->

						
						<!-- Member Row -->
						<div class="row row-sm">
							<div class="col-md-12">
								<div class="card custom-card">
									<div class="card-header p-3 tx-medium my-auto tx-white bg-primary">
									   <a href="#add" data-target="#add" data-toggle="modal" >
							            <button style="background: #fff; color: #6259CA; border: 1px solid #6259CA" class="btn btn-success">
							            <i style="color: #6259CA" class="fa fa-plus"></i>
							              Add Church Details
							            </button>
							          </a>
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
																  
												                  <th>Logo</th>
												                  <th>Church Name</th>
												                  <th>Founder</th>
												                  <th>Phone Number</th>
												                  <th>Email</th>
												                  <th>Region</th>
												                  <th>Location</th>     
												                  <th>Action</th>
																</tr>
															</thead>
															<tbody>
											            <?php

								                    

								                    $sql = "SELECT * FROM church_info_tbl";
								                    $query = mysqli_query($db, $sql) or die(mysqli_error($db));
								                    
								                    while($row = mysqli_fetch_array($query))
								                    {
								                        $church_id     = $row['church_id'];
								                        $church_name   = $row['church_name'];
								                        $church_img    = $row['church_img'];
								                        $church_number = $row['church_number'];
								                        $church_email  = $row['church_email'];
								                        $church_loc    = $row['church_location'];
								                        $church_region = $row['church_region'];
								                        $church_founder  = $row['church_founder'];
								                        $church_date     = $row['church_date'];
								                        $church_desc     = $row['church_desc'];
								                       

								                  ?>
								                    <tr>
								                     
								                      <td>
								                        <img src="church-images/church/<?php echo $church_img; ?>" alt="<?php echo $church_name; ?>" width="100" height="100">
								                      </td>
								                      <td><?php echo $church_name; ?></td>
								                      <td><?php echo $church_founder; ?></td>
								                      <td><?php echo $church_number; ?></td>
								                      <td><?php echo $church_email; ?></td>
								                      <td><?php echo $church_region; ?></td>
								                      <td><?php echo $church_loc; ?></td>                   
                     
									                  
							                      <td>
							                      	<a style="background: #6259CA; border: 1px solid #6259CA" class="btn ripple btn-info" data-target="#update<?php echo $church_id;?>" data-toggle="modal" href="#update<?php echo $church_id; ?>"> <i  class="fa fa-eye"></i>
										           </a>
										           <a style="background: red; border: 1px solid red" class="btn ripple btn-info" data-target="#delete<?php echo $church_id;?>" data-toggle="modal" href="#delete<?php echo $church_id; ?>"> <i class="fa fa-trash fa-danger"></i>
										           </a>
							                      </td>	


			<!-- Large Modal -->
			<div class="modal" id="update<?php echo $church_id;?>">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content modal-content-demo">
						<div class="modal-header">
							<h6 class="modal-title"> Update Church Details </h6>
							<button aria-label="Close" class="close" data-dismiss="modal" type="button">
							<span aria-hidden="true">&times;</span>
						    </button>
						</div>
						<div class="modal-body">
						
						               <form action="church-update.php" method="post" enctype="multipart/form-data">
												<div class="">

													<div class="form-group col-md-9">
														<label style="font-size: 16.5px; font-weight: 700;">
														    Church Logo
													    </label>
														 <input type="hidden" class="form-control" name="church_id" value="<?php echo $church_id; ?>"> 
														<input type="file" name="church_img" class="form-control"> <br>
														<img src="church_img/<?php echo $church_img; ?>" alt="<?php echo $church_name; ?>" width="100" height="100">
													</div>

													<div class="form-group col-md-9">
														<label style="font-size: 16.5px; font-weight: 700;">
														    Church Name
													    </label>
														 <input type="hidden" class="form-control" name="church_id" value="<?php echo $church_id; ?>"> 
														<input type="text" name="church_name" value="<?php echo $church_name; ?>"  class="form-control" required> <br>
													</div>

													<div class="form-group col-md-9">
														<label style="font-size: 16.5px; font-weight: 700;">
														    Church Founder
													    </label>
														 <input type="hidden" class="form-control" name="church_id" value="<?php echo $church_id; ?>"> 
														<input type="text" name="church_founder" value="<?php echo $church_founder; ?>" class="form-control" required> <br>
													</div>

													<div class="form-group col-md-9">
														<div class="row row-sm">
															
															<div class="col-sm-6">
																<label style="font-size: 16.5px; font-weight: 700;">Phone Number</label>
																 <input type="hidden" class="form-control" name="church_id" value="<?php echo $church_id; ?>"> 
																<input type="text" value="<?php echo $church_number; ?>" name="church_number" class="form-control" required="" >
															</div>

															<div class="col-sm-6 mg-t-20 mg-sm-t-0">
																<label style="font-size: 16.5px; font-weight: 700;">Email</label>
																 <input type="hidden" class="form-control" name="church_id" value="<?php echo $church_id; ?>"> 
																<input type="email" value="<?php echo $church_email; ?>" name="church_email" class="form-control" required="">
															</div>

														</div>
													</div>


													<div class="form-group col-md-9">
														<div class="row row-sm">
															
															<div class="col-sm-6">
																<label style="font-size: 16.5px; font-weight: 700;">Region</label>
																 <input type="hidden" class="form-control" name="church_id" value="<?php echo $church_id; ?>"> 
																<input type="text" value="<?php echo $church_region; ?>" name="church_region" class="form-control" required="" >
															</div>

															<div class="col-sm-6 mg-t-20 mg-sm-t-0">
																<label style="font-size: 16.5px; font-weight: 700;">Location</label>
																 <input type="hidden" class="form-control" name="church_id" value="<?php echo $church_id; ?>"> 
																<input type="text" value="<?php echo $church_loc; ?>" name="church_loc" class="form-control" required="">
															</div>

														</div>
													</div>

													<div class="form-group col-md-9">
														<label style="font-size: 16.5px; font-weight: 700;">
														   Date Established
													    </label>
														 <input type="hidden" class="form-control" name="church_id" value="<?php echo $church_id; ?>"> 
														<input type="date" value="<?php echo $church_date; ?>" name="church_date" class="form-control" required>
													</div>

													<div class="form-group col-md-9">
														<label style="font-size: 16.5px; font-weight: 700;">
														   Church Description
													    </label>
														 <input type="hidden" class="form-control" name="church_id" value="<?php echo $church_id; ?>"> 
														<textarea class="form-control" id="summernote" name="church_desc">
															<?php echo $church_desc; ?>
														</textarea>
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
			<div class="modal" id="delete<?php echo $church_id;?>">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content modal-content-demo">
						<div class="modal-header">
							<h6 class="modal-title">Delete Church Details</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
						</div>
						<div class="modal-body">
							<form action="church-del.php" method="post">
								 <input type="hidden" class="form-control" name="church_id" value="<?php echo $church_id; ?>" required> 
                                  <p>Are you sure you want to <b>Delete</b> this Detials?</p>
							
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



				<!-- Large Modal -->
			<div class="modal" id="add">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content modal-content-demo">
						<div class="modal-header">
							<h6 class="modal-title"> Add Church Details </h6>
							<button aria-label="Close" class="close" data-dismiss="modal" type="button">
							<span aria-hidden="true">&times;</span>
						    </button>
						</div>
						<div class="modal-body">
						
						       <form action="church-info.php" method="post" enctype="multipart/form-data">
						               		<div class="col-md-9">
													<?php 
						                  if($ErrorLogin)
						                  {
						                    foreach ($ErrorLogin as $key => $value) {
						                      echo '<div class="alert alert-danger role="alert">
						                      <i class="fa fa-exclamation text-white"></i>
						                      '.$value.'
						                      </div>';
						                    }
						                  }

						              ?>
						            </div>
											<div class="">
													<div class="form-group col-md-9">
														<label style="font-size: 16.5px; font-weight: 700;">
														    Church Logo
													    </label> 
														<input type="file" name="church_img" class="form-control" required> <br>
													</div>

													<div class="form-group col-md-9">
														<label style="font-size: 16.5px; font-weight: 700;">
														    Church Name
													    </label>
														<input type="text" name="church_name" class="form-control" required> <br>
													</div>

													<div class="form-group col-md-9">
														<label style="font-size: 16.5px; font-weight: 700;">
														    Church Founder
													    </label>
														<input type="text" name="church_founder" class="form-control" required> <br>
													</div>

													<div class="form-group col-md-9">
														<div class="row row-sm">
															
															<div class="col-sm-6">
																<label style="font-size: 16.5px; font-weight: 700;">Phone Number</label>
																<input type="text" name="church_number" class="form-control" required="" >
															</div>

															<div class="col-sm-6 mg-t-20 mg-sm-t-0">
																<label style="font-size: 16.5px; font-weight: 700;">Email</label>
																<input type="email" name="church_email" class="form-control" required="">
															</div>

														</div>
													</div>


													<div class="form-group col-md-9">
														<div class="row row-sm">
															
															<div class="col-sm-6">
															<label style="font-size: 16.5px; font-weight: 700;">Region</label> 
																<input type="text" name="church_region" class="form-control" required="" >
															</div>

															<div class="col-sm-6 mg-t-20 mg-sm-t-0">
																<label style="font-size: 16.5px; font-weight: 700;">Location</label>
																<input type="text" name="church_loc" class="form-control" required="">
															</div>

														</div>
													</div>

													<div class="form-group col-md-9">
														<label style="font-size: 16.5px; font-weight: 700;">
														   Date Established
													    </label>
														<input type="date" name="church_date" class="form-control" required>
													</div>

													<div class="form-group col-md-9">
														<label style="font-size: 16.5px; font-weight: 700;">
														   Church Description
													    </label>
														<textarea class="form-control" id="summernote" name="church_desc">
														</textarea>
													</div>

											</div> <!-- div class end -->
										

						                </div>
									    <div class="modal-footer">
									<button type="submit" name="add_church" class="btn ripple btn-primary">Add Details</button>
										<button class="btn ripple btn-danger" data-dismiss="modal" type="button">Close</button>
									    </div>
									    </form> <!-- Form End -->
									</div>
								</div>
							</div>
							<!--End Large Modal -->

				<?php include("includes/footer.php"); ?>