<?php
// Include config file
//cho $_GET["add"];
// Define variables and initialize with empty values
//$username = $password = "";
//$username_err = $password_err = "";
//$userid = $_GET["add"];
// Processing form data when form is submitted
$username = $_REQUEST["uname"];
$password = $_REQUEST["psw"];
$userid = $_REQUEST["userid"];
$result = "";            
if( !empty($username) && !empty($password)){   
      $host        = "host=ec2-54-83-48-188.compute-1.amazonaws.com";
      $port        = "port=5432";
      $dbname      = "dbname=ddagopqfb1uood";
      $credentials = "user=vsbryiqqffrttq password=7279cf8dae64f749857461db7933be4a2fb68bdc0ee6c037c158d82a755c3cf2";
      $db = pg_connect( "$host $port $dbname $credentials"  ) ;
      if(!$db) {
       //  echo "Error : Unable to open database\n";
      } else {
         //echo "Opened database successfully\n";
      }
      $sql ="SELECT * FROM device WHERE deviceid='".$username."' AND password='".$password."';";
    $ret = pg_query($db, $sql) ;
      if(!$ret) {
         echo pg_last_error($db) ;
      } else {
         $checking = 0;
         while($row = pg_fetch_row($ret) ){
          //echo "have espname = " . $row[1] . "\n";
          // send_LINE('PASS');
            $checking = 1;
            
             
         }
         if($checking == 0){
             $result = 'username or password is wrong.';
         }else{
              $sql ="SELECT * FROM userline WHERE id='".$userid."' AND esp='".$username."';";
              $ret = pg_query($db, $sql) ;
              if(!$ret) {
                //  echo pg_last_error($db) ;
              } else {
                  $checking = 0;   
                   while($row = pg_fetch_row($ret)){
                     //  echo "ESP name = " . $row[2] . "\n";
                       // send_LINE('PASS')
                        $checking = 1;     
                        //send_LINE("you login already",$userid);
                       // echo "string";     
                     }  
                    
                if( $checking == 0){
                           $sql ="SELECT MAX(userno) as LargestNO from userline;";
                      $ret = pg_query($db, $sql) ;
                      if(!$ret) {
                        echo pg_last_error($db) ;
                      } else {
                          while($row = pg_fetch_row($ret) ){
                         // echo "NO max = " . $row[0] . "\n";
                          $row[0] = intval($row[0]+1);
                          $sql =" INSERT INTO userline (userno,id,esp) VALUES ( ".$row[0].",'".$userid."','".$username."');";
                      }
                      $ret = pg_query($db, $sql) ;
                      if(!$ret) {
                      //  send_LINE("Login Error!",$userid);
                            echo pg_last_error($db) ;
                      } else {
                    //send_LINE("Login success",$userid);
                          //  echo "Records created successfully\n";
                    //getMqttfromlineMsg("555");
                         // header("location: manage.php?action=$userid");
                        $result = "success";
                      }
                  //echo "Records created successfully\n";
                  }
                }else{
                  $result = "you have been login";
                }
              }
         
                  
           }
         //echo "Records created successfully\n";
      }
      echo $result ;
      pg_close($db) ;
}   

// Include config file
//cho $_GET["add"];
// Define variables and initialize with empty values
$firstname = $_REQUEST["fname"];
$lastname = $_REQUEST["lname"];
$phone=$_REQUEST["phone"];
$email = $_REQUEST["email"];
$career= $_REQUEST["career"];
$birthday =$_REQUEST["birthday"];

$firstname_err = $lastname_err =  $phone_err=$email_err = $career_err= $birthday_err= "";


