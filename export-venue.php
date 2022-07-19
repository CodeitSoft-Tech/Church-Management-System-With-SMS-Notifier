<?php include("includes/header.php"); ?>


			<div class="main-content side-content pt-0">
				<div class="container-fluid">
					<div class="inner-body">
						<!-- Page Header -->
						<div class="page-header">
							<div>
								<h2 class="main-content-title tx-24 mg-b-5">Venues</h2>
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Export Venue Data</li>
								</ol>
							</div>
						</div>
						<!-- End Page Header -->

						
						<!-- Member Row -->
						<div class="row row-sm">
							<div class="col-md-12">
								<div class="card custom-card">
									<div class="card-header p-3 tx-medium my-auto tx-white bg-primary">
									   Venues
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
											                  <th>Venue Name</th>
											                  <th>Capacity</th>
											                  <th>Location</th>
											                  <th>Venue Status</th>              
											                  
											                </tr>
                </thead>
                <tbody>
                  <?php

                    $i = 0;
                    $sql = "SELECT * FROM venue_tbl";
                    $query = mysqli_query($db, $sql) or die(mysqli_error($db));
                    
                    while($row = mysqli_fetch_array($query))
                    {   
                          $venue_id       = $row['venue_id'];
                          $venue_name     = $row['venue_name'];
                          $venue_capacity = $row['venue_capacity'];
                          $venue_location = $row['venue_location'];
                          $venue_status   = $row['venue_status'];

                          $i++;

                  ?>
                    <tr>
                      <td><?php echo $i; ?></td>
                      <td><?php echo $venue_name;  ?></td>
                      <td><?php echo $venue_capacity;  ?></td> 
                      <td><?php echo $venue_location;  ?></td>
                      <td><?php echo $venue_status;  ?></td>

                      
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