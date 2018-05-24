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
  echo $events['status'];
  echo $events['name'];
 Check_send($events['name'],$events['status']);
}
if (!is_null($events['ESP'])) {
  if($events['ESP'] == 'CHECK'){
    check_send($events['NAME'],$events['MSG']); 
    //send_LINE($events['MSG'],'Ue77a191627f6ac91899e75d92264310c');
  }
 if($events['ESP'] == 'DEVICEACK'){
    check_send($events['NAME'],$events['ESP']); 
    //send_LINE($events['MSG'],'Ue77a191627f6ac91899e75d92264310c');
  }
 if($events['ESP'] == 'HELPACK'){
    check_send($events['NAME'],$events['ESP']); 
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
      //send_FALL($userId);
      send_Menu($userId);
      //send_LOWBAT($userId);
      //send_PRESS($userId);
      //send_LINE('json','Ue77a191627f6ac91899e75d92264310c');
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
            
            
           if($topic == "Acknowledge" ){
            $text = "ACK";
            check_userid($userId,$text,$msg);
            //getMqttfromlineMSG($text);  
           }
           
             
          }else{    
           
          if($text == "Check" || $text == "CHECK" || $text == "check" || $text == "เช็ค" || $text == "เช็คอุปกรณ์"){
            $text = "CHECK";
            //check_userid($userId,$text);
            //getMqttfromlineMSG($text);  
          }else if($text == "เริ่มต้นใช้งาน"){
            send_tutorial($userId);
            //getMqttfromlineMSG($text);  
          }else if($text == "แก้ไขข้อมูล"){
            //send_LINE("แก้ไขข้อมูล",$userId);
            send_Setting($userId);
            //getMqttfromlineMSG($text);  
          }else if($text == "ข้อเสนอแนะ"){
            send_LINE("https://drive.google.com/open?id=1zmhRSVwmmugb7chqpghOipIJk_hJnSG8Gsg8lvMwVLc",$userId);
            //getMqttfromlineMSG($text);  
          }else if($text == "ขอความช่วยเหลือ"){
            send_CALL($userId);
            //send_LINE("ขอความช่วยเหลือ",$userId);
            //getMqttfromlineMSG($text);  
          }
           else{
            //send_LINE('Incorrect command: type "Check" for check status device , "login:<device name>" for login , "logout:<device name>" for logout',$userId);
          }
          }
          
      
      
    
      
    }
  }
}
echo "OK";
?>
