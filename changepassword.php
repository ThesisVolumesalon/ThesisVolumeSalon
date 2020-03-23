<?php
session_start();
error_reporting(0);
$Error_Change_Password = $_SESSION['error_change_password'];
  $user_id = $_SESSION['userId'];
  $name = $_SESSION['username'];
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Password</title>
    <link rel="stylesheet" href="registerDesign.css"/>
    <link rel="stylesheet" href="css/style1.css">
</head>
<body>
  <?php include_once('header.php');?>
	  <form class="login" action="processofhomepage.php" method="post" name="login">
        <h1 class="login-title"> New Password </h1>
          <?php  if(isset($Error_Change_Password)): ?>
            <span><?php echo $Error_Change_Password; ?></span>
          <?php endif ?>

          <span><div class='alert alert-success'><?php echo $name; ?>?<a href="forgotPassword.php"> It's not Me!</a></div></span>
          <input type="number" hidden=""  name="userId" value="<?php echo $user_id; ?>">
          <input type="password" class="login-input myInput" id="myInput" name="newpassword" placeholder="Your New Password" required="">
          <input type="password" class="login-input myInput" id="myInput1" name="retypenewpassword" placeholder="Re-type Your New Password" required="">
          <input type="submit" value="SUBMIT" name="submitchangepassword" class="login-button">
    </form>
  <script src="js/jquery-3.2.1.min.js"></script>
  <script src="js/jquery-ui.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/circle-progress.min.js"></script>
  <script src="js/main.js"></script>
</body>
</html>