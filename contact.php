<?php 
session_start();
error_reporting(0);
include('includes/dbconnection.php');

$uid = $_SESSION['userID'];

		$Result_User_Fullname = mysqli_query($con,"select concat(userfirstname,' ',  userlastname) as UserFullName from tblusers where user_id ='$uid'");
		$Result_User_Fullname_In_Array = mysqli_fetch_array($Result_User_Fullname);
		$Name_Of_User = $Result_User_Fullname_In_Array['UserFullName'];

		$Result_Render_Service = mysqli_query($con,"SELECT * 
  					FROM tbl_edit_user_reservation editdata,
 					 	 tblservices serv 
 					WHERE editdata.edit_reserv_status = 0 and 
 						  editdata.edit_service_id = serv.Service_id and 
 					 	  editdata.user_id = '$uid'");
		$Number_of_Render_Service =mysqli_num_rows($Result_Render_Service);
?> 
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="UTF-8">
	<meta name="description" content="Volume Salon Montalban for Reservation">
	<meta name="keywords" content="Pacleb Versio 1.2, land , creative, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	    
	<link href="img/volume.png" rel="shortcut icon"/> <!-- Site icon -->
	<link rel="stylesheet" href="css/bootstrap.min.css"/>
	<link rel="stylesheet" href="css/font-awesome.min.css"/>
	<link rel="stylesheet" href="css/jquery-ui.min.css"/>
	<link rel="stylesheet" href="css/flaticon.css"/>
	<link rel="stylesheet" href="css/owl.carousel.css"/>
	<link rel="stylesheet" href="css/style.css"/>
	<link rel="stylesheet" href="css/animate.css"/>
	<link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
	<link rel="stylesheet" type="text/css" href="cssprocess.css">

	<script src="js/jquery-1.12.4.js"></script>
	<script src="js/jquery-ui.js"></script>
	<script src="javascriptprocess.js">	</script>
	<script></script>
</head>
<body>
	<div id="preloder"><div class="loader"></div></div>
	<!-- Header section -->
	<header class="header-section" id="myHeader">
		<div class="header-warp">
			<div class="logo site-logo"><!-- logo -->
          		<a href="">
            		<h1>VOLUME SALON</h1>
            		<span>Men and Woman</span>
          		</a>
        	</div>

        <div class="header-right">
			<a href="myprofile.php" class="site-btn sb-small" title="MY PROFILE">
					<span><i class="fa fa-user-circle fa-2x" ></i></span><?php echo $Name_Of_User?></a>
              <ul class="sub">
                  <li><a href="myappointstatus.php"><i class="fa fa-tags fa-2x"></i> MY RESERVATION</a></li>
                  <li><a href="logout.php"><i class="fa fa-sign-out fa-2x"></i> LOG OUT</a></li>
              </ul>
		</div>

		<div class="header-right1">
        	<a href="listAppoint.php" class="fa fa-scissors fa-2x" title="Service Render">
  				<?php if($Number_of_Render_Service>0){?>
					<span class="fa fa-circle"></span>
  					<span class="num"><?php echo $Number_of_Render_Service; ?></span>
				<?php } ?>
			</a>
        </div>
		<div class="nav-switch"><i class="fa fa-bars"></i></div>
			<ul class="main-menu"> <!-- Navigation Menu -->
				<li ><a href="home.php"><span>Home</span></a></li>
				<li ><a href="about.php">About Us</a></li>
				<li><a href="services1.php">Services</a></li>
				<li><a href="blog.php">News</a></li>
				<li  class="active"><a href="contact.php">Contact</a></li>
			</ul>
		</div>
    </header>

    
	<section class="page-info-section set-bg" data-setbg="img/page-top-bg/3.jpg" >
		<div class="container text-center">
			<h2>Contact</h2>
		</div>
	</section>
	


	
	<section class="contact-section spad">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 contact-content">
					<h2 class="contact-title">Volume Salon</h2>
					<i><p>Volume salon is always ready to serve you. Our hairdresser is happy to welcome everyone of you in every branch of Volume Salon. Have a great day with us!</p></i>
					<div class="ci-item">
						<div class="ca-icon">
							<img src="img/icons/map.png" alt="">
						</div>
						<div class="ca-text">Volume Salon 1<br>Eastwood Luvers San Isidro</div>
						<div class="ca-text">85428154</div>
						<div class="ci-item">
						<div class="ca-icon">
						<img src="img/icons/map.png" alt="">
						</div>
						<div class="ca-text">Volume Salon 2<br>San Jose Front of Bdo bank</div>
						<div class="ca-text">85428154</div>
						<div class="ci-item">
						<div class="ca-icon">
						<img src="img/icons/map.png" alt="">
						</div>
						<div class="ca-text">Volume Salon 3<br>Gen. Luna Ave</div>
						<div class="ca-text">79549146</div>
					</div>
				</div>
			</div>
				</div>
				 <div class="col-lg-6">
					<h2 class="ts-title">Opening Hours</h2>
					<div class="timetable-card">
						<img src="img/clock.png" alt="">
						<ul>
							<li><span>Monday to Friday:</span>8.00 - 9.00</li>
							<li><span>Friday to saturday:</span>8.00 - 10.00</li>
							<li><span>Sunday:</span>8.00 - 8.30</li>
						</ul>
					</div>
				</div>
				<section>
				<br>
				<div class="col-lg-6">
					<h2 class="contact-title">Get in Touch</h2>
					<form class="contact-form">
						<div class="row">
							<div class="col-md-6">
								<input type="text" placeholder="Your Name">
							</div>
							<div class="col-md-6">
								<input type="text" placeholder="Your E-mail">
							</div>
							<div class="col-md-12">
								<input type="text" placeholder="Subject">
								<textarea placeholder="Your Message"></textarea>
								<button class="site-btn">Submit</button>
							</div></br>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section><!-- Contact section end -->
	<footer class="set-bg" data-setbg="img/footer-bg.jpg" style="text-align: center;"><!-- Footer section -->
		<div class="logo1" style="float: center;">
			<a href="">
				<h1 style="color: black;">VOLUME SALON</h1>
				<span>Men and Woman</span>
			</a>
			<p>The Salon that makes you beautiful and stand out shine.</p>
		</div>
	</footer><!-- Footer section end -->

	<!--====== Javascripts & Jquery ======-->
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/jquery-ui.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/circle-progress.min.js"></script>
	<script src="js/main.js"></script>


	<!-- load for map -->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB0YyDTa0qqOjIerob2VTIwo_XVMhrruxo"></script>
	<script src="js/map.js"></script>

    </body>
</html>
