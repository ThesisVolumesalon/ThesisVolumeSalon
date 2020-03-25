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
				<li><a href="about.php">About Us</a></li>
				<li class="active"><a href="services1.php">Services</a></li>
				<li><a href="blog.php">News</a></li>
				<li><a href="contact.php">Contact</a></li>
			</ul>
		</div>
    </header>

    
                                                
	<!-- Page info section -->
	<section class="page-info-section set-bg" data-setbg="img/page-top-bg/1.jpg" >
		<div class="container text-center">
			<h2>Services</h2>
		</div>
	</section>
	<!-- Page info section end -->


	<!-- Services section -->
	<section class="services-section spad set-bg" data-setbg="img/download.jpg">
		<div class="container">
			<div class="section-title text-white">
				<h2>Our Services</h2>
			</div>
			<div class="row">
				<!-- service -->
				<div class="col-lg-4 col-md-6 service text-white">
					<i class="flaticon-016-woman"></i>
					<strong><h2 style="color:#FF1493;">Rebonding</h2></strong>
                    <br><br>
					<table>
						<tr>
						<th width="10%" style="color:black;"></th>
						<th width="10%" style="color:black;"></th>
					</tr>
<?php
					$query = "select * from tblservices where category_id = 1"; 
					$resultdata = mysqli_query($con,$query);

					$resultbyrows = mysqli_num_rows($resultdata);

					if($resultbyrows>0){
						while ($row=mysqli_fetch_array($resultdata)) {
						
					?>
						<tr> 
							<td  style="color:black; font-size:1.5em;">  <?php echo $row['ServiceName']; ?></td>
							<td style="float: left;"><p>&#8369 <?php echo $row['Cost']; ?> </td>
						</tr>
						<?php 	
						}
					} ?>
					</table>
				</div></br><br>
				<!-- service -->
				<div class="col-lg-4 col-md-6 service text-white">
					<i class="flaticon-017-soap"></i>
					<h2 style="color:#FF1493;">Hair Color and Hair Treatment</h2>
					<table>
						<tr>
						<th width="10%" style="color:black;"></th>
						<th width="10%" style="color:black;"></th>
					</tr>
<?php
					$query = "select * from tblservices where category_id = 2"; 
					$resultdata = mysqli_query($con,$query);

					$resultbyrows = mysqli_num_rows($resultdata);

					if($resultbyrows>0){
						while ($row=mysqli_fetch_array($resultdata)) {
						
					?>
						<tr> 
							<td  style="color:black; font-size:1.5em;">  <?php echo $row['ServiceName']; ?></td>
							<td style="float: left;"><p>&#8369 <?php echo $row['Cost']; ?> </td>
						</tr>
						<?php 	
						}
					} ?>
					</table>
					
				</div>
				<!-- service -->
				<div class="col-lg-4 col-md-6 service text-white">
					<i class="flaticon-009-makeup-5"></i>
					<h2>FootSpa</h2>
					<br><br>
					<table>
						<tr>
						<th width="10%" style="color:black;"></th>
						<th width="10%" style="color:black;"></th>
					</tr>
<?php
					$query = "select * from tblservices where category_id = 3"; 
					$resultdata = mysqli_query($con,$query);

					$resultbyrows = mysqli_num_rows($resultdata);

					if($resultbyrows>0){
						while ($row=mysqli_fetch_array($resultdata)) {
						
					?>
						<tr> 
							<td  style="color:black; font-size:1.5em;">  <?php echo $row['ServiceName']; ?></td>
							<td style="float: left;"><p>&#8369 <?php echo $row['Cost']; ?> </td>
						</tr>
						<?php 	
						}
					} ?>
					</table>
				</br></br>
				</div>
				<!-- service -->
				<div class="col-lg-4 col-md-6 service text-white">
					<i class="flaticon-048-makeup"></i>
					<h2 style="color:#FF1493;">Hair and Make Up</h2>
					<table>
						<tr>
						<th width="10%" style="color:black;"></th>
						<th width="10%" style="color:black;"></th>
					</tr>
