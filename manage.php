 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
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

.button1 {border-radius: 8px;}
.button2 {border-radius: 8px; background-color: #f44336;}
.button3 { position: relative;
  
  left: 90%;border-radius: 8px; background-color: #008CBA;}

    </style>
</head>
<body>
<button align="center" class="button button3">+</button>
<table  id="customers" align="center">
  <tr>
    <th > <div align="center">No </div></th>
    <th > <div align="center">Device id </div></th>
    <th > <div align="center">Menu</div></th>
  </tr>

<?php
echo $_GET["action"];
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
     $sql ="SELECT * FROM userline WHERE id='".$_GET["action"]."';";
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
          
           ?>
           <tr>
    <td><div align="center"><?php echo $No;?></div></td>
    <td><?php echo $Device_id;?></td>
    
    <td align="center">
    <form action="https://numpapick.herokuapp.com/information.php" method="get">
    <button class="button button1" value="1" name="view">View</button>
    </form>
<button class="button button2">Delete</button>
<a href="phpMySQLEditRecordForm.php?CusID=<?php echo $test;?>">Edit</a></td>
  </tr>
  <?php
         }
         if($checking == 0){
            // $username_err = 'No account found with that username.';
         }
         //echo "Records created successfully\n";
      }
     
      pg_close($db) ;   
      
?>

  
</table>

</body>
</html>
