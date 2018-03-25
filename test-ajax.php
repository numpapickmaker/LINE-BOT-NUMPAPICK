<?php
	/*** By Weerachai Nukitram***/
	/***  http://www.ThaiCreate.Com ***/	
?>
<html>
<head>
<title>ThaiCreate.Com Ajax Tutorial</title>
</head>
<script language="JavaScript">
	   var HttPRequest = false;

	   function doCallAjax() {
		  HttPRequest = false;
		  if (window.XMLHttpRequest) { // Mozilla, Safari,...
			 HttPRequest = new XMLHttpRequest();
			 if (HttPRequest.overrideMimeType) {
				HttPRequest.overrideMimeType('text/html');
			 }
		  } else if (window.ActiveXObject) { // IE
			 try {
				HttPRequest = new ActiveXObject("Msxml2.XMLHTTP");
			 } catch (e) {
				try {
				   HttPRequest = new ActiveXObject("Microsoft.XMLHTTP");
				} catch (e) {}
			 }
		  } 
		  
		  if (!HttPRequest) {
			 alert('Cannot create XMLHTTP instance');
			 return false;
		  }
	
		  var url = 'AjaxPHPLoginForm2.php';
		  var pmeters = "tUsername=" + encodeURI( document.getElementById("txtUsername").value) +
						"&tPassword=" + encodeURI( document.getElementById("txtPassword").value );

			HttPRequest.open('POST',url,true);

			HttPRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			HttPRequest.setRequestHeader("Content-length", pmeters.length);
			HttPRequest.setRequestHeader("Connection", "close");
			HttPRequest.send(pmeters);
			
			
			HttPRequest.onreadystatechange = function()
			{

				if(HttPRequest.readyState == 3)  // Loading Request
				{
					document.getElementById("mySpan").innerHTML = "Now is Loading...";
				}

				if(HttPRequest.readyState == 4) // Return Request
				{
					if(HttPRequest.responseText == 'Y')
					{
						window.location = 'AjaxPHPLoginForm3.php';
					}
					else
					{
						document.getElementById("mySpan").innerHTML = HttPRequest.responseText;
					}
				}
				
			}

	   }
	</script>
<body>
<h1>Login Form</h1>
<form name="frmMain">
<span id="mySpan"></span>
<table width="274" border="1">
  <tr>
    <th width="117">
      <div align="left">Username</div></th>
    <th><input type="text" name="txtUsername" id="txtUsername" size="20"></th>
  </tr>
  <tr>
    <th width="117">
      <div align="left">Password</div></th>
    <th><input type="password" name="txtPassword" id="txtPassword" size="20"></th>
  </tr> 
</table>
<br>
<input name="btnLogin" type="button" id="btnLogin" OnClick="JavaScript:doCallAjax();" value="Login">
</form>
</body>
</html>
