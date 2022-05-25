<?php
        require_once "../connection/dbcon.php";
        session_start();

        if (isset($_POST['uname']) && isset($_POST['password'])) {

            function validate($data)
            {

                $data = trim($data);

                $data = stripslashes($data);

                $data = htmlspecialchars($data);

                return $data;
            }

            $uname = validate($_POST['uname']);

            $pass = validate($_POST['password']);
            

            if (empty($uname)) {

                header("Location: login-page.php?error=User Name is required");

                exit();
            } else if (empty($pass)) {

                header("Location: login-page.php?error=Password is required");

                exit();
                
            } else {
                $sql_pass = "SELECT passwd FROM `login` WHERE username='$uname'";
                
                $res_pass = mysqli_query($connect, $sql_pass);
                $row_pass = mysqli_fetch_assoc($res_pass);

                
                $hashpass = password_hash($row_pass['passwd'], PASSWORD_BCRYPT);

                $sql = "SELECT * FROM `login` WHERE username='$uname' AND passwd='$pass'";

                $result = mysqli_query($connect, $sql);
                // if (password_verify($pass, $hashpass))
                if (mysqli_num_rows($result) === 1 && (password_verify($pass, $hashpass))){

                    $row = mysqli_fetch_assoc($result);

                    if ($row['username'] === $uname && $row['passwd'] === $pass) {

                        echo "Logged in!";

                        $_SESSION['username'] = $row['username'];

                        $_SESSION['name'] = $row['name'];

                        $_SESSION['id'] = $row['id'];

                        header("Location: ../index.php");

                        exit();
                    } else {

                        header("Location: login-page.php?error=Incorect User name or password");

                        exit();
                    }
                } else {

                    header("Location: ?error=Incorect User name or password");

                    exit();
                }
            }
        } else {

            header("Location: ../index.php");
            exit();
        } 
        ?>