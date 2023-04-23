<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<script language="javascript">

// Change the value of the outputText field
function setOutput(){
   if(httpObject.readyState == 4){
      document.getElementById('div_result').innerHTML = httpObject.responseText;
   }
}

// Implement business logic
function loadPage(){
   if (window.ActiveXObject) 
      httpObject= new ActiveXObject("Microsoft.XMLHTTP");
   else if (window.XMLHttpRequest) 
      httpObject= new XMLHttpRequest();
   else {
      alert("Your browser does not support AJAX.");
      httpObject= null;
   }

   if (httpObject != null) {
	
  var params = "fname="+document.forms["form1"].fname.value+"&lname="+document.forms["form1"].lname.value;
	
  httpObject.open("POST", "form1_p.php", true);
  	
  	httpObject.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	httpObject.setRequestHeader("Content-length", params.length);
	httpObject.setRequestHeader("Connection", "close");
  
	httpObject.onreadystatechange = setOutput; 
	
	httpObject.send(params);

   }
}
 
var httpObject = null;

</script>
</head>

<body>
	<form name="form1" method="post">
		Enter Firstname: <input type="text" name="fname"> <br>
		Enter Lastname:<input type="text" name="lname">
		<input type="button" value="ok" onClick="loadPage();">
	</form>
	<div id="div_result" ></div>
</body>
</html>
