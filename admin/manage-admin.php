<?php include('partials/menu.php');?>

        <!--main content start-->
        <div class="main-content">
            <div class="wrapper">
                <h1>Manage Admin</h1>

                <br />


                <?php
                    if(isset($_SESSION['add']))
                    {
                        echo $_SESSION['add']; //display session message
                        unset($_SESSION['add']); // remove session messge
                    }

                    if(isset($_SESSION['delete']))
                    {
                        echo $_SESSION['delete'];
                        unset($_SESSION['delete']);
                    }

                    if(isset($_SESSION['update']))
                    {
                        echo $_SESSION['update']; //display session message
                        unset($_SESSION['update']); // remove session messge
                    }

                    if(isset($_SESSION['user-not-found']))
                    {
                        echo $_SESSION['user-not-found']; //display session message
                        unset($_SESSION['user-not-found']); // remove session messge
                    }

                    if(isset($_SESSION['pwd-not-found']))
                    {
                        echo $_SESSION['pwd-not-found']; //display session message
                        unset($_SESSION['pwd-not-found']); // remove session messge
                    }

                    if(isset($_SESSION['change-pwd']))
                    {
                        echo $_SESSION['change-pwd']; //display session message
                        unset($_SESSION['change-pwd']); // remove session messge
                    }


                ?>

                <br /><br /><br />

                <!-- Button to add admin -->
                <a href="add-admin.php" class="btn-primary">Add Admin</a>

                <br /><br /><br />

                <table class="tbl-full">
                    <tr>
                        <th>S.N</th>
                        <th>FullName</th>
                        <th>Username</th>
                        <th>Actions</th>
                    </tr>


                    <?php
                        //query to get all add dmini
                        $sql = "SELECT * FROM table_admin"; 
                        //execute the query
                        $res = mysqli_query($conn,$sql);

                        //check wether the query is executed
                        if($res==TRUE)
                        {
                            //count row in database
                            $count = mysqli_num_rows($res); //function to get the row in database

                            $sn=1; // create variable and assign the valu


                            //check the num of rows
                            if($count>0)
                            {
                                //we hane data in database
                                while($rows=mysqli_fetch_assoc($res))
                                {
                                    //use while loop to get data and run it

                                    //get individual data from database
                                    $id=$rows['id'];
                                    $full_name=$rows['full_name'];
                                    $user_name=$rows['user_name'];

                                    //display the values in the table
                                    ?>
                                        <tr>
                                            <td><?php echo $sn++; ?></td>
                                            <td><?php echo $full_name; ?></td>
                                            <td><?php echo $user_name; ?></td>
                                            <td>
                                                <a href="<?php echo SITEURL; ?>admin/update-password.php?id=<?php echo $id; ?>" class="btn-primary">Change Password</a>
                                                <a href="<?php echo SITEURL; ?>admin/update.php?id=<?php echo $id; ?>" class="btn-secondary">Update Admin</a>
                                                <a href="<?php echo SITEURL; ?>admin/delete.php?id=<?php echo $id; ?>" class="btn-danger">Delete Admin</a>
                                            </td>
                                        </tr>

                                    <?php

                                }
                            }
                            else
                            {
                                //we dont have data
                            }
                        }
                    ?>

                    
                </table>

            </div>

        </div>

<?php include('partials/footer.php');?>