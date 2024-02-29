<?php include('partials/menu.php');?>

    <?php
        if(isset($_SESSION['update']))
        {
            echo $_SESSION['update'];
            unset($_SERVER['update']);
        } 
    ?>
    <br><br>

<div class="main-content">
    <div class="wrapper"></div>
        <h1>Manage-Order</h1>

                <table class="tbl-full">
                    <tr>
                        <th>S.N</th>
                        <th>food</th>
                        <th>price</th>
                        <th>quantity</th>
                        <th>total</th>
                        <th>order_date</th>
                        <th>status</th>
                        <th>cus_name</th>
                        <th>cus_contact</th>
                        <th>cus_email</th>
                        <th>cus_address</th>
                        <th>action</th>

                    </tr>
                    <?php
                        // get all the order from database
                        $sql ="SELECT * FROM table_order ORDER BY id";
                        //execute query
                        $res = mysqli_query($conn,$sql);
                        //count the rows
                        $count =mysqli_num_rows($res);

                        //count rows in serils
                        $sn=1;
                        
                        if($count>0)
                        {
                            while($row=mysqli_fetch_assoc($res))
                           {
                                //get all the orders details
                                $id = $row['id'];
                                $food = $row['food'];
                                $price = $row['price'];
                                $quantity =$row['quantity'];
                                $total =$row['total'];
                                $order_date =$row['order_date'];
                                $status = $row['status'];
                                $cus_name = $row['cus_name'];
                                $cus_contact =$row['cus_contact'];
                                $cus_email =$row['cus_email'];
                                $cus_address = $row['cus_address'];

                                ?>
                                <tr>
                        
                                        <td><?php echo $sn++; ?></td>
                                        <td><?php echo $food; ?></td>
                                        <td><?php echo $price; ?></td>
                                        <td><?php echo $quantity; ?></td>
                                        <td><?php echo $total; ?></td>
                                        <td><?php echo $order_date; ?></td>

                                        <td>
                                            <?php
                                                //order, on delivery delivered, cancelled
                                                
                                                if($status=="ordered")
                                                {
                                                    echo "<label>$status</label>";
                                                }
                                                elseif($status=="on Delivery")
                                                {
                                                    echo "<label style='color: blue;'>$status</label>";
                                                }
                                                elseif($status=="Delivered")
                                                {
                                                    echo "<label style='color: green;'>$status</label>";
                                                }
                                                elseif($status=="Cancelled")
                                                {
                                                    echo "<label style='color: red;'>$status</label>";
                                                }
                                             ?>
                                        </td>

                                        <td><?php echo $cus_name; ?></td>
                                        <td><?php echo $cus_contact; ?></td>
                                        <td><?php echo $cus_email; ?></td>
                                        <td><?php echo $cus_address; ?></td>
                                        <td>
                                            <a href="<?php echo SITEURL; ?>admin/update-order.php?id=<?php echo $id; ?>" class="btn-secondary">Update Admin</a>
                                        </td>
                                    </tr>


                                <?php
                           }
                        }
                        else
                        {
                            //order availble
                            echo "<tr><td colspan='12' class='error'>orders not avaliable</td><tr>";
                        }
                    ?>

                    
                </table>



    </div>
</div>


<?php include('partials/footer.php');?>