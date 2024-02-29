<?php include('partials/menu.php');?>


    <div class="main-content">
        <div class="wrapper">
            <h1>Upate Order</h1>
            <br><br>
        
            <?php
                //check whether id is set or not
                if(isset($_GET['id']))
                {
                    //Get the order datails
                    $id=$_GET['id'];

                    //sql query to get the order datails base on id
                    $sql ="SELECT * FROM table_order WHERE id=$id";
                    //execute
                    $res = mysqli_query($conn,$sql);
                    //count rows
                    $count = mysqli_num_rows($res);

                    if($count==1)
                    {
                        //datails not avaliable
                        $row= mysqli_fetch_assoc($res);

                        $food = $row['food'];
                        $price = $row['price'];
                        $quantity = $row['quantity'];
                        $status = $row['status'];
                        $cus_name =$row['cus_name'];
                        $cus_contact = $row['cus_contact'];
                        $cus_email =$row['cus_email'];
                        $cus_address =$row['cus_address'];

                    }
                    else
                    {
                        //redirect to manage order page
                        header('location:'.SITEURL.'admin/manage-order.php');
                    }
                } 
                else
                {
                    //redirect to manager order page
                    header('location:'.SITEURL.'admin/manage-order.php');
                }
            ?>
            <form action="" method="POST">

                <table class="tbl-30" >
                    <tr>
                        <td>Food name </td>
                        <td><b>  <?php echo $food; ?> </b></td>
                    </tr>

                    <tr>
                        <td>Price </td>
                        <td>
                            <b><?php echo $price; ?></b>
                        </td>
                    </tr>

                    <tr>
                        <td>Quantity</td>
                        <td>
                            <input type="number" name="quantity"  value="<?php echo $quantity; ?>">
                        </td>
                    </tr>

                    <tr>
                        <td>Status</td>
                        <td>
                            <select name="status">
                                <option  <?php if($status=="ordered"){echo "selected";} ?> value="ordered">ordered</option>
                                <option <?php if($status=="on Delivery"){echo "selected";} ?>value="on Delivery">on Delivery</option>
                                <option <?php if($status=="Delivered"){echo "selected";} ?> value="Delivered">Delivered</option>
                                <option <?php if($status=="Cancelled"){echo "selected";} ?> value="Cancelled">Cancelled</option>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td> cus name;</td>
                        <td>
                            <input type="text" name="cus_name" value="<?php echo $cus_name; ?>">
                        </td>
                    </tr>

                    <tr>
                        <td> cus contact;</td>
                        <td>
                            <input type="text" name="cus_contact" value="<?php echo $cus_contact; ?>">
                        </td>
                    </tr>

                    <tr>
                        <td> cus email;</td>
                        <td>
                            <input type="text" name="cus_email" value="<?php echo $cus_name; ?>">
                        </td>
                    </tr>

                    <tr>
                        <td> cus address;</td>
                        <td>
                            <textarea name="cus_address" cols="30" rows="5"><?php echo $cus_address; ?></textarea>
                        </td>
                    </tr>

                    <tr>
                        <td clospan="2">
                            <input type="hidden" nama="id" value="<?php echo $id; ?>">
                            <input type="hidden" nama="price" value="<?php echo $price; ?>">

                            <input type="submit" name="submit" value="update Order" class="btn-secondary" >
                        </td>
                    </tr>
                </table>
            
            </form>


            <?php
                //check whether update button clicked or not
                if(isset($_POST['submit']))
                {
                    //echo "clicked";
                    //get all the values from form
                    //$id = $_POST['id'];
                    //$price = $_POST['price'];
                    $quantity = $_POST['quantity'];

                    $total = $price * $quantity;

                    $status = $_POST['status'];

                    $cus_name = $_POST['cus_name'];
                    $cus_contact = $_POST['cus_contact'];
                    $cus_email = $_POST['cus_email'];
                    $cus_address = $_POST['cus_address'];

                    //update the value
                    $sql2 = "UPDATE table_order SET
                        quantity = $quantity,
                        total = $total,
                        status = '$status',
                        cus_name ='$cus_name',
                        cus_contact ='$cus_contact',
                        cus_email ='$cus_email',
                        cus_address= '$cus_address'
                        WHERE id=$id 
                    ";

                    //execute query
                    $res2 = mysqli_query($conn,$sql2);

                    //and rediect to manage order base on id
                    //check whether update
                    if($res2==true)
                    {
                        //update
                        $_SESSION['update'] = "<div class='success'>Order update successfully.</div>";
                        header('location:'.SITEURL.'admin/manage-order.php');
                    }
                    else
                    {
                        //failed
                        $_SESSION['update'] = "<div class='error'> failed Order update .</div>";
                        header('location:'.SITEURL.'admin/manage-order.php');
                    }
                } 
            ?>


        </div>
    </div>

<?php include('partials/footer.php');?>