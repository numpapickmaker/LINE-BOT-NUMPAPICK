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
              "thumbnailImageUrl"=> "https://i.imgur.com/h3ujqrZ.jpg",
           //   https://i.imgur.com/al9Fmdg.jpg
              "imageAspectRatio"=> "square",
              "imageSize"=> "cover",
              "title"=> "Menu",
              "text"=> "Please select",
              "defaultAction"=> [
                     "type"=> "message",
                     "label"=> "Acknowledge",
                     "text"=> "Acknowledge"
  //               "type"=> "uri",
  //               "label"=> "View detail",
  //               "uri"=> "http://google.com"
                ],
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
              "thumbnailImageUrl"=> "https://i.imgur.com/oWiGMzD.jpg",
              "imageAspectRatio"=> "square",
              "imageSize"=> "cover",
              "title"=> "Menu",
              "text"=> "Please select",
              "defaultAction"=> [
                   "type"=> "message",
                   "label"=> "Acknowledge",
                   "text"=> "Acknowledge"
//               "type"=> "uri",
//               "label"=> "View detail",
//               "uri"=> "http://google.com"
              ],
              "actions"=> [
                  [
                    "type"=> "message",
                    "label"=> "Acknowledge",
                    "text"=> "Acknowledge"
                  ],
                   [
                    "type"=> "uri",
                    "label"=> "View detail",
                    "uri"=> "tel:1669"
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
      
    "type"=> "text",
    "text"=> "เหลือพลังงานต่ำกว่า 20%"

      ];
  //     $messages = [
         
//                 "type"=> "image",
//                 "originalContentUrl"=> "https://i.imgur.com/c65ILrh.jpg",
//                 "previewImageUrl"=> "https://i.imgur.com/c65ILrh.jpg"
//       ];
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
          "type"=> "imagemap",
          "baseUrl"=> "https://i.imgur.com/nkI631e.jpg",
          "altText"=> "this is a buttons template",
          "baseSize"=> [
              "height"=> 1040,
              "width"=> 1040
          ],
         
                   // "uri"=> "https://numpapick.herokuapp.com/manage.php?action=".$userid
               
              "actions"=> [
                      [
                            "type"=> "uri",
                     
                            "thumbnailImageUrl"=> "https://i.imgur.com/nkI631e.jpg",
                            "linkUri"=> "https://numpapick.herokuapp.com/main.php?action=".$userid,
                            "area"=> [
                                "x"=> 0,
                                "y"=> 0,
                                "width"=> 1040,
                                "height"=> 1040
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

function send_Setting($userid){
   $access_token = '3NZ4tPcC9W1t6cPI0r3ezvnsoK8KW04hbCSPxKSahSeGbeUU7lC8PQvx02uN5UyL7wOaVJ6EZ9oM5uQjkqLDNZtagQuRcS/NaaGmtopk7pBGOXtNk3lDc4KQIns5tV/jpm8yyr/114JL4uORE5czWwdB04t89/1O/w1cDnyilFU='; 
  $messages = [
          "type"=> "imagemap",
          "baseUrl"=> "https://i.imgur.com/g1pe5qk.jpg",
          "altText"=> "this is a buttons template",
          "baseSize"=> [
              "height"=> 1040,
              "width"=> 256
          ],
         
                   // "uri"=> "https://numpapick.herokuapp.com/manage.php?action=".$userid
               
              "actions"=> [
                      [
                            "type"=> "uri",
                     
                            "thumbnailImageUrl"=> "https://i.imgur.com/g1pe5qk.jpg",
                            "linkUri"=> "https://numpapick.herokuapp.com/main.php?action=".$userid,
                            "area"=> [
                                "x"=> 0,
                                "y"=> 0,
                                "width"=> 1040,
                                "height"=> 256
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
