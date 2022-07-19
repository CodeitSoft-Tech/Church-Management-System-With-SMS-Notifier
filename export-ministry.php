<?php include("includes/header.php"); ?>


			<div class="main-content side-content pt-0">
				<div class="container-fluid">
					<div class="inner-body">
						<!-- Page Header -->
						<div class="page-header">
							<div>
								<h2 class="main-content-title tx-24 mg-b-5">Ministries</h2>
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Export Ministry Data</li>
								</ol>
							</div>
						</div>
						<!-- End Page Header -->

						
						<!-- Member Row -->
						<div class="row row-sm">
							<div class="col-md-12">
								<div class="card custom-card">
									<div class="card-header p-3 tx-medium my-auto tx-white bg-primary">
									    Ministries
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
												                  <th>Ministry Name</th>
												                  <th>Email</th>
												                  <th>Phone Number</th>
												                  <th>Date Instituted</th>
																</tr>
															</thead>
															<tbody>
									               <?php

									                    $i = 0; 

									                    $sql = "SELECT * FROM ministry_tbl";
									                    $query = mysqli_query($db, $sql) or die(mysqli_error($db));

									                    while($row = mysqli_fetch_array($query))
									                    {     
									                        $ministry_id    = $row['ministry_id'];
									                        $ministry_name  = $row['ministry_name'];
									                        $ministry_email = $row['ministry_email'];
									                        $ministry_phone = $row['ministry_number'];
									                        $ministry_date  = $row['ministry_date'];

									                        $i++;

									                  ?>
								                    <tr>
								                      <td><?php echo $i;  ?></td>
								                      <td><?php echo  $ministry_name;  ?></td>
								                      <td><?php echo  $ministry_email;  ?></td> 
								                      <td><?php echo  $ministry_phone;  ?></td>
								                      <td><?php echo date("M d, Y",strtotime($ministry_date)); ?></td>
							                     
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