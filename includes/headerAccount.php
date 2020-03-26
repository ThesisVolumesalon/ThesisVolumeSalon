<?php 
session_start();
error_reporting(0);

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
		$Number_of_Render_Service =mysqli_num_rows($Result_Render_Service); ?> 
<!DOCTYPE html>
<html>

<head>
	<title>Volume Salon</title>
		<?php include('html/link/links.html'); ?> 
		<link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
		<link rel="stylesheet" type="text/css" href="css/cssprocess.css">
		<script src="js/jquery-1.12.4.js"></script>
		<script src="js/jquery-ui.js"></script>
		<script src="js/javascriptprocess.js">	</script>
</head>

<body>

	<div id="preloder"><div class="loader"></div></div>
	
		<header class="header-section" id="myHeader">					<!-- Header section -->
			<div class="header-warp">

				<div class="logo site-logo"><!-- logo -->
					<a href="">
						<h1>VOLUME SALON</h1>
						<span>Men and Woman</span>
					</a>
				</div>

				<div class="header-right">
					<a href="myprofile.php" class="site-btn sb-small" title="MY PROFILE">
						<span><i class="fa fa-user-circle fa-2x" ></i></span><?php echo $Name_Of_User?>
					</a>
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

				<ul class="main-menu"> <!-- Navigation Menu -->
					<li ><a class="b" href="home.php"><span>Home</span></a></li>
						<li><a href="about.php">About Us</a></li>
							<li><a href="services.php">Services</a></li>
						<li><a href="news.php">News</a></li>
					<li><a href="contact.php">Contact</a></li>
				</ul>

			</div>
		</header><!-- Header section end -->
</body>

</html>