<?php
include "includes/connection.php";
class Student extends Stud_DB
{
    var $name;
    var $email;
    var $mobile;
    public function __construct($n,$e,$m)
    {
        parent::__construct();
        $this->name=$n;
        $this->email=$e;
        $this->mobile=$m;
    }
    function insert()
    {  
        // Prepare an insert statement
        $sql = "INSERT INTO students_tbl (name, email, mobile) VALUES (?, ?, ?)";
        if($stmt = $this->mysqli_con->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            //specify data types. s=string, i=integer
            $stmt->bind_param("sss", $param_name, $param_email, $param_mobile);
            
            // Set parameters
            $param_name = $this->name;
            $param_email = $this->email;
            $param_mobile = $this->mobile;
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Close statement
                //$stmt->close();
                return true;
            } else{
                return false;
            }
        }
        else echo "Error";
    }
    function get($id=0)
    {

    }
    function update()
    {

    }
    function delete()
    {

    }
    function __destruct()
    {
        parent::__destruct();
    }
}
?>