<?php
					$query = "select * from tblservices where category_id = 4"; 
					$resultdata = mysqli_query($con,$query);

					$resultbyrows = mysqli_num_rows($resultdata);

					if($resultbyrows>0){
						while ($row=mysqli_fetch_array($resultdata)) {
						
					?>
						<tr> 
							<td  style="color:black; font-size:1.5em;">  <?php echo $row['ServiceName']; ?></td>
							<td style="float: left;"><p>&#8369 <?php echo $row['Cost']; ?> </td>
						</tr>
						<?php 	
						}
					} ?>
					</table>
					
				</div>
				<!-- service -->
				<div class="col-lg-4 col-md-6 service text-white">
					<i class="flaticon-045-eyelid"></i>
					<h2 style="color:#FF1493;">Manicure and Pedicure</h2>
						<table>
						<tr>
						<th width="10%" style="color:black;"></th>
						<th width="10%" style="color:black;"></th>
					</tr>
<?php
					$query = "select * from tblservices where category_id = 5"; 
					$resultdata = mysqli_query($con,$query);

					$resultbyrows = mysqli_num_rows($resultdata);

					if($resultbyrows>0){
						while ($row=mysqli_fetch_array($resultdata)) {
						
					?>
						<tr> 
							<td  style="color:black; font-size:1.5em;">  <?php echo $row['ServiceName']; ?></td>
							<td style="float: left;"><p>&#8369 <?php echo $row['Cost']; ?> </td>
						</tr>
						<?php 	
						}
					} ?>
				</table>
					</div>
				<!-- service -->
					<div class="col-lg-4 col-md-6 service text-white">
					<i class="flaticon-045-eyelid"></i>
					<h2 style="color:#FF1493;">Gel polish</h2>
						<table>
						<tr>
						<th width="10%" style="color:black;"></th>
						<th width="10%" style="color:black;"></th>
					</tr>
<?php
					$query = "select * from tblservices where category_id = 6"; 
					$resultdata = mysqli_query($con,$query);

					$resultbyrows = mysqli_num_rows($resultdata);

					if($resultbyrows>0){
						while ($row=mysqli_fetch_array($resultdata)) {
						
					?>
						<tr> 
							<td  style="color:black; font-size:1.5em;">  <?php echo $row['ServiceName']; ?></td>
							<td style="float: left;"><p>&#8369 <?php echo $row['Cost']; ?> </td>
						</tr>
						<?php 	
						}
					} ?>
				</table>
				</div>
				<!-- service -->
				</div>
			</div>
		</div>
	</section>
	<!-- Services section end -->


	<!-- Team section -->
	<section class="popular-services-section">
		<div class="container">
			<div class="section-title">
				<h2>Most Popular</h2>
			</div>
			<div class="popular-services-slider owl-carousel">
				<div class="service popular-item">
					<i class="flaticon-048-makeup"></i>
					<h2>Manicure and Pedicure</h2>
					<p>Manicure and Pedicure is one of the service that makes our hairdresser busy. Different kind of nail art that choose of our customer</p>
				</div>
				<div class="service popular-item">
					<i class="flaticon-017-soap"></i>
					<h2>Rebonding</h2>
					<p>Rebonding is one of the service that our customer want. with the different kinds of rebonding their hair become bouncy and beautiful.</p>
				</div>
				<div class="service popular-item">
					<i class="flaticon-009-makeup-5"></i>
					<h2>Hair and Make-up</h2>
					<p>For all the occassion that you attend. Our hairdresser are creative with the looks you want.</p>
				</div>
				<div class="service popular-item">
					<i class="flaticon-017-soap"></i>
					<h2>Hair Treatment</h2>
					<p>for the hair treatment the popular one is keratin treatment that makes your hair shiny.</p>
				</div>
			</div>
		</div>
	</section>
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