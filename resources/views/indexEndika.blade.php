<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>SeFerTour</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../resources/css/estilosEndika.css">
    <link rel="stylesheet" href="../resources/css/bootstrap.min.css">
  </head>


  <body>

    <header>
      <nav class="navbar navbar-expand">
        <div class="container-fluid">
          <div class="navbar-header">
            <a class="navbar-brand" href="#"><img src="img/logoanimado_negro.gif" alt="logoanimado"></a>
          </div>
          <ul class="nav navbar-nav">
            <li class="active mx-5"><a href="#">SeFerTour</a></li>
            <li class="mx-5"><a href="#">Tours</a></li>
            <li class="mx-5"><a href="#"><strong>Inicio Sesión</strong>/<strong>Registrarse</strong></a></li>
          </ul>
        </div>
      </nav>
    </header>

    <section class ="container-fluid mt-3">
      <!-- SCRIPTS PARA EL CARRUSEL -->
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

      <div id="carousel" class="carousel slide carousel-fade" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="d-block w-100" src="img/foto1.jpg" alt="Primera foto">
            <div class="carousel-caption d-none d-md-block">
              <h5>Descubre todo lo que te rodea.</h5>
              <p>De forma completamente gratuita.</p>
            </div>
          </div>

          <div class="carousel-item">
            <img class="d-block w-100" src="img/foto3.jpg" alt="Segunda foto">
            <div class="carousel-caption d-none d-md-block">
              <h5>Reserva tu visita favorita.</h5>
              <p>Registrate como cliente para poder disfrutar de cualquier tour de forma gratuita.</p>
            </div>
          </div>

          <div class="carousel-item">
            <img class="d-block w-100" src="img/foto2.jpg" alt="Segunda foto">
            <div class="carousel-caption d-none d-md-block">
              <h5>Date a conocer.</h5>
              <p>Inscribete como guía para que puedan conocerte.</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="container-fluid mt-4">
      <h3 class="text-center display-4 lead mb-4">EXPLORA</h3>
      <div class="d-flex">
        <div class="card mx-3">
          <img class="card-img-top" src="img/foto1.jpg" alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
          </div>
        </div>

        <div class="card mx-3">
          <img class="card-img-top" src="img/foto1.jpg" alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
          </div>
        </div>

        <div class="card mx-3">
          <img class="card-img-top" src="img/foto1.jpg" alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
          </div>
        </div>
      </div>
    </section>

  </body>
</html>
