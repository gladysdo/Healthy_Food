<?php include('partials-front/menu.php');?>

    

            <div class="order" id="Order">

                <h1><span>Order</span>Now</h1>

                <?php  
                        //check whether menu_id id is set or not
                        if(isset($_GET['id']))
                        {
                            //get the menu id and details of the 
                            $id = $_GET['id'];

                            // get the details of the selected food
                            $sql ="SELECT * FROM table_menu WHERE id=$id";

                            //execute the quary
                            $res = mysqli_query($conn,$sql);

                            //count the rows
                            $count = mysqli_num_rows($res);

                            //check whether the data is available
                            if($count==1)
                            {
                                //data is available
                                //GET THE DATA from database
                                $row =mysqli_fetch_assoc($res);

                                $price = $row['price'];
                                $quantity = $row['quantity'];
                                $description = $row['description'];
                                $order_id = $row['order_id'];
                                $image_name = $row['image_name'];

                            } 
                            else
                            {
                                //food not avialable
                                //redirect  to home page
                                header('location:'.SITEURL);                              
                            }
                        }
                        else
                        {
                            //redirect to home page
                            //header('location:'.SITEURL);
                        }
                    
                    
                ?>

        
                <div class="order_main">
        
                    <form action="" method="POST">

                        <fieldset>
                            <legend>Select Food</legend>

                            <div class="input">
                                <?php
                                    //check whether the image is ava;iable
                                    if($image_name=="")
                                    {
                                        //image not available
                                        echo "<div class='error'>image not available.</div>";
                                    }
                                    else
                                    {
                                        //image is avaliable
                                        ?>
                                        <img src="<?php echo SITEURL; ?>image/menu/<?php echo $image_name?>" class="order_image" required>
                                        <?php
                                    }
                                ?>
                                    
                                </div>

                            <div class="input">
                                
                                <input type="hidden" name="price" value="<?php echo $price; ?>">
                                <input type="hidden" name="food" value="<?php echo $description; ?>">
                                <input type="number" name="quantity" placeholder="quantity" required>

                            </div>

                        </fieldset>

                        <br /><br /><br />
        
                        <div class="input">
                            <p></p>
                            <input type="text" name="fullname" placeholder="enter name" required>
                        </div>
        
                        <div class="input">
                            <p></p>
                            <input type="email" name="email" placeholder=" enter email" require required>
                        </div>
        
                        <div class="input">
                            <p></p>
                            <input type="text" name="contact" placeholder="enter contacts">
                        </div>
        
                        
        
                        <div class="input">
                            <p></p>
                            <input type="text" name="address" placeholder=" enter Address" require>
                        </div>
        
                        <input type="submit" name="submit" value="confirm order" class="order_btn" >

        
                    </form>

                    <?php
                        //check wether submit botton is clicked
                        if(isset($_POST['submit']))
                        {
                            //get all the details from the form
                            $food = $_POST['food'];
                            $price = $_POST['price'];
                            $quantity = $_POST['quantity'];

                            $total = $price * $quantity; //total= price x quantity

                            $order_date = date("Y-m-d h:i:s");

                            $status = "ordered"; // order on delivery or cancelled

                            $cus_name = $_POST['fullname'];
                            $cus_contact = $_POST['contact'];
                            $cus_email = $_POST['email'];
                            $cus_address =$_POST['address'];

                            //save the order in database
                            //create sql to save the data in the database
                            $sql2 ="INSERT INTO table_order set 
                                food = '$food',
                                price = '$price',
                                quantity ='$quantity',
                                total ='$total',
                                order_date ='$order_date',
                                status = '$status',
                                cus_name ='$cus_name',
                                cus_contact ='$cus_contact',
                                cus_email ='$cus_email',
                                cus_address ='$cus_address'
                            ";

                            //echo $sql2;

                            //execute the qurey
                            $res2 = mysqli_query($conn,$sql2);

                            //check whether query executed succssful
                            if($res2==true)
                            {
                                //query executed and order saved
                                $_SESSION['order'] = "<div style= 'color: blue;'>food order successful.</div>";
                                header('location:'.SITEURL);
                            }
                            else
                            {
                                //faild to save order
                                $_SESSION['order'] = "<div  style= 'color: red;'>food order successful.</div>";
                                header('location:'.SITEURL);
                            }


                        }   
                    ?>
        
                </div>
        
            </div>
        
        </body>
    </head>

</html>
