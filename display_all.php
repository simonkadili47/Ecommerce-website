<?php
include('./include/connect.php');
include('functions/common_function.php');
session_start();


?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-commerce website</title>
    <!--- bootstrap CSS link --->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!--- font awesome link --->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!--css file --->
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!--- navbar --->
    <div class="container-fluid p-0">
        <!-- first child --->
        <nav class="navbar navbar-expand-lg navbar-light bg-primary">
  <div class="container-fluid">
    <img src="logo.png" class="logo">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="display_all.php">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./users_area/user_registration.php">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="cart.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i><sup><?php cart_item(); ?></sup></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Total Price: <?php total_cart_price(); ?>/=</a>
        </li>
       
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-light" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
<!-- second child -->
<nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
    <ul class="navbar-nav me-auto">
    <li class="nav-item">
          <!-- <a class="nav-link" href="#">Welcome Guest</a>
        </li> -->
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
          <a class='nav-link' href='./users_area/user_login.php'>Login</a>
        </li>";
        }else{
          echo  "<li class='nav-item'>
          <a class='nav-link' href='./users_area/Logout.php'>Logout</a>
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

<!--- fourth child --->
<div class="row px-1">
    <div class="col-md-10">
    <!--- products --->
    <div class="row">
      <!-- fetching product-->
    <?php
    // calling function
    get_all_product();
    get_unique_categories();
    get_unique_brands()
//$select_query="SELECT * FROM `products` order by rand() LIMIT 0,9";
//$result_query=mysqli_query($con,$select_query);
//$row=mysqli_fetch_assoc($result_query);
//echo $row['product_title'];
//while($row=mysqli_fetch_assoc($result_query)){
  //$product_id=$row['product_id'];
  //$product_title=$row['product_title'];
  //$product_description=$row['product_description'];
  //$product_image1=$row['product_image1'];
  //$product_price=$row['product_price'];
  //$category_id=$row['category_id'];
  //$brand_id=$row['brand_id'];
  //echo "<div class='col-md-4 mb-2'>
  //<div class='card'>
  //<img src='./admin_area/product images/$product_image1' class='card-img-top' alt=''>
  //<div class='card-body'>
    //<h5 class='card-title'>$product_title</h5>
    //<p class='card-text'>$product_description</p>
    //<a href='#' class='btn btn-info'>Add to cart</a>
    //<a href='#' class='btn btn-secondary'>View more</a>
  //</div>
//</div>
//</div>";
//}




?>
       <!-- <div class="col-md-4 mb-2">
        <div class="card">
  <img src="capsicum.jpg" class="card-img-top" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-info">Add to cart</a>
    <a href="#" class="btn btn-secondary">View more</a>
  </div>
</div>
  </div> --->
  <!-- row end-->
    </div>
    <!-- col end-->
    </div>
  
    <div class="col-md-2 bg-secondary p-0">
      <!--- brand to be displayed ---->
      <ul class="navbar-nav me auto text-center">
        <li class="nav-item bg-info">
          <a href="#" class="nav-link text-light"><h4>Delivery Brands</h4></a>
        </li>
        <?php
        getbrands();
        //$select_brands="SELECT * FROM `brands`";
        //$result_brands=mysqli_query($con,$select_brands);
        //**$row_data=mysqli_fetch_assoc($result_brands);
        //**echo $row_data['brand_title'];
        //while( $row_data=mysqli_fetch_assoc($result_brands)){
          //$brand_title=$row_data['brand_title'];
          //$brand_id=$row_data['brand_id'];
          //echo "<li class='nav-item'>
          //<a href='index.php?brand=$brand_id' class='nav-link text-light'>$brand_title</a>
        //</li>";
        //}
        
        
        
        
        
        ?>
        <!---
        <li class="nav-item">
          <a href="#" class="nav-link text-light">Brand1</a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link text-light">Brand2</a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link text-light">Brand3</a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link text-light">Brand4</a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link text-light">Brand5</a>
        </li>--->
      </ul>



        <!--- categories to be displayed--->
        <ul class="navbar-nav me auto text-center">
        <li class="nav-item bg-info">
          <a href="#" class="nav-link text-light"><h4>Categories</h4></a>
        </li>
        <?php
        getcategories();
        //$select_categories="SELECT * FROM `categories`";
        //$result_categories=mysqli_query($con,$select_categories);
        //*$row_data=mysqli_fetch_assoc($result_categories);
        //*echo $row_data['category_title'];
        //while( $row_data=mysqli_fetch_assoc($result_categories)){
          //$category_title=$row_data['category_title'];
          //$category_id=$row_data['category_id'];
          //echo "<li class='nav-item'>
          //<a href='index.php?category=$category_id' class='nav-link text-light'>$category_title</a>
        //</li>";
        //}
        
        
        
        
        
        ?>


        <!--
        <li class="nav-item">
          <a href="#" class="nav-link text-light">Categories1</a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link text-light">Categories2</a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link text-light">Categories3</a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link text-light">Categories4</a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link text-light">Categories5</a>
        </li>--->
      </ul>
    </div>
</div>









<!---last child --->
<!-- include footer -->
<?php include("./include/footer.php"); ?>
</div>

 







<!--- bootstrap js link -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>



</body>
</html>