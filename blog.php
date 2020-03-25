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
				<li class="active"><a href="blog.php">News</a></li>
				<li><a href="contact.php">Contact</a></li>
			</ul>
		</div>
    </header>
    
	<section class="page-info-section set-bg" data-setbg="img/page-top-bg/2.jpg" >
		<div class="container text-center">
			<h2>News</h2>
		</div>
	</section>
	<!-- Page info section end -->


		<!-- Blog section -->
	<section class="blog-section spad">
		<div class="container">
			<div class="row">
				<div class="col-xl-9 col-lg-8">
					<!-- blog item -->
					<div class="blog-item">
						<div class="blog-thumb set-bg" data-setbg="img/jessa2.jpg">
							<div class="blog-date">April 25, 2020</div>
						</div>
						<div class="blog-content">
							<h3>Ways to get the perfect hair</h3>
							<i><p>To get hair perfect try our Brazillian Blow-out or Rebonding with keratin treatment. it will nourished your hair. And with argan oil your hair will last longer.</p></i>
						</div>
					</div>
					<!-- blog item -->
					<div class="blog-item">
						<div class="blog-thumb set-bg" data-setbg="img/blog/2.jpg">
							<div class="blog-date">March 29,2020</div>
						</div>
						<div class="blog-content">
							<h3>hair and make up technique</h3>
							<i><p>Our stylist are proffesional when it comes to make up technique. For you to become beautiful, morning till night. Whatever event or party you will attend.</p></i>
						</div>
					</div>
					<!-- blog item -->
					<div class="blog-item">
						<div class="blog-thumb set-bg" data-setbg="img/nailart.jpg">
							<div class="blog-date">April 17, 2020</div>
						</div>
						<div class="blog-content">
							<h3>Manicure and Pedicure Gel polish</h3>
							<i><p>We have a lot of nail art with gel polish that you can choose. To have a great nail and elegant look.</p>
							</i>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-lg-4 col-md-6 sidebar">
					<div class="sb-widget">
						
					</div>
					<div class="sb-widget">
						
					</div>
					<div class="sb-widget">
						
					</div>

					<div class="sb-widget">
						<h5 class="sbw-title">Latest Posts</h5>
						<div class="latest-posts-widget">
							<div class="lp-item">
								<div class="lp-thumb set-bg" data-setbg="img/blog/thumb/1.jpg"></div>
								<div class="lp-content">
									<h6>Hair Treatment</h6>
									<span>April 18,2020</span>
								</div>
							</div>
							<div class="lp-item">
								<div class="lp-thumb set-bg" data-setbg="img/hair.jpg"></div>
								<div class="lp-content">
									<h6>Rebonding</h6>
									<span>April 15,2020</span>
								</div>
							</div>
							<div class="lp-item">
								<div class="lp-thumb set-bg" data-setbg="img/nailsimage.jpg"></div>
								<div class="lp-content">
									<h6>Gel polish</h6>
									<span>April 20, 2020</span>
								</div>
							</div>
						</div>
					</div>
					<div class="sb-widget">
						<h7 class="sbw-title">Promos</h7>
						<div class="latest-posts-widget">
							<div class="lp-item">
								<div class="lp-thumb set-bg" data-setbg="img/j2.jpg"></div>
								<div class="lp-content">
									<h7>Rebonding</h7>
									<p><span>Rebond w/ cellophane treatment, hair color and hair cut for only &#8369 1400 only</span></p>
									<p><span>Milk Rebond w/ cellophane treatmen, hair cut for only &#8369 900 only</span></p>
								</div>
							</div>
						</div>
					</div>
                	<div class="sb-widget">
						<div class="latest-posts-widget">
							<div class="lp-item">
								<div class="lp-thumb set-bg" data-setbg="img/img.jpg"></div>
								<div class="lp-content">
									<p><span>Hair color w/ treatment and hair cut for only &#8369 600 only</span></p>
									<p><span>Rebonding w/ brazillian blow out with hair cut for only &#8369 1800 only</span></p>
									<p><span>Rebonding w/ keratin treatment and hair cut for only &#8369 1300 only</span></p>
								</div>
							</div>
						</div>
					</div>
					<div class="sb-widget">
						
						<div class="latest-posts-widget">
							<div class="lp-item">
								<div class="lp-thumb set-bg" data-setbg="img/foot.jpg"></div>
								<div class="lp-content">
                             	<h8>Footspa with Manicure and Pedicure</h8>
								<p><span>Footspa with manicure or pedicure for only &#8369 400 only</span></p>
								</div>
							</div>
						</div>
					</div>
					<div class="sb-widget">
						<div class="latest-posts-widget">
							<div class="lp-item">
								<div class="lp-thumb set-bg" data-setbg="img/nailimage.jpg"></div>
								<div class="lp-content">	
									<p><span>Footspa with manicure and pedicure for only &#8369 500 only</span></p>
								</div>
							</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Blog section end -->
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

    </body>
</html>