<?php
    require_once("assets/php/connectd.php");
    if(isset($_POST['btn-submit'])) {
        $tenDiaDiem = $_POST['tendiadiem'];
        $diaChi = $_POST['diachi'];
        $toaDo = $_POST['toado'];
        $lienHe = $_POST['lienhe'];
        $website = $_POST['website'];
        //$images = $_FILES['images']['name'];
        //Insert table
        if ($tenDiaDiem == "" || $diaChi == "" || $toaDo == "") {
            $noti = "<p style='color:red; font-size: 16px;'>Yêu cầu nhập đầy đủ *</p>";
        } else {
            $sql_addplace = "INSERT INTO addbeer (TenDiaDiem, DiaChi, ToaDo, LienHe, Web) VALUES ('$tenDiaDiem', '$diaChi', '$toaDo', '$lienHe', '$website')";
            mysqli_query($connect, $sql_addplace);
            $noti = "<p style='color:green; font-size: 16px;'>Thêm điểm thành công!</p>";
            mysqli_close($connect);
        }
    } else {
        $noti = "";
    }
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Thêm địa điểm - Map</title>
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
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
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
                        <a class="nav-link active" data-bs-hover-animate="pulse" href="addplace.php"><i class="material-icons">add_location</i><span>Thêm địa điểm</span></a>
                        <a class="nav-link" data-bs-hover-animate="pulse" href="review.php"><i class="material-icons">speaker_notes</i><span>Đánh giá</span></a>
                        <a class="nav-link" data-bs-hover-animate="pulse" href="manage.php"><i class="typcn typcn-th-large-outline"></i><span>Quản lý địa điểm</span></a>
                        <a class="nav-link" data-bs-hover-animate="pulse" href="profile.php"><i class="icon-user"></i><span>Tài khoản</span></a>
                        <a class="nav-link" data-bs-hover-animate="pulse" href="aboutus.php"><i class="typcn typcn-info-large-outline"></i><span>Nhóm thực hiện</span></a>
                    </li>
                </ul>
                <div><input class="btn btn-lg" id="login-popup" type="submit" value="Đăng nhập" style="background-color:rgb(28, 186, 107); color: white; font-size: 14px; border-radius: 0.1rem;" onclick="openFormLogin();"></div>
                <div class="form-popup" id="loginForm">

                    <form action="assets/php/login.php" id="login-form" name="login-form" class="form-container" method="POST">
                        <input type="text" placeholder="Tài khoản" id="user" name="user" >
                        <input type="password" placeholder="Mật khẩu" id="psw" name="psw">

                        <input type="submit" value="Đăng nhập" style="font-size: 16px; margin-bottom: 10px;" class="btn" id="btn_login" name="input-login" onclick="SubFormLogin();return false">
                        <input type="reset" value="Đóng" style="font-size: 16px;" class="btn cancel" id="btn-close" onclick="closeFormLogin();">
                    </form>

                </div>
            </div>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <div class="container-fluid">
                    <h1 class="text-center text-primary mb-1" data-aos="zoom-in-down">Thêm địa điểm</h1>
                </div>
                
                <div class="jumbotron">
                
                    <div class="card" >
                        <div class="card-body" >
                            <div id="submitF" style="margin-bottom:10px; color:red;"><?php echo $noti;?></div>
                            <form action="addplace.php"  id="input-form" method="POST" enctype="multipart/form-data">
                                <div class="input-group">
                                    <div class="input-group-prepend"><span class="input-group-text icon-container"><i class="fa fa-home"></i></span></div>
                                        <input type="text" id="tendiadiem" name="tendiadiem" class="form-control" placeholder="Tên địa điểm *">
                                    </div>

                                <div class="input-group">
                                    <div class="input-group-prepend"><span class="input-group-text icon-container"><i class="fas fa-address-card"></i></span></div>
                                        <input type="text" id="diachi" name="diachi" class="form-control" placeholder="Địa chỉ *">
                                    </div>

                                <div class="input-group">
                                    <div class="input-group-prepend"><span class="input-group-text icon-container"><i class="icon ion-ios-location"></i></span></div>
                                        <input type="text" id="toado" name="toado" class="form-control" placeholder="Toạ độ *: longitude, latitude">
                                    </div>

                                <div class="input-group">
                                    <div class="input-group-prepend"><span class="input-group-text icon-container"><i class="fa fa-phone"></i></span></div>
                                        <input type="text" id="lienhe" name="lienhe" class="form-control" placeholder="Liên lạc"></div>

                                <div class="input-group">
                                    <div class="input-group-prepend"><span class="input-group-text icon-container"><i class="icon ion-earth"></i></span></div>
                                        <input type="text" id="website" name="website" class="form-control" placeholder="Website">

                                </div>
                                <!--
                                <label>Thêm ảnh cho địa điểm này:</label></br>
                                <input type="file" accept="image/png" id="images" name="images">
                                -->
                                <div class="mt-4">
                                    <input class="btn btn-success btn-lg" type="submit" value="Thêm" name="btn-submit" onclick="if(!checkValidCoord()){document.getElementById('submitF').innerHTML = 'Nhập sai toạ độ.';return false;}" style="width: 118px;"></input>
                                    <input class="btn btn-lg" id="resetBtn" type="reset"  name="btn-reset" onclick="resetError();" style="width: 118px;color: red;"></input>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function resetError() {
            document.getElementById("submitF").innerHTML = "";
        }
        
        //Kiểm tra tính hợp lệ của Toạ độ nhập vào
        function checkValidCoord() {
            ck_lon = /^(-?(?:1[0-7]|[1-9])?\d(?:\.\d{1,18})?|180(?:\.0{1,18})?)$/;
            ck_lat = /^(-?[1-8]?\d(?:\.\d{1,18})?|90(?:\.0{1,18})?)$/;
            var str = document.getElementById("toado").value;
            var coords = str.split(",");
            var lon = coords[0];
            var lat = coords[1];
            var validLon = ck_lon.test(lon.trim());
            var validLat = ck_lat.test(lat.trim());
            if (validLat && validLon) {
                return true;
            } else {
                return false;
            }
        }
        
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
</body>
</html>