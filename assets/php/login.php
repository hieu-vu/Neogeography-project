<?php
	//Kết nối vs csdl
	require_once("connectd.php");
	// lấy thông tin người dùng
	$username = $_POST["user"];
	$password = $_POST["psw"];

	//Fix SQL Injection
	$username = strip_tags($username);
	$username = addslashes($username);
	$password = strip_tags($password);
	$password = addslashes($password);

	$sql = "SELECT * FROM users where username = '$username' and passwordd = '$password' ";
	$query = mysqli_query($connect,$sql);
	$num_rows = mysqli_num_rows($query);
	if ($num_rows==0) {
		echo "Sai tài khoản hoặc mật khẩu!";
		//exit();
	} else {
		session_start();
		$_SESSION['user'] = $username;
		//echo  "Đăng nhập thành công";
		//include_once('addplace.php');
	}

?>