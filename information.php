
 <?php

echo $_GET["view"];
  $test = "Hello";
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
     $sql ="SELECT * FROM Device_information WHERE Device_id='".$_GET["view"]."';";
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
        #customers {
        font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 75%;
    }

    #customers td, #customers th {
        border: 1px solid #ddd;
        padding: 8px;
    }

    #customers tr:nth-child(even){background-color: #f2f2f2;}

    #customers tr:hover {background-color: #ddd;}

    #customers th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #4CAF50;
        color: white;
    }
       .button {
    background-color: #4CAF50; /* Green */
    border: none;
    color: white;
    padding: 10px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    
    margin: 4px 2px;
    cursor: pointer;
}

.button1 {border-radius: 2px;} 
.button3 { position: relative;
  
  left: 90%;border-radius: 8px; background-color: #008CBA;}

    </style>
</head>
<body>
 <h1  > Information </h1>
<button align="center" class="button button3">Edit</button>
<table  id="customers" align="center">
   <tr>
          <td><div align="center">Device id </div></td>
          <td><?php echo $Device_id;?></td>
          </tr>
          <tr>
          <td><div align="center">Name </div></td>
          <td><?php echo $Name;?></td>
          </tr>
          <tr>
          <td><div align="center">Age </div></td>
          <td><div align="center"><?php echo $Age;?></div></td>
          </tr>
          <tr>
          <td><div align="center">Sex </div></td>
          <td align="right"><?php echo $Sex;?></td>
          </tr>
          <tr>
          <td><div align="center">Heigth </div></td>
          <td align="right"><?php echo $Heigth;?></td>
          </tr>
          <tr>
          <td><div align="center">Weigth </div></td>
          <td align="right"><?php echo $Weigth;?></td>
          </tr>
          <tr>
          <td><div align="center">Disease </div></td>
          <td align="right"><?php echo $disease;?></td>
          </tr>
          <tr>
          <td><div align="center">Address </div></td>
          <td align="right"><?php echo $address;?></td>
          </tr>
          <tr>
          <td><div align="center">Phone </div></td>
          <td align="right"><?php echo $phone;?></td>
          </tr>
          <tr>
  
</table>

</body>
</html>
