window.onload = ocultar;

function ocultar() {
    var editar = document.getElementById('editPerfil');

    editar.style.display = "none";


}


function muestraContenido() {
  var info = document.getElementById('infoperfil');
  var editar = document.getElementById('editPerfil');

  
  info.style.display = "none";
  editar.style.display = "block";


}

function muestraEdit() {
    window.location.href = "\perfil";
  
  }