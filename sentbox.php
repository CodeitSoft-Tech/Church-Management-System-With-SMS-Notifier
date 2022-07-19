<?php 

 include("includes/header.php");

?>
<?php 
  
   $select_mail = "SELECT * FROM tbl_admin_mail";
   $run_mail    = mysqli_query($db, $select_mail);
   $count_sent  = mysqli_num_rows($run_mail);

   $select_mail = "SELECT * FROM tbl_draft";
   $run_mail    = mysqli_query($db, $select_mail);
   $count_draft = mysqli_num_rows($run_mail);

   $select_mail = "SELECT * FROM tbl_inbox";
   $run_mail    = mysqli_query($db, $select_mail);
   $count_inbox = mysqli_num_rows($run_mail);

  
?>

<!-- Main Content-->
			<div class="main-content side-content pt-0">

				<div class="container-fluid">
					<div class="inner-body">

						<!-- Page Header -->
						<div class="page-header">
							<div>
								<h2 class="main-content-title tx-24 mg-b-5">Sentbox</h2>
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="#">Messages</a></li>
									<li class="breadcrumb-item active" aria-current="page">Sentbox</li>
								</ol>
							</div>
						</div>
						<!-- End Page Header -->

						<!-- row -->
						<div class="row row-sm">
							<div class="col-xl-3 col-lg-4">
								<div class="card custom-card mail-container task-container overflow-hidden">
									<div class="">
										<div class="p-4 border-bottom">
										<a class="btn btn-main-primary btn-block btn-compose" href="" id="btnCompose">Compose</a>
										</div>
										<div class="card-body tab-list-items">
											<div class="main-content-left main-content-left-mail">
												<div class="main-mail-menu">
													<nav class="nav main-nav-column mg-b-20">
														<a class="nav-link" href="inbox.php">
															<i class="fe fe-mail"></i> Inbox <span><?php echo $count_inbox; ?></span>
														</a>
														<a class="nav-link active" href="sentbox.php">
															<i class="fe fe-send"></i> Sentbox <span><?php echo $count_sent; ?></span>
														</a>
														<a class="nav-link" href="draft.php">
															<i class="fe fe-edit"></i> Drafts <span><?php echo $count_draft; ?></span>
														</a>
														
													</nav>
												</div><!-- main-mail-menu -->
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-xl-9 col-lg-8  main-content-body-mail1">
								<div class="card custom-card mail-container task-container overflow-hidden">
									<div class="inbox-body p-4">
										<div class="mail-option">
										</div>
										<div class="table-responsive">
											<table class="table table-inbox text-md-nowrap table-hover text-nowrap">
												<tbody>
													<?php

													    $select_mail = "SELECT * FROM tbl_admin_mail";
   														$run_mail    = mysqli_query($db, $select_mail);
													    $count       = mysqli_num_rows($run_mail);
					                                   if($count == 0)
					                                   {
					                                    echo "<p style='color: #6259CA'> No messages found </p>";
					                                   }
					                                   else
					                                   {
														   while($row_mail    = mysqli_fetch_array($run_mail))
														 	{
															   $admin_mail_id = $row_mail['admin_mail_id'];
															   $sender_name   = $row_mail['sender_name'];
															   $subject       = $row_mail['subject'];
															   $message       = $row_mail['message'];
															   $mail_date     = $row_mail['mail_date'];
														
													?>

													<tr class="">
														<td class="inbox-small-cells">
															 <a style="background: red; border: 1px solid red" class="btn ripple btn-info" data-target="#delete<?php echo $admin_mail_id;?>" data-toggle="modal" href="#delete<?php echo $admin_mail_id;?>"> <i class="fa fa-trash fa-danger"></i>
	                             </a>
														</td>
														<td class="view-message view-message">
														<a href="read-sent-message.php?mail_id=<?php echo $admin_mail_id; ?>">
															<?php echo $subject; ?>
														</a>
														</td>
														<td class="view-message text-right font-weight-semibold">
														<?php echo date("M d, Y",strtotime($mail_date)); ?>	
														</td>
														
													</tr>


													 <!-- Delete Modal -->
								<div class="modal" id="delete<?php echo $admin_mail_id;?>">
									<div class="modal-dialog modal-lg" role="document">
										<div class="modal-content modal-content-demo">
											<div class="modal-header">
												<h6 class="modal-title">Delete Sentbox Details</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
											</div>
											<div class="modal-body">
												<form action="sentbox-del.php" method="post">
													 <input type="hidden" class="form-control" name="admin_mail_id" value="<?php echo $admin_mail_id; ?>" required> 
					                      
					                                  <p>Are you sure you want to <b>Delete</b> this Message?</p>
												
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
												<?php } } ?>
												</tbody>
											</table>
										</div>
									</div>
									<!-- mail-content -->
								</div>
							</div>
						</div>
						<!-- /row -->
					</div>
				</div>
			</div>
			<!-- End Main Content-->

	<!-- mail-compose modal -->
			<div class="main-mail-compose">
				<div>
					<div class="container">
						<div class="main-mail-compose-box">
							<div class="main-mail-compose-header">
								<span>New Message</span>
								<nav class="nav">
									<a class="nav-link" href=""><i class="fas fa-minus"></i></a> <a class="nav-link" href=""><i class="fas fa-compress"></i></a> <a class="nav-link" href=""><i class="fas fa-times"></i></a>
								</nav>
							</div>
							<form method="post" action="">
							<div class="main-mail-compose-body">

								<div class="form-group mb-0">
									<label class="form-label">From</label>
									<div>
										<input class="form-control" name="mail_from" type="text">
									</div>
								</div>

								<div class="form-group mb-0">
									<label class="form-label">To</label>
									<div>
										<input class="form-control" name="mail_to" placeholder="Member Name" type="text">
									</div>
								</div>

								<div class="form-group mb-0">
									<label class="form-label">Subject</label>
									<div>
										<input class="form-control" name="subject" type="text">
									</div>
								</div>

								<div class="form-group">
									<textarea class="form-control" name="message" placeholder="" rows="12"></textarea>
								</div>

								<div class="form-group mg-b-0">
									<nav class="nav">
										<button style="margin-right: 5px;" type="reset"  name="btn-draft" class="btn ripple btn-primary">Clear</button>
										<button type="submit" name="btn-draft" class="btn ripple btn-primary">Draft</button>
									</nav>
									<button type="submit" name="btn-send" class="btn ripple btn-primary">Send</button>
								</div>
							</div>
						</form>
						</div>
					</div>
				</div>
			</div>
			<!-- End mail-compose modal-->

