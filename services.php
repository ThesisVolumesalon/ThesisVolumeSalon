

<?php 

include('includes/dbconnection.php');

?>


<!DOCTYPE html>
<html lang="zxx">
<head>
	<title>Volume Salon </title>
	<meta charset="UTF-8">
	<meta name="description" content="Volume Salon">
	<meta name="keywords" content="diva, beauty, creative, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Favicon -->   
	<link href="img/volume.png" rel="shortcut icon"/>

	<!-- Stylesheets -->
	<link rel="stylesheet" href="css/bootstrap.min.css"/>
	<link rel="stylesheet" href="css/font-awesome.min.css"/>
	<link rel="stylesheet" href="css/jquery-ui.min.css"/>
	<link rel="stylesheet" href="css/flaticon.css"/>
	<link rel="stylesheet" href="css/owl.carousel.css"/>
	<link rel="stylesheet" href="css/style.css"/>
	<link rel="stylesheet" href="css/animate.css"/>


	<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>
<body>
	<!-- Page Preloder -->
	<div id="preloder">
		<div class="loader"></div>
	</div>
	
	<!-- Header section -->
	<header class="header-section">
		<div class="header-warp">
			<!-- logo -->
			<div class="logo">
          <a href="">
            <h1>VOLUME SALON</h1>
            <span>Men and Woman</span>
          </a>
        </div>
			<!-- responsive -->
			<div class="nav-switch">
				<i class="fa fa-bars"></i>
			</div>
			<!-- Navigation Menu -->
			<ul class="main-menu">
				<li><a href="home.html">Home</a></li>
				<li><a href="about.html">About Us</a></li>
				<li class="active"><a href="services.php">Services</a></li>
				<li><a href="blog.html">News</a></li>
				<li><a href="contact.html">Contact</a></li>
			</ul>
			<div class="header-right">
				<a href="" class="site-btn sb-line sb-big">85428154</a>
				<a href="login.php" class="site-btn sb-big">LOG IN</a>
			</div>
		</div>
	</header>
	<!-- Header section end -->

                                                
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
	

	<!--====== Javascripts & Jquery ======-->
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/jquery-ui.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/circle-progress.min.js"></script>
	<script src="js/main.js"></script>

    </body>
</html>