<?php 
session_start();
error_reporting(0);
include('includes/dbconnection.php');                             #Database connection
if(strlen($_SESSION['userID']==0)){                               #first if checking open braket true
  header('location: home.html');                                  #if true jump to home.html
}                                                                 #first if checking open braket true
  else{                                                           #first else in checking open braket
    $uid = $_SESSION['userID'];                              		 #from session in login.php-->

      $select = "SELECT  user_id,
                    CONCAT(userfirstname ,' ',
                                usermidlename, ' ',
                                userlastname) AS FULLNAME, 
                                useremail,
                                userphonenumber ,
                    CONCAT(houseNumber,' ',
                                streetName,' ',
                                barangay,' ',
                                city,' ' ,
                                province,' ',
                                country,' ',
                                zipCode) as ADDRESS,
                                ServiceName,
                    ID,           
                    AptTime,
                    AptNumber,
                    AptDate  , 
                    Services_id, 
                    ApplyDate ,
                    Remark,
                    RemarkDate , 
                    Status,

                CONCAT(employeeFirstName,' ',
                                employeeMidleName, ' ',
                                employeeLastName) AS BeauticianName   
                    from tblusers U, 
                        tblappointment ap, 
                        tbluseraddress AD,
                        tblServices ser,
                        tblemployee employ
                    where 
                    U.user_id =  $uid  and 
                    AD.userid = $uid  and 
                    ap.userid = $uid  and 
                    ap.Services_id = ser.Service_id and
                    ap.beautician_id =  employ.employeeId and Status = 1 ORDER BY AptDate ";
                $result = mysqli_query($con, $select);  

                $query_getting_Count_ofRenderService = "SELECT * 
                         FROM tbl_edit_user_reservation editdata,
                              tblservices serv 
                         WHERE editdata.edit_reserv_status = 0 and 
                               editdata.edit_service_id = serv.Service_id and 
                               editdata.user_id = '$uid'";
                $retValue= mysqli_query($con,$query_getting_Count_ofRenderService);
                $num=mysqli_num_rows($retValue);

                $getUserName=mysqli_query($con,"select concat(userfirstname,' ',  userlastname) as name from tblusers where user_id ='$uid'");
                $row=mysqli_fetch_array($getUserName);
                $UserNameValue=$row['name'];
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
          <title></title>  
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
          <link rel="stylesheet" href="css/font-awesome.min.css"/>
          <link rel="stylesheet" href="css/reservation.css"/>
          <script src="javascriptprocess.js"></script>
      </head>  
      <body> 
       <header class="header-section">
              <div class="header-warp">
                    <div class="logo1 site-logo1"><!-- logo -->
                        <a href="">
                          <h1>VOLUME SALON</h1>
                          <span>Men and Woman</span>
                        </a>
                    </div>
                    <div class="header-right">
                        <a href="myprofile.php" class="site-btn sb-small" title="MY PROFILE">
                            <span><i class="fa fa-user-circle fa-2x" ></i></span><?php echo $UserNameValue?></a>
                              <ul class="sub">
                                  <li><a href="logout.php"><i class="fa fa-sign-out fa-2x"></i> LOG OUT</a></li>
                              </ul>
                    </div>
                    <div class="header-right1">
                        <a href="listAppoint.php" class="fa fa-scissors fa-2x" title="Service Render">
                            <?php if($num>0){?>
                              <span class="fa fa-circle"></span>
                              <span class="num"><?php echo $num; ?></span>
                            <?php } ?></a>
                    </div>
                    <ul class="main-menu"><!-- Navigation Menu -->
                      <li ><a href="home.php">Home</a></li>
                      <li><a href="about.php">About Us</a></li>
                      <li><a href="services1.php">Services</a></li>
                      <li><a href="news.php">News</a></li>
                      <li><a href="contact.php">Contact</a></li>
                    </ul>
              </div>
	</header> 
      <div class="container" style="width:11 00px;">  
          <h3 align="center"></h3>  
            <br />  
              <div class="table-responsive"> 
                <h1 class="myAppointh1"><b>MY RESERVATION</b></h1> 
                    <?php include('buttonmyappointstatus.html'); ?>
                        <table class="responstable"> 
                          <tr> 
                          	<th width="3%">#</th>
                              <th width="5%">Service Ref Number</th> 
                               <th width="10%">Service Name</th>   
                               <th width="10%">Reservation Date | Time</th> 
                               <th width="10%">Status</th>
                               <th width="10%">Action</th>
                          </tr>  
                          <?php $cnt = 1;
                              while($row = mysqli_fetch_array($result)){ ?>  
                          <tr>  
                          	   <td><?php echo $cnt ; ?></td>
                               <td><?php echo $row["AptNumber"]; ?></td> 
                               <td><?php echo $row["ServiceName"]; ?></td>  
                               <td><?php echo $row["AptDate"]; ?>  <span style="color: red;">|</span>  <?php echo $row["AptTime"]; ?>  </td>  
                               <td>
                                  <?php if($row["Status"] ==1 ){
                                      echo "<span style='color:green;'>Accepted</span>";
                                      }elseif($row["Status"] ==2 ){
                                        echo "<span style='color:RED;'>REJECT</span>";
                                      }else{
                                        echo "<span style='color:blue;'>Wait for Conformation...</span>";
                                      }  ?>
                               </td>  
                               <td style="text-align: center;"><input type="button" name="view" value="view" id="<?php echo $row["AptNumber"]; ?>" class="btn btn-info btn-xs view_data" /></td>  
                          </tr>  
                                      <?php $cnt = $cnt+1; }  ?> 
                     </table>  
                </div>  
           </div>  
      </body>  
 </html>

 <div id="dataModal" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                      <h3 style="text-align:center; color:#e22b63"><b>OFFICIAL DETAILS</b></h3>
                        <div class="logo">
                            <a href="">
                            <h1>VOLUME SALON</h1>
                              <span>Men and Woman</span>
                            </a>
                          </div>
                        </div>  
                      <div class="modal-body" id="employee_detail"></div>  
                  <div class="modal-footer">  
                <h4 style="text-align: center">Thank You! Happy To Serve you.</h4>
            </div>  
          </div>  
      </div>  
 </div>
<?php } #first else in top checking end braket ?>


