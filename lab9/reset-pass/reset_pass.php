<!--
    реализовать удаление аккаунта
 --> 

<?php
require_once "../connection/dbcon.php";
try {
    $conn = new PDO ("mysql:host=$sname;dbname=$tablename", $uname, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 

} catch (PDOException $e){
    echo "Error: " . $e->getMessage();
}
session_start();
if (isset($_POST['usname']) && isset($_POST['new-password'])) {
    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $username = validate($_POST['usname']);
    $newpass = validate($_POST['new-password']);

    if (empty($username)) {
        header("Location: reset-page.php?error=Username is required!");
        exit();
    } else if(empty($newpass)) {
        header("Location: reset-page.php?error=New Password is required!");
        exit();
    } else {
        $sql_name = "SELECT * from `login` where username = '$username'";

        $res = mysqli_query($connect, $sql_name);

        // $update_pass = "UPDATE `login` SET passwd='$newpass' WHERE username='$username'";
        $update_pass = "UPDATE `login` SET passwd=? WHERE username=?";
        if (mysqli_num_rows($res) === 0) {
            header("Location: reset-page.php?error=Incorrect UserName");
            exit();
        } else {
            $rows = mysqli_fetch_assoc($res);

            if ($rows['username'] === $username) {
                // $res_update = mysqli_query($connect, $update_pass);
                $stmt = $conn->prepare($update_pass);
                $stmt->execute([$newpass, $username]);

                $_SESSION['username'] = $row['username'];
                $_SESSION['name'] = $row['name'];
                $_SESSION['id'] = $row['id'];

                header("Location: ../login/login-page.php");
                $conn = null;
                mysqli_close($connect);
                
                exit();
            } else {
                header("Location: reset-page.php?error=Incorrect UserName");
                exit();
            }
        }
    }
} else {
    header("Location: ../login/login-page.php");
    exit();
}

?>
