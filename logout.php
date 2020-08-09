<?php
// Khởi tạo phiên
session_start();
 
// Loại bỏ tất cả các biến trong phiên
$_SESSION = array();
 
// Kết thúc phiên
session_destroy();
 
// Chuyển hướng về trang đăng nhập
header("location: login.php");
exit;
?>