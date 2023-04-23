<?php
// Include Student class file
require_once "models/student.class.php";

// Define variables and initialize with empty values
$name = $email = $mobile = "";
$name_err = $email_err = $mobile_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate name
    $name = trim($_POST["name"]);
    if(empty($name)){
        $name_err = "Please enter a name.";
    } elseif(!filter_var($name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $name_err = "Please enter a valid name.";
    } 
    
    // Validate email
    $email = trim($_POST["email"]);
    if(empty($email)){
        $email_err = "Please enter an email.";     
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL) ) 
    {
        $email_err = "Please enter a valid email."; 
    }
   
    
    // Validate mobile
    $mobile = trim($_POST["mobile"]);
    if(empty($mobile)){
        $mobile_err = "Please enter mobile number.";     
    } 
    
    // Check input errors before inserting in database
    if(empty($name_err) && empty($email_err) && empty($mobile_err)){

        //create Student object
        $obj_stud=new Student($name,$email,$mobile);
        
        if($obj_stud->insert()){
            // Records created successfully. Redirect to landing page
            header("location: stud_list.php"); // replace the page name
            exit();
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
         
        
    }
    else
    {
        header("location: stud_insert.php?name=$name&email=$email&mobile=$mobile&name_err=".
        urlencode($name_err)."&email_err=".urlencode($email_err)."&mobile_err=".urlencode($mobile_err));
        exit();
    }
    
}
?>