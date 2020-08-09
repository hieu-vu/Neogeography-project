<?php
    require_once("connectd.php");
    $id = $_GET['id'];                   
    $sql = "DELETE FROM addbeer WHERE id = $id";
    $result = mysqli_query($connect, $sql);
    if($result) {
        header("Location:\beerMap\manage.php");
    }
?>