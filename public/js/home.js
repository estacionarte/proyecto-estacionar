// Validaciones para form de búsqueda de espacios
// Seteo dias de buscador para que sean la fecha de hoy
var diacomienzo = document.querySelector("input[name='search-espacios-dia-comienzo']");
var diafin = document.querySelector("input[name='search-espacios-dia-fin']");
diacomienzo.valueAsDate = new Date();
diafin.valueAsDate = new Date();

// No se puede elegir fecha anterior a la actual
var today = new Date();
var dd = today.getDate();
var mm = today.getMonth()+1; //Enero es 0!
var yyyy = today.getFullYear();

if(dd<10){
      dd='0'+dd
  }
if(mm<10){
    mm='0'+mm
}

today = yyyy+'-'+mm+'-'+dd;
diacomienzo.setAttribute("min", today);
diafin.setAttribute("min", today);

// Asigno a variables los elementos a validar
var direccion = document.querySelector("input[name='search-espacios-input-direccion']");
var horacomienzo = document.querySelector("select[name='search-espacios-hora-comienzo']");
var minutocomienzo = document.querySelector("select[name='search-espacios-minuto-comienzo']");
var horafin = document.querySelector("select[name='search-espacios-hora-fin']");
var minutofin = document.querySelector("select[name='search-espacios-minuto-fin']");


// Creo función para validar
function validarForm(){
  if (!direccion.value || direccion.value.length < 5) {
    alert("Debes ingresar una dirección válida");
    return false;
  }

  // Guardo fechas introducidas
  var fechacomienzo = new Date(diacomienzo.value + " " + horacomienzo.options[horacomienzo.selectedIndex].value + ":" + minutocomienzo.options[minutocomienzo.selectedIndex].value);
  var fechafin = new Date(diafin.value + " " + horafin.options[horafin.selectedIndex].value + ":" + minutofin.options[minutofin.selectedIndex].value);
  var ahora = new Date();

  if (fechacomienzo <= ahora) {
    alert("El horario a buscar debe ser mayor a la hora actual");
    return false;
  }

  if (fechafin <= fechacomienzo) {
    alert("La fecha de partida no puede ser anterior a la de llegada");
    return false;
  }

  return true;
}

// slider Home
$('#slider-home').owlCarousel({
  loop:true,
  margin:10,
  nav:false,
  autoplay:true,
  autoplayTimeout:4000,
  // animateOut: 'fadeOut',
  autoHeight: false,
  responsive:{
        0:{
            items:1
        },
        700:{
            items:2
        },
        960:{
            items:3
        }
    }
})
