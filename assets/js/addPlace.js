var inputID = ["nPlace", "nAddress", "nCoord"];
var errorID = ["errorPlace", "errorAddress", "errorCoord"];
var errorDisplay = ["Tên địa điểm", "Địa chỉ", "Toạ độ"];

function checkInput() {
    for(var i=0; i <= 2; i++) {
        if (document.getElementById(inputID[i]).value == "") {
            document.getElementById(errorID[i]).innerHTML = "Vui lòng nhập " + errorDisplay[i];
        } else {
            document.getElementById(errorID[i]).innerHTML = "";
        }
    }
}

function resetError() {
    document.getElementById("submitDone").innerHTML = "";
    for(var i=0; i <= 2; i++) {
        document.getElementById(errorID[i]).innerHTML = "";
    }
}

//Kiểm tra tính hợp lệ của Toạ độ nhập vào
function checkValidCoord() {
    ck_lat = /^(-?[1-8]?\d(?:\.\d{1,18})?|90(?:\.0{1,18})?)$/;
    ck_lon = /^(-?(?:1[0-7]|[1-9])?\d(?:\.\d{1,18})?|180(?:\.0{1,18})?)$/;
    var str = document.getElementById("nCoord").value;
    var coords = str.split(",");
    var lat = coords[0];
    var lon = coords[1];
    if (lat == "" || lon == "") {
        document.getElementById("errorCoord").innerHTML == "Vui lòng nhập Toạ độ";
        return false;
    } else {
        var validLat = ck_lat.test(lat);
        var validLon = ck_lon.test(lon.trim());
        if (validLat && validLon) {
            document.getElementById("submitDone").innerHTML = "Thêm thành công!";
            return true;
        } else {
            document.getElementById("errorCoord").innerHTML = "Nhập Toạ độ không đúng!";
            return false;
        }
    }
}