<?php
 
// Define variables and initialize with empty values
$userid = $password = "";
$userid_err = $password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate userid
    $input_name = trim($_POST["userid"]);
    if(empty($input_name)){
        $userid_err = "Please enter a userid.";
    } elseif(!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $userid_err = "Please enter a valid userid.";
    } else{
        $userid = $input_name;
    }
    
    // Validate password
    $input_address = trim($_POST["password"]);
    if(empty($input_address)){
        $password_err = "Please enter a password.";     
    } else{
        $password = $input_address;
    }
    
    // Check input errors before inserting in database
    if(empty($userid_err) && empty($password_err) ){
        // Include config file
        require_once "includes/connection.php";

        // Prepare an insert statement
        $sql = "SELECT * FROM admin WHERE userid = ? AND password = ? ";              
 
        if($stmt = $mysqli->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            
            // Set parameters
            $param_userid = $userid;
            $param_password = $password;
            $stmt->bind_param("ss", $param_userid,$param_password);
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                $result = $stmt->get_result();
                echo $result->num_rows;
                    if($result->num_rows == 1)
                    {
                        // Close statement
                        $stmt->close();
                        // Close connection
                        $mysqli->close();

                        session_start();
                        $_SESSION["myusername"]=$userid;
                        header("location: home.php");
                        exit();
                    }
                    else
                    {
                        // Close statement
                        $stmt->close();
                        // Close connection
                        $mysqli->close();

                        header("location: login.php");
                        exit();
                    }
                
                // Records created successfully. Redirect to landing page
                //
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
       
    }
    
    
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
                    <h2 class="mt-5">Login</h2>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group">
                            <label>User ID</label>
                            <input type="text" name="userid" class="form-control <?php echo (!empty($userid_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $userid; ?>">
                            <span class="invalid-feedback"><?php echo $userid_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>">
                            <span class="invalid-feedback"><?php echo $password_err;?></span>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Submit">
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>