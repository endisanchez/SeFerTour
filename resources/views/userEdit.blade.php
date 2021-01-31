<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/estilo.css') }}">

    <title>SeFerTour</title>
</head>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


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
                     <a class="dropdown-item" href="{{ url('misTours') }}">{{ trans('texto.mis_tours') }}</a>
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

  <section class="container-fluid my-3">
    <h1 class="text-center my-3">Administración</h1>
    <h4 class="card-title">Editar usuario</h4>
    <div class="card my-4">
        <div class="card-body">
            <form action="{{ route('editarperfiladmin') }}" method="POST" class="mb-3 mr-3">
                @method('PUT')
                @csrf
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="id" value="{{ $usuario->id }}">
                <p class="text-muted text-small mb-2">Nombre</p>
                <input type="text" class="mb-3" name="nombre" value="{{ $usuario->name }}">
                <p class="text-muted text-small mb-2">Apellido</p>
                <input type="text" class="mb-3" name="apellido" value="{{ $usuario->apellido }}">
                <p class="text-muted text-small mb-2">Usuario</p>
                <input type="text" class="mb-3" name="usuario" value="{{ $usuario->usuario }}">
                <p class="text-muted text-small mb-2">DNI</p>
                <input type="text" class="mb-3" name="dni" value="{{ $usuario->dni }}">
                <p class="text-muted text-small mb-2">Email</p>
                <input type="email" class="mb-3" name="email" value="{{ $usuario->email }}">
                <p class="text-muted text-small mb-2">Tipo</p>
                <input type="text" class="mb-3" name="tipo" value="{{ $usuario->tipo }}">

                <button type="submit" class="btn mt-4 d-flex" id="botonFormulario">Guardar</button>
                <button type="submit" onclick="window.location.href = '/admin'" class="btn mt-4 d-flex" id="botonCancelar">Cancelar</button>

              </form>
        </div>
    </div>
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
            <a href="https://www.instagram.com/"><img src="{{url ('imagenes/insta.png')}}" alt="insta" width="20%"></a> Instagram
          </p>
          <p>
            <a href="https://es-es.facebook.com/"><img src="{{url ('imagenes/facebook.png')}}" alt="facebook" width="20%"></a> Facebook
          </p>
          <p>
            <a href="https://twitter.com/?lang=es"><img src="{{url ('imagenes/twitter.png')}}" alt="twitter" width="20%"></a> Twitter
          </p>

        </div>

        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">

          <h6 class="text-uppercase font-weight-bold">{{ trans('texto.enlaces') }}</h6>
          <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
          @if(Auth::user())
            <p>
              <a href="{{ url('perfil') }}">{{ trans('texto.cuenta') }}</a>
            </p>
            <p>
              <a href="{{ route('logout') }}"
                      onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                      {{ trans('texto.salir') }}
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
              </form>
            </p>
          @else
            <p>
              <a href="{{ url('login') }}">{{ trans('texto.inicio_sesion') }}</a>
            </p>
            <p>
              <a href="{{ url('register') }}">{{ trans('texto.registrar') }}</a>
            </p>
          @endif

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
