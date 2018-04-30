// // Obtengo valor del select para crear horarios en base a la opción default
// var predeterminados = document.getElementById('predeterminados');
// predeterminados.addEventListener('change',agregarHorariosDefault);
//
// var agregarHorariosDefault = function agregarHorariosDefault(){
//   if (predeterminados.value == 'todos') {
//     console.log('Todos los días de 00 a 00');
//   }
// }

var divHorarios = document.querySelector('.horarios-holder');
var diaElegido = document.getElementById('dia-select');
var horacomienzoElegido = document.getElementById('horacomienzo-select');
var horafinElegido = document.getElementById('horafin-select');
var todoeldia = document.getElementById('dia-entero');

// Función para agrgar nuevo día al div contenedor con los horarios que indico en parámetros
var newDia = function newDia(dia, horacomienzo, horafin){
  var nuevodia = document.createElement("div");
  nuevodia.setAttribute("class", "upload-div-diasemana");
  nuevodia.innerHTML = "<input type='text' name='diasemana[]' class='upload-input-dia' value='"+dia+"' readonly> <input type='text' name='horacomienzo[]'' class='upload-input-hora' value='"+horacomienzo+"' readonly> <span style='text-align:center;'> - </span> <input type='text' name='horafin[]' class='upload-input-hora' value='"+horafin+"' readonly> <label for='' class='upload-label-horario-button'>&#8854;</label> <hr style='margin: 10px 0px;'>"
  divHorarios.appendChild(nuevodia);
}

// Función para tomar los valores de los campos de horarios, ejecutar newDia y después resetear valores
var ejecutarNewDia = function(){

  // Asigno valores
  var dia = diaElegido.value;
  var horacomienzo = horacomienzoElegido.value;
  var horafin = horafinElegido.value;

  // Horario de fin tiene que ser mayor o igual a horario de llegado

  // Ejecuto función si tengo valores
  if (dia && horacomienzo && horafin) {
    newDia(dia,horacomienzo,horafin);
    // Reseteo
    diaElegido.value = 0;
    horacomienzoElegido.value = 0;
    horafinElegido.value = 0;
    todoeldia.checked = false;

  }


}

// Asigno función a botón
var btnagregarhorario = document.getElementById('boton-agregar-horario');
btnagregarhorario.addEventListener('click', ejecutarNewDia);



