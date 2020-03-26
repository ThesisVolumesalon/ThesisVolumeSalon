<?php  
session_start();
error_reporting(0);
$Error_Login = $_SESSION['error_login']; ?>

<!DOCTYPE html>
<html>
<head>
<title>Login</title>
      <meta charset="UTF-8">
      <?php include('html/link/links.html'); ?>	
      <link rel="stylesheet" href="css/registerDesign.css" />
      <link href="img/volume.png" rel="shortcut icon"/>
      <link rel="stylesheet" type="text/css" href="css/cssprocess.css" />
</head>
  <body>
      <?php include('html/header.html'); ?><!-- Header section end -->
        <form class="login" action="processofhomepage.php" method="post" name="login">
            <h1 class="login-title">Log In </h1>
            
                <?php  if(isset($Error_Login)): ?>
                  <span><?php echo $Error_Login; ?></span>
                <?php endif ?>
                
            <input type="email" class="login-input" name="email" placeholder="Email" autofocus required="">
            <input type="password" class="login-input" name="password"id="password-field"  placeholder="Password" title="enter your password.">
            <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password fa-2x"></span>
            <input type="submit" value="Login" name="login" class="login-button">

          <p class="login-lost">I don't have an Account! <a href="register.php">Register</a></p>
          <p class="login-lost">I Forgot my <a href="forgotPassword.php">Password?</a></p>
        </form>
  </body>

    <?php include('html/link/scriptslinks.html'); ?>							<!-- Javascripts & Jquery -->

</html>