<?php
// Include config file
//cho $_GET["add"];
// Define variables and initialize with empty values
$firstname = $lastname = $phone=$email = $career= $birthday ="";
$firstname_err = $lastname_err =  $phone_err=$email_err = $career_err= $birthday_err= "";
$userid = $_GET["add"];
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    echo $_POST["firstname"];
    $userid = $_POST["userid"];
    // Check if username is empty
    if(empty(trim($_POST["firstname"]))){
        $firstname_err = 'Please enter firstname.';
    } else{
        $firstname = trim($_POST["firstname"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST['lastname']))){
        $lastname_err = 'Please enter your lastname.';
    } else{
        $lastname = trim($_POST['lastname']);
    }
      if(empty(trim($_POST['phone']))){
        $phone_err = 'Please enter your phone number.';
    } else{
        $phone = trim($_POST['phone']);
    }
      if(empty(trim($_POST['email']))){
        $email_err = 'Please enter your email.';
    } else{
        $email = trim($_POST['email']);
    }
      if(empty(trim($_POST['career']))){
        $career_err = 'Please enter your career.';
    } else{
        $career = trim($_POST['career']);
    }
      if(empty(trim($_POST['birthday']))){
        $birthday_err = 'Please enter your birthday.';
    } else{
        $birthday = trim($_POST['birthday']);
    }
     if(empty($firstname_erris) && empty($lastname_err)){
            
      /*
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
      $sql ="SELECT * FROM device WHERE deviceid='".$username."' AND password='".$password."';";
    $ret = pg_query($db, $sql) ;
      if(!$ret) {
         echo pg_last_error($db) ;
      } else {
         $checking = 0;
         while($row = pg_fetch_row($ret) ){
          echo "have espname = " . $row[1] . "\n";
          // send_LINE('PASS');
            $checking = 1;
            
             
         }
         if($checking == 0){
             $username_err = 'username or password is wrong.';
         }else{
              $sql ="SELECT * FROM userline WHERE id='".$userid."' AND esp='".$username."';";
              $ret = pg_query($db, $sql) ;
              if(!$ret) {
                  echo pg_last_error($db) ;
              } else {
                  $checking = 0;   
                   while($row = pg_fetch_row($ret)){
                     //  echo "ESP name = " . $row[2] . "\n";
                       // send_LINE('PASS')
                        $checking = 1;     
                        //send_LINE("you login already",$userid);
                       // echo "string";     
                     }  
                    
                if( $checking == 0){
                           $sql ="SELECT MAX(userno) as LargestNO from userline;";
                      $ret = pg_query($db, $sql) ;
                      if(!$ret) {
                        echo pg_last_error($db) ;
                      } else {
                          while($row = pg_fetch_row($ret) ){
                         // echo "NO max = " . $row[0] . "\n";
                          $row[0] = intval($row[0]+1);
                          $sql =" INSERT INTO userline (userno,id,esp) VALUES ( ".$row[0].",'".$userid."','".$username."');";
                      }
                      $ret = pg_query($db, $sql) ;
                      if(!$ret) {
                      //  send_LINE("Login Error!",$userid);
                            echo pg_last_error($db) ;
                      } else {
                    //send_LINE("Login success",$userid);
                            echo "Records created successfully\n";
                    //getMqttfromlineMsg("555");
                          header("location: manage.php?action=$userid");
           
                      }
                  //echo "Records created successfully\n";
                  }
                }else{
                  $username_err = "you have been login";
                }
              }
         
                  
           }
         //echo "Records created successfully\n";
      }
     
      pg_close($db) ;*/
    }
   }
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
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
input[type=text],input[type=date], select {
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
.button {
    background-color: #072140; 
    border: none;
    color: white;
    padding: 10px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-family: 'Kanit', sans-serif;
    font-size: 24px;
    margin: 24px 2px;
    cursor: pointer;
    
}
.button1 {
    background-color: white; 
    color: #072140; 
    border: 2px solid #072140;
    border-radius: 8px;
    width: 100%;
    
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
</style>
</head>
<body>
<h1 class="kanit">กรอกข้อมูลเพื่อยืนยันตัวตน</h1>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

    <label for="fname" class = "Taviraj" >กรอกประวัติผู้ดูแล</label>
    <div class="form-group <?php echo (!empty($firstname_err)) ? 'has-error' : ''; ?>">
    <input type="text" id="fname" name="firstname" placeholder="ชื่อ" class = "Taviraj" value="<?php echo $firstname; ?>">
    <span class="help-block"><?php echo $firstname_err; ?></span>
    </div>
    <div class="form-group <?php echo (!empty($lastname_err)) ? 'has-error' : ''; ?>">
    <input type="text" id="fname" name="lastname" placeholder="นามสกุล" class = "Taviraj" value="<?php echo $lastname; ?>">
    <span class="help-block"><?php echo $lastname_err; ?></span>
    </div>
    <div class="form-group <?php echo (!empty($phone_err)) ? 'has-error' : ''; ?>">
    <input type="text" id="fname" name="phone" placeholder="เบอร์โทรศัพท์" class = "Taviraj" value="<?php echo $phone; ?>">
    <span class="help-block"><?php echo $phone_err; ?></span>
    </div>
    <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
  <input type="text" id="fname" name="email" placeholder="อีเมล" class = "Taviraj" value="<?php echo $email; ?>">
  <span class="help-block"><?php echo $email_err; ?></span>
  </div>
  <div class="form-group <?php echo (!empty($career_err)) ? 'has-error' : ''; ?>">
  <input type="text" id="fname" name="career" placeholder="อาชีพ" class = "Taviraj" value="<?php echo $career; ?>">
  <span class="help-block"><?php echo $career_err; ?></span>
  </div>
  <div class="form-group <?php echo (!empty($birthday_err)) ? 'has-error' : ''; ?>">
  <p class="Taviraj">วัดเกิด</p> <input type="Date" id="fname" name="birthday"  class = "Taviraj" value="<?php echo $birthday; ?>"> 
  <span class="help-block"><?php echo $birthday_err; ?></span>
  </div>
  <input type="submit" class="button button1" value="Next"> 
  </form>

<div class="footer">
  <p>   </p>
</div>
</body>
</html>
