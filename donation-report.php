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
								<h2 class="main-content-title tx-24 mg-b-5">Donations Report</h2>
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">View Donations Report</li>
								</ol>
							</div>
						</div>
						<!-- End Page Header -->

						
						<!-- Row -->
						<div class="row row-sm">
							<div class="col-md-12">
								<div class="card custom-card">
									<div class="card-header p-3 tx-medium my-auto tx-white bg-primary">
									  Donations Report
									</div>
									<div class="card-body">
											<!-- Row -->
									<div class="row row-sm">
										<div class="col-lg-12 col-md-12">
											<div class="card custom-card">
												<div class="card-body">

												<form method="post"> 
													<div>
												<h6 class="main-content-label mb-1">Select Date Range to display Donations</h6>
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
									  Donations Report
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
								              Donations Report as of <?php echo date("M d, Y",strtotime($start))." to ".date("M d, Y",strtotime($end));?> 
								            </b>
								          </h5>
								          <hr>


								       <table id="exportexample" class="table table-bordered border-t0 key-buttons text-nowrap w-100" >
											<thead>
											 <tr>
											  <th>Full Name</th>
											  <th>Donation Name </th>
										      <th>Amount</th>
											  <th>Phone Number</th>
											  <th>Location</th> 
											  <th>Payment Type</th>
											  <th>Date Donated</th>   						  
											</tr>
											 </thead>
											 <tbody>
					 <?php
                  
                    $query = mysqli_query($db,"SELECT * FROM donation_tbl WHERE date(date_donated)>='$start' AND date(date_donated)<='$end' ORDER BY date_donated")or die(mysqli_error($db));

                      while($row = mysqli_fetch_array($query))
                        {
                          $donation_id = $row['donation_id'];
												  $fullname    = $row['name'];
												  $type_id     = $row['type_id'];
												  $address     = $row['address'];
												  $phone       = $row['contact'];
												  $amount      = $row['amount'];
												  $ptype       = $row['type'];
												  $date        = $row['date_donated'];

												  // Get Donation Type
												  $sel_dtype = "SELECT * FROM donation_types WHERE type_id = '$type_id'";
												  $run_dtype = mysqli_query($db, $sel_dtype);
												  $row_dtype = mysqli_fetch_array($run_dtype);
												  $type_name = $row_dtype['type_name'];

                                               
                  ?>

                      <tr>
                        <td><?php echo $fullname;   ?></td>
                        <td><?php echo $type_name;  ?></td>
                        <td>₵<?php echo number_format($amount, 2);    ?></td>   
                        <td><?php echo $phone;    ?></td>
                        <td><?php  echo $address; ?></td>                                   
                        <td><?php echo $ptype; ?></td>                     
                        <td><?php echo date("M d, Y",strtotime($date)); ?></td>
                       

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
