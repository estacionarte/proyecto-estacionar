// Leaflet
// Función para centrar mapa y colocar círculo
function centrarMapa(mapa,lat,lng){
  mapa.setView([lat, lng], 15);
}
function ponerCirculo(mapa,lat,lng){
  circle = L.circle([lat, lng], {
    color: '#48A8C1',
    fillColor: '#64aec2',
    fillOpacity: 0.3,
    radius: 500
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
// Deshabilito los controles sobre el mapa
mymap._handlers.forEach(function(handler) {
    handler.disable();
});


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
      ponerCirculo(mymap,latitud,longitud);
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
    var distancia = searchlatlng.distanceTo(latlng);
    var id = espacios[i]['id'];
    if (distancia<500) {
      // Si se encuentra a menos de 500m de la dirección buscada lo guardo
      coordenadas.push({"id":espacios[i]['id'],"punto":latlng});
      // ponerCirculo(mymap,espacios[i]['lat'],espacios[i]['lng']);
      // Pongo un marker en la posición
      marker[i] = L.marker(latlng);
      marker[i].addTo(mymap);
      marker[i].bindPopup(espacios[i]['direccion']);
      // marker[i].addEventListener('click',function(){
      //   document.getElementById().style.border = '2px solid red';
      // });
    } else {
      document.getElementById(id).style.display = 'none';
    }
  }
}


// Popup de botón Alquilar
// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on the button, open the modal
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
