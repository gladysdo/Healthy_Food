<?php include('partials/menu.php');?>

    <div class="main-content">
        <div class="wrapper">
            <h1>Update Admin</h1>

            <br /><br />

            <?php 
                //1. Get the id of selected admin
                $id=$_GET['id'];

                //2. create sql to get details
                $sql= " SELECT * FROM table_admin WHERE id=$id";

                //execte the quary
                $res=mysqli_query($conn,$sql);

                //check the data available
                if($res==TRUE)
                {
                    //CHECK whether thae data is avialable or not
                    $count = mysqli_num_rows($res);
                    //check whether we have admin data or not 
                    if($count==1)
                    {
                        //get the datials
                        //echo "admin Available";
                        $row=mysqli_fetch_assoc($res);

                        $full_name = $row['full_name'];
                        $user_name = $row['user_name'];
                    }
                    else
                    {
                        //redirect to the home page
                        header('location:'.SITEURL.'admin/manage-admin.php');
                    }
                }

            ?>

            <form action="" method="POST">

                <table class="tbl-30" >
                    <tr>
                        <td>full_name: </td>
                        <td>
                        <input type="text" name="full_name" value="<?php echo $full_name; ?>">
                        </td>
                    </tr>

                    <tr>
                        <td>user_name: </td>
                        <td>
                            <input type="text" name="user_name" value="<?php echo $user_name; ?>">
                        </td>
                    </tr>


                    <tr>
                        <td colspan="2">
                            <input type="hidden" name="id" value="<?php echo $id ?>">
                            <input type="submit" name="submit" value="update Admin" class="btn-secondary">
                        </td>
                    </tr>


                </table>

            </from>
        </div>
    </div>

    <?php
        //check whether the submit is clicked or not
        if(isset($_POST['submit']))
        {
            //echo "botton click";
            //get all the values from update
            $id = $_POST['id'];
            $full_name = $_POST['full_name'];
            $user_name = $_POST['user_name'];

            //create a sql query to update admin
            $sql = "UPDATE table_admin set
            full_name = '$full_name',
            user_name = '$user_name'
            WHERE id='$id'
            ";

            //execute the quary
            $res = mysqli_query($conn, $sql);

            //check whether query is executed
            if($res == TRUE)
            {
                // quary executed
                $_SESSION['update'] = "<div class='success'>updated successful.</div>";
                //redirect to manager
                header('location:'.SITEURL.'admin/manage-admin.php');
            }
            else
            {
                //query fail
                $_SESSION['update'] = "<div class='error'>updated successful.</div>";
                //redirect to manager
                header('location:'.SITEURL.'admin/manage-admin.php');
            }
        }

    ?>

<?php include('partials/footer.php');?>