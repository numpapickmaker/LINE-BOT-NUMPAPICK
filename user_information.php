<?php 
$userid = $_GET["userid"];
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
<!--  jQuery -->
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

<!-- Isolated Version of Bootstrap, not needed if your site already uses Bootstrap -->
<link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />

<!-- Bootstrap Date-Picker Plugin -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
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
    margin: 0px 2px;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 5px;
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
<h1 class="kanit">ข้อมูลผู้ใช้งาน</h1>

<p>
   
<form name="elder_form" id="elder_form" onSubmit="return user()">
    <div class="container" >
    <label  class = "Taviraj" >กรอกประวัติผู้ดูแล</label>
    <div id="user_info"></div>
  <p></p>  
        </form>
        <input class="form-control" class = "Taviraj" id="date" name="date" placeholder="DD/MM/YYY" type="text" required/>
  <p><button class="prevbutton"  onclick="back()">ย้อนกลับ</button></p>
  <div style="text-align: center;">
    <input type="hidden" name="userid" id="userid" value="<?php echo $userid;?>" >
    
    <button class="nextbutton" type="submit" form="elder_form">บันทึก</button></p>
    
    </div>
   
<div class="footer">
  <p>   </p>
</div>
<script>
function date_custom(){ 
    $(document).ready(function(){
      var date_input=$('input[name="date"]'); //our date input has the name "date"
      var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
      $.fn.datepicker.dates['en'] = {
    days: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
    daysShort: ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"],
    daysMin: ["อาทิตย์", "จันทร์", "อังคาร", "พุธ", "พฤหัส", "ศุกร์", "เสาร์"],
    months: ["มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤษจิกายน", "ธันวาคม"],
    monthsShort: ["ม.ค.", "ก.พ.", "มี.ค.", "เม.ย.", "พ.ค.", "มิ.ย.", "ก.ค.", "ส.ค.", "ก.ย.", "ต.ค.", "พ.ย.", "ธ.ค."],
    today: "Today",
    clear: "Clear",
    format: "yyyy/mm/dd",
    titleFormat: "MM yyyy", /* Leverages same syntax as 'format' */
    weekStart: 0
};
      var options={
        format: 'yyyy/mm/dd',
        container: container,
        todayHighlight: true,
        autoclose: true,
        
      };
      
      date_input.datepicker(options);
     
    })
}    
function user(){
   //
    var fname = document.getElementById("fname").value;
    var lname = document.getElementById("lname").value;
    var phone = document.getElementById("phone").value;
    var email = document.getElementById("email").value;
    var career = document.getElementById("career").value;
    //var birthday = document.getElementById("birthdayfld").value;
    var date = document.getElementById("date").value;
    var birthday = date.replace(/\//g, "-");
    /*var dd = document.getElementById("dd").value;
    var mm = document.getElementById("mm").value;
    var yy = document.getElementById("yy").value;*/
    var userid = document.getElementById("userid").value;
        console.log("https://numpapick.herokuapp.com/add_device.php?info=2&fname=" + fname + "&lname="+lname+"&phone="+phone+"&email="+email+"&career="+career+"&birthday="+birthday+"&userid="+userid);
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
              // document.getElementById("birthday_error").innerHTML = this.responseText;
                if(this.responseText == "success"){
                  window.location.replace("https://numpapick.herokuapp.com/main.php?userid="+userid);
                }
            }
        };
        xmlhttp.open("GET", "https://numpapick.herokuapp.com/add_device.php?info=2&fname=" + fname + "&lname="+lname+"&phone="+phone+"&email="+email+"&career="+career+"&birthday="+birthday+"&userid="+userid, true);
        xmlhttp.send();
        return false;
    
}
create_listinfo();
function create_listinfo(){
    var userid = document.getElementById('userid').value;
   
    // document.getElementById("elderinfo").innerHTML = userid;
    var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("user_info").innerHTML = this.responseText;
                    date_custom();
                }
            };
            xmlhttp.open("GET", "https://numpapick.herokuapp.com/add_device.php?userid=" + userid + "&create_userinfo=1" , true);
            xmlhttp.send();
}
function back(){
    var userid = document.getElementById('userid').value;
    
     window.location.replace("https://numpapick.herokuapp.com/main.php?userid="+userid);
}
</script>
</body>
</html>
