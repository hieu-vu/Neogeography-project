<?php
    session_start();
    if (isset($_SESSION['loggedin'])):
?>

<?php
    require_once('assets/php/connectd.php');

    if (isset($_POST['btn-import'])) {
        
        $tmp_name = $_FILES['inputFile']['tmp_name'];
        $target_dir = 'assets\KML_Import';
        $file_name = $_FILES['inputFile']['name'];

        if(move_uploaded_file($tmp_name,"$target_dir/$file_name")){
            $name_file = "assets/KML_Import/$file_name";
            $file = file_get_contents($name_file);
            $xmldata = simplexml_load_string($file);
            $placemarks = $xmldata->Document->Placemark;
            for ($i = 0; $i < count($placemarks); $i++) {
                $coordinates = $placemarks[$i]->coordinates;
                $coord = $placemarks[$i]->Point->coordinates;
                $name = $placemarks[$i]->name;

                $sql = "INSERT INTO addbeer (TenDiaDiem, ToaDo) VALUES ('$name','$coord')";

                mysqli_query($connect,$sql);
            }
        } else {
            echo "<script>alert('Nhập lỗi! Chưa thêm file hay gì?');</script>";
        }
}
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
                    <div class="sidebar-brand-icon rotate-n-15"><i class="fas fa-beer"></i></div>
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
                    <form action="manage.php" method="POST" style="float:left;" id="import-form" name="import-form" enctype="multipart/form-data">
                        <label for="inputFile" style="border-color:gray; margin-left:10px;margin-top:8px;" class="btn"><img src="https://img.icons8.com/windows/32/000000/add-file.png"/></label>   
                        <input type="file" id="inputFile" name="inputFile" accept=".kml" style="display:none;margin-top:0px;"></input>
                        <input class="btn btn-lg btn-success" name="btn-import" type="submit" value="Nhập file KML"
                                style="width: 148px; margin-left:10px; margin-top:10px; margin-bottom:10px; font-size:18px; float:auto;">
                        </input>
                    </form>
                    <p id="file_name" name="file_name"></p>
                    <form action="assets/php/outputKML.php" method="POST" style="float:left;">
                        <input class="btn btn-lg btn-success" name="btn-output" type="submit" value="Xuất file KML"  name="btn"
                                style="width: 148px;
                                margin-left:10px;
                                margin-top:10px;
                                margin-bottom:10px;
                                font-size:18px; ">
                        </input>
                    </form>
                </div>
                <form action="manage.php" method="POST" id="box" name="form-table">
                <table class="table my-0 display" id="dataTable">
                    <thead>
                        <tr>
                            <th>TT</th>
                            <th>Tên địa điểm</th>
                            <th>Địa chỉ</th>
                            <th>Toạ độ</th>
                            <th>Xoá</th>
                        </tr>
                    </thead>
                    <tbody>
<?php
    $result = mysqli_query($connect,"SELECT * FROM addbeer");
    $count_rows = mysqli_num_rows($result);
    if($count_rows > 0) {
        $i = 0;
        while ($row = mysqli_fetch_array($result)) {
            $i = $i + 1;
            $iD = $row['id'];
            $tenDiaDiem = $row['TenDiaDiem'];
            $diaChi = $row['DiaChi'];
            $toaDo = $row['ToaDo'];
            echo 
            "<tr>
                <td>$i</td>
                <td>$tenDiaDiem</td>
                <td>$diaChi</td>
                <td>$toaDo</td>
                <td class='text-center'><a href='assets/php/deletePlace.php?id=$iD'>Xoá</a></td>
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
                </tbody>
                </table>
                </form>
            </div>
            <footer style="margin-top:60px;"></footer>
        </div>
    </div>
    <button onclick="topFunction()" id="myBtn" title="Lên đầu trang"><img src="https://img.icons8.com/metro/52/000000/up--v1.png"></button>
    <script>
    /* Xử lý cục bộ
        function deletePlace() {
            $.ajax({
                url:'assets/php/deletePlace.php',
                type:'post',
                data:$('#form-table').serialize(),
                success: function() {
                    window.location.reload();
                }
            });
        }
        */
        //Xử lý nút cuộn lên đầu trang
        var mybutton = document.getElementById("myBtn");
        // Khi cuộn xuống 20px từ trên xuống, button sẽ xuất hiện
        window.onscroll =  function scrollFunction() {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                mybutton.style.display = "block";
            } else {
                mybutton.style.display = "none";
            }
        }
        // Khi người dùng nhấn vào nút, trang sẽ được cuộn lên đầu
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

<?php
    else:
        header("Location:login.php");
    endif;
?>