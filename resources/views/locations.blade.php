<!DOCTYPE html>
<html>
<head>
  <title>Quick Start - Leaflet</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="shortcut icon" type="image/x-icon" href="docs/images/favicon.ico" />

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.2.0/dist/leaflet.css" integrity="sha512-M2wvCLH6DSRazYeZRIm1JnYyh22purTM+FDB5CsyxtQJYeKq83arPe5wgbNmcFXGqiSH2XR8dT/fJISVA1r/zQ==" crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.2.0/dist/leaflet.js" integrity="sha512-lInM/apFSqyy1o6s89K4iQUKg6ppXEgsVxT35HbzUupEVRh2Eu9Wdl4tHj7dZO0s1uvplcYGmt3498TtHq+log==" crossorigin=""></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDSkfauiLSZEhmyR3Yti92BCrmMCFbqB0Y&libraries=places&callback=initMap" async defer></script>
</head>
<body>
  Para insertar 100 registrios en la tabla locations: <br>
  1) php artisan migrate:refresh --path=/database/migrations/selected/ <br>
  2) ejecutar /json_2_mysql.php <br> <br>
  O importar /locations.sql
  <br>
  <input type="text" name="busqueda" value="" id="pac-input"> <hr>
  <div id="mapid" style="width: 600px; height: 400px;"></div>
  <script>
  function initMap() {
    var input = document.getElementById('pac-input');
    var autocomplete = new google.maps.places.Autocomplete(input);

    // autocomplete.addListener('place_changed', function() {
    //   var a;
    //   return;
    // }




  //
    // autocomplete.addListener('place_changed', function() {
  //     //   infowindow.close();
  //     //   // marker.setVisible(false);
      // var place = autocomplete.getPlace();
  //
  //
  //     // if (!place.address_components) {
  //     //   // window.alert(place.address_components[0].long_name);
  //     // }
  //
  //     // if (!place.geometry) {
  //     // //     // User entered the name of a Place that was not suggested and
  //     // //     // pressed the Enter key, or the Place Details request failed.
  //     // window.alert("No details available for input: '" + place.name + "'");
  //     // return;
// }
  }

  window.onload = function () {

  var mymap = L.map('mapid').setView([-34.6033, -58.3816], 13);

  L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
    maxZoom: 18,
    attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, ' +
    '<a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
    'Imagery © <a href="http://mapbox.com">Mapbox</a>',
    id: 'mapbox.streets'
  }).addTo(mymap);

  @foreach($locations as $location)


      L.marker([{{$location->location}}]).addTo(mymap)
          .bindPopup('{{$location->domicilio}} <BR> {{$location->barrio}}');
          // .openPopup();
  @endforeach
  }
  </script>
</body>
</html>
