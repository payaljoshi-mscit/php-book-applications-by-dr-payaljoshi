<!DOCTYPE>
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<script language="javascript">

var httpObject = null;

// Change the value of the outputText field
function setOutput(){
   if(httpObject.readyState == 4){
document.getElementById('div_result').innerHTML =   httpObject.responseText;
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

      httpObject.open("GET", 
      "form_p.php?name="+document.forms["form1"].fname.value, true);
      httpObject.send(null);
      httpObject.onreadystatechange = setOutput;
   }
}
</script>
</head>
<body>
	<form name="form1" action="#">
		Enter Name: <input type="text" name="fname">
		<input type="button" value="ok" onClick="loadPage();">
	</form>
	<div id="div_result" >

   </div>
</body>

</html>
