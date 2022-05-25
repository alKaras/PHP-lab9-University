<?php 
    $sname = 'localhost';
    $uname = 'root';
    $pass = '';
    $tablename = 'testdb';
    $connect = mysqli_connect($sname, $uname, $pass);

    if (!$connect){
        die("Connection failed ".mysqli_connect_error());
    }
    else {
        mysqli_select_db($connect, $tablename);
    }

?>