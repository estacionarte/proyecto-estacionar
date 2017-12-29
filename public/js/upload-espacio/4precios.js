// Cálculo de precios con descuentos aplicados en upload espacio precios

// Defino el precio en una variable y actualizo su valor y los totales por hora cada vez que cambia
var precioPorMinuto = document.querySelector('input[name="precioPorMinuto"]');
if (precioPorMinuto.value) {
  precio = parseInt(precioPorMinuto.value.replace(',','.'));
} else {
  precio = 0;
}

precioPorMinuto.onchange = function(){
  precio = Math.round(precioPorMinuto.value.replace(',','.') * 100) / 100;
  actualizarTodo();
}

var descuentoPorMinutoHora = document.querySelector('input[name="descuentoPorMinutoHora"]');
var precioHora = document.getElementById('precioHora');
descuentoPorMinutoHora.onchange = function(){actualizarDescuentoHora();}

var actualizarDescuentoHora = function(){
  if (descuentoPorMinutoHora.value) {
    descuento = parseInt(descuentoPorMinutoHora.value)/100;
  } else {
    descuento = 0;
  }
  precioHora.textContent = Math.round((1 - descuento) * precio * 60);
}

var descuentoPorMinutoSeisHoras = document.querySelector('input[name="descuentoPorMinutoSeisHoras"]');
var precioSeisHoras = document.getElementById('precioSeisHoras');
descuentoPorMinutoSeisHoras.onchange = function(){actualizarDescuentoSeisHoras();}

var actualizarDescuentoSeisHoras = function(){
  if (descuentoPorMinutoSeisHoras.value) {
    descuento = parseInt(descuentoPorMinutoSeisHoras.value)/100;
  } else {
    descuento = 0;
  }
  precioSeisHoras.textContent = Math.round((1 - descuento) * precio * 60 * 6);
}

var descuentoPorMinutoDia = document.querySelector('input[name="descuentoPorMinutoDia"]');
var precioDia = document.getElementById('precioDia');
descuentoPorMinutoDia.onchange = function(){actualizarDescuentoDia();}

var actualizarDescuentoDia = function(){
  if (descuentoPorMinutoDia.value) {
    descuento = parseInt(descuentoPorMinutoDia.value)/100;
  } else {
    descuento = 0;
  }
  precioDia.textContent = Math.round((1 - descuento) * precio * 60 * 24);
}

var actualizarTodo = function(){
  actualizarDescuentoHora();
  actualizarDescuentoSeisHoras();
  actualizarDescuentoDia();
}
actualizarTodo();
