
<?php
    
    session_start();
    include("../includes/db_conn.php");
    include("login-script.php");    
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Hillemunah | Department Panel </title>
      <!-- Font Awesome Icons -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap css-->
    <link href="../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet"/>

    <!-- Icons css-->
    <link href="../assets/plugins/web-fonts/icons.css" rel="stylesheet"/>
    <link href="../assets/plugins/web-fonts/font-awesome/font-awesome.min.css" rel="stylesheet">
    <link href="../assets/plugins/web-fonts/plugin.css" rel="stylesheet"/>
    <link rel="shortcut icon" type="image/png" href="icon.png">

<style type="text/css">
/* Google Font Link */
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Poppins" , sans-serif;
}
body{
  min-height: 100vh;
  display: flex;
  align-items: center;
  justify-content: center;
  background: #6259CA;
  padding: 30px;
}
.container{
  position: relative;
  max-width: 850px;
  width: 100%;
  background: #fff;
  padding: 40px 30px;
  box-shadow: 0 5px 10px rgba(0,0,0,0.2);
  perspective: 2700px;
}
.container .cover{
  position: absolute;
  top: 0;
  left: 50%;
  height: 100%;
  width: 50%;
  z-index: 98;
  transition: all 1s ease;
  transform-origin: left;
  transform-style: preserve-3d;
}
.container .cover::before{
  content: '';
  position: absolute;
  height: 100%;
  width: 100%;
  background: #6259CA;
  opacity: 0.5;
  z-index: 100;
}
.container .cover::after{
  content: '';
  position: absolute;
  height: 100%;
  width: 100%;
  background: #6259CA;
  opacity: 0.5;
  z-index: 100;
  transform: rotateY(180deg);
}
.container #flip:checked ~ .cover{
  transform: rotateY(-180deg);
}
.container .cover img{
  position: absolute;
  height: 100%;
  width: 100%;
  object-fit: cover;
  z-index: 12;
  backface-visibility: hidden;
}
.container .cover .back .backImg{
  transform: rotateY(180deg);
  transform: rotateY(180deg);
}
.container .cover .text{
  position: absolute;
  z-index: 111;
  height: 100%;
  width: 100%;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
}
.cover .text .text-1,
.cover .text .text-2{
  font-size: 26px;
  font-weight: 600;
  color: #fff;
  text-align: center;
  backface-visibility: hidden;
}
.cover .back .text .text-1,
.cover .back .text .text-2{
  transform: rotateY(180deg);
}
.cover .text .text-2{
  font-size: 15px;
  font-weight: 500;
}
.container .forms{
  height: 100%;
  width: 100%;
  background: #fff;
}
.container .form-content{
  display: flex;
  align-items: center;
  justify-content: space-between;
}
.form-content .login-form,
.form-content .signup-form{
  width: calc(100% / 2 - 25px);
}
.forms .form-content .title{
  position: relative;
  font-size: 24px;
  font-weight: 500;
  color: #333;
}
.forms .form-content .title:before{
  content: '';
  position: absolute;
  left: 0;
  bottom: 0;
  height: 3px;
  width: 25px;
  background: #6259CA;
}
.forms .signup-form  .title:before{
  width: 20px;
}
.forms .form-content .input-boxes{
  margin-top: 30px;
}
.forms .form-content .input-box{
  display: flex;
  align-items: center;
  height: 50px;
  width: 100%;
  margin: 10px 0;
  position: relative;
}
.form-content .input-box input{
  height: 100%;
  width: 100%;
  outline: none;
  border: none;
  padding: 0 30px;
  font-size: 16px;
  font-weight: 500;
  border-bottom: 2px solid rgba(0,0,0,0.2);
  transition: all 0.3s ease;
}
.form-content .input-box input:focus,
.form-content .input-box input:valid{
  border-color: #6259CA;
}
.form-content .input-box i{
  position: absolute;
  color: #6259CA;
  font-size: 17px;
}
.forms .form-content .text{
  font-size: 14px;
  font-weight: 500;
  color: #333;
}
.forms .form-content .text a{
  text-decoration: none;
}
.forms .form-content .text a:hover{
  text-decoration: underline;
}
.forms .form-content .button{
  color: #fff;
  margin-top: 40px;
}
.forms .form-content .button input{
  color: #fff;
  background: #6259CA;
  border-radius: 6px;
  padding: 0;
  cursor: pointer;
  transition: all 0.4s ease;
}
.forms .form-content .button input:hover{
  background: #6259CA;
}
.forms .form-content label{
  color: #6259CA;
  cursor: pointer;
}
.forms .form-content label:hover{
  text-decoration: underline;
}
.forms .form-content .login-text,
.forms .form-content .sign-up-text{
  text-align: center;
  margin-top: 25px;
}
.container #flip{
  display: none;
}
@media (max-width: 730px) {
  .container .cover{
    display: none;
  }
  .form-content .login-form,
  .form-content .signup-form{
    width: 100%;
  }
  .form-content .signup-form{
    display: none;
  }
  .container #flip:checked ~ .forms .signup-form{
    display: block;
  }
  .container #flip:checked ~ .forms .login-form{
    display: none;
  }
}
    </style>
   </head>
