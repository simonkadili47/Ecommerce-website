<?php
include('../include/connect.php');
if(isset($_POST['insert_brand'])){
  $brand_title=$_POST['brand_title'];

  //select data from database
  $query="SELECT * FROM `brands` WHERE brand_title='$brand_title'";
  $result=mysqli_query($con,$query);
  $number=mysqli_num_rows($result);
  if($number>0){
    echo "<script>alert('This Brand is present in the database')</script>";
  }else{

  $insert_query = "INSERT INTO brands (brand_title) VALUES ('$brand_title')";
  $result=mysqli_query($con,$insert_query);
  if($result){
    echo "<script>alert('Brand has been inserted successfully')</script>";
  }
}}


?>





<h2 class="text-center">Insert Brands</h2>
<form action="" method="POST" class="mb-2">
<div class="input-group w-90 mb-2">
    <span class="input-group-text bg-info" id="basic-addon1"><i 
    class="fa-solid fa-receipt"></i></span>
  <input type="text" class="form-control" name="brand_title" 
  placeholder="Insert Brands" aria-label="brands" aria-describedby="basic-addon1">
</div>
<div class="input-group w-10 mb-2 m-auto">
  <input type="submit" class="bg-info border-0 p-2 my-3" name="insert_brand" 
  value="Insert Brands">

</div>
</form>