// Asigno todos los elementos a presioanr y mostrar a variables
var btnMisEspacios = document.querySelector('.navbar-misespacios');
var btnOtrosEspacios = document.querySelector('.navbar-otrosespacios');
var misEspacios = document.getElementById('alquileres-mis-espacios');
var otrosEspacios = document.getElementById('alquileres-otros-espacios');


// Funciones para cambiar estilos según el botón que apreto
btnMisEspacios.addEventListener('click',function(){
  this.style.fontWeight = "bold";
  this.style.color = "rgb(72, 168, 193)";
  btnOtrosEspacios.style.fontWeight = "normal";
  btnOtrosEspacios.style.color = "rgb(51,51,51)";
  otrosEspacios.style.display = "none";
  misEspacios.style.display = "block";
});
btnOtrosEspacios.addEventListener('click',function(){
  this.style.fontWeight = "bold";
  this.style.color = "rgb(72, 168, 193)";
  btnMisEspacios.style.fontWeight = "normal";
  btnMisEspacios.style.color = "rgb(51,51,51)";
  misEspacios.style.display = "none";
  otrosEspacios.style.display = "block";
});
