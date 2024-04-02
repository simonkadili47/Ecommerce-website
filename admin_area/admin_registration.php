<?php


include('../include/connect.php');
include('../functions/common_function.php');



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration</title>
     <!--- bootstrap CSS link --->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
   
    <!--- font awesome link --->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="container-fluid m-3">
    <h2 class="text-center mb-5">Admin Registration</h2>
    <div class="row d-flex justify-content-center">
        <div class="col-lg-6 col-xl-5">
            <IMG SRC="/E-Commerce system/teacher3.jpg" alt="Admin Registration" class="img-fluid">
        </div>
        <div class="col-lg-6 col-xl-4 bg-secondary text-light">
        <form action="" method="POST">
                    <div class="form-outline mb-4">
                        <!-- username field -->
                        <label for="username" class="form-label">Username</label>
                        <input type="text" id="username" class="form-control" 
                        placeholder="Enter your username" required="required" name="username"/>
                    </div>
                     <!-- email field -->
                     <div class="form-outline mb-4">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" id="email" class="form-control" 
                        placeholder="Enter your email" required="required" name="email"/>
                    </div>
                     <!-- password field -->
                     <div class="form-outline mb-4">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" id="password" class="form-control" 
                        placeholder="Enter your password" required="required" name="password"/>
                    </div>
                     <!-- confirm password field -->
                     <div class="form-outline mb-4">
                        <label for="confirm_password" class="form-label">Confirm password</label>
                        <input type="password" id="confirm_password" class="form-control" 
                        placeholder="Confirm password" required="required" name="confirm_password"/>
                    </div>
                    <div>
                        <input type="submit" class="bg-info py-2 px-3 border-0" name="admin_registration" value="Register">
                        <p class="small fw-bold  mt-2 pt-1 mb -0">Do you already have an account?
                            <a href="admin_login.php" class="link-danger"> Login</a></p>
                    </div>
        </div>
    </div>
    </div>
</body>
</html>

<?php
if(isset($_POST['admin_registration'])){
    $username=$_POST['username'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $hash_password=password_hash($password,PASSWORD_DEFAULT);
    $confirm_password=$_POST['confirm_password'];

    //select query
    $select_query="SELECT * FROM `admin_table` WHERE admin_name='$username' OR admin_email='$email'";
    $result=mysqli_query($con,$select_query);
    $rows_count=mysqli_num_rows($result);
    if($rows_count>0){
        echo "<script>alert('username and email already exist!')</script>";
    }else if($password!=$confirm_password){
        echo "<script>alert('Password do not match try again!')</script>";
    }

      else{
         // insert_query
         $insert_query="INSERT INTO `admin_table` (admin_name,admin_email,admin_password) VALUES ('$username','$email','$hash_password')";
         $sql_excute=mysqli_query($con,$insert_query);
    }
}
?>