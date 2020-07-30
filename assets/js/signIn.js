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
function onSignIn(googleUser) {
    var profile = googleUser.getBasicProfile();
    console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
    console.log('Name: ' + profile.getName());
    console.log('Image URL: ' + profile.getImageUrl());
    console.log('Email: ' + profile.getEmail()); // This is null if the 'email' scope is not present.
}
*/