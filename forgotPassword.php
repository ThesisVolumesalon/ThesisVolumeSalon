<?php
session_start();
error_reporting(0);
$Error_For_Forgot_Password = $_SESSION['error_forgot_password'];
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Forgot Password </title>
<link rel="stylesheet" href="css/registerDesign.css" />
    <link rel="stylesheet" href="css/style1.css">
    <link href="img/volume.png" rel="shortcut icon"/>
</head>
<body>
  <?php include_once('header.php');?>
	<form class="login" action="processofhomepage.php" method="post" name="login">
    <h1 class="login-title">Forgot Password </h1>
     <?php  if(isset($Error_For_Forgot_Password)): ?>
      <span><?php echo $Error_For_Forgot_Password; ?></span>
     <?php endif ?>
 
    <input type="text"   class="login-input" name="lastname" placeholder="Your Last Name" autofocus required="">
    <input type="email"  class="login-input" name="email" placeholder="Email" autofocus required="">
    <input type="number" class="login-input" name="phonenumber" placeholder="Phone Number" required="">
    <input type="submit" value="SUBMIT" name="submitforgotpassword" class="login-button">
  </form>
  <script src="js/jquery-3.2.1.min.js"></script>
  <script src="js/jquery-ui.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/circle-progress.min.js"></script>
  <script src="js/main.js"></script>

</body>
</html>