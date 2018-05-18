  // variables
  const loginEmail = document.getElementById('login-email');
  const loginPassword = document.getElementById('login-pass');
  const loginBtnEnviar = document.getElementById('login-enviar');

  // event listener
  eventListeners();

  function eventListeners(){
    // inicio de la app y deshabilitar boton-submit
    document.addEventListener('DOMContentLoaded', inicioApp);

    // campos del form
    loginEmail.addEventListener('blur', validarCampo);
    loginPassword.addEventListener('blur', validarCampo);
    loginBtnEnviar.addEventListener('click', loguearse);
  }

  // funciones
  function inicioApp(){
    // deshabilitar el envio
    loginBtnEnviar.disabled = true;
  }

  function validarCampo(){

    // validar longitud de texto y que no este vacio
    validarLongitud(this);

    // validar que sea un correo
    if (this.type === 'email') {
      validarEmail(this);
    }

    let errores = document.querySelectorAll('.error');

    if (loginEmail.value !== '' && loginPassword.value !== '') {
        if (errores.value !== 0) {
          loginBtnEnviar.disabled = false;
        }
    }
  }

  // efecto spinner
  function loguearse(){
    // spinner al presionar el boton-submit
    let spinnerGif = document.querySelector('#signinLoader');
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
