<?php include("includes/header.php"); ?>


			<div class="main-content side-content pt-0">
				<div class="container-fluid">
					<div class="inner-body">
						<!-- Page Header -->
						<div class="page-header">
							<div>
								<h2 class="main-content-title tx-24 mg-b-5">Church Services</h2>
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Export Service Data</li>
								</ol>
							</div>
						</div>
						<!-- End Page Header -->

						
						<!-- Member Row -->
						<div class="row row-sm">
							<div class="col-md-12">
								<div class="card custom-card">
									<div class="card-header p-3 tx-medium my-auto tx-white bg-primary">
									   Services
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
																   <th>No</th>
												           <th>Service Name</th>
												           <th>Service By</th>
												           <th>Type</th>
												           <th>Day</th> 
												           <th>Date</th>
												           <th>Time</th>
												           <th>Approval Status</th>
												           <th>Service Status</th>  
																</tr>
															</thead>
															<tbody>
									  <?php


                    $i = 0;
                    $sql = "SELECT * FROM service_tbl";
                    $query = mysqli_query($db, $sql) or die(mysqli_error($db));
                    
                    while($row = mysqli_fetch_array($query))
                    {
                        $service_id     = $row['service_id'];
                        $service_name   = $row['service_name'];
                        $service_by     = $row['service_by'];
                        $service_type   = $row['service_type'];
                        $service_day    = $row['service_day'];
                        $service_date   = $row['service_date'];
                        $service_time   = $row['service_time'];
                        $approval_status = $row['approval_status'];
                        $service_status  = $row['service_status'];

                        $i++;
                  ?>
                    <tr>
                      <td><?php echo $i;             ?></td>
                      <td><?php echo $service_name;  ?></td>
                      <td><?php echo $service_by;    ?></td>
                      <td><?php echo $service_type;  ?></td>
                      <td><?php echo $service_day;   ?></td> 
                      <td><?php echo date("M d, Y",strtotime($service_date)); ?></td>             
                      <td><?php echo date("h:i a",strtotime($service_time));  ?></td>
                      <td><?php echo $approval_status;  ?></td>
                      <td><?php echo $service_status;  ?></td>
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