// Processing form data when form is submitted
if(!empty($firstname)){
   
      $host        = "host=ec2-54-83-48-188.compute-1.amazonaws.com";
      $port        = "port=5432";
      $dbname      = "dbname=ddagopqfb1uood";
      $credentials = "user=vsbryiqqffrttq password=7279cf8dae64f749857461db7933be4a2fb68bdc0ee6c037c158d82a755c3cf2";
      $db = pg_connect( "$host $port $dbname $credentials"  ) ;
      if(!$db) {
         echo "Error : Unable to open database\n";
      } else {
         //echo "Opened database successfully\n";
      }
       $sql ="SELECT * FROM user_info WHERE id='".$userid."';";
        $ret = pg_query($db, $sql) ;
      if(!$ret) {
         echo pg_last_error($db) ;
      } else {
          $check_id = 0;
         while($row = pg_fetch_row($ret) ){
            $check_id=1;
            // echo "check_id ==1";
         }
         if($check_id == 0){
          // echo "check_id ==0";
                $sql ="SELECT MAX(user_no) as LargestNO from user_info;";
                $ret = pg_query($db, $sql) ;
                if(!$ret) {
                   echo pg_last_error($db) ;
                } else {
                 
                   while($row = pg_fetch_row($ret) ){
                      $row[0] = intval($row[0]+1);
                      $sql ="insert into user_info values (".$row[0].",'".$userid."','".$firstname."','".$lastname."','".$phone."','".$email."','".$career."','".$birthday."');";
                      $result = $sql;
                       
                   }
                  
                        
                        $ret = pg_query($db, $sql) ;
                        if(!$ret) {
                            echo pg_last_error($db) ;
                        } else {
                            $checking = 0;   
                             while($row = pg_fetch_row($ret)){
                               //  echo "ESP name = " . $row[2] . "\n";
                                 // send_LINE('PASS')
                                  $checking = 1;     
                                  //send_LINE("you login already",$userid);
                                 // echo "string";     
                               }  
                              // header("location: https://numpapick.herokuapp.com/main.php?action=$userid");
                             $result = "success";
                          }
               
               
              }
         }
      }
    echo $result;
    pg_close($db) ;
      
  }    
 
$create_table = $_REQUEST["create"]; 
if(!empty($create_table)){

//echo $_GET["action"];
  
  $No =$Device_id =$Name =$Age =$Sex =$Heigth =$Weigth =$disease =$address = $phone = "";
 $host        = "host=ec2-54-83-48-188.compute-1.amazonaws.com";
      $port        = "port=5432";
      $dbname      = "dbname=ddagopqfb1uood";
      $credentials = "user=vsbryiqqffrttq password=7279cf8dae64f749857461db7933be4a2fb68bdc0ee6c037c158d82a755c3cf2";
      $db = pg_connect( "$host $port $dbname $credentials"  ) ;
      if(!$db) {
         echo "Error : Unable to open database\n";
      } else {
         //echo "Opened database successfully\n";
      }
     $sql ="SELECT device_information.device_id , device_information.name from device_information inner join userline on device_information.device_id =userline.esp where userline.id='".$userid."';";
     $ret = pg_query($db, $sql) ;
      if(!$ret) {
         echo pg_last_error($db) ;
      } else {
         $checking = 0;
         $n = 1;
          echo '<table width="100%" class="table table-striped  Taviraj">';
          echo '<thead>';
          echo '<tr>';
          echo '<th>หมายเลข</th>';
          echo '<th>ผู้ใช้งาน</th>';
          echo '<th>แก้ไข</th>';
          echo '</tr>';
          echo '</thead>';
          echo '<tbody>';
    
    
    
     
  
         while($row = pg_fetch_row($ret) ){
          
          // send_LINE('PASS');
          //  header("location: bot.php");

            echo '<tr>';
            echo '<td>'.$row[0].'</td>';
           echo '<td>'.$row[1].'</td>';
            echo '<td><button class="prevbutton" style = "font-size: 18px; width:80% ;margin: 0px 0px;"> แก้ไข</button></td> </tr>';

         }
      
            echo '</tbody>';
            echo '</table>';
         //echo "Records created successfully\n";
      }
     //echo $result;
      pg_close($db) ;   
      

}
?>
 
