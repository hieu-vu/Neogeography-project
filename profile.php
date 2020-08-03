<!DOCTYPE html>
<html>

<head>
    <meta name="google-signin-client_id" content="807397581165-8lkv1rllj4qv7gkftvc2dfhh913j3uhs.apps.googleusercontent.com">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Tài khoản - Beer Map</title>
    <link rel="icon" href="assets/img/beerMap.png" type="image/x-icon">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="assets/fonts/material-icons.min.css">
    <link rel="stylesheet" href="assets/fonts/simple-line-icons.min.css">
    <link rel="stylesheet" href="assets/fonts/typicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="assets/css/Icon-Input.css">
    <link rel="stylesheet" href="assets/css/review.css">
    <link rel="stylesheet" href="assets/css/x-dropdown.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/login-popup.css">

    <script src="https://apis.google.com/js/platform.js?onload=init" async defer></script>

    <style>
        .fa {
            margin-right: 5px;
            padding: 10px;
            font-size: 20px;
            width: 40px;
            text-align: center;
            text-decoration: none;
            border-radius: 50%;
        }
        /* Add a hover effect if you want */
        .fa:hover {
            opacity: 0.7;
        }
        /* Set a specific color for each brand */
        /* Facebook */
        .fa-facebook {
            background: #3B5998;
            color: white;
        }
        /* Twitter */
        .fa-twitter {
            background: #55ACEE;
            color: white;
        }
        p {
            font-size: 30px;
        }
        .btn:hover {
            opacity: 0.8;
        }
        input {
            margin-top: 10px;
            width: 120px;
            height: 36px;           
        }
</style>

</head>

<body id="page-top">
    <div id="wrapper">
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0">
            <div class="container-fluid d-flex flex-column p-0">
                <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" data-bs-hover-animate="swing" href="#">
                    <div class="sidebar-brand-icon rotate-n-15"><i class="fas fa-map-marked-alt"></i></div>
                    <div class="sidebar-brand-text mx-3"><span>Beer Map-04</span></div>
                </a>
                <form class="form-inline d-none d-sm-inline-block mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                    <div class="input-group"></div>
                </form>
                <ul class="nav navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" data-bs-hover-animate="pulse" href="index.php"><i class="material-icons">place</i><span>Địa điểm</span></a></li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" data-bs-hover-animate="pulse" href="addplace.php"><i class="material-icons">add_location</i><span>Thêm địa điểm</span></a>
                        <a class="nav-link" data-bs-hover-animate="pulse" href="review.php"><i class="material-icons">speaker_notes</i><span>Đánh giá</span></a>
                        <a class="nav-link" data-bs-hover-animate="pulse" href="manage.php"><i class="typcn typcn-th-large-outline"></i><span>Quản lý địa điểm</span></a>
                        <a class="nav-link active" data-bs-hover-animate="pulse" href="profile.php"><i class="icon-user"></i><span>Tài khoản</span></a>
                        <a class="nav-link" data-bs-hover-animate="pulse" href="aboutus.php"><i class="typcn typcn-info-large-outline"></i><span>Nhóm thực hiện</span></a>
                    </li>
                </ul>
                <div class="g-signin2" data-onsuccess="onSignIn" ></div>
                <div><input class="btn btn-lg" id="login-popup" type="submit" value="Đăng nhập" style="background-color:rgb(28, 186, 107); color: white; font-size: 14px; border-radius: 0.1rem;" onclick="openFormLogin();closeFormSignup();"></div>
                <div><input class="btn btn-lg" type="submit" value="Đăng ký" style=" color: white; font-size: 14px; border-radius: 0.1rem;" onclick="openFormSignUp();closeFormLogin();"></div>
                <div><input class="btn btn-lg" type="reset" value="Đăng xuất" style="color:crimson; font-size: 14px; border-radius: 0.1rem;" onclick="signOut();window.location.reload();"></div>
                <div class="form-popup" id="loginForm">

                    <form action="assets/php/login.php" id="login-form" name="login-form" class="form-container" method="POST">
                        <p id="noti-login" style="color:red; font-size: 16px;"></p>
                        <input type="text" placeholder="Tài khoản" id="user" name="user" >
                        <input type="password" placeholder="Mật khẩu" id="psw" name="psw">

                        <input type="submit" value="Đăng nhập" style="font-size: 16px;" class="btn" id="btn_login" onclick="SubFormLogin();return false">
                        <input type="reset" value="Huỷ" style="font-size: 16px;" class="btn cancel" id="btn-close" onclick="closeFormLogin();">
                    </form>

                </div>
                <div class="form-popup" id="signUpForm">

                    <form action="assets/php/signup.php" id="signup-form" class="form-container" method="POST">
                        <p id="noti-signup" style="color:red; font-size: 16px;"></p>
                        <input type="text" placeholder="Email" id="newemail" name="newemail" required>
                        <input type="text" placeholder="Tài khoản" id="newuser" name="newuser" required>
                        <input type="password" placeholder="Mật khẩu" id="newpsw" name="newpsw" required>

                        <input type="submit" value="Đăng ký" style="font-size: 16px;" class="btn" id="btn_signup" onclick="SubFormSignUp();return false">
                        <input type="reset" value="Huỷ" style="font-size: 16px;" class="btn cancel" id="btn-close" onclick="closeFormSignup();">
                    </form>

                </div>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <div class="container-fluid text-white">
                    <h1 class="text-center text-primary mb-1" data-aos="zoom-in-down">Tài khoản</h1>
                </div>
                <div class="container-fluid" style="margin-top: 20px;">
                    <div class="row mb-3">
                            <div class="col">
                                <div class="col">
                                    <div class="card shadow mb-3">
                                        <div class="card-header py-3">
                                            <p class="text-primary m-0 font-weight-bold">Thông tin chung</p>      
                                        </div>                                        
                                        <div class="card-body">
                                            <form action="assets/php/login.php" method="POST">
                                                <div class="form-row">
                                                    <div class="row">
                                                        <div class="text-center" style="padding-top: 10px; width: 330px;">
                                                            <img id="imageUser" class="rounded-circle mb-3 mt-4"  width="190" height="190">
                                                            <div class="form-group"><p id="nameUser">_</p></div>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label for="first_name"><strong>ID</strong></label>   <p name="nID" id="idUser">_</p></div>
                                                        <div class="form-group">
                                                            <label for="first_name"><strong>Địa chỉ email</strong></label>   <p id="emailUser">_</p></div>
                                                        <div class="form-group">
                                                            <label for="first_name"><strong>Đã đánh giá</strong></label>   <p id="reviewUser">_</p></div>
                                                        <div class="form-group">
                                                            <label for="first_name"><strong>Địa điểm đã thêm</strong></label>   <p id="addPlaceUser">_</p></div>
                                                        <div class="form-group">
                                                            <label for="first_name"><strong>Liên hệ</strong></label>
                                                            <div>
                                                                <a href="https://facebook.com" class="fa fa-facebook"></a>
                                                                <a href="https://twitter.com" class="fa fa-twitter"></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function SubFormLogin() {
            $.ajax({
                url:'assets/php/login.php',
                type:'post',
                data:$('#login-form').serialize()
            });
        }

        function SubFormSignUp() {
            $.ajax({
                url:'assets/php/signup.php',
                type:'post',
                data:$('#signup-form').serialize()
            });
        }
    </script>
    <script src="assets/js/dbconnect.js"></script>
    <script src="assets/js/profile.js"></script>
    <script src="assets/js/signIn.js"></script>
    <script src="https://apis.google.com/js/api.js"></script>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.js"></script>
</body>
</html>