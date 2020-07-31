<?php

    $connect = mysqli_connect("localhost", "root", "");
    if (!connect) { 
        die('Connection Failed: ' . mysqli_error()); 
    }
    mysqli_select_db("test", $connect);
?>
<?php
    //Insert INTO

    $add_place = "INSERT INTO addPace (id ,tendiadiem, diachi) VALUES ('$_POST[nID]' ,'$_POST[nPlace]', '$_POST[nAddress]')";//, '$_POST[nCoordinate]'
    if('$_POST[btn-submit]') {
        mysqli_query($add_place, $connect);
    }
    echo 'Thêm điểm thành công';
    mysqli_close($connect);
?>