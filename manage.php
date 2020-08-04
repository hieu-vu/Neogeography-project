<?php
    require_once('assets/php/connectd.php');
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Quản lý địa điểm - Beer Map</title>
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

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        #myBtn {
            display: none;
            position: fixed;
            bottom: 20px;
            right: 50px;
            z-index: 99;
            font-size: 18px;
            border: none;
            outline: none;
            background-color:#3385FF;
            color: white;
            cursor: pointer;
            padding: 10px;
            border-radius: 65px;
            opacity: 0.6;
        }
        #myBtn:hover {
            opacity: 1;
            
        }
        img {
            height: 32px;
            width: 32px;
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
                        <a class="nav-link active" data-bs-hover-animate="pulse" href="manage.php"><i class="typcn typcn-th-large-outline"></i><span>Quản lý địa điểm</span></a>
                        <a class="nav-link" data-bs-hover-animate="pulse" href="profile.php"><i class="icon-user"></i><span>Tài khoản</span></a>
                        <a class="nav-link" data-bs-hover-animate="pulse" href="aboutus.php"><i class="typcn typcn-info-large-outline"></i><span>Nhóm thực hiện</span></a>
                    </li>
                </ul>
                
            </div>
        </nav>

        <div class="d-flex flex-column" id="content-wrapper">
            <h1 class="text-center text-primary mb-4" >Quản lý địa điểm</h1>
            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                <div>
                    <form action="assets/php/importKML.php" method="POST" style="float:left;" onsubmit="submitImport();//return false;" name="import-form">
                    <!--<input class="btn btn-lg btn-success" id="fileId" name="fileId" type="file" accept=".kml" hidden></input>-->
                    <input class="btn btn-lg btn-success" name="btn-import" type="submit" value="Nhập file KML"  name="btn" id="submitId"
                            style="width: 148px;
                            margin-left:10px;
                            margin-top:10px;
                            margin-bottom:10px;
                            font-size:18px; ">
                    </input>
                    </form>
                    <form action="assets/php/outputKML.php" method="POST" style="float:auto;">
                        <input class="btn btn-lg btn-success" name="btn-output" type="submit" value="Xuất file KML"  name="btn"
                                style="width: 148px;
                                margin-left:10px;
                                margin-top:10px;
                                margin-bottom:10px;
                                font-size:18px; ">
                        </input>
                    </form>
                </div>
                <form action="manage.php" method="POST" id="box">
                <table class="table my-0" id="dataTable">
                    <thead>
                        <tr>
                            <th>sID</th>
                            <th>Tên địa điểm</th>
                            <th>Địa chỉ</th>
                            <th>Toạ độ</th>
                            <th class="text-center">
                                <input class="btn btn-danger btn-sm" type="submit" value="Xoá" name="btn-delete" onclick="deleteConfirm();window.location.reload();">
                            </th>
                        </tr>
                    </thead>
                <?php
                    $result = mysqli_query($connect,"SELECT * FROM addbeer");
                    $count_rows = mysqli_num_rows($result);
                    if($count_rows > 0) {
                        while ($row = mysqli_fetch_array($result)) {
                            $iD = $row['id'];
                            $tenDiaDiem = $row['TenDiaDiem'];
                            $diaChi = $row['DiaChi'];
                            $toaDo = $row['ToaDo'];
                            echo 
                            "<tr>
                                <td>$iD</td>
                                <td>$tenDiaDiem</td>
                                <td>$diaChi</td>
                                <td>$toaDo</td>
                                <td class='text-center'><input id='delete-checkbox' name='delete-checkbox[]' value='$iD' type='checkbox'></td>
                            </tr>";
                        }
                    }
                    else {
                        echo
                            "<tr>
                                <td colspan='6'>Không có địa điểm nào được thêm.</td>
                            </tr>";
                    }
                ?>
                <?php
                    if(isset($_POST['btn-delete']) && isset($_POST['delete-checkbox']))
                    {
                        foreach($_POST['delete-checkbox'] as $del_id) {
                            $del_id = (int)$del_id;
                            $sql = "DELETE FROM addbeer WHERE id = '$del_id'";
                            mysqli_query($connect, $sql);
                        }
                    }
                ?>
                </table>
                </form>
            </div>
            <footer style="margin-top:60px;"></footer>
        </div>
    </div>
    <button onclick="topFunction()" id="myBtn" title="Lên đầu trang"><img src="https://img.icons8.com/metro/52/000000/up--v1.png"></button>
    <script>
        function submitImport() {
        $.ajax({
            url: 'assets/php/importKML.php',
            type: 'post',
            data: $('#import-form').serialize(),
            success: function() {
            }
        });
    }
    /*
        //Xử lý nhấn upload file
        document.getElementById('submitId').addEventListener('click', openDialog);
        function openDialog() {
            document.getElementById('fileId').click();
        }
*/
        function deleteConfirm() {
            del = confirm("Bạn có chắc muốn xoá những địa điểm này?");
            if(del) return true;
            return false;
        }

        //Get the button
        var mybutton = document.getElementById("myBtn");
        // When the user scrolls down 20px from the top of the document, show the button
        window.onscroll =  function scrollFunction() {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                mybutton.style.display = "block";
            } else {
                mybutton.style.display = "none";
            }
        }
        // When the user clicks on the button, scroll to the top of the document
        function topFunction() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        }
    </script>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.js"></script>
</body>
</html>