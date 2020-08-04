<?php
    require_once('assets/php/connectd.php');
?>

<?php
    if (isset($_POST['btn-review']) && isset($_POST['select-review'])) {
        $id = $_POST['select-review'];
        $xepHang = $_POST['Rating'];
        $tieuDe = $_POST['tieuDe'];
        $noiDung = $_POST['noiDung'];
        //Insert table
        if ($id == 0 || $xepHang == 0 || $tieuDe == "" || $noiDung == "") {
            $noti = "<p style='color:red; font-size: 16px;'>Bạn cần thêm đầy đủ thông tin.</p>";
        } else {
            $sql_rev = "INSERT INTO reviews (id, TieuDe, NoiDung, XepHang ) VALUES ('$id', '$tieuDe', '$noiDung', '$xepHang')";
            mysqli_query($connect, $sql_rev);
            $noti = "<p style='color:green; font-size: 16px;'>Đã thêm nhận xét!</p>";
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
    <style>
    #readReview {
        display:none;
    }
    #ulSelect {
        background-color: #dddddd;
        list-style-type: none;
        margin: 0;
        padding: 0;
        overflow: hidden;
        background-color: #333;

    }

    #liSelect {
        float: left;
        margin-left: 0px;
        display: block;
        color: white;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
    }

    #liSelect:hover {
        background-color: #3583F3;
    }
    .card {
        box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
    }
    </style>
</head>

<body id="page-top">
    <div id="wrapper">
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0">
            <div class="container-fluid d-flex flex-column p-0">
                <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0"
                    data-bs-hover-animate="swing" href="#">
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
                        <a class="nav-link" data-bs-hover-animate="pulse" href="index.php"><i
                                class="material-icons">place</i><span>Địa điểm</span></a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" data-bs-hover-animate="pulse" href="addplace.php"><i
                                class="material-icons">add_location</i><span>Thêm địa điểm</span></a>
                        <a class="nav-link active" data-bs-hover-animate="pulse" href="review.php"><i
                                class="material-icons">speaker_notes</i><span>Đánh giá</span></a>
                        <a class="nav-link" data-bs-hover-animate="pulse" href="manage.php"><i
                                class="typcn typcn-th-large-outline"></i><span>Quản lý địa điểm</span></a>
                        <a class="nav-link" data-bs-hover-animate="pulse" href="profile.php"><i
                                class="icon-user"></i><span>Tài khoản</span></a>
                        <a class="nav-link" data-bs-hover-animate="pulse" href="aboutus.php"><i
                                class="typcn typcn-info-large-outline"></i><span>Nhóm thực hiện</span></a>
                    </li>
                </ul>
                <div><input class="btn btn-lg" id="login-popup" type="submit" value="Đăng nhập"
                        style="background-color:rgb(28, 186, 107); color: white; font-size: 14px; border-radius: 0.1rem;"
                        onclick="openFormLogin();"></div>
                <div class="form-popup" id="loginForm">

                    <form action="assets/php/login.php" id="login-form" name="login-form" class="form-container"
                        method="POST">
                        <p id="noti-login" style="color:red; font-size: 16px;"></p>
                        <input type="text" placeholder="Tài khoản" id="user" name="user">
                        <input type="password" placeholder="Mật khẩu" id="psw" name="psw">

                        <input type="submit" value="Đăng nhập" style="font-size: 16px; margin-bottom: 10px;" class="btn"
                            id="btn_login" name="input-login" onclick="SubFormLogin();return false">
                        <input type="reset" value="Đóng" style="font-size: 16px;" class="btn cancel" id="btn-close"
                            onclick="closeFormLogin();">
                    </form>

                </div>
            </div>
        </nav>
        <div class="d-flex " id="content-wrapper">
            <div id="content">
                <div class="container-fluid">
                    <h1 class="text-center text-primary mb-1" data-aos="zoom-in-down">Đánh giá</h1>
                </div>
            <ul id="ulSelect">
                <li id="liSelect" onclick="openWriteReview();closeReadReview();">Viết nhận xét</li>
                <li id="liSelect" onclick="openReadReview();closeWriteReview();">Xem đánh giá</li>
            </ul>
