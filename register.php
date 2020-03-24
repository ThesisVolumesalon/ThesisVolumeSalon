<?php
session_start();
error_reporting(0);
$Error_Register = $_SESSION['error_register'];?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Sign In</title>
  <link rel="stylesheet" href="css/style1.css">
  <link href="img/volume.png" rel="shortcut icon"/>
  <link rel="stylesheet" href="css/registerDesign.css" />
  <link rel="stylesheet" type="text/css" href="css/cssprocess.css">
</head>
<body>
	
  <?php include_once('header.php');?>
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

  <script src="js/jquery-3.2.1.min.js"></script>
  <script src="js/jquery-ui.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/circle-progress.min.js"></script>
  <script src="js/main.js"></script>
  <script src="javascriptprocess.js"></script>
</body>
</html>