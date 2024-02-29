<?php include('partials-front/menu.php');?>

<div class="main">

            <div class="men_text">
                <h1>Get Healthy and Sweet<span>Food</span><br>at the comfort of your home</h1>
            </div>

            <div class="main_image">
                <img src="image/pasta.jpg">
            </div>

            

        </div>

        <p>
            Healthy Food is the perfect blend of wellness and sweetness.
            At Healthy Food,we bring you wholesome and delightful treats,
            right to the comfort of your home.
            Elevate your dining experience with our carefully crafted menu that 
            proves health and sweetness can coexist harmoniously. 
            Welcome to a world where every bite is a celebration of balanced living

        </p>

        <div class="main_btn">
            <a href="<?php echo SITEURL; ?>Menu.php">Menu</a>
            <i class="fa-solid fa-angle-right"></i>
        </div>

    </section>
            <?php
                    if(isset($_SESSION['order']))
                    {
                        echo $_SESSION['order'];
                        unset($_SESSION['order']);
                    } 
            ?>
    

<?php include('partials-front/footer.php');?>