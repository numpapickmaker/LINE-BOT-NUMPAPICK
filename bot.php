<?php
 require("pub.php");
 require("line.php");
require("db.php");
//require("add_device.php");
// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
// Validate parsed JSON data
if(!is_null($events['check'])){
  send_LINE('json','Ue77a191627f6ac91899e75d92264310c');
}
if (!is_null($events['ESP'])) {
  if($events['ESP'] == 'CHECK'){
    check_send($events['NAME'],$events['MSG']); 
    //send_LINE($events['MSG'],'Ue77a191627f6ac91899e75d92264310c');
  }
  
  if($events['ESP'] == 'HELP'){
    check_send($events['NAME'],$events['MSG']); 
  
  }
  if($events['ESP'] == 'REGISTER'){
    Check_ESP($events['NAME'],$events['MSG'],$events['ID']);
  }
  if($events['ESP'] == 'BAT'){
    Check_ESP($events['NAME'],$events['MSG']);
  }
  if($events['ESP'] == 'RESET'){
    update_ESP($events['NAME'],$events['MSG']);
  }
  echo "OK";
  }
if (!is_null($events['events'])) {
  echo "line bot";
  // Loop through each event
  foreach ($events['events'] as $event) {
    // Reply only when message sent is in 'text' format
    if ($event['type'] == 'follow') {
      $userId = $event['source']['userId'];
      //send_PRESS($userId);
      send_Menu($userId);
      
      
    }
    else if ($event['type'] == 'postback') {
      $userId = $event['source']['userId'];
      $data = $event['postback']['data'];
      send_LINE($data,$userId);
    }
    else if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
      // Get text sent
      $text = $event['message']['text'];
      // Get replyToken
      //$replyToken = $event['replyToken'];
      // Build message to reply back
      $userId = $event['source']['userId'];
      $pos = strpos($text, ":");
          if($pos){
           
            $splitMsg = explode(":", $text);
            $topic = $splitMsg[0];
            $msg = $splitMsg[1];
              if($topic == "Login" || $topic == "login"){
            send_FALL($userid);
            //check_login($userId, $msg);
          }
          if($topic == "Logout" || $topic == "logout"){
            send_PRESS($userid);
            //check_userlogout($userId, $msg);
          }
          }else{      
          if($text == "Check" || $text == "CHECK" || $text == "check" || $text == "เช็ค" || $text == "เช็คอุปกรณ์"){
            $text = "CHECK";
            check_userid($userId,$text);
            //getMqttfromlineMSG($text);  
          }else if($text == "Acknowledge" || $text == "รับทราบ" || $text == "OK" || $text == "ACK" || $text == "ack"){
            $text = "ACK";
            check_userid($userId,$text);
            //getMqttfromlineMSG($text);  
          }else{
            send_LINE('Incorrect command: type "Check" for check status device , "login:<device name>" for login , "logout:<device name>" for logout',$userId);
          }
          }
          
      
      
    
      
    }
  }
}
echo "OK";
?>
