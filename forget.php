<?php
include 'dbconnect.php';

$result = false;
$match = false;

if ($_SERVER["REQUEST_METHOD"] == "POST")
{

    $email = $_POST["email"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];
    $exists = "SELECT * FROM `users` WHERE `email` = '$email'";
    
    if($exists == $email && $password != $cpassword)
    {
        $sql = "UPDATE `users` SET `password` = '$password' WHERE `users`.`email` = '$email'";
        
        $result = mysqli_query($con, $sql);
    }
    if($password != $cpassword)
    $match = true;

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>forget_pass</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <header>
        <h2 class="logo">Library</h2>
        <nav class="navigation">
            <a href="#">About</a>
            <a href="content.html">Contact</a>
        </nav>
    </header>

    <section>
        <div class="colour"></div>
        <div class="colour"></div>
        <div class="colour"></div>
        <div class="box">
            <div class="square" style="--i: 0"></div>
            <div class="square" style="--i: 1"></div>
            <div class="square" style="--i: 2"></div>
            <div class="square" style="--i: 3"></div>
            <div class="square" style="--i: 4"></div>
            <div class="container">
                <div class="form">
                    <h2>Reset</h2>
                    <form method="post">
                        <div class="input__box">
                            <input type="email" placeholder="email" id="" name="email" required />
                        </div>
                        <div class="input__box">
                            <input type="password" placeholder="New Password" id="" name="password" required />
                        </div>
                        <div class="input__box">
                            <input type="password" placeholder="New Password" id="" name="cpassword" required />
                        </div>
                        <div class="input__box">
                            <input type="submit" value="Save" />
                        </div>
                        <p class="forget">
                            if remember password : <a href="Login.php">Login</a>
                        </p>
                        <!-- Alert  -->
                        <?php
                        if ($result) {
                            echo
                                '<div class="alert" role="alert">
            <strong>Sucessfully!</strong> Your password is reset !</b>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
                        }
                        if($match)
                        echo'plz match the passwords !';
                        
                        ?>
                        <!-- /Alert -->
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>

</html>