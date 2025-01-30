<?php

    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "auqashop";

    $con = mysqli_connect($host,$username,$password,$database);

    if(!$con)
    {
        die("connection Failed".mysqli_connect_error());
    }
   






?>
