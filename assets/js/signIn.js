function init() {
    gapi.load("auth2", function() {
        auth2 = gapi.auth2.init({
            client_id: '807397581165-8lkv1rllj4qv7gkftvc2dfhh913j3uhs.apps.googleusercontent.com'
        });

        // auth2 is initialized with gapi.auth2.init() and a user is signed in.
        if (auth2.isSignedIn.get()) {
            var profile = auth2.currentUser.get().getBasicProfile();
            document.getElementById("idUser").innerHTML = profile.getId();
            document.getElementById("nameUser").innerHTML = profile.getName();
            document.getElementById("imageUser").innerHTML = profile.getImageUrl();
            document.getElementById("emailUser").innerHTML = profile.getEmail();
        }
        
    });
}
/*
//Lấy thông tin người dùng
function onSignIn(googleUser) {
    var profile = googleUser.getBasicProfile();
    document.getElementById("idUser").innerHTML = profile.getId();
    document.getElementById("nameUser").innerHTML = profile.getName();
    document.getElementById("imageUser").innerHTML = profile.getImageUrl();
    document.getElementById("emailUser").innerHTML = profile.getEmail();
}
*/
//Đăng xuất
function signOut() {
    var auth2 = gapi.auth2.getAuthInstance();
    auth2.signOut().then(function () {
    console.log('User signed out.');
    });
}