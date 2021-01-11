let peticion_http = new XMLHttpRequest();

window.onload = peticion;

function peticion() {
  peticion_http.open('GET', "https://apiv1.geoapi.es/comunidades?type=JSON&sandbox=1", true);
  peticion_http.onreadystatechange = muestraContenido;
  peticion_http.send(null);
}

function muestraContenido() {
  var desplegable = document.getElementById('selectcoms');
  if(peticion_http.readyState == 4) {
    if(peticion_http.status == 200) {
      var respuesta = peticion_http.responseText;
      var json = JSON.parse(peticion_http.responseText);
      for(var i=0; i<json.data.length; i++) {
          desplegable.innerHTML += "<option>" + json.data[i].COM + "<option>";
      }
    }
  }
}
