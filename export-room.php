<?php include("includes/header.php"); ?>


			<div class="main-content side-content pt-0">
				<div class="container-fluid">
					<div class="inner-body">
						<!-- Page Header -->
						<div class="page-header">
							<div>
								<h2 class="main-content-title tx-24 mg-b-5">Rooms</h2>
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Export Rooms Data</li>
								</ol>
							</div>
						</div>
						<!-- End Page Header -->

						
						<!-- Member Row -->
						<div class="row row-sm">
							<div class="col-md-12">
								<div class="card custom-card">
									<div class="card-header p-3 tx-medium my-auto tx-white bg-primary">
									   Rooms
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
                  											  <th>Room Name</th>
											                  <th>Capacity</th>
											                  <th>Room Status</th>
											                  <th>Check-In Date</th>
											                  <th>Check-Out Date</th>                
											                </tr>
											                </thead>
											                <tbody>
											                  <?php

											                    $i = 0;
											                    $sql = "SELECT * FROM room_tbl";
											                    $query = mysqli_query($db, $sql) or die(mysqli_error($db));
											                    
											                    while($row = mysqli_fetch_array($query))
											                    {
											                        $room_id       = $row['room_id'];
											                        $room_name     = $row['room_title'];
											                        $room_capacity = $row['room_capacity'];
											                        $room_status   = $row['room_status'];
											                        $chk_in_date   = $row['checkin_date'];
											                        $chk_out_date  = $row['checkout_date'];

											                        $i++;

											                  ?>
											                    <tr>
											                      <td><?php echo $i;             ?></td>
											                      <td><?php echo $room_name;     ?></td>
											                      <td><?php echo $room_capacity; ?></td>              
											                       <td><?php echo $room_status;  ?></td>
											                      <td><?php echo date("M d, Y",strtotime($chk_in_date)); ?></td> 
											                      <td><?php echo date("M d, Y",strtotime($chk_out_date)); ?></td>
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