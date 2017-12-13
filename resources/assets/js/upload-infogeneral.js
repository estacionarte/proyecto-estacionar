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
