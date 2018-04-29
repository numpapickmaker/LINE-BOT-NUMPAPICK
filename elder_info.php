<?php 
$userid = $_GET["userid"];
$deviceid = $_GET["deviceid"];
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
<div class="container" >
<p>
<h1 class="kanit">แก้ไขข้อมูล</h1>
<p>   
  
<div style="text-align: center; ">
<div class="numberCircle" style="border: 3px solid #33cc33; color: #33cc33;">1</div>
    <div class="numberCircle" style="border: 3px solid #33cc33; color: #33cc33;">2</div>
    <div class="numberCircle" >3</div>
    
	
    
    <div class = "Taviraj" >
    <div class="container" >
    <label >ผู้สูงอายุ</label>
    <form name="elder_form" id="elder_form" onSubmit="return confirm_save()">
    <div id="elderinfo"></div>
    </form>
    </div>
    
  <br>
    <p><button class="prevbutton"  onclick="back()">ย้อนกลับ</button></p>
  <p><button class="nextbutton" type="submit" form="elder_form">ยืนยัน</button></p>
    <button class="delbutton" onclick="document.getElementById('id02').style.display='block'"> ลบ</button>
  
 </div>
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

     <div class="container Taviraj" >
      <p>
      
     <h1 class= "kanit">แก้ไขข้อมูลสำเร็จ</h1>
     <p>
     <i class="fas fa-check" style ="width: 100px; height: 100px; color:  #32CD32;"></i>
     <p>
     <button class="nextbutton container Taviraj"  style = "font-size: 24px; width:50% ; background-color:  #32CD32; border: 2px solid white;" onclick="save()">  ตกลง </button>
     </div>
     
    
    </div>
  </div>

</div>

<div id="id02" class="modal">
  
  <div class="modal-content animate" >
    <div class="imgcontainer">
  
    </div>
    <div class="container Taviraj" >
      <p>
      
     <h1 class= "kanit">ต้องการลบข้อมูลอุปกรณ์ ? </h1>
     <h2 class= "Taviraj" style="text-align:center">หากลบจะไม่สามารถทำการกู้คืนข้อมูลได้</h2>
     <button class="nextbutton " onclick="document.getElementById('id02').style.display='none'" style = "font-size: 20px; width:48% ; ">  ยกเลิก </button>
     <button class="delbutton " onclick="delete_device()" style = "font-size: 20px; width:48% ; ">  ลบ </button>
     </div>

   
  </div>
</div>
</div>
 <input type="hidden" name="userid" id="userid" value="<?php echo $userid;?>">
 <input type="hidden" name="userid" id="deviceid" value="<?php echo $deviceid;?>">
<script>
// Get the modal
var modal1 = document.getElementById('id01');
var modal2 = document.getElementById('id02');
var modal3 = document.getElementById('id03');
// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal1) {
        modal1.style.display = "none";
    }else if(event.target == modal2){
      modal2.style.display = "none";
    }else if(event.target == modal3){
        modal3.style.display = "none";    
    }
}
function back(){
    var userid = document.getElementById('userid').value;
     window.location.replace("https://numpapick.herokuapp.com/managedevice.php?userid="+userid);
}
function confirm_save(){
  document.getElementById('id01').style.display='block' ;
    return false;
}
function getRadioButtonValue(rbutton)
      {
        for (var i = 0; i < rbutton.length; ++i)
        { 
          if (rbutton[i].checked)
            return rbutton[i].value;
        }
        return null;
      }
function save(){
  
  var userid = document.getElementById('userid').value;
    var deviceid = document.getElementById('deviceid').value;
    var name = document.getElementById("namefld").value;
    var birthday = document.getElementById("birthdayfld").value;
    
    var sex =  getRadioButtonValue(document.elder_form.sexfld);
    var heigth = document.getElementById("heigthfld").value;
    var weigth = document.getElementById("weigthfld").value;
    var disease = document.getElementById("diseasefld").value;
    var address = document.getElementById("addressfld").value;
    var phone = document.getElementById("phonefld").value;
     document.getElementById("elderinfo").innerHTML ="userid=" + userid + "&elderinfo=0"+ "&deviceid=" +deviceid +"&name=" + name + "&sex=" +sex + "&heigth=" +heigth+ "&weigth="+ weigth+ "&disease="+ disease+ "&address="+ address +"&phone="+ phone + "&birthday="+ birthday;
    var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("elderinfo").innerHTML = this.responseText;
                    window.location.replace("https://numpapick.herokuapp.com/managedevice.php?userid="+userid);
                }
            };
            xmlhttp.open("GET", "https://numpapick.herokuapp.com/add_device.php?userid=" + userid + "&elderinfo=2"+ "&deviceid=" +deviceid +"&name=" + name + "&sex=" +sex + "&heigth=" +heigth+ "&weigth="+ weigth+ "&disease="+ disease+ "&address="+ address +"&phone="+ phone + "&birthday="+ birthday , true);
            xmlhttp.send();
}
create_listinfo();
function create_listinfo(){
    var userid = document.getElementById('userid').value;
    var deviceid = document.getElementById('deviceid').value;
    // document.getElementById("elderinfo").innerHTML = userid;
    var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("elderinfo").innerHTML = this.responseText;
                    
                }
            };
            xmlhttp.open("GET", "https://numpapick.herokuapp.com/add_device.php?userid=" + userid + "&elderinfo=1"+ "&deviceid=" +deviceid , true);
            xmlhttp.send();
}
function delete_device(){
                    
  var userid = document.getElementById('userid').value;
    var deviceid = document.getElementById('deviceid').value;
    // ลบการเชื่อมต่อระหว่าง อุปกรณ์และผู้ใช้งาน
    var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    //document.getElementById("elderinfo").innerHTML = this.responseText;
                    window.location.replace("https://numpapick.herokuapp.com/managedevice.php?userid="+userid);
                }
            };
            xmlhttp.open("GET", "https://numpapick.herokuapp.com/add_device.php?userid=" + userid + "&elderinfo=3"+ "&deviceid=" +deviceid , true);
            xmlhttp.send();
   
}
</script>
</body>

</html>
