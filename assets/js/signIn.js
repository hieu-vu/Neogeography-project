function init() {
    gapi.load("auth2", function() {
        auth2 = gapi.auth2.init({
            client_id: '807397581165-8lkv1rllj4qv7gkftvc2dfhh913j3uhs.apps.googleusercontent.com',
            fetch_basic_profile: true,
            scope: 'profile'
        });
        auth2.signIn().then(function() {
            console.log(auth2.currentUser.get().getId());
        });
    });
}

function onSignIn(googleUser) {
    var profile = googleUser.getBasicProfile();
    console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
    console.log('Name: ' + profile.getName());
    console.log('Image URL: ' + profile.getImageUrl());
    console.log('Email: ' + profile.getEmail()); // This is null if the 'email' scope is not present.
}
