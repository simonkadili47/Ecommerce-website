<?php
include('../include/connect.php');
if(isset($_POST['insert_cart'])){
  $category_title=$_POST['cart_title'];

  //select data from database
  $query="SELECT * FROM `categories` WHERE category_title='$category_title'";
  $result=mysqli_query($con,$query);
  $number=mysqli_num_rows($result);
  if($number>0){
    echo "<script>alert('This category is present in the database')</script>";
  }else{

  $insert_query = "INSERT INTO categories (category_title) VALUES ('$category_title')";
  $result=mysqli_query($con,$insert_query);
  if($result){
    echo "<script>alert('category has been inserted successfully')</script>";
  }
}}


?>


<h2 class="text-center">Insert Cartegories</h2>
<form action="" method="POST" class="mb-2">
<div class="input-group w-90 mb-2">
    <span class="input-group-text bg-info" id="basic-addon1"><i 
    class="fa-solid fa-receipt"></i></span>
  <input type="text" class="form-control" name="cart_title" 
  placeholder="Insert categories" aria-label="Categories" aria-describedby="basic-addon1">
</div>
<div class="input-group w-10 mb-2 m-auto">
  <input type="submit" class="bg-info border-0 p-2 my-3" name="insert_cart" value="Insert categories">
 
</div>
</form>