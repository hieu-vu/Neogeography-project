<?php
require_once("assets/php/connectd.php");
if (isset($_POST["btn_submit"])) {
	//lấy thông tin từ các form bằng phương thức POST
	$username = $_POST["username"];
	$password = $_POST["password"];
	$email = $_POST["email"];
	//Kiểm tra điều kiện bắt buộc đối với các field không được bỏ trống, không có khoảng cách
	if (preg_match('/\s/', $username) || preg_match('/\s/', $password)) {
		$noti = "Tài khoản hoặc mật khẩu không được có khoảng trống.";
	} 
	else if ($username == "" || $password == "" || $email == "") {
		$noti = "Vui lòng điền đầy đủ thông tin.";
	} else {
			// Kiểm tra tài khoản đã tồn tại chưa
			$sql="SELECT * FROM users where username='$username'";
			$check=mysqli_query($connect, $sql);

			if(mysqli_num_rows($check)  > 0) {
				$noti = "Tài khoản đã tồn tại";
			} else {
				//thực hiện việc thêm dữ liệu vào database
				$sql = "INSERT INTO users( username, passwordd, email) VALUES ('$username', '$password', '$email')";
				mysqli_query($connect,$sql);
				header("Location:login.php");
			}
	}
} else {
	$noti = "";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Đăng ký</title>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css">
		<link rel="stylesheet" href="assets/css/style-login.css">
</head>
<body>
		<form action="register.php" method='post' class="signup-form" onsubmit="if(!validateEmail())return false;">
			<h1>Đăng ký</h1>
			<p name="noti" style="color:red; margin-bottom: 20px;"><?php echo $noti; ?></p>
			<div class="textb">
				<input type="text" name ='email'>
				<div class="placeholder">Email</div>
			</div>

			<div class="textb">
				<input type="text" name ='username'>
				<div class="placeholder">Tài khoản</div>
			</div>

			<div class="textb">
				<input type="password" name='password'>
				<div class="placeholder">Mật khẩu</div>
			</div>

			<button class="btn fas fa-arrow-right" name='btn_submit' value="đăng ký"></button>
			<a href="login.php">Đăng nhập</a>
		</form>
</body>
<script>
//Kiểm tra email có đúng định dạng
	function validateEmail() {
		var re = /\S+@\S+\.\S+/;
		var email = document.getElementByName("email").value;
        if(!re.test(email)) {
			document.getElementByName("noti").innerHTML = "Email không đúng.";
			return false;
		} else {
			return true;
		}
    }
</script>
</html>