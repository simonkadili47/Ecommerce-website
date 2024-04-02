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
    <title>User Registration</title>
    <!--- bootstrap CSS link --->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container-fluid my-3">
        <h2 class="text-center">New User Registration</h2>
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-outline mb-4">
                        <!-- username field -->
                        <label for="user_username" class="form-label">Username</label>
                        <input type="text" id="user_username" class="form-control" 
                        placeholder="Enter your username" autocomplete="off" required="required" name="user_username"/>
                    </div>

                         <!-- email field -->
                    <div class="form-outline mb-4">
                        <label for="user_email" class="form-label">Email</label>
                        <input type="email" id="user_email" class="form-control" 
                        placeholder="Enter your email" autocomplete="off" required="required" name="user_email"/>
                    </div>

                        <!-- image field -->
                        <div class="form-outline mb-4">
                        <label for="user_image" class="form-label">User Image</label>
                        <input type="file" id="user_image" class="form-control" 
                         required="required" name="user_image"/>
                    </div>

                        <!-- password field -->
                        <div class="form-outline mb-4">
                        <label for="user_password" class="form-label">Password</label>
                        <input type="password" id="user_password" class="form-control" 
                        placeholder="Enter your password" autocomplete="off" required="required" name="user_password"/>
                    </div>

                        <!-- confirm password field -->
                        <div class="form-outline mb-4">
                        <label for="confirm_user_password" class="form-label">Confirm password</label>
                        <input type="password" id="confirm_user_password" class="form-control" 
                        placeholder="Confirm password" autocomplete="off" required="required" name="confirm_password"/>
                    </div>

                         <!-- address field -->
                         <div class="form-outline mb-4">
                        <label for="user_address" class="form-label">Address</label>
                        <input type="text" id="user_address" class="form-control" 
                        placeholder="Enter your address" autocomplete="off" required="required" name="user_address"/>
                    </div>

                         <!-- contact field -->
                         <div class="form-outline mb-4">
                        <label for="user_contact" class="form-label">Contact</label>
                        <input type="text" id="user_contact" class="form-control" 
                        placeholder="Enter your contact" autocomplete="off" required="required" name="user_contact"/>
                    </div>
                    <div class=" mt-4 pt-2">
                        <input type="submit" class="bg-primary py-2 px-3 border-0" name="user_register" value="Register">
                        <p class="small fw-bold  mt-2 pt-1 mb -0">Already have an account?
                            <a href="user_login.php" class="text-danger"> Login</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
</body>
</html>

<!-- php code --->
<?php
if(isset($_POST['user_register'])){
    $user_username=$_POST['user_username'];
    $user_email=$_POST['user_email'];
    $user_password=$_POST['user_password'];
    $hash_password=password_hash($user_password,PASSWORD_DEFAULT);
    $confirm_password=$_POST['confirm_password'];
    $user_address=$_POST['user_address'];
    $user_contact=$_POST['user_contact'];
    $user_images=$_FILES['user_image']['name'];
    $user_images_tmp=$_FILES['user_image']['tmp_name'];
    $user_ip=getIPAddress();

    //select query
    $select_query="SELECT * FROM `user_table` WHERE username='$user_username' OR user_email=' $user_email'";
    $result=mysqli_query($con,$select_query);
    $rows_count=mysqli_num_rows($result);
    if($rows_count>0){
        echo "<script>alert('username and email already exist!')</script>";
    }else if($user_password!=$confirm_password){
        echo "<script>alert('Password do not match try again!')</script>";
    }

      else{
         // insert_query
         move_uploaded_file($user_images_tmp,"../users_area/user_images/$user_images");
         $insert_query="INSERT INTO `user_table` (username,user_email,user_password,user_image,user_ip,
         user_address,user_mobile) VALUES ('$user_username','$user_email','$hash_password','$user_images',
         '$user_ip','$user_address',' $user_contact')";
         $sql_excute=mysqli_query($con,$insert_query);
    }
 //selecting cart items
 $select_cart_items="SELECT * FROM `cart_details` WHERE ip_address= '$user_ip'";
 $result_cart=mysqli_query($con, $select_cart_items);
 $rows_count=mysqli_num_rows($result_cart);
 if($rows_count>0){
    $_SESSION['username']=$user_username;
    echo "<script>alert('You have items in your cart')</script>";
    echo "<script>window.open('checkout.php','_self')</script>";
 }else{
    echo "<script>window.open('../index.php','_self')</script>";
 }
}



?>            