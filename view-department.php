<?php include("includes/header.php"); ?>


			<div class="main-content side-content pt-0">
				<div class="container-fluid">
					<div class="inner-body">
						<!-- Page Header -->
						<div class="page-header">
							<div>
								<h2 class="main-content-title tx-24 mg-b-5">Departments</h2>
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">View Departments</li>
								</ol>
							</div>
						</div>
						<!-- End Page Header -->

						
						<!-- Member Row -->
						<div class="row row-sm">
							<div class="col-md-12">
								<div class="card custom-card">
									<div class="card-header p-3 tx-medium my-auto tx-white bg-primary">
									    Departments 
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
												          <th>Photo</th>             
												          <th>Department Name</th>
												          <th>Email</th>
												          <th>Phone Number</th>
												          <th>Date Instituted</th>
												          <th>Action</th>
																</tr>
															</thead>
															<tbody>
									           <?php

				                    $i = 0;
				                    $sql = "SELECT * FROM group_tbl";
				                    $query = mysqli_query($db, $sql) or die(mysqli_error($db));

				                    while($row = mysqli_fetch_array($query))
				                    {  
				                       $group_id    = $row['group_id'];
				                       $group_name  = $row['group_name'];
				                       $group_photo = $row['group_photo'];
				                       $group_email = $row['group_email'];
				                       $group_phone = $row['group_number'];
				                       $group_date  = $row['group_date'];

				                       $i++;
				                  ?>
				                    <tr>
				                      <td><?php echo $i;  ?></td>
				                      <td><img src="church-images/dept/<?php echo $group_photo; ?>" alt="<?php echo $group_name; ?>" width="100" height="100"></td>
				                      <td><?php echo $group_name;  ?></td>
				                      <td><?php echo $group_email;  ?></td>
				                      <td><?php echo $group_phone;  ?></td>
				                      <td><?php echo date("M d, Y",strtotime($group_date)); ?></td>
					               <td>
					              <a style="background: #6259CA; border: 1px solid #6259CA" class="btn ripple btn-info" data-target="#update<?php echo $group_id;?>" data-toggle="modal" href="#update<?php echo $group_id;?>"> <i  class="fa fa-eye"></i>
	                  </a>
	                   <a style="background: red; border: 1px solid red" class="btn ripple btn-info" data-target="#delete<?php echo $group_id;?>" data-toggle="modal" href="#delete<?php echo $group_id;?>"> <i class="fa fa-trash fa-danger"></i>
	                   </a>
					            </td>	


			<!-- Large Modal -->
			<div class="modal" id="update<?php echo $group_id;?>">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content modal-content-demo">
						<div class="modal-header">
							<h6 class="modal-title"> Update Department Details </h6>
							<button aria-label="Close" class="close" data-dismiss="modal" type="button">
							<span aria-hidden="true">&times;</span>
						    </button>
						</div>
						<div class="modal-body">
						
						<form action="dept-update.php" method="post" enctype="multipart/form-data">
				       <div class="">
					       <div class="form-group col-md-9">
						    <label style="font-size: 16.5px; font-weight: 700;">Department Name</label>
							<input type="hidden" class="form-control" name="group_id" value="<?php echo $group_id; ?>"> 
						    <input type="text" value="<?php echo $group_name; ?>" name="group_name" class="form-control" required="" >
					       </div>


													<div class="form-group col-md-9">
														<label style="font-size: 16.5px; font-weight: 700;">Email</label>
														<div class="pos-relative">
															 <input type="hidden" class="form-control" name="group_id" value="<?php echo $group_id; ?>"> 
															<input type="text" value="<?php echo $group_email; ?>" name="group_email" class="form-control" required="">
														</div>
													</div>

													<div class="form-group col-md-9">
														<label style="font-size: 16.5px; font-weight: 700;">Phone Number</label>
														<div class="pos-relative">
															 <input type="hidden" class="form-control" name="group_id" value="<?php echo $group_id; ?>"> 
															<input type="text" value="<?php echo $group_phone; ?>" name="group_phone" class="form-control" required="">
														</div>
													</div>

													<div class="form-group col-md-9">
														<label style="font-size: 16.5px; font-weight: 700;"> Date Instituted </label>
														<div class="pos-relative">
															 <input type="hidden" class="form-control" name="group_id" value="<?php echo $group_id; ?>"> 
															<input type="date" name="group_date" value="<?php echo $group_date; ?>" class="form-control" required="">
														</div>
													</div>

													<div class="form-group col-md-9">
														<label style="font-size: 16.5px; font-weight: 700;"> Department Image (upload Image to update)</label>
														<div class="pos-relative">
														 <input type="hidden" class="form-control" name="group_id" value="<?php echo $group_id; ?>"> 
												         <input type="file" class="form-control" name="group_img"> <br>
												          <img src="church-images/dept/<?php echo $group_photo; ?>" alt="<?php echo $group_name; ?>" width="100" height="100">
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
			<div class="modal" id="delete<?php echo $group_id;?>">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content modal-content-demo">
						<div class="modal-header">
							<h6 class="modal-title">Delete Department Details</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
						</div>
						<div class="modal-body">
							<form action="dept-del.php" method="post">
								 <input type="hidden" class="form-control" name="group_id" value="<?php echo $group_id; ?>" required> 
                      
       <p>Are you sure you want to <b>Delete</b> this Department?</p>
							
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