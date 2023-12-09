<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "project";

$con = mysqli_connect($server, $username, $password, $database);

if (!$con)
    die("Error" . mysqli_connect_error());
else
    echo "success";

?>