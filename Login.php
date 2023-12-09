<!-- php code -->
<?php
include 'dbconnect.php';

$exists = false;
$login = false;
$showError = false;
$num = 0;


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    if ($exists == true) {

        $sql = "select * from users where username = '$username' and password = '$password'";

        $result = mysqli_query($con, $sql);
        $num = mysqli_num_rows($result);
    }
    else {
        $showError = true;
        // echo 'Invalid username/password !';
    }

    if ($num == 1) {
        $login = true;
        session_start();
        $_SESSION["loggedin"] = true;
        $_SESSION["username"] = $username;
        header("location: home.php");
    } 


}

?>

<!-- /php code -->



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>λરρλɴ</title>
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
                    <h2>Login</h2>
                    <form method="post">
                        <div class="input__box">
                            <input type="text" placeholder="Username" id="username" name="username" required />
                        </div>
                        <div class="input__box">
                            <input type="password" placeholder="Password" id="password" name="password" required />
                        </div>
                        <div class="input__box">
                            <input type="submit" value="Login" />
                        </div>
                        <p class="forget">
                            Forgot Password? <a href="forget.php">Click Here</a>
                        </p>
                        <p class="forget">
                            Don't have an account? <a href="index.php">Sign up</a>
                        </p>
                        <br>
                        <!-- Alert  -->
                        <br>
                        <h3>
                            <?php if ($showError)
                                echo '<div class="alert" role="alert">
            <strong>Invalid !</strong> username / password</b>'; ?>
                        </h3>
                        <!-- /Alert -->
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>

</html>