<?php if (isset($_GET['error'])) { ?>

<p class="error"><?php echo $_GET['error']; ?></p>

<?php } ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recover password</title>
    <link rel="stylesheet" href="/styles/style2.css">
</head>

<body>
    <h1 class="text-center">Reset Password Page</h1>
    <form action="reset_pass.php" method="post">
        <div class="username">
            <label>Username</label>
            <input type="text" name="usname" placeholder="UserName">
        </div>
        <div class="pass">
            <label>New Password</label>
            <input type="password" name="new-password" placeholder="Password">
        </div>
        
        <button type="submit">Reset</button>
        <a href="../delete-acc/delete-page.php" class="delete">Delete Account</a>
</body>

</html>