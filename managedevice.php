<?php 
$userid = $_GET["userid"];
$path = $_GET["path"];
?>
<!DOCTYPE html>
<html>
<head>
    <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/solid.js" integrity="sha384-+Ga2s7YBbhOD6nie0DzrZpJes+b2K1xkpKxTFFcx59QmVPaSA8c7pycsNaFwUK6l" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/fontawesome.js" integrity="sha384-7ox8Q2yzO/uWircfojVuCQOZl+ZZBg2D2J5nkpLqzH1HY0C1dHlTKIbpRz/LG23c" crossorigin="anonymous"></script>
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
.table {
    border-radius: 5px;
    width: 100%;
    margin: 0px auto;
    float: none;
}
.table td {
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
    width: 100%;
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
    width: 100%;
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
    width: 100%;
    border-radius: 8px;
    border: 2px solid #FFA400;
}
.delbutton{
   background-color: white; 
    border: none;
    color: #FF0000;
    padding: 10px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-family: 'Kanit', sans-serif;
    font-size: 24px;
    margin: 2px 2px;
    cursor: pointer;
    width: 100%;
    border-radius: 8px;
    border: 2px solid #FF0000;
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

input[type=text], input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 0px 0;
    display: inline-block;
    border: 1px solid #ccc;
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
    width: 90%; /* Could be more or less, depending on screen size */
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

#outer
{
    width:100%;
    text-align: center;
}
.inner
{
    display: inline-block;
}

.numberCircle {
  border-radius: 50%;
  behavior: url(PIE.htc);
  /* remove if you don't care about IE8 */
  width: 50px;
  height: 50px;
  padding: 5px;
  background: #fff;
  display: inline-block;
  border: 3px solid #bbbbbb;
  color: #bbbbbb;
  text-align: center;
  font: 23px kanit, sans-serif;
  font-weight : bold
}
</style>
</head>
<body>

<p>
<h1 class="kanit">จัดการข้อมูลผู้ใช้งาน</h1>
<p>   
  
<div style="text-align: center; ">
 <div class="numberCircle" style="border: 3px solid #33cc33; color: #33cc33;">1</div>
    <div class="numberCircle" style="border: 3px solid #33cc33; color: #33cc33;">2</div>
    <div class="numberCircle" >3</div>
    
    <div class="container" >
    
      <div id="listdevice">
     </div>
   
</div>
  <div class="container" >
    <button class="addbutton"    onclick="document.getElementById('id01').style.display='block'">เพิ่ม</button></p>
    <?php 
        if($path == "main"){
            ?>
           <p><button class="prevbutton" onclick="back()" >ย้อนกลับ</button></p> 
       <?php }else{  ?>
         <p><button class="nextbutton" onclick="next()">ถัดไป</button></p>
       <?php }
    ?>
     <!--<p><button class="prevbutton" onclick="back()" >ย้อนกลับ</button></p>-->
  

 <input type="hidden" name="userid" id="userid" value="<?php echo $userid;?>">  
 
 <!--<div class="Row">
 <div style="text-align:center;margin-top:40px;">
    <span class="step" style="background-color: #000000;"></span>
    <span class="step"></span>
    <span class="step"></span>
    <span class="step"></span>
  </div>
</div> -->

<div id="id01" class="modal">
  
  <div class="modal-content animate" >
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
    </div>

    <div class="container" >
 <p><label class = "Taviraj"  for="uname">เพิ่มอุปกรณ์</label>
      <input type="text"  placeholder="เลขอุปกรณ์" name="uname" id="uname" class = "Taviraj" required>
      <p id="uname_error"></p>
      <input type="password" placeholder="รหัสผ่าน" name="psw" id="psw" class = "Taviraj" required>
  
      <p id="psw_error"></p>
      <p>
     
      <p><p><p><p>
     <input type="hidden" name="userid" id="userid" value="<?php echo $userid;?>">
     <input type="hidden" name="path" id="path" value="<?php echo $path;?>">
     <button class="nextbutton"  onclick="add()" style = "font-size: 20px; width:100%" value="ยืนยัน">ยืนยัน</button>
   
    </div>
   </div>
  </div>
</div>





<script>
// Get the modal
var modal1 = document.getElementById('id01');

var modal3 = document.getElementById('id03');
create_table();
// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal1) {
        modal1.style.display = "none";
       
        modal3.style.display = "none";
    }
}
function next(){
   var userid = document.getElementById('userid').value;
     window.location.replace("https://numpapick.herokuapp.com/finish.php?userid="+userid); 
}
function back(){
   var userid = document.getElementById('userid').value;
    var path = document.getElementById('path').value;
     window.location.replace("https://numpapick.herokuapp.com/"+path+".php?userid="+userid);
}
function add() {
    var uname = document.getElementById("uname").value;
    var psw = document.getElementById("psw").value;
  var userid =  document.getElementById("userid").value;
   // var userid = url.searchParams.get("userid");  
    if (uname.length == 0) { 
        document.getElementById("uname_error").innerHTML = "กรุณาใส่เลขอุปกรณ์";
        return;
    }else{
       document.getElementById("uname_error").innerHTML = "";
    }
    if(psw.length == 0){
      document.getElementById("psw_error").innerHTML = "กรุณาใส่รหัสผ่าน";
        return;
    }else{
      document.getElementById("psw_error").innerHTML = "";
    }
    if(userid.length == 0){
      document.getElementById("psw_error").innerHTML = "กรุณาออกจากระบบและเข้าใหม่";
        return;
    }else{
      document.getElementById("psw_error").innerHTML = "";
    }
    
    if(uname.length != 0 && psw.length != 0){
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("uname_error").innerHTML = this.responseText;
                var str = this.responseText.trim();
                if( str == "success"){
                  create_table();
                    modal1.style.display = "none";
                    
                }
            }
        };
        xmlhttp.open("GET", "https://numpapick.herokuapp.com/add_device.php?uname=" + uname + "&psw="+psw+"&userid="+userid, true);
        xmlhttp.send();
    }
}
function edit(){
  var userid = document.getElementById('userid').value;
    var deviceid = document.getElementById('deviceid').value.value;
}
function submit(){
  var userid = document.getElementById('userid').value;
}
function create_table(){
  var userid = document.getElementById('userid').value;
     document.getElementById("listdevice").innerHTML = userid;
    var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("listdevice").innerHTML = this.responseText;
                    
                }
            };
            xmlhttp.open("GET", "https://numpapick.herokuapp.com/add_device.php?userid=" + userid + "&create=1&path=managedevice", true);
            xmlhttp.send();
}
</script>
</body>
</html>
