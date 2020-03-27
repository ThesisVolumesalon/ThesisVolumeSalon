<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
$Error_Details = $_SESSION['error_details'];

      $uid = $_SESSION['userID']; 


      $sql = "select userprofileimage from tblusers where user_id = $uid ";
      $result = mysqli_query($con,$sql);
      $rowdatas = mysqli_fetch_array($result);

      $image = $rowdatas['userprofileimage'];
      $image_src = "img/profile/".$image;

 ?>
<!DOCTYPE html>
<html>
<head>
  <title>My Profile</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="javascriptprocess.js"></script>
  </head>
  <style >
  .container{
            background-color: #181a1b;
    }
    input:not(:placeholder-shown) {
  border-color: red;
}

/* Show green borders when valid */
input:valid {
  border-color: gray ;
  color:black;
}

input{
  width: 100%;
  font: inherit;
  padding: 0.25em 0.5em;
  border: 0.125em solid black; 
  outline: none;
}
#inputs {
  display: flex; 
  align-items: center;
}
.labelforinput{
  color: white;
  font-weight:bold;
}
.col-sm-9 .nav .site-btn:hover{
  background-color: white;
  color: white;
}
.field-icon {
  float: right;
  margin-left: -30px;
  margin-top: -30px;
  position: relative;
  z-index: 2;
}
</style>


<body>

   <?php include_once('includes/headerAccount.php');?>
 
<div class="container bootstrap snippet">
    <div class="row">
      <div class="col-sm-10"><h1 class="labelforinput">My Profile</h1></div>
      
    </div>
    

    <div class="row">
      <div class="col-sm-3"><!--left col-->
              

      <div class="text-center">
<?php if ($image != null){ ?>
         <img src="<?php echo $image_src; ?>" class="avatar img-circle img-thumbnail" alt="avatar"> 
<?php }else { ?>
            <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="avatar img-circle img-thumbnail" alt="avatar">
<?php } ?>

        <h6>Upload a different photo</h6>
        <form action="processofhomepage.php" method="POST" enctype="multipart/form-data">
          <input type="number" hidden="" name="idofuser" value="<?php echo $uid; ?>">
        <input type="file" required="" name="imagename" class="text-center center-block file-upload"> 
        <input type="submit" name="submitimage" value="Upload Profile Picture">
        </form>
      </div></hr><br>

           
          
               
         
          
        </div><!--/col-3-->


      <div class="col-sm-9">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" class="btn-outline-secondary btn-lg" href="#home">Personal Details</a></li>
                
                <li><a data-toggle="tab" class="btn-outline-secondary btn-lg" href="#messages"> Address</a></li>
              </ul>
              
          <div class="tab-content">

                 <!--PERSONAL DETAILS TAB-->
                <div class="tab-pane active" id="home">
                <hr>

                  <form class="form" action="processofhomepage.php" method="post" >
                   <?php 
$data = "select * from tblusers where user_id = $uid";

