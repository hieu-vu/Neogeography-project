var map;
var src = 'https://v-hius.github.io/assets/kml/kmlfile.kml';

function initMap()
{
    map = new google.maps.Map(
        document.getElementById('content-wrapper'),
        {
            center: { lat: 21.0717671, lng: 105.7740281 },
            zoom: 10,
            mapTypeId: 'terrain',
            streetViewControl: false,
            fullscreenControl: false,
            mapTypeControlOptions: {
                position: google.maps.ControlPosition.TOP_RIGHT
            },
            zoomControlOptions: {
                position: google.maps.ControlPosition.RIGHT_BOTTOM
            }

        });

    var kmlLayer = new google.maps.KmlLayer(
        src,
        {
            suppressInfoWindows: true,
            preserveViewport: false,
            map: map
        });

    var myMarker = new google.maps.Marker(
        {
            animation: google.maps.Animation.DROP,
            map: map
        });

    //Your Location
    addYourLocationButton(map, myMarker);

    //Search Place
    addSearchButton(map,myMarker);
    //searchPlace(map);
}

function addYourLocationButton(map, marker) {
    var controlDiv = document.createElement('div');

    var ControlUI = document.createElement('button');
    ControlUI.style.backgroundColor = '#fff';
    ControlUI.style.border = 'none';
    ControlUI.style.outline = 'none';
    ControlUI.style.width = '40px';
    ControlUI.style.height = '40px';
    ControlUI.style.borderRadius = '2px';
    ControlUI.style.boxShadow = '0 1px 4px rgba(0,0,0,0.3)';
    ControlUI.style.marginLeft = '10px';
    ControlUI.style.marginRight = '10px';
    ControlUI.style.padding = '0px';
    ControlUI.title = 'Vị trí của bạn';
    controlDiv.appendChild(ControlUI);

    var secondChild = document.createElement('div');
    secondChild.style.margin = '4px';
    secondChild.style.width = '32px';
    secondChild.style.height = '32px';
    secondChild.style.backgroundImage = 'url(https://v-hius.github.io/assets/img/mylocation.png)';
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

function addSearchButton(map, marker) {
    var controlDiv = document.createElement('div');

    var ControlUI = document.createElement('button');
    ControlUI.style.backgroundColor = '#fff';
    ControlUI.style.border = 'none';
    ControlUI.style.outline = 'none';
    ControlUI.style.width = '32px';
    ControlUI.style.height = '32px';
    ControlUI.style.borderRadius = '8px';
    ControlUI.style.boxShadow = '0 1px 4px rgba(0,0,0,0.3)';
    ControlUI.style.backgroundColor = 'rgba(0,191,255,1)';
    ControlUI.style.marginLeft = '270px';
    ControlUI.style.marginTop = '10px';
    ControlUI.style.padding = '0px';
    ControlUI.style.textAlign = 'center';
    ControlUI.title = 'Tìm kiếm';
    controlDiv.appendChild(ControlUI);

    var ControlText = document.createElement('div');
    ControlText.style.height = '32px';
    ControlText.style.backgroundImage = 'url(assets/img/searchLocation.png)';
    ControlText.style.backgroundRepeat = 'no-repeat';
    ControlText.id = 'you_location_img';

    ControlUI.appendChild(ControlText);
/*
    input = document.getElementById("searchBox");

    ControlUI.addEventListener('click', function() {
        if(input) {
            //navigator.geolocation.getCurrentPosition(function(position) {
                //var latlng = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
                marker.setPosition(latlng);
                map.setCenter(latlng);
           // });
        }
        else {
            $('#you_location_img').css('background-position', '0px 0px');
        }
    });
*/
    //controlDiv.index = 1;
    map.controls[google.maps.ControlPosition.TOP_LEFT].push(controlDiv);
}

//Search Place
function searchPlace(map) {
    input = document.getElementById("searchBox");

    infowindow = new google.maps.InfoWindow();

    const request = {
        query: "Hồ Chí Minh",
        fields: ["name", "geometry"]
      };

      service = new google.maps.places.PlacesService(map);
      service.findPlaceFromQuery(request, (results, status) => {
        if (status === google.maps.places.PlacesServiceStatus.OK) {
          for (let i = 0; i < results.length; i++) {
            createMarker(results[i]);
          }
          map.setCenter(results[0].geometry.location);
        }
      });
}
