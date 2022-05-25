<?php 
    require_once "../connection/dbcon.php";

    session_start();

    if (isset($_POST['username']) && isset($_POST['pass'])){
        function validate($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        $username = validate($_POST['username']);
        $pass = validate($_POST['pass']);

        if (empty($username) || empty($pass)){
            header("Location: delete-page.php?error=Username and Password are required ");
            exit();
        } else {
            $sql_q = "SELECT * FROM `login` where username = '$username'";

            $delete_acc = "DELETE FROM `login` where username = '$username'";

            $res = mysqli_query($connect, $sql_q);

            if (mysqli_num_rows($res) === 0){
                header("Location: delete-page.php?error=Username isn't found");
                exit();
            } else {
                $res_delete = mysqli_query($connect, $delete_acc);
                header("Location: ../login/login-page.php");
                mysqli_close($connect);

                exit();
            }
        }
    } else {
        header("Location: ../login/login-page.php");
        exit();
    }
