<?php include("includes/header.php"); ?>


			<div class="main-content side-content pt-0">
				<div class="container-fluid">
					<div class="inner-body">
						<!-- Page Header -->
						<div class="page-header">
							<div>
								<h2 class="main-content-title tx-24 mg-b-5">Church Gifts</h2>
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Export Church Gift Data</li>
								</ol>
							</div>
						</div>
						<!-- End Page Header -->

						
						<!-- Member Row -->
						<div class="row row-sm">
							<div class="col-md-12">
								<div class="card custom-card">
									<div class="card-header p-3 tx-medium my-auto tx-white bg-primary">
									   Church Gifts
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
												                  <th>Gift Name</th>
												                  <th>Gift Price</th>
												                  <th>Gift Description</th>
																</tr>
															</thead>
															<tbody>
													 <?php

							                     $i = 0;
							                    $sql = "SELECT * FROM spiritual_gift_tbl";
							                    $query = mysqli_query($db, $sql) or die(mysqli_error($db));

							                    while($row = mysqli_fetch_array($query))
							                    {
							                          $gift_id    = $row['gift_id'];
							                          $gift_name  = $row['gift_name'];
							                          $gift_price = $row['gift_price'];
							                          $gift_desc  = $row['gift_desc'];
							                          
							                          $i++;
							                       ?>
							                    <tr>
							                        <td><?php echo $i; ?></td>
							                        <td><?php echo $gift_name; ?></td>
							                        <td><?php echo $gift_price; ?></td>
							                        <td><?php echo $gift_desc; ?></td>
                      
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