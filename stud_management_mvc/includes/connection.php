<?php
define('DBSERVER', 'localhost');
define('DBUSERNAME', 'root');
define('DBPASSWORD', '');
define('DBNAME', 'student_db');
class Stud_DB
{
    protected $mysqli_con;

    function __construct()
    {
        /* Attempt to connect to MySQL database */
        $this->mysqli_con = new mysqli(DBSERVER, DBUSERNAME, DBPASSWORD, DBNAME);
        
        // Check connection
        if($this->mysqli_con === false){
            die("ERROR: Could not connect. " . $this->mysqli_con->connect_error);
        } 
    }
    function __destruct()
    {
        $this->mysqli_con->close();
        $this->mysqli_con=null;
    }
} 

?>