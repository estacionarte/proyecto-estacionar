<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- ICONO DE LA PESTAÑA DEL NAVEGADOR -->
    <link rel="icon" href="icons/favicon1.png" type="image/png" sizes="16x16">
    <!-- FONT CABIN -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cabin" rel="stylesheet">
    <!-- FONT BLACK -->
    <link href="https://fonts.googleapis.com/css?family=Archivo+Black" rel="stylesheet">
    <!-- FONT ROBOTO -->
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
    <!-- FONT LATO -->
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <!-- ICONOS -->
    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
      <!-- main-profile-edit-nav -->
    <link rel="stylesheet"
     href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

      <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Styles -->
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="{{ URL::asset('css/leaflet.css')}}">
    <script src="{{ URL::asset('js/leaflet.js')}}"></script>

    <title>Mapa Leaflet</title>

    <style media="all">
      #mapid {height: 300px;}
    </style>

  </head>


  <body>

    <div class="" id='mapid'></div>
    <label for="">Buscar dirección</label> <input type="text" name="" value="">
    <input type="button" value="Geocode">

    <script type="text/javascript">
      var mymap = L.map('mapid').setView([-34.64, -58.38], 14);

      L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', {
        attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="http://mapbox.com">Mapbox</a>',
        maxZoom: 18,
        id: 'mapbox.streets',
        accessToken: 'pk.eyJ1Ijoiam9hcGFub3MiLCJhIjoiY2pha2Z2eG1zMmlrNTMzcno2OHQ0b3VvYiJ9.jgj5HdcO2n9VZJpuSn4_wA'
      }).addTo(mymap);

      var marker = L.marker([-34.6211, -58.38151]).addTo(mymap);

      var circle = L.circle([-34.61709, -58.38233], {
        color: 'red',
        fillColor: '#f03',
        fillOpacity: 0.5,
        radius: 150
      }).addTo(mymap);

      var polygon = L.polygon([
        [-34.6241, -58.38251],
        [-34.6291, -58.38291],
        [-34.63, -58.389]
      ],
      {
        color: 'green'
      }).addTo(mymap);

      marker.bindPopup("<b>Hello world!</b><br>Soy un popup!").openPopup();
      circle.bindPopup("<b>Soy un popup en un circulo!</b>");
      polygon.bindPopup("<b>Hello world!</b><br>Soy un polígono popup!");

      var popup = L.popup()
        .setLatLng([-34.6111, -58.38151])
        .setContent("I am a standalone popup.")
        .openOn(mymap);

      function onMapClick(event) {
        alert("Clickeaste el mapa en " + event.latlng);
      }
      mymap.on('click', onMapClick);
      mymap.off('click', onMapClick);

      var popup2 = L.popup();
      function onMapClick2(e) {
        popup2
          .setLatLng(e.latlng)
          .setContent("Clickeaste el mapa en " + e.latlng.toString())
          .openOn(mymap)
      }
      mymap.on('click', onMapClick2);

      // Activar geocoder de Google Maps
      function initMap(){
        var geocoder = new google.maps.Geocoder();

        // Dar función a botón
        const geocode = document.querySelector('input[type="button"]');
        geocode.addEventListener('click', function(){
          geocodeAddress(geocoder);
        });
      }

      // Buscar

      function geocodeAddress(geocoder) {
        var address = document.querySelector('input[type="text"]').value;
        // Busco por address y filtro por región Argentina para que priorice resultados dentro del país
        geocoder.geocode({
          'address': address,
          'region': 'AR',
        //   componentRestrictions: {
        //   administrativeArea: 'CABA'
        //   administrativeArea: 'Buenos Aires'
        // }
        }, function(results, status) {
          if (status === google.maps.GeocoderStatus.OK) {
            console.log(results[0]);
            console.log(results[0].address_components[5].long_name);
            console.log(results[0].formatted_address);
            // Latitud
            console.log('Latitud: ' + results[0].geometry.location.lat());
            // Longitud
            console.log('Longitud: ' + results[0].geometry.location.lng());
            mymap.setView([results[0].geometry.location.lat(), results[0].geometry.location.lng()], 14);
          } else {
            alert('Ocurrió el siguiente error: ' + status);
          }
        });
      }

    </script>

    {{-- Llamo la API de Google con mi clave --}}
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAkuJOGY0hwpTRHHsCoxPLc_1Bcv_sUIHk&v=3&callback=initMap">
    </script>
  </body>
</html>
