var map;
var src = 'https://v-hius.github.io/gmapKML/KmlFile.kml';

function initMap() {
    map = new google.maps.Map(document.getElementById('map'), {
        center: new google.maps.LatLng(21.0717671,105.7740281),
        zoom: 10,
        mapTypeId: 'terrain'
    });

    var kmlLayer = new google.maps.KmlLayer(src, {
        suppressInfoWindows: true,
        preserveViewport: false,
        map: map
    });

    var myMarker = new google.maps.Marker({
        animation: google.maps.Animation.DROP,
        map: map
    });

    addYourLocationButton(map, myMarker);
}

function addYourLocationButton(map, marker) 
{
    var controlDiv = document.createElement('div');

    var ControlUI = document.createElement('button');
    ControlUI.style.backgroundColor = '#fff';
    ControlUI.style.border = 'none';
    ControlUI.style.outline = 'none';
    ControlUI.style.width = '40px';
    ControlUI.style.height = '40px';
    ControlUI.style.borderRadius = '2px';
    ControlUI.style.boxShadow = '0 1px 4px rgba(0,0,0,0.3)';
    ControlUI.style.marginRight = '10px';
    ControlUI.style.padding = '0px';
    ControlUI.title = 'Your Location';
    controlDiv.appendChild(ControlUI);

    var secondChild = document.createElement('div');
    secondChild.style.margin = '4px';
    secondChild.style.width = '32px';
    secondChild.style.height = '32px';
    secondChild.style.backgroundImage = 'url(https://v-hius.github.io/mylocation.png)';
    secondChild.style.backgroundRepeat = 'no-repeat';
    secondChild.id = 'you_location_img';

    ControlUI.appendChild(secondChild);

    ControlUI.addEventListener('click', function() {
        if(navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                var latlng = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
                marker.setPosition(latlng);
                map.setCenter(latlng);
            });
        }
        else {
            $('#you_location_img').css('background-position', '0px 0px');
        }
    });

    controlDiv.index = 1;
    map.controls[google.maps.ControlPosition.RIGHT_BOTTOM].push(controlDiv);
}