<?php
require("line.php");
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
$info =$_REQUEST["info"];
if($info == "1"){
    
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
       //echo $sql ;
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
                     // $result = $sql;
                      // echo $result;
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
 if($info == '2'){
  update_userinfo($userid,$firstname,$lastname,$phone,$email,$career,$birthday);
 }  
 function update_userinfo($userid,$firstname,$lastname,$phone,$email,$career,$birthday){

    
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
      $sql ="UPDATE user_info set firstname='".$firstname."',lastname='".$lastname."',phone='".$phone."',email='".$email."',career='".$career."',birthday='".$birthday."' WHERE id='".$userid."';";
      //echo $sql;
      $ret = pg_query($db, $sql) ;
      if(!$ret) {
        echo pg_last_error($db) ;
      } else {                           
      // header("location: https://numpapick.herokuapp.com/main.php?action=$userid");
        $result = "success";
      }
    echo $result;
    pg_close($db) ;
    
  
 }  
 $create_userinfo = $_REQUEST['create_userinfo']; 
 if(!empty($create_userinfo)){
  create_userinfo($userid);
  //echo  $create_userinfo;
 }   
 function create_userinfo($userid){
  $No =$Firstname =$Lastname =$Phone =$Email =$Career =$Birthday = "";
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
     //echo $sql;
    $ret = pg_query($db, $sql) ;
      if(!$ret) {
         echo pg_last_error($db) ;
      } else {
         $checking = 0;
         while($row = pg_fetch_row($ret) ){
        //  echo "have espname = " . $row[1] . "\n";
          // send_LINE('PASS');
          //  header("location: bot.php");
           /*
           $No = $row[0];
           $Firstname = $row[2];
           $Lastname = $row[3];
           $Phone = $row[4];
           $Email = $row[5];
           $Career = $row[6];
           $Birthday = $row[7];
           */
          echo '<input  type="text"  name="fname" id="fname" placeholder="ชื่อ" class = "Taviraj" value="'.$row[2].'"  required >';
          echo '<p id="fname_error"></p>';
          echo '<input type="text" id="lname" name="lname" placeholder="นามสกุล" class = "Taviraj" value="'.$row[3].'" required>';
          echo '<p id="lname_error"></p>';
          echo '<input type="text" id="phone" name="phone" placeholder="เบอร์โทรศัพท์" class = "Taviraj" value="'.$row[4].'" required >';
          echo '<p id="phone_error"></p>';
          echo '<input type="text" id="email" name="email" placeholder="อีเมล" class = "Taviraj" value="'.$row[5].'" required>';
          echo '<p id="email_error"></p>';
          echo '<input type="text" id="career" name="career" placeholder="อาชีพ" class = "Taviraj" value="'.$row[6].'" required >';
          echo '<p id="career_error"></p>';
          $Birthday = $row[7];
           $Birthday = explode('-', $Birthday);
           $year  = $Birthday[0];   
           $month = $Birthday[1];
           $day   = $Birthday[2];
         
           echo ' <input class="form-control" class = "Taviraj" id="date" name="date" placeholder="DD/MM/YYY" value="'.$year.'/'.$month.'/'.$day.'" type="text" required/><p></p>';
         }
         if($checking == 0){
            // $username_err = 'No account found with that username.';
         }
         //echo "Records created successfully\n";
      }
     
      pg_close($db) ;   
}
$create_table = $_REQUEST["create"]; 
$path = $_REQUEST["path"];
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
            echo '<input type="hidden" name="path" value="'.$path.'">';   
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
$register = $_REQUEST["register"];
if(!empty($register)){
  send_LINE("สมัครใช้งานสำเร็จ",$userid);
  echo "success";
}
$Unsubscribe = $_REQUEST["Unsubscribe"];
if(!empty($Unsubscribe)){
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
     $sql ="delete from userline where id='".$userid."';";
    echo $sql;
    $ret = pg_query($db, $sql) ;
      if(!$ret) {
         echo pg_last_error($db) ;
      } else {
          $sql ="delete from user_info where id='".$userid."';";
          echo $sql;
          $ret = pg_query($db, $sql) ;
          if(!$ret) {
             echo pg_last_error($db) ;
          } else {
              
             echo "success";
             send_LINE("ยกเลิกบริการสำเร็จ",$userid);
            // echo "Records created successfully\n";
          }
        // echo "Records created successfully\n";
      }
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
         echo pg_last_error($db) ;
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
           echo '<input style="width: 100%; padding: 12px 28px; margin: 0px 2px; display: inline-block;border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;" type="text" id="namefld" name="namefld" value="'.$Name.'" placeholder="ชื่อ - นามสกุล" required><p></p>';
           $Sex = $row[3];
           if($Sex == 'male'){
              $male = 'checked';
           }else{
              $female ='checked';
           }
          echo '<form id ="sexfld"> <input  id="sexfld" type="radio" value="male" name="sexfld"'.$male.' />Male <input id="sexfld" type="radio" value="female" name="sexfld" '.$female.'/> Female </form><p></p>' ;
           $Heigth = $row[4];
           echo'<input style="width: 100%; padding: 12px 28px; margin: 0px 2px; display: inline-block;border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;" id="heigthfld" type="text" value="'.$Heigth.'" placeholder="ความสูง" required><p></p>';
           $Weigth = $row[5];
           echo'<input style="width: 100%; padding: 12px 28px; margin: 0px 2px; display: inline-block;border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;" id="weigthfld" type="text" value="'.$Weigth.'" placeholder="น้ำหนัก" required><p></p>';
           $disease = $row[6];
           echo'<input style="width: 100%; padding: 12px 28px; margin: 0px 2px; display: inline-block;border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;" id="diseasefld" type="text" value="'.$disease.'" placeholder="โรคประจำตัว" required><p></p>';
           $address  = $row[7];
           echo'<input style="width: 100%; padding: 12px 28px; margin: 0px 2px; display: inline-block;border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;" id="addressfld" type="text" value="'.$address.'" placeholder="ที่อยู่" required><p></p>';
           $phone = $row[8]; 
          echo'<input style="width: 100%; padding: 12px 28px; margin: 0px 2px; display: inline-block;border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;" id="phonefld" type="text" value="'.$phone.'" placeholder="เบอร์โทรศัพท์" required><p></p>';
           
               
           $Birthday = $row[9];
           $Birthday = explode('-', $Birthday);
           $year  = $Birthday[0];   
           $month = $Birthday[1];
           $day   = $Birthday[2];
         
           echo '<input style="width: 100%; padding: 12px 28px; margin: 0px 2px; display: inline-block;border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;" id="birthdayfld" type="text" value="'.$year.'-'.$month.'-'.$day.'" placeholder="อายุ" required><p></p>';
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
         //echo "Opened database successfully\n";
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
                            echo "logout";   
                          send_LINE("ลบอุปกรณ์หมายเลข : ".$esp,$userid);
                             echo "sendline";                    
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
