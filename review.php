<?php
    require_once('assets/php/connectd.php');
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Đánh giá - Map</title>
    <link rel="icon" href="assets/img/beerMap.png" type="image/x-icon">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="assets/fonts/material-icons.min.css">
    <link rel="stylesheet" href="assets/fonts/simple-line-icons.min.css">
    <link rel="stylesheet" href="assets/fonts/typicons.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="assets/css/Icon-Input.css">
    <link rel="stylesheet" href="assets/css/review.css">
    <link rel="stylesheet" href="assets/css/x-dropdown.css">
    <link rel="stylesheet" href="assets/css/login-popup.css">
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
                    <div class="input-group">
                        <div class="input-group-append"></div>
                    </div>
                </form>
                <ul class="nav navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" data-bs-hover-animate="pulse" href="index.php"><i class="material-icons">place</i><span>Địa điểm</span></a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" data-bs-hover-animate="pulse" href="addplace.php"><i class="material-icons">add_location</i><span>Thêm địa điểm</span></a>
                        <a class="nav-link active" data-bs-hover-animate="pulse" href="review.php"><i class="material-icons">speaker_notes</i><span>Đánh giá</span></a>
                        <a class="nav-link" data-bs-hover-animate="pulse" href="manage.php"><i class="typcn typcn-th-large-outline"></i><span>Quản lý địa điểm</span></a>
                        <a class="nav-link" data-bs-hover-animate="pulse" href="profile.php"><i class="icon-user"></i><span>Tài khoản</span></a>
                        <a class="nav-link" data-bs-hover-animate="pulse" href="aboutus.php"><i class="typcn typcn-info-large-outline"></i><span>Nhóm thực hiện</span></a>
                    </li>
                </ul>
                <div><input class="btn btn-lg" id="login-popup" type="submit" value="Đăng nhập" style="background-color:rgb(28, 186, 107); color: white; font-size: 14px; border-radius: 0.1rem;" onclick="openFormLogin();"></div>
                <div class="form-popup" id="loginForm">

                    <form action="assets/php/login.php" id="login-form" name="login-form" class="form-container" method="POST">
                        <p id="noti-login" style="color:red; font-size: 16px;"></p>
                        <input type="text" placeholder="Tài khoản" id="user" name="user" >
                        <input type="password" placeholder="Mật khẩu" id="psw" name="psw">

                        <input type="submit" value="Đăng nhập" style="font-size: 16px; margin-bottom: 10px;" class="btn" id="btn_login" name="input-login" onclick="SubFormLogin();return false">
                        <input type="reset" value="Đóng" style="font-size: 16px;" class="btn cancel" id="btn-close" onclick="closeFormLogin();">
                    </form>

                </div>
            </div>
        </nav>
        <div class="d-flex " id="content-wrapper">
            <div id="content">
                <div class="container-fluid">
                    <h1 class="text-center text-primary mb-1" data-aos="zoom-in-down">Đánh giá</h1>
                </div>
                <div class="jumbotron">
                    <div class="card" style="margin-top: -22px;">
                        <div class="card-body">
                            <h4 class="text-center card-title">Viết nhận xét của bạn</h4>
                            <form action="#" method="POST" id="review-form">
                            <div class="x-dropdown dropdown">
                                <div class="text-left x-drop-btn" data-toggle="dropdown" aria-expanded="false"><span>Lựa chọn địa điểm</span><i class="material-icons">keyboard_arrow_down</i></div>
                                <div class="dropdown-menu" role="menu">
                                <?php
                                    
                                ?>
                                    <a class="dropdown-item" role="presentation" href="#">Quán nhậu 1</a>
                                    <a class="dropdown-item" role="presentation" href="#">Quán nhậu 2</a>
                                    <a class="dropdown-item" role="presentation" href="#">Quán nhậu 3</a>
                                </div>
                            </div>
                            <div class="form-group"><small class="form-text" style="height: 24px;margin-top: 13px;">Chạm để xếp hạng:</small>
                                <div class="form-group">
                                    <div class="text-left star-rating" style="font-size: 25px;color: #f9dd16;">
                                        <span class="fa fa-star-o" style="padding-right: 1px;padding-left: 1px;" data-rating="1"></span>
                                        <span class="fa fa-star-o" style="padding-right: 1px;padding-left: 1px;" data-rating="2"></span>
                                        <span class="fa fa-star-o" style="padding-right: 1px;padding-left: 1px;" data-rating="3"></span>
                                        <span class="fa fa-star-o" style="padding-right: 1px;padding-left: 1px;" data-rating="4"></span>
                                        <span class="fa fa-star-o" style="padding-right: 1px;padding-left: 1px;" data-rating="5"></span>
                                        <input class="form-control rating-value" type="hidden" id="rate" name="Rating" value="0" />
                                    </div>
                                </div>                      
                            </div>   
                                <p>Tiêu đề:</p><input class="form-control" type="text">
                                <p style="margin-top: 20px;">Nhận xét (Tuỳ chọn):</p><textarea class="form-control" style="height: 130px;"></textarea>
                                <div class="mt-4">
                                    <input class="btn btn-success btn-lg text-center" type="submit" value="Nhận xét" onclick="SubFormNhanXet();return false" style="padding-top: 8px;width: 115px;">
                                    <input class="btn  btn-lg" type="reset" value="Huỷ" style="padding-top: 8px;width: 115px; color: red;">
                                </div>

                            </form>
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
                data:$('#login-form').serialize(),
                success:function() {
                    document.getElementById("login-popup").value = "Đã đăng nhập";
                    closeFormLogin();
                }
            });
        }
        function SubFormNhanXet() {
            $.ajax({
                url:'assets/php/review.php',
                type:'post',
                data:$('#review-form').serialize(),
                success:function() {
                    //document.getElementById("submitDone").innerHTML = "Thêm thành công";
                }
            });
        }
        //Login Popup
        function openFormLogin() {
            document.getElementById("loginForm").style.display = "block";
        }
        function closeFormLogin() {
                document.getElementById("loginForm").style.display = "none";
        }
    </script>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.js"></script>
    <script src="assets/js/review.js"></script>
</body>
</html>