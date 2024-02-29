<?php
//include constants for siteurl
include('../config/constants.php');

//1. Destory the session
session_destroy(); //unset session [user]

//2. Redirect to the login page
header('location:'.SITEURL.'admin/login.php');


?>