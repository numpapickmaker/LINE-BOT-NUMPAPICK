<?php
 require("pub.php");
 require("line.php");
 require("db.php");	
// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON

$events = json_decode($content, true);
// Validate parsed JSON data
if (!is_null($events['ESP'])) {
	if($events['ESP'] == 'CHECK'){
	send_LINE($events['MSG']);
	}
	
	if($events['ESP'] == 'HELP'){
	send_CHECK();
	}
	echo "OK";
	}
if (!is_null($events['events'])) {
	echo "line bot";
	// Loop through each event
	foreach ($events['events'] as $event) {
		// Reply only when message sent is in 'text' format
		if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
			// Get text sent
			$text = $event['message']['text'];
			// Get replyToken
			$userId = $event['source']['userId'];

			// Build message to reply back

			
			$pos = strpos($text, ":");
			    if($pos){
			      $splitMsg = explode(":", $text);
			      $topic = $splitMsg[0];
			      $msg = $splitMsg[1];
			        if($topic == "Login" || $topic == "login"){
					send_LINE("Login");
					save_userid($userId,$msg);
				}
			    }else{	    
				if($text == "Check" || $text == "CHECK" || $text == "check" || $text == "เช็ค" || $text == "เช็คอุปกรณ์"){
					$text = "CHECK";	
					getMqttfromlineMSG($text);  
				}else if($text == "Acknowledge" || $text == "รับทราบ" || $text == "OK" || $text == "ACK" || $text == "ack"){
					$text = "ACK";	
					getMqttfromlineMSG($text);  
				}	
			    }
			
			
		
			
		}
	}
}
echo "OK";
?>
