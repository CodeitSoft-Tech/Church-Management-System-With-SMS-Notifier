<?php  

    include("includes/db_conn.php");

  // Add 
  if(isset($_POST['add_don']))
 {
    
    $type_name = mysqli_real_escape_string($db, $_POST['type_name']);
  
    $insert_don = "INSERT INTO donation_types(type_name)VALUES('$type_name')";
    $run_don    = mysqli_query($db, $insert_don);

    if($run_don)
    {
      echo "<script>alert('Donation type added successfully!')</script>";
      echo "<script>document.location='donation-type.php'</script>";
    }
 }

 ?>



