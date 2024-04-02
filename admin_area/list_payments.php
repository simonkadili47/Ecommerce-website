<h3 class="text-center text-success">All Payments</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-info">
        <?php
        $get_payments="SELECT * FROM `user_payments`";
        $result=mysqli_query($con,$get_payments);
        $row_count=mysqli_num_rows($result);
        //echo"   <th>S/no</th>
        //<th>Due Amount</th>
       // <th>Invoice number</th>
        //<th>Total Product</th>
        //<th>Order date</th>
        //<th>Status</th>
        //<th>Delete</th>
    //</tr>
    //</thead>
    //<tbody class='bg-secondary text-light'>";
    if($row_count==0){
        echo"<h2 class='text-danger text-center mt-5'>No payments received yet</h2>";
    }else{
      echo"<th>S/no</th>
      <th>Invoice number</th>
      <th>Amount</th>
      <th>Payment Mode</th>
      <th>Order Date</th>
      <th>Delete</th>
  </tr>
  </thead>
  <tbody class='bg-secondary text-light'>";
        $number=0;
        while($row_data=mysqli_fetch_assoc($result)){
            $order_id=$row_data['order_id'];
            $payment_id=$row_data['payment_id'];
            $amount=$row_data['amount'];
            $invoice_number=$row_data['invoice_number'];
            $payment_mode=$row_data['payment_mode'];
            $date=$row_data['date'];
            $number++;
            echo "<tr>
            <td>$number</td>
            <td>$invoice_number</td>
            <td>$amount</td>
            <td>$payment_mode</td>
            <td>$date</td>
            <td><a href='index.php?list_payments=<?php echo $payment_id?>'type='button'class='text-light'
            data-toggle='modal' data-target='#exampleModal'><i class='fa-solid fa-trash'></i></a></td>
        </tr>";
        }
    }



        ?>
       <!-- <tr>
            <th>S/no</th>
            <th>Due Amount</th>
            <th>Invoice number</th>
            <th>Total Products</th>
            <th>Order date</th>
            <th>Status</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody class="bg-secondary text-light"> -->
          <!--<tr>
            <td>1</td>
            <td>2000</td>
            <td>123454</td>
            <td>2</td>
            <td>date</td>
            <td>status</td>
            <td>delete</td>
        </tr> -->
    </tbody>
</table>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <h4>Are you sure you want to delete this?</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">
        <a href="./index.php?list_payments" class='text-light text-decoration-none'></a>No</button>
        <button type="button" class="btn btn-primary"><a href='index.php?list_payments=<?php echo $payment_id?>'
        class=" text-light text-decoration-none">Yes</a></button>
      </div>
    </div>
  </div>
</div>