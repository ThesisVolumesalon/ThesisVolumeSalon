<?php 
session_start();
error_reporting(0);
include('includes/dbconnection.php');
		$category = '';
		$Result_Get_Category = mysqli_query($con,"SELECT category_id, category_Name FROM tblcategory ");
		while($row = mysqli_fetch_array($Result_Get_Category)){
 			$category .= '<option value="'.$row["category_id"].'">'.$row["category_Name"].'</option>';
		}
		$Result_Get_Time = mysqli_query($con,"select * from tbltimereservation");

	include_once('includes/headerAccount.php');
?>
<br>
<body>
	<div class="container">
				<div class="hs-item">
					<div class="hs-content text-white">
							<h4 class="fw-title"><i class="flaticon-039-make-up"></i>Add Service</h4>
							<form class="fw-contact-form" action="control/processofhomepage.php" method="POST" >
							<br/>

   							<select name="category" id="category" class="form-control action" required="true"><!--cATEGORY CHOICE-->
    							<option value="">Select Category</option>
    							<?php echo $category; ?>
   							</select>

							<br/>
   							<select name="service" id="service" class="form-control action" required=""><!--SERVICE CHOICE-->
    							<option value="">Select State</option>
   							</select>

							<br/>
							<select name="time" id="time" required="true" class="form-control"> <!--TIME CHOICE-->
		                      	<option value="">Select Your time</option>
		                      		<?php while($row=mysqli_fetch_array($Result_Get_Time)){?>
		                       	<option value="<?php echo $row['time_timeslot'];?>"><?php echo $row['time_timeslot'];?></option>
		                       		<?php } ?> 
		                    </select>
							<br/>
		                      	<input type="text" class="form-control"  name="select_date" id="select_date" placeholder="Date" >
								<div class="cf-inputs"><br>
									<textarea name="Message" class="form-control" placeholder="Your Message/Comments/Others"></textarea>
								</div>
								<a href="listAppoint.php"  class="site-btn sb-big">CANCEL</a>
								<button type="submit" name="submitreservation" class="site-btn">ADD</button>
							</form>
						</div>
					<div class="hs-preview set-bg" data-setbg="img/sev.jpg"></div>
				</div>
		</div>
	<!--===== Javascripts & Jquery ======-->
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/jquery-ui.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/circle-progress.min.js"></script>
	<script src="js/main.js"></script>
	<script src="js/javascriptprocess.js"></script>
</body>