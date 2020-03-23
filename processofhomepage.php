<?php 
session_start();
error_reporting(0);
include('includes/dbconnection.php');

$reservNum = $_GET['reserv'];


//LOGIN PROCESS:  press this will be the process from file of login.php
if(isset($_POST['login'])){
        $email=$_POST['email'];
        $password=$_POST['password'];

    $emailuserConnectedCheck = mysqli_query($con, "SELECT useremail FROM tblusers WHERE useremail ='$email' ");
    if(mysqli_fetch_array($emailuserConnectedCheck)<1){
            $Error_Login =  "<div class='alert alert-danger'>This Email is not exist! <br><a href='"."register.php"."'>Click here to Register</a></div>";
            $_SESSION['error_login'] =  $Error_Login;
            header('location: login.php');
      }else{
         $query=mysqli_query($con,"SELECT user_id FROM tblusers WHERE useremail = '$email' AND userpassword='$password' ");
         $result=mysqli_fetch_array($query);
            if($result>0){
                $_SESSION['userID']= $result['user_id'];
                header('location: home.php');
            }else{
                $Error_Login = "<div class='alert alert-danger'>Incorect Password! </div>";
                $_SESSION['error_login'] = $Error_Login;
                header('location: login.php');
            }
        }
  }

  
//REGISTRATION PROCESS:  press this will be the process from file of login.php
if(isset($_POST['submitregistrationdata'])){
        $firstname   = ucwords($_POST['userfirstname']);
        $lastname    = ucwords($_POST['userlastname']);
        $midlename   = ucwords($_POST['usermidlename']);
        $email       = strtolower($_POST['email']);
        $phonenumber = $_POST['phonenumber'];
        $password    = $_POST['password'];
        $cpassword   = $_POST['cpassword'];
        
$emailuserConnectedCheck = mysqli_query($con,"select useremail from tblusers where  useremail ='$email' ");
$phonenumberuserConnectedCheck = mysqli_query($con,"select userphonenumber from tblusers where  userphonenumber ='$phonenumber' ");

if(strlen($password) < 5 && strlen($cpassword) < 5){
      $Error_Register = "<div class='alert alert-danger'>* Password can not be less than 5 characters</div>"; 
      $_SESSION['error_register'] =  $Error_Register; 
      header('location: register.php');  
}else if(strlen($password) > 30 && strlen($cpassword) > 30){
      $Error_Register = "<div class='alert alert-danger'>* Password can not be more than 15 characters</div>";
      $_SESSION['error_register'] =  $Error_Register;      
      header('location: register.php');  
}else if($password != $cpassword){
      $Error_Register = "<div class='alert alert-danger'>* Password are not same</div>";
      $_SESSION['error_register'] =  $Error_Register;     
      header('location: register.php'); 
}else if( mysqli_fetch_array($phonenumberuserConnectedCheck)>0){
      $Error_Register= "<div class='alert alert-danger'>Sorry this number "." $phonenumber"." is Already Exist!</div>";
      $_SESSION['error_register'] =  $Error_Register;
      header('location: register.php');  
}else if( mysqli_fetch_array($emailuserConnectedCheck)>0){
      $Error_Register= "<div class='alert alert-danger'>Sorry your Email is Already Exist! <br> <a href='"."login.php"."'>Click here to Log In</a></div>";
      $_SESSION['error_register'] =  $Error_Register;
      header('location: register.php');  
}else{   
        $result = mysqli_query($con,"
        insert into tblusers (userfirstname, userlastname, usermidlename, useremail,userpassword,userphonenumber) 
        value ('$firstname', '$lastname', '$midlename', '$email', '$password','$phonenumber')");

        if($result){
            $_SESSION['email']=$email;
            header("location: addressform.php");
        }else{
            $Error_Register= "<div class='alert alert-danger'>Erro Insert Data!</div>";
            $_SESSION['error_register'] =  $Error_Register;
            header('location: register.php');  
        }
      }
}

  
//ADD reservation to tbl_edit_user_reservation PROCESS:  press this will be the process from file home.php and addservice.php
if(isset($_POST['submitreservation'])){
        $atime     = $_POST['time'];
        $services  = $_POST['service'];
        $Message   = $_POST['Message'];
        $uid       = $_SESSION['userID'];
        $aptnumber = mt_rand(100000000, 999999999);
        $adate     = date("Y-m-d", strtotime($_POST['select_date']));

    $query=mysqli_query($con,"INSERT INTO  tbl_edit_user_reservation(user_id, edit_ReservAptNumber, edit_Reserv_Date, edit_Reserv_Time, edit_service_id, edit_Message ) VALUE ( '$uid', '$aptnumber', '$adate', '$atime', '$services', '$Message')");

        if ($query){
            $_SESSION['userID'] = $uid;
            header('location: listAppoint.php');
        }else{
            $msg="Something Went Wrong. Please try again";
        }
}   


//SENT FINAL EDIT RESERVATION PROCESS: from file editDone.php
if(isset($_POST['submitEditDone'])){
    $uid       = $_POST['idofuser'];
    $services  = $_POST['service'];
    $atime     = $_POST['time'];
    $aptnumber = $_POST['apptNumber'];
    $adate     = $_POST['select_date'];

    $sql = "INSERT INTO tblappointment(userid,AptNumber,AptDate,AptTime,Services_id ) 
            VALUES('$uid','$aptnumber', '$adate','$atime','$services')";
    $query=mysqli_query($con,$sql);

    if ($query){
          $sql = "DELETE FROM tbl_edit_user_reservation WHERE edit_ReservAptNumber = $aptnumber ";
            $queryResult= mysqli_query($con,$sql);
            if($queryResult) {
                echo "<script>window.location.href = 'listAppoint.php'</script>";  
            }else{
                echo "<script>alert('Reservation has not Sent.');</script>"; 
                echo "<script>window.location.href = 'listAppoint.php'</script>";  
            }
    }else{
      $msg="Something Went Wrong. Please try again";
    }
}  



//GETTING DATA PROCESS:  from tblcategory using ajax from file javascriptprocess.js
if(isset($_POST["action"])){
      $output = '';
    if($_POST["action"] == "category"){
          $query   = "SELECT ServiceName, Service_id FROM tblservices WHERE category_id = '".$_POST["query"]."'";
          $result  = mysqli_query($con, $query);
          $output .= '<option value="">Select Service</option>';

        while($row = mysqli_fetch_array($result)){
            $output .= '<option value="'.$row["Service_id"].'">'.$row["ServiceName"].'</option>';
          }
 }



//GETTING DATA PROCESS:  from  tblservices using ajax from file javascriptprocess.js
    if($_POST["action"] == "service"){
          $query = "SELECT ServiceName, Service_id FROM tblservices WHERE category_id = '".$_POST["query"]."'";
          $result = mysqli_query($con, $query);
          $output .= '<option value="">Select Service</option>';

        while($row = mysqli_fetch_array($result)){
            $output .= '<option value="'.$row["Service_id"].'">'.$row["ServiceName"].'</option>';
          }
    }
    echo $output;
}



//DELETE DATA PROCESS: from file listAppoint.js
if(isset($reservNum)){
    $queryResult= mysqli_query($con,"DELETE FROM tbl_edit_user_reservation WHERE edit_ReservAptNumber = $reservNum ");
    if($queryResult) {
        echo "<script>window.location.href = 'listAppoint.php'</script>";  
    }else {
        echo "<script>alert('Reservation has not Cancel.');</script>"; 
        echo "<script>window.location.href = 'listAppoint.php'</script>";  
    }
}



//GIVING VALID INFORMATION PROCESS TO CHANGE PASSWORD: from file forgotPassword.php
if(isset($_POST['submitforgotpassword'])){
       $lastname    = ucwords($_POST['lastname']);
       $email       = strtolower($_POST['email']);
       $phonenumber = $_POST['phonenumber'];

        $emailuserConnectedCheck    = mysqli_query($con, "SELECT useremail       FROM tblusers WHERE useremail       = '$email' ");
        $lastnameuserConnectedCheck = mysqli_query($con, "SELECT userlastname    FROM tblusers WHERE userlastname    = '$lastname' ");
        $phoneuserConnectedCheck    = mysqli_query($con, "SELECT userphonenumber FROM tblusers WHERE userphonenumber = '$phonenumber'");
        $CompleteConnectedCheck     = mysqli_query($con, "SELECT * 
                                                          FROM  tblusers 
                                                          WHERE userphonenumber ='$phonenumber' AND  
                                                                useremail ='$email' AND 
                                                                userlastname = '$lastname'");

          if(mysqli_fetch_array($emailuserConnectedCheck)<1){
              $Error_For_Forgot_Password = "<div class='alert alert-danger' style='border-color:red;'>This Email ".
                       "<span style='color:red;'>"."$email"."</span>"." is not exist! <br><a href='"."register.php"."'> Click here to Register</a></div>";
              $_SESSION['error_forgot_password'] = $Error_For_Forgot_Password;
              header('location: forgotPassword.php');
          }else if(mysqli_fetch_array($lastnameuserConnectedCheck)<1){
              $Error_For_Forgot_Password = "<div class='alert alert-danger'>This last name "."<span style='color:red;'>"."$lastname"."</span>"." is not exist!</div>";
              $_SESSION['error_forgot_password'] = $Error_For_Forgot_Password;
              header('location: forgotPassword.php');
          }else if(mysqli_fetch_array($phoneuserConnectedCheck)<1){
              $Error_For_Forgot_Password = "<div class='alert alert-danger'>This Number "."$phonenumber"." is not exist!</div>";
              $_SESSION['error_forgot_password'] = $Error_For_Forgot_Password;
              header('location: forgotPassword.php');
          }else if (mysqli_fetch_array($CompleteConnectedCheck)<1) {
              $Error_For_Forgot_Password = "<div class='alert alert-danger'>Incorrect Details!</div>";
              $_SESSION['error_forgot_password'] = $Error_For_Forgot_Password;
              header('location: forgotPassword.php');
          }else{
              $query = mysqli_query($con,"SELECT user_id, 
                                                 concat(userfirstname,' ',
                                                 userlastname) AS fullname 
                                          FROM   tblusers 
                                          WHERE  useremail ='$email' AND 
                                                 userlastname = '$lastname' AND
                                                 userphonenumber = '$phonenumber' ");
              $rowResult = mysqli_fetch_array($query);
                  if($rowResult > 0){
                        $_SESSION['userId']= $rowResult['user_id'];
                        $_SESSION['username']= $rowResult['fullname'];
                        header("location: changepassword.php");
                  }
          }  
}


//CHANGING PASSWORD PROCESS: from file of chnagepassword.php
if(isset($_POST['submitchangepassword'])){
    $newpassword       = $_POST['newpassword'];
    $retypenewpassword = $_POST['retypenewpassword'];

      if(strlen($newpassword) < 5 && strlen($retypenewpassword) < 5){
            $Error_Change_Password= "<div class='alert alert-danger'>Password can not be less than 5 characters</div>";  
            $_SESSION['error_change_password'] = $Error_Change_Password;
            header('location: changepassword.php');
      }else if(strlen($newpassword) > 15 && strlen($retypenewpassword) > 15){
            $Error_Change_Password = "<div class='alert alert-danger'>Password can not be more than 15 characters</div>";   
            $_SESSION['error_change_password'] = $Error_Change_Password;
            header('location: changepassword.php');  
      }else if($newpassword != $retypenewpassword){
            $Error_Change_Password= "<div class='alert alert-danger'>Password are not the same</div>";
            $_SESSION['error_change_password'] = $Error_Change_Password;
            header('location: changepassword.php');
      }else{
          $updatePasswordCheckPoint = mysqli_query($con,"update tblusers set userpassword = '$newpassword' where user_id = '$user_id' ");
              if ($updatePasswordCheckPoint){
                  echo "<script>alert('Sucessfull Reset Password.');</script>";
                  session_destroy();
                  echo "<script>window.location.href = 'login.php'</script>"; 

              }else{
                  $Error = "<div class='alert alert-danger'>Not Update Password</div>";
                  $_SESSION['error_change_password'] = $Error_Change_Password;
                  header('location: changepassword.php');
              }
      }
}



//SET YOUR PROFILE IMAGE PROCESS : from myprofile.php
if(isset( $_POST['submitimage'])){

  $userid         = $_POST['idofuser'];
  $name           = $_FILES['imagename']['name'];
  $target_dir     = "img/profile/";
  $target_file    = $target_dir . basename($_FILES["imagename"]["name"]);
  $imageFileType  = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));                        // Select file type

  $extensions_arr = array("jpg","jpeg","png","gif"); 
                                              // Valid file extensions
  if( in_array($imageFileType,$extensions_arr) ){                                                // Check extension
    $query = "update tblusers set userprofileimage ='".$name."' where user_id = '".$userid ."'"; // Insert record  
     mysqli_query($con,$query);
     move_uploaded_file($_FILES['imagename']['tmp_name'],$target_dir.$name);                     // Upload file
     header('location: myprofile.php');                    
  }
}



//DDATA FOR YOUR PERSONAL DETAILS PROCESS: from the file of myprofile.php
if(isset($_POST['submitpersonaldetails'])){

  $first_name = ucwords($_POST['first_name']);
  $midle_name = ucwords($_POST['midle_name']);
  $last_name  = ucwords($_POST['last_name']);
  $password  = $_POST['password'];
  $cpassword   = $_POST['password1'];
  $phonenumber = $_POST['phone'];
  $email = $_POST['email'];

if(strlen($password) < 5 && strlen($cpassword) < 5){
      $Error= "<div class='alert alert-danger'>* Password can not be less than 5 characters</div>";    
}else if(strlen($password) > 30 && strlen($cpassword) > 30){
      $Error = "<div class='alert alert-danger'>* Password can not be more than 15 characters</div>";     
}
else if($password != $cpassword){
      $Error= "<div class='alert alert-danger'>* Password are not the same</div>";
}
else{

    $queryUpdateUserDetails = "update tblusers 
                                set  
                                userfirstname   = '$first_name',
                                userlastname    = '$last_name',
                                usermidlename   = '$midle_name',
                                useremail       = '$email',
                                userphonenumber = '$phonenumber',
                                userpassword    = '$password'
                                where user_id   =  $uid";
      $resultUpdaeUserdetails = mysqli_query($con, $queryUpdateUserDetails);
      if($resultUpdaeUserdetails){
        $Error_Details = "<div class='alert alert-success' style='text-align:center;'>Update Succesfully</div>";
        $_SESSION['error_details'] =$Error_Details;
        header('location: myprofile.php');
      }else{
        $Error_Details = "<div class='alert alert-danger' style='text-align:center;'>Not Succesfully update</div>";
        $_SESSION['error_details'] = $Error_Details;
        header('location: myprofile.php');
      }

}

}



//PROCESS FOR YOUR ADDRESS DETAIL : from myprofile.php
if(isset($_POST['submitaddress'])){

  $houseNumber = $_POST['House_Number'];
  $streetName  = ucwords($_POST['Street_Name']);
  $barangay    = ucwords($_POST['Barangay']);
  $province    = ucwords($_POST['Province']);
  $city        = ucwords($_POST['Municipality']);
  $country     = ucwords($_POST['Country']);
  $zipCode     = $_POST['Zip_Code'];


    $queryUpdateUserDetailsaddress = "update tbluseraddress
                                set  
                                houseNumber = '$houseNumber',
                                streetName   = '$streetName',
                                barangay  = '$barangay',
                                province     =  '$province',
                                city = '$city',
                                country = '$country',
                                zipCode = '$zipCode'
                                where userId = $uid";

      $resultUpdaeUserdetails = mysqli_query($con, $queryUpdateUserDetailsaddress);
      if($resultUpdaeUserdetails){
          $Error_Details = "<div class='alert alert-success' style='text-align:center;'>Update Succesfully your Address</div>";
          $_SESSION['error_details'] = $Error_Details;
          header('location: myprofile.php');
      }else{
          $Error_Details = "<div class='alert alert-danger' style='text-align:center;'>Not Succesfully update your Address</div>";
          $_SESSION['error_details'] = $Error_Details;
          header('location: myprofile.php');
      }
}


?>
























