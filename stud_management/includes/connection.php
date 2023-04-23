<?php

define('DBSERVER', 'localhost');
define('DBUSERNAME', 'root');
define('DBPASSWORD', '');
define('DBNAME', 'student_db');
 
/* Attempt to connect to MySQL database */
$mysqli = new mysqli(DBSERVER, DBUSERNAME, DBPASSWORD, DBNAME);
 
// Check connection
if($mysqli === false){
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}
?>
