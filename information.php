<?php
  $username = 1;
  $No ,$Device_id ,$Name ,$Age,$Sex ,$Heigth ,$Weigth ,$disease ,$address , $phone = "";
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
     $sql ="SELECT * FROM Device_information WHERE Device_id='".$username."';";
    $ret = pg_query($db, $sql) ;
      if(!$ret) {
         echo pg_last_error($db) ;
      } else {
         $checking = 0;
         while($row = pg_fetch_row($ret) ){
          echo "have espname = " . $row[1] . "\n";
          // send_LINE('PASS');
          //  header("location: bot.php");
           $No = $row[0];
           $Device_id = $row[1];
           $Name = $row[2];
           $Age = $row[3];
           $Sex = $row[4];
           $Heigth = $row[5];
           $Weigth = $row[6];
           $disease = $row[7];
           $address  = $row[8];
           $phone = $row[9]; 
         }
         if($checking == 0){
            // $username_err = 'No account found with that username.';
         }
         //echo "Records created successfully\n";
      }
     
      pg_close($db) ;   
      
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>
<body>
<table width="600" border="1">
  <tr>
    <th width="91"> <div align="center">CustomerID </div></th>
    <th width="98"> <div align="center">Name </div></th>
    <th width="198"> <div align="center">Email </div></th>
    <th width="97"> <div align="center">CountryCode </div></th>
    <th width="59"> <div align="center">Budget </div></th>
    <th width="71"> <div align="center">Used </div></th>
    <th width="30"> <div align="center">Edit </div></th>
  </tr>

  <tr>
    <td><div align="center"><?php echo $No;?></div></td>
    <td><?php echo $Device_id;?></td>
    <td><?php echo $Name;?></td>
    <td><div align="center"><?php echo $Age;?></div></td>
    <td align="right"><?php echo $Sex;?></td>
    <td align="right"><?php echo $Heigth;?></td>
    <td align="center"><a href="">Edit</a></td>
  </tr>
</table>
</body>
</html>
