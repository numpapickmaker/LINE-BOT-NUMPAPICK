
<!DOCTYPE html>
<html>
<script defer src="https://use.fontawesome.com/releases/v5.0.8/js/solid.js" integrity="sha384-+Ga2s7YBbhOD6nie0DzrZpJes+b2K1xkpKxTFFcx59QmVPaSA8c7pycsNaFwUK6l" crossorigin="anonymous"></script>
<script defer src="https://use.fontawesome.com/releases/v5.0.8/js/fontawesome.js" integrity="sha384-7ox8Q2yzO/uWircfojVuCQOZl+ZZBg2D2J5nkpLqzH1HY0C1dHlTKIbpRz/LG23c" crossorigin="anonymous"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Kanit:200|Open+Sans|Taviraj" rel="stylesheet">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<body>

<style>
body {
    background-color: white;
}
h1 {
    color: #072140;
    text-align: center;
}
p {
    font-family: verdana;
    font-size: 20px;
}
input[type=text], select {
    width: 100%;
    padding: 12px 28px;
    margin: 8px 2px;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}
.kanit {
	font-family: 'Kanit', sans-serif;
}.Taviraj {
	font-family: 'Taviraj', serif;
    font-size: 20px;
    margin: 24px 20px;
}
.button {
    background-color: white; /* Green */
    border: none;
    padding: 10px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-family: 'Kanit', sans-serif;
    font-size: 24px;
    margin: 0px 0px;
    cursor: pointer;
    width:100%;
   
    
}
.button1 {
   
    color: white; 
    border: 2px solid white;
    border-radius: 8px;
  	position: relative;
    background-color: #0F4484;
   
    
}
.button2 {
    
    color: white; 
    border: 2px solid white;
    border-radius: 8px;
    background-color: #FFA611;
	position: relative;
    
}
    </style>

<body>

<script>
function del_device(a, b) {
    var txt;
    var r = confirm("You want to delete device?"+b );
    if (r == true) {
      window.location.href = "https://numpapick.herokuapp.com/db.php?userid="+a+"&esp="+b;
    } else {
        txt = "You pressed Cancel!";
    }
    
}
</script>
<div class="w3-container" id="demo">
 <h1 class="kanit" style = "color: #072140; ">จัดการข้อมูล</h1>
 <br>
<ul class="w3-ul">
    <li> </li>
    <br>    
   
<form action="https://numpapick.herokuapp.com/login.php" method="get">
    <button class="button button1"  value="<?php echo $_GET["action"];?>" name="add">Add Device</button>
</form>
 <form action="https://numpapick.herokuapp.com/main.php" method="get">
    <button class="button button2"  value="<?php echo $_GET["action"];?>" name="action">Back To Main</button>
</form>
<br>
<table class="w3-table w3-striped" id="customers" align="center">
  <tr>
    <th > <div align="center">No </div></th>
    <th > <div align="center">Device id </div></th>
    <th > <div align="center">Menu</div></th>
  </tr>

<?php
//echo $_GET["action"];
  $userid = $_GET["action"];
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
         $n = 1;
         while($row = pg_fetch_row($ret) ){
         // echo "have espname = " . $row[1] . "\n";
          // send_LINE('PASS');
          //  header("location: bot.php");
           $No = $n;
           $Device_id = $row[2];
           $n++;
           ?>
           <tr>
    <td><div align="center"><?php echo $No;?></div></td>
    <td><?php echo $Device_id;?></td>
    
    <td align="center">
    <form action="https://numpapick.herokuapp.com/information.php" method="get">
    <input type="hidden" name="username" value="<?php echo $_GET["action"];?>">
    <button class="button button1" value="<?php echo $Device_id;?>" name="view">View</button>
    </form>
<button class="button button2" onclick="del_device('<?php echo $userid;?>','<?php echo $Device_id;?>')">Delete</button>
</td>
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
</div>
</body>
</html>
