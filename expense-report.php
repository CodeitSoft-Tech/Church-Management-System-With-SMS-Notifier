<?php 

	include("includes/header.php");

?>

<!-- Main Content-->
			<div class="main-content side-content pt-0">

				<div class="container-fluid">
					<div class="inner-body">

						<!-- Page Header -->
						<div class="page-header">
							<div>
								<h2 class="main-content-title tx-24 mg-b-5">Expenses Report</h2>
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">View Expenses Report</li>
								</ol>
							</div>
						</div>
						<!-- End Page Header -->

						
						<!-- Row -->
						<div class="row row-sm">
							<div class="col-md-12">
								<div class="card custom-card">
									<div class="card-header p-3 tx-medium my-auto tx-white bg-primary">
									  Expenses Report
									</div>
									<div class="card-body">
											<!-- Row -->
									<div class="row row-sm">
										<div class="col-lg-12 col-md-12">
											<div class="card custom-card">
												<div class="card-body">

												<form method="post"> 
													<div>
													<h6 class="main-content-label mb-1">Select Date Range to display Expenses</h6>
													</div>
													<div class="row row-sm">
														<div class="col-lg-9">
															<div class="input-group">
																<div class="input-group-prepend">
																	<div class="input-group-text">
																		<i class="fe fe-calendar  lh--9 op-6"></i>
																	</div>
																</div>
															<input type="text" name="date" class="form-control pull-right" id="reservation">
															</div>
														</div>
													</div> <br>
													  <div class="form-group">
										                 <button type="submit" class="btn btn-primary" name="display">Display</button>
										               </div>
												  </form>
												  <?php

									                 if(isset($_POST['display']))
									                 {
									                    $date   = $_POST['date'];
									                    $date   = explode('-',$date);
									                    $start  = date("Y/m/d",strtotime($date[0]));
									                    $end    = date("Y/m/d",strtotime($date[1]));

									                 ?>

												</div>
											</div>
										</div>
									</div>
									<!-- End Row -->
									</div>
								</div>
							</div>



							<div class="col-md-12">
								<div class="card custom-card">
									<div class="card-header p-3 tx-medium my-auto tx-white bg-primary">
									  Expenses Report
									</div>
									<div class="card-body">
									

										 <?php
                  
						                      $query  = mysqli_query($db,"select * from church_info_tbl")or die(mysqli_error());  
						                      $row    = mysqli_fetch_array($query);
						                  ?>

						                  <h5 style="font-size: 20px; text-align: center; color: #6259CA;">
						                    <b><?php echo $row['church_name'];?></b> 
						                  </h5>  
						                  <h6 style="font-size: 20px; text-align: center; color: #6259CA;">
						                    Address: <?php echo $row['church_location'];?>
						                  </h6>
						                  <h6 style="font-size: 20px; text-align: center; color: #6259CA;">
						                    Contact: <?php echo $row['church_number'];?>
						                  </h6>

						                   <h5 style="font-size: 20px; text-align: center; color: #6259CA; margin-bottom: 20px; ">
								            <b>
								              Expenses Report as of <?php echo date("M d, Y",strtotime($start))." to ".date("M d, Y",strtotime($end));?> 
								            </b>
								          </h5>
								          <hr>


								       <table id="exportexample" class="table table-bordered border-t0 key-buttons text-nowrap w-100" >
											<thead>
											 <tr>
										      <th>Name</th>
						                      <th>Amount</th>
						                      <th>Date</th>  						  
											</tr>
											 </thead>
											 <tbody>
					 <?php
                  
                    $query = mysqli_query($db,"SELECT * FROM tbl_expenses WHERE date(expense_date)>='$start' AND date(expense_date)<='$end' ORDER BY expense_date")or die(mysqli_error($db));

                      while($row = mysqli_fetch_array($query))
                        {
                           $expense_cat_id   = $row['expense_cat_id'];
                           $expense_amount   = $row['expense_amount'];
                           $expense_date     = $row['expense_date'];

                           // Get Expense Cat
                           $sel_cat = "SELECT * FROM expense_cat WHERE expense_cat_id = '$expense_cat_id'";
                           $run_cat = mysqli_query($db, $sel_cat);
                           $row_cat = mysqli_fetch_array($run_cat);
                           $expense_cat_name = $row_cat['expense_cat_name'];


                                               
                  ?>

                      <tr>
                        <td><?php echo $expense_cat_name;                      ?></td>
                        <td>₵<?php echo number_format($expense_amount, 2);        ?></td>                
                        <td><?php echo date("M d, Y h:i a",strtotime($row['expense_date'])); ?></td>
                       

                      </tr>
           

                 <?php } } ?>
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
						</div>
						<!-- End Row -->



					</div>
				</div>
			</div>
			<!-- End Main Content-->







<?php 
  
  include("includes/footer.php"); 

?>
