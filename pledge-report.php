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
								<h2 class="main-content-title tx-24 mg-b-5">Pledges Report</h2>
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">View Pledges Report</li>
								</ol>
							</div>
						</div>
						<!-- End Page Header -->

						
						<!-- Row -->
						<div class="row row-sm">
							<div class="col-md-12">
								<div class="card custom-card">
									<div class="card-header p-3 tx-medium my-auto tx-white bg-primary">
									  Pledges Report
									</div>
									<div class="card-body">
											<!-- Row -->
									<div class="row row-sm">
										<div class="col-lg-12 col-md-12">
											<div class="card custom-card">
												<div class="card-body">

												<form method="post"> 
													<div>
												<h6 class="main-content-label mb-1">Select Date Range to display Pledges</h6>
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
									  Pledges Report
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
								              Pledges Report as of <?php echo date("M d, Y",strtotime($start))." to ".date("M d, Y",strtotime($end));?> 
								            </b>
								          </h5>
								          <hr>


								       <table id="exportexample" class="table table-bordered border-t0 key-buttons text-nowrap w-100" >
											<thead>
											 <tr>
											  <th>Name</th>
						                      <th>Period</th>
						                      <th>Amount</th>
						                      <th>Status</th>
						                      <th>Description</th>   						  
											</tr>
											 </thead>
											 <tbody>
					 <?php
                  
                    $query = mysqli_query($db,"SELECT * FROM pledges_tbl WHERE date(start_date)>='$start' AND date(start_date)<='$end' ORDER BY start_date")or die(mysqli_error($db));

                      while($row = mysqli_fetch_array($query))
                        {
                           $member_name     = $row['member_name'];
                           $pledge_amount   = $row['pledge_amt'];
                           $pledge_status   = $row['pledge_status'];
                           $pledge_desc     = $row['pledge_desc'];
                           $start_date      = $row['start_date'];
                           $end_date        = $row['end_date'];
                                               
                  ?>

                      <tr>
                        <td><?php echo $member_name;   ?></td>
                        <td><b><?php echo date("M d, Y",strtotime($start_date)); ?> - <?php echo date("M d, Y",strtotime($end_date)); ?></b></td>
                        <td>₵<?php echo number_format($pledge_amount, 2); ?></td>
                        <td><?php echo $pledge_status;    ?></td>                      
                        <td><?php echo $pledge_desc; ?></td>
                       

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
