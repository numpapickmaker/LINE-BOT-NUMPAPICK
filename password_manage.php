<?php
// Include config file
//cho $_GET["add"];
// Define variables and initialize with empty values
$new_password = $conf_password = "";
$new_password_err = $conf_password_err = "";
$userid = $_GET["view"];
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    //echo $_POST["userid"];
     $userid = $_POST["userid"];
    // Check if username is empty
    if(empty(trim($_POST["newpassword"]))){
        $new_password_err = 'Please enter new password.';
    } else{
        $new_password = trim($_POST["newpassword"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST['confpassword']))){
        $password_err = 'Please confirm your password.';
    } else{
        $conf_password = trim($_POST['confpassword']);
    }
    if($new_password != $conf_password){
        $password_err = 'Password not math.';
    }
     if(empty($new_password_err) && empty($conf_password)){
            
   
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
      $sql ="UPDATE device VALUES SET password='".$new_password."' WHERE Deviceid='".$userid."';";
    $ret = pg_query($db, $sql) ;
      if(!$ret) {
         echo pg_last_error($db) ;
      } else {
         $checking = 0;
         while($row = pg_fetch_row($ret) ){
          echo "have espname = " . $row[0] . "\n";
          // send_LINE('PASS');
            $checking = 1;
            
             
         }
         
         //echo "Records created successfully\n";
      }
     
      pg_close($db) ;
    }
   } 
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
     <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Kanit:200|Open+Sans|Taviraj" rel="stylesheet">
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
input[type=text],input[type=password], select {
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
    margin: 24px 2px;
}
.footer {
   position: fixed;
   left: 0;
   bottom: 0;
   width: 100%;
   background-color: white;
   color: black;
   text-align: center;
   font-family: 'Taviraj', serif;
   font-size: 20px;
    margin: 24px 2px;
}
.button {
    background-color: white; /* Green */
    border: none;
	width:100%;
    padding: 10px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-family: 'Kanit', sans-serif;
    font-size: 24px;
    margin: 0px 0px;
    cursor: pointer;
    
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
</head>
<body>
    <div class="w3-container" >
        <h1 class="kanit">Login</h1>
        <ul class="w3-ul">
    <li> </li>
    <br>    
        <h3 class="kanit">Please fill in your credentials to login.</h3>


    
   
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label for="fname" class = "Taviraj" >New password</label><br>
                <input type="password" name="newpassword" class = "Taviraj" placeholder="password" >
                <input type="hidden" name="userid" class = "Taviraj" value="<?php echo $userid; ?>"></input>
                <span class="help-block"><?php echo $new_password_err; ?></span>
            </div>    
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label for="fname" class = "Taviraj" >Confirm password</label><br>
                <input type="password" name="confpassword" class = "Taviraj" placeholder="password" >
                <span class="help-block"><?php echo $conf_password_err; ?></span>
            </div>
              <input type="hidden" name="userid" class = "Taviraj" value="<?php echo $userid; ?>">         
             <ul class="w3-ul">
    <li> </li>
    <br>
                <input type="submit" class="button button1" value="save">
               
    

        </form>
        <br>
         <form action="https://numpapick.herokuapp.com/manage.php" method="get">
    <button class="button button2" value="<?php echo $userid;?>" name="action">Back</button></form>
    </div>    
</body>
</html>
