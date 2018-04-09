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

    <label  class = "Taviraj" >กรอกประวัติผู้ดูแล</label>
    
    <input type="text" id="fname" name="firstname" placeholder="ชื่อ" class = "Taviraj" value="<?php echo $firstname; ?>" required>
    <input type="text" id="lastname" name="lastname" placeholder="นามสกุล" class = "Taviraj" value="<?php echo $lastname; ?>" required>
    <input type="text" id="phone" name="phone" placeholder="เบอร์โทรศัพท์" class = "Taviraj" value="<?php echo $phone; ?>" required>
    <input type="text" id="email" name="email" placeholder="อีเมล" class = "Taviraj" value="<?php echo $email; ?>" required>
    <input type="text" id="career" name="career" placeholder="อาชีพ" class = "Taviraj" value="<?php echo $career; ?>" required>
    <p id="test" class="Taviraj">วัดเกิด</p> 
    <input type="Date" id="birthday" name="birthday"  class = "Taviraj" value="<?php echo $birthday; ?>" required> 

 	<div style="text-align: center;">
   	<input type="hidden" name="action" value="<?php echo $userid; ?>">
    
  	   <button class="nextbutton"  onclick="user()" style = "font-size: 18px; width:40%" value="ยืนยัน">ยืนยัน</button>
	</div>
 	


<div class="footer">
  <p>   </p>
</div>
<script>

function user(){
	 
    var fname = document.getElementById("fname").value;
    var lname = document.getElementById("lname").value;
    
    var phone = document.getElementById("phone").value;
	var email = document.getElementById("email").valuea
    var career = document.getElementById("career").value;
    var birthday = document.getElementById("birthday").value;
    var userid = url.searchParams.get("userid");  
	if(fname.length == 0){
    	   document.getElementById("test").innerHTML = "กรุณาใส่เลขอุปกรณ์";
            return;
    }else if(lname.length == 0){
    	 document.getElementById("test").innerHTML = "กรุณาใส่เลขอุปกรณ์";
            return;
    }else if(phone.length == 0){
    	 document.getElementById("test").innerHTML = "กรุณาใส่เลขอุปกรณ์";
            return;
    }else if(email.length == 0){
    	 document.getElementById("test").innerHTML = "กรุณาใส่เลขอุปกรณ์";
            return;
    }else if(birthday.length == 0){
    	 document.getElementById("test").innerHTML = "กรุณาใส่เลขอุปกรณ์";
            return;
    }else{
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("uname_error").innerHTML = this.responseText;
                 document.myform.action ="insert.html";
            }
        };
        xmlhttp.open("GET", "https://numpapick.herokuapp.com/add_device.php?fname=" + fname + "&lname="+lname+"&phone="+phone+"&email="+email+"&career="+career+"&birthday="+birthday+"&userid"+useid, true);
        xmlhttp.send();
    }
}
</script>
</body>
</html>
