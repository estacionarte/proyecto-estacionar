// Leaflet
// Función para centrar mapa y colocar círculo
function centrarMapa(mapa,lat,lng){
  mapa.setView([lat, lng], 15);
}
function ponerCirculo(mapa,lat,lng){
  circle = L.circle([lat, lng], {
    color: 'blue',
    fillColor: '#3e74d0',
    fillOpacity: 0.7,
    radius: 60
  }).addTo(mapa);
}

// Declaro mapa y círculo a usar para ubicaciones
var mymap = L.map('mapid');
var circle;

// Le agrego "tiles" al mapa para que sea visible
L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', {
  // attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="http://mapbox.com">Mapbox</a>',
  maxZoom: 17,
  id: 'mapbox.streets',
  accessToken: 'pk.eyJ1Ijoiam9hcGFub3MiLCJhIjoiY2pha2Z2eG1zMmlrNTMzcno2OHQ0b3VvYiJ9.jgj5HdcO2n9VZJpuSn4_wA'
}).addTo(mymap);

// Activar geocoder de Google Maps
function initMap(){
  var geocoder = new google.maps.Geocoder();
  // Hago geocoding de la dirección buscada
  geocodeAddress(geocoder);
}
 var searchlatlng;
// Dar funcionalidad a geocoder (buscar)
function geocodeAddress(geocoder) {
  var address = direccion;
  // Busco por address y filtro por región (país) Argentina
  geocoder.geocode({
    'address': address,
    'region': 'AR'
    }, function(results, status) {
    // Si está todo ok guardo los resultados en una variable
    if (status === google.maps.GeocoderStatus.OK) {
      var resultado = results[0];
      // Guardo valores de lat y lng para pasarlos a mapa
      latitud = Number(resultado.geometry.location.lat());
      longitud = Number(resultado.geometry.location.lng());
      // Cambio la posición del mapa para ajustarla a las nuevas coordenadas
      centrarMapa(mymap,latitud,longitud);
      // Guardo la posición en una nueva variable y la comparo con los resultados de búsqueda
      searchlatlng = L.latLng(latitud,longitud);
      medirDistancia();
    } else {
      // Si falla la búsqueda
      alert('Ocurrió el siguiente error: ' + status + '. Intente nuevamente con otra dirección.');
    }
  });
}

// Función para recorrer cada espacio obtenido para obtener latlng
var coordenadas = [];
var marker = [];
function medirDistancia(){
  for (var i = 0; i < espacios.length; i++) {
    var latlng = L.latLng([espacios[i]['lat'],espacios[i]['lng']]);
    if (searchlatlng.distanceTo(latlng)<500) {
      // Si se encuentra a menos de 500m de la dirección buscada lo guardo
      coordenadas.push({"id":espacios[i]['id'],"punto":latlng});
      // ponerCirculo(mymap,espacios[i]['lat'],espacios[i]['lng']);
      marker[i] = L.marker(latlng);
      marker[i].addTo(mymap);
      var id = espacios[i]['id'];
      marker[i].addEventListener('click',function(){
        document.getElementById(id).style.border = '2px solid red';
      });
    }
  }
}
