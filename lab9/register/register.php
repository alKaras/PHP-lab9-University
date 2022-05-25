<?php 
    require_once "../connection/dbcon.php";
    try {
        $conn = new PDO ("mysql:host=$sname;dbname=$tablename", $uname, $pass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $stmt = $conn->prepare("INSERT into `login` (username, passwd, name) VALUES (:username, :password, :gname)");
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':gname', $gname);
    } catch (PDOException $e){
        echo "Error: " . $e->getMessage();
    }
    
    session_start();
    if (isset($_POST['gname']) && isset($_POST['username']) && isset($_POST['password'])){
        function validate($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        $gname = validate($_POST['gname']);
        $username = validate($_POST['username']);
        $password = validate($_POST['password']);

        if (empty($gname) || empty($username) || empty($password)){
            header("Location: register-page.php?error=Filling all forms is required");
            exit();
        } else {

            // $sql = "INSERT into `login` (id, username, passwd, name) VALUES (?,?, ?, ?)";
            $stmt->execute();
            // $res = mysqli_query($con, $sql);    
            
            header("Location: ../login/login-page.php");
            $conn = null;
            mysqli_close($connect);
            exit();
        }

    } else {
        header("Location: ../login/login-page.php");
        exit();
    }

?>