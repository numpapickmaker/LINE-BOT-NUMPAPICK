<?php
if( $_GET["name"]|| $_GET["birthday"]|| $_GET["sex"]|| $_GET["heigth"]|| $_GET["weigth"]|| $_GET["disease"]|| $_GET["address"]|| $_GET["phone"]){
   
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
     $sql ="update Device_information set name='".$_GET["name"]."',sex='".$_GET["sex"]."',heigth='".$_GET["heigth"]."',weigth='".$_GET["weigth"]."',disease='".$_GET["disease"]."' ,address='".$_GET["address"]."',phone='".$_GET["phone"]."',birthday='".$_GET["birthday"]."' where device_id='".$_GET["view"]."';";
    echo $sql;
    $ret = pg_query($db, $sql) ;
      if(!$ret) {
        // echo pg_last_error($db) ;
      } else {
         
        // echo "Records created successfully\n";
      }
     
      pg_close($db) ;   
}
//echo $_GET["view"];
  $Test = $_GET["view"];
  $No =$Device_id =$Name =$Birthday =$Sex =$Heigth =$Weigth =$disease =$address = $phone = $Password = "";
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
        //  echo "have espname = " . $row[1] . "\n";
          // send_LINE('PASS');
          //  header("location: bot.php");
           $No = $row[0];
           $Device_id = $row[1];
           $Name = $row[2];
           $Sex = $row[3];
           $Heigth = $row[4];
           $Weigth = $row[5];
           $disease = $row[6];
           $address  = $row[7];
           $phone = $row[8]; 
           $Birthday = $row[9];
         }
         if($checking == 0){
            // $username_err = 'No account found with that username.';
         }
         //echo "Records created successfully\n";
          $sql ="SELECT * FROM device WHERE Deviceid='".$_GET["view"]."';";
		    $ret = pg_query($db, $sql) ;
		      if(!$ret) {
		         echo pg_last_error($db) ;
		      } else {
		         $checking = 0;
		         while($row = pg_fetch_row($ret) ){
		        //  echo "have espname = " . $row[1] . "\n";
		          // send_LINE('PASS');
		          //  header("location: bot.php");
		          
		           $Password = $row[3];
		          
		         }
		         if($checking == 0){
		            // $username_err = 'No account found with that username.';
		         }
		      }
     }
      pg_close($db) ;   
      
?>
<!DOCTYPE html>
<html lang="en">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
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
  color: white; 
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
.button3 {
  color: white; 
    background-color: #35847A; 
    
    border: 2px solid white;
    border-radius: 8px;
   
  position: relative;
    
}
    </style>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script>
    function Cancel(){
    var username = document.getElementById("storage2").getAttribute("data-variable-one");
    var device_id = document.getElementById("storage1").getAttribute("data-variable-one");
    window.location.href = "https://numpapick.herokuapp.com/information.php?username="+username+"&view="+device_id;
    }
    function Save() {
      var username = document.getElementById("storage2").getAttribute("data-variable-one");
     var device_id = document.getElementById("Device_id").innerHTML;
     var a = document.getElementById("namefld").value;
          var b = document.getElementById("birthdayfld").value;
            var c = document.getElementById("sexfld").value;
            var d = document.getElementById("heigthfld").value;
            var e = document.getElementById("weigthfld").value;
            var f = document.getElementById("diseasefld").value;
            var g = document.getElementById("addressfld").value;
            var h = document.getElementById("phonefld").value;
            document.getElementById("name").innerHTML=a;
            document.getElementById("birthday").innerHTML=b;
            document.getElementById("sex").innerHTML=c;
            document.getElementById("heigth").innerHTML=d;
            document.getElementById("weigth").innerHTML=e;
            document.getElementById("disease").innerHTML=f;
            document.getElementById("address").innerHTML=g;
            document.getElementById("phone").innerHTML=h;
             document.getElementById("edit_btn").innerHTML='Edit';
            document.getElementById("edit_btn").setAttribute( "onClick", "javascript: Edit();" );
             document.getElementById("cancel_btn").style.display = "none";
            
            window.location.href = "https://numpapick.herokuapp.com/information.php?username="+username+"&view="+device_id+"&name=" + a + "&birthday=" + b +"&sex=" + c+"&heigth=" +d+"&weigth="+e+"&disease="+f+"&address="+g+"&phone="+h;
    }
