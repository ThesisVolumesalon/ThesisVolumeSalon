<?php 
session_start();
error_reporting(0);
	include('includes/dbconnection.php');
	$uid = $_SESSION['userID'];

if(strlen($_SESSION['userID']==0)){ ?>

		<!DOCTYPE html>															<!-- Without Accout -->
		<html>
			<head>
				<title>News</title>
				<?php include('html/link/links.html'); ?>						<!-- Link section -->
			</head>
			<body>
				<?php include('html/header.html'); ?>							<!-- Header section -->
				<?php include('html/content/newscontent.html'); ?>				<!-- News section -->
				<?php include('html/footer.html'); ?>							<!-- Footer section -->
			</body>
			<?php include('html/link/scriptslinks.html'); ?>							<!--Javascripts & Jquery-->
		</html>

<?php  } else { ?>  															<!-- else condition -->

		<!DOCTYPE html>															<!-- With Account -->
		<html>
			<head>
				<title>News</title>
				<link href="img/volume.png" rel="shortcut icon"/> 				<!-- Site icon -->
			</head>
			<body>
				<?php include('includes/headerAccount.php'); ?> 				<!-- Header section end -->
				<?php include('html/content/newscontent.html'); ?>				<!-- News section -->
				<?php include('html/footer.html'); ?>							<!-- Footer section -->
			</body>
			<?php include('html/link/scriptslinks.html'); ?>					<!-- Javascripts & Jquery -->
		</html>

<?php } ?>
