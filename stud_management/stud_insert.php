<?php
session_start();
if(!isset($_SESSION["myusername"])){
header("location:login.php");
}
 
// Include config file
require_once "includes/connection.php";

// Define variables and initialize with empty values
$name = $email = $mobile = "";
$name_err = $email_err = $mobile_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate name
    $input_name = trim($_POST["name"]);
    if(empty($input_name)){
        $name_err = "Please enter a name.";
    } elseif(!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $name_err = "Please enter a valid name.";
    } else{
        $name = $input_name;
    }
    
    // Validate email
    $input_email = trim($_POST["email"]);
    if(empty($input_email)){
        $email_err = "Please enter an email.";     
    } else if (!filter_var($input_email, FILTER_VALIDATE_EMAIL) ) 
    {
        $email_err = "Please enter a valid email."; 
    }
    else{
        $email = $input_email;
    }
    
    // Validate mobile
    $input_mobile = trim($_POST["mobile"]);
    if(empty($input_mobile)){
        $mobile_err = "Please enter mobile number.";     
    }  else{
        $mobile = $input_mobile;
    }
    
    // Check input errors before inserting in database
    if(empty($name_err) && empty($email_err) && empty($mobile_err)){

        // Prepare an insert statement
        $sql = "INSERT INTO students_tbl (name, email, mobile) VALUES (?, ?, ?)";
 
        if($stmt = $mysqli->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            //specify data types. s=string, i=integer

            $stmt->bind_param("sss", $param_name, $param_email, $param_mobile);
            
            // Set parameters
            $param_name = $name;
            $param_email = $email;
            $param_mobile = $mobile;
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Records created successfully. Redirect to landing page
                header("location: stud_list.php");
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        $stmt->close();
    }
    
    // Close connection
    $mysqli->close();
}
?>
 
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                <br>
                <a href="home.php" class="btn btn-success pull-left"> Home</a>
                <a href="logout.php" class="btn btn-success pull-right"> Logout</a>
                <br>
                    <h2 class="mt-5">Add New Student    </h2>
                    <a href="stud_list.php" class="btn btn-success pull-left"> Student List</a>

                    <p>Please fill this form and submit to add employee record to the database.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control <?php echo (!empty($name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $name; ?>">
                            <span class="invalid-feedback"><?php echo $name_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>E-mail</label>
                            <input type="text" name="email" class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>">
                            <span class="invalid-feedback"><?php echo $email_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Mobile</label>
                            <input type="text" name="mobile" class="form-control <?php echo (!empty($mobile_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $mobile; ?>">
                            <span class="invalid-feedback"><?php echo $mobile_err;?></span>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="stud_list.php" class="btn btn-secondary ml-2">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>