<?php
<<<<<<< HEAD
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
=======
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
>>>>>>> 362d6323e851d4524fc45823a4c9e461a334eb66
