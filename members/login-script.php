<?php 

  include("../includes/db_conn.php");

  
  $ErrorLogin = array();


 if(isset($_POST['btn_login']))
 {
   $member_name    = mysqli_real_escape_string($db, $_POST['username']);
   $member_pass    = mysqli_real_escape_string($db, $_POST['member_pass']);

  if(empty($member_name) || empty($member_pass))
  {
    if($member_name == "")
    {
      $ErrorLogin[] = "Username is required";
    }

    if($member_pass == "")
    {
      $ErrorLogin[] = "Password is required";
    }

  }

  else
  {
    $query ="SELECT * FROM members_tbl WHERE username = '$member_name'";
    $Result = $db->query($query);

    if($Result->num_rows == 1)
    {
     
      $MainSql = "SELECT * FROM members_tbl WHERE username ='$member_name' AND password = '$member_pass'";
      $MainResult = $db->query($MainSql);

      if($MainResult->num_rows == 1)
      {
        $value = $MainResult->fetch_assoc();

        $member_name = $value['username'];
        // set session
        $_SESSION['userName'] = $member_name;
        
        echo "<script>alert('Login Successful!')</script>";
        echo "<script>document.location='index.php'</script>";

        //header('location:index.php');

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