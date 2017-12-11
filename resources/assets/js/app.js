
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example', require('./components/Example.vue'));

const app = new Vue({
    el: '#app'
});

window.onload = function() {

  var sumar = function sumar(){
    var input = this.parentNode.querySelector('input');
    if (input.value == 10) {
      return;
    } else {
      if (input.value == 0) {
        input.value = 1;
      } else {
        input.value = parseInt(input.value) + 1;
      }
    }
  }

  var restar = function restar(){
    var input = this.parentNode.querySelector('input');
    if (input.value == 0) {
      return;
    } else {
      input.value = parseInt(input.value) - 1;
    }
  }

  // // Funcionalidad a botones de suma y resta en upload espacio info general
  // var botonSumarAuto = document.querySelector('button[name="boton-suma-auto"]');
  // var autos = document.querySelector('input[name="cantAutos"]');
  // var botonRestarAuto = document.querySelector('button[name="boton-resta-auto"]');
  // botonSumarAuto.addEventListener('click', sumar);
  // botonRestarAuto.addEventListener('click', restar);
  //
  // var botonSumarMoto = document.querySelector('button[name="boton-suma-moto"]');
  // var motos = document.querySelector('input[name="cantMotos"]');
  // var botonRestarMoto = document.querySelector('button[name="boton-resta-moto"]');
  // botonSumarMoto.addEventListener('click', sumar);
  // botonRestarMoto.addEventListener('click', restar);
  //
  // var botonSumarBicicleta = document.querySelector('button[name="boton-suma-bici"]');
  // var bicis = document.querySelector('input[name="cantBicicletas"]');
  // var botonRestarBicicleta = document.querySelector('button[name="boton-resta-bici"]');
  // botonSumarBicicleta.addEventListener('click', sumar);
  // botonRestarBicicleta.addEventListener('click', restar);

  // Cálculo de precios con descuentos aplicados en upload espacio precios

  // Defino el precio en una variable y actualizo su valor y los totales por hora cada vez que cambia
  var precioPorMinuto = document.querySelector('input[name="precioPorMinuto"]');
  precio = parseInt(precioPorMinuto.value.replace(',','.'));

  precioPorMinuto.onchange = function(){
    precio = Math.round(precioPorMinuto.value.replace(',','.') * 100) / 100;
    actualizarTodo();
  }

  var descuentoPorMinutoHora = document.querySelector('input[name="descuentoPorMinutoHora"]');
  var precioHora = document.getElementById('precioHora');
  descuentoPorMinutoHora.onchange = function(){actualizarDescuentoHora();}

  var actualizarDescuentoHora = function(){
    descuento = parseInt(descuentoPorMinutoHora.value)/100;
    precioHora.textContent = Math.round((1 - descuento) * precio * 60);
  }

  var descuentoPorMinutoSeisHoras = document.querySelector('input[name="descuentoPorMinutoSeisHoras"]');
  var precioSeisHoras = document.getElementById('precioSeisHoras');
  descuentoPorMinutoSeisHoras.onchange = function(){actualizarDescuentoSeisHoras();}

  var actualizarDescuentoSeisHoras = function(){
    descuento = parseInt(descuentoPorMinutoSeisHoras.value)/100;
    precioSeisHoras.textContent = Math.round((1 - descuento) * precio * 60 * 6);
  }

  var descuentoPorMinutoDia = document.querySelector('input[name="descuentoPorMinutoDia"]');
  var precioDia = document.getElementById('precioDia');
  descuentoPorMinutoDia.onchange = function(){actualizarDescuentoDia();}

  var actualizarDescuentoDia = function(){
    descuento = parseInt(descuentoPorMinutoDia.value)/100;
    precioDia.textContent = Math.round((1 - descuento) * precio * 60 * 24);
  }

  var actualizarTodo = function(){
    actualizarDescuentoHora();
    actualizarDescuentoSeisHoras();
    actualizarDescuentoDia();
  }
  actualizarTodo();

}
