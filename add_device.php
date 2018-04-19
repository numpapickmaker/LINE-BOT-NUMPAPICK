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
$deviceid = $_REQUEST["deviceid"];
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
            echo '<td> <form action="https://numpapick.herokuapp.com/elder_info.php" method="get">';
            echo '<input type="hidden" name="userid" value="'.$userid.'">';
            echo '<button class="prevbutton" style = "font-size: 18px; width:80% ;margin: 0px 0px;" value="'.$row[0].'" name="deviceid">แก้ไข</button></td> </tr>';
            echo '</form>';
           // echo '<td><button class="prevbutton" style = "font-size: 18px; width:80% ;margin: 0px 0px;"> แก้ไข</button></td> </tr>';
         }
      
            echo '</tbody>';
            echo '</table>';
         //echo "Records created successfully\n";
      }
     //echo $result;
      pg_close($db) ;   
      
}
$elderinfo = $_REQUEST["elderinfo"]; 
if(!empty($elderinfo)){

    if($elderinfo == "3"){ // ลบข้อมูลอุปกรณ์ ที่เชื่อมต่อ ออกจาก ผู้ดูแล
        check_userlogout($userid,$deviceid);     
    }   
    if($elderinfo == "2"){ // บันทึกข้อมูล ผู้สูงอายุ
        save_elder_info($deviceid);
    }
    if($elderinfo == "1"){ // หาข้อมูลผู้สูงอายุ เพื่อทำตาราง แสดง
        create_table_elderlist($deviceid);
    } 
}
function save_elder_info($deviceid){
    // echo $elderinfo;
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
     $sql ="update Device_information set name='".$_REQUEST["name"]."',sex='".$_REQUEST["sex"]."',heigth='".$_REQUEST["heigth"]."',weigth='".$_REQUEST["weigth"]."',disease='".$_REQUEST["disease"]."' ,address='".$_REQUEST["address"]."',phone='".$_REQUEST["phone"]."',birthday='".$_REQUEST["birthday"]."' where device_id='".$deviceid."';";
    echo $sql;
    $ret = pg_query($db, $sql) ;
      if(!$ret) {
        // echo pg_last_error($db) ;
      } else {
         
        // echo "Records created successfully\n";
      }
     
      pg_close($db) ;   
}
function create_table_elderlist($deviceid){
    $male =  $female = "";
  
  $No =$Device_id =$Name =$Birthday =$Sex =$Heigth =$Weigth =$disease =$address = $phone = $Password = "";
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
     $sql ="SELECT * FROM Device_information WHERE Device_id='".$deviceid."';";
    // echo $sql;
    $ret = pg_query($db, $sql) ;
      if(!$ret) {
         echo pg_last_error($db) ;
      } else {
         $checking = 0;
         while($row = pg_fetch_row($ret) ){
        //  echo "have espname = " . $row[1] . "\n";
          // send_LINE('PASS');
          //  header("location: bot.php");
           $No = $row[0];
           $Device_id = $row[1];
           echo '<label > Device id  '.$Device_id.'</label>';
           $Name = $row[2];
           echo '<input type="text" id="namefld" name="namefld" value="'.$Name.'">';
           $Sex = $row[3];
           if($Sex == 'male'){
              $male = 'checked';
           }else{
              $female ='checked';
           }
          echo '<form id ="sexfld"> <input id="sexfld" type="radio" value="male" name="sexfld"'.$male.' />Male <input id="sexfld" type="radio" value="female" name="sexfld" '.$female.'/> Female </form>' ;
           $Heigth = $row[4];
           echo'<input id="heigthfld" type="text" value="'.$Heigth.'" >';
           $Weigth = $row[5];
           echo'<input id="weigthfld" type="text" value="'.$Weigth.'">';
           $disease = $row[6];
           echo'<input id="diseasefld" type="text" value="'.$disease.'">';
           $address  = $row[7];
           echo'<input id="addressfld" type="text" value="'.$address.'">';
           $phone = $row[8]; 
          echo'<input id="phonefld" type="text" value="'.$phone.'">';
           $Birthday = $row[9];
           echo '<input id="birthdayfld" type="date" value="'.$Birthday.'">';
         }
         if($checking == 0){
            // $username_err = 'No account found with that username.';
         }
         //echo "Records created successfully\n";
          $sql ="SELECT * FROM device WHERE Deviceid='".$deviceid."';";
        $ret = pg_query($db, $sql) ;
          if(!$ret) {
             echo pg_last_error($db) ;
          } else {
             $checking = 0;
             while($row = pg_fetch_row($ret) ){
            //  echo "have espname = " . $row[1] . "\n";
              // send_LINE('PASS');
              //  header("location: bot.php");
              
               $Password = $row[3];
              
             }
             if($checking == 0){
                // $username_err = 'No account found with that username.';
             }
          }
     }
      pg_close($db) ;   
}
function check_userlogout($userid,$esp){
       $host        = "host=ec2-54-83-48-188.compute-1.amazonaws.com";
      $port        = "port=5432";
      $dbname      = "dbname=ddagopqfb1uood";
      $credentials = "user=vsbryiqqffrttq password=7279cf8dae64f749857461db7933be4a2fb68bdc0ee6c037c158d82a755c3cf2";
      $db = pg_connect( "$host $port $dbname $credentials"  ) ;
      if(!$db) {
         echo "Error : Unable to open database\n";
      } else {
         echo "Opened database successfully\n";
      }
       $sql ="SELECT * FROM userline WHERE id='".$userid."' AND esp='".$esp."';";
       $ret = pg_query($db, $sql) ;
         if(!$ret) {
            echo pg_last_error($db) ;
         } else {
            $checking = 0;   
                 while($row = pg_fetch_row($ret)){
                     //echo "ESP name = " . $row[2] . "\n";
                     // send_LINE('PASS')
                      $checking = 1;     
                   //   send_LINE("you login already",$userid); 
                      $sql ="DELETE FROM userline WHERE id='".$userid."' AND esp='".$esp."';";
                      $ret = pg_query($db, $sql) ;
                      if(!$ret) {
                        //send_LINE("Logout Error!",$userid);
                         echo pg_last_error($db) ;
                      } else {
                         // header("location: manage.php?action=$userid");  
                          send_LINE("Device has been remove",$userid);
                          echo "logout";                       
                      }     
                  }  
                    
          if( $checking == 0){
                //save_userid($userid,$esp);
              send_LINE("you not login",$userid);
          }
        }
        pg_close($db) ;
   }
?>
