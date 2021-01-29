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
<script src="{{ url('../resources/js/peticionComunidades.js') }}"></script>


<body>
  <header>
    <nav class="navbar navbar-expand-sm navbar-dark static-top">
        <div class="container-fluid">
            <img src="{{url ('imagenes/logoanimado_blanco.gif') }}" alt="logo" width="25%">
            <button class="navbar-toggler text-black" type="button" data-toggle="collapse" data-target="#opciones">
              <img class="img-fluid "src="{{ url('imagenes/menu.png') }}" alt="menu" width="30">
            </button>
          <div class="collapse navbar-collapse " id="opciones">
            <ul class="navbar-nav ml-auto d-flex float-right text-right">
              <li class="nav-item active">
                <a class="nav-link text-white" href="{{ url('/') }}" id="link"><strong>{{ trans('texto.inicio') }}</strong></a>
              </li>
              <li class="nav-item text-white">
                <a class="nav-link text-white" href="{{ url('/tours') }}" id="link"><strong>{{ trans('texto.visit_guiadas') }}</strong></a>
              </li>

              <li><a class="m-3" href="{{ url('lang', ['es']) }}"><img class="img-fluid mt-3 border border-dark" src="{{url ('imagenes/espania.png')}}" alt="españa" width="25px" height="25px"></a></li>
              <li><a href="{{ url('lang', ['en']) }}"><img class="img-fluid mt-3 border border-dark mr-2" src="{{url ('imagenes/ingles.png')}}" alt="unitedKingdom" width="25px" height="25px"></a></li>

              <li class="nav-item dropdown d-flex flex-row-reverse">
                @if(Auth::user())
                  <a class="nav-link text-white" data-toggle="dropdown" href="{{ url('/') }}" role="button" >
                    @if( Auth::user()->foto )
                      <img src="{{ url('../storage/app/' . Auth::user()->foto) }}" alt="logo" width="25px" height="25px" class="rounded-circle">
                    @else
                      <img src="{{url('imagenes/perfil.png')}}" alt="logo" width="25px" class="rounded-circle">
                    @endif
                  </a>
                @else
                  <a class="nav-link text-white" data-toggle="dropdown" href="{{ url('/') }}" role="button" >
                    <img src="{{url('imagenes/perfil.png')}}" alt="logo" width="25px" class="rounded-circle">
                  </a>
                @endif
                <div class="dropdown-menu dropdown-menu-right">

                  @if(Auth::user())
                    <a class="dropdown-item" href="{{ url('perfil') }}">

                      <b>{{ Auth::user()->usuario }}</b>

                    </a>

                    <div class="dropdown-divider"></div>
                    @if (Auth::user()->tipo =='Cliente')
                    <a class="dropdown-item" href="{{ url('reservar') }}">{{ trans('texto.mis_reservas') }}</a>
                    @elseif (Auth::user()->tipo =='Guia')
                     <a class="dropdown-item" href="{{ url('login') }}">{{ trans('texto.mis_tours') }}</a>
                    @elseif (Auth::user()->tipo =='Admin')
                    <a class="dropdown-item" href="{{ url('login') }}">{{ trans('texto.administrador') }}</a>
                    @endif

                    <a class="dropdown-item" href="{{ route('logout') }}"
                      onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                      {{ trans('texto.salir') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                  @else
                    <a class="dropdown-item" href="{{ url('login') }}">{{ trans('texto.inicio_sesion') }}</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ url('register') }}">{{ trans('texto.registrar') }}</a>
                  @endif
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
          <h1>{{ trans('texto.reserva') }}</h1>
          <div class="text-light mt-4">
            <p>{{ trans('texto.encuentra') }}</p>
          </div>
        </div>
        <div id="formulario" class="col-8">
          <form action="{{ route('filtrar') }}" method="post">
            @csrf
            <div class="form-group">
              <label for="lugar">{{ trans('texto.donde') }}</label>
                <div class="rounded">
                  <select id="desp" name="comunidad" class="rounded col-12 p-2" placeholder="Personas">
                    <option disabled selected>Comunidad</option>
                  </select>
                </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="fecha">{{ trans('texto.cuando') }}</label>
                <input type="date" class="form-control" name="fecha"/>
              </div>

              <div class="form-group col-md-6">
                <label for="personas">{{ trans('texto.cuantos') }}</label>
                <input type="number" min="1" class="form-control" id="personas" placeholder="Personas"/>
              </div>

            </div>
            <button type="submit" class="btn mt-2" id="botonFormulario"><strong>{{ trans('texto.buscar') }}</strong></button>
          </form>
        </div>
      </div>
    </section>

    @if(Auth::user())
    <section class="container-fluid text-center p-3" id="topVisitas">
      <div>
        <h1>{{ trans('texto.mejores') }}</h1>
        <div class="mt-4">
          <p>{{ trans('texto.mejores_texto') }}</p>
        </div>
      </div>
      </div>
        <div class="row">
          <div class="col-lg-4 col-12 pt-2">
            <a href="{{ route('provincia', 'Madrid') }}">
              <div class="card bg-dark text-white" id="fondo">
                <img class="card-img" src="{{url('imagenes/oficina2r.jpg')}}" alt="Card image"  width="110%"/>
                <div class="card-img-overlay">
                  <p class="letrasCard">MADRID</p>
                </div>
              </div>
            </a>
          </div>
          <div class="col-lg-4 col-12 pt-2">
            <a href="{{ route('provincia', 'Cataluña') }}">
              <div class="card bg-dark text-white" id="fondo">
                <img class="card-img" src="{{url('imagenes/oficina4r.jpg')}}" alt="Card image"/>
                <div class="card-img-overlay">
                  <p class="letrasCard">BARCELONA</p>
                </div>
              </div>
            </a>
          </div>
          <div class="col-lg-4 col-12 pt-2">
            <a href="{{ route('provincia', 'Andalucia') }}">
              <div class="card bg-dark text-white" id="fondo">
                <img class="card-img" src="{{url ('imagenes/oficina3r.jpg')}}" alt="Card image"/>
                <div class="card-img-overlay">
                  <p class="letrasCard">SEVILLA</p>
                </div>
              </div>
            </a>
          </div>
        </div>
    </section>
    @else
    <section class="container-fluid mt-5 text-center">
      <div>
        <div>
          <h3 class="display-3">{{ trans('texto.registrar') }}!</h3>
        </div>
      </div>
      <div class="row d-flex mt-5">
        <div class="flip-card col-12 col-md-4 mb-5">
          <div class="flip-card-inner">
            <div class="flip-card-front mb-5 text-center">
              <div class="card-body">
                <h5 class="card-title font-weight-light">{{ trans('texto.descubre') }}</h5>
                <img class="img-fluid my-5" src="{{url('imagenes/libro.png')}}" alt="Card image cap" width="100">
              </div>
            </div>

            <div class="flip-card-back text-dark text-center">
              <div class="card-body">
                <p class="card-text"><strong>{{ trans('texto.descubre_sitios') }}</strong></p>
                <p>{{ trans('texto.visita_la') }}</p>
                <img class="img-fluid mt-xl-3 rounded mb-2"  src="{{url('imagenes/sft1.jpg')}}" alt="Card image cap">
              </div>
            </div>
          </div>
        </div>

        <div class="flip-card col-12 col-md-4 mb-5">
          <div class="flip-card-inner">
            <div class="flip-card-front text-center">
              <div class="card-body">
                <h5 class="card-title font-weight-light">{{ trans('texto.aprende') }}</h5>
                <img class="img-fluid my-5"  src="{{url('imagenes/aprender.png')}}"alt="Card image cap" width="100">
              </div>
            </div>

            <div class="flip-card-back text-dark text-center">
              <div class="card-body">
                <p class="card-text"><strong>{{ trans('texto.aprende_todo') }}</strong></p>
                <p>{{ trans('texto.dicen_que') }}</p>
                <img class="img-fluid mt-xl-3 rounded mb-2"  src="{{url('imagenes/sft2.jpg')}}" alt="Card image cap">
              </div>
            </div>
          </div>
        </div>

        <div class="flip-card col-12 col-md-4 mb-5">
          <div class="flip-card-inner">
            <div class="flip-card-front text-center">
              <div class="card-body">
                <h5 class="card-title font-weight-light">{{ trans('texto.explora') }}</h5>
                <img class="img-fluid my-5" src="{{url('imagenes/lupa.png')}}" alt="Card image cap" width="100">
              </div>
            </div>

            <div class="flip-card-back text-dark text-center">
              <div class="card-body">
                <p class="card-text"><strong>{{ trans('texto.explora_nuevos') }}</strong></p>
                <p>{{ trans('texto.quieres_saber') }}</p>
                <img class="img-fluid mt-xl-3 rounded mb-2" src="{{url('imagenes/sft3.jpg')}}" alt="Card image cap">
              </div>
            </div>
          </div>
        </div>
    </section>
    @endif

    <section id="video">
      <h1>{{ trans('texto.experiencias') }}</h1>
      <video preload="auto" loop="" autoplay="" muted="" width="75%" class="my-5">
        <source src="{{url('imagenes/videoMuestra.mp4')}}" type="video/mp4">
      </video>
    </section>

  <footer class="page-footer font-small bg-dark text-light">

    <div class="container text-center text-md-left d-flex">

      <div class="row mt-5">

        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">

          <h6 class="text-uppercase font-weight-bold">SeFerTour</h6>
          <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
          <p>{{ trans('texto.descripcion') }}</p>

        </div>

        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">


          <h6 class="text-uppercase font-weight-bold">{{ trans('texto.redes') }}</h6>
          <hr class="accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
          <p>
            <a href="#"><img src="{{url ('imagenes/insta.png')}}" alt="insta" width="20%"></a> Instagram
          </p>
          <p>
            <a href="#"><img src="{{url ('imagenes/facebook.png')}}" alt="facebook" width="20%"></a> Facebook
          </p>
          <p>
            <a href="#"><img src="{{url ('imagenes/twitter.png')}}" alt="twitter" width="20%"></a> Twitter
          </p>

        </div>

        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">

          <h6 class="text-uppercase font-weight-bold">{{ trans('texto.enlaces') }}</h6>
          <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
          <p>
            <a href="#!">{{ trans('texto.cuenta') }}</a>
          </p>
          <p>
            <a href="#!">{{ trans('texto.registrar') }}</a>
          </p>

        </div>

        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">


          <h6 class="text-uppercase font-weight-bold">{{ trans('texto.contacto') }}</h6>
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
