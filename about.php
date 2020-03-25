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
				<li class="active"><a href="about.php">About Us</a></li>
				<li><a href="services1.php">Services</a></li>
				<li><a href="blog.php">News</a></li>
				<li><a href="contact.php">Contact</a></li>
			</ul>
		</div>
	</header>
    <!-- Header section end -->                                           
	<!-- Page info section -->
	<section class="page-info-section set-bg" data-setbg="img/page-top-bg/1.jpg" >
		<div class="container text-center">
			<h2>About Us</h2>
		</div>
	</section>
	<!-- Page info section end -->


	<!-- about section -->
	<section class="about-section spad">
		<div class="container">
			<div class="row about-box">
				<div class="col-md-6 about-img">
					<img src="img/about01.jpg" alt="">
				</div>
				<div class="col-md-6">
					<div class="about-content">
						<h2>Volume Salon your Beauty Salon</h2>
						<p align="justify"><strong><em>Volume Salon is one of the top salon here in Rodriguez Rizal. Volume salon offered different kind of hair style, nail style and even make up. Volume Salon has 3 branches that will served you. the first salon opened in 2013 in San Isidro Branch.<br>
							We are happy to serve you the highest quality service at affordable price that everyone can afford. Volume Salon offered different kind of services like Rebonding, Hair Treatment, Hair Color, Manicure and Pedicure, Footspa, Hair and Make-up, Curling hair and what ever you desire to give you a beautiful look.<br>
						Total Customer satisfaction is the number one goal of Volume Salon. Volume salon service experience is where the customer are given a relaxing ambience, hospitable and creative hairdresser. Volume salon hairdresser is a well-trained stylist and they will happy to serve you.</p></br> </p></strong></em>
					</div>
				</div>
			</div>
			<div class="row about-box">
				<div class="col-md-6 about-img col-push">
					<img src="img/about02.jpg" alt="">
				</div>
				<div class="col-md-6 col-pull">
					<div class="about-content">
						<h2>Terms and Condition</h2>
						<h3>Please arrive on time!</h3>
						<p align="justify"><strong><em>Arriving on time or 10 minutes before your reservation to ensure that every reservation you made will do without hassle of time.</p></em></strong>
						<h3>Reservation and cancellation Policy</h3>
						<p align="justify"><strong><em>Please choose carefully of your service you want before you place and the time and date that you preffered.Once you submit it,you will no longer cancel or edit your reservation and the time slot that you choose will place already and occupied.</em></strong></p>
						<p align="justify"><em><strong>No show after 10 minutes of your reservation will become forfeited and you will treat as walk-in customer.</p></em></strong>
						<h4>Security</h4>
						<p ><strong><em>Your identity and all your information is secure and private.</p></em></strong>
						<h3>Promo</h3>
						<p><strong><em>You will avail the promo that we offer as long as it available.</p></em></strong>
					</div>
				</div>
			</div>
		</div>
	</section>

	<footer class="set-bg" data-setbg="img/footer-bg.jpg" style="text-align: center;">
		<div class="logo1" style="float: center;">
			<a href="">
				<h1 style="color: black;">VOLUME SALON</h1>
				<span>Men and Woman</span>
			</a>
			<p>The Salon that makes you beautiful and stand out shine.</p>
		</div>
	
	</footer>

    <!-- Footer section end -->
	<!--====== Javascripts & Jquery ======-->
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/jquery-ui.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/circle-progress.min.js"></script>
	<script src="js/main.js"></script>
</body>
</html>


