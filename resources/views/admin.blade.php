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
    <h4 class="card-title container">Usuarios</h4>
    @foreach ($usuarios as $item)
    <div class="card my-4 container">
        <div class="card-body">
            <div class="row">
                <div class="col-6">
                    <b><h6 class="card-text mb-4">{{ $item->usuario }}</h6></b>
                </div>
                <div class="col-6">
                    @if($item->foto != null)
                    <img src="../storage/app/{{ $item->foto }}" alt="perfil" width="50" height="50" class="rounded-circle">
                    @else
                    <img src="{{ url('imagenes/perfil.png') }}" alt="perfil" width="50" height="50" class="rounded-circle">
                    @endif
                </div>
            </div>
            <p class="card-text">Nombre: {{ $item->name }}</p>
            <p class="card-text">Apellido: {{ $item->apellido }}</p>
            <p class="card-text">DNI: {{ $item->dni }}</p>
            <p class="card-text">Email: {{ $item->email }}</p>
            <div class="row">
                <div class="col-6">
                    <p class="card-text">Tipo: {{ $item->tipo }}</p>
                </div>
                <div class="col-6 d-flex justify-content-end">
                    <form action="{{ route('eliminarUsuario', $item) }}" class="d-inline" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit" id="sinEstilo"><img src="{{ url('imagenes/eliminar.png') }}" alt="eliminar" width="30" height="30"></button>
                    </form>
                    <a href="{{ route('editarUsuario', $item) }}" class="ml-2">
                        <img src="{{ url('imagenes/editar.png') }}" alt="eliminar" width="30" height="30">
                    </a>
                </div>
            </div>
        </div>
    </div>
    @endforeach

  </section>

  <section class="container-fluid my-3 mt-5">
    <h4 class="card-title container">Todos los tours</h4>

    @foreach ($tours as $item)
    <div class="card my-4 container">
        <div class="card-body">
            <b><h6 class="card-text mb-4">Guia: {{ $item->id_guia }}</h6></b>
            <p class="card-text">Nombre del tour: {{ $item->nombre }}</p>
            <p class="card-text">Fecha: {{ $item->fecha }}</p>
            <p class="card-text">Hora: {{ $item->hora }}</p>
            <p class="card-text">Comunidad: {{ $item->comunidad }}</p>
            <p class="card-text">Provincia: {{ $item->provincia }}</p>
            <p class="card-text">Ciudad: {{ $item->ciudad }}</p>
            <div class="row">
                <div class="col-6">
                    <p class="card-text">Idioma: {{ $item->idioma_tour }}</p>
                </div>
                <div class="col-6 d-flex justify-content-end">
                    <form action="{{ route('eliminarTour', $item) }}" class="d-inline" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit" id="sinEstilo"><img src="{{ url('imagenes/eliminar.png') }}" alt="eliminar" width="30" height="30"></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach

  </section>

  <section class="container-fluid my-3 mt-5">
    <h4 class="card-title container">Alta de usuario</h4>
    <div class="card my-4 container">
    <div class="card-body">
      <form method="POST" action="{{ route('altaUsuario') }}" accept-charset="UTF-8" enctype="multipart/form-data">
        @csrf

        <div class="form-group row">
          <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

          <div class="col-md-6">
            <input id="name" required maxlength="25" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

            @error('name')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
        </div>

        <div class="form-group row">
          <label for="apellido" class="col-md-4 col-form-label text-md-right">{{ __('Apellido') }}</label>

          <div class="col-md-6">
            <input id="apellido" required maxlength="25" type="text" class="form-control @error('apellido') is-invalid @enderror" name="apellido" value="{{ old('apellido') }}" required autocomplete="apellido" autofocus>

            @error('apellido')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
        </div>

        <div class="form-group row">
          <label for="dni" class="col-md-4 col-form-label text-md-right">{{ __('DNI') }}</label>

          <div class="col-md-6">
            <input id="dni" type="text" required class="form-control @error('dni') is-invalid @enderror" name="dni" value="{{ old('dni') }}" required autocomplete="dni" autofocus>

            @error('dni')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
        </div>

        <div class="form-group row">
          <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

          <div class="col-md-6">
            <input id="email" type="email" required class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

            @error('email')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
        </div>

        <div class="form-group row">
          <label for="usuario" class="col-md-4 col-form-label text-md-right">{{ __('Usuario') }}</label>

          <div class="col-md-6">
            <input id="usuario" type="usuario" required maxlength="50" class="form-control @error('usuario') is-invalid @enderror" name="usuario" value="{{ old('usuario') }}" required autocomplete="usuario">

            @error('usuario')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
        </div>

        <div class="form-group row">
          <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>

          <div class="col-md-6">
            <input id="password" type="password" required class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

            @error('password')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
        </div>

        <div class="form-group row">
          <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Repetir Contraseña') }}</label>

          <div class="col-md-6">
            <input id="password-confirm" required type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
          </div>
        </div>

        <div class="form-group row">
          <label for="tipo" class="col-md-4 col-form-label text-md-right">{{ __('Tipo') }}</label>

          <div class="col-md-6">
            <input id="tipo" type="text" required maxlength="25" class="form-control @error('usuario') is-invalid @enderror" name="tipo" value="{{ old('tipo') }}" required autocomplete="tipo">

            @error('tipo')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
        </div>

        <div class="form-group row mb-0">
          <div class="col-md-6 offset-md-4">
            <button type="submit" class="btn" id="botonFormulario">
              {{ __('Registrarse') }}
            </button>
          </div>
        </div>
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
