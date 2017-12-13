// window.onload = function(){

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

  // Para llenar selects de paises y provincias con ajax calls

  //   ajaxCall('GET','http://pilote.techo.org/?do=api.getPaises',llenarSelectPaises);
  //
  //   var combopaises = document.querySelector("comboPaises");
  //   combopaises.addEventListener("change",cambioPaisSeleccionado);
  // }
  //
  // function cambioPaisSeleccionado(){
  //
  // 		ajaxCall('GET','http://pilote.techo.org/?do=api.getRegiones?idPais=' + this.value ,llenarSelectProvincias);
  // }
  //
  // function llenarSelectPaises(resultado){
  // 		llenarSelect("comboPaises",resultado.contenido);
  // }
  //
  // function llenarSelectProvincias(resultado){
  // 		llenarSelect("comboProvincia",resultado.contenido);
  // }
  //
  // function llenarSelect (selectId, objetoResultado){
  // 	var select = document.getElementById(selectId);
  //
  // 	var option = document.createElement("OPTION");
  // 	option.value = -1;
  // 	option.text = 'País';
  //
  // 	select.appendChild(option);
  //
  // 	for (var x in objetoResultado) {
  //
  //     	var option = document.createElement("OPTION");
  // 			option.value = objetoResultado[x];
  // 			option.text = x;
  //
  // 			select.appendChild(option);
  // 	}
  //
  // }
  //
  // function ajaxCall (method,url,callbackFunction){
  //   var xmlhttp = new XMLHttpRequest();
  //   xmlhttp.onreadystatechange = function() {
  //     if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
  //
  //         var objetoResultado = JSON.parse(xmlhttp.responseText);
  //         callbackFunction(objetoResultado);
  //     }
  //   };
  //
  //   if(method == "POST")
  //     xmlhttp.setRequestHeader("Contenttype", "application/xwwwformurlencoded");
  //
  //   xmlhttp.open(method, url, true);
  //   xmlhttp.send();
  //
  // }
  //
  // function mostrarProvincias() {
  //   var paises = document.getElementById("comoboPaises").value;
  //   paises.onchange = function(){
  //
  //     }
  //
  //     document.getElementById("comboProvincia").disabled = true;
  //
  // }
  // var paises  = document.getElementById('comoboPaises');
  // paises.onchange = function (event){
  //     event.preventDefault();
  //     document.getElementById('comboProvincia').style.display = 'block';
  //     // document.getElementById('segundaParte').style.display = 'block';
  // }

// }
