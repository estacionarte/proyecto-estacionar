@extends('layouts.app')
@section('title') Resultados de búsqueda @endsection
@section('leaflet')
  <link rel="stylesheet" href="{{ URL::asset('css/leaflet.css')}}">
  <script src="{{ URL::asset('js/leaflet.js')}}"></script>
@endsection
@section('content')

<div class="container" style="padding:0px 5px;">

  <div class="como-funciona">

    <section class="search-result">
        <h1>Resultados de búsqueda</h1>
      <div id="mapid" class="searchresults-map">

      </div>
      <div class="mejores-espacios-container">

      @forelse ($espacios as $espacio)
        <article class="mejor-espacio-bloque" id="{{ $espacio->id }}">
          <a href="{{ route('show.espacio', $espacio->id) }}"><img class="mejor-espacio" src="/storage/espacios/{{ $espacio->fotos->first()->photoname}}" alt=""></a>
          <h3>{{ 'Precio Final: $' . $espacio->precioFinal($horariollegada, $horariopartida)}}</h3>
          <h4>{{ $espacio->direccion }}</h4>
          <h4>{{ $espacio->tipoEspacio }}</h4>
          <img class="stars" src="/images/stars.png">

          <div class="mejor-espacio-botones">

            <a class="mejor-espacio-boton-alquilar" id="btn{{ $espacio->id }}">Alquilar</a>
            <a href="{{ route('show.espacio', $espacio->id) }}" class="mejor-espacio-boton-vermas">Ver Más</a>

            <div id="modal{{ $espacio->id }}" class="modalAlquilar">
              <div class="modalAlquilar-content">
                <span class="alquilar-close" id="btn{{ $espacio->id }}">&times;</span>
                <h2>Reservar espacio</h2>
                <h3>Nombre Espacio por Usuario</h3>

                <hr>

                @auth
                  <div class="form-generico">

                    <form action="{{ route('alquilar', $espacio->id) }}" method="post" onsubmit="return validarForm();">
                      {{ csrf_field() }}

                      <div class="modalAlquilar-form-div">

                        <label>Vehículo</label>
                        <select class="" name="vehiculo">

                          @forelse (Auth::user()->vehiculos as $vehiculo)
                            <option value="{{$vehiculo->id}}">{{$vehiculo->datos()}}</option>
                          @empty
                            <option value="">Cargar vehículo</option>
                          @endforelse
                        </select>

                      </div>

                      <div class="modalAlquilar-form-div">

                        <label>Fecha y Hora</label>

                        <div class="modalAlquilar-form-div-div">
                          <div class="modalAlquilar-form-horarios">
                            <input type="date" name="alquiler-dia-comienzo" value="{{ $diacomienzo }}">
                            <select name="alquiler-hora-comienzo" class="search-espacios-hora">
                              @for ($i=0; $i < 24; $i++)
                                @if ($i<10)
                                  <option value={{ $i }} {{ $i == $horacomienzo ? 'selected' : '' }}>0{{ $i }}</option>
                                @else
                                  <option value={{ $i }} {{ $i == $horacomienzo ? 'selected' : '' }}>{{ $i }}</option>
                                @endif
                              @endfor
                            </select>
                            <span>:</span>
                            <select name="alquiler-minuto-comienzo" class="search-espacios-minuto">
                              @for ($i=0; $i < 60; $i+=5)
                                @if ($i<10)
                                  <option value={{ $i }} {{ $i == $minutocomienzo ? 'selected' : '' }}>0{{ $i }}</option>
                                @else
                                  <option value={{ $i }} {{ $i == $minutocomienzo ? 'selected' : '' }}>{{ $i }}</option>
                                @endif
                              @endfor
                            </select>
                          </div>

                          <span style="font-size:1.4em; line-height: 47px; vertical-align:text-bottom;">&#10140;</span>

                          <div class="modalAlquilar-form-horarios">
                            <input type="date" name="alquiler-dia-fin" value="{{ $diafin }}">
                            <select name="alquiler-hora-fin" class="search-espacios-hora">
                              @for ($i=0; $i < 24; $i++)
                                @if ($i<10)
                                  <option value={{ $i }} {{ $i == $horafin ? 'selected' : '' }}>0{{ $i }}</option>
                                @else
                                  <option value={{ $i }} {{ $i == $horafin ? 'selected' : '' }}>{{ $i }}</option>
                                @endif
                              @endfor
                            </select>
                            <span>:</span>
                            <select name="alquiler-minuto-fin" class="search-espacios-minuto">
                              @for ($i=0; $i < 60; $i+=5)
                                @if ($i<10)
                                  <option value={{ $i }} {{ $i == $minutofin ? 'selected' : '' }}>0{{ $i }}</option>
                                @else
                                  <option value={{ $i }} {{ $i == $minutofin ? 'selected' : '' }}>{{ $i }}</option>
                                @endif
                              @endfor
                            </select>
                          </div>
                        </div>

                      </div>

                      <div class="modalAlquilar-form-div">

                        <div class="modalAlquilar-form-lineadetalle">
                          <div class="lineadetalle-motivo">
                            <span>Precio</span>
                            <span>|?|</span>
                          </div>
                          <div class="lineadetalle-precio">
                            <span>$</span><span precio='si'>{{ $espacio->precio($horariollegada, $horariopartida) }}</span>
                          </div>
                        </div>

                        <div class="modalAlquilar-form-lineadetalle lineadetalle-descuento">
                          <div class="lineadetalle-motivo">
                            <span>Descuento</span>
                            <span>|?|</span>
                          </div>
                          <div class="lineadetalle-precio">
                            <span>-$</span><span descuento='si'>{{ $espacio->descuento($horariollegada, $horariopartida) }}</span>
                          </div>
                        </div>

                        <div class="modalAlquilar-form-lineadetalle lineadetalle-total">
                          <div class="lineadetalle-motivo">
                            <span>TOTAL</span>
                          </div>
                          <div class="lineadetalle-precio">
                            <span>$</span><span total='si'>{{ $espacio->precioFinal($horariollegada, $horariopartida) }}</span>
                          </div>
                        </div>

                      </div>

                      <input type="submit" name="reservar" value="RESERVAR">

                    </form>

                  </div>

                  <p>Todavía no se hará ningún cobro</p>

                @endauth

                @guest

                  <div class="">
                    <h4 style="text-align:center; margin: 15px auto;">Debés <a href="{{ route('login') }}">iniciar sesión</a> antes de alquilar un espacio</h4>
                  </div>

                @endguest

              </div>
            </div>

          </div>
        </article>

      @empty
        <p>No hay espacios disponibles con estos criterios de búsqueda</p>
        <p>Intenta buscando en otra zona o en otros horarios</p>
      @endforelse

        <div class="clear">
        	{{-- {{ $espacios->links() }} --}}
        </div>
      </div>
    </section>
  </div>
</div>

@endsection

@section('scripts')
  <script>
  // Obtengo dirección ingresada por usuario que uso para geocoding
  var direccion = {!! json_encode($direccion) !!};
  // Obtengo espacios para usar con js
  var espacios = {!! json_encode($espacios) !!};

  </script>
  <script src="{{ URL::asset('js/search-results.js')}}"></script>
  <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAkuJOGY0hwpTRHHsCoxPLc_1Bcv_sUIHk&v=3&callback=initMap">
  </script>
@endsection
