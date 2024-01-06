<?php
session_start();

if(isset($_SESSION['AccountID'])) {
    header("Location: dashboard.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Traveloka</title>
    <link rel="stylesheet" href="../admin/css/login.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&family=Pacifico&family=Poppins:wght@100&display=swap" rel="stylesheet" />
</head>

<body>
    <div class="login-container" id="main">
        <div class="sign-in">
            <form action="../php/login-register.php" method="post">
                <h1>Sign in</h1>
                <?php if (isset($_GET['error'])) { ?>
                    <p class="error"><?php echo $_GET['error']; ?></p>
                <?php } ?>
                <input type="text" id="username" name="username" placeholder="Username" required autocomplete="off">
                <input type="password" id="password" name="password" placeholder="Password" required autocomplete="off">
                <a href="">Forget your Password?</a>
                <button type="submit">Sign In</button>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-left">
                    <h1>Welcome Back!</h1>
                    <p>Sign in now and help us managing Mint House Restaurant!<br>Help us create the best restaurant possible!</p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>