function Edit() {
    
            var a = document.getElementById("name").innerHTML;
          var b = document.getElementById("birthday").innerHTML;
            var c = document.getElementById("sex").innerHTML;
            var male,female;
            if(c=='male'){
            	male='checked';
            }else{
            	female='checked';
            }
            var d = document.getElementById("heigth").innerHTML;
            var e = document.getElementById("weigth").innerHTML;
            var f = document.getElementById("disease").innerHTML;
            var g = document.getElementById("address").innerHTML;
            var h = document.getElementById("phone").innerHTML;
             var pw = document.getElementById("Password").innerHTML;
            document.getElementById("Password").innerHTML=''+pw+'<form action="https://numpapick.herokuapp.com/password.php" method="get">  <input type="hidden" name="username" class = "Taviraj" value="<?php echo $_GET["username"];?>" > <button  value="<?php echo $_GET["view"];?>"name="view">change password</button></form> ';
            document.getElementById("name").innerHTML='<input id="namefld" type="text" value="'+a+'"'+' />';
            document.getElementById("birthday").innerHTML='<input id="birthdayfld" type="date" value="'+b+'"'+' />';
            document.getElementById("sex").innerHTML='<input id="sexfld" type="radio" value="male" name="sexfld"'+male+' />Male <input id="sexfld" type="radio" value="female" name="sexfld" '+female+'/> Female ';
            document.getElementById("heigth").innerHTML='<input id="heigthfld" type="text" value="'+d+'"'+' />';
            document.getElementById("weigth").innerHTML='<input id="weigthfld" type="text" value="'+e+'"'+' />';
            document.getElementById("disease").innerHTML='<input id="diseasefld" type="text" value="'+f+'"'+' />';
            document.getElementById("address").innerHTML='<input id="addressfld" type="text" value="'+g+'"'+' />';
            document.getElementById("phone").innerHTML='<input id="phonefld" type="text" value="'+h+'"'+' />';
           
            document.getElementById("edit_btn").innerHTML='Save';
            document.getElementById("edit_btn").setAttribute( "onClick", "javascript: Save();" );
             document.getElementById("cancel_btn").style.display = "inline-block";
            //document.getElementById("done_btn").disabled=false;
        
}
</script>
    
</head>
<body>
<div class="w3-container" >
<p id="demo"></p>
<span id="storage1" data-variable-one="<?php echo $Test; ?>"</span>
<span id="storage2" data-variable-one="<?php echo $_GET["username"]; ?>"</span>
 <h1 class="kanit" > Information </h1>
 <ul class="w3-ul">
    <li> </li>
    <br>    
 <form  action="https://numpapick.herokuapp.com/manage.php" method="get">
    <button class="button button2" value="<?php echo $_GET["username"];?>" name="action">Back</button>
    
</form>
<button class="button button1" id="edit_btn" onclick="Edit()">Edit</button>
<button class="button button3" id="cancel_btn" style="display:none" onclick="Cancel()" >Cancel</button>
<br>
<br>
<table class="w3-table w3-striped" id="customers" align="center">
   <tr>
          <td  ><div align="center">Device id </div></td>
          <td id="Device_id" ><?php echo $Device_id;?></td>
              
          </tr>
          <tr>
          <td><div align="center">Password </div></td>
          <td id="Password"><?php echo $Password;?></td>
          </tr>
          <tr>
          <td><div align="center">Name </div></td>
          <td id="name"><?php echo $Name;?></td>
          </tr>
       
          <tr>
          <td><div align="center">Sex </div></td>
          <td id="sex" ><?php echo $Sex;?></td>
          </tr>
            <tr>
          <td><div align="center">Birthday </div></td>
          <td id="birthday" ><?php echo $Birthday;?></div></td>
          </tr>
          <tr>
          <td><div align="center">Heigth </div></td>
          <td id="heigth" ><?php echo $Heigth;?></td>
          </tr>
          <tr>
          <td><div align="center">Weigth </div></td>
          <td id="weigth" ><?php echo $Weigth;?></td>
          </tr>
          <tr>
          <td><div align="center">Disease </div></td>
          <td id="disease" ><?php echo $disease;?></td>
          </tr>
          <tr>
          <td><div align="center">Address </div></td>
          <td id="address"  ><?php echo $address;?></td>
          </tr>
          <tr>
          <td><div align="center">Phone </div></td>
          <td id="phone" ><?php echo $phone;?></td>
          </tr>
   
          
        
  
</table>
</div>
</body>
</html>
