<?php 
session_start();
error_reporting(0);
include('../../Database/dbconnection.php');                       #Database connection
if(strlen($_SESSION['userID']==0)){                               #first if checking open braket true
  header('location: /../../homepage/index.php');                                  #if true jump to home.html
}   else{                                                         #first if checking open braket true
                                                                  #first else in checking open braket
    $uid = $_SESSION['userID'];                              		  #from session in login.php-->

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
                    ap.beautician_id =  employ.employeeId and Status = '' ORDER BY AptDate ";
$result = mysqli_query($con, $select);  ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>My Reservation Status</title>  
              <meta charset="UTF-8">
              <meta name="description" content="Volume Salon">
              <meta name="keywords" content="Volume, Volume, creative, html">
              <meta name="viewport" content="width=device-width, initial-scale=1.0">
              <link rel="stylesheet" href="../../css/style.css" />
              <link href="../../img/volume.png" rel="shortcut icon"/>
              <link rel="stylesheet" href="../../css/font-awesome.min.css"/>
              <link rel="stylesheet" type="text/css" href="../../css/cssprocess.css">
              <link rel="stylesheet" type="text/css" href="../../css/designtableforlist.css">
              <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" /> 
              <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
              <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> 
              <link rel="stylesheet" href="../../css/reservation.css"/>
  </head>  
<body> 
 <?php include_once('../../includes/headerAccount.php');?>             <!-- Header section -->
           <div class="container" >  
                <h3 align="center"></h3>  
                <br />  
                <div class="table-responsive"> 
                <h1 class="myAppointh1"><b>MY APPOINTMENT</b></h1> 
                    <?php include('../../html/content/buttontomyreservation.html'); ?>
                     <table class="responstable"> 
                          <tr> 
                          	<th width="3%">#</th>
                              <th width="5%">Service Ref Number</th> 
                               <th width="10%">Service Name</th>   
                               <th width="10%">Reservation Date | Time</th> 
                               <th width="10%">Status</th>
                               <th width="10%">Action</th>
                          </tr>  
                            <?php 
                              $cnt = 1;
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
                        <div class="logo2">
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
    <script src="../../js/main.js"></script>
    <script>  
                  $(document).ready(function(){  
                        $('.view_data').click(function(){  
                            var employee_id = $(this).attr("id");  
                            $.ajax({  
                                  url:"../../control/mainprocessreservation/select.php",  
                                  method:"post",  
                                  data:{employee_id:employee_id},  
                                  success:function(data){  
                                      $('#employee_detail').html(data);  
                                      $('#dataModal').modal("show");  
                                  }  
                            });  
                        });  
                  });  
              </script>                                
<?php }  ?>                                                         <!-- first else in top checking end braket -->


