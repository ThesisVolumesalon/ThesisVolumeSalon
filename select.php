<?php  

 if(isset($_POST["employee_id"])){  
  $AptNumber = $_POST["employee_id"];
  
      $output = '';  
      $connect = mysqli_connect("localhost", "root", "", "bpmsdb"); 

$select = " SELECT  
              CONCAT(userfirstname ,' ',
                     usermidlename, ' ',
                     userlastname) AS FULLNAME, 

              CONCAT(houseNumber,' ',
                     streetName,' ',
                     barangay,' ',
                     city,' ' ,
                     province,' ',
                     country,' ',
                     zipCode) AS ADDRESS,

              CONCAT(employeeFirstName,' ',
                     employeeMidleName, ' ',
                     employeeLastName) AS BeauticianName ,

                     useremail,
                     userphonenumber ,
                     ServiceName,
                     Cost,       
                     AptTime,
                     AptNumber,
                     AptDate  , 
                     Services_id, 
                     ApplyDate ,
                     Remark,
                     RemarkDate , 
                     Status 

            FROM     tblusers USER, 
                     tblappointment APPOINT, 
                     tbluseraddress ADDRSSS,
                     tblServices SERV,
                     tblemployee EMPLOY
                     
            WHERE    ADDRSSS.userid = USER.user_id AND 
                     APPOINT.userid = USER.user_id AND 
                     APPOINT.Services_id = SERV.Service_id AND
                     APPOINT.beautician_id =  EMPLOY.employeeId AND 
                     APPOINT.AptNumber = $AptNumber";
      
      $result = mysqli_query($connect, $select); 
      if($result){
      $output .= '  
      <div class="table-responsive">  
           <table class="responstable">';  
      while($row =mysqli_fetch_array($result)){  

            if($row["Status"] == 1){

           $output .= ' 
                <h3 style="text-align:center;"><b>'.$row["FULLNAME"].'</b></h3>
                <h4 style="text-align:center;">'.$row["ADDRESS"].'</h4>
                <h5 style="text-align:center; color:green"><b>'.($row["Status"] == 1 ? "ACCEPTED YOUR RESERVATION" : "<span style='color:red;'>NOT ACCEPTED YOUR RESERVATION</span>"). '</b></h5>
                <h6 style="text-align:center;"">Service Id: '.$row["AptNumber"].'</h6>

                <tr>  
                     <td width="30%"><label>Beautician Name</label></td>  
                     <td style="text-align:right; color:#e22b63" width="70%"><b>'.$row["BeauticianName"].'</b></td>  
                </tr>
                <tr>  
                     <td width="30%"><label>Service Name</label></td>  
                     <td style="text-align:right;" width="70%">'.$row["ServiceName"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Date | Time </label></td>  
                     <td style="text-align:right;" width="70%">'.$row["AptDate"].' <span style="color:red;"">|</span> '.$row["AptTime"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Accepted Date</label></td>  
                     <td style="text-align:right; width="70%">'.$row["RemarkDate"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Apply Date</label></td>  
                     <td style="text-align:right; width="70%">'.$row["ApplyDate"].'</td>  
                </tr> 
                <tr>  
                     <td width="30%"><label>Amout of Service  </label></td>  
                     <td style="text-align:right; width="70%">&#8369; '.$row["Cost"].'</td>  
                </tr>';  
}elseif($row["Status"] == 2){
     $output .= ' 
                <h1 style="text-align:center;"><b>Sorry..... </b></h1>
                <h3 style="text-align:center;"><b>'.$row["FULLNAME"].'</b></h3>
                <h4 style="text-align:center;">'.$row["ADDRESS"].'</h4>
                <h5 style="text-align:center; color:green"><b>'.($row["Status"] == 1 ? "ACCEPTED YOUR RESERVATION" : "<span style='color:red;'>YOUR RESERVATION NOT ACCEPTED!"). '</b></h5>
                <h6 style="text-align:center;"">Not for fitted to your reservation</h6>';

}else {
     $output .= ' 
                <h1 style="text-align:center;"><b>Wait For Confirmation </b></h1>
                <h3 style="text-align:center;"><b>'.$row["FULLNAME"].'</b></h3>
                <h4 style="text-align:center;">'.$row["ADDRESS"].'</h4>';

}
      }  
      $output .= "</table></div>";  
      echo $output;  
  }
 }  
 ?>
