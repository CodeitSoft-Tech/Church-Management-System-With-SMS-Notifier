<?php

  include("../includes/db_conn.php");
  
  if(isset($_POST['btn-send']))
  {

      $fullname = mysqli_real_escape_string($db, $_POST['fullname']);
      $mail_to  = mysqli_real_escape_string($db, $_POST['mail_to']);
      $subject  = mysqli_real_escape_string($db, $_POST['subject']);
      $message  = mysqli_real_escape_string($db, $_POST['message']);
     
      $insert_mail = "INSERT INTO tbl_members_sentbox(sender_name, receiver_name, subject, message, mail_date)VALUES('$fullname', '$mail_to', '$subject', '$message', NOW())";
      $run_mail  = mysqli_query($db, $insert_mail);

      if($run_mail)
      {
         echo "<script>alert('Message sent!')</script>";
         echo "<script>document.location='index.php'</script>";
      }


  }


   if(isset($_POST['btn-draft']))
   {

        $name      = mysqli_real_escape_string($db, $_POST['fullname']);
        $receiver  = mysqli_real_escape_string($db, $_POST['mail_to']);
        $sub       = mysqli_real_escape_string($db, $_POST['subject']);
        $msg       = mysqli_real_escape_string($db, $_POST['message']);

        
        $insert_draft = "INSERT INTO tbl_members_draft(sender_name, receiver_name, subject, message, draft_date)VALUES('$name', '$receiver', '$sub','$msg', NOW())";
        $run_draft  = mysqli_query($db, $insert_draft);

        if($run_draft)
        {
           echo "<script>alert('Message Saved!')</script>";
           echo "<script>document.location='index.php'</script>";
        }


  }


?>