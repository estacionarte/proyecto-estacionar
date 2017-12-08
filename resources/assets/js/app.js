
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

  // Funcionalidad a botones de suma y resta en upload espacio info general
  var botonSumarAuto = document.querySelector('button[name="boton-suma-auto"]');
  var autos = document.querySelector('input[name="cantAutos"]');
  var botonRestarAuto = document.querySelector('button[name="boton-resta-auto"]');
  botonSumarAuto.addEventListener('click', sumar);
  botonRestarAuto.addEventListener('click', restar);

  var botonSumarMoto = document.querySelector('button[name="boton-suma-moto"]');
  var motos = document.querySelector('input[name="cantMotos"]');
  var botonRestarMoto = document.querySelector('button[name="boton-resta-moto"]');
  botonSumarMoto.addEventListener('click', sumar);
  botonRestarMoto.addEventListener('click', restar);

  var botonSumarBicicleta = document.querySelector('button[name="boton-suma-bici"]');
  var bicis = document.querySelector('input[name="cantBicicletas"]');
  var botonRestarBicicleta = document.querySelector('button[name="boton-resta-bici"]');
  botonSumarBicicleta.addEventListener('click', sumar);
  botonRestarBicicleta.addEventListener('click', restar);


}
