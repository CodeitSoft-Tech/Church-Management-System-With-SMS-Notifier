<?php
    
  include("../includes/db_conn.php");

  
  $ErrorLogin = array();


 if(isset($_POST['ministry_login']))
 {

    $min_name  = mysqli_real_escape_string($db, $_POST['min_name']);
    $min_pass  = mysqli_real_escape_string($db, $_POST['min_pass']);

      if(empty($min_name) || empty($min_pass))
      {
        if($min_name == "")
        {
          $ErrorLogin[] = "Username is required";
        }

        if($min_pass == "")
        {
          $ErrorLogin[] = "Password is required";
        }

      }

      else
      {
        $query ="SELECT * FROM ministry_tbl WHERE username = '$min_name'";
        $Result = $db->query($query);

        if($Result->num_rows == 1)
        {
         
          $MainSql = "SELECT * FROM ministry_tbl WHERE username ='$min_name' AND password = '$min_pass'";
          $MainResult = $db->query($MainSql);

          if($MainResult->num_rows == 1)
          {
            $value = $MainResult->fetch_assoc();

            $min_name = $value['username'];
            
            // set session
            $_SESSION['minUsername'] = $min_name;
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