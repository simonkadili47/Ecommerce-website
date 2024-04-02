<?php
if(isset($_GET['delete_orders'])){
    $delete_orders=$_GET['delete_orders'];
    //echo $delete_brands;
    // delete query

    $delete_query="DELETE FROM `user_orders` WHERE order_id='$delete_orders'";
    $result_orders=mysqli_query($con,$delete_query);
    if($result_orders){
        echo "<script>alert('Orders deleted successfully')</script>";
        echo "<script>window.open('./index.php','_self')</script>";
    }
}




?>