<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $username=$_SESSION['username'];
    $get_user="SELECT * FROM `user_table` WHERE username='$username'";
    $result=mysqli_query($con,$get_user);
    $row_fetch=mysqli_fetch_assoc($result);
    $user_id=$row_fetch['user_id'];
    //echo $user_id;




?>
<h3 class="text-center">All my Orders</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-warning">
    <tr>
        <th>SI no</th>
        <th>Amount Due</th>
        <th>Total product</th>
        <th>Invoice number</th>
        <th>Date</th>
        <th>Complete/Incomplete</th>
        <th>Status</th>
    </tr>
    </thead>
    <tbody class="bg-secondary text-light">
        <?php
        $get_order_details="SELECT * FROM `user_orders` WHERE user_id=$user_id ";
        $result_orders=mysqli_query($con,$get_order_details);
        $number=1;
        while($row_orders=mysqli_fetch_assoc($result_orders)){
            $order_id=$row_orders['order_id'];
            $amout_due=$row_orders['amount_due'];
            $total_product=$row_orders['total_product'];
            $invoice_number=$row_orders['invoice_number'];
            $order_date=$row_orders['order_date'];
            $order_status=$row_orders['order_status'];
            if($order_status=='pending'){
                $order_status='Incomplete';
            }else{
                $order_status='Complete';
            }
          
           echo " <tr>
           <td>$number</td>
           <td>$amout_due</td>
           <td>$total_product</td>
           <td>$invoice_number</td>
           <td>$order_date</td>
           <td>$order_status</td>";
           ?>
           <?php
           if($order_status=='Complete'){
            echo "<td>Paid</td>";
           }else{
           echo "<td> <a href='confirm_payment.php?order_id=$order_id' class='text-light'>Confirm</a></td>
           </tr>";
        }
           $number++;
        }
        ?>
       <!-- <tr>
        <td>1</td>
        <td>5000</td>
        <td>1</td>
        <td>123434</td>
        <td>07082023</td>
        <td>complete</td>
        <td>confirm</td>
        </tr> -->
    </tbody>
</table>    
</body>
</html>

