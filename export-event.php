<?php include("includes/header.php"); ?>


			<div class="main-content side-content pt-0">
				<div class="container-fluid">
					<div class="inner-body">
						<!-- Page Header -->
						<div class="page-header">
							<div>
								<h2 class="main-content-title tx-24 mg-b-5">Events</h2>
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Export Event Data</li>
								</ol>
							</div>
						</div>
						<!-- End Page Header -->

						
						<!-- Member Row -->
						<div class="row row-sm">
							<div class="col-md-12">
								<div class="card custom-card">
									<div class="card-header p-3 tx-medium my-auto tx-white bg-primary">
									   Events
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
												         <th>Event Name</th>
												         <th>Date</th>
												         <th>Location</th>
												         <th>Event Organizer</th>
												         <th>Approval Status</th>
												         <th>Event Status</th>
																</tr>
															</thead>
															<tbody>
									          <?php

				                    $i = 0;

				                    $sql = "SELECT * FROM events_tbl";
				                    $query = mysqli_query($db, $sql) or die(mysqli_error($db));
				                    
				                    while($row = mysqli_fetch_array($query))
				                    {
				                        $event_id     = $row['event_id'];
				                        $event_name   = $row['event_name'];
				                        $event_banner = $row['event_banner'];
				                        $event_loc    = $row['event_location'];
				                        $approval_status = $row['approval_status'];
				                        $event_status = $row['event_status'];
				                        $start_date   = $row['start_date'];
				                        $end_date     = $row['end_date'];
				                        $event_org    = $row['organized_by'];
				                        $event_desc   = $row['event_desc'];

				                        $i++;

				                  ?>
				                    <tr>
				                      <td><?php echo $event_id;  ?></td>
				                      <td><?php echo $event_name; ?></td>
				                      <td><b><?php echo date("M d, Y",strtotime($start_date)); ?> - <?php echo date("M d, Y",strtotime($end_date)); ?></b></td>
				                      <td><?php echo $event_loc; ?></td>
				                      <td><?php echo $event_org; ?></td>
				                      <td><?php echo $approval_status; ?></td>
				                       <td><?php echo $event_status; ?></td>
                      
							                     
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