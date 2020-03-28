<?php 
session_start();
error_reporting(0);
include('../../Database/dbconnection.php');
$reservNum = $_GET['reserv'];

		$category = '';
		$Result_Get_Category = mysqli_query($con,"SELECT category_id, category_Name FROM tblcategory ");
				while($row = mysqli_fetch_array($Result_Get_Category)){
		 			$category .= '<option value="'.$row["category_id"].'">'.$row["category_Name"].'</option>';
				}
				
		$Result_Get_Time = mysqli_query($con,"SELECT * FROM tbltimereservation");

		$Result_Query_Data = "SELECT *
					 		  FROM  tbl_edit_user_reservation editdata,
					 			    tblservices serv 
					 		  WHERE editdata.edit_reserv_status = 0 AND 
					 			    editdata.edit_service_id = serv.Service_id AND
					 			    editdata.edit_ReservAptNumber = $reservNum";
		$Result_Value= mysqli_query($con,$Result_Query_Data);
?>
<!DOCTYPE html>
<html>
<head>
	<title>EDIT RESERVATION | SUBMIT</title>
	<meta charset="UTF-8">
      <meta name="description" content="Volume Salon">
      <meta name="keywords" content="Volume, Volume, creative, html">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link href="../img/volume.png" rel="shortcut icon" /><!-- Favicon -->
      <link rel="stylesheet" href="../../css/bootstrap.min.css" /><!-- Stylesheets -->
      <link rel="stylesheet" href="../../css/font-awesome.min.css" />
      <link rel="stylesheet" href="../../css/jquery-ui.min.css" />
      <link rel="stylesheet" href="../../css/flaticon.css" />
      <link rel="stylesheet" href="../../css/owl.carousel.css" />
      <link rel="stylesheet" href="../../css/style.css" />
      <link rel="stylesheet" href="../../css/animate.css" />	
      <link href="img/volume.png" rel="shortcut icon"/>
      <link rel="stylesheet" type="text/css" href="../../css/cssprocess.css">
</head>
	 <?php include_once('../../includes/headerAccount.php'); ?>
<body>
	<div class="container">
		<div class="hs-item">
			<div class="hs-content text-white">
				<h4 class="fw-title"><i class="flaticon-039-make-up"></i>Edit Service</h4>
				
					<form class="fw-contact-form" action="/../homepage/control/processofhomepage.php" method="POST">
						<br/>
						<?php while ($Result_Value_Row=mysqli_fetch_array($Result_Value)) { ?>
						<input type="hidden" name="idofuser" value="<?php echo $Result_Value_Row['user_id'] ?>">
						<input type="hidden" name="apptNumber" value="<?php echo $Result_Value_Row['edit_ReservAptNumber'] ?>">
						<input type="hidden" name="status" value="1">
   						
   						<select name="category" id="category" class="form-control action" ><!--cATEGORY CHOICE-->
    						<option value="">Select Category</option>
    							<?php echo $category; ?>
   						</select>
						
						<br />
   						<select name="service" id="service" class="form-control action" required=""><!--SERVICE CHOICE-->
    						<option value="<?php echo $Result_Value_Row['Service_id'] ?>"><?php echo $Result_Value_Row['ServiceName'] ?></option>
   						</select>
						
						<br />
						<select name="time" id="time" required="true" class="form-control"><!--TIME CHOICE-->
		                    <option value="<?php echo $Result_Value_Row['edit_Reserv_Time'];?>"><?php echo $Result_Value_Row['edit_Reserv_Time'];?></option>
								<?php while($row_Get_Time=mysqli_fetch_array($Result_Get_Time)){ ?>
		                    <option value="<?php echo $row['time_timeslot'];?>"><?php echo $row_Get_Time['time_timeslot'];?></option>
		                       	<?php } ?> 
		                </select>

						<br />
		                <input type="text" class="form-control" value="<?php echo $Result_Value_Row['edit_Reserv_Date']; ?>" name="select_date" id="select_date" placeholder="Date" >
						<div class="cf-inputs"><br>
						<textarea name="Message" class="form-control" placeholder="Your Message/Comment/Others"><?php echo $Result_Value_Row['edit_Message'];?></textarea>
						</div>
						<?php }?>
								<button type="submit" name="submitEditDone" class="site-btn">Submit</button>
								<a href="listAppoint.php" class="site-btn sb-big">CANCEL</a>
							</form>
						</div>
					<div class="hs-preview set-bg" data-setbg="../../img/sev.jpg"></div>
				</div>
		</div>
	<!--====== Javascripts & Jquery ======-->
	<script src="../../js/jquery-3.2.1.min.js"></script>
	<script src="../../js/jquery-ui.min.js"></script>
	<script src="../../js/bootstrap.min.js"></script>
	<script src="../../js/owl.carousel.min.js"></script>
	<script src="../../js/circle-progress.min.js"></script>
	<script src="../../js/main.js"></script>
	<script src="../../js/javascriptprocess.js"></script>
</body>
</html>