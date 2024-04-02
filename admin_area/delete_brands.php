<?php
if(isset($_GET['delete_brands'])){
    $delete_brands=$_GET['delete_brands'];
    //echo $delete_brands;
    // delete query

    $delete_query="DELETE FROM `brands` WHERE brand_id=$delete_brands";
    $result_brand=mysqli_query($con,$delete_query);
    if($result_brand){
        echo "<script>alert('Brand deleted successfully')</script>";
        echo "<script>window.open('./index.php','_self')</script>";
    }
}




?>