<?php

    //include constants.php file here
    include('../config/constants.php');

    //1. get the iD of admin to be deleted
    echo $id = $_GET['id'];

    //2. create sql query to the deleted
    $sql = "DELETE FROM table_menu WHERE id=$id";

    //execute the query
    $res = mysqli_query($conn, $sql);

    //check whether the query execute
    if($res==TRUE)
    {
        //QUARY execute and deleted
        //echo "admin deleted";
        $_SESSION['delete-menu'] = "<div class='success'>Admin Deleted Successful.</div>";
        //Redirect to manage admin page
        header('location:'.SITEURL.'admin/manage-menu.php');

    }
    else
    {
        //fail to delete admin
        //echo "failed to delete admin";

        $_SESSION['delete-menu'] = "<div class='error'>fail to delete.</div>";
        header('location:'.SITEURL.'admin/manage-menu.php');
    }

    //3.redirect to manage admin page with message

?>