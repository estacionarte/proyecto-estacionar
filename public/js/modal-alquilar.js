// Popup de botón Alquilar
// Guardo variables a usar
var modal = [];
var btn = [];
var close = [];
var modalactivo;
// Variables para validaciones
var vehiculo = [];
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
var tipoVehiculo;
var divNoDisponible = [];
var btnsubmit = [];
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
  vehiculo[id] = document.querySelectorAll("select[name='vehiculo']")[i];

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

  // Capturo divs de no disponible y botones de submit
  divNoDisponible[id] = document.querySelectorAll(".div-nodisponible")[i];
  btnsubmit[id] = document.querySelectorAll("article input[type='submit']")[i];
}

// Función para chequear disponibilidad
function chequearDisponibilidad(){
  // Ajax call usando jquery
  // Guardo tipo de vehículo elegido
  tipoVehiculo = vehiculo[espacioid].options[vehiculo[espacioid].selectedIndex].text;
  tipoVehiculo = tipoVehiculo.substring(0,4);
  if (tipoVehiculo == 'Auto') {
    tipoVehiculo = 'Automóvil';
  } else if (tipoVehiculo == 'Moto') {
    tipoVehiculo = 'Motocicleta';
  } else if (tipoVehiculo == 'Bici') {
    tipoVehiculo = 'Bicicleta';
  }
  console.log(tipoVehiculo);
  // Paso los parámetros que ya conseguí de las funciones ejecutadas anteriormente
  jQuery(function($){
    $.ajax({
      url: '/alquilar/disponible/{id}/{horariollegada}/{horariopartida}',
      // Paso headers con csrftoken por ser post
      headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
      type: 'POST',
      // Paso parámetros para función
      data: {id:espacioid,horariollegada:comienzo,horariopartida:fin,tipoVehiculo:tipoVehiculo},
      success: function(resultado) {
        // Si el resultado es false (no disponible), muestro div informando esto y deshabilito botón de submit para que no mande el form
        console.log(resultado);
        if (!resultado.disponibleTodo) {
          divNoDisponible[espacioid].style.display = 'block';
          btnsubmit[espacioid].disabled = true;
        } else {
          divNoDisponible[espacioid].style.display = 'none';
          btnsubmit[espacioid].disabled = false;
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
