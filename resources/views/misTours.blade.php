<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/estilo.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin=""/>
    <title>Tours</title>
</head>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>


<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>

<script src="{{ asset('/js/peticionDatos.js') }}"></script>

<body id="bodyregistro">
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
                      <img src="{{ asset('storage/' . Auth::user()->foto )}}" alt="logo" width="25px" height="25px" class="rounded-circle">
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

  <section>
    <h1 class="text-center my-4">Mis Tours</h1>
    <div id="accordion">
      @if(isset($tours))
        @foreach($tours as $tour)
        <div class="card my-5 container">
          <div class="card-header row" id="headingOne">
              <div class="col-0 col-md-2 my-auto d-none d-md-block">
                <img src="{{ url('imagenes/' . $tour->comunidad . '.jpg') }}" width="90" height="90" class="rounded-circle">
              </div>
              <div class="col-10 col-md-8 my-auto">
                <p style="font-size:4vw;" class="col-8 col-md-10 display-4">{{$tour->nombre}}</p>
              </div>
            <button class="btn btn-link col-2" data-toggle="collapse" data-target="#collapseOne-{{ $tour->id }}" aria-expanded="true" aria-controls="collapseOne" class="rounded-circle">
              <img src="{{ url('imagenes/dropdowntours.png')}}" width="50" height="50" class="img-fluid">
            </button>
          </div>

          <div id="collapseOne-{{ $tour->id }}" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
            <div class="card-body">
                <p><b>Lugar: </b>{{$tour->ciudad}}, {{$tour->provincia}}, {{$tour->comunidad}}</p>
                <p><b>Direccion: </b>{{$tour->direccion}}</p>
                <p><b>Fecha: </b>{{$tour->fecha}}</p>
                <p><b>Hora: </b>{{$tour->hora}}</p>
                <p><b>Idioma: </b>{{$tour->idioma_tour}}</p>

                <input type="hidden" value="{{ $tour->id }}" name="id_tour">
                <input type="hidden" value="{{ Auth::id() }}" name="id_usuario">

                <button type="button" id="botonFormulario" class="btn mt-2" data-toggle="modal" data-target="#modal-{{$tour->id}}"><strong>Eliminar tour</strong></button>

                <form action="{{route('eliminarTourguia', $tour->id)}}">
                  @csrf
                  @method('DELETE')

                  <div class="modal fade" id="modal-{{$tour->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Guardar cambios</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <p>¿Estas seguro de que quieres eliminar el tour?</p>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                          <button type="submit" class="btn btn-primary" id="botonFormulario">Aceptar</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </form>
            </div>
          </div>
        </div>
        @endforeach
        @empty($tours)
        <p>No hay tours</p>
        @endempty
      @endif
    </div>
  </section>

  <section>
    <h1 class="text-center my-4">Añadir Tour</h1>
    <div class="container-fluid my-5">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card">
            <div class="card-header">{{ __('Nuevo Tour') }}</div>

            <div class="card-body">
              <form method="POST" action="{{ route('nuevoTour') }}">
                @csrf

                <div class="form-group row">
                  <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre del Tour') }}</label>

                  <div class="col-md-6">
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                    @error('name')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                </div>

                <div class="form-group row">
                  <label for="inputComunidad" class="col-md-4 col-form-label text-md-right">{{ __('Comunidad') }}</label>

                  <div class="col-md-6">
                    <input id="inputComunidad" class="form-control @error('comunidad') is-invalid @enderror" name="comunidad" value="{{ old('comunidad') }}" required autocomplete="comunidad" autofocus>
                    @error('desp')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                </div>

                <div class="form-group row">
                  <label for="inputProvincia" class="col-md-4 col-form-label text-md-right">{{ __('Provincia') }}</label>

                  <div class="col-md-6">
                    <input id="inputProvincia" type="text" class="form-control @error('provincia') is-invalid @enderror" name="provincia" value="{{ old('provincia') }}" required autocomplete="provincia" autofocus>
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                </div>

                <div class="form-group row">
                  <label for="inputMunicipio" class="col-md-4 col-form-label text-md-right">{{ __('Municipio') }}</label>

                  <div class="col-md-6">
                    <input id="inputMunicipio" type="text" class="form-control @error('provincia') is-invalid @enderror" name="municipio" value="{{ old('provincia') }}" required autocomplete="provincia" autofocus>
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>

                </div>

                <div class="form-group row">
                  <label for="inputdireccion" class="col-md-4 col-form-label text-md-right">{{ __('Dirección') }}</label>

                  <div class="col-md-6">
                    <input id="inputdireccion" type="text" class="form-control @error('provincia') is-invalid @enderror" name="direccion" value="{{ old('provincia') }}" required autocomplete="provincia" autofocus>
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <p class="my-2"><b>Puedes indicar el lugar en el mapa de debajo,</b></p>
                    <p><span class="text-danger">*</span>Aun así, revisa el lugar en el formulario para evitar confusiones.</p>
                  </div>

                </div>

                <div class="form-group row">
                  <label for="fecha" class="col-md-4 col-form-label text-md-right">{{ __('Fecha') }}</label>

                  <div class="col-md-6">
                    <input type="date" class="form-control" name="fecha"/>
                    @error('fecha')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                </div>

                <div class="form-group row">
                  <label for="hora" class="col-md-4 col-form-label text-md-right">{{ __('Hora') }}</label>

                  <div class="col-md-6">
                    <input type="time" class="form-control" id="appt" name="hora" min="08:00" max="21:00" required>
                    @error('hora')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                </div>

                <div class="form-group row">
                  <label for="idioma" class="col-md-4 col-form-label text-md-right">{{ __('Idioma') }}</label>

                  <div class="col-md-6">
                    <input type="idioma" class="form-control @error('idioma') is-invalid @enderror" name="idioma" required>
                    @error('idioma')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                </div>

                <div class="datos bg-primary">
                  <p id="datosdatos"></p>
                </div>

                <p class="my-2"><b>Indica donde será tu tour:</b></p>
                <p><span class="text-danger">*</span>Intenta ser lo más precis@ posible.</p>

                <h4 class="mt-4">Latitud y longitud</h4>
                <div class="form-group row mx-2">
                  <input class="form-control col-6" name="latitud" type="text" id="inputlatitud" value="">
                  <input class="form-control col-6" name="longitud" type="text" id="inputlongitud" value="">
                </div>

                <div id="mapid" style="width: 100%; height: 400px;"></div>
                <script>
                	var mymap = L.map('mapid').setView([40.443488, -3.694310], 6);
                	L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
                		maxZoom: 18,
                		attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
                			'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                		id: 'mapbox/streets-v11',
                		tileSize: 512,
                		zoomOffset: -1
                	}).addTo(mymap);
                	mymap.on('click', onMapClick);
                  function onMapClick(e) {
                    document.getElementById("inputlatitud").value = e.latlng.lat;
                    document.getElementById("inputlongitud").value = e.latlng.lng;
                    peticion();
                    muestraContenido();
                      L.marker([e.latlng.lat, e.latlng.lng]).addTo(mymap);
                  };
                </script>


                <button type="button" id="botonFormulario" class="btn btn-primary my-3" data-toggle="modal" data-target="#modal">
                  {{ __('Añadir Tour') }}
                </button>

                <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Guardar cambios</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <p>¿Estas seguro de que quieres añadir el tour?</p>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary" id="botonFormulario">Aceptar</button>
                      </div>
                    </div>
                  </div>
                </div>

              </form>
            </div>
          </div>
        </div>
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
