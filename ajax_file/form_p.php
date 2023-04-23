<?php
	print "Hello .. ".$_GET["name"]."<br><br>";

$con = mysqli_connect("localhost","root","","student_db");
	if (!$con) {
		die('Could not connect: ' . mysqli_error());
	}


	$result = mysqli_query($con,"SELECT * FROM users WHERE username='$_GET[name]'");
		//$result = mysqli_query($con,"SELECT * FROM users");
	?>
	<div align="center">
	<h1>Registered Users</h1>
	<table border='1' cellpadding="2" cellspacing="1" bgcolor="azure">
		<tr>
			<th>User Name</th>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Email</th>
		</tr>
		<?php
		while ($row = mysqli_fetch_array($result)) 
		{		
		?>

			<tr> <td><?php print $row['username']; ?></td>

				 <td><?php print $row['firstname']; ?></td>

				 <td><?php print $row['lastname']; ?></td>

				 <td><?php print $row['email']; ?></td>		

			</tr>

			<?php

			} 

 ?>

	</table>
<br>
	</div>
	<?php
	mysqli_close($con);
	?>