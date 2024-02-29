<?php 
    
    include('../config/constants.php');
    include('login-check.php');
?>


<html>
    <head>
        <title>Healthy food website - Home page</title>
        <link rel="stylesheet" href="../admin.css">
    </head>

    <body>
        <!--menu section start -->
        <div class="menu">
            <div class="wrapper">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="manage-admin.php">Admin</a></li>
                    <li><a href="manage-menu.php">Menu</a></li>
                    <li><a href="manage-order.php">Order</a></li>
                    <li><a href="manage-food.php">Food-gallery</a></li>
                    <!--<li><a href="manage-review.php">Review</a></li> -->
                    <li><a href="logout.php">logout</a></li>
                </ul>
            </div>
        </div>
