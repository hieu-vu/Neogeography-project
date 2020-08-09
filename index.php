<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Địa điểm quán nhậu - Beer Map</title>
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
    <style>
        input {
            z-index: 1;
            position: absolute;
            margin-left: 240px;
            margin-top: 10px;
            filter: blur(0px) invert(0%) sepia(0%);
            opacity: 100;
            height: 32px;
            width: 250px;
        }
      .controls {
            float:left;
            margin-top: 10px;
            margin-bottom: 20px;
            border: 1px solid transparent;
            border-radius: 2px 0 0 2px;
            box-sizing: border-box;
            -moz-box-sizing: border-box;
            height: 32px;
            outline: none;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
      }

      #destination-input {
        background-color: #fff;
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
        margin-left: 12px;
        padding: 0 11px 0 13px;
        text-overflow: ellipsis;
        width: 300px;
      }

      #destination-input:focus {
        border-color: #4d90fe;
      }

    </style>
</head>

<body id="page-top">
    <div id="wrapper">
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0">
            <div class="container-fluid d-flex flex-column p-0">
                <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" data-bs-hover-animate="swing" href="#">
                    <div class="sidebar-brand-icon rotate-n-15"><i class="fas fa-beer"></i></div>
                    <div class="sidebar-brand-text mx-3"><span>Beer Map-04</span></div>
                </a>
                <form class="form-inline d-none d-sm-inline-block mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                    <div class="input-group">
                        <div class="input-group-append"></div>
                    </div>
                </form>
                <ul class="nav navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" data-bs-hover-animate="pulse" href="index.php"><i class="material-icons">place</i><span>Địa điểm</span></a></li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" data-bs-hover-animate="pulse" href="addplace.php"><i class="material-icons">add_location</i><span>Thêm địa điểm</span></a>
                        <a class="nav-link" data-bs-hover-animate="pulse" href="review.php"><i class="material-icons">speaker_notes</i><span>Đánh giá</span></a>
                        <a class="nav-link" data-bs-hover-animate="pulse" href="manage.php"><i class="typcn typcn-th-large-outline"></i><span>Quản lý địa điểm</span></a>
                        <a class="nav-link" data-bs-hover-animate="pulse" href="profile.php"><i class="icon-user"></i><span>Tài khoản</span></a>
                        <a class="nav-link" data-bs-hover-animate="pulse" href="aboutus.php"><i class="typcn typcn-info-large-outline"></i><span>Nhóm thực hiện</span></a>
                    </li>
                </ul>
            </div>
        </nav>
        <div style="display: none">
            <input id="destination-input" class="controls" type="text"
                placeholder=" Chỉ đường tới địa điểm muốn đến">
        </div>
        <div class="d-flex flex-column" id="content-wrapper">Show Maps</div>
        <input
            id="searchBox"
            class="shadow-sm form-control-sm border-0 small"
            type="text"
            data-bs-hover-animate="pulse"
            placeholder="Tìm kiếm địa điểm, toạ độ"
        />
    </div>
    <script src="assets/js/index.js"></script>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.js"></script>
    
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDc563n4ko5g3-1Hjw1aC7dh71_vsU43es&callback=initMap&libraries=places&v=weekly" async defer></script>
</body>

</html>