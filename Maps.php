<!DOCTYPE html>
<html>
<head>
  <title>Simple Map</title>
  <meta name="viewport" content="initial-scale=1.0">
  <meta charset="utf-8">
  <style>
    /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
    #map {
      height: 80%;
    }
    /* Optional: Makes the sample page fill the window. */
    html,
    body {
      height: 100%;
      margin: 0;
      padding: 0;
    }
  </style>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

<body>
  <div>
    <button id="btnCoords">Show Donor</button>
    <button id="btnPopup">Show Possible Delivery Location-1</button>
    <button id="btnPopup2">Show Possible Delivery Location-2</button>
    <button id="geoLocate">Locate me</button>
    
  </div>
  <div id="map"></div>
  <script>
    var map;
    var infoWindow;
    var myPos;
    var marker;
    //array for clustoring
    var locations = [
      { lat: 19.222678, lng: 72.859565 },
      { lat: 19.206110, lng: 72.780381 },
      { lat: 19.196234, lng: 72.752391 },
      { lat: 19.2177684, lng: 72.912675 },
      { lat: 19.175022, lng: 72.790946 },
      { lat: 19.1122653, lng: 72.8406644 },
      { lat: 19.109473, lng: 72.877183 },
      { lat: 19.2274593, lng: 72.8133879 },
      { lat: 19.1534227, lng: 72.7703744 },
      { lat: 19.175147, lng: 72.8725096 },
      { lat: 19.1426426, lng: 72.7353036 },
      { lat: 19.1122558, lng: 72.7706225 },
      { lat: 19.1100967, lng: 72.8074662 },
      { lat: 19.1009259, lng: 72.848132 },
      { lat: 19.0929189, lng: 72.7740571 },
      { lat: 19.0567266, lng: 72.8609976 },
      { lat: 19.0703781, lng: 72.798079 }
    ]
    function initMap() {
      map = new google.maps.Map(document.getElementById('map'), {
        center: { lat: 28.6472799, lng: 77.2530646 },
        zoom: 10
      });
      infoWindow = new google.maps.InfoWindow();
      map.addListener('click', mapClick);
    }
    $("#btnCoords").click(function () {
       var popupWindow = new google.maps.InfoWindow();
      popupWindow.setContent("Donor");     
   var mumbai = new google.maps.LatLng(19.1204549, 72.8926039);
      map.panTo(mumbai); 
popupWindow.setPosition({ lat: 19.2572799, lng: 72.8926039 });
      popupWindow.open(map);
    });
    $("#travel").click(function () {
      var mumbai = new google.maps.LatLng(19.1204549, 72.8926039);
      map.panTo(mumbai);
      map.setZoom(14)
      //Pan is most effective if next coordinate is in the viewing area.
      window.setTimeout(function () {
        map.panTo(new google.maps.LatLng(19.1250456, 72.8927712));//powai
        window.setTimeout(function () {
          map.panTo(new google.maps.LatLng(19.1406029, 72.8550625));//highway
          window.setTimeout(function () {
            map.panTo(new google.maps.LatLng(19.1741949, 72.8590679));//oberoi
            window.setTimeout(function () {
              map.panTo(new google.maps.LatLng(19.171419, 72.833233));//prism
            }, 3000);
          }, 3000);
        }, 3000);
      }, 3000);
    });
    $("#btnPopup").click(function () {
      var popupWindow = new google.maps.InfoWindow();
      popupWindow.setContent("Approx. number of needy:10");
      popupWindow.setPosition({ lat: 19.2752999, lng: 72.9926039 });
      popupWindow.open(map);
    });
    $("#btnPopup2").click(function () {
      var popupWindow = new google.maps.InfoWindow();
      popupWindow.setContent("Approx. number of needy:15");
      popupWindow.setPosition({ lat: 19.2952999, lng: 72.7925039 });
      popupWindow.open(map);
    });
    $("#geoLocate").click(function () {
      if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function (position) {
          myPos = {
            lat: position.coords.latitude,
            lng: position.coords.longitude
          };
          infoWindow.setPosition(myPos);
          infoWindow.setContent('Location found.');
          infoWindow.open(map);
          map.setCenter(myPos);
          map.setZoom(15);
        }, function () {
          handleLocationError(true, infoWindow, map.getCenter());
        });
      } else {
        // Browser doesn't support Geolocation
        handleLocationError(false, infoWindow, map.getCenter());
      }
    });
    $("#marker").click(function () {
      marker = new google.maps.Marker({
        position: map.getCenter(),
        map: map,
        label: map.getCenter().lat() + ", " + map.getCenter().lng()
        //additonal icon property can be used to set any icon as marker
      });
    });
    $("#hide").click(function () {
      marker.setMap(null);
    });
    $("#cluster").click(function(){
      // Create an array of alphabetical characters used to label the markers.
        var labels = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        // Add some markers to the map.
        // Note: The code uses the JavaScript Array.prototype.map() method to
        // create an array of markers based on a given "locations" array.
        // The map() method here has nothing to do with the Google Maps API.
        var markers = locations.map(function(location, i) {
          return new google.maps.Marker({
            position: location,
            label: labels[i % labels.length]
          });
        });
        // Add a marker clusterer to manage the markers.
        var markerCluster = new MarkerClusterer(map, markers,
            {imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m'});
      
    });
    $("#geoCode").click(function(){
      var geocoder = new google.maps.Geocoder();
      var address = document.getElementById('txtGeo').value;
        geocoder.geocode({'address': address}, function(results, status) {
          if (status === 'OK') {
            map.setCenter(results[0].geometry.location);
            var marker = new google.maps.Marker({
              map: map,
              position: results[0].geometry.location
            });
          } else {
            alert('Geocode was not successful for the following reason: ' + status);
          }
        });
    });
    function mapClick(event) {
      map.panTo(event.latLng);
      infoWindow.setPosition(event.latLng);
      infoWindow.setContent("You clicked " + event.latLng);
      infoWindow.open(map);
    }
    
    
    function handleLocationError(browserHasGeolocation, infoWindow, pos) {
      infoWindow.setPosition(pos);
      infoWindow.setContent(browserHasGeolocation ?
        'Error: The Geolocation service failed.' :
        'Error: Your browser doesn\'t support geolocation.');
      infoWindow.open(map);
    }
  </script>
  <!--script used for clustoring only-->
  <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
  <!-- Key is the API Key, callback is a JS function used to initialise the map  &callback=initMap-->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAMxdGmGa60mA7EV-iPYauPrj9XB35qA6Q&callback=initMap" async
    defer></script>
</body>

</html>