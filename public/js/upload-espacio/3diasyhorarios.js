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
var form = document.getElementById('form-horarios');

// Evito que se mande el form si no hay ningún horario agregado
form.onsubmit = function(event){
  var hayhorarios = document.getElementsByClassName('upload-div-diasemana');
  if (hayhorarios.length < 1) {
    event.preventDefault();
  }
}

// Función para tildar checkbox y que horafin sea siempre mayor a horacomienzo
var setHora = function setHora(){
  // Tildo/destildo checkbox según horario
  if (horacomienzoElegido.value == "0" && horafinElegido.value == "1439") {
    todoeldia.checked = true;
  } else {
    todoeldia.checked = false;
  }
  // Reseteo todas las opciones para que sean eligible
  for (var i = 0; i < 47; i++) {
    horafinElegido.options[i].disabled = false;
  }
  // Le pongo disable a las opciones de horafin menores a horacomienzo elegida
  for (var i = 0; i < horacomienzoElegido.selectedIndex; i++) {
    horafinElegido.options[i].disabled = true;
  }
  // Me aseguro de que horafin sea mayor a horacomienzo
  if (horacomienzoElegido.selectedIndex >= horafinElegido.selectedIndex) {
    horafinElegido.selectedIndex = horacomienzoElegido.selectedIndex;
  }
}

// Si horacomienzo es mayor o igual a horafin, cambio horaFin
horacomienzoElegido.addEventListener('change',setHora);
horafinElegido.addEventListener('change',setHora);

// Si hago click en checkbox "todo el día", seteo valores en desde y hasta
todoeldia.addEventListener('click', function(){
  if (this.checked == true) {
    // Seteo valores cuando se tiquea
    horacomienzoElegido.selectedIndex = 0;
    horafinElegido.selectedIndex = 47;
  }
});

// Función para borrar horario
var borrarHorario = function borrarHorario(event){
  var borrar = confirm("¿Estás seguro de que querés borrar este horario?")
  if (borrar) {
    var divPadre = event.target.parentNode;

    // Vuelvo a habilitar el día en el select
    var nombredia = divPadre.children[0].value;
    if (nombredia == 'Lunes') {
      diaElegido.options[1].disabled = false;
    } else if (nombredia == 'Martes') {
      diaElegido.options[2].disabled = false;
    } else if (nombredia == 'Miércoles') {
      diaElegido.options[3].disabled = false;
    } else if (nombredia == 'Jueves') {
      diaElegido.options[4].disabled = false;
    } else if (nombredia == 'Viernes') {
      diaElegido.options[5].disabled = false;
    } else if (nombredia == 'Sábado') {
      diaElegido.options[6].disabled = false;
    } else {
      diaElegido.options[7].disabled = false;
    }

    // Borro horario
    document.querySelector('.horarios-holder').removeChild(divPadre);
  }
}

// Función para agrgar nuevo día al div contenedor con los horarios que indico en parámetros
var newDia = function newDia(dia, horacomienzo, horafin, horacomienzovalue, horafinvalue){
  var nuevodia = document.createElement("div");
  nuevodia.setAttribute("class", "upload-div-diasemana");
  // Pongo inputs disabled que son los que se ven con el text amigable, e inputs hidden que son los que se mandan con el valor en minutos (ejemplo: texto 23:59 value 1439)
  nuevodia.innerHTML = "<input type='text' name='diasemana[]' class='upload-input-dia' value='"+dia+"' readonly> <input type='text' class='upload-input-hora' value='"+horacomienzo+"' disabled> <span style='text-align:center;'> - </span> <input type='text' name='' class='upload-input-hora' value='"+horafin+"' disabled> <label onclick='borrarHorario(event)' class='upload-label-horario-button'>&#8854;</label> <hr style='margin: 10px 0px;'> <input type='text' name='horacomienzo[]' class='upload-input-hora' value='"+horacomienzovalue+"' style='display:none;'><input type='text' name='horafin[]' class='upload-input-hora' value='"+horafinvalue+"' style='display:none;'>"
  divHorarios.appendChild(nuevodia);
}

// Función para tomar los valores de los campos de horarios, ejecutar newDia y después resetear valores
var ejecutarNewDia = function(){

  // Asigno valores
  var dia = diaElegido.value;
  var horacomienzo = horacomienzoElegido.options[horacomienzoElegido.selectedIndex].text;
  var horafin = horafinElegido.options[horafinElegido.selectedIndex].text;
  var horacomienzovalue = horacomienzoElegido.value;
  var horafinvalue = horafinElegido.value;

  // Ejecuto función si tengo valores
  if (dia && horacomienzo && horafin && horacomienzovalue && horafinvalue) {
    newDia(dia,horacomienzo,horafin,horacomienzovalue,horafinvalue);

    // Reseteo todas las opciones para que sean eligible
    for (var i = 0; i < 47; i++) {
      horafinElegido.options[i].disabled = false;
    }
    // Pongo disabled el día elegido
    diaElegido.options[diaElegido.selectedIndex].disabled = true;
    // Reseteo
    diaElegido.value = "";
    horacomienzoElegido.value = 0;
    horafinElegido.value = 1439;
    todoeldia.checked = true;

  }


}

// Asigno función a botón
var btnagregarhorario = document.getElementById('boton-agregar-horario');
btnagregarhorario.addEventListener('click', ejecutarNewDia);
