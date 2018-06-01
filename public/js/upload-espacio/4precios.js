// Cálculo de precios con descuentos aplicados en upload espacio precios

// Defino el precio en una variable y actualizo su valor y los totales por hora cada vez que cambia
var precioPorHora = document.querySelector('select[name="precioPorHora"]');
if (precioPorHora.value) {
  precio = parseInt(precioPorHora.value.replace(',','.'));
} else {
  precio = 0;
}

// Actualizo todo
precioPorHora.onchange = function(){
  precio = Math.round(precioPorHora.value.replace(',','.') * 100) / 100;
  actualizarTodo();
}

// Calculo descuentos por hora
var descuentoPorHoraHora = document.querySelector('select[name="descuentoPorHoraHora"]');
var precioHora = document.getElementById('precioHora');
descuentoPorHoraHora.onchange = function(){actualizarDescuentoHora();}

var actualizarDescuentoHora = function(){
  if (descuentoPorHoraHora.value) {
    descuento = parseInt(descuentoPorHoraHora.value);
  } else {
    descuento = 0;
  }
  precioHora.textContent = Math.round((1 - descuento) * precio);
  actualizarCalculadora();
}

// Calculo descuentos por seis horas
var descuentoPorHoraSeisHoras = document.querySelector('select[name="descuentoPorHoraSeisHoras"]');
var precioSeisHoras = document.getElementById('precioSeisHoras');
descuentoPorHoraSeisHoras.onchange = function(){actualizarDescuentoSeisHoras();}

var actualizarDescuentoSeisHoras = function(){
  if (descuentoPorHoraSeisHoras.value) {
    descuento = parseInt(descuentoPorHoraSeisHoras.value);
  } else {
    descuento = 0;
  }
  precioSeisHoras.textContent = Math.round((1 - descuento) * precio * 6);
  actualizarCalculadora();
}

// Calculo descuentos por día
var descuentoPorHoraDia = document.querySelector('select[name="descuentoPorHoraDia"]');
var precioDia = document.getElementById('precioDia');
descuentoPorHoraDia.onchange = function(){actualizarDescuentoDia();}

var actualizarDescuentoDia = function(){
  if (descuentoPorHoraDia.value) {
    descuento = parseInt(descuentoPorHoraDia.value);
  } else {
    descuento = 0;
  }
  precioDia.textContent = Math.round((1 - descuento) * precio * 24);
  actualizarCalculadora();
}

// Función para actualizar todos los valores (hacer cálculos)
var actualizarTodo = function(){
  actualizarDescuentoHora();
  actualizarDescuentoSeisHoras();
  actualizarDescuentoDia();
}


// Funciones para la calculadora

// Guardo variables
var dias_calculadora = document.getElementById('dias-calculadora');
var horas_calculadora = document.getElementById('horas-calculadora');
var minutos_calculadora = document.getElementById('minutos-calculadora');
var dias_resultado = document.getElementById('dias-resultado');
var horas_resultado = document.getElementById('horas-resultado');
var minutos_resultado = document.getElementById('minutos-resultado');
var ganancia_resultado = document.getElementById('ganancia-resultado');

// Función para ajustar los valores a los rangos mínimos y máximos
var rangodias = function(){
  if (dias_calculadora.value<0) {
    dias_calculadora.value = 0;
  } else if (dias_calculadora.value>60) {
    dias_calculadora.value = 60;
  }

  dias_resultado.textContent = dias_calculadora.value;
  actualizarCalculadora();
}

var rangohoras = function(){
  if (horas_calculadora.value<0) {
    horas_calculadora.value = 0;
  } else if (horas_calculadora.value>23) {
    horas_calculadora.value = 23;
  }

  horas_resultado.textContent = horas_calculadora.value;
  actualizarCalculadora();
}

var rangominutos = function(){
  if (minutos_calculadora.value<0) {
    minutos_calculadora.value = 0;
  } else if (minutos_calculadora.value>59) {
    minutos_calculadora.value = 59;
  }

  minutos_resultado.textContent = minutos_calculadora.value;
  actualizarCalculadora();
}

// Función para actualizar ganancia de calculadora
var actualizarCalculadora = function(){

  var estadia_calcu_enhoras = dias_calculadora.value * 24 + horas_calculadora.value + minutos_calculadora.value / 60;

  if (estadia_calcu_enhoras < 1) {
    ganancia_resultado.textContent = Math.round(estadia_calcu_enhoras * precioPorHora.value);
  } else if (estadia_calcu_enhoras < 6) {
    ganancia_resultado.textContent = Math.round(estadia_calcu_enhoras * precioPorHora.value * (1 - descuentoPorHoraHora.value));
  } else if (estadia_calcu_enhoras < 24) {
    ganancia_resultado.textContent = Math.round(estadia_calcu_enhoras * precioPorHora.value * (1 - descuentoPorHoraSeisHoras.value));
  } else {
    ganancia_resultado.textContent = Math.round(estadia_calcu_enhoras * precioPorHora.value * (1 - descuentoPorHoraDia.value));
  }
}

dias_calculadora.addEventListener('change',rangodias);
horas_calculadora.addEventListener('change',rangohoras);
minutos_calculadora.addEventListener('change',rangominutos);

// Poner JS a los campos de calculadora para que cada vez que ponen un numero chequee si está dentro de min y max. Ejemplo, si en horas ponen 40, que la cambie a 23, y si ponen -9, que se cambie a 0. tambien cambiar comas por punto


actualizarTodo();
