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
	
			var url = 'test-ajax2.php';
			var pmeters = 'myName='+document.getElementById("txtName").value;
			//var pmeters = 'myName='+document.getElementById("txtName").value+'&my2='; // 2 Parameters
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
				   window.location = test-ajax2.php;
				  }
				
			}

			/*
			HttPRequest.onreadystatechange = call function .... // Call other function
			*/

	   }
	</script>	
<body>	
	<input type="text" name="txtName" id="txtName" value="">
	<input name="btnButton" id="btnButton" type="button" value="Click" onClick="JavaScript:doCallAjax();">
	<br>
	<span id="mySpan"></span>
</body>
</html>
