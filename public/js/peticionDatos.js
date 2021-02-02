let peticion_http2 = new XMLHttpRequest();

function peticion() {
  var apikey = '7ed39494d9da45bcbf7054deded624fd';
  var latitud = document.getElementById('inputlatitud').value;
  var longitud = document.getElementById('inputlongitud').value;

  var api_url = 'https://api.opencagedata.com/geocode/v1/json'

  var request_url = api_url
    + '?'
    + 'key=' + apikey
    + '&q=' + encodeURIComponent(latitud + ',' + longitud)
    + '&pretty=1'
    + '&no_annotations=1';

  peticion_http2.open('GET', request_url, true);
  peticion_http2.onreadystatechange = muestraContenido;
  peticion_http2.send(null);
}

function muestraContenido() {

  var inputCom = document.getElementById('inputComunidad');
  var inputPro = document.getElementById('inputProvincia');
  var inputMun = document.getElementById('inputMunicipio');
  var inputDir = document.getElementById('inputdireccion');

  inputCom.value = '';
  inputPro.value = '';
  inputMun.value = '';
  inputDir.value = '';

  if(peticion_http2.readyState == 4) {
    if(peticion_http2.status == 200) {
      var respuesta = peticion_http2.responseText;
      var json = JSON.parse(peticion_http2.responseText);

      if(json.results[0].components['city']) {
        inputMun.value = json.results[0].components['city'];
      } else if(json.results[0].components['village']) {
        inputMun.value = json.results[0].components['village'];
      } else if(json.results[0].components['town']) {
        inputMun.value = json.results[0].components['town'];
      }

      inputCom.value = json.results[0].components['state'];

      if(json.results[0].components['province']) {
        inputPro.value = json.results[0].components['province'];
      } else if(json.results[0].components['county']) {
        inputPro.value = json.results[0].components['county'];
      }

      inputDir.value = json.results[0].formatted;
    }
  }

}
