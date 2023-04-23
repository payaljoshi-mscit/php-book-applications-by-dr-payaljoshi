<?php
// Define variables and initialize with empty values
$name = $email = $mobile = "";
$name_err = $email_err = $mobile_err = "";
 
// Processing form data when form is submitted
    if(isset($_GET["name"]))
        $name=trim($_GET["name"]);

    if(isset($_GET["name_err"]))
        $name_err=trim($_GET["name_err"]);

    if(isset($_GET["email"]))
        $email=trim($_GET["email"]);

    if(isset($_GET["email_err"]))
        $email_err=trim($_GET["email_err"]);

    if(isset($_GET["mobile"]))
        $mobile=trim($_GET["mobile"]);

    if(isset($_GET["mobile_err"]))
        $mobile_err=trim($_GET["mobile_err"]);


// if($_SERVER["REQUEST_METHOD"] == "GET" ){
//     $input_name = trim($_GET["name"]);
//     $name_err = trim($_GET["name_err"]);
//     $input_email = trim($_GET["email"]);
//         $email_err = trim($_GET["email_err"]); 
//     $input_mobile = trim($_GET["mobile"]);
//         $mobile_err = trim($_GET["mobile_err"]);     
// }   


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
                    <h2 class="mt-5">Add New Student    </h2>

                    <p>Please fill this form and submit to add employee record to the database.</p>
                    <form action="stud_insert_con.php" method="post">
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
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>