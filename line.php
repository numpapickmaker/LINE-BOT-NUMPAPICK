<?php
function send_LINE($msg,$userid){
  $access_token = '3NZ4tPcC9W1t6cPI0r3ezvnsoK8KW04hbCSPxKSahSeGbeUU7lC8PQvx02uN5UyL7wOaVJ6EZ9oM5uQjkqLDNZtagQuRcS/NaaGmtopk7pBGOXtNk3lDc4KQIns5tV/jpm8yyr/114JL4uORE5czWwdB04t89/1O/w1cDnyilFU='; 
  $messages = [
        'type' => 'text',
        'text' => $msg
        //'text' => $text
      ]; 
      // Make a POST Request to Messaging API to reply to sender
      $url = 'https://api.line.me/v2/bot/message/push';
      $data = [
        'to' => $userid,
        'messages' => [$messages],
      ];
      $post = json_encode($data);
      $headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);
      $ch = curl_init($url);
      curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
      curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
      curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
      $result = curl_exec($ch);
      curl_close($ch);
      echo $result . "\r\n"; 
}
function send_Check($userid){
   $access_token = '3NZ4tPcC9W1t6cPI0r3ezvnsoK8KW04hbCSPxKSahSeGbeUU7lC8PQvx02uN5UyL7wOaVJ6EZ9oM5uQjkqLDNZtagQuRcS/NaaGmtopk7pBGOXtNk3lDc4KQIns5tV/jpm8yyr/114JL4uORE5czWwdB04t89/1O/w1cDnyilFU='; 
  $messages = [
              
          
                "type"=> "image",
                "originalContentUrl"=> "https://imgur.com/a0vMdA5.jpg",
                "previewImageUrl"=> "https://imgur.com/a0vMdA5.jpg"
            
      ];

      // Make a POST Request to Messaging API to reply to sender
      $url = 'https://api.line.me/v2/bot/message/push';
      $data = [
        'to' => $userid,
        'messages' => [$messages],
      ];
      $post = json_encode($data);
      $headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);
      $ch = curl_init($url);
      curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
      curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
      curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
      $result = curl_exec($ch);
      curl_close($ch);
      echo $result . "\r\n"; 
}
function send_FALL($userid){
   $access_token = '3NZ4tPcC9W1t6cPI0r3ezvnsoK8KW04hbCSPxKSahSeGbeUU7lC8PQvx02uN5UyL7wOaVJ6EZ9oM5uQjkqLDNZtagQuRcS/NaaGmtopk7pBGOXtNk3lDc4KQIns5tV/jpm8yyr/114JL4uORE5czWwdB04t89/1O/w1cDnyilFU='; 
  $messages = [
          "type"=> "template",
          "altText"=> "this is a buttons template",
          "template"=> [
              "type"=> "buttons",
              "thumbnailImageUrl"=> "https://i.imgur.com/yLAJlP5.jpg",
              "title"=> "Menu",
              "text"=> "Please select",
              "actions"=> [
                  [
                    "type"=> "message",
                    "label"=> "Acknowledge",
                    "text"=> "Acknowledge"
                  ],
                  [
                    "type"=> "uri",
                    "label"=> "View detail",
                    "uri"=> "http://app.midatdb.com/PFrCbTJd2J"
                  ]
              ]
          ]
      ];

      // Make a POST Request to Messaging API to reply to sender
      $url = 'https://api.line.me/v2/bot/message/push';
      $data = [
        'to' => $userid,
        'messages' => [$messages],
      ];
      $post = json_encode($data);
      $headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);
      $ch = curl_init($url);
      curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
      curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
      curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
      $result = curl_exec($ch);
      curl_close($ch);
      echo $result . "\r\n"; 
}
function send_PRESS($userid){
   $access_token = '3NZ4tPcC9W1t6cPI0r3ezvnsoK8KW04hbCSPxKSahSeGbeUU7lC8PQvx02uN5UyL7wOaVJ6EZ9oM5uQjkqLDNZtagQuRcS/NaaGmtopk7pBGOXtNk3lDc4KQIns5tV/jpm8yyr/114JL4uORE5czWwdB04t89/1O/w1cDnyilFU='; 
  $messages = [
          "type"=> "template",
          "altText"=> "this is a buttons template",
          "template"=> [
              "type"=> "buttons",
              "thumbnailImageUrl"=> "https://i.imgur.com/QBHEdRu.jpg",
              "title"=> "Menu",
              "text"=> "Please select",
              "actions"=> [
                  [
                    "type"=> "message",
                    "label"=> "Acknowledge",
                    "text"=> "Acknowledge"
                  ],
                  [
                    "type"=> "uri",
                    "label"=> "View detail",
                    "uri"=> "http://app.midatdb.com/PFrCbTJd2J"
                  ]
              ]
          ]
      ];

      // Make a POST Request to Messaging API to reply to sender
      $url = 'https://api.line.me/v2/bot/message/push';
      $data = [
        'to' => $userid,
        'messages' => [$messages],
      ];
      $post = json_encode($data);
      $headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);
      $ch = curl_init($url);
      curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
      curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
      curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
      $result = curl_exec($ch);
      curl_close($ch);
      echo $result . "\r\n"; 
}
function send_LOWBAT($userid){
   $access_token = '3NZ4tPcC9W1t6cPI0r3ezvnsoK8KW04hbCSPxKSahSeGbeUU7lC8PQvx02uN5UyL7wOaVJ6EZ9oM5uQjkqLDNZtagQuRcS/NaaGmtopk7pBGOXtNk3lDc4KQIns5tV/jpm8yyr/114JL4uORE5czWwdB04t89/1O/w1cDnyilFU='; 
  $messages = [
         
                "type"=> "image",
                "originalContentUrl"=> "https://i.imgur.com/c65ILrh.jpg",
                "previewImageUrl"=> "https://i.imgur.com/c65ILrh.jpg"
      ];

      // Make a POST Request to Messaging API to reply to sender
      $url = 'https://api.line.me/v2/bot/message/push';
      $data = [
        'to' => $userid,
        'messages' => [$messages],
      ];
      $post = json_encode($data);
      $headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);
      $ch = curl_init($url);
      curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
      curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
      curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
      $result = curl_exec($ch);
      curl_close($ch);
      echo $result . "\r\n"; 
}
function send_Menu($userid){
   $access_token = '3NZ4tPcC9W1t6cPI0r3ezvnsoK8KW04hbCSPxKSahSeGbeUU7lC8PQvx02uN5UyL7wOaVJ6EZ9oM5uQjkqLDNZtagQuRcS/NaaGmtopk7pBGOXtNk3lDc4KQIns5tV/jpm8yyr/114JL4uORE5czWwdB04t89/1O/w1cDnyilFU='; 
  $messages = [
          "type"=> "template",
          "altText"=> "this is a buttons template",
          "template"=> [
              "type"=> "buttons",
              "thumbnailImageUrl"=> "https://i.imgur.com/QBHEdRu.jpg",
              "title"=> "Menu",
              "text"=> "Please select",
                "defaultAction"=> [
                    "type"=> "uri",
                    "label"=> "View detail",
                    "uri"=> "https://numpapick.herokuapp.com/manage.php?action"
                ],
              "actions"=> [
                  [
                    "type"=> "message",
                    "label"=> "check",
                    "text"=> "check"
                  ],
                  [
                    "type"=> "postback",
                    "label"=> "device",
                    "data"=> "action=device"
                  ]
              ]
          ]
      ];

      // Make a POST Request to Messaging API to reply to sender
      $url = 'https://api.line.me/v2/bot/message/push';
      $data = [
        'to' => $userid,
        'messages' => [$messages],
      ];
      $post = json_encode($data);
      $headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);
      $ch = curl_init($url);
      curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
      curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
      curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
      $result = curl_exec($ch);
      curl_close($ch);
      echo $result . "\r\n"; 
}
?>
