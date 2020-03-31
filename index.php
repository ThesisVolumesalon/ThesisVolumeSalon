<?php 
session_start();
error_reporting(0);
	include('Database/dbconnection.php');
	$uid = $_SESSION['userID'];

if(strlen($_SESSION['userID']==0)){ ?>

		<!DOCTYPE html>															<!-- Without Accout -->
		<html>
			<head>
				<title>Home</title>
				<meta charset="UTF-8">
				<meta name="description" content="Volume Salon">
				<meta name="keywords" content="Volume, Volume, creative, html">
				<meta name="viewport" content="width=device-width, initial-scale=1.0">
				<link href="img/volume.png" rel="shortcut icon" /><!-- Favicon -->
				<link rel="stylesheet" href="css/bootstrap.min.css" /><!-- Stylesheets -->
				<link rel="stylesheet" href="css/flaticon.css" />
				<link rel="stylesheet" href="css/owl.carousel.css" />
				<link rel="stylesheet" href="css/style.css" />
			</head>
			<body>
				<?php include('html/header.html'); ?>							<!-- Header section -->
				<section class="hero-section set-bg" data-setbg="img/bg.jpg" >
					<div class="container">
							<div class="hs-item">
									<p style="text-align: center;font-weight: bold; font-size: 70px; color: #DC143C">WELCOME TO VOLUME SALON</p>
							</div><!-- slider item -->
					</div>
				</section>
				<?php include('html/content/homecontent.html'); ?>				<!-- Home section -->
				<footer class="set-bg" data-setbg="img/footer-bg.jpg" style="text-align: center;">
    <div class="logo1" style="float: center;">
        <a href="">
            <h1 style="color: black;">VOLUME SALON</h1>
                <span>Men and Woman</span>
            </a>
        <p>The Salon that makes you beautiful and stand out shine.</p>
    </div>
</footer>							<!-- Footer section -->
			</body>
			<script src="js/jquery-3.2.1.min.js"></script>
			<script src="js/jquery-ui.min.js"></script>
			<script src="js/owl.carousel.min.js"></script>
			<script src="js/main.js"></script>
		</html>

<?php  } else { 

		$uid = $_SESSION['userID'];
		$NameUser = $_SESSION['userfullname'];
		echo $NameUser;

		$category = '';

		$Result_Get_Time = mysqli_query($con,"select * from tbltimereservation");
		
		$Result_User_Fullname = mysqli_query($con,"select concat(userfirstname,' ',  userlastname) as UserFullName from tblusers where user_id ='$uid'");
		$Result_User_Fullname_In_Array = mysqli_fetch_array($Result_User_Fullname);
		$Name_Of_User = $Result_User_Fullname_In_Array['UserFullName'];

		$Result_Get_Category = mysqli_query($con,"SELECT category_id, category_Name FROM tblcategory ");
		while($row = mysqli_fetch_array($Result_Get_Category)){
 			$category .= '<option value="'.$row["category_id"].'">'.$row["category_Name"].'</option>';
		}?>  															<!-- else condition -->

		<!DOCTYPE html>															<!-- With Account -->
		<html>
			<head>
				<title>Home</title>
				<link href="img/volume.png" rel="shortcut icon"/> 				<!-- Site icon -->
				<meta charset="UTF-8">
				<meta name="description" content="Volume Salon">
				<meta name="keywords" content="Volume, Volume, creative, html">
				<meta name="viewport" content="width=device-width, initial-scale=1.0">
				<link href="img/volume.png" rel="shortcut icon" /><!-- Favicon -->
				<link rel="stylesheet" href="css/bootstrap.min.css" /><!-- Stylesheets -->
				<link rel="stylesheet" href="css/font-awesome.min.css" />
				<link rel="stylesheet" href="css/jquery-ui.min.css" />
				<link rel="stylesheet" href="css/flaticon.css" />
				<link rel="stylesheet" href="css/owl.carousel.css" />
				<link rel="stylesheet" href="css/style.css" />
				<link rel="stylesheet" href="css/animate.css" />
				<script src="js/javascriptprocess.js"></script>
			</head>
			<body>
				<?php include('includes/headerAccount.php'); ?> 				<!-- Header section end -->
				<section class="hero-section set-bg" data-setbg="img/bg.jpg" > 	
		<div class="container">
				<div class="hs-item">
					<div class="hs-content text-white">
						<h4 class="fw-title"><i class="flaticon-039-make-up"></i>Make my Reservation</h4>
							<form class="fw-contact-form" action="control/processofhomepage.php" method="POST" ><br/>
   							<select name="branch" id="branch" class="form-control action" required="true"> 	<!--CATEGORY CHOICE-->
    							<option value="">Select Branch</option>
    							<option value="Branch1">Branch 1- San Isidro McArthur Highway</option>
    							<option value="Branch1">Branch 2- San Mateo McArthur Highway</option>
    							<option value="Branch3">Branch 3- Marikina</option>
    							<option value="Branch4">Branch 4- Delmonte</option>
   							</select><br/>

   							<select name="category" id="category" class="form-control action" required="true"><!--cATEGORY CHOICE-->
    							 <option value="">Select Category</option>
    							<?php echo $category; ?>
   							</select><br/>

   							<select name="service" id="service" class="form-control action" required=""> <!--SERVICE CHOICE-->
    							<option value="">Select Service</option>
   							</select><br/>

		                    <select name="time" id="time" required="true" class="form-control"><!--TIME CHOICE-->
		                      	<option value="">Select Your time</option>
              						<?php while($Result_GetTime_In_Array=mysqli_fetch_array($Result_Get_Time )){ ?>
		                       	<option value="<?php echo $Result_GetTime_In_Array['time_timeslot'];?>"><?php echo $Result_GetTime_In_Array['time_timeslot'];?></option>
		                       		<?php } ?> 
		                    </select><br />
		                    
							<div class="cf-inputs">
								<div class="cf-input">
									<input type="text" value="<?php echo $Name_Of_User; ?>">
								</div>
								<div class="cf-input">
								 	<input type="text" class="cf-input" name="select_date" id="select_date" placeholder="Date" >
								</div>
							</div>
							<textarea name="Message" placeholder="Your Message/Comments/Others"></textarea>
							<button type="submit" name="submitreservation" class="site-btn">Submit</button>
							</form>
						</div>
				<div id="slideshow" >
   					<div class="hs-preview set-bg" data-setbg="img/hero-slider/1.jpg"></div>
   					<div class="hs-preview set-bg" data-setbg="img/hero-slider/rebounding.PNG"></div>
   					<div class="hs-preview set-bg" data-setbg="img/hero-slider/rebounding1.PNG"></div>
   					<div class="hs-preview set-bg" data-setbg="img/hero-slider/rebounding2.PNG"></div>
   					<div class="hs-preview set-bg" data-setbg="img/hero-slider/manicure1.PNG"></div>
  					<div class="hs-preview set-bg" data-setbg="img/hero-slider/manicure.PNG"></div>
				</div>
			</div><!-- slider item -->
		</div>
	</section><!-- Here section end -->
				<?php include('html/content/homecontent.html'); ?>				<!-- Home section -->
			<footer class="set-bg" data-setbg="img/footer-bg.jpg" style="text-align: center;">
    <div class="logo1" style="float: center;">
        <a href="">
            <h1 style="color: black;">VOLUME SALON</h1>
                <span>Men and Woman</span>
            </a>
        <p>The Salon that makes you beautiful and stand out shine.</p>
    </div>
</footer>						<!-- Footer section -->
			</body>
			
		</html>
			<script src="js/jquery-3.2.1.min.js"></script>
			<script src="js/jquery-ui.min.js"></script>
			<script src="js/bootstrap.min.js"></script>
			<script src="js/owl.carousel.min.js"></script>
			<script src="js/circle-progress.min.js"></script>
			<script src="js/main.js"></script>
<?php } ?>
