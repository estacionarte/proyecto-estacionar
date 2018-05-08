  // variables
  const email = document.getElementById('popup-email');
  const password = document.getElementById('popup-pass');
  const btnEnviar = document.getElementById('popup-enviar');

  // event listener
  eventListeners();

  function eventListeners(){
    // inicio de la app y deshabilitar boton-submit
    document.addEventListener('DOMContentLoaded', inicioApp);

    // campos del form
    email.addEventListener('blur', validarCampo);
    password.addEventListener('blur', validarCampo);
    btnEnviar.addEventListener('click', loguearse);
  }

  // funciones
  function inicioApp(){
    // deshabilitar el envio
    btnEnviar.disabled = true;
  }

  function validarCampo(){

    // validar longitud de texto y que no este vacio
    validarLongitud(this);

    // validar que sea un correo
    if (this.type === 'email') {
      validarEmail(this);
    }

    let errores = document.querySelectorAll('.error');

    if (email.value !== '' && password.value !== '') {
        if (errores.value !== 0) {
          btnEnviar.disabled = false;
        }
    }
  }

  // efecto spinner
  function loguearse(){
    // spinner al presionar el boton-submit
    const spinnerGif = document.querySelector('#loaders');
    spinnerGif.style.display = 'block';

    // e.preventDefault();
  }

  // verificar longitud de texto en los campos
  function validarLongitud(campo) {

      if (campo.value.length > 0) {
            campo.style.borderBottomColor = 'green';
            campo.classList.remove('error');
      } else {
            campo.style.borderBottomColor = 'red';
            campo.classList.add('error');
      }
   }

  function validarEmail(campo){
    const correo = campo.value;
    if (correo.indexOf('@') !== -1 && correo.indexOf('.') !== -1) {
          campo.style.borderBottomColor = 'green';
          campo.classList.remove('error');
    } else {
          campo.style.borderBottomColor = 'red';
          campo.classList.add('error');
    }
  }
