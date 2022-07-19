<?php
    
  include("includes/db_conn.php");

  
  $RegLogin = array();


 if(isset($_POST['admin_reg']))
 {
    $fullname      = mysqli_real_escape_string($db, $_POST['fullname']);
    $admin_name    = mysqli_real_escape_string($db, $_POST['admin_name']);
    $admin_pass    = mysqli_real_escape_string($db, $_POST['admin_pass']);

      if(empty($fullname) || empty($admin_name) || empty($admin_pass))
      {
        if($fullname == "")
        {
          $RegLogin[] = "Full Name is required";
        }

        if($admin_name == "")
        {
          $RegLogin[] = "Username is required";
        }

        if($admin_pass == "")
        {
          $RegLogin[] = "Password is required";
        }

      }

      else
      {

        $query ="INSERT INTO admin_tbl(fullname, username, password)VALUES('$fullname', '$admin_name', '$admin_pass')";
        $Result = $db->query($query);


        if($Result)
        {
            echo "<script>alert('Registration successful. Please login!')</script>";
            echo "<script>document.location='login.php'</script>";
        }

      }

        
}


?>