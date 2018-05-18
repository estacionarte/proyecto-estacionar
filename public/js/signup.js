  // variables
  const nombre = document.getElementById('nombre');
  const apellido = document.getElementById('apellido');
  const dia = document.getElementById('dia');
  const mes = document.getElementById('mes');
  const anio = document.getElementById('anio');
  const email = document.getElementById('email');
  const password = document.getElementById('password');
  const password2 = document.getElementById('password2');
  const btnEnviar = document.getElementById('enviar');

  // event listener
  eventListeners();

  function eventListeners(){
    // inicio de la app y deshabilitar boton-submit
    document.addEventListener('DOMContentLoaded', inicioApp);

    // campos del form
    nombre.addEventListener('blur', validarCampo);
    apellido.addEventListener('blur', validarCampo);
    dia.addEventListener('blur', validarCampo);
    mes.addEventListener('blur', validarCampo);
    anio.addEventListener('blur', validarCampo);
    email.addEventListener('blur', validarCampo);
    password.addEventListener('blur', validarCampo);
    password2.addEventListener('blur', validarCampo);
    btnEnviar.addEventListener('click', registrarse);
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

    if (nombre.value !== '' && apellido.value !== '' && dia.value !== '' && mes.value !== '' && anio.value !== '' && password2.value !== '' && email.value !== '' && password.value !== '') {
        if (errores.value !== 0) {
          btnEnviar.disabled = false;
        }
    }
  }

  // efecto spinner
  function registrarse(){
    // spinner al presionar el boton-submit
    let spinnerGif = document.querySelector('#signupLoader');
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
