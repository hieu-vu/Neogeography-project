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
            document.getElementById("imageUser").src = profile.getImageUrl();
            document.getElementById("emailUser").innerHTML = profile.getEmail();
        }
    });
}
