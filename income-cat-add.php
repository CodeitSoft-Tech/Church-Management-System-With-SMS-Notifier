<?php  

    include("includes/db_conn.php");

  // Add Income
  if(isset($_POST['income_cat']))
 {
    
    $income_cat_name = mysqli_real_escape_string($db, $_POST['income_cat_name']);
  
    $insert_income = "INSERT INTO income_cat(income_cat_name)VALUES('$income_cat_name')";
    $run_income   = mysqli_query($db, $insert_income);

    if($run_income)
    {
      echo "<script>alert('Income category added successfully!')</script>";
      echo "<script>document.location='income-cat.php'</script>";
    }

 }

 ?>



