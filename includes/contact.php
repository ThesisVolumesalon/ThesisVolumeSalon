<?php 
session_start();
error_reporting(0);
	include('../Database/dbconnection.php');
	$uid = $_SESSION['userID'];

	if(strlen($_SESSION['userID']==0)){ ?>

		<!DOCTYPE html>															<!-- Without Accout -->
		<html>
			<head>
				<title>Contact Us</title>
				<?php include('./../html/link/links.html'); ?>						<!-- Link section -->
				<link rel="stylesheet" type="text/css" href="../css/jquery-ui.css">
				<link rel="stylesheet" type="text/css" href="../css/cssprocess.css">
				<script src="../js/jquery-1.12.4.js"></script>
				<script src="../js/jquery-ui.js"></script>						
			</head>
			<body>
				<?php include('../html/header.html'); ?>							<!-- Header section -->
				<?php include('./../html/content/contactcontent.html'); ?>			<!-- Contact section -->
				<?php include('../html/footer.html'); ?>							<!-- Footer section -->
			</body>
			<?php include('../html/link/scriptslinks.html'); ?>					<!--Javascripts & Jquery-->
		</html>

<?php  } else { ?>  															<!-- else condition -->

		<!DOCTYPE html>															<!-- With Account -->
		<html>
			<head>
				<title>Contact Us</title>
				<link href="img/volume.png" rel="shortcut icon"/> 				<!-- Site icon -->
			</head>
			<body>
				<?php include('../includes/headerAccount.php'); ?> 				<!-- Header section end -->
				<?php include('./../html/content/contactcontent.html'); ?>			<!-- Contact section -->
				<?php include('../html/footer.html'); ?>							<!-- Footer section -->
			</body>
			<?php include('../html/link/scriptslinks.html'); ?>					<!-- Javascripts & Jquery -->
		</html>

<?php } ?>
