// Leaflet
// Función para centrar mapa y colocar círculo
function centrarMapa(mapa,lat,lng){
  mapa.setView([lat, lng], 15);
}
function ponerCirculo(mapa,lat,lng){
  if (circle != undefined) {
    mapa.removeLayer(circle);
  };
  circle = L.circle([lat, lng], {
    color: 'blue',
    fillColor: '#3e74d0',
    fillOpacity: 0.4,
    radius: 60
  }).addTo(mapa);
}
function mapaYCirculo(mapa,lat,lng){
  var parsedLat = Number(lat);
  var parsedLng = Number(lng);
  centrarMapa(mapa,parsedLat,parsedLng);
  ponerCirculo(mapa,parsedLat,parsedLng);
}

// Cargar mapa con círculo en posición del espacio
var mymap = L.map('mapid').setView([3,4],15);
var circle;
mapaYCirculo(mymap,lat,lng);

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



// // Función para mostar form al apretar botón
// var botonAlquilar = document.getElementById('botonReLoco');
// var modal = document.getElementById('modal1');
// var close = document.querySelector(".alquilar-close");
//
// // Abrir modal al apretar botón
// botonAlquilar.addEventListener('click',function(){
//   modal.style.display = 'block';
// });
//
// // Cerrar con cruz
// close.onclick = function() {
//   var modal = document.getElementById('modal' + this.id.slice(3));
//   modal.style.display = "none";
// }
