<?php 

	include("includes/header.php");

?>
<?php   

    // Count Messages
   $select_mail = "SELECT * FROM tbl_admin_mail";
   $run_mail    = mysqli_query($db, $select_mail);
   $row_mail    = mysqli_fetch_array($run_mail);
   $count_sent  = mysqli_num_rows($run_mail);

   $select_inbox = "SELECT * FROM tbl_inbox";
   $run_inbox    = mysqli_query($db, $select_inbox);
   $row_inbox    = mysqli_fetch_array($run_inbox);
   $count_inbox  = mysqli_num_rows($run_inbox);

   $select_mail = "SELECT * FROM tbl_draft";
   $run_mail    = mysqli_query($db, $select_mail);
   $row_mail    = mysqli_fetch_array($run_mail);
   $count_draft  = mysqli_num_rows($run_mail);

  
 if(isset($_GET['mail_id']))
  {
      $mail_id = $_GET['mail_id'];

      $select_msg = "SELECT * FROM tbl_admin_mail WHERE admin_mail_id = '$mail_id'";
      $run_msg    = mysqli_query($db, $select_msg);
      $row_msg    = mysqli_fetch_array($run_msg);
      $admin_mail_id  = $row_msg['admin_mail_id'];
      $sender_name    = $row_msg['sender_name'];
      $subject      = $row_msg['subject'];
      $message      = $row_msg['message'];
      $mail_date    = $row_msg['mail_date'];
 }
  
?>


<!-- Main Content-->
			<div class="main-content side-content pt-0">

				<div class="container-fluid">
					<div class="inner-body">

						<!-- Page Header -->
						<div class="page-header">
							<div>
								<h2 class="main-content-title tx-24 mg-b-5">View Sent Message</h2>
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="#">Inbox</a></li>
									<li class="breadcrumb-item active" aria-current="page">View Sent Messages</li>
								</ol>
							</div>
						</div>
						<!-- End Page Header -->

						<!-- Row -->
						<div class="row row-sm">
							<div class="col-lg-4 col-xl-3 col-md-12">
								<div class="card custom-card">
									<div class="card-body">
										<div class="">
											<a class="btn ripple btn-main-primary btn-compose btn-block" href="" id="btnCompose">Compose</a>
											<div class="main-mail-menu pd-r-0 mg-t-20">
												<nav class="nav main-nav-column mg-b-20">
													<a class="nav-link" href="inbox.php">
														<i class="fe fe-mail"></i> Inbox <span>
															<?php echo $count_inbox; ?>
														</span>
													</a>
													<a class="nav-link active" href="sentbox.php">
														<i class="fe fe-send"></i> Sentbox <span>
															<?php echo $count_sent; ?>
														</span>
													</a>
													<a class="nav-link" href="draft.php">
														<i class="fe fe-edit-2"></i> Drafts <span>
															<?php echo $count_draft; ?>
														</span>
													</a>
												</nav>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-8 col-xl-9 col-md-12">
								<div class="card custom-card">
									<div class="card-body h-100">
										<div class="email-media">
											<div class="mb-4 d-lg-flex">
												<h3> <?php echo $subject; ?> </h3>
												
											</div>
											<div class="media mt-0">
												<div class="media-body tx-inverse">
													<div class="float-right d-none d-md-flex fs-15">
														<small class="mr-2"><?php echo date("M d, Y h:i a",strtotime($mail_date));?></small>
													</div>
													<div class="media-title font-weight-semiblod"><span class="tx-18 font-weight-bold">Sender: <?php echo $sender_name; ?></span>
														<small class="mr-2 d-md-none"><?php echo date("M d, Y h:i a",strtotime($mail_date));?></small>
													</div>
												</div>
											</div>
										</div>
										<div class="eamil-body">
											
											<?php echo $message; ?>

										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- End Row -->
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
									<label class="form-label">To</label>
									<div>
										<input class="form-control" name="mail_to" placeholder="" type="text">
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



<?php 

 include("includes/footer.php");

?>
<?php
  
  if(isset($_POST['btn-send']))
  {

      $mail_to = mysqli_real_escape_string($db, $_POST['mail_to']);
      $subject = mysqli_real_escape_string($db, $_POST['subject']);
      $message = mysqli_real_escape_string($db, $_POST['message']);
     
      $insert_mail = "INSERT INTO tbl_mailbox(sender_email, subject, message, mail_date)VALUES('$mail_to', '$subject', '$message', NOW())";
      $run_mail  = mysqli_query($db, $insert_mail);

      $mail_admin = "INSERT INTO tbl_admin_mail(sender_email, subject, message, mail_date)VALUES('$mail_to', '$subject', '$message', NOW())";
      $run_admin_mail = mysqli_query($db, $mail_admin);


      if($run_mail)
      {
         echo "<script>alert('Message sent!')</script>";
         echo "<script>document.location='inbox.php'</script>";
      }


  }


  if(isset($_POST['btn-draft']))
  {
    
      $mail_to = mysqli_real_escape_string($db, $_POST['mail_to']);
      $subject = mysqli_real_escape_string($db, $_POST['subject']);
      $message = mysqli_real_escape_string($db, $_POST['message']);

      
      $insert_mail = "INSERT INTO tbl_draft(sender_email, subject, message, mail_date)VALUES('$mail_to', '$subject', '$message', NOW())";
      $run_mail  = mysqli_query($db, $insert_mail);

      if($run_mail)
      {
         echo "<script>alert('Message Saved!')</script>";
         echo "<script>document.location='inbox.php'</script>";
      }


  }

  ?>