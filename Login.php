<!-- php code -->
<?php
include 'dbconnect.php';

$showError = false;
$exists = false;
$login = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    $username = $_POST["username"];
    $password = $_POST["password"];
    if ($exists == false)
        $sql = "select * from users where username = '$username' and password = '$password'";

    $result = mysqli_query($con, $sql);
    $num = mysqli_num_rows($result);

    if ($num == 1) {
        $login = true;
        session_start();
        $_SESSION["loggedin"] = true;
        $_SESSION["username"] = $username;
        header("location: home.php");
    } else
        $showError = "Invalid username/password !";


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
        <!-- Alert  -->
        <?php
        if ($login) {
            echo
                '<div class="alert" role="alert">
            <strong>Sucessfully!</strong> Your are logged in !</b>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        }
        ?>
        <!-- /Alert -->
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
                    <form action="home.php" method="post">
                        <div class="input__box">
                            <input type="text" placeholder="Username" id="username" name="username" required />
                        </div>
                        <div class="input__box">
                            <input type="password" placeholder="Password" id="password" name="password" required />
                        </div>
                        <div class="input__box">
                            <input type="submit" value="Login" />
                            <!-- <button type="submit" class="input__box">Login</button> -->
                        </div>
                        <p class="forget">
                            Forgot Password? <a href="#">Click Here</a>
                        </p>
                        <p class="forget">
                            Don't have an account? <a href="index.php">Sign up</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>

</html>