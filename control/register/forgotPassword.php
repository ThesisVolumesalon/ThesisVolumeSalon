<?php
session_start();
error_reporting(0);
$Error_For_Forgot_Password = $_SESSION['error_forgot_password'];
?>
<!DOCTYPE html>
<html>
<head>
  <title>Forgot Password </title>
      <meta charset="utf-8">
      <meta name="description" content="Volume Salon">
      <meta name="keywords" content="Volume, Volume, creative, html">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link href="../../img/volume.png" rel="shortcut icon" /><!-- Favicon -->
      <link rel="stylesheet" href="../../css/bootstrap.min.css" /><!-- Stylesheets -->
      <link rel="stylesheet" href="../../css/font-awesome.min.css" />
      <link rel="stylesheet" href="../../css/jquery-ui.min.css" />
      <link rel="stylesheet" href="../../css/flaticon.css" />
      <link rel="stylesheet" href="../../css/owl.carousel.css" />
      <link rel="stylesheet" href="../../css/style.css" />
      <link rel="stylesheet" href="../../css/animate.css" />	
      <link rel="stylesheet" href="../../css/registerDesign.css" />
</head>
    <body>
      <?php include('../../html/header.html'); ?><!-- Header section end -->
          <form class="login" action="processofhomepage.php" method="post" name="login">
              <h1 class="login-title">Forgot Password </h1>

                <?php  if(isset($Error_For_Forgot_Password)): ?>
                  <span><?php echo $Error_For_Forgot_Password; ?></span>
                <?php endif ?>
            
              <input type="text"   class="login-input"  name="lastname"    placeholder="Your Last Name" autofocus required="">
              <input type="email"  class="login-input"  name="email"       placeholder="Email"          autofocus required="">
              <input type="number" class="login-input"  name="phonenumber" placeholder="Phone Number"   autofocus required="">
              <input type="submit" class="login-button" name="submitforgotpassword"  value="SUBMIT" >
          </form>
    </body>

    <script src="../../js/jquery-3.2.1.min.js"></script>
    <script src="../../js/jquery-ui.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/owl.carousel.min.js"></script>
    <script src="../../js/circle-progress.min.js"></script>
    <script src="../../js/main.js"></script>
    
</html>