<?php
define('DBSERVER', 'localhost');
define('DBUSERNAME', 'root');
define('DBPASSWORD', '');
define('DBNAME', 'student_db');

// Connect to database
$connection=mysqli_connect(DBSERVER,DBUSERNAME, DBPASSWORD,DBNAME);

?>