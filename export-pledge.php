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
									<li class="breadcrumb-item active" aria-current="page">Export Pledge Data</li>
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
				

                 						<div class="row row-sm">
 										<div class="col-lg-12">
											<div class="card custom-card overflow-hidden">
												<div class="card-body">		
													<div class="table-responsive">
														<table id="exportexample" class="table table-bordered border-t0 key-buttons text-nowrap w-100" >
															<thead>
																<tr>
																  <th>No.</th>
												                  <th>Full Name</th>
												                  <th>Phone Number</th>
												                  <th>Location</th>
												                  <th>Start Date</th>
												                  <th>End Date</th>
												                  <th>Amount</th>
												                  <th>Pledge Status</th>
												                  <th>Description</th>                             
												                 
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
							                      <td><?php echo $address;  ?></td>
							                      <td><?php echo date("M d, Y",strtotime($start_date)); ?></td>
							                      <td><?php echo date("M d, Y",strtotime($end_date));   ?></td>
							                      <td><?php echo $amount;    ?></td>
							                      <td><?php echo $status; ?></td>
							                      <td><?php echo $desc; ?></td>
							       	              
                        	<?php } ?>
															</tbody>
														</table>
													</div>


												</div>
											</div>
										</div>
									</div>
						<!-- End Row -->

					</div>
				</div>
			</div>





<?php include("includes/footer.php"); ?>