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
 <link rel="stylesheet" type="text/css" href="mystyle.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</head>
<body>
<p>
<h1 class="kanit">จัดการอุปกรณ์</h1>
<p>
<div style="text-align: center;">
  <span class="step"></span>
    <span class="step" style="background-color: #000000;"></span>
    <span class="step"></span>
    <p>
    <p><button class="addbutton"  onclick="document.getElementById('id01').style.display='block'" >เพิ่ม</button></p>
    
    <p><button class="prevbutton" >ย้อนกลับ</button></p>
  
  
 
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
 
      <label for="uname"><b>อุปกรณ์</b></label>
      <input type="text"  placeholder="เลขอุปกรณ์" name="uname" id="uname" required>
    <p id="uname_error"></p>
      <label for="psw"><b>รหัสผ่าน</b></label>
      <input type="password" placeholder="รหัสผ่าน" name="psw" id="psw" required>
  
      <p id="psw_error"></p>
      <p>
     
      <p><p><p><p>
     <input type="hidden" name="userid" id="userid" value="<?php echo $userid;?>">
     
     <button class="nextbutton"  onclick="add()" style = "font-size: 18px; width:40%" value="ยืนยัน">ยืนยัน</button>
   
    </div>


   
  </div>
</div>
</div>
<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

function add() {
     var userid = document.getElementById('userid').value;
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
                if(this.responseText == "success"){
                  window.location.replace("https://numpapick.herokuapp.com/managedevice.php?userid="+userid);
                }
              
            }
        };
        xmlhttp.open("GET", "https://numpapick.herokuapp.com/add_device.php?uname=" + uname + "&psw="+psw+"&userid="+userid, true);
        xmlhttp.send();
    }
}
</script>
</body>
</html>