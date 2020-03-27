                                             
	<!-- Page info section -->
	<section class="page-info-section set-bg" data-setbg="../img/page-top-bg/1.jpg" >
		<div class="container text-center">
			<h2>Services</h2>
		</div>
	</section>
	<!-- Page info section end -->


	<!-- Services section -->
	<section class="services-section spad set-bg" data-setbg="../img/download.jpg">
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