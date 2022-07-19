<?php  

    include("includes/db_conn.php");

  // Add Expenses
  if(isset($_POST['expense_cat']))
 {
    
    $expense_cat_name = mysqli_real_escape_string($db, $_POST['expense_cat_name']);
  
  
    $insert_expense = "INSERT INTO expense_cat(expense_cat_name)VALUES('$expense_cat_name')";
    $run_expense    = mysqli_query($db, $insert_expense);

    if($run_expense)
    {
      echo "<script>alert('Expenses category added successfully!')</script>";
      echo "<script>document.location='expense-cat.php'</script>";
    }
 }

 ?>



