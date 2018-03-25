<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<title>ajax ของง่ายถ้าใช้ jQuery</title>
 
<script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
<script type="text/javascript">
// ทดสอบการใช้ GET
function getData(){
	$.get("get.php", { data: $("#data1").val()}, 
		function(data){
			$("#divGetData").html(data);
		}
	);
}
 
// ทดสอบการใช้ POST
function postData(){
	$.post("https://numpapick.herokuapp.com/test-ajax2.php", { data: $("#data2").val()}, 
		function(data){
			$("#divPostData").html(data);
		}
	);
}
 
// ทดสอบการใช้ LOAD
function loadData(){
	$("#divLoadData").load("load.php?data="+$("#data3").val());
}
 
 
</script>
 
</head>
 
<body>
<form id="form1" name="form1" method="post" action="">
  <div id="divGetData"></div>
  <input name="data1" type="text" id="data1" size="40" />
  <input type="button" name="Button1" id="button1" value="Get" onclick="getData()" />
</form>
 
<hr />
 
<form id="form2" name="form2" method="post" action="">
  <div id="divPostData"></div>
  <input name="data2" type="text" id="data2" size="40" />
  <input type="button" name="Button2" id="button2" value="Post" onclick="postData()" />
</form>
 
<hr />
 
<form id="form3" name="form3" method="post" action="">
  <div id="divLoadData"></div>
  <input name="data3" type="text" id="data3" size="40" />
  <input type="button" name="Button3" id="button3" value="Load" onclick="loadData()" />
</form>
 
</body>
</html>
