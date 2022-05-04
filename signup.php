<?php

include("connect.php");
if(isset($_POST['register'])){
    $username=$_POST['username'];
    $password=$_POST['password'];
    $password_hash=password_hash($password,PASSWORD_DEFAULT);
    $confirm_password=$_POST['confirm_password'];
    // exist query
    $select_data="Select * from `users` where username='$username'";
    $result=mysqli_query($con,$select_data);
    $num_rows=mysqli_num_rows($result);
    if($username=="" or $password=="" or $confirm_password==""){
        echo "<script>alert('Please fill all the fields')</script>";
        echo "<script>window.open('signup.php','_self')</script>";
        exit();
    }
    if($num_rows>0){
        echo "<script>alert('Username already exist')</script>";
    }
    // insert operation
    // password and cofirm password condition
    else if($password!=$confirm_password){
        echo "<script>alert('Passwords do not match')</script>";
    }else{
        $insert_query="insert into `users` (username,password) values ('$username','$password_hash')";
        $result=mysqli_query($con,$insert_query);
        if($result){
            echo "<script>alert('You have registered successfully')</script>";
            echo "<script>window.open('login.php','_self')</script>";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- stylesheet -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container d-flex align-items-center justify-content-center">
        <div class="card">
            <!-- card header -->
            <div class="card-header">
                <h3 class="text-center">Registration Form</h3>
            </div>
            <!-- card body -->
            <div class="card-body">
                <form action="" method="post">
                    <!-- first field -->
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-user"></i></span>
                        <input type="text" class="form-control" placeholder="Enter your username" required="required"autocomplete="off" name="username" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                    <!-- second field -->
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-key"></i></span>
                        <input type="password" class="form-control" placeholder="Enter your password" required="required" autocomplete="off" name="password" aria-label="password" aria-describedby="basic-addon1">
                    </div>
                    <!-- third field -->
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-lock"></i></span>
                        <input type="password" class="form-control" placeholder="Confirm password" required="required" autocomplete="off" name="confirm_password" aria-label="confirm_password" aria-describedby="basic-addon1">
                    </div>
                    <!-- signup button -->
                    <div class="form-group">
                        <input type="submit" name="register" value="Sign Up" class="d-grid gap-2 col-4 mx-auto btn btn-outline-dark">
                    </div>
                </form>
            </div>
            <!-- card footer -->
            <div class="card-footer text-center text-dark">
                Already have an account? <a href="login.php">Log In Here</a>
            </div>
        </div>
    </div>
</body>
</html>