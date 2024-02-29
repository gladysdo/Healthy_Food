<?php include('../config/constants.php'); ?>

<html>
    <head>
        <title>Login -Sweetfood</title>
        <link rel="stylesheet" href="../admin.css">

    </head>

    <body>

        <div class="login">
            <h1 class="centa" >Login</h1>
            <br /><br />

            <?php
                if(isset($_SESSION['login']))
                {
                    echo $_SESSION['login']; //display session message
                    unset($_SESSION['login']); // remove session messge
                }

                if(isset($_SESSION['no-login-message']))
                {
                    echo $_SESSION['no-login-message']; //display session message
                    unset($_SESSION['no-login-message']); // remove session messge
                }
            ?>

            <br><br />

            <!--login form-->
            <form action="" method="POST" class="centa">
                username:<br>
                <input type="text" name="username" placeholder="Enter username"><br/><br />

                password:<br>
                <input type="password" name="password" placeholder="Enter Password"><br /><br />

                <input type="submit" name="submit" value="login" class="btn-primary">
            </form>
            <br /><br />

            <p class="centa">Created By -<a href= "www.glad.com">Gladys</a></p>
        </div>
    </body>
</html>

<?php

    //check if botton is clicked
    if(isset($_POST['submit']))
    {
        //process login
        //1. get the data from login
        $user_name = $_POST['username'];
        $password = md5($_POST['password']);

        //sql to check user
        $sql = "SELECT * FROM table_admin WHERE user_name='$user_name' AND password='$password'";

        //3.execute
        $res = mysqli_query($conn, $sql);

        //4. count row
        $count = mysqli_num_rows($res);

        if($count==1)
        {
           // user available
           $_SESSION['login'] = "<div class='success'>login successful.</div>";
           $_SESSION['user'] = $user_name; // to check whether the use login or not 
           //redirect
           header('location:'.SITEURL.'admin/');
        }
        else
        {
            // user failed
           $_SESSION['login'] = "<div class='success'>login unsuccessful.</div>";
           //redirect
           header('location:'.SITEURL.'admin/login.php'); 
        }
    }
?>