<body>
  <div class="container">

    <input type="checkbox" id="flip">
    <div class="cover">
      <div class="front">
        <img src="church_images/hillmunah.png" alt="Hillemunah">
        <div class="text">
          <span class="text-1">Be still, and know that <br> I am God.</span>
          <span class="text-2">Psalm 46:10</span>
        </div>
      </div>
      <div class="back">
        <img class="backImg" src="church_images/prayer.jpg" alt="Prayer">
        <div class="text">
          <span class="text-1">Pray Without Ceasing</span>
          <span class="text-2">1 Thess 5:17</span>
        </div>
      </div>
    </div>
    <div class="forms">
        <div class="form-content">
          <div class="login-form">
            <div class="title">Department Panel</div>
          <form action="login.php" method="post">
            <br>
             <div class="messages">
              <?php 
                  if($ErrorLogin)
                  {
                    foreach ($ErrorLogin as $key => $value) {
                      echo '<div class="alert alert-danger  role="alert">
                      <i class="fa fa-exclamation text-white"></i>
                      '.$value.'
                      </div>';
                    }
                  }

              ?>
            </div>
            <div class="input-boxes">
              
              <div class="input-box">
                <i class="fas fa-user"></i>
                <input type="text" placeholder="Username" name="dept_name">
              </div>
              
              <div class="input-box">
                <i class="fas fa-lock"></i>
                <input type="password" placeholder="Password" name="dept_pass">
              </div>

              <div class="button input-box">
                <input type="submit" name="dept_login" value="Login">
              </div>

              <div class="text sign-up-text">View Verse? <label for="flip">Click here</label></div>
            </div>
        </form>
      </div>

       <div class="signup-form">
        <div class="title">Member Panel</div>
        <form action="login.php" method="post">
             <div class="messages">
              <?php 
                  if($ErrorLogin)
                  {
                    foreach ($ErrorLogin as $key => $value) {
                      echo '<div class="alert alert-danger  role="alert">
                      <i class="fa fa-exclamation text-white"></i>
                      '.$value.'
                      </div>';
                    }
                  }

              ?>
            </div>
            <div class="input-boxes">
              
              <div class="input-box">
                <i class="fas fa-user"></i>
                <input type="text" placeholder="Username" name="dept_name">
              </div>
              
              <div class="input-box">
                <i class="fas fa-lock"></i>
                <input type="password" placeholder="Password" name="dept_pass">
              </div>

              <div class="button input-box">
                <input type="submit" name="dept_login" value="Login">
              </div>

              <div class="text sign-up-text">View Verse? <label for="flip">Click here</label></div>
            </div>
        </form>
    </div> 

    </div>
    </div>
  </div>



        <!-- REQUIRED SCRIPTS -->
    <!-- Jquery js-->
    <script src="../assets/plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap js-->
    <script src="../assets/plugins/bootstrap/js/popper.min.js"></script>
    <script src="../assets/plugins/bootstrap/js/bootstrap.min.js"></script>

    <!-- Internal Data Table js -->
    <script src="../assets/plugins/datatable/jquery.dataTables.min.js"></script>
    <script src="../assets/plugins/datatable/dataTables.bootstrap4.min.js"></script>
    <script src="../assets/plugins/datatable/dataTables.responsive.min.js"></script>
    <script src="../assets/plugins/datatable/fileexport/dataTables.buttons.min.js"></script>
    <script src="../assets/plugins/datatable/fileexport/buttons.bootstrap4.min.js"></script>
    <script src="../assets/plugins/datatable/fileexport/jszip.min.js"></script>
    <script src="../assets/plugins/datatable/fileexport/pdfmake.min.js"></script>
    <script src="../assets/plugins/datatable/fileexport/vfs_fonts.js"></script>
    <script src="../assets/plugins/datatable/fileexport/buttons.html5.min.js"></script>
    <script src="../assets/plugins/datatable/fileexport/buttons.print.min.js"></script>
    <script src="../assets/plugins/datatable/fileexport/buttons.colVis.min.js"></script>
    <script src="../assets/js/table-data.js"></script>


    <!-- Internal Fileuploads js-->
    <script src="../assets/plugins/fileuploads/js/fileupload.js"></script>
    <script src="../assets/plugins/fileuploads/js/file-upload.js"></script>

    <!-- InternalFancy uploader js-->
    <script src="../assets/plugins/fancyuploder/jquery.ui.widget.js"></script>
    <script src="../assets/plugins/fancyuploder/jquery.fileupload.js"></script>
    <script src="../assets/plugins/fancyuploder/jquery.iframe-transport.js"></script>
    <script src="../assets/plugins/fancyuploder/jquery.fancy-fileupload.js"></script>
    <script src="../assets/plugins/fancyuploder/fancy-uploader.js"></script>

        <!-- Internal Form-elements js-->
    <script src="../assets/js/form-elements.js"></script>

    <!-- Internal Jquery-Ui js-->
    <script src="../assets/plugins/jquery-ui/ui/widgets/datepicker.js"></script>

    <!-- Internal Jquery.maskedinput js-->
    <script src="../assets/plugins/jquery.maskedinput/jquery.maskedinput.js"></script>

    <!-- Internal Specturm-colorpicker js-->
    <script src="../assets/plugins/spectrum-colorpicker/spectrum.js"></script>

    <!-- Internal Ion-rangeslider js-->
    <script src="../assets/plugins/ion-rangeslider/js/ion.rangeSlider.min.js"></script>

    <!-- Select2 js-->
    <script src="../assets/plugins/select2/js/select2.min.js"></script>
    <script src="../assets/js/select2.js"></script>


    <!-- Internal Check-all-mail js-->
    <script src="../assets/js/check-all-mail.js"></script>

    <!-- Sidebar js -->
    <script src="../assets/plugins/sidebar/sidebar.js"></script>

    <!-- Select2 js-->
    <script src="../assets/plugins/select2/js/select2.min.js"></script>

    <!-- Sticky js -->
    <script src="../assets/js/sticky.js"></script>

    <!-- Perfect-scrollbar js -->
    <script src="../assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>

    <!-- Custom js -->
    <script src="../assets/js/custom.js"></script>

</body>
</html>
