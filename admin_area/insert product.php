<?php
include('../include/connect.php');
if(isset($_POST['insert_product'])){

    $product_title=$_POST['product_title'];
    $product_description=$_POST['product_description'];
    $product_keywords=$_POST['product_keywords'];
    $product_category=$_POST['product_category'];
    $product_brands=$_POST['product_brands'];
    $product_price=$_POST['product_price'];
    $product_status='true';

    // accessing images
    $product_image1=$_FILES['product_image1']['name'];
    $product_image2=$_FILES['product_image2']['name'];
    $product_image3=$_FILES['product_image3']['name'];

    // acessing image temp name
    $temp_image1=$_FILES['product_image1']['tmp_name'];
    $temp_image2=$_FILES['product_image1']['tmp_name'];
    $temp_image3=$_FILES['product_image1']['tmp_name'];

    // checking empty condition
    if($product_title=='' or $product_description=='' or $product_keywords=='' or $product_category=='' 
    or $product_brands=='' or $product_price=='' or $product_image1=='' or $product_image2==''
    or $product_image3=='' ){
        echo "<script>alert('Please fill all the available field')</script>";
        exit();
    }else{
        move_uploaded_file($temp_image1,"./product images/$product_image1");
        move_uploaded_file($temp_image2,"./product images/$product_image2");
        move_uploaded_file($temp_image3,"./product images/$product_image3");
        // insert query

        $insert_products="INSERT INTO `products` (product_title,product_description,product_keywords,category_id,
        brand_id,product_image1,product_image2,product_image3,product_price,date,status) VALUES ('$product_title',
        '$product_description','$product_keywords','$product_category',' $product_brands','$product_image1',
        '$product_image2','$product_image3','$product_price',NOW(),'$product_status')";
        $result_query=mysqli_query($con,$insert_products);
        if($result_query){
            echo "<script>alert('Successsfully inserted the products')</script>";
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
    <title>Insert Products</title>
    <!--- bootstrap CSS link --->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!--- font awesome link --->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!--css file --->
    <link rel="stylesheet" href="style.css">
</head>
<body class="bg-light">
    <div class="container mt-3">
        <h1 class="text-center">Insert Products</h1>
        <!--- form--->
        <form action="" method="POST" enctype="multipart/form-data">
            <!-- title-->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_title" class="form-label">Product title</label>
                <input type="text" name="product_title" id="product_title" class="form-control" placeholder="Enter product title" autocomplete="off" required="required">
            </div>
            <!----description --->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_description" class="form-label">Product description</label>
                <input type="text" name="product_description" id="product_description" class="form-control" placeholder="Enter product description" autocomplete="off" required="required">
            </div>
             <!----keyword --->
             <div class="form-outline mb-4 w-50 m-auto">
                <label for="Product keywords" class="form-label">Product keywords</label>
                <input type="text" name="product_keywords" id="product_keywords" class="form-control" placeholder="Enter product keywords" autocomplete="off" required="required">
            </div>
            <!----categories --->
            <div class="form-outline mb-4 w-50 m-auto">
                <select name="product_category" id="" class="form-select">
                    <option value="">Select a category</option>
                    
                    <?php
                    $select_query = "SELECT * FROM `categories`";
                    $result_query = mysqli_query($con, $select_query);
                    if (!$result_query){
                        die("Query failed: " . mysqli_error($con));
                    }
                    while ($row = mysqli_fetch_assoc($result_query)) {
                        $category_title=$row['category_title'];
                        $category_id=$row['category_id'];
                        echo "<option value='$category_id'>$category_title</option>";
                    }
                    ?>


                    <!--
                    <option value="">Category1</option>
                    <option value="">Category2</option>
                    <option value="">Category3</option> -->
                </select>
            </div>
              <!----Brands --->
              <div class="form-outline mb-4 w-50 m-auto">
                <select name="product_brands" id="" class="form-select">
                 <option value="">Select a Brand</option>
            <?php
            $select_query = "SELECT * FROM `brands`";
            $result_query = mysqli_query($con, $select_query);
            if (!$result_query) {
                die("Query failed: " . mysqli_error($con));
            }
            while ($row = mysqli_fetch_assoc($result_query)) {
                $brand_title = $row['brand_title'];
                $brand_id = $row['brand_id'];
                echo "<option value='$brand_id'>$brand_title</option>";
            }
            
            ?>

            <!--
                <option value="">Brands1</option>
                <option value="">Brands2</option>
                <option value="">Brands3</option> -->

    </select>
</div>
              <!----image1 --->
              <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image1" class="form-label">Product Image1</label>
                <input type="file" name="product_image1" id="product_image1" class="form-control" required="required">
            </div>
              <!----image2 --->
              <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image2" class="form-label">Product Image2</label>
                <input type="file" name="product_image2" id="product_image2" class="form-control" required="required">
            </div>
              <!----image3 --->
              <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image3" class="form-label">Product Image3</label>
                <input type="file" name="product_image3" id="product_image3" class="form-control" required="required">
            </div>
             <!----price --->
             <div class="form-outline mb-4 w-50 m-auto">
                <label for="Product price" class="form-label">Product price</label>
                <input type="text" name="product_price" id="product_price" class="form-control" placeholder="Enter product price" autocomplete="off" required="required">
            </div>
             <!----price --->
             <div class="form-outline mb-4 w-50 m-auto">
              <input type="submit" name="insert_product" class="btn btn-primary mb-3 px-3" value="Insert Products">
            </div>
        </form>
    </div>
    
</body>
</html>