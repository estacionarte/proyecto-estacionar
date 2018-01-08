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

            <a class="mejor-espacio-boton-alquilar" id="alquilar">Alquilar</a>
            <a href="{{ route('show.espacio', $espacio->id) }}" class="mejor-espacio-boton-vermas">Ver Más</a>

            <div id="myModal" class="modalAlquilar">
              <div class="modalAlquilar-content">
                <span class="alquilar-close">&times;</span>
                <h2>Reservar espacio</h2>
                <h3>Nombre Espacio por Usuario</h3>

                <hr>

                <div class="form-generico">

                  <form class="" action="" method="post">

                    <div class="modalAlquilar-form-div">

                      <label for="alquilar-vehiculo">Vehículo</label>
                      <select class="" name="" id="alquilar-vehiculo">
                        <option value="">Poner vehículos de usuario</option>
                        <option value="" disabled>Volkswagen Golf AAA111</option>
                        <option value="" disabled>Bicicleta Roja</option>
                      </select>

                    </div>

                    <div class="modalAlquilar-form-div">

                      <label>Fecha y Hora</label>

                      <div class="modalAlquilar-form-div-div">
                        <div class="modalAlquilar-form-horarios">
                          <input type="date" name="search-espacios-dia-comienzo" value="">
                          <select name="search-espacios-hora-comienzo" class="search-espacios-hora">
                            @for ($i=0; $i < 24; $i++)
                              @if ($i<10)
                                <option value={{ $i }}>0{{ $i }}</option>
                              @else
                                <option value={{ $i }}>{{ $i }}</option>
                              @endif
                            @endfor
                          </select>
                          <span>:</span>
                          <select name="search-espacios-minuto-comienzo" class="search-espacios-minuto">
                            @for ($i=0; $i < 60; $i+=5)
                              @if ($i<10)
                                <option value={{ $i }}>0{{ $i }}</option>
                              @else
                                <option value={{ $i }}>{{ $i }}</option>
                              @endif
                            @endfor
                          </select>
                        </div>

                        <span style="font-size:1em; vertical-align:middle;">&#8680;</span>

                        <div class="modalAlquilar-form-horarios">
                          <input type="date" name="search-espacios-dia-fin" value="">
                          <select name="search-espacios-hora-fin" class="search-espacios-hora">
                            @for ($i=0; $i < 24; $i++)
                              @if ($i<10)
                                <option value={{ $i }}>0{{ $i }}</option>
                              @else
                                <option value={{ $i }}>{{ $i }}</option>
                              @endif
                            @endfor
                          </select>
                          <span>:</span>
                          <select name="search-espacios-minuto-fin" class="search-espacios-minuto">
                            @for ($i=0; $i < 60; $i+=5)
                              @if ($i<10)
                                <option value={{ $i }}>0{{ $i }}</option>
                              @else
                                <option value={{ $i }}>{{ $i }}</option>
                              @endif
                            @endfor
                          </select>
                        </div>
                      </div>

                    </div>

                    <div class="modalAlquilar-form-div">

                      <div class="modalAlquilar-form-lineadetalle">
                        <div class="lineadetalle-motivo">
                          <span>$20 x 16hs</span>
                          <span>|?|</span>
                        </div>
                        <div class="lineadetalle-precio">
                          <span>$320</span>
                        </div>
                      </div>

                      <div class="modalAlquilar-form-lineadetalle lineadetalle-descuento">
                        <div class="lineadetalle-motivo">
                          <span>10% descuento x hr</span>
                          <span>|?|</span>
                        </div>
                        <div class="lineadetalle-precio">
                          <span>-$32</span>
                        </div>
                      </div>

                      <div class="modalAlquilar-form-lineadetalle lineadetalle-total">
                        <div class="lineadetalle-motivo">
                          <span>TOTAL</span>
                        </div>
                        <div class="lineadetalle-precio">
                          <span>$288</span>
                        </div>
                      </div>

                    </div>

                    <input type="submit" name="reservar" value="RESERVAR">

                  </form>

                </div>
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
