<?php if (isset($_GET['error'])) { ?>

    <p class="error"><?php echo $_GET['error']; ?></p>

<?php } ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>
    <link rel="stylesheet" href="/styles/style2.css">
</head>

<body>
    <h1 class="text-center">Sign up page</h1>
    <form action="register.php" method="post">
        <div>
            <label>Name</label>
            <input type="text" name="gname" tabindex="1" placeholder="Name">
        </div>
        <div>
            <label>Username</label>
            <input type="text" name="username" placeholder="UserName" tabindex="2">
        </div>
        <div class="pass">
            <label>Password</label>
            <input type="password" name="password" placeholder="Password" tabindex="3">
        </div>


        <button type="submit">Sign up</button>




    </form>
</body>

</html>