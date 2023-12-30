<!-- php code -->
<?php
include 'dbconnect.php';


$exists = false;
$showAlert = false;

if($_SERVER["REQUEST_METHOD" ] == "POST")
{
    $username = $_POST["username"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    if($exists==false)
    $sql = "INSERT INTO `users` (`username`, `name`, `email`, `password`, `date`) VALUES('$username', '$name', '$email', '$password',current_timestamp())";

    $result = mysqli_query($con, $sql);

    if($result)
    $showAlert = true;
    else
    echo"not inserted in db";
    
    
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
        if($showAlert)
        {
            echo 
            '<div class="alert" role="alert">
            <strong>Sucessfully!</strong> Your account has been created.<br><b>Now you can Login !</b>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>'; 
        }
      ?>
      <!-- /Alert -->
        <nav class="navigation">
            <a href="#">Home</a>
            <a href="#">About</a>
            <a href="content.php">Contact</a>
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
                    <h2>SignUp</h2>

                    <form action="index.php" method="post">
                        <div class="input__box">
                            <input type="text" placeholder="Username" id="username" name="username" required/>
                        </div>
                        <div class="input__box">
                            <input type="text" placeholder="Full Name" id="name" name="name" required/>
                        </div>
                        <div class="input__box">
                            <input type="email" placeholder="Email" id="email" name="email" required>
                        </div>
                        <div class="input__box">
                            <input type="password" placeholder="Password" id="password" name="password" required/>
                        </div>
                        <div class="checkbox">
                            <input type="checkbox" required> I agree all terms & comditions</input>
                        </div>
                        <div class="input__box">
                            <input type="submit" value="Registor" />
                        </div>
                        <p class="forget">
                            Already have an account? <a href="Login.php">Login</a>
                        </p>
                    </form>

                </div>
            </div>
        </div>
    </section>
</body>
</html>