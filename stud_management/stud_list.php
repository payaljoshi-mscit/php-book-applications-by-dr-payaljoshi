<?php
session_start();
if(!isset($_SESSION["myusername"])){
header("location:login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
        table tr td:last-child{
            width: 120px;
        }
    </style>
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
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
                     <div class="mt-5 mb-3 clearfix">
                        <h2 class="pull-left">Students Details</h2>
                        <a href="stud_insert.php" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Add New Student</a>
                    </div>
                    <?php
                    // Include config file
                    require_once "includes/connection.php";
                    
                    // Attempt select query execution
                    $sql = "SELECT * FROM students_tbl";
                    if($result = $mysqli->query($sql)){
                        if($result->num_rows > 0){
                            $i=1;
                            ?>
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>E-mail</th>
                                        <th>Mobile</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                while($row = $result->fetch_array()){
                                ?>
                                    <tr>
                                        <td> <?php echo $i++;?> </td>
                                        <td> <?php echo $row['name']; ?> </td>
                                        <td> <?php echo $row['email'];?> </td>
                                        <td> <?php echo $row['mobile'];?> </td>
                                        <td>
                                            <a href="stud_update.php?id=<?php echo  $row['id'];?>" class="mr-3" title="Update Record" data-toggle="tooltip"><span class="fa fa-pencil"></span></a>
                                            <a href="stud_delete.php?id=<?php echo  $row['id'];?>" title="Delete Record" data-toggle="tooltip"><span class="fa fa-trash"></span></a>
                                        </td>
                                    </tr>
                                <?php } ?>
                                </tbody>                            
                            </table>
                            <?php
                            // Free result set
                            $result->free();
                        } else{
                            echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                        }
                    } else{
                        echo "Oops! Something went wrong. Please try again later.";
                    }
                    
                    // Close connection
                    $mysqli->close();
                    ?>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>