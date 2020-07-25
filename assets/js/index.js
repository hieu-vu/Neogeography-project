function initMap() {
  mapOptions = {
          center: { lat: 21.0717671, lng: 105.7740281 },
          zoom: 15,
          mapTypeId: 'terrain',
          streetViewControl: false,
          fullscreenControl: false,
          mapTypeControlOptions: {
              position: google.maps.ControlPosition.TOP_RIGHT
          },
          zoomControlOptions: {
              position: google.maps.ControlPosition.RIGHT_BOTTOM
          }
  };
  var map = new google.maps.Map(document.getElementById('content-wrapper'), mapOptions);

  var kmlLayer = new google.maps.KmlLayer({
        url: "https://v-hius.github.io/kmlfile.kml",
        //suppressInfoWindows: true,
        map: map
      });
/*
  var infowindow = new google.maps.InfoWindow({
    content: "Test"
  });
*/
  var myMarker = new google.maps.Marker(
      {
          animation: google.maps.Animation.DROP,
          map: map
      });
/*
  kmlLayer.addListener('click', function() {
    infowindow.open(map, myMarker);
  });
  */
  //Your Location
  addYourLocationButton(map, myMarker);

  //Search Place
  //addSearchButton();
  searchPlace(map);
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
/*
function addSearchButton() {
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
*
    //controlDiv.index = 1;
    map.controls[google.maps.ControlPosition.TOP_LEFT].push(controlDiv);
}
*/
function searchPlace(map) {
  // Create the search box and link it to the UI element.
  const input = document.getElementById("searchBox");
  const searchBox = new google.maps.places.SearchBox(input);
  // Bias the SearchBox results towards current map's viewport.
  map.addListener("bounds_changed", () => {
  searchBox.setBounds(map.getBounds());
  });

  let markers = [];

  // Listen for the event fired when the user selects a prediction and retrieve
  // more details for that place.
  searchBox.addListener("places_changed", () => {
  const places = searchBox.getPlaces();

  if (places.length == 0) {
    return;
  }

  // Clear out the old markers.
  markers.forEach(marker => {
    marker.setMap(null);
  });
  markers = [];

  // For each place, get the icon, name and location.
  const bounds = new google.maps.LatLngBounds();
  places.forEach(place => {
    if (!place.geometry) {
      console.log("Returned place contains no geometry");
      return;
    }
    
    const icon = {
      url: place.icon,
      size: new google.maps.Size(80, 80),
      origin: new google.maps.Point(0, 0),
      anchor: new google.maps.Point(17, 34),
      scaledSize: new google.maps.Size(25, 25)
    };
    
    // Create a marker for each place.
    markers.push(
      new google.maps.Marker({
        map,
        icon,
        title: place.name,
        position: place.geometry.location
      })
    );

    if (place.geometry.viewport) {
      // Only geocodes have viewport.
      bounds.union(place.geometry.viewport);
    } else {
      bounds.extend(place.geometry.location);
    }
  });
  map.fitBounds(bounds);
  });
}