<!---->
                <div class="jumbotron" id="writeReview">
                    <div class="card" style="margin-top: -22px;">
                        <div class="card-body">
                            <h4 class="text-center card-title">Viết nhận xét của bạn</h4>
                            <div id="reset-btn"><?php echo $noti; ?></div>
                            <form action="review.php" method="POST" id="writeReview-form" onsubmit="SubFormNhanXet();">
                                <div class="select" name="selectPlace" id="selectPlace">
                                    <select style="width: 100%; height: 40px; border-color:lightgrey; outline: none; border-radius:0.5rem;" name="select-review">
                                        <option value='0' >Chọn quán bạn muốn đánh giá</option>
                                        <?php
                                            $sql = "SELECT * FROM addbeer";
                                            $result = mysqli_query($connect, $sql);
                                            while ($row = mysqli_fetch_array($result)) {
                                                $iD = $row['id'];
                                                $tenDiaDiem = $row['TenDiaDiem'];
                                                echo
                                                "<option value='$iD'>$tenDiaDiem</option>";
                                            }                                            
                                        ?>
                                    </select>
                                </div>                               
                                <div class='form-group'>
                                <small class='form-text' style='height: 24px;margin-top: 13px;'>Chạm để xếp hạng:</small>
                                    <div class='form-group'>
                                        <div class='text-left star-rating' style='font-size: 25px;color: #f9dd16;'>
                                            <span class='fa fa-star-o' style='padding-right: 1px;padding-left: 1px;'
                                                data-rating='1'></span>
                                            <span class='fa fa-star-o' style='padding-right: 1px;padding-left: 1px;'
                                                data-rating='2'></span>
                                            <span class='fa fa-star-o' style='padding-right: 1px;padding-left: 1px;'
                                                data-rating='3'></span>
                                            <span class='fa fa-star-o' style='padding-right: 1px;padding-left: 1px;'
                                                data-rating='4'></span>
                                            <span class='fa fa-star-o' style='padding-right: 1px;padding-left: 1px;'
                                                data-rating='5'></span>
                                            <input class='form-control rating-value' type='hidden' id='rate'
                                                name='Rating' value='0' />
                                        </div>
                                    </div>
                                </div>

                                <p>Tiêu đề:</p><input class="form-control" type="text" name="tieuDe">
                                <p style="margin-top: 20px;">Nhận xét (Tuỳ chọn):</p><textarea class="form-control" name="noiDung"
                                    style="height: 130px;"></textarea>
                                <div class="mt-4">
                                    <input class="btn btn-success btn-lg text-center" type="submit" value="Nhận xét" name="btn-review"
                                        style="padding-top: 8px;width: 115px;">
                                    <input class="btn  btn-lg" type="reset" value="Reset"
                                        onclick="resetError();" style="padding-top: 8px;width: 115px; color: red;">
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
<!---->
<!---->
                <div class="jumbotron" id="readReview">
                     <h2 class="text-center">Xem các đánh giá</h2>
                <?php
                        $sql_rev = "SELECT * FROM reviews";
                        $result_rev = mysqli_query($connect, $sql_rev);

                        while ($row = mysqli_fetch_array($result_rev)) {
                            $id = $row['id'];
                            if ($id != 0) {
                                $result_adb = mysqli_query($connect, "SELECT TenDiaDiem FROM addbeer Where id = $id");
                                $tenDiaDiem = mysqli_fetch_assoc($result_adb);

                                $tieuDe = $row['TieuDe'];
                                $noiDung = $row['NoiDung'];
                                $xepHang = $row['XepHang'];
                                echo 
                                    "<div class='card' style='margin-top: 22px;'>
                                        <div class='card-body' >
                                            <h4 class='card-title'>".$tenDiaDiem['TenDiaDiem']."</h4>
                                            <img style='max-width:400px; float:right' src='https://p2d7x8x2.stackpathcdn.com/wordpress/wp-content/uploads/2020/03/iStock-1040303026.jpg'>
                                            <form action='review.php' method='POST' id='viewReview-form'>
                                                    <h6 style='margin-top:20px;'>Xếp hạng:</h6>
                                                    <p style='color:green;'>$xepHang điểm</p>
                                                    <h6>Tiêu đề:</h6>
                                                    <p style='color:green;'>$tieuDe</p>
                                                    <h6 style='margin-top: 20px;'>Nội dung nhận xét:</h6>
                                                    <p style='color:green;'>$noiDung</p>
                                            </form>
                                        </div>
                                    </div>
                                ";
                            }
                    }
                ?>
                </div>
<!---->
            </div>
        </div>
    </div>
    <script>
    function resetError() {
        document.getElementById("reset-btn").innerHTML = "";
    }
    function SubFormLogin() {
        $.ajax({
            url: 'assets/php/login.php',
            type: 'post',
            data: $('#login-form').serialize(),
            success: function() {
                document.getElementById("login-popup").value = "Đã đăng nhập";
                closeFormLogin();
            }
        });
    }

    function SubFormNhanXet() {
        $.ajax({
            url: 'review.php',
            type: 'post',
            data: $('#writeReview-form').serialize(),
            success: function() {
            }
        });
    }
    function SubFormXem() {
        $.ajax({
            url: 'review.php',
            type: 'post',
            data: $('#viewReview-form').serialize(),
            success: function() {
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

    function openReadReview() {
        document.getElementById("readReview").style.display = "block";
    }

    function closeReadReview() {
        document.getElementById("readReview").style.display = "none";
    }

    function openWriteReview() {
        document.getElementById("writeReview").style.display = "block";
    }

    function closeWriteReview() {
        document.getElementById("writeReview").style.display = "none";
    }
    </script>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.js"></script>
    <script src="assets/js/review.js"></script>
</body>

</html>