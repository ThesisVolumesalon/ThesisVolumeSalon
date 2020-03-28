<?php
session_start();
error_reporting(0);
$emaildata = $_SESSION['email'];
 ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Fill Up Addresss</title>
<link rel="stylesheet" href="../../css/registerDesign.css" />
 <link rel="stylesheet" href="../../css/style1.css">
</head>
<body>

	<form class="address" action="/../homepage/control/processofhomepage.php" method="POST">
        <h1 class="login-title">Your Address</h1>
          <span><h5>Before You Continue the Process Fill up this Form!</h5></span>
            <input type="hidden" name="email" value="<?php echo $emaildata?>">
	          <input type="text" class="login-input" name="housenumber" placeholder="House Number" />
	          <input type="text" class="login-input" name="streetname" placeholder="Street Name" required="" />
	          <input type="text" class="login-input" name="barangay" placeholder="Barangay"  required="" />

            <select class="login-input" name="city" placeholder="Country" required="">
              <option value="San Mateo">San Mateo</option>
              <option value="San Isidro">San Isidro</option>
              <option value="Montalban">Montalban</option>
              <option value="Rodriguez">Rodriguez</option>
            </select>

            <select class="login-input" name="province" placeholder="Country" required="">
              <option value="Rizal">Rizal</option>
            </select>

            <select class="login-input" name="country" placeholder="Country" required="">
              <option value="Philippines">Philippines</option>
             </select>

            <input type="text" class="login-input" name="zipcode" placeholder="ZipCode">
            <input type="submit" name="submitAddressData" value="Submit" class="login-button">
      <p class="login-lost">COMPLETE THIS FROM</p>
  </form>
  
  <script src="js/jquery-3.2.1.min.js"></script>
  <script src="js/jquery-ui.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/circle-progress.min.js"></script>
  <script src="js/main.js"></script>
</body>
</html>