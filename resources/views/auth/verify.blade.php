<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="{{ url('../resources/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('../resources/css/estilo.css') }}">
    <title>Tours</title>
</head>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="{{ url('../resources/js/peticionComunidades.js') }}"></script>

<body>
  <header>
    <nav class="navbar navbar-expand-sm navbar-dark static-top">
        <div class="container-fluid">
            <img src="{{url('imagenes/logoanimado_blanco.gif')}}" alt="logo" width="25%">
            <button class="navbar-toggler text-black" type="button" data-toggle="collapse" data-target="#opciones">
              <img class="img-fluid "src="imagenes/menu.png" alt="menu" width="30">
            </button>
          <div class="collapse navbar-collapse " id="opciones">
            <ul class="navbar-nav ml-auto d-flex float-right text-right">
              <li class="nav-item active">
                <a class="nav-link text-white" href="{{ url('/') }}" id="link"><strong>{{ trans('texto.inicio') }}</strong></a>
              </li>
              <li class="nav-item text-white">
                <a class="nav-link text-white" href="{{ url('/tours') }}" id="link"><strong>{{ trans('texto.visit_guiadas') }}</strong></a>
              </li>

              <li><a class="m-3" href="{{ url('lang', ['es']) }}"><img class="img-fluid mt-3 border border-dark" src="{{url('imagenes/espania.png') }}" alt="españa" width="25px" height="25px"></a></li>
              <li><a href="{{ url('lang', ['en']) }}"><img class="img-fluid mt-3 border border-dark mr-2" src="{{url('imagenes/ingles.png')}}" alt="unitedKingdom" width="25px" height="25px"></a></li>

              <li class="nav-item dropdown d-flex flex-row-reverse">
                <a class="nav-link text-white" data-toggle="dropdown" href="{{ url('/') }}" role="button" ><img src="{{url('imagenes/perfil.png')}}" alt="logo" width="25px" class="rounded-circle">
                </a>
                <div class="dropdown-menu dropdown-menu-right">

                  @if(Auth::user())
                    <a class="dropdown-item" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>

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
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                    </form>
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
        <p>Una empresa pequeña, dedicada a dar tours gartuitos por diferentes partes de españa y con la posibilidad de darse a conocer como guia.</p>
      </div>

      <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">

        <h6 class="text-uppercase font-weight-bold">Redes sociales</h6>
        <hr class="accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
        <p>
          <a href="#"><img src="{{ url('imagenes/insta.png') }}" alt="insta" width="20%"></a> Instagram
        </p>
        <p>
          <a href="#"><img src="{{ url('imagenes/facebook.png') }}" alt="facebook" width="20%"></a> Facebook
        </p>
        <p>
          <a href="#"><img src="{{ url('imagenes/twitter.png') }}" alt="twitter" width="20%"></a> Twitter
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
