<?php
  session_start(); //Bắt đầu phiên đăng nhập
?>
<?php
	//Gọi file connectd.php kết nối
	require_once("assets/php/connectd.php");
	// Kiểm tra nếu người dùng đã ân nút đăng nhập thì mới xử lý
	if (isset($_POST["btn_submit"])) {
      // lấy thông tin người dùng nhập
      $username = $_POST["username"];
      $password = $_POST["password"];
      //Fix SQL Injection
      $username = strip_tags($username);
      $username = addslashes($username);
      $password = strip_tags($password);
      $password = addslashes($password);

      $sql = "SELECT * FROM users where username = '$username' and passwordd = '$password' ";
      $query = mysqli_query($connect,$sql);
      $num_rows = mysqli_num_rows($query);

      if ($num_rows==0) {
          $noti = "Sai tài khoản hoặc mật khẩu!";
      } else {
          $_SESSION['loggedin'] = true;
          header("Location:index.php");
      }
	} else {
      $noti = "";
  }
?>

<!DOCTYPE html>
<html lang="utf8">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style-login.css">
</head>
<body>
    <form action="login.php" method='post' class="login-form">
      <h1>Đăng nhập</h1>
      <p name="noti" style="color:red; margin-bottom: 20px;"><?php echo $noti; ?></p>
      <div class="textb">
        <input type="text" name ='username'>
        <div class="placeholder">Tài khoản</div>
      </div>

      <div class="textb">
        <input type="password" name='password' required>
        <div class="placeholder">Mật khẩu</div>
        <div class="show-password fas fa-eye-slash"></div>
      </div>

      <div class="checkbox">
        <input type="checkbox">
        <div class="fas fa-check"></div>
        Lưu đăng nhập
      </div>

      <button class="btn fas fa-arrow-right" name='btn_submit' value="đăng nhập" disabled></button>
      <a href="#">Quên mật khẩu?</a>
      <a href="register.php">Đăng ký tài khoản mới</a>
    </form>

    <script>
    //Xử l Ẩn hiển mật khẩu
      var fields = document.querySelectorAll(".textb input");
      var btn = document.querySelector(".btn");
      function check(){
        if(fields[0].value != "" && fields[1].value != "")
          btn.disabled = false;
        else
          btn.disabled = true;  
      }

      fields[0].addEventListener("keyup",check);
      fields[1].addEventListener("keyup",check);

      document.querySelector(".show-password").addEventListener("click",function(){
        if(this.classList[2] == "fa-eye-slash"){
          this.classList.remove("fa-eye-slash");
          this.classList.add("fa-eye");
          fields[1].type = "text";
        }else{
          this.classList.remove("fa-eye");
          this.classList.add("fa-eye-slash");
          fields[1].type = "password";
        }
      });
    </script>
</body>
</html>
