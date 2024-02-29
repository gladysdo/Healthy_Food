<?php include('partials/menu.php');?>
        <!--main content start-->
        <div class="main-content">
            <div class="wrapper">
                <h1>DASHBOARD</h1>

                <br /> <br />
                <?php
                    if(isset($_SESSION['login']))
                    {
                        echo $_SESSION['login']; //display session message
                        unset($_SESSION['login']); // remove session messge
                    }
                ?>
                <br/><br/>

                <div class="col-4">
                    <?php
                        //sql query
                        $sql = "SELECT * FROM table_menu";
                        //execute query
                        $res = mysqli_query($conn,$sql);
                        //count rows
                        $count = mysqli_num_rows($res);
                    ?>
                    <h1><?php echo $count; ?></h1>
                    Menu
                </div>

                <div class="col-4">
                    <?php
                        //sql query
                        $sql2 = "SELECT * FROM table_foodgallary";
                        //execute query
                        $res2 = mysqli_query($conn,$sql2);
                        //count rows
                        $count2 = mysqli_num_rows($res2);
                    ?>

                    <h1><?php echo $count2 ?></h1>
                    Food
                </div>

                <div class="col-4">
                    <?php
                        //sql query
                        $sql3 = "SELECT * FROM table_order";
                        //execute query
                        $res3 = mysqli_query($conn,$sql3);
                        //count rows
                        $count3 = mysqli_num_rows($res3);
                    ?>
                    <h1><?php echo $count3 ?></h1>
                    Total orders
                </div>

                <div class="col-4">
                    <?php
                        //create sql query to get total revenue 
                        //aggreate function in sql
                        $sql4 = "SELECT SUM(total) AS Total_order FROM table_order WHERE status='Delivered'";
                        
                        //execute the query
                        $res4 = mysqli_query($conn,$sql4);

                        //get the value
                        $row = mysqli_fetch_assoc($res4);

                        //get the total revenue
                        $total_revenue = $row['Total_order'];
                    ?>

                    <h1><?php echo $total_revenue ?></h1>
                    Revenue
                </div>

                <div class="clearfix"></div>
            </div>

        </div>

<?php include('partials/footer.php')?>