<?php
    
  include("../includes/db_conn.php");

  
  $ErrorLogin = array();


 if(isset($_POST['dept_login']))
 {

    $dept_name  = mysqli_real_escape_string($db, $_POST['dept_name']);
    $dept_pass  = mysqli_real_escape_string($db, $_POST['dept_pass']);

      if(empty($dept_name) || empty($dept_pass))
      {
        if($dept_name == "")
        {
          $ErrorLogin[] = "Username is required";
        }

        if($dept_pass == "")
        {
          $ErrorLogin[] = "Password is required";
        }

      }

      else
      {
        $query ="SELECT * FROM group_tbl WHERE username = '$dept_name'";
        $Result = $db->query($query);

        if($Result->num_rows == 1)
        {
         
          $MainSql = "SELECT * FROM group_tbl WHERE username ='$dept_name' AND password = '$dept_pass'";
          $MainResult = $db->query($MainSql);

          if($MainResult->num_rows == 1)
          {
            $value = $MainResult->fetch_assoc();

            $dept_name = $value['username'];
            
            // set session
            $_SESSION['deptUsername'] = $dept_name;
            //header('location:index.php');
            echo "<script>alert('Login successful. Welcome!')</script>";
            echo "<script>document.location='index.php'</script>";

          } 

          else
          {
            $ErrorLogin[] = "Incorrect username/password combination";
          }

        }

        else
        {
          $ErrorLogin[] = "username does not exists";
        }

        
      }

      }


?>