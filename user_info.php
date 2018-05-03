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
<h1 class="kanit">กรอกข้อมูลเพื่อยืนยันตัวตน</h1>

<p>
    <div style="text-align: center;">
    <div class="numberCircle" >1</div>
    <div class="numberCircle" >2</div>
    <div class="numberCircle" >3</div>
    <p>
    </div>
<form name="elder_form" id="elder_form" onSubmit="return user()">
    <div class="container" >
    <label  class = "Taviraj" >กรอกประวัติผู้ดูแล</label>
    
    <input  type="text"  name="fname" id="fname" placeholder="ชื่อ" class = "Taviraj"  required >
    <p id="fname_error"></p>
    <input type="text" id="lname" name="lastname" placeholder="นามสกุล" class = "Taviraj"  required>
    <p id="lname_error"></p>
    <input type="text" id="phone" name="phone" placeholder="เบอร์โทรศัพท์" class = "Taviraj" required >
    <p id="phone_error"></p>
    <input type="text" id="email" name="email" placeholder="อีเมล" class = "Taviraj" required>
    <p id="email_error"></p>
    <input type="text" id="career" name="career" placeholder="อาชีพ" class = "Taviraj" required >
    
    <p id="career_error"></p>
    
     <select class = "Taviraj" id="dd" name="dd" style="width: 25%" required>
     <option value="00">วัน</option>
      <option value="01">01</option>
      <option value="02">02</option>
      <option value="03">03</option>
      <option value="04">04</option>
      <option value="05">05</option>
      <option value="06">06</option>
      <option value="07">07</option>
      <option value="08">08</option>
      <option value="09">09</option>
      <option value="10">10</option>
      
      <option value="11">11</option>
      <option value="12">12</option>
      <option value="13">13</option>
      <option value="14">14</option>
      <option value="15">15</option>
      <option value="16">16</option>
      <option value="17">18</option>
      <option value="19">19</option>
      <option value="20">20</option>
      
      <option value="21">21</option>
      <option value="22">22</option>
      <option value="23">23</option>
      <option value="24">24</option>
      <option value="25">25</option>
      <option value="26">26</option>
      <option value="27">27</option>
      <option value="28">28</option>
      <option value="29">29</option>
      <option value="30">30</option>
      <option value="31">31</option>
      
	</select>
    <select class = "Taviraj" id="mm" name="mm" style="width: 25%" required>
      <option value="00">เดือน</option>
      <option value="01">01</option>
      <option value="02">02</option>
      <option value="03">03</option>
      <option value="04">04</option>
      <option value="05">05</option>
      <option value="06">06</option>
      <option value="07">07</option>
      <option value="08">08</option>
      <option value="09">09</option>
      <option value="10">10</option>
      <option value="11">11</option>
      <option value="12">12</option>
	</select>
    <select class = "Taviraj" id="yy" name="yy" style="width: 45%" required>
      <option value="00">ปี</option>
      <option value="2018">2018</option>
      <option value="2017">2017</option>
      <option value="2016">2016</option>
      <option value="2015">2015</option>
      <option value="2014">2014</option>
      <option value="2013">2013</option>
      <option value="2012">2012</option>
      <option value="2011">2011</option>
      <option value="2010">2010</option>
  
      <option value="2009">2009</option>
      <option value="2008">2008</option>
      <option value="2007">2007</option>
      <option value="2006">2006</option>
      <option value="2005">2005</option>
      <option value="2004">2004</option>
      <option value="2003">2003</option>
      <option value="2002">2002</option>
      <option value="2001">2001</option>
	  <option value="2000">2000</option>
      
      <option value="1999">1999</option>
      <option value="1998">1998</option>
      <option value="1997">1997</option>
      <option value="1996">1996</option>
      <option value="1995">1995</option>
      <option value="1994">1994</option>
      <option value="1993">1993</option>
      <option value="1992">1992</option>
      <option value="1991">1991</option>
      <option value="1990">1990</option>
      
      <option value="1989">1989</option>
      <option value="1988">1988</option>
      <option value="1987">1987</option>
      <option value="1986">1986</option>
      <option value="1985">1985</option>
      <option value="1984">1984</option>
      <option value="1983">1983</option>
      <option value="1982">1982</option>
      <option value="1981">1981</option>
      <option value="1980">1980</option>
      
      <option value="1979">1979</option>
      <option value="1978">1978</option>
      <option value="1977">1977</option>
      <option value="1976">1976</option>
      <option value="1975">1975</option>
      <option value="1974">1974</option>
      <option value="1973">1973</option>
      <option value="1972">1972</option>
      <option value="1971">1971</option>
      <option value="1970">1970</option>
      
      <option value="1969">1969</option>
      <option value="1968">1968</option>
      <option value="1967">1967</option>
      <option value="1966">1966</option>
      <option value="1965">1965</option>
      <option value="1964">1964</option>
      <option value="1963">1963</option>
      <option value="1962">1962</option>
      <option value="1961">1961</option>
      <option value="1960">1960</option>
      
      <option value="1959">1959</option>
      <option value="1958">1958</option>
      <option value="1957">1957</option>
      <option value="1956">1956</option>
      <option value="1955">1955</option>
      <option value="1954">1954</option>
      <option value="1953">1953</option>
      <option value="1952">1952</option>
      <option value="1951">1951</option>
      <option value="1950">1950</option>
    
      <option value="1949">1949</option>
      <option value="1948">1948</option>
      <option value="1947">1947</option>
      <option value="1946">1946</option>
      <option value="1945">1945</option>
      <option value="1944">1944</option>
      <option value="1943">1943</option>
      <option value="1942">1942</option>
      <option value="1941">1941</option>
      <option value="1940">1940</option>
      
      <option value="1939">1939</option>
      <option value="1938">1938</option>
      <option value="1937">1937</option>
      <option value="1936">1936</option>
      <option value="1935">1935</option>
      <option value="1934">1934</option>
      <option value="1933">1933</option>
      <option value="1932">1932</option>
      <option value="1931">1931</option>
      <option value="1930">1930</option>
      
	</select>
    
  
  <div style="text-align: center;">
    <input type="hidden" name="userid" id="userid" value="<?php echo $userid;?>" >
    
    <button class="nextbutton" type="submit" form="elder_form">ยืนยัน</button></p>
    
    </div>
   </form>
<div class="footer">
  <p>   </p>
</div>
<script>
function user(){
   
    var fname = document.getElementById("fname").value;
    var lname = document.getElementById("lname").value;
    var phone = document.getElementById("phone").value;
  	var email = document.getElementById("email").value;
    var career = document.getElementById("career").value;
    //var birthday = document.getElementById("birthday").value;
    var dd = document.getElementById("dd").value;
    var mm = document.getElementById("mm").value;
    var yy = document.getElementById("yy").value;
    var userid = document.getElementById("userid").value;
    
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
              // document.getElementById("birthday_error").innerHTML = this.responseText;
                if(this.responseText == "success"){
                  window.location.replace("https://numpapick.herokuapp.com/add_device1.php?userid="+userid);
                }
            }
        };
        xmlhttp.open("GET", "https://numpapick.herokuapp.com/add_device.php?info=1&fname=" + fname + "&lname="+lname+"&phone="+phone+"&email="+email+"&career="+career+"&birthday="+yy+"-"+mm+"-"+dd+"&userid="+userid, true);
        xmlhttp.send();
        return false;
    
}
</script>
</body>
</html>
