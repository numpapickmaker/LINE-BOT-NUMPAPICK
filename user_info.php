<?php
// Include config file
//cho $_GET["add"];
// Define variables and initialize with empty values
$firstname = $lastname = $phone=$email = $career= $birthday ="";
$firstname_err = $lastname_err =  $phone_err=$email_err = $career_err= $birthday_err= "";
$userid = $_GET["action"];
echo $userid;
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    echo $_POST["firstname"];
    echo $userid = $_POST["action"];
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
       $sql ="SELECT * FROM user_info WHERE id='".$userid."';";
        $ret = pg_query($db, $sql) ;
      if(!$ret) {
         echo pg_last_error($db) ;
      } else {
          $check_id = 0;
         while($row = pg_fetch_row($ret) ){
            $check_id=1;
             echo "check_id ==1";
         }
         if($check_id == 0){
          echo "check_id ==0";
                $sql ="SELECT MAX(user_no) as LargestNO from user_info;";
                $ret = pg_query($db, $sql) ;
                if(!$ret) {
                   echo pg_last_error($db) ;
                } else {
                 
                   while($row = pg_fetch_row($ret) ){
                      $row[0] = intval($row[0]+1);
                      $sql ="insert into user_info values (".$row[0].",'".$userid."','".$firstname."','".$lastname."','".$phone."','".$email."','".$career."','".$birthday."');";
                      
                       
                   }
                  
                        
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
                               header("location: https://numpapick.herokuapp.com/main.php?action=$userid");
                         
                          }
               
               
              }
         }
       }
        pg_close($db) ;
      }    
 }
?>
<!DOCTYPE html>
<html>
<head>
<link href="https://fonts.googleapis.com/css?family=Kanit:200|Open+Sans|Taviraj" rel="stylesheet">
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
 
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

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
/* Full-width input fields */

.kanit {
	font-family: 'Kanit', sans-serif;
}.Taviraj {
	font-family: 'Taviraj', serif;
    font-size: 18px;
    margin: 24px 2px;
}
.prevbutton {
    background-color: white; 
    border: none;
    color: #072140;
    padding: 10px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-family: 'Kanit', sans-serif;
    font-size: 24px;
    margin: 2px 2px;
    cursor: pointer;
    width: 50%;
    border-radius: 8px;
    border: 2px solid #072140;
}
.nextbutton{
	 background-color: #072140; 
    border: none;
    color: white;
    padding: 10px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-family: 'Kanit', sans-serif;
    font-size: 24px;
    margin: 2px 2px;
    cursor: pointer;
    width: 50%;
    border-radius: 8px;
    border: 2px solid #072140;
}
.addbutton{
	 background-color: white; 
    border: none;
    color: #FFA400;
    padding: 10px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-family: 'Kanit', sans-serif;
    font-size: 24px;
    margin: 2px 2px;
    cursor: pointer;
    width: 50%;
    border-radius: 8px;
    border: 2px solid #FFA400;
}
.Row {
            
   left: 0;
   bottom: 0;
   width: 100%;
   background-color: white;
   color: black;
   text-align: center;
   font-size: 20px;
    margin: 24px 2px;
        }
.Row.Expand {
             height: auto;
        }
.step {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbbbbb;
  border: none;  
  border-radius: 50%;
  display: inline-block;
  opacity: 0.5;
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

/* Set a style for all buttons */


.container {
    padding: 16px;
}

span.psw {
    float: right;
    padding-top: 16px;
}

/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    padding-top: 60px;
}

/* Modal Content/Box */
.modal-content {
    background-color: #fefefe;
    margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
    border: 1px solid #888;
    width: 80%; /* Could be more or less, depending on screen size */
}

/* The Close Button (x) */
.close {
    position: absolute;
    right: 25px;
    top: 0;
    color: #000;
    font-size: 35px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: red;
    cursor: pointer;
}

/* Add Zoom Animation */
.animate {
    -webkit-animation: animatezoom 0.6s;
    animation: animatezoom 0.6s
}

</style>
</head>
<body>
<h1 class="kanit">กรอกข้อมูลเพื่อยืนยันตัวตน</h1>

<p>
    <div style="text-align: center;">
    <span class="step" style="background-color: #000000;"></span>
    <span class="step" ></span>
    <span class="step"></span>
    <p>
    </div>
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
  <div style="text-align: center;">
   <input type="hidden" name="action" value="<?php echo $userid; ?>">
  <input type="submit" class="nextbutton" value="Next"> 
  </div>
  </form>


<div class="footer">
  <p>   </p>
</div>
</body>
</html>
