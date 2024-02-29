<?php include('partials/menu.php');?>

        <!--main content start-->
<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>


        <br /><br />


        <?php
            if(isset($_SESSION['add'])) // checking whether the session is set on
            {
                echo $_SESSION['add']; //display session message
                unset($_SESSION['add']); // remove session messge
            } 
        ?>

        <form action="" method="POST">

        <table class="tbl-30" >

           
        <tr>
                <td>full_name: </td>
                <td>
                    <input type="text" name="full_name" placeholder="enter your name">
                </td>
            </tr>

            <tr>
                <td>user_name: </td>
                <td>
                    <input type="text" name="user_name" placeholder="enter username">
                </td>
            </tr>

            <tr>
                <td>password: </td>
                <td>
                    <input type="password" name="password" placeholder="enter password">
                </td>
            </tr>

            <tr>
                <td colspan="2">
                    <input type="submit" name="submit" value="Add Admin" class="btn-secondary">

                </td>
            </tr>


        </table>
        </form>

    </div>
</div>

<?php include('partials/footer.php');?>

<?php
//process the value from form and save it in database
// check wheather the button is clicked or not

    if(isset($_POST['submit']))
    {
        //Botton clicked
        //echo "Botton Clicked";

        //1.get form from data
        $full_name = $_POST['full_name'];
        $user_name = $_POST['user_name'];
        $password = md5($_POST['password']); //password encryption with md5

        //2. SQL Query to Save the data into database
        $sql ="INSERT INTO table_admin SET
            full_name='$full_name',
            user_name='$user_name',
            password='$password'

        ";

        //echo $sql;

        //3.executing query and saving data into database
        $res = mysqli_query($conn, $sql) or die(mysqli_error());

        //4. checking weather the data is inserted or not and display the massage
        if($res==TRUE)
        {
            //DATA INSERTED
            //echo "data inserted";
            //create a session
            $_SESSION['add'] = "Admin Added successful";
            //Rdirect page
            header("location:".SITEURL.'admin/manage-admin.php');
        }
        else
        {
            //failed to insert data
            //echo "faile to insert";
            //create a session
            $_SESSION['add'] = "unsuccessful";
            //Rdirect page
            header("location:",SITEURL.'admin/add-admin.php');
        }
    }
?>