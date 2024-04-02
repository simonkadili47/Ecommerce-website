<!--- fourth child --->
<!--* <div class="row px-1">
    <div class="col-md-10">* -->
    <!--- products --->
   <!-- <div class="row"> *-->
      <!-- fetching product-->
    <!--<?php
    // calling function
    getproducts();
    get_unique_categories();
    get_unique_brands();
    //$ip = getIPAddress();  
    //echo 'User Real IP Address - '.$ip; 
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
      <!--</ul>
    </div>
</div> -->
