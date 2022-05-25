<?php if (isset($_GET['error'])) { ?>

<p class="error"><?php echo $_GET['error']; ?></p>

<?php } ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete account</title>
    <link rel="stylesheet" href="/styles/style2.css">
</head>

<body>
    <h1 class="text-center">Delete account Page</h1>
    <form action="delete.php" method="post">
        <div class="username">
            <label>Username</label>
            <input type="text" name="username" placeholder="UserName">
        </div>
        <div class="pass">
            <label>Password</label>
            <input type="password" name="pass" placeholder="Password">
        </div>
        
        <button type="submit">Delete</button>

        
        

    </form>



</body>
</html>