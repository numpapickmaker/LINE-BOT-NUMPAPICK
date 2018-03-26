<?php
if( $_GET["Firstname"]|| $_GET["Lastname"]|| $_GET["Phone"]|| $_GET["Email"]|| $_GET["Career"]|| $_GET["Birthday"]){
   
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
     $sql ="update user_info set firstname='".$_GET["Firstname"]."',lastname='".$_GET["Lastname"]."',phone='".$_GET["Phone"]."',email='".$_GET["Email"]."',career='".$_GET["Career"]."' ,birthday='".$_GET["Birthday"]."' where id='".$_GET["action"]."';";
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
  //$Test = $_GET["view"];
  $No =$Firstname =$Lastname =$Phone =$Email =$Career =$Birthday = "";
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
     $sql ="SELECT * FROM user_info WHERE id='".$_GET["action"]."';";
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
           $Firstname = $row[2];
           $Lastname = $row[3];
           $Phone = $row[4];
           $Email = $row[5];
           $Career = $row[6];
           $Birthday = $row[7];
           
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
    window.location.href = "https://numpapick.herokuapp.com/information.php?action="+username;
    }
    function Save() {
      var username = document.getElementById("storage2").getAttribute("data-variable-one");
     
     var a = document.getElementById("Firstnamefld").value;
          var b = document.getElementById("Lastnamefld").value;
            var c = document.getElementById("Phonefld").value;
            var d = document.getElementById("Emailfld").value;
            var e = document.getElementById("Careerfld").value;
            var f = document.getElementById("Birthdayfld").value;
            
            document.getElementById("Firstname").innerHTML=a;
            document.getElementById("Lastname").innerHTML=b;
            document.getElementById("Phone").innerHTML=c;
            document.getElementById("Email").innerHTML=d;
            document.getElementById("Career").innerHTML=e;
            document.getElementById("Birthday").innerHTML=f;
            
             document.getElementById("edit_btn").innerHTML='Edit';
            document.getElementById("edit_btn").setAttribute( "onClick", "javascript: Edit();" );
             document.getElementById("cancel_btn").style.display = "none";
            
            window.location.href = "https://numpapick.herokuapp.com/user_information.php?action="+username+"&Firstname=" + a + "&Lastname=" + b +"&Phone=" + c+"&Email=" +d+"&Career="+e+"&Birthday="+f;
    }
function Edit() {
    
            var a = document.getElementById("Firstname").innerHTML;
          var b = document.getElementById("Lastname").innerHTML;
            var c = document.getElementById("Phone").innerHTML;
           
            var d = document.getElementById("Email").innerHTML;
            var e = document.getElementById("Career").innerHTML;
            var f = document.getElementById("Birthday").innerHTML;
           
            document.getElementById("Firstname").innerHTML='<input id="Firstnamefld" type="text" value="'+a+'"'+' />';
            document.getElementById("Lastname").innerHTML='<input id="Lastnamefld" type="text" value="'+b+'"'+' />';
            document.getElementById("Phone").innerHTML='<input id="Phonefld" type="text" value="'+c+'"'+' />';
            document.getElementById("Email").innerHTML='<input id="Emailfld" type="text" value="'+d+'"'+' />';
            document.getElementById("Career").innerHTML='<input id="Careerfld" type="text" value="'+e+'"'+' />';
            document.getElementById("Birthday").innerHTML='<input id="Birthdayfld" type="date" value="'+f+'"'+' />';
           
           
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
<span id="storage2" data-variable-one="<?php echo $_GET["action"]; ?>"</span>
 <h1 class="kanit" > Information </h1>
 <ul class="w3-ul">
    <li> </li>
    <br>    
 <form  action="https://numpapick.herokuapp.com/manage.php" method="get">
    <button class="button button2" value="<?php echo $_GET["action"];?>" name="action">Back</button>
    
</form>
<button class="button button1" id="edit_btn" onclick="Edit()">Edit</button>
<button class="button button3" id="cancel_btn" style="display:none" onclick="Cancel()" >Cancel</button>
<br>
<br>
<table class="w3-table w3-striped Taviraj" id="customers" align="center">
   <tr>
          
          <tr>
          <td><div align="center">Firstname </div></td>
          <td id="Firstname"><?php echo $Firstname;?></td>
          </tr>
       
          <tr>
          <td><div align="center">Lastname </div></td>
          <td id="Lastname" ><?php echo $Lastname;?></td>
          </tr>
            <tr>
          <td><div align="center">Phone </div></td>
          <td id="Phone" ><?php echo $Phone;?></div></td>
          </tr>
          <tr>
          <td><div align="center">E-mail </div></td>
          <td id="Email" ><?php echo $Email;?></td>
          </tr>
          <tr>
          <td><div align="center">Career </div></td>
          <td id="Career" ><?php echo $Career;?></td>
          </tr>
          <tr>
          <td><div align="center">Birthday </div></td>
          <td id="Birthday" ><?php echo $Birthday;?></td>
          </tr>
         
   
          
        
  
</table>
</div>
</body>
</html>
