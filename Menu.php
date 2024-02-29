<?php include('partials-front/menu.php'); ?>

<div class="gallary" id="Gallary">
    <h1>Our<span>Menu</span></h1>
    
    <div class="gallary_image_box">
        <?php 
        // Create SQL to display items from the gallery
        $sql = "SELECT * FROM table_menu";
        // Execute the query
        $res = mysqli_query($conn, $sql);
        // Count rows to check whether items are available
        $count = mysqli_num_rows($res);

        if ($count > 0) {
            // Items available
            while ($row = mysqli_fetch_assoc($res)) {
                // Get all the values
                $id = $row['id'];
                $price = $row['price'];
                $quantity = $row['quantity'];
                $description = $row['description'];
                $order_id = $row['order_id'];
                $image_name = $row['image_name'];
        ?>
        
        <div class="gallary_image"> 
            <?php
            // Check whether image available
            if ($image_name == "") {
                // Image not available
                echo "<div class='error'>Image not available.</div>";
            } else {
                // Image available
            ?>
            <img src="<?php echo SITEURL ?>image/menu/<?php echo $image_name; ?>" alt="<?php echo $price; ?>">
            <?php
            }
            ?>
            
            <h3><?php echo $price; ?></h3>
            <p><?php echo $quantity; ?></p>
            <p><?php echo $description; ?></p> 

            <!-- Adjust the link as needed -->
            <a href="<?php echo SITEURL; ?>Order.php?id=<?php echo $id; ?>" class="gallary_btn">Order Now</a>
        </div>

        <?php
            }
        } else {
            // No items available
            echo "<div class='error'>No items available in the gallery.</div>";
        }
        ?>
    </div>
</div>