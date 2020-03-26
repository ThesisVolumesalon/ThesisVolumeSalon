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
      <?php include('html/link/links.html'); ?>	
      <link rel="stylesheet" href="css/registerDesign.css" />
      <link href="img/volume.png" rel="shortcut icon"/>
</head>
    <body>
      <?php include('html/header.html'); ?><!-- Header section end -->
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

    <?php include('html/link/scriptslinks.html'); ?>							<!-- Javascripts & Jquery -->
    
</html>