<?php
if( $_GET["name"]|| $_GET["age"]|| $_GET["sex"]|| $_GET["heigth"]|| $_GET["weigth"]|| $_GET["disease"]|| $_GET["address"]|| $_GET["phone"]){
   
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
     $sql ="update Device_information set name='".$_GET["name"]."',age='".$_GET["age"]."',sex='".$_GET["age"]."',heigth='".$_GET["heigth"]."',weigth='".$_GET["weigth"]."',disease='".$_GET["disease"]."' ,address='".$_GET["address"]."',phone='".$_GET["phone"]."' where device_id='".$_GET["deviceid"]."';";
    
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
        //  echo "have espname = " . $row[1] . "\n";
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
          var b = document.getElementById("agefld").value;
            var c = document.getElementById("sexfld").value;
            var d = document.getElementById("heigthfld").value;
            var e = document.getElementById("weigthfld").value;
            var f = document.getElementById("diseasefld").value;
            var g = document.getElementById("addressfld").value;
            var h = document.getElementById("phonefld").value;
            document.getElementById("name").innerHTML=a;
            document.getElementById("age").innerHTML=b;
            document.getElementById("sex").innerHTML=c;
            document.getElementById("heigth").innerHTML=d;
            document.getElementById("weigth").innerHTML=e;
            document.getElementById("disease").innerHTML=f;
            document.getElementById("address").innerHTML=g;
            document.getElementById("phone").innerHTML=h;
             document.getElementById("edit_btn").innerHTML='Edit';
            document.getElementById("edit_btn").setAttribute( "onClick", "javascript: Edit();" );
            
            window.location.href = "https://numpapick.herokuapp.com/information.php?username="+username+"&view="+device_id+"&name=" + a + "&age=" + b +"&sex=" + c+"&heigth=" +d+"&weigth="+e+"&disease="+f+"&address="+g+"&phone="+h;
    }
function Edit() {
    
            var a = document.getElementById("name").innerHTML;
          var b = document.getElementById("age").innerHTML;
            var c = document.getElementById("sex").innerHTML;
            var d = document.getElementById("heigth").innerHTML;
            var e = document.getElementById("weigth").innerHTML;
            var f = document.getElementById("disease").innerHTML;
            var g = document.getElementById("address").innerHTML;
            var h = document.getElementById("phone").innerHTML;
            document.getElementById("name").innerHTML='<input id="namefld" type="text" value="'+a+'"'+' />';
            document.getElementById("age").innerHTML='<input id="agefld" type="text" value="'+b+'"'+' />';
            document.getElementById("sex").innerHTML='<input id="sexfld" type="text" value="'+c+'"'+' />';
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
    <title>information</title>
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
    
    border: none;
    color: white;
    padding: 10px;
    text-align: center;
    text-decoration: none;
    display: inline;
    
    margin: 4px 2px;
    cursor: pointer;
}
.button1 {border-radius: 2px;} 
.button3 { position: relative;

  left: 60%;border-radius: 8px; background-color: #008CBA;}
.button2 { position: relative; 
 left: 3%;border-radius: 8px; background-color: #f44336;}   
.button4 { position: relative; 
 left: 20%;border-radius: 8px; background-color: #f44336;} 
    </style>
</head>
<body>

<p id="demo"></p>
<span id="storage1" data-variable-one="<?php echo $Test; ?>"</span>
<span id="storage2" data-variable-one="<?php echo $_GET["username"]; ?>"</span>
 <h1  > Information </h1>
 <form class="button " action="https://numpapick.herokuapp.com/manage.php" method="get">
    <button class="button button2" value="<?php echo $_GET["username"];?>" name="action">Back</button>
    
</form>
<button class="button button3" id="edit_btn" onclick="Edit()">Edit</button>
<button class="button button4" id="cancel_btn" style="display:none" onclick="Cancel()" >Cancel</button>
<table  id="customers" align="center">
   <tr>
          <td  ><div align="center">Device id </div></td>
          <td id="Device_id" ><?php echo $Device_id;?></td>
              
          </tr>
          <tr>
          <td><div align="center">Name </div></td>
          <td id="name"><?php echo $Name;?></td>
          </tr>
          <tr>
          <td><div align="center">Age </div></td>
          <td id="age" ><?php echo $Age;?></div></td>
          </tr>
          <tr>
          <td><div align="center">Sex </div></td>
          <td id="sex" ><?php echo $Sex;?></td>
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
          <tr>
  
</table>

</body>
</html>
