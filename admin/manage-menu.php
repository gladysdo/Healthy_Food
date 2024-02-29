<?php include('partials/menu.php');?>


<div class="main-content">
    <dvi class="wrapper">
        <h1>Manage-Menu</h1>

        <br /><br />


        <?php 
                
            if(isset($_SESSION['add']))
            {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }
            if(isset($_SESSION['upload']))
            {
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }


            if(isset($_SESSION['update-menu']))
            {
                echo $_SESSION['update-menu']; //display session message
                unset($_SESSION['update-menu']); // remove session messge
            }

        ?>

        <br /><br />

                <!-- Button to add admin -->
                <a href="<?php echo SITEURL; ?>admin/add-menu.php" class="btn-primary">Add Menu</a>

                <br /><br /><br />

                <table class="tbl-full">
                    <tr>
                        <th>S.N</th>
                        <th>Price</th>
                        <th>quantity</th>
                        <th>Description</th>
                        <th>order_id</th>
                        <th>image_name</th>
                    </tr>

                    <?php
                    
                        //query to set all food from the database
                        $sql = "SELECT * FROM table_menu";

                        //execute quary
                        $res = mysqli_query($conn, $sql);

                        //count rows
                        $count = mysqli_num_rows($res);

                        //count rows in serils
                        $sn=1;

                        if($count>0)
                        {
                            //we have data in the database
                            //get the data and display
                            while($row=mysqli_fetch_assoc($res))
                            {
                                $id = $row['id'];
                                $price = $row['price'];
                                $quantity = $row['quantity'];
                                $description = $row['description'];
                                $order_id = $row['order_id'];
                                $image_name = $row['image_name'];

                                ?>

                                    <tr>
                                        <td><?php echo $sn++; ?></td>
                                        <td><?php echo $price;?></td>
                                        <td><?php echo $quantity;?></td>
                                        <td><?php echo $description;?></td>
                                        <td><?php echo $order_id;?></td>
                                        <td>
                                            <?php 
                                                // check wether image name is avaliable or not
                                                if($image_name!="")
                                                {
                                                    //display the image
                                                    ?>

                                                    <img src="<?php echo SITEURL; ?>image/menu/<?php echo $image_name; ?>" width="100px">

                                                    <?php
                                                }
                                                else
                                                {
                                                    //display the message
                                                    echo "<div class='error'>image not found.</div>";
                                                }
                                            ?>
                                        </td>

                                        <td>
                                            
                                            <a href="<?php echo SITEURL; ?>admin/update-menu.php?id=<?php echo $id; ?> "class="btn-secondary">Update Menu</a>
                                            <a href="<?php echo SITEURL; ?>admin/delete-menu.php?id=<?php echo $id; ?> "class="btn-danger">Delete Menu</a>
                                        </td>
                                    </tr>
                                
                                
                                <?php
                            }
                        }
                        else
                        {
                            //we dont have data
                            //we need to display the massage inside the table so we will breake the php,
                            ?>

                            <tr>
                                <td colspan="6"><div class="error">No food added.</div></td>
                            </tr>

                            <?php 
                        }
                    ?>

                    
                </table>


    </div>

</div>

<?php include('partials/footer.php');?>
            