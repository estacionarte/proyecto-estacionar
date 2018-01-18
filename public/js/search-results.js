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
// Guardo variables a usar
var modal = [];
var btn = [];
var close = [];
var modalactivo;
// Variables para validaciones
var diacomienzo = [];
var horacomienzo = [];
var minutocomienzo = [];
var fechacomienzo = [];
var diafin = [];
var horafin = [];
var minutofin = [];
var fechafin = [];
var espacioid;
var comienzo;
var fin;
// Variables para precios
var precio = [];
var descuento = [];
var total = [];

// Función para actualizar fechas
var actualizarReserva = function(){
  espacioid = parseInt(modalactivo.closest("article").id);

  fechacomienzo[espacioid] = new Date(diacomienzo[espacioid].value + " " + horacomienzo[espacioid].options[horacomienzo[espacioid].selectedIndex].value + ":" + minutocomienzo[espacioid].options[minutocomienzo[espacioid].selectedIndex].value);

  fechafin[espacioid] = new Date(diafin[espacioid].value + " " + horafin[espacioid].options[horafin[espacioid].selectedIndex].value + ":" + minutofin[espacioid].options[minutofin[espacioid].selectedIndex].value);

}

// Función para convertir fechas a formato compatible con DateTime de php
function convertirFechas(){
  // Obtengo id del espacio que tengo que buscar
  espacioid = parseInt(modalactivo.closest("article").id);
  // Guardo fechas en el formato que las lee php
  comienzo = fechacomienzo[espacioid].getFullYear() + '-' + (fechacomienzo[espacioid].getMonth()+1) + '-' + fechacomienzo[espacioid].getDate() + ' ' + fechacomienzo[espacioid].getHours() + ':' + fechacomienzo[espacioid].getMinutes();
  fin = fechafin[espacioid].getFullYear() + '-' + (fechafin[espacioid].getMonth()+1) + '-' + fechafin[espacioid].getDate() + ' ' + fechafin[espacioid].getHours() + ':' + fechafin[espacioid].getMinutes();
}

// Actualizar precios ante cambios en horarios
// Creo función que pide datos a la db

var actualizarValores = function actualizar(){
  // Escondo el cartel que dice que el espacio no está disponible
  document.getElementById('disponible').style.display = 'none';
  // Actualizo valores de fechas y las convierto
  actualizarReserva();
  convertirFechas();

  // Ajax call usando jquery
  jQuery(function($){
    $.ajax({
      url: '/alquilar/detallealquiler/{id}/{horariollegada}/{horariopartida}',
      // Paso headers con csrftoken por ser post
      headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
      type: 'POST',
      // Paso parámetros para función
      data: {id:espacioid,horariollegada:comienzo,horariopartida:fin},
      success: function(resultado) {
        precio[espacioid].textContent = resultado.precio;
        descuento[espacioid].textContent = resultado.descuento;
        total[espacioid].textContent = resultado.total;
      }
    });
  });
  // Hago check de disponibilidad
  chequearDisponibilidad();
}

