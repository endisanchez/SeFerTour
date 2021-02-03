let peticion_http = new XMLHttpRequest();

window.onload = peticion, muestraContenido;

function peticion() {

  peticion_http.open('GET', "http://localhost/SeFerTour/public/api/comunidades", true);

  peticion_http.onreadystatechange = muestraContenido;
  peticion_http.send(null);
}

function muestraContenido() {
  var desplegable = document.getElementById('desp');
  if(peticion_http.readyState == 4) {
    if(peticion_http.status == 201) {
      var respuesta = peticion_http.responseText;
      var json = JSON.parse(peticion_http.responseText);
      for(var i=0; i<json.length; i++) {
          desplegable.innerHTML += "<option>" + json[i].nombre + "<option>";
      }
    }
  }
}
