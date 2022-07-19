<?php include("includes/header.php"); ?>


			<div class="main-content side-content pt-0">
				<div class="container-fluid">
					<div class="inner-body">
						<!-- Page Header -->
						<div class="page-header">
							<div>
								<h2 class="main-content-title tx-24 mg-b-5">Income</h2>
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Add/View Income</li>
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
							              Add Income
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
																  <th>No.</th>
									                              <th>Name</th>             
									                              <th>Amount</th>
									                              <th>Tax</th>
									                              <th>Type</th>
									                              <th>Account</th>
									                              <th>Description</th>
									                              <th>Date</th>
									                              <th>Action</th>
																</tr>
															</thead>
													 <?php

                                    $i = 0;
                                    $sql = "SELECT * FROM income_tbl";
                                    $query = mysqli_query($db, $sql) or die(mysqli_error($db));

                                    while($row = mysqli_fetch_array($query))
                                    {  

                                       $income_id        = $row['income_id'];
                                       $income_cat_id    = $row['income_cat_id'];
                                       $income_amt       = $row['income_amt'];
                                       $income_tax       = $row['income_tax'];
                                       $income_type      = $row['income_type'];
                                       $income_account   = $row['income_account'];
                                       $income_desc      = $row['income_desc'];
                                       $income_date      = $row['income_date'];

                                       // Get Expense Cat
                                      $sel_cat = "SELECT * FROM income_cat WHERE income_cat_id = '$income_cat_id'";
                                       $run_cat = mysqli_query($db, $sel_cat);
                                       $row_cat = mysqli_fetch_array($run_cat);
                                       $income_cat_name = $row_cat['income_cat_name'];

                                       $i++;
                                  ?>
                                    <tr>
                                      <td><?php echo $i;  ?></td>
                                      <td><?php echo $income_cat_name;  ?></td>
                                      <td><?php echo $income_amt;  ?></td> 
                                      <td><?php echo $income_tax;  ?></td>
                                      <td><?php echo $income_type;  ?></td>
                                      <td><?php echo $income_account;  ?></td>
                                      <td><?php echo $income_desc;  ?></td>
                                      <td><?php echo date("M d, Y h:i a",strtotime($income_date)); ?></td>
									                  
							                      <td>
							                      	<a style="background: #6259CA; border: 1px solid #6259CA" class="btn ripple btn-info" data-target="#update<?php echo $income_id;?>" data-toggle="modal" href="#update<?php echo $income_id;?>"> <i  class="fa fa-eye"></i>
										           </a>
										           <a style="background: red; border: 1px solid red" class="btn ripple btn-info" data-target="#delete<?php echo $income_id;?>" data-toggle="modal" href="#delete<?php echo $income_id;?>"> <i class="fa fa-trash fa-danger"></i>
										           </a>
							                      </td>	


			<!-- Large Modal -->
			<div class="modal" id="update<?php echo $income_id;?>">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content modal-content-demo">
						<div class="modal-header">
							<h6 class="modal-title"> Update Income Details </h6>
							<button aria-label="Close" class="close" data-dismiss="modal" type="button">
							<span aria-hidden="true">&times;</span>
						    </button>
						</div>
						<div class="modal-body">
						
						     <form action="income-update.php" method="post" enctype="multipart/form-data">
								 <div class="">
									 <div class="form-group col-md-9">
										 <label style="font-size: 16.5px; font-weight: 700;">Income Name</label>
											<div class="pos-relative">
												<input type="hidden" class="form-control" name="income_id" value="<?php echo $income_id; ?>">
												<select name="income_name" class="form-control select select2" required>
												<option value="<?php echo $income_cat_id; ?>"><?php echo $income_cat_name; ?></option>
													<?php   

								                        $sel_cat = "SELECT * FROM income_cat";
								                        $run_cat = mysqli_query($db, $sel_cat);

								                        while($row_cat = mysqli_fetch_array($run_cat))
								                        {
								                            $income_cat_id   = $row_cat['income_cat_id'];
								                            $income_cat_name = $row_cat['income_cat_name'];

								                            echo "<option value='$income_cat_id'>$income_cat_name</option>";
								                        }

								                    ?>
												</select>
												</div>
										    </div>

											<div class="form-group col-md-9">
											 <label style="font-size: 16.5px; font-weight: 700;">
											  	Amount
											  </label>
											  <input type="hidden" class="form-control" name="income_id" value="<?php echo $income_id; ?>"> 
											  <input type="text" value="<?php echo $income_amt; ?>" name="income_amt" class="form-control" required>
											</div>

											<div class="form-group col-md-9">
											 <label style="font-size: 16.5px; font-weight: 700;">
											  	Amount Tax
											  </label>
											  <input type="hidden" class="form-control" name="income_id" value="<?php echo $income_id; ?>"> 
											  <input type="text" value="<?php echo $income_tax; ?>" name="income_tax" class="form-control" required>
											</div>

									    <div class="form-group col-md-9">
										 <label style="font-size: 16.5px; font-weight: 700;">Income Type</label>
											<div class="pos-relative">
												<input type="hidden" class="form-control" name="income_id" value="<?php echo $income_id; ?>">
												<select name="income_type" class="form-control select select2" required>
												<option value="<?php echo $income_type; ?>"><?php echo $income_type; ?></option>
												 <option value="Deposit">Deposit</option>
                         <option value="Withdraw">Withdraw</option>
												</select>
												</div>
										</div>


										 <div class="form-group col-md-9">
										 <label style="font-size: 16.5px; font-weight: 700;">Account</label>
											<div class="pos-relative">
												<input type="hidden" class="form-control" name="income_id" value="<?php echo $income_id; ?>">
												<select name="income_account" class="form-control select select2" required>
												<option value="<?php echo $income_account; ?>"><?php echo $income_account; ?></option>
												 <option value="Cash">Cash</option>
                         <option value="Cheque">Cheque</option>
                         <option value="Momo">Momo</option> 
												</select>
												</div>
										   </div>


										 <div class="form-group col-md-9">
										 <label style="font-size: 16.5px; font-weight: 700;">Description</label>
											<div class="pos-relative">
												<input type="hidden" class="form-control" name="income_id" value="<?php echo $income_id; ?>">
												 <textarea class="form-control" name="income_desc" required>
												 	<?php echo $income_desc; ?>
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
			<div class="modal" id="delete<?php echo $income_id;?>">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content modal-content-demo">
						<div class="modal-header">
							<h6 class="modal-title">Delete Income Details</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
						</div>
						<div class="modal-body">
							<form action="income-del.php" method="post">
								 <input type="hidden" class="form-control" name="income_id" value="<?php echo $income_id; ?>" required> 
                                  <p>Are you sure you want to <b>Delete</b> this Income?</p>
							
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
							<h6 class="modal-title"> Add Income </h6>
							<button aria-label="Close" class="close" data-dismiss="modal" type="button">
							<span aria-hidden="true">&times;</span>
						    </button>
						</div>
						<div class="modal-body">
						
						      <form action="income-add.php" method="post" enctype="multipart/form-data">
									<div class="">
										<div class="form-group col-md-9">
										 <label style="font-size: 16.5px; font-weight: 700;">Income Name</label>
											<div class="pos-relative">
												<input type="hidden" class="form-control" name="income_id" value="<?php echo $income_id; ?>">
												<select name="income_name" class="form-control select select2" required>
												<option disabled selected>Select income name</option>
													<?php   

								                        $sel_cat = "SELECT * FROM income_cat";
								                        $run_cat = mysqli_query($db, $sel_cat);

								                        while($row_cat = mysqli_fetch_array($run_cat))
								                        {
								                            $income_cat_id   = $row_cat['income_cat_id'];
								                            $income_cat_name = $row_cat['income_cat_name'];

								                            echo "<option value='$income_cat_id'>$income_cat_name</option>";
								                        }

								                    ?>
												</select>
												</div>
										    </div>

											<div class="form-group col-md-9">
											 <label style="font-size: 16.5px; font-weight: 700;">
											  	Amount
											  </label>
											  <input type="text" name="income_amt" class="form-control" required>
											</div>

											<div class="form-group col-md-9">
											 <label style="font-size: 16.5px; font-weight: 700;">
											  	Amount Tax
											  </label>
											  <input type="text" name="income_tax" class="form-control" required>
											</div>

									    <div class="form-group col-md-9">
										 <label style="font-size: 16.5px; font-weight: 700;">Income Type</label>
											<div class="pos-relative">
												<select name="income_type" class="form-control select select2" required>
												<option disabled selected>Select income type</option>
												 <option value="Deposit">Deposit</option>
                         <option value="Withdraw">Withdraw</option>
												</select>
												</div>
										</div>


										 <div class="form-group col-md-9">
										 <label style="font-size: 16.5px; font-weight: 700;">Account</label>
											<div class="pos-relative">
												<select name="income_acc" class="form-control select select2" required>
												<option disabled selected>Select account</option>
												 <option value="Cash">Cash</option>
                         <option value="Cheque">Cheque</option>
                         <option value="Momo">Momo</option> 
												</select>
												</div>
										   </div>


										 <div class="form-group col-md-9">
										 <label style="font-size: 16.5px; font-weight: 700;">Description</label>
											<div class="pos-relative">
												 <textarea class="form-control" name="income_desc" required>
												 </textarea>
												</div>
										   </div>

											</div> <!-- div class end -->
										

						          </div>
									  <div class="modal-footer">
										<button type="submit" name="add_income" class="btn ripple btn-primary"> Add Income 
										</button>
										<button class="btn ripple btn-danger" data-dismiss="modal" type="button">Close</button>
									    </div>
									    </form> <!-- Form End -->
									</div>
								</div>
							</div>
							<!--End Large Modal -->

				<?php include("includes/footer.php"); ?>