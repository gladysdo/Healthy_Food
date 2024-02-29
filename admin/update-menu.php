<?php include('partials/menu.php');?>

    <div class="main-content">
        <div class="wrapper">
            <h1>Update Menu</h1>

            <br /><br />

            <?php 
                //1. Get the id of selected menu
                $id=$_GET['id'];

                //2. create sql to get details
                $sql= " SELECT * FROM table_menu WHERE id='$id'";

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

                        $id = $row['id'];
                        $title = $row['title'];
                        $image_name = $row['image_name'];
                        $featured = $row['featured'];
                        $active = $row['active'];
                    }
                    else
                    {
                        //redirect to the home page
                        header('location:'.SITEURL.'admin/manage-Menu.php');
                    }  
                }

            ?>


            <form action="" method="POST">

            <table class="tbl-30" >
                <tr>
                    <td>title: </td>
                    <td>
                    <input type="text" name="title" value="<?php echo $title; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Select Image:</td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>


                <tr>
                    <td colspan="6">
                        <input type="hidden" name="id" value="<?php echo $id ?>">
                        <input type="submit" name="submit" value="update Menu" class="btn-secondary">
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
            $id = $row['id'];
            $title = $row['title'];
            $image_name = $row['image_name'];
            $featured = $row['featured'];
            $active = $row['active'];

            //create a sql query to update admin
            $sql = "UPDATE table_menu set
            title = '$title',
            image_name = '$image_name',
            featured = '$featured',
            active = '$active'
            WHERE id='$id'
            ";

            //execute the quary
            $res = mysqli_query($conn, $sql);

            //check whether query is executed
            if($res == TRUE)
            {
                // quary executed
                $_SESSION['update-menu'] = "<div class='success'>updated successful.</div>";
                //redirect to manager
                header('location:'.SITEURL.'admin/manage-menu.php');
            }
            else
            {
                //query fail
                $_SESSION['update-menu'] = "<div class='error'>updated successful.</div>";
                //redirect to manager
                header('location:'.SITEURL.'admin/manage-menu.php');
            }
        }

    ?>

<?php include('partials/footer.php');?>