<?php include('partials/menu.php');?>

        <!--main content start-->
        <div class="main-content">
            <div class="wrapper">
                <h1>Add Food</h1>

                <br /></br>

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

                ?>

                <br /><br/>
                <!-- add menu form to the batabase -->
                <form action="" method="POST" enctype="multipart/form-data"> <!--help to upload file or images -->

                    <table class="tbl-30" >
                        <tr>
                            <td>Title: </td>
                            <td>
                                <input type="text" name="title" placeholder="enter food">
                            </td>
                        </tr>

                        <tr>
                            <td>Select Image</td>
                            <td>
                                <input type="file" name="image">
                            </td>
                        </tr>

                        <tr>
                            <td>price: </td>
                            <td>
                                <input type="text" name="price" placeholder="enter price">
                            </td>
                        </tr>

                        <tr>
                            <td>Featured: </td>
                            <td>
                                <input type="radio" name="featured" value="Yes"> Yes
                                <input type="radio" name="featured" value="No"> No
                            </td>
                        </tr>


                        <tr>
                            <td>Active: </td>
                            <td>
                                <input type="radio" name="active" value="Yes">Yes
                                <input type="radio" name="active" value="No">No
                            </td>
                        </tr>

                        <tr>
                            <td colspan="2">
                                <input type="submit" name="submit" value="Add Food" class="btn-secondary">
                        </tr>

                    </table>

                </form>
                <!-- add manu form -->
                <?php
                
                    // check whether the botton is clicked
                    if(isset($_POST['submit']))
                    {
                        //echo "clicked";
                        $title =$_POST['title'];

                        //for radio input we need to check whether thw button is selected or not.
                        if(isset($_POST['featured']))
                        {
                            //get the vale from  form
                            $featured = $_POST['featured'];
                        }
                        else
                        {
                            //set the default value
                            $featured = "No";
                        }

                        if(isset($_POST['active']))
                        {
                            //get value
                            $active = $_POST['active'];
                        }
                        else
                        {
                            //set defualt value
                            $active = "No";
                        }

                        //check wether the image is selected or not and set the value for the image name accordingly
                        //print_r($_FILES['image']);

                        //die();// break the code here I just want to see if the code is working
                        if(isset($_FILES['image']['name']))
                        {
                            //upload the image
                            //to upload image we need image name,source path and distination path
                            $image_name = $_FILES['image']['name'];

                            //auto rename the image
                            //get the extention of our image (jpg, png, gif, etc)
                            $image_name_parts = explode('.', $image_name);
                            $ext = end($image_name_parts);

                            //rename image
                            $image_name = "food_menu_".rand(000, 999).'.'.$ext; // eg food_menu452.jpn

                            $source_path = $_FILES['image']['tmp_name'];

                            $destination_path ="../image/menu/".$image_name;

                            //to uploadthe file 
                            $upload = move_uploaded_file($source_path, $destination_path);

                            //CHeck wether the image is upload or not
                            //and if the image is not uploaded then we will stop the process
                            if($upload==false)
                            {
                                //set massege
                                $_SESSION['upload'] = "<div class='error'>Failed to upload image.</div>";
                                //rediect to add menu page
                                header('location:'.SITEURL.'admin/add-food.php');
                                //stop the process
                                die();
                            }
                        }
                        else
                        {
                            // dont upload image and set the image name value blank
                            $image_name="";
                        }
                        //create sql to insert  food into the database
                        $sql = "INSERT INTO table_foodgallary SET
                            title='$title',
                            image_name='$image_name',
                            featured='$featured',
                            active='$active'
                        ";

                        //execute the quary
                        $res = mysqli_query($conn, $sql);
                        //echo $sql;

                        //check wether the query is executed
                        if($res==true)
                        {
                            //query executed
                            $_SESSION['add'] = "<div class='success'>food added successful.</div>";
                            //redirect to manage menu page
                            header('location'.SITEURL.'admin/manage-food.php');
                        }
                        else
                        {
                            //failed to execute
                            $_SESSION['add'] = "<div class='erro'>food aded not successful.</div>";
                            //redirect to manage menu page
                            header('location'.SITEURL.'admin/add-food.php');
                        }
                    }
                ?>

            </div>
        </div>


<?php include('partials/footer.php');?>