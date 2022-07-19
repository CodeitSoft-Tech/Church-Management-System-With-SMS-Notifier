<?php include("includes/header.php"); ?>


			<div class="main-content side-content pt-0">
				<div class="container-fluid">
					<div class="inner-body">
						<!-- Page Header -->
						<div class="page-header">
							<div>
								<h2 class="main-content-title tx-24 mg-b-5">Donations</h2>
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Export Donation Data</li>
								</ol>
							</div>
						</div>
						<!-- End Page Header -->

						
						<!-- Member Row -->
						<div class="row row-sm">
							<div class="col-md-12">
								<div class="card custom-card">
									<div class="card-header p-3 tx-medium my-auto tx-white bg-primary">
									 Donation
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
												                  <th>Donation Name </th>
												                  <th>Amount</th>
												                  <th>Phone Number</th> 
												                  <th>Location</th>
												                  <th>Payment Type</th>
												                  <th>Date</th> 
																</tr>
															</thead>
															<tbody>
									               <?php

							                    $i = 0;
							                    $sql = "SELECT * FROM donation_tbl";
							                    $query = mysqli_query($db, $sql) or die(mysqli_error($db));

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
							                       $sel_dtype = "SELECT * FROM donation_types WHERE $type_id = '$type_id'";
							                       $run_dtype = mysqli_query($db, $sel_dtype);
							                       $row_dtype = mysqli_fetch_array($run_dtype);
							                       $type_name = $row_dtype['type_name'];


							                       $i++;

							                  ?>
							                    <tr>
							                      <td><?php echo $i; ?></td>
							                      <td><?php echo $fullname ?></td>
							                      <td><?php echo $type_name ?></td>
							                      <td><?php echo $amount; ?></td>
							                      <td><?php echo $phone; ?></td>
							                      <td><?php echo $address; ?></td> 
							                      <td><?php echo $ptype; ?></td>
							                      <td><?php echo date("M d, Y",strtotime($date)); ?></td>


							                     
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