<?php include("includes/footer.php"); ?>
<?php
  
  if(isset($_POST['btn-send']))
  {
  		$mail_from = mysqli_real_escape_string($db, $_POST['mail_from']);
      $mail_to   = mysqli_real_escape_string($db, $_POST['mail_to']);
      $subject   = mysqli_real_escape_string($db, $_POST['subject']);
      $body      = mysqli_real_escape_string($db, $_POST['message']);

      // Send to Mail
      $headers = "From: hillemunah@gmail.com";
		  $to      = $mail_to;
		  mail($to, $subject, $body, $headers);


     
      $insert_mail = "INSERT INTO tbl_mailbox(sender_name, receiver_name, subject, message, mail_date)VALUES('$mail_from', '$mail_to', '$subject', '$message', NOW())";
      $run_mail  = mysqli_query($db, $insert_mail);

      $mail_admin = "INSERT INTO tbl_admin_mail(sender_name, receiver_name, subject, message, mail_date)VALUES('$mail_from', '$mail_to', '$subject', '$message', NOW())";
      $run_mail = mysqli_query($db, $mail_admin);


      if($run_mail)
      {
         echo "<script>alert('Message sent!')</script>";
         echo "<script>document.location='inbox.php'</script>";
      }


  }


  if(isset($_POST['btn-draft']))
  {
    
    	$mail_from = mysqli_real_escape_string($db, $_POST['mail_from']);
      $mail_to = mysqli_real_escape_string($db, $_POST['mail_to']);
      $subject = mysqli_real_escape_string($db, $_POST['subject']);
      $message = mysqli_real_escape_string($db, $_POST['message']);

      
      $insert_mail = "INSERT INTO tbl_draft(sender_name, receiver_name, subject, message, mail_date)VALUES('$mail_from', '$mail_to', '$subject', '$message', NOW())";
      $run_mail  = mysqli_query($db, $insert_mail);

      if($run_mail)
      {
         echo "<script>alert('Message Saved!')</script>";
         echo "<script>document.location='inbox.php'</script>";
      }


  }

  ?>
