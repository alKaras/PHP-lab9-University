<?php if (isset($_GET['error'])) { ?>

<p class="error"><?php echo $_GET['error']; ?></p>

<?php } ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="/styles/style2.css">
</head>

<body>
    <h1 class="text-center">Login Page</h1>
    <form action="login.php" method="post">
        <div class="username">
            <label>Username</label>
            <input type="text" name="uname" placeholder="UserName">
        </div>
        <div class="pass">
            <label>Password</label>
            <input type="password" name="password" placeholder="Password">
        </div>
        
        <button type="submit">Login</button>
        <a href="/register/register-page.php" class="reg-btn" target="_blank">Sign up</a>

        <a href="/reset-pass/reset-page.php" class="register" target="_blank">Forgot password or Delete account</a>

        
        

    </form>



</body>
</html>