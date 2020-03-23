<?php 
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if(strlen($_SESSION['userID']==0)){
  	header('location: home.html');
}else{
		$uid = $_SESSION['userID'];
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
<?php include_once('includes/headerAccount.php');?> <!--Header-->
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
	<section class="services-section spad set-bg" data-setbg="img/service.jpg">
		<div class="container">
			<div class="section-title text-white">
				<h2>Our Services</h2>
			</div>
			<div class="row">
				<!-- service -->
				<div class="col-lg-4 col-md-6 service text-white">
					<i class="flaticon-016-woman"></i>
					<h2>Hair Dressing</h2>
					<p>In vitae nisi aliquam, scelerisque leo a, volutpat sem. Vivamus rutrum dui fermentum eros hendrerit, id lobortis leo volutpat.</p>
				</div>
				<!-- service -->
				<div class="col-lg-4 col-md-6 service text-white">
					<i class="flaticon-017-soap"></i>
					<h2>Zen Massage</h2>
					<p>Aliquam, scelerisque leo a, volutpat sem. Vivamus rutrum dui fermentum eros hendrerit, id lobortis leo volutpat sollicitudin </p>
				</div>
				<!-- service -->
				<div class="col-lg-4 col-md-6 service text-white">
					<i class="flaticon-009-makeup-5"></i>
					<h2>Manicure & Pedicure</h2>
					<p>Scelerisque leo a, volutpat sem. Vivamus rutrum dui fermentum eros hendrerit, id lobortis leo volutpat. Maecenas sollicitudin </p>
				</div>
				<!-- service -->
				<div class="col-lg-4 col-md-6 service text-white">
					<i class="flaticon-048-makeup"></i>
					<h2>Make Up</h2>
					<p>In vitae nisi aliquam, scelerisque leo a, volutpat sem. Vivamus rutrum dui fermentum eros hendrerit, id lobortis leo volutpat.</p>
				</div>
				<!-- service -->
				<div class="col-lg-4 col-md-6 service text-white">
					<i class="flaticon-045-eyelid"></i>
					<h2>Tanning Bed</h2>
					<p>Aliquam, scelerisque leo a, volutpat sem. Vivamus rutrum dui fermentum eros hendrerit, id lobortis leo volutpat sollicitudin </p>
				</div>
				<!-- service -->
				<div class="col-lg-4 col-md-6 service text-white">
					<i class="flaticon-015-facial-mask"></i>
					<h2>Spa Treatments</h2>
					<p>Scelerisque leo a, volutpat sem. Vivamus rutrum dui fermentum eros hendrerit, id lobortis leo volutpat. Maecenas sollicitudin</p>
				</div>
			</div>
		</div>
	</section>
	<!-- Services section end -->

	
	<!-- Testimonials section -->
	<section class="testimonials-section set-bg" data-setbg="img/review-bg.jpg">
		<div class="container">
			<div class="section-title mb-0">
				<h2>Client Testimonials</h2>
			</div>
			<div class="row">
				<div class="col-lg-9">
					<div class="testimonials-slider owl-carousel">
						<!-- item -->
						<div class="ts-item">
							<div class="quota">“</div>
							<p>In vitae nisi aliquam, scelerisque leo a, volutpat sem. Vivamus rutrum dui fermentum eros hendrerit, id lobortis leo volutpat. Maecenas sollicitudin est in libero pretium interdum. Nullam volutpat dui sem, ac congue purus hendrerit, id lobortis leo luctus nec. In vitae nisi aliquam, scelerisque leo a, volutpat sem. Vivamus rutrum dui fermentum eros hendrerit, id lobortis leo volutpat. </p>
							<div class="ts-pic set-bg" data-setbg="img/review-author.jpg"></div>
							<div class="ts-author-info">
								<h4>Maria Parker</h4>
								<span>Regular Client</span>
							</div>
						</div>
						<!-- item -->
						<div class="ts-item">
							<div class="quota">“</div>
							<p>In vitae nisi aliquam, scelerisque leo a, volutpat sem. Vivamus rutrum dui fermentum eros hendrerit, id lobortis leo volutpat. Maecenas sollicitudin est in libero pretium interdum. Nullam volutpat dui sem, ac congue purus hendrerit, id lobortis leo luctus nec. In vitae nisi aliquam, scelerisque leo a, volutpat sem. Vivamus rutrum dui fermentum eros hendrerit, id lobortis leo volutpat. </p>
							<div class="ts-pic set-bg" data-setbg="img/review-author.jpg"></div>
							<div class="ts-author-info">
								<h4>Maria Parker</h4>
								<span>Regular Client</span>
							</div>
						</div>
						<!-- item -->
						<div class="ts-item">
							<div class="quota">“</div>
							<p>In vitae nisi aliquam, scelerisque leo a, volutpat sem. Vivamus rutrum dui fermentum eros hendrerit, id lobortis leo volutpat. Maecenas sollicitudin est in libero pretium interdum. Nullam volutpat dui sem, ac congue purus hendrerit, id lobortis leo luctus nec. In vitae nisi aliquam, scelerisque leo a, volutpat sem. Vivamus rutrum dui fermentum eros hendrerit, id lobortis leo volutpat. </p>
							<div class="ts-pic set-bg" data-setbg="img/review-author.jpg"></div>
							<div class="ts-author-info">
								<h4>Maria Parker</h4>
								<span>Regular Client</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Testimonials section end -->
	<!-- brands section -->
	<div class="brands-section set-bg" data-setbg="img/brands-bg.jpg">
		<div class="brands-slider owl-carousel">
			<div class="bs-item">
				<img src="img/brands/1.png" alt="">
			</div>
			<div class="bs-item">
				<img src="img/brands/2.png" alt="">
			</div>
			<div class="bs-item">
				<img src="img/brands/3.png" alt="">
			</div>
			<div class="bs-item">
				<img src="img/brands/4.png" alt="">
			</div>
			<div class="bs-item">
				<img src="img/brands/5.png" alt="">
			</div>
		</div>
	</div>
	<!--  brands section end -->

	<!-- Footer section -->
	<footer class="footer-section set-bg" data-setbg="img/footer-bg.jpg">
		<div class="footer-warp">
			<div class="footer-widgets">
				<div class="row">
					<div class="col-xl-7 col-lg-7">
						<div class="row">
							<div class="col-xl-4 col-lg-5 col-md-6">
								<div class="footer-widget about-widget">
									<div class="logo">
          						<a href="">
            						<h1>VOLUME SALON</h1>
            							<span>Men and Woman</span>
         								</a>
       								</div>

									<p>In vitae nisi aliquam, scelerisque leo a, volu- tpat sem. Vivamus rutrum dui fermentum eros hendrerit, id lobortis leo volutpat.</p>
									<div class="fw-social">
										<a href=""><i class="fa fa-pinterest"></i></a>
										<a href=""><i class="fa fa-facebook"></i></a>
										<a href=""><i class="fa fa-twitter"></i></a>
										<a href=""><i class="fa fa-dribbble"></i></a>
										<a href=""><i class="fa fa-behance"></i></a>
										<a href=""><i class="fa fa-linkedin"></i></a>
									</div>
								</div> 
							</div>

							<div class="col-xl-6 col-lg-6 col-md-6 offset-xl-2 offset-lg-1 offset-md-0">
								<div class="footer-widget list-widget">
									<h4 class="fw-title"><i class="flaticon-009-makeup-5"></i>Our Services</h4>
									<ul>
										<li><a href="">Manicure</a></li>
										<li><a href="">Pedicure</a></li>
										<li><a href="">Massage</a></li>
										<li><a href="">Hair Dressing</a></li>
										<li><a href="">Spa</a></li>
										<li><a href="">Pedicure</a></li>
										<li><a href="">Beauty treatments </a></li>
									</ul>
									<ul>
										<li><a href="">Wedding Hair</a></li>
										<li><a href="">Manicure</a></li>
										<li><a href="">Pedicure</a></li>
										<li><a href="">Massage</a></li>
										<li><a href="">Hair Dressing</a></li>
										<li><a href="">Botox</a></li>
										<li><a href="">Slimming </a></li>
									</ul>
								</div> 
							</div>
						</div>	
					</div>
				</div>
			</div>

			<div class="footer-bottom">
				<div class="footer-nav">
					<ul>
						<li><a href="">Home</a></li>
						<li><a href="">About us</a></li>
						<li><a href="">Services</a></li>
						<li><a href="">News</a></li>
						<li><a href="">Contact</a></li>
					</ul>
				</div>
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