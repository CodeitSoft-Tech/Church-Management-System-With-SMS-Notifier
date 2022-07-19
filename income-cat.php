<?php include("includes/header.php"); ?>


			<div class="main-content side-content pt-0">
				<div class="container-fluid">
					<div class="inner-body">
						<!-- Page Header -->
						<div class="page-header">
							<div>
								<h2 class="main-content-title tx-24 mg-b-5">Income Categories</h2>
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Add/View Income Categories</li>
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
							              Add Income Category
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
							                              <th>No</th>
										                  <th>Category Name</th>
										                  <th>Action</th>
							                              </tr>
							                              </thead>
							                              <tbody>
							                                  <?php

									                    $i = 0;

									                    $sql = "SELECT * FROM income_cat";
									                    $query = mysqli_query($db, $sql) or die(mysqli_error($db));
									                    
									                    while($row = mysqli_fetch_array($query))
									                    {
									                        $income_cat_id     = $row['income_cat_id'];
									                        $income_cat_name   = $row['income_cat_name'];
									                        $i++;

									                  ?>
									                    <tr>
									                      <td><?php echo $i;  ?></td>
									                      <td><?php echo $income_cat_name; ?></td></td>
									                  
							                      <td>
							                      	<a style="background: #6259CA; border: 1px solid #6259CA" class="btn ripple btn-info" data-target="#update<?php echo $income_cat_id;?>" data-toggle="modal" href="#update<?php echo $income_cat_id;?>"> <i  class="fa fa-eye"></i>
										           </a>
										           <a style="background: red; border: 1px solid red" class="btn ripple btn-info" data-target="#delete<?php echo $income_cat_id;?>" data-toggle="modal" href="#delete<?php echo $income_cat_id; ?>"> <i class="fa fa-trash fa-danger"></i>
										           </a>
							                      </td>	


			<!-- Large Modal -->
			<div class="modal" id="update<?php echo $income_cat_id;?>">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content modal-content-demo">
						<div class="modal-header">
							<h6 class="modal-title"> Update Income Category </h6>
							<button aria-label="Close" class="close" data-dismiss="modal" type="button">
							<span aria-hidden="true">&times;</span>
						    </button>
						</div>
						<div class="modal-body">
						
						     <form action="income-cat-update.php" method="post" enctype="multipart/form-data">
								 <div class="">
									 <div class="form-group col-md-9">
										 <label style="font-size: 16.5px; font-weight: 700;">Category Name</label>
											<div class="pos-relative">
												<input type="hidden" class="form-control" name="income_cat_id" value="<?php echo $income_cat_id; ?>">
													<input type="text" value="<?php echo $income_cat_name; ?>" name="income_cat_name" class="form-control" required>
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
			<div class="modal" id="delete<?php echo $income_cat_id;?>">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content modal-content-demo">
						<div class="modal-header">
							<h6 class="modal-title">Delete Income Category</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
						</div>
						<div class="modal-body">
							<form action="income-cat-del.php" method="post">
								 <input type="hidden" class="form-control" name="income_cat_id" value="<?php echo $income_cat_id; ?>" required> 
                                  <p>Are you sure you want to <b>Delete</b> this Income Category?</p>
							
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
							<h6 class="modal-title"> Add Income Category </h6>
							<button aria-label="Close" class="close" data-dismiss="modal" type="button">
							<span aria-hidden="true">&times;</span>
						    </button>
						</div>
						<div class="modal-body">
						
						      <form action="income-cat-add.php" method="post" enctype="multipart/form-data">
									<div class="">
										<div class="form-group col-md-9">
										 <label style="font-size: 16.5px; font-weight: 700;">Income Category Name</label>
											<div class="pos-relative">
												 <input type="text" name="income_cat_name" class="form-control" required>
												</div>
										    </div>

											</div> <!-- div class end -->
										

						                </div>
									    <div class="modal-footer">
										<button type="submit" name="income_cat" class="btn ripple btn-primary"> Add Category 
										</button>
										<button class="btn ripple btn-danger" data-dismiss="modal" type="button">Close</button>
									    </div>
									    </form> <!-- Form End -->
									</div>
								</div>
							</div>
							<!--End Large Modal -->

				<?php include("includes/footer.php"); ?>