$query = mysqli_query($con, $data);
while($rowdata=mysqli_fetch_array($query)){
?>
                      <div class="form-group">
                        <?php  if(isset($Error_Details)): ?>
                          <span><?php echo $Error_Details; ?></span>
                        <?php endif ?>
                          
                          <div class="col-xs-6">
                              <label for="first_name"><h4 class="labelforinput">First Name</h4></label>
                              <input type="text" class="form-control" name="first_name" class="inputs" value="<?php echo $rowdata['userfirstname']; ?>" id="first_name" placeholder="first name" title="Enter your first name.">
                          </div>
                      </div>

                      <div class="form-group">
                        <div class="col-xs-6">
                            <label for="midle_name" ><h4 class="labelforinput">Midle Name</h4></label>
                              <input type="text" class="form-control" name="midle_name" id="midle_name" value="<?php echo $rowdata['usermidlename']; ?>" placeholder="midle name" title="Enter your midle name.">
                          </div>
                      </div>
                          <div class="form-group">
                          <div class="col-xs-6">
                            <label for="last_name"><h4 class="labelforinput">Last Name</h4></label>
                              <input type="text" class="form-control" name="last_name" id="last_name" value="<?php echo $rowdata['userlastname']; ?>" placeholder="last name" title="Enter your last name.">
                          </div>
                      </div>
          
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="phone"><h4 class="labelforinput">Phone Number</h4></label>
                              <input type="text" class="form-control" name="phone" id="phone" value="<?php echo $rowdata['userphonenumber']; ?>" placeholder="enter phone" title="enter your phone number if any.">
                          </div>
                      </div>
          
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="email"><h4 class="labelforinput">Email</h4></label>
                              <input type="email" class="form-control" name="email" id="email" required="" value="<?php echo $rowdata['useremail']; ?>"  placeholder="you@email.com" title="enter your email.">
                          </div>
                      </div>
                      
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="password"><h4 class="labelforinput">Password</h4></label>
                              <input type="password" class="form-control" name="password" id="password-field" value="<?php echo $rowdata['userpassword']; ?>" placeholder="password" title="enter your password."><span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password fa-2x"></span>
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                            <label for="password1"><h4 class="labelforinput">Retype-Password</h4></label>
                              <input type="password" class="form-control" name="password1" id="password2" value="<?php echo $rowdata['userpassword']; ?>" placeholder="password2" title="Retype password.">
                          </div>
                      </div>
                       <div class="form-group">
                      </div>


                      <div class="form-group">
                           <div class="col-xs-12">
                                <input type="submit" class="btn btn-success" name="submitpersonaldetails" value="Update">
                            </div>
                      </div>
                                       </form>

             <?php } ?>

                </div><!--/tab-pane-->


                <!--ADRRESS TAB-->
                <div class="tab-pane" id="messages">
               <h2></h2>
               
               <hr>
                  <form class="form" action="processofhomepage.php" method="POST" id="registrationForm">
                      <div class="form-group">
                           <?php 

$data1 = "select * from tbluseraddress where userid = $uid";

$query1 = mysqli_query($con, $data1);
while($rowdata1=mysqli_fetch_array($query1)){ ?>
                          <div class="col-xs-6">
                              <label for="House_Number"><h4 class="labelforinput">House Number</h4></label>
                              <input type="number" class="form-control" name="House_Number" id="House_Number" value="<?php echo $rowdata1['houseNumber']; ?>"  maxlength="3" pattern="^0[1-9]|[1-9]\d$" placeholder="#" title="Enter your House Number.">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                            <label for="Street_Name"><h4 class="labelforinput">Street Name</h4></label>
                              <input type="text" class="form-control" name="Street_Name" id="Street_Name" value="<?php echo $rowdata1['streetName']; ?>" placeholder="Street Name" title="Enter your Street Name.">
                          </div>
                      </div>
          
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="Barangay"><h4 class="labelforinput">Barangay</h4></label>
                              <input type="text" class="form-control" name="Barangay" id="Barangay" value="<?php echo $rowdata1['barangay']; ?>"  placeholder="Enter Barangay Name" title="enter your Barangay."> 
                          </div>
                      </div>
          
                      <div class="form-group">
                          <div class="col-xs-6">
                             <label for="Municipality"><h4 class="labelforinput">Municipality</h4></label>
                              <input type="text" class="form-control" name="Municipality" id="Municipality"  value="<?php echo $rowdata1['city']; ?>"  placeholder="Enter Municipality" title="enter your mobile number if any.">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="Province"><h4 class="labelforinput">Province</h4></label>
                              <input type="text" class="form-control" name="Province" id="Province"  value="<?php echo $rowdata1['province']; ?>" placeholder="Province" title="Enter your Province.">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="Country"><h4 class="labelforinput">Country</h4></label>
                              <input type="text" class="form-control" id="Country"  name="Country" value="<?php echo $rowdata1['country']; ?>"  placeholder="Country" title="Enter a Country">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="Zip_Code"><h4 class="labelforinput">Zip Code</h4></label>
                              <input type="number" class="form-control" name="Zip_Code" id="Zip_Code"  value="<?php echo $rowdata1['zipCode']; ?>" placeholder="Zip Code" title="Enter your Zip Code.">
                          </div>
                      </div>
                      
                      <div class="form-group">
                           <div class="col-xs-12">
                                <input class="btn btn-success" type="submit" name="submitaddress" value="Update" >
                            </div>
                      </div>
                    <?php  } ?>
                </form>
                </div><!--/tab-pane id message-->
            
           </div><!--/tab-pane-->
        </div><!--/tab-content-->

        </div><!--/col-9-->
    </div><!--/row-->
             
  <script src="js/jquery-3.2.1.min.js"></script>
  <script src="js/jquery-ui.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/circle-progress.min.js"></script>
  <script src="js/main.js"></script>

</body>
</html>