<?php include('partials/menu.php');?>


<div class="main-content">
    <dvi class="wrapper">
        <h1>Manage-Food</h1>

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
                <a href="<?php echo SITEURL; ?>admin/add-food.php" class="btn-primary">Add Food</a>

                <br /><br /><br />

                <table class="tbl-full">
                    <tr>
                        <th>S.N</th>
                        <th>Title</th>
                        <th>Image</th>
                        <th>Featured</th>
                        <th>action</th>
                        <th>Active</th>
                        <th>Price</th>
                    </tr>

                    <?php
                    
                        //query to set all menu from the database
                        $sql = "SELECT * FROM table_foodgallary";

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
                                $title = $row['title'];
                                $image_name = $row['image_name'];
                                $featured = $row['featured'];
                                $active = $row['active'];

                                ?>

                                    <tr>
                                        <td><?php echo $sn++; ?></td>
                                        <td><?php echo $title;?></td>

                                        <td>
                                            <?php 
                                                // check wether image name is avaliable or not
                                                if($image_name!="")
                                                {
                                                    //display the image
                                                    ?>

                                                    <img src="<?php echo SITEURL; ?>image/menu/<?php echo $image_name; ?>" width="50px">

                                                    <?php
                                                }
                                                else
                                                {
                                                    //display the message
                                                    echo "<div class='error'>image not found.</div>";
                                                    
                                                }
                                            ?>
                                        </td>

                                        <td><?php echo $featured;?></td>
                                        <td><?php echo $active;?></td>
                                        <td>
                                            <!--<a href="<?php echo SITEURL; ?>admin/update-food.php?id=<?php echo $id; ?> "class="btn-secondary">Update Menu</a>--->
                                            <a href="<?php echo SITEURL; ?>admin/delete-food.php?id=<?php echo $id; ?> "class="btn-danger">Delete Food</a>
                                        </td>
                                    </tr>
                                
                                
                                <?php
                            }
                        }
                        else
                        {
                            //wedont have data
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