<?php 
session_start();
error_reporting(0);
include('../../Database/dbconnection.php');                             #Database connection
if(strlen($_SESSION['userID']==0)){                               #first if checking open braket true
  header('location:  /../../homepage/index.php');                 #if true jump to home.html
                                                                  #first if checking open braket true
  }else{                                                          #first else in checking open braket
    $uid = $_SESSION['userID'];                                   #from session in login.php
    $sql = "SELECT *
            FROM tbl_edit_user_reservation editdata,
                 tblservices service 
            WHERE editdata.edit_reserv_status = 0 and 
                  editdata.edit_service_id = service.Service_id and 
                  editdata.user_id = '$uid'";
                $retValue= mysqli_query($con,$sql);                # $con is the db:$sql getting data from db
                $cnt=1;                                            #inizialize cnt = count with value one & increament below as 1..2..3 ....
                $num=mysqli_num_rows($retValue);                   #Count the number of data in db exist ?>                                                
<!DOCTYPE html>
<html>
<head>
  <title>My Reservation</title>
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
      <link rel="stylesheet" href="../../css/animate.css" />	
      <link href="../../img/volume.png" rel="shortcut icon"/>
<link rel="stylesheet" href="../../css/style.css" />
<link rel="stylesheet" type="text/css" href="../../css/cssprocess.css">

<link rel="stylesheet" type="text/css" href="../../css/designtableforlist.css">

</head>

<body>
   <?php include_once('../../includes/headerAccount.php');?>             <!-- Header section -->
          <table class="responstable">
            <h2 >Edit My Reservation</h2>
              <thead>
                <th width="1%">#</th>
                <th >Service Name</th>
                <th>Time Reservation</th>
                <th>Date Reservation</th>
                <th>Status</th>
                <th>Action</th>
              </thead>
              <tbody>
            <?php  if($num>0){                                       #if $num bracket 1>0= true
                    while ($row=mysqli_fetch_array($retValue)){     #while open bracket 
                    ?>
              <tr>
                  <td><?php echo $cnt;?></td> 
                  <td><?php echo $row['ServiceName'];?></td> 
                  <td><?php echo $row['edit_Reserv_Time'];?></td>
                  <td><?php echo $row['edit_Reserv_Date'];?></td>
                  <td><i class="fa fa-refresh fa-spin fa-2x fa-fw"></i>
              <?php if($row['edit_reserv_status'] == 0){          #if status 0 or false show echo the On Process...
                             echo "On My Process.."; } ?></td>
                  <td style="text-align: center">
                      <a href="editDone.php?reserv=<?php echo $row['edit_ReservAptNumber'];?>"><i class="fa fa-pencil fa-2x "></i></a><span style="font-size: 2em"> | </span>
                      <a href="../processofhomepage.php?reserv=<?php echo $row['edit_ReservAptNumber'];?>"><i class="fa fa-times fa-2x "></i></a>
                  </td> 
              <?php 
                  $cnt=$cnt+1;                                      #count increament every while loop process 
                      }                                             # while end bracket
                  }                                                 # if $num end bracket
                  else{  ?> </tr>                                        <!-- #else open bracket -->
                  <td colspan="8" align="center"> No Pending Serrvice record found!</td>
              <?php  } ?>                                           <!-- else end bracket -->
                  <tr>
                      <td style="border-style: none;"><a href="addservice.php"  class="site-btn sb-big">ADD SERVICE</a></td>
                  </tr>
          </table>
</body>
  <!--====== Javascripts & Jquery ======-->
  <script src="../../js/jquery-3.2.1.min.js"></script>
    <script src="../../js/jquery-ui.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/owl.carousel.min.js"></script>
    <script src="../../js/circle-progress.min.js"></script>
    <script src="../../js/main.js"></script>
</html>
<?php } #first else in top checking end braket ?>