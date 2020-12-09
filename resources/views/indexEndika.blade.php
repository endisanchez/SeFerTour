<!DOCTYPE html>
<html class=" font-weight-light" lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>SeFerTour</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../resources/css/bootstrap.min.css">
    <link rel="stylesheet" href="../resources/css/estilosEndika.css">
    <!-- SCRIPTS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </head>


  <body>

    <!-- MENU -->
    <header>
      <nav class="navbar navbar-expand-lg">
        <div class="d-flex d-xl-block">
          <button class="navbar-toggler text-black" type="button" data-toggle="collapse" data-target="#opciones">
            <img class="img-fluid "src="img/menu.png" alt="menu" width="40">
          </button>
          <a class="navbar-brand ml-4 ml-xl-0" href="#"><img class="img-fluid" src="img/logoanimado_negro.gif" alt="logoanimado"></a>
        </div>

     <div class="collapse navbar-collapse" id="opciones">
       <ul class="navbar-nav">
         <li class="active mx-lg-5 p-4 p-lg-0"><a href="#">SeFerTour</a></li>
         <li class="mx-lg-5 p-4 p-lg-0"><a href="#">Tours</a></li>
         <li class="mx-lg-5 p-4 p-lg-0"><a href="#"><strong>Inicio Sesión</strong>/<strong>Registrarse</strong></a></li>
       </ul>
     </div>
    </header>

    <!-- CARRUSEL -->
    <section class ="container-fluid mt-2">
      <div id="carousel" class="carousel slide carousel-fade" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="d-block w-100" src="img/foto1.jpg" alt="Primera foto">
            <div class="carousel-caption d-none d-md-block">
              <h5 class="font-weight-light">Descubre todo lo que te rodea.</h5>
              <p>De forma completamente gratuita.</p>
            </div>
          </div>

          <div class="carousel-item">
            <img class="d-block w-100" src="img/foto3.jpg" alt="Segunda foto">
            <div class="carousel-caption d-none d-md-block">
              <h5 class="font-weight-light">Reserva tu visita favorita.</h5>
              <p>Registrate como cliente para poder disfrutar de cualquier tour de forma gratuita.</p>
            </div>
          </div>

          <div class="carousel-item">
            <img class="d-block w-100" src="img/foto2.jpg" alt="Segunda foto">
            <div class="carousel-caption d-none d-md-block">
              <h5 class="font-weight-light">Date a conocer.</h5>
              <p>Inscribete como guía para que puedan conocerte.</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- CARDS -->
    <section class="container-fluid mt-5 text-center">
      <div id="animaciontitulo">
        <div id="titulo">
          <h3 class="titulos text-center lead mb-4">Las visitas guiadas más extensas, a tu alcance.</h3>
        </div>
      </div>
      <div class="row d-flex mt-5">
        <div class="flip-card col-12 col-md-4 mb-5">
          <div class="flip-card-inner">
            <div class="flip-card-front mb-5 text-center">
              <div class="card-body">
                <h5 class="card-title font-weight-light">Descubre</h5>
                <img class="img-fluid my-5" src="img/libro.png" alt="Card image cap" width="100">
              </div>
            </div>

            <div class="flip-card-back text-dark text-center">
              <div class="card-body">
                <p class="card-text"><strong>Descubre sitios que te gusten en nuestra web.</strong></p>
                <p>Visita la página de tours para descubrir nuevos lugares a los que viajar y de los que aprender.</p>
                <img class="img-fluid mt-xl-3 rounded mb-2" src="img/sft1.jpg" alt="Card image cap">
              </div>
            </div>
          </div>
        </div>

        <div class="flip-card col-12 col-md-4 mb-5">
          <div class="flip-card-inner">
            <div class="flip-card-front text-center">
              <div class="card-body">
                <h5 class="card-title font-weight-light">Aprende</h5>
                <img class="img-fluid my-5" src="img/aprender.png" alt="Card image cap" width="100">
              </div>
            </div>

            <div class="flip-card-back text-dark text-center">
              <div class="card-body">
                <p class="card-text"><strong>Aprende todo lo posible de los sitios que visites.</strong></p>
                <p>Dicen que cada día se aprende algo nuevo, ponlo en práctica reservando uno de nuestros tours.</p>
                <img class="img-fluid mt-xl-3 rounded mb-2" src="img/sft2.jpg" alt="Card image cap">
              </div>
            </div>
          </div>
        </div>

        <div class="flip-card col-12 col-md-4 mb-5">
          <div class="flip-card-inner">
            <div class="flip-card-front text-center">
              <div class="card-body">
                <h5 class="card-title font-weight-light">Explora</h5>
                <img class="img-fluid my-5" src="img/lupa.png" alt="Card image cap" width="100">
              </div>
            </div>

            <div class="flip-card-back text-dark text-center">
              <div class="card-body">
                <p class="card-text"><strong>Explora nuevos lugares que visitar.</strong></p>
                <p>¿Quieres saber todo sobre el lugar al que vas a viajar? ¡Reserva tu tour ya y disfruta de la experiencia!</p>
                <img class="img-fluid mt-xl-3 rounded mb-2" src="img/sft3.jpg" alt="Card image cap">
              </div>
            </div>
          </div>
        </div>
    </section>

    <!-- FOOTER -->
    <footer class="page-footer p-5">
      <div class="container-fluid">

        <ul class="list-unstyled list-inline text-center d-flex justify-content-center">

          <li class="list-inline-item">
            <a class="btn-floating mx-1" href="https://es-es.facebook.com/">
              <img class="img-fluid mx-3" src="img/iconofacebook.png" alt="iconofb" width="50">
            </a>
          </li>

          <li class="list-inline-item">
            <a class="btn-floating btn-fb mx-1" href="https://www.instagram.com/">
              <img class="img-fluid mx-3" src="img/iconoinsta.png" alt="iconofb" width="50">
            </a>
          </li>

          <li class="list-inline-item">
            <a class="btn-floating btn-fb mx-1" href="https://es.linkedin.com/">
              <img class="img-fluid mx-3" src="img/iconolinkedin.png" alt="iconofb" width="50">
            </a>
          </li>

          <li class="list-inline-item">
            <a class="btn-floating btn-fb mx-1" href="https://mobile.twitter.com/?lang=es">
              <img class="img-fluid mx-3" src="img/iconotwitter.png" alt="iconofb" width="50">
            </a>
          </li>
        </ul>
        <div class="text-center p-3 mt-4">© 2020 Copyright:
          <span><strong>SeFerTour</strong></span>
        </div>
      </div>

  </footer>

  </body>
</html>
