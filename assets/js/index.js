//init map
function initMap() {

  var origin = new google.maps.LatLng(21.0717671,105.7740281);
  
  var mapOptions = {
    center: origin,
    zoom: 15,
    mapTypeId: 'terrain',
    streetViewControl: false,
    fullscreenControl: false,
    mapTypeControlOptions: {
        position: google.maps.ControlPosition.TOP_RIGHT
    }
  };

  var map = new google.maps.Map(document.getElementById('content-wrapper'), mapOptions);

  var kmlLayer = new google.maps.KmlLayer({
    url: 'https://v-hius.github.io/kmlfile.kml',
    map: map
  });

  var myMarker = new google.maps.Marker({
    animation: google.maps.Animation.DROP,
    map: map
  });

//Nhấn để hiện Toạ độ
  // Khởi tạo InfoWindow.
  var infoWindow = new google.maps.InfoWindow({
    content: 'Nhấn vào bản đồ để hiện Toạ độ!',
    position:{ lat: 21.0717671, lng: 105.7740281 }});
    infoWindow.open(map);

  // Configure the click listener.
  map.addListener('click', function(mapsMouseEvent) {
    // Close the current InfoWindow.
    infoWindow.close();

    // Tạo mới InfoWindow.
    infoWindow = new google.maps.InfoWindow({position: mapsMouseEvent.latLng});
    infoWindow.setContent(mapsMouseEvent.latLng.toString());
    infoWindow.open(map);
  });

  /////////////////////////////

//Vị trí hiện tại
  addYourLocationButton(map, myMarker);
//Tìm địa điểm
  searchPlace(map);
  
//Chỉ đường từ vị trí của bạn
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {
      origin = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
      map.setCenter(origin);
      myMarker.setPosition(origin);
      new AutocompleteDirectionsHandler(map, origin);
    }, function() {
      alert("Định vị ko thành công.");
    });
  } else {
    alert("Trình duyệt của bạn ko hỗ trợ định vị.");
  }

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

  ControlUI.appendChild(secondChild);

  ControlUI.addEventListener('click', function() {
      if(navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
              var myLatlng = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
              marker.setPosition(myLatlng);
              map.setCenter(myLatlng);
              map.setZoom(15);
          });
      }
      else {
          alert("Trình duyệt của bạn không hỗ trợ vị định vị cho trang này!")
      }
  });

  controlDiv.index = 1;
  map.controls[google.maps.ControlPosition.RIGHT_BOTTOM].push(controlDiv);
}

// Tìm kiếm địa địa điểm
function searchPlace(map) {
  // Tạo hộp tìm kiếm và liên kết với thành phần giao diện
  const input = document.getElementById("searchBox");
  const searchBox = new google.maps.places.SearchBox(input);
  // phần hiển thị các kết quả
  map.addListener("bounds_changed", () => {
    searchBox.setBounds(map.getBounds());
  });

  let markers = [];

  // khi người dùng nhập tìm kiếm sẽ trả về chi tiết cho địa điếm đó
  searchBox.addListener("places_changed", () => {
    const places = searchBox.getPlaces();

    if (places.length == 0) {
      return;
    }

    // xoá điểm đánh dấu tại điểm cũ.
    markers.forEach(marker => {
      marker.setMap(null);
    });
    markers = [];

    //Biểu tượng, tên, vị trí của mỗi nơi
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
      
      // Tạo đánh dấu cho từng nơi
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

function AutocompleteDirectionsHandler(map, origin) {
  this.map = map;
  this.origin = origin;
  this.destinationPlaceId = null;
  this.directionsService = new google.maps.DirectionsService;
  this.directionsRenderer = new google.maps.DirectionsRenderer;
  this.directionsRenderer.setMap(map);

  var destinationInput = document.getElementById('destination-input');

  var destinationAutocomplete = new google.maps.places.Autocomplete(destinationInput);
  // Specify just the place data fields that you need.
  destinationAutocomplete.setFields(['place_id']);

  this.setupPlaceChangedListener(destinationAutocomplete, 'DEST');

  this.map.controls[google.maps.ControlPosition.TOP_CENTER].push(
      destinationInput);
}

// Sets a listener on a radio button to change the filter type on Places
// Autocomplete.
AutocompleteDirectionsHandler.prototype.setupClickListener = function(id) {
  var radioButton = document.getElementById(id);
  var me = this;

  radioButton.addEventListener('click', function() {
    me.route();
  });
};

AutocompleteDirectionsHandler.prototype.setupPlaceChangedListener = function(autocomplete) {
  var me = this;
  autocomplete.bindTo('bounds', this.map);

  autocomplete.addListener('place_changed', function() {
    var place = autocomplete.getPlace();

    if (!place.place_id) {
      window.alert('Vui lòng chọn một địa điểm ở danh sách tìm kiếm.');
      return;
    }
    me.destinationPlaceId = place.place_id;
    me.route();
  });
};

AutocompleteDirectionsHandler.prototype.route = function() {
  if (!this.destinationPlaceId) {
    return;
  }
  var me = this;
  this.directionsService.route(
      {
        origin:  this.origin,
        destination: {'placeId': this.destinationPlaceId},
        travelMode: 'WALKING'
      },
      function(response, status) {
        if (status === 'OK') {
          me.directionsRenderer.setDirections(response);
        } else {
          window.alert('Yêu cầu chỉ đường không thành công ' + status);
        }
      });
};