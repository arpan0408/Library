<?php
$server = "localhost:8080";
$username = "root";
$password = "";
$database = "arpan";

$con = mysqli_connect($server,$username,$password,$database);

if(!$con)
//     echo"success";
// else
    die("Error".mysqli_connect_error());


?>
