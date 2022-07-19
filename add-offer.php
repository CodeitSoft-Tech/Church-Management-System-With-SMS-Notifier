<?php  

    include("includes/db_conn.php");

  // Add Expenses
  if(isset($_POST['add_offer']))
 {
    
    $amount = mysqli_real_escape_string($db, $_POST['amount']);
    $date   = mysqli_real_escape_string($db, $_POST['date']);
  
  
    $insert_offer = "INSERT INTO main_offertory(offertory_amt, offertory_date)VALUES('$amount', '$date')";
    $run_offer    = mysqli_query($db, $insert_offer);

    if($run_offer)
    {
      echo "<script>alert('Main offertory added successfully!')</script>";
      echo "<script>document.location='main-offertory.php'</script>";
    }
 }

 ?>



