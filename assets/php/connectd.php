<?php
    $hostname = 'localhost';
    $username = 'mysql.sys';
    $password = '';
    $dbname = "test";
    $connect = mysqli_connect($hostname, $username, $password);
    if (!$connect) { 
        die('Kết nối không thành công!' . mysqli_error()); 
        exit();
    }
    mysqli_select_db($connect, $dbname);
    //Insert table
    $add_place = "INSERT INTO addplace (id, tendiadiem, diachi) VALUES ('$_POST[nCoordinate]', '$_POST[nPlace]', '$_POST[nAddress]')";//, '$_POST[nCoordinate]'
    mysqli_query($connect, $add_place);
    mysqli_close($connect);
?>
<?php
echo 'Thêm điểm thành công';
?>