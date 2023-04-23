<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<script language="javascript">

var httpObject = null;

// Change the value of the outputText field
function setOutput(){
   if(httpObject.readyState == 4){
      document.getElementById('div_result').innerHTML = httpObject.responseText;
   }
}

// Implement business logic
function loadSite(page){
   if (window.ActiveXObject) 
      httpObject= new ActiveXObject("Microsoft.XMLHTTP");
   else if (window.XMLHttpRequest) 
      httpObject= new XMLHttpRequest();
   else {
      alert("Your browser does not support AJAX.");
      return null;
   }

   if (httpObject != null) {
      if(page=="home")
         httpObject.open("GET", "home.php", true);
      else if(page =="contact")
         httpObject.open("GET", "contact.php", true);
      httpObject.send(null);
      httpObject.onreadystatechange = setOutput;
   }
}
</script>
</head>
<body>
<table border=1 width="80%" height="50%" align="center">
	<tr>
		<td><a href="#" onClick="loadSite('home');">Home</a><br>
		<a href="#" onClick="loadSite('contact');">Contact</a></td>
		<td ><div id="div_result" >DEFAULT PAGE</div></td>
	</tr>
</table>
</body>
</html>