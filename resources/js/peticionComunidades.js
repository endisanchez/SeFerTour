let peticion_http = new XMLHttpRequest();

window.onload = peticion, muestraContenido;

function peticion() {
  peticion_http.open('GET', "http://localhost/comunidades.json", true);
  peticion_http.onreadystatechange = muestraContenido;
  peticion_http.send(null);
}

function muestraContenido() {
  var desplegable = document.getElementById('desp');
  if(peticion_http.readyState == 4) {
    if(peticion_http.status == 200) {
      var respuesta = peticion_http.responseText;
      var json = JSON.parse(peticion_http.responseText);
      for(var i=0; i<json.comunidades.length; i++) {
          desplegable.innerHTML += "<option>" + json.comunidades[i].nombre + "<option>";
      }
    }
  }
}
