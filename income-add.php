<?php  

    include("includes/db_conn.php");

  // Add Income
  if(isset($_POST['add_income']))
 {
   $income_name     = mysqli_real_escape_string($db, $_POST['income_name']);
   $income_amount   = mysqli_real_escape_string($db, $_POST['income_amt']);
   $income_tax      = mysqli_real_escape_string($db, $_POST['income_tax']);
   $income_type     = mysqli_real_escape_string($db, $_POST['income_type']);
   $income_acc      = mysqli_real_escape_string($db, $_POST['income_acc']);
   $income_desc     = mysqli_real_escape_string($db, $_POST['income_desc']);
   
  
    $insert_income = "INSERT INTO income_tbl(income_cat_id, income_amt, income_tax, income_type, income_account, income_desc, income_date)VALUES('$income_name', '$income_amount', '$income_tax', '$income_type', '$income_acc', '$income_desc', NOW())";
    $run_income   = mysqli_query($db, $insert_income);

    if($run_income)
    {
      echo "<script>alert('Income details added successfully!')</script>";
      echo "<script>document.location='add-income.php'</script>";
    }
 }


?>



