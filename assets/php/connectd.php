<?php
    $hostname = 'localhost:3306';
    $username = 'root';
    $password = '';
    $dbname = "dbmap";
    $connect = mysqli_connect($hostname, $username, $password);
    if (!$connect) {
        die('Kết nối không thành công!' . mysqli_error());
        echo"<script>alert('Kết nối thất bại!');</script>";
        exit();
    }
    mysqli_select_db($connect, $dbname);
?>