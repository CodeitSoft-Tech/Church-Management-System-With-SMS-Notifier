<?php include("includes/header.php"); ?>


			<div class="main-content side-content pt-0">
				<div class="container-fluid">
					<div class="inner-body">
						<!-- Page Header -->
						<div class="page-header">
							<div>
								<h2 class="main-content-title tx-24 mg-b-5">Out-Blessings</h2>
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Export Out-Blessing Data</li>
								</ol>
							</div>
						</div>
						<!-- End Page Header -->

						
						<!-- Member Row -->
						<div class="row row-sm">
							<div class="col-md-12">
								<div class="card custom-card">
									<div class="card-header p-3 tx-medium my-auto tx-white bg-primary">
									   Out-Blessings
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
												   <th>No</th>
								                  <th>Blessing Name</th>
								                  <th>Blessing Type</th>
								                  <th>Amount / Item </th>
								                  <th>Recipient</th> 
								                  <th>Location</th> 
								                  <th>Date</th>
								                  <th>Description</th>      
								                 
								                </tr>
								                </thead>
								                <tbody>
								                  <?php

								                    $i = 0;
								                    $sql = "SELECT * FROM tbl_out_blessing";
								                    $query = mysqli_query($db, $sql) or die(mysqli_error($db));
								                    
								                    while($row = mysqli_fetch_array($query))
								                    {   
								                          $blessing_id       = $row['out_blessing_id'];
								                          $blessing_name     = $row['blessing_name'];
								                          $type              = $row['blessing_type'];
								                          $amount            = $row['presents'];
								                          $recipient         = $row['blessing_to'];
								                          $location          = $row['blessing_location'];
								                          $date              = $row['blessing_date'];
								                          $blessing_desc     = $row['blessing_desc'];

								                          $i++;

								                  ?>
								                    <tr>
								                      <td><?php echo $i;              ?></td>
								                      <td><?php echo $blessing_name;  ?></td>
								                      <td><?php echo $type;           ?></td> 
								                      <td><?php echo $amount;         ?></td>
								                      <td><?php echo $recipient;      ?></td>
								                      <td><?php echo $location;      ?></td>
								                      <td><?php echo date("M d, Y",strtotime($date)); ?></td>
								                      <td><?php echo $blessing_desc;  ?></td>
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