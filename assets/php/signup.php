<?php
    require_once("connectd.php");
    if (isset($_POST['btn-signup'])) {
        //lấy thông tin từ các form bằng phương thức POST
        $username = $_POST["newuser"];
        $password = $_POST["newpsw"];
        $email = $_POST['newemail'];

        // Kiểm tra tài khoản đã tồn tại
        $sql="SELECT * from users where username='$username'";
        $kt=mysqli_query($connect, $sql);
        if(mysqli_num_rows($kt)  > 0){
            $noti = "Tài khoản đã tồn tại.";
        } else {
            //thực hiện việc lưu trữ dữ liệu vào db
            $sql = "INSERT INTO users ( username, passwordd, email ) VALUES ('$username', '$password', '$email')";
            mysqli_query($connect,$sql);
            $noti = "Đăng ký thành công!";
            echo $noti;
        }
    }
?>