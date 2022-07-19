  <?php include("includes/header.php"); ?>
			<div class="main-content side-content pt-0">
				<div class="container-fluid">
					<div class="inner-body">
						<!-- Page Header -->
						<div class="page-header">
							<div>
								<h2 class="main-content-title tx-24 mg-b-5">Sermon</h2>
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">View Sermon</li>
								</ol>
							</div>
						</div>
						<!-- End Page Header -->

						
						<!-- Member Row -->
						<div class="row row-sm">
							<div class="col-md-12">
								<div class="card custom-card">
									<div class="card-header p-3 tx-medium my-auto tx-white bg-primary">
									  Sermon
									</div>
									<div class="card-body">
									<!-- Member Form -->
									<div class="row row-sm">
									<div class="col-md-12 col-lg-12 col-xl-12">
									<!-- Row -->
									<div class="row row-sm">
										<div class="col-lg-12">
											<div class="card custom-card overflow-hidden">
												<div class="card-body">		
													<div class="table-responsive">
														<table id="example2" class="table table-bordered border-t0 key-buttons text-nowrap w-100" >
															<thead>
																<tr>
																  <th>No.</th>
												                  <th>Sermon Title</th>
												                  <th>Sermon By</th>
												                  <th>Sermon File</th>
												                  <th>Sermon Status</th>           
												                  <th>Action</th>
																</tr>
															</thead>
															<tbody>
									        <?php

							                    $i = 0;
							                    $sql = "SELECT * FROM sermon_tbl";
							                    $query = mysqli_query($db, $sql) or die(mysqli_error($db));
							                    
							                    while($row = mysqli_fetch_array($query))
							                    {  
							                        $sermon_id     = $row['sermon_id'];
							                        $sermon_title  = $row['sermon_name'];
							                        $sermon_by     = $row['sermon_by'];
							                        $sermon_type   = $row['sermon_type'];
							                        $sermon_file   = $row['sermon_file'];
							                        $sermon_status = $row['sermon_status'];
							                        $sermon_desc   = $row['sermon_desc'];
							                        $sermon_date   = $row['sermon_date'];

							                        $i++;

							                  ?>
							                    <tr>
							                      <td><?php echo $i;     ?></td>
							                      <td><?php echo $sermon_title;  ?></td> 
							                      <td><?php echo $sermon_by;     ?></td> 
							                      <td>
							                         <?php

							                            if($sermon_type == "video")
							                            {
							                                echo "<video width='200' height='100' controls>
							                                      <source src='church-images/sermons/$sermon_file; ?>' type='video/mp4'>
							                                      <source src='church-images/sermons/$sermon_file; ?>' type='video/mkv'>
							                                     </video>
							                                     ";
							                            }

							                            elseif($sermon_type == "Audio" || $sermon_type == "audio/mpeg")
							                            {
							                               echo "<audio controls style='background: blue;'>

							                                  <source src='church-images/sermons/$sermon_file' type='audio/aac'>

							                                  <source src='church-images/sermons/$sermon_file' type='audio/mp3'>

							                                  <source src='church-images/sermons/$sermon_file' type='audio/ogg'>

							                                  </audio>
							                                     ";
							                            }
							                            elseif($sermon_type == "application/pdf")
							                            {
							                              echo"<embed type='application/pdf' src='church-images/sermons/$sermon_file' width='200' height='200'> ";
							                            }
							                            elseif($sermon_type == "Text")
							                            {
							                               echo"
							                                   <iframe src='church-images/sermons/$sermon_file' width='402' height='327' frameborder='0' scrolling='no'></iframe> ";
							                            }


							                         ?>
						                      </td> 
						                      <td>
						                        <?php 
						                          if($sermon_status == 'Upcoming')
						                           {
						                                echo "<span class='badge badge-warning'>Upcoming</span>";
						                           }
						                           elseif($sermon_status == 'Ongoing')
						                           {
						                                echo "<span class='badge badge-success'>Ongoing</span>";
						                           }
						                           else
						                           {
						                               echo "<span class='badge badge-danger'>Archived</span>";
						                           }  


						                        ?>
						                      </td>   
                       
                             
												<td>
									            
									            <a style="background: #6259CA; border: 1px solid #6259CA" class="btn ripple btn-info" data-target="#update<?php echo $sermon_id;?>" data-toggle="modal" href="#update<?php echo $sermon_id;?>"> <i  class="fa fa-eye"></i>
								                </a>
								               
								               <a style="background: red; border: 1px solid red" class="btn ripple btn-info" data-target="#delete<?php echo $sermon_id;?>" data-toggle="modal" href="#delete<?php echo $sermon_id;?>"> <i class="fa fa-trash fa-danger"></i>
								               </a>
										      </td>	


									<!-- Large Modal -->
									<div class="modal" id="update<?php echo $sermon_id;?>">
										<div class="modal-dialog modal-lg" role="document">
											<div class="modal-content modal-content-demo">
												<div class="modal-header">
													<h6 class="modal-title"> Update Sermon Details </h6>
													<button aria-label="Close" class="close" data-dismiss="modal" type="button">
													<span aria-hidden="true">&times;</span>
												    </button>
												</div>
												<div class="modal-body">
												
												<form action="sermon-update.php" method="post" enctype="multipart/form-data">
												<div class="">
													<div class="form-group col-md-9">
														<label style="font-size: 16.5px; font-weight: 700;">
															Sermon Title
														</label>
														 <input type="hidden" class="form-control" name="sermon_id" value="<?php echo $sermon_id; ?>"> 
														<input type="text" value="<?php echo $sermon_title; ?>" name="sermon_title" class="form-control" required="">
													</div>


													<div class="form-group col-md-9">
														<div class="row row-sm">
															<div class="col-sm-6">
																<label style="font-size: 16.5px; font-weight: 700;">Sermon By</label>
																 <input type="hidden" class="form-control" name="sermon_id" value="<?php echo $sermon_id; ?>"> 
																  <input type="text" name="sermon_by" value="<?php echo $sermon_by; ?>" class="form-control" required="" >
															</div>

															<div class="col-sm-6 mg-t-20 mg-sm-t-0">
																<label style="font-size: 16.5px; font-weight: 700;">Sermon Date</label>
																<input type="hidden" class="form-control" name="sermon_id" value="<?php echo $sermon_id; ?>"> 
																 <input type="date" name="sermon_date" value="<?php echo $sermon_date; ?>" class="form-control" required="">
															</div>
														</div>
													</div>


													<div class="form-group col-md-9">
														<label style="font-size: 16.5px; font-weight: 700;">Sermon Status</label>
														<div class="pos-relative">
															<select name="sermon_status" class="form-control select select2" required>
															    <option value="<?php echo $sermon_status; ?>"><?php echo $sermon_status; ?></option>
																<option value="Upcoming">Upcoming</option>
				    											<option value="Ongoing">Ongoing</option>
				    											<option value="Archived">Archived</option>
															</select>
														</div>
													</div>

													

													<div class="form-group col-md-9">
														<label style="font-size: 16.5px; font-weight: 700;">Sermon File (upload Image to update)</label>
														<div class="pos-relative">
														 <input type="hidden" class="form-control" name="sermon_id" value="<?php echo $sermon_id; ?>"> 
												         <input type="file" class="form-control" name="sermon_file"> <br>
												             
									                    <?php

									                            if($sermon_type == "Video")
									                            {
									                                echo "<video width='200' height='100' controls>
									                                      <source src='church-images/sermons/$sermon_file; ?>' type='video/mp4'>
									                                     </video>
									                                     ";
									                            }

									                            elseif($sermon_type == "Audio" || $sermon_type = "audio/mpeg")
									                            {
									                               echo "<audio controls style='background: blue;'>

									                                  <source src='church-images/sermons/$sermon_file' type='audio/aac'>

									                                  <source src='church-images/sermons/$sermon_file' type='audio/mp3'>

									                                  <source src='church-images/sermons/$sermon_file' type='audio/ogg'>

									                                  </audio>
									                                     ";
									                            }
									                            elseif($sermon_type == "application/pdf" || $sermon_type == "PDF")
									                            {
									                                echo"
									                                   <embed type='application/pdf' src='church-images/sermons/$sermon_file' width='500' height='300'> ";
									                            }

									                            elseif($sermon_type == "Text")
									                            {
									                                echo"
									                                   <iframe src='church-images/sermons/$sermon_file' width='302' height='227' frameborder='0' scrolling='no'></iframe> ";
									                                 //  https://onedrive.live.com/embed?cid=37B1603CDE7474EF&resid=37B1603CDE7474EF%21106&authkey=AJpLEufPEFcuxto&em=2
									                            }


									                         ?>              

														</div>
													</div>

													<div class="form-group col-md-9">
													<label style="font-size: 16.5px; font-weight: 700;">File Type</label>
														<div class="pos-relative">
													     <input type="hidden" class="form-control" name="sermon_id" value="<?php echo $sermon_id; ?>"> 
														<select name="sermon_type" class="form-control select select2" required>
														<option value="<?php echo $sermon_type; ?>"><?php echo $sermon_type; ?></option>
														<option value="audio/mpeg">audio/mpeg</option>
														<option value="Text">Text</option>
														<option value="application/pdf">application/pdf</option>
														</select>
														</div>
													</div>
													
													
												</div> <!-- div class end -->
										

						                </div>
									    <div class="modal-footer">
										<button type="submit" class="btn ripple btn-primary">Update Details</button>
										<button class="btn ripple btn-danger" data-dismiss="modal" type="button">Close</button>
									    </div>
									    </form> <!-- Form End -->
									</div>
								</div>
							</div>
							<!--End Large Modal -->


			 <!-- Delete Modal -->
			<div class="modal" id="delete<?php echo $sermon_id;?>">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content modal-content-demo">
						<div class="modal-header">
							<h6 class="modal-title">Delete Sermon Details</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
						</div>
						<div class="modal-body">
							<form action="sermon-del.php" method="post">
								 <input type="hidden" class="form-control" name="sermon_id" value="<?php echo $sermon_id; ?>" required> 
                      
        <p>Are you sure you want to <b>Delete</b> this Sermon?</p>
							
						</div>
						<div class="modal-footer">
							<button class="btn ripple btn-primary" name="delete" type="submit">Yes</button>
							<button class="btn ripple btn-danger" data-dismiss="modal" type="button">No</button>
						</div>
						</form>
					</div>
				</div>
			</div>
			<!--End Delete Modal -->

         <?php } ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		    </div>
			</div>
			</div>





<?php include("includes/footer.php"); ?>