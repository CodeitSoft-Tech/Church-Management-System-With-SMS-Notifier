 <?php  

  include("includes/db_conn.php");

 // Add Expenses
  if(isset($_POST['add_expense']))
 {
   $expense_name     = mysqli_real_escape_string($db, $_POST['expense_name']);
   $expense_amount   = mysqli_real_escape_string($db, $_POST['expense_amount']);


    $insert_expense = "INSERT INTO tbl_expenses(expense_cat_id, expense_amount, expense_date)VALUES('$expense_name', '$expense_amount', NOW())";
    $run_expense   = mysqli_query($db, $insert_expense);

    if($run_expense)
    {
      echo "<script>alert('Data added successfully!')</script>";
      echo "<script>document.location='add-expense.php'</script>";
    }

 }