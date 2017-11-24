<?php
   function save_userid($userid,$esp){ 
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
      $sql ="SELECT MAX(userno) as LargestNO from userline;";
    $ret = pg_query($db, $sql) ;
      if(!$ret) {
         echo pg_last_error($db) ;
      } else {
         while($row = pg_fetch_row($ret) ){
         echo "NO max = " . $row[0] . "\n";
         $row[0] = intval($row[0]+1);
          $sql =" INSERT INTO userline (userno,id,esp) VALUES ( ".$row[0].",'".$userid."','".$esp."');";
         }
         //echo "Records created successfully\n";
      }
    $ret = pg_query($db, $sql) ;
      if(!$ret) {
       send_LINE("Login Error!",$userid);
         echo pg_last_error($db) ;
      } else {
       send_LINE("Login success",$userid);
        echo "Records created successfully\n";
         //getMqttfromlineMsg("555");
                
         
      }
      pg_close($db) ;
   }
   function check_userid($userid,$msg){
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
      $sql ="SELECT * FROM userline WHERE id='".$userid."';";
    $ret = pg_query($db, $sql) ;
      if(!$ret) {
         echo pg_last_error($db) ;
      } else {
         $checking = 0;   
              while($row = pg_fetch_row($ret)){
                  echo "ESP name = " . $row[2] . "\n";
                  // send_LINE('PASS')
                   $checking = 1;     
                        send_LINE("Wait a Second",$userid);
                        getMqttfromlineMsg($row[2],$msg);
                }  
                  
        if( $checking == 0){
             send_LINE("Please login",$userid);
        }
         //echo "Records created successfully\n";
      }
     
      pg_close($db) ;
   }
   function check_userlogin($userid,$esp){
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
                     echo "ESP name = " . $row[2] . "\n";
                     // send_LINE('PASS')
                      $checking = 1;     
                      send_LINE("you login already",$userid);
                           
                   }  
                  
           if( $checking == 0){
                save_userid($userid,$esp);
           }
        }
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
                     echo "ESP name = " . $row[2] . "\n";
                     // send_LINE('PASS')
                      $checking = 1;     
                   //   send_LINE("you login already",$userid); 
                      $sql ="DELETE FROM userline WHERE id='".$userid."' AND esp='".$esp."';";
                      $ret = pg_query($db, $sql) ;
                      if(!$ret) {
                         echo pg_last_error($db) ;
                      } else {
                            
                          send_LINE("logout success",$userid);
                                                 
                                }     
                  }  
                  
          if( $checking == 0){
                //save_userid($userid,$esp);
              send_LINE("you not login",$userid);
          }
        }
   }
   function check_login($userid,$esp){
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
     $sql ="SELECT * FROM device WHERE espname='".$esp."';";
    $ret = pg_query($db, $sql) ;
      if(!$ret) {
         echo pg_last_error($db) ;
      } else {
         $checking = 0;
         while($row = pg_fetch_row($ret) ){
          echo "have espname = " . $row[1] . "\n";
          // send_LINE('PASS');
            //check_send($row[1],$msg);
          $checking = 1 ;
          
           check_userlogin($userid,$row[1]);
             
         }
         if($checking == 0){
            send_LINE("Incorrect Device Name",$userid);
         }
         //echo "Records created successfully\n";
      }
   }
    function check_send($esp,$msg){
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
      $sql ="SELECT * FROM userline WHERE esp='".$esp."';";
    $ret = pg_query($db, $sql) ;
      if(!$ret) {
         echo pg_last_error($db) ;
      } else {
         while($row = pg_fetch_row($ret) ){
         echo "userid = " . $row[1] . "\n";
         // send_LINE('PASS');
            
            if($row[1] == " "){
               //send_LINE('Please Login',$userid);
             
            }else{
     
               if($msg == "FALL"){
                   send_FALL($row[1]);
               }else if($msg == "CHECK"){
                 send_CHECK($row[1]); 
               }else if($msg == "LOW"){
                 send_LOWBAT($row[1]); 
               }else if($msg == "PRESS"){
                 send_PRESS($row[1]); 
               }else{
                  send_LINE($msg,$row[1]);
               }
            }  
         }
         //echo "Records created successfully\n";
      }
     
      pg_close($db) ;
   }
function save_esp($esp){ 
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
      $sql ="SELECT MAX(espno) as LargestNO from device;";
    $ret = pg_query($db, $sql) ;
      if(!$ret) {
         echo pg_last_error($db) ;
      } else {
         while($row = pg_fetch_row($ret) ){
         echo "NO max = " . $row[0] . "\n";
         $row[0] = intval($row[0]+1);
          $sql =" INSERT INTO device (espno,espname) VALUES ( ".$row[0].",'".$esp."');";
         }
         //echo "Records created successfully\n";
      }
    $ret = pg_query($db, $sql) ;
      if(!$ret) {
         echo pg_last_error($db) ;
      } else {
         
        echo "Records created successfully\n";
         //getMqttfromlineMsg("555");
                
         
      }
      pg_close($db) ;
   }
   function check_esp($esp,$msg){
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
      $sql ="SELECT * FROM device WHERE espname='".$esp."';";
    $ret = pg_query($db, $sql) ;
      if(!$ret) {
         echo pg_last_error($db) ;
      } else {
         $checking = 0;
         while($row = pg_fetch_row($ret) ){
          echo "have espname = " . $row[1] . "\n";
          // send_LINE('PASS');
            check_send($row[1],$msg);
            $checking = 1 ;
            
             
         }
         if($checking == 0){
             save_esp($esp);
         }
         //echo "Records created successfully\n";
      }
     
      pg_close($db) ;
   }
    
?>
