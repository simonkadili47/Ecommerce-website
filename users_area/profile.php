<?php
include('../include/connect.php');
include('../functions/common_function.php');
session_start();


?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome <?php echo $_SESSION['username']?></title>
    <!--- bootstrap CSS link --->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!--- font awesome link --->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!--css file --->
    <link rel="stylesheet" href="../style.css">
    <style>
        body{
            overflow-x:hidden;
        }
        .profile_image{
    width: 80%;
    margin: auto;
    display:block;
    height: 100%;
    /*height:100% */
    object-fit:contain;
    
}
.edit_image{
  width: 100px;
  height: 100px;
  object-fit:contain;
}
    </style>
</head>
<body>
    <!--- navbar --->
    <div class="container-fluid p-0">
        <!-- first child --->
        <nav class="navbar navbar-expand-lg navbar-light bg-primary">
  <div class="container-fluid">
    <img src="/E-Commerce system/logo.png" class="logo">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../display_all.php">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="profile.php">My account</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../cart.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i><sup><?php cart_item(); ?></sup></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Total Price: <?php total_cart_price(); ?>/=</a>
        </li>
       
      </ul>
      <form class="d-flex"action="../search_product.php" method="get">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
        <!--<button class="btn btn-outline-light" type="submit">Search</button> -->
        <input type="submit" value="search" class="btn btn-outline-light" name="search_data_product">
      </form>
    </div>
  </div>
</nav>
<!-- calling cart function -->
<?php
cart();
?>
<!-- second child -->
<nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
    <ul class="navbar-nav me-auto">
    <li class="nav-item">
          <!--<a class="nav-link" href="#">Welcome Guest</a>
        </li> p-->
        <?php
        if(!isset($_SESSION['username'])){
          echo  "<li class='nav-item'>
          <a class='nav-link' href='#'>Welcome Guest</a>
          </li>";
         }else{
           echo  "<li class='nav-item'>
           <a class='nav-link' href='#'>Welcome ".$_SESSION['username']."</a>
         </li>";
         }
        if(!isset($_SESSION['username'])){
         echo  "<li class='nav-item'>
          <a class='nav-link' href='user_login.php'>Login</a>
        </li>";
        }else{
          echo  "<li class='nav-item'>
          <a class='nav-link' href='Logout.php'>Logout</a>
        </li>";
        }

        ?>
    </ul>
</nav>

<!-- third child -->
<div class="bg-light">
    <h3 class="text-center">Hidden Store</h3>
    <p class="text-center">Communication is the heart of e-commerce community</p>
</div>


<!-- fourt child -->
<div class="row">
    <div class="col-md-2 p-0">
    <ul class="navbar-nav bg-secondary text-center" style="height:100vh">
    <li class="nav-item bg-primary">
          <a class="nav-link text-light" href="#"><h4>Your profile</h4></a>
        </li>
        <?php
        $username= $_SESSION['username'];
        $user_image="SELECT * FROM `user_table` WHERE username='$username'";
        $user_image=mysqli_query($con,$user_image);
        $row_image=mysqli_fetch_array($user_image);
        $user_image=$row_image['user_image'];
        echo "<li class='nav-item'>
        <IMG SRC='./user_images/$user_image' class='profile_image my-4' alt=''  class='nav_image'>
        </li>";

        ?>
       <!-- <li class="nav-item">
        <IMG SRC="/E-Commerce system/teacher3.jpg" class="profile_image my-4" alt=""  class="nav_image">
        </li> -->
        <li class="nav-item">
          <a class="nav-link text-light" href="profile.php">Pending orders</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="profile.php?edit_account">Edit account</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="profile.php?my_orders">My Orders</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="profile.php?delete_account">Delete Account</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="logout.php">Logout</a>
        </li>
    </ul>

    </div>
    <div class="col-md-10">
      <?php get_user_order_details();
      if(isset($_GET['edit_account'])){
        include('edit_account.php'); 
      }
      if(isset($_GET['my_orders'])){
        include('user_orders.php'); 
      }
      if(isset($_GET['delete_account'])){
        include('delete_account.php'); 
      }
       ?>
    </div>
</div>





<!---last child --->
<!-- include footer -->
<?php include("../include/footer.php"); ?>
<!--<div class="bg-info p-3 text-center">
    <p>All right reserved @ Designed by SK-2023</p>

</div> -->
</div>

 







<!--- bootstrap js link -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>



</body>
</html>
