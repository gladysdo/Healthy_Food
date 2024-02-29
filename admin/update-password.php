<?php include('partials/menu.php');?>

<div class="main-content">
    <div class="wrapper">
        <h1>Change Password</h1>
        <br /><br />


        <?php
        if(isset($_GET['id']))
        {
            $id=$_GET['id'];
        }
        
        ?>

        <form action="" method="POST">

        <table class="tbl-30">
            <tr>
                <td>Old Password: </td>
                <td>
                    <input type="password" name="old_password" placeholder="Old Password">
                </td>
            </tr>

            <tr>
                <td>New Password: </td>
                <td>
                    <input type="password" name="new_password" placeholder="New Password">
                <td>
            </tr>

            <tr>
                <td>Confirm Password: </td>
                <td>
                    <input type="password" name="confirm_password" placeholder="Confirm_password">
                </td>
            </tr>

            <tr>
                <td colspan="2">
                    <input type="hidden" name="id" value="<?php echo $id ?>">
                    <input type="submit" name="submit" value="update Admin" class="btn-secondary">
                </td>
            </tr>

        </table>

        </form>

    </div>
</div>

<?php

    //check whether the submit button is clicked or not
    if(isset($_POST['submit']))
    {
        //echo "clicked";

        // 1.get the data from form
        $id=$_POST['id'];
        $old_password = md5($_POST['old_password']);
        $new_password =md5($_POST['new_password']);
        $confirm_password =md5($_POST['confirm_password']);


        //2. check wether the user with old id 
        $sql = "SELECT * FROM table_admin WHERE id=$id AND password='$old_password'";

        //execute the quary
        $res = mysqli_query($conn, $sql);

        //check whether query is executed
        if($res == TRUE)
        {
            $count=mysqli_num_rows($res);

            if($count==1)
            {
                //user exit and password change
                //echo "user found";
                if($new_password==$confirm_password)
                {
                    //update the password
                    $sql2 = "UPDATE table_admin SET
                        password='$new_password'
                        WHERE id=$id
                    ";

                    //execute the quary
                    $res2 = mysqli_query($conn, $sql2);

                    if($res==TRUE)
                    {
                        $_SESSION['change-pwd'] = "<div class='success'>change successful.</div>";
                        //redirect to manager
                        header('location:'.SITEURL.'admin/manage-admin.php');

                    }
                    else
                    {
                        $_SESSION['change-pwd'] = "<div class='error'>change not successful.</div>";
                        //redirect to manager
                        header('location:'.SITEURL.'admin/manage-admin.php');
                    }
                }
                else
                {
                    $_SESSION['pwd-not-found'] = "<div class='seccess'>password not found.</div>";
                    //redirect to manager
                    header('location:'.SITEURL.'admin/manage-admin.php');
                }

            }
            else
            {
                //user not exit
                $_SESSION['user-not found'] = "<div class='error'>user not found.</div>";
                //redirect to manager
                header('location:'.SITEURL.'admin/manage-admin.php');
            }
        }
        

        //3. check whether the new password and confirm password

    
        //4. change password if all above is true
    }


?>
<?php include('partials/footer.php');?>