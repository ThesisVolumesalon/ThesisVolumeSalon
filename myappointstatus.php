<?php 
session_start();
error_reporting(0);

include('includes/dbconnection.php');                             #Database connection
if(strlen($_SESSION['userID']==0)){                               #first if checking open braket true
  header('location: home.html');                                  #if true jump to home.html
}                                                                 #first if checking open braket true
  else{                                                           #first else in checking open braket
    $uid = $_SESSION['userID'];                              		 #from session in login.php-->


 $connect = mysqli_connect("localhost", "root", "", "bpmsdb"); 


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
              ap.beautician_id =  employ.employeeId ORDER BY Status = '2' ";


$result = mysqli_query($connect, $select);  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title></title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  

  <link rel="stylesheet" href="css/font-awesome.min.css"/>


            <script>  
 $(document).ready(function(){  
      $('.view_data').click(function(){  
           var employee_id = $(this).attr("id");  
           $.ajax({  
                url:"select.php",  
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
         
           <style type="text/css">
             
button a{
  height: 3pc;
    border-radius: 10px;
    color: black;
    font-size: 22px;
    background-color: #e22b63;
}
.responstable {
  margin: 1em 0;
  width: 100%;
  overflow: hidden;
  background: #FFF;
  color: #black;

}
.responstable tr {
  display: nome;
}
.responstable tr:nth-child(odd) {
  background-color: #EAF3F3;
}
.responstable th {
  display: none;
  border: 1px solid #FFF;
  background-color: #e22b63;
  color: #FFF;
  padding: 1em;
  font-weight: bold;
}
.responstable th:first-child {
  display: table-cell;
  text-align: center;

  font-weight: bold;
}
.responstable th:nth-child(2) {
  display: table-cell;
}
.responstable th:nth-child(2) span {
  display: none;
}
.responstable th:nth-child(2):after {
  content: attr(data-th);
}
@media (min-width: 480px) {
  .responstable th:nth-child(2) span {
    display: block;
  }
  .responstable th:nth-child(2):after {
    display: none;
  }
}
.responstable td {
  display: block;
  word-wrap: break-word;
  max-width: 7em;
}
.responstable td:first-child {
  display: table-cell;
  text-align: center;
}
@media (min-width: 480px) {
  .responstable td {
    border: 1px solid #D9E4E6;
  }
}
.responstable th, .responstable td {
  text-align: left;
  margin: .5em 1em;
}
@media (min-width: 480px) {
  .responstable th, .responstable td {
    display: table-cell;
    padding: 1em;
  }
}

body {
  padding: 0 2em;
  font-family: Arial, sans-serif;
  color: #024457;
  background: #f2f2f2;
}

h1 {
  font-family: Verdana;
  font-weight: normal;
  color: #024457;
}
h1 span {
  color: #167F92;
}
.myAppointh1{
  text-align: center;
}
.logo {
    background: #1b1b1b;
    text-align: center;
    float: center;
    width: 100% auto;
}
.logo a{
  text-decoration: none;
}
.logo a h1 {
    color: #fff;
    font-size: 2.5em;
    line-height: 1em;
    font-weight: 750;
}
.logo a span {
    color: #F8F8F8;
    font-size: 1em;
    text-align: center;
    letter-spacing: 5px;
}
.modal-header .logo:hover  a h1{
  color: #e22b63;
}
.modal-header .logo:hover a span{
  color: #e22b63;
}



           </style>





           <style type="text/css">
             


.header-section {
  background: #1e1e1e;
  padding: 0 15px;
  border-bottom: 2px solid #e22b63;
  
}

.header-warp {

  max-width: 1613px;
  margin: 0 auto;
}

.site-logo {
  display: inline-block;
}

.nav-switch {
  display: none;
}

.main-menu {
  display: inline-block;
  list-style: none;
  padding-left: 125px;
}

.main-menu li {
  display: inline;
}

.main-menu li a {
  display: inline-block;
  color: #fff;
  font-size:25px;
  padding: 39px 10px;
  -webkit-transition: all 0.3s;
  transition: all 0.3s;
}

.main-menu li a:hover {
  color: #e22b63;

  text-decoration: none;

}

.main-menu li.active a {
  background: #e22b63;

}

.main-menu li.active a:hover {
  color: #fff;
}

.header-right {
  float: right;
  padding-top: 37px;
}

.header-right .site-btn {
  margin-left: 7px;
}

/*logo*/


.header-warp .logo1:hover  a h1{
  color: #e22b63;
}
.header-warp .logo1:hover  a span{
  color: #e22b63;
}

.logo1 {
    background: #1b1b1b;
    text-align: center;
    float: left;
    display: inline-block;
}
.logo1 a{
    padding: 3em .3em .1em;
  text-decoration: none;
}
.logo1 a h1 {
    color: #fff;
    font-size: 2.5em;
    line-height: 1em;
    font-weight: 750;
}
.logo1 a span {
    color: #F8F8F8;
    font-size: 1em;
    text-align: center;
    letter-spacing: 5px;
}


/*for button with name and sub block in line =*/

 .sub{
  display: none; 
}
.site-btn {
  display: inline-block;
  text-align: center;
  font-size: 16px;
  color: #fff;
  padding: 10px 28px;
  min-width: 145px;
  border: 2px solid #e22b63;
  background: #e22b63;
  cursor: pointer;
  -webkit-transition: all 0.3s ease 0s;
  transition: all 0.3s ease 0s;
}

.site-btn:hover {
  color: #fff;
}
.header-warp .header-right .site-btn:hover{
  background-color: #1b1b1b;
  color: #e22b63;
  text-decoration: none;
}
  


.header-warp .header-right:hover  .sub {
  list-style-type: none;
  border-radius: 0;
    display: block;

  width: 190px;


}
 .header-warp .header-right:hover .sub:last-child{
  border-bottom: none;

  text-align: left;
}
.header-warp .header-right:hover .sub li a{
  color: #e22b63;
  font-size: 17px;
  font-style: bold;
}
.header-warp .header-right:hover .sub li span{
  font-size: 30px;
}
.header-warp .header-right:hover .sub li a:hover{
  color: white;
  text-decoration: none;
}

/*Scissor icon redering service float right with beside of button profile*/

.header-right1 {
  float: right;
  padding-top: 50px;
}
a.fa {
  position: relative;
  display: block;
  height: 50px;
  width: 50px;
  color: white;
  background-size: contain;
  text-decoration: none;
}
a.fa:hover {
  position: relative;
  display: block;
  height: 50px;
  width: 50px;
  color:#e22b63;
  background-size: contain;
  text-decoration: none;
}

span.fa-circle {
  position: absolute;
  font-size: 0.8em;
  top: -0.5em;
  color: red;
  right: 0.4em;
}
span.num {
  position: absolute;
  font-size: 0.7em;
  top: -0.6em;
  color: #fff;
  right:0.7em;
}




           </style>



      </head>  
      <body> 
        <?php 

        $ret=mysqli_query($con,"select concat(userfirstname,' ',  userlastname) as name from tblusers where user_id ='$uid'");
$row=mysqli_fetch_array($ret);
$name=$row['name'];  ?>


       <header class="header-section">
		<div class="header-warp">

			<!-- logo -->
			<div class="logo1 site-logo1">
          <a href="">
            <h1>VOLUME SALON</h1>
            <span>Men and Woman</span>
          </a>
        </div>


         <div class="header-right">
      <a href="myprofile.php" class="site-btn sb-small" title="MY PROFILE"><span><i class="fa fa-user-circle fa-2x" ></i></span><?php echo $name?></a>
              <ul class="sub">
                  <li><a href="logout.php"><i class="fa fa-sign-out fa-2x"></i> LOG OUT</a></li>
              </ul>
    </div>

    <div class="header-right1">
          <a href="listAppoint.php" class="fa fa-scissors fa-2x" title="Service Render">
      <?php 
        $sql = "select * 
            FROM tbl_edit_user_reservation editdata,
             tblservices serv 
          WHERE editdata.edit_reserv_status = 0 and 
              editdata.edit_service_id = serv.Service_id and 
              editdata.user_id = '$uid'";
            $retValue= mysqli_query($con,$sql);
        $num=mysqli_num_rows($retValue);
          if($num>0){?>
            <span class="fa fa-circle"></span>
              <span class="num"><?php echo $num; ?></span>
          <?php } ?></a>
        </div>
			<!-- responsive -->
			<div class="nav-switch">
				<i class="fa fa-bars"></i>
			</div>
			<!-- Navigation Menu -->
			<ul class="main-menu">
				<li ><a href="home.php">Home</a></li>
				<li><a href="about.html">About Us</a></li>
				<li><a href="services.html">Services</a></li>
				<li><a href="blog.html">News</a></li>
				<li><a href="contact.html">Contact</a></li>
			</ul>
			
		</div>
	</header> 
           <div class="container" style="width:11 00px;">  
                <h3 align="center"></h3>  
                <br />  
                <div class="table-responsive"> 
                <h1 class="myAppointh1"><b>MY APPOINTMENT</b></h1> 
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

                     <div class="logo">
          <a href="">
            <h1>VOLUME SALON</h1>
            <span>Men and Woman</span>
          </a>
        </div>


                </div>  
                <div class="modal-body" id="employee_detail">  
                </div>  
                <div class="modal-footer">  
                     <h4 style="text-align: center">Thank You! Happy To Serve you.</h4>
                </div>  
           </div>  
      </div>  
 </div>

<?php } #first else in top checking end braket ?>


