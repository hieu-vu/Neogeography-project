//Lấy thông tin người dùng
function onSignIn(googleUser) {
    var profile = googleUser.getBasicProfile();
    document.getElementById("idUser").innerHTML = profile.getId();
    document.getElementById("nameUser").innerHTML = profile.getName();
    document.getElementById("imageUser").src = profile.getImageUrl();
    document.getElementById("emailUser").innerHTML = profile.getEmail();
}
//Đăng xuất
function signOut() {
    var auth2 = gapi.auth2.getAuthInstance();
    auth2.signOut().then(function () {
        console.log('User signed out.');
    });
}

//Login Popup
function openFormLogin() {
    document.getElementById("loginForm").style.display = "block";
}

//Sign up popup
function openFormSignUp() {
    document.getElementById("signUpForm").style.display = "block";
}

function closeFormLogin() {
        document.getElementById("loginForm").style.display = "none";
}

function closeFormSignup() {
        document.getElementById("signUpForm").style.display = "none";
}
