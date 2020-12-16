<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../resources/css/bootstrap.min.css">
    <link rel="stylesheet" href="../resources/css/estilo.css">
    <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet" id="bootstrap-css">
    <title>Login</title>
</head>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

<body>
  <header>
    <nav class="navbar navbar-expand-sm navbar-dark static-top">
        <div class="container-fluid">
            <img src="imagenes/logoanimado_blanco.gif" alt="logo" width="25%">
            <button class="navbar-toggler text-black" type="button" data-toggle="collapse" data-target="#opciones">
              <img class="img-fluid "src="imagenes/menu.png" alt="menu" width="30">
            </button>
          <div class="collapse navbar-collapse " id="opciones">
            <ul class="navbar-nav ml-auto d-flex float-right text-right">
              <li class="nav-item active">
                <a class="nav-link text-white" href="#" id="link"><strong>Inicio</strong></a>
              </li>
              <li class="nav-item text-white">
                <a class="nav-link text-white" href="#" id="link"><strong>Visitas guiadas</strong></a>
              </li>
              <li class="nav-item dropdown d-flex flex-row-reverse">
                <a class="nav-link text-white" data-toggle="dropdown" href="#" role="button" ><img src="imagenes/perfil.png" alt="logo" width="25px" class="rounded-circle">
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                  <a class="dropdown-item" href="#">Inicia Sesion</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">Registrarse</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
    </nav>
  </header>


 
 
 
 
  <div class="container">
	<div class="row">
        <div class="span12">
    		<div class="" id="loginModal">
              <div class="modal-header">
                
                <h3>Ya tienes una cuenta?</h3>
              </div>
              <div class="modal-body">
                <div class="well">
                  <ul class="nav nav-tabs">
                    <li class="active"><a href="#login" data-toggle="tab">Iniciar Sesión</a></li>
                    <li><a href="#create" data-toggle="tab">Registrarse</a></li>
                  </ul>
                  <div id="myTabContent" class="tab-content">
                    <div class="tab-pane active in" id="login">
                      <form class="form-horizontal" action='' method="POST">
                        <fieldset>
                          <div id="legend">
                            <legend class="">Iniciar Sesión</legend>
                          </div>    
                          <div class="control-group">
                            
                            <label class="control-label"  for="username">Nombre de usuario</label>
                            <div class="controls">
                              <input type="text" id="username" name="username" placeholder="" class="input-xlarge">
                            </div>
                          </div>
     
                          <div class="control-group">
                            
                            <label class="control-label" for="password">Contraseña</label>
                            <div class="controls">
                              <input type="password" id="password" name="password" placeholder="" class="input-xlarge">
                            </div>
                          </div>
     
     
                          <div class="control-group">
                            
                            <div class="controls">
                              <button class="btn btn-success">Siguiente</button>
                            </div>
                          </div>
                        </fieldset>
                      </form>                
                    </div>
                    
                    
                    
                    
                    <div class="tab-pane active-in" id="create">
                      <form id="tab">
                      <div id="legend">
                            <legend class="">Registrarse</legend>
                          </div>   
                        <label>Tipo de usuario</label>
                        <select value="" class="input-xlarge"> 
                        <option>Cliente</option>
                        <option>Guia</option>
                        <option>Administrador</option>
                        </select>
                        <label>Nombre</label>
                        <input type="text" value="" class="input-xlarge">
                        <label>Email</label>
                        <input type="text" value="" class="input-xlarge">
                        <label> Verificar Email</label>
                        <input type="text" value="" class="input-xlarge">
                        <label> Contraseña</label>
                        <input type="text" value="" class="input-xlarge">
                        
     
                        <div>
                          <button class="btn btn-primary">Crear cuenta</button>
                        </div>
                      </form>
                    </div>
                </div>
              </div>
            </div>
        </div>
	</div>
</div>








  <footer class="page-footer font-small bg-dark text-light">

    <div class="container text-center text-md-left d-flex">

      <div class="row mt-5">

        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">

          <h6 class="text-uppercase font-weight-bold">SeFerTour</h6>
          <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
          <p>Una empresa pequeña, dedicada a dar tours gartuitos por diferentes partes de españa y con la posibilidad
            de darse a conocer como guia.
          </p>

        </div>

        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">


          <h6 class="text-uppercase font-weight-bold">Redes sociales</h6>
          <hr class="accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
          <p>
            <a href="#"><img src="imagenes/insta.png" alt="insta" width="20%"></a> Instagram
          </p>
          <p>
            <a href="#"><img src="imagenes/facebook.png" alt="facebook" width="20%"></a> Facebook
          </p>
          <p>
            <a href="#"><img src="imagenes/twitter.png" alt="twitter" width="20%"></a> Twitter
          </p>

        </div>

        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">

          <h6 class="text-uppercase font-weight-bold">Enlaces</h6>
          <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
          <p>
            <a href="#!">Cuenta</a>
          </p>
          <p>
            <a href="#!">Registrarse</a>
          </p>

        </div>

        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">


          <h6 class="text-uppercase font-weight-bold">Contacto</h6>
          <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
          <p>Donostia, Gipuzkoa</p>
          <p>info@sefertour.com</p>
          <p>+ 34 234 567 88</p>
          <p>+ 34 234 567 89</p>

        </div>

      </div>
    </div>

    <div class="text-center py-3">� 2020 Copyright:
      <a href="#"> SeFerTour</a>
    </div>

  </footer>

</body>
</html>