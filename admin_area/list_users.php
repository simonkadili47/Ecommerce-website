<h3 class="text-center text-success">All Users</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-info">
        <?php
        $get_user="SELECT * FROM `user_table`";
        $result=mysqli_query($con,$get_user);
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
        echo"<h2 class='text-danger text-center mt-5'>No Users yet</h2>";
    }else{
      echo"<th>S/no</th>
      <th>Username</th>
      <th>User email</th>
      <th>User image</th>
      <th>User address</th>
      <th>User mobile</th>
      <th>Delete</th>
  </tr>
  </thead>
  <tbody class='bg-secondary text-light'>";
        $number=0;
        while($row_data=mysqli_fetch_assoc($result)){
            $user_id=$row_data['user_id'];
            $username=$row_data['username'];
            $user_email=$row_data['user_email'];
            $user_image=$row_data['user_image'];
            $user_address=$row_data['user_address'];
            $user_mobile=$row_data['user_mobile'];
            $number++;
            echo "<tr>
            <td>$number</td>
            <td>$username</td>
            <td>$user_email</td>
            <td><IMG SRC='../users_area/user_images/$user_image' alt='$username' class='product_img'></td>
            <td>$user_address</td>
            <td>$user_mobile</td>
            <td><a href='index.php?list_users=<?php echo $user_id?>'type='button'class='text-light'
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
        <a href="./index.php?list_users" class='text-light text-decoration-none'></a>No</button>
        <button type="button" class="btn btn-primary"><a href='index.php?list_users=<?php echo $user_id?>'
        class=" text-light text-decoration-none">Yes</a></button>
      </div>
    </div>
  </div>
</div>