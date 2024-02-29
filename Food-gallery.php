<?php include('partials-front/menu.php'); ?>

<div class="menu" id="Menu">
    <h1>Our<span>Food</span></h1>

    <div class="menu-container">

        <?php
        // Assuming $conn is already defined for database connection
        $sql = "SELECT * FROM table_foodgallary";
        $res = mysqli_query($conn, $sql);

        if ($res) {
            $count = mysqli_num_rows($res);

            if ($count > 0) {
                while ($row = mysqli_fetch_assoc($res)) {
                    $id = $row['id'];
                    $title = $row['title'];
                    $image_name = $row['image_name'];
                    $price =$row['price']
                    ?>
                    <div class="menu-box">
                        <div class="menu-card">
                            <div class="menu-image">
                                <?php 
                                if ($image_name == "")
                                 { ?>
                                    <div class='error'>Image not added.</div>
                                <?php
                               } 
                               else 
                               { ?>
                                    <img src="<?php echo SITEURL; ?>image/menu/<?php echo $image_name; ?>" class="menu-image" alt="Menu Image">
                                <?php 
                                } 

                                ?>
                                </div>
                                <div class="small-card">
                                    <i class="fa-solid fa-heart"></i>
                                </div>
                                <div class="menu-info">
                                    <td><?php echo $price;?></td>
                                    <h2 class="gallary_btn"><?php echo $title; ?></h2>
                                    <div class="menu-icon">
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star-half-stroke"></i>
                                    </div>
                                <!--<a href="<?php echo SITEURL; ?>Order.php?id=<?php echo $id; ?>" class="menu-btn">Order Now</a> -->
                            </div>
                        </div>
                    </div>
                    <?php
                }
            } else {
                echo "<div class='error'>food not added.</div>";
            }
        } else {
            echo "<div class='error'>Error in executing the query.</div>";
        }
        ?>
    </div>
</div>
