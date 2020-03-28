<?php 
session_start();
error_reporting(0);
include('../../Database/dbconnection.php');                       #Database connection
if(strlen($_SESSION['userID']==0)){                               #first if checking open braket true
  header('location: /../../homepage/index.php');                   #if true jump to home.html
}                                                                 #first if checking open braket true
  else{                                                           #first else in checking open braket
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
<link rel="stylesheet" type="text/css" href="../../css/designtableforlist.css">
<link rel="stylesheet" type="text/css" href="../../css/cssprocess.css">

<link rel="stylesheet" href="../../css/style.css" />
          <script src="javascriptprocess.js"></script>

          <style>
.modal1{
  position: ar;
  top: 0;
  height: 100%;
  width: 100%;
  justify-content:center;
  align-items:center;
  

  }
.modal1_contents{
    background-color:red;
    padding: 1rem 4rem;
    margin: -1rem;

    }
.modal1_close-bar{
  display:flex;
  justify-content: flex-end;
  margin-right: -2rem;
  margin-top: 1rem;
}
.modal1data{
  float:center;
  
}

</style>
      </head>  
      <body> 
        
   <?php include_once('../../includes/headerAccount.php');?>             <!-- Header section -->
   
   
   <div class="modal1"> 
  <div class="modal1_contents">
    <div class="modal1_close-bar"><span>X</span></div >
     
    <div class="modal1data">
    <h3 style="text-align:center; color:#e22b63"><b>OFFICIAL DETAILS</b></h3>
    <p>Add Services</p>
                        
    
    <div class="modal-body" id="employee_detail"></div> 
     </div>
 
</div>

      <div class="container">  
          <h3 align="center"></h3>  
            <br />  
              <div class="table-responsive"> 
                <h1 class="myAppointh1"><b>MY RESERVATION</b></h1> 
                							<!-- Header section -->
                    <?php include('../../html/content/buttonmyappointstatus.html'); ?>
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
 
 
</div>
 
 
 <script src="../../js/jquery-3.2.1.min.js"></script>
<script src="../../js/jquery-ui.min.js"></script>
<script src="../../js/bootstrap.min.js"></script>
<script src="../../js/owl.carousel.min.js"></script>
<script src="../../js/circle-progress.min.js"></script>
<script src="../../js/main.js"></script>
<!-- <script>
const toggleModal = () => {
  document.querySelector('.modal')
    .classList.toggle('modal-hidden');
  
}
document.querySelector('#show-modal')
  .addEventListener('click', toggleModal);

document.querySelector('#learn-more')
  .addEventListener('#submit', (event) => {
  event.preventDefault();
  toggleModal();
});

document.querySelector('.modal_close-bar')
  .addEventListener('click', toggleModal);</script> -->

<?php } #first else in top checking end braket ?>


