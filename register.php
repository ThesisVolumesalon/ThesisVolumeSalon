<?php
session_start();
error_reporting(0);
$Error_Register = $_SESSION['error_register'];?>
<!DOCTYPE html>
<html>
<head>

<title>Sign In</title>
      <meta charset="UTF-8">
      <?php include('html/link/links.html'); ?>	
      <link href="img/volume.png" rel="shortcut icon"/>
      <link rel="stylesheet" href="css/registerDesign.css" />
      <link rel="stylesheet" type="text/css" href="css/cssprocess.css">
</head>
  <body>
      <?php include('html/header.html'); ?><!-- Header section end -->
          <form class="login" action="processofhomepage.php" method="POST">
                <h1 class="login-title">Sign Up</h1>

                  <?php  if(isset($Error_Register)): ?>
                    <span><?php echo $Error_Register; ?></span>
                  <?php endif ?>

              <input type="text" class="login-input" name="userfirstname" placeholder="First Name" required=""  />
              <input type="text" class="login-input" name="userlastname" placeholder="Last Name"  required="" />
              <input type="text" class="login-input" name="usermidlename" placeholder="Midle Name"  required="" />
              <input type="number" class="login-input" name="phonenumber" placeholder=" Phone Number" maxlength="11" required="">
              <input type="email" class="login-input" name="email" placeholder="Email Address">
              <input type="password" class="login-input" name="password" id="password-field" placeholder="Password">
              <span toggle="#password-field" class="fa fa-fw fa-eye field-icon-register toggle-password fa-2x"></span>
              <input type="password" class="login-input" name="cpassword" placeholder="Re-Type Password">
              <input type="submit" name="submitregistrationdata" value="Sign In" class="login-button">
              <p class="login-lost">Already Have an Account! <a href="login.php">Login Here</a></p>
          </form>
  </body>
  
    <?php include('html/link/scriptslinks.html'); ?>		
    <script src="javascriptprocess.js"></script>

</html>