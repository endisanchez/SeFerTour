<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../resources/css/bootstrap.min.css">
    <link rel="stylesheet" href="../resources/css/estilo.css">
    <title>SeFerTour</title>

</head>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


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
              <li><a href="#">En</a></li>
              <li><a href="#">Es</a></li>
              <li class="nav-item dropdown d-flex flex-row-reverse">
                <a class="nav-link text-white" data-toggle="dropdown" href="#" role="button" ><img src="imagenes/perfil.png" alt="logo" width="25px" class="rounded-circle">
                </a>
                <div class="dropdown-menu dropdown-menu-right">

                  

                  <a class="dropdown-item" href="{{ url('login') }}">Inicia Sesion</a>

                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">Registrarse</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
    </nav>
  </header>

    <section id="seccion" class="container-fluid text-light">
      <div class="row">
        <div class="col-12 mt-4">
          <h1>Reserva tu tour</h1>
          <div class="text-light mt-4">
            <p>Encuantra el mejor tour con los mejores guias, GRATIS</p>
          </div>
        </div>
        <div id="formulario" class="col-8">
          <form>
            <div class="form-group">
              <label for="lugar">Donde</label>
              <input type="text" class="form-control" id="lugar" placeholder="Lugar">
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="fecha">Cuando</label>
                <input type="date" class="form-control" id="fecha">
              </div>
              <div class="form-group col-md-6">
                <label for="personas">Cuantos</label>
                <input type="number" min="1" class="form-control" id="personas" placeholder="Personas">
              </div>
            </div>
            <button type="submit" class="btn mt-2" id="botonFormulario"><strong>Buscar</strong></button>
          </form>
        </div>
      </div>
    </section>

    <section class="container-fluid text-center p-3" id="topVisitas">
      <div>
        <h1>Mejores Tours</h1>
        <div class="mt-4">
          <p>Aqui podras encontrar los tours preferidos por los visitantes</p>
        </div>
        <div class="jumbotron container">
        <p>{{ trans('welcome.home') }}</p>
    </div>
      </div>
        <div class="row">
          <div class="col-lg-4 col-12 pt-2">
            <a href="#">
              <div class="card bg-dark text-white" id="fondo">
                <img class="card-img" src="imagenes/oficina2r.jpg" alt="Card image"  width="110%"/>
                <div class="card-img-overlay">
                  <p class="letrasCard">MADRID</p>
                </div>
              </div>
            </a>
          </div>
          <div class="col-lg-4 col-12 pt-2">
            <a href="#">
              <div class="card bg-dark text-white" id="fondo">
                <img class="card-img" src="imagenes/oficina4r.jpg" alt="Card image"/>
                <div class="card-img-overlay">
                  <p class="letrasCard">BARCELONA</p>
                </div>
              </div>
            </a>
          </div>
          <div class="col-lg-4 col-12 pt-2">
            <a href="#">
              <div class="card bg-dark text-white" id="fondo">
                <img class="card-img" src="imagenes/oficina3r.jpg" alt="Card image"/>
                <div class="card-img-overlay">
                  <p class="letrasCard">SEVILLA</p>
                </div>
              </div>
            </a>
          </div>
        </div>
      </section>

    <section id="video">
      <h1>Vive experiencias</h1>
      <video preload="auto" loop="" autoplay="" muted="" width="75%" class="my-5">
        <source src="imagenes/videoMuestra.mp4" type="video/mp4">
      </video>
    </section>

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


    

    <div class="text-center py-3">© 2020 Copyright:

      <a href="#"> SeFerTour</a>
    </div>

  </footer>

</body>

</html>



