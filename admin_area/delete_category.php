<?php
if(isset($_GET['delete_category'])){
    $delete_category=$_GET['delete_category'];
    //echo $delete_id;
    // delete query

    $delete_query="DELETE FROM `categories` WHERE category_id=$delete_category";
    $result_category=mysqli_query($con,$delete_query);
    if($result_category){
        echo "<script>alert('Category deleted successfully')</script>";
        echo "<script>window.open('./index.php','_self')</script>";
    }
}




?>