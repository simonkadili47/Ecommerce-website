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
    <title>Document</title>
        <!--- bootstrap CSS link --->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<style>
    img{
        width: 80%;
        margin: auto;
        display: block;
    }
</style>
<body>
    <!-- php ciode -->
    <?php
    $user_ip=getIPAddress();
    $get_user="SELECT * FROM `user_table` WHERE user_ip='$user_ip'";
    $result=mysqli_query($con,$get_user);
    $run_query=mysqli_fetch_array($result);
    $user_id=$run_query['user_id'];  


?>
    <div class="container">
        <h2 class="text-center text-info">Payment Options</h2>
        <div class="row d-flex justify-content-center align-items-center my-5">
            <div class="col-md-6">
            <a href="https://www.paypal.com"><img src="../upi.jpg" alt=""></a>
            </div>
            <div class="col-md-6">
            <a href="orders.php?user_id=<?php echo $user_id  ?>"><h2 class="text-center">Pay offline</h2></a>
            </div>
            
        </div>
        
    </div>
</body>
</html>