<?php
include('../include/connect.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!--- bootstrap CSS link --->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
   
    <!--- font awesome link --->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <!--css file --->
    <link rel="stylesheet" href="style.css">
    <style>
        .nav_image{
            width: 100px;
    object-fit: contain;
        }
    .admin_image{
    width: 100px;
    object-fit: contain;
}
.footer{
    position: absolute;
    bottom: 0;
}
.product_img{
    width: 100px;
    object-fit:contain;
}

    </style>
</head>
<body>
    <!--- navbar --->
   <div class="container-fluid p-0">
     <!-- first child --->
     <nav class="navbar navbar-expand-lg navbar-light bg-info">
        <div class="container-fluid">
            <IMG SRC="/E-Commerce system/logo.png" alt=""  class="nav_image">
            <nav class="navbar navbar-expand-lg">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <!--<a href="" class="nav-link" > Welcome guest</a>
                    </li> -->
                    <?php
        if(!isset($_SESSION['username'])){
          echo  "<li class='nav-item'>
          <a  href='#'class='nav-link' >Welcome Guest</a>
          </li>";
         }else{
           echo  "<li class='nav-item'>
           <a href='#' class='nav-link'>Welcome ".$_SESSION['username']."</a>
         </li>";
         }
        if(!isset($_SESSION['username'])){
         echo  "<li class='nav-item'>
          <a class='nav-link' href='admin_login.php'>Login</a>
        </li>";
        }else{
          echo  "<li class='nav-item'>
          <a class='nav-link' href='admin_logout.php'>Logout</a>
        </li>";
        }

        ?>
                   
                </ul>
            </nav>
            
        </div>
     </nav>
      <!-- second child --->
      <div class="bg-light">
                <h3 class="text-center p-2">Manage Details</h3>
             </div>

              <!-- second child --->
              <div class="row">
                <div class="col-md-12 bg-secondary p-1 d-flex align-item-center">
                    <div class="p-3">
                        <a href="#"><IMG SRC="/E-Commerce system/logo.png" alt="" class="admin_image"></a>
                        <p class="text-light text-center">Admin Name</p>
                    </div>
                     <!-- button*10>a.nav-link.text-light.bg-info.my-1  --->
                    <div class="button text-center mt-3 mx-auto">
                        <button class="my-3"><a href="insert product.php" class="nav-link text-light bg-info my-1">Insert Products</a></button>       
                        <button><a href="index.php?view_product" class="nav-link text-light bg-info my-1">View Products</a></button>
                        <button><a href="index.php?insert_category" class="nav-link text-light bg-info my-1">Insert categories</a></button>
                        <button><a href="index.php?view_categories" class="nav-link text-light bg-info my-1">View Categories</a></button>
                        <button><a href="index.php?insert_brand" class="nav-link text-light bg-info my-1">Insert brand</a></button>
                        <button><a href="index.php?view_brands" class="nav-link text-light bg-info my-1">View Brands</a></button>
                        <button><a href="index.php?list_orders" class="nav-link text-light bg-info my-1">All Orders</a></button><br>
                        <button><a href="index.php?list_payments" class="nav-link text-light bg-info my-1">All Payments</a></button>
                        <button><a href="index.php?list_users" class="nav-link text-light bg-info my-1">List Users</a></button>
                        <!--<button><a href="index.php" class="nav-link text-light bg-info my-1">Logout</a></button> -->
                    </div>
                </div>
              </div> 



              <!---fourth child --->
              <div class="container my-3">
                <?php
                if(isset($_GET['insert_category'])){
                    include('insert categories.php');
                }
                if(isset($_GET['insert_brand'])){
                    include('insert brands.php');
                }
                if(isset($_GET['view_product'])){
                    include('view_product.php');
                }
                if(isset($_GET['edit_product'])){
                    include('edit_product.php');
                }
                if(isset($_GET['delete_product'])){
                    include('delete_product.php');
                }
                if(isset($_GET['view_categories'])){
                    include('view_categories.php');
                }
                if(isset($_GET['view_brands'])){
                    include('view_brands.php');
                }
                if(isset($_GET['edit_category'])){
                    include('edit_category.php');
                }
                if(isset($_GET['edit_brands'])){
                    include('edit_brands.php');
                }
                if(isset($_GET['delete_category'])){
                    include('delete_category.php');
                }
                if(isset($_GET['delete_brands'])){
                    include('delete_brands.php');
                }
                if(isset($_GET['list_orders'])){
                    include('list_orders.php');
                }
                if(isset($_GET['delete_orders'])){
                    include('delete_orders.php');
                }
                if(isset($_GET['list_payments'])){
                    include('list_payments.php');
                }
                if(isset($_GET['list_users'])){
                    include('list_users.php');
                }
                ?>
              </div>
              


              <!---last child --->
<!--<div class="bg-info p-3 text-center footer">
    <p>All right reserved @ Designed by SK-2023</p> -->
    <?php include("../include/footer.php"); ?>

</div> 
   </div>











<!--- bootstrap js link -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    
</body>
</html>