//
// infoespacio.addEventListener('click', function(){
//   // Variable para chequear si ya agregué div y para borrarlo después cuando se cumpla la condición
//   var elementExists = document.getElementById("infoespacio");
//   console.log('1');
//
//   if (!elementExists) {
//     console.log('2');
//     // Creo div y el resto
//     var infoespacio = document.createElement("div");
//     infoespacio.setAttribute("id", "infoespacio");
//     infoespacio.setAttribute("style", "display:block; font-size:0.7em; text-align:left; font-weight:normal; color: #6e6e6e");
//     infoespacio.innerHTML = "<p style='margin-top:10px;'>Cochera Privada: espacio del que el usuario es propietario o puede disponer su uso, como un garage en el hogar o una cochera en un edificio</p><p>Espacio en hogar: lugar mas reducido en tamaño en el que no siempre entra un auto, por ejemplo, el living de la casa</p><p>Playa de Estacionamiento: establecimiento cuya actividad comercial es el alquiler de cocheras</p>";
//     document.getElementById('label-tipoespacio').appendChild(infoespacio);
//   } else {
//     console.log('3');
//     // Borro alerta
//     document.getElementById('label-tipoespacio').removeChild(elementExists);
//   }
// });
//
//
// // Habilitar campo de direccion para escritura cuando lleno país y provincia (les saco el readonly)
// var pais = document.querySelector('.upload-select-pais');
// var provincia = document.querySelector('.upload-select-provincia');
// var direccion = document.querySelector('.upload-input-direccion');
// var ciudad = document.querySelector('.upload-input-ciudad');
//
//
// var writeDireccion = function writeDireccion() {
//   if (pais.value && provincia.value) {
//     direccion.removeAttribute("readonly");
//   }
//   if (provincia.value == 'CABA') {
//     ciudad.value = 'CABA';
//   }
// }
//
// writeDireccion();
// pais.addEventListener('change', writeDireccion);
// provincia.addEventListener('change', writeDireccion);
//
// // Lo mismo si al cargar dirección ya tiene value
// function writeOtros(){
//   document.querySelector('.upload-input-ciudad').removeAttribute("readonly");
//   document.querySelector('.upload-input-cp').removeAttribute("readonly");
// }
// if (direccion.value) {
//   writeOtros();
// }
//
// // Activar geocoder de Google Maps
// function initMap(){
//   var geocoder = new google.maps.Geocoder();
//
//   // Función para autocompletar campo de dirección a medida que se escribe, limitado a direcciones de Argentina
//   var options = {
//     types: ['address'],
//     componentRestrictions: {country: 'ar'}
//   };
//
//   var direccionAutocomplete = new google.maps.places.Autocomplete(direccion, options);
//
//   // Al completar provincia, cambio el autocomplete para que solo me muestre direcciones de esta provincia
//   // var provinciaAutocomplete = document.querySelector('.upload-select-provincia');
//   // provinciaAutocomplete.addEventListener('change', function(){
//   //   direccionAutocomplete.setComponentRestrictions({'administrativeArea': provinciaAutocomplete.value});
//   // });
//
//   // Al hacer cambios en campo domicilio, hacer editables los campos restantes y ejecutar geocoding
//
//   var direcciongeocode = document.querySelector('.upload-input-direccion');
//   direcciongeocode.addEventListener('change', function(){
//     writeOtros();
//     geocodeAddress(geocoder);
//     // if (!ciudad.value) {
//     //   geocodeAddress(geocoder);
//     // } else {
//     //   geocodeAddressConFiltroLocality(geocoder);
//     // }
//   });
//
//   // Ejecuto geocoding si cambio la ciudad para hacer más precisa la búsqueda
//   var ciudadgeocode = document.querySelector('.upload-input-ciudad');
//   ciudadgeocode.addEventListener('change', function(){
//     geocodeAddress(geocoder);
//     // if (!ciudad.value) {
//     //   geocodeAddress(geocoder);
//     // } else {
//     //   geocodeAddressConFiltroLocality(geocoder);
//     // }
//   });
// }
//
// // Dar funcionalidad a geocoder (buscar)
//
// function geocodeAddress(geocoder) {
//   // Tomo de la direccion elegida con el autocomplete solo la primera parte, hasta la coma, donde tengo calle y número
//   direccion.value = direccion.value.substr(0, direccion.value.indexOf(','));
//   var address = direccion.value;
//   // Busco por address y filtro por región (país) elegida por usuario para que priorice resultados dentro de ese país
//   geocoder.geocode({
//     'address': address,
//     // 'region': 'AR',
//     componentRestrictions: {
//       country: 'ar',
//       // Filtro por provincia
//       administrativeArea: provincia.value
//     }
//   }, function(results, status) {
//     // Si está todo ok guardo los resultados en una variable
//     if (status === google.maps.GeocoderStatus.OK) {
//       var resultado = results[0];
//
//       // Completo los inputs restantes con la data que me provee Google
//       completarDireccion('direccion', 'route', resultado);
//       // Para la dirección además de la función normal tengo que hacer un proceso similar pero para anexarle la altura de la calle
//       for (var i = 0; i < resultado.address_components.length; i++) {
//         var componente = resultado.address_components[i];
//         if (componente.types[0] == 'street_number') {
//           document.querySelector('input[name="direccion"]').value += ' ' + componente.long_name;
//         }
//       }
//
//       // Sigo con los otros
//       completarDireccion('ciudad', 'locality', resultado);
//       completarDireccion('zipcode', 'postal_code', resultado);
//
//       // Asigno valores de lat y lon a inputs ocultos para poder después guardarlos en db con laravel
//       latitud.value = resultado.geometry.location.lat();
//       longitud.value = resultado.geometry.location.lng();
//
//       // Cambio la posición del mapa para ajustarla a las nuevas coordenadas y pongo un círculo
//       mapaYCirculo(mymap,latitud.value,longitud.value);
//
//       // Muestro alerta por error en mapa si es CABA
//       // if (provincia.value == CABA) {
//         document.getElementById('addresswarning').style.display = 'block';
//       // }
//
//       // Muestro el párrafo con información
//       document.getElementById('mapwarning').style.display = 'block';
//
//     } else {
//       alert('Ocurrió el siguiente error: ' + status + '. Intente nuevamente con otra dirección.');
//     }
//   });
// }
//
// // Igual que el de arriba pero con un filtro más de locality (ciudad)
// function geocodeAddressConFiltroLocality(geocoder) {
//   direccion.value = direccion.value.substr(0, direccion.value.indexOf(','));
//   var address = direccion.value;
//   geocoder.geocode({
//     'address': address,
//     'region': 'AR',
//     componentRestrictions: {
//       administrativeArea: provincia.value,
//       locality: ciudad.value
//     }
//   }, function(results, status) {
//     if (status === google.maps.GeocoderStatus.OK) {
//       var resultado = results[0];
//       completarDireccion('direccion', 'route', resultado);
//       for (var i = 0; i < resultado.address_components.length; i++) {
//         var componente = resultado.address_components[i];
//         if (componente.types[0] == 'street_number') {
//           document.querySelector('input[name="direccion"]').value += ' ' + componente.long_name;
//         }
//       }
//       completarDireccion('ciudad', 'locality', resultado);
//       completarDireccion('zipcode', 'postal_code', resultado);
//       latitud.value = resultado.geometry.location.lat();
//       longitud.value = resultado.geometry.location.lng();
//       mapaYCirculo(mymap,latitud.value,longitud.value);
//       // if (provincia.value == CABA) {
//         document.getElementById('addresswarning').style.display = 'block';
//       // }
//       document.getElementById('mapwarning').style.display = 'block';
//     } else {
//       alert('Ocurrió el siguiente error: ' + status + '. Intente nuevamente con otra dirección.');
//     }
//   });
// }
//
// // Función para buscar por parámetro dentro de los resultados que me trae el JSON de la API de Google Maps y asignar el valor al input correspondiente
// function completarDireccion(inputName, jsonName, resultado){
//   for (var i = 0; i < resultado.address_components.length; i++) {
//     var componente = resultado.address_components[i];
//     if (componente.types[0] == jsonName) {
//       document.querySelector('input[name=' + inputName + ']').value = componente.long_name;
//     }
//   }
// }
//
// // Validación para que nombre sea por lo menos de 8 letras
//
// var nombre = document.querySelector('input[name="nombre"]');
//
// nombre.addEventListener('change',function(){
//   // Variable para chequear si ya agregué alerta y para borrarla después cuando se cumpla la condición
//   var elementExists = document.getElementById("alertanombre");
//
//   if (nombre.value.length < 10) {
//     // Creo alerta
//     var alertanombre = document.createElement("div");
//     alertanombre.setAttribute("id", "alertanombre");
//     alertanombre.style.paddingTop = "4px";
//     alertanombre.innerHTML = "<span style='font-weight:bold; font-size:13px; color:#990606;'>El nombre del espacio debe ser más largo</span>";
//     document.querySelector('.upload-div-nombre').appendChild(alertanombre);
//   } else if (elementExists) {
//     // Borro alerta
//     document.querySelector('.upload-div-nombre').removeChild(elementExists);
//   }
// });
//
// // Escondo advertencia de foto
// var foto = document.querySelector('input[type="file"]');
// foto.onchange = function(){
//   document.getElementById('photowarning').style.display = 'none';
// }
//
// // Muestro información sobre qué es cada tipo de espacio
// var infoespacio = document.querySelector('.uploadEspacio .form-generico .upload-label-titulo span');
//
// infoespacio.addEventListener('click', function(){
//   // Variable para chequear si ya agregué div y para borrarlo después cuando se cumpla la condición
//   var elementExists = document.getElementById("infoespacio");
//   console.log('1');
//
//   if (!elementExists) {
//     console.log('2');
//     // Creo div y el resto
//     var infoespacio = document.createElement("div");
//     infoespacio.setAttribute("id", "infoespacio");
//     infoespacio.setAttribute("style", "display:block; font-size:0.7em; text-align:left; font-weight:normal; color: #6e6e6e");
//     infoespacio.innerHTML = "<p style='margin-top:10px;'>Cochera Privada: espacio del que el usuario es propietario o puede disponer su uso, como un garage en el hogar o una cochera en un edificio</p><p>Espacio en hogar: lugar mas reducido en tamaño en el que no siempre entra un auto, por ejemplo, el living de la casa</p><p>Playa de Estacionamiento: establecimiento cuya actividad comercial es el alquiler de cocheras</p>";
//     document.getElementById('label-tipoespacio').appendChild(infoespacio);
//   } else {
//     console.log('3');
//     // Borro alerta
//     document.getElementById('label-tipoespacio').removeChild(elementExists);
//   }
// });
//
//
//
//
//
// // Script para dar funcionalidad a botones - y +
//
// // var sumar = function sumar(){
// //   var input = this.parentNode.querySelector('input');
// //   if (input.value == 10) {
// //     return;
// //   } else {
// //     if (input.value == 0) {
// //       input.value = 1;
// //     } else {
// //       input.value = parseInt(input.value) + 1;
// //     }
// //   }
// // }
// //
// // var restar = function restar(){
// //   var input = this.parentNode.querySelector('input');
// //   if (input.value == 0) {
// //     return;
// //   } else {
// //     input.value = parseInt(input.value) - 1;
// //   }
// // }
//
// // Funcionalidad a botones de suma y resta en upload espacio info general
//
// // var botonSumarAuto = document.querySelector('button[name="boton-suma-auto"]');
// // var autos = document.querySelector('input[name="cantAutos"]');
// // var botonRestarAuto = document.querySelector('button[name="boton-resta-auto"]');
// // botonSumarAuto.addEventListener('click', sumar);
// // botonRestarAuto.addEventListener('click', restar);
// //
// // var botonSumarMoto = document.querySelector('button[name="boton-suma-moto"]');
// // var motos = document.querySelector('input[name="cantMotos"]');
// // var botonRestarMoto = document.querySelector('button[name="boton-resta-moto"]');
// // botonSumarMoto.addEventListener('click', sumar);
// // botonRestarMoto.addEventListener('click', restar);
// //
// // var botonSumarBicicleta = document.querySelector('button[name="boton-suma-bici"]');
// // var bicis = document.querySelector('input[name="cantBicicletas"]');
// // var botonRestarBicicleta = document.querySelector('button[name="boton-resta-bici"]');
// // botonSumarBicicleta.addEventListener('click', sumar);
// // botonRestarBicicleta.addEventListener('click', restar);
//
//
//
// // // Script para hacer ajax calls y llenar los campos de países
// //
// // var selectpais = document.querySelector("select[name='pais']");
// //
// // var xmlhttp = new XMLHttpRequest();
// //
// // xmlhttp.onreadystatechange = function() {
// //   if (xmlhttp.readyState == 4 & xmlhttp.status == 200) {
// //     console.log(xmlhttp.responseText);
// //     // Obtengo JSON de la API
// //     var objeto = JSON.parse(xmlhttp.responseText);
// //
// //     // Agrego options dentro del select de países
// //     for (var x in objeto) {
// //       var option = document.createElement("OPTION");
// //       option.value = objeto[x].name;
// //       option.text = objeto[x].name;
// //       if (objeto[x].name == 'Argentina') {
// //         // option.setAttribute('selected', 'true');
// //       }
// //       selectpais.appendChild(option);
// //     }
// //   }
// // };
// //
// // xmlhttp.open("GET", "https://restcountries.eu/rest/v2/all", true);
// // xmlhttp.send();
// //
// //
// // // Script para hacer ajax call y llenar el campo de provincias al elegir Argentina
// //
// // selectpais.addEventListener("change", function(){
// //   if (selectpais.value == 'Argentina') {
// //
// //     var selectprovincia = document.querySelector("select[name='provincia']");
// //
// //     var xmlhttp2 = new XMLHttpRequest();
// //
// //     xmlhttp2.onreadystatechange = function() {
// //       if (xmlhttp2.readyState == 4 & xmlhttp2.status == 200) {
// //         console.log(xmlhttp2.responseText);
// //         // Obtengo JSON de la API
// //         var objeto = JSON.parse(xmlhttp2.responseText).contenido;
// //
// //         // Agrego options dentro del select de provincias
// //         for (var x in objeto) {
// //           var option = document.createElement("OPTION");
// //           option.value = x;
// //           option.text = x;
// //           if (x == 'Ciudad de Buenos Aires') {
// //             // option.setAttribute('selected', 'true');
// //           }
// //           selectprovincia.appendChild(option);
// //         }
// //       }
// //     };
// //
// //     xmlhttp2.open("GET", "http://pilote.techo.org/?do=api.getRegiones?idPais=1", true);
// //     xmlhttp2.send();
// //   }
// //
// // });