// Popup
for (var i = 0; i < espacios.length; i++) {
  modal[i] = document.getElementsByClassName("modalAlquilar")[i];
  btn[i] = document.getElementsByClassName("mejor-espacio-boton-alquilar")[i];
  close[i] = document.getElementsByClassName("alquilar-close")[i];

  id = parseInt(modal[i].id.slice(5));
  modal[id] = modal[i];

  // Abrir modal al apretar botón
  btn[i].onclick = function() {
    var modal = document.getElementById('modal' + this.id.slice(3));
    window.modalactivo = modal;
    modal.style.display = "block";
  }

  // Cerrar con cruz
  close[i].onclick = function() {
    var modal = document.getElementById('modal' + this.id.slice(3));
    modal.style.display = "none";
  }

  // Cerrar al hacer click fuera de la caja
  window.addEventListener('click', function(event) {
    if (event.target == window.modalactivo) {
      window.modalactivo.style.display = "none";
    }
  });

  // Validaciones para form de alquiler
  // No se puede elegir fecha anterior a la actual
  diacomienzo[id] = document.querySelectorAll("input[name='alquiler-dia-comienzo']")[i];
  diafin[id] = document.querySelectorAll("input[name='alquiler-dia-fin']")[i];

  var today = new Date();
  var dd = today.getDate();
  var mm = today.getMonth()+1; //Enero es 0
  var yyyy = today.getFullYear();

  if(dd<10){
    dd='0'+dd
  }
  if(mm<10){
    mm='0'+mm
  }

  today = yyyy+'-'+mm+'-'+dd;
  diacomienzo[id].setAttribute("min", today);
  diafin[id].setAttribute("min", today);

  // Asigno a variables los elementos a validar
  horacomienzo[id] = document.querySelectorAll("select[name='alquiler-hora-comienzo']")[i];
  minutocomienzo[id] = document.querySelectorAll("select[name='alquiler-minuto-comienzo']")[i];
  horafin[id] = document.querySelectorAll("select[name='alquiler-hora-fin']")[i];
  minutofin[id] = document.querySelectorAll("select[name='alquiler-minuto-fin']")[i];

  // Guardo fechas introducidas
  fechacomienzo[id] = new Date(diacomienzo[id].value + " " + horacomienzo[id].options[horacomienzo[id].selectedIndex].value + ":" + minutocomienzo[id].options[minutocomienzo[id].selectedIndex].value);

  fechafin[id] = new Date(diafin[id].value + " " + horafin[id].options[horafin[id].selectedIndex].value + ":" + minutofin[id].options[minutofin[id].selectedIndex].value);

  // Capturo elementos de precios a cambiar
  precio[id] = document.querySelectorAll("span[precio='si']")[i];
  descuento[id] = document.querySelectorAll("span[descuento='si']")[i];
  total[id] = document.querySelectorAll("span[total='si']")[i];

  // Agrego la función a los elementos
  diacomienzo[id].addEventListener('change',actualizarValores);
  horacomienzo[id].addEventListener('change',actualizarValores);
  minutocomienzo[id].addEventListener('change',actualizarValores);
  diafin[id].addEventListener('change',actualizarValores);
  horafin[id].addEventListener('change',actualizarValores);
  minutofin[id].addEventListener('change',actualizarValores);
}

// Función para chequear disponibilidad
function chequearDisponibilidad(){
  // Ajax call usando jquery
  // Paso los parámetros que ya conseguí de las funciones ejecutadas anteriormente
  jQuery(function($){
    $.ajax({
      url: 'alquilar/disponible/{id}/{horariollegada}/{horariopartida}',
      // Paso headers con csrftoken por ser post
      headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
      type: 'POST',
      // Paso parámetros para función
      data: {id:espacioid,horariollegada:comienzo,horariopartida:fin},
      success: function(resultado) {
        // Si el resultado es false (no disponible), muestro div informando esto y escondo botón de submit para que no mande el form
        if (!resultado.disponibleTodo) {
          document.getElementById('disponible').style.display = 'block';
          document.getElementById('submit-disponible').style.display = 'none';
        } else {
          document.getElementById('disponible').style.display = 'none';
          document.getElementById('submit-disponible').style.display = 'block';
        }
    }
    });
  });
}

// Creo función para validar datos cuando aprieto submit
function validarForm(){
  var ahora = new Date();
  // Actualizo valores previo a verificaciones
  actualizarReserva();

  if (fechacomienzo[espacioid] <= ahora) {
    alert("El horario a buscar debe ser mayor a la hora actual");
    return false;
  }

  if (fechafin[espacioid] <= fechacomienzo[espacioid]) {
    alert("La fecha de partida no puede ser anterior a la de llegada");
    return false;
  }

  // Retorno false para evitar el envío. Lo que retorna true es la función chequearDisponibilidad
  return true;
}
