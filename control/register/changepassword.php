<?php
session_start();
error_reporting(0);
$Error_Change_Password = $_SESSION['error_change_password'];
  $user_id = $_SESSION['userId'];
  $name = $_SESSION['username']; ?>
<!DOCTYPE html>
<html>
<head>
<title>Password</title><meta charset="UTF-8">
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
      <link rel="stylesheet" href="../../css/registerDesign.css" />
      <link href="img/volume.png" rel="shortcut icon"/>
      <link rel="stylesheet" type="text/css" href="../../css/cssprocess.css" />
      <link href="img/volume.png" rel="shortcut icon"/>
      <link rel="stylesheet" href="../../css/registerDesign.css"/>
</head>
  <body>
      <?php include('../../html/header.html'); ?><!-- Header section end -->
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

    
    <script src="../../js/jquery-3.2.1.min.js"></script>
    <script src="../../js/jquery-ui.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/owl.carousel.min.js"></script>
    <script src="../../js/circle-progress.min.js"></script>
    <script src="../../js/main.js"></script>  
  </body>
</html>