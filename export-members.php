<?php include("includes/header.php"); ?>


			<div class="main-content side-content pt-0">
				<div class="container-fluid">
					<div class="inner-body">
						<!-- Page Header -->
						<div class="page-header">
							<div>
								<h2 class="main-content-title tx-24 mg-b-5">Members</h2>
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Export Members Data</li>
								</ol>
							</div>
						</div>
						<!-- End Page Header -->

						
						<!-- Member Row -->
						<div class="row row-sm">
							<div class="col-md-12">
								<div class="card custom-card">
									<div class="card-header p-3 tx-medium my-auto tx-white bg-primary">
									  Members 
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
																  
												                  <th>Member Name</th>
												                  <th>Ministry</th>
												                  <th>Department</th>
												                  <th>Location</th>
												                  <th>Contact</th>
												                  <th>Volunteer</th>
												                  <th>Marital Status</th>
												                  <th>DOB</th>
												                  <th>Gender</th>
												                  <th>Date Joined</th>
																</tr>
															</thead>
															<tbody>
												            <?php

										                    $i = 0;
										                    $sql = "SELECT * FROM members_tbl";
										                    $query = mysqli_query($db, $sql) or die(mysqli_error($db));

										                        while($row = mysqli_fetch_array($query))
										                        {

										                          $member_id      = $row['member_id'];
										                          $min_id         = $row['ministry_id'];
										                          $grp_id         = $row['group_id'];
										                          $member_name    = $row['member_name'];
										                          $phone          = $row['member_phone'];
										                          $volunteer      = $row['volunteer'];
										                          $location       = $row['location'];
										                          $email          = $row['member_email'];
										                          $dob            = $row['dob'];
										                          $m_status       = $row['marital_status'];
										                          $gender         = $row['member_gender'];
										                          $m_img          = $row['member_photo'];
										                          $date_added     = $row['date_added'];
										                         
										                          // Get Group
										                          $select_grp    = "SELECT * FROM group_tbl WHERE group_id = '$grp_id'";
										                          $run_grp       = mysqli_query($db, $select_grp);
										                          $row           = mysqli_fetch_array($run_grp);
										                          $grp_name      = $row['group_name'];

										                           // Get Ministry 
										                          $select_min    = "SELECT * FROM ministry_tbl WHERE ministry_id = '$min_id'";
										                          $run_min       = mysqli_query($db, $select_min);
										                          $row_min       = mysqli_fetch_array($run_min);
										                          $min_name      = $row_min['ministry_name']; 
										 

										                          $i++;
										                        

										                      ?>
										                    <tr>
										                      
										                      <td><?php echo $member_name;  ?></td>
										                      <td><?php echo $min_name;  ?></td>     
										                      <td><?php echo $grp_name;  ?></td>                     
										                      <td><?php echo $location;  ?></td>      
										                      <td><?php echo $phone; ?>  </td>
										                      <td><?php echo $volunteer; ?>  </td>
										                      <td><?php echo $m_status; ?>  </td>
										                      <td><?php echo date("M d, Y",strtotime($dob)); ?>  </td>
										                      <td><?php echo $gender; ?>  </td>
										                      <td><?php echo date("M d, Y",strtotime($date_added)); ?></td>	
										                     </tr>

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