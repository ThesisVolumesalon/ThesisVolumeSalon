<?php 
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if(strlen($_SESSION['userID']==0)){
  	header('location: home.html');
}else{
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
		}
?>
<?php include('includes/headerAccount.php'); ?> <!--Header-->
	<section class="hero-section set-bg" data-setbg="img/bg.jpg" > 	
		<div class="container">
				<div class="hs-item">
					<div class="hs-content text-white">
						<h4 class="fw-title"><i class="flaticon-039-make-up"></i>Make my Reservation</h4>
							<form class="fw-contact-form" action="processofhomepage.php" method="POST" ><br/>
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

	<!-- Services section -->
	<section class="services-section spad set-bg" data-setbg="img/unnamed.jpg">
		<div class="container">
			<div class="section-title text-white">
				<h2>Our Services</h2>
			</div>
			<div class="row">
				<!-- service -->
				<div class="col-lg-4 col-md-6 service text-white">
					<i class="flaticon-016-woman"></i>
					<h2>Rebonding</h2>
					<p align="justify">Try our different kinds of rebonding that can give you a beautiful and alive hair taht gives you confident to go out side.</p>
				</div>
				<!-- service -->
				<div class="col-lg-4 col-md-6 service text-white">
					<i class="flaticon-015-facial-mask"></i>
					<h2>Gel Polish</h2>
					<p align="justify">with the Gel polish your nail become Glossy and look elegant.</p>
				</div>
				
				<!-- service -->
				<div class="col-lg-4 col-md-6 service text-white">
					<i class="flaticon-009-makeup-5"></i>
					<h2>Footspa</h2>
					<p>Try our footspa service to feels you comfortable while you walking. </p>
				</div>
				<!-- service -->
				<div class="col-lg-4 col-md-6 service text-white">
					<i class="flaticon-048-makeup"></i>
					<h2>Hair and Make Up</h2>
					<p align="justify">Go to the party or event with your beautiful face and beautiful hair that our hairdresser manage the style you want.</p>
				</div>
				<!-- service -->
				<div class="col-lg-4 col-md-6 service text-white">
					<i class="flaticon-045-eyelid"></i>
					<h2>Manicure and Pedicure</h2>
					<p>Choose different kinds of nail art that will make your nails looking good. </p>
				</div>
				<!-- service -->
				<div class="col-lg-4 col-md-6 service text-white">
					<i class="flaticon-017-soap"></i>
					<h2>Hair Color and Hair Treatment</h2>
					<p align="justify">Treat your hair with some of a kind hair blonde that fits your style. And a hair treatment that
						gives youre crowning glory a glossy hair, smooth and well-nourished hair. </p>
				</div>
			</div>
		</div>
	</section><!-- Services section end -->
	<!-- Testimonials section -->
	<section class="testimonials-section set-bg" data set-bg="image/review-bg.jpg">
		<div class="container">
			<div class="section-title mb-0">
				<h2>Client Testimonials</h2>
			</div>
			<div class="row">
				<div class="col-lg-9">
					<div class="testimonials-slider owl-carousel">
						<!-- item -->
						<div class="ts-item">
							<div class="quota"></div>
							<p>volume salon has a great service and the hairdresser is proffesional to do my hair rebonding. i will grateful recommend this salon to my friends. </p>
							<div></div>
							<div class="ts-author-info">
								<h4>Jasmin Solomon</h4>
								<span>New Customer</span>
							</div>
						</div>
						<!-- item -->
						<div class="ts-item">
							<div class="quota"></div>
							<p>They have a great service that im experienced. i have my beautiful nail art and comfortable heel. its a pleasure that i choose volume salon </p>
							<div></div>
							<div class="ts-author-info">
								<h4>Jecelyn Rombaoa</h4>
								<span>Regular Customer</span>
							</div>
						</div>
						<!-- item -->
						<div class="ts-item">
							<div class="quota"></div>
							<p>Got my haircut i feel handsome for my new look. the hairdresser are approachable </p>
							<div></div>
							<div class="ts-author-info">
								<h4>Ric Gajasan</h4>
								<span>Regular Client</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Testimonials section end -->
	
	<footer class="set-bg" data-setbg="img/footer-bg.jpg" style="text-align: center;"><!-- Footer section -->
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
<?php } ?>